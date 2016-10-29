<?php
session_start();
include ("connect.php");
global $conn;

$cheque_no = $_POST["cheque_no"];
$amount = $_POST["deposit_amount"];
$acc_no = $_SESSION["acc_no"];

$sql_deposit = "INSERT INTO `Deposit` VALUES ('$acc_no','$cheque_no','$amount')";
$conn->query($sql_deposit);


?>
