<?php
// connecting to database
include("../frontEnd/layout/connect.php");

// launching the galaxy
if (isset($_POST["onId"])) {
    $galaxyName = "'" . implode("','", $_POST["onId"]) . "'";

    $update = "UPDATE `galaxy` SET `gStatus` = '1' WHERE gName IN (" . $galaxyName . ")";

    $update = $pdo->prepare($update);

    $update->execute();
}

// removing the galaxy
if (isset($_POST["offId"])) {

    $galaxyName = "'" . implode("','", $_POST["offId"]) . "'";

    $update = "UPDATE `galaxy` SET `gStatus` = '0' WHERE gName IN (" . $galaxyName . ")";

    $update = $pdo->prepare($update);

    $update->execute();
}
