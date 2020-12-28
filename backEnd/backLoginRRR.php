<?php
    include("../frontEnd/layout/connect.php");
   
    //建立SQL
  
        $mAccount = $_POST['mAccount'];
        $mPassword = $_POST['mPassword'];
        // $mLevel = $_POST['mLevel'];

        $sql = "SELECT * FROM member WHERE `mAccount` = ? && `mPassword` = ? &&  mLevel = 3 ";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, "$mAccount");
        $statement->bindValue(2, "$mPassword");
        // $statement->bindValue(3, "3");
    
        $statement->execute();
        $bgLogin = $statement->fetchAll();
    
        if($bgLogin != []){

            header('location: ./member.php');
        }else{
            echo "<script>sessionStorage.setItem('error', 'true');
            location.href = 'backLogin.php';</script>";
            
            // header('location: ./backLogin.php');

        }
        

?>

