<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 課程管理</title>
  <link rel="icon" href="../ico.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
  <!-- datepicker -->
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <link rel="stylesheet" href="./../css/mainB.css">
</head>

<body>
  <div class="backEndWrap course">
    <?php
    include('layout/sideBar.php'); //aside
    ?>

    <main id="courseMain">
      <h2>課程管理</h2>
      <div class="searchContent">
        <div class="upLoadTime">
          <label>上架日期</label>
          <div class="dateRange">
            <input type="text" id="datepicker1" readonly="true">
            <p>至</p>
            <input type="text" id="datepicker2" >
          </div>
        </div>
        <div class="filter">
          <div class="status">
            <label>狀態</label>
            <select name="status" class="searchStatus">
              <option value="all" selected>全部狀態</option>
              <option value="0">下架</option>
              <option value="1">上架</option>
              <option value="2">募資中</option>
            </select>
          </div>
          <div class="teachers">
            <label>老師</label>
            <select name="teachers" class="searchTeachers">
              <option value="all" selected>全部老師</option>
              <option v-for="teacherName in teacherNames" :value="teacherName.mNumber">{{teacherName.mName}}</option>
            </select>
          </div>
          <div class="types">
            <label>類型</label>
            <select name="types" class="searchTypes">
              <option value="all" selected>全部類型</option>
              <option v-for="courseType in courseTypes" :value="courseType.cType">{{courseType.cType}}</option>
            </select>
          </div>
        </div>
        <div class="searchBottom">
          <div class="courseNames">
            <label>課程名稱</label>
            <input type="text" class="searchTitle" @keydown.enter="ajax">
          </div>
          <button id="searchBtn" @click="ajax">搜尋</button>
        </div>
      </div>
      <div class="addOrCancle">
        <button class="putOnButton" @click="onCourse">上架課程</button>
        <button class="cancleButton" @click="offCourse">下架課程</button>
        <button class="addButton" @click="addCourseLightBox">新增課程</button>
      </div>
      <div class="table" id="table">
        <div class="tr title">
          <div class="td"><label><input type="checkbox" class="allCheckBox" @change="allCheckBox"><span></span></label></div>
          <div class="td">上架日期</div>
          <div class="td">狀態</div>
          <div class="td">課程名稱</div>
          <div class="td">老師</div>
          <div class="td">類型</div>
          <div class="td">操作</div>
        </div>
        <!-- vue table 欄位資料 -->
        <div class="tr" v-for="(allCourseData, index) in allCourseDatas.slice(items.start, items.end)">
          <div class="td"><label><input type="checkbox" class="allCheckBox oneCheckBox" @change="oneCheckBox"><span></span></label></div>
          <div class="td">{{allCourseData.cDate}}</div>
          <div class="td" v-if="allCourseData.cStatus == '下架'" style="color: red;">{{allCourseData.cStatus}}</div>
          <div class="td" v-else-if="allCourseData.cStatus == '上架'" style="color: green;">{{allCourseData.cStatus}}</div>
          <div class="td" v-else-if="allCourseData.cStatus == '募資中'" style="color: orange;">{{allCourseData.cStatus}}</div>
          <div class="td">{{allCourseData.cTitle}}</div>
          <div class="td">{{allCourseData.mName}}</div>
          <div class="td">{{allCourseData.cType}}</div>
          <div class="td"><button class="editBtn" :data-cnumber="allCourseData.cNumber" @click="editLightBox">編輯</button></div>
        </div>
      </div>

      <div class="addCourseBackAll">
        <div class="addCourseBack" @click="closeCourseLightBox"></div>
        <div class="addCourse">
          <img src="./../images/backEnd/blackCancel.png" alt="無法顯示圖片" class="cancelBack" @click="closeCourseLightBox">
          <h2>新增課程</h2>
          <button class="magicalBtn" @click="allData"></button>
          <form action="courseR.php" method="post" class="addCourseForm">
            <div class="addFormAll">
              <div class="addCourseName">
                <label>課程名稱</label>
                <textarea rows="3" class="insertCourseName"></textarea>
              </div>
              <div class="addCourseStatus">
                <label>課程狀態</label>
                <select @change="addStatusChange" class="insertStatus">
                  <option value="0" selected>下架</option>
                  <option value="1">上架</option>
                  <option value="2">募資中</option>
                </select>
              </div>
              <div class="addCourseType">
                <label>課程類型</label>
                <input type="text" class="insertType">
              </div>
              <div class="addCoursePrice">
                <label>課程價格</label>
                <input type="text" class="insertPrice">
              </div>
              <div class="addCoursefundraising">
                <label>募資價格</label>
                <input type="text" class="fundraising insertFundraising" disabled>
              </div>
              <div class="addCourseOpenTime">
                <label>開課時間</label>
                <input type="text" class="fundraising addOpenTime insertOpenTime" id="datepicker5" readonly disabled>
                <input type="text" id="deadline" value="00:00:00">
              </div>
              <div class="addCourseImage">
                <label>課程圖片</label>
                <div class="inputFileImage" @click="clickInput">
                  <input type="file" @change="imageName" name="addCourseImage" id="addInputFile" accept=".jpg,.jpeg,.png,.gif">
                  <p class="insertImage"></p>
                  <button type="button" @click="buttonCilckInput"></button>
                </div>   
              </div>
              <div class="addCourseViedo">
                <label>課程影片</label> 
                <input type="text" placeholder="請輸入上傳影片網址" class="insertVideo">
              </div>
              <div class="addCourseTime">
                <label>課程時長</label>
                <input type="text" placeholder="限制輸入格式 : 1 小時 09 分鐘" class="insertCourseTime">
              </div>
              <div class="addCourseIntroduction">
                <label>課程簡介</label>   
                <textarea rows="5" class="insertCourseIntroduction"></textarea>
              </div>
              <div class="addCourseTeacher">
                <label>老師名稱</label>   
                <select name="addCourseTeachers" class="insertTeacher">
                  <option v-for="teacherName in teacherNames" :value="teacherName.mNumber">{{teacherName.mName}}</option>
                </select>
              </div>
              <button class="addCourseBtn" type="button" @click="insertCourse">新增課程</button>
            </div>
          </form>
        </div>
      </div>

      <div class="editCourseBackAll">
        <div class="editCourseBack" @click="closeEditLightBox"></div>
        <div class="editCourse">
          <img src="./../images/backEnd/blackCancel.png" alt="無法顯示圖片" class="cancelBack" @click="closeEditLightBox">
          <h2>課程資訊</h2>
          <form class="editCourseForm">
            <div class="editFormAll">
              <div class="courseNumber">
                <label>課程編號</label>
                <p class="theCourseNumber">{{editCourseDatas.cNumber}}</p>
              </div>
              <div class="crouseOnDate">
                <label>上架日期</label>
                <p>{{editCourseDatas.cDate}}</p>
              </div>
              <div class="editCourseName">
                <label>課程名稱</label>
                <textarea rows="3" class="updateTheCourseName">{{editCourseDatas.cTitle}}</textarea>
              </div>
              <div class="editCourseStatus">
                <label>課程狀態</label>
                <select name="editCourseStatus" :value="editCourseDatas.cStatus" @change="cStatusChange" class="updateStatus">
                  <option value="0" selected>下架</option>
                  <option value="1">上架</option>
                  <option value="2">募資中</option>
                </select>
              </div>
              <div class="editCourseType">
                <label>課程類型</label>
                <input type="text" :value="editCourseDatas.cType" class="updateType">
              </div>
              <div class="editCoursePrice">
                <label>課程價格</label>
                <input type="text" :value="editCourseDatas.cPrice" class="updatePrice">
              </div>
              <div class="editCoursefundraising" v-if="editCourseDatas.cStatus == 2">
                <label>募資價格</label>
                <input type="text" :value="fundraisings.fPrice" class="updateFundraising">
              </div>
              <div class="editCoursefundraising" v-else-if="editCourseDatas.cStatus != 2">
                <label>募資價格</label>
                <input type="text" disabled class="fundraising updateFundraising" :value="fundraisings.fPrice">
              </div>
              <div class="editCourseOpenTime" v-if="editCourseDatas.cStatus == 2">
                <label>開課時間</label>
                <input type="text" readonly id="datepicker4" class="editOpenTime updateOpenTime" :value="fundraisings.fStartdate">
              </div>
              <div class="editCourseOpenTime" v-if="editCourseDatas.cStatus != 2">
                <label>開課時間</label>
                <input type="text" readonly disabled id="datepicker4" class="fundraising editOpenTime updateOpenTime" :value="fundraisings.fStartdate">
              </div>
              <div class="editCourseImage">
                <label>課程圖片</label>
                <div class="inputFileImage" @click="clickInput">
                  <input type="file" class="updateFile" id="updateFileImage" @change="imageName" accept=".jpg,.jpeg,.png,.gif">
                  <p class="updateImage">{{editCourseDatas.cImage}}</p>
                  <button type="button" @click="buttonCilckInput"></button>
                </div>   
              </div>
              <div class="editCourseViedo">
                <label>課程影片</label> 
                <input type="text" placeholder="請輸入上傳影片網址" :value="editCourseDatas.cVideo" class="updateVideo">
              </div>
              <div class="editCourseTime">
                <label>課程時長</label>
                <input type="text" placeholder="限制輸入格式 : 1 小時 09 分鐘" :value="editCourseDatas.cTime" class="updateCourseTime">
              </div>
              <div class="editCourseIntroduction">
                <label>課程簡介</label>   
                <textarea rows="5" class="updateIntroduction">{{editCourseDatas.cInfo}}</textarea>
              </div>
              <div class="editCourseTeacher">
                <label>老師名稱</label>
                <select name="editCourseTeachers" :value="editCourseDatas.mNumber" class="updateTeacher">
                  <option v-for="teacherName in teacherNames" :value="teacherName.mNumber">{{teacherName.mName}}</option>
                </select>
              </div>
              <div class="buyCount">
                <label>購買人數</label>
                <p><span>{{buyCount}}</span>人</p>
              </div>
              <div class="collectedCount">
                <label>收藏人數</label>
                <p><span>{{favoriteCount}}</span>人</p>
              </div>
              <div class="courseScore">
                <label>課程評價</label>
                <p><span>{{reviewScore}}</span>分</p>
              </div>
              <button class="saveBtn" type="button" @click="updateCourse">儲存</button>
            </div>
          </form>
        </div>
      </div>
      <div class="changePage">
        <button class="lastPage" @click="lastPage">上一頁</button>
        <button class="nextPage" @click="nextPage">下一頁</button>
      </div>
    </main>
  </div>




  <script src="../js/vue.js"></script>
  <script src="./../js/datepicker.js"></script>
  <script src="./../js/course.js"></script>
</body>

</html>