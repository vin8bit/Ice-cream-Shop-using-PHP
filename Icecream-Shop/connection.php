<?php

// Db configs.
define('HOST', 'localhost');
define('PORT', 3306);
define('DATABASE', 'rai_ice_cream_db');
define('USERNAME', 'root');
define('PASSWORD', '1234');
define('CHARSET', 'utf8');
/*
$mysqliDriver = new mysqli_driver();
$mysqliDriver->report_mode = (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
*/
$connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASE, PORT);

?>
