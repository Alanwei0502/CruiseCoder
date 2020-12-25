<?php
include("../frontEnd/layout/connect.php");


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

?>