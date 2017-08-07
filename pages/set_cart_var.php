<?php
include("../items/read_items.php");
//session_start();
$all = read_csv("../db/item_2.csv");
//echo "<br>";
print_r($_SESSION["cart"]);
$prev = $_SESSION["cart"];
foreach ($all as $value)
 {
   $flag = 0;
   $i = "ind_".$value['id'];
   if ($_POST[$i])
    {
      if ($prev)
       {
         foreach ($prev as $key => $val)
           if (array_key_exists($value['id'],$prev[$key]))
           {
             $prev[$key][$value['id']] = $_POST[$i];
             $flag = 1;
           }
       }
      if (!$flag)
        $prev[] = array($value['id']=>$_POST[$i]);
    }
   }
$_SESSION["cart"] = $prev;

function upload_cart()
{
  if (!file_exists("../db/cart.csv"))
    return ("");
  else
  {
    $all_cart = read_csv("../db/cart.csv");
    foreach ($all_cart as $key => $value)
    {
      if ($value["login"] == $_SESSION['logged_on_user'])
      {
        $str = $value["items"];
        break ;
      }
    }
      $new_arr = explode(";", trim($str, ";"));
      foreach ($new_arr as $key => $value) {
        $tmp = explode(":", $value);
        $new_arr[$key] = array($tmp[0]=>$tmp[1]);
      }
      return ($new_arr[$key]);
  }
}
?>
