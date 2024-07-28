<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}

elseif($_SESSION['usertype']=='admin') {
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>

  <link href="admin-style.css" rel="stylesheet">
  <?php
    include 'partials/admin_css.php';
  ?>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg sticky-top bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" href="student_home.php"><i class="fa-solid fa-graduation-cap"></i> &nbsp;Student Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="btn btn-outline-dark" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <!--/Navbar-->
    
    <!--Sidebar-->
    <aside>
        <ul>
            <li>
                <a href="my_profile.php">My Profile</a>
            </li>
            <li>
                <a href="edit_profile.php">Edit Profile</a>
            </li>
            <li>
                <a href="courses.php">Courses</a>
            </li>
        </ul>
    </aside>
    <div class="content" style="display:flex;">
        <div class="col-lg-6" style="margin-top:50px;">
            <h3>Welcome to</h3>
            <h2>Student Dashboard</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit, rerum nesciunt nobis ipsam sint ad blanditiis a corrupti magnam at iusto!
            </p>
        </div>
        <div class="col-lg-6" style="margin-top:50px;">
            <img src="images/uni.png" style="width:100%;">
        </div>
    </div>
</body>
</html>