<?php 

	//connection to database

	$conn = mysqli_connect('localhost', 'user', '12345', 'padma');//(hostname, username, pass, db name)

	//verify connection
	if(!$conn){
		echo 'Connection error: ' . mysqli_connect_error();
	}
 ?>