<?php
include 'config.php';
include 'print_response.php';

if(isset($_GET['admin_token']) && isset($_GET['timestamp']) && isset($_GET['subject']) && isset($_GET['hometask'])) {
	$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);
	
	$timestamp = trim($_GET['timestamp']);
	$subject = trim($_GET['subject']);
	$hometask = trim($_GET['hometask']);
	
	if(empty($timestamp) || empty($subject) || empty($hometask)) {
		onError(1);
		exit();
	}
	else if(!(strcmp($_GET['admin_token'], ADMIN_TOKEN) == 0)) {
		onError(2);
		exit();
	}
	
	$stmt = $mysqli->prepare("INSERT INTO table_homework (timestamp, subject, hometask) VALUES (?, ?, ?)");
	if($stmt === false) {
		die ("Mysql Error: " . $mysqli->error);
	}
	$stmt->bind_param('iss', $timestamp, $subject, $hometask);
	$stmt->execute();
	$mysqli->close();
	onSuccess();
}
else {
	onError(1);
}	
?>