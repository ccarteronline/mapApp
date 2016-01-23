<?
$host = "localhost";
$dbUser = "root";
$dbPass = "root";
$db_Name = "addresses";
$tblName = "names";



//connect to the server and select the database

mysql_connect("$host","$dbUser","$dbPass") or die("cannot connect");

mysql_select_db($db_Name)or die('cannot select db');



//prevent mySQL Injection (hacks?)
$dbUser = mysql_real_escape_string($dbUser);
$dbPass = mysql_real_escape_string($dbPass);
?>


