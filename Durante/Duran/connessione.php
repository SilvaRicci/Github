<?php
$db ="verifica_sess_cookie";
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_connection= mysqli_connect($db_host,$db_user,$db_password);
if (!$db_connection) 
{
	print "si e' verificato un problema tecnico";
	exit;
}
else{
	//echo "Benvenuto";
}
mysqli_select_db($db_connection,$db);

?>