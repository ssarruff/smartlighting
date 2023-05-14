<?php
session_start();
$message = "";

if (isset($_POST["submit"])) {
    include_once "db.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $stmt = $con->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row["password"])) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("Location: control-panel.php");
            exit();
        } else {
            $message = "Invalid username or password!";
        }
    } else {
        $message = "Invalid username or password!";
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Lighting Webpage</title>
    <link rel="stylesheet" href="css/StyleSheet1.css">
  </head>
  <body>

    <div class="container">
      <div id="login">
        <h1><center>Smart Lighting</center></h1>
        <h2><center>Login</center></h2>
        <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form name="frmUser" action="" method="POST">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required autocomplete="current-password">
          <input type="submit" name="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="registerpage.php">Sign up here.</a></p>
        <p>Are you an administrator? Log in <a href="adminloginpage.php">here.</a></p>
      </div>
    </div>
  </body>
</html>
