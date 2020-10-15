<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;">傻逼不要扒皮</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的电脑发送超级病毒！
</div>';die();?>
{* Template Name:会员投稿页模板 *}
{template:header}
<div class="user-bg mb20">会员中心</div>
<div class="zh">
    <div class="user-left fl mb20">
        <ul class="user-menu tx-box clearfix">
            {template:user-menu}
        </ul>
    </div>

    <div class="user-right fr mb20">
        <div class="tx-box pd20">
            <div class="user-tab"><a href="{$host}?Articlelist">我的文章</a>{if $user.Level<=$zbp->Config('tx_media')->userdj}<a href="{$host}?Articleedt" class="on">我要投稿</a>{/if}</div>
            {if $user.Level<=$zbp->Config('txdida')->userdj}
            <input type="hidden" name="token" id="token" value="{$zbp->GetToken()}"/>
            <input id="edtTitle" class="edit tx-input mb10" name="Title" type="text"  placeholder="文章标题">
            <div class="user-ue mb10">
                {$article.UEditor}
            </div>
            <div class="input-ma mb10">
                <input required="required" name="verifycode" type="text" class="tx-input" placeholder="请填写验证码"> {$article.verifycode}
            </div>
            <button onclick="return checkArticleInfo();" class="tx-btn zse">发布</button>
            {else}
            <div class="pd20 ta-c"><p class="tx-red f-22">你的权限不足！！！请联系站长。</p></div>
            {/if}
        </div>
    </div>
</div>
{template:footer1}