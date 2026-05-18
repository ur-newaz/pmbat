<?php 
	include('config.php')

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us</title>
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

        /* Hero Section */
        .hero {
            text-align: center;
            margin-top: 30px;
        }

        .hero h2 {
            font-size: 2.5em;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero a {
            text-decoration: none;
            color: #fff;
        }

        /* Service Section */
        .services {
            text-align: center;
            padding: 40px 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .services h2 {
            font-size: 2em;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }

        .service-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 20px;
        }

        .service {
            background-color: rgba(2, 136, 209, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        .service h3 {
            margin-bottom: 10px;
            font-size: 1.5em;
        }

        .service p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .cta-btn {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        .cta-btn:hover {
            background-color: rgba(0, 0, 0, 0.7);
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
    </div>

    <!-- Hero Section -->
    <main>
        <section class="hero">
            <h2>Padma Multipurpose Bridge Automated Toll System</h2>
        </section>
    </main>

    <!-- Services Section -->
    <section class="services">
        <h2>PADMA BRIDGE TOLL COLLECTION PROJECT</h2>
        <div class="service-container">
            <div class="service">
                <h3>General Information</h3>
                <p>Main Bridge Length: 6.15 km<br>Viaduct: 3.148 km (Road), 532 m (Rail)<br>Approach Road: 12 km</p>
                <br>
                <a href="http://www.padmabridge.gov.bd/general.php" target="_blank" class="cta-btn">Learn More</a>
            </div>

            <div class="service">
                <h3>Location</h3>
                <p>View location in Google Maps</p>
                <br>
                <a href="https://maps.app.goo.gl/psDJrQ5t9J3bsx6WA" target="_blank" class="cta-btn">Maps</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 PMBAT. All rights reserved. By Sifr</p>
    </footer>

</body>
</html>
