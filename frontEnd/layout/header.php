<?php

?>

<header>
  <div class="headerLeft">
    <a href="./index.php">
      <img class="logo" src="./../images/logoCruise.png" alt="圖片無法顯示">
    </a>
  </div>
  <div class="headerMiddle">
    <nav>
      <ul>
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
        <label><input type="checkbox"><span></span></label>
        <!-- <img src="./../images/backEnd/memberIcon.png" alt="圖片無法顯示"> -->
        <ul>
          <li><a href="./ccPoint.php" class="ccp">200</a></li>
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