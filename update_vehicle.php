<?php 
    include('config.php');
    session_start();
    if (!isset($_SESSION['uid'])) {
        header("location:login.php");
    } elseif ($_SESSION['usertype'] == "admin") {
        header("location:admin.php");
    }

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carid = $_POST['carid'];

    $uid = $_SESSION['uid'];  // carid existence check
    $fetch_sql = "SELECT * FROM vehicle WHERE carid='$carid' AND uid='$uid'";
    $fetch_result = mysqli_query($conn, $fetch_sql);

    if (mysqli_num_rows($fetch_result) > 0) {
        $vehicle = mysqli_fetch_assoc($fetch_result);

        $type = $_POST['type'] ?? $vehicle['type'];
        $license = $_POST['license'] ?? $vehicle['license'];
        $brand = $_POST['brand'] ?? $vehicle['brand'];
        $model = $_POST['model'] ?? $vehicle['model'];
        $year = $_POST['year'] ?? $vehicle['year'];

        $update_sql = "UPDATE vehicle SET type='$type', license='$license', brand='$brand', model='$model', year='$year' WHERE carid='$carid'";

        if (mysqli_query($conn, $update_sql)) {
            $message = "Vehicle information updated successfully!";
        } else {
            $message = "Error updating vehicle information: " . mysqli_error($conn);
        }
    } else {
        $message = "No vehicle found with Car ID '$carid' for this user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Vehicle</title>
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
            width: calc(100% - 20px); /* Leave space for padding */
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
        <a href="index.php">Home</a>
        <a href="admin.php">Portal</a>
        <a href="contact.php">Contact Us</a>
        <a href="about.php">About Us</a>
    </div>

    <h1>Update Vehicle</h1>

    <form method="POST">
        <label for="carid">Enter Car ID:</label>
        <input type="text" id="carid" name="carid" required>

        <label for="type">Vehicle Type:</label>
        <input type="text" id="type" name="type">

        <label for="license">License Number:</label>
        <input type="text" id="license" name="license">

        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand">

        <label for="model">Model:</label>
        <input type="text" id="model" name="model">

        <label for="year">Year:</label>
        <input type="text" id="year" name="year">

        <button type="submit">Update Vehicle</button>
    </form>

    <center>
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </center>

    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved.</p>
    </footer>
</body>
</html>
