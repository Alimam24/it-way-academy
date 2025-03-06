<?php require('partials/head.php') ?>

<?php require('partials/nav.php') ?>

<link rel="stylesheet" href="views/styles/homepage.css">

   
    <section id="main">
      <h2>Welcome to IT Way Academy<br><br><span>Your Gateway to Online IT Mastery</span></h2>
      <h3>"Empower your future with expert-led courses designed to elevate your skills."</h3><br><br><br>
      <a href="#pop_courses">
          <btn class="course-btn">Explore Our Courses</btn>
      </a><br><br>
      <div id="icons">
          <a href="https://www.linkedin.com/in"><i class="fab fa-linkedin"></i></a>
          <a href="https://github.com"><i class="fab fa-github"></i></a>
          <a href="#instagram"><i class="fab fa-instagram"></i></a>
          <a href="#facebook"><i class="fab fa-facebook"></i></a>
      </div>
  </section>
  
    <div id="pop_courses">
        <br><br><br>
        <div class="c1title">
            COURSES
        </div>
        <div class="c2title">
        Our Popular Courses
        </div>
        <div class="course-container">
            <a href="php/viewcourse.php?id=1" class="course-card">
              <img src="courses_img/9.jpg" alt="Course Image" class="course-image">
              <div class="course-info">
                <div class="course-meta">
                  <span class="students">👥 25 Students</span>
                  <span class="duration">⏱️ 1h 30m</span>
                </div>
                <h3 class="course-title">Web design & development courses for beginner</h3>
                <div class="course-footer">
                  <span class="rating">⭐ 4.5 (250)</span>
                  <span class="price">$99</span>
                </div>
              </div>
            </a>
            <a href="php/viewcourse.php?id=2" class="course-card">
                <img src="courses_img/5.jpg" alt="Course Image" class="course-image">
                <div class="course-info">
                  <div class="course-meta">
                    <span class="students">👥 40  Students</span>
                    <span class="duration">⏱️ 45m</span>
                  </div>
                  <h3 class="course-title">Project Managment: The Basics for Success</h3>
                  <div class="course-footer">
                    <span class="rating">⭐ 4.3 (320)</span>
                    <span class="price">$150</span>
                  </div>
                </div>
            </a>
              <a href="php/viewcourse.php?id=3" class="course-card">
                <img src="courses_img/10.jpg" alt="Course Image" class="course-image">
                <div class="course-info">
                  <div class="course-meta">
                    <span class="students">👥 35 Students</span>
                    <span class="duration">⏱️ 2h 45m</span>
                  </div>
                  <h3 class="course-title">DevOps and Software Engineering</h3>
                  <div class="course-footer">
                    <span class="rating">⭐ 4.8 (56)</span>
                    <span class="price">$125</span>
                  </div>
                </div>
            </a>
          </div>
          <a href="courses"><btn class="course-btn">View all courses</btn></a>
            </div>
   <br><br><br><br><br>
    <section id="Contact">
        <h2 class="title">Let's work together</h2>
        <div class="cards">
            <div class="card" >
                <i class="fas fa-phone"></i>
                <h3>Phone</h3>
                <p>+963935125168</p>
            </div>

            <div class="card">
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="info">
                    <h3>Email</h3>
                    <p>it_way_edu@gmail.com</p>
                </div>
            </div>

        </div>
    </section>
    
    <?php require('partials/footer.php') ?>