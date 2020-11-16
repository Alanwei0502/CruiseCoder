$(document).ready(function(){
    $('.item1 > button').click(function(){
        $('.upArea').toggleClass('move');
        $('.slideBlock').toggleClass('moveToLeft');
        $('#createForm').toggleClass('createHide');
        $('#loginForm').toggleClass('loginHide');
    });


    $('.item2 > button').click(function(){
        $('.upArea').toggleClass('move');
        $('.slideBlock').toggleClass('moveToLeft');
        $('#createForm').toggleClass('createHide');
        $('#loginForm').toggleClass('loginHide');
    });
});

$('#closeIcon').click(function(){ //點擊close icon 關閉login
    $('.greyGlass').css('display','none');
});

$('.greyGlass').click(function(){//點擊蒙版 關閉login
    $('.greyGlass').css('display','none');
});

$('#member').click(function(){
    $('.greyGlass').css('display','block');
});