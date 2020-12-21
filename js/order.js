// 後台_訂單管理 (Tiffany)
let app = new Vue({
    el: '#app',
    data: {
        order: [],
    },
    created() {
        this.search();
    },
    methods: {
        search() {
            // this.ajax();
            let dateStart = $('#datepicker1').val();
            if (dateStart == '') {
                dateStart = '2020/01/01';
            }
            console.log(dateStart);

            let dateEnd = $('#datepicker2').val();
            if (dateEnd == '') {
                dateEnd = '2021/08/20';
            }
            console.log(dateEnd);
            let oMember = $('#orderNum').val();
            if (oMember == '') {
                oMember = '%';
            }
            console.log(oMember); //訂單號碼
            let memberNum = $('#memberNum').val();
            if (memberNum == '') {
                memberNum = '%';
            }
            console.log(memberNum); //會員編號

            let that = this;
            let member = 1;
            // that.order.splice(0, that.order.length);
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
        viewInvoice(e) {
            let oDate = $(e.target).closest('.row').find('td.oDate').text();
            console.log(oDate);
            let oNumber = $(e.target).closest('.row').find('td.oNumber').text();
            console.log(oNumber);
            let oMemberIn = $(e.target).closest('.row').find('td.oMember').text();
            console.log(oMemberIn);
            let oTotal = $(e.target).closest('.row').find('td.oTotal').text();
            console.log(oTotal);
            let that = this;
            let vInvoice = 1;
            //     $.ajax({
            //         type: 'POST',
            //         url: 'orderR.php',
            //         data: {
            //             vInvoice,
            //             oDate,
            //             oNumber,
            //             oMemberIn,
            //             oTotal,
            //         },
            //         dataType: 'json',
            //         success: function (res) {
            //             console.log(res);
            //             that.order = res;
            //             // res.forEach((val, index) => {
            //             //     that.order.push(val);
            //             //     console.log(that.order);
            //             // });
            //         }
            //     });
        },

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

