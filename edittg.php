<?php
include 'config.php';
include 'print_response.php';

if(isset($_GET['admin_token']) && isset($_GET['id']) && isset($_GET['subject']) && isset($_GET['hometask'])) {

	$id = trim($_GET['id']);
	$subject = trim($_GET['subject']);
	$hometask = trim($_GET['hometask']);
	
	if(empty($id) || empty($subject) || empty($hometask)) {
		onError(1);
		exit();
	}
	else if(!(strcmp($_GET['admin_token'], ADMIN_TOKEN) == 0)) {
		onError(2);
		exit();
	}

	$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);

	$stmt = $mysqli->prepare("UPDATE table_homework SET subject = ?, hometask = ? WHERE id=?");
	if($stmt === false) {
		die ("Mysql Error: " . $mysqli->error);
	}
	$stmt->bind_param('ssi', $subject, $hometask, $id);
	$stmt->execute();
	$mysqli->close();
	onSuccess();
}
else {
	onError(1);
}	
?>