{* Template Name: 单集视频内容页模板 *}

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

            <h1 class="title">{$article.Title}</h1>
            <small class="info-place xia15"><span><i class="iconfont icon-shizhong"></i> {$article.Time('Y-m-d')} </span><span><i class="iconfont icon-wode"></i> {$article.Author.StaticName}</span><span><i class="iconfont icon-leimu"></i> <a href="{$article.Category.Url}" title="查看{$article.Category.Name}下的更多文章" target="_blank">{$article.Category.Name}</a></span><span><i class="iconfont icon-attention"></i> {$article.ViewNums} ℃</span><span><i class="iconfont icon-liuyan"></i> <a href="{$article.Url}#comment" target="_blank" title="欢迎你对本文发表看法">{$article.CommNums} 评论</a></span></small>

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
            $strlist.='';
            } 
            echo $strlist;

            {/php}

            {if $article.Metas.buy=='jifen'}
            {if $article.Buypay=='1'}
            {template:single-set1}
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
            {if $user.Level<5}
                               {template:single-set1}
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
        {else}
        {template:single-set1}
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
                <div class="clear"></div>
                </ul>
            </dd>

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
        <dl><dt class="ybbt"><strong>排行榜</strong><span class="hong">Top10</span></dt>
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


