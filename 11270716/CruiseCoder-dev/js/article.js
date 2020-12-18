let articleImage = document.getElementsByClassName("articleImage")[0];
let articleTitle = document.getElementsByClassName("articleTitle")[0];
let articleContent = document.getElementsByClassName("articleContent")[0];
let prePage = document.getElementsByClassName("prePage")[0];
articleImage.addEventListener("click", function(){
  articleTitle.classList.add("none");
  articleContent.classList.remove("none");
});
prePage.addEventListener("click", function(){
  articleContent.classList.add("none");
  articleTitle.classList.remove("none");
});