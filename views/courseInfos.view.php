<?php require('partials/head.php') ?>

<?php require('partials/nav.php') ?>

<link rel="stylesheet" href="views/styles/viewcourse.css">
<div class="container">
        <img src="views/img/courses_img/<?=$infos['image_url']?>" alt="Course Photo" class="course-image">
        <div class="course-details">
            <h1><?=$infos["title"]?></h1>
            <p><strong>Price:</strong><?=$infos["price"] ?> </p>
            <p><strong>Duration:</strong> <?=$infos["duration"] ?></p>
            <p><strong>Level:</strong> Beginner</p>

            <div class="course-stats">
                <p class="stat"><strong>Students:</strong><?=$infos["students"] ?></p>
                <p class="stat"><strong>Rating:</strong><?=$infos['rating'] ?></p>
                <p class="stat"><strong>Reviews:</strong><?=$infos['reviews'] ?></p>
            </div>

            <p><?=$infos['c_description'] ?></p>

            <div class="instructor">
                <img src="views/img/profile.png" alt="Instructor Photo">
                <div class="instructor-details">
                    <p><strong>Instructor:</strong><?=$infos['inst_name'] ?></p>
                    <p><?= $infos['inst_field'] ?></p>
                </div>
            </div>

            <a href="../enrolled.html" class="enroll-btn">Enroll Now</a>
        </div>
    </div>




<?php require('partials/footer.php') ?>