<?php  
    if(!isset($_SESSION)) {
        session_start();
    }    
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "khaana-chahiye";  
      
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  