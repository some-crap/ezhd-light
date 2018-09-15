<?php
function onSuccess() {
	echo "
	Операция выполнена! <br>
	Вы будете перенаправлены на главную в течении 3 секунд";
	
	header("HTTP/1.1 301 Moved Permanently");
    header('Refresh: 3; url=../');
}

function onError($errorCode) {
	echo "
	Ошибка выполнения!<br>
	Вы будете перенаправлены на главную в течении 3 секунд";
	header("HTTP/1.1 301 Moved Permanently");
    header('Refresh: 3; url=../');
}
?>
