{* Template Name: 首页模板 *}
{template:header}

{if $zbp->Config('txdida')->flashon=='1'}
<div class="banner sjwu">
    <div class="bd">
        <ul>
            {$zbp->Config('txdida')->flash}
        </ul>
        <div class="zh"> 
            <a class="prev" href="javascript:void(0)"><i class="iconfont icon-xiangzuo1"></i></a> 
            <a class="next" href="javascript:void(0)"><i class="iconfont icon-xiangyou1"></i></a> 
        </div>
    </div>
    <div class="hd"><ul></ul></div>
</div>
<script type="text/javascript">
    jQuery(".banner .bd").hover(function(){ jQuery(this).addClass("bdOn") },function(){ jQuery(this).removeClass("bdOn") });
    jQuery(".banner").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, interTime:3500, });</script>
{else}
<div class="mb15"></div>
{/if}



<div class="main zh">
    {php}$flids = explode(',',$zbp->Config('txdida')->cmsid); {/php}
    {foreach $flids as $flid}
    {/foreach}

    {if $zbp->Config('txdida')->listadon=='1'}
    <div class="list-b xia15 ad">{$zbp->Config('txdida')->listad}</div>
    {/if}

    {if $zbp->Config('txdida')->sjggon=='1'}
    <div class="list-b xia15 dnwu">{$zbp->Config('txdida')->sjgg}</div>
    {/if}

    {if $zbp->Config('txdida')->newscmskg=='1'}
    <div class="index-cms">
        {php}$flids = explode(',',$zbp->Config('txdida')->newscms);{/php}
        {foreach $flids as $flid}
        <dl class="bgb">
            {if isset($categorys[$flid])}<dt class="ybbt1"><a class="more1 fr"  href="{$categorys[$flid].Url}" title="查看更多 {$categorys[$flid].Name} 文章" target="_blank"><i class="iconfont icon-leimu"></i></a> <a href="{$categorys[$flid].Url}" target="_blank">{$categorys[$flid].Name}</a></dt>{/if}
            <dd>
                <ul>
                    {foreach GetList(10,$flid) as $key=>$article}
                    <li><span>{$article.Time('m-d')}</span><i class="iconfont icon-xiangyou1"></i>  <a href="{$article.Url}" title="{$article.Title}" target="_blank">{$article.Title}</a></li>
                    {/foreach}
                </ul>
            </dd>
        </dl>
        {/foreach}
        <div class="clear"></div>
    </div> 
    {/if}

    {template:footer}