
<?php

    //MySQL相關資訊
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "";
    $db_select = "cruisecoder";

    //建立資料庫連線物件
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

    //建立PDO物件，並放入指定的相關資料
    $pdo = new PDO($dsn, $db_user, $db_pass);
  
    //建立SQL
    // $sql = "INSERT INTO member(mName, mPassword, mPhone) VALUES ('討厭鬼', '12345', hiQQQ, 0909875432)";
    // $name = "Juno";
    // $statement = $pdo->prepare($sql);
    // $statement->bindValue(1 , "Juno");
    //執行
    // $pdo->exec($sql);

    // $mName = $_POST["mName"];

    // $mAccount = $_POST["mAccount"];

    // $memberPassword = $_POST["mPassword"];

    // $memberEmail = $_POST["mEmail"];

    // $memberPhone = $_POST["mPhone"];
    ?>

