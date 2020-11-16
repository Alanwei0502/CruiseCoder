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
    $('#loginWrap').css('display','none');
});

$('.greyGlass').click(function(){//點擊蒙版 關閉login
    $('#loginWrap').css('display','none');
});

$('#member').click(function(){//點擊會員icon  叫出登入燈箱
    $('#loginWrap').css('display','block');
});

