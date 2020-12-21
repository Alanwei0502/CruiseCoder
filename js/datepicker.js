$(document).ready(function () {
  $.datepicker.regional['zh-TW'] = {
    dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"],
    dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"],
    monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
    monthNamesShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
    prevText: "上月",
    nextText: "次月",
    weekHeader: "週"
  };

  $.datepicker.setDefaults($.datepicker.regional["zh-TW"]);

  
  // 區間日期搜尋 
  // 用法兩個input id分別為datepicker1和datepicker2 哪天至哪天這樣 1是起始 2是結束
  $("#datepicker1, #datepicker2").datepicker({
    showOtherMonths: true,
    dateFormat: "yy/mm/dd",
    showMonthAfterYear: true,
    beforeShow: dateRange
  });

  // 限制第二個input日期選擇 只能是第一個input日期之後
  function dateRange(input){
    if (input.id == 'datepicker2') {
      var minDate = new Date($('#datepicker1').val());
      minDate.setDate(minDate.getDate() + 1)

      return {
          minDate: minDate
      };
    }
    return {}
  }


  // 今日以前的日期不可選擇 用在新增部分
  $("#datepicker3").datepicker({
    showOtherMonths: true,
    dateFormat: "yy/mm/dd",
    showMonthAfterYear: true,
    beforeShowDay: function (d) {
      // alert(d);
      var today = new Date();       //今日此時物件
      var Y = today.getFullYear();  //今日之年
      var M = today.getMonth();     //今日之月
      var D = today.getDate();      //今日之日
      var H = today.getHours();     //此時之時
      var m = today.getMinutes();   //此時之分
      var S = today.getSeconds();   //此時之秒
      var offtime = $("#deadline").val(); //今日截止時間
      var arr = offtime.split(":");      //拆出時分秒
      var offdt = new Date(Y, M, D, arr[0], arr[1], arr[2]); //今日截止時間物件
      var deadline = offdt.getTime(); //今日此時毫秒數
      var d1 = "" + Y + M + D;      //今日日期字串			
      var Y = d.getFullYear();      //每日日期之年
      var M = d.getMonth();         //每日日期之月
      var D = d.getDate();          //每日日期之日
      var d2 = "" + Y + M + D;      //每日日期字串
      var dt = new Date(Y, M, D, H, m, S); //每日此時物件
      var dtms = dt.getTime();      //每日此時毫秒數
      if (d1 == d2) { //傳入日期為今日
        if (dtms < deadline) { return [true, "", "Yes!"]; } //今日未達:可選
        else { return [false, "", "Oops!"]; } //今日已達:不可選
      } //end of if
      else { //傳入日期非今日
        if (dtms > deadline) { return [true, "", "Yes!"]; } //明日以後:可選
        else { return [false, "", "Oops!"]; } //今日以前:不可選
      } //end of else
    }
  }).datepicker("setDate", new Date());

  // 用在編輯，之後要抓資料庫的時間
  $("#datepicker4").datepicker({
    showOtherMonths: true,
    dateFormat: "yy/mm/dd",
    showMonthAfterYear: true,
    beforeShowDay: function (d) {
      var today = new Date();       //今日此時物件
      var Y = today.getFullYear();  //今日之年
      var M = today.getMonth();     //今日之月
      var D = today.getDate();      //今日之日
      var H = today.getHours();     //此時之時
      var m = today.getMinutes();   //此時之分
      var S = today.getSeconds();   //此時之秒
      var offtime = $("#deadline").val(); //今日截止時間
      var arr = offtime.split(":");      //拆出時分秒
      var offdt = new Date(Y, M, D, arr[0], arr[1], arr[2]); //今日截止時間物件
      var deadline = offdt.getTime(); //今日此時毫秒數
      var d1 = "" + Y + M + D;      //今日日期字串			
      var Y = d.getFullYear();      //每日日期之年
      var M = d.getMonth();         //每日日期之月
      var D = d.getDate();          //每日日期之日
      var d2 = "" + Y + M + D;      //每日日期字串
      var dt = new Date(Y, M, D, H, m, S); //每日此時物件
      var dtms = dt.getTime();      //每日此時毫秒數
      if (d1 == d2) { //傳入日期為今日
        if (dtms < deadline) { return [true, "", "Yes!"]; } //今日未達:可選
        else { return [false, "", "Oops!"]; } //今日已達:不可選
      } //end of if
      else { //傳入日期非今日
        if (dtms > deadline) { return [true, "", "Yes!"]; } //明日以後:可選
        else { return [false, "", "Oops!"]; } //今日以前:不可選
      } //end of else
    }
  });

  $("#datepicker5").datepicker({
    showOtherMonths: true,
    dateFormat: "yy/mm/dd",
    showMonthAfterYear: true,
    beforeShowDay: function (d) {
      var today = new Date();       //今日此時物件
      var Y = today.getFullYear();  //今日之年
      var M = today.getMonth();     //今日之月
      var D = today.getDate();      //今日之日
      var H = today.getHours();     //此時之時
      var m = today.getMinutes();   //此時之分
      var S = today.getSeconds();   //此時之秒
      var offtime = $("#deadline").val(); //今日截止時間
      var arr = offtime.split(":");      //拆出時分秒
      var offdt = new Date(Y, M, D, arr[0], arr[1], arr[2]); //今日截止時間物件
      var deadline = offdt.getTime(); //今日此時毫秒數
      var d1 = "" + Y + M + D;      //今日日期字串			
      var Y = d.getFullYear();      //每日日期之年
      var M = d.getMonth();         //每日日期之月
      var D = d.getDate();          //每日日期之日
      var d2 = "" + Y + M + D;      //每日日期字串
      var dt = new Date(Y, M, D, H, m, S); //每日此時物件
      var dtms = dt.getTime();      //每日此時毫秒數
      if (d1 == d2) { //傳入日期為今日
        if (dtms < deadline) { return [true, "", "Yes!"]; } //今日未達:可選
        else { return [false, "", "Oops!"]; } //今日已達:不可選
      } //end of if
      else { //傳入日期非今日
        if (dtms > deadline) { return [true, "", "Yes!"]; } //明日以後:可選
        else { return [false, "", "Oops!"]; } //今日以前:不可選
      } //end of else
    }
  });
});

