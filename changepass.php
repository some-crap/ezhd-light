<?php
include 'config.php';
session_start();
$link=mysqli_connect(HOST, USERNAME, PASS, DBNAME);
mysqli_set_charset($link, "cp1251_general_ci");
$temp = $_SESSION['name'];
$res=mysqli_query($link,"SELECT * FROM users WHERE `user_login` = '$temp'");
$row = mysqli_fetch_array($res);
$temp=$row['usertype'];
if ($temp == 2 || mb_strtolower($_POST['login']) == mb_strtolower($_SESSION['name']))
{
    if ( mb_strtolower($_POST['login']) == admin and  !(mb_strtolower($_SESSION['name']) == admin))
    {
        echo'Ты тут не думай, что сможешь отжать у МЕНЯ админку!';
        header("HTTP/1.1 301 Moved Permanently");
        header('Refresh: 3; url=../');
    }
    else
    {
        $login=$_POST['login'];
        $pass=md5(md5($_POST['pass']));
        mysqli_query($link,"UPDATE `homework54`.`users` SET `user_password` = '$pass' WHERE `users`.`user_login` ='$login';");
        echo'Операция выполнена.<br>
        Вы будете перенаправлены на главную в теччении 3 секунд.';
        header("HTTP/1.1 301 Moved Permanently");
        header('Refresh: 3; url=../');
    };
    
}
else
{
    echo'У Вас недостаточно прав.<br>
    Вы будете перенаправлены на главную в теччении 3 секунд.';
    header("HTTP/1.1 301 Moved Permanently");
    header('Refresh: 3; url=../');
};
?>