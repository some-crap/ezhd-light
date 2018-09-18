<?php
session_start();
$check = $_SESSION['name'];
echo'Привет, ';
echo $check;
	header("HTTP/1.1 301 Moved Permanently");
    header('Refresh: 2; url=../');
?>