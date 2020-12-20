<?php

include_once("./layout/connect.php");

$_SESSION['mNumber'] = $_COOKIE['unumber']??'';
$_SESSION['user'] = $_COOKIE['user']??null;
if(!isset($_SESSION['token'])){
  $_SESSION['token'] = '';
}
$token = date('Ymdhis');

$member = [];
if(isset($_SESSION['mNumber'])){
  $sql = "SELECT * 
    FROM `member`  
    WHERE mNumber = '".$_SESSION['mNumber']."'";
    if ($result = $conn->query($sql)) {
      if($r = mysqli_fetch_assoc($result)){
        $member = $r;
        if(!isset($_SESSION['cart'][$member['mNumber']]))
          $_SESSION['cart'][$member['mNumber']] = [];
      }
    }
}
$shoppingFancybox = "";
$shoppingTotal = "";
if($member){
  $allCourseID = implode("','",$_SESSION['cart'][$member['mNumber']]);
  $count = 0;
  $total = 0;
  
  $cStatus = ['已刪除','已開課','已下架','募資中'];
  $sql = "SELECT *  
  FROM `course`  
  WHERE cNumber IN ('".$allCourseID."') ";
  if ($result = $conn->query($sql)) {
    while($r = mysqli_fetch_assoc($result)){
      $shoppingFancybox .= '<li class="shopping">
      <div class="image"><img src="'.$r['cImage'].'" /></div>
      <div class="info">
        <p class="courseTitle">'.$r['cTitle'].'</p>
        <div class="itemTextButtom">
          <p class="status">'.$cStatus[$r['cStatus']].'</p>
          <p class="price">NT$ '.$r['cPrice'].'</p>
        </div>
      </div>
    </li>';
    $count++;
    $total+=$r['cPrice'];
    }
  }
  $shoppingTotal = '<p>總計 '.$count.' 堂課<br><span>NT$ '.$total.'</span></p><a href="./checkOut.php">前往購物車</a>';
}
  
  
?>
<style>
header div.headerRight ul li.shoppingCar section .shoppingTotal a{
  line-height: 33px!important;
}
</style>
<style>
  .fa-star.n:not(:hover){
  color: #fff!important;
}
.stars{
  background-image: linear-gradient(to right, rgb(252, 201, 61) 0%, rgb(252, 201, 61) 100%, transparent 100%, rgb(204, 204, 204) 100%, rgb(204, 204, 204) 100%)!important;
}
header.unsetcss {
  display: flex;
}
.course main #class-detail .tab li a{
  display: block;
}
.course main #class-detail .post .text-box.re_box{
    padding: 0;
    margin-top: 20px;
    margin-bottom: 50px;
}
.course main #class-detail .post .btns .re_box .btn{
    padding: 7px 35px;
    background-color: #fcc93b;
    border: none;
    font-size: 16px;
    border-radius: 7px;
    color: black;
    float: right;
    margin-left: 10px;
    margin-top: 10px;
}
.ddbox{
  display:none;
}
.course main #class-detail .tab li:hover{
  background-color: #fcc93b;
}
.fa-heart{
    color: #d4d4d4!important;
    font-size: 28px;
  }
.fa-heart.active{
  color:red!important;
}
h2 {
    color: white;
    font-size: 48px;
    font-weight: bold;
    font-size: 48px;
    font-weight: bold;
    position: relative;
    margin: 50px 0;
    flex-basis: 100%;
}
h2:before {
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    display: block;
    max-width: 1200px;
    width: 100%;
    border-bottom: 1px solid #fbf7eb;
}
h2:after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    display: block;
    width: 300px;
    width: 25%;
    border-bottom: 10px solid #fcc93b;
}
.rprice,
.rprice span{
    display: inline-block!important;
    text-align: right!important;
}
.btn_style{
    font-size: 32px;
    outline: none;
    transform-style: preserve-3d;
    text-decoration: none;
    color: #182749;
    border-radius: 10.66667px;
    padding: 10.66667px 32px;
    font-weight: bold;
    position: relative;
    overflow: hidden;
    transition: width .3s;
    z-index: 1;
    border-bottom: 5.33333px solid #b47f02;
    border-left: 5.33333px solid #b47f02;
    cursor: pointer;
}
.btn_style:hover {
    color: black;
    transform: translateX(3.2px) translateY(3.2px);
}
.btn_style:active {
    color: black;
    transform: translateX(6.4px) translateY(6.4px);
    padding: 10.66667px 32px;
}
.btn_style:before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #ffb102;
    z-index: -2;
}
.btn_style:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0%;
    height: 100%;
    background-color: #5bc4e3;
    transition: width .3s;
    z-index: -1;
}
.btn_style:hover:after,
.btn_style:active:after {
    width: 100%;
}
.more.btn_style{
    margin: 0 auto;
    display: block;
    margin-top: 35px;
}
.btn_submit.btn_style{
    font-size: 20px;
    float: right;
    margin-top: 10px;
}
.btn_submit2.btn_style{
    font-size: 20px;
    float: right;
    margin-top: 10px;
    margin-left: 10px;
}
.course main #class-info .btns .btn {
  padding: 20px 30px!important;

}
@media screen and (max-width: 768px){
  .btn_style{
      font-size: 20px;
      outline: none;
      transform-style: preserve-3d;
      text-decoration: none;
      color: #182749;
      border-radius: 6.66667px;
      padding: 6.66667px 20px;
      font-weight: bold;
      position: relative;
      overflow: hidden;
      transition: width .3s;
      z-index: 1;
      border-bottom: 3.33333px solid #b47f02;
      border-left: 3.33333px solid #b47f02;
      cursor: pointer;
      margin-top: 20px;
  }
  .btn_style:active {
    color: black;
    transform: translateX(4px) translateY(4px);
    padding: 6.66667px 20px;
}
.btn_style:hover {
    color: black;
    transform: translateX(2px) translateY(2px);
}
  .btn_style:active:before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #ffb102;
      z-index: -2;
  }
.btn_submit.btn_style{
    font-size: 14px;
}
.btn_submit2.btn_style{
    font-size: 14px;
}
}

.course main #class-detail .post .btns .btn{
  outline: none;
}

.course main #class-info .row-sell .infos, .course main #class-info .row-payed .infos{
  width: 50%!important;
  text-align: right;
}
.course main #class-info .row-sell .score, .course main #class-info .row-payed .score{
  width: 50%!important;
}
.course main #class-info .row-sell .formal-price span, .course main #class-info .row-payed .formal-price span{
  font-size: 45px!important;
}
.course main #class-info{
  margin-bottom: 50px;
}
.course main #class-detail .tab{
  margin-bottom: 80px;
}

@media screen and (max-width: 1200px){

}
@media screen and (max-width: 900px){
  .course main #class-info .row-sell .infos, .course main #class-info .row-payed .infos{
    width: 100%!important;
    text-align: right;
  }
  .course main #class-info .row-sell .score, .course main #class-info .row-payed .score{
    width: 100%!important;
    margin-bottom: 18px;
    margin-top: 13px;
  }
  .rprice{
      text-align: left!important;
      width: 50%;
      display: block;
      float: left;
  }
  .course main #class-info .price{
    width: 50%;
    display: block;
    float: left;
  }
  .course main #class-info .row-sell .btns, .course main #class-info .row-payed .btns{
    padding-top: 0;
  }
  .fa-heart{
    font-size: 18px;
  }
  .course main #class-info .row-sell .btns, .course main #class-info .row-payed .btns{
    text-align: right!important;
  }
  .course main #class-info .row-sell .formal-price span, .course main #class-info .row-payed .formal-price span{
    font-size: 24px!important;
  }
  .course main #class-info .row-sell .btns .btn_style, .course main #class-info .row-payed .btns .btn_style{
    font-size: 20px;
    padding: 1.66667px 16px;
    margin-top: 0!important;
  }
  .course main #class-info .row-sell .btns .fav, .course main #class-info .row-payed .btns .fav{
    padding: 7px 12px!important;
    margin-left: 16px;
  }
  .course main #class-info .row-sell .score .nums, .course main #class-info .row-payed .score .nums{
    font-size: 42px;
  }
}

@media screen and (max-width: 768px){
  h2 {
      font-size: 40px;
  }
  .course main #class-detail .tab{
    margin-bottom: 40px;
  }
}
@media screen and (max-width: 576px){
  .course main #class-info .row-sell .video, .course main #class-info .row-payed .video{
    margin-bottom: 0px;
  }
  .course main #class-info .row-sell .score .nums, .course main #class-info .row-payed .score .nums{
    font-size: 28px;
    margin-bottom: 0;
  }
  .course main #class-info .row-sell .score span, .course main #class-info .row-sell .score .stars i, .course main #class-info .row-payed .score span, .course main #class-info .row-payed .score .stars i{
    font-size: 19px;
  }
  h2 {
    font-size: 32px;
    margin: 24px 0;
}
.course main #class-detail .tab{
  margin-bottom: 20px;
}
}
@media screen and (max-width: 500px){
  .course main #class-info .price,.rprice{
    width:100%!important;
    text-align: center!important;
    margin-bottom: 10px;
  }
  .course main #class-info .row-sell .formal-price span, .course main #class-info .row-payed .formal-price span{
    display: inline-block;
    margin: 0 10px;
  }
  .course main #class-info .row-sell .btns, .course main #class-info .row-payed .btns{
    text-align: center!important;
  }
  .course main #class-info{
    margin-bottom: 15px;
  }
}
header div.headerRight ul li.shoppingCar section ul li .image{
  height: auto;
  width: auto;
  background: none;
}

header div.headerRight ul img{
  width: 100%;
  padding: 0;
  margin: 0;
}
</style>

<div class="loginWrap" id="loginWrap">
  <div class="greyGlass"></div>
  <div class="loginBox">
    <div class="createArea">
      <form action="" id="createForm" class="createHide">
        <label for="name">姓名:</label>
        <input type="text" id="name" name="name" >

        <label for="account">帳號:</label>
        <input type="text" id="account" name="account" class="checkString" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')" onpaste="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')" oncontextmenu = "value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')">

        <label for="password">密碼:</label>
        <input type="password" id="password" name="password" class="checkString" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')" onpaste="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')" oncontextmenu = "value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')">

        <label for="confirmPassword">確認密碼:</label>
        <input type="password" id="confirmPassword">

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email">

        <button type="submit" value="Submit" id="createAccount">註冊</button>
      </form>

    </div>
    <div class="loginArea" class="">
      <form action="" id="loginForm" class="">
        <img src="../images/logoCruise.png" width="300px">
        <input type="text" class="account" placeholder="Account" name="loginAccount" id="loginAccount">
        <input type="password" class="password" placeholder="Password" name="loginPassword" id="loginPassword">
        <button type="submit" value="Submit" id="login">登入</button>
      </form>
    </div>

    <div class="upArea">
      <div class="slideBlock">
        <div class="item1">
          <p>還沒有帳號了嗎？</p>
          <button>註冊</button>
        </div>
        <div class="item2">
          <p class="item2Pmove">已經有帳號了？</p>
          <button class="item2Pbotton">登入</button>
        </div>
      </div>
    </div>
    <img src="../images/backEnd/cancel.png" id="closeIcon">
  </div>
</div>

<header class="unsetcss">
  <div class="headerLeft">
    <a href="./index.php">
      <img class="logo" src="./../images/logoCruise.png" alt="圖片無法顯示">
      <img class="logo1" src="./../images/logoCruise1.png" alt="圖片無法顯示">
    </a>
  </div>
  <div class="headerMiddle">
    <nav>
      <ul class="computerNav">
        <li>
          <a href="./allCourse.php">外星課程</a>
        </li>
        <li>
          <a href="./galaxy.php">語宙試煉</a>
        </li>
        <li>
          <a href="./article.php">太空補給站</a>
        </li>
        <li>
          <a href="./tutorial.php">蟲洞練功坊</a>
        </li>
      </ul>
    </nav>
  </div>
  <div class="headerRight">
    <ul>
      <li class="shoppingCar">
        <label><input type="checkbox"><span></span></label>
        <!-- <img src="./../images/shoppingIcon.png" alt="圖片無法顯示"> -->
        <section>
          <ul class="shoppingFancybox">
            <?PHP 
              if($count>0){
                echo $shoppingFancybox;
              }else{
                echo '<li class="shopping" style="width: 270px">尚未加入課程</li>';
              }
            ?>
          </ul>
          <div class="shoppingTotal">
          <?PHP 
          if($count>0){
            echo $shoppingTotal;
          }
          ?>
          </div>
        </section>
      </li>
      <li class="member">
        <label id="member"><input type="checkbox"><span></span></label>
        <!-- <img src="./../images/backEnd/memberIcon.png" alt="圖片無法顯示"> -->
        <ul>
          <li><a href="./ccPoint.php" class="ccp">19850</a></li>
          <li class="smlSize"><a href="./allCourse.php">外星課程</a></li>
          <li class="smlSize"><a href="./galaxy.php">語宙試煉</a></li>
          <li class="smlSize"><a href="./article.php">太空補給站</a></li>
          <li class="smlSize"><a href="./tutorial.php">蟲洞練功坊</a></li>
          <li><a href="./info.php">個人檔案</a></li>
          <li><a href="./order.php">訂單資訊</a></li>
          <li ><a class="callLoginBox" href="#" >登入</a></li>
          <li ><a class="logout" href="#">登出</a></li>
        </ul>
      </li>
    </ul>
  </div>
</header>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- alert套件 ↓↓↓↓ -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>