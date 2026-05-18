<?php 
    include("config.php");

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMBAT</title>
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

        /* Button Styling */
        .auth-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .auth-buttons a {
            background-color: rgba(2, 136, 209, 0.8);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 25px;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        .auth-buttons a:hover {
            background-color: rgba(2, 119, 189, 0.8);
        }

        /* Table Styling */
        table {
            width: 60%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #0288d1;
        }

        th {
            background-color: rgba(2, 136, 209, 0.8); /* Softer background for header */
            color: white;
            border-bottom: 2px solid #0288d1; /* Thicker border */
        }

        td {
            color: white;
        }

        tr:hover {
            background-color: rgba(179, 229, 252, 0.2);
        }

        /* Hover Text */
        .hover-text-login, .hover-text-signup {
            text-align: center;
            font-size: 1em;
            color: ghostwhite;
            opacity: 0; /* Start hidden */
            transition: opacity 0.3s ease; /* Transition for smoothness */
            margin-top: 45px; /* Space below buttons */
            position: absolute; /* Positioning to prevent affecting layout */
            z-index: 10; /* Ensure it appears above other elements */
        }

        .auth-buttons {
            position: relative; /* Set relative position to allow absolute positioning of hover text */
        }

        .auth-buttons a:hover + .hover-text-login  {
            opacity: 1; /* Fade in for login */
        }

        .auth-buttons a:hover + .hover-text-login + .hover-text-signup {
            opacity: 1; /* Fade in for signup when hovering over signup button */
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
        <a href="contact.php">Contact Us</a>
        <a href="about.php">About Us</a>
    </div>

    <!-- Header -->
    <h1>Padma Multipurpose Bridge</h1>
<br><br><br>
    <!-- Authentication Buttons -->
<div class="auth-buttons">
    <a href='login.php'>Login</a>
    <div class="hover-text-login">Not registered yet? Sign up now for free</div>
    <a href="register.php">Sign Up</a>
    <div class="hover-text-login">Already have an account? Login then</div>
</div>
<br><br><br>
    <!-- Toll Fare Table -->
    <div class="table-container">
        <h2 style="text-align: center; font-size: 28px; font-weight: bold; color: white;">Current Toll Fares</h2>

        <table>
            <tr>
                <th>Vehicle Type</th>
                <th>Amount (TK)</th>
            </tr>
            <?php 
                $sql = "SELECT type, amount FROM toll"; //query for toll fares based on vehicle type
                $result = $conn->query($sql); // running the query
                if ($result->num_rows > 0) { //when there is more than 0 rows
                    while ($row = $result->fetch_assoc()) { //fetching each elements of the array per iteration
                        echo "<tr><td>" . $row["type"] . "</td><td>" . $row["amount"] . "</td></tr>";
                    }
                } else { //when number of row is 0
                    echo "<tr><td colspan='2'>Fares Updating</td></tr>";
                }
            ?>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved. By Sifr</p>
    </footer>

</body>
</html>
