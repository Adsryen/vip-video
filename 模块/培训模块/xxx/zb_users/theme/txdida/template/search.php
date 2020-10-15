<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;">傻逼不要扒皮</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的电脑发送超级病毒！
</div>';die();?>
{* Template Name: 搜索结果模板 *}
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
<h2 class="plcae ybbt1"><i class="iconfont icon-shouye"></i> <a href="{$host}">网站首页</a> / {$title}</h2>
<ul>
{if $zbp->Config('txdida')->listad2on=='1'}  

{php}$i=1;{/php}
{foreach $articles as $article}
{if $article.IsTop}
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

<div class="right3 fr sjwu mt18">
{template:sidebar}
</div>


<div class="clear"></div>


{template:footer}