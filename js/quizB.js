// 搜尋區域元件
Vue.component("searchArea", {
    props: ["fields"],
    template: "#searchArea",

    methods: {
        searchField() {
            let selectField = $('.selectField option:selected').val();
            this.$emit('choosed', selectField);
        },
    },

});

// 表格區域元件
Vue.component("tableArea", {
    props: ["fields", "galaxys"],
    template: "#tableArea",
    data() {
        return {
            pages: {
                start: 0,
                end: 5,
            },
            galaxy: [],
        };
    },
    methods: {
        // 上一頁按鈕
        minusPages() {

            if (this.pages.start == 0 && this.pages.end == 5) {
                // do nothing
            } else {
                this.pages.start -= 5;
                this.pages.end -= 5;
                // this.$forceUpdate();
                $(".checkRow").prop("checked", false);
                $('#checkAll').prop("checked", false);
            }
        },
        // 下一頁按鈕
        plusPages() {
            // let totalPage = parseInt(this.fields.length / 5);
            // totalPage += (this.fields.length % 5 == 0) ? 0 : 1;
            if (this.pages.end > this.fields.length) {
                // do nothing
            } else {
                this.pages.start += 5;
                this.pages.end += 5;
                // this.$forceUpdate();
                $(".checkRow").prop("checked", false);
                $('#checkAll').prop("checked", false);
            }
        },
        // 全選或全不選checkbox
        checkAll() {
            if ($('#checkAll').prop("checked")) {
                $(".checkRow").prop("checked", true);
            } else {
                $(".checkRow").prop("checked", false);
            }
        },
        // 快速下架試題
        mutipleOff() {
            let offId = [];
            let checkRow = document.getElementsByClassName('checkRow');
            for (let i = 0; i < checkRow.length; i++) {
                if (checkRow[i].checked) {
                    offId.push(checkRow[i].closest('tr').querySelector('.gNumber').innerText);
                }
            }
            // console.log(offId);
            // let that = this;
            $.ajax({
                type: 'POST',
                url: 'quizRD.php',
                data: { offId },
                // dataType: 'json',
                success: function (res) {
                    // a = JSON.parse(res);
                    // console.log(a);
                    console.log(res);
                    vm.ajax();
                },
            });
        },
        // 新增試題按鈕
        createQuiz() {
            $('.quizModalBg').css("opacity", 1).css("z-index", 1);
        }

    }
});

// 欄位區域元件
Vue.component("tableRow", {
    props: ["galaxys", "pages"],
    template: '#tableRow',
    methods: {
        // 全選或全不選欄位checkbox
        checkOne() {
            let allItems = document.querySelectorAll(".checkRow");
            let checkAll = document.getElementById('checkAll');
            allItems.forEach(function () {
                let itemChecked = document.querySelectorAll(".checkRow:checked");
                if (itemChecked.length == allItems.length) {
                    checkAll.checked = true;
                } else {
                    checkAll.checked = false;
                }

            });
        }
    },
});

// 編輯和新增的彈跳視窗元件
Vue.component("createAndEdit", {
    props: ["fields"],
    template: "#createAndEdit",
    data() {
        return {
            levels: [
                {
                    diff: "初級",
                    qLevel: 1,
                },
                {
                    diff: "中級",
                    qLevel: 2,
                },
                {
                    diff: "高級",
                    qLevel: 3,
                },
                {
                    diff: "星系",
                }

            ],
            newFeildName: '',
        }
    },
    methods: {
        // 新增試題頁籤
        openQuiz() {
            $('.openQuiz').css('background-color', 'white');
            $('.openBadge').css('background-color', ' rgb(251, 247, 235)');
            $("#forQuiz").css('display', 'block');
            $("#forBadge").css('display', 'none');
        },
        // 新增徽章頁籤
        openBadge() {
            $('.openBadge').css('background-color', 'white');
            $('.openQuiz').css('background-color', ' rgb(251, 247, 235)');
            $("#forBadge").css('display', 'block').css('background-color', 'white');
            $("#forQuiz").css('display', 'none');
        },
        // 跳出彈跳視窗按鈕
        closeModal() {
            $('.quizModalBg').css("opacity", 0).css("z-index", -1);
            $('.selectAll').prop("checked", false);
            // let a = $('.downQuestion').has('textarea:empty');
            // console.log(a);
            // textareaNoContent.remove();
            // if(textareaNoContent. == 5){
            // }
        },
        // 新增試題按鈕
        createQ(e) {
            let str = `
                <div class="downQuestion">
                <label class="checkLabel"><input type="checkbox" class="checkForQ"><span></span></label>
                <div class="contentQ">
                <textarea name="qContent[]" placeholder="請輸入題目內容"></textarea>
                <ul>
                    <li>
                    <span>A:</span>
                    <textarea name="sContent[]" placeholder="請輸入選項內容"></textarea>
                    </li>
                    <li>
                    <span>B:</span>
                    <textarea name="sContent[]" placeholder="請輸入選項內容"></textarea>
                    </li>
                    <li>
                    <span>C:</span>
                    <textarea name="sContent[]" placeholder="請輸入選項內容"></textarea>
                    </li>
                    <li>
                    <span>D:</span>
                    <textarea name="sContent[]" placeholder="請輸入選項內容"></textarea>
                    </li>
                </ul>
                </div>
                <div class="ansAndSta">
                <select name="qAnswer[]">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                <select name"qState[]">
                    <option value="1">on</option>
                    <option value="0">off</option>
                </select>
                </div>
                </div>
            `;

            $(e.target).closest('.topFunction').after(str);
        },
        // 刪除試題按鈕
        deleteQ(e) {
            if ($(e.target).closest('.mainEdit').find('.checkForQ').prop("checked")) {
                swal({
                    title: "確定要刪除以勾選的題目",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((value) => {
                    if (value) {
                        let checkedQuestion = $(e.target).closest('.mainEdit').find('.downQuestion').has('.checkForQ:checked');
                        checkedQuestion.remove();
                    }
                });
            }
        },
        // 全選按鈕
        selectAll(e) {
            if ($(e.target).prop("checked")) {
                $(e.target).closest('.mainEdit').find('.checkForQ').prop("checked", true);
            } else {
                $(e.target).closest('.mainEdit').find('.checkForQ').prop("checked", false);
            }
        },
        // 確認新增按鈕
        update() {
            let quizModalBg = document.getElementsByClassName('quizModalBg')[0];
            let fieldName = document.getElementsByClassName('fieldName')[0];
            let
        }
    },
});

// Vue Instance
let vm = new Vue({
    el: '#main',
    data: {
        fields: [],
        status: {
            on: 1,
            off: 0,
        },
        level: [],
        selectField: '%星系%',
        galaxys: [],
    },
    methods: {
        chooseField(selectField) {
            this.selectField = selectField;
            this.ajax();
        },
        ajax() {
            let selectField = this.selectField;
            let that = this;
            $.ajax({
                type: 'POST',
                url: 'quizRS.php',
                data: { selectField },
                dataType: 'json',
                success: function (res) {
                    // vm.galaxys = JSON.parse(res);
                    console.log(res);
                    vm.fields = res[0];
                    for (let i = 0; i < res[1].length; i++) {
                        if (res[1][i].gStatus == 1) {
                            res[1][i].gStatus = "上架";
                        } else {
                            res[1][i].gStatus = "下架";
                        }
                    }
                    vm.galaxys = res[1];
                    // console.log(vm.galaxys);

                },
            });
        },
    },
    created() {
        this.ajax();
    },
});