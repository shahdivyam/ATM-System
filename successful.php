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
$pinsMatch_err = "Pins Do not Match , Please re-enter";
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
/*function pinsMatch($num1,$num2){
	if(empty(pin_no)||empty(re_pin_no)){
		return 0;
		}
	int check = strcomp($num1,$num2);
	if(check!=0){
		return 0;
		}
	
	return 1;	
	}
	*/
echo" hello :  
$account_no
$pin_no
$re_pin_no
$contact_no
$balance 

$account_no_err;
$pin_no_err;
$re_pin_no_err;
$contact_no_err;
$balance_err; " ;

?>
