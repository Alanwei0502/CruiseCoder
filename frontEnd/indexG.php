<?php
include("./layout/connect.php");



// 撈出css星系
if(isset($_POST["first"])){
    $sql = "SELECT bIcon FROM `badge` WHERE bGalaxy = 'CSS星系' and bLevel != 0";
    
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($data);
}
else if(isset($_POST["getPlanet"])){
    $sql = "SELECT bIcon FROM `badge` WHERE bGalaxy = ? and bLevel != 0";
    
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $_POST["getPlanet"]);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($data);
}

?>