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

		$sql2 = "SELECT Balance FROM User_data WHERE Account_No = $account_no" ;
		$query2 = mysql_query($sql2) ;

		//Extract the row by executing the query
		while ($row2 = mysql_fetch_assoc($query2))
		{

			$balance = $row2['Balance'] ;
			$final_balance = $balance - $withdraw_amount ;

			//Insufficient Funds
			if($final_balance < 0)
			{
				echo "Transaction could not be completed due to insufficient funds"."<br>" ;
				echo "Redirecting.." ;
				header( "refresh:3;url=user_data.php" );
			}

			//Sufficient Funds Present
			else
			{
				$sql3 = "UPDATE User_data SET Balance = $final_balance WHERE Account_No = $account_no";
				$query3 = mysql_query($sql3) ;

				$sql4 = "INSERT INTO Transaction_History VALUES ('$account_no', '$time', '$withdraw_amount', '0') ";
				$query4 = mysql_query($sql4) ;

				if($query3 && $query4)
				{
					echo "<h3><u>Transaction Successfull</u></h3>"."<br>" ;
					echo "Redirecting.." ;
					header( "refresh:3;url=user_data.php" );
				}
			}
		}

	}
}

?>
