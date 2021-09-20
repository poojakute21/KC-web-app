<?php
include('includes/connection.php');
include('includes/functions.php');
define('MAINSITE', 'http://localhost/');
define('WEBSITE',  MAINSITE . 'khaana-chahiye/');

define('ABSPATH', dirname(__FILE__) . '/');

//Table Names
define('channel_type','channel_types');
define('document_type','document_types');
define('request_details','request_details');
define('request_details_delivery','request_delivery_details');
define('request_progress_status','request_progress_statuses');
//define('request_status','request_statuses');
define('request_types','request_types');
define('roles','roles');
define('volunteers_details','users');

?>