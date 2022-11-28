<?php
include('connection.php');

session_start();


updateCart();
/*
echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";
*/

function updateCart() {
  //If cart does not exists then create
  if(!(isset($_SESSION['cart']))) {
    $_SESSION['cart'] = [];
    return "CART EMPTIED ";
  }

  // If not logged in
  if (!(isset($_SESSION["id"]))) {
    $_SESSION['cart'] = [];
    return "NOT LOGGED IN";
   
  }

  // If no products submitted
  if (!(isset($_GET["productID"]))) {
    return "NO PRODUCTS FOUND";
  }

  //Define product ID (currently just products Name)
  $productID = $_GET["productID"];
  //If product already exists, add onto quantity
  if(isset($_SESSION['cart'][$productID][$_GET["productSize"]])) {
    $_SESSION['cart'][$productID][$_GET["productSize"]]["quantity"] += 1;
    return "Added onto product quantity to cart";
  }
  //Add new product to cart
  $_SESSION['cart'][$productID][$_GET["productSize"]]["quantity"] = 1;
  $_SESSION['cart'][$productID][$_GET["productSize"]]["productName"] = $_GET["productName"];
  $_SESSION['cart'][$productID][$_GET["productSize"]]["productSize"] = $_GET["productSize"];
  $_SESSION['cart'][$productID][$_GET["productSize"]]["productPrice"] = $_GET["productPrice"];
  $_SESSION['cart'][$productID][$_GET["productSize"]]["productDescription"] = $_GET["productDescription"];
  $_SESSION['cart'][$productID][$_GET["productSize"]]["productImage"] = $_GET["productImage"];
  return "Added new product to cart";
}



$serverName = "ns1096.ifastnet.com";
$dbUser = "itcapsto_admin";
$dbpass = "OHS5wa+}pf2%";
$dbName = "itcapsto_projectdatabase";

$conn = mysqli_connect($serverName,$dbUser,$dbpass,$dbName);

if(!$conn){
  die ("Connection failed". mysqli_connect_error());
}else{
  console.log("connection good");

  if (isset($_SESSION["username"])) {
      //header("location: shop.php");
      console.log($_SESSION["username"]);
      //exit;
    }
  /*
  $sql = "SELECT orderName FROM orders";
  $result = $conn->query($sql);
  

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
  } else {
    echo "0 results";
  }
*/
  //Get data
  $sql_product = "SELECT productid, productName, productPrice, productStock, productImage, productDescription FROM product";

  $product_result = mysqli_query($conn, $sql_product);

  $products = mysqli_fetch_all($product_result, MYSQLI_ASSOC);

  //print_r($products);

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

</head>

<body>
  <?php include 'header.php';?>

  <div class="shopHeader">
      <img class="shopImage" src="resources/clothes2.jpg">
      <p class="shopTitle"><mark class="highlight">Shop</mark> for the <br> latest trendy styles.</p>
  </div>
  <div class="mainContainer">
    <div class="navbar">
      <div onclick="showProducts('all',this)" class="navItem" id="on">All</div>
      <div onclick="showProducts('pant',this)" class="navItem">Pants</div>
      <div onclick="showProducts('shirt',this)" class="navItem">Shirts</div>
      <div onclick="showProducts('sweater',this)" class="navItem">Sweaters</div>
      <div onclick="showProducts('short',this)" class="navItem">Shorts</div>
    </div>
    <div class="productList">
        <?php  foreach ($products as $product) { 
                 ?>
            <div class="product">
                <div class="productInfoContainer">
                  <form action='<?php echo $_SERVER['PHP_SELF']; ?>'>
                    <!--
                    <img class="productImage" src="resources/shirt.jpg">
                    <p class="productName"><?php echo htmlspecialchars($product['productName']);?></p>
                    <p class="productDesc" value='<?php echo htmlspecialchars($product['productDescription']);?>'>
                    <p class="productPrice"><?php echo htmlspecialchars($product['productPrice']);?></p>
                  -->
                      <img class="productImage"  src='<?php echo $product['productImage'];?>'>

                      <input class="productName" type="text" name="productName" id="productName" value='<?php echo $product['productName'];?>' readonly>

                      <input class="productDesc" type="text" name="productDescription" id="productDescription" value='<?php echo $product['productDescription'];?>' readonly>

                      <input class="productID" type="hidden" name="productID" id="productID" value='<?php echo $product['productid'];?>' readonly>

                      <input class="productImage" type="hidden" name="productImage" id="productImage" value='<?php echo $product['productImage'];?>' readonly>
                            
                        <div class="productSize">
                            <div class="sizeButton">
                                <input type="radio" type="hidden" name="productSize" id="productSize" value="S" checked>S</input>
                            </div>  
                            <div class="sizeButton">
                                <input type="radio" type="hidden" name="productSize" id="productSize" value="M">M</input>
                            </div>  
                            <div class="sizeButton">
                                <input type="radio" type="hidden" name="productSize" id="productSize" value="L">L</input>
                            </div>  
                            <div class="sizeButton">
                                <input type="radio" type="hidden" name="productSize" id="productSize" value="XL">XL</input>
                            </div>  
                        </div>
                      <div class="productPriceContainer">
                        <p>$</p>
                        <input class="productPrice" type="text" name="productPrice" id="productPrice" value='<?php echo $product['productPrice'];?>' readonly>
                      </div>
                      

                      <input type="submit" class="productAddCart" value='Add to Cart'>
                    </form>
                    
                </div>
            </div>
        <?php  } ?>
  </div>
  <?php include 'footer.php';?>
  <script src="js/shop.js"></script>
</body>
</html>
