<?php
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
                <div class="accordion">
                    <!------- 第一張訂單明細 ------->              
                    <div class="option option_1">
                        <input type="checkbox" id="toggle1" class="toggle"/><label class="title" for="toggle1">
                                <div class="Order_1">
                                <div><img src="../images/order/computer.jpeg" alt=""></div>
                                    <div>
                                        <p>訂單編號：202006072235</p>
                                    </div>
                                    <div>
                                        <p>NT$2,400</p>
                                    </div>
                                    <!-- <i class="fas fa-chevron-circle-up fa-2x"></i> -->
                                </div>
                        </label>
                                                <!------- 下方收合明細 ------->
                        <div class="content">
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

                    <!-- 2 -->

                    <div class="option option_2">
                        <input type="checkbox" id="toggle2" class="toggle"/><label class="title" for="toggle2">
                                <div class="Order_2">
                                    <div><img src="../images/order/computer.jpeg" alt=""></div>
                                    <div>
                                        <p>訂單編號：202006072235</p>
                                    </div>
                                    <div>
                                        
                                        <p>NT$2,400</p>
                                    </div>
                                    <!-- <i class="fas fa-chevron-circle-up fa-2x"></i> -->
                                </div>
                        </label>
                                                <!------- 下方收合明細 ------->
                        <div class="content">
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

                    <!-- 3 -->

                    <div class="option option_3">
                        <input type="checkbox" id="toggle3" class="toggle"/><label class="title" for="toggle3">
                                <div class="Order_3">
                                <div><img src="../images/order/computer.jpeg" alt=""></div>
                                    <div>
                                        <p>訂單編號：202006072235</p>
                                    </div>
                                    <div>
                                        <!-- <p>訂單編號：202006072235</p> -->
                                        <p>NT$2,400</p>
                                    </div>
                                    <!-- <i class="fas fa-chevron-circle-up fa-2x"></i> -->
                                </div>
                        </label>
                                                <!------- 下方收合明細 ------->
                        <div class="content">
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

                    <!-- 4 -->


                    <div class="option option_4">
                        <input type="checkbox" id="toggle4" class="toggle"/><label class="title" for="toggle4">
                                <div class="Order_4">
                                <div><img src="../images/order/computer.jpeg" alt=""></div>
                                    <div>
                                        <p>訂單編號：202006072235</p>
                                    </div>
                                    <div>
                                        <!-- <p>訂單編號：202006072235</p> -->
                                        <p>NT$2,400</p>
                                    </div>
                                    <!-- <i class="fas fa-chevron-circle-up fa-2x"></i> -->
                                </div>
                        </label>
                                                <!------- 下方收合明細 ------->
                        <div class="content">
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
    
</body>
</html>