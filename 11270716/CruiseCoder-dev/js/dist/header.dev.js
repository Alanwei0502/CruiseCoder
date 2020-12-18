"use strict";

// login的js
$(document).ready(function () {
  $('.item1 > button').click(function () {
    $('.upArea').toggleClass('move');
    $('.slideBlock').toggleClass('moveToLeft');
    $('#createForm').toggleClass('createHide');
    $('#loginForm').toggleClass('loginHide');
    $('.item1 > p').toggleClass('item1Pmove');
    $('.item1 > button').toggleClass('item1Pbotton');
    $('.item2 > p').toggleClass('item2Pmove');
    $('.item2 > button').toggleClass('item2Pbotton');
  });
  $('.item2 > button').click(function () {
    $('.upArea').toggleClass('move');
    $('.slideBlock').toggleClass('moveToLeft');
    $('#createForm').toggleClass('createHide');
    $('#loginForm').toggleClass('loginHide');
    $('.item1 > p').toggleClass('item1Pmove');
    $('.item1 > button').toggleClass('item1Pbotton');
    $('.item2 > p').toggleClass('item2Pmove');
    $('.item2 > button').toggleClass('item2Pbotton');
  });
});
$('#closeIcon').click(function () {
  //點擊close icon 關閉login
  $('#loginWrap').css('display', 'none');
});
$('.greyGlass').click(function () {
  //點擊蒙版 關閉login
  $('#loginWrap').css('display', 'none');
}); // $('#member').click(function(){//點擊會員icon  叫出登入燈箱
//     $('#loginWrap').css('display','block');
// });
// header的js

var shoppingCar = document.getElementsByClassName('shoppingCar')[0];
var label = shoppingCar.querySelector('label');
var section = shoppingCar.querySelector('section');
var input = label.querySelector('input');
var member = document.getElementsByClassName('member')[0];
var labelM = member.querySelector('label');
var ul = member.querySelector('ul');
var inputM = labelM.querySelector('input');
label.addEventListener('mouseup', function () {
  if (!input.checked) {
    section.classList.add('on');
    inputM.checked = false;
    ul.classList.remove('on');
  } else {
    section.classList.remove('on');
  }
});
labelM.addEventListener('mouseup', function () {
  if (!inputM.checked) {
    ul.classList.add('on');
    input.checked = false;
    section.classList.remove('on');
  } else {
    ul.classList.remove('on');
  }
}); // inputM.checked = false;
// ul.classList.remove('on');
// input.checked = false;
// section.classList.remove('on');
// $(window).click(function() { 
//     inputM.checked = false;
//     ul.classList.remove('on');
//     input.checked = false;
//     section.classList.remove('on');
// });