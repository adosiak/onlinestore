<?php

$login = $_POST["login"];
$passwd = $_POST["passwd"];
if (!$login || !$passwd)
  {
    echo "enter login AND password\n";
    return ;
  }
$account = array(array("login"=>$login, "password"=>hash('whirlpool',$passwd)));

if (!file_exists("../db/password"))
  $out = $account;
else
{
  $out = unserialize(file_get_contents("../db/passwd"));
  foreach ($out as $val)
  {
    if ($val["login"] === $login)
      {
        echo "Please create NEW user\n";
        return ;
      }
  }
  $out[] = $account[0];
}
file_put_contents("../db/passwd", serialize($out));
echo "OK\n";
?>
