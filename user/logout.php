<?php
include("../pages/create_cart.php");
session_start();
//echo $_SESSION['logged_on_user'];
if ($_SESSION['cart'] && $_SESSION['logged_on_user'])
{
  write_in_cart();
  $_SESSION['cart'] = "";
}
$_SESSION['logged_on_user'] = "";

 ?>
