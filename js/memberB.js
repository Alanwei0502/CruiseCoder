let vmMember = new Vue({
    el: "#mainMember",
    data: {
        members: [],
        pages: {
            start: 0,
            end: 5,
        },

    },
    methods: {
        // ajax抓資料
        ajax() {
            let allMember = "%%";
            let that = this;
            $.ajax({
                type: 'POST',
                url: 'memberB.php',
                data: { allMember },
                dataType: 'json',
                success: function (res) {
                    // console.log(res);

                    that.members = res;

                },
            });
        },
        // 搜尋按鈕
        search() {
            let name = $('input[name="name"]').val();
            let account = $('input[name="account"]').val();
            let level = $('select[name="level"] option:selected').val();
            // console.log(name, account, level);
            name = "" ? "%%": name;

            let that = this;
            $.ajax({
                type: 'POST',
                url: 'memberB.php',
                data: { name, account, level },
                dataType: 'json',
                success: function (res) {
                    // console.log(res);

                    that.members = res;

                },
            });

        },
        // 上一頁按鈕
        minusPages() {

            if (this.pages.start == 0 && this.pages.end == 5) {
                // do nothing
            } else {
                this.pages.start -= 5;
                this.pages.end -= 5;
            }
        },

        // 下一頁按鈕
        plusPages() {
            // let totalPage = parseInt(this.fields.length / 5);
            // totalPage += (this.fields.length % 5 == 0) ? 0 : 1;
            if (this.pages.end > this.members.length) {
                // do nothing
            } else {
                this.pages.start += 5;
                this.pages.end += 5;
            }
        },
    },
    created() {
        this.ajax();
    },
});




// $(function () {

//     // 開啟 Modal 彈跳視窗
//     $(".btn_modal").on("click", function () {
//         $("div.overlay").addClass("-on");
//     });

//     // 關閉 Modal
//     $("div.closeBtn_").on("click", function () {
//         $("div.overlay").removeClass("-on");

//     });

// });

// $("#gansss").change(function () {
//     let checkValue = $("#gansss").val();
//     if (checkValue == 2) {
//         $('.teacherTextarea').css("display", "block");
//         $('.badge_table').css("display", "none");
//         $('.orderDetail_table').css("display", "none");
//         $('.courseDetail_table').css("display", "none");

//     } else {
//         $('.teacherTextarea').css("display", "none");
//         $('.badge_table').css("display", "block");
//         $('.orderDetail_table').css("display", "block");
//         $('.courseDetail_table').css("display", "block");
//     }
// });