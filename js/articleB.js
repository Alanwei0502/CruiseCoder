// 搜尋傳值 回傳結果
let searchPage = 1;
let searchBtn = document.getElementById("searchBtn");
let searchNameEnter = document.getElementsByClassName("searchName")[0];
searchNameEnter.addEventListener("keydown" ,function(e){
  if(e.which == 13){
    searchBtn.click();
  }
});
searchBtn.addEventListener("click", function(){
  let dateStart = document.getElementById("datepicker1").value;
  let dateEnd = document.getElementById("datepicker2").value;
  let searchStatus = document.getElementsByClassName("searchStatus")[0].value;
  let searchName = document.getElementsByClassName("searchName")[0].value;

  let lastPage = document.getElementsByClassName("lastPage")[0];
  let nextPage = document.getElementsByClassName("nextPage")[0];
  
  if(dateStart == "" & dateEnd == ""){
    $.post('articleR.php',{searchPage,searchStatus,searchName},function(res){
      $('#feedBack').html(res);
    });
  }else if(dateStart != "" & dateEnd == "" | dateStart == "" & dateEnd != ""){
    swal("請選擇日期區間", "", "error");
    return false;
  }else if(dateStart != "" & dateEnd != "" & searchName == ""){
    $.post('articleR.php',{searchPage,searchStatus,dateStart,dateEnd},function(res){
      $('#feedBack').html(res);
    });
  }else if(dateStart != "" & dateEnd != "" & searchName !=""){
    $.post('articleR.php',{searchPage,searchStatus,searchName,dateStart,dateEnd},function(res){
      $('#feedBack').html(res);
    });
  }
  lastPage.classList.add("searchModel");
  nextPage.classList.add("searchModel");
});


// inputFile 連結
// inputfile假樣式的最外層的div
let fileStyle = document.getElementsByClassName("fileStyle")[0];
// input標籤 
let inputFile = document.getElementsByClassName("inputFile")[0];
// p標籤
let pFileName = document.getElementsByClassName("pFileName")[0];
// 放圖片的區塊
let articleImage = document.getElementsByClassName("articleImage")[0];

fileStyle.addEventListener("click", function(){
  inputFile.click();
});
inputFile.addEventListener("change", function(){
  // 先清空
  pFileName.innerText = "";
  readURL(this);
  // 抓到圖檔名稱
  let fileName = inputFile.files[0];
  // 丟進去p標籤
  pFileName.innerText = fileName.name;
});

function readURL(input){
  // 判斷是否有上傳成功
  if(input.files && input.files[0]){
    
    var reader = new FileReader();

    reader.addEventListener("load", function(e){
      // 清空圖片
      articleImage.innerHTML = "";
      // 創建img標籤
      let img = document.createElement("img");
      // 在屬性src 加上圖片網路路徑
      img.src = e.target.result;
      // 丟進去要放圖片的區塊
      articleImage.appendChild(img);
    });

    reader.readAsDataURL(input.files[0]);

  }
}


// 新增專欄燈箱開關
let addBtn = document.getElementsByClassName("addButton")[0];
let addArticleBack = document.getElementsByClassName("addArticleBack")[0];
let cancelBack = document.getElementsByClassName("cancelBack")[0];
let addArticleBackAll = document.getElementsByClassName("addArticleBackAll")[0];

addBtn.addEventListener("click", function(){
  addArticleBackAll.classList.add("on");
});
addArticleBack.addEventListener("click", function(){
  addArticleBackAll.classList.remove("on");
});
cancelBack.addEventListener("click", function(){
  addArticleBackAll.classList.remove("on");
});

// 新增專欄燈箱內的新增專欄按鈕
let addArticleBtn = document.getElementById("addArticleBtn");
// 新增專欄名稱
let addArticleName = document.getElementById("addArticleName");
// 內文編輯
let addSummernote = document.getElementById("addSummernote");
// 新增表單
let addForm = document.getElementById("addForm");

addArticleBtn.addEventListener("click", function(){
  let checkOut = false;

  // 判斷新增專欄內表單不能為空值
  if(addArticleName.value == ""){
    swal("請填寫專欄名稱", "", "info");
    addArticleName.focus();
    addArticleName.classList.add("error");
    
    return false;
  }else{
    addArticleName.classList.remove("error");
  }

  if(inputFile.value == ""){
    swal("請上傳專欄圖片", "", "info");
    fileStyle.classList.add("error");

    return false;
  }else{
    fileStyle.classList.remove("error");
  }

  if(addSummernote.value == ""){
    swal("請撰寫專欄文章", "", "info");
    return false;
  }

  checkOut = true;

  if(checkOut){
    swal("新增成功", "", "success").then((willDelete) => {
      if (willDelete) {
        let a = 1;
        $.post('articleR.php',{a},function(res){
          addForm.submit();
        });
      }
    });
  }


});


// 上下頁判斷傳值
let lastPage = document.getElementsByClassName("lastPage")[0];
let nextPage = document.getElementsByClassName("nextPage")[0];
let page = 1;

$.post('articleR.php',{page},function(res){
  $('#feedBack').html(res);
});

lastPage.addEventListener("click", function(){
  if(lastPage.classList.contains("searchModel")){

    let dateStart = document.getElementById("datepicker1").value;
    let dateEnd = document.getElementById("datepicker2").value;
    let searchStatus = document.getElementsByClassName("searchStatus")[0].value;
    let searchName = document.getElementsByClassName("searchName")[0].value;

    if(searchPage > 1){
      searchPage -= 1;
    }

    if(dateStart == "" & dateEnd == ""){
      $.post('articleR.php',{searchPage,searchStatus,searchName},function(res){
        $('#feedBack').html(res);
      });
    }else if(dateStart != "" & dateEnd == "" | dateStart == "" & dateEnd != ""){
      swal("請選擇日期區間!", "", "error");
      return false;
    }else if(dateStart != "" & dateEnd != "" & searchName == ""){
      $.post('articleR.php',{searchPage,searchStatus,dateStart,dateEnd},function(res){
        $('#feedBack').html(res);
      });
    }else if(dateStart != "" & dateEnd != "" & searchName !=""){
      $.post('articleR.php',{searchPage,searchStatus,searchName,dateStart,dateEnd},function(res){
        $('#feedBack').html(res);
      });
    }
  }else{
    if(page > 1){
      page -= 1;
    }
    $.post('articleR.php',{page},function(res){
      $('#feedBack').html(res);
    });
  }
});
nextPage.addEventListener("click", function(){
  if(nextPage.classList.contains("searchModel")){
    // 為了去接回傳總頁數的
    let lastSearchPageNumber = 0;

    let dateStart = document.getElementById("datepicker1").value;
    let dateEnd = document.getElementById("datepicker2").value;
    let searchStatus = document.getElementsByClassName("searchStatus")[0].value;
    let searchName = document.getElementsByClassName("searchName")[0].value;

    if(dateStart == "" & dateEnd == ""){
      $.post('articleR.php',{searchPage,searchStatus,searchName,lastSearchPageNumber},function(resLastSearchPageNumber){
        lastSearchPageNumber = resLastSearchPageNumber;

        if(lastSearchPageNumber > searchPage){
          searchPage += 1;
        }

        $.post('articleR.php',{searchPage,searchStatus,searchName},function(res){
          $('#feedBack').html(res);
        });
      });
    }else if(dateStart != "" & dateEnd != "" & searchName == ""){
      $.post('articleR.php',{searchPage,searchStatus,searchName,lastSearchPageNumber},function(resLastSearchPageNumber){
        lastSearchPageNumber = resLastSearchPageNumber;

        if(lastSearchPageNumber > searchPage){
          searchPage += 1;
        }

        $.post('articleR.php',{searchPage,searchStatus,dateStart,dateEnd},function(res){
          $('#feedBack').html(res);
        });
      });
    }else if(dateStart != "" & dateEnd != "" & searchName !=""){
      $.post('articleR.php',{searchPage,searchStatus,searchName,lastSearchPageNumber},function(resLastSearchPageNumber){
        lastSearchPageNumber = resLastSearchPageNumber;

        if(lastSearchPageNumber > searchPage){
          searchPage += 1;
        }

        $.post('articleR.php',{searchPage,searchStatus,searchName,dateStart,dateEnd},function(res){
          $('#feedBack').html(res);
        });
      });
    }  
  }else{
    let lastPageNumber = 0;
    $.post('articleR.php',{lastPageNumber},function(resLastPageNumber){
      lastPageNumber = resLastPageNumber;
      
      if(lastPageNumber > page){
        page += 1;
      }
      
      $.post('articleR.php',{page},function(res){
        $('#feedBack').html(res);
      });
    });
  }
});

// 全選的checkBox
let allCheckBox = document.getElementsByClassName("allCheckBox")[0];
var sum = 0;

// 因為用HTML上面的DOM是非一開始存在只能利用document方式,但這點擊方式導致會抓到點擊前的狀態,只能利用mousedown多點擊一次並抓值、mouseup在點擊一次恢復原本想要的狀態 
document.addEventListener("mousedown", function(e){
  if(e.target.classList.contains("labelCheck")){
    let inputCheck = e.target.querySelector("input");
    // 多點擊一次 讓抓到的值是這個狀態下的值
    inputCheck.click();

    let theFeedBack = e.target.closest("div#feedBack");
    let checkBox = theFeedBack.querySelectorAll("input");
    
    let allBox = checkBox.length;
    let checkedBox = theFeedBack.querySelectorAll("input:checked").length;
    if(allBox == checkedBox){
      allCheckBox.checked = true;
    }else{
      allCheckBox.checked = false;
    }
  }

  if(e.target.classList.contains("spanCheck")){
    let inputCheck = e.target.previousElementSibling;
    // 多點擊一次 讓抓到的值是這個狀態下的值
    inputCheck.click();

    let theFeedBack = e.target.closest("div#feedBack");
    let checkBox = theFeedBack.querySelectorAll("input");

    let allBox = checkBox.length;
    let checkedBox = theFeedBack.querySelectorAll("input:checked").length;
    if(allBox == checkedBox){
      allCheckBox.checked = true;
    }else{
      allCheckBox.checked = false;
    }
  }
});

document.addEventListener("mouseup", function(e){
  if(e.target.classList.contains("labelCheck")){
    let inputCheck = e.target.querySelector("input");
    // 取得想要的值後,再讓它變回應該的狀態
    inputCheck.click();
  }
  if(e.target.classList.contains("spanCheck")){
    let inputCheck = e.target.previousElementSibling;
    // 取得想要的值後,再讓它變回應該的狀態
    inputCheck.click();
  }
});

document.addEventListener("click", function(e){
  
  // checkBox 全選
  if(e.target.classList.contains("allCheckBox")){
    let table = e.target.closest("div.table");
    let theFeedBack = table.querySelector("#feedBack");
    let checkBox = theFeedBack.querySelectorAll("input");

    if(e.target.checked){
      for(let i = 0; i < checkBox.length; i++){
        checkBox[i].checked = true;
      }
    }else{
      for(let i = 0; i < checkBox.length; i++){
        checkBox[i].checked = false;
      }
    }
  }

  // 編輯去抓資料
  if(e.target.classList.contains("editBtn")){
    let editATitle = e.target.closest("div").previousElementSibling.innerText;
    $.post('articleR.php',{editATitle},function(res){
      $('#editArticle').html(res);
      $('#editSummernote').summernote({
        height: 300,
      });
    });
    
    setTimeout(function(){
      editArticleBackAll.classList.add("on");
    }, 100);
  }

  // 點擊上傳圖片的樣式 連動inputFile
  if(e.target.classList.contains("editFileStyle")){
    let editInputFile = e.target.querySelector("input.editInputFile");
    editInputFile.click();
  }

  //編輯內儲存 修改資料
  if(e.target.classList.contains("saveBtn")){
    let editATitleNumber = e.target.closest("div.editArticle").querySelector("p.articleNumber").innerText.slice(6);
    let editArticleName = e.target.closest("div.editArticle").querySelector("input.editArticleTitleName").value;
    let editArticleImage = e.target.closest("div.editArticle").querySelector("p.editPFileName").innerText;
    let editArticleStatus = e.target.closest("div.editArticle").querySelector("select").value;
    let editSummernote = e.target.closest("div.editArticle").querySelector("#editSummernote").value;

    let editArticleNameTag = e.target.closest("div.editArticle").querySelector("input.editArticleTitleName");
    let editFileStyleTag = e.target.closest("div.editArticle").querySelector("div.editFileStyle");
    
    let editCheck = false;
    if(editArticleName == ""){
      swal("專欄名稱不能空白", "", "info");
      editArticleNameTag.classList.add("error");
      return false;
    }else{
      editArticleNameTag.classList.remove("error");
    }
    if(editArticleImage == ""){
      swal("必須要有專欄圖片", "", "info");
      editFileStyleTag.classList.add("error");
      return false;
    }else{
      editFileStyleTag.classList.remove("error");
    }
    if(editSummernote == ""){
      swal("文章內容不能空白", "", "info");
      return false;
    }
    swal("修改成功", "", "success");

    editCheck = true;
    if(editCheck){
      $.post('articleR.php',{editATitleNumber,editArticleName,editArticleImage,editArticleStatus,editSummernote},function(res){
  
      });
    }
  }


  // 下架按鈕 修改專欄狀態
  if(e.target.classList.contains("cancleButton")){
    let inputCheckBox = e.target.closest("main").querySelectorAll("input.checkBox");
    for(let i = 0; i < inputCheckBox.length; i++){
      if(inputCheckBox[i].checked){
        let checkEditArticlName = inputCheckBox[i].closest("div.tr").querySelector("div.aTitle").innerText;
        
        $.post('articleR.php',{checkEditArticlName},function(res){});
      }
    }
    swal("下架成功", "", "success").then((willDelete) => {
      if (willDelete) {
        window.location.reload();
      }
    });
  }

  // 上架按鈕 修改專欄狀態
  if(e.target.classList.contains("putOnButton")){
    let inputCheckBox = e.target.closest("main").querySelectorAll("input.checkBox");
    for(let i = 0; i < inputCheckBox.length; i++){
      if(inputCheckBox[i].checked){
        let putOnArticlName = inputCheckBox[i].closest("div.tr").querySelector("div.aTitle").innerText;
        
        $.post('articleR.php',{putOnArticlName},function(res){});
      }
    }
    swal("上架成功", "", "success").then((willDelete) => {
      if (willDelete) {
        window.location.reload();
      }
    });
  }


});

// php丟近來新的東西只能靠document去抓
document.addEventListener("change", function(e){
  // 抓編輯的inputFile 
  if(e.target.classList.contains("editInputFile")){
    // 抓到p標籤(放在dev裡面顯示image名字的)
    let editPFileName = e.target.nextElementSibling;
    // 清空名字
    editPFileName.innerText = "";
    
    editReadURL(e.target);
    // 抓到圖片檔名
    let fileName = e.target.files[0].name;
    // 寫進去p標籤
    editPFileName.innerText = fileName;
  }
});

function editReadURL(input){
  // 判斷是否有上傳成功
  if(input.files && input.files[0]){
    
    var editReader = new FileReader();
    let editArticleImage = input.closest("div.articleTop").querySelector("div.articleImage");
    

    editReader.addEventListener("load", function(e){
      console.log(editArticleImage);
      // 清空圖片
      editArticleImage.innerHTML = "";
      // 創建img標籤
      let img = document.createElement("img");
      // 在屬性src 加上圖片網路路徑
      img.src = e.target.result;
      // 丟進去要放圖片的區塊
      editArticleImage.appendChild(img);
    });

    editReader.readAsDataURL(input.files[0]);

  }
}


let editArticleBack = document.getElementsByClassName("editArticleBack")[0];
let cancelBack1 = document.getElementsByClassName("cancelBack")[1];
let editArticleBackAll = document.getElementsByClassName("editArticleBackAll")[0];


editArticleBack.addEventListener("click", function(){
  editArticleBackAll.classList.remove("on");
});
cancelBack1.addEventListener("click", function(){
  editArticleBackAll.classList.remove("on");
});




$(document).ready(function() {
  //summernote
  $('#addSummernote').summernote({
    height: 300,
  });
});
