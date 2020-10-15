<?php $description = preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),120)).'...'); ?>
<li>
    <a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank"  class="list-tu <?php if ($zbp->CheckPlugin('IMAGE')) { ?><?php }else{  ?>img-box-slt1<?php } ?>"><img src="<?php  echo txdida_FirstIMG($article,$article,160,115);  ?>"  alt="<?php  echo $article->Title;  ?>" /></a>  
    <h2><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank"><?php  echo $article->Title;  ?></a></h2>
    <p><?php  echo $description;  ?></p> 
    <small class="sjwu"><span><i class="iconfont icon-shizhong"></i> <?php  echo $article->Time('Y-m-d');  ?> </span><span><i class="iconfont icon-wode"></i> <?php  echo $article->Author->StaticName;  ?></span><span><i class="iconfont icon-leimu"></i> <a href="<?php  echo $article->Category->Url;  ?>" title="查看<?php  echo $article->Category->Name;  ?>下的更多文章" target="_blank"><?php  echo $article->Category->Name;  ?></a></span><span><i class="iconfont icon-attention"></i> <?php  echo $article->ViewNums;  ?> ℃</span><span><i class="iconfont icon-liuyan"></i> <a href="<?php  echo $article->Url;  ?>#comment" target="_blank" title="欢迎你对本文发表看法"><?php  echo $article->CommNums;  ?> 评论</a></span></small>
    <div class="clear"></div>
</li>