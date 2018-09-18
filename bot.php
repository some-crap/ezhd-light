<?php
include 'config.php';
include 'print_response.php';



$tim=date("H",time());
if($tim>16)
{
    //искать задания больше завтрашнего дня 00.00
    $temp =  mktime(0,0,0)+24*60*60;
}
else
{
    //от сегодня с 00.00
    $temp = mktime(0,0,0);
}


$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);
$stmt = $mysqli->prepare("SELECT id, timestamp, subject, hometask FROM table_homework WHERE `timestamp`> $temp");


if($stmt === false) {
	die ("Mysql Error: " . $mysqli->error);
}
$stmt->execute();
$hometasks_array = array();
$stmt->bind_result($id, $timestamp, $subject, $hometask);
$counter = 0; 
while ( $stmt->fetch() ) {
    $hometasks_array[$counter] = array('task_id' => $id, 'date' => $timestamp, 'subject' => $subject, 'hometask' => $hometask);
    $counter++;
}
echo $hometasks_array;
$mysqli->close();	
?>