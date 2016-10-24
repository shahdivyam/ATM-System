<?php
$account_no = $_POST["account_no"];
$pin_no = $_POST["pin_no"];
$re_pin_no = $_POST["re_pin_no"];
$contact_no = $_POST["contact_no"];
$balance = $_POST["balance"];
$account_no_err="";
$pin_no_err="";
$re_pin_no_err="";
$contact_no_err="";
$balance_err="";
$all_fine = 1;
$pins_match_err = "Pins Do not Match , Please re-enter<br>";
if(empty($account_no)){
    $account_no_err="Account number is required<br>";
    $all_fine=0;
}
if(empty($pin_no)){
	$pin_no_err = "Pin Number required<br>";
	$all_fine=0;
	}
if(empty($account_no)){
    $account_no_err="Account number is required <br>";
    $all_fine=0;
}
if(empty($re_pin_no)){
	$re_pin_no_err = "Confirm Pin Number required<br>";
	$all_fine=0;
	}
if(empty($contact_no)){
    $contact_no_err="Contact number is required<br>" ;
    $all_fine=0;
}
if(empty($balance)){
	$balance_err = "Initial balance required<br>";
	$all_fine=0;
	}
// issue with pin match function , always returning 0;
function pinsMatch($num1,$num2){
	$retval = 1;
	if(empty($pin_no)||empty($re_pin_no)){
		$retval = 0;
	}
	$check = strcmp($num1,$num2);
	
	if($check!=0){
		$retval = 0;
	}
	if($retval==1){
		$re_pin_no=" ";
	}
	
	return $retval;	
	}
function isOk(){
	$pin = pinsMatch($pin_no,$re_pin_no);
	if($pin==1&&$all_fine==1){
		mysql_query($query);
		global $pins_match_err;
		$pins_match_err="";
		return 1;
	}
	return 0;
}
//echo "$account_no $pin_no $re_pin_no $contact_no $balance " ;
//echo "$account_no_err $pin_no_err $re_pin_no_err $contact_no_err $balance_err " ;
$servername = "localhost";
$username = "root";
$password = "27028885";
$database = "ATM_System";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);
$query = "INSERT INTO Customers VALUES ($account_no,$pin_no,$contact_no,$balance )";
//+$conn = ($dbhost, $dbuser, $dbpass)
// Check connection
$success = isOk();
if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
    echo "Account Number : $account_no Pin Number : $pin_no Contact Number : $contact_no Balance :$balance " ;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "$pins_match_err $account_no_err $pin_no_err $re_pin_no_err $contact_no_err $balance_err " ;
}
/*if($success==1){
	
	echo "Successful <br>";
	echo "Account Number : $account_no Pin Number : $pin_no Contact Number : $contact_no Balance :$balance " ;
}
else{
	//mysql_query($query);
	echo " Following errors occurred<br> ";
	echo "$pins_match_err $account_no_err $pin_no_err $re_pin_no_err $contact_no_err $balance_err " ;
}
* */
?>
