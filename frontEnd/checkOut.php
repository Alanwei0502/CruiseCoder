<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cruise Coders | 購物車</title>
    <link rel="stylesheet" href="./../css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="icon" href="../ico.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
</head>

<body>
    <div class="wrap checkOut">
        <?php
        include 'layout/spacebackground.php';
        include 'layout/header.php';
        ?>
        <main>
            <h2>
                < 購物車 />
            </h2>
            <h3>購買列表</h3>
            <div class="shoppingList" id="app3">
                <!-- <div class="course">
                    <div class="top">
                        <div class="left">
                            <div class="course_Img">
                                <a href="course_start_class.php">
                                    <img :src="course[0].cImage" alt="">
                                </a>
                            </div>
                            <div class="title">
                                <a href="course_start_class.php">
                                    {{course[0].cTitle}}
                                </a>
                            </div>
                        </div>
                        <a href=""><i class="far fa-times-circle close"></i></a>
                    </div>
                    <div class="bottom">
                        <p class="type">{{status[1]}}</p>
                        <p class="singlePrice">NT{{course[0].cPrice}}</p>
                    </div>
                </div>
                <div class="course">
                    <div class="top">
                        <div class="left">
                            <div class="course_Img">
                                <a href="course_Fundraising.php">
                                    <img src="../images/allCourse/course01.png" alt="">
                                </a>
                            </div>
                            <div class="title">
                                <a href="course_Fundraising.php">
                                    Alan Wei Wei 讓你變CSS高手
                                </a>
                            </div>
                        </div>
                        <a href=""><i class="far fa-times-circle close"></i></a>
                    </div>
                    <div class="bottom">
                        <p class="type">募資中</p>
                        <p class="singlePrice">NT,1200</p>
                    </div>
                </div> -->
                <table-component v-for="(single,index) in course" :mytitle="single.cTitle" :myimg="single.cImage" :mystatus="status[index]" :myprice="single.cPrice" :mycNumber="single.cNumber"></table-component>
            </div>
            <div class="price" id="app">
                <div class="discount">
                    <form class="ccPoint" :data-id="ccPointNt">
                        現有 {{ccPoint}} CC Point，您可以折抵NT${{ccPointNt}}，欲折<input type="text" name="" id="" @input="setMessage" v-model="message" class="ccpInput" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" onkeypress="if (event.keyCode == 13) {return false;}">元
                    </form>
                </div>
                <p class="overCcp"></p>
                <div class="sum">
                    <div class="ccPoint">
                        <p class="text">CC Point 折抵</p>
                        <p class="price">- NT$ {{message}} </p>
                    </div>
                    <div class="total">
                        <p class="text">總計</p>
                        <div class="price">NT$ {{total}}</div>
                    </div>
                    <div class="pay">
                        <p class="text">結帳總金額：</p>
                        <div class="price">NT$ {{totalPrice}}</div>
                    </div>
                </div>
            </div>
            <div class="payment">
                <div class="title">填寫付款資料</div>
                <form class="info" method="post" action="./checkOutInsertR.php" name="info" id="info">
                    <!-- <form class="info" method="post" action=""  name="info" onclick="return false"> -->
                    <div class="text">
                        <p>付款方式-信用卡</p>
                        <div class="img">
                            <img src="../images/allCourse/creditcard.png" alt="">
                        </div>
                    </div>
                    <p class="note">為必填欄位</p>
                    <div class="name">
                        <label class="text">
                            持卡人姓名
                        </label>
                        <input type="text" id="card_Name" placeholder="請輸入持卡人姓名" name="cardName" onkeyup="value=value.replace(/[\d]/g,'') "onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[\d]/g,''))" >
                    </div>
                    <div class="phoneNum">
                        <label class="text">
                            手機號碼
                        </label>
                        <input type="text" id="phone_Num" maxlength="10" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" placeholder="請輸入手機號碼" name="number">
                    </div>
                    <div class="creditCardNum">
                        <label class="text">
                            信用卡卡號
                        </label>
                        <input type="text" maxlength="4" class="creditCard_Num" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                        <input type="text" maxlength="4" class="creditCard_Num" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                        <input type="text" maxlength="4" class="creditCard_Num" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                        <input type="text" maxlength="4" class="creditCard_Num oCard" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                    </div>
                    <div class="date" id="app2">
                        <label class="text">
                            有效日期
                        </label>
                        <select>
                            <option :value="index+1" v-for="(month,index) in 12">{{month}}</option>
                        </select>
                        <label for="" class="months">月</label>

                        <select>
                            <option :value="year" v-for="year in years">{{year}}</option>
                        </select>
                        <label for="" class="years">年</label>
                    </div>
                    <div class="creditCardCsc">
                        <label class="text">
                            背面末三碼
                        </label>
                        <input type="text" id="credit_CardCsc" maxlength="3" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" name="creditCardCsc">
                    </div>
                    <button type="submit" id="submit_Btn">確認並送出</button>
                </form>
            </div>
            <!-- 付款成功燈箱 -->
            <div class="success">
                <section>
                    <!-- 叉叉 -->
                    <!-- <div class="close">
                        <img src="../images/backEnd/cancel.png" alt="" class="close">
                    </div> -->
                    <div class="successfulTransaction">
                        <img src="../images/checkOut/successfulTransaction.png" alt="">
                    </div>
                    <p class="title">交易完成</p>
                    <button class="go_Course">前往我的訂單</button>
                </section>
            </div>
            <!-- 付款失敗燈箱 -->
            <div class="failed">
                <section>
                    <!-- 叉叉 -->
                    <!-- <div class="close">
                        <img src="../images/backEnd/cancel.png" alt="" class="close">
                    </div> -->
                    <div class="failedTransaction">
                        <img src="../images/checkOut/failedTransaction.png" alt="">
                    </div>
                    <p class="failed_Title">交易失敗</p>
                    <button class="go_checkOut">回到結帳頁面</button>
                </section>
            </div>
        </main>
        <?php
        include 'layout/footer.php';
        ?>
        <script src="../js/checkOut.js"></script>
        <script src="../js/header.js"></script>
        <script src="../js/is.js"></script>
        <script src="../js/vue.js"></script>

    </div>
</body>

</html>