
// vue
let app = new Vue({
    el: '#feedBack',
    data: {
        courses: [],
        favCourse: [],
        theMember: '',

    },
    // ajax抓資料
    created() {
        // alert('氣死我了');
        this.ajax();
        this.getmember();
        this.getFavCourse();
    },

    methods: {
        ajax() {
            let that = this;
            let star = 1;
            $.ajax({
                type: 'POST',
                url: 'allCourseR.php',
                data: { star },
                dataType: 'json',
                success: function (res) {
                    // console.log(res);
                    that.courses = res;
                }
            });
        },
        getmember() {
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
        getFavCourse() {
            //取得收藏的課程
            let that = this;
            setTimeout(function () {
                let member2 = that.theMember;
                let member = 1;

                $.ajax({
                    type: 'POST',
                    url: 'findFavCourseR.php',
                    data: {
                        member,
                        member2,
                    },
                    dataType: 'json',
                    success: function (res) {
                        let arr = [];
                        $(res).each(function (index, item) {
                            let theClass = item.cTitle;
                            arr.push(theClass);
                        });
                        that.favCourse = arr;
                        // console.log(arr);



                        $('p.title').each(function (index, val) {
                            // for迴圈寫法
                            // for (let i = 0; i < arr.length; i++){                                
                            //     if ($(val).text() == arr[i])  {
                            //         console.log($(val));
                            //         $(val).parent('div').prev('div').find('i').addClass('is-active');
                            //     }
                            // }
                            // each迴圈寫法
                            $(arr).each(function (index, value) {
                                if ($(val).text() == value) {
                                    // console.log($(val));
                                    $(val).parent('div').prev('div').find('i').addClass('is-active');
                                }
                            });
                        });


                    }
                });
            }, 500);
        },
        clearFav() { 
            // 先清除所有的愛心
            let faheart = document.querySelectorAll('.fa-heart');
            // console.log(faheart);
            // 如果class有is-active，移除所有的is-active的class
            faheart.forEach((e, i) => {
                if (e.classList.contains("is-active")) {
                    e.classList.remove("is-active")
                }
            });
        },
        allOpen() {
            // 載入所有課程
            this.ajax();
            $(".course").show();
            //  將select option回到預設-課程類型
            $('#SelectId')[0].selectedIndex = 0;
            this.clearFav();
            this.getFavCourse()
            
        },
        fundingOpen() {
            //載入募資課程
            let that = this;
            let star = 1;
            $.ajax({
                type: 'POST',
                url: 'allCourseR.php',
                data: { star },
                dataType: 'json',
                success: function (res) {
                    let resFund = [];
                    res.forEach(function (item, index) {
                        if (item.cStatus === "3") {
                            resFund.push(item);
                        };
                    });
                    that.courses = resFund;
                    // console.log(that.courses);
                }
            });

            // 將select option回到預設-課程類型
            $('#SelectId')[0].selectedIndex = 0;
            this.clearFav();
            // let faheart = document.querySelectorAll('.fa-heart');
            // faheart.forEach((e, i) => {
            //     if (e.classList.contains("is-active")) {
            //         e.classList.remove("is-active")
            //     }
            // });
            this.getFavCourse()
        },
        type() {
            if ($(".tab option:selected").val() == 'html') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "html") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                    }
                });
                this.clearFav();
                this.getFavCourse()
            }
            else if
                ($(".tab option:selected").val() == 'css') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "css") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                    }
                });
                this.clearFav();
                this.getFavCourse()
            }
            else if ($(".tab option:selected").val() == 'js') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "js") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                    }
                });
                this.clearFav();
                this.getFavCourse()
            }
            else if ($(".tab option:selected").val() == 'jquery') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "jquery") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                    }
                });
                this.clearFav();
                this.getFavCourse()
            }
            else if ($(".tab option:selected").val() == 'sass') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "sass") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                    }
                });
                this.clearFav();
                this.getFavCourse()
            }
            else if ($(".tab option:selected").val() == 'php') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "php") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                    }
                });
                this.clearFav();
                this.getFavCourse()
            }
            else if ($(".tab option:selected").val() == 'mysql') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "mysql") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                    }
                });
                this.clearFav();
                this.getFavCourse()
            }
            else if ($(".tab option:selected").val() == 'vue') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "vue") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                    }
                });
            }
            this.clearFav();
                this.getFavCourse()
        },
        // // 點擊愛心，加上顏色
        favorites(e) {
            checkCookie('user');
            getCookie('user');
            // let userAccount = getCookie('user');
            // this.theMember = userAccount;
            // console.log(this.theMember);
            // 先判斷有無登入，沒有登入就會return
            if (!checkCookie('user')) {
                // $('.loginWrap').css('display', 'block');
                $('.logout').css('display', 'none');
                $('.callLoginBox').css('display', 'block');
                $('#loginWrap').css('display', 'block');

                $('#closeIcon').click(function () { //點擊close icon 關閉login
                    $('#loginWrap').css('display', 'none');
                });

                $('.greyGlass').click(function () {//點擊蒙版 關閉login
                    $('#loginWrap').css('display', 'none');
                });
                return;
            }

            let faheart = document.getElementsByClassName('fa-heart');
            let courseTitle = $(e.target).closest('div').next('div').find('p.title').text();
            // console.log(courseTitle);

            e.target.classList.toggle('is-active');

            if (!$(e.target).hasClass('is-active')) {

                // e.target.classList.toggle('is-active');

                // console.log('愛心');
                this.courses.forEach(function (item) {

                    if (item.cTitle == courseTitle) {
                        // resFund.push(item);
                        // 取得會員編號
                        // let theMember = 'M0002';
                        let theMember = app.theMember;

                        let thecNumber = item.cNumber;
                        console.log(thecNumber);

                        let that = this;
                        let heart = 1;
                        $.ajax({
                            type: 'POST',
                            url: 'favoritecDelR.php',
                            data: {
                                heart,
                                thecNumber,
                                theMember,
                            },
                            dataType: 'text',
                            success: function (res) {
                                // console.log(res);
                            }
                        });
                    };
                });
            } else {
                // e.target.classList.toggle('is-active');

                this.courses.forEach(function (item) {

                    if (item.cTitle == courseTitle) {
                        // resFund.push(item);
                        // 取得會員編號
                        // let theMember = 'M0002';
                        let theMember = app.theMember;
                        let thecNumber = item.cNumber;
                        let that = this;
                        let heart = 1;
                        $.ajax({
                            type: 'POST',
                            url: 'favoritecR.php',
                            data: {
                                heart,
                                thecNumber,
                                theMember,
                            },
                            dataType: 'text',
                            success: function (res) {
                                // console.log(res);
                            }
                        });
                    };
                });
            }

            // console.log($(e.target).closest('div').next('div').find('p.title').text());
            // console.log($('.course'));
            // console.log($('div.favorites'));
            // let cNumber = item.cNumber;
            // console.log(cNumber);
        },
    },

});


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
// console.log(userAccount);
// console.log(checkCookie('user'));