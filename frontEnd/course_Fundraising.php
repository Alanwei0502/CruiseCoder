<?php
$target_nums = 50;
$target_percent = 100;
$price_1 = "3,000";
$price_2 = "2,400";
?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cruise Coders | 募資中</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/main.css">
  <script src="../js/header.js"></script>
  <!-- <link rel="stylesheet" href="../css/course.css"> -->

</head>

<body>
  <!-- include('layout/login.php'); -->
  <div class="wrap course">
    <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>
    <main>
      <section id="class-info">
<<<<<<< HEAD
<<<<<<< HEAD
        <h1>HTML快速入門-張老闆帶你飛</h1>
=======
        <h1>這樣做設計思考更有用！UX有感提案</h1>
>>>>>>> fcc712d57e7a4caf624a0a6d9563993e775030fa
=======
        <h1>HTML快速入門-張老闆帶你飛</h1>
>>>>>>> 1b31b660688f3f49ef769b0297f7bd13ceb75f05
        <div class="row">
          <div class="video">
            <iframe src="https://www.youtube.com/embed/T7GQTD_X02w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="infos">
            <h3>募資進行中</h3>
            <!-- bar -->
            <div class="target-bar">
              <div class="nums">目標<?php echo $target_nums; ?>人</div>
              <div class="percent"><?php echo $target_percent; ?>%</div>
              <div class="bar" data-nums="<?php echo $target_nums; ?>" data-percent="<?php echo $target_percent; ?>"></div>
            </div>
            <!-- 倒數時間 -->
            <p>募資倒數</p>
            <div class="times">
              <h4>27天6小時0分51秒</h4>
            </div>
            <!-- 價格 -->
            <div class="price">
              <div class="formal-price">
                <span>正式售價</span>
                <span>NT$<?php echo $price_1; ?></span>
              </div>
              <div class="fundraising-price">
                <span>募資售價</span>
                <span>NT$<?php echo $price_2; ?></span>
              </div>
            </div>
            <!-- 按鈕 -->
            <div class="btns">
              <button class="btn submit">馬上預購</button>
              <button class="btn fav"><img class="svg" src="../images/course/heart.svg" alt=""></button>
            </div>
            <p class="close">預計結束時間：2021/01/11</p>
          </div>
        </div>
      </section>
      <section id="class-detail">
        <ul class="tab">
          <li class="active"><a href="#class">課程資訊</a></li>
          <li><a href="#qa">留言發問</a></li>
        </ul>
        <!-- 課程資訊 -->
        <div class="tab-content active" id="class">
          <h2>&lt; 課程資訊 &#47;&gt;</h2>
          <div class="info">
            <h4>關於課程</h4>
            <div class="row">
              <div class="col">
                <img src="../images/course/1.png" alt="">
                <p>課程時長<br>4小時0分鐘</p>
              </div>
              <div class="col">
                <img src="../images/course/2.png" alt="">
                <p>目標購買數<br>46為同學</p>
              </div>
              <div class="col">
                <img src="../images/course/3.png" alt="">
                <p>沒有期限<br>不限觀看次數</p>
              </div>
            </div>
          </div>
          <div class="info">
            <h4>課程簡介</h4>
            <p>可以入門網站基礎的架構與開發，網頁元素精準的掌控，刻出簡單有趣，視覺好看的網頁與小動畫，也會講基本的架構手法，讓你做出來的網頁易於維護也能讓工程師接手，知道出錯的時候要如何請股歌大人諭示，才能找到解決的辦法。</p>
          </div>
          <div class="info">
            <h4>關於老師 張老闆</h4>
            <div class="person">
              <div class="pic">
                <img src="../images/course/5.png" alt="">
              </div>
              <p>擁有高超的職業技巧，張老師是一個充滿熱情又經驗豐富的自由網站設計師、前端工程師、部落客、數位創業家。過去他在加拿大受到很好的教育，也有很多相當多的教學經驗，這讓她有充分的技巧可以解決問題以及教授網站設計相關知識。(還有如何讓程式碼更容易被理解。)</p>
            </div>
          </div>
        </div>
        <!-- 留言 -->
        <div class="tab-content" id="qa">
          <h2>&lt; 留言發問 &#47;&gt;</h2>
          <div class="comments">
            <!-- 發問 1 -->
            <div class="comment post">
              <div class="row">
                <div class="pic"><img src="../images/course/4.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>blackjosh</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <p>希望能夠多講一些現階段準備出社會、步入職場可以用到的實戰經驗與演練題，感謝!by 社會新鮮人</p>
                  </div>
                </div>
              </div>
              <!-- 回覆1 -->
              <div class="row reply">
                <div class="pic"><img src="../images/course/5.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>授課老師</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <p>會介紹如何由範例延伸解決實際問題的做法，一起加油!</p>
                  </div>
                </div>
              </div>
              <!-- 回覆2 -->
              <div class="row reply">
                <div class="pic"><img src="../images/course/5.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>授課老師</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <p>您好，這堂課程老師也有準備豐富的講義教材，開課時也會提供給學員們下載使用哦，祝您學習愉快。</p>
                  </div>
                </div>
              </div>
              <!-- 底部按鈕 -->
              <div class="btns">
                <button class="btn reply">
                  <img src="../images/course/reply.svg" alt="">
                  <span>回覆</span>
                </button>
              </div>
            </div>
            <!-- 發問 2 -->
            <div class="comment post">
              <div class="row">
                <div class="pic"><img src="../images/course/4.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>c159cicx</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <p>想問老師會成立社團讓學員討論和發問嗎？</p>
                  </div>
                </div>
              </div>
              <!-- 底部按鈕 -->
              <div class="btns">
                <button class="btn reply">
                  <img src="../images/course/reply.svg" alt="">
                  <span>回覆</span>
                </button>
              </div>
            </div>
            <!-- 查看更多 -->
            <button class="btn more">查看更多</button>
          </div>
        </div>
      </section>
      <a href="#0" class="top"><img src="" alt=""></a>
    </main>
    <?php
    include('layout/footer.php');
    ?>
    <script src="../js/galaxy.js"></script>
    <script>
      var class_ajax = {
        name: "這樣做設計思考更有用！UX有感提案",
        price: 1200,
        image: "../images/article/panel.png",
        status: "募資中",
      }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
      $(function() {
        //測試用
        $('.fav').click(function() {
          $(this).toggleClass('active')
        })
        $('#class-detail .tab li a').click(function(e) {
          e.preventDefault()
          $(this).parent().addClass('active')
            .siblings('li').removeClass('active')

          let $content = $($(this).attr('href'))
          $content
            .fadeIn()
            .siblings('.tab-content').fadeOut()
        })
      })
    </script>
    <!-- <script src="../js/app.min.js"></script> -->
  </div>
</body>

</html>