let vm = new Vue({
  el: '#main',     //el: document.getElementById('app'),
  data: {         //變數都放這裡
      dataArr: [],      //select到的所有課程資料
      countPeopel:[],   //每堂課預約的人數
      courses:[],       //所有課程名稱（包含位開課）
      coursesNumber:[], //所有課程的編號
      courseTitles:[],  //目前開課的課程名稱
      students: [],
      pages: {start: 0,end: 5},
      pages2: {start: 6,end: 10},
      pages3: {start: 0,end: 5},
      pages4: {start: 5,end: 10},
  },
  methods: {      //函數放這裡
    addTutorial(e){
      e.preventDefault();
      console.log($('#datepicker3')[0].value);
      console.log($('#addCourseName')[0].value);
      console.log($('#addCourseTeacher')[0].value);
      $.ajax({
        type: 'POST',
        url: "../backEnd/reservationAddtutorial.php",
        data: {
          date: $('#datepicker3')[0].value,
          CourseName: $('#addCourseName')[0].value,
          CourseTeacher: $('#addCourseTeacher')[0].value,
        },
        success: function (res){
          // alert(res);
          if(res =='hastutorial'){
            swal("當日已有課輔!", "", "warning")
          }else{
            swal("新增成功!", "", "success")
            .then((willDelete) => {
                if (willDelete) {
                    window.location.reload(); 
                }
            });
            vm.removeReservationBackAll();
          }
        }
      });
    },

    addReservationBackAll(){//叫出新增課輔燈箱
      let addBtn = document.getElementsByClassName("addButton")[0];
      let addReservationBackAll = document.getElementsByClassName("addReservationBackAll")[0];
      addReservationBackAll.classList.add("on");
    },
    removeReservationBackAll(){//關閉新增課輔燈箱
      let addReservationBackAll = document.getElementsByClassName("addReservationBackAll")[0];
      addReservationBackAll.classList.remove("on");
    },

    reload(){//重新整理用
      $.ajax({
        type: 'POST',
        url: "../backEnd/reservationSearch.php",
        data: {
          beforeTime: '2010/01/01',
          afterTime: '2030/01/01',
          teacherName: 'all',
          courseName: 'all',
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
          vm.dataArr = array;
          vm.pages= {start: 0,end: 5};
        }
      });
    },

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
          console.log(array);

          for(let i = 0; i < array.length; i++){
            if(array[i]["tStatus"] == "1"){
              array[i]["tStatus"] =  "上架";
            }else{
              array[i]["tStatus"] =  "下架";
            }
          }
          that.dataArr = array;
          that.pages= {start: 0,end: 5};

          if(array.length != 0){
            $('div.NoData').addClass('hidden');
          }else{
            $('div.NoData').removeClass('hidden');
          }
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
          console.log(studentArr);
          that.students = studentArr;
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

    mutipleOn() {// 快速下架試題
      let allON = [];
      let checkRow = document.getElementsByClassName('checkbox');

      for (let i = 0; i < checkRow.length; i++) {
          if (checkRow[i].checked) {
            allON.push(checkRow[i].closest('div.tr').querySelector('input.hidden').value);
          }
      }
      $.ajax({
          type: 'POST',
          url: '../backEnd/reservationRO.php',
          data: { allON },
          success: function (res) {
            vm.reload();
            $(".checkbox").prop("checked", false);
            $('#checkAll').prop("checked", false);
          },
      });
    },
    mutipleOff() {// 快速下架試題
      let allOFF = [];
      let checkRow = document.getElementsByClassName('checkbox');

      for (let i = 0; i < checkRow.length; i++) {
          if (checkRow[i].checked) {
            allOFF.push(checkRow[i].closest('div.tr').querySelector('input.hidden').value);
          }
      }
      $.ajax({
          type: 'POST',
          url: '../backEnd/reservationRO.php',
          data: { allOFF },
          success: function (res) {
            vm.reload();
            $(".checkbox").prop("checked", false);
            $('#checkAll').prop("checked", false);
          },
      });
    },
    editSave(e){
      e.preventDefault();
      console.log($('#datepicker4')[0].value);
      console.log($('#stauts')[0].value);
      console.log($('#courseNumber')[0].value);

      $.ajax({
        type: 'POST',
        url: "../backEnd/reservationUDT.php",
        data: {
          tDate: $('#datepicker4')[0].value,
          tStatus: $('#stauts')[0].value,
          tNumber: $('#courseNumber')[0].value,
        },
        success: function (res){
          vm.reload();
          vm.cloceEditBackAll();
        }
      });
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
      // console.log(res[2]);
      console.log(res);
      for(let i = 0; i < res[2].length; i++){
        this.courses.push(res[2][i]);
      };
      for(let i = 0; i < res[0].length; i++){
        this.courseTitles.push(res[0][i].cTitle);
      };
      for(let i = 0; i < res[3].length; i++){
        this.coursesNumber.push(res[3][i].cNumber);
      }
    });
    
    let gettoday = new Date();
    let year = gettoday.getFullYear();
    let month = gettoday.getMonth();
    let date = gettoday.getDate();
    $('#datepicker1')[0].value = `${year}/${month}/${date}`;
    
    let twomonth = new Date(gettoday.getTime() + 5184000000);
    let year1 = twomonth.getFullYear();
    let month1 = twomonth.getMonth();
    let date1 = twomonth.getDate();
    $('#datepicker2')[0].value = `${year1}/${month1}/${date1}`;
    
  },
});


