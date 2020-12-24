// 後台_訂單管理 (Tiffany)
let app = new Vue({
    el: '#app',
    data: {
        order: [],
        orderInvoice: [],
        invlist: [],
        // table的頁數
        items: {
            start: 0,
            end: 5,
        },

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
            // console.log(dateStart);

            let dateEnd = $('#datepicker2').val();
            if (dateEnd == '') {
                dateEnd = '2021/08/20';
            }
            // console.log(dateEnd);
            let oMember = $('#orderNum').val();
            if (oMember == '') {
                oMember = '%';
            }
            // console.log(oMember); //訂單號碼
            let memberNum = $('#memberNum').val();
            if (memberNum == '') {
                memberNum = '%';
            }
            // console.log(memberNum); //會員編號
            // 回到原頁數      
            this.items.start = 0;
            this.items.end = 5;
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
                    // console.log(res);
                    that.order = res;

                }
            });
        },
        viewInvoice(e) {
            let oNumber = $(e.target).closest('.row').find('td.oNumber').text();
            let that = this;
            let vInvoice = 1;
            $.ajax({
                type: 'POST',
                url: 'orderRIn.php',
                data: {
                    vInvoice,
                    oNumber,
                },
                dataType: 'json',
                success: function (res) {
                    // $.that.$forceUpdate();
                    that.orderInvoice = res;
                    // res.oNumber;
                    // console.log(res[0].oNumber); // 殼以這樣寫
                    // console.log(res[0]['oNumber']); // 也殼以這樣寫
                    // console.log(res[0][oNumber]); // 不殼以這樣寫
                    // console.log(res);
                    $('.orderInfo').find('.oNumberIn').text(res[0].oNumber);
                    $('.orderInfo').find('.oDateIn').text(res[0].oDate);
                    $('.orderInfo').find('.mNameIn').text(res[0].mName);
                    $('.orderInfo').find('.rtIn').text(res[0].rt);
                    $('.orderInfo').find('.occIn').text(res[0].occ);
                    $('.orderInfo').find('.oTotalIn').text(res[0].oTotal);

                    // res.forEach((val, index) => {
                    //     that.oNumber = that.orderInvoice[0].oNumber;
                    //     console.log(that.oNumber);
                    // });

                }
            });

            $.ajax({
                type: 'POST',
                url: 'orderRInList.php',
                data: {
                    vInvoice,
                    oNumber,
                },
                dataType: 'json',
                success: function (res) {
                    that.invlist = res;

                    console.log(res);
                }
            });
        },
        // 換頁功能
        lastPage() {
            if (this.items.start == 0 && this.items.end == 5) {
                // 第一頁 不能再往前
            } else {
                this.items.start -= 5;
                this.items.end -= 5;
            }
        },
        nextPage() {
            let order = this.order;

            if (this.items.end >= order.length) {
                // 最後一頁不能再往後
            } else {
                this.items.start += 5;
                this.items.end += 5;
            }
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
            setTimeout(() => {
                $(".orderInfo").addClass("-on");
            }, 100);

        });

        // 點擊按鈕，關閉訂單資訊
        $("img.close").on("click", function () {

            setTimeout(() => {
                $(".orderInfo").removeClass("-on ");
            }, 100);
        });
    });

}

