<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}

elseif($_SESSION['usertype']=='student') {
    header("location:index.php");
}

include 'partials/_dbconnect.php';

if(isset($_POST['addTeacher'])) {
    $showAlert = false;
    $showError = false;

    $tname = $_POST['name'];
    $tdesc = $_POST['description'];
    $temail = $_POST['temail'];
    $tphone = $_POST['tphone'];
    $timg = $_FILES['image']['name'];

    $dst = "./teacher_img/".$timg;
    $dst_db = "teacher_img/".$timg;

    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    $sql = "INSERT INTO teacher (name, description, email, phone) VALUES ('$tname', '$tdesc', '$temail', '$tphone')";
    $result = mysqli_query($data, $sql);

    if($result) {
        $showAlert = true;
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
  <title>Add Teacher</title>

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
                <a href="add_student.php">Add Student</a>
            </li>
            <li>
                <a href="delete_data.php">Delete Data</a>
            </li>
            <li>
                <a href="add_teacher.php"  class="active">Add Teacher</a>
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
      <h1 class="mb-4">Add Teacher</h1>
        <?php 
            if($showAlert) {
                echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                    <strong>Success!</strong> Teacher record added in the database.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            // if($existError) {
            //     echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            //         <strong>Error!</strong> Username already exists.
            //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //       </div>';
            // }
            if($showError) {
                echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                    <strong>Error!</strong> Something went wrong. Try Again!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>
        
        <div class="form" style="width:100%; padding:20px">
          <form action="#" method="POST">
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name">
                <label for="floatingInput">Teacher's Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Description" name="description">
                <label for="floatingInput">Subject</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="example@mail.com" name="temail">
                <label for="floatingInput">Teacher's Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Mobile Number" name="tphone">
                <label for="floatingInput">Teacher's Mobile Number</label>
              </div>
              <!-- <div class="form-floating mb-3">
                <input type="file" class="form-control" id="floatingInput" placeholder="Image" name="image">
                <label for="floatingInput">Image</label>
              </div> -->
            </div>
            <div class="modal-footer">
              <input class="btn btn-dark" type="Submit" value="Add Teacher Record" name="addTeacher" style="width:100%">
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