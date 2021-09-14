<?php
define('SECRET_KEY', md5("fd8903dcf59f65f58032376416e8c826"));

function core_encrypt($payload) {

    $key = hash('sha256', SECRET_KEY);
    $iv = substr(hash('sha256', md5("dmYHis").rand(0,9999)), 0, 16); 
    $crypt = openssl_encrypt($payload, 'AES-256-CBC', $key, 0, $iv); 
    $combo = base64_encode($iv . $crypt);    
    $garble = urlencode($combo);
    
    return $garble;
}

function core_decrypt($garble) {

    $combo = base64_decode(urldecode($garble));
    $key = hash('sha256', SECRET_KEY);
    $iv = substr($combo, 0, 16);
    $crypt = substr($combo, 16, strlen($combo));
    $payload = openssl_decrypt($crypt, 'AES-256-CBC', $key, 0, $iv);
    
    return $payload;
}


?>