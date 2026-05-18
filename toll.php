<?php 
	include('config.php');
	session_start();
	if(!isset($_SESSION['uid'])){
		header("location:login.php");
	} elseif($_SESSION['usertype']=="regular") {
		header("location:regular.php");
	} elseif($_SESSION['usertype']=="em") {
		header("location:emergency.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Toll Management</title>
	<style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            background: url('pmbat.webp') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        /* Navigation Menu */
        .menu {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            position: sticky;
            top: 0;
        }

        .menu a {
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
        }

        .menu a:hover {
            color: #b3e5fc;
        }

        /* Header */
        h1 {
            text-align: center;
            font-size: 3em;
            color: #fff;
            margin-top: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Form Styling */
		    form {
		max-width: 600px;
		margin: 50px auto;
		padding: 20px;
		background-color: rgba(0, 0, 0, 0.6);
		border-radius: 10px;
		box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
		/* Add padding for input fields */
		padding: 30px; /* Increased padding */
		}

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #0288d1;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
        }

        button {
            background-color: rgba(2, 136, 209, 0.8);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        button:hover {
            background-color: rgba(2, 119, 189, 0.8);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <div class="menu">
        <a href="admin.php">Admin Home</a>
        <a href="contact.php">Contact Us</a>
        <a href="about.php">About Us</a>
    </div>

    <h1>Toll Management System</h1>
    
    <form method="POST">
        <label for="vehicle_type">Vehicle Type:</label>
        <input type="text" id="vehicle_type" name="vehicle_type" required>
        <br>
        <label for="toll_amount">Toll Amount:</label>
        <input type="number" id="toll_amount" name="toll_amount" placeholder="Add 0 for Deletion" required>
        <br>
        <button type="submit" name="action" value="add">Add Vehicle Toll</button>
        <button type="submit" name="action" value="update">Update Vehicle Toll</button>
        <button type="submit" name="action" value="delete">Delete Vehicle Toll</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {	//type, amount and action
        $vehicle_type = $_POST['vehicle_type'];
        $toll_amount = $_POST['toll_amount'];
        $action = $_POST['action'];

        if ($action == 'add') { //checking which action has been taken
            header("Location: add_toll.php?type=$vehicle_type&amount=$toll_amount");
            exit();
        } elseif ($action == 'update') {
            header("Location: update_toll.php?type=$vehicle_type&amount=$toll_amount");
            exit();
        } elseif ($action == 'delete') {
            header("Location: delete_toll.php?type=$vehicle_type");
            exit();
        }
    }
    ?>

    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved. By Sifr</p>
    </footer>
</body>
</html>

