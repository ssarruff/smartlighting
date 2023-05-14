<?php                                                      
// Database connection details
$host = "localhost"; // host name
$username = "root"; // MySQL user name
$password = ""; //  MySQL password
$dbname = "ssarruff"; // database name

// Establishing database connection
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Getting form input values
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  // Hashing the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Inserting new user into database
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
  if (mysqli_query($conn, $sql)) {
    // Redirecting to login page
    header("Location: index.php");
    exit();
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

// Closing database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Lighting Webpage</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/StyleSheet1.css">
  </head>
  <body>

    <div class="container">
      <div id="register">
        <h1><center>Smart Lighting</center></h1>
        <h2><center>Registration</center></h2>
        <form action="#" method="POST">
          <label for="username" id="username">Username:</label>
          <input type="text" id="username" name="username" required>
          <label for="email" id="email">Email:</label>
          <input type="email" id="email" name="email" required>
          <label for="password" id="password">Password:</label>
          <input type="password" id="password" name="password"  required>
          <label for="confirm_password" id="confirm_password">Confirm Password:</label>
          <input type="password" id="password" name="password" required autocomplete="current-password">

          <input type="hidden" id="user-redirect-url" name="user-redirect-url2" value="index.php">
          <input type="submit" name="submit" value="Register">
        </form>
        <p>Already have an account? <a href="index.php" onclick="switchForms()">Login here.</a></p>
      </div>   

      <script scr="js.js"></script>
</body>
</html>
