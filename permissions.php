<?php
include 'config.php';
session_start();
$temp = $_SESSION['name'];
$link= new mysqli(HOST, USERNAME, PASS, DBNAME);
mysqli_set_charset($link, "cp1251_general_ci");
$res=mysqli_query($link,"SELECT * FROM users WHERE `user_login` = '$temp'");
$row = mysqli_fetch_array($res);
$temp=$row['usertype'];

$login = mb_strtolower($_POST['login']);
if($temp == 2)
{
    $usertype=$_POST['usertype'];
    if ($login == admin)
    {
        echo'Ата-та негоже так делать =) <br>
        Вы будете перенаправлены на главную в течении 3 секунд!';
        header("HTTP/1.1 301 Moved Permanently");
        header('Refresh: 3; url=../');
    }
else
    {
        mysqli_query($link,"UPDATE `users` SET `usertype`= '$usertype' WHERE `user_login` = '$login'");
        echo'
        Операция выполнена!<br>
        Вы будете перенаправлены на главную в течении 3 секунд!
        ';
        header("HTTP/1.1 301 Moved Permanently");
        header('Refresh: 3; url=../');
    };
}
else
{
    echo'Недостаточно прав.<br>
    Вы будете перенаправлены на главную в течении 3 секунд!';
    header("HTTP/1.1 301 Moved Permanently");
    header('Refresh: 3; url=../');
}
?>