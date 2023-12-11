<?php
$connect = mysqli_connect('localhost', 'root', '', 'blog');

if(!$connect){
    die('Error connecting to the database: ' . mysqli_connect_error());
}
?>