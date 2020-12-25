<?php
    include("./layout/connect.php");
    

    //取得POST過來的值

    $mAccount = $_POST["account_test"]; //取得info.php傳過來的會員帳號

    $mName = $_POST["mName"];
    $mPassword = $_POST["mPassword"];
    // $mNumber = "M0003";
    $mPhone = $_POST["mPhone"];
    $PictureName = isset($_FILES["myFile"]["name"])? $_FILES["myFile"]["name"] : '';
  

    $Util = new UtilClass();

    //先判斷是否更新(上傳)圖片?
    if($_FILES["myFile"]["size"] > 0){

         //判斷圖片是否上傳成功?
        if($_FILES["myFile"]["error"] > 0){
             //返回訊息文字
            $message = "上傳失敗: 錯誤代碼".$_FILES["myFile"]["error"];
        }else{
             //Server上的暫存檔路徑含檔名
            $filePath_Temp = $_FILES["myFile"]["tmp_name"];
            echo $filePath_Temp.'<br>';

            //欲放置的檔案路徑
            $filePath = $Util->getFilePath().$PictureName;
            echo $filePath;

            // 將暫存檔搬移到正確位置
            if(copy($filePath_Temp, $filePath)){
               //修改後的商品圖片名稱
                $PictureName = $_FILES["myFile"]["name"];
            }else{
                $message = "拷貝/移動上傳圖片失敗";
            }
        }
    }
    
    echo $mAccount;
    echo $mName;
    echo $mPassword;
    echo $mPhone;
    echo $PictureName;



    //建立SQL
    if(isset($_FILES["myFile"]["name"])){
        $sql = "UPDATE member set mName = ? ,mPhone = ?,mPassword = ? , mPhoto = ?  where mAccount = ? ";

        $statement = $pdo->prepare($sql);

        //給值    
        $statement->bindValue(1 , $mName);     
        $statement->bindValue(2 , $mPhone);
        $statement->bindValue(3 , $mPassword);
        $statement->bindValue(4 , '../images/info/'.$PictureName);
        $statement->bindValue(5 , $mAccount);

        //執行
        $statement->execute();

    }else{
        $sql = "UPDATE member set mName = ? ,mPhone = ? ,mPassword = ?  where mAccount = ? ";

        //準備
        $statement = $pdo->prepare($sql);

        //給值    
        $statement->bindValue(1 , $mName);     
        $statement->bindValue(2 , $mPhone);
        $statement->bindValue(3 , $mPassword);
        $statement->bindValue(4 , $mAccount);

        //執行
        $statement->execute();
    }
    
   

    

    header('location: ./info.php')

    // // 抓cookie會員帳號
    // $account = $_POST["userAccount"];
    // // echo $account;

    // $findMember = " SELECT * FROM `member` WHERE mAccount = ? ";

    // $findMember = $pdo->prepare($findMember);

    // $findMember->bindValue(1 , $account); 

    // $findMember->execute();

    // $data = $findMember->fetchAll(PDO::FETCH_ASSOC);

    // echo json_encode($data);


    //input(display:none;)傳 mAccount 值用 記得取name = "account_test" （一開始抓到的cookie）
    //傳到在這一支裡，然後用
    //$mAccount = $_POST["account_test"];




?>