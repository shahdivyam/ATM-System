<?php

#session_start(); #Session Creation

require ("connect.php") ;
require ("user_login.php") ;

$acc_no = $_SESSION['acc_no'] ;

global $Balance;
global $Customer_Name;
global $Contact_No;

$sql = "SELECT Account_No, Customer_Name, Balance, Contact_No FROM User_data WHERE Account_No = '$acc_no'"; #MySQL Query
$query_run = mysql_query($sql) ;

while($row = mysql_fetch_assoc($query_run))
{
	#Fetch the customer name
	$cust_name = $row['Customer_Name'];
	global $Customer_Name ;
	$Customer_Name = $cust_name ;

	#Fetch the Account Balance
	$bal = $row['Balance'];
	global $Balance ;
	$Balance = $bal ;

	#Fetch the Contact Details
	$contact = $row['Contact_No'];
	global $Contact_No;
	$Contact_No = $contact;

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style>

		body
		{
			background-color: 	#DCDCDC;
		}

		a
		{
			text-decoration: none;
			color: white;
		}	

		.User_Table
		{
			height: 200px;
			width:  70%;
			position: relative;
			left: 15%;
			background-color: white;
		}

		.Logout
		{
			height: 30px;
			width: 5%;
			position: absolute;
			left: 80%;
			background-color: #008CBA;
			border-radius: 3px;
			color: white;
		}

		.Withdraw
		{
			height: 70px;
			width: 20%;
			position: relative;
			left: 10%;
			background-color: #4CAF50;
			border-style: solid;
			border-radius: 10px;
			border-color: white;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 25px;
			color: white;
		}

		.Withdraw:hover
		{
			background-color: green;
			cursor: pointer;
		}

		.Deposit
		{
			height: 70px;
			width: 20%;
			position: relative;
			left: 10%;
			background-color: #4CAF50;
			border-style: solid;
			border-radius: 10px;
			border-color: white;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 25px;
			color: white;
		}

		.Deposit:hover
		{
			background-color: green;
			cursor: pointer;
		}

		.History
		{
			height: 70px;
			width: 20%;
			position: relative;
			left: 10%;
			background-color: #4CAF50;
			border-style: solid;
			border-radius: 10px;
			border-color: white;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 25px;
			color: white;
		}

		.History:hover
		{
			background-color: green;
			cursor: pointer;
		}

		.Pin_Change
		{
			height: 70px;
			width: 20%;
			position: relative;
			left: 10%;
			background-color: #4CAF50;
			border-style: solid;
			border-radius: 10px;
			border-color: white;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 25px;
			color: white;
		}

		.Pin_Change:hover
		{
			background-color: green;
			cursor: pointer;
		}

		.Current_Balance
		{
			height: 70px;
			width: 30%;
			position: relative;
			left: 35%;
			top: 10%;
			background-color: #008CBA;
			color: white;
			font-size: 25px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			border-style: solid;
			border-radius: 10px;
		}


	</style>

</head>
<body>

	<button class="Logout"><a href = "logout.php"><font style="color:white ; ">Logout</font></a></button>

	<h1 align="center" style="font-size: 60px;">
		<u>Welcome </u>
	</h1>

	<br>
	<br>

	<!--Tabular Representation of Customer Details-->
	<table class="User_Table" border="4px">
		<tr>
			<td><b>Account Number  </b></td>
			<td><?php echo $acc_no ; ?></td>
		</tr>
		<tr>
			<td><b>Customer Name  </b></td>
			<td><?php echo $Customer_Name ; ?></td>
		</tr>
		<tr>
			<td><b>Contact Number  </b></td>
			<td><?php echo $Contact_No ; ?></td>
		</tr>
	</table>

	<br>
	<br>

	<button class = "Withdraw"><a href = "withdraw.html">Withdraw Amount</a></button>
	<button class = "Deposit"><a href = "deposit.html">Deposit Amount</a></button>
	<button class = "History"><a href = "history.php">Transaction History</a></button>
	<button class = "Pin_Change"><a href = "#">Change Pin</a></button>

	<br>
	<br>
	<button class = "Current_Balance">Current Balance : <?php echo $Balance ; ?></button>

</body>
</html>
