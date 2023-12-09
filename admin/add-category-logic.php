<?php
require '../config/database.php';

if(isset($_POST['submit'])){
    //get form data
    $category = filter_var($_POST['category'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$category){
        $_SESSION['add-category'] = "Enter category";
    }

    //redirect back to add category page with form data if there was invalid input
    if(isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();
    } else {
        //insert category into database
        $query = "INSERT INTO categories (category) VALUES ('$category')";
        $result = mysqli_query($connection, $query);
        if(mysqli_errno($connection)){
            $_SESSION['add-category'] = "Couldn't add category";
            header('location: ' . ROOT_URL . 'admin/add-category.php');
            die();
        } else {
            $_SESSION['add-category-success'] = "$category category added successfully";
            header('location: ' . ROOT_URL . 'admin/index.php');
            die();
        }
    }
}
?>
