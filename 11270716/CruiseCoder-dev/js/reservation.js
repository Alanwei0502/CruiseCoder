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


let editBtn = document.getElementsByClassName("editBtn");
let editBack = document.getElementsByClassName("editBack")[0];
let cancelBack1 = document.getElementsByClassName("cancelBack")[1];
let editBackAll = document.getElementsByClassName("editBackAll")[0];
for(let i = 0; i < editBtn.length; i++){
  editBtn[i].addEventListener("click", function(){
    editBackAll.classList.add("on");
  });
}
editBack.addEventListener("click", function(){
  editBackAll.classList.remove("on");
});
cancelBack1.addEventListener("click", function(){
  editBackAll.classList.remove("on");
});

