<?php

$config = require('config.php');
$db = new Database($config['database']);

$infos= $db->query('SELECT title, students, duration, rating, reviews, price,image_url, inst_name,inst_field, c_description  FROM courses WHERE id = :id', ['id' => $_GET['id']])->fetch();


require 'views/courseInfos.view.php';






























// // Check if the query parameters exist
// if (isset($_GET['id'])) {
//     // Access the data
//     $user_id = htmlspecialchars($_GET['id']); // Sanitize the input

//     // Prepare SQL to prevent SQL injection
//     $stmt = $conn->prepare("SELECT title, students, duration, rating, reviews, price,image_url, inst_name,inst_field, c_description  FROM courses WHERE id = ?");
//     $stmt->bind_param("i", $user_id); // Assuming user_id is an integer
//     $stmt->execute();
//     $stmt->store_result();

//     if ($stmt->num_rows > 0) {
//         // Fetch user data
//         $stmt->bind_result($title, $students, $duration, $rating, $rewiews, $price,$imgurl, $instname, $instfield,$description);
//         $stmt->fetch();

//     } else {
//         echo "No user found with the given ID.";
//     }

//     // Close the statement
//     $stmt->close();
// } else {
//     echo "No user ID provided in the query.";
// }