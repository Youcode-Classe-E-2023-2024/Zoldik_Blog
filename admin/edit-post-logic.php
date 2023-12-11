<?php
require 'config/database.php';

//make sure edit post button was clicked
if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_path_name = filter_var($_POST['previous_path_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['categori'], FILTER_SANITIZE_NUMBER_INT);
    $path = $_FILES['path'];

    //check and validate input values
    if (!$title || !$category_id || !$body || !$description) {
        $_SESSION['edit-post'] = "Couldn't update post. Invalid form data on edit post page.";
    } else {
        //delete existing path if a new path is available
        if ($path['name']) {
            $previous_path_path = 'images/' . $previous_path_name;
            if (file_exists($previous_path_path)) {
                unlink($previous_path_path);
            }

            //work on a new path
            //rename image
            $time = time(); // make each image name upload using the current timestamp
            $path_name = $time . $path['name'];
            $path_tmp_name = $path['tmp_name'];
            $path_destination_path = 'images/' . $path_name;

            // make sure the file is an image
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = pathinfo($path_name, PATHINFO_EXTENSION);
            if (in_array($extension, $allowed_files)) {
                if ($path['size'] < 2000000) {
                    move_uploaded_file($path_tmp_name, $path_destination_path);
                } else {
                    $_SESSION['edit-post'] = "Couldn't update post. path size too big.";
                }
            } else {
                $_SESSION['edit-post'] = "path should be PNG, JPG, or JPEG.";
            }
        }

       

            $path_to_insert = isset($path_name) ? $path_name : $previous_path_name;

            $query = "UPDATE articles SET title='$title', body='$body', description='$description', path='$path_to_insert', 
            category_id=$category_id WHERE id=$id LIMIT 1";

            $result = mysqli_query($connection, $query);
        }

        if (!mysqli_errno($connection)) {
            $_SESSION['edit-post-success'] = "Post update successful.";
        }
    }


header('location: ' . ROOT_URL . 'admin/');
die();
