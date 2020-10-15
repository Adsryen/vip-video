{* Template Name: 主题自带seo设置模板 *}
{if $type=='article'}
<title>{$title}-{$article.Category.Name}-{$name}</title>
<meta name="keywords" content="{if $article.Metas.nrgjc}{$article.Metas.nrgjc}{else}{foreach $article.Tags as $tag}{$tag.Name},{/foreach}{/if}" />
{php}$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');{/php}
<meta name="description" content="{if $article.Metas.nrms}{$article.Metas.nrms}{else}{$description},{$name}{/if}" />
{elseif $type=='page'}
<title>{$title}-{$name}</title>
<meta name="keywords" content="{if $article.Metas.nrgjc}{$article.Metas.nrgjc}{else}{$title}{/if}" />
{php}$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');{/php}
<meta name="description" content="{if $article.Metas.nrms}{$article.Metas.nrms}{else}{$description},{$name}{/if}" />
<meta name="author" content="{$article.Author.StaticName}">
{elseif $type=='index'}
<title>{$name}{if $page>'1'}-第{$pagebar.PageNow}页{/if}-{$subname}</title>
<meta name="Keywords" content="{$zbp->Config('txdida')->gjc}">
<meta name="description" content="{$zbp->Config('txdida')->ms}">
{elseif $type=='category'}
<title>{if $category.Metas.flbt}{$category.Metas.flbt}{else}{$title}{/if}-{$name}{if $page>'1'}-第{$pagebar.PageNow}页{/if}</title>
<meta name="Keywords" content="{if $category.Metas.flgjc}{$category.Metas.flgjc}{else}{$title},{$name}{/if}">
<meta name="description" content="{if $category.Intro}{$category.Intro}{else}{$title},{$name}{/if}">
{elseif $type=='tag'}
<title>{if $tag.Metas.title}{$tag.Metas.title}{else}{$title}-{$name}{if $page>'1'}-第{$pagebar.PageNow}页{/if}{/if}</title>
<meta name="Keywords" content="{if $tag.Metas.keywords}{$tag.Metas.keywords}{else}{$title},{$name}{/if}">
<meta name="description" content="{if $tag.Intro}{$tag.Intro}{else}{$title},{$name}{/if}">
{else}
<title>{$title}-{$name}</title>
{/if}