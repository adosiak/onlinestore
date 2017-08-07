<style>
<?php include '../master_css.css'; ?>
</style>
<?php
//include("../db/item.csv");
include("../items/read_items.php");
$all = read_csv("../db/item_2.csv");
// $category = "";
$category = $_GET["category"];
// $headers = $col = "";
$carturl = "set_cart_var.php";
echo "<form action={$carturl} method=\"post\">";
echo "<table id=\"categories_table\" width=\"100%\" align=\"center\" border=\"2px\"><tr><th style=\"float: left;\" width=\"100%\">Fruit type</th> <th width=\"100%\">Description</th> <th width=\"100%\">Price</th><th>Quantity</th></tr>";
foreach ($all as $value) {
   //echo($value["category"]);
   // echo "<br />";
  if(in_array($category, explode(";", $value["category"])))
    {
      // <form  action='create.php' method='post'></form>
 echo "<tr><td align=\"center\" colspan=\"2\">{$value["name"]}<br/><IMG SRC='" . $value['link'] . "'height=100px;></td>";
 echo "<td align=\"center\" colspan=\"2\"> {$value["name"]} is key: {$value["id"]}</td><br>";
 echo "<td align=\"center\" colspan=\"2\">\${$value["price"]}</td>";
 echo "<td><input name=\"ind_{$value["id"]}\" type=\"number\" min =\"0\" value=0></td></tr>";
 }
}
 echo "</table>";
?>
<input type="hidden" name="Submitted" value="True" />
<input type="submit" value="Sendt'd" style="float: right;" /><br>
</form>
