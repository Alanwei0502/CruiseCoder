
// vue
let app = new Vue({
    el: '#feedBack',
    data: {
        courses: [],
        favCourse: [],
        theMember: '',
        star: [],
        courseTitle: '',
        funNum: [],
    },
    // ajax抓資料
    created() {
        this.ajax();
        this.getmember();
        this.getFavCourse();
    },

    methods: {
        ajax() {
            // 撈所有課程的資料
            let that = this;
            let star = 1;
            $.ajax({
                type: 'POST',
                url: 'allCourseR.php',
                data: { star },
                dataType: 'json',
                success: function (res) {
                    // console.log(res);
                    that.courses = res;

                    // 星星
                    setTimeout(() => {
                        for (let i = 0; i < res.length; i++) {
                            res[i].rRate;
                            // console.log(res.length);
                            // console.log(res[i].rRate);
                            // let stry = "<i class='fas fa-star yellow'> </i>";
                            if (res[i].rRate > 0 && (res[i].rRate) % 1 == 0) {
                                for (j = 0; j < Math.floor(res[i].rRate); j++) {
                                    // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                    $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                }

                            } else {
                                for (j = 0; j < Math.floor(res[i].rRate); j++) {
                                    // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                    $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                    $('a.course').eq(i).find('.star').find('i').eq(Math.floor(res[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                }
                            }
                        }
                    }, 1);

                    //進度條
                    setTimeout(() => {
                        $.ajax({
                            type: 'POST',
                            url: 'allCourseRorder.php',
                            data: { star },
                            dataType: 'json',
                            success: function (res) {
                                // console.log(res);

                                // console.log(that.courses[0].cNumber);
                                $(res).each(function (inDex, iTem) {
                                    that.funNum.push(iTem.count);
                                    // console.log(that.funNum);

                                    let w = ((iTem.count / 10) * 100);
                                    $(that.courses).each(function (index, item) {
                                        if (item.cNumber == iTem.iCourse) {
                                            for (let i = 0; i < res.length; i++) {
                                                let span = document.getElementsByClassName("counts");
                                                span[i].innerText = res[i].count;
                                                // console.log(res[i].count);
                                            }
                                            // console.log(w);
                                            if (w > 100) {
                                                $(`span[data-id=${iTem.iCourse}]`).attr('style', `width:100%`);
                                            } else {
                                                $(`span[data-id=${iTem.iCourse}]`).attr('style', `width:${w}%`);
                                            }
                                        }
                                    });
                                });
                            }
                        });
                    }, 1);
                }
            });
            this.courseTitle = "所有課程";
            // this.courses.rRate

        },
        getmember() {
            // 取得會員編號
            getCookie('user');
            let userAccount = getCookie('user');
            let that = this;
            let member = 1;

            $.ajax({
                type: 'POST',
                url: 'allCourseMemberR.php',
                data: {
                    member,
                    userAccount,
                },
                dataType: 'json',
                success: function (res) {
                    res.forEach((res, index) => {
                        that.theMember = res.mNumber;
                        // console.log(that.theMember);
                    });
                }
            });
        },
        getFavCourse() {
            //取得收藏的課程
            let that = this;
            setTimeout(function () {
                let member2 = that.theMember;
                let member = 1;

                $.ajax({
                    type: 'POST',
                    url: 'findFavCourseR.php',
                    data: {
                        member,
                        member2,
                    },
                    dataType: 'json',
                    success: function (res) {
                        let arr = [];
                        $(res).each(function (index, item) {
                            let theClass = item.cTitle;
                            arr.push(theClass);
                        });
                        that.favCourse = arr;
                        // console.log(arr);



                        $('p.title').each(function (index, val) {
                            // for迴圈寫法
                            // for (let i = 0; i < arr.length; i++){                                
                            //     if ($(val).text() == arr[i])  {
                            //         console.log($(val));
                            //         $(val).parent('div').prev('div').find('i').addClass('is-active');
                            //     }
                            // }
                            // each迴圈寫法
                            $(arr).each(function (index, value) {
                                if ($(val).text() == value) {
                                    // console.log($(val));
                                    $(val).parent('div').prev('div').find('i').addClass('is-active');
                                }
                            });
                        });
                    }
                });
            }, 500);
        },
        clearFav() {
            // 先清除所有的愛心
            let faheart = document.querySelectorAll('.fa-heart');
            // console.log(faheart);
            // 如果class有is-active，移除所有的is-active的class
            faheart.forEach((e, i) => {
                if (e.classList.contains("is-active")) {
                    e.classList.remove("is-active")
                }
            });
        },
        allOpen() {
            // 載入所有課程
            this.ajax();
            $(".course").show();
            //  將select option回到預設-課程類型
            $('#SelectId')[0].selectedIndex = 0;
            this.clearFav();
            this.getFavCourse();
            this.courseTitle = "所有課程";
            // 先清除所有的星星
            let fastar = document.querySelectorAll('.fa-star');
            console.log(fastar);
            // 如果class有is-active，移除所有的is-active的class
            for (let i = 0; i < fastar.length; i++) {
                fastar[i].classList.remove("fas");
                fastar[i].classList.remove("fa-star-half-alt");

                fastar[i].classList.add("far");
            }
            // 星星
            setTimeout(() => {
                for (let i = 0; i < res.length; i++) {
                    res[i].rRate;
                    // console.log(res.length);
                    // console.log(res[i].rRate);
                    if (res[i].rRate > 0 && (res[i].rRate) % 1 == 0) {
                        for (j = 0; j < Math.floor(res[i].rRate); j++) {
                            $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                        }

                    } else {
                        for (j = 0; j < Math.floor(res[i].rRate); j++) {
                            $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                            $('a.course').eq(i).find('.star').find('i').eq(Math.floor(res[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                        }
                    }
                }
            }, 1);

        },
        fundingOpen() {
            //載入募資課程
            let that = this;
            let star = 1;
            $.ajax({
                type: 'POST',
                url: 'allCourseR.php',
                data: { star },
                dataType: 'json',
                success: function (res) {
                    let resFund = [];
                    res.forEach(function (item, index) {
                        if (item.cStatus === "2") {
                            resFund.push(item);
                        };
                    });
                    that.courses = resFund;
                    // console.log(that.courses);

                    //進度條
                    setTimeout(() => {
                        $.ajax({
                            type: 'POST',
                            url: 'allCourseRorder.php',
                            data: { star },
                            dataType: 'json',
                            success: function (res) {
                                console.log(res);

                                console.log(that.courses[0].cNumber);
                                $(res).each(function (inDex, iTem) {
                                    that.funNum.push(iTem.count);
                                    console.log(that.funNum);

                                    let w = ((iTem.count / 10) * 100);
                                    $(that.courses).each(function (index, item) {
                                        if (item.cNumber == iTem.iCourse) {
                                            for (let i = 0; i < res.length; i++) {
                                                let span = document.getElementsByClassName("counts");
                                                span[i].innerText = res[i].count;

                                                // console.log(res[i].count);
                                            }
                                            // console.log(w);
                                            if (w > 100) {
                                                $(`span[data-id=${iTem.iCourse}]`).attr('style', `width:100%`);
                                            } else {
                                                $(`span[data-id=${iTem.iCourse}]`).attr('style', `width:${w}%`);
                                            }
                                        }
                                    });
                                });
                            }
                        });
                    }, 1);
                }
            });

            // 將select option回到預設-課程類型
            $('#SelectId')[0].selectedIndex = 0;
            this.clearFav();
            this.getFavCourse();
            this.courseTitle = "募資課程";

        },
        type() {
            if ($(".tab option:selected").val() == 'html') {
                this.courseTitle = "HTML";
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "html") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.remove('yellow');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);

                    }
                });
                this.clearFav();
                this.getFavCourse()
            }
            else if
                ($(".tab option:selected").val() == 'css') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "css") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                            fastar[i].classList.remove('yellow');
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);
                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "CSS";

            }
            else if ($(".tab option:selected").val() == 'js') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "js") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                            fastar[i].classList.remove('yellow');
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);
                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "Java Script";

            }
            else if ($(".tab option:selected").val() == 'jquery') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "jquery") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                            fastar[i].classList.remove('yellow');
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);
                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "jQuery";

            }
            else if ($(".tab option:selected").val() == 'sass') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "sass") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove("fas");
                            fastar[i].classList.remove("fa-star-half-alt");

                            fastar[i].classList.add("far");
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);
                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "SASS";

            }
            else if ($(".tab option:selected").val() == 'php') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "php") {
                                resFund.push(item);
                            }
                        });
                        that.courses = resFund;
                        // console.log(that.courses);

                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                            fastar[i].classList.remove('yellow');
                        }
                        // 星星
                        //    先刪除

                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "PHP";

            }
            else if ($(".tab option:selected").val() == 'mysql') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "mysql") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                            fastar[i].classList.remove('yellow');
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);
                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "MySQL";

            }
            else if ($(".tab option:selected").val() == 'vue') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "vue") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                            fastar[i].classList.remove('yellow');
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);
                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "Vue.js";
            }
            else if ($(".tab option:selected").val() == 'github') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "github") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                            fastar[i].classList.remove('yellow');
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);
                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "Github";
            }
            else if ($(".tab option:selected").val() == 'gulp') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "gulp") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                            fastar[i].classList.remove('yellow');
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);

                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "Gulp";
            }
            else if ($(".tab option:selected").val() == 'ajax') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "ajax") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                            fastar[i].classList.remove('yellow');
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);
                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "AJAX";
            }
            // else if ($(".tab option:selected").val() == 'ux/ux') {
            //     let that = this;
            //     let star = 1;
            //     $.ajax({
            //         type: 'POST',
            //         url: 'allCourseR.php',
            //         data: { star },
            //         dataType: 'json',
            //         success: function (res) {
            //             let resFund = [];
            //             res.forEach(function (item, index) {
            //                 if (item.cType === "ui/ux") {
            //                     resFund.push(item);
            //                 };
            //             });
            //             that.courses = resFund;
            //             // console.log(that.courses);
            //             // 先清除所有的星星
            //             let fastar = document.querySelectorAll('.fa-star');
            //             console.log(fastar);
            //             // 如果class有is-active，移除所有的is-active的class
            //             for (let i = 0; i < fastar.length; i++) {
            //                 fastar[i].classList.remove("fas");
            //                 fastar[i].classList.remove("fa-star-half-alt");

            //                 fastar[i].classList.add("far");
            //             }
            //             // 星星
            //             setTimeout(() => {
            //                 for (let i = 0; i < resFund.length; i++) {
            //                     resFund[i].rRate;
            //                     console.log(resFund.length);
            //                     // console.log(res[i].rRate);
            //                     // let stry = "<i class='fas fa-star yellow'> </i>";
            //                     if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
            //                         for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
            //                             // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
            //                             $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
            //                         }

            //                     } else {
            //                         for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
            //                             // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
            //                             $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

            //                             $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
            //                         }
            //                     }
            //                 }
            //             }, 1);
            //         }
            //     });
            //     this.clearFav();
            //     this.getFavCourse();
            //     this.courseTitle = "Vue.js";
            // }
            else if ($(".tab option:selected").val() == 'xd') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "xd") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                            fastar[i].classList.remove('yellow');
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);
                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "Adobe XD";
            }
            else if ($(".tab option:selected").val() == 'photoshop') {
                let that = this;
                let star = 1;
                $.ajax({
                    type: 'POST',
                    url: 'allCourseR.php',
                    data: { star },
                    dataType: 'json',
                    success: function (res) {
                        let resFund = [];
                        res.forEach(function (item, index) {
                            if (item.cType === "photoshop") {
                                resFund.push(item);
                            };
                        });
                        that.courses = resFund;
                        // console.log(that.courses);
                        // 先清除所有的星星
                        let fastar = document.querySelectorAll('.fa-star');
                        // console.log(fastar);
                        // 如果class有is-active，移除所有的is-active的class
                        for (let i = 0; i < fastar.length; i++) {
                            fastar[i].classList.remove('fas');
                            fastar[i].classList.remove('far');
                            fastar[i].classList.remove('fa-star');
                            fastar[i].classList.add("far");
                            fastar[i].classList.add("fa-star");
                            fastar[i].classList.remove('yellow');
                        }
                        // 星星
                        setTimeout(() => {
                            for (let i = 0; i < resFund.length; i++) {
                                resFund[i].rRate;
                                // console.log(res.length);
                                // console.log(res[i].rRate);
                                // let stry = "<i class='fas fa-star yellow'> </i>";
                                if (resFund[i].rRate > 0 && (resFund[i].rRate) % 1 == 0) {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');
                                    }

                                } else {
                                    for (j = 0; j < Math.floor(resFund[i].rRate); j++) {
                                        // $('a.course').eq(i).find('.star').find('i').eq(j).addClass('yellow');
                                        $('a.course').eq(i).find('.star').find('i').eq(j).attr('class', 'fas fa-star yellow');

                                        $('a.course').eq(i).find('.star').find('i').eq(Math.floor(resFund[i].rRate)).attr('class', 'fas fa-star-half-alt yellow');
                                    }
                                }
                            }
                        }, 1);
                    }
                });
                this.clearFav();
                this.getFavCourse();
                this.courseTitle = "PhotoShop";
            }
        },
        // // 點擊愛心，加上顏色
        favorites(e) {
            checkCookie('user');
            getCookie('user');

            if (!checkCookie('user')) {

                swal("請先登入會員!", "登入會員才有辦法收藏課程唷!", "error");

                return;
            }

            let faheart = document.getElementsByClassName('fa-heart');
            let courseTitle = $(e.target).closest('div').next('div').find('p.title').text();
            // console.log(courseTitle);

            e.target.classList.toggle('is-active');

            if (!$(e.target).hasClass('is-active')) {

                // e.target.classList.toggle('is-active');

                // console.log('愛心');
                this.courses.forEach(function (item) {

                    if (item.cTitle == courseTitle) {
                        // resFund.push(item);
                        // 取得會員編號
                        // let theMember = 'M0002';
                        let theMember = app.theMember;

                        let thecNumber = item.cNumber;
                        // console.log(thecNumber);

                        let that = this;
                        let heart = 1;
                        $.ajax({
                            type: 'POST',
                            url: 'favoritecDelR.php',
                            data: {
                                heart,
                                thecNumber,
                                theMember,
                            },
                            dataType: 'text',
                            success: function (res) {
                                // console.log(res);
                            }
                        });
                    };
                });
            } else {
                // e.target.classList.toggle('is-active');

                this.courses.forEach(function (item) {

                    if (item.cTitle == courseTitle) {
                        // resFund.push(item);
                        // 取得會員編號
                        // let theMember = 'M0002';
                        let theMember = app.theMember;
                        let thecNumber = item.cNumber;
                        let that = this;
                        let heart = 1;
                        $.ajax({
                            type: 'POST',
                            url: 'favoritecR.php',
                            data: {
                                heart,
                                thecNumber,
                                theMember,
                            },
                            dataType: 'text',
                            success: function (res) {
                                // console.log(res);
                            }
                        });
                    };
                });
            }
        },
        searchTitle() {
            // input模糊搜尋
            // 搜尋框的值(都轉成大寫，並去除前後空白)
            // let searchInput = $('#search').val().toUpperCase();
            let searchInput = $('#search').val().trim();
            // console.log(searchInput);

            // 自定義Contains，不分大小寫
            jQuery.expr[':'].Contains = function (a, i, m) {
                return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
            };

            if (searchInput != "") {
                $("p.title:Contains('" + searchInput + "')").closest('a.course').show();
                $('p.title').not($("p.title:Contains('" + searchInput + "')")).closest('a.course').hide();

            } else {
                $("p.title").closest('a.course').hide();
            }
        }
    },
});

// 頁籤顏色
$(function () {
    $("button.tab").on("click", function () {
        $(this).closest("div").find("button.tab").removeClass("-on");
        $(this).closest("div").find("select.tab").removeClass("-on");
        $(this).addClass("-on");
    });

    $("select.tab").on("change", function () {
        $(this).closest(".category").find("button.tab").removeClass("-on");
        $(this).addClass("-on");
    });

});

// 檢查某 cookie 是否存在
function checkCookie(cname) {
    var cookie_value = getCookie(cname);
    if (cookie_value != "") {
        return true;
    } else {
        return false;
    }
}

// 取得 cookie 的值
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
var userAccount = getCookie('user');

