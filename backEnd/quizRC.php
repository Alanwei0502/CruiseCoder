<?php
include("../frontEnd/layout/connect.php");

// $AllGalStatement = "SELECT gName FROM cruisecoder.galaxy";
// $GalStatement = "SELECT * FROM cruisecoder.galaxy WHERE gName like ?";


// $AllGalStatement = $pdo->prepare($AllGalStatement);
// $GalStatement = $pdo->prepare($GalStatement);

// $AllGalStatement->execute();


// if (isset($_POST["fieldName"], $_POST["qContent"], $_POST["sContent"], $_POST["sContent"], $_POST["qAnswer"], $_POST["qState"], $_POST["iconImg"], $_POST["badgeImg"])) {

//     echo $_POST["fieldName"];
//     echo "\n";
//     echo $_POST["qContent"];
//     echo "\n";
//     echo $_POST["sContent"];
//     echo "\n";
//     echo $_POST["sContent"];
//     echo "\n";
//     echo $_POST["qAnswer"];
//     echo "\n";
//     echo $_POST["qState"];
//     echo "\n";
//     echo $_POST["iconImg"];
//     echo "\n";
//     echo $_POST["badgeImg"];
// }

echo $_POST["fieldName"];
echo "\n";
print_r($_POST["qContent"]);
echo "\n";
print_r($_POST["sContent"]);
echo "\n";
print_r($_POST["qAnswer"]);
echo "\n";
print_r($_POST["qState"]);
echo "\n";
print_r($_POST["iconImg"]);
echo "\n";
print_r($_POST["badgeImg"]);
