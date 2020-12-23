<style>
.video img{
    width: 100%;
}
.course main #class-info h1{
    text-align: center;
}
.del_btn{
  position: absolute;
      right: 15px;
      top: 13px;
}
.del_btn i {
    color: #646464;
      font-size: 26px;
    cursor: pointer;
}
.reply .del_btn{
    right: -21px;
    top: 0;
}
.reply .del_btn i{
    font-size: 17px;
}
.r_box{
  position: relative;
}
.course main #class-detail .post .text-box p{
  word-break: break-all;
}

@media screen and (max-width: 768px) {
}
@media screen and (max-width: 576px) {
  .reply .del_btn{
    right: 0px;
    top: 0;
  }
}
@media screen and (max-width: 500px) {
  .course main #class-detail .score-posts .post .post-header,
  .course main #class-detail .post .post-header{
    display: block;
    width: 100%;
  }
  .course main #class-detail .post .post-header h5{
    width: 100%;
    margin-bottom: 10px;
  }
  .course main #class-detail .post .post-header .date:before{
    display:none;
  }
  .course main #class-detail .post .post-header .date{
    width: 100%;
    display: block;
    margin-left: 0;
  }
  .course main #class-detail .score-posts .post .stars{
    margin-left: 0;
    width: 100%;
  }
  .course main #class-detail .post{
    padding:15px;
  }
}
<<<<<<< HEAD
.test-box p{
  word-break: break-all;
}
=======

>>>>>>> d0b13cc19eb47b5ce2a63bf1ffb1ad723124efce
</style>
      <section id="class-detail">
        <ul class="tab">
          <li class="active"><a id="a_class" href="#class" style:display:flex;display: block;justify-content: center;align-items:center;>課程資訊</a></li>
          <?PHP if($showReview){?><li><a id="a_score" href="#score">課程評價</a></li><?PHP }?>
          <li><a id="a_qa" href="#qa">留言發問</a></li>
        </ul>
        <!-- 課程資訊 -->
        <div class="tab-content active" id="class">
          <h2>&lt; 課程資訊 &#47;&gt;</h2>
          <div class="info">
            <h4>關於課程</h4>
            <div class="row">
              <div class="col">
                <img src="../images/course/1.png" alt="">
                <p>課程時長<br><?php echo $row["cTime"];?></p>
              </div>
              <div class="col">
                <img src="../images/course/2.png" alt="">
                <p>課程類別<br><?php echo $row["cType"];?></p>
              </div>
              <div class="col">
                <img src="../images/course/3.png" alt="">
                <p>沒有期限<br>不限觀看次數</p>
              </div>
            </div>
          </div>
          <div class="info">
            <h4>課程簡介</h4>
            <p><?php echo $row["cInfo"];?></p>
          </div>
          <div class="info">
            <h4>關於老師</h4>
            <div class="person">
              <div class="pic">
                <!-- <img src="../images/course/5.png" alt=""> -->
                <img src="<?php echo $row4["mPhoto"];?>" alt="">
              </div>
              <p><?php echo $row2["lInfo"];?></p>
            </div>
          </div>
        </div>
        
        <?php

        // $fn= $info->getFilename();  //index.php
        // echo $info->getFilename();
        // if ($fn="course_Fundraising.php"){}
        
        // else{}
        // ?>

    <?PHP if($showReview){?>
        <!-- 評價 -->
        <div class="tab-content" id="score">
          <h2>&lt; 課程評價 &#47;&gt;</h2>
          <!-- 評分 -->
          <div class="score">
             <?PHP if($is_review){?>
            <button class="btn write-score op_score_btn">
              我要發表評價
              <i class="fa fa-paint-brush" aria-hidden="true"></i>
            </button>
            <?PHP }?>
            <div class="nums"><?PHP echo $star?></div>
            <div class="col">
              <div class="stars" data-score="<?PHP echo $star?>" data-color="#fcc93d">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
            <span><?PHP echo $review_count?>則評價</span>
            </div>
          </div>
          <!-- 評分內容 -->
          <div class="score-posts comments">
             <!-- 我想評價-->
             <?PHP if($is_review){?>
             <div class="comment post score_box" style="display:none;">
              <div class="row">
                <div class="pic"><img src="<?PHP echo $member['mPhoto']??'../images/course/5.png'?>" alt=""></div>
                <div class="content">
                <form id="form_score" method="post" action='?CourseID=<?PHP echo $CourseID?>&page=a_score'>
                  <div class="post-header">
                   <h5><?PHP echo  $member['mName']??'未登入'?></h5>
                  <input name="submit_type" type="hidden" value="a_score">
                  <input name="token" type="hidden" value="<?PHP echo $token?>">
                  <br><br>
                  </div>
                  <input id="review_stars" name="review_stars" type="hidden" value="0">
                  <div class="stars hover_stars" data-score="0" data-color="#fcc93d" id="a_stars">
                    <i class="fa fa-star" data-st="1" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="2" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="3" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="4" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="5" aria-hidden="true"></i>
                  </div>
                  <div class="text-box">
                    <textarea name="review_content" id="" placeholder="我想評價..."></textarea>
                    <button class="btn_style btn_submit" onclick="$('#form_score').submit()">發表評價</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <?php 
             }
              if($reviewList AND sizeof($reviewList)>0){
                foreach($reviewList as $k=>$v){
            ?>
            <!-- 評分 1 -->
            <div id="review_<?PHP echo $v['rNumber']?>" class="comment post r_box">
            <?PHP if($member AND $v['rMmeber'] == $member['mNumber']){?>
              <a class="de_review_btn del_btn" href="javascript:void(0);" data-id="<?PHP echo $v['rNumber']?>"><i class="far fa-times-circle close"></i></a>
              <?PHP }?>
              <div class="row">
                <div class="pic"><img src="<?PHP echo $v['mPhoto']??'../images/course/5.png'?>" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5><?PHP echo $v['mName']?></h5>
                    <span class="date"><?PHP echo $v['rDate']?></span>
                  </div>
                  <div class="stars" data-score="<?PHP echo $v['rStar']?>" data-color="#fcc93d">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="false"></i>
                  </div>
                  <div class="text-box">
                    <p style="word-break: break-all;"><?PHP echo $v['rFeedback']?></p>
                  </div>
                </div>
              </div>
            </div>
            <?php
                }
              }
            ?>
            <!-- 查看更多 -->
            <!-- <button class="more btn_style">查看更多</button> -->
          </div>
        </div>
<?PHP }?>


        <!-- 留言 -->
        <div class="tab-content" id="qa">
          <h2>&lt; 留言發問 &#47;&gt;</h2>
          <div class="comments">
          <?PHP if($is_discuss){?>
            <!-- 發問表單 -->
            <div class="write-comment post">
              <div class="row">
                <div class="pic"><img src="<?PHP echo $member['mPhoto']??'../images/course/5.png'?>" alt=""></div>
                <div class="content">

                
                <div class="post-header">
                <h5><?PHP echo  $member['mName']??'未登入'?></h5>
                </div>
                  <div class="text-box">
                <form id="form_qa" method="post" action='?CourseID=<?PHP echo $CourseID?>&page=a_qa'>
                  <input name="submit_type" type="hidden" value="a_qa">
                  <input name="token" type="hidden" value="<?PHP echo $token?>">
                    <textarea name="dContent" id="dContent" placeholder="我想發問..."></textarea>
                    <button class="btn_style btn_submit" onclick="$('#form_qa').submit()">發表留言</button>
                </form>
                  </div>
                </div>
              </div>
            </div>
            

            <?php 
          }
            // var_dump($discussList);
              if($discussList AND sizeof($discussList)>0){
                foreach($discussList as $k=>$v){
            ?>

            <!-- 發問 1 -->
            <div id="discuss_<?PHP echo $v['dNumber']?>" class="comment post r_box">
            <?PHP if($member AND $v['dMember'] == $member['mNumber']){?>
              <a class="de_discuss_btn del_btn" href="javascript:void(0);" data-id="<?PHP echo $v['dNumber']?>"><i class="far fa-times-circle close"></i></a>
              <?PHP }?>
              <div class="row">
                <div class="pic"><img src="<?PHP echo $v['mPhoto']??'../images/course/5.png'?>" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5><?PHP echo $v['mName']?></h5>
                    <span class="date"><?PHP echo $v['dDate']?></span>
                  </div>
                  <div class="text-box">
                    <p><?PHP echo $v['dContent']?></p>
                  </div>
                </div>
              </div>
              
              <?PHP 
                if(sizeof($v['p_discuss'])>0){
                  foreach($v['p_discuss'] as $k2=>$v2){
              ?>
              <div  id="discuss_<?PHP echo $v2['dNumber']?>"  class="row reply r_box">
              
            <?PHP if($member AND $v2['dMember'] == $member['mNumber']){?>
              <a class="de_discuss_btn del_btn" href="javascript:void(0);" data-id="<?PHP echo $v2['dNumber']?>"><i class="far fa-times-circle close"></i></a>
              <?PHP }?>
                <div class="pic"><img src="<?PHP echo $v2['mPhoto']??'../images/course/5.png'?>" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5><?PHP echo $v2['mName']?></h5>
                    <span class="date"><?PHP echo $v2['dDate']?></span>
                  </div>
                  <div class="text-box">
                    <p><?PHP echo $v2['dContent']?></p>
                  </div>
                </div>
              </div>
            <?php
                }
              }
            ?>
              <?PHP if(empty($member)){}else{
              if(isset($member) AND $member['mLevel'] == 2){?>
              <!-- 底部按鈕 -->
              <div class="btns">
                <button class="btn reply ddbox_btn_op">
                  <img src="../images/course/reply.svg" alt="">
                  <span>回覆</span>
                </button>
                <div class="text-box ddbox re_box">
                  <form id="form_qa_re_<?PHP  echo $v['dNumber']?>" method="post" action='?CourseID=<?PHP echo $CourseID?>&page=a_qa'>
                    <input name="submit_type" type="hidden" value="a_qa">
                  <input name="token" type="hidden" value="<?PHP echo $token?>">
                    <input name="a_qa_p" type="hidden" value="<?PHP  echo $v['dNumber']?>">
                      <textarea name="dContent" id="dContent" placeholder="我想回覆..."></textarea>
                      <button class="btn_style btn_submit2" onclick="$('#form_qa_re_<?PHP  echo $v['dNumber']?>').submit()">回覆</button>
                      <button class="btn_style btn_submit2 ddbox_btn_cl">取消</button>
                  </form>
                </div>
              </div>
              <?PHP }}?>
            </div>
            <?php
                }
              }
            ?>
            <!-- 查看更多 -->
            <!-- <button class="more btn_style">查看更多</button> -->
          </div>
        </div>
      </section>