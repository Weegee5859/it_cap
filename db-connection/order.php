<?php
session_start();

$serverName = "ns1096.ifastnet.com";
$dbUser = "itcapsto_admin";
$dbpass = "OHS5wa+}pf2%";
$dbName = "itcapsto_projectdatabase";

$conn = mysqli_connect($serverName,$dbUser,$dbpass,$dbName);

if(isset($_POST["submit"])){
    
   //$username = $_SESSION["id"];
   $orderQuantity = $_SESSION["quantity"];
   $orderPrice = $_SESSION['cartTotal'];
   $orderName = $_SESSION["id"];
   $cart = $_SESSION['cart'];
   $cart = serialize($cart);
   //serialize
    //echo $username;
    echo $orderQuantity;
    echo $orderPrice;
    echo $orderName;

    $sql = "INSERT INTO orders (orderName, orderPrice, orderQuantity, orderType)  VALUES ('$orderName', '$orderPrice', '$orderQuantity','$cart')";
    mysqli_query($conn, $sql);

    echo "ORDER PROCESSED SUCCESSFULLY!";
    
    //Clear Cart
    $cart = [];
    $_SESSION['cart'] = [];
    header("location: http://webtest.infinityfreeapp.com/shop.php");

} else {
    echo "error";
}


?>