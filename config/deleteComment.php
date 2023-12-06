<?php
    print_r($_POST);
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'blog');
    $commentId = filter_input(INPUT_POST, 'commentId', FILTER_SANITIZE_SPECIAL_CHARS);
    $delete_comment = "DELETE FROM `comments` WHERE id = $commentId";
    mysqli_query($conn, $delete_comment);
?>