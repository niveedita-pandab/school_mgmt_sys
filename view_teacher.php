<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}

elseif($_SESSION['usertype']=='student') {
    header("location:index.php");
}

include 'partials/_dbconnect.php';

$sql = "SELECT * FROM teacher";

$result = mysqli_query($data,$sql);

$id = $_GET['user_id'];

// $sql0 = "SELECT * FROM user WHERE id = '$id' ";

// $result0 = mysqli_query($data, $sql0);

// $info0 = $result0->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Data</title>

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
                <a href="add_teacher.php">Add Teacher</a>
            </li>
            <li>
                <a href="view_teacher.php"  class="active">View Teacher</a>
            </li>
            <li>
                <a href="add_courses.php">Add Courses</a>
            </li>
        </ul>
    </aside>

    <!--MainContent-->

    <div class="content">
        <h1 class="mb-4">Teacher Data</h1>
        <div class="table_border">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile Number</th>
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
                        <?php echo "{$info['description']}" ?>
                    </td>
                    <td>
                        <?php echo "{$info['email']}" ?>
                    </td>
                    <td>
                        <?php echo "{$info['phone']}" ?>
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
    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>
</html>


                    