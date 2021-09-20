<?php 
 
 $data = array(
    'channel' => 'whatsapp',
    'source' => '917834811114',
    'destination' => '573155217037',
    'message' => '{
        "type": "audio",
        "url": "https://www.buildquickbots.com/whatsapp/media/sample/audio/sample02.mp3",
        "filename": "Sample.mp3",
        "caption":"Audio vía WebHook"}',
    'src.name'=> 'MYCXAPP'
    );

$json = http_build_query ($data);
$url = 'https://api.gupshup.io/sm/api/v1/msg';
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => array( "Content-Type: application/x-www-form-urlencoded",
                            "apikey: b07192ca25814406c42867e0376518d0"),
        'content' => $json
    ]
]);
// Send a request
$result = file_get_contents($url, false, $options);


