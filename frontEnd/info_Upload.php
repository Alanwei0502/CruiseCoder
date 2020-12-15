<?php
    include("linkFion.php");

    //取得POST過來的值
    $mName = $_POST["mName"];
    echo $mName.'<br>';
    $mPasswrod = $_POST["mPasswrod"];
    echo $mPasswrod.'<br>';
    $mNumber = "M0003";
    $mPhone = $_POST["mPhone"];
    echo $phone.'<br>';
    $PictureName = $_FILES["myFile"]["name"];
    echo $PictureName;

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



    //建立SQL
    $sql = "UPDATE member set mName = ? ,mPhone = ?, mPhoto = ? ,mPasswrod = ?  where mNumber = ? ";
    // $sql = "UPDATE mPhoto = ?, UpdateDate = NOW() WHERE ID = ?";

    //執行
    $statement = $pdo->prepare($sql);

    //給值    
    $statement->bindValue(1 , $mName);     
    $statement->bindValue(2 , $mPhone);
    $statement->bindValue(3 , '../images/info/'.$PictureName);
    $statement->bindValue(4 , $mPasswrod);
    $statement->bindValue(5 , $mNumber);

    $statement->execute();



?>