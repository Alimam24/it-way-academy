<?php
require 'db-connection.php';


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstname= htmlspecialchars($_POST["Firstname"]);
    $lastname= htmlspecialchars($_POST["Lastname"]);
    $email= htmlspecialchars($_POST["Email"]);
    $password=htmlspecialchars($_POST["Password"]);


    if(empty($firstname) ||empty($lastname)||empty($email)||empty($password) ){
        
        header("location: ../index.html");
        exit();
    }

   
    
    // Insert query
    $sql = "INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`) 
    VALUES ('$firstname', '$lastname', '$email', '$password')";

    
    if ($conn->query($sql) === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("location: ../login-register.php");
    // Close the connection
    $conn->close();
    
}
else{
    header("location: ../index.html");
}
