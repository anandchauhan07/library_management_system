<?php
define('BASE_URL','/LIBRARY_MANAGEMENT/');
session_start();


// remove all session variables
session_unset();

// destroy the session
session_destroy();

// redirect to login page
$url=$BASE_URL.'Location: index.php';
header($url);
exit;
?>
