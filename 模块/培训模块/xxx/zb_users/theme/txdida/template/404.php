<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;">傻逼不要扒皮</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的电脑发送超级病毒！
</div>';die();?>
{* Template Name: 主题自带404模板 *}
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>404-{$name}</title>
        <link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/{$style}.css" type="text/css" media="all" />
    </head>

    <body>
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
        <div class="tx-404">
            <div class="logo-404"></div>
            <p><img src="{$host}zb_users/theme/{$theme}/style/img/404.png" alt="一个404页面"></p>
            <h2>{$name}提示您：您正在打开的页面可能被站长弄坏了！</h2>
            <p>系统将在 <span id="time">3</span> 秒后自动跳转回首页。</p>
            <p><a href="{$host}" class="return">返回首页</a></p>
        </div>
        <script type="text/javascript">delayURL("{$host}");</script>
    </body>

</html>
