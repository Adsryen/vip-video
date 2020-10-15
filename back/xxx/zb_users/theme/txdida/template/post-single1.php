<div class="info-bt"> 
    <h1 class="title">{$article.Title}</h1>
    <small><span><i class="iconfont icon-shizhong"></i> {$article.Time('Y-m-d')} </span><span><i class="iconfont icon-wode"></i> {$article.Author.StaticName}</span><span><i class="iconfont icon-leimu"></i> <a href="{$article.Category.Url}" title="查看{$article.Category.Name}下的更多文章" target="_blank">{$article.Category.Name}</a></span><span><i class="iconfont icon-attention"></i> {$article.ViewNums} ℃</span><span><i class="iconfont icon-liuyan"></i> <a href="{$article.Url}#comment" target="_blank" title="欢迎你对本文发表看法">{$article.CommNums} 评论</a></span></small>
</div>

{if $zbp->Config('txdida')->listad2on=='1'}  
<div class="list-newsad ad">{$zbp->Config('txdida')->listad2}</div>
{/if}
{if $zbp->Config('txdida')->sjgg2on=='1'}
<div class="list-newsad dnwu">{$zbp->Config('txdida')->sjgg2}</div>  
{/if}


<div class="info-zi mb15">
    {$article.Content}
    <p class="info-tag"><strong>Tags：</strong>{foreach $article.Tags as $tag}<a href="{$tag.Url}" target="_blank">{$tag.Name}</a> {/foreach}</p>
    {$zbp->Config('txdida')->fx}
</div>

{if $zbp->Config('txdida')->listad3on=='1'}  
<div class="list-newsad sjwu mb15 ad">{$zbp->Config('txdida')->listad3}</div>
{/if}
{if $zbp->Config('txdida')->sjgg3on=='1'}
<div class="list-newsad mb15 dnwu">{$zbp->Config('txdida')->sjgg3}</div>  
{/if}

<div class="sx mb15">
    <ul>
        <li class="fl">上一篇：{if $article.Prev}
            <a  href="{$article.Prev.Url}" title="{$article.Prev.Title}">{$article.Prev.Title}</a>
            {/if} </li>
        <li class="fr ziyou">下一篇：{if $article.Next}
            <a  href="{$article.Next.Url}" title="{$article.Next.Title}">{$article.Next.Title}</a>
            {/if} </li>
        <div class="clear"></div>
    </ul>
</div>


<div class="xg">
    <h2 class="ybbt">猜你喜欢</h2>
    <ul>
        {foreach GetList(10,null,null,null,null,null,array('is_related'=>$article.ID)) as $related}
        <li><span>{$related.Time('Y-m-d')}</span><i class="iconfont icon-dian"></i> <a href="{$related.Url}">{$related.Title}</a></li>
        {/foreach}
    </ul>
</div>
</div>

<div class="info-com bgb">
    {if !$article.IsLock}
    {template:comments}
    {/if}
</div>