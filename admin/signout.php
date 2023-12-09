<?php
session_start();
if (isset($_POST['btnSO'])) {
    unset($_SESSION['user_is_admin']);
    header('location: index.php');
    exit();
}