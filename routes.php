<?php
include_once(__DIR__ . '/router.php');
include_once(__DIR__ . '/config.php');

get('/', 'index.php'); // main page

// BOT
post('/bot/webhook', 'bot/hook.php'); // for handling Telegram Bot command
get('/bot/webhook/set', 'bot/setwh.php'); // set Telegram Bot webhook

// Saweria Webhook
post('/webhook/$id', 'webhook.php'); // for handling webhook from Saweria

header('location: /');
