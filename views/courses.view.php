<?php require('partials/head.php') ?>

<?php require('partials/nav.php') ?>

<link rel="stylesheet" href="views/styles/courses.css">

<div class="sort-container">
  <form method="GET" action="">
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





<?php //require('partials/footer.php') //the footer in the controller temporary ?>