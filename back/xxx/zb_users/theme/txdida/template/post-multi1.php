{php}$description = preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),120)).'...');{/php}
<li>
    <a href="{$article.Url}" title="{$article.Title}" target="_blank"  class="list-tu {if $zbp->CheckPlugin('IMAGE')}{else}img-box-slt1{/if}"><img src="{txdida_FirstIMG($article,$article,160,115)}"  alt="{$article.Title}" /></a>  
    <h2><a href="{$article.Url}" title="{$article.Title}" target="_blank">{$article.Title}</a></h2>
    <p>{$description}</p> 
    <small class="sjwu"><span><i class="iconfont icon-shizhong"></i> {$article.Time('Y-m-d')} </span><span><i class="iconfont icon-wode"></i> {$article.Author.StaticName}</span><span><i class="iconfont icon-leimu"></i> <a href="{$article.Category.Url}" title="查看{$article.Category.Name}下的更多文章" target="_blank">{$article.Category.Name}</a></span><span><i class="iconfont icon-attention"></i> {$article.ViewNums} ℃</span><span><i class="iconfont icon-liuyan"></i> <a href="{$article.Url}#comment" target="_blank" title="欢迎你对本文发表看法">{$article.CommNums} 评论</a></span></small>
    <div class="clear"></div>
</li>