<?php
require 'db-connection.php';

// Check if the query parameters exist
if (isset($_GET['id'])) {
    // Access the data
    $user_id = htmlspecialchars($_GET['id']); // Sanitize the input

    // Prepare SQL to prevent SQL injection
    $stmt = $conn->prepare("SELECT firstname, lastname, email,phone,birthdate,avatar FROM user WHERE id = ?");
    $stmt->bind_param("i", $user_id); // Assuming user_id is an integer
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Fetch user data
        $stmt->bind_result($first_name, $last_name, $email, $phone, $birthdate, $avatar);
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


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/profile.css">
    <title>IT Way Courses</title>
   
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
    <div class="container">
    <div class="profile-card">
        <div class="left-section">
            <img src="../uimg/<?php echo htmlspecialchars($avatar); ?>" alt="Profile Picture" class="profile-pic">
            <h2 class="name"><?php echo $first_name." ".$last_name; ?></h2>
            <p class="title">student</p>
            <a href="../update-infos.html" class="edit-link" target=_blank>✏️</a> 
            <!-- ../update-info.html -->
            <a href="delete account.php?id=<?php echo $user_id?>" class="delete-link">🗑️</a>
        </div>
        <div class="right-section">
            <div class="info">
                <h3>Information</h3>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?> </p>

                <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>

                <p><strong>birthdate:</strong> <?php echo htmlspecialchars($birthdate); ?></p>

            </div>
            <div class="projects">
                <h3>Projects</h3>
                <p><strong>Recent:</strong> Sam Disuja</p>
                <p><strong>Most Viewed:</strong> Dinoter Husainm</p>
            </div>
            <div class="social-links">
                <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" class="icon"></a>
                <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Twitter" class="icon"></a>
                <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Instagram" class="icon"></a>
            </div>
        </div>
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

