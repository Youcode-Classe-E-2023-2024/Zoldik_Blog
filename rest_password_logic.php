<?php
require 'config/database.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    $oneHourLater = date('Y-m-d H:i:s', strtotime('+1 hour'));

    if ($email === false) {
        echo 'Invalid email address.';
        exit;
    }

    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $checkEmailQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        if (isset($_POST["token"])) {
            $tok = $_POST["token"];
            $pass = $_POST["res_password"];
            $checkTokenQuery = "SELECT * FROM password_reset_tokens WHERE token = '$tok'";
            
            $res = mysqli_query($connection, $checkTokenQuery);

            if ($res && mysqli_num_rows($res) > 0 && $res->fetch_assoc()["created_at"] < $oneHourLater) {
                $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

                $setNewPass = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
                mysqli_query($connection, $setNewPass);

                echo 'Password has been reset successfully.';
            } else {
                echo 'Invalid or expired token.';
            }
        } else {
            $token = bin2hex(random_bytes(32));

            $sql = "INSERT INTO password_reset_tokens (email, token) VALUES ('$email', '$token')";

            if (mysqli_query($connection, $sql)) {
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host = ' 192.168.9.123';  // Update with your SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'naoufal.ln20@gmail.com';  // Update with your email
                $mail->Password = 'hiso wsfx cols iray';  // Update with your email password
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('naoufal.ln20@gmail.com', 'Your Name');
                $mail->addAddress($email);

                $mail->Subject = 'Password Reset';
                $mail->Body = 'Click the following link to reset your password: http://localhost/Zoldik_Blog/reset-password.php?token=' . $token;

                if ($mail->send()) {
                    echo 'Email has been sent with instructions to reset your password.';
                } else {
                    echo 'Error sending email: ' . $mail->ErrorInfo;
                }
            } else {
                echo 'Error: ' . mysqli_error($connection);     
            }
        }
    } else {
        echo 'Email address not found.';
    }
}
?>
