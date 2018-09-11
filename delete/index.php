<?php
echo'<head>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="http://www.modernizr.com/downloads/modernizr-latest.js"></script>
	<script type="text/javascript" src="placeholder.js"></script>
</head>
<body>
<form id="slick-login" action="action.php" method="post" enctype="multipart/form-data">
	<label for="username">Токен</label> <input type="password" name="admin_token" class="placeholder" placeholder="token">
	<label for="username">ID задания</label> <input type="text" name="id" class="placeholder" placeholder="id">
	<input type="submit" value="Удалить задание" />
</form>
</body>';

?>