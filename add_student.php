<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}

elseif($_SESSION['usertype']=='student') {
    header("location:index.php");
}

include 'data_check.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Student</title>

  <?php
    include 'partials/admin_css.php';
  ?>
</head>
<body>
    <?php
        include 'partials/admin_navbar.php';
    ?>
    <!--Sidebar-->
    <aside>
        <ul>
            <li>
                <a href="admission.php">Student Data</a>
            </li>
            <li>
                <a href="add_student.php" class="active">Add Student</a>
            </li>
            <li>
                <a href="delete_data.php">Delete Data</a>
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
        </ul>
    </aside>

    <!--MainContent-->

    <div class="content">
      <h1 class="mb-4">Add Student</h1>
        <?php 
            if($showAlert) {
                echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                    <strong>Success!</strong> Student record added in the database.
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
          <form action="add_student.php" method="POST">
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="susername">
                <label for="floatingInput">Student's Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="example@mail.com" name="email">
                <label for="floatingInput">Student's Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Mobile Number" name="phone">
                <label for="floatingInput">Student's Mobile Number</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="spassword">
                <label for="floatingPassword">Set Password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cpassword">
                <label for="floatingPassword">Confirm Password</label>
              </div>
            </div>
            <div class="modal-footer">
              <input class="btn btn-dark" type="Submit" name="Submit" value="Add Student Record" name="submit" style="width:100%">
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