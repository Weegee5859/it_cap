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

  //Get data
  $sql_product = "SELECT productName, productPrice, productStock, productDescription FROM product";

  $product_result = mysqli_query($conn, $sql_product);

  $products = mysqli_fetch_all($product_result, MYSQLI_ASSOC);

  //print_r($products)

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

</head>

<body>
  <?php include 'header.php';?>

  <div class="shopHeader">
      <img class="shopImage" src="resources/clothes2.jpg">
      <p class="shopTitle"><mark class="highlight">Shop</mark> for the <br> latest trendy styles.</p>
  </div>
  <div class="mainContainer">
    <div class="navbar">
      <div href="cart.php">Pants</div>
      <div href="shop.php">Shirts</div>
      <div href="shop.php">Sweaters</div>
      <div href="shop.php">Shorts</div>
    </div>
    <div class="productList">
    <?php  foreach ($products as $product) { ?>
            <div class="product">
                <div class="productInfoContainer">
                    <img class="productImage" src="resources/shirt.jpg">
                    <p class="productName"><?php echo htmlspecialchars($product['productName']);?></p>
                    <p class="productDesc"><?php echo htmlspecialchars($product['productDescription']);?></p>
                    <p class="productPrice"><?php echo htmlspecialchars($product['productPrice']);?></p>
                    <div class="productAddCart">Add to Cart</div> 
                </div>
            </div>
      <?php  } ?>
    </div>
  </div>

  <?php include 'footer.php';?>
  <script src="js/shop.js"></script>
</body>
</html>
