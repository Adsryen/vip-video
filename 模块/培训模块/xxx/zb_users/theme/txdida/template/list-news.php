{* Template Name: 新闻资讯栏目页模板 *}
{template:header}
<div class="main zh">
    {if $zbp->Config('txdida')->listadon=='1'}
    <div class="list-b s15 ad">{$zbp->Config('txdida')->listad}</div>  
    {/if}

    {if $zbp->Config('txdida')->sjggon=='1'}
    <div class="list-b dnwu">{$zbp->Config('txdida')->sjgg}</div>  
    {/if}

    <div class="left3 fl mt18">

        <div class="list bgb ">
            <h2 class="plcae ybbt1"><i class="iconfont icon-shouye"></i> <a href="{$host}">网站首页</a>{if $type=='category'}
                {php}
                $html='';
                function navcate($id){
                global $html;
                $cate = new Category;
                $cate->LoadInfoByID($id);
                $html =' / <a href="' .$cate->Url.'" title="查看' .$cate->Name. '中的全部文章">' .$cate->Name. '</a> '.$html;
                if(($cate->ParentID)>0){navcate($cate->ParentID);}
                }
                navcate($category->ID);
                global $html;
                echo $html;
                {/php}

                {else} / {$title}{/if}
            </h2>
            <ul>
                {if $zbp->Config('txdida')->listad2on=='1'}  

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

                {else}

                {foreach $articles as $article}
                {if $article.IsTop}
                {template:post-multi1}
                {else}
                {template:post-multi1}
                {/if}
                {/foreach}

                {/if}

                {if $zbp->Config('txdida')->listad3on=='1'}  
                <li class="list-newsad ad">{$zbp->Config('txdida')->listad3}</li>
                {/if}
                {if $zbp->Config('txdida')->sjgg3on=='1'}
                <li class="list-newsad dnwu">{$zbp->Config('txdida')->sjgg3}</li>  
                {/if}

                <div class="clear"></div>
            </ul>

            <div class="pagebar">{template:pagebar}<div class="clear"></div></div>
            <div class="clear"></div>
        </div>
    </div>

    {template:footer}