<?php
session_start();
echo $_SESSION['loggued_on_user'];
$_SESSION['loggued_on_user'] = "";
echo "you logged out";
$url='http://localhost:8080/rush00/day2/index.php';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
 ?>
