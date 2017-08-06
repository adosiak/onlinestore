<?php
//session_start();

$login = $_POST["login"];
$passwd = $_POST["passwd"];
$out = unserialize(file_get_contents("../db/passwd"));
$i = 0;
foreach($out as $val)
{
    if ($val["login"] == $login && $val["password"] == hash("whirlpool", $passwd))
    {
      unset($out[$i]);
      file_put_contents("../db/passwd", serialize($out));
      echo "DONE!\n";
      print_r($out);
      return ;
    }
  $i++;
}
echo "No such user!\n";
?>
