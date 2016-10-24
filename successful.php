<?php

$servername = "localhost";
$username = "root";
$password = "27028885";
$database = "ATM_System";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

global $checkQuery;
$checkQuery = "SELECT AccountNo FROM Customers WHERE AccountNo = $account_no";

global $query;

$query = "INSERT INTO Customers VALUES ('$account_no','$pin_no','$contact_no','$balance')";

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
$pins_match_err = "";

global $all_fine ;
$all_fine = 1;

if(empty($account_no)){
    $account_no_err = "Account number is required<br>";
    $all_fine=0;
}

if(empty($pin_no)){
	$pin_no_err = "Pin Number required<br>";
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

function check(){
	global $all_fine;
	global $user_exists;
	$user_exists = 0;
		
	//checking for pins 
	global $pin_no;
	global $re_pin_no;
	$equal = strcmp($pin_no,$re_pin_no);
	if($equal!=0){
		global $all_fine;
		$all_fine=0;
		global $re_pin_no_err;
		$re_pin_no_err="Pins do not match <br>";
	}
	else{
		global $re_pin_no_err;
		$re_pin_no_err="";
	}
	global $conn;
	global $account_no;
	$checkQuery = "SELECT AccountNo FROM Customers WHERE AccountNo = '$account_no'";
	$result = $conn->query($checkQuery);
	$count = mysqli_num_rows($result);
	if($count != 0 ){
		
		global $user_exists;
		$user_exists = 1;
		echo "user Exists value  : $user_exists";
	}
	
	echo "user Exists value  : $user_exists";
	global $all_fine;
	global $user_exists;
	
	if($all_fine!=0&&$user_exists==0){
		
		global $pins_match;global $account_no;global $pin_no;global $contact_no ;global $balance;
		global $conn;
		global $query;
		$query = "INSERT INTO Customers VALUES ('$account_no','$pin_no','$contact_no','$balance')";
		$conn->query($query) ;		
			echo "New record created successfully <br><br>";
	    
			echo "Account Number : $account_no <br> Pin Number : $pin_no<br> Contact Number : $contact_no<br> Balance :$balance <br>" ;
			echo "Error: " . $sql . "<br>" . $conn->error;
		
	}
		
	else if($all_fine==1){
		echo " Account number already Exists , please Login ";	
		echo "Error: " . "<br>" . $conn->error;
			
	}
	
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
		global $pins_match_err;global  $account_no_err;global  $pin_no_err;global  $re_pin_no_err;global  $contact_no_err ;global $balance_err;
		echo " <br> $pins_match_err $account_no_err $pin_no_err $re_pin_no_err $contact_no_err $balance_err " ;

	}
}
// Main function call , for executing registering new user  !

check();

?>
<DOCTYPE html>

<html>
	
	<head>
	</head>
	
	<body>
	
	</body>
	
	<script>
	
	</script>



</html>


</DOCTYPE>
