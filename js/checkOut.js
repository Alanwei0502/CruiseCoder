//DOM載入完成之後再執行doFirst
window.addEventListener('load', doFirst);

function doFirst() {

    // 刪除購買商品(JS寫法)
    // var close = document.getElementsByClassName("close");
    // for (let i = 0; i < close.length; i++) {
    //     close[i].addEventListener("click", function (e) {
    //         e.preventDefault();
    //         this.closest('div.course').remove();
    //     });
    // };
    //   // 刪除購買商品(jQuery寫法)
    $(document).ready(function () {
        $('i.close').closest('a').click(function (e) {
            e.preventDefault();
            $(this).closest('div.course').remove();
        });
    });

    // ==========付款資料控制==============
    // 手機號碼只能輸入數字
    $('#phone_Num').on('keydown', function (e) {
        if (e.which >= 48 && e.which <= 57 || e.which == 8) { // 8 是刪除鍵
        } else {
            e.preventDefault(); // 停止預設行為(在欄位上出現所打的文字)
        }
    });

    // 卡號輸入四碼後跳到下一欄
    $('.creditCard_Num').on('keyup change', function () {
        if ($(this).val().length > 3) {
            $(this).next().focus();
        }
    });

    //只能輸入數字
    $('.creditCard_Num').on('keydown', function (e) {
        if (e.which >= 48 && e.which <= 57 || e.which == 8) { // 8 是刪除鍵
            if ($(this).val().length == 0 && e.which == 8) {
                if ($(this).prev() != null) {
                    $(this).prev().focus();
                }
            }
        } else {
            e.preventDefault(); // 停止預設行為(在欄位上出現所打的文字)
        }
    });

    //  卡號輸入_控制輸入非英數字元會變成空字串
    var cards = document.getElementsByClassName("creditCard_Num");
    for (let i = 0; i < cards.length; i++) {
        cards[i].addEventListener("keyup", function (e) {
            let str = (e.target.value).replace(/\D/g, "");
            e.target.value = str;
            //取得元素用 e.target.value 或用 this.value
            console.log(str);

        });
    };

    $('#phone_Num').on('keydown', function (e) {
        if (e.which >= 48 && e.which <= 57 || e.which == 8) { // 8 是刪除鍵
        } else {
            e.preventDefault(); // 停止預設行為(在欄位上出現所打的文字)
        }
    });



}



