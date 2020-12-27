

let vm = new Vue({
  el: '#courseMain',
  data: {
    // table的資料
    allCourseDatas: [],
    // table的頁數
    items: {
      start: 0,
      end: 5,
    },
    // 編輯的課程基本資料
    editCourseDatas: {},
    // 如果曾有募資過
    fundraisings: {},
    // 購買人數
    buyCount: 0,
    // 收藏人數
    favoriteCount: 0,
    // 評價分數
    reviewScore: 0,
    // 所有老師名稱
    teacherNames: [],
    // 所有課程類型
    courseTypes: [],
  },
  methods: {

    // 新增課程神奇小按鈕
    allData(){
      let courseName = document.getElementsByClassName("insertCourseName")[0];
      let courseType = document.getElementsByClassName("insertType")[0];
      let coursePrice = document.getElementsByClassName("insertPrice")[0];
      let courseVideo = document.getElementsByClassName("insertVideo")[0];
      let courseTime = document.getElementsByClassName("insertCourseTime")[0];
      let courseIntroduction = document.getElementsByClassName("insertCourseIntroduction")[0];
      

      courseName.value = "JavaScript 實用小技巧";
      courseType.value = "javascript";
      coursePrice.value = "3880";
      courseVideo.value = "https://www.youtube.com/embed/1RsxYplOPgY";
      courseTime.value = "1 小時 55 分鐘";
      courseIntroduction.value = "對JavasCript還不熟悉嗎? 還不趕緊購買，馬上令你學會JavaScript實用小技巧!!!";
    },

    // 全選按鈕
    allCheckBox(e){
      let oneCheckBox = document.getElementsByClassName("oneCheckBox");
      if(e.target.checked){
        for(let i = 0; i < oneCheckBox.length; i++){
          oneCheckBox[i].checked = true;
        }
      }else{
        for(let i = 0; i < oneCheckBox.length; i++){
          oneCheckBox[i].checked = false;
        }
      }
    },
    // 確認全部checkBox 如果全勾 allCheckBox也要勾 如果少一個要取消
    oneCheckBox(){
      let allCheckBox = document.getElementsByClassName("allCheckBox")[0];
      let oneCheckBox = document.getElementsByClassName("oneCheckBox");
      let sum = 0;
      for(let i = 0; i < oneCheckBox.length; i++){
        if(oneCheckBox[i].checked == true){
          sum += 1;
        }
      }

      if(oneCheckBox.length == sum){
        allCheckBox.checked = true;
      }else{
        allCheckBox.checked = false;
      }
    },
    // 一鍵下架課程
    offCourse(){
      let that = this;
      let oneCheckBox = document.getElementsByClassName("oneCheckBox");
      for(let i = 0; i < oneCheckBox.length; i++){
        if(oneCheckBox[i].checked == true){
          let offcNumber = oneCheckBox[i].closest("div.tr").querySelector("button").getAttribute("data-cnumber");
          $.post("courseR.php", {offcNumber},function(res){});
        }
      }
      swal("下架成功", "", "success");
      that.ajax();
    },
    // 一鍵上架課程
    onCourse(){
      let that = this;
      let oneCheckBox = document.getElementsByClassName("oneCheckBox");
      for(let i = 0; i < oneCheckBox.length; i++){
        if(oneCheckBox[i].checked == true){
          let oncNumber = oneCheckBox[i].closest("div.tr").querySelector("button").getAttribute("data-cnumber");
          $.post("courseR.php", {oncNumber},function(res){});
        }
      }

      swal("上架成功", "", "success");
      that.ajax();
    },
    // 新增課程按鈕開啟燈箱
    addCourseLightBox(){
      let addCourseBackAll = document.getElementsByClassName("addCourseBackAll")[0];
      addCourseBackAll.classList.add("-on");
    },
    // 關閉新增課程燈箱
    closeCourseLightBox(){
      let addCourseBackAll = document.getElementsByClassName("addCourseBackAll")[0];
      addCourseBackAll.classList.remove("-on");
    },
    // 編輯課程資訊按鈕開啟燈箱
    editLightBox(e){
      let that = this;
      let cNumber = e.target.getAttribute("data-cnumber");
      let check = e.target.getAttribute("data-cnumber");
      let checkOk = e.target.getAttribute("data-cnumber");
      let other = e.target.getAttribute("data-cnumber");
      // 課程基本資訊
      $.ajax({
        url: 'courseR.php',
        data: {cNumber},
        type: 'POST',
        success(resEditCourseData){
          let editCourseData = JSON.parse(resEditCourseData);
          that.editCourseDatas = editCourseData[0];
        },
      });
      // 如果有募資過需要抓募資資料
      $.ajax({
        url: 'courseR.php',
        data: {check},
        type: 'POST',
        success(resCheck){
          if(resCheck == 0){
            that.fundraisings = {};
          }else{
            $.ajax({
              url: 'courseR.php',
              data: {checkOk},
              type: 'POST',
              success(rescheckOk){
                let haveFundraisings = JSON.parse(rescheckOk);
                that.fundraisings = haveFundraisings[0];
              },
            });
          }
        },
      });
      // 購買人數
      $.ajax({
        url: 'courseR.php',
        data: {other},
        type: 'POST',
        success(resOther){
          let others = JSON.parse(resOther);
          that.buyCount = others[0];
          that.favoriteCount = others[1];
          that.reviewScore = others[2];
        },
      });
      
      let editCourseBackAll = document.getElementsByClassName("editCourseBackAll")[0];
      editCourseBackAll.classList.add("-on");
    },
    // 關閉編輯燈箱
    closeEditLightBox(){
      let editCourseBackAll = document.getElementsByClassName("editCourseBackAll")[0];
      editCourseBackAll.classList.remove("-on");
    },

    // 如果更改狀態募資價格和開課時間input要跟著改變(新增)
    addStatusChange(e){
      let cStatus = e.target.value;
      let addCoursefundraisingInput = e.target.closest("div.addFormAll").querySelector("div.addCoursefundraising").querySelector("input");
      let addCourseOpenTimeInput = e.target.closest("div.addFormAll").querySelector("div.addCourseOpenTime").querySelector("input");
      if(cStatus == 2){
        addCoursefundraisingInput.classList.remove("fundraising");
        addCoursefundraisingInput.removeAttribute("disabled");
        addCourseOpenTimeInput.classList.remove("fundraising");
        addCourseOpenTimeInput.removeAttribute("disabled");
      }else{
        addCoursefundraisingInput.classList.add("fundraising");
        addCoursefundraisingInput.setAttribute("disabled", "true");
        addCourseOpenTimeInput.classList.add("fundraising");
        addCourseOpenTimeInput.setAttribute("disabled", "true");
      }
    },

    // 點擊開啟上傳圖片
    clickInput(e){
      let inputFile = e.target.querySelector("input");
      // 要問 執行成功但會報錯
      inputFile.click();
    },
    buttonCilckInput(e){
      let inputFile = e.target.previousElementSibling.previousElementSibling;
      // 要問 執行成功但會報錯
      inputFile.click();
    },
    imageName(e){
      let pFileName = e.target.nextElementSibling;
      // 清空名字
      pFileName.innerText = "";
      
      // editReadURL(e.target);
      // 抓到圖片檔名
      let fileName = e.target.files[0].name;
      // 寫進去p標籤
      pFileName.innerText = "../images/allCourse/" + fileName;
    },
    // 新增課程寫到資料庫和放圖片
    insertCourse(){
      let insertCourseName = document.getElementsByClassName("insertCourseName")[0].value;
      let insertStatus = document.getElementsByClassName("insertStatus")[0].value;
      let insertType = document.getElementsByClassName("insertType")[0].value;
      let insertPrice = document.getElementsByClassName("insertPrice")[0].value;
      let insertFundraising = document.getElementsByClassName("insertFundraising")[0].value;
      let insertOpenTime = document.getElementsByClassName("insertOpenTime")[0].value;
      let insertImage = document.getElementsByClassName("insertImage")[0].innerText;
      let insertVideo = document.getElementsByClassName("insertVideo")[0].value;
      let insertCourseTime = document.getElementsByClassName("insertCourseTime")[0].value;
      let insertCourseIntroduction = document.getElementsByClassName("insertCourseIntroduction")[0].value;
      let insertTeacher = document.getElementsByClassName("insertTeacher")[0].value;

      if(!(insertCourseName != "" && insertType != "" && insertPrice !="" && insertImage !="" && insertVideo != "" && insertCourseTime !="" && insertCourseIntroduction !="")){
        swal("所有欄位請確認填寫", "", "info");
        return false;
      }else if(insertStatus == 2){
        if(insertFundraising == "" && insertOpenTime == ""){
          swal("請填寫募資架前即開課時間", "", "info");
          return false;
        }else if(insertFundraising == "" && insertOpenTime != ""){
          swal("請填寫募資價錢", "", "info");
          return false;
        }else if(insertFundraising != "" && insertOpenTime == ""){
          swal("請填寫開課時間", "", "info");
          return false;
        }
      }

      let fileData = $('#addInputFile').prop('files')[0];   //取得上傳檔案屬性
      let formData = new FormData();  // 建構new FormData()
      formData.append('file', fileData);  //把物件加到file後面
      // 傳圖片 將圖片放到資料夾內
      $.ajax({
        url: 'courseR.php',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,     //data只能指定單一物件                 
        type: 'post',
       success: function(data){}
      });
      
      // 新增課程寫進資料庫
      $.ajax({
        url: 'courseR.php',
        data: {
          insert: 0,
          insertCourseName,
          insertStatus,
          insertType,
          insertPrice,
          insertFundraising,
          insertOpenTime,
          insertImage,
          insertVideo,
          insertCourseTime,
          insertCourseIntroduction,
          insertTeacher
        },
        type: 'POST',
        success(res){
          swal("新增成功", "", "success").then((willDelete) => {
            if (willDelete) {
              window.location.reload();
            }
          });
        },
      });
    
    },

    // 編輯課程寫進資料庫
    updateCourse(e){
      let theCourseNumber = document.getElementsByClassName("theCourseNumber")[0].innerText;
      let updateTheCourseName = document.getElementsByClassName("updateTheCourseName")[0].value;
      let updateStatus = document.getElementsByClassName("updateStatus")[0].value;
      let updateType = document.getElementsByClassName("updateType")[0].value;
      let updatePrice = document.getElementsByClassName("updatePrice")[0].value;
      let updateFundraising = document.getElementsByClassName("updateFundraising")[0].value;
      let updateOpenTime = document.getElementsByClassName("updateOpenTime")[0].value;
      let updateImage = document.getElementsByClassName("updateImage")[0].innerText;
      let updateVideo = document.getElementsByClassName("updateVideo")[0].value;
      let updateCourseTime = document.getElementsByClassName("updateCourseTime")[0].value;
      let updateIntroduction = document.getElementsByClassName("updateIntroduction")[0].value;
      let updateTeacher = document.getElementsByClassName("updateTeacher")[0].value;

      if(!(updateTheCourseName != "" && updateType != "" && updatePrice != "" && updateImage !="" && updateVideo != "" && updateCourseTime != "" && updateIntroduction != "")){
        swal("所有欄位請確認填寫", "", "info");
        return false;
      }else if(updateStatus == 2){
        if(updateFundraising == "" && updateOpenTime == ""){
          swal("請填寫募資架前即開課時間", "", "info");
          return false;
        }else if(updateFundraising == "" && updateOpenTime != ""){
          swal("請填寫募資價錢", "", "info");
          return false;
        }else if(updateFundraising != "" && updateOpenTime == ""){
          swal("請填寫開課時間", "", "info");
          return false;
        }
      }

      // 確認有沒有更新圖片
      let updateFile = document.getElementsByClassName("updateFile")[0].value;
      if(updateFile != ""){
        //上傳圖片存到資料夾
        let fileData = $('#updateFileImage').prop('files')[0];   //取得上傳檔案屬性
        let formData = new FormData();  // 建構new FormData()
        formData.append('file', fileData);  //把物件加到file後面
        // 傳圖片 將圖片放到資料夾內
        $.ajax({
          url: 'courseR.php',
          cache: false,
          contentType: false,
          processData: false,
          data: formData,     //data只能指定單一物件                 
          type: 'post',
          success: function(data){}
        });
      }

      // 編輯課程資料
      $.ajax({
        url: 'courseR.php',
        data: {
          update: 0,
          theCourseNumber,
          updateTheCourseName,
          updateStatus,
          updateType,
          updatePrice,
          updateFundraising,
          updateOpenTime,
          updateImage,
          updateVideo,
          updateCourseTime,
          updateIntroduction,
          updateTeacher
        },
        type: 'POST',
        success(res){
          swal("修改成功", "", "success").then((willDelete) => {
            if (willDelete) {
              window.location.reload();
            }
          });
        },
      });


      
    },

    // 如果更改狀態募資價格和開課時間input要跟著改變(編輯)
    cStatusChange(e){
      let cStatus = e.target.value;
      let editCoursefundraisingInput = e.target.closest("div.editFormAll").querySelector("div.editCoursefundraising").querySelector("input");
      let editCourseOpenTimeInput = e.target.closest("div.editFormAll").querySelector("div.editCourseOpenTime").querySelector("input");
      if(cStatus == 2){
        editCoursefundraisingInput.classList.remove("fundraising");
        editCoursefundraisingInput.removeAttribute("disabled");
        editCourseOpenTimeInput.classList.remove("fundraising");
        editCourseOpenTimeInput.removeAttribute("disabled");
      }else{
        editCoursefundraisingInput.classList.add("fundraising");
        editCoursefundraisingInput.setAttribute("disabled", "true");
        editCourseOpenTimeInput.classList.add("fundraising");
        editCourseOpenTimeInput.setAttribute("disabled", "true");
      }
    },

    // 換頁功能
    lastPage(){
      if(this.items.start == 0 && this.items.end == 5){
        // 第一頁 不能再往前
      }else{
        this.items.start -= 5;
        this.items.end -= 5;
      }
    },
    nextPage(){
      let allCourseDatas = this.allCourseDatas;

      if(this.items.end >= allCourseDatas.length){
        // 最後一頁不能再往後
      }else{
        this.items.start += 5;
        this.items.end += 5;
      }
    },

    // 抓table課程資料
    ajax(){
      let allCourseDatas = this.allCourseDatas;
      let dateStart = document.getElementById("datepicker1").value;
      let dateEnd = document.getElementById("datepicker2").value;
      let cStatus = document.getElementsByClassName("searchStatus")[0].value;
      let teacherName = document.getElementsByClassName("searchTeachers")[0].value;
      let type = document.getElementsByClassName("searchTypes")[0].value;
      let title = document.getElementsByClassName("searchTitle")[0].value;

      // 清除原先資料
      allCourseDatas.splice(0, allCourseDatas.length);
      // 回到原頁數      
      this.items.start = 0;
      this.items.end = 5;
      
      $.ajax({
        url: 'courseR.php',
        data: {
          documentStart: 0,
          dateStart,
          dateEnd,
          cStatus,
          teacherName,
          type,
          title
        },
        type: 'POST',
        success(resCourseData){
          let courseData = JSON.parse(resCourseData);
          for(let i = 0; i < courseData.length; i++){ 
            let allCourse = courseData[i];

            // 狀態轉換
            switch(allCourse.cStatus){
              case '0':
                allCourse.cStatus = "下架";
                break;
              case '1':
                allCourse.cStatus = "上架";
                break;
              case '2':
                allCourse.cStatus = "募資中";
                break;
            }

            allCourseDatas.push(allCourse);
          }
        },
      });
    },
    
    // 抓全部老師名稱
    allTeacherName(){
      let teacherNames = this.teacherNames;
      $.ajax({
        url: 'courseR.php',
        data: {startTeacherNames: 0},
        type: 'POST',
        success(resTeacherNames){
          let teacherNamesDate = JSON.parse(resTeacherNames);
          for(let t = 0; t < teacherNamesDate.length; t++){
            teacherNames.push(teacherNamesDate[t]);
          }
        },
      });
    },
    // 抓全部課程類型
    allCourseType(){
      let courseTypes = this.courseTypes;
      $.ajax({
        url: 'courseR.php',
        data: {startCourseTypes: 0},
        type: 'POST',
        success(resCourseTypes){
          let courseTypesDate = JSON.parse(resCourseTypes);
          for(let t = 0; t < courseTypesDate.length; t++){
            courseTypes.push(courseTypesDate[t]);
          }
        },
      });
    },

  },
  mounted() {
    this.ajax();
    this.allTeacherName();
    this.allCourseType();
  },
  
});