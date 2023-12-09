<?php
require_once 'config.php';

if (isset($_POST['save_btn'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $admin = 0;

    if ($_POST['is_admin'] == 'admin') {
        $admin = 1;
    }

    $uploadDir = 'uploads/';
    $originalFileName = $_FILES['avatar']['name'];
    $uploadFile = $uploadDir . basename($originalFileName);
    move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);

    $sql = "UPDATE users SET firstname = ?, lastname = ?, username = ?, email = ?, avatar = ?, is_admin = ? WHERE id = $id";
    $prepare = $connect->prepare($sql);
    $prepare->bind_param('sssssi', $firstname, $lastname, $username, $email, $uploadFile, $admin);
    $result = $prepare->execute();

    if ($result) {
        header('location: index.php');
        exit();
    } else {
        echo "error : " . mysqli_error($connect);
    }
}
?>