<?php 
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'blog');
    
    $newComment = filter_input(INPUT_POST, 'newComment', FILTER_SANITIZE_SPECIAL_CHARS);
    $commentId = filter_input(INPUT_POST, 'commentId', FILTER_SANITIZE_SPECIAL_CHARS);

    $update_comment = "UPDATE `comments` SET  `comment` = '$newComment' WHERE id = $commentId";
    mysqli_query($conn, $update_comment);

    mysqli_close($conn);
?>