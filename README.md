В файле config.php подставить свои значения
В файле index.php подставить свои значения
Для создания таблицы в БД выполнить запрос: 

CREATE TABLE 'BD_NAME'.'table_homework' ( 'id' INT NOT NULL AUTO_INCREMENT , 'timestamp' INT NOT NULL , 'subject' TEXT NOT NULL , 'hometask' TEXT NOT NULL , PRIMARY KEY (id)) ENGINE = InnoDB

В запросе необходимо подставить имя своей БД


Всё это работает на хостинге с PHP
