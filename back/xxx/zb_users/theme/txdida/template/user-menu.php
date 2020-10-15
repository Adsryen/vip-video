{* Template Name: 主题内置模板勿选！！ *}
<li><a href="{$host}?User"><i class="iconfont icon-shouye"></i> 用户首页</a></li>
<li><a href="{$host}?Articlelist"><i class="iconfont icon-text"></i> 文章管理</a></li>
<li><a href="{$host}?Commentlist"><i class="iconfont icon-liuyan"></i> 评论管理</a></li>
{if $zbp->Config('txdida')->uservip == '1'}
<li><a href="{$host}?Upgrade"><i class="iconfont icon-refund"></i> 充值中心</a></li>
<li><a href="{$host}?Paylist"><i class="iconfont icon-gouwuche"></i> 订单管理</a></li>
{/if}