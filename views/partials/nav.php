<link rel="stylesheet" href=<?= style('headFN.css') ?>>
<div class="base">
    <header>
        <a href="/" class="logo">
            <span class="text">I</span>
            <span class="bracket">&lt;</span>
            <span class="text">WAY COURSES</span>
            <span class="bracket">&gt;</span>
            <span class="text">T</span>
        </a>
        <!-- view('partials/logo.php')?> -->
        <nav id="navigation">
            <a href="/register">BLOG</a>
            <a href="/courses">COURSES</a>
            <a href="/about">ABOUT</a>
            <a href="/contact">CONTACT</a>
        </nav>
        <?php if ($_SESSION['user'] ?? false): ?>
            <div class="user-actions">
                <div class="user-avatar">
                    <a href="/profile"><img src="/img/avatars/profile.png" alt="User Avatar" width="45px"></a>
                </div>
                <form method="POST" action="/session">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="logout-btn">Logout</button>
                </form>
            </div>
        <?php else: ?>
            <div>
                <a href="/login" class="register-btn">LOGIN</a>
                <a href="/register" class="register-btn">REGISTER HERE!!</a>
            </div>
        <?PHP endif; ?>


    </header>
</div>
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
