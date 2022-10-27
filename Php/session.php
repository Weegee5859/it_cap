<?php

$serverName = "ns1096.ifastnet.com";
$dbUser = "itcapsto_admin";
$dbpass = "OHS5wa+}pf2%";
$dbName = "itcapsto_projectdatabase";

$conn = mysqli_connect($serverName,$dbUser,$dbpass,$dbName);

if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = " SELECT userid FROM customers WHERE customerName = '$username' AND customerPassword = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    //print_r($row);

    if($count == 1){
        echo "<h1><center> Login successful </center></h1>";
        
        session_start();

        $_SESSION["id"] = $username;
        
        header("location: http://webtest.infinityfreeapp.com/shop.php");

    } else {
        echo "<h1> Login failed. Invalid username or password.</h1>";
    }


}else {
    header("location: http://webtest.infinityfreeapp.com/shop.php");
}

?>