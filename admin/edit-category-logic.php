<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $categori = filter_var($_POST['categorie'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //validate input
    if(!$categori) {
        $_SESSION['edit-category'] = "Invalid form input on edit category page";

    } else {
    $query = "UPDATE categories SET category='$categori' WHERE id=$id LIMIT 1";
    $_result = mysqli_query($connection, $query);

    if(mysqli_errno($connection)) {
        $_SESSION['edit-category'] = "Couldn't update category";
    } else {
        $_SESSION['edit-category-success'] = "Category $categori update successfully";
    }
    }
}

header('location: ' . ROOT_URL . 'admin/categories.php');
die();