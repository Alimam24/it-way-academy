<?php view('partials/head.php') ?>

<?php view('partials/nav.php') ?>

<link rel="stylesheet" href=<?= style('profile.css') ?>>

<div class="container">
    <div class="profile-card">
        <div class="left-section">
            <img src="/img/uimg/<?=$avatar?>" alt="Profile Picture" class="profile-pic">
            <h2 class="name"><?=$lastname?></h2>
            <p class="title">student</p>

            <a href="../updat$tml" class="edit-link" target=_blank>✏️</a>
            <!-- ../update-info.html -->
            <form method="POST" >
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?=$id?>">
                <button class="delete-link">🗑️</button>
            </form>
        </div>
        <div class="right-section">
            <div class="info">
                <h3>Information</h3>
                <p><strong>Email:</strong> <?=$email ?> </p>

                <p><strong>Phone:</strong> <?=$phone?></p>

                <p><strong>birthdate:</strong> <?=$birthdate?></p>

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

<?php view('partials/footer.php') ?>