
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
            <h2 class="tx-title1">我发布的评论</h2>
            <ul class="tg-list mb20">
                <?php  foreach ( $articles as $article) { ?>
                <li>
                    <p class="f-12 f-hui mb10"><?php  echo $article->Time('Y年m月d日 h:i:s');  ?> <a href="<?php  echo $article->Url;  ?>" target="_blank"><?php  echo $article->Title;  ?></a></p>
                    <h3 class="f-16"><i class="fa fa-quote-left"></i> <?php  echo $article->Intro;  ?></h3>
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
