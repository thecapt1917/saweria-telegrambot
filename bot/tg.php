<?php
include_once(__DIR__ . '/../helpers/request.php');
// include_once(__DIR__ . '/../config.php');

class TgApi
{
    public static function setWebhook(string $url)
    {
        $endpoint = 'https://api.telegram.org/bot' . BOT_KEY . '/setWebhook';
        $headers = [
            'content-type: ' . ContentType::json
        ];
        $data = json_encode(['url' => $url]);

        return Request::POST($endpoint, $headers, $data);
    }

    private static function send($method, $data)
    {
        $headers = [
            'content-type: ' . ContentType::json
        ];

        $url = "https://api.telegram.org/bot" . BOT_KEY . "/" . $method;
        return Request::POST($url, $headers, json_encode($data));
    }

    public static function sendMessage($userid, string $reply = null, bool $disablewebview = false, string $reply_markup = null, string $replyTo = null, $parse_mode = 'html')
    {
        if (!isset($reply) || $reply == '') {
            exit();
        }

        $parameters = [
            'chat_id' => $userid,
            'text' => $reply,
            'parse_mode' => $parse_mode,
            'disable_web_page_preview' => $disablewebview
        ];

        if ($reply_markup != null) {
            $parameters['reply_markup'] = $reply_markup;
        }

        if ($replyTo != null) {
            $parameters['reply_to_message_id'] = $replyTo;
        }

        return self::send('sendMessage', $parameters);
    }
}
