<?php view('partials/head.php') ?>

<?php view('partials/nav.php') ?>
<link rel="stylesheet" href=<?= style('profile.css') ?>>
<div class="page-wrapper">
    <div class="container">
        <div class="profile-card">
            <div class="left-section">
                <img src="/img/avatars/<?=$infos['avatar']?>" alt="Profile Picture" class="profile-pic">
                <h2 class="name"><?= $infos['firstname'] . ' ' . $infos['lastname'] ?></h2>
                <p class="title">student</p>

                <!-- <a href="/profile/edit" class="edit-link">✏️</a> -->
                <button onclick="myFunction()" class="edit-link">✏️</button>
                <form method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button class="delete-link">🗑️</button>
                </form>
            </div>
            <div class="right-section">
                <div class="info">
                    <h3>Information</h3>
                    <p><strong>Email:</strong> <?= $infos['email'] ?> </p>

                    <p><strong>Phone:</strong> <?= $infos['phone'] ?></p>

                    <p><strong>birthdate:</strong> <?= $infos['birthdate'] ?></p>

                </div>
                <div class="projects">
                    <h3>Projects</h3>
                    <p><strong>Recent:</strong></p>
                    <p><strong>Most Viewed:</strong></p>
                </div>
                <div class="social-links">
                    <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" class="icon"></a>
                    <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Twitter" class="icon"></a>
                    <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Instagram" class="icon"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="update" style="display: none; padding-top: 0;">
        <div class="update-inner">
            <?php view('profile/update.view.php',['infos' => $infos,'errors'=>$errors]) ?>
        </div>
    </div>
</div>

<?php view('partials/footer.php') ?>


<script>
  function myFunction() {
    const update = document.getElementById("update");
    if (update.style.display === "none" || update.style.display === "") {
      update.style.display = "flex";
      update.scrollIntoView({ behavior: "smooth" });
    } else {
      update.style.display = "none";
    }
  }
</script>

<?php if (isset($errors)) : ?>
  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const target = document.getElementById("update");
      if (target) {
        target.style.display = "flex";
        target.scrollIntoView({ behavior: "smooth" });
        window.history.replaceState({}, document.title, window.location.pathname + "#" + target.id);
      }
    });
  </script>
<?php endif; ?>

