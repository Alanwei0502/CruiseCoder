<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_select = "cruisecoder";

$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

$pdo = new PDO($dsn, $db_user, $db_pass);
