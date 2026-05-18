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
    exit();
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_POST['uid'];
    $usertype = $_POST['usertype'];
    $check_sql = "select * from user where uid = '$uid'"; //checking existence of UID
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $usertype = ($usertype == 'Admin') ? 'admin' : 'em';
        $update_sql = "update user set usertype = '$usertype' where uid = '$uid'";

        if (mysqli_query($conn, $update_sql)) {
            $message = "Usertype updated successfully!";
        } else {
            $message = "Error updating usertype: " . mysqli_error($conn);
        }
    } else {
        $message = "UID '$uid' does not exist.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Usertype</title>
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

        form {
            max-width: 400px;
            margin: 0 auto;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
        }

        button {
            background-color: rgba(2, 136, 209, 0.8);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            width: 100%;
        }

        button:hover {
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
        <a href="admin.php">Admin Home</a>
        <a href="contact.php">Contact Us</a>
        <a href="about.php">About Us</a>
    </div>

    <h1>Update Usertype</h1>

    <form method="POST">
        <label for="uid">Enter UID:</label>
        <input type="text" id="uid" name="uid" required>
        
        <label for="usertype">Select Usertype:</label>
        <select id="usertype" name="usertype">
            <option value="Admin">Admin</option>
            <option value="Emergency">Emergency</option>
        </select>
        
        <button type="submit">Update Usertype</button>
    </form>
<center>
    <?php if ($message): ?>
        <p style="color: #ffffff; font-size: 1.5em; font-weight: bold;"><?php echo $message; ?></p>
    <?php endif; ?>
</center>
    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved.</p>
    </footer>
</body>
</html>
