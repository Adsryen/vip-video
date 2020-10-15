<?php  /* Template Name: 单集视频内容页模板 */  ?>

<?php  include $this->GetTemplate('header');  ?>

<div class="main zh">
    <?php if ($zbp->Config('txdida')->listadon=='1') { ?>
    <div class="list-b s15 ad"><?php  echo $zbp->Config('txdida')->listad;  ?></div>  
    <?php } ?>
    <?php if ($zbp->Config('txdida')->sjggon=='1') { ?>
    <div class="list-b dnwu"><?php  echo $zbp->Config('txdida')->sjgg;  ?></div>  
    <?php } ?>

    <div class="syqk s15 ys<?php  echo $article->Category->ID;  ?>">
        <div class="left fl">
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

            <h1 class="title"><?php  echo $article->Title;  ?></h1>
            <small class="info-place xia15"><span><i class="iconfont icon-shizhong"></i> <?php  echo $article->Time('Y-m-d');  ?> </span><span><i class="iconfont icon-wode"></i> <?php  echo $article->Author->StaticName;  ?></span><span><i class="iconfont icon-leimu"></i> <a href="<?php  echo $article->Category->Url;  ?>" title="查看<?php  echo $article->Category->Name;  ?>下的更多文章" target="_blank"><?php  echo $article->Category->Name;  ?></a></span><span><i class="iconfont icon-attention"></i> <?php  echo $article->ViewNums;  ?> ℃</span><span><i class="iconfont icon-liuyan"></i> <a href="<?php  echo $article->Url;  ?>#comment" target="_blank" title="欢迎你对本文发表看法"><?php  echo $article->CommNums;  ?> 评论</a></span></small>

            <?php 
            //echo GetVars('showid','GET');
            //die();
            $arraymetasname=array();
            if(!$article->Metas->NBTotaldiany){$article->Metas->NBTotaldiany='1';}
            $arraymovielist=explode(",",$article->Metas->NBTotaldiany);
            $strlist='';
            foreach ($arraymovielist as $j){	
            $arraymetasname[$j]='video'.$j;
            $arraymetastxt[$j]='vtxt'.$j;
            } 

            foreach ($arraymovielist as $k=>$j){	
            $strlist.='';
            } 
            echo $strlist;

             ?>

            <?php if ($article->Metas->buy=='jifen') { ?>
            <?php if ($article->Buypay=='1') { ?>
            <?php  include $this->GetTemplate('single-set1');  ?>
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
                               <?php  include $this->GetTemplate('single-set1');  ?>
                               <?php }else{  ?>
                               <div class="buy-form buy-lock mb20">
            <i class="iconfont icon-lock"></i>
            <?php if ($user->ID>0) { ?>
            <p>此内容为vip可见内容，请先升级为本站的vip。</p>
            <a href="<?php  echo $host;  ?>?Upgrade" class="tx-btn zse">购买vip</a>
            <?php }else{  ?>
            <p>此内容为收费内容，请登录后在线购买。</p>
            <a href="<?php  echo $host;  ?>?Login" class="tx-btn zse">请登录</a>
            <?php } ?>
        </div>
        <?php } ?>
        <?php }else{  ?>
        <?php  include $this->GetTemplate('single-set1');  ?>
        <?php } ?>


        <div class="dianzan xia20">
            <?php if ($zbp->CheckPlugin('sf_praise_sdk')) { ?>
            <span class="fl"><a href="javascript:;"  title="点赞" class="thumbs-up r t sf-praise-sdk"  sfa='click' data-postid='<?php  echo $sf_praise_sdk->postid;  ?>' data-value='1'><i class="iconfont icon-zantong"></i> <span class="sf-praise-sdk" sfa='num' data-value='1' data-postid='<?php  echo $sf_praise_sdk->postid;  ?>'><?php  echo $sf_praise_sdk->value1;  ?></span></a> 喜欢就点赞</span>
            <?php } ?>
            <span class="fl">现在，这部片子已经被播放了 <?php  echo $article->ViewNums;  ?> 次</span>
            <span class="fenx fl"><?php  echo $zbp->Config('txdida')->fx;  ?></span>
            <div class="clear"></div>
        </div>


        <dl class="sylb list-dis"><dt class="ybbt"><strong>我猜你或许还喜欢以下内容</strong></dt>
            <dd class="xia15"><ul>
                <?php  foreach ( GetList(5,null,null,null,null,null,array('is_related'=>$article->ID)) as $related) { ?>
                    <li>
                        <a href="<?php  echo $related->Url;  ?>" target="_blank" class="img-x <?php if ($zbp->CheckPlugin('IMAGE')) { ?><?php }else{  ?>img-box-slt<?php } ?>">
                            <img src="<?php  echo txdida_FirstIMG($related,$related,176,230);  ?>" alt="<?php  echo $related->Title;  ?>"/>
                            <div class="fuc"><i class="iconfont icon-shipin2"></i></div>
                            <?php if ($related->Metas->qingxi) { ?><em><?php  echo $related->Metas->qingxi;  ?></em><?php } ?>
                            <?php if ($related->Metas->shijian) { ?><small><?php  echo $related->Metas->shijian;  ?></small><?php } ?>
                        </a>
                        <h2><a href="<?php  echo $related->Url;  ?>" target="_blank"><?php  echo $related->Title;  ?></a></h2>
                    </li>
                <?php }   ?>
                <div class="clear"></div>
                </ul>
            </dd>

            <?php if ($zbp->Config('txdida')->listad1on=='1') { ?>
            <div class="ad xia15"><?php  echo $zbp->Config('txdida')->listad1;  ?></div>
            <?php } ?>
            <?php if ($zbp->Config('txdida')->sjgg1on=='1') { ?>
            <div class="xia15 dnwu"><?php  echo $zbp->Config('txdida')->sjgg1;  ?></div>  
            <?php } ?>

        </dl>
        <?php if (!$article->IsLock) { ?>
        <?php  include $this->GetTemplate('comments');  ?>
        <?php } ?>

    </div>


    <div class="right fr">
        <dl><dt class="ybbt"><strong>排行榜</strong><span class="hong">Top10</span></dt>
            <dd class="ad xia10 s15"><?php  echo $article->Category->Metas->xgg;  ?></dd>
            <dd class="xia15"><ul class="phb">
                <?php 
                if($article->Category->RootID=='0'){
                $tempcid=$article->Category->ID;
                $where =array(array('=','cate_RootID' ,$tempcid));
                $order = array('cate_Order' => 'DESC' );
                $array=$zbp->GetCategoryList(null,$where,$order,null,null);
                $wherearray=array();
                $wherearray[]=array('log_CateID',$tempcid);
                foreach ($array as $cate){
                $wherearray[]=array('log_CateID',$cate->ID);
                }
                $where=array(
                array('array',$wherearray),
                array('=','log_Status','0'),
                );
                }else{
                $tempcid=$article->Category->RootID;
                $where =array(array('=','cate_RootID' ,$tempcid));
                $order = array('cate_Order' => 'DESC' );
                $array=$zbp->GetCategoryList(null,$where,$order,null,null);
                $wherearray=array();
                $wherearray[]=array('log_CateID',$article->Category->RootID);
                foreach ($array as $cate){
                $wherearray[]=array('log_CateID',$cate->ID);
                }
                $where=array(
                array('array',$wherearray),
                array('=','log_Status','0'),
                );

                }





                //输出子分类内的热门文章
                $num=10;
                $order = array('log_ViewNums'=>'DESC');
                $substr='';
                $arrayhotarticle=	$zbp->GetArticleList(array('*'),$where,$order,array($num),'');
                foreach ($arrayhotarticle as $key=>$b3) {
                $substr.='<li><a href="'.$b3->Url.'"> '.$b3->Title.' </a></li>';
                }



                echo $substr;


                 ?>
                </ul></dd>

            <?php  echo $zbp->Config('txdida')->yclad;  ?>
        </dl>
    </div>
    <div class="clear"></div>
</div>

<?php  include $this->GetTemplate('footer');  ?>


