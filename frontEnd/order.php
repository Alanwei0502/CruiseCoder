<?php
    include("./layout/connect.php");
    
    //建立SQL SELECT oNumber,mAccount FROM `myorder` JOIN member on oMember = mNumber WHERE mAccount = 'aaa'
//   $sql = "SELECT * FROM myorder WHERE oNumber = ?";
//   $oNumber = "2020120622";
//   $statement = $pdo->prepare($sql);
//   $statement->bindValue(1 , "$oNumber");
//   $statement->execute();
//   $orderDetail = $statement->fetchAll();

//   if($orderDetail == []){
//     $block = "display: block;";
//   }

?>

<!-- 連結訂單表和會員表的會員編號 -->
<?php
$sql = "SELECT * from (select * from (select * from `course` join `invoice` on cNumber = iCourse) c join `myorder` o on c.iNumber = o.oNumber) s
join `member` m
on s.oMember = m.mNumber where mAccount= ?";

$result = $pdo->prepare($sql);
$result->bindValue(1,$F_user);
$result->execute();
$data = $result->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="icon" href="../ico.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
    <title>Cruise Coders ｜ 訂單資訊</title>

    <!-- 製作 目前尚無訂單唷！ 畫面-->
</head>
<body>
    <div class="wrap order">
        <?php
        include('layout/spacebackground.php');
        include('layout/header.php');
        ?>

        <main class="orderMain">
            <p class="order_title"> < 訂單資訊 /> </p>
            <div class="haveNoOrder">
                <div>
                    <img src="../images/order/資產 1@2x.png" alt="">
                    <p>親愛的語宙漫遊者，<br>來去逛逛最新的課程吧！</p>
                
                </div>
                <div>
                    <a href="./allCourse.php">前往外星課程</a>
                </div>
            </div>

            <div class="orderArea">
                
                    <?php
                        foreach($data as $index => $rowR){
                    ?>
                <div class="UnderCard_1200">

                    <div>
                        <p class="underOrderNum">訂單編號：<span> <?=$rowR["oNumber"] ?> </span></p>

                       
                    </div>

                    <div class="UnderChild_1">
                    
                        <div><img src="<?=$rowR['cImage']?>" alt=""></div>
                        
                        <div><h2>課程名稱：</h2><p><?=$rowR['cTitle']?></p></div>

                        <div><h3>NT<?=$rowR['cPrice']?></h3></div>
                        
                      
                    </div>


                    <div class="transactionDetails">
                        <div>
                            <div><h2>卡號末四碼：</h2><p><?=$rowR['oCard']?></p></div>
                            <div><img src="<?=$rowR['cImage']?>" alt=""><h2>&emsp;CC Point折抵：</h2><p><span>NT$ <?=$rowR["oCC"] ?></span></p></div>
                        </div>
                        
                        <div class="detailsTotal"><h2>總計：<span>NT$<?=$rowR["oTotal"] ?></span></h2></div>

                    </div>
                
                    
                </div>
                    <?php } ?>
                <?php
                    foreach($data as $index => $row){
                ?>                
                <div class="accordion">
                    <div class="title accordion-control">
                        <div class="Order_1">
                            
                            <div>訂單編號：<?=$row['oNumber']?></div>
                            <div>CC Point折抵 : NT$<?=$row['oCC']?></div> 
                            <div><span>NT$<?=$row['oTotal']?></span></div> 

                        </div>
                    </div>    

                    <!-- 1200px以上訂單形式 -->
                    <div class="content accordion-panel">
                        <div id="css_table">
                            <div class="tHead css_tr" >
                                <div class="css_td"></div>
                                <div class="css_td">課程名稱</div>
                                <div class="css_td">售價</div>
                                <div class="css_td">卡號末四碼</div>
                                <div class="css_td">訂單成立</div>    
                            </div>
                            <div class="tChild css_tr">
                                <div class="css_td"><img src="<?=$row['cImage']?>" alt=""></div>
                                <div class="css_td"><?=$row['cTitle']?></div> 
                                <div class="css_td">NT$<?=$row['cPrice']?></div>
                                <div class="css_td"><?=$row['oCard']?></div> 
                                <div class="css_td"><?=$row['oDate']?></div>
                            </div>
                        </div>

                    </div> 
                </div>
                <?php } ?>
                    
            </div>
        </main>
        <?php
        include('layout/footer.php');
        ?>
    </div>
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src=".js/order_front.js"></script>
 
    <script src="../js/header.js"> </script>
    <script>

        $('.accordion').on('click', '.accordion-control', function(e){
            e.preventDefault();
            $(this).next('.accordion-panel').not(':animated').slideToggle();
        });

    </script>

    <!-- $block = "display: block;"; -->
    <script type="text/javascript">
        var display = "<?= $block ?>";  
        // var display = "display: block;";  
        let nothing = document.getElementsByClassName('.haveNoOrder');
        nothing.style.cssText = `${display}`;
        // nothing.style.cssText = `display: block;`;
    </script>
</body>
</html>