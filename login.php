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
  <?php 
    session_start();
    // Check if the user is already logged in, if yes then redirect him to welcome page   
    if (isset($_SESSION["id"])) {
      //header("location: shop.php");
      console.log($_SESSION["id"]);
      header("location: http://webtest.infinityfreeapp.com/shop.php");
      echo "Already Logged In!";
      exit;
    }
  ?>

  <div class="login">
    <div class="inner_login_container">
      <div id="loginMessage">
          <p id="title">Welcome <br> Back</p>
          <p id="message">Log back in to your Account and start making your fashion statement today! Connect with us through  our Facebook, Twitter, or Instagram and show us <b>your</b> style!</p>
      </div>

      <form action="db-connection/session.php" method="POST" class="form">
        <p id="title">Login</p>
        <img class="icon" src="resources/login.png" alt="icon">
        <input type="text" name="username" placeholder="Enter username" required>
        <input type="password" name="password" placeholder="Enter password" required>
        <button type="submit" name="submit">Submit</button>
        <p>Don't have an account? <span><a href="http://webtest.infinityfreeapp.com/signup.php">Sign Up!</a></span></p>
      </form>
    </div>
      
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