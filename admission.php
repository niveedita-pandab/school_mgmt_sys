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
  <title>Student Data</title>

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
                <a href="admission.php" class="active">Student Data</a>
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
        <div class="table_border">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile No.</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col" style="text-align:center;">Edit</th>
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
                        <?php echo "<a href='edit.php?student_id={$info['id']}'>
                        <i class='fa-solid fa-pen-to-square' style='color:black;'></i>
                        </a>" 
                        ?>
                    </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="susername" 
                                    value="<?php echo "{$info0['username']}"; ?>">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="example@mail.com" name="email">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Mobile Number" name="phone">
                                <label for="floatingInput">Mobile Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="spassword">
                                <label for="floatingPassword">New Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cpassword">
                                <label for="floatingPassword">Confirm Password</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-dark" type="Submit" name="Submit" value="Update" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>
</html>


                    