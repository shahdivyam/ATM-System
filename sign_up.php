<?php
echo "Hello World Namo Arihntaram "
?>
<html>
<head>
	<title>Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<!--Main Code goes here-->
<body>
	<div class="container">

		<h1 align="center"><u>Register For ATM </u></h1>

		<form method="post" action = "successful.php" class="form-horizontal" style="position:relative; left:30%;">
			<div class="form-group">
			<div class="col-xs-5">
					<label for="Account">Account Number : </label>
					<input
                     name="account_no" class="form-control" type="text" placeholder="Enter your account Number">
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-3">
					<label for="pin">PIN Number : </label>
					<input
                           name="pin_no"
                           class="form-control" type="password" placeholder="Enter your 4 digit PIN">
				</div>
			</div>
            <div class="form-group">
                <div class="col-xs-4">
                    <label for="confirmPin">
                    Re-Enter Pin Number :
                    </label>
                    <input class="form-control"
                           name="re_pin_no"
                           type="password" placeholder="Re-Enter Pin">
                </div>
            </div>
			<div class="form-group">
				<div class="col-xs-3">
					<label for="contact">Enter your Contact Number : </label>
					<input
                           name="contact_no"class="form-control" type="text" >
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-4">
					<label for="balance">Enter Initial Account Balance : </label>
					<input
                           name  ="balance"class="form-control" type="text">
				</div>
			</div>
			<br>
			<button type="submit" class="btn btn-default">Submit Data</button>
		</form>
	</div>

</body>
</html>
