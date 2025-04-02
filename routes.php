<?php
include_once(__DIR__ . '/router.php');
include_once(__DIR__ . '/config.php');

get('/', 'index.php');

// BOT
post('/bot/webhook', 'bot/hook.php');
get('/bot/webhook/set', 'bot/setwh.php');

// Saweria Webhook
// get('/webhook/$id', 'webhook.php');
post('/webhook/$id', 'webhook.php');

header('location: /');
