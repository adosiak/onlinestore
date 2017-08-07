<?php

function read_csv($file_name) //"../db/item_2.csv"
{
 if (($db = fopen($file_name, "r")) == false) {
   echo "Cann't open item.csv\n";
   exit ;
 }
 $item_db = array();
 $tmp = fgetcsv($db, 0, ",");
 //print_r($tmp);
 $size = count($tmp);
 while ($data = fgetcsv($db, 0, ","))
 {
   $i = 0;
   $t = array();
   while ($i < $size)
   {
     $t[$tmp[$i]]=$data[$i];
     $i++;

   }
   $item_db[] = $t;
 }
 fclose($db);
 return ($item_db);
}

function make_str($item_db, $file_name)
{
  if (($db = fopen($file_name, "r")) == false) {
   echo "Cann't open item.csv\n";
   exit ;
 }
 $a = fgetcsv($db, 0, ",");
 //echo "a=";
  //print_r($a);
 fclose($db);
  $res = implode($a, ",")."\n";
  //echo "\nres=".$res;
  foreach ($item_db as $arr)
  {
   $i = 0;
    foreach ($arr as $key => $val)
    {
     if ($res == implode($a, ",")."\n")
       $res = $res.$arr[$key];
     else if($i)
       $res = $res.','.$arr[$key];
     else if(!$i)
       $res = $res.$arr[$key];
     $i++;
    }
    $res = $res."\n";
  }
  return ($res);
}

function modif_item_db($item, $file_name)
{
  $item_db = read_csv($file_name);
  print_r($item_db);
  $i = 0;
  $flag = 0;
  foreach ($item_db as $value) {
    if ($value['id'] == $item["id"])
      {
        $item_db[$i] = $item;
        $flag = 1;
      }
    $i++;
  }
  echo "make_str:\n";
  make_str($item_db, $file_name);
  if ($flag)
    file_put_contents("../db/item.csv", make_str($item_db, $file_name));
  else
    echo "No such item";
}

function add_item_db($item)
{
  $item_db = read_csv("../db/item.csv");
  //print_r($item_db);

  foreach ($item_db as $value)
  {
    if ($value['id'] == $item["id"])
      {
        echo "Item with this id alredy exists!\n";
        return ;
      }
    }
  $item_db[] = $item;
  file_put_contents($file_name, make_str($item_db, $file_name));
  echo "Item added!";
}

function del_item_db($item_id, $file_name)
{
  $item_db = read_csv($file_name);
  $i = 0;
  foreach ($item_db as $value)
  {
    if ($value['id'] == $item_id)
      {
        unset($item_db[$i]);
        file_put_contents($file_name, make_str($item_db, $file_name));
        echo "Item deleted!\n";
        return ;
      }
      $i++;
    }
  echo "No such item!";
}
 //$a = read_csv("../db/cart.csv");
 // $a = read_csv("../db/item.csv");
 // echo ("print:\n");
 // print_r($a);
 // echo "str=:\n".make_str($a, "../db/item.csv");
//add_item_db(array("id"=>"16","title"=>"item_10","link"=>"link", "category"=>"new_continent;tyty"))
//modif_item_db(array("id"=>"06","name"=>"beautiful_lily","link"=>"!!!link", "category"=>"tesst_cat", "price"=>"123"), "../db/item.csv");
 //echo $res."\n";
 ?>
