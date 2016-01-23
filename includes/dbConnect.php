<?



$host = "localhost";
$dbUser = "root";
$dbPass = "root";
$db_Name = "addresses";
$tblName = "celebnames";

mysql_connect("$host","$dbUser","$dbPass") or die("cannot connect");
mysql_select_db($db_Name)or die('cannot select db');

?>