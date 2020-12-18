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

let editBtn = document.getElementsByClassName("editBtn");
let editArticleBack = document.getElementsByClassName("editArticleBack")[0];
let cancelBack1 = document.getElementsByClassName("cancelBack")[1];
let editArticleBackAll = document.getElementsByClassName("editArticleBackAll")[0];
for(let i = 0; i < editBtn.length; i++){
  editBtn[i].addEventListener("click", function(){
    editArticleBackAll.classList.add("on");
  });
}
editArticleBack.addEventListener("click", function(){
  editArticleBackAll.classList.remove("on");
});
cancelBack1.addEventListener("click", function(){
  editArticleBackAll.classList.remove("on");
});
