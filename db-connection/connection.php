<?php

$serverName = "ns1096.ifastnet.com";
$dbUser = "itcapsto_admin";
$dbpass = "OHS5wa+}pf2%";
$dbName = "itcapsto_projectdatabase";

$conn = mysqli_connect($serverName,$dbUser,$dbpass,$dbName);

if(!$conn){
  die ("Connection failed: ". mysqli_connect_error());
}else{
  echo "Connection Established";
}

?>