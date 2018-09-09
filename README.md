В файле config.php подставить свои значения
В файле index.php подставить свои значения
Для создания таблицы в БД выполнить запрос: 

CREATE TABLE `database_name`.`table_homework` ( `id` INT NOT NULL AUTO_INCREMENT , `timestamp` INT NOT NULL , `subject` TEXT NOT NULL , `hometask` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

В запросе необходимо подставить имя своей БД


Всё это работает на хостинге с PHP

Для администрирования используется https://play.google.com/store/apps/details?id=com.churkinapps.lightschool&hl=ru 
Настройки -> Домашние задания -> Администрировать сервер заданий

Часть файлов и api взяты с https://churkinapps.wordpress.com/
