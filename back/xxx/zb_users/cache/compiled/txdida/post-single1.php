<div class="info-bt"> 
    <h1 class="title"><?php  echo $article->Title;  ?></h1>
    <small><span><i class="iconfont icon-shizhong"></i> <?php  echo $article->Time('Y-m-d');  ?> </span><span><i class="iconfont icon-wode"></i> <?php  echo $article->Author->StaticName;  ?></span><span><i class="iconfont icon-leimu"></i> <a href="<?php  echo $article->Category->Url;  ?>" title="查看<?php  echo $article->Category->Name;  ?>下的更多文章" target="_blank"><?php  echo $article->Category->Name;  ?></a></span><span><i class="iconfont icon-attention"></i> <?php  echo $article->ViewNums;  ?> ℃</span><span><i class="iconfont icon-liuyan"></i> <a href="<?php  echo $article->Url;  ?>#comment" target="_blank" title="欢迎你对本文发表看法"><?php  echo $article->CommNums;  ?> 评论</a></span></small>
</div>

<?php if ($zbp->Config('txdida')->listad2on=='1') { ?>  
<div class="list-newsad ad"><?php  echo $zbp->Config('txdida')->listad2;  ?></div>
<?php } ?>
<?php if ($zbp->Config('txdida')->sjgg2on=='1') { ?>
<div class="list-newsad dnwu"><?php  echo $zbp->Config('txdida')->sjgg2;  ?></div>  
<?php } ?>


<div class="info-zi mb15">
    <?php  echo $article->Content;  ?>
    <p class="info-tag"><strong>Tags：</strong><?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank"><?php  echo $tag->Name;  ?></a> <?php }   ?></p>
    <?php  echo $zbp->Config('txdida')->fx;  ?>
</div>

<?php if ($zbp->Config('txdida')->listad3on=='1') { ?>  
<div class="list-newsad sjwu mb15 ad"><?php  echo $zbp->Config('txdida')->listad3;  ?></div>
<?php } ?>
<?php if ($zbp->Config('txdida')->sjgg3on=='1') { ?>
<div class="list-newsad mb15 dnwu"><?php  echo $zbp->Config('txdida')->sjgg3;  ?></div>  
<?php } ?>

<div class="sx mb15">
    <ul>
        <li class="fl">上一篇：<?php if ($article->Prev) { ?>
            <a  href="<?php  echo $article->Prev->Url;  ?>" title="<?php  echo $article->Prev->Title;  ?>"><?php  echo $article->Prev->Title;  ?></a>
            <?php } ?> </li>
        <li class="fr ziyou">下一篇：<?php if ($article->Next) { ?>
            <a  href="<?php  echo $article->Next->Url;  ?>" title="<?php  echo $article->Next->Title;  ?>"><?php  echo $article->Next->Title;  ?></a>
            <?php } ?> </li>
        <div class="clear"></div>
    </ul>
</div>


<div class="xg">
    <h2 class="ybbt">猜你喜欢</h2>
    <ul>
        <?php  foreach ( GetList(10,null,null,null,null,null,array('is_related'=>$article->ID)) as $related) { ?>
        <li><span><?php  echo $related->Time('Y-m-d');  ?></span><i class="iconfont icon-dian"></i> <a href="<?php  echo $related->Url;  ?>"><?php  echo $related->Title;  ?></a></li>
        <?php }   ?>
    </ul>
</div>
</div>

<div class="info-com bgb">
    <?php if (!$article->IsLock) { ?>
    <?php  include $this->GetTemplate('comments');  ?>
    <?php } ?>
</div>