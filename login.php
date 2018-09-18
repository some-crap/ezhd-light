<?
// Страница авторизации
session_start();

// Соединямся с БД
include'config.php';
$link=mysqli_connect(HOST, USERNAME, PASS, DBNAME);

if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняется введенному
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password'])))
    {

        $_SESSION['name'] = $_POST['login'];
        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php");
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
?>
<form method="POST">
Логин <input name="login" type="text" required>

Пароль <input name="password" type="password" required>


<input name="submit" type="submit" value="Войти">
</form>