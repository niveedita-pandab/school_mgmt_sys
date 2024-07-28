<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}

elseif($_SESSION['usertype']=='admin') {
    header("location:index.php");
}

include 'partials/_dbconnect.php';

$sql = "SELECT * FROM course";

$result = mysqli_query($data,$sql);

$id = $_GET['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Available Courses</title>

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
                <a href="available.php" class="active">Courses</a>
            </li>
        </ul>
    </aside>
    <div class="content">
        <h1 class="mb-4">Available Courses</h1>
        <div class="table_border">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Course Name</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Fees</th>
                    <!-- <th scope="col" style="text-align:center;">Edit</th> -->
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php

                        while($info = $result->fetch_assoc()) {

                    ?>
                    <tr>
                    <th scope="row">
                        <?php echo "{$info['name']}" ?>
                    </th>
                    <td>
                        <?php echo "{$info['course_id']}" ?>
                    </td>
                    <td>
                        <?php echo "{$info['fees']}" ?>
                    </td>
                    <!-- <td style="text-align:center;">
                        <?php echo "<a href='edit.php?student_id={$info['id']}'>
                        <i class='fa-solid fa-pen-to-square' style='color:black;'></i>
                        </a>" 
                        ?>
                    </td> -->
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>