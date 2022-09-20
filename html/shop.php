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

</head>

<body>
  <?php include 'header.php';?>

  <div class="shopHeader">
      <img class="shopImage" src="resources/clothes2.jpg">
      <p class="shopTitle"><mark class="highlight">Shop</mark> for the <br> latest trendy styles.</p>
  </div>

  <div class="bar">
    <div class="icons">
      <a href="shop.php"><img class="login-icon" src="resources/login.png" alt="logo-icon" width="30px" height="30px"></a>
      <a href="shop.php"><img class="cart-icon" src="resources/cart.png" alt="cart-icon" width="30px" height="30px"></a>
    </div>
    <div class="home-title">
      <p>HOME</p>
    </div>
  </div>

  <div class="productList">
    <div class="navbar">
        <a href="shop.php">Pants</a>
        <a href="shop.php">Shirts</a>
        <a href="shop.php">Sweaters</a>
        <a href="shop.php">Shorts</a>
    </div>
    <div class="product">
        <img class="productImage" src="resources/shirt.jpg">
        <div class="productInfoContainer">
          <p class="productName">Black Shirt</p>
          <p class="productDesc">Men's Shirt</p>
          <p class="productPrice">$15.99</p>
          <div class="productAddCart">Add to Cart</div> 
        </div>
      </div>
  </div>

  <?php include 'footer.php';?>
  <script src="js/shop.js"></script>
</body>
</html>