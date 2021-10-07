<?php
 session_start();
 $gid= $_GET["id"];
 unset($_SESSION['cart'][$gid]);
 header("location:./list_cart.php");
?>
