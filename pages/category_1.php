<?php
//include("../db/item.csv");
include("../items/read_items.php");
//echo "HErere";
$all = read_csv();

foreach ($all as $value) {
  //echo($value["category"] != 'asia');
    echo "<br />";
  echo($value["category"]);
    echo "<br />";
  if (trim($value["category"]) == "asia")
    {
 echo "<form  action='create.php' method='post'>Description<br /><IMG SRC='";
 echo $value['link'];
 echo "'></form>";
 }

}
?>
<html>
  <body>
  CREATE
<form  action="create.php" method="post">
  New username: <input type="text" name="login" value="<?php echo $all[2]["category"]; ?>" />
  <br />
  New password: <input type="text" name="passwd" value="" />
  <br />
  <input type="submit" name="submit" value="OK" />
  


</form>
</body></html>
