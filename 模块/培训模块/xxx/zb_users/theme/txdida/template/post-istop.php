<li>
    <a href="{$article.Url}" target="_blank" class="img-x {if $zbp->CheckPlugin('IMAGE')}{else}img-box-slt{/if}">
        <img src="{txdida_FirstIMG($article,$article,176,230)}" alt="{$article.Title}"/>
        <div class="fuc"><i class="iconfont icon-shipin2"></i></div>
        {if $article.Metas.qingxi}<em>{$article.Metas.qingxi}</em>{/if}
        {if $article.Metas.shijian}<small>{$article.Metas.shijian}</small>{/if}
    </a>
    <h2><a href="{$article.Url}" target="_blank">{$article.Title}</a></h2>
</li>