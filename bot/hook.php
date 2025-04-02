<?php
include_once(__DIR__ . '/tg.php');
include_once(__DIR__ . '/handle.php');

$update = json_decode(file_get_contents('php://input'), TRUE);
$chat_id = $update['message']['chat']['id'];
$firstName = $update['message']['chat']['first_name'];
$lastName = $update['message']['chat']['last_name'];
$username = $update['message']['chat']['username'];
$message = $update['message']['text'];

if (isset($message)) {
    if ($message == '/start') {
        $reply = Cmd::start(trim($firstName . ' ' . $lastName));
    } elseif ($message == '/url') {
        $reply = Cmd::generateUrl($chat_id);
    } elseif ($message == '/help') {
        list($reply, $keyboard) = Cmd::help();
    }
}

TgApi::sendMessage($chat_id, $reply, true, $keyboard);
