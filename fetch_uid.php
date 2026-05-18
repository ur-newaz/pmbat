<?php 
    include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Creation Success</title>
    <?php 
 		header('Refresh: 30; URL=index.php');
 	 ?>
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
            font-size: 2.5em;
            color: #fff;
            margin-top: 50px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* UID Announcement */
        .uid-announcement {
            text-align: center;
            font-size: 2em;
            color: #fff;
            background-color: rgba(2, 136, 209, 0.8); /* Soft blue background */
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            width: 80%; /* Responsive width */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
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

    <!-- Navigation Menu -->
    <div class="menu">
        <a href="index.php">Home</a>
        <a href="contact.php">Contact Us</a>
        <a href="about.php">About Us</a>
    </div>

    <!-- Header -->
    <h1>Account creation successful. UID will be announced now. Please note it down for future usage.</h1>

    <?php 
        $sql = "select MAX(uid) AS latest_uid from user;"; // query for latest UID
        $result = mysqli_query($conn, $sql); // running the query on the db
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); // get the row with latest uid
            $latest_uid = $row['latest_uid']; // access the 'latest_uid' value

            echo "<div class='uid-announcement'>Your UID is <strong>$latest_uid</strong>. Redirecting in 30 seconds.</div>";
        } else {
            echo "<div class='uid-announcement'>Error fetching UID.</div>";
        }
    ?>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved. By Sifr</p>
    </footer>

</body>
</html>
