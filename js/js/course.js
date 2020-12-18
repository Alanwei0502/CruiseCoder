$(document).ready(function(){
  var tr = $('tbody tr');
  for (let i = 0; i < tr.length; i++) {
      if (i % 2 === 0) {
          tr[i].style.cssText = 'background-color: #FBF7EB';
      }
  }
  $('button.addButton').click(function(){
      $('div.addBlock').removeClass('addBlockhidden');
      
  })
  $('div.grayBlock').click(function(){
      $('div.addBlock').addClass('addBlockhidden');
  })
  $('img.closeModal').click(function(){
      $('div.addBlock').addClass('addBlockhidden');
  })



  //   $('button.editBtn').click(function(){
  //     $('div.addBlock2').removeClass('addBlockhidden2');
      
  // })
  // $('div.grayBlock2').click(function(){
  //     $('div.addBlock2').addClass('addBlockhidden2');
  // })
  // $('img.closeModal2').click(function(){
  //     $('div.addBlock2').addClass('addBlockhidden2');
  // })

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

// let editBtn = document.getElementsByClassName("editBtn");
// let editBack = document.getElementsByClassName("editBack")[0];
// let cancelBack1 = document.getElementsByClassName("cancelBack")[1];
// let editBackAll = document.getElementsByClassName("editBackAll")[0];
// for(let i = 0; i < editBtn.length; i++){
//   editBtn[i].addEventListener("click", function(){
//     editBackAll.classList.add("on");
//   });
// }
// editBack.addEventListener("click", function(){
//   editBackAll.classList.remove("on");
// });
// cancelBack1.addEventListener("click", function(){
//   editBackAll.classList.remove("on");
// });


// $(document).ready(function(){
//   var tr = $('tbody tr');
//   for (let i = 0; i < tr.length; i++) {
//       if (i % 2 === 0) {
//           tr[i].style.cssText = 'background-color: #FBF7EB';
//       }
//   }
//   $('button.add').click(function(){
//       $('div.addBlock').removeClass('addBlockhidden');
      
//   })
//   $('div.grayBlock').click(function(){
//       $('div.addBlock').addClass('addBlockhidden');
//   })
//   $('img.closeModal').click(function(){
//       $('div.addBlock').addClass('addBlockhidden');
//   })

// });


// let addBtn = document.getElementsByClassName("addButton")[0];
// let addcourseBack = document.getElementsByClassName("addcourseBack")[0];
// let cancelBack = document.getElementsByClassName("cancelBack")[0];
// let addcourseBackAll = document.getElementsByClassName("addcourseBackAll")[0];
// addBtn.addEventListener("click", function(){
//   addcourseBackAll.classList.add("on");
// });
// addcourseBack.addEventListener("click", function(){
//   addcourseBackAll.classList.remove("on");
// });
// cancelBack.addEventListener("click", function(){
//   addcourseBackAll.classList.remove("on");
// });


// let editBtn = document.getElementsByClassName("editBtn");
// let editBack = document.getElementsByClassName("editBack")[0];
// let cancelBack1 = document.getElementsByClassName("cancelBack")[1];
// let editBackAll = document.getElementsByClassName("editBackAll")[0];
// for(let i = 0; i < editBtn.length; i++){
//   editBtn[i].addEventListener("click", function(){
//     editBackAll.classList.add("on");
//   });
// }
// editBack.addEventListener("click", function(){
//   editBackAll.classList.remove("on");
// });
// cancelBack1.addEventListener("click", function(){
//   editBackAll.classList.remove("on");
// });



// // let addBtn = document.getElementsByClassName("addButton")[0];
// // let addcourseBack = document.getElementsByClassName("addcourseBack")[0];
// // let cancelBack = document.getElementsByClassName("cancelBack")[0];
// // let addcourseBackAll = document.getElementsByClassName("addcourseBackAll")[0];
// // // addBtn.addEventListener("click", function(){
// //   addcourseBackAll.classList.add("on");
// // });
// // addcourseBack.addEventListener("click", function(){
// //   addcourseBackAll.classList.remove("on");
// // });
// // cancelBack.addEventListener("click", function(){
// //   addcourseBackAll.classList.remove("on");
// // });


// // let editBtn = document.getElementsByClassName("editBtn");
// // let editBack = document.getElementsByClassName("editBack")[0];
// // let cancelBack1 = document.getElementsByClassName("cancelBack")[1];
// // let editBackAll = document.getElementsByClassName("editBackAll")[0];
// // for(let i = 0; i < editBtn.length; i++){
// //   editBtn[i].addEventListener("click", function(){
// //     editBackAll.classList.add("on");
// //   });
// // }
// // editBack.addEventListener("click", function(){
// //   editBackAll.classList.remove("on");
// // });
// // cancelBack1.addEventListener("click", function(){
// //   editBackAll.classList.remove("on");
// // });







// // $(document).ready(function(){
// //   var tr = $('tbody tr');
// //   for (let i = 0; i < tr.length; i++) {
// //       if (i % 2 === 0) {
// //           tr[i].style.cssText = 'background-color: #FBF7EB';
// //       }
// //   }
// //   $('button.addButton').click(function(){
// //       $('div.addBlock').removeClass('addBlockhidden');
      
// //   })
// //   $('div.grayBlock').click(function(){
// //       $('div.addBlock').addClass('addBlockhidden');
// //   })
// //   $('img.closeModal').click(function(){
// //       $('div.addBlock').addClass('addBlockhidden');
// //   })

// // });

