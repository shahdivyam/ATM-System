<?php

require ("connect.php") ;
require ("user_login.php") ;

$acc_no = $_SESSION['acc_no'] ;


$sql = "SELECT * FROM Transaction_History WHERE Account_No = $acc_no ORDER BY Time DESC" ;
$query_run = mysql_query($sql) ;

echo 
"
<h1 align = 'center'><u>Previous Transactions</u></h1>
<br>
<br>
<table border = '2px' width = '700px' align = 'center'>
<tr>
<th>Date</th>
<th>Amount</th>
<th>Type</th>
</tr>
" ;

while($row = mysql_fetch_assoc($query_run))
{
	$account = $row['Account_No'] ;
	$date = $row['Time'] ;
	$amount = $row['Amount'] ;
	$type = $row['Type'] ; 

	if ($type == '0')
	{
		echo 
		"<tr>
		<td>$date</td>
		<td>$amount</td>
		<td style = 'background-color:red ; color : white ;'>Debit</td>
		</tr>
		" ;
	}
	else if ($type == '1')
	{
		echo 
		"<tr>
		<td>$date</td>
		<td>$amount</td>
		<td style = 'background-color:green ; color : white ;'>Credit</td>
		</tr>
		" ;
	}
	
}

?>
