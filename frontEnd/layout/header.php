<?php

?>

<div class="loginWrap" id="loginWrap">
  <div class="greyGlass"></div>
  <div class="loginBox">
    <div class="createArea">
      <form action="" id="createForm" class="createHide">
        <label for="name">姓名:</label>
        <input type="text" id="name">

        <label for="account">帳號:</label>
        <input type="text" id="account">

        <label for="password">密碼:</label>
        <input type="password" id="password">

        <label for="confirmPassword">確認密碼:</label>
        <input type="password" id="confirmPassword">

        <label for="email">E-mail:</label>
        <input type="email" id="email">

        <button type="submit" value="Submit" id="createAccount">註冊</button>
      </form>

    </div>
    <div class="loginArea" class="">
      <form action="" id="loginForm" class="">
        <img src="../images/logoCruise.png" width="300px">
        <input type="text" class="account" placeholder="Account">
        <input type="password" class="password" placeholder="Password">
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

<header>
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
            <li class="shopping">
              <div class="image"></div>
              <div class="info">
                <p class="courseTitle">一變應萬變：RWD 響應式網頁設計</p>
                <div class="itemTextButtom">
                  <p class="status">已開課</p>
                  <p class="price">NT$ 1,200</p>
                </div>
              </div>
            </li>
            <li class="shopping">
              <div class="image"></div>
              <div class="info">
                <p class="courseTitle">張老闆帶你飛</p>
                <div class="itemTextButtom">
                  <p class="status">已開課</p>
                  <p class="price">NT$ 1,200</p>
                </div>
              </div>
            </li>
          </ul>
          <div class="shoppingTotal">
            <p>總計 2 堂課<br><span>NT$ 2,400</span></p>
            <a href="./checkOut.php">前往購物車</a>
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
          <li><a href="#">登出</a></li>
        </ul>
      </li>
    </ul>
  </div>
</header>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>