<?php 
include('config.php');

session_start();
if (!isset($_SESSION['uid'])) {
    header("location:login.php");
    exit();
} elseif ($_SESSION['usertype'] == "regular") {
    header("location:regular.php");
    exit();
} elseif ($_SESSION['usertype'] == "em") {
    header("location:emergency.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Portal</title>
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
            margin: 0 10px;
        }

        .menu a:hover {
            color: #b3e5fc;
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            color: #fff;
            margin: 20px 0;
        }

        .link-container {
            text-align: center;
            margin-top: 50px;
        }

        a.button {
            display: inline-block;
            background-color: rgba(2, 136, 209, 0.8);
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1.2em;
            margin: 10px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: rgba(2, 119, 189, 0.8);
        }

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
        <a href="contact.php">Contact Us</a>
        <a href="about.php">About Us</a>
    </div>

    <h1>Admin Home</h1>

    <div class="link-container">
        <a class="button" href="userinfo.php">User Information</a>
        <a class="button" href="payapprove.php">Payment Approval</a>
        <a class="button" href="toll.php">Toll Management</a>
        <a class="button" href="setemergency.php">Change User Type</a>
        <a class="button" href="inbox.php">Inbox</a>
        <a class="button" href="tollcam.php">Access Toll Camera</a>
        <br><br><br><br><br>
        <a class="button" href="logout.php">Logout</a>
    </div>

    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved.</p>
    </footer>
</body>
</html>
