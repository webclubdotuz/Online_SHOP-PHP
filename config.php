<?php
session_start();
$currency = ' swm'; 

$db_username = 'root';
$db_password = '';
$db_name = 'shop';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
?>