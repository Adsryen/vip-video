<!DOCTYPE html> 
<html> 
    <head> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Content-Language" content="<?php  echo $language;  ?>" />
        <?php if ($zbp->Config('txdida')->seokg=='1') { ?>
        <?php  include $this->GetTemplate('seobt');  ?>
        <?php }else{  ?>
        <title><?php  echo $title;  ?>-<?php  echo $name;  ?></title>
        <?php } ?>
        <link rel="stylesheet" rev="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/iconfont/iconfont.css" type="text/css" media="all"/>
        <link rel="stylesheet" rev="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/<?php  echo $style;  ?>.css" type="text/css" media="all"/>
        <?php if ($type=='article') { ?><link rel="stylesheet" rev="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/dplayer/DPlayer.min.css" type="text/css" media="all"/><?php } ?>
        <script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js" type="text/javascript"></script>
        <script src="<?php  echo $host;  ?>zb_system/script/c_html_js_add.php" type="text/javascript"></script>
        <script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
        <?php if ($type=='article') { ?><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/jquery.nicescroll.min.js" type="text/javascript"></script><?php } ?>
        <style type="text/css">#nav,.ss input[type="submit"],.right3 #divSearchPanel input[type="submit"],#divTags dd ul li a,.pagebar a:hover,.pagebar .now-page,#frmSumbit .button,.banner .hd ul .on,.bx-wrapper .bx-pager.bx-default-pager a,.index-list-tu li a:hover p,.info-tag a,.zse,.scroll p,.banner .prev, .banner .next,#nav li a,#nav li ul a:hover,.top-login a:last-child,.user-menu li.on a,.user-gn>ul,.useron{background-color:#<?php  echo $zbp->Config('txdida')->zs;  ?>;}.user-gn>ul::before{border-color:#<?php  echo $zbp->Config('txdida')->zs;  ?>;}#nav li a:hover,#nav li.on a,#nav>ul>li.hover>a,.pagebar a,#nav li ul li a,.user-bg{background-color:#<?php  echo $zbp->Config('txdida')->fs;  ?>;}.right3 #divSearchPanel dd form,.ss form,.info-lb li a:hover,.top ul li a:hover,.txdidasl li a:hover,.top-login a{border:1px solid #<?php  echo $zbp->Config('txdida')->zs;  ?>;}#divCalendar td a,.notice .tab-hd li.on a,a:hover,.yanse,.tags a{color:#<?php  echo $zbp->Config('txdida')->zs;  ?>;}.info-zi h2,.info-zi h3,.tx-title1{border-left:3px solid #<?php  echo $zbp->Config('txdida')->zs;  ?>;}</style>
        <?php  echo $header;  ?>
    </head>

<body>
        <div class="tops sjwu">
            <div class="zh">
                <span class="fr">
                    <?php  echo $zbp->Config('txdida')->topy;  ?>
                    <?php if ($zbp->CheckPlugin('YtUser')) { ?>
                    <?php if ($user->ID>0) { ?>
                    <span class="user-gn">
                        <a href="javascript:;"><i class="iconfont icon-friendadd"></i> <?php  echo $zbp->user->StaticName;  ?></a>
                        <ul class="tx-fs" style="display:none;">
                            <li><a href="<?php  echo $host;  ?>?User"><i class="iconfont icon-friendadd"></i> 会员中心</a></li>
                            <li><a href="<?php  echo $host;  ?>zb_users/plugin/YtUser/loginout.php"><i class="iconfont icon-guanbi1"></i> 退出</a></li>
                        </ul>
                    </span>
                    <?php }else{  ?>
                    <span class="top-login">
                        <a href="<?php  echo $host;  ?>?Register" target="_blank">注册</a><a href="<?php  echo $host;  ?>?Login" class="login-on">登录</a>
                    </span>
                    <?php } ?>
                    <?php } ?>
                </span>
                <?php  echo $subname;  ?>
            </div>
        </div>
        <div class="head zh sjwu">
            <?php if ($type=='article') { ?><h2 class="logo fl"><a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>"><img src="<?php txdida_Get_Logo('logo','png'); ?>" alt="<?php  echo $name;  ?>"></a></h2><?php }elseif($type=='page') {  ?><h2 class="logo fl"><a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>"><img src="<?php txdida_Get_Logo('logo','png'); ?>" alt="<?php  echo $name;  ?>"></a></h2><?php }else{  ?><h1 class="logo fl"><a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>"><img src="<?php txdida_Get_Logo('logo','png'); ?>" alt="<?php  echo $name;  ?>"></a></h1><?php } ?>
            <div class="ss fl"><form name="search" method="post" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search"><input name="q" size="11" type="text"> <input value="搜索" type="submit"></form></div>
            <div class="logo-ad ad fr"><?php  echo $zbp->Config('txdida')->logoad;  ?></div>
            <div class="clear"></div>
        </div>
<div class="tou1">
<p class="p1"><a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>"><img src="<?php txdida_Get_Logo('logo','png'); ?>" alt="<?php  echo $name;  ?>"></a></p>
</div>
<div class="clearfix" id="nav">
            <ul class="clearfix zh">
                <?php if ($zbp->CheckPlugin('YtUser')) { ?>
                <?php if ($user->ID>0) { ?>
                <div class="login-phone"><i class="iconfont icon-friendadd"></i><?php  echo $zbp->user->StaticName;  ?></a> | <a href="<?php  echo $host;  ?>?User"><i class="iconfont icon-friendadd"></i>会员中心</a> | <a href="<?php  echo $host;  ?>zb_users/plugin/YtUser/loginout.php"><i class="iconfont icon-guanbi1"></i>退出</a></div>
                <?php }else{  ?>
                <div class="login-phone"><a href="<?php  echo $host;  ?>?Register">注册</a><a href="<?php  echo $host;  ?>?Login" class="login-on">登录</a></div>
                <?php } ?>
                <?php } ?>
                <?php  if(isset($modules['navbar'])){echo $modules['navbar']->Content;}  ?>
            
            </ul>
            
        </div>
