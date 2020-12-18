let addBtn = document.getElementsByClassName("addButton")[0];
let addReservationBack = document.getElementsByClassName("addReservationBack")[0];
let cancelBack = document.getElementsByClassName("cancelBack")[0];
let addReservationBackAll = document.getElementsByClassName("addReservationBackAll")[0];
addBtn.addEventListener("click", function(){
  addReservationBackAll.classList.add("on");
});
addReservationBack.addEventListener("click", function(){
  addReservationBackAll.classList.remove("on");
});
cancelBack.addEventListener("click", function(){
  addReservationBackAll.classList.remove("on");
});


new Vue({
  el: '#main',     //el: document.getElementById('app'),
  data: {         //變數都放這裡
      dataArr: [],      //select到的所有課程資料
      countPeopel:[],   //每堂課預約的人數
      courses:[],       //所有課程名稱（包含位開課）
      courseTitles:[],  //目前開課的課程名稱
      student: [],
      pages: {start: 0,end: 5},
      pages2: {start: 6,end: 10},
  },
  methods: {      //函數放這裡
    search(){//搜尋
      var beforeTime =  $('#datepicker1').val();
      var afterTime =  $('#datepicker2').val();
      var teacherName =  $('#teacherName').val();
      var courseName =  $('#courseName').val();

      var that = this;
      $.ajax({
        type: 'POST',
        url: "../backEnd/reservationSearch.php",
        data: {
          beforeTime:beforeTime,
          afterTime:afterTime,
          teacherName:teacherName,
          courseName:courseName,
        },
        success: function (res){
          let array = JSON.parse(res);

          for(let i = 0; i < array.length; i++){
            if(array[i]["tStatus"] == "1"){
              array[i]["tStatus"] =  "上架";
            }else{
              array[i]["tStatus"] =  "下架";
            }
          }
          that.dataArr = array;
          that.pages= {start: 0,end: 5};
        }
      });
    },

    callEditBackAll(e){ //叫出編輯燈箱
      let editBackAll = document.getElementsByClassName("editBackAll")[0];
      editBackAll.classList.add("on");
      $('#people').text(e.target.closest('div.td').previousElementSibling.innerText)
      $('#datepicker4').val(e.target.closest('div.td').previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText);
      $('#courseType').text(e.target.closest('div.td').previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText);
      $('#editteacherName').text(e.target.closest('div.td').previousElementSibling.previousElementSibling.previousElementSibling.innerText);
      $('#courseNumber').val(e.target.closest('div.td').nextElementSibling.value);
      console.log(e.target.closest('div.td').nextElementSibling.value);
      if(e.target.closest('div.td').previousElementSibling.previousElementSibling.innerText == '上架'){
        var stauts =  $('.stauts');
        stauts[0].selected=true;
      }else{
        var stauts =  $('.stauts');
        stauts[1].selected=true;
      };
      let that = this;
      $.ajax({
        type: 'POST',
        url: "../backEnd/reservationSearch.php",
        data: {
          'courseNumber': e.target.closest('div.td').nextElementSibling.value,
        },
        success: function (res){
          let student = JSON.parse(res);
          let studentArr = [];
          for(let i = 0; i < student.length; i++){
            studentArr.push(student[i].mName);
          }

          that.student = studentArr;
        }
      });

    },
    cloceEditBackAll(){ //關閉編輯燈箱
      let editBackAll = document.getElementsByClassName("editBackAll")[0];
      editBackAll.classList.remove("on");
    },

    // 上一頁按鈕↓↓↓↓↓
    minusPages() {
      if (this.pages.start == 0 && this.pages.end == 5) {
          // do nothing
      } else {
          this.pages.start -= 5;
          this.pages.end -= 5;
          $(".checkRow").prop("checked", false);
          $('#checkAll').prop("checked", false);
      }
  },// 上一頁按鈕↑↑↑↑↑
  
    // 下一頁按鈕↓↓↓↓↓
    plusPages() {
      if (this.pages.end > this.dataArr.length) {
          // do nothing
      } else {
          this.pages.start += 5;
          this.pages.end += 5;
          $(".checkRow").prop("checked", false);
          $('#checkAll').prop("checked", false);
      }
    },// 下一頁按鈕↑↑↑↑↑

    allCheck(){ //全勾
      let allCheck = $('input.checkbox');
      let checkAll = $('#checkAll');
      if(checkAll[0].checked){
        for(let i = 0; i < allCheck.length; i++){
          allCheck[i].checked = true;
        };
      }else {
        for(let i = 0; i < allCheck.length; i++){
          allCheck[i].checked = false;
        };
      };
    },
  },
  mounted() {
    $.getJSON("../backEnd/reservationR.php").then(res=>{ 
      for(let i = 0; i < res[0].length; i++){
        if(res[0][i]["tStatus"] == "1"){
          res[0][i]["tStatus"] =  "上架";
        }else{
          res[0][i]["tStatus"] =  "下架";
        }
        this.dataArr.push(res[0][i]);
        this.countPeopel.push(res[1][i]);
      };
      for(let i = 0; i < res[2].length; i++){
        this.courses.push(res[2][i]);
      };
      for(let i = 0; i < res[0].length; i++){
        this.courseTitles.push(res[0][i].cTitle);
      };
    });
    
  },
  updated() {
  },
});



// let editBtn = document.getElementsByClassName("editBtn");
// let editBack = document.getElementsByClassName("editBack")[0];
// let cancelBack1 = document.getElementsByClassName("cancelBack")[1];

// for(let i = 0; i < editBtn.length; i++){
//   editBtn[i].addEventListener("click", function(){
//     editBackAll.classList.add("on");
//   });
// }
// editBack.addEventListener("click", function(){
//   editBackAll.classList.remove("on");
// });
// cancelBack1.addEventListener("click", function(){
  
// });

$(document).click(function(e){
  console.log(e.target);
});

