{* Template Name: 封面列表页模板 *}
{template:header}
<div class="mb15"></div>
<div class="main zh">
    {php}
                $str='';
                $where=array(array('=','cate_RootID',$category->ID));        
                $array=$zbp->GetCategoryList(null,$where,array('cate_Order'=>'ASC'),null,null);
                $flids=array();
                foreach ($array as $cate){
                $flids[]=$cate->ID;
                }
                {/php}
                {foreach $flids as $flid}
    <div class="syqk ys{$categorys[$flid].ID}">
        <div class="left fl">
            <dl class="sylb list-dis"><dt class="ybbt"><a href="{$categorys[$flid].Url}" class="more fr f-22" target="_blank"><i class="iconfont icon-leimu"></i></a><strong><a href="{$categorys[$flid].Url}" target="_blank">{$categorys[$flid].Name}</a></strong>    
                {php}
                $str='';
                $where=array(array('=','cate_ParentID',$categorys[$flid]->ID));        
                $array=$zbp->GetCategoryList(null,$where,array('cate_Order'=>'ASC'),null,null);
                foreach ($array as $cate){
                $str.='<a href="'.$cate->Url.'"  target="_blank">'.$cate->Name.'</a>';
                }
                echo $str;
                {/php}</dt>
                <dd>
                    <ul>
                        {foreach txdida_GetArticleCategorys(5,$flid,true) as $key=>$related}
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

                    </ul>
                </dd>

            </dl>

        </div>

        <div class="right fr ysfc">
            <dl><dt class="ybbt"><strong>排行榜</strong><span class="hong">Top9</span></dt>
                <dd>
                    <ul class="phb">
                        {foreach txdidas_GetArticleCategorys(8,$flid,true) as $key=>$related}
                        <li><span class="fr">{$related.ViewNums}</span><a href="{$related.Url}" target="_blank">{$related.Title}</a></li>
                        {/foreach}
                    </ul>
                </dd>
            </dl>
        </div>
        <div class="clear"></div>
    </div>
    {/foreach}
    {template:footer}