<?php
$mysql_hostname = "sql206.byethost9.com";
$mysql_user = "b9_21611491";
$mysql_password = "sh33ph3ad";
$mysql_database = "b9_21611491_hmongPres";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>