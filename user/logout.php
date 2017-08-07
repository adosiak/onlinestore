<?php
include("../pages/create_cart.php");
session_start();

echo $_SESSION['loggued_on_user'];
$_SESSION['loggued_on_user'] = "";
echo "you logged out";

//echo $_SESSION['logged_on_user'];
if ($_SESSION['cart'] && $_SESSION['logged_on_user'])
{
  write_in_cart();
  $_SESSION['cart'] = "";
}
$_SESSION['logged_on_user'] = "";

$url='http://localhost:8080/rush00/day2/index.php';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
?>
