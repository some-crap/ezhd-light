<?
// Страница регистрации нового пользователя

// Соединямся с БД
include 'config.php';
$link=mysqli_connect(HOST, USERNAME, PASS, DBNAME);

if(isset($_POST['submit']))
{
    $err = [];

    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9_]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита, цифр и нижнего подчёркивания";
    }

    if(strlen($_POST['login']) < 5 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 5-ти символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login = $_POST['login'];

        // Убераем лишние пробелы и делаем двойное хеширование
        $password = md5(md5(trim($_POST['password'])));
        $klass = $_POST['klass'];
        $bukva = $_POST['bukva'];
        $school = $_POST['school'];
        mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."', school='$klass$bukva$school'");
        session_start();
        $_SESSION['name']=$login;
        header("Location: /"); exit();
    }
    else
    {
        print "При регистрации произошли следующие ошибки:
";
        foreach($err AS $error)
        {
            print $error."
";
        }
    }
}
?>

<form method="POST">
Логин <input name="login" type="text" required><br>
Пароль <input name="password" type="password" required><br>
Класс <input name="klass" type="text" required><br>
Буква <input name="bukva" type="text" required><br>
Школа <input name="school" type="text" required><br>
<input name="submit" type="submit" value="Зарегистрироваться">
</form>