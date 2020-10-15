$(function () {
    var surl = location.href;
    var surl2 = $(".place a:eq(1)").attr("href");
    var surl3 = $(".user-tab a:eq(0)").attr("href");
    $("#nav .zh li a").each(function () {
        if ($(this).attr("href") == surl || $(this).attr("href") == surl2) $(this).parent().addClass("on");
    });
    $(".user-menu li a").each(function() {
        if ($(this).attr("href")==surl || $(this).attr("href")==surl2) $(this).parent().addClass("on");
    });
    $(".user-menu li a").each(function() {
        if ($(this).attr("href")==surl || $(this).attr("href")==surl3) $(this).parent().addClass("on");
    });
    
    var tags_a = $("#divTags a");
    tags_a.each(function () {
        var x = 9;
        var y = 0;
        var rand = parseInt(Math.random() * (x - y + 1) + y);
        $(this).addClass("tags" + rand);
    });
    
    var winr=$(window); 
    if(winr.width()>=800){
        $("#nav>ul>li").hover(function() {
            if($(this).find("li").length > 0){
                $(this).children("ul").stop(true, true).slideDown();
                $(this).addClass("hover");
            }
        },function() {
            $(this).children("ul").stop(true, true).slideUp();
            $(this).removeClass("hover");
        });
    }else{
        $("#nav>ul>li").each(function(){ 
            if($(this).find("li").length > 0){
                $(this).append("<i class='iconfont icon-xiangxia2 icon-guanbi1'></i>");
            }
            var _this = this;
            $(this).find("i").click(function() {
                $(_this).find("i.fa-angle-up").toggleClass("icon-xiangxia2");
                $(_this).find("ul").slideToggle();
            });
        });
    }
    
    $(".home").click(function(){
        $(".sjss").slideToggle();
        $(".home i").toggleClass("icon-sousuo");
    });

    $("#pull").click(function(){
        $("#nav>ul").slideToggle();
        $("#pull i").toggleClass("icon-caidan");
    });

    $(".user-gn").hover(function () {
        $(".user-gn>ul").stop(true, true).fadeIn(400);
    },function() {
        $(".user-gn>ul").stop(true, true).fadeOut();
    });

    $(".data-on").click(function () {
        $(".data-box").slideToggle();
    });
});


zbp.plugin.unbind("comment.reply", "system");
zbp.plugin.on("comment.reply", "txdida", function(id) {
    var i = id;
    $("#inpRevID").val(i);
    var frm = $('#divCommentPost'),
        cancel = $("#cancel-reply");

    frm.before($("<div id='temp-frm' style='display:none'>")).addClass("reply-frm");
    $('#AjaxComment' + i).before(frm);

    cancel.show().click(function() {
        var temp = $('#temp-frm');
        $("#inpRevID").val(0);
        if (!temp.length || !frm.length) return;
        temp.before(frm);
        temp.remove();
        $(this).hide();
        frm.removeClass("reply-frm");
        return false;
    });
    try {
        $('#txaArticle').focus();
    } catch (e) {}
    return false;
});

zbp.plugin.on("comment.get", "txdida", function (logid, page) {
    $('span.commentspage').html("提交中...");
});
zbp.plugin.on("comment.got", "txdida", function (logid, page) {
    $("#cancel-reply").click();
});
zbp.plugin.on("comment.postsuccess", "txdida", function () {
    $("#cancel-reply").click();
});