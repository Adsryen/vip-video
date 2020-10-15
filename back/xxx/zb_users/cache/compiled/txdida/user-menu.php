<?php  /* Template Name: 主题内置模板勿选！！ */  ?>
<li><a href="<?php  echo $host;  ?>?User"><i class="iconfont icon-shouye"></i> 用户首页</a></li>
<li><a href="<?php  echo $host;  ?>?Articlelist"><i class="iconfont icon-text"></i> 文章管理</a></li>
<li><a href="<?php  echo $host;  ?>?Commentlist"><i class="iconfont icon-liuyan"></i> 评论管理</a></li>
<?php if ($zbp->Config('txdida')->uservip == '1') { ?>
<li><a href="<?php  echo $host;  ?>?Upgrade"><i class="iconfont icon-refund"></i> 充值中心</a></li>
<li><a href="<?php  echo $host;  ?>?Paylist"><i class="iconfont icon-gouwuche"></i> 订单管理</a></li>
<?php } ?>