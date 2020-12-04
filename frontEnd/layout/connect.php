<?php
// host在大家電腦可能要改名字
$db_host = "localhost";
$db_user = "root";
$db_pass = "soyalan0502";
$db_select = "cruisecoder";

$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

$pdo = new PDO($dsn, $db_user, $db_pass);
