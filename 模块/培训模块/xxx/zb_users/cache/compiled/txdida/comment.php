<?php  /* Template Name:单条评论 */  ?>
<ul class="msg" id="cmt<?php  echo $comment->ID;  ?>">
	<li class="msgname">
	    <img class="avatar" src="<?php  echo $comment->Author->Avatar;  ?>" alt="<?php  echo $comment->Author->StaticName;  ?>" width="46"/>
	    <p class="commentname"><a href="<?php  echo $comment->Author->HomePage;  ?>" rel="nofollow" target="_blank"><?php  echo $comment->Author->StaticName;  ?></a>&nbsp;&nbsp;<small>评论于 [<?php  echo $comment->Time();  ?>]&nbsp;&nbsp;<span class="revertcomment"><a href="#comment" onclick="zbp.comment.reply('<?php  echo $comment->ID;  ?>')" class="tx-red">回复</a></span></small></p>
	    <p class="commentinfo"><?php  echo $comment->Content;  ?></p>
	</li>
<?php  foreach ( $comment->Comments as $comment) { ?>
<li class="msgarticle"><?php  include $this->GetTemplate('comment');  ?></li>
<?php }   ?>

</ul>