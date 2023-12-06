<?php
if (isset($_POST['btn'])) {
    include_once 'config.php';

    $i = $_POST['i'];

    for ($j=0; $j < $i; $j++) {

        $check_acc_exist_query = "SELECT * FROM users where username = ? OR email = ?";
        $stm = $connect->prepare($check_acc_exist_query);
        $stm->bind_param('ss', $_POST['username-' . $j], $_POST['email-' . $j]);
        $stm->execute();
        $rst = $stm->get_result();
        if ($rst->num_rows > 0) {
            session_start();
            $_SESSION['acc_exist'] = 'Account Already Exists!';
            header('location: index.php');
        } else {
            $uploadDir = 'uploads/';
            $isadmin = 0; // announcer by default

            $originalFileName = $_FILES['avatar-' . $j]['name'];
            $uploadFile = $uploadDir . basename($originalFileName);
            move_uploaded_file($_FILES['avatar-' . $j]['tmp_name'], $uploadFile);

        $originalFileName = $_FILES['avatar-' . $j]['name'];
        $uploadFile = $uploadDir . basename($originalFileName);
        move_uploaded_file($_FILES['avatar-' . $j]['tmp_name'], $uploadFile);


            $hashedPassword = password_hash($_POST['password-' . $j], PASSWORD_DEFAULT);

            $queryiNSERT = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stm = $connect->prepare($queryiNSERT);
            $stm->bind_param('ssssssi', $_POST['firstname-' . $j],$_POST['lastname-' . $j], $_POST['username-' . $j], $_POST['email-' . $j], $hashedPassword, $uploadFile, $isadmin);
            $rslt = $stm->execute();
            if (!$rslt){
                echo 'error : ' . mysqli_errno($connect);
            } else {
                header('location: index.php');
            }

        }
    }
}
?>