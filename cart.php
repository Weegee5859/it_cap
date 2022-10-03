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
      <div class="items">
        <img class="productImage" src="resources/shirt.jpg">
        <div class="cartItemInfo">
          <p class="productName">Black Shirt</p>
          <p class="productDesc">Men's Shirt</p>
          <p class="productPrice">$15.99</p>
        </div>
        <div class="counter">
          <span class="down" onClick='decreaseCount(event, this)'>-</span>
          <input type="text" value="1">
          <span class="up" onClick='increaseCount(event, this)'>+</span>
        </div>
      </div>
      <div class="items">
        <img class="productImage" src="resources/shirt.jpg">
        <div class="cartItemInfo">
          <p class="productName">Black Shirt</p>
          <p class="productDesc">Men's Shirt</p>
          <p class="productPrice">$15.99</p>
        </div>
        <div class="counter">
          <span class="down" onClick='decreaseCount(event, this)'>-</span>
          <input type="text" value="1">
          <span class="up" onClick='increaseCount(event, this)'>+</span>
        </div>
      </div>
    </div>
    <div class="summary">
      <h1>Summary</h1>
      <h2>Subtotal:<span class="subtotal"> $0.00 </span></h2>
      <h2 class="tax">Tax:<span> $0.00 </span></h2>
      <h2>Total:<span class="total"> $0.00 </span></h2>
      <button type="submit" class="CheckoutButton">Checkout</button>
    </div>
  </div>

  <?php include 'footer.php';?>
  <script src="js/cartfunc.js"></script>
</body>
</html>