<?php
session_start();
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
  <link rel="stylesheet" href="css/signup.css">

</head>

<body>
  <?php include 'header.php';?>

  <div class="login">
      <form action="db-connection/users.php" method="POST" class="form">
        <p id="title">Sign Up</p>
        <img class="icon" src="resources/login.png" alt="icon">
        <input type="text" name="username" placeholder="Enter username" required>
        <input type="text" name="mail" placeholder="Enter email" required>
        <input type="password" name="password" placeholder="Enter password" required>
        <button type="submit" name="submit">Submit</button>
        <p>Already have an account? <span><a href="http://webtest.infinityfreeapp.com/login.php">Login Here!</a>
        </span></p>
      </form>

      <p class="social_media_block_title">Join our Social Media!</p>

      <div class="social_media_block">
        <a class="fa fa-twitter"></a>
        <a class="fa fa-facebook"></a>
        <a class="fa fa-instagram"></a>
      </div>
  </div>

  <?php include 'footer.php';?>
  <script src="js/shop.js"></script>
</body>
</html>