<?php
$postdata = http_build_query(
    array(
        'phone' => 573155217037,
        'messageId' => 'false_573004145645@c.us_0B34C40A538519A78040EE0791FFFCFE',
        'chatId' => '573155217037@c.us',
        'body'   => 'Hola jeff Como estas?',
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents('https://api.chat-api.com/instance276100/forwardMessage?token=lp7znq5jez0v733g', false, $context);

?>

