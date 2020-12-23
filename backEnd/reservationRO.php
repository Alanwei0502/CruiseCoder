<?php

//MySQL相關資訊
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_select = "cruisecoder";

//建立資料庫連線物件
$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

//建立PDO物件，並放入指定的相關資料
$pdo = new PDO($dsn, $db_user, $db_pass);



if (isset($_POST["allON"])) {
    $courseName = "'" . implode("','", $_POST["allON"]) . "'";

    $update = "UPDATE `tutorial` SET `tStatus` = '1' WHERE tNumber IN (" . $courseName . ")";

    $update = $pdo->prepare($update);

    $update->execute();
}


if (isset($_POST["allOFF"])) {

    $courseName = "'" . implode("','", $_POST["allOFF"]) . "'";

    $update = "UPDATE `tutorial` SET `tStatus` = '0' WHERE tNumber IN (" . $courseName . ")";

    $update = $pdo->prepare($update);

    $update->execute();
}
