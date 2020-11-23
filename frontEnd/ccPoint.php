<?php
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cruise Coders</title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">


</head>
<body>
<?php
  include('layout/login.php');
  ?>
  <div class="wrap ccPoint">
  
  <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>
  
    <main>

      <div class="noticeGroup">
        <div class="ccNotice">
          <p>目前擁有<br>
            19,850 CC Point (CC幣) <br>
            = NT$ 198 </p>
        </div>
      
        <div class="getNotice">
          <p>今日簽到獲得10 CC Point!</p>
        </div>
      </div>
      <div class="ccPointDay">

        <div class="day_1">
          <p>Day 1</p>
          <img src="../images/ccPlanet/資產 8-8.png" alt="">
          <p class="countCoin">40 CC幣</p>
        </div>

        <div>
          <p>Day 2</p>
          <img src="../images/ccPlanet/資產 2-8.png" alt="">
          <p class="countCoin">50 CC幣</p>
        </div>

        <div>
          <p>Day 3</p>
          <img src="../images/ccPlanet/資產 3-8.png" alt="">
          <p class="countCoin">60 CC幣</p>
        </div>

        <div>
          <p>Day 4</p>
          <img src="../images/ccPlanet/資產 10-8.png" alt="">
          <p class="countCoin">70 CC幣</p>
        </div>

        <div>
          <p>Day 5</p>
          <img src="../images/ccPlanet/資產 19-8.png" alt="">
          <p class="countCoin">80 CC幣</p>
        </div>

        <div>
          <p>Day 6</p>
          <img src="../images/ccPlanet/資產 7-8.png" alt="">
          <p class="countCoin">90 CC幣</p>
        </div>

        <div>
          <p>Day 7</p>
          <img src="../images/ccPlanet/資產 10-8.png" alt="">
          <p class="countCoin">100 CC幣</p>
        </div>
        

      </div>


      <!-- 下拉箭頭 -->
      <section id="section03" class="demo">
        <a href="#section04"><span></span>Scroll</a>
      </section>






      <!-- cc幣第一屏結束 -->

    
    

    <div class="second_area">
      <p class="ccHow"><關於 CC Point/></p>
      <div class="tab_container">
  
        <div class="tab_list_block">
          <ul class="tab_list">
            <li class="gg -on"><a href="#" data-target="tab1" class="tab -on">什麼是 CC Point？
            </a></li>
            <li class="gg"><a href="#" data-target="tab2" class="tab">如何兌換</a></li>
            <li class="gg"><a href="#" data-target="tab3" class="tab">如何收集
            </a></li>
            
          </ul>
        </div>
        
        <div class="tab_contents">
          
          <div class="tab tab1 -on">
            <p>為什麼要有 CC Point？</p>
            <div class="cc_coin_out"><img src="../images/ccPoint/cc_coin.png" alt=""></div>
            <div class="tabWords_1">
            <span>無</span>論是培養興趣、學職涯所需還是挑戰自我 <br>
            我們堅信，學習知識技能都可以是生活中的千萬個美好時刻! <br>
            只要在站內完成相關任務，就可以累積 CC Point，並在購買課程時折抵相對應的金額。歡迎你加入 Curise Coders，擁抱愛學愛玩的生活風格，並得到繼續成長的動力。
            </div>
            <img  class="pig" src="../images/ccPoint/pig.png" alt="">
          </div>
          
          <div class="tab tab2">
            <div class="tab2_title">我們相信這些都是學習的重要里程碑 !</div>

            <div class="save_jan">
              <ul>
                <li> Step1. 在結帳頁面勾選「使用 CC」</li>
                <li> Step2. 登登！完成！
                系統將會自動顯示該筆訂單可折抵金額。</li>
              </ul>
            </div>

            <div>好康會不定期更新，敬請期待！</div>

            <div><img  class="save_jan_img" src="../images/ccPoint/資產 4.svg" alt=""></div>



          </div>
          
          <div class="tab tab3">
              每日登入簽到即可獲得CC Point， 持續登入能獲得的CC Point更多唷！
            <p>讓學習變成你的習慣
              Cruise Coders助你一臂之力！
            </p>

            <div>
              <ul>
                <li><i class="fas fa-circle"></i>累積 100 CC Point，可以折抵 NT$1</li>
                <li><i class="fas fa-circle"></i>累積的 CC Point 可在下一次結帳時折抵 Cruise Coders 站內所有課程</li>
              </ul>
            </div>
           
            <div class="cc_people">
              <div><img  class="cc_boy" src="../images/ccPoint/cc_boy.svg" alt=""></div>
              <div class="scale_100">100:1</div>
              <div><img class="cc_girl" src="../images/ccPoint/cc_girl.svg" alt=""></div>
            </div>



          </div>


        </div>
      </div>
        
      </div>
    
    </main>

    <?php
    include('layout/footer.php');
    ?>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>



      $(function () {
        $("a[href*=#]").on("click", function (e) {
          e.preventDefault();
          $("html, body").animate(
            { scrollTop: $($(this).attr("href")).offset().top },
            500,
            "linear"
          );
        });
      });


     $(function(){
        $("a.tab").on("click", function(e){
          e.preventDefault();
          
          /* 將頁籤列表移除所有 -on，再將指定的加上 -on */
          $(this).closest("ul").find("a.tab").removeClass("-on");
          $(this).addClass("-on");
          
          /* 找到對應的頁籤內容，加上 -on 來顯示 */
          $("div.tab").removeClass("-on");
          $("div.tab." + $(this).attr("data-target")).addClass("-on");
        });
      });

      

      $('.tab_list>li').click(function(){

        $('.tab_list>li').removeClass('-on');
        $(this).addClass('-on');
      });



      


  </script>
</body>
</html>