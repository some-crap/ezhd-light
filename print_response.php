<?php
function onSuccess() {
	echo "{\"response_code\": 1}";
}

function onError($errorCode) {
	echo "{\"response_code\": 0,  \"error_code\": $errorCode}";
}
?>