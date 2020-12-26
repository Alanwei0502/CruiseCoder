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

// 檢查某 cookie 是否存在
function checkCookie(cname) {
    var cookie_value = getCookie(cname);
    if (cookie_value != "") {
        return true;
    } else {
        return false;
    }
}

if (!getCookie('user')) {
    window.location.href = 'index.php';
}



let vm = new Vue({
    el: "#infoData",
    data: {
        mAccount: getCookie('user'),
        courses: [],
        FavCourses2: [],
        FavArticles: [],
        mBadges: [],
        allBadges: [],
        memberID: '',
        allGalaxy: [],
        memberInfos: {},
    },
    methods: {
        ajax() {
            let account = this.mAccount;
            let that = this;
            $.ajax({
                type: 'POST',
                url: 'infoR.php',
                data: { account },
                success: function (res) {
                    let allData = JSON.parse(res);
                    console.log(allData);
                    that.courses = allData[0];
                    that.FavArticles = allData[1];
                    that.mBadges = allData[2];
                    that.allBadges = allData[3];
                    that.memberID = allData[4]['mNumber'];
                    that.allGalaxy = allData[5];
                    that.memberInfos = allData[6];
                    that.FavCourses2 = allData[7];

                    // 星星
                    setTimeout(() => {
                        // 一般課程
                        for (let i = 0; i < that.courses.length; i++) {
                            if (that.courses[i].rRate > 0 && (that.courses[i].rRate) % 1 == 0) {

                                for (j = 0; j < Math.floor(that.courses[i].rRate); j++) {
                                    $('a.Main').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                }

                            } else {
                                for (j = 0; j < Math.floor(that.courses[i].rRate); j++) {
                                    $('a.Main').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                    $('a.Main').eq(i).find('.star').find('i').eq(Math.floor(that.courses[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                }
                            }
                        }
                        // 募資課程
                        for (let i = 0; i < that.FavCourses2.length; i++) {
                            if (that.FavCourses2[i].reviewScore > 0 && (that.FavCourses2[i].reviewScore) % 1 == 0) {

                                for (j = 0; j < Math.floor(that.FavCourses2[i].reviewScore); j++) {
                                    $('a.favC').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                }

                            } else {
                                for (j = 0; j < Math.floor(that.FavCourses2[i].reviewScore); j++) {
                                    $('a.favC').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                    $('a.favC').eq(i).find('.star').find('i').eq(Math.floor(that.FavCourses2[i].reviewScore)).attr('class', 'fas fa-star-half-alt yellow');
                                }
                            }
                        }
                    }, 1);

                },
            });
        },
        // 加入收藏
        favorite(e) {
            $(e.target).toggleClass('is-active');
            let theMember = this.memberID;
            let thecNumber = $(e.target).closest('.favorites').data('courseid');
            if (!$(e.target).hasClass('is-active')) {
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
                    success: function (res) { }
                });
            } else {
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
                    success: function (res) { }
                });

            }
            window.location.reload();
        },
        favoriteA(e) {
            $(e.target).toggleClass('is-active');
            let userAccount = getCookie('user');
            let aNumber = $(e.target).closest('.favorites').data('articleid');
            if (!$(e.target).hasClass('is-active')) {
                let that = this;
                let cancel = 0;
                $.ajax({
                    type: 'POST',
                    url: 'articleR.php',
                    data: {
                        userAccount,
                        aNumber,
                        cancel,
                    },
                    dataType: 'text',
                    success: function (res) { }
                });
            } else {
                let that = this;
                let collect = 0;
                $.ajax({
                    type: 'POST',
                    url: 'articleR.php',
                    data: {
                        userAccount,
                        aNumber,
                        collect,
                    },
                    dataType: 'text',
                    success: function (res) { }
                });
            }
            window.location.reload();
        }
    },
    // vue life cycle
    created() {
        this.ajax();
    },
    updated() {
        // 獲得的徽章亮起來
        for (let i = 0; i < this.allBadges.length; i++) {
            for (let j = 0; j < this.mBadges.length; j++) {
                if ($('img.badges').eq(i).data('id') == this.mBadges[j].uBadge) {
                    $('img.badges').eq(i).addClass('getBadge');
                }
            }
        }
        // 進度條
        for (let i = 0; i < $('#infoCourse .progress').length; i++) {
            let people = $('#infoCourse .progress').eq(i).closest('.progressbar').data('people');
            $('#infoCourse .progress').eq(i).css('width', people / 10 * 320);
        }

        for (let i = 0; i < $('.loveCourse_area .progress').length; i++) {
            let people = $('.loveCourse_area .progress').eq(i).closest('.progressbar').data('people');
            $('.loveCourse_area .progress').eq(i).css('width', people / 10 * 320);
        }
        for (i = 0; i < this.allGalaxy.length; i++) {
            if ($(`.little_a img.badges[alt = "${this.allGalaxy[i].gName.replace('星系', '')}初級星球"]`).hasClass('getBadge') && $(`.little_a img.badges[alt = "${this.allGalaxy[i].gName.replace('星系', '')}中級星球"]`).hasClass('getBadge') && $(`.little_a img.badges[alt = "${this.allGalaxy[i].gName.replace('星系', '')}高級星球"]`).hasClass('getBadge')) {

                $(`.big_a img.badges[alt = "${this.allGalaxy[i].gName.replace('星系', '')}星系徽章"]`).addClass('getBadge');
            }
        }


    },

});

$(document).ready(function () {

    //編輯檔案
    $('.editFile').click(function () {
        $('.fa-eye').css('display', 'inline-block');
        $(this).css('display', 'none');
        $('.plusCamera').css('display', 'block');
        $('.input').attr('readonly', false);
        $('.input').eq(3).attr('readonly', true);
        $('.input').eq(1).attr('readonly', true);
        $('.sendBtn').css('display', 'block');

        //欄位點選時會亮橘框
        $('.input').focus(function () {

            $(this).css("border-color", "rgb(252, 201, 59)")
        })

        $('.input').blur(function () {
            $(this).css("border-color", "")
        })

    });


    //確認修改按鈕

    $('.sendBtn').click(function () {
        $('.input').attr('readonly', true);
        $('.sendBtn').css('display', 'none');
    });

    $('.input').keydown(function (e) {
        if (e.which == 32) {
            e.preventDefault();
        }
    });

    //電話號碼判斷不可為空值
    var tel_test = /^09[0-9]{8}$/;
    $(".fone").blur(function () {
        if (tel_test.test($(this).val())) {
            $('.error3').text('')
        } else {
            $('.error3').text('不符合規則，請輸入「09xxxxxxxx」!')
            $(this).css("border-color", "red")
        }
    })

    //名字判斷不可為空值
    $('.name_test').blur(function () {
        if ($(this).val() != '') {
            $('.error4').text('')
        } else {
            $('.error4').text('不符合規則，欄位不可為空!')
            $(this).css("border-color", "red")
        }
    })

    //密碼判斷不可為空值
    var pwd_val = $('.pwd_test').val();
    $('.pwd_test').blur(function () {
        if ($(this).val() != '') {
            $('.error5').text('')
        } else {
            $('.error5').text('不符合規則，欄位不可為空!')
            $(this).css("border-color", "red")
        }
    })

    $('.info_area').on('click', '.plusCamera', function () {
        $('#upload_img').attr('disabled', false);
    });

    $('#upload_img').change(function () {
        // alert('hello');
        readURL(this);
    });

    function readURL(input) {
        // 判斷是否有上傳成功
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.addEventListener("load", function (e) {

                $('.account_pic').html(`<img src="${e.target.result}">`);
            });

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.fa-eye').click(function () {
        //点击眼睛，如果input输入框为为text时执行，并改成password实现隐藏。
        if ($(".pwd_test_1").attr("type") == "text") {
            $(".pwd_test_1").attr("type", "password");
            $(".fa-eye").css("opacity", 0.5)
        }
        //点击眼睛，如果input输入框为password时执行，并改成text实现隐藏。
        else {
            $(".pwd_test_1").attr("type", "text");
            $(".fa-eye").css("opacity", 1)
        }

    })



});





