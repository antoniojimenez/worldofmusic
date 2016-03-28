<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "worldofmusic";
$conectar = mysql_connect($dbhost,$dbuser,$dbpass); 
mysql_set_charset('utf8', $conectar);
mysql_select_db($db);

?>