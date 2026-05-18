<?php 
	include("config.php");
	error_reporting(0);
	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$nid = $_POST['nid'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass= $_POST['password'];
		$dob = $_POST['dob'];
		$house = $_POST['house'];
		$road  = $_POST['road'];
		$zip = $_POST['zip'];
		$district = $_POST['district'];


		$sql ="insert into user(nid, name, email, password, dob, house,road,zip, district) values('$nid', '$name', '$email', '$pass', '$dob', '$house', '$road', '$zip', '$district')"; //query to insert all infos

		$result= mysqli_query($conn,$sql); //inserting all infos


		if($result){
			header("location:fetch_uid.php");	//if insertion successful
		}
		else
		{	
			$message= "Error! Please try again later";	
			$_SESSION['signupMessage']= $message;
			header("location:register.php");
		}
	}
 ?>


