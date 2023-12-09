<?php
require_once 'config.php';


if (isset($_POST['btn'])) {
    $id = $_POST['btn'];
    $sql = "UPDATE articles SET is_deleted = 1 WHERE id = $id";
    $sql_exe = mysqli_query($connect, $sql);

    if ($sql_exe) {
        header('location: index.php');
    } else {
        echo 'error : ' . mysqli_error($connect);
    }
}

?>