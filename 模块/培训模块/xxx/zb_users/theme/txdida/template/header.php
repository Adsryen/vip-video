<!DOCTYPE html> 
<html> 
    <head> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Content-Language" content="{$language}" />
        {if $zbp->Config('txdida')->seokg=='1'}
        {template:seobt}
        {else}
        <title>{$title}-{$name}</title>
        {/if}
        <link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/iconfont/iconfont.css" type="text/css" media="all"/>
        <link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/{$style}.css" type="text/css" media="all"/>
        {if $type=='article'}<link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/dplayer/DPlayer.min.css" type="text/css" media="all"/>{/if}
        <script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
        <script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
        <script src="{$host}zb_users/theme/{$theme}/script/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
        {if $type=='article'}<script src="{$host}zb_users/theme/{$theme}/script/jquery.nicescroll.min.js" type="text/javascript"></script>{/if}
        <style type="text/css">#nav,.ss input[type="submit"],.right3 #divSearchPanel input[type="submit"],#divTags dd ul li a,.pagebar a:hover,.pagebar .now-page,#frmSumbit .button,.banner .hd ul .on,.bx-wrapper .bx-pager.bx-default-pager a,.index-list-tu li a:hover p,.info-tag a,.zse,.scroll p,.banner .prev, .banner .next,#nav li a,#nav li ul a:hover,.top-login a:last-child,.user-menu li.on a,.user-gn>ul,.useron{background-color:#{$zbp->Config('txdida')->zs};}.user-gn>ul::before{border-color:#{$zbp->Config('txdida')->zs};}#nav li a:hover,#nav li.on a,#nav>ul>li.hover>a,.pagebar a,#nav li ul li a,.user-bg{background-color:#{$zbp->Config('txdida')->fs};}.right3 #divSearchPanel dd form,.ss form,.info-lb li a:hover,.top ul li a:hover,.txdidasl li a:hover,.top-login a{border:1px solid #{$zbp->Config('txdida')->zs};}#divCalendar td a,.notice .tab-hd li.on a,a:hover,.yanse,.tags a{color:#{$zbp->Config('txdida')->zs};}.info-zi h2,.info-zi h3,.tx-title1{border-left:3px solid #{$zbp->Config('txdida')->zs};}</style>
        {$header}
    </head>

<body>
        <div class="tops sjwu">
            <div class="zh">
                <span class="fr">
                    {$zbp->Config('txdida')->topy}
                    {if $zbp->CheckPlugin('YtUser')}
                    {if $user.ID>0}
                    <span class="user-gn">
                        <a href="javascript:;"><i class="iconfont icon-friendadd"></i> {$zbp->user->StaticName}</a>
                        <ul class="tx-fs" style="display:none;">
                            <li><a href="{$host}?User"><i class="iconfont icon-friendadd"></i> 会员中心</a></li>
                            <li><a href="{$host}zb_users/plugin/YtUser/loginout.php"><i class="iconfont icon-guanbi1"></i> 退出</a></li>
                        </ul>
                    </span>
                    {else}
                    <span class="top-login">
                        <a href="{$host}?Register" target="_blank">注册</a><a href="{$host}?Login" class="login-on">登录</a>
                    </span>
                    {/if}
                    {/if}
                </span>
                {$subname}
            </div>
        </div>
        <div class="head zh sjwu">
            {if $type=='article'}<h2 class="logo fl"><a href="{$host}" title="{$name}"><img src="{php}txdida_Get_Logo('logo','png');{/php}" alt="{$name}"></a></h2>{elseif $type=='page'}<h2 class="logo fl"><a href="{$host}" title="{$name}"><img src="{php}txdida_Get_Logo('logo','png');{/php}" alt="{$name}"></a></h2>{else}<h1 class="logo fl"><a href="{$host}" title="{$name}"><img src="{php}txdida_Get_Logo('logo','png');{/php}" alt="{$name}"></a></h1>{/if}
            <div class="ss fl"><form name="search" method="post" action="{$host}zb_system/cmd.php?act=search"><input name="q" size="11" type="text"> <input value="搜索" type="submit"></form></div>
            <div class="logo-ad ad fr">{$zbp->Config('txdida')->logoad}</div>
            <div class="clear"></div>
        </div>
<div class="tou1">
<p class="p1"><a href="{$host}" title="{$name}"><img src="{php}txdida_Get_Logo('logo','png');{/php}" alt="{$name}"></a></p>
</div>
<div class="clearfix" id="nav">
            <ul class="clearfix zh">
                {if $zbp->CheckPlugin('YtUser')}
                {if $user.ID>0}
                <div class="login-phone"><i class="iconfont icon-friendadd"></i>{$zbp->user->StaticName}</a> | <a href="{$host}?User"><i class="iconfont icon-friendadd"></i>会员中心</a> | <a href="{$host}zb_users/plugin/YtUser/loginout.php"><i class="iconfont icon-guanbi1"></i>退出</a></div>
                {else}
                <div class="login-phone"><a href="{$host}?Register">注册</a><a href="{$host}?Login" class="login-on">登录</a></div>
                {/if}
                {/if}
                {module:navbar}
            
            </ul>
            
        </div>
