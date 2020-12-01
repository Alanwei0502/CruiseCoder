<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 會員管理</title>
  <link rel="stylesheet" href="./../css/main2.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body>
  <div class="backEndWrap member">
    <?php
    include('layout/sideBar.php'); //aside
    ?>

    <main>
      <!-- 在這裡面codeing -->
      <h2>會員管理</h2>
      <section class="searchbar">
          <div class="account_select">
            <label>帳號</label>
            <input type="text" placeholder="請輸入帳號">
          </div>
          
          <div class="memberPower">
            <label>權限</label>
              <select>
                <option value="1">管理員</option>
                <option value="2">會員</option>
                <option value="3">停權</option>
              </select>
          </div>  
          <div class="poDate">
            <label>註冊日期</label>
            <input type="text">
            <i class="fas fa-arrow-right"></i>
            <input type="text">
          </div>
           
            
            

          
          <button>搜尋</button>
  
          
      </section>

      <section class="table">

          <table>
            <thead>
              <tr>
                <th>編號</th>
                <th>帳號</th>
                <th>姓名</th>
                <th>權限</th>
                <th>註冊日期</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>CCM0000001</td>
                <td>chiawei_huang</td>
                <td>黃家偉</td>
                <td>管理員</td>
                <td>2020/08/06</td>
                <td><button class="btn_modal">編輯</button></td>
              </tr>
              <tr>
                
                <td>CCM0000002</td>
                <td>tiffhsu0622</td>
                <td>踢翻妮</td>
                <td>管理員</td>
                <td>2020/09/16</td>
                <td><button class="btn_modal">編輯</button></td>
              </tr>
              <tr>
                
                <td>CCM0000003</td>
                <td>jessicahuang</td>
                <td>黃小雞</td>
                <td>會員</td>
                <td>2020/10/16</td>
                <td><button class="btn_modal">編輯</button></td>
              </tr>
              <tr>
                <td>CCM0000004</td>
                <td>jessieho520</td>
                <td>何雨錡</td>
                <td>會員</td>
                <td>2020/10/26</td>
                <td><button class="btn_modal">編輯</button></td>
              </tr>
              <tr>
                <td>CCM0000005</td>
                <td>toosweet77</td>
                <td>太田太甜</td>
                <td>停權</td>
                <td>2020/10/31</td>
                <td><button class="btn_modal">編輯</button></td>
              </tr>
              
            </tbody>
          </table>

          <div class="changePage">
            <button class="lastPage">上一頁</button>
            <button class="nextPage">下一頁</button>
          </div>
      </section>

      <div class="overlay">
        <div class="outColor">
          <div class="closeBtn_"><img src="./../images/backEnd/blackCancel.png" alt=""></div>
          <h2>會員資料</h2>

          <div class="weAreInside">
           

            <section class="accountArea">

              <div class="accountImg"><img src="../images/info/street_girl.jpeg" alt=""></div>

              <div class="rightInputArea">
                <div>
                  <label for="">編號</label>
                  <input type="text" value="CCM0000001">
                </div>

                <div>
                  <label for="">權限</label>
                  <select name="" id="">
                    <option value="1">管理員</option>
                    <option value="2">會員</option>
                    <option value="3">停權</option>
                  </select>
                </div>

                <div>
                  <label for="">帳號</label>
                  <input type="text" value="chiawei_huang" disabled>
                </div>

                <div>
                  <label for="">姓名 </label>
                  <input type="text" value="黃家偉">
                </div>

                <div>
                  <label for="">密碼 </label>
                  <input type="password" value="0918375">
                </div>

                <div>
                  <label for="">生日  </label>
                  <input type="text" value="1995/05/15">
                </div>

                <div>
                  <label for="">性別 </label>
                  <input type="text" value="男">
                </div>

                <div>
                  <label for="">手機號碼 </label>
                  <input type="text" value="0937265453">
                </div>
                
                <div>
                  <label for="">E-mail </label>
                  <input type="text" value="a6402433@gmail.com" disabled>
                </div>

                <div>
                  <label for="">註冊日期 </label>
                  <input type="text" value="2020/10/26 14:23" disabled>
                </div>

                <div>
                  <label for="">CC.Point </label>
                  <input type="text" value="1022">
                </div>

              </div>
            </section>
            <!-------- input end -------->

          
            <section class="badge_table">
              <h2>徽章成就</h2>
              <table>
                <thead>
                  <tr>
                    <th>獲得日期</th>
                    <th>徽章類別</th>
                    <th>徽章編號</th>
                  </tr>
                </thead>
                <tbody>
                  <div>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Java Script</td>
                      <td>Java Script Easy</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Java Script</td>
                      <td>Java Script Medium</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Java Script</td>
                      <td>Java Script All</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Html</td>
                      <td>Html Medium</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Html</td>
                      <td>Html Medium</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Html</td>
                      <td>Html Medium</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Html</td>
                      <td>Html Medium</td>
                    </tr>
                  </div>
                
              </tbody>
            </table>
                
              
            </section>

            <section class="orderDetail_table">
              <h2>近3筆訂單資訊</h2>
              <table>
                <thead>
                  <tr>
                    <th>訂單日期</th>
                    <th>編號</th>
                    <th>總金額</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>2020/10/26 22:35</td>
                    <td>202010260001</td>
                    <td>3,600</td>
                  </tr>
                  <tr>
                    <td>2020/10/26 22:35</td>
                    <td>202010260001</td>
                    <td>3,600</td>
                  </tr>
                  <tr>
                    <td>2020/10/26 22:35</td>
                    <td>202010260001</td>
                    <td>3,600</td>
                  </tr>
                </tbody>
              </table>
            
            </section>

            <section class="courseDetail_table">
              <h2>近3筆課後輔導預約紀錄</h2>
              <table>
                <thead>
                  <tr>
                    <th>預約日期</th>
                    <th>輔導日期</th>
                    <th>輔導課程名稱</th>
                    <th>老師</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>2020/10/07 02:35</td>
                    <td>2020/10/07 </td>
                    <td>HTML</td>
                    <td>張互賓</td>
                  </tr>
                  <tr>
                    <td>2020/10/07 02:35</td>
                    <td>2020/10/07 </td>
                    <td>HTML</td>
                    <td>張互賓</td>
                  </tr>
                  <tr>
                    <td>2020/10/07 02:35</td>
                    <td>2020/10/07 </td>
                    <td>JQuery</td>
                    <td>黃語昕</td>
                  </tr>
                </tbody>
              </table>
            </section>
            <div class="saveBtn">儲存</div>


          </div>

        </div>
        
        

      </div>

    </main><!-- 在這裡面codeing -->
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>
        $(function(){
      
        // 開啟 Modal 彈跳視窗
        $(".btn_modal").on("click", function(){
          $("div.overlay").addClass("-on");
        });
        
        // 關閉 Modal
        $("div.closeBtn_").on("click", function(){
          $("div.overlay").removeClass("-on");
          
        });
      
    });
  </script>
</body>

</html>