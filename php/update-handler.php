<?php
require 'db-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $firstname = htmlspecialchars($_POST["Firstname"]);
    $lastname = htmlspecialchars($_POST["Lastname"]);
    $birthdate = htmlspecialchars($_POST["Birthdate"]);
    $phone = htmlspecialchars($_POST["PhoneNumber"]);
    $email = htmlspecialchars($_POST["Email"]);
    $password = htmlspecialchars($_POST["Password"]);


    $tempName = $_FILES['ProfilePhoto']['tmp_name'];
    $fileName = $_FILES['ProfilePhoto']['name'];
    $folder = '../uimg/' . $fileName;




    // Check if email is provided
    if (empty($email)) {
        echo "Email is required.";
        exit();
    }

    // Build the SQL query dynamically based on non-empty fields
    $fieldsToUpdate = [];

    if (!empty($firstname)) {
        $fieldsToUpdate[] = "firstname = '$firstname'";
    }

    if (!empty($lastname)) {
        $fieldsToUpdate[] = "lastname = '$lastname'";
    }

    if (!empty($birthdate)) {
        $fieldsToUpdate[] = "birthdate = '$birthdate'";
    }

    if (!empty($phone)) {
        $fieldsToUpdate[] = "phone = '$phone'";
    }

    if (!empty($password)) {
        $fieldsToUpdate[] = "password = '$password'";
    }

    if (!empty($fileName)) {
        $fieldsToUpdate[] = "avatar = '$fileName'";
    }

    // Ensure at least one field is being updated
    if (empty($fieldsToUpdate)) {
        echo "No fields to update.";
        exit();
    }

    // Concatenate fields for the SQL query
    $fieldsQuery = implode(", ", $fieldsToUpdate);

    // Update query
    $sql = "UPDATE `user` SET $fieldsQuery WHERE email = '$email'";


    move_uploaded_file($tempName,$folder);
    // Execute the query
    if ($conn->query($sql) === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        header("location: ../updated.html");
        
    }

    // Close the connection
    $conn->close();
} else {
    header("location: ../index.html");
}
