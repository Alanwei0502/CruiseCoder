<?php
?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cruise Coders | 已購買</title>
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
    <main id="payed-page">
      <section id="class-info">
        <h1>HTML快速入門-張老闆帶你飛</h1>
        <div class="row-payed">
          <div class="video">
            <iframe src="https://www.youtube.com/embed/T7GQTD_X02w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
            <button class="btn write-score">
              我要發表評價
              <i class="fa fa-paint-brush" aria-hidden="true"></i>
            </button>
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
                    <span class="date">2020.11.27</span>
                  </div>
                  <div class="stars" data-score="5" data-color="red">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="text-box">
                    <p>這堂課程老師一步步扎實的從零教起，不需要有任何基礎也可以輕鬆學習。 每個單元老師都講解得很清楚，不只程式碼，設計網頁的觀念與一些小技巧也都會講解到。 此外，還會分享很多好用便捷的套件與工具，可以說是全方位都兼顧到的教學。</p>
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
                    <p>當初上網自己爬文還是看不懂flex用法 但看老師教學，學會了之後 覺得非常的好用!! 可以應付好多種類型排版</p>
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
            <!-- 發問表單 -->
            <div class="write-comment post">
              <div class="row">
                <div class="pic"><img src="../images/course/5.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>tiffany0622</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <textarea name="" id="" placeholder="我想發問..."></textarea>
                    <button class="btn sent">發表留言</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- 發問 1 -->
            <div class="comment post">
              <div class="row">
                <div class="pic"><img src="../images/course/4.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>blackjosh</h5>
                    <span class="date">2020.11.01</span>
                  </div>
                  <div class="text-box">
                    <p>老師好，我是位想學程式分析的初學者，請問完全沒有程式基礎的人，這門課對我會不會太難?</p>
                  </div>
                </div>
              </div>
              <!-- 回覆1 -->
              <div class="row reply">
                <div class="pic"><img src="../images/course/5.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>WuhaCoro</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <p>同學您好，請不用擔心!老師會帶同學安裝 Visual Studio Code 開源免費軟體。這個程式學習的軟體非常的適合初學者，課程會帶同學一步步安裝及說明操作介面及環境，只要跟著課程一步一步操作即可~非常容易上手哦~</p>
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
                    <p>會介紹如何由範例延伸解決實際問題的做法，一起加油!</p>
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
                    <h5>授課老師</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <p>有機會提早開課嗎</p>
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
    <script src="../js/header.js"></script>
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
    <!-- <script src="../js/app.min.js"></script> -->
  </div>
</body>

</html>