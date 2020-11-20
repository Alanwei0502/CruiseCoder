let addBtn = document.getElementsByClassName("addButton")[0];
let addReservationBack = document.getElementsByClassName("addReservationBack")[0];
let cancelBack = document.getElementsByClassName("cancelBack")[0];
addBtn.addEventListener("click", function(){
  addReservationBack.classList.add("on");
});
addReservationBack.addEventListener("click", function(){
  addReservationBack.classList.remove("on");
});
cancelBack.addEventListener("click", function(){
  addReservationBack.classList.remove("on");
});


let editBtn = document.getElementsByClassName("editBtn");
let editBack = document.getElementsByClassName("editBack")[0];
let cancelBack1 = document.getElementsByClassName("cancelBack")[1];
for(let i = 0; i < editBtn.length; i++){
  editBtn[i].addEventListener("click", function(){
    editBack.classList.add("on");
  });
}
editBack.addEventListener("click", function(){
  editBack.classList.remove("on");
});
cancelBack.addEventListener("click", function(){
  editBack.classList.remove("on");
});

