<?php
require 'db-connection.php';

// Check if the query parameters exist
if (isset($_GET['id'])) {
    // Access the data
    $user_id = htmlspecialchars($_GET['id']); // Sanitize the input

    // Prepare SQL to prevent SQL injection
    $stmt = $conn->prepare("SELECT title, students, duration, rating, reviews, price,image_url, inst_name,inst_field, c_description  FROM courses WHERE id = ?");
    $stmt->bind_param("i", $user_id); // Assuming user_id is an integer
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Fetch user data
        $stmt->bind_result($title, $students, $duration, $rating, $rewiews, $price,$imgurl, $instname, $instfield,$description);
        $stmt->fetch();

    } else {
        echo "No user found with the given ID.";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No user ID provided in the query.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Way Courses</title>
    <link rel="stylesheet" href="../styles/viewcourse.css">
</head>
<body>
<header>
        <a href="../index.html" class="logo">
            <span class="text">I</span>
            <span class="bracket">&lt;</span>
            <span class="text">WAY COURSES</span>
            <span class="bracket">&gt;</span>
            <span class="text">T</span>
          </a>
        <nav id="navigation">
            <a href="../login-register.php">LOGIN</a>
            <a href="courses.php">COURSES</a>
            <a href="../about.html"target="_blank">ABOUT</a>
            <a href="../contact.html" target="_blank">CONTACT</a>
        </nav>
    </header>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const header = document.querySelector("header");
            const logo = document.querySelector(".logo");
            window.addEventListener("scroll", function () {
                if (window.scrollY > 50) { 
                    header.classList.add("scrolled");
                    logo.classList.add("scrolled");
                } else {
                    header.classList.remove("scrolled");
                    logo.classList.remove("scrolled");
                }
            });
        });
    </script>
    
    <div class="container">
        <img src="../courses_img/<?php echo $imgurl ?>" alt="Course Photo" class="course-image">
        <div class="course-details">
            <h1><?php echo $title ?></h1>
            <p><strong>Price:</strong><?php echo $price ?> </p>
            <p><strong>Duration:</strong> <?php echo $duration ?></p>
            <p><strong>Level:</strong> Beginner</p>

            <div class="course-stats">
                <p class="stat"><strong>Students:</strong><?php echo $students ?></p>
                <p class="stat"><strong>Rating:</strong> <?php echo $rating ?></p>
                <p class="stat"><strong>Reviews:</strong> <?php echo $rewiews ?></p>
            </div>

            <p><?php echo $description ?></p>

            <div class="instructor">
                <img src="../img/profile.png" alt="Instructor Photo">
                <div class="instructor-details">
                    <p><strong>Instructor:</strong><?php echo $instname ?></p>
                    <p><?php echo $instfield ?></p>
                </div>
            </div>

            <a href="../enrolled.html" class="enroll-btn">Enroll Now</a>
        </div>
    </div>
    
    <footer class="footer">
        <p class="footer-title">Copyrights @ <span>IT Way Courses</span></p>
        <div class="social-icons">
            <a href="https://www.linkedin.com/in"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com"><i class="fab fa-github"></i></a>
            <a href="#instagram"><i class="fab fa-instagram"></i></a>
            <a href="#facebook"><i class="fab fa-facebook"></i></a>
        </div>
    </footer>
</body>
</html>
