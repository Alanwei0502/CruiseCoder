<?php
// 家偉專用
$db_host = "localhost";
$db_user = "root";
$db_pass = "soyalan0502";
$db_select = "cruisecoder";
// 其他人請用
// $db_host = "10.2.0.188";
// $db_user = "root";
// $db_pass = "1qaz2wsx";
// $db_select = "cruisecoder";

$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

$pdo = new PDO($dsn, $db_user, $db_pass);
