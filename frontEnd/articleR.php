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

    if(isset($_POST["userAccount"])){
      // 先取得會員編號
      $userAccount = $_POST["userAccount"];
      $mNumberSql = "SELECT mNumber FROM member WHERE mAccount = '$userAccount'";
      $mNumberStatement = $pdo->query($mNumberSql);
      $mNumberData = $mNumberStatement->fetchAll();

      foreach ($mNumberData as $index => $row) {
        $mNumber = $row["mNumber"];
      }
    }

    foreach($articleContent as $index => $row){
      $aNumber = $row["aNumber"];
      
      // 判斷有無收藏過
      if(isset($_POST["userAccount"])){
        $checkSql = "SELECT * FROM favorite_a WHERE faArticle = '$aNumber' AND faMember = '$mNumber'";
        $checkStatement = $pdo->query($checkSql);
        $checkNumber = $checkStatement->rowCount();
      }

      


      echo '<div class="favoriteBack"><span class="collectText">加入收藏</span>';
      if(isset($_POST["userAccount"])){
        if($checkNumber == 1){
          echo '<i class="fas fa-heart collected" data-anumber="'.$row["aNumber"].'"></i>';
        }else{
          echo '<i class="fas fa-heart" data-anumber="'.$row["aNumber"].'"></i>';
        }
      }else{
        echo '<i class="fas fa-heart" data-anumber="'.$row["aNumber"].'"></i>';
      }
      echo '</div>';
      echo $row["aContent"];
    }
  }

  //執行
  $statement = $pdo->query($sql);


  
  //放進二維陣列
  $data = $statement->fetchAll();



  // 收藏取消專欄功能
  if(isset($_POST["userAccount"], $_POST["aNumber"])){
    // 先取得會員編號
    $userAccount = $_POST["userAccount"];
    $mNumberSql = "SELECT mNumber FROM member WHERE mAccount = '$userAccount'";
    $mNumberStatement = $pdo->query($mNumberSql);
    $mNumberData = $mNumberStatement->fetchAll();

    foreach ($mNumberData as $index => $row) {
      $mNumber = $row["mNumber"];
    }

    // 加入收藏
    if(isset($_POST["collect"])){
      $aNumber = $_POST["aNumber"];
      $collectArticleSql = "INSERT INTO favorite_a (faNumber, faArticle, faMember, faDate) VALUES (NOW(), '$aNumber', '$mNumber', NOW())";
      $pdo->query($collectArticleSql);
    }

    // 取消收藏
    if(isset($_POST["cancel"])){
      $aNumber = $_POST["aNumber"];
      $cancelSql = "DELETE FROM favorite_a WHERE faArticle = '$aNumber' AND faMember = '$mNumber'";
      $pdo->query($cancelSql);
    }
  }

?>