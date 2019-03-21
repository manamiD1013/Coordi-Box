var unfollow ={
  "background-color":"#6EB7DB",
  "color": "#fff",
  "border":"1px solid #6EB7DB"
};

$(".index >.pagination").css("opacity","0");
$(".unfollow").parent().parent().css(unfollow);
$(".unfollow").css(
  "background-color","#6EB7DB"
);

var $win = $(window);

$win.on('load resize', function() {  
  if (window.matchMedia('(max-width: 575.98px)').matches) {
    // SPの処理
    $('.user-ranking > .users').addClass('row');
    $('.container>.index').addClass('row');
    $('.index > .row').css('padding','0');
    $('.sp-header').parent().parent().css("padding-top","56px");
    $('.text-left').css('text-align','center');
  } else if (window.matchMedia('(max-width: 767.98px) and (min-width: 576px)').matches) {
   $('.navbar > nav').removeClass('navbar-collapse');
  } else {
    // PCの処理
    $('.user-ranking > .users').removeClass('row');
    $('.navbar > nav').addClass('navbar-collapse');
    $('.index').removeClass('row');
  }
});
var isMobile = !!(new MobileDetect(window.navigator.userAgent).mobile());

// 場合分けしたい箇所で以下のように使う
if (isMobile) {
    $('.pc-only').css('display','none');
    $('.sp-only').css('display','block');
    $('.user-nav > ul > .list-inline-item').css('width','50%')
} else {
    $('.sp-only').css('display','none');
}