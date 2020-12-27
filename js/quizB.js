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

                $(".checkRow").prop("checked", false);
                $('#checkAll').prop("checked", false);
            }
        },

        // 下一頁按鈕
        plusPages() {
            if (this.pages.end > this.fields.length) {
                // do nothing
            } else {
                this.pages.start += 5;
                this.pages.end += 5;
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
            // 更改頁籤名稱
            $('.openQuiz').text('新增試題');
            $('.openBadge').text('新增徽章');
            // 顯示彈跳視窗
            $('.quizModalBg').css("opacity", 1).css("z-index", 1);
            // 移除所有新增的題目DOM
            $('div.downQuestion').remove();
            // 顯示預設圖檔
            $('.default').css('display', 'none');
            // 快速上架按鈕
            $('.quickForDemo').css('display', 'inline');
            // 領域改成空值
            $('input.fieldName').val('');
            // 顯示確認新增按鈕
            $('.update').css('display', 'block');
            // 隱藏確認修改按鈕
            $('.editConfirm').css('display', 'none');
            // 清除星球描述
            $('textarea[name="describe"]').val('');
            // 開啟修改功能
            $('#forQuiz').css('pointer-events', 'auto');
            $('#forBadge').css('pointer-events', 'auto');
            // 顯示圖片上傳input
            $('.forImage').css('display', 'block');
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
            // 移除所有新增的題目DOM
            $('div.downQuestion').remove();
            // 隱藏上架按鈕
            $('.quickForDemo').css('display', 'none');
            // 更改頁籤名稱
            $('.openQuiz').text('編輯試題');
            $('.openBadge').text('編輯徽章');
            // 顯示預設圖檔
            $('.default').css('display', 'block');
            // 隱藏確認新增按鈕
            $('.update').css('display', 'none');
            // 隱藏圖片上傳input
            $('.forImage').css('display', 'none');

            // 找出星系編號
            let gNumber = $(e.target).closest('tr').find('.gNumber').text();
            let gNum = $(e.target).closest('tr').find('.gNum').text();
            $('label[for="fieldName"]').attr('data-gnum', gNum);
            // 抓資料庫
            let that = this;
            $.ajax({
                type: 'POST',
                url: 'quizRE.php',
                data: { gNumber },
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    // console.log(res[0][0].gName);
                    // 領域名稱
                    $('input.fieldName').val(res[0][0].gName);
                    // 上下架狀態
                    $('select.onOrOff').val(res[0][0].gStatus);
                    // 題目
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
                    // 計算資料庫比數，並針對題目難度新增對應的空白input
                    for (let i = 0; i < res[1].length; i++) {
                        if (res[1][i].qLevel == "1") {
                            $('.mainEdit[data-level = "1"]').find('.topFunction').after(str);
                            $('.mainEdit[data-level = "1"].downQuestion').eq(i).find('textarea[name="qContent"]').val(res[1][i].qContent);

                        } else if (res[1][i].qLevel == "2") {
                            $('.mainEdit[data-level = "2"]').find('.topFunction').after(str);
                            $('.downQuestion').eq(i).find('textarea[name="qContent"]').val(res[1][i].qContent);
                        } else {
                            $('.mainEdit[data-level = "3"]').find('.topFunction').after(str);
                            $('.downQuestion').eq(i).find('textarea[name="qContent"]').val(res[1][i].qContent);
                        }
                    }
                    // 塞入對應的題目編號至class="contentQ"的自訂屬性data-qNumber
                    for (let i = 0; i < res[1].length; i++) {
                        $('div.contentQ').eq(i).attr('data-qNumber', `${res[1][i].qNumber}`);
                    }
                    // 塞入對應的題目
                    for (let i = 0; i < res[1].length; i++) {
                        $('textarea[name="qContent"]').eq(i).val(`${res[1][i].qContent}`);
                    }
                    // 塞入對應的題目上架狀態
                    for (let i = 0; i < res[1].length; i++) {
                        $('select[name="qState"]').eq(i).val(`${res[1][i].qState}`);
                    }
                    // 塞入對應的選項
                    for (let i = 0; i < res[3].length; i++) {
                        $('textarea[name="sContent"]').eq(i).val(`${res[3][i].sContent}`);
                    }
                    // 塞入對應的選項編號
                    for (let i = 0; i < res[3].length; i++) {
                        $('textarea[name="sContent"]').eq(i).attr('data-snum', `${res[3][i].sNumber}`);
                    }
                    // 塞入對應的答案
                    for (let i = 0; i < res[1].length; i++) {
                        $('select[name="qAnswer"]').eq(i).val(`${res[1][i].qAnswer}`);
                    }
                    // 塞入對應的星球圖
                    for (let i = 0; i < 3; i++) {
                        $('span.iconImg').eq(i).text(`${res[2][i].bIcon}`);
                    }
                    // 塞入對應的徽章圖
                    for (let i = 0; i < 4; i++) {
                        $('span.badgeImg').eq(i).text(`${res[2][i].bBadge}`);
                    }
                    // 塞入對應的背景圖
                    for (let i = 0; i < 3; i++) {
                        $('span.bgImg').eq(i).text(`${res[2][i].bBackground}`);
                    }
                    // 塞入對應的星系圖
                    $('span.iconImgGal').text(`${res[0][0].gImage}`);
                    // 塞入對應的星球介紹
                    for (let i = 0; i < 4; i++) {
                        $('textarea[name="describe"]').eq(i).val(`${res[2][i].bInfo}`);
                    }
                    // 塞入對應的星球編號
                    for (let i = 0; i < 4; i++) {
                        $('section.planetPic').eq(i).attr('data-pNumber', `${res[2][i].bNumber}`);
                    }
                },
            });
            // 開啟modal視窗
            $('.quizModalBg').css("opacity", 1).css("z-index", 1);
            // 關閉修改功能
            $('#forQuiz').css('pointer-events', 'none');
            $('#forBadge').css('pointer-events', 'none');

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
        // demo用的快速輸入神奇小按鈕
        // 新增空題目
        quicktext() {
            for (let i = 0; i < 3; i++) {
                $('button.createQ').eq(i).click();
                $('button.createQ').eq(i).click();
            }
            // 新增題目領域
            $('input.fieldName').val('MySQL');
            // 新增題目內容
            $('textarea[name="qContent"]').eq(0).val('SELECT語句的完整語法較複雜，但至少包括的部分是下列何者？');
            $('textarea[name="qContent"]').eq(1).val('UNIQUE唯一索引的作用是什麼？');
            $('textarea[name="qContent"]').eq(2).val('下列聚合函數中，何者是求數據的總和？');
            $('textarea[name="qContent"]').eq(3).val('在SQL敘述中，可以連結字串的字串函式是那一個？');
            $('textarea[name="qContent"]').eq(4).val('定義欄位的資料型態是INT(4) ZEROFILL時，存入數字9之後會如何顯示？');
            $('textarea[name="qContent"]').eq(5).val('要使用username帳號登入MySQL伺服器端的連線在命令列輸入什麼指令？');
            // 新增題目選項
            $('textarea[name="sContent"]').eq(0).val('SELECT，FROM');
            $('textarea[name="sContent"]').eq(1).val('僅SELECT');
            $('textarea[name="sContent"]').eq(2).val('SELECT，GROUP');
            $('textarea[name="sContent"]').eq(3).val('SELECT，INTO');
            $('textarea[name="sContent"]').eq(4).val('保證各行在該索引上的值都不得重複');
            $('textarea[name="sContent"]').eq(5).val('保證各行在該索引上的值不得為NULL');
            $('textarea[name="sContent"]').eq(6).val('保證參加唯一索引的各列，不得再參加其他的索引');
            $('textarea[name="sContent"]').eq(7).val('保證唯一索引不能被刪除');
            $('textarea[name="sContent"]').eq(8).val('MAX');
            $('textarea[name="sContent"]').eq(9).val('SUM');
            $('textarea[name="sContent"]').eq(10).val('COUNT');
            $('textarea[name="sContent"]').eq(11).val('AVG');
            $('textarea[name="sContent"]').eq(12).val('JOIN');
            $('textarea[name="sContent"]').eq(13).val('CONCAT');
            $('textarea[name="sContent"]').eq(14).val('LENGTH');
            $('textarea[name="sContent"]').eq(15).val('SUBSTRING');
            $('textarea[name="sContent"]').eq(16).val('9');
            $('textarea[name="sContent"]').eq(17).val('9999');
            $('textarea[name="sContent"]').eq(18).val('0009');
            $('textarea[name="sContent"]').eq(19).val('以上皆非');
            $('textarea[name="sContent"]').eq(20).val('mysqld -u username -p，再輸入密碼');
            $('textarea[name="sContent"]').eq(21).val('mysqllogin -u username -p，再輸入密碼');
            $('textarea[name="sContent"]').eq(22).val('mysql -u username -p，再輸入密碼');
            $('textarea[name="sContent"]').eq(23).val('mysql -u再輸入密碼');
            // 新增題目答案
            $('select[name="qAnswer"]').eq(0).val('A');
            $('select[name="qAnswer"]').eq(1).val('A');
            $('select[name="qAnswer"]').eq(2).val('B');
            $('select[name="qAnswer"]').eq(3).val('B');
            $('select[name="qAnswer"]').eq(4).val('C');
            $('select[name="qAnswer"]').eq(5).val('C');
            // 新增星球描述
            $('textarea[name="describe"]').eq(0).val('適合剛學習MySQL的新手，達到標準後，可以獲得此顆星球認證喔！');
            $('textarea[name="describe"]').eq(1).val('若你已經學習MySQL一段時間可以挑戰看看這顆星球，達到標準後，可以獲得此顆星球認證喔！');
            $('textarea[name="describe"]').eq(2).val('若你自詡為MySQL大師，那就來挑戰這顆星球吧！達到標準後，可以獲得此顆星球認證喔！');
            $('textarea[name="describe"]').eq(3).val('當你成功挑戰完所有MySQL的星球關卡，即可獲得MySQL星系徽章！');
        },
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
                        if (res == "success") {
                            swal("已成功新增試題", "", "success").then((value) => {
                                if (value) {
                                    window.location.reload();
                                }
                            });
                        }
                    },
                });

                //取得上傳檔案屬性

                // 星球圖
                let iconPic1 = $('input[name="iconImg"]').eq(0).prop('files')[0];
                let iconPic2 = $('input[name="iconImg"]').eq(1).prop('files')[0];
                let iconPic3 = $('input[name="iconImg"]').eq(2).prop('files')[0];
                let iconPic = [];
                iconPic.push(iconPic1, iconPic2, iconPic3);
                // 徽章圖
                let badgePic1 = $('input[name="badgeImg"]').eq(0).prop('files')[0];
                let badgePic2 = $('input[name="badgeImg"]').eq(1).prop('files')[0];
                let badgePic3 = $('input[name="badgeImg"]').eq(2).prop('files')[0];
                badgePic = [];
                badgePic.push(badgePic1, badgePic2, badgePic3);
                // 背景圖
                let bgPic1 = $('input[name="bgImg"]').eq(0).prop('files')[0];
                let bgPic2 = $('input[name="bgImg"]').eq(1).prop('files')[0];
                let bgPic3 = $('input[name="bgImg"]').eq(2).prop('files')[0];
                let bgPic = [];
                bgPic.push(bgPic1, bgPic2, bgPic3);

                // 星系圖
                let galaxyPic = $('input[name="iconImgGal"]').prop('files')[0];
                // 星系徽章
                let badgePic0 = $('input[name="badgeImg"]').eq(3).prop('files')[0];
                // 建構new FormData()
                let formData = new FormData();
                //把物件加到file後面
                for (let i = 0; i < 3; i++) {
                    formData.append(`iconPic${i + 1}`, iconPic[i]);
                    formData.append(`badgePic${i + 1}`, badgePic[i]);
                    formData.append(`bgPic${i + 1}`, bgPic[i]);
                }
                formData.append('galaxyPic', galaxyPic);
                formData.append('badgePic0', badgePic0);


                // 傳圖片 將圖片放到資料夾內
                $.ajax({
                    url: 'quizRC.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,     //data只能指定單一物件
                    type: 'POST',
                    success: function (data) {
                        console.log(data);
                    }
                });
            } else {
                swal("請填入所有的試題資訊", "", "warning");
            }
        },

        // 確認編輯按鈕
        editConfirm() {
            // 星系編號
            // let gNum = $('label[for="fieldName"]').data('gnum');
            // // 星系名稱
            // let gName = $('input.fieldName').val();
            // // 星系狀態
            // let gStatus = $('select.onOrOff').val();
            // //  星系圖案
            // let uploadImg = $('input[name="iconImgGal"]').val().split("\\");
            // let uploadImgName = uploadImg[(uploadImg.length) - 1];
            // let gImage = $('input[name="iconImgGal"]').val() == "" ? $('span.iconImgGal').text().replace("預設檔案：", '') : uploadImgName;
            // // 星球題目
            // let qNumber = document.getElementsByClassName('contentQ');
            // qNumberArray = [];
            // for (let i = 0; i < qNumber.length; i++) {
            //     qNumberArray.push(qNumber[i].getAttribute('data-qnumber'));
            // }
            // // 星球題目答案
            // let qAnswer = document.querySelectorAll('select[name="qAnswer"]');
            // qAnswerArray = [];
            // for (let i = 0; i < qAnswer.length; i++) {
            //     qAnswerArray.push(qAnswer[i].value);
            // }
            // // 星球題目狀態
            // let qStatus = document.querySelectorAll('select[name="qState"]');
            // qStatusArray = [];
            // for (let i = 0; i < qStatus.length; i++) {
            //     qStatusArray.push(qStatus[i].value);
            // }
            // // 星球選項編號
            // let sNumber = document.querySelectorAll('textarea[name="sContent"]');
            // sNumberArray = [];
            // for (let i = 0; i < sNumber.length; i++) {
            //     sNumberArray.push(sNumber[i].getAttribute('data-snum'));
            // }
            // // 星球選項內文
            // sContentArray = [];
            // for (let i = 0; i < sNumber.length; i++) {
            //     sContentArray.push(sNumber[i].value);
            // }
            // // 徽章描述

            // console.log(gNum, gName, gStatus);
            // console.log(qNumberArray);
            // console.log(qAnswerArray);
            // console.log(qStatusArray);
            // console.log(sNumberArray);
            // console.log(sContentArray);
            // console.log(gImage);
        },
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