<?php include "config.php";?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
    <head>
        <title>欢迎页面</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Content-language" content="zh-CN">   
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="pragma" content="no-cache">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8" >
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./js/jquery.min.js"></script>	
        <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
    </head>
    <body>
        <div class="x-body layui-anim layui-anim-up">
            <blockquote class="layui-elem-quote">
                &nbsp;系统信息摘要 【当前系统版本：<script language="JavaScript" type="text/javascript" charset="utf-8" src="../save/ver.js?ver=<?php echo uniqid()?>"></script>
                &nbsp;&nbsp;最新版本：<script language="JavaScript" type="text/javascript" charset="utf-8" src="//api.00000/save/ver.js?ver=<?php echo uniqid()?>"></script>
                &nbsp;&nbsp;当前云规则版本：<script language="JavaScript" type="text/javascript" charset="utf-8" src="../save/yun.ver.js?ver=<?php echo uniqid()?>"></script>
                &nbsp;&nbsp;最新版本：<script language="JavaScript" type="text/javascript" charset="utf-8" src="//api.00000/save/yun.ver.js?ver=<?php echo uniqid()?>"></script>
                &nbsp;&nbsp;<a onclick="updata()" href="javascript:;"><font color="blue">更新规则</font></a>

                】
            </blockquote>

            <fieldset class="layui-elem-field">
                <legend>系统信息</legend>
                <div class="layui-field-box">
                    <table class="layui-table">
                        <tbody>

                            <tr>
                                <th>服务器地址</th>
                                <td><?php echo filter_input(INPUT_SERVER, "SERVER_NAME"); ?></td></tr>
                            <tr>
                                <th>服务器当前时间</th>
                                <td><?php echo date("Y-m-d H:i:s"); ?></td></tr>
                            <tr>
                                <th>服务器版本</th>
                                <td><?php echo php_uname('s') . php_uname('r'); ?></td></tr>

                            <tr>
                                <th>运行环境</th>
                                <td><?php echo filter_input(INPUT_SERVER, "SERVER_SOFTWARE"); ?></td></tr>
                            <tr>
                                <th>PHP版本</th>
                                <td><?php echo PHP_VERSION ?></td></tr>


                            <tr>
                                <th>上传附件限制</th>
                                <td><?php echo get_cfg_var("upload_max_filesize") ? get_cfg_var("upload_max_filesize") : "不允许"; ?></td></tr>
                            <tr>
                                <th>执行时间限制</th>
                                <td><?php echo get_cfg_var("max_execution_time") . "秒 "; ?></td></tr>

                        </tbody>
                    </table>
                </div>
            </fieldset>
            <fieldset class="layui-elem-field">
                <legend>开发团队</legend>
                <div class="layui-field-box">
                    <table class="layui-table">
                        <tbody>
                            <tr>
                                <th>版权所有</th>
                                <td>
                                    <a href="http://dtms.xjqxz.top/" class='x-a' target="_blank">欣然影视</a></td>
                            </tr>
                            <tr>
                                <th>开发者</th>
                                <td>欣然影视</td></tr>
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <blockquote class="layui-elem-quote layui-quote-nm">欢迎访问官方主页获取帮助：<a href="//dtms.xjqxz.top" target="_blank">欣然影视</a>,官方QQ群：815720190</blockquote>
        </div>

        <script>

            /*用户-同步规则*/
            function updata() {
                // $.post("admin.php", {"type": "upyundata", "id": "updata"});
                //layer.msg('已发送更新请求，请稍后刷新查看!', {icon: 1, time: 2000});
                
                       layer.load(0); //载入动画
                       $.post("admin.php",{"type": "upyundata", "id": "updata"}, function (result) {     
                       layer.closeAll("loading");
                       layer.alert(result['m'], {icon: result['icon']});  
                    }, 'json');         
                
                

            }

        </script>

    </body>
</html>