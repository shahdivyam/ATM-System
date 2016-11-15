<?php

if (isset($_POST['new_pin_no']) && isset($_POST['confirm_new_pin_no']))
{
	#session_start(); #Session Creation

	require ("connect.php") ;
	require ("user_login.php") ;

	$acc_no = $_SESSION['acc_no'] ;

	$new_pin = $_POST['new_pin_no'];
	$confirm_pin = $_POST['confirm_new_pin_no'];

	if($new_pin == $confirm_pin)
	{
		$sql = "UPDATE Users SET PIN = $new_pin WHERE Account_No = $acc_no" ;
		$query = mysql_query($sql) ;
		
		if($query)
		{
			echo "<body bgcolor = '#2F4F4F' style = 'color:white'>" ;
			echo "<h1><u>Pin Change Successful</u></h1>"."<br>";
			echo "Redirecting.." ;
			header( "refresh:3;url=user_data.php" );
		}
	}
	else
	{
		echo "<h1><u>Pins are not Equal</u></h1>"."<br>";
		echo "Redirecting.." ;
		header( "refresh:3;url=pinchange.html" );

	}
}

?>