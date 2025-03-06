<?php $config = require('config.php');?>
<?php $basePath=$config['basePath']; //bringing the base dir ?>

<link rel="stylesheet" href="views/styles/headFN.css">
<header>
    <a href="<?="$basePath/"?>" class="logo">
        <span class="text">I</span>
        <span class="bracket">&lt;</span>
        <span class="text">WAY COURSES</span>
        <span class="bracket">&gt;</span>
        <span class="text">T</span>
    </a>
    <nav id="navigation">
        <a href="login-register.php">LOGIN</a>
        <a href="courses">COURSES</a>
        <a href="about.html" target="_blank">ABOUT</a>
        <a href="contact.html" target="_blank">CONTACT</a>
    </nav>
</header>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const header = document.querySelector("header");
        const logo = document.querySelector(".logo");
        window.addEventListener("scroll", function() {
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