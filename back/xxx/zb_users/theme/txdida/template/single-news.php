{* Template Name: 新闻资讯内容页模板 *}
{template:header}
<div class="main zh">
{if $zbp->Config('txdida')->listadon=='1'}
<div class="list-b s15 ad">{$zbp->Config('txdida')->listad}</div>  
{/if}
{if $zbp->Config('txdida')->sjggon=='1'}
<div class="list-b dnwu">{$zbp->Config('txdida')->sjgg}</div>  
{/if}

<div class="left3 fl mt18">
<div class="info bgb">
<h2 class="place ybbt1"><i class="iconfont icon-shouye"></i> <a href="{$host}">网站首页</a>{if $type=='article'}
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


    {else} / {$title}{/if}</h2>
{if $article.Type==ZC_POST_TYPE_ARTICLE}
{template:post-single1}
{else}
{template:post-page}
{/if}
</div>
{template:footer}