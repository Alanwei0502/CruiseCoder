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

    // 卡號欄位輸入四碼後跳到下一欄
    $('.creditCard_Num').on('keyup change', function () {
        if ($(this).val().length > 3) {
            $(this).next().focus();
        }
    });

    //卡號欄位只能輸入數字
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

    // 卡號欄位_控制輸入非英數字元會變成空字串
    var cards = document.getElementsByClassName("creditCard_Num");
    for (let i = 0; i < cards.length; i++) {
        cards[i].addEventListener("keyup", function (e) {
            let str = (e.target.value).replace(/\D/g, "");
            e.target.value = str;
            //取得元素用 e.target.value 或用 this.value
            // console.log(str);
        });
    };



    // 點擊按鈕時，檢查資料有無填寫完整
    // var the_form = document.getElementsByClassName("info");
    $('#submit_Btn').on('click', function (e) {
        let send_data = true;

        // 有無填寫姓名
        if ($('#card_Name').val() == '') {
            $('#card_Name').addClass('-error');
            send_data = false;
        } else {
            $('#card_Name').removeClass('-error');
        }

        // 有無填寫手機號碼、驗證手機號碼格式
        function isPhoneNo(phone) {
            var pattern = /^09\d{8}$/;
            return pattern.test(phone);
        }

        // console.log( isPhoneNo($('#phone_Num').val()) );

        if ($('#phone_Num').val() == '') {
            $('#phone_Num').addClass('-error');
            send_data = false;
        } else {
            if (isPhoneNo($('#phone_Num').val()) == false) {
                $('#phone_Num').addClass('-error');
                send_data = false;

            } else {
                $('#phone_Num').removeClass('-error');
            }
        }


        // 有無填寫背面末三碼
        if ($('#credit_CardCsc').val().length < 3) {
            $('#credit_CardCsc').addClass('-error');
            send_data = false;
        } else {
            $('#credit_CardCsc').removeClass('-error');
        }
        console.log($('#credit_CardCsc').val().length);



        // 驗證信用卡號是否正確
        let creditCard_Str = '';
        for (let i = 0; i < $('.creditCard_Num').length; i++) {
            creditCard_Str += $('.creditCard_Num').eq(i).val();
        }
        console.log(creditCard_Str);

        if (is.creditCard(creditCard_Str)) {
            for (let i = 0; i < $('.creditCard_Num').length; i++) {
                $('.creditCard_Num').eq(i).removeClass("-error");
            }
        } else {
            for (let i = 0; i < $('.creditCard_Num').length; i++) {
                $('.creditCard_Num').eq(i).addClass("-error");
                send_data = false;
            }
        }

        // if (!send_data) {
        //     e.preventDefault();
        // } else {
        //     // send_data = true;
        //     console.log(send_data);
        //     document.info.submit();
        //     $('.success').addClass('-on');
        // }

        if (!send_data) {
            e.preventDefault();
            console.log(send_data);
            $('.failed').addClass('-on');


        } else {
            // send_data = true;
            console.log(send_data);
            // document.info.submit();
            $('.success').addClass('-on');
        }

        // 觸發submit事件，執行下面function
        $('#info').submit(function (e) {
            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    alert(data); // show response from the php script.
                }
            });

            // 停止預設事件，停止轉跳
            e.preventDefault();
        })

        // 點擊按鈕------>前往課程
        $('.go_Course').on('click', function () {
            window.location.href = "course_start_class.php";
        });

        // 點擊按鈕------>留在付款頁面
        $('.go_checkOut').on('click', function () {
            $('.failed').removeClass('-on');
        });

    });
}



