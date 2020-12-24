<?php


include_once("connect.php");

// 註冊↓↓↓↓↓↓↓↓↓↓
if (isset($_POST["userAccount"])) {
    $getCC_AccountCC = $_POST["userAccount"];
    $getCC = "SELECT `mCC` FROM `member` WHERE mAccount = ?";
    $getCC_Point = $pdo->prepare($getCC);
    $getCC_Point->bindValue(1, $getCC_AccountCC);
    $getCC_Point->execute();
    $CCarr = $getCC_Point->fetchAll(PDO::FETCH_ASSOC);

    $ccPoint = $CCarr[0]['mCC']; //cc點數
    echo $ccPoint;
}
// 註冊↑↑↑↑↑↑↑↑↑↑


// 註冊↓↓↓↓↓↓↓↓↓↓
else if (isset($_POST["name"]) && isset($_POST["account"]) && isset($_POST["password"]) && isset($_POST["email"])) {
    $name = $_POST["name"];
    $account = $_POST["account"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $Emailsql = "SELECT * FROM `member` WHERE mEmail = ? ";

    $confirmEmail = $pdo->prepare($Emailsql);
    $confirmEmail->bindValue(1, $email);
    $confirmEmail->execute();
    $EmailTotal = $confirmEmail->rowCount();


    $accountsql = "SELECT * FROM `member` WHERE mAccount = ? ";

    $confirmAccount = $pdo->prepare($accountsql);
    $confirmAccount->bindValue(1, $account);
    $confirmAccount->execute();
    $AccountTotal = $confirmAccount->rowCount();

    if ($AccountTotal == 0 && $EmailTotal == 0) {
        // 計算member欄位資料數↓↓↓↓↓↓↓↓↓
        $memberSelect = "SELECT * FROM `member`";
        $allSelect = $pdo->query($memberSelect);
        $rowCount = $allSelect->rowCount();
        // 計算member欄位資料數↑↑↑↑↑↑↑↑↑

        // 補0、加上M↓↓↓↓↓↓↓↓↓
        $rowCount += 1;
        $addNumber = str_pad($rowCount, 4, 0, STR_PAD_LEFT);
        $addM = str_pad($addNumber, 5, "M", STR_PAD_LEFT);
        // 補0、加上M↑↑↑↑↑↑↑↑↑


        $sql = "INSERT INTO `member` (`mNumber` , `mLevel`, `mName`, `mPhoto`, `mPhone`, `mEmail`, `mAccount`, `mPassword`, `mCC`, `mSignIn`, `mJoindate`,`mLogindate`) VALUES (? , '1', ?, NULL, '', ?, ?, ?, 0, 0, NOW(), NOW())";


        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $addM);
        $statement->bindValue(2, $name);
        $statement->bindValue(3, $email);
        $statement->bindValue(4, $account);
        $statement->bindValue(5, $password);
        $statement->execute();

        echo "success";
    } else if ($EmailTotal == 1 && $AccountTotal == 0) {
        echo "EmailRepeat";
    } else if ($AccountTotal == 1 && $EmailTotal == 0) {
        echo "AccountRepeat";
    } else if ($AccountTotal == 1 && $EmailTotal == 1) {
        echo "AllRepeat";
    };
    // 註冊↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


    // 登入↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
} else if (isset($_POST["loginAccount"]) && isset($_POST["loginPassword"])) {
    $loginAccount =  $_POST["loginAccount"];
    $loginPassword =  $_POST["loginPassword"];
    $toDay =  $_POST["today"];


    $sql = "select * from `member` where mAccount = ? AND mPassword = ? ";


    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $loginAccount);
    $statement->bindValue(2, $loginPassword);
    $statement->execute();
    $hasAccount = $statement->rowCount();

    if ($hasAccount == 0) {
        // echo "NoAccount";
        echo "0". ",NoAccount".",". "0" .",". "0" .",". "0"; 
    } else if ($hasAccount == 1) {
        $getLastTime = "SELECT day(mLogindate),`mSignIn`,`mCC`,`mName`,`mNumber`,`mLevel` FROM `member` WHERE mAccount = ?";
        $getPrepare = $pdo->prepare($getLastTime);
        $getPrepare->bindValue(1, $loginAccount);
        $getPrepare->execute();
        $result = $getPrepare->fetchAll(PDO::FETCH_ASSOC);

        $lastTimeLogin = $result[0]['day(mLogindate)']; //上次登入日期
        $continuousLoginDay = $result[0]['mSignIn']; //連續登入天數
        $ccPoint = $result[0]['mCC']; //cc點數
        $nickname = $result[0]['mName']; //名字
        $mSignIn = $result[0]['mSignIn'];//連續登入天數
        $unumber = $result[0]['mNumber'];
        $mLevel = $result[0]['mLevel'];//登入權限
        $newSignIn = $mSignIn +1 ;

        $continuousDay = $toDay - $lastTimeLogin; //判斷是否為連續登入 如果是 1 , -30 , -29 , -28 , -27 就是連續登入
        if($mLevel == 0){
            echo 'pend';
        }
        else if ($continuousDay == 1 || $continuousDay == -30 || $continuousDay == -29 || $continuousDay == -28 || $continuousDay == -27) {
            $New_continuousLoginDay = $continuousLoginDay + 1;
            $remainder = intval($New_continuousLoginDay % 7);



            if ($remainder != 0) {
                $countC_Point = ($remainder * 10) + 30; //計算這次登入取得的ccPoint
                $upDataNewPoint = $countC_Point + $ccPoint; //這次取得的cc＋現有的cc

                $upLoginTime = "UPDATE member SET mLogindate= NOW(),`mSignIn` = ? , `mCC`= ?  WHERE mAccount = ?";
                $upTime = $pdo->prepare($upLoginTime);
                $upTime->bindValue(1, $New_continuousLoginDay);
                $upTime->bindValue(2, $upDataNewPoint);
                $upTime->bindValue(3, $loginAccount);
                $upTime->execute();

                echo $result[0]['mCC'] . ",loginSuccess".",".$nickname.",".$countC_Point.",".$newSignIn.",".$unumber;
            } else if ($remainder == 0) { //如果餘數是0的時候 ex: 
                $countC_Point = (7 * 10) + 30; //計算這次登入取得的ccPoint
                $upDataNewPoint = $countC_Point + $ccPoint; //這次取得的cc＋現有的cc

                $upLoginTime = "UPDATE member SET mLogindate= NOW(),`mSignIn` = ? , `mCC`= ?  WHERE mAccount = ?";
                $upTime = $pdo->prepare($upLoginTime);
                $upTime->bindValue(1, 0);
                $upTime->bindValue(2, $upDataNewPoint);
                $upTime->bindValue(3, $loginAccount);
                $upTime->execute();

                echo $result[0]['mCC'] . ",loginSuccess".",".$nickname.",".$countC_Point.",".$newSignIn.",".$unumber; 
            }
        }
        else if($continuousDay == 0 ){//如果是當天重複登入
            $upLoginTime = "UPDATE member SET mLogindate= NOW() WHERE mAccount = ?";
            $upTime = $pdo->prepare($upLoginTime);
            $upTime->bindValue(1, $loginAccount);
            $upTime->execute();

            echo $result[0]['mCC'] . ",loginSuccess1".",".$nickname.","."0".",".$newSignIn.",".$unumber;
        }else if ($continuousDay != 1 || $continuousDay != -30 || $continuousDay != -29 || $continuousDay != -28 || $continuousDay != -27|| $continuousDay != 0){

            $countC_Point = (1 * 10) + 30; //計算這次登入取得的ccPoint
            $upDataNewPoint = $countC_Point + $ccPoint; //這次取得的cc＋現有的cc

            $upLoginTime = "UPDATE member SET mLogindate= NOW(),`mSignIn` = ? , `mCC`= ?  WHERE mAccount = ?";
            $upTime = $pdo->prepare($upLoginTime);
            $upTime->bindValue(1, 1);
            $upTime->bindValue(2, $upDataNewPoint);
            $upTime->bindValue(3, $loginAccount);
            $upTime->execute();

            echo $result[0]['mCC'] . ",loginSuccess".",".$nickname.",".$countC_Point.",".$newSignIn.",".$unumber;
        }


        // 更新登入時間↓↓↓↓↓ 4630
        // $upLoginTime = "UPDATE member SET mLogindate= NOW() WHERE mAccount = ?";
        // $upTime = $pdo->prepare($upLoginTime);
        // $upTime->bindValue(1 , $loginAccount);
        // $upTime->execute();
        // // 更新登入時間↑↑↑↑↑

        // echo "loginSuccess";
    }
}
    // 登入↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
