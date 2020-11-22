//checkbox全選功能
var tbody = document.getElementsByTagName('tbody');
var checkbox = tbody[0].querySelectorAll('input');
var checkAll = document.getElementsByClassName('checkAll');

checkAll[0].addEventListener('click', function () {
    if (checkAll[0].checked) {
        for (let i = 0; i < checkbox.length; i++) {
            checkbox[i].checked = true;
        };
    } else {
        for (let i = 0; i < checkbox.length; i++) {
            checkbox[i].checked = false;
        };
    }
});


//table顏色交錯
var tr = tbody[0].querySelectorAll('tr');

for (let i = 0; i < checkbox.length; i++) {
    if (i % 2 === 0) {
        tr[i].style.cssText = 'background-color: #FBF7EB';
    }
}


// 新增試題功能
var addQuiz = document.getElementsByClassName('add');
var quizModalBg = document.getElementsByClassName('quizModalBg');
addQuiz[0].addEventListener('click', function () {
    quizModalBg[0].style.cssText = 'display: block;';
});


//跳出modal視窗，叉叉按鈕
var quizModalBg = document.getElementsByClassName('quizModalBg');
var closeModal = document.getElementsByClassName('closeModal');
closeModal[0].addEventListener('click', function () {
    quizModalBg[0].style.cssText = 'display: none';
});