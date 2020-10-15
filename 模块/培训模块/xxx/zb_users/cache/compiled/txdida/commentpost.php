<?php  /* Template Name:评论发布框 */  ?>
<div class="post tx-comment" id="divCommentPost">
    <h3><a name="comment" rel="nofollow" id="cancel-reply" href="#divCommentPost" style="display:none;float:right;"><small>取消回复</small></a>欢迎 <span class="tx-red"><?php if ($user->ID>0) { ?><?php  echo $user->StaticName;  ?><?php }else{  ?>你<?php } ?></span> 发表评论:</h3>
    <form id="frmSumbit" target="_self" method="post" action="<?php  echo $article->CommentPostUrl;  ?>" class="clearfix">
        <input type="hidden" name="inpId" id="inpId" value="<?php  echo $article->ID;  ?>" />
        <input type="hidden" name="inpRevID" id="inpRevID" value="0" />
        <?php if ($user->ID>0) { ?>
        <input type="hidden" name="inpName" id="inpName" value="<?php  echo $user->Name;  ?>" />
        <input type="hidden" name="inpEmail" id="inpEmail" value="<?php  echo $user->Email;  ?>" />
        <input type="hidden" name="inpHomePage" id="inpHomePage" value="<?php  echo $user->HomePage;  ?>" />
        <?php }else{  ?>
        <div class="tx-comment-box <?php if ($option['ZC_COMMENT_VERIFY_ENABLE']) { ?>tx-comment-ul4<?php }else{  ?>tx-comment-ul3<?php } ?>"><input type="text" name="inpName" id="inpName" class="text" value="<?php  echo $user->Name;  ?>" size="28" tabindex="1" placeholder="名称(*)"/> </div>
        <div class="tx-comment-box <?php if ($option['ZC_COMMENT_VERIFY_ENABLE']) { ?>tx-comment-ul4<?php }else{  ?>tx-comment-ul3 tx-comment-ul3-2<?php } ?>"><input type="text" name="inpEmail" id="inpEmail" class="text" value="<?php  echo $user->Email;  ?>" size="28" tabindex="2" placeholder="邮箱"/></div>
        <div class="tx-comment-box <?php if ($option['ZC_COMMENT_VERIFY_ENABLE']) { ?>tx-comment-ul4<?php }else{  ?>tx-comment-ul3<?php } ?>"><input type="text" name="inpHomePage" id="inpHomePage" class="text" value="<?php  echo $user->HomePage;  ?>" size="28" tabindex="3" placeholder="网站"/></div>
        <?php if ($option['ZC_COMMENT_VERIFY_ENABLE']) { ?>
        <div class="tx-comment-box tx-comment-ul4"><input type="text" name="inpVerify" id="inpVerify" class="text" value="" size="28" tabindex="4" placeholder="验证码(*)"/>
            <img src="<?php  echo $article->ValidCodeUrl;  ?>" alt="请填写验证码" class="tx-code" onclick="javascript:this.src='<?php  echo $article->ValidCodeUrl;  ?>&amp;tm='+Math.random();"/>
        </div>
        <?php } ?>

        <?php } ?>
        <div class="tx-comment-box tx-comment-textarea"><textarea name="txaArticle" id="txaArticle" class="text" cols="50" rows="4" tabindex="5"  placeholder="欢迎在这里交流评论，但是垃圾评论不受欢迎！"/></textarea><input name="sumbit" type="submit" tabindex="6" value="提交" onclick="return zbp.comment.post()" class="button" /></div>
    </form>
</div>