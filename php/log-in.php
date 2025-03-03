<?php
require 'db-connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["Email"]);
    $password = htmlspecialchars($_POST["Password"]);


    if (empty($email) || empty($password)) {

        header("location: ../login-register.php");
        exit();
    }
    // Prepare SQL to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Fetch hashed password and user ID
        $stmt->bind_result($user_id, $stored_password);
        $stmt->fetch();


        // Directly compare the provided password with the stored password
        if ($password === $stored_password) {
            // Successful login: Redirect to a protected page (e.g., dashboard)
          


            header("Location: profile.php?id=" . urlencode($user_id) );
            exit();
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Invalid email or password";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    header("location: ../index.html");
}
