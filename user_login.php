<?php

session_start() ;


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "27028885";
$dbname = "ATM_System";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);

if (isset($_POST["account_no"]) && isset($_POST["pin_no"]))

{
	$account_no = $_POST["account_no"];
	$pin_no = $_POST["pin_no"];
	
	$sql1 = "SELECT Account_No, PIN FROM Users WHERE Account_No = '$account_no' AND PIN = '$pin_no'"; #MySQL Query
	global $conn;
	$result_sql1  = $conn->query($sql1); 
	$count_result_sql1 = mysqli_num_rows($result_sql1);
	
	
		
		if($count_result_sql1 == 0) # 0 rows returned 
		{
			echo "<br>"."Invalid Account No./PIN Combination";
		}

		else if ($count_result_sql1 == 1) # Valid Data Found
		{	
			global $acc_no ;
			global $result_sql1;
			while($row = $result_sql1->fetch_assoc()){
				global $acc_no;
				echo "inside while loop ".$acc_no;
				$acc_no = $row["Account_No"];
				$_SESSION["acc_no"] = $acc_no;
			}
			
		 	
		 	echo "varaiable $acc_no : ".$acc_no ;

		 	$_SESSION['acc_no'] = $acc_no; #For Session Variable
		 	echo "Seesion : ".$_SESSION['acc_no'];
		 	header('Location: menu.php'); #Target Location
		}
	
}
?>
