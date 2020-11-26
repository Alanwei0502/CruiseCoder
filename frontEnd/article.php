<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cruise Coder | 太空補給站</title>
  <link rel="stylesheet" href="./../css/main.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body>
  <div class="wrap article">
    <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>
    <main>
      <img src="./../images/article/spaceshipinterior.png" class="bottomLayer" alt="圖片無法顯示">
      <img src="./../images/article/astronaut1.png" class="astronaut1" alt="圖片無法顯示">
      <img src="./../images/article/astronaut2.png" class="astronaut2" alt="圖片無法顯示">
      <img src="./../images/article/astronaut3.png" class="astronaut3" alt="圖片無法顯示">
      <img src="./../images/article/planet1.png" class="planet1" alt="圖片無法顯示">
      <img src="./../images/article/planet2.png" class="planet2" alt="圖片無法顯示">
      <img src="./../images/article/planet3.png" class="planet3" alt="圖片無法顯示">
      <img src="./../images/article/planet4.png" class="planet4" alt="圖片無法顯示">
      <div class="allContent">
        <div class="blur">
          <img src="./../images/article/spaceshipinterior.png" alt="圖片無法顯示">
        </div>
        <div class="backColor"></div>
        <div class="panel">
          <img src="./../images/article/panel.png" alt="圖片無法顯示">
        </div>
        <div class="panelTop">
          <h2>&lt;太空補給站&#47;&gt;</h2>
          <input type="text" placeholder="專欄關鍵字">
          <img src="./../images/article/battery.png" class="battery" alt="圖片無法顯示">
          <p class="prePage">返回</p>
          <div class="content">
            <div class="articleTitle">
              <div class="articleInside">
                <div class="articleImageScale">
                  <img src="./../images/article/topBook.jpg" alt="圖片無法顯示" class="articleImage">
                </div>
                <h4>十大好書推薦</h4>
              </div>
              <div class="articleInside">
                <div class="articleImageScale">
                  <img src="./../images/article/editor.jpg" alt="圖片無法顯示">
                </div>
                  <h4>編輯器推薦</h4>
              </div>
              <div class="articleInside">
                <div class="articleImageScale">
                  <img src="./../images/article/study.jpg" alt="圖片無法顯示">
                </div>
                <h4>自學力網站資源</h4>
              </div>
              <div class="articleInside">
                <div class="articleImageScale">
                  <img src="./../images/article/software.jpg" alt="圖片無法顯示">
                </div>
                <h4>軟體推薦</h4>
              </div>
              <div class="articleInside">
                <div class="articleImageScale">
                  <img src="./../images/article/tools.jpg" alt="圖片無法顯示">
                </div>
                <h4>好用套件推薦</h4>
              </div>
            </div>
            <div class="articleContent none">
              <h3>十大好書推薦</h3>
              <p>學網站製作、做網站、網站切版、網站架設、前端編程⋯⋯等很多不同的名稱。總之一切的一切都要從最基本的 HTML、CSS學習開始，基本上網站前端切版是用：HTML + CSS + Javascript，而他們其實各自都是不同的「語言」。看到這邊先別擔心，除了 javascript 之外，另外兩個都是比較「簡單」的程式語言。</p>
              <img src="./../images/article/topBook1.jpeg" alt="圖片無法顯示">
              <h4>學好跨平台網頁設計：HTML5、CSS3、JavaScript、jQuery與Bootstrap 4超完美特訓班</h4>
              <p>網頁的入門書常常都是這樣，一次包了一堆教學在裡面，會從最基礎的 HTML、CSS 開始教你，後面開始越教越深。這本書是文淵閣工作室編輯的，通常這個工作室會比較注重實戰、實際案例應用，而這種學習方式也是我認為比較有用的，因此推薦。</p>
              <img src="./../images/article/topBook2.jpeg" alt="圖片無法顯示">
              <h4>最新 HTML5+CSS3 網頁程式設計</h4>
              <p>這本書鎖定的重點是基礎中的重中之重，就是 HTML + CSS，我自己是比較偏好教學書不要包山包海，而是重點教學，其實學好 HTML +CSS 你就可以製作網站了，不蓋你大概所有網頁畫面你都可以製作了，但是要有程式互動的效果、以及更有效率的做網站就需要 javascript、boostrap 等，但重點還是在於先把 HTML5 + CSS3 學好。施威銘研究室也是注重實際應用的團隊，我自己也看過好幾本他們的書，瀏覽了一下這本也是會將各個技巧獨立出來讓讀者練習，這樣會是有效的學習方式。</p>
              <img src="./../images/article/topBook3.jpeg" alt="圖片無法顯示">
              <h4>HTML&CSS：網站設計建置優化之道</h4>
              <p>這本滿有名的，評價也不錯。作者是外國人，有時感覺外國人在「寫書」教學這塊真的很厲害，總能把各個篇章分得很好，系統性的讓你學會網站程式。</p>
              <img src="./../images/article/topBook4.jpeg" alt="圖片無法顯示">
              <h4>設計師一定要學的 HTML5‧CSS3 網頁設計手冊：零基礎也能看得懂、學得會</h4>
              <p>這本是 2020 出版的新書，在網頁程式界、學習資源通常是越新越好，雖然做為網頁的基底的 HTML 和 CSS 只要是 HTML5 和 CSS3 版本之後的就沒問題。從書名就可以看出，作者感覺在編排上花了很多功夫，想讓門外漢也能輕易的入門。建議購買前可以先預覽一下排版，可能有些人會喜歡，有些人也許不太喜歡這樣太多圖樣的編排，這全看每個人看書的習慣，我自己其實也有點不太習慣這樣的編排方式。可能我喜歡都是程式和文字，扎實的硬嗑吧。</p>
            </div>
          </div>
        </div>
      </div>
      <div class="ecgBack colse">
        <img src="./../images/article/panel2.png" alt="圖片無法顯示">
        <svg>
          <polyline points="360,100 310,100 305,95 300,105 295,90 290,120 280,80 270,100 250,160 230,60 210,130 200,90 195,110 190,100 186,90 175,120 168,70 165,100 150,140 130,100 125,80 115,110 110,100 100,115 95,85 90,110 85,90 80,100 30,100" class="ecg"/>
        </svg>
      </div>
      <div class="radarBack close">
        <img src="./../images/article/radarBack.png" class="radarBackImage" alt="圖片無法顯示">
        <div class="radar colse">
          <div class="radarLine"></div>
          <div class="radarShadow"></div>
        </div>
      </div>
      <div class="bluelight"></div>
    </main>
    <?php
    include('layout/footer.php');
    ?>
  </div>
  <script src="../js/header.js"></script>
  <script src="./../js/article.js"></script>
</body>

</html>