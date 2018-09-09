<?php
include 'config.php';

$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME); // Не ТРОГАТЬ!

$link = mysqli_connect('DBHOST','DB_USER', 'DB_USER_PASS','DB_NAME'); // Только тут подставляем свои данные
mysqli_set_charset($link, "utf8");

$res=mysqli_query($link,"SELECT * FROM table_homework");
echo " 
<style>
table {
    width: 100%;
}
</style>";
echo "<center>";
echo "<table border=\"1\">
   <caption>Домашнее задание</caption>
   <tr>
    <th>ID задания <br> в БД</th>
    <th>Выполнить до</th>
    <th>Предмет</th>
    <th>Задание</th>
   </tr>";
   
while($row = mysqli_fetch_array($res))
{
  echo "<tr><td>".$row['id']."</td><td>"  .gmdate("d-m-Y", $row['timestamp'])."</td><td>".$row['subject']."</td><td>".$row['hometask']."</td></tr>";  
}  
echo "</table>";
echo "</center>";
echo "<br> Что-то не работает? Пиши <a href='mailto:admin@email.ru'> admin@email.ru</a><br>";
echo "Время сервера по МСК: ";
date_default_timezone_set("UTC"); // Устанавливаем часовой пояс по Гринвичу
  $time = time(); // Вот это значение отправляем в базу
  $offset = 3; // Допустим, у пользователя смещение относительно Гринвича составляет +3 часа
  $time += 3 * 3600; // Добавляем 3 часа к времени по Гринвичу
  echo date("d-m-Y H:i:s", $time); // Выводим время пользователя, согласно его часовому поясу

  
  
  
  
?>