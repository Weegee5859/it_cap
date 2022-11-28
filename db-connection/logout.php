<?php
session_start();
session_unset();
session_destroy();

header("location: http://webtest.infinityfreeapp.com/shop.php");
exit();

?>