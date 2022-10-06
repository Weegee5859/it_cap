<?php 

$serverName = "aws-project.cu4q9u3qbdkh.us-east-1.rds.amazonaws.com";
$dbUserName = "admin";
$dbPassword = "Admin10_";
$dbName = "Projectdb";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
  die("Connection Failed: " . mysqli_connect_error());
}else{
  echo "Connected!";
}


?>



<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Shopping Page</title>
  <meta name="description" content="A simple HTML5 Template for new projects.">
  <meta property="og:title" content="A Basic HTML5 Template">

  <link rel="stylesheet" href="css/default.css">
  <link rel="stylesheet" href="css/loginstyle.css">

</head>

<body>
  <?php include 'header.php';?>

  <div class="login">
      <form action="#" method="post" class="form">
        <img class="icon" src="resources/login.png" alt="icon">
        <input type="text" name="username" placeholder="Enter username">
        <input type="password" name="password" placeholder="Enter password">
        <button type="submit" name="submit">submit</button>
        <p>Don't have an account? <span><a href="#">Sign Up</a></span></p>
      </form>
  </div>

  <?php include 'footer.php';?>
  <script src="js/shop.js"></script>
</body>
</html>