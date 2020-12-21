<?php
session_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_select = "cruisecoder";

$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

$pdo = new PDO($dsn, $db_user, $db_pass);
$conn = new mysqli($db_host, $db_user, $db_pass, $db_select); //連線資料庫


// 上傳大頭貼Fion專用
class UtilClass{
    function getFilePath(){
        //Web根目錄真實路徑
        $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
        return $ServerRoot."/CruiseCoder/images/info/";
    }
}
