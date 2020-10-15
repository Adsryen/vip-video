<?php  /* Template Name:所有评论模板 */  ?>
<?php if ($socialcomment) { ?>
<?php  echo $socialcomment;  ?>
<?php }else{  ?>

<div class="tx-comments" id="comments">
    <?php if ($article->CommNums==0) { ?>
    <h4>本文暂时没有评论，来添加一个吧(●'◡'●)</h4>
    <?php }elseif($article->CommNums>0) {  ?>
    <h3>已有<?php  echo $article->CommNums;  ?>位网友发表了看法：</h3>
    <?php } ?>


    <label id="AjaxCommentBegin"></label>
    <!--评论输出-->
    <?php  foreach ( $comments as $key => $comment) { ?>
    <?php  include $this->GetTemplate('comment');  ?>
    <?php }   ?>
    
    <?php if ($article->CommNums>$zbp->Config('system')->ZC_COMMENTS_DISPLAY_COUNT) { ?>
    <!--评论翻页条输出-->
    <div class="pagebar commentpagebar">
        <?php  include $this->GetTemplate('pagebar');  ?>
    </div>
    <?php } ?>
    <label id="AjaxCommentEnd"></label>
</div>
<!--评论框-->
<?php  include $this->GetTemplate('commentpost');  ?>

<?php } ?>