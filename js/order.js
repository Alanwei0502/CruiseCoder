// 後台_訂單管理 (Tiffany)
let app = new Vue({
    el: '#app',
    data: {
        order: [],
    },
    methods: {
        search() {
            // this.ajax();
            let dateStart = $('#datepicker1').val();
            console.log(dateStart);
            let dateEnd = $('#datepicker2').val();
            console.log(dateEnd);
            let oMember = $('#orderNum').val();
            console.log(oMember); //訂單號碼
            let memberNum = $('#memberNum').val();
            console.log(memberNum); //會員編號

            let that = this;
            let member = 1;
            $.ajax({
                type: 'POST',
                url: 'orderR.php',
                data: {
                    member,
                    dateStart,
                    dateEnd,
                    oMember,
                    memberNum,
                },
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    that.order = res;
                    // res.forEach((val, index) => {
                    //     that.order.push(val);
                    //     console.log(that.order);
                    // });
                }
            });
        },
        //     ajax() {
        //         let dateStart = $('#datepicker1').val();
        //         // console.log(dateStart);
        //         let dateEnd = $('#datepicker2').val();
        //         // console.log(dateEnd);
        //         let oMember = $('#orderNum').val();
        //         // console.log(oMember); //訂單號碼
        //         let memberNum = $('#memberNum').val();
        //         // console.log(memberNum); //會員編號

        //         let that = this;
        //         let member = 1;
        //         $.ajax({
        //             type: 'POST',
        //             url: 'orderR.php',
        //             data: {
        //                 member,
        //                 dateStart,
        //                 dateEnd,
        //                 oMember,
        //                 memberNum,
        //             },
        //             dataType: 'json',
        //             success: function (res) {
        //                 res.forEach((res, index) => {
        //                     that.order = res;
        //                     console.log(that.order);
        //                 });
        //             }
        //         });
        //     },
    },
})

window.addEventListener('load', doFirst);
function doFirst() {
    // let dateStart = $('#datepicker1').val();
    // console.log(dateStart);
    // let dateEnd = document.getElementById("datepicker2").value;
    // console.log(dateEnd);



    // $('.orderInfo').hide();

    // 燈箱
    $(function () {
        // 點擊按鈕，開啟訂單資訊
        $("button.view").on("click", function () {
            $(".orderInfo").addClass("-on");

        });

        // 點擊按鈕，關閉訂單資訊
        $("img.close").on("click", function () {

            setTimeout(() => {
                $(".orderInfo").removeClass("-on ");
            }, 100);
        });
    });

}

