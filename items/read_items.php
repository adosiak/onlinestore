<?php

function read_csv()
{
 if (($db = fopen("../db/item.csv", "r")) == false) {
   echo "Cann't open item.csv\n";
   exit ;
 }
 $item_db = array();
 $tmp = fgetcsv($db, 0, ",");
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

function make_str($item_db)
{
  $res = '';
  foreach ($item_db as $arr)
  {
   $i = 0;
    foreach ($arr as $key => $val)
    {
     if (!$res)
       $res = $arr[$key];
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

function modif_item_db($item)
{
  $item_db = read_csv();
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
  if ($flag)
    file_put_contents("../db/item.csv", make_str($item_db));
  else
    echo "No such item";
}

function add_item_db($item)
{
  $item_db = read_csv();
  print_r($item_db);

  foreach ($item_db as $value)
  {
    if ($value['id'] == $item["id"])
      {
        echo "Item with this id alredy exists!\n";
        return ;
      }
    }
  $item_db[] = $item;
  file_put_contents("../db/item.csv", make_str($item_db));
  echo "Item added!";
}

function del_item_db($item_id)
{
  $item_db = read_csv();
  $i = 0;
  foreach ($item_db as $value)
  {
    if ($value['id'] == $item_id)
      {
        unset($item_db[$i]);
        file_put_contents("../db/item.csv", make_str($item_db));
        echo "Item deleted!\n";
        return ;
      }
      $i++;
    }
  echo "No such item!";
}
$a = read_csv();
echo ("print:\n");
print_r($a);
//add_item_db(array("id"=>"16","title"=>"item_10","link"=>"link", "category"=>"new_continent;tyty"))
//modif_item_db(array("id"=>"06","title"=>"beautiful_lily","link"=>"link", "category"=>"eu;categ"));
 //echo $res."\n";
 ?>
