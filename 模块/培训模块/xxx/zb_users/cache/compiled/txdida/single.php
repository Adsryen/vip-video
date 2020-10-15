
<?php  /* Template Name: 默认内容页模板 */  ?>
<?php 
$showid=GetVars('showid','GET');
if ($showid>0){
$arraymetasname=array();
$arraymetastxt=array();
if(!$article->Metas->NBTotaldiany){$article->Metas->NBTotaldiany='1';}
$arraymovielist=explode(",",$article->Metas->NBTotaldiany);

$listi=count($arraymovielist);//$article->Metas->NBTotaldiany==''?1:$article->Metas->NBTotaldiany;
#for ($i = 0; $i <= $listi; $i++){
                          foreach ($arraymovielist as $j){	
                          $arraymetasname[$j]='video'.$j;
                          $arraymetastxt[$j]='vtxt'.$j;
                          } 

                           ?>

<!DOCTYPE html> 
<html> 
    <head> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Content-Language" content="<?php  echo $language;  ?>" />
        <?php $d=$arraymetastxt[$showid]; ?>
        <?php if ($zbp->Config('txdida')->seokg=='1') { ?>
        <title><?php  echo $title;  ?><?php if ($listi>'1') { ?><?php  echo $article->Metas->$d;  ?><?php } ?>-<?php  echo $article->Category->Name;  ?>-<?php  echo $name;  ?></title>
        <meta name="keywords" content="<?php if ($article->Metas->nrgjc) { ?><?php  echo $article->Metas->nrgjc;  ?><?php }else{  ?><?php  foreach ( $article->Tags as $tag) { ?><?php  echo $tag->Name;  ?>,<?php }   ?><?php } ?>" />
        <?php $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...'); ?>
        <meta name="description" content="<?php if ($article->Metas->nrms) { ?><?php  echo $article->Metas->nrms;  ?><?php }else{  ?><?php  echo $description;  ?>,<?php  echo $name;  ?><?php } ?>" />
        <?php }else{  ?>
        <title><?php  echo $title;  ?>-<?php  echo $name;  ?></title>
        <?php } ?>
        <link rel="stylesheet" rev="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/iconfont/iconfont.css" type="text/css" media="all"/>
        <link rel="stylesheet" rev="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/<?php  echo $style;  ?>.css" type="text/css" media="all"/>
        <link rel="stylesheet" rev="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/dplayer/DPlayer.min.css" type="text/css" media="all"/>
        <script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js" type="text/javascript"></script>
        <script src="<?php  echo $host;  ?>zb_system/script/c_html_js_add.php" type="text/javascript"></script>
        <script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
        <script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/jquery.nicescroll.min.js" type="text/javascript"></script>
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


        <div class="clearfix" id="nav">
            <a href="javascript:void(0)" id="pull"><i class="iconfont icon-caidan icon-guanbi1"></i></a>
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
        <a href="javascript:void(0)" class="home"><i class="iconfont icon-sousuo icon-guanbi1"></i></a>
        <div class="sjss ss" style="display:none;"><form name="search" method="post" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search"><input name="q" size="11" type="text"> <input value="搜索" type="submit"></form></div>
        </div>



    <div class="h60"></div>	



    <div class="main zh">
        <?php if ($zbp->Config('txdida')->listadon=='1') { ?>
        <div class="list-b s15 ad"><?php  echo $zbp->Config('txdida')->listad;  ?></div>  
        <?php } ?>

        <?php if ($zbp->Config('txdida')->sjggon=='1') { ?>
        <div class="list-b dnwu"><?php  echo $zbp->Config('txdida')->sjgg;  ?></div>  
        <?php } ?>

        <div class="syqk s15 ys<?php  echo $article->Category->ID;  ?>">
            <div class="left fl">
                <div class="place"><i class="iconfont icon-shouye"></i> <a href="<?php  echo $host;  ?>">网站首页</a><?php if ($type=='article') { ?>
                    <?php 
                    $html='';
                    function navcate($id){
                    global $html;
                    $cate = new Category;
                    $cate->LoadInfoByID($id);
                    $html =' / <a href="' .$cate->Url.'" title="查看' .$cate->Name. '中的全部文章">' .$cate->Name. '</a> '.$html;
                    if(($cate->ParentID)>0){navcate($cate->ParentID);}
                    }
                    navcate($article->Category->ID);
                    global $html;
                    echo $html;
                     ?> / 正文


                    <?php }else{  ?> / <?php  echo $title;  ?><?php } ?>
                </div>    

                <h1 class="title"><?php  echo $article->Title;  ?> <?php if ($listi>'1') { ?>[<?php  echo $article->Metas->$d;  ?>]<?php } ?></h1>
                <small class="small-span"><span><i class="iconfont icon-shizhong"></i> <?php  echo $article->Time('Y-m-d');  ?> </span><span><i class="iconfont icon-wode"></i> <?php  echo $article->Author->StaticName;  ?></span><span><i class="iconfont icon-leimu"></i> <a href="<?php  echo $article->Category->Url;  ?>" title="查看<?php  echo $article->Category->Name;  ?>下的更多文章" target="_blank"><?php  echo $article->Category->Name;  ?></a></span><span><i class="iconfont icon-attention"></i> <?php  echo $article->ViewNums;  ?> ℃</span><span><i class="iconfont icon-liuyan"></i> <a href="<?php  echo $article->Url;  ?>#comment" target="_blank" title="欢迎你对本文发表看法"><?php  echo $article->CommNums;  ?> 评论</a></span></small>

                <?php if ($article->Metas->buy=='jifen') { ?>
                <?php if ($article->Buypay=='1') { ?>
                <?php  include $this->GetTemplate('single-set');  ?>
                <?php }else{  ?>
                <div class="buy-form buy-lock mb20">
                    <i class="iconfont icon-lock"></i>
                    <?php if ($user->ID>0) { ?>
                    <p>此内容为收费内容，请点击购买按钮在线购买。</p>
                    <input type="hidden" name="LogID" id="LogID" value="<?php  echo $article->ID;  ?>" /> 
                    <input type="submit" value="购买" onclick="return Ytbuy()" class="tx-btn zse"/>
                    <?php }else{  ?>
                    <p>此内容为收费内容，请登录后在线购买。</p>
                    <a href="<?php  echo $host;  ?>?Login" class="tx-btn zse">请登录</a>
                    <?php } ?>
                </div>
                <?php } ?>


                <?php }elseif($article->Metas->buy=='vip') {  ?>
                <?php if ($user->Level < 5) { ?>
                                    <?php  include $this->GetTemplate('single-set');  ?>
                                    <?php }else{  ?>
                                    <div class="buy-form buy-lock mb20">
                <i class="iconfont icon-lock"></i>
                <?php if ($user->ID>0) { ?>
                <p>此内容为vip可见内容，请先升级为本站的vip。</p>
                <a href="<?php  echo $host;  ?>?Upgrade" class="tx-btn zse">购买vip</a>
                <?php }else{  ?>
                <p>此内容为收费内容，请登录后在线购买。</p>
                <a href="<?php  echo $host;  ?>?Login" class="tx-btn zse">请登录</a>
                <?php } ?>
            </div>
            <?php } ?>

            <?php }elseif($article->Metas->buy=='dengl') {  ?>
            <?php if ($user->ID>0) { ?>
            <?php  include $this->GetTemplate('single-set');  ?>
            <?php }else{  ?>
            <div class="buy-form buy-lock mb20">
                <i class="iconfont icon-lock"></i>
                <p>此内容需要登录后才能看到，请登录或注册。</p>
                <a href="<?php  echo $host;  ?>?Login" class="tx-btn zse">请登录</a>
            </div>
            <?php } ?>

            <?php }else{  ?>
            <?php  include $this->GetTemplate('single-set');  ?>
            <?php } ?>

            <div class="dianzan xia20">
                <?php if ($zbp->CheckPlugin('sf_praise_sdk')) { ?>
                <span class="fl"><a href="javascript:;"  title="点赞" class="thumbs-up r t sf-praise-sdk"  sfa='click' data-postid='<?php  echo $sf_praise_sdk->postid;  ?>' data-value='1'><i class="iconfont icon-zantong"></i> <span class="sf-praise-sdk" sfa='num' data-value='1' data-postid='<?php  echo $sf_praise_sdk->postid;  ?>'><?php  echo $sf_praise_sdk->value1;  ?></span></a> 喜欢就点赞</span>
                <?php } ?>
                <span class="fl">现在，这部片子已经被播放了 <?php  echo $article->ViewNums;  ?> 次</span>
                <span class="fenx fl"><?php  echo $zbp->Config('txdida')->fx;  ?></span>
                <div class="clear"></div>
            </div>


            <dl class="sylb list-dis"><dt class="ybbt"><strong>我猜你或许还喜欢以下内容</strong></dt>
                <dd class="xia15"><ul>
                    <?php  foreach ( GetList(5,null,null,null,null,null,array('is_related'=>$article->ID)) as $related) { ?>
                    <li>
                        <a href="<?php  echo $related->Url;  ?>" target="_blank" class="img-x <?php if ($zbp->CheckPlugin('IMAGE')) { ?><?php }else{  ?>img-box-slt<?php } ?>">
                            <img src="<?php  echo txdida_FirstIMG($related,$related,176,230);  ?>" alt="<?php  echo $related->Title;  ?>"/>
                            <div class="fuc"><i class="iconfont icon-shipin2"></i></div>
                            <?php if ($related->Metas->qingxi) { ?><em><?php  echo $related->Metas->qingxi;  ?></em><?php } ?>
                            <?php if ($related->Metas->shijian) { ?><small><?php  echo $related->Metas->shijian;  ?></small><?php } ?>
                        </a>
                        <h2><a href="<?php  echo $related->Url;  ?>" target="_blank"><?php  echo $related->Title;  ?></a></h2>
                    </li>
                    <?php }   ?>
                    <div class="clear"></div></ul></dd>

                <?php if ($zbp->Config('txdida')->listad1on=='1') { ?>
                <div class="ad xia15"><?php  echo $zbp->Config('txdida')->listad1;  ?></div>
                <?php } ?>

                <?php if ($zbp->Config('txdida')->sjgg1on=='1') { ?>
                <div class="xia15 dnwu"><?php  echo $zbp->Config('txdida')->sjgg1;  ?></div>  
                <?php } ?>

            </dl>
            <?php if (!$article->IsLock) { ?>
            <?php  include $this->GetTemplate('comments');  ?>
            <?php } ?>

        </div>


        <div class="right fr">
            <?php if ($listi=='1') { ?>

            <?php }elseif($listi>='10') {  ?>
            <dl class="xia15"><dt class="ybbt xia15"><strong>剧集列表</strong></dt><dd>
                <div class="bds" id="scroll_bd">
                    <div class="top" id="bds">
                        <ul id="scroll_ul">
                            <?php 
                            //echo GetVars('showid','GET');
                            //die();
                            $arraymetasname=array();
                            if(!$article->Metas->NBTotaldiany){$article->Metas->NBTotaldiany='1';}
                            $arraymovielist=explode(",",$article->Metas->NBTotaldiany);
                            $strlist='';
                            foreach ($arraymovielist as $j){	
                            $arraymetasname[$j]='video'.$j;
                            $arraymetastxt[$j]='vtxt'.$j;
                            } 

                            foreach ($arraymovielist as $k=>$j){
                            $d=$arraymetastxt[$j];
                            $strlist.='<li><a title="'.$article->Title.'" href="'.$article->Url.'?showid='.($j).'"><i class="iconfont icon-shipin1"></i>  '.$article->Metas->$d.'</a></li>';
                            } 
                            echo $strlist;

                             ?>

                        </ul>
                    </div>
                    <div class="scroll" id="scroll">
                        <p id="p"></p>
                    </div>
                </div></dd></dl>
            <script>
                $(document).ready(function() {    
                    $("#scroll_bd").niceScroll("#scroll_ul",{cursorcolor:"#<?php  echo $zbp->Config('txdida')->zs;  ?>",cursorwidth:10,cursorborderradius:1,cursorborder: "1px solid #<?php  echo $zbp->Config('txdida')->zs;  ?>",cursoropacitymin: 1,boxzoom:true});
                });
            </script>


            <?php }else{  ?>
            <dl class="xia15"><dt class="ybbt xia15"><strong>剧集列表</strong></dt><dd>
                <ul class="txdidasl">
                    <?php 
                    //echo GetVars('showid','GET');
                    //die();
                    $arraymetasname=array();
                    if(!$article->Metas->NBTotaldiany){$article->Metas->NBTotaldiany='1';}
                    $arraymovielist=explode(",",$article->Metas->NBTotaldiany);
                    $strlist='';
                    foreach ($arraymovielist as $j){	
                    $arraymetasname[$j]='video'.$j;
                    $arraymetastxt[$j]='vtxt'.$j;
                    } 

                    foreach ($arraymovielist as $k=>$j){	
                    $d=$arraymetastxt[$j];
                    $strlist.='<li><a title="'.$article->Title.'" href="'.$article->Url.'?showid='.($j).'"><i class="iconfont icon-shipin1"></i>    '.$article->Metas->$d.'</a></li>';
                    } 
                    echo $strlist;

                     ?>

                </ul>
                </dd></dl>
            <?php } ?>

            <dl>
                <dt class="ybbt"><strong>排行榜</strong><span class="hong">Top10</span></dt>
                <dd class="ad xia10 s15"><?php  echo $article->Category->Metas->xgg;  ?></dd>
                <dd class="xia15">
                    <ul class="phb">
                        <?php 
                        if($article->Category->RootID=='0'){
                        $tempcid=$article->Category->ID;
                        $where =array(array('=','cate_RootID' ,$tempcid));
                        $order = array('cate_Order' => 'DESC' );
                        $array=$zbp->GetCategoryList(null,$where,$order,null,null);
                        $wherearray=array();
                        $wherearray[]=array('log_CateID',$tempcid);
                        foreach ($array as $cate){
                        $wherearray[]=array('log_CateID',$cate->ID);
                        }
                        $where=array(
                        array('array',$wherearray),
                        array('=','log_Status','0'),
                        );
                        }else{
                        $tempcid=$article->Category->RootID;
                        $where =array(array('=','cate_RootID' ,$tempcid));
                        $order = array('cate_Order' => 'DESC' );
                        $array=$zbp->GetCategoryList(null,$where,$order,null,null);
                        $wherearray=array();
                        $wherearray[]=array('log_CateID',$article->Category->RootID);
                        foreach ($array as $cate){
                        $wherearray[]=array('log_CateID',$cate->ID);
                        }
                        $where=array(
                        array('array',$wherearray),
                        array('=','log_Status','0'),
                        );

                        }

                        //输出子分类内的热门文章
                        $num=10;
                        $order = array('log_ViewNums'=>'DESC');
                        $substr='';
                        $arrayhotarticle=	$zbp->GetArticleList(array('*'),$where,$order,array($num),'');
                        foreach ($arrayhotarticle as $key=>$b3) {
                        $substr.='<li><a href="'.$b3->Url.'"> '.$b3->Title.' </a></li>';
                        }



                        echo $substr;


                         ?>
                    </ul>
                </dd>

                <?php  echo $zbp->Config('txdida')->yclad;  ?>
            </dl>
        </div>
        <div class="clear"></div>
    </div>

    <?php  include $this->GetTemplate('footer');  ?>


    <?php 
    }else{
     ?>


    <?php  include $this->GetTemplate('header');  ?>

    <div class="main zh">
        <?php if ($zbp->Config('txdida')->listadon=='1') { ?>
        <div class="list-b s15 ad"><?php  echo $zbp->Config('txdida')->listad;  ?></div>  
        <?php } ?>
        <?php if ($zbp->Config('txdida')->sjggon=='1') { ?>
        <div class="list-b dnwu"><?php  echo $zbp->Config('txdida')->sjgg;  ?></div>  
        <?php } ?>


        <div class="syqk s15 ys<?php  echo $article->Category->ID;  ?>">
            <div class="left fl">
                <?php if ($article->Type==ZC_POST_TYPE_ARTICLE) { ?>
                <?php  include $this->GetTemplate('post-single');  ?>
                <?php }else{  ?>
                <?php  include $this->GetTemplate('post-page');  ?>
                <?php } ?>
            </div>


            <div class="right fr">
                <dl>
                    <dt class="ybbt"><strong>排行榜</strong><span class="hong">Top10</span></dt>
                    <dd class="ad xia10 s15"><?php  echo $article->Category->Metas->xgg;  ?></dd>
                    <dd class="xia15"><ul class="phb">
                        <?php 
                        if($article->Category->RootID=='0'){
                        $tempcid=$article->Category->ID;
                        $where =array(array('=','cate_RootID' ,$tempcid));
                        $order = array('cate_Order' => 'DESC' );
                        $array=$zbp->GetCategoryList(null,$where,$order,null,null);
                        $wherearray=array();
                        $wherearray[]=array('log_CateID',$tempcid);
                        foreach ($array as $cate){
                        $wherearray[]=array('log_CateID',$cate->ID);
                        }
                        $where=array(
                        array('array',$wherearray),
                        array('=','log_Status','0'),
                        );
                        }else{
                        $tempcid=$article->Category->RootID;
                        $where =array(array('=','cate_RootID' ,$tempcid));
                        $order = array('cate_Order' => 'DESC' );
                        $array=$zbp->GetCategoryList(null,$where,$order,null,null);
                        $wherearray=array();
                        $wherearray[]=array('log_CateID',$article->Category->RootID);
                        foreach ($array as $cate){
                        $wherearray[]=array('log_CateID',$cate->ID);
                        }
                        $where=array(
                        array('array',$wherearray),
                        array('=','log_Status','0'),
                        );

                        }

                        //输出子分类内的热门文章
                        $num=10;
                        $order = array('log_ViewNums'=>'DESC');
                        $substr='';
                        $arrayhotarticle=	$zbp->GetArticleList(array('*'),$where,$order,array($num),'');
                        foreach ($arrayhotarticle as $key=>$b3) {
                        $substr.='<li><a href="'.$b3->Url.'"> '.$b3->Title.' </a></li>';
                        }

                        echo $substr;

                         ?>
                        </ul></dd>

                    <?php  echo $zbp->Config('txdida')->yclad;  ?>
                </dl>
            </div>
            <div class="clear"></div>
        </div>


        <?php  include $this->GetTemplate('footer');  ?>

        <?php 
        }
         ?>  


