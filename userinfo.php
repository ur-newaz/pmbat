<?php 
include('config.php');
session_start();

// User checking
if (!isset($_SESSION['uid'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] != "admin") {
    header("location:login.php");
}

$user_info = [];
$vehicles = [];
$loan_info = [];
$total_loan = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_POST['uid'];

    // Fetch user information
    $user_sql = "SELECT * FROM user WHERE uid='$uid'";
    $user_result = mysqli_query($conn, $user_sql);
    if (mysqli_num_rows($user_result) > 0) {
        $user_info = mysqli_fetch_assoc($user_result);

        // Fetch vehicle information
        $vehicle_sql = "SELECT * FROM vehicle WHERE uid='$uid'";
        $vehicle_result = mysqli_query($conn, $vehicle_sql);
        if (mysqli_num_rows($vehicle_result) > 0) {
            while ($row = mysqli_fetch_assoc($vehicle_result)) {
                $vehicles[] = $row;
            }
        }

        // Fetch loan information
        $loan_sql = "SELECT * FROM loan WHERE uid='$uid'";
        $loan_result = mysqli_query($conn, $loan_sql);
        if (mysqli_num_rows($loan_result) > 0) {
            while ($row = mysqli_fetch_assoc($loan_result)) {
                $loan_info[] = $row;
                $total_loan += $row['amount']; // Sum total loan amount
            }
        }
    } else {
        echo "<script>alert('No user found with the provided UID');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin User Info</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('pmbat.webp') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        /* Container for form and info */
        .info-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #fff;
        }

        h2 {
            color: #fff;
            text-align: center;
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

    <div class="info-container">
        <h2>Enter User ID</h2>
        <form method="POST" action="">
            <input type="text" name="uid" placeholder="Enter User ID" required>
            <input type="submit" value="Search User">
        </form>
    </div>

    <?php if (!empty($user_info)): ?>
    <div class="info-container">
        <h2>User Information</h2>
        <p>Name: <?php echo $user_info['name']; ?></p>
        <p>Email: <?php echo $user_info['email']; ?></p>
        <p>Date of Birth: <?php echo $user_info['dob']; ?></p>
        <p>Address: <?php echo $user_info['house'] . ', ' . $user_info['road'] . ', ' . $user_info['district'] . '-' . $user_info['zip']; ?></p>
        <p>Tokens: <?php echo $user_info['token']; ?></p>
        <p>Credit: <?php echo $user_info['credit']; ?></p>
        <p>User Type: <?php echo $user_info['usertype']; ?> [em= Emergency | reg= Regular]</p>
    </div>

    <div class="info-container">
        <h2>Vehicles</h2>
        <table>
            <tr>
                <th>Car ID</th>
                <th>Type</th>
                <th>License</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
            </tr>
            <?php if (empty($vehicles)): ?>
                <tr>
                    <td colspan="6">No vehicles found.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($vehicles as $vehicle): ?>
                    <tr>
                        <td><?php echo $vehicle['carid']; ?></td>
                        <td><?php echo $vehicle['type']; ?></td>
                        <td><?php echo $vehicle['license']; ?></td>
                        <td><?php echo $vehicle['brand']; ?></td>
                        <td><?php echo $vehicle['model']; ?></td>
                        <td><?php echo $vehicle['year']; ?></td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>

    <div class="info-container">
        <h2>Loan Status</h2>
        <table>
            <tr>
                <th>Loan ID</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
            <?php if (empty($loan_info)): ?>
                <tr>
                    <td colspan="3">No loans found.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($loan_info as $loan): ?>
                    <tr>
                        <td><?php echo $loan['loanid']; ?></td>
                        <td><?php echo $loan['amount']; ?></td>
                        <td><?php echo $loan['time']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <p>Total Loan Amount: <?php echo $total_loan; ?></p>
    </div>
    <?php endif; ?>

    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved.</p>
    </footer>

</body>
</html>
