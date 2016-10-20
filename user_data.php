<?php

session_start(); #Session Creation

require ("user_login.php") ;

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$conn_db = mysql_select_db("ATM_System");

$acc_no = $_SESSION['$acc_no'] ;

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>
Welcome Account No. - 
<?php

if (isset($_SESSION['$acc_no']) && !empty($_SESSION['$acc_no']))
{
	echo $_SESSION['$acc_no'];
}

?>

</h1>
</body>
</html>

