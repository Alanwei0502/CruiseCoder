$(document).ready(function(){ 
  $.datepicker.regional['zh-TW']={
    dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
    dayNamesMin:["日","一","二","三","四","五","六"],
    monthNames:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
    monthNamesShort:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
    prevText:"上月",
    nextText:"次月",
    weekHeader:"週"
  };

  $.datepicker.setDefaults($.datepicker.regional["zh-TW"]);

  // function beforeShowDay(d) {
  //   var today=new Date();       //今日此時物件
  //   var Y=today.getFullYear();  //今日之年
  //   var M=today.getMonth();     //今日之月
  //   var D=today.getDate();      //今日之日
  //   var H=today.getHours();     //此時之時
  //   var m=today.getMinutes();   //此時之分
  //   var S=today.getSeconds();   //此時之秒
  //   var offtime=$("#deadline").val(); //今日截止時間
  //   var arr=offtime.split(":");      //拆出時分秒
  //   var offdt=new Date(Y,M,D,arr[0],arr[1],arr[2]); //今日截止時間物件
  //   var deadline=offdt.getTime(); //今日此時毫秒數
  //   var d1="" + Y + M + D;      //今日日期字串			
  //   var Y=d.getFullYear();      //每日日期之年
  //   var M=d.getMonth();         //每日日期之月
  //   var D=d.getDate();          //每日日期之日
  //   var d2="" + Y + M + D;      //每日日期字串
  //   var dt=new Date(Y,M,D,H,m,S); //每日此時物件
  //   var dtms=dt.getTime();      //每日此時毫秒數
  //   if (d1==d2) { //傳入日期為今日
  //       if (dtms < deadline) {return [true,"","Yes!"];} //今日未達:可選
  //       else {return [false,"","Oops!"];} //今日已達:不可選
  //   } //end of if
  //   else { //傳入日期非今日
  //       if (dtms > deadline) {return [true,"","Yes!"];} //明日以後:可選
  //       else {return [false,"","Oops!"];} //今日以前:不可選
  //   } //end of else
  // }

  $("#datepicker1").datepicker({
    showOtherMonths: true,
    dateFormat:"yy/mm/dd",
    showMonthAfterYear:true
  }).datepicker("setDate", new Date());

  $("#datepicker2").datepicker({
    showOtherMonths: true,
    dateFormat:"yy/mm/dd",
    showMonthAfterYear: true,
    beforeShowDay: function(d) {
      var today=new Date();       //今日此時物件
      var Y=today.getFullYear();  //今日之年
      var M=today.getMonth();     //今日之月
      var D=today.getDate();      //今日之日
      var H=today.getHours();     //此時之時
      var m=today.getMinutes();   //此時之分
      var S=today.getSeconds();   //此時之秒
      var offtime=$("#deadline").val(); //今日截止時間
      var arr=offtime.split(":");      //拆出時分秒
      var offdt=new Date(Y,M,D,arr[0],arr[1],arr[2]); //今日截止時間物件
      var deadline=offdt.getTime(); //今日此時毫秒數
      var d1="" + Y + M + D;      //今日日期字串			
      var Y=d.getFullYear();      //每日日期之年
      var M=d.getMonth();         //每日日期之月
      var D=d.getDate();          //每日日期之日
      var d2="" + Y + M + D;      //每日日期字串
      var dt=new Date(Y,M,D,H,m,S); //每日此時物件
      var dtms=dt.getTime();      //每日此時毫秒數
      if (d1==d2) { //傳入日期為今日
          if (dtms < deadline) {return [true,"","Yes!"];} //今日未達:可選
          else {return [false,"","Oops!"];} //今日已達:不可選
      } //end of if
      else { //傳入日期非今日
          if (dtms > deadline) {return [true,"","Yes!"];} //明日以後:可選
          else {return [false,"","Oops!"];} //今日以前:不可選
      } //end of else
    } 
  }).datepicker("setDate", new Date());

  $("#datepicker3").datepicker({
    showOtherMonths: true,
    dateFormat:"yy/mm/dd",
    showMonthAfterYear: true,
    beforeShowDay: function(d) {
      var today=new Date();       //今日此時物件
      var Y=today.getFullYear();  //今日之年
      var M=today.getMonth();     //今日之月
      var D=today.getDate();      //今日之日
      var H=today.getHours();     //此時之時
      var m=today.getMinutes();   //此時之分
      var S=today.getSeconds();   //此時之秒
      var offtime=$("#deadline").val(); //今日截止時間
      var arr=offtime.split(":");      //拆出時分秒
      var offdt=new Date(Y,M,D,arr[0],arr[1],arr[2]); //今日截止時間物件
      var deadline=offdt.getTime(); //今日此時毫秒數
      var d1="" + Y + M + D;      //今日日期字串			
      var Y=d.getFullYear();      //每日日期之年
      var M=d.getMonth();         //每日日期之月
      var D=d.getDate();          //每日日期之日
      var d2="" + Y + M + D;      //每日日期字串
      var dt=new Date(Y,M,D,H,m,S); //每日此時物件
      var dtms=dt.getTime();      //每日此時毫秒數
      if (d1==d2) { //傳入日期為今日
          if (dtms < deadline) {return [true,"","Yes!"];} //今日未達:可選
          else {return [false,"","Oops!"];} //今日已達:不可選
      } //end of if
      else { //傳入日期非今日
          if (dtms > deadline) {return [true,"","Yes!"];} //明日以後:可選
          else {return [false,"","Oops!"];} //今日以前:不可選
      } //end of else
    } 
  });
 
});