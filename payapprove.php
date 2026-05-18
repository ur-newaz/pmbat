<?php 
	include('config.php');
	session_start();
		if(!isset($_SESSION['uid'])){
			header("location:login.php");
		}
		elseif($_SESSION['usertype']=="regular"){
			header("location:regular.php");
		}
		elseif($_SESSION['usertype']=="em"){
			header("location:emergency.php");
		}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Approve Payment</title>
 </head>
 <body>
 	<h1>Working</h1>
 </body>
 </html>