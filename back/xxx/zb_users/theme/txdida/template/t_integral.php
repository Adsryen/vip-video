<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;">傻逼不要扒皮</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的电脑发送超级病毒！
</div>';die();?>
{* Template Name:会员中心vip页模板 *} 
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
            <div class="user-tab"><a href="{$host}?Upgrade">购买VIP</a><a href="{$host}?Integral" class="on">积分充值</a></div>
            <div class="pd20 bgh border mb20">
                <h3 class="f-18 mb10"><span class="mr10">你的积分：{$user.Price}</span></h3>
                <p class="f-hui">{if $zbp.Config('YtUser').integral_text}{$zbp.Config('YtUser').integral_text}{else}暂无说明{/if}</p> 
            </div>  
            <div class="data-box" >
                <p class="mb10">
                    <input required="required" type="text" name="invitecode" class="tx-input"  placeholder="请输入你获得的积分充值卡号"/><i>充值卡号(*)</i>
                </p>
                <p class="input-ma mb10">
                    <input required="required" type="text" name="verifycode" class="tx-input" placeholder="验证码" />{$article.verifycode}
                </p>
                <p>
                    <input type="submit" value="提交" class="tx-btn zse" onclick="return Integral()" />   
                </p> 
            </div>
                         
        </div>

    </div>
</div>
{template:footer1}
