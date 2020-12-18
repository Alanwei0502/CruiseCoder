<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
<<<<<<< HEAD
//$db_pass = "00000000";
//$db_select = "test";
$db_select = "cruisecoder";

// $dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

// $pdo = new PDO($dsn, $db_user, $db_pass);
=======
$db_select = "cruisecoder";

$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

$pdo = new PDO($dsn, $db_user, $db_pass);
>>>>>>> 1b31b660688f3f49ef769b0297f7bd13ceb75f05


// 上傳大頭貼Fion專用
class UtilClass{
    function getFilePath(){
        //Web根目錄真實路徑
        $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
        return $ServerRoot."/CruiseCoder/images/info/";
    }
}
