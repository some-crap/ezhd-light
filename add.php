<?php
include 'config.php';
include 'response.php';
if(isset($_POST['admin_token']) && isset($_POST['timestamp']) && isset($_POST['subject']) && isset($_POST['hometask'])) {
	$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);
	
	$date = trim($_POST['timestamp']);
	$subject = trim($_POST['subject']);
	$hometask = trim($_POST['hometask']);
	$timestamp = strtotime($date)+10800;
	
	if(empty($timestamp) || empty($subject) || empty($hometask)) {
		onError(1);
		exit();
	}
	else if(!(strcmp($_POST['admin_token'], ADMIN_TOKEN) == 0)) {
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