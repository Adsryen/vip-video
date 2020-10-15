<?php  /* Template Name: 默认栏目页模板 */  ?>
<?php  include $this->GetTemplate('header');  ?>

<div class="main zh">
    <?php if ($zbp->Config('txdida')->listadon=='1') { ?>
    <div class="list-b s15 ad"><?php  echo $zbp->Config('txdida')->listad;  ?></div>  
    <?php } ?>
    <?php if ($zbp->Config('txdida')->sjggon=='1') { ?>
    <div class="list-b dnwu"><?php  echo $zbp->Config('txdida')->sjgg;  ?></div>  
    <?php } ?>


    <?php if ($type=='category') { ?>
    <div class="syqk s15 ys<?php  echo $category->ID;  ?>">
        <div class="left fl">
            <dl class="sylb"><dt class="ybbt"><strong><?php  echo $title;  ?></strong><?php if ($category->SubCategorys) { ?> <?php 
                $str='';
                $where=array(array('=','cate_ParentID',$category->ID));        
                $array=$zbp->GetCategoryList(null,$where,array('cate_Order'=>'ASC'),null,null);
                foreach ($array as $cate){
                $str.='<a href="'.$cate->Url.'"  target="_blank">'.$cate->Name.'</a>';
                }
                echo $str;
                 ?><?php } ?></dt>
                <dd>
                    <ul class="clearfix">
                        <?php if ($zbp->Config('txdida')->listad1on=='1') { ?>

                        <?php $i=1; ?>
                        <?php  foreach ( $articles as $article) { ?>
                        <?php if ($article->IsTop) { ?>
                        <?php  include $this->GetTemplate('post-istop');  ?>
                        <?php }elseif($i==6) {  ?>
                        <li class="list-gg1"><?php  echo $zbp->Config('txdida')->listad1;  ?></li>
                        <?php }else{  ?>
                        <?php  include $this->GetTemplate('post-multi');  ?>
                        <?php } ?>
                        <?php $i++; ?>

                        <?php }   ?>

                        <?php }else{  ?>
                        <?php  foreach ( $articles as $article) { ?>

                        <?php if ($article->IsTop) { ?>
                        <?php  include $this->GetTemplate('post-istop');  ?>
                        <?php }else{  ?>
                        <?php  include $this->GetTemplate('post-multi');  ?>
                        <?php } ?>

                        <?php }   ?>
                        <?php } ?>
                    </ul>
                </dd>
            </dl>


            <div class="pagebar"><?php  include $this->GetTemplate('pagebar');  ?></div>
        </div>


        <div class="right fr">
            <dl>
                <?php if ($type=='category') { ?>
                <dt class="ybbt"><strong>排行榜</strong><span class="hong">Top10</span></dt>

                <dd class="xia15">
                    <ul class="phb">
                        <?php 
                        if($category->RootID=='0'){
                        $tempcid=$category->ID;
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
                        $tempcid=$category->RootID;
                        $where =array(array('=','cate_RootID' ,$tempcid));
                        $order = array('cate_Order' => 'DESC' );
                        $array=$zbp->GetCategoryList(null,$where,$order,null,null);
                        $wherearray=array();
                        $wherearray[]=array('log_CateID',$category->RootID);
                        foreach ($array as $cate){
                        $wherearray[]=array('log_CateID',$cate->ID);
                        }
                        $where=array(
                        array('array',$wherearray),
                        array('=','log_Status','0'),
                        );

                        }

                        $num=10;
                        $order = array('log_ViewNums'=>'DESC');
                        $substr='';
                        $arrayhotarticle=	$zbp->GetArticleList(array('*'),$where,$order,array($num),'');
                        foreach ($arrayhotarticle as $key=>$b3) {
                        $substr.='<li><span class="fr"> '.$b3->ViewNums.'</span><a href="'.$b3->Url.'"> '.$b3->Title.' </a></li>';
                        }
                        echo $substr;
                         ?>
                    </ul>
                </dd>
                <?php }else{  ?>
                <dt class="ybbt xia10"><strong>排行榜</strong><span class="hong">Top10</span></dt>
                <dd class="xia15">
                    <ul class="phb">
                        <?php 
                        $order = array('log_ViewNums'=>'DESC');
                        $where = array(array('=','log_Status','0'));
                        $array = $zbp->GetArticleList(array('*'),$where,$order,array(10),'');
                         ?>
                        <?php  foreach ( $array as $hotlist) { ?>
                        <li><a href="<?php  echo $hotlist->Url;  ?>" title="<?php  echo $hotlist->Title;  ?>"><?php  echo $hotlist->Title;  ?></a></li>
                        <?php }   ?>
                    </ul>
                </dd>
                <?php } ?>

                <?php  echo $zbp->Config('txdida')->yclad;  ?>
            </dl>
        </div>
        <div class="clear"></div>
    </div>
    <?php }else{  ?>

    <div class="left3 fl mt18">

        <div class="list bgb ">
            <h2 class="ybbt1"><i class="iconfont icon-shouye"></i> <a href="<?php  echo $host;  ?>">网站首页</a> / <?php  echo $title;  ?></h2>
            <ul>
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
            </ul>

            <div class="pagebar"><?php  include $this->GetTemplate('pagebar');  ?></div>
        </div>
    </div>

    <div class="right3 fr sjwu mt18">
        <?php  include $this->GetTemplate('sidebar');  ?>
    </div>


    <div class="clear"></div>
    <?php } ?>


    <?php  include $this->GetTemplate('footer');  ?>