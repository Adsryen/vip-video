
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
            <div class="user-tab"><a href="<?php  echo $host;  ?>?Upgrade">购买VIP</a><a href="<?php  echo $host;  ?>?Integral" class="on">积分充值</a></div>
            <div class="pd20 bgh border mb20">
                <h3 class="f-18 mb10"><span class="mr10">你的积分：<?php  echo $user->Price;  ?></span></h3>
                <p class="f-hui"><?php if ($zbp->Config('YtUser')->integral_text) { ?><?php  echo $zbp->Config('YtUser')->integral_text;  ?><?php }else{  ?>暂无说明<?php } ?></p> 
            </div>  
            <div class="data-box" >
                <p class="mb10">
                    <input required="required" type="text" name="invitecode" class="tx-input"  placeholder="请输入你获得的积分充值卡号"/><i>充值卡号(*)</i>
                </p>
                <p class="input-ma mb10">
                    <input required="required" type="text" name="verifycode" class="tx-input" placeholder="验证码" /><?php  echo $article->verifycode;  ?>
                </p>
                <p>
                    <input type="submit" value="提交" class="tx-btn zse" onclick="return Integral()" />   
                </p> 
            </div>
                         
        </div>

    </div>
</div>
<?php  include $this->GetTemplate('footer1');  ?>
