<?php

$url = 'https://api.gupshup.io/sm/api/v1/users/MYCXAPP?';

$options = stream_context_create(['http' => [
    'method'  => 'GET',
    'header'  => 'apikey: b07192ca25814406c42867e0376518d0',
]]);
// Send a request
$result = file_get_contents($url, false, $options);




$data = json_decode($result, 1); // Parse JSON
var_dump($data);

?>

<script> 
var $buoop = {required:{e:-2,f:-2,o:-1,s:-1,c:-1},insecure:true,unsupported:true,api:2020.09 }; 
function $buo_f(){ 
 var e = document.createElement("script"); 
 e.src = "//browser-update.org/update.min.js"; 
 document.body.appendChild(e);
};
try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
catch(e){window.attachEvent("onload", $buo_f)}
</script>

<!-- Hotjar Tracking Code for https://mediasocial.co -->
    <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1995732,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>