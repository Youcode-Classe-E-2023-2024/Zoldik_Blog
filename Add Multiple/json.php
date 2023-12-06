<?php 
    require_once 'config.php';

    $sql_users = "SELECT * FROM users";
    $select_users = mysqli_query($connect, $sql_users);

    if (!$select_users) {
        die('Error fetching data: ' . mysqli_error($connect));
    }

    $users = array();

    while ($row = mysqli_fetch_assoc($select_users)) {
        $users[] = $row;
    }

    // Output JSON
    header('Content-Type: application/json');
    echo json_encode(['data' => $users]);
?>
