<?php
session_start();

if(!(isset($_SESSION['cart']))) {
    $_SESSION['cart'] = [];
  }

/*echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";
*/
$cartItems = $_SESSION['cart'];

//Cart Quantity
$_SESSION['quantity'] = 0;
foreach ($cartItems as $itemID) {
  foreach ($itemID as $item) {
    $_SESSION['quantity'] = $_SESSION['quantity'] + $item['quantity'];
  }
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
  <link rel="stylesheet" href="css/shop.css">
  <link rel="stylesheet" href="css/cartstyle.css">
</head>

<body>
  <?php include 'header.php';?>

  <div class="cart">
    <div class="mainCart">
      <?php //if(isset($_SESSION['cart'])) {
          
        foreach ($cartItems as $itemID) {
          foreach ($itemID as $item) {
        ?>
      <div class="items">

        <img class="productImage" src='<?php echo $item['productImage'];?>'>
        
        
        <div class="cartItemInfo">
          <!--
            <p class="productName">Black Shirt</p>
            <p class="productDesc">Men's Shirt</p>
            <p class="productPrice">$15.99</p>
          -->
          <p class="productName"><?php echo htmlspecialchars($item['productName']);?></p>
          <p class="productDesc"><?php echo htmlspecialchars($item['productDescription']);?></p>
          <p class="productSize">Size: <?php echo htmlspecialchars($item['productSize']);?></p>
        </div>
        <form class="counter" action='<?php echo $_SERVER['PHP_SELF']?>'>
          <!--<input class="down" onClick='decreaseCount(event, this)'>-->
          <p>Qty:</p>
          <input type="text" name="quantity" value="<?php echo $item['quantity'];?>" readonly>
          <!--<input type='submit' class="up" value="+">-->
        </form>
        <div class="cartItemPrice">
          <p class="productTotal"><?php echo htmlspecialchars($item['productPrice'] * $item['quantity']);?></p>
          <p class="productPrice"><?php echo htmlspecialchars($item['productPrice']);?> each</p>
        </div>
      </div>
    <?php } } ?>
    </div>
    <form action="db-connection/order.php" method="POST" class="summary">
      <h1>Summary</h1>
      <h2>
        <p>Subtotal: </p>
        <span class="subtotal">$
        <?php
          // define subtotal
          $subtotal = 0;
          // Iterate through cart items and calculate subtotal
          foreach ($cartItems as $itemID) {
            foreach ($itemID as $item) {
            $subtotal += $item['quantity'] * ($item["productPrice"] - 0.99);
          } }
          //print total
          echo $subtotal;
        ?>
      </span>
      </h2>
        <h2 class="tax"><p>Tax:</p><span name="quantity">
          <?php
            // define tax
            $tax = 0;
            // Iterate through cart items and calculate tax
            foreach ($cartItems as $itemID) {
              foreach ($itemID as $item) {
              $tax += $item['quantity'] * 0.99;
            } }
            //print total
            echo $tax;
          ?>
        </span>
      </h2>
      <h2 class="totalHeader">
        <p>Total:</p>
        <span name="total" class="total">$
          <?php
            // define total
            $total = 0;
            // Iterate through cart items and calculate total
            foreach ($cartItems as $itemID) {
              foreach ($itemID as $item) {
              $total += $item['quantity'] * $item["productPrice"];
            } }
            //print total
            echo $total;
            // Define cartTotal as session variable
            $_SESSION['cartTotal'] = $total;
          ?>
        </span>
      </h2>
      
      <button type="submit" name="submit" class="CheckoutButton">Checkout</button>
    </form>
  </div>

  <?php include 'footer.php';?>
  <script src="js/cartfunc.js"></script>
</body>
</html>