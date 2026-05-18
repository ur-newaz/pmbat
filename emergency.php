<?php 
	include("config.php");
	session_start();
	if (!isset($_SESSION['uid'])) {
	    header("location:login.php");
	} elseif ($_SESSION['usertype'] == "regular") {
	    header("location:regular.php");
	} elseif ($_SESSION['usertype'] == "admin") {
	    header("location:admin.php");
	}
	$uid = $_SESSION['uid'];
	$vehicles = [];
	$sql = "select * from vehicle where uid = '$uid'";
	$result = mysqli_query($conn, $sql);

	if ($result) {
	    while ($row = mysqli_fetch_assoc($result)) {
	        $vehicles[] = $row; // Store vehicle data in an array
	    }
	}

	$message = '';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    if (isset($_POST['delete'])) {
	        $carid = $_POST['carid'];
	        // Delete vehicle
	        $delete_sql = "delete from vehicle where carid = '$carid' AND uid = '$uid'";
	        if (mysqli_query($conn, $delete_sql)) {
	            $message = "Vehicle deleted successfully!";
	        } else {
	            $message = "Error deleting vehicle: " . mysqli_error($conn);
	        }
	    }
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Emergency Vehicle Portal</title>
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

        .button {
            display: inline-block;
            max-width: 200px;
            margin: 20px auto;
            padding: 15px;
            background-color: rgba(2, 136, 209, 0.8);
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 1.5em;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: rgba(2, 119, 189, 0.8);
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
        }

        .vehicle-table-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 8px;
            max-width: 90%;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid white;
            text-align: center;
        }

        th, td {
            padding: 15px;
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
        /* Car ID Input */
		carid {
		    padding: 10px;
		    margin-bottom: 20px;
		    border: none;
		    border-radius: 4px;
		    width: calc(100% - 20px); /* Subtracting padding for full width */
		    box-sizing: border-box; /* Ensures padding is included in width calculation */
		}

    </style>
</head>
<body>
    <div class="menu">
    	<a href="index.php">Home</a>
    	<a href="contact.php">Contact Us</a>
    	<a href="about.php">About Us</a>
        <a href="logout.php">Logout</a>
    </div>

    <h1>Emergency Vehicle Portal</h1>

    <div class="actions" style="text-align: center;">
        <a href="vehicle.php" class="button">Add Vehicle</a>
        <form method="POST" style="display: inline-block; margin-top: 20px;">
            <div style="carid">
            <input type="text" name="carid" placeholder="Enter Car ID" required>
        	</div>
            <button type="submit" name="delete" class="button">Delete Vehicle</button>
            <a href="update_vehicle.php" class="button" onclick="document.getElementById('carid').value = this.previousElementSibling.value;">Update Vehicle</a>
        </form>
    </div>

    <?php if ($message): ?>
        <p style="text-align:center; color:yellow;"><?php echo $message; ?></p>
    <?php endif; ?>

    <h2 style="text-align:center;">Your Vehicles</h2>
    <div class="vehicle-table-container">
        <table>
            <thead>
                <tr>
                    <th>Car ID</th>
                    <th>Car Type</th>
                    <th>License Number</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($vehicles) > 0): ?>
                    <?php foreach ($vehicles as $vehicle): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($vehicle['carid']); ?></td>
                            <td><?php echo htmlspecialchars($vehicle['type']); ?></td>
                            <td><?php echo htmlspecialchars($vehicle['license']); ?></td>
                            <td><?php echo htmlspecialchars($vehicle['brand']); ?></td>
                            <td><?php echo htmlspecialchars($vehicle['model']); ?></td>
                            <td><?php echo htmlspecialchars($vehicle['year']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No vehicles found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved.</p>
    </footer>
</body>
</html>
