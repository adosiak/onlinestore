<?php

function nav_bar(){
session_start();
echo "<link rel=\"stylesheet\" type\"text/css\" href=\"http://localhost:8080/rush00/day2/includes/styles.css\" />";
	echo "<div id=\"fixed-pos\"><left><img title =\"DOGE\" src=\"./includes/photo.jpg\" alt=\"DOGE\" height=\"60\" width=\"60\" style=\"float: left;\"/><a class=\"sitelink\" href=\"http://localhost:8080/rush00/onlinestore/pages/category_1.php?category=red\" style=\"float: right;\" >Red Fruit</a><br><a class=\"sitelink\" href=\"http://localhost:8080/rush00/onlinestore/pages/category_1.php?category=yellow\" target=\"_self\" style=\"float: right;\">Yellow Fruit</a><br>
<a class=\"sitelink\" href=\"http://localhost:8080/rush00/onlinestore/pages/category_1.php?category=green\" target=\"_self\" style=\"float: right;\">Green Fruit</a></center>
<br>";
if($_SESSION["logged_on_user"] != ""){
	echo "<H3>Hello {$_SESSION["logged_on_user"]}</H3>";
	echo "<form action=\"user/logout.php\"><input type=\"submit\" value=\"logout\"/>";
}
else{
echo "<form action=\"user/login.php\" method=\"post\">
	<br><b>Login Here!</b><br/>
	<input name=\"exist_login\" onfocus=\"if (this.value=='Username') this.value = ''\" type=\"text\" value=\"Username\"><br>
	<input name=\"exist_pw\" onfocus=\"if (this.value=='Password') this.value = ''\" type=\"password\" value=\"Password\"><br>
	<input type=\"hidden\" name=\"Submitted\" value\True\" />
	<input type=\"submit\" value=\"login\" /> <input type=\"submit\" value=\"create\" />
	</div>";;
}
echo "<hr style=\"height:160pt; visibility:hidden;\" />";
}