<?php 
	require 'db.php';
	include 'config.php';
	
	
	
	
	$link= new mysqli(HOST, USERNAME, PASS, DBNAME);

mysqli_set_charset($link, "utf8_general_ci");
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
$res=mysqli_query($link,"SELECT * FROM table_homework WHERE `timestamp`> $temp");
//echo "SELECT * FROM table_homework WHERE `timestamp`> $temp";
echo ' 
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
</style>';
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
echo "</center>";
echo "Время сервера по МСК: ";
date_default_timezone_set("UTC"); // Устанавливаем часовой пояс по Гринвичу
  $time = time(); // Вот это значение отправляем в базу
  $offset = 3; // Допустим, у пользователя смещение относительно Гринвича составляет +3 часа
  $time += 3 * 3600; // Добавляем 3 часа к времени по Гринвичу
  echo date("d-m-Y H:i:s", $time); // Выводим время пользователя, согласно его часовому поясу
  echo'<br> У нас есть бот в телеграмме! <a href="http://t-do.ru/HomeworkRobot" class="content"> @HomeworkRobot </a><br>';
	
	
	
	

if ( isset ($_SESSION['logged_user']) ) : ?>
<br>
<br>
<table>
    <tr><td>Добавить</td><td>Удалить</td><td>Редактировать</td></tr>
    <tr><td> <form id="slick-login" action="add.php" method="post"><br>
    <input type="text" name="subject" class="placeholder" placeholder="Предмет"><br>
	<textarea input type="text" name="hometask" class="placeholder" placeholder="Задание"></textarea><br>
	<input type="text" name="timestamp" class="placeholder" placeholder="ГГГГ-ММ-ДД"><br>
	<input type="submit"  id="slick-login" value="Добавить задание" />
	</form>
</form> </td><td> 
    <form action="delete.php" id="slick-delete" method="post">
	<input type="text" name="num" class="placeholder" placeholder="id "задания><br>
	<input type="submit"  id="slick-delete" value="Удалить задание" />
	</form>
</td><td>
    <form id="slick-login" action="edit.php" method="post" enctype="multipart/form-data"><br>
    <input type="text" name="id" class="placeholder" placeholder="id"><br>
	<input type="text" name="subject" class="placeholder" placeholder="Предмет"><br>
	<textarea input type="text" name="hometask"  class="placeholder" placeholder="Задание"></textarea><br />
	<input type="submit" value="Редактировать" /> </td></tr>
</table>
	<a href="logout.php" class="content">Выйти</a>

<?php else : ?>
Вы не авторизованы<br/>
<a href="/login.php" class="content">Вход для учителей</a><br>
<a href="/signup.php" class="content"></a>
<?php endif; ?>

