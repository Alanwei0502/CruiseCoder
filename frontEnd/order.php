<?php
    include("./layout/connect.php");
    
    //建立SQL
  $sql = "SELECT * FROM myorder WHERE oNumber = ?";
  $oNumber = "2020120622";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(1 , "$oNumber");
  $statement->execute();
  $orderDetail = $statement->fetchAll();

  if($orderDetail == []){
    $block = "display: block;";
  }

?>

<!-- 連結訂單表和會員表的會員編號 -->
<?php
$sql = "SELECT
    e.oMember,
    d.mNumber
from
    myorder e
    join member d
    on e.oMember = d.mNumber";

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
                
                <div class="UnderCard_1200">
                    <div>
                        <?php
                            foreach($orderDetail as $index => $row){
                        ?>
                        <p class="underOrderNum">訂單編號：<span> <?=$row["oNumber"] ?> </span></p>

                        <?php } ?>
                    </div>

                    <div class="UnderChild_1">
                    
                        <div><img src="../images/order/computer.jpeg" alt=""></div>
                        
                        <div><h2>課程名稱：</h2><p>職人必修的 RWD 網頁入門班</p></div>

                        <div><h3>NT2,000</h3></div>
                        
                      
                    </div>

                    <div class="UnderChild_2">
                        <div><img src="../images/order/computer.jpeg" alt=""></div>
                        <div><h2>課程名稱：</h2><p>Node.js 網站開發 with React.js</p></div>
                        <div><h3>NT$2,000</h3></div>

                        
                      
                    </div>

                    <div class="UnderChild_3">
                        <div><img src="../images/order/computer.jpeg" alt=""></div>
                        <div><h2>課程名稱：</h2><p>HTML快速入門-張老闆帶你飛</p></div>
                        <div><h3>NT$2,000</h3></div>
                    </div>

                    <div class="transactionDetails">
                        <div>
                            <div><h2>卡號末四碼：</h2><p>6969</p></div>
                            <div><img src="../images/ccPoint/cc_coin.png" alt=""><h2>&emsp;CC Point折抵：</h2><p><span>NT$ <?=$row["oCC"] ?></span></p></div>
                        </div>
                        
                        <div class="detailsTotal"><h2>總計：<span>NT$<?=$row["oTotal"] ?></span></h2></div>

                    </div>
                
                </div>
                <?php
                    foreach($orderDetail as $index => $row){
                ?>                
                <div class="accordion">
                    <div class="title accordion-control">
                        <div class="Order_1">
                            <div><img src="../images/order/computer.jpeg" alt=""></div>
                            <div>訂單編號：2020122522</div>
                            <div><span>NT$2,400</span></div> 
                        </div>
                    </div>    

                    <!-- 1200px以上訂單形式 -->
                    <div class="content accordion-panel">
                        <div id="css_table">
                            <div class="tHead css_tr" >
                                <div class="css_td">課程名稱</div>
                                <div class="css_td">CC Point折抵</div>
                                <div class="css_td">售價</div>
                                <div class="css_td">卡號末四碼</div>
                                <div class="css_td">訂單成立</div>    
                            </div>
                            <div class="tChild css_tr">
                                <div class="css_td">HTML快速入門-張老闆帶你飛</div> 
                                <div class="css_td">NT$100</div> 
                                <div class="css_td">NT$2,500</div>
                                <div class="css_td">6969</div> 
                                <div class="css_td">2020-06-07 22:35</div>
                            </div>
                        </div>

                        <div class="totalPrice">總計：NT$2,400</div>
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