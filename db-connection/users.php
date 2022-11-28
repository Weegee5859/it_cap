<?php

$serverName = "ns1096.ifastnet.com";
$dbUser = "itcapsto_admin";
$dbpass = "OHS5wa+}pf2%";
$dbName = "itcapsto_projectdatabase";

$conn = mysqli_connect($serverName,$dbUser,$dbpass,$dbName);

if(isset($_POST["submit"])){
    
    $username = $_POST["username"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];

    $sql = "INSERT INTO customers (customerName, customerEmail, customerPassword)  VALUES ('$username', '$mail', '$password')";

    mysqli_query($conn, $sql);
    
    header("location: http://webtest.infinityfreeapp.com/shop.php");

}else {
    echo "http://webtest.infinityfreeapp.com/signup.php";
}


?>