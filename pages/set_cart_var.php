<?php
include("../items/read_items.php");
session_start();
$all = read_csv("../db/item_2.csv");
//echo "<br>";
//print_r($_SESSION["cart"]);
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
            //  echo "<br>YESSSS";
            //  echo $_POST[$i]."<br>prev id:";
            //  echo $prev[$key][$value['id']];
             $prev[$key][$value['id']] = $_POST[$i];
             $flag = 1;
           }
       }
      if (!$flag)
        $prev[] = array($value['id']=>$_POST[$i]);
    }
   }
$_SESSION["cart"] = $prev;
//echo $str;
//echo($var);
?>
