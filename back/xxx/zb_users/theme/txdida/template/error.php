<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;">傻逼不要扒皮</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的电脑发送超级病毒！
</div>';die();?>
{* Template Name: 操作错误提示模板，勿选 *}
<script language="JavaScript" type="text/javascript">
            function delayURL(url) {
                var delay = document.getElementById("time").innerHTML;
                if(delay > 0) {
                    delay--;
                    document.getElementById("time").innerHTML = delay;
                } else {
                    window.top.location.href = url;
                }
                setTimeout("delayURL('" + url + "')", 1000);
            }
        </script>
<div class="wide">
    <div class="pd60 ta-c">
        <h2 class="tx-red f-22 mb15">请登录后再操作</h2>
        <p>系统将在 <span id="time">3</span> 秒后自动跳转回登录页。</p>
    </div>
</div>
<script type="text/javascript">delayURL("{$host}?Login");</script>