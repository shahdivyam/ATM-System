<!-- PHP Code-->
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

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

if (isset($_POST["account_no"]) && isset($_POST["pin_no"]))
{
	$account_no = $_POST["account_no"];
	$pin_no = $_POST["pin_no"];

	$sql1 = "SELECT Account_no, PIN FROM Users WHERE Account_no = '$account_no' AND PIN = '$pin_no'"; #MySQL Query

	if ($query_run = mysql_query($sql1))
	{
		$query_num_rows = mysql_num_rows($query_run); #Get the number of rows

		if($query_num_rows == 0)
		{
			echo "<br>"."Invalid Account No./PIN Combination";
		}
		 else if ($query_num_rows == 1)
		 {
		 	$acc_no = mysql_result($query_run, 0,'Account_No');
		 	$_SESSION['$acc_no'] = $acc_no; #For Session Variable
		 	header('Location: user_data.php'); #Target Location
		 }
	}
}

?>
