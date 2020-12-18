
// 點擊愛心，加上顏色
$(document).ready(function () {

    $('i.fa-heart').click(function () {
        $(this).toggleClass('is-active');
    })

})

// 頁籤顏色
$(function () {
    $("button.tab").on("click", function () {
        $(this).closest("div").find("button.tab").removeClass("-on");
        $(this).addClass("-on");

    });
});