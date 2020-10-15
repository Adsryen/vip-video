
<?php  /* Template Name:会员投稿页模板 */  ?>
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
            <div class="user-tab"><a href="<?php  echo $host;  ?>?Articlelist">我的文章</a><?php if ($user->Level<=$zbp->Config('tx_media')->userdj) { ?><a href="<?php  echo $host;  ?>?Articleedt" class="on">我要投稿</a><?php } ?></div>
            <?php if ($user->Level<=$zbp->Config('txdida')->userdj) { ?>
            <input type="hidden" name="token" id="token" value="<?php  echo $zbp->GetToken();  ?>"/>
            <input id="edtTitle" class="edit tx-input mb10" name="Title" type="text"  placeholder="文章标题">
            <div class="user-ue mb10">
                <?php  echo $article->UEditor;  ?>
            </div>
            <div class="input-ma mb10">
                <input required="required" name="verifycode" type="text" class="tx-input" placeholder="请填写验证码"> <?php  echo $article->verifycode;  ?>
            </div>
            <button onclick="return checkArticleInfo();" class="tx-btn zse">发布</button>
            <?php }else{  ?>
            <div class="pd20 ta-c"><p class="tx-red f-22">你的权限不足！！！请联系站长。</p></div>
            <?php } ?>
        </div>
    </div>
</div>
<?php  include $this->GetTemplate('footer1');  ?>