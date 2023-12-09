<?php
$connect = mysqli_connect('localhost', 'root', '', 'blog');

if(!$connect){
    echo 'error connecting : ' . mysqli_error($connect);
}
?>