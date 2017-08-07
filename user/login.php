<?php
session_start();
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
   $_SESSION["logged_on_user"] = $login;
   echo "Logged in\n";
 }
else
  {
    $_SESSION["logged_on_user"] = "";
    echo "NO such user\n";
  }
  $url='http://localhost:8080/rush00/day2/test.php';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
?>
