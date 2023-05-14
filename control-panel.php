<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Lighting Webpage</title>
    <link rel="stylesheet" href="css/StyleSheet2.css">
    <script src="app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.1.0/paho-mqtt.min.js" integrity="sha512-Xcbu3lVb3JnWp9D90fl3q3bF5a5LZa5OrP/BzRYDDx/r0fDhK8WMTUTe+mn+w1h/2lmDfhZ8WbE/67vIMhMPxg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
        <section id="control-panel">
            <h2>Control Panel</h2>
            <p>Use the form below to control your smart lighting system:</p> 
                    <form action="javascript:void(0);" method="post" id="my-form">
                        <label for="brightness-level">Brightness Level:</label>
                        <input type="range" id="brightness-level" name="brightness-level" min="0" max="100" value="50">
                        <br>                
                        <label for="proximity-sensor">Proximity Sensor:</label>
                        <input type="checkbox" id="proximity-sensor" name="proximity-sensor">
                        <br>
                        <label for="gesture">Gesture:</label>
                        <select id="gesture" name="gesture">
                            <option value="swipe-up">Swipe Up</option>
                            <option value="swipe-down">Swipe Down</option>
                            <option value="swipe-left">Swipe Left</option>
                            <option value="swipe-right">Swipe Right</option>
                        </select>
                        <br><br>
                        <input type="submit" value="Apply">
                    </form>   
        </section>
    </main>
    <footer>
        <p>Copyright © 2023 Smart Lighting</p>
    </footer>
</body>
</html>
