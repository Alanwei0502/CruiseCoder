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

        // 快速上架試題
        mutipleOn() {
            let onId = [];
            let checkRow = document.getElementsByClassName('checkRow');
            for (let i = 0; i < checkRow.length; i++) {
                if (checkRow[i].checked) {
                    onId.push(checkRow[i].closest('tr').querySelector('.gNumber').innerText);
                }
            }
            $.ajax({
                type: 'POST',
                url: 'quizRO.php',
                data: { onId },
                success: function (res) {
                    vm.ajax();
                    $(".checkRow").prop("checked", false);
                    $('#checkAll').prop("checked", false);
                },
            });
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

            $.ajax({
                type: 'POST',
                url: 'quizRO.php',
                data: { offId },
                success: function (res) {
                    vm.ajax();
                    $(".checkRow").prop("checked", false);
                    $('#checkAll').prop("checked", false);
                },
            });
        },

        // 新增試題按鈕
        createQuiz() {
            $('.openQuiz').text('新增試題');
            $('.openBadge').text('新增徽章');
            $('.quizModalBg').css("opacity", 1).css("z-index", 1);
        },

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
        },

        // 編輯試題按鈕
        editQuiz(e) {
            let gNumber = $(e.target).closest('tr').find('.gNumber').text();
            $('.openQuiz').text('編輯試題');
            $('.openBadge').text('編輯徽章');
            let that = this;
            $.ajax({
                type: 'POST',
                url: 'quizRE.php',
                data: { gNumber },
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    console.log(res[0][0].gName);
                    // 領域名稱
                    $('input.fieldName').val(res[0][0].gName);
                    // 上下架狀態
                    $('select.onOrOff').val(res[0][0].gStatus);

                    // // 題目
                    // let str = `
                    //     <div class="downQuestion">
                    //         <label class="checkLabel"><input type="checkbox" class="checkForQ"><span></span></label>
                    //         <div class="contentQ">
                    //             <textarea name="qContent" placeholder="請輸入題目內容"></textarea>
                    //             <ul>
                    //                 <li>
                    //                     <span>A</span>
                    //                     <textarea name="sContent" placeholder="請輸入選項內容"></textarea>
                    //                 </li>
                    //                 <li>
                    //                     <span>B</span>
                    //                     <textarea name="sContent" placeholder="請輸入選項內容"></textarea>
                    //                 </li>
                    //                 <li>
                    //                     <span>C</span>
                    //                     <textarea name="sContent" placeholder="請輸入選項內容"></textarea>
                    //                 </li>
                    //                 <li>
                    //                     <span>D</span>
                    //                     <textarea name="sContent" placeholder="請輸入選項內容"></textarea>
                    //                 </li>
                    //             </ul>
                    //         </div>
                    //         <div class="ansAndSta">
                    //             <select name="qAnswer">
                    //                 <option value="A">A</option>
                    //                 <option value="B">B</option>
                    //                 <option value="C">C</option>
                    //                 <option value="D">D</option>
                    //             </select>
                    //             <select name="qState">
                    //                 <option value="1">on</option>
                    //                 <option value="0">off</option>
                    //             </select>
                    //         </div>
                    //     </div>
                    // `;
                    // // 針對題目難度新增對應的空白input
                    // // 將對應的題目塞入空白input
                    // for (let i = 0; i < res[1].length; i++) {
                    //     if (res[1][i].qLevel == "1") {
                    //         $('.mainEdit[data-level = "1"]').find('.topFunction').after(str);
                    //         $('.mainEdit[data-level = "1"].downQuestion').eq(i).find('textarea[name="qContent"]').val(res[1][i].qContent);

                    //     } else if (res[1][i].qLevel == "2") {
                    //         $('.mainEdit[data-level = "2"]').find('.topFunction').after(str);
                    //         $('.downQuestion').eq(i).find('textarea[name="qContent"]').val(res[1][i].qContent);
                    //     } else {
                    //         $('.mainEdit[data-level = "3"]').find('.topFunction').after(str);
                    //         $('.downQuestion').eq(i).find('textarea[name="qContent"]').val(res[1][i].qContent);
                    //     }
                    // }
                },
            });
            $('.quizModalBg').css("opacity", 1).css("z-index", 1);
        },
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
                    qLevel: "1",
                },
                {
                    diff: "中級",
                    qLevel: "2",
                },
                {
                    diff: "高級",
                    qLevel: "3",
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

        },

        // 新增試題按鈕
        createQ(e) {
            let str = `
                <div class="downQuestion">
                    <label class="checkLabel"><input type="checkbox" class="checkForQ"><span></span></label>
                    <div class="contentQ">
                        <textarea name="qContent" placeholder="請輸入題目內容"></textarea>
                        <ul>
                            <li>
                                <span>A</span>
                                <textarea name="sContent" placeholder="請輸入選項內容"></textarea>
                            </li>
                            <li>
                                <span>B</span>
                                <textarea name="sContent" placeholder="請輸入選項內容"></textarea>
                            </li>
                            <li>
                                <span>C</span>
                                <textarea name="sContent" placeholder="請輸入選項內容"></textarea>
                            </li>
                            <li>
                                <span>D</span>
                                <textarea name="sContent" placeholder="請輸入選項內容"></textarea>
                            </li>
                        </ul>
                    </div>
                    <div class="ansAndSta">
                        <select name="qAnswer">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        <select name="qState">
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
                        $(e.target).closest('.topFunction').find('.selectAll').prop("checked", false);
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

            let fieldName = $('.fieldName').val() + "星系";

            // 加到galaxy table
            let newGalaxy = [];
            let gName = $('input[name="iconImgGal"]').val().split("\\");
            let gImage = gName[(gName.length - 1)];
            let onOrOff = $('.onOrOff').val();
            newGalaxy.push(fieldName, gImage, onOrOff);


            // 加到quiz table
            let quiz = [];
            let question = [];
            let level = [];
            let ans = [];
            let status = [];
            let bgImg = [];


            // 題目
            $('textarea[name="qContent"]').each(function () {
                question.push($(this).val());
            });
            // 等級
            $('textarea[name="qContent"]').each(function () {
                level.push($(this).closest(".mainEdit").data("level"));
            });
            // 答案
            $('select[name="qAnswer"]').each(function () {
                ans.push($(this).val());
            });
            // 狀態
            $('select[name="qState"]').each(function () {
                status.push($(this).val());
            });
            // 背景
            $('input[name="bgImg"]').each(function () {
                let filePath = $(this).val().split("\\");
                let fileName = filePath[(filePath.length - 1)];
                bgImg.push(fileName);
            });

            quiz.push(fieldName, level, question, ans, status, bgImg);


            // 加到selection table
            let options = [];
            let sContent = [];
            let selections = [];

            // 選項
            $('textarea[name="sContent"]').each(function () {
                options.push($(this).prev('span').text());
            });
            // 選項文字
            $('textarea[name="sContent"]').each(function () {
                sContent.push($(this).val());
            });

            selections.push(options, sContent);

            // 加到badge table
            let badge = [];
            let bGalaxyName = [];
            let bPlanetName = [];
            let pImg = [];
            let bImg = [];
            let backgroundImg = [];
            let describe = [];

            // 星系名稱
            bGalaxyName.push($('.fieldName').val());
            // 星球名稱
            $('section.planetPic').each(function () {
                bPlanetName.push($(this).find('p').text());
            });
            // 星球圖片
            $('input[name="iconImg"]').each(function () {
                let filePath = $(this).val().split("\\");
                let fileName = filePath[(filePath.length - 1)];
                pImg.push(fileName);
            });
            pImg.push('');
            // 徽章圖片
            $('input[name="badgeImg"]').each(function () {
                let filePath = $(this).val().split("\\");
                let fileName = filePath[(filePath.length - 1)];
                bImg.push(fileName);
            });
            // 背景圖片
            $('input[name="bgImg"]').each(function () {
                let filePath = $(this).val().split("\\");
                let fileName = filePath[(filePath.length - 1)];
                backgroundImg.push(fileName);
            });
            backgroundImg.push('');
            // 試煉介紹
            $('textarea[name="describe"]').each(function () {
                describe.push($(this).val());
            });

            badge.push(bGalaxyName, bPlanetName, describe, pImg, bImg, backgroundImg);

            // 確認所有欄位都填寫完畢
            let mustFill = [];
            mustFill.push($('.quizModal textarea, .quizModal input[type != "checkbox"]'));
            let mustFillArray = mustFill[0];
            let empty = [];
            for (let i = 0; i < mustFillArray.length; i++) {
                if (mustFillArray[i].value == '') {
                    empty.push(mustFillArray[i]);
                }
            }
            if (empty.length == 0) {
                console.log(badge);
                $.ajax({
                    type: 'POST',
                    url: 'quizRC.php',
                    data: { newGalaxy, quiz, selections, badge },
                    success: function (res) {
                        console.log(res);
                        if (res == "success") {
                            swal("已成功新增試題", "", "success").then((value) => {
                                if (value) {
                                    window.location.reload();
                                }
                            });
                        }
                    },
                });

                let fileData = $('#imgInp').prop('files')[0];   //取得上傳檔案屬性
                let formData = new FormData();  // 建構new FormData()
                formData.append('file', fileData);  //把物件加到file後面
                // 傳圖片 將圖片放到資料夾內
                $.ajax({
                    url: 'quizRC.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,     //data只能指定單一物件
                    type: 'POST',
                    success: function (data) { }
                });
            } else {
                swal("請填入所有的試題資訊", "", "warning");
            }
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
        quizNum: 0,
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
                    vm.quizNum = parseInt(res[2].num);
                },
            });
        },
    },
    created() {
        this.ajax();
    },
});