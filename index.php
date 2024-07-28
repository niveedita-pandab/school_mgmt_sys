<?php
  include 'data_check.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management Portal</title>

  <?php
    include 'partials/index_css.php';
  ?>
</head>

<body>

<?php 
  if($showAlert) {
      echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <strong>Success!</strong> You can now login with your credentials.
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

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg sticky-top bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="fa-solid fa-school"></i> &nbsp;KNS Technologies</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admission
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">B.Tech</a></li>
              <li><a class="dropdown-item" href="#">M.Tech</a></li>
              <li><a class="dropdown-item" href="#">Int. M.Sc & Dual degrees</a></li>
              <li><a class="dropdown-item" href="#">B.Arch</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
        <!--Sign Up Modal-->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Sign Up!
        </button>
        <!--/Sign Up-->
      </div>
    </div>
  </nav>
  <!--/Navbar-->

  <!--Modal--> 
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Up!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="index.php" method="POST">
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="susername">
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
              <label for="floatingPassword">Set Password</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cpassword">
              <label for="floatingPassword">Confirm Password</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input class="btn btn-dark" type="Submit" name="Submit" value="Submit" name="submit">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--/Modal -->

  <!--Login Content-->
  <div class="login">
    <div class="container-fluid">
      <div class="row">
        <!--Left Stuff-->
        <div class="col-lg-6 left-content">
          <h1>Student Management Portal</h1>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore at accusantium neque facere, sed
            libero, nihil eaque eveniet error, mollitia tempora. Quo eveniet voluptatem, asperiores repellendus tempore
            non ex quibusdam!</p>
        </div>
        <!--/Left Stuff-->

        <!--Login Card-->
        <div class="col-lg-6 right-content">
          <div class="card text-center">
            <div class="card-header">
              Login
            </div>
            <?php
            if($errorMessage) {
              echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <strong>Error!</strong> Username and password do not match.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            ?>
            <!--Card Body-->
            <div class="card-body">
                <form action="login_check.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="username">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <input class="btn btn-dark mb-3" id="login-btn" type="Submit" name="login" value="Login">
                </form>
                    <!--Login Footer-->
                    <p>New here? <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Sign Up
                        </button>
                        now!</p>
                    <!--/Login Footer-->
            </div>
            <!--/Card Body-->
          </div>
        </div>
        <!--/Login Card-->
      </div>
    </div>
  </div>
  <!--/Login Content-->

  <!--Footer-->
  <footer class="footer-txt">
    <h6>All copyright reserved by KNS Technologies</h3>
  </footer>
  <!--/Footer-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>

</html>