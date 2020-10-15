{* Template Name: 默认栏目页模板 *}
{template:header}

<div class="main zh">
    {if $zbp->Config('txdida')->listadon=='1'}
    <div class="list-b s15 ad">{$zbp->Config('txdida')->listad}</div>  
    {/if}
    {if $zbp->Config('txdida')->sjggon=='1'}
    <div class="list-b dnwu">{$zbp->Config('txdida')->sjgg}</div>  
    {/if}


    {if $type=='category'}
    <div class="syqk s15 ys{$category.ID}">
        <div class="left fl">
            <dl class="sylb"><dt class="ybbt"><strong>{$title}</strong>{if $category.SubCategorys} {php}
                $str='';
                $where=array(array('=','cate_ParentID',$category->ID));        
                $array=$zbp->GetCategoryList(null,$where,array('cate_Order'=>'ASC'),null,null);
                foreach ($array as $cate){
                $str.='<a href="'.$cate->Url.'"  target="_blank">'.$cate->Name.'</a>';
                }
                echo $str;
                {/php}{/if}</dt>
                <dd>
                    <ul class="clearfix">
                        {if $zbp->Config('txdida')->listad1on=='1'}

                        {php}$i=1;{/php}
                        {foreach $articles as $article}
                        {if $article.IsTop}
                        {template:post-istop}
                        {elseif $i==6}
                        <li class="list-gg1">{$zbp->Config('txdida')->listad1}</li>
                        {else}
                        {template:post-multi}
                        {/if}
                        {php}$i++;{/php}

                        {/foreach}

                        {else}
                        {foreach $articles as $article}

                        {if $article.IsTop}
                        {template:post-istop}
                        {else}
                        {template:post-multi}
                        {/if}

                        {/foreach}
                        {/if}
                    </ul>
                </dd>
            </dl>


            <div class="pagebar">{template:pagebar}</div>
        </div>


        <div class="right fr">
            <dl>
                {if $type=='category'}
                <dt class="ybbt"><strong>排行榜</strong><span class="hong">Top10</span></dt>

                <dd class="xia15">
                    <ul class="phb">
                        {php}
                        if($category->RootID=='0'){
                        $tempcid=$category->ID;
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
                        $tempcid=$category->RootID;
                        $where =array(array('=','cate_RootID' ,$tempcid));
                        $order = array('cate_Order' => 'DESC' );
                        $array=$zbp->GetCategoryList(null,$where,$order,null,null);
                        $wherearray=array();
                        $wherearray[]=array('log_CateID',$category->RootID);
                        foreach ($array as $cate){
                        $wherearray[]=array('log_CateID',$cate->ID);
                        }
                        $where=array(
                        array('array',$wherearray),
                        array('=','log_Status','0'),
                        );

                        }

                        $num=10;
                        $order = array('log_ViewNums'=>'DESC');
                        $substr='';
                        $arrayhotarticle=	$zbp->GetArticleList(array('*'),$where,$order,array($num),'');
                        foreach ($arrayhotarticle as $key=>$b3) {
                        $substr.='<li><span class="fr"> '.$b3->ViewNums.'</span><a href="'.$b3->Url.'"> '.$b3->Title.' </a></li>';
                        }
                        echo $substr;
                        {/php}
                    </ul>
                </dd>
                {else}
                <dt class="ybbt xia10"><strong>排行榜</strong><span class="hong">Top10</span></dt>
                <dd class="xia15">
                    <ul class="phb">
                        {php}
                        $order = array('log_ViewNums'=>'DESC');
                        $where = array(array('=','log_Status','0'));
                        $array = $zbp->GetArticleList(array('*'),$where,$order,array(10),'');
                        {/php}
                        {foreach $array as $hotlist}
                        <li><a href="{$hotlist.Url}" title="{$hotlist.Title}">{$hotlist.Title}</a></li>
                        {/foreach}
                    </ul>
                </dd>
                {/if}

                {$zbp->Config('txdida')->yclad}
            </dl>
        </div>
        <div class="clear"></div>
    </div>
    {else}

    <div class="left3 fl mt18">

        <div class="list bgb ">
            <h2 class="ybbt1"><i class="iconfont icon-shouye"></i> <a href="{$host}">网站首页</a> / {$title}</h2>
            <ul>
                {php}$i=1;{/php}
                {foreach $articles as $article}
                {if $article.IsTop}
                {template:post-multi1}
                {elseif $i==3}
                <li class="list-newsad ad">{$zbp->Config('txdida')->listad2}</li>
                {else}
                {template:post-multi1}
                {/if}
                {php}$i++;{/php}
                {/foreach}
            </ul>

            <div class="pagebar">{template:pagebar}</div>
        </div>
    </div>

    <div class="right3 fr sjwu mt18">
        {template:sidebar}
    </div>


    <div class="clear"></div>
    {/if}


    {template:footer}