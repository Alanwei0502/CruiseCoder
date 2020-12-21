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


let articleImage = document.getElementsByClassName("articleImage");
let articleTitle = document.getElementsByClassName("articleTitle")[0];
let articleContent = document.getElementsByClassName("articleContent")[0];
let prePage = document.getElementsByClassName("prePage")[0];
for(let i = 0; i < articleImage.length; i++){
  articleImage[i].addEventListener("click", function(){
    
    let articleh4 = articleImage[i].closest("div.articleInside").querySelector("h4").innerText;
    // 使用者有登入會員,要確定使用者有無收藏過
    if(checkCookie('user')){
      $.post('articleR.php',{articleh4 ,userAccount},function(res){
        $('#feedBack').html(res);
      });
    }else{
      $.post('articleR.php',{articleh4},function(res){
        $('#feedBack').html(res);
      });
    }

    articleTitle.classList.add("none");
    articleContent.classList.remove("none");
  });

}
prePage.addEventListener("click", function(){
  articleContent.classList.add("none");
  articleTitle.classList.remove("none");
});



$(document).ready(function(){
  // 模糊搜尋功能
  $("input.search").keyup(function(e){
    let articleName = $(this).val();
    let articleInside = $(".articleInside");
    let articleh4 = articleInside.children("h4");

    if(articleName!=""){
      for(i = 0; i < articleInside.length; i++){
        if(articleh4[i].innerText.includes(articleName)){
          articleh4[i].closest("div.articleInside").classList.remove("none");
        }else{
          articleh4[i].closest("div.articleInside").classList.add("none")
        }
      }
    }else{
      for(i = 0; i < articleInside.length; i++){
        articleh4[i].closest("div.articleInside").classList.remove("none");   
      }
    }
  });
});

// 收藏功能
document.addEventListener("click", function(e){
  if(e.target.classList.contains("fas")){
    if(checkCookie('user')){
      if(e.target.classList.contains("collected")){
        e.target.classList.remove("collected");
        // 取消收藏
        let aNumber = e.target.getAttribute("data-anumber");
        let cancel = 0;
        $.post("articleR.php", {cancel, aNumber, userAccount}, function(res){});
      }else{
        // 加入收藏
        e.target.classList.add("collected");
        let aNumber = e.target.getAttribute("data-anumber");
        let collect = 0;
        $.post("articleR.php", {collect, aNumber, userAccount}, function(res){});
      }
    }else{
      swal("請先登入會員!", "登入會員才有辦法收藏文章唷!", "error");
    }
  }
  // 點擊收藏文章也要可以收藏
  if(e.target.classList.contains("collectText")){
    if(checkCookie('user')){
      let heart = e.target.nextElementSibling;
      if(heart.classList.contains("collected")){
        heart.classList.remove("collected");
        // 取消收藏
        let aNumber = heart.getAttribute("data-anumber");
        let cancel = 0;
        $.post("articleR.php", {cancel, aNumber, userAccount}, function(res){});
      }else{
        // 加入收藏
        heart.classList.add("collected");
        let aNumber = heart.getAttribute("data-anumber");
        let collect = 0;
        $.post("articleR.php", {collect, aNumber, userAccount}, function(res){});
      }
    }else{
      swal("請先登入會員!", "登入會員才有辦法收藏文章唷!", "error");
    }
  }
});

// 判斷如果首頁過來有傳值 要直接點集專欄文章
let theTitle = document.getElementsByClassName("articleTitle")[0];
if(theTitle.classList.contains("checkGet")){
  let clickTitle = theTitle.getAttribute("data-thetitle");
  for(let i = 0; i < articleImage.length; i++){
    let clicked = articleImage[i].closest("div.articleInside").querySelector("h4").innerText;
    if(clickTitle == clicked){
      articleImage[i].click();
    }
  }
}