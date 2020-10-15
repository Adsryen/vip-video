<?php  /* Template Name: 封面列表页模板 */  ?>
<?php  include $this->GetTemplate('header');  ?>
<div class="mb15"></div>
<div class="main zh">
    <?php 
                $str='';
                $where=array(array('=','cate_RootID',$category->ID));        
                $array=$zbp->GetCategoryList(null,$where,array('cate_Order'=>'ASC'),null,null);
                $flids=array();
                foreach ($array as $cate){
                $flids[]=$cate->ID;
                }
                 ?>
                <?php  foreach ( $flids as $flid) { ?>
    <div class="syqk ys<?php  echo $categorys[$flid]->ID;  ?>">
        <div class="left fl">
            <dl class="sylb list-dis"><dt class="ybbt"><a href="<?php  echo $categorys[$flid]->Url;  ?>" class="more fr f-22" target="_blank"><i class="iconfont icon-leimu"></i></a><strong><a href="<?php  echo $categorys[$flid]->Url;  ?>" target="_blank"><?php  echo $categorys[$flid]->Name;  ?></a></strong>    
                <?php 
                $str='';
                $where=array(array('=','cate_ParentID',$categorys[$flid]->ID));        
                $array=$zbp->GetCategoryList(null,$where,array('cate_Order'=>'ASC'),null,null);
                foreach ($array as $cate){
                $str.='<a href="'.$cate->Url.'"  target="_blank">'.$cate->Name.'</a>';
                }
                echo $str;
                 ?></dt>
                <dd>
                    <ul>
                        <?php  foreach ( txdida_GetArticleCategorys(5,$flid,true) as $key=>$related) { ?>
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

                    </ul>
                </dd>

            </dl>

        </div>

        <div class="right fr ysfc">
            <dl><dt class="ybbt"><strong>排行榜</strong><span class="hong">Top9</span></dt>
                <dd>
                    <ul class="phb">
                        <?php  foreach ( txdidas_GetArticleCategorys(8,$flid,true) as $key=>$related) { ?>
                        <li><span class="fr"><?php  echo $related->ViewNums;  ?></span><a href="<?php  echo $related->Url;  ?>" target="_blank"><?php  echo $related->Title;  ?></a></li>
                        <?php }   ?>
                    </ul>
                </dd>
            </dl>
        </div>
        <div class="clear"></div>
    </div>
    <?php }   ?>
    <?php  include $this->GetTemplate('footer');  ?>