<?php
	$firstName = $_POST['first_name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$plotsize = $_POST['plotsize'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','adminn','adm@123in','malu_adminphp','3306');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, mobile, email, plotsize, message) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sisss", $firstName, $mobile, $email, $plotsize, $message);
		$stmt->execute();
		
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>