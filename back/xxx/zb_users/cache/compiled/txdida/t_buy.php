
<?php  /* Template Name:会员中心vip页模板 */  ?> 
<?php  include $this->GetTemplate('header');  ?>
<div class="user-bg mb20">会员中心</div>
<div class="zh">
    <div class="user-left fl mb20">
        <ul class="user-menu tx-box clearfix">
            <?php  include $this->GetTemplate('user-menu');  ?>
        </ul>
    </div>

    <div class="user-right fr mb20">
        <div class="tx-box pd20">
            <div class="user-tab"><a href="<?php  echo $host;  ?>?Paylist">消费记录</a><?php if ($user->Level<=$zbp->Config('tx_media')->userdj) { ?><a href="<?php  echo $host;  ?>?buy"  class="on">支付状态</a><?php } ?></div>
                <div class="data-box pd20 bgh border">
                    <input type="hidden" name="LogID" id="LogID" value="<?php  echo $article->BuyID;  ?>" />
                    <input type="hidden" name="LogUrl" id="LogUrl" value="<?php  echo $article->BuyTUrl;  ?>" />
                    <p class="mb10"><strong>商品名称</strong>：<?php  echo $article->BuyTitle;  ?></p>
                    <p class="mb10"><strong>商品价格</strong>：<span class="tx-red"><?php  echo $article->BuyPrice;  ?></span></p>
                    <p class="mb10"><strong>你的余额</strong>：<span class="tx-red"><?php  echo $user->Price;  ?></span></p>
                    <?php if ($article->buynum) { ?>
                    <h3 class="f-16 tx-red">你已购买</h3>
                    <?php }else{  ?>
                    <?php if ($article->BuyPrice <= $user->Price) { ?>
                    <p><input type="submit" value="付款" class="tx-btn zse" onclick="return Ytbuypay()"/></p>
                    <?php }else{  ?>
                    <h2 class="f-18 tx-red mb10">你的余额不足，请充值</h2>
                    <p><a href="<?php  echo $host;  ?>?Integral" class="tx-btn zse">去充值</a></p>
                    <?php } ?>
                    <?php } ?>
                    
                </div>
        </div>

    </div>
</div>
<?php  include $this->GetTemplate('footer1');  ?>
