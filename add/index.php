<?php

echo'<head>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="http://www.modernizr.com/downloads/modernizr-latest.js"></script>
	<script type="text/javascript" src="placeholder.js"></script>
</head>
<body>
<form id="slick-login" action="../addHomework.php" method="post" enctype="multipart/form-data">
	<label for="password">Токен</label><input type="password" name="admin_token" class="placeholder" placeholder="token">
    <label for="username">Предмет:</label><input type="text" name="subject" class="placeholder" placeholder="Предмет">
	<label for="username">Задание</label><textarea input type="text" name="hometask" class="placeholder" placeholder="Задание"></textarea>
	<label for="username">Выполнить до</label><input type="text" name="timestamp" class="placeholder" placeholder="ГГГГ-ММ-ДД">
	<input type="submit" value="Добавить задание" />
</form>';

?>
