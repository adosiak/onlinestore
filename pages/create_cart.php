<?php

include("../items/read_items.php");
include("cart_help.php");

$curr_login = "login_new";//need to assign actual login

$flag = 0;
$all = read_csv("../db/item_2.csv");
 foreach ($all as $value)
   if ($_POST["ind_".$value['id']])
     {
       $flag = 1;
       $str = $str.$value['id'].":".$_POST["ind_".$value['id']].";";
     }
echo $str;

if (!file_exists("../db/cart.csv"))
  file_put_contents("../db/cart.csv", "login,items");
if ($flag)
{
  $all_cart = read_csv("../db/cart.csv");
  $save = 0;
  foreach ($all_cart as $value)
  {  if ($value["login"] == $curr_login)
    {
      $save = $value;
      unset($all_cart[$i]);
    }
    $i++;
  }
  if ($save)
  {
  //  echo"<br>save=".$save['items'];
  //  print_r($save);
  //  echo "<br>str=".$str;
    $fin = check_each($str, $save["items"]);
    $save['items'] = $fin;
    $all_cart[] = $save;
  //  echo "<br>here please:<br>";
  //  print_r(make_str($all_cart,"../db/cart.csv"));
    file_put_contents("../db/cart.csv", make_str($all_cart,"../db/cart.csv"));
  }
  else
    file_put_contents("../db/cart.csv", "\n".$curr_login.",".$str,FILE_APPEND);
}

//$all = read_csv("../db/cart.csv");
//print_r($all);
?>
