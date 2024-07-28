<?php 

error_reporting(0);
session_start();

//Connecting to database
$host="localhost";

$user="root";

$password="";

$db="student_mgmt";


$data=mysqli_connect($host,$user,$password,$db);


if($data===false)
{
	die("Connection error");
}
		
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$errorMessage = false;

		$name = $_POST['username'];

		$pass = $_POST['password'];


		$sql="select * from user where username='".$name."' AND password='".$pass."'  ";

		$result=mysqli_query($data,$sql);

		$row=mysqli_fetch_array($result);				//fetching input credentials


		//Matching credentials with database
		if($row["usertype"]=="student")					//for student login
		{

			$_SESSION['username']=$name;

			$_SESSION['usertype']="student";

			header("location:student_home.php");
		}

		elseif($row["usertype"]=="admin")				//for admin login
		{	
			$_SESSION['username']=$name;

			$_SESSION['usertype']="admin";

			header("location:admin_home.php");
		}
		
		else											//incase of incorrect username and/or password
		{
			$errorMessage = true;
			header("location:index.php");
		}
	}
?>