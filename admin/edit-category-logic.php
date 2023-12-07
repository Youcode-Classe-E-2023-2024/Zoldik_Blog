<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //validate input
    if(!$title || !$description) {
        $_SESSION['edit-category'] = "Invalid form input on edit category page";

    } else {
    $query = "UPDATE categories SET category='$category' WHERE id=$id LIMIT 1";
    $_result = mysqli_query($connection, $query);

    if(mysqli_errno($connection)) {
        $_SESSION['edit-category'] = "Couldn't update category";
    } else {
        $_SESSION['edit-category-success'] = "Category $category update successfully";
    }
    }
}

header('location: ' . ROOT_URL . 'admin/manage-categories.php');
die();