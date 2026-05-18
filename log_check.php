<?php 
	include('config.php');

	error_reporting(0);
	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$uid = $_POST['uid'];
		$pass= $_POST['password'];

		$sql ="select * from user where uid= '".$uid."' AND password= '".$pass."' "; //query for everything based on uid and pass on User table

		$result= mysqli_query($conn,$sql); // running the query on the db

		$row =mysqli_fetch_array($result); // row result as array

		if($row){
			if($row["usertype"]=="admin")
			{
				$_SESSION['uid']=$uid;
				$_SESSION['usertype']="admin";
				header("location:admin.php");
			}
			elseif($row["usertype"]=="em")
			{
				$_SESSION['uid']=$uid;
				$_SESSION['usertype']="em";
				header("location:emergency.php");
			}
			elseif($row["usertype"]=="reg")
			{
				$_SESSION['uid']=$uid;
				$_SESSION['usertype']="regular";
				header("location:regular.php");
			}
		}
		else
		{	

			$message= "Username or Password do not match";
		
			$_SESSION['loginMessage']= $message;
			
			header("location:login.php");
		}
	}
	
 ?>

