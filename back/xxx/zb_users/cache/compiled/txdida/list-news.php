<?php  /* Template Name: 新闻资讯栏目页模板 */  ?>
<?php  include $this->GetTemplate('header');  ?>
<div class="main zh">
    <?php if ($zbp->Config('txdida')->listadon=='1') { ?>
    <div class="list-b s15 ad"><?php  echo $zbp->Config('txdida')->listad;  ?></div>  
    <?php } ?>

    <?php if ($zbp->Config('txdida')->sjggon=='1') { ?>
    <div class="list-b dnwu"><?php  echo $zbp->Config('txdida')->sjgg;  ?></div>  
    <?php } ?>

    <div class="left3 fl mt18">

        <div class="list bgb ">
            <h2 class="plcae ybbt1"><i class="iconfont icon-shouye"></i> <a href="<?php  echo $host;  ?>">网站首页</a><?php if ($type=='category') { ?>
                <?php 
                $html='';
                function navcate($id){
                global $html;
                $cate = new Category;
                $cate->LoadInfoByID($id);
                $html =' / <a href="' .$cate->Url.'" title="查看' .$cate->Name. '中的全部文章">' .$cate->Name. '</a> '.$html;
                if(($cate->ParentID)>0){navcate($cate->ParentID);}
                }
                navcate($category->ID);
                global $html;
                echo $html;
                 ?>

                <?php }else{  ?> / <?php  echo $title;  ?><?php } ?>
            </h2>
            <ul>
                <?php if ($zbp->Config('txdida')->listad2on=='1') { ?>  

                <?php $i=1; ?>
                <?php  foreach ( $articles as $article) { ?>
                <?php if ($article->IsTop) { ?>
                <?php  include $this->GetTemplate('post-multi1');  ?>
                <?php }elseif($i==3) {  ?>
                <li class="list-newsad ad"><?php  echo $zbp->Config('txdida')->listad2;  ?></li>
                <?php }else{  ?>
                <?php  include $this->GetTemplate('post-multi1');  ?>
                <?php } ?>
                <?php $i++; ?>
                <?php }   ?>

                <?php }else{  ?>

                <?php  foreach ( $articles as $article) { ?>
                <?php if ($article->IsTop) { ?>
                <?php  include $this->GetTemplate('post-multi1');  ?>
                <?php }else{  ?>
                <?php  include $this->GetTemplate('post-multi1');  ?>
                <?php } ?>
                <?php }   ?>

                <?php } ?>

                <?php if ($zbp->Config('txdida')->listad3on=='1') { ?>  
                <li class="list-newsad ad"><?php  echo $zbp->Config('txdida')->listad3;  ?></li>
                <?php } ?>
                <?php if ($zbp->Config('txdida')->sjgg3on=='1') { ?>
                <li class="list-newsad dnwu"><?php  echo $zbp->Config('txdida')->sjgg3;  ?></li>  
                <?php } ?>

                <div class="clear"></div>
            </ul>

            <div class="pagebar"><?php  include $this->GetTemplate('pagebar');  ?><div class="clear"></div></div>
            <div class="clear"></div>
        </div>
    </div>

    <?php  include $this->GetTemplate('footer');  ?>