<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}

elseif($_SESSION['usertype']=='student') {
    header("location:index.php");
}

include 'partials/_dbconnect.php';

$id = $_GET['student_id'];

$sql0 = "SELECT * FROM user WHERE id = '$id' ";

$result0 = mysqli_query($data, $sql0);

$info0 = $result0->fetch_assoc();

if(isset($_POST['update'])) {

    $showAlert = false;
    $showError = false;
    $existError = false;

    $data_name = $_POST["susername"];
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

      $sql1="UPDATE user SET username = '$data_name', phone = '$data_phone', email = '$data_email', password = '$data_password' WHERE id = '$id' ";

      $result=mysqli_query($data,$sql1);

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
  <title>Edit Student Data</title>

  <?php
    include 'partials/admin_css.php';
  ?>

  <style>

    .btn {
        width: auto;
        height: 38px;
    }

  </style>

</head>
<body>
    <?php
        include 'partials/admin_navbar.php';
    ?>
    <!--Sidebar-->
    <aside>
        <ul>
            <li>
                <a href="admission.php" class="active">Student Data</a>
            </li>
            <li>
                <a href="add_student.php">Add Student</a>
            </li>
            <li>
                <a href="update_data.php">Update Data</a>
            </li>
            <li>
                <a href="add_teacher.php">Add Teacher</a>
            </li>
            <li>
                <a href="view_teacher.php">View Teacher</a>
            </li>
            <li>
                <a href="add_courses.php">Add Courses</a>
            </li>
            <li>
                <a href="view_courses.php">View Courses</a>
            </li>
        </ul>
    </aside>

    <!--Main Content-->
    <div class="content">
      <h1 class="mb-4">Edit Student Details</h1>
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
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="susername" value="<?php echo"{$info0['username']}" ?>">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="example@mail.com" name="email" value="<?php echo"{$info0['email']}" ?>">
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Mobile Number" name="phone" value="<?php echo"{$info0['phone']}" ?>">
                <label for="floatingInput">Mobile Number</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="spassword" value="<?php echo"{$info0['password']}" ?>">
                <label for="floatingPassword">Set Password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cpassword">
                <label for="floatingPassword">Confirm Password</label>
              </div>
            </div>
            <div class="modal-footer" style="display: flex;">
                <a href="admission.php" class="btn btn-secondary" name="Back" style="margin-right: 10px;">Go Back</a>
                <input class="btn btn-dark" type="Submit" value="Edit Student Record" name="update">
            </div>
          </form>
        </div>
    </div>
</body>