
<?php  /* Template Name:会员中心vip页模板 */  ?> 
<?php  include $this->GetTemplate('header');  ?>
<?php if ($user->ID>0) { ?>
<div class="user-bg mb20">会员中心</div>
<div class="zh">
    <div class="user-left fl mb20">
        <ul class="user-menu tx-box clearfix">
            <?php  include $this->GetTemplate('user-menu');  ?>
        </ul>
    </div>

    <div class="user-right fr mb20">
        <div class="tx-box pd20">
            <div class="user-tab"><a href="<?php  echo $host;  ?>?Paylist" class="on">消费记录</a></div>
                <div class="mb20">
                    <table class="tx-table">
                        <tr class="bgh" style="text-align: left">
                            <th style="width:25%;">订单号</th>
                            <th style="width:45%;">购买商品</th>
                            <th style="width:20%;">下单时间</th>
                            <th style="width:10%;">付款状态</th>
                        </tr>
                        <?php  foreach ( $articles as $article) { ?>
                        <tr>
                            <td><?php  echo $article->OrderID;  ?></td>
                            <td><a href="<?php  echo $article->Url;  ?>"><?php  echo $article->Title;  ?></a></td>
                            <td><?php  echo $article->PostTime;  ?></td>
                            <td><?php if ($article->State) { ?>已支付<?php }else{  ?><a href="<?php  echo $host;  ?>?buy&uid=<?php  echo $article->LogID;  ?>">未支付</a><?php } ?></td>
                        </tr>
                        <?php }   ?>
                    </table>
                </div>
                <div class="pagebar"><?php  include $this->GetTemplate('pagebar');  ?></div> 
        </div>

    </div>
</div>
<?php }else{  ?>

<?php  include $this->GetTemplate('error');  ?>

<?php } ?>
<?php  include $this->GetTemplate('footer1');  ?>
