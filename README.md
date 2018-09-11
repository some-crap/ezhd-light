В файле config.php подставить свои значения
Для создания таблицы в БД выполнить запрос: 

CREATE TABLE `'database_name(своё)'`.`'table_homework'` ( `'id'` INT NOT NULL AUTO_INCREMENT , `'timestamp'` INT NOT NULL , `'subject'` TEXT NOT NULL , `'hometask'` TEXT NOT NULL , PRIMARY KEY (`'id'`)) ENGINE = InnoDB;

В запросе необходимо подставить имя своей БД


Всё это работает на хостинге с PHP

Интегрировано с https://play.google.com/store/apps/details?id=com.churkinapps.lightschool&hl=ru 
Настройки -> Домашние задания

Часть файлов и api взяты с https://churkinapps.wordpress.com/
