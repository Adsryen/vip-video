
<?php  /* Template Name: 主题自带404模板 */  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>404-<?php  echo $name;  ?></title>
        <link rel="stylesheet" rev="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/<?php  echo $style;  ?>.css" type="text/css" media="all" />
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
            <p><img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/img/404.png" alt="一个404页面"></p>
            <h2><?php  echo $name;  ?>提示您：您正在打开的页面可能被站长弄坏了！</h2>
            <p>系统将在 <span id="time">3</span> 秒后自动跳转回首页。</p>
            <p><a href="<?php  echo $host;  ?>" class="return">返回首页</a></p>
        </div>
        <script type="text/javascript">delayURL("<?php  echo $host;  ?>");</script>
    </body>

</html>
