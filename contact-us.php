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
    <script src="scriptSendMessage.js"></script>
</head>
<body>
    <header>
        <h1>Smart Lighting</h1>
    </header>
    <div class="topnav">
        <a class="active" href="control-panel.php">Control Panel</a>
        <a class="active" href="about-us.php">About Us</a>
        <a class="active" href="contact-us.php">Contact Us</a>
        <a class="active" href="logout.php" style="float: center;">Logout</a>
    </div>
    <main>

        <section id="contact-us">
            <h2>Contact Us</h2>
            <form action="/Send Message" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <br>
                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea>
                <br><br>
                <input type="submit" value="Send">
              </form>              
        </section>
    </main>

    <footer>
        <p>Copyright © 2023 Smart Lighting</p>
    </footer>

</body>
</html>

