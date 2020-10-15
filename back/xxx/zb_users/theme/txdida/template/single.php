
{* Template Name: 默认内容页模板 *}
{php}
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

                          {/php}

<!DOCTYPE html> 
<html> 
    <head> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Content-Language" content="{$language}" />
        {php}$d=$arraymetastxt[$showid];{/php}
        {if $zbp->Config('txdida')->seokg=='1'}
        <title>{$title}{if $listi>'1'}{$article.Metas.$d}{/if}-{$article.Category.Name}-{$name}</title>
        <meta name="keywords" content="{if $article.Metas.nrgjc}{$article.Metas.nrgjc}{else}{foreach $article.Tags as $tag}{$tag.Name},{/foreach}{/if}" />
        {php}$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');{/php}
        <meta name="description" content="{if $article.Metas.nrms}{$article.Metas.nrms}{else}{$description},{$name}{/if}" />
        {else}
        <title>{$title}-{$name}</title>
        {/if}
        <link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/iconfont/iconfont.css" type="text/css" media="all"/>
        <link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/{$style}.css" type="text/css" media="all"/>
        <link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/dplayer/DPlayer.min.css" type="text/css" media="all"/>
        <script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
        <script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
        <script src="{$host}zb_users/theme/{$theme}/script/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
        <script src="{$host}zb_users/theme/{$theme}/script/jquery.nicescroll.min.js" type="text/javascript"></script>
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


        <div class="clearfix" id="nav">
            <a href="javascript:void(0)" id="pull"><i class="iconfont icon-caidan icon-guanbi1"></i></a>
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
        <a href="javascript:void(0)" class="home"><i class="iconfont icon-sousuo icon-guanbi1"></i></a>
        <div class="sjss ss" style="display:none;"><form name="search" method="post" action="{$host}zb_system/cmd.php?act=search"><input name="q" size="11" type="text"> <input value="搜索" type="submit"></form></div>
        </div>



    <div class="h60"></div>	



    <div class="main zh">
        {if $zbp->Config('txdida')->listadon=='1'}
        <div class="list-b s15 ad">{$zbp->Config('txdida')->listad}</div>  
        {/if}

        {if $zbp->Config('txdida')->sjggon=='1'}
        <div class="list-b dnwu">{$zbp->Config('txdida')->sjgg}</div>  
        {/if}

        <div class="syqk s15 ys{$article.Category.ID}">
            <div class="left fl">
                <div class="place"><i class="iconfont icon-shouye"></i> <a href="{$host}">网站首页</a>{if $type=='article'}
                    {php}
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
                    {/php} / 正文


                    {else} / {$title}{/if}
                </div>    

                <h1 class="title">{$article.Title} {if $listi>'1'}[{$article.Metas.$d}]{/if}</h1>
                <small class="small-span"><span><i class="iconfont icon-shizhong"></i> {$article.Time('Y-m-d')} </span><span><i class="iconfont icon-wode"></i> {$article.Author.StaticName}</span><span><i class="iconfont icon-leimu"></i> <a href="{$article.Category.Url}" title="查看{$article.Category.Name}下的更多文章" target="_blank">{$article.Category.Name}</a></span><span><i class="iconfont icon-attention"></i> {$article.ViewNums} ℃</span><span><i class="iconfont icon-liuyan"></i> <a href="{$article.Url}#comment" target="_blank" title="欢迎你对本文发表看法">{$article.CommNums} 评论</a></span></small>

                {if $article.Metas.buy=='jifen'}
                {if $article.Buypay=='1'}
                {template:single-set}
                {else}
                <div class="buy-form buy-lock mb20">
                    <i class="iconfont icon-lock"></i>
                    {if $user.ID>0}
                    <p>此内容为收费内容，请点击购买按钮在线购买。</p>
                    <input type="hidden" name="LogID" id="LogID" value="{$article.ID}" /> 
                    <input type="submit" value="购买" onclick="return Ytbuy()" class="tx-btn zse"/>
                    {else}
                    <p>此内容为收费内容，请登录后在线购买。</p>
                    <a href="{$host}?Login" class="tx-btn zse">请登录</a>
                    {/if}
                </div>
                {/if}


                {elseif $article.Metas.buy=='vip'}
                {if $user.Level < 5}
                                    {template:single-set}
                                    {else}
                                    <div class="buy-form buy-lock mb20">
                <i class="iconfont icon-lock"></i>
                {if $user.ID>0}
                <p>此内容为vip可见内容，请先升级为本站的vip。</p>
                <a href="{$host}?Upgrade" class="tx-btn zse">购买vip</a>
                {else}
                <p>此内容为收费内容，请登录后在线购买。</p>
                <a href="{$host}?Login" class="tx-btn zse">请登录</a>
                {/if}
            </div>
            {/if}

            {elseif $article.Metas.buy=='dengl'}
            {if $user.ID>0}
            {template:single-set}
            {else}
            <div class="buy-form buy-lock mb20">
                <i class="iconfont icon-lock"></i>
                <p>此内容需要登录后才能看到，请登录或注册。</p>
                <a href="{$host}?Login" class="tx-btn zse">请登录</a>
            </div>
            {/if}

            {else}
            {template:single-set}
            {/if}

            <div class="dianzan xia20">
                {if $zbp->CheckPlugin('sf_praise_sdk')}
                <span class="fl"><a href="javascript:;"  title="点赞" class="thumbs-up r t sf-praise-sdk"  sfa='click' data-postid='{$sf_praise_sdk.postid}' data-value='1'><i class="iconfont icon-zantong"></i> <span class="sf-praise-sdk" sfa='num' data-value='1' data-postid='{$sf_praise_sdk.postid}'>{$sf_praise_sdk.value1}</span></a> 喜欢就点赞</span>
                {/if}
                <span class="fl">现在，这部片子已经被播放了 {$article.ViewNums} 次</span>
                <span class="fenx fl">{$zbp->Config('txdida')->fx}</span>
                <div class="clear"></div>
            </div>


            <dl class="sylb list-dis"><dt class="ybbt"><strong>我猜你或许还喜欢以下内容</strong></dt>
                <dd class="xia15"><ul>
                    {foreach GetList(5,null,null,null,null,null,array('is_related'=>$article.ID)) as $related}
                    <li>
                        <a href="{$related.Url}" target="_blank" class="img-x {if $zbp->CheckPlugin('IMAGE')}{else}img-box-slt{/if}">
                            <img src="{txdida_FirstIMG($related,$related,176,230)}" alt="{$related.Title}"/>
                            <div class="fuc"><i class="iconfont icon-shipin2"></i></div>
                            {if $related.Metas.qingxi}<em>{$related.Metas.qingxi}</em>{/if}
                            {if $related.Metas.shijian}<small>{$related.Metas.shijian}</small>{/if}
                        </a>
                        <h2><a href="{$related.Url}" target="_blank">{$related.Title}</a></h2>
                    </li>
                    {/foreach}
                    <div class="clear"></div></ul></dd>

                {if $zbp->Config('txdida')->listad1on=='1'}
                <div class="ad xia15">{$zbp->Config('txdida')->listad1}</div>
                {/if}

                {if $zbp->Config('txdida')->sjgg1on=='1'}
                <div class="xia15 dnwu">{$zbp->Config('txdida')->sjgg1}</div>  
                {/if}

            </dl>
            {if !$article.IsLock}
            {template:comments}
            {/if}

        </div>


        <div class="right fr">
            {if $listi=='1'}

            {elseif $listi>='10'}
            <dl class="xia15"><dt class="ybbt xia15"><strong>剧集列表</strong></dt><dd>
                <div class="bds" id="scroll_bd">
                    <div class="top" id="bds">
                        <ul id="scroll_ul">
                            {php}
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

                            {/php}

                        </ul>
                    </div>
                    <div class="scroll" id="scroll">
                        <p id="p"></p>
                    </div>
                </div></dd></dl>
            <script>
                $(document).ready(function() {    
                    $("#scroll_bd").niceScroll("#scroll_ul",{cursorcolor:"#{$zbp->Config('txdida')->zs}",cursorwidth:10,cursorborderradius:1,cursorborder: "1px solid #{$zbp->Config('txdida')->zs}",cursoropacitymin: 1,boxzoom:true});
                });
            </script>


            {else}
            <dl class="xia15"><dt class="ybbt xia15"><strong>剧集列表</strong></dt><dd>
                <ul class="txdidasl">
                    {php}
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

                    {/php}

                </ul>
                </dd></dl>
            {/if}

            <dl>
                <dt class="ybbt"><strong>排行榜</strong><span class="hong">Top10</span></dt>
                <dd class="ad xia10 s15">{$article.Category.Metas.xgg}</dd>
                <dd class="xia15">
                    <ul class="phb">
                        {php}
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


                        {/php}
                    </ul>
                </dd>

                {$zbp->Config('txdida')->yclad}
            </dl>
        </div>
        <div class="clear"></div>
    </div>

    {template:footer}


    {php}
    }else{
    {/php}


    {template:header}

    <div class="main zh">
        {if $zbp->Config('txdida')->listadon=='1'}
        <div class="list-b s15 ad">{$zbp->Config('txdida')->listad}</div>  
        {/if}
        {if $zbp->Config('txdida')->sjggon=='1'}
        <div class="list-b dnwu">{$zbp->Config('txdida')->sjgg}</div>  
        {/if}


        <div class="syqk s15 ys{$article.Category.ID}">
            <div class="left fl">
                {if $article.Type==ZC_POST_TYPE_ARTICLE}
                {template:post-single}
                {else}
                {template:post-page}
                {/if}
            </div>


            <div class="right fr">
                <dl>
                    <dt class="ybbt"><strong>排行榜</strong><span class="hong">Top10</span></dt>
                    <dd class="ad xia10 s15">{$article.Category.Metas.xgg}</dd>
                    <dd class="xia15"><ul class="phb">
                        {php}
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

                        {/php}
                        </ul></dd>

                    {$zbp->Config('txdida')->yclad}
                </dl>
            </div>
            <div class="clear"></div>
        </div>


        {template:footer}

        {php}
        }
        {/php}  


