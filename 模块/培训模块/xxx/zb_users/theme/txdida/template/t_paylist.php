<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;">傻逼不要扒皮</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的电脑发送超级病毒！
</div>';die();?>
{* Template Name:会员中心vip页模板 *} 
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
            <div class="user-tab"><a href="{$host}?Paylist" class="on">消费记录</a></div>
                <div class="mb20">
                    <table class="tx-table">
                        <tr class="bgh" style="text-align: left">
                            <th style="width:25%;">订单号</th>
                            <th style="width:45%;">购买商品</th>
                            <th style="width:20%;">下单时间</th>
                            <th style="width:10%;">付款状态</th>
                        </tr>
                        {foreach $articles as $article}
                        <tr>
                            <td>{$article.OrderID}</td>
                            <td><a href="{$article.Url}">{$article.Title}</a></td>
                            <td>{$article.PostTime}</td>
                            <td>{if $article.State}已支付{else}<a href="{$host}?buy&uid={$article.LogID}">未支付</a>{/if}</td>
                        </tr>
                        {/foreach}
                    </table>
                </div>
                <div class="pagebar">{template:pagebar}</div> 
        </div>

    </div>
</div>
{else}

{template:error}

{/if}
{template:footer1}
