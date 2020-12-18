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
        <img src="./../images/backEnd/memberIcon.png" id="member" alt="圖片無法顯示">
        
        <div class="memberNav">
          <ul>
            <li><a href="./ccPoint.php">CC Point : 200</a></li>
            <li><a href="./info.php">個人檔案</a></li>
            <li><a href="./order.php">訂單資訊</a></li>
            <li><a href="#">登出</a></li>
          </ul>
        </div>
        <div id="cart-box" data-count="0">
          <img src="./../images/shoppingIcon.png" alt="圖片無法顯示" id="cart">
        </div>
        <div class="shoppingFancybox">
          <p class="none">購物車是空的喔！！</p>
          <!-- <div class="shopping">
            <div class="itemImage"><img src="./../images/article/panel.png" alt="無法顯示圖片"></div>
            <div class="itemText">
              <p class="courseTitle">職人必修的 RWD 網頁入門</p>
              <div class="itemTextButtom">
                <p class="status">已開課</p>
                <p class="price">NT$ 1,200</p>
              </div>
            </div>
          </div>
          <div class="shopping">
            <div class="itemImage"><img src="./../images/article/panel.png" alt="無法顯示圖片"></div>
            <div class="itemText">
              <p class="courseTitle">職人必修的 RWD 網頁入門</p>
              <div class="itemTextButtom">
                <p class="status">已開課</p>
                <p class="price">NT$ 1,200</p>
              </div>
            </div>
          </div> -->
          <div class="shoppingTotal">
            <p data-total="0" data-price="0">總計 0 堂課<br><span>NT$ 0</span></p>
            <button>前往購物車</button>
          </div>
        </div>
        <button class="menu-toggle">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
      </div>
    </header>

