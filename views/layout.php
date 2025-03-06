<?php require "views/partials/head.php"; ?>
<link rel="stylesheet" href="views/styles/main.css">
<link rel="stylesheet" href="views/styles/headFN.css">

<body>
    <?php require "views/partials/nav.php"; ?>

    <main class="content">
        <?php require $content; ?> 
        <!-- dynamically include page content -->
    </main>

    <?php require "views/partials/footer.php"; ?>
</body>
</html>
