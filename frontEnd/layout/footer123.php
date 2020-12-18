<?php

?>
<!-- 要插在wrap內 -->
<footer>
  <div>
    <div class="footerTop">
      <div class="footerTopLeft">
        <p class="text">聯絡我們</p>
        <p>xxxxxxxx@gmail.com</p>
      </div>
      <div class="footerTopRight">
        <p class="text">追蹤我們</p>
        <div>
          <a href="#"><img src="./../images/fbIcon.png" alt="圖片無法顯示"></a>
          <a href="#"><img src="./../images/lineIcon.png" alt="圖片無法顯示"></a>
          <a href="#"><img src="./../images/igIcon.png" alt="圖片無法顯示"></a>
        </div>
      </div>
    </div>
    <div class="footerBottom">
      <p>2020 &copy; Copyright All Rights Reserved.</p>
    </div>
  </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script>
  //svg
  function enable_svg(){
    $('img.svg').each(function(){
      var $img = $(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');
      $.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest   
          var $svg = $(data).find('svg');
    
          // Add replaced image's ID to the new SVG   
          if(typeof imgID !== 'undefined') {
              $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG   
          if(typeof imgClass !== 'undefined') {
              $svg = $svg.attr('class', imgClass+' replaced-svg');
          }
          // Remove any invalid XML tags as per http://validator.w3.org   
          $svg = $svg.removeAttr('xmlns:a');
          // Check if the viewport is set, if the viewport is not set the SVG wont't scale.   
          if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
              $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
          }
          // Replace image with new SVG   
          $img.replaceWith($svg);
      },'xml');
    });
  }
  enable_svg()

  $(function(){
    // 頭部
    // 會員資訊展開
    $('header div.headerRight img#member').click(function(){
      $('header div.headerRight div.memberNav').fadeToggle(300)
      // 其他關閉
      $('header div.headerRight div.shoppingFancybox').fadeOut(300)
      $('header div.headerMiddle').fadeOut(300)
    })
    $('header div.headerRight img#cart').click(function(){
      $('header div.headerRight div.shoppingFancybox').fadeToggle(300)
      // 其他關閉
      $('header div.headerRight div.memberNav').fadeOut(300)
      $('header div.headerMiddle').fadeOut(300)
    })
    $('header .menu-toggle').click(function(){
      $('header div.headerMiddle').fadeToggle(300)
      // 其他關閉
      $('header div.headerRight div.shoppingFancybox').fadeOut(300)
      $('header div.headerRight div.memberNav').fadeOut(300)
    })

    // 數字更新
    function price_style(array){
      let count = 0
      let price = ""
      for(var i=array.length-1; i>=0;i--){
        count++
        if(count%3==0){
          price = ','+array[i]+price
        }else{
          price = array[i]+price
        }
        // console.log(price)
      }
      return price
    }

    // 購物車更新
    function cart_update(price){
      let pricenums = $('.shoppingTotal>p').data('price')
      let classnums = $('.shoppingTotal>p').data('total')
      let html = "總計 {{num}} 堂課"
      let html2 = "NT$ {{price}}"
      let html3 = ""
      pricenums = pricenums+price
      classnums++
      $('.shoppingTotal>p').attr('data-price',pricenums)
      $('.shoppingTotal>p').attr('data-total',classnums)
      
      html = html.replace(/{{num}}/g,classnums)
      html2 = html2.replace(/{{price}}/,price_style(pricenums.toString().split('')))

      html3 = html+"<br><span>"+html2+"</span>"
      $('.shoppingTotal>p').html(html3)
    }

    // 加入購物車
    $('#class-info .btns .submit').click(function(){
      if(!$(this).hasClass('added')){
        let price_array = class_ajax.price.toString().split('')
        let price = ""
        let total = 0
        price = price_style(price_array)
        // 加入
        let html = '<div class="shopping"><div class="itemImage"><img src="{{image}}" alt="無法顯示圖片"></div><div class="itemText"><p class="courseTitle">{{title}}</p><div class="itemTextButtom"><p class="status">{{status}}</p><p class="price">NT$ {{price}}</p></div></div></div>'
        html = html.replace(/{{image}}/g,class_ajax.image)
                   .replace(/{{title}}/g,class_ajax.name)
                   .replace(/{{status}}/g,class_ajax.status)
                   .replace(/{{price}}/g,price)
        $('header div.headerRight div.shoppingFancybox').prepend(html)
        cart_update(class_ajax.price)
        alert('已加入購物車')
        // 開啟購物車
        $('header div.headerRight div.shoppingFancybox').fadeToggle(300)
        // 其他關閉
        $('header div.headerRight div.memberNav').fadeOut(300)
        $('header div.headerMiddle').fadeOut(300)
        $(this).addClass('added')
        $('#cart-box').attr('data-count',$('#cart-box').data('count')+1)
      }else{
        alert('已加入購物車！')
      }
    })

    //測試用
    $('.fav').click(function(){
      $(this).toggleClass('active')
    })
    $('#class-detail .tab li a').click(function(e){
      e.preventDefault()
      $(this).parent().addClass('active')
        .siblings('li').removeClass('active')

      let $content = $($(this).attr('href'))
      $content
        .fadeIn()
        .siblings('.tab-content').fadeOut()
    })

    // 評分星星
    $('.stars[data-score]').each(function(){
      let score = parseInt($(this).data('score'))
      let color = $(this).data('color')
      // console.log(score,color)
      $(this).css({
        backgroundImage: "linear-gradient(to right,"+color+" 0%,"+color+" "+score/5*100+"%,transparent "+score/5*100+"%,#ccc "+score/5*100+"% ,#ccc 100%)"
      })
      // 分數
      if($(this).prev('.nums').is($(this).prev('.nums'))){
        $(this).prev('.nums').text(score.toFixed(1))
        // $(this).prev('.nums').text(Math.floor(score/10).toFixed(1))
      }
      if($(this).parent().prev('.nums').is($(this).parent().prev('.nums'))){
        $(this).parent().prev('.nums').text(score.toFixed(1))
      }

    })
  })
</script>