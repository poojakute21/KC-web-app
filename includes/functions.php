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

function get_rolename($roleid) {
    include('connection.php');
    $sql = "select name from ".roles." WHERE id='".$roleid."'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    
    return $row['name'];
}

function get_status($status) {
    if($status == 'Y') {
        $status_val = "Active";
    }else {
        $status_val = "Inactive";
    }
    return $status_val;
}
function get_channelname($roleid) {
    include('connection.php');
    $sql = "select name from ".channel_type." WHERE id='".$roleid."'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    
    return $row['name'];
}
function get_documenttype($roleid) {
    include('connection.php');
    $sql = "select name from ".document_type." WHERE id='".$roleid."'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    
    return $row['name'];
}

function get_requesttype($roleid) {
    include('connection.php');
    $sql = "select name from ".request_types." WHERE id='".$roleid."'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    
    return $row['name'];
}

?>