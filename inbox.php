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

$messageList = [];

$inbox_sql = "select * from contact order by complainid DESC"; //all messages last to first
$result = mysqli_query($conn, $inbox_sql); //doing the query

if ($result) {	
    while ($row = mysqli_fetch_assoc($result)) {
        $messageList[] = $row; 
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read_id'])) { //if marked as read
    $read_id = $_POST['read_id'];
    $update_sql = "update contact set status = 'read' where complainid = '$read_id'";

    if (mysqli_query($conn, $update_sql)) {
        header("Location:inbox.php"); // needs refresh sometimes
        exit();
    } else {
        $error_message = "Error updating message status: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inbox</title>
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

        .message-box {
		    background: rgba(0, 0, 0, 0.7);
		    padding: 15px;
		    margin: 10px auto;
		    border-radius: 8px;
		    max-width: 600px;
		    word-wrap: break-word; /* Ensures long words wrap */
		    overflow-wrap: break-word; /* Ensures overflow handling for long words */
		    white-space: pre-wrap; /* Allows text wrapping while preserving whitespace */
		}

        button {
            background-color: rgba(2, 136, 209, 0.8);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 10px;
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

    <h1>Inbox</h1>

    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <?php foreach ($messageList as $message): ?> <!--loop print-->
        <div class="message-box">
            <p><strong>Complain ID:</strong> <?php echo htmlspecialchars($message['complainid']); ?></p>
            <p><strong>Status:</strong> <?php echo htmlspecialchars($message['status']); ?></p>
            <p><strong>Message:</strong> <?php echo htmlspecialchars($message['message']); ?></p>
            <?php if ($message['status'] == 'unread'): ?>
                <form method="POST">
                    <input type="hidden" name="read_id" value="<?php echo $message['complainid']; ?>">
                    <button type="submit">Mark as Read</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved.</p>
    </footer>
</body>
</html>
