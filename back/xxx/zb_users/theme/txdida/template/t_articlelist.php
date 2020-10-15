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
            <div class="user-tab"><a href="{$host}?Articlelist" class="on">我的文章</a>{if $user.Level<=$zbp->Config('txdida')->userdj}<a href="{$host}?Articleedt">我要投稿</a>{/if}</div>
            <ul class="tg-list mb20">
                {foreach $articles as $article}
                <li>
                    <h3 class="f-16 i22 mb10"><i class="iconfont icon-yinyong1"></i> <a href="{$article.Url}" target="_blank">{$article.Title}</a></h3>
                    <p class="f-hui1 f-12">
                        <span><i class="fa fa-clock-o"></i> {$article.Time()}</span>
                        <span><i class="fa fa-eye"></i> {$article.ViewNums}</span>
                        <span><i class="fa fa-comments-o"></i> {$article.CommNums}</span>
                    </p>
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


