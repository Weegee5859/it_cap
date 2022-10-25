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
    <div id="loginMessage">
        <p id="title">Welcome <br> Back</p>
        <p id="message">Log back in to your XYZ Account and start making your fashion statement today! Connect with us through  our Facebook, Twitter, or Instagram and show us <b>your</b> style!</p>
      </div>

      <form action="db-connection/users.php" method="POST" class="form">
        <p id="title">Sign Up</p>
        <img class="icon" src="resources/login.png" alt="icon">
        <input type="text" name="username" placeholder="Enter username" required>
        <input type="text" name="mail" placeholder="Enter email" required>
        <input type="password" name="password" placeholder="Enter password" required>
        <button type="submit" name="submit">Submit</button>
      </form>
  </div>

  <?php include 'footer.php';?>
  <script src="js/shop.js"></script>
</body>
</html>