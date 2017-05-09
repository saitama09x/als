<?php
	$host='localhost';
	$uname='root';
	$pwd='';
	$db="als";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
?>
	
	