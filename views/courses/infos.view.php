<?php view('partials/head.php') ?>

<?php view('partials/nav.php') ?>

<link rel="stylesheet" href=<?=style('viewcourse.css')?>>

<div class="container">
        <img src="/img/courses_img/<?=$image_url?>" alt="Course Photo" class="course-image">
        <div class="course-details">
            <h1><?= $title?></h1>
            <p><strong>Price:</strong><?= $price ?> </p>
            <p><strong>Duration:</strong> <?= $duration?></p>
            <p><strong>Level:</strong> Beginner</p>

            <div class="course-stats">
                <p class="stat"><strong>Students:</strong><?= $students ?></p>
                <p class="stat"><strong>Rating:</strong><?= $rating ?></p>
                <p class="stat"><strong>Reviews:</strong><?= $reviews?></p>
            </div>

            <p><?= $c_description ?></p>

            <div class="instructor">
                <img src="/img/avatars/profile.png" alt="Instructor Photo">
                <div class="instructor-details">
                    <p><strong>Instructor:</strong><?= $inst_name ?></p>
                    <p><?=  $inst_field ?></p>
                </div>
            </div>

            <a href="/alert?name=Enrolled" class="enroll-btn">Enroll Now</a>
        </div>
    </div>




<?php view('partials/footer.php') ?>