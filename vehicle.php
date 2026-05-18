<?php 
    include('config.php');
    session_start();
    if (!isset($_SESSION['uid'])) {
        header("location:login.php");
    }
    elseif ($_SESSION['usertype'] == "admin") {
        header("location:admin.php");
    }
    $message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_SESSION['uid'];
    $type = $_POST['type'];
    $license = $_POST['license'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];

    $sql = "INSERT INTO vehicle (uid, type, license, brand, model, year) VALUES ('$uid', '$type', '$license', '$brand', '$model', '$year')";
    
    if (mysqli_query($conn, $sql)) {
        $message = "Vehicle added successfully!";
    } else {
        $message = "Error adding vehicle: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Vehicle</title>
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
            padding: 20px; /* Padding added for space inside the form */
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px; /* Padding inside input boxes */
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures padding does not affect width */
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

    <h1>Add Vehicle</h1>

    <form method="POST">
        <label for="type">Vehicle Type:</label>
        <input type="text" id="type" name="type" placeholder="Ensure Allowed Types from Toll Station" required>
        
        <label for="license">License Number:</label>
        <input type="text" id="license" name="license" required>
        
        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required>
        
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required>
        
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" required>
        
        <button type="submit">Add Vehicle</button>
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
