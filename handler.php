<?php
if (!isset($_REQUEST)) {
    return;
}
//Строка для подтверждения адреса сервера из настроек Callback API
$confirmationToken = '';
//Ключ доступа сообщества
$token = '';
// Secret key
$secretKey = '';
//Получаем и декодируем уведомление
$data = json_decode(file_get_contents('php://input'));
// проверяем secretKey
if (strcmp($data->secret, $secretKey) !== 0 && strcmp($data->type, 'confirmation') !== 0)
    return;
//Проверяем, что находится в поле "type"
switch ($data->type) {
    //Если это уведомление для подтверждения адреса сервера...
    case 'confirmation':
        //...отправляем строку для подтверждения адреса
        echo $confirmationToken;
        break;
    //Если это уведомление о новом сообщении...
    case 'message_new':
        //...получаем id его автора
        $userId = $data->object->user_id;
        $serv = 'https://www.engineer-school.space/bot.php';
        //С помощью messages.send и токена сообщества отправляем ответное сообщение
        $request_params = array(
            'message' => "{$serv}",
            'user_id' => $userId,
            'access_token' => $token,
            'v' => '5.0'
        );
        $get_params = http_build_query($request_params);
        file_get_contents('https://api.vk.com/method/messages.send?' . $get_params);
        //Возвращаем "ok" серверу Callback API
        echo('ok');
        break;
    
}
?>
