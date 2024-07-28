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


if(isset($_POST['update_profile'])) {

    $showAlert = false;
    $showError = false;
    $existError = false;

    $data_email = $_POST["email"];
    $data_phone = $_POST["phone"];
    $data_password = $_POST["spassword"];
    $cpassword = $_POST["cpassword"];

    // $exists = false;

    // $check = "SELECT * FROM user WHERE username = '$data_name' ";
    // $check_user = mysqli_query($data,$check);
    // $row_count = mysqli_num_rows($check_user);

    // if($row_count > 0){
    //   $exists = true;
    // }
    // else{
    //   $exists = false;
    // }

    if(($data_password == $cpassword) && $exists==false) {

      $sql1="UPDATE user SET username = '$name', phone = '$data_phone', email = '$data_email', password = '$data_password' WHERE username = '$name' ";

      $result1=mysqli_query($data,$sql1);

      if($result) {
        $showAlert = true;
      }
    }

    else if ($exists==true){
        $existError = true;
    }

    else {
      $showError = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit My Profile</title>
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
                <a href="edit_profile.php" class="active">Edit Profile</a>
            </li>
            <li>
                <a href="courses.php">Courses</a>
            </li>
        </ul>
    </aside>
    <div class="content">
        <h1 class="mb-4">Edit My Profile</h1>
        <?php 
            if($showAlert) {
                echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                    <strong>Success!</strong> Student record updated in the database.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if($existError) {
                echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                    <strong>Error!</strong> Username already exists.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
            if($showError) {
                echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                    <strong>Error!</strong> Passwords do not match.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>
        <div class="form" style="width:100%; padding:20px">
            <form action="#" method="POST">
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="susername"
                    value="<?php echo "{$info['username']}"; ?>" disabled style="background:white;">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="example@mail.com" name="email"
                    value="<?php echo "{$info['email']}"; ?>">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Mobile Number" name="phone"
                    value="<?php echo "{$info['phone']}"; ?>">
                    <label for="floatingInput">Mobile Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="spassword"
                    value="<?php echo "{$info['password']}"; ?>">
                    <label for="floatingPassword">Set Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cpassword">
                    <label for="floatingPassword">Confirm Password</label>
                </div>
            </div>
            <div class="modal-footer">
                <input class="btn btn-dark" type="Submit" name="update_profile" value="Update Profile" style="width:100%">
            </div>
            </form>
        </div>
    </div>
    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>
</html>