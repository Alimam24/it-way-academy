<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Way Courses</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">   
    <link rel="stylesheet" href="../styles/courses.css">
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
            <a href="../about.html" target="_blank">ABOUT</a>
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
    <div class="sort-container">
  <form method="GET" action="">
    <input type="text" name="search" id="search" class="search-input" placeholder="Search for courses..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
    <label for="sort" class="sort-label">Sort by:</label>
    <select id="sort" name="sort" class="sort-select">
      <option value="title">Title</option>
      <option value="students">Students</option>
      <option value="rating">Rating</option>
      <option value="price">Price</option>
    </select>
    <button class="course-btn" type="submit">Sort</button>
  </form>
</div>




    <?php
    require 'db-connection.php';

    $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
    $sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'title';
    $orderBy = 'title ASC';

    switch ($sortOption) {
        case 'students':
            $orderBy = 'students DESC';
            break;
        case 'rating':
            $orderBy = 'rating DESC';
            break;
        case 'price':
            $orderBy = 'price ASC';
            break;
    }

    // Fetch sorted courses
    $sql = "SELECT * FROM courses WHERE title LIKE '%$search%' ORDER BY $orderBy";
    $result = $conn->query($sql);


    echo '<div class="course-container">';
    while ($row = $result->fetch_assoc()) {
        echo '<a href="../php/viewcourse.php?id=' . $row['id'] . '" class="course-card">';

        echo '<img src="'."../courses_img/" . $row['image_url'] . '" alt="Course Image" class="course-image">';
        echo '<div class="course-info">';
        echo '<div class="course-meta">';
        echo '<span class="students">👥 ' . $row['students'] . ' Students</span>';
        echo '<span class="duration">⏱️ ' . $row['duration'] . '</span>';
        echo '</div>';
        echo '<h3 class="course-title">' . $row['title'] . '</h3>';
        echo '<div class="course-footer">';
        echo '<span class="rating">⭐ ' . $row['rating'] . ' (' . $row['reviews'] . ')</span>';
        echo '<span class="price">$' . $row['price'] . '</span>';
        echo '</div>';
        echo '</div>';
        echo '</a>';
    }
    echo '</div>';
    if($result->num_rows==0){
        echo '<div class="no-courses-card">';
        echo '<div class="icon">⚠️</div>';
        echo '<h2>No Courses Found</h2>';
        echo '<p>We couldn\'t find any courses matching your search criteria. Please try again with different keywords or sorting options.</p>';
        echo '</div>';

    }

    $conn->close();
    ?>

</body>
<footer class="footer">
        <p class="footer-title">Copyrights @ <span>IT Way Courses</span></p>
        <div class="social-icons">
            <a href="https://www.linkedin.com/in"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com"><i class="fab fa-github"></i></a>
            <a href="#instagram"><i class="fab fa-instagram"></i></a>
            <a href="#facebook"><i class="fab fa-facebook"></i></a>
        </div>
    </footer>
</html>