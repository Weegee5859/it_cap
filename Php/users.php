<?php

require 'db-connection/connection.php';

$sql = "INSERT INTO customers (id, custormerName, customerEmail, customerPassword) VALUES (1,?,?,?)";

$stmt - mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    die("MTST error");
}

mysqli_stmt_bind_param($stmt, "sss", );



if(isset($_POST['submit'])){

    $user = $_POST['name'];

    echo $user;
}

?>