<?php
    include("linkFion.php");

    //建立SQL
  $sql = "SELECT * FROM myorder WHERE oNumber = ?";
  $oNumber = "2020120622";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(1 , "$oNumber");
  $statement->execute();
  $orderDetail = $statement->fetchAll();
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
                        <div><h2>卡號末四碼：</h2><p>6969</p></div>
                        <div><img src="../images/ccPoint/cc_coin.png" alt=""><h2>&emsp;CC Point折抵：</h2><p><span>NT$ <?=$row["CC"] ?></span></p></div>
                        <div class="lastPeace"><h2>總計：<span>NT$<?=$row["oTotal"] ?></span></h2></div>
                    </div>
                
                </div>



                    <div class="accordion">
                        <!------- 第一張訂單明細 ------->              
                        <div class="option option_1 accordion-control">
                            <input type="checkbox" id="toggle1" class="toggle"/><label class="title" for="toggle1">
                                    <div class="Order_1">
                                    <div><img src="../images/order/computer.jpeg" alt=""></div>
                                        <div>
                                            <p>訂單編號：<span> <?=$row["oNumber"] ?> </span></p>
                                        </div>
                                        <div>
                                            <p><span>NT$ <?=$row["oTotal"] ?> </span></p>
                                        </div>
                                        
                                    </div>
                            </label>
                                                    <!------- 下方收合明細 ------->
                            <div class="content accordion-panel">
                                <table>
                                    <tr>
                                            <th>課程名稱</th>
                                            <th>折抵</th>
                                            <th>售價</th>
                                            <th>卡號末四碼</th>
                                            <th>訂單成立</th>    
                                    </tr>
                                    <tr>
                                            <td >HTML快速入門-張老闆帶你飛</td> 
                                            <td>CC Point折抵：NT$100</td> 
                                            <td>NT$2,500</td>
                                            <td>卡號末四碼：6969</td> 
                                            <td>訂單成立：2020-06-07 22:35</td>
                                    </tr>
                                    <tr>
                                        <td>職人必修的 RWD 網頁入門班</td>      
                                    </tr>
                                    <tr>
                                        <td>Node.js 網站開發 with React.js</td>      
                                    </tr>

                                </table>
                            </div>
                        </div>  

                    <!-- acc結束 -->
                    </div> 
                    
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
    
</body>
</html>