<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>宇宙漫遊</title>
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <?php
  include('layout/login.php');
  ?>
  <div class="wrap index">
    <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>
    <main>
      <div class="banner">
        <div class="container">
          <h1>外星課程</h1>
          <p>
            Cruise Coders 擁有多元的課程<br>
            給需要學習程式語言的人、打造一個友善的學習環境<br>
            透過您的手機、電腦就可以隨時隨地學習！<br>
          </p>
          <a href="#">前往試煉</a>
        </div>

        <img src="../images/Planet1.png" class="Planet1">
        <img src="../images/Planet2.png" class="Planet2">
        <img src="../images/Planet3.png" class="Planet3">
        <img src="../images/Planet4.png" class="Planet4">
      </div>
      <!-- 輪撥開始 -->
      <div class="skw-pages">
        <div class="skw-page skw-page-1 active">
            <div class="skw-page__half skw-page__half--left">
                <div class="skw-page__skewed">
                    <div class="skw-page__content"></div>
                </div>
            </div>
            <div class="skw-page__half skw-page__half--right">
                <div class="skw-page__skewed">
                    <div class="skw-page__content">
                        <h2 class="skw-page__heading">Skewed One Page Scroll</h2>
                        <p class="skw-page__description">Just scroll down</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="skw-page skw-page-2">
            <div class="skw-page__half skw-page__half--left">
                <div class="skw-page__skewed">
                    <div class="skw-page__content">
                        <h2 class="skw-page__heading">Page 2</h2>
                        <p class="skw-page__description">Nothing to do here, continue scrolling.</p>
                    </div>
                </div>
            </div>
            <div class="skw-page__half skw-page__half--right">
                <div class="skw-page__skewed">
                    <div class="skw-page__content"></div>
                </div>
            </div>
        </div>
        <div class="skw-page skw-page-3">
            <div class="skw-page__half skw-page__half--left">
                <div class="skw-page__skewed">
                    <div class="skw-page__content"></div>
                </div>
            </div>
            <div class="skw-page__half skw-page__half--right">
                <div class="skw-page__skewed">
                    <div class="skw-page__content">
                        <h2 class="skw-page__heading">Page 3</h2>
                        <p class="skw-page__description">The end is near, I promise!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="skw-page skw-page-4">
            <div class="skw-page__half skw-page__half--left">
                <div class="skw-page__skewed">
                    <div class="skw-page__content">
                        <h2 class="skw-page__heading">Page 4</h2>
                        <p class="skw-page__description">Ok, ok, just one more scroll!</p>
                    </div>
                </div>
            </div>
            <div class="skw-page__half skw-page__half--right">
                <div class="skw-page__skewed">
                    <div class="skw-page__content"></div>
                </div>
            </div>
        </div>
        <div class="skw-page skw-page-5">
            <div class="skw-page__half skw-page__half--left">
                <div class="skw-page__skewed">
                    <div class="skw-page__content"></div>
                </div>
            </div>
            <div class="skw-page__half skw-page__half--right">
                <div class="skw-page__skewed">
                    <div class="skw-page__content">
                        <h2 class="skw-page__heading">Epic finale</h2>
                        <p class="skw-page__description">
                            Feel free to check 
                            <a class="skw-page__link" href="https://codepen.io/suez/pens/public/" target="_blank">my other pens</a> and follow me on 
                            <a class="skw-page__link" href="https://twitter.com/NikolayTalanov" target="_blank">Twitter</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- 輪撥結束 -->
    </main>
    <?php
    include('layout/footer.php');
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="../js/login.js"></script>
  <script src="../js/index.js"></script>
</body>

</html>