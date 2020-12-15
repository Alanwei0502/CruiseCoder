<?php
include("../frontEnd/layout/connect.php");


// 傳陣列如何送到sql語法中？
if (isset($_POST["offId"])) {

    $galaxyName = "'" . implode("','", $_POST["offId"]) . "'";

    // $update = "UPDATE `cruisecoder`.`quiz` SET `qState` = '0' WHERE qSubject IN (" . $galaxyName . ");";
    $update = "UPDATE `cruisecoder`.`galaxy` SET `gStatus` = '0' WHERE gName IN (" . $galaxyName . ")";

    $update = $pdo->prepare($update);

    $update->execute();

    // echo json_encode($galaxyName);
    echo "yes";
}
