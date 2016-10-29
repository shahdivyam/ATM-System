<?php
session_start();
include ("connect.php");
$acc_no = $_SESSION["acc_no"];

$sql_withdraw = "SELECT `Amount`,`Balance` FROM `Withdraw` WHERE `AccountNo` = '$acc_no'";
$sql_deposit = "SELECT `ChequeNo`,`Amount` FROM `Deposit` WHERE `AccountNo` = '$acc_no'";
$sql_balance = " SELECT `Balance` FROM `Customers` WHERE `AccountNo` = '$acc_no' " ;

global $conn;

$res_sql_withdraw = $conn->query($sql_withdraw);
$res_sql_deposit = $conn->query($sql_deposit);

?>

<!DOCTYPE html>
<html>
    <head>
	<title>Transaction</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>
    <h2 style="text-align:center;">Withdrawl</h2>
        <table class="table"style="border:1px solid blue;">
  <thead>
    <tr>
      <th>#</th>
      <th>Account Number </th>
      <th>Amount</th>
      <th>Updated Balance</th>
    </tr>
  </thead>
  <tbody>
   <?php
   global $res_sql_withdraw;
   global $res_sql_deposit;
   global $acc_no;
   $count =1;
   while($row=$res_sql_withdraw->fetch_assoc()){
	  $amount = $row["Amount"];
	  $bal = $row["Balance"];
	  echo "<tr>
      <th scope='row'>$count</th>
      <td>$acc_no</td>
      <td>$amount</td>
      <td>$bal</td>
    </tr>";
    global $count;
    $count = $count+1;
	}
   ?> 
   
  </tbody>
</table>
        <br>
    <h2 style="text-align:center;">Deposit</h2>
    <table class="table" style="border:1px solid blue;">
  <thead>
    <tr>
      <th>#</th>
      <th>Cheque Number</th>
      <th>Amount</th>
      <th>Status</th>
      
      </tr>
  </thead>
  <tbody>
    <?php
   global $res_sql_withdraw;
   global $res_sql_deposit;
   global $acc_no;
   $status = "Under Process";
   $count =1;
   while($row=$res_sql_deposit->fetch_assoc()){
	  global $status;
	  $amount = $row["Amount"];
	  $cheque_no = $row["ChequeNo"];
	  echo "<tr>
      <th scope='row'>$count</th>
      <td>$cheque_no</td>
      <td>$amount</td>
      <td>$status</td>
    </tr>";
    global $count;
    $count = $count+1;
	}
   ?> 
  </tbody>
</table>
	<a href="menu.php"><button class="btn-default" style="align:center;">Go back To Main Menu </button></a>
    </body>

</html>
