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
  cell.className = "date" + (date.getMonth() === state.current.getMonth()? "": " fadeout");
  cell.textContent = date.getDate();
  calendarDate.appendChild(cell);
}

calendar();

let arrowLeft = document.querySelector("#arrowLeft");
let arrowRight = document.querySelector("#arrowRight");

arrowLeft.addEventListener("click", preMonth);

arrowRight.addEventListener("click", nextMonth);

