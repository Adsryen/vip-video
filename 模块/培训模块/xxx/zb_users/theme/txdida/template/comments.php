{* Template Name:所有评论模板 *}
{if $socialcomment}
{$socialcomment}
{else}

<div class="tx-comments" id="comments">
    {if $article.CommNums==0}
    <h4>本文暂时没有评论，来添加一个吧(●'◡'●)</h4>
    {elseif $article.CommNums>0}
    <h3>已有{$article.CommNums}位网友发表了看法：</h3>
    {/if}


    <label id="AjaxCommentBegin"></label>
    <!--评论输出-->
    {foreach $comments as $key => $comment}
    {template:comment}
    {/foreach}
    
    {if $article.CommNums>$zbp->Config('system')->ZC_COMMENTS_DISPLAY_COUNT}
    <!--评论翻页条输出-->
    <div class="pagebar commentpagebar">
        {template:pagebar}
    </div>
    {/if}
    <label id="AjaxCommentEnd"></label>
</div>
<!--评论框-->
{template:commentpost}

{/if}