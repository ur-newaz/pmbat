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

// receiving type and amount from query
$vehicle_type = $_GET['type'] ?? '';
$toll_amount = $_GET['amount'] ?? '';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $check_sql = "SELECT * FROM toll WHERE type = '$vehicle_type'";
    $check_result = mysqli_query($conn, $check_sql); // if the vehicle type already exists

    if (mysqli_num_rows($check_result) > 0) {
        $message = "Vehicle type '$vehicle_type' already exists. Please update it instead.";
    } else {
        $admin_uid = $_SESSION['uid']; // admin uis from session
        $sql = "insert into toll (type, uid, amount) values ('$vehicle_type', '$admin_uid', '$toll_amount')"; //query for insertion
        
        if (mysqli_query($conn, $sql)) {
            $message = "Toll entry added successfully!";
        } else {
            $message = "Error adding toll entry: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Toll</title>
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

        h1 {
            text-align: center;
            font-size: 2.5em;
            color: #fff;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
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

        p {
            text-align: center;
        }
    </style>
</head>
<body>
	<div class="menu">
        <a href="admin.php">Admin Home</a>
        <a href="contact.php">Contact Us</a>
        <a href="about.php">About Us</a>
    </div>
    <h1>Add Toll Entry</h1>

    <form method="POST">
        <input type="hidden" name="vehicle_type" value="<?php echo htmlspecialchars($vehicle_type); ?>">
        <input type="hidden" name="toll_amount" value="<?php echo htmlspecialchars($toll_amount); ?>">
        
        <p>Vehicle Type: <strong><?php echo htmlspecialchars($vehicle_type); ?></strong></p>
        <p>Toll Amount: <strong><?php echo htmlspecialchars($toll_amount); ?></strong></p>
        
        <button type="submit">Confirm Add Toll</button>
    </form>

    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved.</p>
    </footer>
</body>
</html>
