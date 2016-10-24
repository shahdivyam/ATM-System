<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "27028885";

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

/*
if ($conn)
{
	echo "Connected Successfully";
}
else
{
	echo mysql_error();
}
*/

$conn_db = mysql_select_db("ATM_System"); #Select a Database after Connection

/*
if($conn_db)
{
	echo "<br>"."Connected to Database Successfully" ;
}
else
{
	echo "<br>"."Could not connect Successfully" ;
}
*/

?>
