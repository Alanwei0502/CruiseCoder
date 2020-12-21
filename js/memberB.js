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
        },

        // 大頭照即時呈現
        readURL() {
            let file = $('#imgInp')[0].files[0];
            let reader = new FileReader;
            reader.onload = function (e) {
                $('#imgShow').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        },

        // 儲存編輯
        saveInfo() {
            let editLevel = $('select[name = "ganName"]').val();
            let editName = $('input[name = "memberName"]').val();
            let originalImg = $('#imgShow').attr("src");
            let photo = $('#imgInp').val().split("\\");
            let editPhoto = (photo[(photo.length - 1)] == "") ? originalImg : ("../images/info/" + photo[(photo.length - 1)]);
            let editPhone = $('input[name="memberPhone"]').val();
            let editPassword = $('input[type="password"]').val();
            let editCC = $('input[name="memberCC"]').val();
            let memberID = $('input[name="memberID"]').val();
            let teacherInfo = $('textarea[name="teacherInfo"]').val();

            if (editLevel == "" || editName == "" || editPhone == "" || editPassword == "" || editCC == "" || memberID == "" || teacherInfo == "") {
                swal("欄位不可為空白", "", "warning");
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'memberR.php',
                    data: { editLevel, editName, editPhoto, editPhone, editPassword, editCC, memberID, teacherInfo },
                    success: function (res) {
                        if (res == "success") {
                            swal("已成功修改會員資料", "", "success").then((value) => {
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
                    url: 'memberR.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,     //data只能指定單一物件
                    type: 'POST',
                    success: function (data) { }
                });
            }

        }

    },
    created() {
        this.ajax();
    },
});