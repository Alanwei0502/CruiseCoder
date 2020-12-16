let articleImage = document.getElementsByClassName("articleImage");
let articleTitle = document.getElementsByClassName("articleTitle")[0];
let articleContent = document.getElementsByClassName("articleContent")[0];
let prePage = document.getElementsByClassName("prePage")[0];
for(let i = 0; i < articleImage.length; i++){
  articleImage[i].addEventListener("click", function(){
    
    let articleh4 = articleImage[i].closest("div.articleInside").querySelector("h4").innerText;
    // console.log(articleh4);
    $.post('articleR.php',{articleh4},function(res){
      $('#feedBack').html(res);
    });

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
