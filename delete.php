<?php

if($_GET['student_id']) {
    $showAlert = false;
    $user_id = $_GET['student_id'];

    $sql1 = "DELETE FROM user WHERE id = '$user_id' ";

    $result1 = mysqli_query($data,$sql1);

    if($result1) {
        $showAlert = true;
    }
}

?>