<?php

echo'
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="http://www.modernizr.com/downloads/modernizr-latest.js"></script>
	<script type="text/javascript" src="placeholder.js"></script>
</head>
<body>
<form id="slick-login" action="action.php" method="post" enctype="multipart/form-data">
	<label for="password">Token</label><input type="password" name="admin_token" class="placeholder" placeholder="token">
	<label for="username">id</label><input type="text" name="id" class="placeholder" placeholder="id">
	<label for="username">Предмет</label><input type="text" name="subject" class="placeholder" placeholder="Предмет">
	<label for="username">Задание</label><textarea input type="text" name="hometask"  class="placeholder" placeholder="Задание"></textarea><br />
	<input type="submit" value="Отправить форму" />
</form>';

?>