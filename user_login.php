<!-- PHP Code-->
<?php

session_start() ;

require ("connect.php");

if (isset($_POST["account_no"]) && isset($_POST["pin_no"]))

{
	$account_no = $_POST["account_no"];
	$pin_no = $_POST["pin_no"];
	
	$sql1 = "SELECT Account_No, PIN FROM Users WHERE Account_No = '$account_no' AND PIN = '$pin_no'"; #MySQL Query
	
	
	if ($query_run = mysql_query($sql1))
	{
		$query_num_rows = mysql_num_rows($query_run); #Get the number of rows
		
		if($query_num_rows == 0) # 0 rows returned 
		{
			echo "<br>"."Invalid Account No./PIN Combination";
		}

		else if ($query_num_rows == 1) # Valid Data Found
		{
		 	$acc_no = mysql_result($query_run, 0,'Account_No');

		 	#echo $acc_no ;

		 	$_SESSION['acc_no'] = $acc_no; #For Session Variable
		 	
		 	header('Location: user_data.php'); #Target Location
		}
	}
}
?>
