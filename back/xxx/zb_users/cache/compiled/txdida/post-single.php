<div class="place"><i class="iconfont icon-shouye"></i> <a href="<?php  echo $host;  ?>">网站首页</a><?php if ($type=='article') { ?>
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


    <?php }else{  ?> / <?php  echo $title;  ?><?php } ?>
</div>

<div class="info-js xia15">
    <img src="<?php  echo txdida_FirstIMG($article,$article,176,230);  ?>" class="info-js-tu fl" />
    <h2><?php  echo $article->Title;  ?></h2>
    <p><strong>发布时间：</strong><?php  echo $article->Time('Y年m月d日');  ?> </p>
    <p><strong>视频标签：</strong><?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>"><?php  echo $tag->Name;  ?></a>&nbsp;&nbsp;<?php }   ?></p>
    <p><strong>观看人数：</strong><?php  echo $article->ViewNums;  ?></p>
    <p><strong>评论人数：</strong>当前有 <?php  echo $article->CommNums;  ?> 人发表了看法 <a href="#comments" style="margin-left:10px;"><i class="iconfont fa-hand-o-right"></i> 我要评论</a></p>
    <div>
        <a href="#bfqk" class="bofang zse"><i class="iconfont icon-shipin2"></i> 开始播放</a>
        <?php if ($article->Metas->xiazai) { ?><a href="<?php  echo $article->Metas->xiazai;  ?>" class="bofang fse" target="_blank"><i class="iconfont icon-xiazai"></i> 下载资源</a><?php } ?>
        <?php if ($zbp->CheckPlugin('YtUser')) { ?>
        <?php if (!$article->Favorite) { ?>
        <a href="javascript: void(0)" class="bofang fse" onclick="YtFavorite('add',<?php  echo $article->ID;  ?>,this);"><i class="iconfont icon-xihuan"></i> 收藏</a>
        <?php }else{  ?>
        <a href="javascript: void(0)" class="bofang fse" onclick="YtFavorite('del',<?php  echo $article->ID;  ?>,this)"><i class="iconfont icon-xihuan"></i> 取消收藏</a>
        <?php } ?>
        <?php } ?>
    </div>
    <div class="clear"></div>
</div>

<?php if ($zbp->Config('txdida')->listad4on=='1') { ?>
<div class="ad xia15"><?php  echo $zbp->Config('txdida')->listad4;  ?></div>
<?php } ?>
<?php if ($zbp->Config('txdida')->sjgg4on=='1') { ?>
<div class="xia15 dnwu"><?php  echo $zbp->Config('txdida')->sjgg4;  ?></div>  
<?php } ?>


<div class="xia15">
    <h2 class="ybbt xia15"><strong>剧情介绍</strong></h2>
    <div class="info-zi"><?php  echo $article->Content;  ?> <?php  echo $zbp->Config('txdida')->fx;  ?></div>
</div>
<?php if ($zbp->Config('txdida')->listad1on=='1') { ?>
<div class="ad xia15"><?php  echo $zbp->Config('txdida')->listad1;  ?></div>
<?php } ?>
<?php if ($zbp->Config('txdida')->sjgg1on=='1') { ?>
<div class="xia15 dnwu"><?php  echo $zbp->Config('txdida')->sjgg1;  ?></div>  
<?php } ?>

<div class="info-lb" id="bfqk">
    <h2 class="ybbt xia15"><strong>播放列表</strong></h2>
    <?php if ($article->Metas->buy=='jifen') { ?> 
    <?php if ($article->Buypay=='1') { ?>
    <?php 
    if(!$article->Metas->NBTotaldiany){$article->Metas->NBTotaldiany='1';}
    $arraymovielist=explode(",",$article->Metas->NBTotaldiany);
    $listi=count($arraymovielist);//$article->Metas->NBTotaldiany==''?1:$article->Metas->NBTotaldiany;
     ?>
    <ul>
        <?php 
        $arraymetasname=array();
        $arraymetastxt=array();
        foreach ($arraymovielist as $j){	
        $arraymetasname[$j]='video'.$j;
        $arraymetastxt[$j]='vtxt'.$j;
        } 
        $strlist='';

        foreach ($arraymovielist as $j){
        $a=$arraymetastxt[$j];
        $strlist.='<li><a title="'.$article->Title.'" href="'.$article->Url.'?showid='.($j).'"><i class="iconfont icon-shipin1"></i> '.$article->Metas->$a.'</a></li> ';
        } 
        echo $strlist;
         ?>
    </ul>

    <?php }else{  ?>
    <div class="buy-form buy-lock mb20">
        <i class="iconfont icon-lock"></i>
        <?php if ($user->ID>0) { ?>
        <p>此内容为收费内容，请点击购买按钮在线购买。</p>
        <input type="hidden" name="LogID" id="LogID" value="<?php  echo $article->ID;  ?>" /> 
        <input type="submit" value="购买" onclick="return Ytbuy()" class="tx-btn zse"/>
        <?php }else{  ?>
        <p>此内容为收费内容，请登录后在线购买。</p>
        <a href="<?php  echo $host;  ?>?Login" class="tx-btn zse">请登录</a>
        <?php } ?>
    </div>
    <?php } ?>


    <?php }elseif($article->Metas->buy=='vip') {  ?>
    
    <?php if ($user->Level<5) { ?>
    <?php 
    if(!$article->Metas->NBTotaldiany){$article->Metas->NBTotaldiany='1';}
    $arraymovielist=explode(",",$article->Metas->NBTotaldiany);
    $listi=count($arraymovielist);//$article->Metas->NBTotaldiany==''?1:$article->Metas->NBTotaldiany;

     ?>

    <ul>
        <?php 
        $arraymetasname=array();
        $arraymetastxt=array();
        foreach ($arraymovielist as $j){	
        $arraymetasname[$j]='video'.$j;
        $arraymetastxt[$j]='vtxt'.$j;
        } 
        $strlist='';

        foreach ($arraymovielist as $j){
        $a=$arraymetastxt[$j];
        $strlist.='<li><a title="'.$article->Title.'" href="'.$article->Url.'?showid='.($j).'"><i class="iconfont icon-shipin1"></i> '.$article->Metas->$a.'</a></li> ';
        } 
        echo $strlist;
         ?>

    </ul>
    <?php }else{  ?>
    <div class="buy-form buy-lock mb20">
        <i class="iconfont icon-lock"></i>
        <?php if ($user->ID>0) { ?>
        <p>此内容为vip可见内容，请先升级为本站的vip。</p>
        <a href="<?php  echo $host;  ?>?Upgrade" class="tx-btn zse">购买vip</a>
        <?php }else{  ?>
        <p>此内容为vip可见内容，请先升级为本站的vip。</p>
        <a href="<?php  echo $host;  ?>?Login" class="tx-btn zse">请先登录</a>
        <?php } ?>
    </div>
    <?php } ?>

    <?php }elseif($article->Metas->buy=='dengl') {  ?>
    <?php if ($user->ID>0) { ?>
    <?php 
    if(!$article->Metas->NBTotaldiany){$article->Metas->NBTotaldiany='1';}
    $arraymovielist=explode(",",$article->Metas->NBTotaldiany);
    $listi=count($arraymovielist);//$article->Metas->NBTotaldiany==''?1:$article->Metas->NBTotaldiany;

     ?>

    <ul>
        <?php 
        $arraymetasname=array();
        $arraymetastxt=array();
        foreach ($arraymovielist as $j){	
        $arraymetasname[$j]='video'.$j;
        $arraymetastxt[$j]='vtxt'.$j;
        } 
        $strlist='';

        foreach ($arraymovielist as $j){	
        $a=$arraymetastxt[$j];
        $strlist.='<li><a title="'.$article->Title.'" href="'.$article->Url.'?showid='.($j).'"><i class="iconfont icon-shipin1"></i> '.$article->Metas->$a.'</a></li> ';
        } 
        echo $strlist;
         ?>

    </ul>
    <?php }else{  ?>
    <div class="buy-form buy-lock mb20">
        <i class="iconfont icon-lock"></i>
        <p>此内容需要登录后才能看到，请登录或注册。</p>
        <a href="<?php  echo $host;  ?>?Login" class="tx-btn zse">请登录</a>
    </div>
    <?php } ?>


    <?php }else{  ?>
    <?php 
    if(!$article->Metas->NBTotaldiany){$article->Metas->NBTotaldiany='1';}
    $arraymovielist=explode(",",$article->Metas->NBTotaldiany);
    $listi=count($arraymovielist);//$article->Metas->NBTotaldiany==''?1:$article->Metas->NBTotaldiany;

     ?>

    <ul>
        <?php 
        $arraymetasname=array();
        $arraymetastxt=array();
        foreach ($arraymovielist as $j){	
        $arraymetasname[$j]='video'.$j;
        $arraymetastxt[$j]='vtxt'.$j;
        } 
        $strlist='';

        foreach ($arraymovielist as $j){	
        $a=$arraymetastxt[$j];
        $strlist.='<li><a title="'.$article->Title.'" href="'.$article->Url.'?showid='.($j).'"><i class="iconfont icon-shipin1"></i> '.$article->Metas->$a.'</a></li> ';
        } 
        echo $strlist;
         ?>

    </ul>

    <?php } ?>

    <div class="clear"></div>
    </div>



    <?php if (!$article->IsLock) { ?>
    <?php  include $this->GetTemplate('comments');  ?>
    <?php } ?>
