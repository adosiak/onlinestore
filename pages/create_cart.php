<?php
include("../items/read_items.php");
session_start();

//print_r($cart);
function create_str_cart()
{
  $cart = $_SESSION['cart'];
  foreach ($cart as $key => $value)
  {
    foreach ($value as $k => $v)
      $str = $str.$k.':'.$v.";";
  }
  $str = $_SESSION['logged_on_user'].",".$str;
//echo $str;
return ($str);
}
function write_in_cart()
{
  //echo "CURRENT_USER=".$_SESSION['logged_on_user']."<br>";
  $str = create_str_cart();
if (!file_exists("../db/cart.csv"))
{
//  echo "100.here<br>";
  file_put_contents("../db/cart.csv", "login,items\n".$str, FILE_APPEND);
}
else
{
  $all_cart = read_csv("../db/cart.csv");
  // echo "<br>all:<br>";
  // print_r($all_cart);

  foreach ($all_cart as $key => $value)
  {
    echo "<br>1.login=".$value["login"]."<br>";
    if ($value["login"] == $_SESSION['logged_on_user'])
    {
      // echo "2.login=".$value["login"]."all_before:<br>";
      // print_r($all_cart);
      unset($all_cart[$key]);
      // echo "<br>after:<br>";
      // print_r($all_cart);
    //  $all_cart[] = array($_SESSION['logged_on_user']=>$_SESSION['cart']);
      file_put_contents("../db/cart.csv", make_str($all_cart,"../db/cart.csv"));
    }
  }
//  echo "200.here<br>";
  file_put_contents("../db/cart.csv", $str."\n", FILE_APPEND);
}
}
?>
