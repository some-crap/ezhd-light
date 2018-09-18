<?php
include 'config.php';
include 'print_response.php';

if(isset($_GET['admin_token']) && isset($_GET['id'])) {

	$id = trim($_GET['id']);
	if(empty($id)){
		onError(1);
		exit();
	}
	else if(!(strcmp($_GET['admin_token'], ADMIN_TOKEN) == 0)) {
		onError(2);
		exit();
	}

	$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);

	$stmt = $mysqli->prepare("DELETE FROM table_homework WHERE id=?");
	if($stmt === false) {
		die ("Mysql Error: " . $mysqli->error);
	}
	$stmt->bind_param('i', $_GET['id']);
	$stmt->execute();
	
	$mysqli->close();
	onSuccess();
}
else{
	onError(1);
}	
?>