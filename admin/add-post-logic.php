<?php 
require 'config/database.php';

if(isset($_POST['submit'])){
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $path = $_FILES['path'];
   
    //validate form data
    if(!$title){
        $_SESSION['add-post']="Enter post title";
    } elseif (!$description){
        $_SESSION['add-post']="Enter post description";
    } elseif (!$category_id){
        $_SESSION['add-post'] = "Select post category";
    } elseif (!$body) {
        $_SESSION['add-post'] = "Enter post body";
    } elseif (!$path['name']){
        $_SESSION['add-post']= "Chose post path";
    }else {
        //work on thumbnail
        //rename the image 
        $time = time();//make each image name unique
        $path_name = $time . $path['name'];
        $path_tmp_name = $path['tmp_name'];
        $path_destination_path = '../images/' . $path_name;

        //make sure file is an image
        $allowed_files = ['pnj', 'jpg', 'jpeg'];
        $extension = explode('.', $path_name);
        $extension = end($extension);
        if(in_array($extension, $allowed_files)) {
            //make sure image is not too big. (2mb+)
            if($path['size'] < 2_000_000) {
                move_uploaded_file($path_tmp_name, $path_destination_path);
            } else {
                $_SESSION['add-post'] = "File size too big. should be less that 2mb";
            } 
            }else {
                $_SESSION['add-post'] = "File should be png, jpg or jpeg";
            }
        }

        //redirect back (with form data) to add-post page if there is any prblm
        if(isset($_SESSION['add-post'])) {
            $_SESSION['add-post-data'] = $_POST;
            header('location: ' . ROOT_URL . 'admin/add-post.php');
            die();
        }

            //insert posts into database
            $query = "INSERT INTO articles (title, description, body, path, category_id, author_id) VALUES ('$title', '$description', '$body', '$path_destination_path', $category_id, $author_id)";

            $result = mysqli_query($connection, $query);

            if(!mysqli_errno($connection)) {
                $_SESSION['add-post-success'] = "New post added successfully";
                header('location: ' . ROOT_URL . 'admin/');
                die();
            }
        }

header('location: ' . ROOT_URL . 'admin/add-post.php');
die();
   