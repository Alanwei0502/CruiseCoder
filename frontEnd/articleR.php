<?php

  include("./layout/connect.php");

  //建立SQL
  //抓資料庫全部
  $sql = "SELECT * FROM article WHERE aStatus = 1";

  if(isset($_POST["articleh4"])){
    $articleName = $_POST["articleh4"];
    
    $sqlName = "SELECT * FROM article WHERE aTitle = ?";

    
    $articleContent = $pdo->prepare($sqlName);
    $articleContent->bindValue( 1 , $articleName);
    $articleContent->execute();

    foreach($articleContent as $index => $row){
      echo $row["aContent"];
    }
  }

  //執行
  $statement = $pdo->query($sql);


  
  //放進二維陣列
  $data = $statement->fetchAll();



?>