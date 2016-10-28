<?php
session_start();
include ("connect.php");
global $conn;
$entered_old_pin = $_POST["old_pin"];
$new_pin = $_POST["pin"];
$re_new_pin = $_POST["re_pin"];
$real_pin;
$acc_no = $_SESSION["acc_no"];

$sql_get_pin = "SELECT `PIN` FROM `Users` WHERE `Account_No` = '$acc_no'";
$result_sql_get_pin = $conn->query($sql_get_pin);
while($row = $result_sql_get_pin->fetch_assoc()){
		global $real_pin;
		$real_pin = $row["PIN"];  
	}
echo "real $real_pin ";
echo "entered"."$entered_old_pin";
// 1 : successful
// 0 : old pin inorrect
// -1 : new pins do not match;
// -2 : empty values ;
function changePin(){
	global $entered_old_pin ;
	global $new_pin ;
	global $re_new_pin ;
	global $real_pin ;
	
	if(!empty($entered_old_pin)&&!empty($new_pin)&&!empty($re_new_pin)){
			global $entered_old_pin ;
			global $new_pin ;
			global $re_new_pin ;
			global $real_pin ;
			if($entered_old_pin==$real_pin&&$new_pin==$re_new_pin){
				return 1;
				}
			if($entered_old_pin!=$real_pin){
				return 0;
				}
			if($new_pin!=$re_new_pin){
				return -1;
				}
		}
	else{
			return -2;
		}
	
	}
$retval = changePin();
if($retval==-2){
	echo "Empty values , please fill all the fields"."<br>";
	echo "<a href='pinChange.html'>";
	echo  "Try again"."</a>";
	}
	
if($retval==-1){
	echo "New Pin's do not match "."<br>";
	echo "<a href='pinChange.html'>"."Try again"."</a>";
	
	}
if($retval==0){
	echo "Old Pin incorrect "."<br>";
	echo "<a href='pinChange.html'>"."Try again"."</a>";
	
	}
else{
	global $new_pin;
	global $acc_no;
	global $conn;
	$sql_update_pin_user = "UPDATE `Users` SET `PIN` = '$new_pin' WHERE `Account_No` = '$acc_no'";
	$sql_update_pin_customer = "UPDATE `Customers` SET `Pin` = '$new_pin' WHERE `AccountNo` = '$acc_no'";
	$conn->query($sql_update_pin_user);
	$conn->query($sql_update_pin_customer);
	
	echo "PIN Change Succesful <br> ";
	echo "<a href = 'menu.php'> Main Menu </a>";
	
	}




?>

<html>

<body>
</body>
</html>
