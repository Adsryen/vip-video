<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;">傻逼不要扒皮</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的电脑发送超级病毒！
</div>';die();?>
{* Template Name:会员中心文章管理页模板 *} 
{template:header}
{if $user.ID>0}
<div class="user-bg mb20">会员中心</div>
<div class="zh">
    <div class="user-left fl mb20">
        <ul class="user-menu tx-box clearfix">
            {template:user-menu}
        </ul>
    </div>

    <div class="user-right fr mb20">

        <div class="tx-box pd20">
            <h2 class="tx-title1">我发布的评论</h2>
            <ul class="tg-list mb20">
                {foreach $articles as $article}
                <li>
                    <p class="f-12 f-hui mb10">{$article.Time('Y年m月d日 h:i:s')} <a href="{$article.Url}" target="_blank">{$article.Title}</a></p>
                    <h3 class="f-16"><i class="fa fa-quote-left"></i> {$article.Intro}</h3>
                </li>
                {/foreach}
            </ul>
            <div class="pagebar">{template:pagebar}</div>
        </div>

    </div>
</div>
{else}

{template:error}

{/if}
{template:footer1}
