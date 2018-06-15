;(function(window, $) {
// pagetop へ戻る
  var document = window.document;
  $(document).ready(function(){
    $(function() {
      var topBtn = $("#pagetop dt");	
      topBtn.hide();
      $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
          topBtn.fadeIn();
        } else {
          topBtn.fadeOut();
        }
      });
      topBtn.click(function () {
        $("body,html").animate({
          scrollTop: 0
        }, 500);
      return false;
      });
    });
  });
// nav 固定
  $(function($) {
    var nav = $("nav"),
    offset = nav.offset();
    var body = $("body");
    var nav_home = $("#menu-item-526");
    var nav_about = $("#menu-item-22");
    $(window).scroll(function () {
      if($(window).scrollTop() > offset.top) {
        nav.addClass("nav_fixed");
        nav_home.addClass("show");
        nav_about.addClass("square");
        $("#menu-item-23").addClass("fixed");
        body.css("margin-top","62px");
      } else {
        nav.removeClass("nav_fixed");
        nav_home.removeClass("show");
        nav_about.removeClass("square");
        $("#menu-item-23").removeClass("fixed");
        body.css("margin-top","0");
      }

    });
  });
// 前の記事または次の記事が1個だけの時は下線を消す
  $(function($) {
    if($(".entry_article_link li:nth-child(2)").length < 1){
       $(".entry_article_link li").css("border","none");
    }
  });
  $(function($) {
    if($(window).innerWidth() < 960){
      $("nav").insertBefore(".top_title");
    }
  });

}(this, jQuery));