<?php

$serverName = "sql110.epizy.com";
$dbUser = "epiz_32739619";
$dbpass = "YAs4V9ZkSn";
$dbName = "epiz_32739619_itcapstoneproject";

$conn = mysqli_connect($serverName,$dbUser,$dbpass,$dbName);

if(!$conn){
  die ("Connection failed". mysqli_connect_error());
}else{
  echo "connection good";
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

  <link rel="stylesheet" href="default.css">
  <link rel="stylesheet" href="loginstyle.css">

</head>

<body>
  <?php include 'header.php';?>

  <div class="login">
      <form action="#" method="PUT" class="form">
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