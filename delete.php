<?php
include 'config.php';
include 'response.php';

if(isset($_POST['num'])) {

	$id = trim($_POST['num']);
	if(empty($id)){
		onError(1);
		exit();
	}
	

	$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);

	$stmt = $mysqli->prepare("DELETE FROM table_homework WHERE id=?");
	if($stmt === false) {
		die ("Mysql Error: " . $mysqli->error);
	}
	$stmt->bind_param('i', $_POST['num']);
	$stmt->execute();
	
	$mysqli->close();
	onSuccess();
}
else{
	onError(1);
}	
?>