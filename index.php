<?php
setlocale(LC_ALL, 'ru_RU');
include 'config.php';

$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);

$link = mysqli_connect('DB_HOST','DB_USER', 'DB_UESR_PASS','DB_NAME');
mysqli_set_charset($link, "utf8");

$res=mysqli_query($link,"SELECT * FROM table_homework");
echo ' 
<style>
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
echo '<body style="background-color: #252F48; color: #CAD4D6;">';
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

  echo'</body>';
  
  
  
?>
