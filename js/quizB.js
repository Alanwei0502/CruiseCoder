// vue instance
let vm = new Vue({
    el: '.searchbar',
    data: {
        fields: [

            { name: "全部星系" },
            { name: "HTML星系" },
            { name: "CSS星系" },
            { name: "Javascript星系" },
            { name: "jQuery星系" },
            { name: "SASS星系" },
            { name: "MySQL星系" },
            { name: "PHP星系" },
        ],
        difficulties: [
            {
                level: "初級",
                value: 1,
            },
            {
                level: "中級",
                value: 2,
            },
            {
                level: "高級",
                value: 3,
            },
        ],
    },

})



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
    alert('確定要刪除以勾選的題目');
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

//刪除題目按鈕



// 新增領域
createField.addEventListener('onchange', function () {
    if (createField.selected) {
        newField.style.cssText = "display: block;";
    }
});



// axios抓資料
