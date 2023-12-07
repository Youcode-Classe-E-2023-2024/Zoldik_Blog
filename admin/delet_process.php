<?php
require_once 'config.php';

if (isset($_POST['delete_btn'])) {
    $id = $_POST['id_user'];
    echo $id;
    $sql = "DELETE FROM users WHERE id = $id";
    $rslt = mysqli_query($connect, $sql);

    if ($rslt) {
        header('location: index.php');
    } else {
        echo 'error : ' . mysqli_error($connect);
    }
}

?>
