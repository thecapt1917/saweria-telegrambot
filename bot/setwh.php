<?php
require_once(__DIR__ . '/tg.php');
require_once(__DIR__ . '/../config.php');

if (isset($_SERVER['HTTP_X_ORIGINAL_HOST'])) {
    $url = $_SERVER['HTTP_X_ORIGINAL_HOST'];
} elseif (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    $url = $_SERVER['HTTP_X_FORWARDED_HOST'];
} elseif (isset($_SERVER['SERVER_NAME'])) {
    $url = $_SERVER['SERVER_NAME'];
} elseif (isset($_SERVER['HTTP_HOST'])) {
    $url = $_SERVER['HTTP_HOST'];
} elseif (isset($_SERVER['SERVER_ADDR'])) {
    $url = $_SERVER['SERVER_ADDR'];
}

$resp = json_decode(TgApi::setWebhook('https://' . $url . WHPATH), true);
$resp['url'] = $url;
echo json_encode($resp);
