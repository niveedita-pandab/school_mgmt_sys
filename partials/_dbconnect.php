<?php

//Connecting to database
$host="localhost";

$user="root";

$password="";

$db="student_mgmt";

$data=mysqli_connect($host,$user,$password,$db);


if(!$data)
{
	die("Connection error");
}

?>