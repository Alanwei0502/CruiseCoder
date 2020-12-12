
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

Vue.component("tableArea", {
    props: ["fields", "galaxys", "pages"],
    template: "#tableArea",
    data() {
        return {
            pages: [0, 5],
        };
    },
    watch: {
        pages(newVal, oldVal) {
            console.log(newVal, oldVal);
        }
    },
    methods: {
        minusPages() {

            if (this.pages[0] == 0 && this.pages[1] == 5) {
                // do nothing
            } else {
                this.pages[0] -= 5;
                this.pages[1] -= 5;
                this.$forceUpdate();
                // pages.forEach(function (value, index) {
                //     value -= 5;
                // });
                // doNothing();
            }
        },
        plusPages() {
            // let totalPage = parseInt(this.fields.length / 5);
            // totalPage += (this.fields.length % 5 == 0) ? 0 : 1;
            if (this.pages[1] > this.fields.length) {
                // do nothing
            } else {
                this.pages[0] += 5;
                this.pages[1] += 5;
                this.$forceUpdate();
                // pages.forEach(function (value, index) {
                //     value += 5;
                // });
                // doNothing();
            }
        },
    }
});

Vue.component("tableRow", {
    props: ["galaxys", "pages"],
    template: '#tableRow',
    methods: {
        // doNothing() {
        //     let doNothing = this.pages;
        // },
        // rowColor() {
        //     for (let i = 0; i < galaxys.length; i++) {
        //         if (i % 2 === 0) {
        //             $('tr').eq(i).style.cssText = 'background-color: #FBF7EB';
        //         }
        //     }
        // }
    },
});



let vm = new Vue({
    el: '#main',
    data: {
        fields: [],
        status: {
            on: 1,
            off: 0,
        },
        selectField: '%星系%',
        galaxys: [],
        pages: [0, 5],
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
                url: 'quizR.php',
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





// 一堆功能
let tbody = document.getElementsByTagName('tbody')[0];
let checkbox = tbody.querySelectorAll('input');
let checkAll = document.getElementsByClassName('checkAll')[0];
let tr = tbody.querySelectorAll('tr');
let addQuiz = document.getElementsByClassName('add')[0];
let quizModalBg = document.getElementsByClassName('quizModalBg')[0];
let closeModal = document.getElementsByClassName('closeModal')[0];
let off = document.getElementsByClassName('off')[0];
let quizLevel = document.getElementsByClassName('quizLevel')[0];
let mainEdit = document.getElementsByClassName('mainEdit')[0];
let createQ = document.getElementsByClassName('createQ')[0];
let topFunction = document.getElementsByClassName('topFunction')[0];
let selectAll = document.getElementsByClassName('selectAll')[0];
let deleteQ = document.getElementsByClassName('deleteQ')[0];
let quizField = document.getElementsByClassName('quizField')[0];
let createField = document.getElementsByClassName('createField')[0];
let newField = document.getElementsByClassName('newField')[0];


//checkbox全選功能
checkAll.addEventListener('click', function () {
    if (checkAll.checked) {
        for (let i = 0; i < checkbox.length; i++) {
            checkbox[i].checked = true;
        };
    } else {
        for (let i = 0; i < checkbox.length; i++) {
            checkbox[i].checked = false;
        };
    }
});

//table顏色交錯
for (let i = 0; i < checkbox.length; i++) {
    if (i % 2 === 0) {
        tr[i].style.cssText = 'background-color: #FBF7EB';
    }
}

// 新增試題功能
addQuiz.addEventListener('click', function () {
    quizModalBg.style.cssText = 'opacity: 1; z-index: 1;';
});


//跳出modal視窗，叉叉按鈕
closeModal.addEventListener('click', function () {
    quizModalBg.style.cssText = 'opacity: 0; z-index: -1;';
});

//下架試題按鈕功能
off.addEventListener('click', function () {
    // var choose = checkbox.some(e => e.checked);
    // console.log(choose);
    // if () {

    // } else {

    // }

    swal({
        title: "確定要刪除以勾選的題目",
        icon: "warning",
        buttons: true,
        dangerMode: true
    });

    // alert('確定要刪除以勾選的題目');
    for (let i = 0; i < checkbox.length; i++) {
        if (checkbox[i].checked) {
            checkbox[i].closest('tr').remove();
        }
    }


});

//難易度選擇星系時，無法新增題目
quizLevel.addEventListener('change', function () {
    if (quizLevel.value == 0) {
        mainEdit.style.cssText = 'display:none;';
    } else {
        mainEdit.style.cssText = 'display:block;';
    }
});


//新增題目按鈕
createQ.addEventListener('click', function () {
    var str = `
    <div class="downQuestion">
    <label><input type="checkbox" class="checkForQ"><span></span></label>
    <div class="contentQ">
    <textarea placeholder="請輸入題目內容"></textarea>
    <ul>
        <li>
        <span>A:</span>
        <textarea placeholder="請輸入選項內容"></textarea>
        </li>
        <li>
        <span>B:</span>
        <textarea placeholder="請輸入選項內容"></textarea>
        </li>
        <li>
        <span>C:</span>
        <textarea placeholder="請輸入選項內容"></textarea>
        </li>
        <li>
        <span>D:</span>
        <textarea placeholder="請輸入選項內容"></textarea>
        </li>
    </ul>
    </div>
    <div class="ansAndSta">
    <select>
        <option value="">A</option>
        <option value="">B</option>
        <option value="">C</option>
        <option value="">D</option>
    </select>
    <select>
        <option value="">on</option>
        <option value="">off</option>
    </select>
    </div>
    </div>
`;
    //將新增的標籤插入到div.topFunction的結尾標籤之後
    topFunction.insertAdjacentHTML("afterend", str);

    //若有新增題目都會重新清除全選
    let mainEdit = document.getElementsByClassName('mainEdit')[0];
    let checkForQ = mainEdit.querySelectorAll('.checkForQ');
    (function () {
        selectAll.checked = false;
        for (let i = 0; i < checkForQ.length; i++) {
            checkForQ[i].checked = false;
        };
    })();


    // 彈跳視窗內的checkbox全選功能
    selectAll.addEventListener('click', function () {
        if (selectAll.checked) {
            for (let i = 0; i < checkForQ.length; i++) {
                checkForQ[i].checked = true;
            };
        } else {
            for (let i = 0; i < checkForQ.length; i++) {
                checkForQ[i].checked = false;
            };
        }
    });

});

// 新增領域
createField.addEventListener('onchange', function () {
    if (createField.selected) {
        newField.style.cssText = "display: block;";
    }
});
