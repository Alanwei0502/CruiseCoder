<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 會員管理</title>
  <link rel="stylesheet" href="./../css/mainB.css">
  <link rel="icon" href="../ico.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <div class="backEndWrap member">
    <?php
    include('layout/sideBar.php'); //aside
    ?>

    <main id="mainMember">
      <!-- 在這裡面codeing -->
      <h2>會員管理</h2>
      <section class="searchbar">

        <div class="account_select">
          <label>姓名</label>
          <input type="text" name="name" placeholder="請輸入會員姓名" @keydown.enter="search">
        </div>

        <div class="account_select">
          <label>帳號</label>
          <input type="text" name="account" placeholder="請輸入會員帳號" @keydown.enter="search">
        </div>

        <div class="memberPower">
          <label>權限</label>
          <select name="level">
            <option value="">全部</option>
            <option value="3">管理員</option>
            <option value="2">老師</option>
            <option value="1">會員</option>
            <option value="0">停權</option>
          </select>
        </div>

        <div class="poDate">
          <label>註冊日期</label>
          <input type="text" id="datepicker1" readonly="true"><span style="font-size:22px;">至</span>
          <input type="text" id="datepicker2" readonly="true">
        </div>

        <button @click="search">搜尋</button>

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
            <template v-for="member in members.slice(pages.start,pages.end)">
              <tr>
                <td class="number">{{member.mNumber}}</td>
                <td class="account">{{member.mAccount}}</td>
                <td class="name">{{member.mName}}</td>
                <td class="level">{{member.mLevel}}</td>
                <td class="joindate">{{member.mJoindate}}</td>
                <td class="edit"><button @click="edit">編輯</button></td>
              </tr>
            </template>
          </tbody>
        </table>

        <div class="changePage">
          <button class="lastPage" @click="minusPages">上一頁</button>
          <button class="nextPage" @click="plusPages">下一頁</button>
        </div>
      </section>

      <!-- 彈跳視窗 -->
      <div class="overlay">
        <div class="overlayInside">
          <div class="outColor">
            <div class="closeBtn_"><img src="./../images/backEnd/blackCancel.png" alt="" @click="closeEdit"></div>
            <h2>會員資料</h2>

            <div class="weAreInside">
              <section class="accountArea">
                <div class="leftArea">
                  <div class="accountImg">
                    <img :src="memberInfos.mPhoto" alt="" id="imgShow">
                  </div>
                </div>
                <div class="rightInputArea">
                  <div>
                    <label for="">編號</label>
                    <input type="text" :value="memberInfos.mNumber" name="memberID" readonly unselectable="on">
                  </div>

                  <div>
                    <label for="">權限</label>
                    <select name="ganName" id="gansss" :value="memberInfos.mLevel">
                      <option value="3">管理員</option>
                      <option value="2">老師</option>
                      <option value="1">會員</option>
                      <option value="0">停權</option>
                    </select>
                  </div>

                  <div>
                    <label for="">帳號</label>
                    <input type="text" :value="memberInfos.mAccount" readonly unselectable="on">
                  </div>

                  <div>
                    <label for="">姓名 </label>
                    <input type="text" name="memberName" :value="memberInfos.mName">
                  </div>

                  <div>
                    <label for="">密碼 </label>
                    <input type="password" :value="memberInfos.mPassword">
                  </div>

                  <div>
                    <label for="">手機號碼 </label>
                    <input type="text" name="memberPhone" :value="memberInfos.mPhone">
                  </div>

                  <div>
                    <label for="">E-mail </label>
                    <input type="text" :value="memberInfos.mEmail" readonly unselectable="on">
                  </div>

                  <div>
                    <label for="">註冊日期 </label>
                    <input type="text" :value="memberInfos.mJoindate" readonly unselectable="on">
                  </div>

                  <div>
                    <label for="">CC.Point </label>
                    <input type="text" name="memberCC" :value="memberInfos.mCC">
                  </div>

                  <div class="teacherTextarea" v-if="memberInfos.mLevel == '2'">
                    <label for="">老師介紹</label>
                    <textarea :value="memberInfos.lInfo" name="teacherInfo"></textarea>
                  </div>

                </div>
              </section>
              <button class="saveBtn" @click="saveInfo">儲存</button>
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
                    <template v-for="memberBadge in memberBadges">
                      <tr>
                        <td>{{memberBadge.uDate}}</td>
                        <td>{{memberBadge.bName}}</td>
                        <td>{{memberBadge.bNumber}}</td>
                      </tr>
                    </template>
                  </tbody>
                </table>


              </section>

              <section class="orderDetail_table">
                <h2>訂單紀錄</h2>
                <table>
                  <thead>
                    <tr>
                      <th>訂單日期</th>
                      <th>編號</th>
                      <th>總金額</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-for="memberOrder in memberOrders">
                      <tr>
                        <td>{{memberOrder.oDate}}</td>
                        <td>{{memberOrder.oNumber}}</td>
                        <td>{{memberOrder.oTotal}}</td>
                      </tr>
                    </template>
                  </tbody>
                </table>

              </section>

              <section class="courseDetail_table">
                <h2>課輔預約紀錄</h2>
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
                    <template v-for="memberTutorial in memberTutorials">
                      <tr>
                        <td>{{memberTutorial.reDate}}</td>
                        <td>{{memberTutorial.tDate}}</td>
                        <td>{{memberTutorial.cTitle}}</td>
                        <td>{{memberTutorial.mName}}</td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </section>
            </div>

          </div>
        </div>
      </div>

    </main><!-- 在這裡面codeing -->
  </div>
  <script src="../js/vue.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
  <script src="./../js/datepicker.js"></script>
  <script src="../js/memberB.js"></script>
</body>

</html>