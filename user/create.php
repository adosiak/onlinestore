<?php

$login = $_POST["lg"];
$passwd = $_POST["pd"];
if (!$login || !$passwd)
  {
    echo "enter login AND password\n";
    return ;
  }

$account = array(array("login"=>$login, "password"=>hash('whirlpool',$passwd)));

if (!file_exists("../db/passwd"))
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
$url='http://localhost:8080/rush00/day2/index.php';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
?>
