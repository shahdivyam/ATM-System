<?php

session_start(); #Session Creation

require ("connect.php") ;
require ("user_login.php") ;

$acc_no = $_SESSION['acc_no'] ;

global $Balance;
global $Customer_Name;

$sql = "SELECT Account_No, Customer_Name, Balance FROM User_data WHERE Account_No = '$acc_no'"; #MySQL Query
$query_run = mysql_query($sql) ;

while($row = mysql_fetch_assoc($query_run))
{
	$cust_name = $row['Customer_Name'];
	global $Customer_Name ;
	$Customer_Name = $cust_name ;

	$bal = $row['Balance'];
	global $Balance ;
	$Balance = $bal ;

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>
Welcome
</h1>
<br>

<h3> 
<?php

if (isset($_SESSION['acc_no']) && !empty($_SESSION['acc_no']))

{
	echo "Account Number - " . $_SESSION['acc_no']."<br>";
	echo "Customer Name - " . $Customer_Name."<br>";
	echo "Balance - " . $Balance."<br>" ;
}

?>

</h1>
</body>
</html>
