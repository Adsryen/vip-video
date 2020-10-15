<li>
    <a href="<?php  echo $article->Url;  ?>" target="_blank" class="img-x <?php if ($zbp->CheckPlugin('IMAGE')) { ?><?php }else{  ?>img-box-slt<?php } ?>">
        <img src="<?php  echo txdida_FirstIMG($article,$article,176,230);  ?>" alt="<?php  echo $article->Title;  ?>"/>
        <div class="fuc"><i class="iconfont icon-shipin2"></i></div>
        <?php if ($article->Metas->qingxi) { ?><em><?php  echo $article->Metas->qingxi;  ?></em><?php } ?>
        <?php if ($article->Metas->shijian) { ?><small><?php  echo $article->Metas->shijian;  ?></small><?php } ?>
    </a>
    <h2><a href="<?php  echo $article->Url;  ?>" target="_blank"><?php  echo $article->Title;  ?></a></h2>
</li>