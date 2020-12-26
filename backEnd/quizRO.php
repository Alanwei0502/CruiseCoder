<?php
// 連接資料庫
include("../frontEnd/layout/connect.php");

// 上架星系
if (isset($_POST["onId"])) {
    $galaxyName = "'" . implode("','", $_POST["onId"]) . "'";

    $update = "UPDATE `galaxy` SET `gStatus` = '1' WHERE gName IN (" . $galaxyName . ")";

    $update = $pdo->prepare($update);

    $update->execute();
}

// 下架星系
if (isset($_POST["offId"])) {

    $galaxyName = "'" . implode("','", $_POST["offId"]) . "'";

    $update = "UPDATE `galaxy` SET `gStatus` = '0' WHERE gName IN (" . $galaxyName . ")";

    $update = $pdo->prepare($update);

    $update->execute();
}
