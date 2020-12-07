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
    // // 刪除購買商品(jQuery寫法)
    // 點擊叉叉時，移除商品，並判斷購物車內有無商品
    $(document).ready(function () {
        $('i.close').closest('a').click(function (e) {
            e.preventDefault();
            $(this).closest('div.course').remove();
            courseNum();
        });
    });

    // 進入購物車時先判斷是否有商品
    courseNum();
    
    


    



    // ==========付款資料表單驗證==============


    // 手機號碼只能輸入數字、刪除、左右鍵
    $('#phone_Num').on('keydown', function (e) {
        if (e.which >= 48 && e.which <= 57 || e.which == 8 || e.which == 37 || e.which == 39) { //48到57是數字0~9 、8 是刪除鍵、37左、39右
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

    //卡號欄位只能輸入數字、刪除、左右鍵
    $('.creditCard_Num').on('keydown', function (e) {
        if (e.which >= 48 && e.which <= 57 || e.which == 8 || e.which == 37 || e.which == 39) { //48到57是數字0~9 、8 是刪除鍵、37左、39右
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


    // 點擊「送出」按鈕時，檢查資料有無填寫完整
    $('#submit_Btn').on('click', function (e) {
        let send_data = true;
        //用來判斷資料最後是否要送出

        // 檢查有無填寫姓名
        if ($('#card_Name').val() == '') {
            $('#card_Name').addClass('-error');
            send_data = false;
        } else {
            $('#card_Name').removeClass('-error');
        }

        // 驗證手機號碼格式
        function isPhoneNo(phone) {
            var pattern = /^09\d{8}$/;
            return pattern.test(phone);
        }
        // console.log( isPhoneNo($('#phone_Num').val()) );

        // 檢查有無填寫手機號碼、
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


        // 檢查有無填寫背面末三碼
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


        if (!send_data) {
            e.preventDefault(); //停止預設行為
            console.log(send_data);
            // $('.failed').addClass('-on');//顯示交易失敗燈箱


        } else {
            // send_data = true;
            console.log(send_data);
            // document.info.submit();
            $('.success').addClass('-on');//顯示交易完成燈箱
        }

        // 若表格驗證成功(true)，點擊按鈕後觸發submit事件，執行下面function
        $('#info').submit(function (e) {
            var form = $(this);
            var url = form.attr('action');
            // 寫在form標籤裡的 action="./checkOutR.php"

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    // alert(data); // show response from the php script.
                }
            });

            // 停止預設事件，submit預設會跳轉網頁----->停止轉跳
            e.preventDefault();
        });

        // ======交易完成&交易失敗燈箱的按鈕設定==========
        // 點擊按鈕------>前往課程
        $('.go_Course').on('click', function () {
            window.location.href = "course_start_class.php";
        });

        // 點擊按鈕------>留在付款頁面
        $('.go_checkOut').on('click', function () {
            $('.failed').removeClass('-on');
        });

    });

    // 信用卡有效日期下拉選單，vue動態綁定
    new Vue({
        el: '#app2',
        data: {
            years: [2020, 2021, 2022, 2023, 2024],
        },
    });


    // ==========CCpoint===============
    new Vue({
        el: '#app',
        data: {
            message: 0,
            ccp: 0,

        },

        methods: {
            setMessage(e) {
                this.message = parseInt(e.target.value);

                if (isNaN(this.message)) {
                    this.message = '';
                } else {
                    return this.message;
                }
            },


            //     if (isNaN(this.message)) {
            //         this.message = '';
            //     } else {
            //         if (this.message <= ccpNt) {
            //             return this.message;
            //         } else {
            //             return ccpNt;
            //         }
            //     }
            // },

        },

        computed: {
            //取得cc.Point
            ccPoint() {
                this.ccp = parseInt(document.getElementsByClassName('ccp')[0].innerText);
                // console.log(ccp);
                return this.ccp;
            },

            //將cc.Point轉為現金折抵
            ccPointNt() {
                ccpNt = Math.floor(this.ccp / 100);
                this.message = ccpNt;
                return ccpNt;
            },
        },
    });


    // 取得課程單價
    let price = $("p.singlePrice");
    let newPrice = 3700;
    price.text(`NT${newPrice}`);
    console.log(`${price.text()}`);

    


}


 // 判斷購物車內是否有商品
function courseNum() {
    var course = document.getElementsByClassName('course').length;
    console.log(course);
    if (course == 0) { 
        $('div.price').css('visibility','hidden');
        $('div.payment').css('visibility','hidden');
        $('div.shoppingList').text('您的購物車內無任何商品').addClass('-on');
    }
};



