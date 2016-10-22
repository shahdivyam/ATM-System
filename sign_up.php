<?php

require ("connect.php") ;

if (isset($_POST["account_no"]) && isset($_POST["pin_no"]) && isset($_POST["confirm_pin_no"]) && isset($_POST["cust_name"]) && isset($_POST["contact_no"]) && isset($_POST["balance"]) && ($_POST["pin_no"] == $_POST["confirm_pin_no"]))
{
	$account_no = $_POST["account_no"];	
	$pin_no = $_POST["pin_no"];
	$confirm_pin_no = $_POST["confirm_pin_no"] ; 
	$customer_name = $_POST["cust_name"] ;
	$contact_no = $_POST["contact_no"] ;
	$balance = $_POST["balance"] ;
	
	if(!empty($account_no) && !empty($pin_no) && !empty($confirm_pin_no) && !empty($customer_name) && !empty($contact_no) && !empty($balance))
	{
		$query = "SELECT Account_No FROM Users WHERE Account_No = $account_no" ;
		$query_run = mysql_query($query) ;
		$query_num_rows = mysql_num_rows($query_run); //Check for Existing rows in Users Table

		if($query_num_rows == 1)
		{
			echo "The Account Number already exists";
		}
		else if ($query_num_rows == 0)
		{
			$sql1 = "INSERT INTO Users VALUES ('$account_no', '$pin_no')";
			$sql2 = "INSERT INTO User_data VALUES ('$account_no', '$customer_name', '$contact_no', '$balance')";
			
			$query_run1 = mysql_query($sql1);
			$query_run2 = mysql_query($sql2) ;

			if($query_run1 && $query_run2)
			{
				echo "<br>You have registered successfully";
			}
		}
	}
	else
	{
		echo "<br>Empty Data item not allowed";
	}

}

?>