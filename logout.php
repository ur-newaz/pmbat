<?php 
	include('config.php');

	session_start();					//starting session
	session_destroy();				//destroys all data used with the current session

	header("location:index.php");	//heads to homepage after logging out
?>