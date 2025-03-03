<?php
require 'db-connection.php';

// Check if the query parameters exist
if (isset($_GET['id'])) {
    // Access the data
    $user_id = htmlspecialchars($_GET['id']); // Sanitize the input
    $sql="delete from user where id='$user_id'";


    if ($conn->query($sql) === true) {
        header("location: ../deleted.html");
        exit();
    
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close the connection
    $conn->close();

}