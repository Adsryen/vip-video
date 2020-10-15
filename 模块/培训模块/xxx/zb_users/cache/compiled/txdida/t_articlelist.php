
<?php  /* Template Name:会员中心文章管理页模板 */  ?> 


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
            <div class="user-tab"><a href="<?php  echo $host;  ?>?Articlelist" class="on">我的文章</a><?php if ($user->Level<=$zbp->Config('txdida')->userdj) { ?><a href="<?php  echo $host;  ?>?Articleedt">我要投稿</a><?php } ?></div>
            <ul class="tg-list mb20">
                <?php  foreach ( $articles as $article) { ?>
                <li>
                    <h3 class="f-16 i22 mb10"><i class="iconfont icon-yinyong1"></i> <a href="<?php  echo $article->Url;  ?>" target="_blank"><?php  echo $article->Title;  ?></a></h3>
                    <p class="f-hui1 f-12">
                        <span><i class="fa fa-clock-o"></i> <?php  echo $article->Time();  ?></span>
                        <span><i class="fa fa-eye"></i> <?php  echo $article->ViewNums;  ?></span>
                        <span><i class="fa fa-comments-o"></i> <?php  echo $article->CommNums;  ?></span>
                    </p>
                </li>
                <?php }   ?>
            </ul>
            <div class="pagebar"><?php  include $this->GetTemplate('pagebar');  ?></div>
        </div>

    </div>
</div>
<?php }else{  ?>

<?php  include $this->GetTemplate('error');  ?>

<?php } ?>
<?php  include $this->GetTemplate('footer1');  ?>


