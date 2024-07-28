<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}

elseif($_SESSION['usertype']=='admin') {
    header("location:index.php");
}

include 'partials/_dbconnect.php';

$name = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username = '$name' ";

$result = mysqli_query($data,$sql);

$info = mysqli_fetch_assoc($result);

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

    <style>
        .form-control{
            font-size: 20px;
        }
    </style>

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
            <li>
        </ul>
    </aside>
    <div class="content">
      <h1 class="mb-4">My Profile</h1>
        
      <div class="card" style="width:70%; padding:20px; margin:auto;">
            <form action="#" method="POST">
            <div class="card-body">
                <h5 class="card-title mb-3">My Credentials</h5>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="susername"
                    value="<?php echo "{$info['username']}"; ?>" disabled>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="example@mail.com" name="email"
                    value="<?php echo "{$info['email']}"; ?>" disabled>
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Mobile Number" name="phone"
                    value="<?php echo "{$info['phone']}"; ?>" disabled>
                    <label for="floatingInput">Mobile Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="spassword"
                    value="<?php echo "{$info['password']}"; ?>" disabled>
                    <label for="floatingPassword">Password</label>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>