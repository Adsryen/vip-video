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
            <div class="user-tab"><a href="{$host}?Paylist">消费记录</a>{if $user.Level<=$zbp->Config('tx_media')->userdj}<a href="{$host}?buy"  class="on">支付状态</a>{/if}</div>
                <div class="data-box pd20 bgh border">
                    <input type="hidden" name="LogID" id="LogID" value="{$article.BuyID}" />
                    <input type="hidden" name="LogUrl" id="LogUrl" value="{$article.BuyTUrl}" />
                    <p class="mb10"><strong>商品名称</strong>：{$article.BuyTitle}</p>
                    <p class="mb10"><strong>商品价格</strong>：<span class="tx-red">{$article.BuyPrice}</span></p>
                    <p class="mb10"><strong>你的余额</strong>：<span class="tx-red">{$user.Price}</span></p>
                    {if $article.buynum}
                    <h3 class="f-16 tx-red">你已购买</h3>
                    {else}
                    {if $article.BuyPrice <= $user.Price}
                    <p><input type="submit" value="付款" class="tx-btn zse" onclick="return Ytbuypay()"/></p>
                    {else}
                    <h2 class="f-18 tx-red mb10">你的余额不足，请充值</h2>
                    <p><a href="{$host}?Integral" class="tx-btn zse">去充值</a></p>
                    {/if}
                    {/if}
                    
                </div>
        </div>

    </div>
</div>
{template:footer1}
