
// 點擊愛心，加上顏色
$(document).ready(function () {

    $('i.fa-heart').click(function (e) {
        e.preventDefault();//解決冒泡事件
        $(this).toggleClass('is-active');
    })

})

// 頁籤顏色
$(function () {
    $("button.tab").on("click", function () {
        $(this).closest("div").find("button.tab").removeClass("-on");
        $(this).closest("div").find("select.tab").removeClass("-on");
        $(this).addClass("-on");
    });

    $("select.tab").on("change", function () {
        $(this).closest(".category").find("button.tab").removeClass("-on");
        $(this).addClass("-on");
    });
});

