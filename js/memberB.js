let vmMember = new Vue({
    el: "#mainMember",
    data: {
        members: [],
        pages: {
            start: 0,
            end: 5,
        },
        memberInfos: {},
        memberBadges: [],
        memberOrders: [],
        memberTutorials: [],

    },
    methods: {
        // ajax抓資料
        ajax() {
            let allMember = "%%";
            let that = this;
            $.ajax({
                type: 'POST',
                url: 'memberR.php',
                data: { allMember },
                dataType: 'json',
                success: function (res) {

                    that.members = res;
                },
            });
        },

        // 搜尋按鈕
        search() {
            let name = $('input[name="name"]').val().trim();
            let account = $('input[name="account"]').val().trim();
            let level = $('select[name="level"] option:selected').val().trim();
            let datepicker1 = ($('#datepicker1').val() != "") ? $('#datepicker1').val() : "1000/01/01";
            let datepicker2 = ($('#datepicker2').val() != "") ? $('#datepicker2').val() : "3000/01/01";
            let dateStart = datepicker1.split("/").join("");
            let dateEnd = datepicker2.split("/").join("")


            let that = this;
            $.ajax({
                type: 'POST',
                url: 'memberR.php',
                data: { name, account, level, dateEnd, dateStart },
                dataType: 'json',
                success: function (res) {
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
            if (this.pages.end > this.members.length) {
                // do nothing
            } else {
                this.pages.start += 5;
                this.pages.end += 5;
            }
        },

        // 編輯會員資料
        edit(e) {
            let mNumber = $(e.target).closest('td').prevAll(".number").text();
            let that = this;
            $.ajax({
                type: 'POST',
                url: 'memberR.php',
                data: { mNumber },
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    that.memberInfos = res[0][0];
                    that.memberBadges = res[1];
                    that.memberOrders = res[2];
                    that.memberTutorials = res[3];
                },
            });
            $("div.overlay").addClass("-on");
        },

        // 關閉彈跳視窗
        closeEdit() {
            $("div.overlay").removeClass("-on");
        }
    },
    created() {
        this.ajax();
    },
});




// $(function () {

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