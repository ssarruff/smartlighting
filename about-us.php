<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: loginpage.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Lighting Webpage</title>
    <link rel="stylesheet" href="css/StyleSheet2.css">
</head>
<body>
    <header>
        <h1>Smart Lighting</h1>
    </header>
    <div class="topnav">
        <div class="topnav">
        <a class="active" href="control-panel.php">Control Panel</a>
        <a class="active" href="about-us.php">About Us</a>
        <a class="active" href="contact-us.php">Contact Us</a>
        <a class="active" href="logout.php" style="float: center;">Logout</a>
    </div>
    </div>
    <main>

        <form class="form-inner">
            <section id="about-us">
                <h2>About Us</h2>
                <p>We are a company that specializes in smart lighting solutions for homes and businesses. Our goal is to provide our customers with energy-efficient and easy-to-use lighting systems, including dimming lighting, movement sensors, and color customization options through our cloud services.</p>
            </section>
        </form>
    </main>
    <footer>
        <p>Copyright © 2023 Smart Lighting</p>
    </footer>
</body>
</html>