<?php

$serverName = "sql110.epizy.com";
$dbUser = "epiz_32739619";
$dbpass = "YAs4V9ZkSn";
$dbName = "epiz_32739619_itcapstoneproject";

$conn = mysqli_connect($serverName,$dbUser,$dbpass,$dbName);

if(!$conn){
  die ("Connection failed: ". mysqli_connect_error());
}else{
  echo "Connection Stablished";
}

?>