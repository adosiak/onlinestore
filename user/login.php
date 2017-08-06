<?php

function auth($login, $passwd)
{
  $out = unserialize(file_get_contents("../db/passwd"));
  foreach ($out as $val)
    if ($val["login"] == $login && $val["password"] == hash("whirlpool", $passwd))
      return (TRUE);
  return(FALSE);
}

$login = $_POST["exist_login"];
$pw = $_POST["exist_pw"];

if (auth($login , $pw))
 {
   $_SESSION["loggued_on_user"] = $login;
   echo "OK\n";
 }
else
  {
    $_SESSION["loggued_on_user"] = "";
    echo "NO such user\n";
  }

?>
