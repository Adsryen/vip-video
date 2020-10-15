{* Template Name:单条评论 *}
<ul class="msg" id="cmt{$comment.ID}">
	<li class="msgname">
	    <img class="avatar" src="{$comment.Author.Avatar}" alt="{$comment.Author.StaticName}" width="46"/>
	    <p class="commentname"><a href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a>&nbsp;&nbsp;<small>评论于 [{$comment.Time()}]&nbsp;&nbsp;<span class="revertcomment"><a href="#comment" onclick="zbp.comment.reply('{$comment.ID}')" class="tx-red">回复</a></span></small></p>
	    <p class="commentinfo">{$comment.Content}</p>
	</li>
{foreach $comment.Comments as $comment}
<li class="msgarticle">{template:comment}</li>
{/foreach}

</ul>