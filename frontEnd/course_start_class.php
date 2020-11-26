<?php
?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cruise Coders | 已開課</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/main.css">
    <!-- <link rel="stylesheet" href="../css/course.css"> -->

</head>

<body>
  <!-- include('layout/login.php'); -->
  <div class="wrap course">
    <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>
    <main id="sell-page">
      <section id="class-info">
        <h1>HTML快速入門-張老闆帶你飛</h1>
        <div class="row-sell">
          <div class="video">
            <iframe src="https://www.youtube.com/embed/T7GQTD_X02w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <!-- 評分 -->
          <div class="score">
            <div class="nums"></div>
            <!-- data-score 計算好的分數滿分5 data-color 指定的顏色 -->
            <div class="stars" data-score="5" data-color="#fcc93d">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <span>(2)</span>
          </div>
          <div class="infos">
            <!-- 價格 -->
            <div class="price">
              <div class="formal-price">
                <span>售價</span>
                <span>NT$1,980</span>
              </div>
            </div>
            <!-- 按鈕 -->
            <div class="btns">
              <button class="btn submit">立即購買</button>
              <button class="btn fav"><img class="svg" src="../images/course/heart.svg" alt=""></button>
            </div>
          </div>
        </div>
      </section>
      <section id="class-detail">
        <ul class="tab">
          <li class="active"><a href="#class">課程資訊</a></li>
          <li><a href="#score">課程評價</a></li>
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
        <!-- 評價 -->
        <div class="tab-content" id="score">
          <h2>&lt; 課程評價 &#47;&gt;</h2>
          <!-- 評分 -->
          <div class="score">
            <div class="nums">5.0</div>
            <div class="col">
              <div class="stars" data-score="5" data-color="red">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
              <span>2則評價</span>
            </div>
          </div>
          <!-- 評分內容 -->
          <div class="score-posts comments">
            <!-- 評分 1 -->
            <div class="comment post">
              <div class="row">
                <div class="pic"><img src="../images/course/7.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>Kuo0122</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="stars" data-score="5" data-color="red">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="text-box">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus, sit. Deleniti excepturi praesentium delectus quae at minima rerum quidem facilis, consectetur qui ea a blanditiis iusto ab mollitia nihil nobis!</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- 評分 2 -->
            <div class="comment post">
              <div class="row">
                <div class="pic"><img src="../images/course/8.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>Andrew</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="stars" data-score="5" data-color="red">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="text-box">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus, sit. Deleniti excepturi praesentium delectus quae at minima rerum quidem facilis, consectetur qui ea a blanditiis iusto ab mollitia nihil nobis!</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- 查看更多 -->
            <button class="btn more">查看更多</button>
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
                    <h5>tiffany0622</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus, sit. Deleniti excepturi praesentium delectus quae at minima rerum quidem facilis, consectetur qui ea a blanditiis iusto ab mollitia nihil nobis!</p>
                  </div>
                </div>
              </div>
              <!-- 回覆1 -->
              <div class="row reply">
                <div class="pic"><img src="../images/course/5.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>tiffany0622</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus, sit. Deleniti excepturi praesentium delectus quae at minima rerum quidem facilis, consectetur qui ea a blanditiis iusto ab mollitia nihil nobis!</p>
                  </div>
                </div>
              </div>
              <!-- 回覆2 -->
              <div class="row reply">
                <div class="pic"><img src="../images/course/5.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>tiffany0622</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus, sit. Deleniti excepturi praesentium delectus quae at minima rerum quidem facilis, consectetur qui ea a blanditiis iusto ab mollitia nihil nobis!</p>
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
                    <h5>tiffany0622</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus, sit. Deleniti excepturi praesentium delectus quae at minima rerum quidem facilis, consectetur qui ea a blanditiis iusto ab mollitia nihil nobis!</p>
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
    <!-- <script src="../js/app.min.js"></script> -->
    <script>
      var class_ajax = {
        name: "這樣做設計思考更有用！UX有感提案",
        price: 1200,
        image: "../images/article/panel.png",
        status: "已開課",
      }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
      $(function(){
        //測試用
        $('.fav').click(function(){
          $(this).toggleClass('active')
        })
        $('#class-detail .tab li a').click(function(e){
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
  </div>
</body>

</html>