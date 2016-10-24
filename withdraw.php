<?php

require ("connect.php") ;

global $account_no ;

if (isset($_POST["withdraw_amount"]) && isset($_POST["pin_no"]))
{
	$withdraw_amount = $_POST["withdraw_amount"];
	$pin_no = $_POST["pin_no"];

	$sql1 = "SELECT Account_No FROM Users WHERE PIN = $pin_no" ;
	$query1 = mysql_query($sql1) ;


	while($row1 = mysql_fetch_assoc($query1))
	{
		$account = $row1['Account_No'] ;
		global $account_no ;
		$account_no = $account ;

		$time= date('Y-m-d H:i:s');

		$sql2 = "INSERT INTO Transaction_History VALUES ('$account_no', '$time', '$withdraw_amount', '0') ";
		$query2 = mysql_query($sql2) ;

		$sql3 = "SELECT Balance FROM User_data WHERE Account_No = $account_no" ;
		$query3 = mysql_query($sql3) ;

		while ($row3 = mysql_fetch_assoc($query3))
		{
			$balance = $row3['Balance'] ;
			$final_balance = $balance - $withdraw_amount ;

			$sql4 = "UPDATE User_data SET Balance = $final_balance WHERE Account_No = $account_no";
			$query4 = mysql_query($sql4) ;

			if($query4)
			{
				echo "<h3><u>Transaction Successfull</u></h3>"."<br>" ;
				echo "Redirecting.." ;
				header( "refresh:3;url=user_data.php" );
			}
		}
	}


}

?>