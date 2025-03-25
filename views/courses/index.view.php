<?php view('partials/head.php') ?>

<?php view('partials/nav.php') ?>

<link rel="stylesheet" href=<?= style('courses.css') ?>>

<div class="sort-container">
  <form method="GET">
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



<div class="course-container">
  <?php foreach ($courses as $course): ?>
    <a href="/courses/infos?id=<?= $course['id'] ?>" class="course-card">

      <img src="/img/courses_img/<?= $course['image_url'] ?>" alt="Course Image" class="course-image">
      <div class="course-info">
        <div class="course-meta">
          <span class="students">👥 <?= $course['students'] ?> Students</span>
          <span class="duration">⏱️ <?= $course['duration'] ?> </span>
        </div>
        <h3 class="course-title"> <?= $course['title'] ?> </h3>
        <div class="course-footer">
          <span class="rating">⭐ <?= $course['rating'] ?> ( <?= $course['reviews'] ?> )</span>
          <span class="price">$ <?= $course['price'] ?> </span>
        </div>
      </div>
    </a>
  <?PHP endforeach ?>
</div>
<?php if (empty($courses)): ?>
  <div class="no-courses-card">
    <div class="icon">⚠️</div>
    <h2>No Courses Found</h2>
    <p>We couldn't find any courses matching your search criteria. Please try again with different keywords or sorting options.</p>
  </div>
<?php endif ?>

<?php view('partials/footer.php'); //the footer in the controller temporary 
?>