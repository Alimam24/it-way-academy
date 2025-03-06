<?php
require "views/courses.view.php";

require 'php/db-connection.php';

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
    echo '<a href="course?id=' . $row['id'] . '" class="course-card">';

    echo '<img src="' . "views/img/courses_img/" . $row['image_url'] . '" alt="Course Image" class="course-image">';
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
if ($result->num_rows == 0) {
    echo '<div class="no-courses-card">';
    echo '<div class="icon">⚠️</div>';
    echo '<h2>No Courses Found</h2>';
    echo '<p>We couldn\'t find any courses matching your search criteria. Please try again with different keywords or sorting options.</p>';
    echo '</div>';
}

$conn->close();




//temporary
require('views/partials/footer.php');
