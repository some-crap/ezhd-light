<?php 
include 'config.php';
session_start();

$link= new mysqli(HOST, USERNAME, PASS, DBNAME);
mysqli_set_charset($link, "utf8_general_ci");

$tim=date("H",time())+3; //если нужно допиши свой часовой пояс (сейчас он по Москве), например $tim=date("H",time())+5;
if($tim>16)
{
    $temp =  mktime(0,0,0)+24*60*60;
}
else
{
    $temp = mktime(0,0,0);
};

$res=mysqli_query($link,"SELECT * FROM table_homework WHERE `timestamp`> $temp");
echo ' 
<head>
<style>
a.content {
    color: white;
}
.table_dark {
  font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  font-size: 14px;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
  background: #252F48;
  margin: 1px;
}
.table_dark th {
  color: #EDB749;
  border-bottom: 1px solid #37B5A5;
  padding: 12px 17px;
}
.table_dark td {
  color: #CAD4D6;
  border-bottom: 1px solid #37B5A5;
  border-right:1px solid #37B5A5;
  padding: 7px 17px;
}
.table_dark tr:last-child td {
  border-bottom: none;
}
.table_dark td:last-child {
  border-right: none;
}
.table_dark tr:hover td {
  text-decoration: underline;
}
.spoiler-content{
display:none;
padding:15px 20px;
border:3px solid #ccc;
margin-top:5px;
background: #252F51;

}
.spoiler-block{
margin-top:10px; 
}
.spoiler-title {
border:1px solid #B9B9B9;
background: #ccc;
background:linear-gradient(#CACACA, #E8E8E8);
padding:10px;
text-decoration:none;
color:#000;
display:block;
}

</style> 
<script src="jquery-latest.js" type="text/javascript"></script>
</head>
<body>';
//стили закончились, выводим саму домашку
echo "<center>";
echo '<body style="background-color: #252F48; color: #CAD4D6 ;">';
echo '<table class="table_dark">
<caption>Домашнее задание</caption>
<tr>
    <th>ID задания <br> в БД</th>
    <th>Выполнить до</th>
    <th>Предмет</th>
    <th>Задание</th>
</tr>';
   
while($row = mysqli_fetch_array($res))
{
  echo "<tr><td>".$row['id']."</td><td>"  .gmdate("d-m-Y", $row['timestamp'])."</td><td>".$row['subject']."</td><td>".$row['hometask']."</td></tr>";  
}  
echo "</table>";
echo "</center>"; //всё вывели =D
echo "Время сервера по МСК: ";
date_default_timezone_set("UTC"); // Устанавливаем часовой пояс по Гринвичу
$time = time(); // Вот это значение отправляем в базу
$offset = 3; // Допустим, у пользователя смещение относительно Гринвича составляет +3 часа
$time += 3 * 3600; // Добавляем 3 часа к времени по Гринвичу
echo date("d-m-Y H:i:s", $time); // Выводим время пользователя, согласно его часовому поясу
echo'<br> У нас есть бот в телеграмме! <a href="http://t-do.ru/HomeworkRobot" class="content"> @HomeworkRobot </a><br>';
	//дальше пошла админ-палень, лучше не трогай =D
$temp = $_SESSION['name'];
mysqli_set_charset($link, "cp1251_general_ci");
$res=mysqli_query($link,"SELECT * FROM users WHERE `user_login` = '$temp'");
$row = mysqli_fetch_array($res);
$temp=$row['usertype'];

if(!(is_null($_SESSION['name'])))
{
    echo'<br>Привет, ';
    echo $_SESSION['name'];
};

if ($temp == 1 || $temp == 2) {
    echo '
    <br>
    <br>
	<div class="spoiler-block">
		<a href="#" class="spoiler-title">Управление ДЗ</a>
		<div class="spoiler-content">
		    <center> 
    <table width=90%>
        <font colour="black">
        <tr><td>Добавить</td><td>Удалить</td><td>Редактировать</td></tr>
        <tr><td> <form id="slick-login" action="add.php" method="post"><br>
        <input type="hidden" name="admin_token" value="07atd2003"><br>
        <input type="text" name="subject" class="placeholder" placeholder="Предмет"><br>
	    <textarea input type="text" name="hometask" class="placeholder" placeholder="Задание"></textarea><br>               
	    <input type="text" name="timestamp" class="placeholder" placeholder="ГГГГ-ММ-ДД"><br>
	    Например, 2019-01-19
	    <br>
	    <input type="submit"  id="slick-login" value="Добавить задание" />
	    </form>
    </td><td> 
        <form action="delete.php" id="slick-delete" method="post">
        <input type="hidden" name="admin_token" value="07atd2003"><br>
	    <input type="text" name="id" class="placeholder" placeholder="id "задания><br>               
	    <input type="submit"  id="slick-delete" value="Удалить задание" />
	    </form>
    </td><td>
        <form id="slick-login" action="edit.php" method="post" enctype="multipart/form-data"><br>
        <input type="hidden" name="admin_token" value="07atd2003"><br>
        <input type="text" name="id" class="placeholder" placeholder="id"><br>
	    <input type="text" name="subject" class="placeholder" placeholder="Предмет"><br>
	    <textarea input type="text" name="hometask"  class="placeholder" placeholder="Задание"></textarea><br />               
	    <input type="submit" value="Редактировать" /> 
	    </form>
	</td></tr>
</table></center>
</div> 
	</div>';
};
if ($temp == 1)
{
	echo'
	<script type="text/javascript"> 
    $(document).ready(function(){ 
    $(".spoiler-title").click(function(){ 
    $(this).parent().children("div.spoiler-content").toggle("fast");
    return false;
    });
    });
    </script>';
};

if ($temp == 2) {
echo '
	<br>
	
	<div class="spoiler-block">
	<a href="#" class="spoiler-title">Управление пользователями</a>
	<div class="spoiler-content">
	<table>
    <font colour="black">
    <tr><td>Управление</td><td>Инструкция</td><td>Смена пароля пользователя</td></tr>
    <tr><td>
	<form id="slick-login" action="permissions.php" method="post" enctype="multipart/form-data"><br>
    <input type="text" name="login" class="placeholder" placeholder="login"><br>
	<input type="text" name="usertype" class="placeholder" placeholder="usertype">    <br>
	<input type="submit" value="Редактировать" />
	</form></td>
	<td>В поле "login" необходимо подставить имя пользователя <br>
	В поле "usertype" необходимо вписать права доступа: <br>
	0 -обычный пользователь<br>
	1 -модератор(управляет ДЗ)<br>
	2 -администратор(управляет пользователями и ДЗ)</td>
	<td>
	<form id="slick-login" action="changepass.php" method="post" enctype="multipart/form-data"><br>
    <input type="text" name="login" class="placeholder" placeholder="login"><br>
	<input type="password" name="pass" class="placeholder" placeholder="password"><br>
	<input type="submit" value="Сменить пользователю пароль" />
	</form>
	</td>
	</tr>
	</table>
	</form>
	</div>
	</div>
	<script type="text/javascript"> 
$(document).ready(function(){ 
$(".spoiler-title").click(function(){ 
$(this).parent().children("div.spoiler-content").toggle("fast");
return false;
});
});
</script>';
}
else
{
if (is_null($_SESSION['name'])){
    echo'
    Вы не авторизованы<br/>
    <a href="/login.php" class="content">Вход</a><br>
    <a href="/register.php" class="content">Регистрация</a>';
}
};

if(!(is_null($_SESSION['name'])))
{
    echo'<br><a href="/logout.php" class="content">Выход</a><br>';
};

echo'
</script>
<br>
<br>Онлайн радио (для тех, кому надоел свой плейлист) <br>
<audio controls>
<source src="http://ic7.101.ru:8000/a99">
</audio>

</body>';
?>