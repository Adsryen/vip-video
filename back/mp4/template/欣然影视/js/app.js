/*
 * icen
 * ====================================================
*/
var icen = $('body');

var closeTips = function(){
    $('.mtips').addClass('hide');
}

var son =$('.searchstart-on'),
    soff=$('.searchstart-off'),
    isea=$('.searchform');
son.on('touchend',function(e){
    $(this).hide();
    isea.show();
    soff.show();
    e.preventDefault();
})
soff.on('touchend',function(e){
    $(this).hide();
    son.show();
    isea.hide();
    e.preventDefault();
})

/*
 * tabs
 * ====================================================
*/
if ($('#playNumTab').length) {
    var $a = $('#playNumTab a');
    var $ul = $('.v_con_box ul');

    $a.click(function(){
        var $this = $(this);
        var $t = $this.index();
        $a.removeClass();
        $this.addClass('cur');
        $ul.addClass('hide').removeClass('show');
        $ul.eq($t).addClass('show');
    })
}
if ($('.js-tab-btn').length) {
    var $c = $('.js-tab-btn');
    var $tabul = $('.js-tab-con');

    $c.click(function(){
        var $this = $(this);
        var $tt = $this.index();
        $c.removeClass();
        $this.addClass('cur');
        $tabul.addClass('hide').removeClass('show');
        $tabul.eq($tt).addClass('show');

            $('.thumb').lazyload({
                data_attribute: 'src',
                placeholder: '//wx3.sinaimg.cn/square/a787ff0dgy1fjhwuj9ptag20010010sh.gif',
                threshold: 130
            })
        })

}
if ($('#htxt').length) {
    var $b = $('#headtab a'),
        $uls = $('#p-list ul'),
        $htxt =$('#htxt'),
        $headtab=$('#headtab');
    $htxt.on('touchend',function(e){
        $headtab.show();
        e.preventDefault();
    });
    $b.click(function(){
        var $thi = $(this);
        var $ts = $thi.index();
        $b.removeClass();
        $uls.addClass('hide').removeClass('show');
        $uls.eq($ts).addClass('show');
        $headtab.hide();
    })
}
/*
 * fixed
 * ====================================================
*/
$(function(){
    if(window.location.hash){
        var targetScroll = $(window.location.hash).offset().top - 80;
        $("html,body").animate({scrollTop:targetScroll},300);
    }
    $(window).scroll(function(){
        var $this = $(this);
        var targetTop = $(this).scrollTop();
        var height = $(window).height();
        if (targetTop >= 90){
            $(".itopbar").addClass("fixed");
        }else{
            $(".itopbar").removeClass("fixed");
        }
    })
}());


/*
 * lazyload
 * ====================================================
*/
if ($('.thumb:first').data('src')) {

        $('.thumb').lazyload({
            data_attribute: 'src',
            placeholder: '//wx3.sinaimg.cn/square/a787ff0dgy1fjhwuj9ptag20010010sh.gif',
            threshold: 130
        })

}
/*
 * banner
 * ====================================================
*/
if ($('.ibanner').length) {
        var swiper = new Swiper('.swiper-container', {
            autoplay: 3500,
            speed: 1000,
            autoplayDisableOnInteraction: false,
            loop: true,
            centeredSlides: true,
            slidesPerView: 2,
            pagination: '.swiper-pagination',
            paginationClickable: true,
            prevButton: '.swiper-button-prev',
            nextButton: '.swiper-button-next',
            onInit: function(swiper) {
                swiper.slides[2].className = "swiper-slide swiper-slide-active"; //第一次打开不要动画
            },
            breakpoints: {
                668: {
                    slidesPerView: 1,
                }
            }
        });
}
/*
 * back top
 * ====================================================
*/
var backtophtml='<div class="goback cur"><i class="iconfont">&#xe604;</i></div>';
window.onload=function() {
    icen.append(backtophtml);
    $(window).on("scroll", function() {
        var t = $(this).scrollTop();
        t > 200 ? $(".goback").addClass("cur") : $(".goback").removeClass("cur")
    }), $(document).on("click", ".goback", function() {
        $("html,body").animate({
            scrollTop: 0
        }, 800)
    });
};
/*
 * changes
 * ====================================================
*/
if ($('.a_change').length) {
    var divs=[];
    var divCnt = 3; //div 数量 
    for (var i=0;i<divCnt;i++) {
       divs[i] = $(".aclcon"+(i+1));
    }
    var selectedDiv = 0;
    $('.a_change').on('click', function(){
        selectedDiv++;
        selectedDiv = selectedDiv % divCnt; //
        for (var i=0;i< divCnt;i++) {
           $(this).closest('.col-l', '.a_clist').find(divs[i]).removeClass('show fadeIn').addClass('hide fadeOut'); 
        }
        $(this).closest('.col-l', '.a_clist').find(divs[selectedDiv]).removeClass('hide fadeOut').addClass('show fadeIn'); 
            $('.thumb').lazyload({
                data_attribute: 'src',
                placeholder: '//wx3.sinaimg.cn/square/a787ff0dgy1fjhwuj9ptag20010010sh.gif',
                threshold: 130
            })
        })
}