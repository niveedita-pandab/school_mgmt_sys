<?php

//Connecting to database
include 'partials/_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $showAlert = false;
    $showError = false;
    $existError = false;
    
    $data_name = $_POST["susername"];
    $data_email = $_POST["email"];
    $data_phone = $_POST["phone"];
    $data_password = $_POST["spassword"];
    $cpassword = $_POST["cpassword"];

    $exists = false;

    $check = "SELECT * FROM user WHERE username = '$data_name' ";
    $check_user = mysqli_query($data,$check);
    $row_count = mysqli_num_rows($check_user);

    if($row_count > 0){
      $exists = true;
    }
    else{
      $exists = false;
    }

    if(($data_password == $cpassword) && $exists==false) {

      $sql1="INSERT INTO user(username, phone, email, usertype, password) VALUES('$data_name','$data_phone','$data_email','student','$data_password')";

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