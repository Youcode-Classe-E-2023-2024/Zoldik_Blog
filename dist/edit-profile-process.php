<?php
session_start();
include '../admin/config.php';

if (!isset($_SESSION['user-id'])) {
    header('location: index.php');
    exit();
}

$user_id = $_SESSION['user-id'];

if (isset($_POST['btn'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    if (isset($_FILES['photo']['name'])) {
        $uploadDir = '../images/';
        $originalFileName = $_FILES['photo']['name'];
        $uploadFile = $uploadDir . basename($originalFileName);
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile);
    } else {
        $uploadFile = $_POST['currentPhoto'];
    }

    $sql = "UPDATE users SET avatar = ?, firstname = ?, lastname = ?, username = ?, email = ?";
    if (!empty($_POST['newPassword'])) {
        $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        $sql .= ", password = ? WHERE id = ?";
        $prepare = $connect->prepare($sql);
        $prepare->bind_param('ssssssi', $uploadFile, $firstname, $lastname, $username, $email, $newPassword, $user_id);
        $result = $prepare->execute();
    } else {
        $sql .= " WHERE id = ?";
        $prepare = $connect->prepare($sql);
        $prepare->bind_param('sssssi', $uploadFile, $firstname, $lastname, $username, $email, $user_id);
        $result = $prepare->execute();
    }
    if ($result) {
        header('location: index2.php');
        exit();
    } else {
        echo "error : " . mysqli_error($connect);
    }
}
?>
