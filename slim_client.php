<?php

$contexte =  explode('/' , $_SERVER["REQUEST_URI"] );

$url = "http://".$_SERVER["SERVER_NAME"].":". $_SERVER["SERVER_PORT"] ."/" . $contexte[1] . "/slim_webservice.php/transaction/11";
$data = "DATA envoyée au serveur";
$opts = array(
    'http'=>array(
        'method'=>"GET",
        'header'=>"User-Agent:Client RestFul\r\n",
        'header'=>"Content-Type: multipart/form-data\r\n",
        "Content-length: " . strlen($data)."\r\n",
        'content'=>$data
        )
    );
$context = stream_context_create($opts);
$fp = fopen($url, 'r', false, $context);
$res = fpassthru($fp);
echo $res;