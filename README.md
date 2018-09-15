В файле config.php подставить свои значения
Для создания таблицы в БД выполнить запрос: 

CREATE TABLE `'database_name(своё)'`.`'table_homework'` ( `'id'` INT NOT NULL AUTO_INCREMENT , `'timestamp'` INT NOT NULL , `'subject'` TEXT NOT NULL , `'hometask'` TEXT NOT NULL , PRIMARY KEY (`'id'`)) ENGINE = InnoDB;

В запросе необходимо подставить имя своей БД

В файле db.php просто подставить имя своей БД, пользователя и пароль.

После перейти на страницу твойсайт/signup.php и произвести регистрацию.

После регистрации удалить файл signup.php.

P.S. всё это будет работать только в корне сайта


Всё это работает на хостинге с PHP

