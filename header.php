<?php
include('connection.php');

session_start();

?>
</html><!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Shopping Page</title>
  <meta name="description" content="A simple HTML5 Template for new projects.">
  <meta property="og:title" content="A Basic HTML5 Template">

  <link rel="stylesheet" href="css/default.css">
  <link rel="stylesheet" href="css/header.css">

  <script src="https://kit.fontawesome.com/b447306033.js" crossorigin="anonymous"></script>

</head>

<body>
  <div class="header">
    <a class="label" href="http://webtest.infinityfreeapp.com/shop.php">Home</a>
    <div class="iconContainer">
      
      <?php 
          if (isset($_SESSION["id"])) {
            $sql = " SELECT customerName FROM customers WHERE userid = '$id' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            echo "<p>Welcome back, ".$_SESSION["id"]."!</p>";
            echo '<a id="logout" class="fa fa-arrow-right" href="db-connection/logout.php"></a>';
            //exit;
          }
      ?>
      

      <a href="http://webtest.infinityfreeapp.com/login.php"><img class="login-icon" src="resources/login.png" alt="logo-icon" width="30px" height="30px"></a>

      <a href="http://webtest.infinityfreeapp.com/cart.php"><img class="cart-icon" src="resources/cart.png" alt="cart-icon" width="30px" height="30px"></a>
        <div class="cartQuantity">
        <span>
          <?php
            $cartItems = $_SESSION['cart'];
            $quantity = 0;
            foreach ($cartItems as $itemID) {
              foreach ($itemID as $item) {
                $quantity = $quantity + $item['quantity'];
              }
            }
            echo $quantity;
          ?>
        </span>
      </div>
    </div>
    
  </div>
</body>
</html>