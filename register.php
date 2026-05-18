<?php 
	include('config.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
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

        /* Container */
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            color: #fff;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #0288d1;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
        }

        input[type="submit"] {
            background-color: rgba(2, 136, 209, 0.8);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
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

    <!-- Navigation Menu -->
    <div class="menu">
        <a href="index.php">Home</a>
        <a href="contact.php">Contact Us</a>
        <a href="about.php">About Us</a>
    </div>

    <div class="container">
        <h1>Sign Up</h1>
<?php 
			error_reporting(0);
            session_start();
            echo $_SESSION['signupMessage'];
 ?>
        <form method="POST" action="signup_check.php">
            <label>NID</label>
            <input type="text" name="nid" required>

            <label>Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Date of Birth</label>
            <input type="date" name="dob" required>

            <label>House Number</label>
            <input type="text" name="house" required>

            <label>Road Number</label>
            <input type="text" name="road" required>

            <label>Zip Code</label>
            <input type="text" name="zip" required>

            <label>District</label>
            <input type="text" name="district" required>

            <input type="submit" name="submit" value="Sign Up">
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved. By Sifr</p>
    </footer>

</body>
</html>

