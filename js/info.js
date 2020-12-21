let vm = new Vue({
    el: "#infoCourse",
    data: {
        mAccount: "bbb",
        courses: [],
    },
    methods: {
        ajax() {
            let account = this.mAccount;
            let that = this;
            $.ajax({
                type: 'POST',
                url: 'infoCourse.php',
                data: { account },
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    that.courses = res;
                },
            });
        },
    },
    created() {
        this.ajax();
    },
});

$(document).ready(function () {

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


    // console.log(userAccount);

    //編輯檔案
    $('.editFile').click(function () {
        // alert('hi');
        $('.fa-eye').css('display','inline-block');
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

    // $('.orginPic').removeAttr('src');
    // $('.orginPic').attr('src','');

    var upload_img = $('#upload_img');

    $('#upload_img').change(function () {
        // alert('hello');
        readURL(this);
    });

    var account_pic = $('.account_pic');

    function readURL(input) {
        // 判斷是否有上傳成功
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.addEventListener("load", function (e) {
                // 清空圖片
                account_pic[0].innerHTML = "";
                // 創建img標籤
                let img = document.createElement("img");
                // 在屬性src 加上圖片網路路徑
                img.src = e.target.result;
                // 丟進去要放圖片的區塊
                account_pic[0].appendChild(img);
            });

            reader.readAsDataURL(input.files[0]);

        }
    }

    $('.fa-eye').click(function(){
        // $('.pwd_test_1').attr('type','text');
        //点击眼睛，如果input输入框为为text时执行，并改成password实现隐藏。
        if($(".pwd_test_1").attr("type")=="text"){
            $(".pwd_test_1").attr("type","password");
            $(".fa-eye").css("opacity",0.5)
        }
        //点击眼睛，如果input输入框为password时执行，并改成text实现隐藏。
        else{
            $(".pwd_test_1").attr("type","text");
            $(".fa-eye").css("opacity",1)
        }
       
    })





    // $('.sendBtn').click(function(){
    //   let mName = $('.name_test').val();
    //   let PictureName = $('#show_image').val();
    //   let mPhone = $('.fone').val();
    //   let mPassword = $('.pwd_test').val();


    //   // 這裡的userAccount變數，代表是user登入後的帳號，用這個帳號去抓資料
    //   // let userAccount = getCookie('user');

    //   $.ajax({
    //     url:'info_Upload.php',
    //     type:'POST',
    //     dataType:'text',
    //     data:{
    //       mName,
    //       // PictureName,
    //       mPhone,
    //       mPassword,
    //       // userAccount,
    //     },
    //     success(res){
    //       let array = JSON.parse(res);
    //       console.log(array);
    //       // console.log(res);
    //       // window.location.reload();
    //     }
    //   });

    // })

});





