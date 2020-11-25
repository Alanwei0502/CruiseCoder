<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>宇宙漫遊</title>
  <link rel="stylesheet" href="./../css/main.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
</head>

<body>
  <div class="wrap allCourse">
    <?php
    include 'layout/spacebackground.php';
    include 'layout/header.php';
    ?>
    <main>
      <div class="top">
        <!-- 搜尋列 -->
        <div class="filter">
            <h2>
              < 外星課程 />
            </h2>
          <form class="search" action="" method="POST">
            <input type="search" placeholder="找課程名稱">
            <button type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
          <div class="category">
            <button id="hot" data-target="tab1" class="tab -on">熱門課程</button>
            <button id="fundraising" data-target="tab2" class="tab">募資課程</button>
            <button id="all" data-target="tab3" class="tab">所有課程</button>
            <select name="" id="">
              <option value="Cate"" style=" display:none">課程類型</option>
              <option value="HTML">HTML</option>
              <option value="CSS">CSS</option>
              <option value="JavaScript">JavaScript</option>
            </select>
          </div>
        </div>
      </div>
      <div class="content">
        <h3>熱門課程</h3>
        <!-- 課程開始 -->
        <div class="course">
          <!-- 一般課程 -->
          <div class="wrapGeneral ">
            <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
            <div class="favorites">
              <i class="fas fa-heart"></i>
            </div>
            <a class="img" href="">
              <img src="../images/allCourse/course01.png" alt="">
            </a>
            <div class="c_Main">
              <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
              <div class="time">課程總長：120分鐘</div>
              <div class="comment">
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <a class="text" href="">24則評價</a>
              </div>
              <div class="price">NT.1,200</div>
            </div>
          </div>
          <div class="wrapGeneral ">
            <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
            <div class="favorites">
              <i class="fas fa-heart"></i>
            </div>
            <a class="img" href="">
              <img src="../images/allCourse/course01.png" alt="">
            </a>
            <div class="c_Main">
              <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
              <div class="time">課程總長：120分鐘</div>
              <div class="comment">
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <a class="text" href="">24則評價</a>
              </div>
              <div class="price">NT.1,200</div>
            </div>
          </div>
          <div class="wrapGeneral ">
            <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
            <div class="favorites">
              <i class="fas fa-heart"></i>
            </div>
            <a class="img" href="">
              <img src="../images/allCourse/course01.png" alt="">
            </a>
            <div class="c_Main">
              <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
              <div class="time">課程總長：120分鐘</div>
              <div class="comment">
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <a class="text" href="">24則評價</a>
              </div>
              <div class="price">NT.1,200</div>
            </div>
          </div>
          <!-- 募資課程 -->
          <div class="wrapFundraising">
            <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
            <div class="favorites">
              <i class="fas fa-heart"></i>
            </div>
            <a class="img" href="">
              <img src="../images/allCourse/course01.png" alt="">
            </a>
            <div class="c_Main">
              <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
              <div class="time">課程總長：120分鐘</div>
              <div class="price">
                <p class="fundraising">募資中</p>
                <div class="text">
                  <p class="preOrder">預購價</p>
                  <p class="price">NT.900</p>
                </div>
              </div>
              <div class="progressbar">
                <span class="progress" style="width: 35%;"></span>
              </div>
              <div class="funNum">已募資 1/50 人</div>
            </div>
          </div>
          <div class="wrapFundraising">
            <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
            <div class="favorites">
              <i class="fas fa-heart"></i>
            </div>
            <a class="img" href="">
              <img src="../images/allCourse/course01.png" alt="">
            </a>
            <div class="c_Main">
              <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
              <div class="time">課程總長：120分鐘</div>
              <div class="price">
                <p class="fundraising">募資中</p>
                <div class="text">
                  <p class="preOrder">預購價</p>
                  <p class="price">NT.900</p>
                </div>
              </div>
              <div class="progressbar">
                <span class="progress" style="width: 35%;"></span>
              </div>
              <div class="funNum">已募資 1/50 人</div>
            </div>
          </div>
          <div class="wrapFundraising">
            <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
            <div class="favorites">
              <i class="fas fa-heart"></i>
            </div>
            <a class="img" href="">
              <img src="../images/allCourse/course01.png" alt="">
            </a>
            <div class="c_Main">
              <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
              <div class="time">課程總長：120分鐘</div>
              <div class="price">
                <p class="fundraising">募資中</p>
                <div class="text">
                  <p class="preOrder">預購價</p>
                  <p class="price">NT.900</p>
                </div>
              </div>
              <div class="progressbar">
                <span class="progress" style="width: 35%;"></span>
              </div>
              <div class="funNum">已募資 1/50 人</div>
            </div>
          </div>

        </div>
      </div>
      <!--頁碼開始-->
      <div class="pagenum">
        <ul>
          <li><a href="#">
              <</a> </li> <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">></a></li>
        </ul>
      </div>
      <!--頁碼結束-->
    </main>
    <?php
    include 'layout/footer.php';
    ?>
    <script src="../js/allCourse.js"></script>

  </div>
</body>

</html>