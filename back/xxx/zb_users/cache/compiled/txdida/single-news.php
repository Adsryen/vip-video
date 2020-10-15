<?php  /* Template Name: 新闻资讯内容页模板 */  ?>
<?php  include $this->GetTemplate('header');  ?>
<div class="main zh">
<?php if ($zbp->Config('txdida')->listadon=='1') { ?>
<div class="list-b s15 ad"><?php  echo $zbp->Config('txdida')->listad;  ?></div>  
<?php } ?>
<?php if ($zbp->Config('txdida')->sjggon=='1') { ?>
<div class="list-b dnwu"><?php  echo $zbp->Config('txdida')->sjgg;  ?></div>  
<?php } ?>

<div class="left3 fl mt18">
<div class="info bgb">
<h2 class="place ybbt1"><i class="iconfont icon-shouye"></i> <a href="<?php  echo $host;  ?>">网站首页</a><?php if ($type=='article') { ?>
    <?php 
    $html='';
    function navcate($id){
    global $html;
    $cate = new Category;
    $cate->LoadInfoByID($id);
    $html =' / <a href="' .$cate->Url.'" title="查看' .$cate->Name. '中的全部文章">' .$cate->Name. '</a> '.$html;
    if(($cate->ParentID)>0){navcate($cate->ParentID);}
    }
    navcate($article->Category->ID);
    global $html;
    echo $html;
     ?> / 正文


    <?php }else{  ?> / <?php  echo $title;  ?><?php } ?></h2>
<?php if ($article->Type==ZC_POST_TYPE_ARTICLE) { ?>
<?php  include $this->GetTemplate('post-single1');  ?>
<?php }else{  ?>
<?php  include $this->GetTemplate('post-page');  ?>
<?php } ?>
</div>
<?php  include $this->GetTemplate('footer');  ?>