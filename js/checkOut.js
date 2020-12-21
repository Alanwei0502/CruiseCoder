// var theMember;
//DOM載入完成之後再執行doFirst
// 不要亂刪除我的檔案，拜託，改完要檢查不要爆錯!
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
    // 刪除購買商品(jQuery寫法)
    // 點擊叉叉時，移除商品，並判斷購物車內有無商品
    // $(document).ready(function () {
    //     $('i.close').closest('a').click(function (e) {
    //         e.preventDefault();
    //         $(this).closest('div.course').remove();
    //         // courseNum();
    //     });
    // });

    // 進入購物車時先判斷是否有商品
    // courseNum();


    // ==========付款資料表單格式設定==============
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

    //只能輸入數字、刪除、左右鍵
    // $('.ccpInput').on('keyup', function (e) {
    //     if (e.which >= 48 && e.which <= 57 || e.which == 8 || e.which == 37 || e.which == 39) { //48到57是數字0~9 、8 是刪除鍵、37左、39右
    //         if ($(this).val().length == 0 && e.which == 8) {
    //             if ($(this).prev() != null) {
    //                 $(this).prev().focus();
    //             }
    //         }
    //     } else {
    //         e.preventDefault(); // 停止預設行為(在欄位上出現所打的文字)
    //     }
    // });




    // 點擊「送出」按鈕時，檢查資料有無填寫完整
    $('#submit_Btn').on('click', function (e) {
        //用來判斷資料最後是否要送出
        let send_data = true;

        // 檢查ccPoint填寫金額是否有超出原有ccPoint
        // 取得實際ccPoint
        let ccPointNtMax = $('.ccPoint').attr('data-id');
        // console.log($('.ccPoint').attr('data-id'));

        if (parseInt($('.ccpInput').val()) > parseInt(ccPointNtMax)) {
            send_data = false;
            // $('.ccpInput').val(parseInt(ccPointNtMax));
            app.message = parseInt(ccPointNtMax);
            $('.ccpInput').css('border', 'none');
            console.log($('.ccpInput').val());
            console.log(ccPointNtMax);
            console.log(send_data);
            // alert($('.ccpInput').val());
        } else {
            console.log('hi');
            // $('.ccpInput').css('border', 'none');
        };

        //表格驗證   
        //檢查有無填寫姓名
        if ($('#card_Name').val() == '') {
            $('#card_Name').addClass('-error');
            // swal("QQQQQQQQQQQQ", "", "error");
            send_data = false;
            // return;

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
            // swal("請填寫手機號碼", "", "error");

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
        // console.log($('#credit_CardCsc').val().length);

        // 驗證信用卡號是否正確
        let creditCard_Str = '';
        for (let i = 0; i < $('.creditCard_Num').length; i++) {
            creditCard_Str += $('.creditCard_Num').eq(i).val();
        }
        // console.log(creditCard_Str);

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
            // console.log(send_data);
            // $('.failed').addClass('-on');//顯示交易失敗燈箱
            swal("請再確認資料是否填寫完整", "", "error");

        } else {
            // send_data = true;
            // console.log(send_data);
            $('.success').addClass('-on');//顯示交易完成燈箱
        }

        // 若表格驗證成功(true)，點擊按鈕後觸發submit事件，執行下面function
        $('#info').submit(function (e) {

            var form = $(this);
            var url = form.attr('action');
            // 寫在form標籤裡的 action="./checkOutR.php"
            // setTimeout(() => {

            let theMember = app.theMember;
            let oCard = $('input.oCard').val();
            let oTotal = app.totalPrice;
            let oCC = app.message;
            let courseId = $('div.course');
            let newCcp = parseInt(app.ccp - (oCC * 100));
            console.log(courseId);
            let cNumber = []
            for (let i = 0; i < courseId.length; i++) {
                cNumber.push(courseId.eq(i).attr('data-id'));
            }
            console.log(cNumber);
            let myorder = 1;



            // console.log(list);
            // localStorage.removeItem(list);

            $.ajax({
                // let divText = $('div').text();
                type: "POST",
                url: 'checkOutInsertR.php',
                data: {
                    myorder,
                    theMember,
                    oCard,
                    oTotal,
                    oCC,
                    cNumber,
                    newCcp,
                },
                success: function (data) {
                    // alert(data); // show response from the php script.
                    console.log(data);
                }
            });
            // }, 1000);
            // 停止預設事件，submit預設會跳轉網頁----->停止轉跳
            e.preventDefault();

            // 購買成功後清空localStorage
            localStorage.clear();

        });

        // ======交易完成&交易失敗燈箱的按鈕設定==========
        // 點擊按鈕------>前往課程
        $('.go_Course').on('click', function () {
            window.location.href = "order.php";
        });

        // // 點擊按鈕------>留在付款頁面
        $('.go_checkOut').on('click', function () {
            $('.failed').removeClass('-on');
        });

    });


    //  //===== Vue #app2 ==== 信用卡有效日期下拉選單，vue動態綁定
    new Vue({
        el: '#app2',
        data: {
            years: [2020, 2021, 2022, 2023, 2024],
        },
    });


    //===== Vue #app ===== CCpoint =======
    let app = new Vue({
        el: '#app',
        data: {
            message: 0,
            ccp: 0,
            total: 0,
            totalPrice: 0,
            theMember: '',
        },

        methods: {
            setMessage(e) {
                setTimeout(() => {
                    this.message = parseInt((e.target.value).replace(/\D/g, ""));
                    // .replace(/\D/g, "") 把"非數字"的字元砍掉
                    $(e.target).css('border', 'none');
                    let ccPointNtMax = parseInt($('.ccPoint').attr('data-id'));

                    if (isNaN(this.message)) {
                        this.message = '0';

                    } else {
                        if (parseInt($(e.target).val()) <= ccPointNtMax) {
                            this.message = parseInt(e.target.value);
                            $('.overCcp').text('');
                            return this.message;
                        } else {
                            this.message = ccPointNtMax;
                            // $('.ccpInput').css('border', '2px solid red');
                            // $('.overCcp').text('別做夢了醒醒吧');
                            // $('.ccpInput').val(ccPointNtMax);

                            // console.log($('.ccpInput').val());
                            return this.message;
                        }
                    }
                }, 1000);

            },
            getmember() {
                // 取得會員編號
                getCookie('user');
                let userAccount = getCookie('user');
                let that = this;
                let member = 1;

                $.ajax({
                    type: 'POST',
                    url: 'allCourseMemberR.php',
                    data: {
                        member,
                        userAccount,
                    },
                    dataType: 'json',
                    success: function (res) {
                        res.forEach((res, index) => {
                            that.theMember = res.mNumber;
                            // console.log(that.theMember);
                        });
                    }
                });
            },
        },

        computed: {
            //取得cc.Point
            ccPoint() {
                checkCookie('user');
                getCookie('user');
                // 先確認有無登入，再取值
                if (!checkCookie('user')) {
                    return;
                }
                // 登入判斷

                // this.ccp = parseInt(document.getElementsByClassName('ccp')[0].innerText);
                this.ccp = parseInt($('.ccp').text());

                console.log(this.ccp);
                return this.ccp;


            },

            //將cc.Point轉為現金折抵
            ccPointNt() {
                ccpNt = Math.floor(this.ccp / 100);
                this.message = ccpNt;
                return ccpNt;
            },

        },
        watch: {// 雙向綁定(和v-model功能類似)，監聽data的值

            // 監聽message值，如果有變動的話回執行下列語法
            message() {
                this.totalPrice = this.total - this.message;
                // console.log(this.totalPrice);
            },
            // 監聽total值，如果有變動的話回執行下列語法
            total() {
                this.totalPrice = this.total - this.message;
                // console.log(this.message);
            },
        }
    });


    // ===== Vue.component ===== 
    // Vue.component('my-component', {

    Vue.component('table-component', {
        template: `<div class="course" :data-id="mycnumber">
        <div class="top">
            <div class="left">
                <div class="course_Img">
                    <a href="course_start_class.php">
                        <img :src="myimg" alt="">
                    </a>
                </div>
                <div class="title">
                    <a href="course_start_class.php">
                        {{mytitle}}
                    </a>
                </div>
            </div>
            <a><i class="far fa-times-circle close" @click="removeCourse" ></i></a>
        </div>
        <div class="bottom">
            <p class="type">{{mystatus}}</p>
            <p class="singlePrice" :data-id=myprice >NT$ {{myprice}}</p>
        </div>
        </div>`,
        props: ['mytitle', 'myimg', 'mystatus', 'myprice', 'mycnumber'],
        data() {
            return {
                // myprice:
            };
        },
        methods: {
            removeCourse() {
                $('i.close').closest('a').click(function () {

                    $(this).closest('div.course').remove();

                    // 清除storage
                    let itemId = $(this).closest('div.course').attr('data-id');
                    // console.log(itemId);

                    let list = JSON.parse(localStorage.getItem("lists"));
                    // console.log(list);

                    let list2 = [];

                    for (let i = 0; i < list.length; i++) {
                        if (itemId != list[i]) {
                            list2.push(list[i]);
                        }
                    }
                    // console.log(list2);
                    localStorage.setItem("lists", JSON.stringify(list2));


                    var course = document.getElementsByClassName('course').length;
                    // console.log(course);
                    // console.log(list);
                    if (course == 0 || list.length === 0) {
                        // if (course == 0 || list === []) {
                        $('div.price').css('visibility', 'hidden');
                        $('div.payment').css('visibility', 'hidden');
                        $('div.shoppingList').text('您的購物車內無任何商品').addClass('-on');
                    }
                });
                app.total -= this.myprice;

            },
        },
        mounted() {
            app.total += parseInt(this.myprice);
            // app.total = app.total - app.message;


            // console.log(app.total);
        },
    });


    //===== Vue #app3 ===== 購物車shoppingList =======
    let app3 = new Vue({
        el: '#app3',
        data: {
            course: [], //課程
            status: [], //課程狀態，有4種
        },
        methods: {},
        created() {
            //取出localStorage的value，並將JSON字串轉換成 JavaScript的數值
            let list = JSON.parse(localStorage.getItem("lists"));
            //判斷localStorage是空值，顯示「您的購物車內無任何商品」
            if (list === null || list.length === 0) {
                $('div.price').css('visibility', 'hidden');
                $('div.payment').css('visibility', 'hidden');
                $('div.shoppingList').text('您的購物車內無任何商品').addClass('-on');
                return;
            }
            //Vue裡面的this是指NewVue，所以宣告that是this
            let that = this;
            $.ajax({
                type: "POST",
                // method: "POST",  
                url: "checkOutR.php",

                data: {
                    //封裝的東西丟這邊
                    Name: list,
                },
                dataType: "json",
                //成功
                success: function (response) {
                    response.forEach((res, index) => {
                        that.course.push(res);
                        //課程狀態有4種，用switch case處理
                        switch (res.cStatus) {
                            case '0':
                                that.status.push('下架');
                                break;
                            case '1':
                                that.status.push('已開課');
                                break;
                            case '2':
                                that.status.push('募資');
                                break;
                            case '3':
                                that.status.push('募資');
                                break;
                        }
                    });
                },
                //失敗
                error: function (exception) {
                    alert("發生錯誤: " + exception.status);
                }
            });
            // 取得會員編號
            app.getmember();
        },
    });





    // 檢查某 cookie 是否存在
    function checkCookie(cname) {
        var cookie_value = getCookie(cname);
        if (cookie_value != "") {
            return true;
        } else {
            return false;
        }
    }

    // 取得 cookie 的值
    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    var userAccount = getCookie('user');
}


// 判斷購物車內是否有商品
// function courseNum() {
//     var course = document.getElementsByClassName('course').length;
//     // console.log(course);
//     if (course == 0) {
//         $('div.price').css('visibility', 'hidden');
//         $('div.payment').css('visibility', 'hidden');
//         $('div.shoppingList').text('您的購物車內無任何商品').addClass('-on');
//     }
// };

// 請peggy用push方式將id寫進去localstorage
// 自訂資料寫進去localstorage  
// let list = ['C0001', 'C0002']
// // let list = []


localStorage.clear();
localStorage.setItem("lists", JSON.stringify(list));
// // console.log(list);




