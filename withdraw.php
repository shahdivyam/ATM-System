<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "27028885";
$dbname = "ATM_System";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);

session_start();
$account_no = $_SESSION["acc_no"];
$pin_no;

//echo "Hello".$account_no."<br>";
	global $account_no;
	$account_no = $_SESSION["acc_no"];

	
	
	$sql_get_pin = "SELECT `PIN` FROM `Users` WHERE `Account_No` = '$account_no'";
	
	$get_pin_result = $conn->query($sql_get_pin);
	
//	echo "Account No :".$account_no;
	//
	//$pin_no = $get_pin_result;

	while($row = $get_pin_result->fetch_assoc()){
			global $pin_no;
			$pin_no = $row['PIN'];
	}
	//echo "Actual Pin : ".$pin_no;
	


$entered_pin_no  = $_POST["pin_no"];
$amount = $_POST["withdraw_amount"];
$balance;

$sql_get_balance = "SELECT `Balance` FROM `Customers` WHERE `AccountNo` = '$account_no'";
$get_balance_result = $conn->query($sql_get_balance);

while($row = $get_balance_result->fetch_assoc()){
		global $balance;
		$balance = $row['Balance'];
}


if(isset($_POST["pin_no"])&&!empty($_POST["pin_no"])){
		global $entered_pin_no;
		$entered_pin_no = $_POST["pin_no"];
}

if(isset($_POST["withdraw_amount"])&&!empty($_POST["withdraw_amount"])){
		global $amount;
		$amount = $_POST["withdraw_amount"];
}
$updated_balance;

// -1 : pins donot match
// 0 : insufficient balance 
// 1 : successful transaction 
$message ;
function withdraw(){
		global $balance;
		global $amount;
		global $account_no;
		global $pin_no;
		global $entered_pin_no;
		if($pin_no!=$entered_pin_no){
			global $message ;
			$message = "Pin Invalid";
			return -1;
			}
		if($balance<$amount){
			global $message ;
			$message = "Insufficient balance ";
			
			}
		else{
			global $account_no;
			global $updated_balance;
			$updated_balance = $balance - $amount;
			$_SEESION["updated_balance"] = $updated_balance; 
			$sql = "UPDATE `Customers` SET `Balance` = '$updated_balance' WHERE `AccountNo` = '$account_no'";
			global $conn;
			$conn->query($sql);
			global $message ;
			$message = "Successful transaction : Collect Rs ".$amount ;
			
			return 1;
		}
}
$retval = withdraw();
//echo "withdraw Function ".$updated_balance." : ".$retval;

?>
<html>
	<body>
	<br>
	<h3><?= $message ?></h3><br>
	<a href="menu.php">Go back to main menu </a>
	</body>

</html>
