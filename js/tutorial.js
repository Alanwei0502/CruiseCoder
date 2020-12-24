// 檢查某 cookie 是否存在
function checkCookie(cname) {
  var cookie_value = getCookie(cname);
  if (cookie_value != "") {
      return true;
  } else {
      return false;
  }
}

// 取得 cookie 的值
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
          c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
      }
  }
  return "";
}

if (checkCookie('user')) {
  // 這裡的userAccount變數，代表是user登入後的帳號，用這個帳號去抓資料
  var userAccount = getCookie('user');
  $.ajax({
    type: 'POST',
    url: "./layout/loginR.php",
    data: {
        userAccount: userAccount,
    },
    dataType: "text",
    success: function (data) {
        document.querySelector('a.ccp').innerText = data;
    }
  });
}

// 製作萬年曆
let state = null;

function calendar(){
  state = {
    current: new Date()
  };
  render();
}

function preMonth(){
  state.current.setMonth(state.current.getMonth() - 1);
  render();
}

function nextMonth(){
  state.current.setMonth(state.current.getMonth() + 1);
  render();
}

function render(){
  //放入年、月
  let calendarYear = document.querySelector("#year");
  let calendarMonth = document.querySelector("#month");
  calendarYear.textContent = state.current.getFullYear() + " 年";
  calendarYear.dataset.year = state.current.getFullYear();
  calendarMonth.textContent = (state.current.getMonth() + 1) + "月";
  calendarMonth.dataset.month = (state.current.getMonth() + 1);

  let calendarDate = document.querySelector("#calendarDate");
  calendarDate.innerHTML = ""; //先清空畫面
  
  //先取得這個月的第一天
  let firstDate = new Date(state.current.getFullYear(), state.current.getMonth(), 1);
  
  //往算到星期日
  let date = new Date(firstDate.getFullYear(), firstDate.getMonth(), 1);
  date.setDate(date.getDate()-date.getDay());
  //劃出上個月的後幾天
  while(date < firstDate){
    renderDate(date, calendarDate);
    date.setDate(date.getDate() + 1);

  }
  //劃出這個月的日期
  while(date.getMonth() === state.current.getMonth()){
    //劃出一天的格子
    renderDate(date, calendarDate);
    //日期 +1
    date.setDate(date.getDate() + 1);
  }
  //劃出下個月的前幾天
  while(date.getDay() > 0){
    renderDate(date, calendarDate);
    date.setDate(date.getDate() + 1);
  }
}

function renderDate(date, calendarDate){
  let cell = document.createElement("div");
  let dayNumber = document.createElement("p");
  dayNumber.className = `dayNumber ${date.getDate()}`;
  cell.className = "date" + (date.getMonth() === state.current.getMonth()? "": " fadeout");
  dayNumber.textContent = date.getDate();

  let cellBody = document.createElement("div");
  cellBody.className = `cellBody ${date.getFullYear()}${((date.getMonth() + 1) < 10? "0":"") + (date.getMonth() + 1)}${(date.getDate() < 10? "0":"") + date.getDate()}`;
  cellBody.dataset.date = `${date.getFullYear()}${((date.getMonth() + 1) < 10? "0":"") + (date.getMonth() + 1)}${(date.getDate() < 10? "0":"") + date.getDate()}`;
  
  cell.appendChild(dayNumber);

  let firstPost = 0;
  $.post('tutorialR.php',{firstPost},function(res){
    let tutorialData = JSON.parse(res);
    
    for(let i = 0; i < tutorialData.length; i++){
      if(cellBody.classList.contains(`${tutorialData[i].tDate}`)){
        let courseTitle = document.createElement("p");
        courseTitle.className = "courseTitle";
        
        courseTitle.textContent =`${tutorialData[i].cTitle}`;
        
        cellBody.dataset.teachername = `${tutorialData[i].mName}`;
        cellBody.dataset.coursetype = `${tutorialData[i].cType}`;

        cellBody.appendChild(courseTitle);

        let smallPoint = document.createElement("div");
        smallPoint.className = "smallPoint";
        smallPoint.dataset.teachername = `${tutorialData[i].mName}`;
        smallPoint.dataset.coursetype = `${tutorialData[i].cType}`;


        cell.appendChild(cellBody);
        cell.appendChild(smallPoint);

        // 要用if判斷有無登入 之後要多傳一個使用者帳號的值
        if(checkCookie('user')){
          let tCourse = tutorialData[i].tCourse;
          $.post('tutorialR.php',{tCourse, userAccount},function(res){
            let buyNumber = res;
            if(buyNumber > 0){
              cellBody.classList.add("buy");
              smallPoint.classList.add("buy");
            }
          });
        }

        let tNumber = tutorialData[i].tNumber;
        $.post('tutorialR.php',{tNumber},function(res){
          let fullNumber = res;
          if(fullNumber == 10){
            cellBody.classList.add("full");
            smallPoint.classList.add("full");
          }
        });
        
      }
    }
  });

  calendarDate.appendChild(cell);
  
}

calendar();

let arrowLeft = document.querySelector("#arrowLeft");
let arrowRight = document.querySelector("#arrowRight");

arrowLeft.addEventListener("click", function(){
  preMonth();
  let theYear = document.getElementById("year").getAttribute("data-year");
  let theMonth = document.getElementById("month").getAttribute("data-month");
  let yearMonth = theYear + (theMonth < 9? '0' + theMonth: theMonth);

  if(checkCookie('user')){
    $.post('tutorialR.php',{yearMonth, userAccount}, function(res){
      $("#phoneFeedBack").html(res);
      // 換頁時會看到一瞬間
      setTimeout(function(){
        filter();
      }, 0.5);
      
      setTimeout(function(){
        let alreadyBuyBtn = document.getElementById("alreadyBuy");
        if(alreadyBuyBtn.classList.contains("-on")){
          notBuy();
        }
      }, 70);
    });
  }else{
    $.post('tutorialR.php',{yearMonth}, function(res){
      $("#phoneFeedBack").html(res);
      // 換頁時會看到一瞬間
      setTimeout(function(){
        filter();
      }, 0.5);
    });
  }
});

arrowRight.addEventListener("click", function(){
  nextMonth();
  let theYear = document.getElementById("year").getAttribute("data-year");
  let theMonth = document.getElementById("month").getAttribute("data-month");
  let yearMonth = theYear + (theMonth < 9? '0' + theMonth: theMonth);

  if(checkCookie('user')){
    $.post('tutorialR.php',{yearMonth, userAccount}, function(res){
      $("#phoneFeedBack").html(res);
      // 換頁時會看到一瞬間
      setTimeout(function(){
        filter();
      }, 0.5);
      
      setTimeout(function(){
        let alreadyBuyBtn = document.getElementById("alreadyBuy");
        if(alreadyBuyBtn.classList.contains("-on")){
          notBuy();
        }
      }, 70);
    });
  }else{
    $.post('tutorialR.php',{yearMonth, userAccount}, function(res){
      $("#phoneFeedBack").html(res);
      // 換頁時會看到一瞬間
      setTimeout(function(){
        filter();
      }, 0.5);
    });
  }
});

// 篩選條件 隱藏不符合課輔時間
function filter(){
  // 篩選課程select
  let courseValue = document.getElementsByClassName("filterCourses")[0].value;
  // 篩選老師select
  let teacherValue = document.getElementsByClassName("filterTeachers")[0].value;
  // 電腦版課輔時間
  let allCellBody = document.getElementsByClassName("cellBody");
  // 手機版課輔時間
  let phoneDay = document.getElementsByClassName("phoneDay");
  // 手機月曆的小點點
  let phoneSmallPoint = document.getElementsByClassName("smallPoint");

  // 電腦
  for(let i = 0; i < allCellBody.length; i++) {
    allCellBody[i].classList.add("none");
    let courseType = allCellBody[i].getAttribute("data-coursetype");
    let teacherName = allCellBody[i].getAttribute("data-teachername");
    if(courseValue == "all" & teacherValue == "all"){
      allCellBody[i].classList.remove("none");
    }else if(courseValue == courseType & teacherValue == "all"){
      allCellBody[i].classList.remove("none");
    }else if(courseValue == "all" & teacherValue == teacherName){
      allCellBody[i].classList.remove("none");
    }else if(courseValue == courseType & teacherValue == teacherName){
      allCellBody[i].classList.remove("none");
    }
  }

  // 手機月曆的小點點
  for(let j = 0; j < phoneSmallPoint.length; j++){
    phoneSmallPoint[j].classList.add("none");
    let smallPointCourseType = phoneSmallPoint[j].getAttribute("data-coursetype");
    let smallPointTeacherName = phoneSmallPoint[j].getAttribute("data-teachername");
    if(courseValue == "all" & teacherValue == "all"){
      phoneSmallPoint[j].classList.remove("none");
    }else if(courseValue == smallPointCourseType & teacherValue == "all"){
      phoneSmallPoint[j].classList.remove("none");
    }else if(courseValue == "all" & teacherValue == smallPointTeacherName){
      phoneSmallPoint[j].classList.remove("none");
    }else if(courseValue == smallPointCourseType & teacherValue == smallPointTeacherName){
      phoneSmallPoint[j].classList.remove("none");
    }
  }

  // 手機
  for(let p = 0; p < phoneDay.length; p++){
    phoneDay[p].classList.add("none");
    let phoneCourseType = phoneDay[p].getAttribute("data-coursetype");
    let phoneTeacherName = phoneDay[p].getAttribute("data-teachername");
    if(courseValue == "all" & teacherValue == "all"){
      phoneDay[p].classList.remove("none");
    }else if(courseValue == phoneCourseType & teacherValue == "all"){
      phoneDay[p].classList.remove("none");
    }else if(courseValue == "all" & teacherValue == phoneTeacherName){
      phoneDay[p].classList.remove("none");
    }else if(courseValue == phoneCourseType & teacherValue == phoneTeacherName){
      phoneDay[p].classList.remove("none");
    }
  }
}

// 過濾沒購買課程的課輔時間
function notBuy(){
  // 電腦
  let allCellBody = document.getElementsByClassName("cellBody");

  for(let i = 0; i < allCellBody.length; i++){
    if(!(allCellBody[i].classList.contains("buy"))){
      allCellBody[i].classList.add("notBuy");
    }
  }
  // 手機
  let phoneDayRight = document.getElementsByClassName("phoneDayRight");

  for(let j = 0; j < phoneDayRight.length; j++){
    if(!(phoneDayRight[j].classList.contains("buy"))){
      phoneDayRight[j].parentElement.classList.add("notBuy");
    }
  }

  // 手機月曆上的小點點
  let theSmallPoint = document.getElementsByClassName("smallPoint");

  for(let s = 0; s < theSmallPoint.length; s++){
    if(!(theSmallPoint[s].classList.contains("buy"))){
      theSmallPoint[s].classList.add("notBuy");
    }
  }
}


let bookLightBoxAll = document.getElementsByClassName("bookLightBoxAll")[0];
let bookLightBoxBack = document.getElementsByClassName("bookLightBoxBack")[0];
let cancelBtn = document.getElementsByClassName("cancelBtn")[0];

bookLightBoxBack.addEventListener("click", function(){
  bookLightBoxAll.classList.remove("on");
});
cancelBtn.addEventListener("click", function(){
  bookLightBoxAll.classList.remove("on");
});


$(document).ready(function(){
  // 月份旁邊的按鈕 圖片上下更換 日歷開合
  $("#upArrow").click(function(){
    $("div.calendarBody").slideToggle();
    $("#upArrow").addClass("none");
    $("#downArrow").removeClass("none");
  });
  $("#downArrow").click(function(){
    $("div.calendarBody").slideToggle();
    $("#downArrow").addClass("none");
    $("#upArrow").removeClass("none");
  });

  
  $("#alreadyBuy").click(function(){
    if(checkCookie('user')){
      // 顯示已購買按鈕換色 
      $("#alreadyBuy").addClass("-on");
      $("#showAll").removeClass("-on");
  
      // 過濾沒購買課程的課輔時間
      // 電腦
      let allCellBody = document.getElementsByClassName("cellBody");
      for(let i = 0; i < allCellBody.length; i++){
        if(!(allCellBody[i].classList.contains("buy"))){
          allCellBody[i].classList.add("notBuy");
        }
      }
      // 手機
      let phoneDayRight = document.getElementsByClassName("phoneDayRight");
      for(let j = 0; j < phoneDayRight.length; j++){
        if(!(phoneDayRight[j].classList.contains("buy"))){
          phoneDayRight[j].parentElement.classList.add("notBuy");
        }
      }
  
      // 手機月曆上的小點點
      let theSmallPoint = document.getElementsByClassName("smallPoint");
      for(let s = 0; s < theSmallPoint.length; s++){
        if(!(theSmallPoint[s].classList.contains("buy"))){
          theSmallPoint[s].classList.add("notBuy");
        }
      }
    }else{
      swal("請先登入會員!", "", "error");
    }
  });
  $("#showAll").click(function(){
    // 顯示全部按鈕換色
    $("#showAll").addClass("-on");
    $("#alreadyBuy").removeClass("-on");

    // 顯示全部課輔時間
    // 電腦
    let allCellBody = document.getElementsByClassName("cellBody");
    for(let i = 0; i < allCellBody.length; i++){
      allCellBody[i].classList.remove("notBuy");
    }
    // 手機
    let phoneDayRight = document.getElementsByClassName("phoneDayRight");
    for(let j = 0; j < phoneDayRight.length; j++){
      phoneDayRight[j].parentElement.classList.remove("notBuy");
    }

    // 手機月曆上的小點點
    let theSmallPoint = document.getElementsByClassName("smallPoint");
    for(let s = 0; s < theSmallPoint.length; s++){
      theSmallPoint[s].classList.remove("notBuy");
    }
  });

});

document.addEventListener("click", function(e){
  if(checkCookie('user')){
    // 月曆內課輔時間點擊跳窗帶入資料(背景)
    if(e.target.classList.contains("cellBody")){
      bookLightBoxAll.classList.add("on");
      let reservationDate = e.target.getAttribute("data-date")
      $.post('tutorialR.php',{reservationDate ,userAccount},function(res){
        $('#feedBack').html(res);
      });
    }
    // 月曆內課輔時間點擊跳窗帶入資料、手機橫列式(文字)
    if(e.target.classList.contains("courseTitle")){
      bookLightBoxAll.classList.add("on");
      let reservationDate = e.target.parentElement.getAttribute("data-date");
      $.post('tutorialR.php',{reservationDate ,userAccount},function(res){
        $('#feedBack').html(res);
      });
    }
  
    // 手機板橫列式點擊跳窗帶入資料(背景)
    if(e.target.classList.contains("phoneDayRight")){
      bookLightBoxAll.classList.add("on");
      let reservationDate = e.target.getAttribute("data-date")
      $.post('tutorialR.php',{reservationDate ,userAccount},function(res){
        $('#feedBack').html(res);
      });
    }

  }else{
    // 月曆內課輔時間點擊跳窗帶入資料(背景)
    if(e.target.classList.contains("cellBody")){
      bookLightBoxAll.classList.add("on");
      let reservationDate = e.target.getAttribute("data-date")
      $.post('tutorialR.php',{reservationDate},function(res){
        $('#feedBack').html(res);
      });
    }
    // 月曆內課輔時間點擊跳窗帶入資料、手機橫列式(文字)
    if(e.target.classList.contains("courseTitle")){
      bookLightBoxAll.classList.add("on");
      let reservationDate = e.target.parentElement.getAttribute("data-date");
      $.post('tutorialR.php',{reservationDate},function(res){
        $('#feedBack').html(res);
      });
    }
  
    // 手機板橫列式點擊跳窗帶入資料(背景)
    if(e.target.classList.contains("phoneDayRight")){
      bookLightBoxAll.classList.add("on");
      let reservationDate = e.target.getAttribute("data-date")
      $.post('tutorialR.php',{reservationDate},function(res){
        $('#feedBack').html(res);
      });
    }
  }

  // 預約功能
  if(e.target.classList.contains("booking")){

    // 使用者未登入 告知使用者需先登入
    if(!(checkCookie('user'))){
      swal("請先登入會員!", "", "error");
    }else{
      // 先用使用長帳號去取得使用者email
      let courseName = e.target.parentElement.firstElementChild.innerText;
      $.post('tutorialR.php', {courseName, userAccount},function(checkBuyNumber){
        // 使用者有登入狀態但未購買課程 告知使用者須購買課程才能預約
        if(checkBuyNumber == 0){
          swal("購買課程才有辦法預約唷!", "", "error");
        }else{
          // 使用者有登入狀態下並且有購買課程 執行預約功能
          // 要多傳一個使用者帳號值
          let courseNumber = e.target.getAttribute("data-tnumber");
          $.post('tutorialR.php', {courseNumber, userAccount},function(mEmail){

            // 寄e-mail 給使用者 告知使用者預約課輔的時間
            let theEmail = mEmail;
            let courseName = e.target.parentElement.firstElementChild.innerText;
            let courseDate = e.target.parentElement.firstElementChild.getAttribute("data-tdate");
            let courseTime = courseDate.substr(0, 4) + "年" + courseDate.substr(4, 2) + "月" + courseDate.substr(6, 2) + "日";
            
            Email.send({
                SecureToken : "5b7955dd-e14c-46bd-b430-7a1d73590bb6",
                To : `${theEmail}`,
                From : "TibameGroup2@gmail.com",
                Subject : "預約成功",
                Body : `您好，您已成功預約<br><br>課程名稱 : <br><p style="font-size: 20px; font-weight: 700;">${courseName}</p><br>課輔時間 : <br><p style="font-size: 18px; font-weight: 700;">${courseTime}，晚上 18:00~22:00</p>`
            }).than(swal("預約成功", "", "success").then((willDelete) => {
              if (willDelete) {
                window.location.reload();
              }
            }));
          });
        }
      });
    }
  }
});

// 篩選條件資料
let vm = new Vue({
  el: '#conditionChoice',
  data: {
    courseTeacherCombination: [],
    teacherName: [],
    courseType: [],
  },
  methods: {
    condition() {
      // 篩選課程select
      let courseValue = document.getElementsByClassName("filterCourses")[0].value;
      // 篩選老師select
      let teacherValue = document.getElementsByClassName("filterTeachers")[0].value;
      // 電腦版課輔時間
      let allCellBody = document.getElementsByClassName("cellBody");
      // 手機版課輔時間
      let phoneDay = document.getElementsByClassName("phoneDay");
      // 手機月曆的小點點
      let phoneSmallPoint = document.getElementsByClassName("smallPoint");

      let check = 0;
      // 電腦
      for(let i = 0; i < allCellBody.length; i++) {
        allCellBody[i].classList.add("none");
        let courseType = allCellBody[i].getAttribute("data-coursetype");
        let teacherName = allCellBody[i].getAttribute("data-teachername");
        if(courseValue == "all" & teacherValue == "all"){
          allCellBody[i].classList.remove("none");
        }else if(courseValue == courseType & teacherValue == "all"){
          allCellBody[i].classList.remove("none");
        }else if(courseValue == "all" & teacherValue == teacherName){
          allCellBody[i].classList.remove("none");
        }else if(courseValue == courseType & teacherValue == teacherName){
          allCellBody[i].classList.remove("none");
        }
      }

      // 手機月曆的小點點
      for(let j = 0; j < phoneSmallPoint.length; j++){
        phoneSmallPoint[j].classList.add("none");
        let smallPointCourseType = phoneSmallPoint[j].getAttribute("data-coursetype");
        let smallPointTeacherName = phoneSmallPoint[j].getAttribute("data-teachername");
        if(courseValue == "all" & teacherValue == "all"){
          phoneSmallPoint[j].classList.remove("none");
        }else if(courseValue == smallPointCourseType & teacherValue == "all"){
          phoneSmallPoint[j].classList.remove("none");
        }else if(courseValue == "all" & teacherValue == smallPointTeacherName){
          phoneSmallPoint[j].classList.remove("none");
        }else if(courseValue == smallPointCourseType & teacherValue == smallPointTeacherName){
          phoneSmallPoint[j].classList.remove("none");
        }
      }

      // 手機
      for(let p = 0; p < phoneDay.length; p++){
        phoneDay[p].classList.add("none");
        let phoneCourseType = phoneDay[p].getAttribute("data-coursetype");
        let phoneTeacherName = phoneDay[p].getAttribute("data-teachername");
        if(courseValue == "all" & teacherValue == "all"){
          phoneDay[p].classList.remove("none");
        }else if(courseValue == phoneCourseType & teacherValue == "all"){
          phoneDay[p].classList.remove("none");
        }else if(courseValue == "all" & teacherValue == phoneTeacherName){
          phoneDay[p].classList.remove("none");
        }else if(courseValue == phoneCourseType & teacherValue == phoneTeacherName){
          phoneDay[p].classList.remove("none");
        }
      }
      
      // 如果 沒有這個組合 提醒使用者老師並沒這門課 然後重回全部
      let courseTeacherCombination = this.courseTeacherCombination;
      if(courseValue != "all" & teacherValue != "all"){
        for(let c = 0; c < courseTeacherCombination.length; c++){
          if(!(courseTeacherCombination[c].cType == courseValue & courseTeacherCombination[c].mName == teacherValue)){
            check += 1;
          }
        }
      }
      if(check == courseTeacherCombination.length){
        swal("目前這位老師沒有開這語言的課唷 !", "", "error");
        
        let filterCourses = document.getElementsByClassName("filterCourses")[0];
        let filterTeachers = document.getElementsByClassName("filterTeachers")[0];
        filterCourses.value = "all";
        filterTeachers.value = "all";
        // 月曆的課輔時間
        for(let i = 0; i < allCellBody.length; i++){
          allCellBody[i].classList.remove("none");
        }
        // 手機月曆內小點點
        for(let j = 0; j < phoneSmallPoint.length; j++){
          phoneSmallPoint[j].classList.remove("none");
        }
        // 手機橫列式課輔時間
        for(let p = 0; p < phoneDay.length; p++){
          phoneDay[p].classList.remove("none");
        }
      }
    },
  },
  computed: {
    
  },
  mounted() {
    let courseTeacherCombination = this.courseTeacherCombination;
    let teacherName = this.teacherName;
    let courseType = this.courseType;
    // 老師和課程類型組合
    $.ajax({
      url: 'tutorialR.php',
      data: {documentStart: 0},
      type: 'POST',
      success(conditionChoice){
        let conditionChoiceData = JSON.parse(conditionChoice);
        for(let i = 0; i < conditionChoiceData.length; i++){ 
          let courseTeacherCombinations = conditionChoiceData[i];
          courseTeacherCombination.push(courseTeacherCombinations);
        }
      },
    });
    // 課程類型不重複
    $.ajax({
      url: 'tutorialR.php',
      data: {courseTypeOne: 0},
      type: 'POST',
      success(conditionCourse){
        let conditionCourseData = JSON.parse(conditionCourse);
        for(let i = 0; i < conditionCourseData.length; i++){ 
          let courseTypes = conditionCourseData[i].cType;
          courseType.push(courseTypes);
        }
      },
    });
    // 老師不重複值
    $.ajax({
      url: 'tutorialR.php',
      data: {teacherNameOne: 0},
      type: 'POST',
      success(conditionTeacher){
        let conditionTeacherData = JSON.parse(conditionTeacher);
        for(let i = 0; i < conditionTeacherData.length; i++){ 
          let teacherNames = conditionTeacherData[i].mName;
          teacherName.push(teacherNames);
        }
      },
    });
  },
});

// 一開始載入 手機板橫列的課輔
let theYear = document.getElementById("year").getAttribute("data-year");
let theMonth = document.getElementById("month").getAttribute("data-month");
let yearMonth = theYear + (theMonth < 9? '0' + theMonth: theMonth);
// 確定有無登入
if(checkCookie('user')){
  $.post('tutorialR.php',{yearMonth, userAccount}, function(res){
    $("#phoneFeedBack").html(res);
  });
}else{
  $.post('tutorialR.php',{yearMonth}, function(res){
    $("#phoneFeedBack").html(res);
  });
}

// 手機版月曆滑動更換
let phoneCalendarDate = document.getElementsByClassName("calendarDate")[0];
phoneCalendarDate.addEventListener("touchstart", function(e) {
  startX = e.targetTouches[0].pageX;
});  
phoneCalendarDate.addEventListener("touchend", function(e){
  endX = e.changedTouches[0].pageX;

  move = startX - endX;

  if(move > 50){
    arrowRight.click();
  }else if (move < -50){
    arrowLeft.click();
  }
});