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
  calendarMonth.textContent = (state.current.getMonth() + 1) + "月";

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
  cellBody.className = "cellBody";

  let teacherName = document.createElement("p");
  teacherName.className = "teacherName";
  let courseName = document.createElement("p");
  courseName.className = "courseName";
  teacherName.textContent ="黃語昕";
  courseName.textContent ="JavaScritp";

  let smallPoint = document.createElement("div");
  smallPoint.className = "smallPoint";

  cellBody.appendChild(teacherName);
  cellBody.appendChild(courseName);

  cell.appendChild(dayNumber);
  if(date.getDate() == 1){
 
    cell.appendChild(cellBody);
    cell.appendChild(smallPoint);
  }else if(date.getDate() == 2){
    cellBody.classList.add("buy");
    smallPoint.classList.add("buy");
    cell.appendChild(cellBody);
    cell.appendChild(smallPoint);
  }else if(date.getDate() == 3){
    cellBody.classList.add("full");
    smallPoint.classList.add("full");
    cell.appendChild(cellBody);
    cell.appendChild(smallPoint);
  }
  calendarDate.appendChild(cell);


  
}

calendar();

let arrowLeft = document.querySelector("#arrowLeft");
let arrowRight = document.querySelector("#arrowRight");

arrowLeft.addEventListener("click", preMonth);

arrowRight.addEventListener("click", nextMonth);

let cellBody = document.getElementsByClassName("cellBody")[0];
let phoneDayRight = document.getElementsByClassName("phoneDayRight")[0];
let bookLightBoxAll = document.getElementsByClassName("bookLightBoxAll")[0];
let bookLightBoxBack = document.getElementsByClassName("bookLightBoxBack")[0];
let cancelBtn = document.getElementsByClassName("cancelBtn")[0];

cellBody.addEventListener("click", function(){
  bookLightBoxAll.classList.add("on");
});
phoneDayRight.addEventListener("click", function(){
  bookLightBoxAll.classList.add("on");
});

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
  // 結束
  // 顯示已購買 顯示全部按鈕換色
  $("#alreadyBuy").click(function(){
    $("#alreadyBuy").addClass("-on");
    $("#showAll").removeClass("-on");
  });
  $("#showAll").click(function(){
    $("#showAll").addClass("-on");
    $("#alreadyBuy").removeClass("-on");
  });
  
});

