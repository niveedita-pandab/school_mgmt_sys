<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}

elseif($_SESSION['usertype']=='student') {
    header("location:index.php");
}

include 'partials/_dbconnect.php';

$sql = "SELECT * FROM user WHERE username <> 'admin' AND username <> 'student' ";

$result = mysqli_query($data,$sql);

include 'delete.php';

$id = $_GET['user_id'];

$sql0 = "SELECT * FROM user WHERE id = '$id' ";

$result0 = mysqli_query($data, $sql0);

$info0 = $result0->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Data</title>

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
                <a href="delete_data.php" class="active">Delete Data</a>
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
        <h1 class="mb-4">Student Data</h1>
        <?php 
            if($showAlert) {
                echo '<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <strong>Success!</strong> Student record deleted successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>
        <div class="table_border">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile No.</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col" style="text-align:center;">Delete</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php

                        while($info = $result->fetch_assoc()) {

                    ?>
                    <tr>
                    <th scope="row">
                        <?php echo "{$info['username']}" ?>
                    </th>
                    <td>
                        <?php echo "{$info['phone']}" ?>
                    </td>
                    <td>
                        <?php echo "{$info['email']}" ?>
                    </td>
                    <td>
                        <?php echo "{$info['password']}" ?>
                    </td>
                    <td style="text-align:center;">
                        <?php 
                        echo "<a onClick=\" javascript:return confirm('Are you sure to delete this record?'); \" href='update_data.php?student_id={$info['id']}'>
                        <i class='fa-solid fa-trash' style='color:#FF2100;'></i>
                        </a>";
                        ?>
                    </td>
                    
                    </tr>
                    <?php
                        }
                    ?>
                    
                </div>
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