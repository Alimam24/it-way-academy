<?php

use Core\Database;
 
$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;

$profile = $db->query('select * from user where id = :id', [
    'id' => $_POST['id'] 
])->findOrFail();

authorize($profile['id'] === $currentUserId);

$db->query('delete from user where id = :id', [
    'id' => $_POST['id'] 
]);

header("Location: /");

exit();
























// require 'db-connection.php';

// // Check if the query parameters exist
// if (isset($_GET['id'])) {
//     // Access the data
//     $user_id = htmlspecialchars($_GET['id']); // Sanitize the input
//     $sql="delete from user where id='$user_id'";


//     if ($conn->query($sql) === true) {
//         header("location: ../deleted.html");
//         exit();
    
//     }
//     else{
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
//     // Close the connection
//     $conn->close();

// }