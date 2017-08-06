<?php
//include("../db/item.csv");
include("../items/read_items.php");
//echo "HErere";
$all = read_csv("../db/item_2.csv");
echo "<form  action='create_cart.php' method='post'>'";
foreach ($all as $value)
{
  echo "<br />";
  if (in_array("red", explode(';',$value["category"])))
  {
    {
      echo"<IMG SRC='";
      echo $value['link']."'>";
      $ind = "ind_".$value["id"];
      echo $ind."<br>";
      echo "Quantity: <input type='number' name='$ind' min'1'/>";
    }
  }
}
echo "  <br /><input type='submit' name='submit' value='OK '/>";
echo "</form>";
?>
