<?php  /* Template Name: 首页模板 */  ?>
<?php  include $this->GetTemplate('header');  ?>

<?php if ($zbp->Config('txdida')->flashon=='1') { ?>
<div class="banner sjwu">
    <div class="bd">
        <ul>
            <?php  echo $zbp->Config('txdida')->flash;  ?>
        </ul>
        <div class="zh"> 
            <a class="prev" href="javascript:void(0)"><i class="iconfont icon-xiangzuo1"></i></a> 
            <a class="next" href="javascript:void(0)"><i class="iconfont icon-xiangyou1"></i></a> 
        </div>
    </div>
    <div class="hd"><ul></ul></div>
</div>
<script type="text/javascript">
    jQuery(".banner .bd").hover(function(){ jQuery(this).addClass("bdOn") },function(){ jQuery(this).removeClass("bdOn") });
    jQuery(".banner").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, interTime:3500, });</script>
<?php }else{  ?>
<div class="mb15"></div>
<?php } ?>



<div class="main zh">
    <?php $flids = explode(',',$zbp->Config('txdida')->cmsid);  ?>
    <?php  foreach ( $flids as $flid) { ?>
    <?php }   ?>

    <?php if ($zbp->Config('txdida')->listadon=='1') { ?>
    <div class="list-b xia15 ad"><?php  echo $zbp->Config('txdida')->listad;  ?></div>
    <?php } ?>

    <?php if ($zbp->Config('txdida')->sjggon=='1') { ?>
    <div class="list-b xia15 dnwu"><?php  echo $zbp->Config('txdida')->sjgg;  ?></div>
    <?php } ?>

    <?php if ($zbp->Config('txdida')->newscmskg=='1') { ?>
    <div class="index-cms">
        <?php $flids = explode(',',$zbp->Config('txdida')->newscms); ?>
        <?php  foreach ( $flids as $flid) { ?>
        <dl class="bgb">
            <?php if (isset($categorys[$flid])) { ?><dt class="ybbt1"><a class="more1 fr"  href="<?php  echo $categorys[$flid]->Url;  ?>" title="查看更多 <?php  echo $categorys[$flid]->Name;  ?> 文章" target="_blank"><i class="iconfont icon-leimu"></i></a> <a href="<?php  echo $categorys[$flid]->Url;  ?>" target="_blank"><?php  echo $categorys[$flid]->Name;  ?></a></dt><?php } ?>
            <dd>
                <ul>
                    <?php  foreach ( GetList(10,$flid) as $key=>$article) { ?>
                    <li><span><?php  echo $article->Time('m-d');  ?></span><i class="iconfont icon-xiangyou1"></i>  <a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank"><?php  echo $article->Title;  ?></a></li>
                    <?php }   ?>
                </ul>
            </dd>
        </dl>
        <?php }   ?>
        <div class="clear"></div>
    </div> 
    <?php } ?>

    <?php  include $this->GetTemplate('footer');  ?>