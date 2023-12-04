<?php
    $servername = "localhost";
    $db_user = "root";
    $db_pass = "";

    // Create connection
    $conn = mysqli_connect($servername, $db_user, $db_pass);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create the database if it doesn't exist
    $db_name = "blog";
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS $db_name";

    if (!mysqli_query($conn, $sql_create_db)) {
        echo "Error creating database: " . mysqli_error($conn);
    }

    // Switch to the database
    mysqli_select_db($conn, $db_name);

    // Create users table if it doesn't exist
    $table_name1 = "users";
    $sql_create_table1 = "CREATE TABLE IF NOT EXISTS $table_name1 (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        path VARCHAR(255) NOT NULL, 
        isadmin INT NOT NULL
    )";

    if (!mysqli_query($conn, $sql_create_table1)) {
        echo "Error creating table: " . mysqli_error($conn);
    }

    // Create products table if it doesn't exist
    $table_name2 = "articles";
    $sql_create_table2 = "CREATE TABLE IF NOT EXISTS $table_name2 (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        title VARCHAR(50) NOT NULL,
        description VARCHAR(200) NOT NULL,
        path VARCHAR(255) NOT NULL
    )";

    if (!mysqli_query($conn, $sql_create_table2)) {
        echo "Error creating table: " . mysqli_error($conn);
    }

    // Create categories table if it doesn't exist
    $table_name3 = "categories";
    $sql_create_table3 = "CREATE TABLE IF NOT EXISTS $table_name3 (
        id INT AUTO_INCREMENT PRIMARY KEY,
        article_id INT NOT NULL,
        category VARCHAR(50) NOT NULL
    )";

    if (!mysqli_query($conn, $sql_create_table3)) {
        echo "Error creating table: " . mysqli_error($conn);
    }
    
    // Close the connection
    mysqli_close($conn);
?>