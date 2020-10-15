<?php 
include "config.php"; 
include '../save/yun.config.php';
include '../save/yun.match.php';
?>
<html lang="zh-cmn-Hans">
    <head>
        <title>系统设置-全网解析</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Content-language" content="zh-CN">   
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="pragma" content="no-cache">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./js/jquery.min.js"></script>
        <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a><cite>首页</cite></a>  
                <a><cite>系统设置</cite></a>
                <a><cite>云播放设置</cite></a>
            </span>

            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
            <button   onclick="updata()" class="layui-btn"    style="line-height:1.6em;margin-top:3px;margin-right:5px;float:right" > 更新规则  </button> 
        </div>
        <div class="x-body">
            <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                <ul class="layui-tab-title">
                    <li class="layui-this">资源设置</li>
                    <li>规则设置</li>

                </ul>
                <div class="layui-tab-content" >



                    <div class="layui-tab-item layui-show">


                        <form class="layui-form layui-form-pane" action="">

                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">
                                    资源站设置(每行一条，尽量使用m3u8资源)
                                </label>
                                <div class="layui-input-block">
                                    <textarea  name="API_URL"  style="height:500px" class="layui-textarea" ><?php $word = '';foreach ($API_URL as $key) { $word .= trim($key) . "\r\n";}echo $word; ?></textarea>
                                </div>
                            </div>

                            <div class="layui-form-item">

                                <button class="layui-btn" lay-submit="" lay-filter="yun">
                                    保存
                                </button>
                            </div>
                        </form>

                    </div>

                    <div class="layui-tab-item ">
                        <form class="layui-form layui-form-pane" action="">

                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">
                                    404跳转设置，如果网页标题包含将跳转404页面，多个请用"|"分割,设置为空则不使用；
                                </label>
                                <div class="layui-input-block">
                                    <input type="text" name="ERROR_404" autocomplete="off" value="<?php echo $ERROR_404; ?>" class="layui-input" />	
                                </div>
                            </div>

                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">
                                    网页标题分隔符正则设置,用于视频标题获取。
                                </label>
                                <div class="layui-input-block">
                                    <input type="text" name="title_match" autocomplete="off" value="<?php echo $title_match; ?>" class="layui-input" />	
                                </div>
                            </div>

                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">
                                    输出类型转换（支持正则,格式： 正则(匹配播放源或URL) => 输出类型，每条一行）
                                </label>
                                <div class="layui-input-block">
                                    <textarea  name="type_match"  class="layui-textarea" ><?php $type_match_word = '';foreach ($type_match as $key => $val) {$type_match_word .= "$key=>$val" . "\r\n";}echo $type_match_word; ?></textarea>	
                                </div>
                            </div>

                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">
                                    视频标题过滤（每条一行）
                                </label>
                                <div class="layui-input-block">
                                    <textarea  name="title_replace"  class="layui-textarea" ><?php $title_replace_word = '';foreach ($title_replace as $val) { $title_replace_word .= "$val" . "\r\n";}echo $title_replace_word; ?></textarea>	
                                </div>
                            </div>   
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">
                                    URL地址过滤（每条一行）
                                </label>
                                <div class="layui-input-block">
                                    <textarea  name="url_replace"  class="layui-textarea" ><?php $url_replace_word = '';foreach ($url_replace as $val) { $url_replace_word .= "$val" . "\r\n";}echo $url_replace_word; ?></textarea>	
                                </div>
                            </div> 

                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">
                                    视频地址转换,使用PHP正则,规则：'=>'后面的'(?n)'会用前面正则左起第n个小括号里的匹配内容替换。
                                </label>
                                <div class="layui-input-block">
                                    <textarea   style="height:200px" name="url_match"  class="layui-textarea" ><?php $url_match_word = '';foreach ($url_match as $key => $val) {$url_match_word .= "$key=>$val" . "\r\n";}echo $url_match_word; ?></textarea>	
                                </div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">
                                    视频标题和集数规则设置(格式：视频站正则=>标题正则1,标题正则2，... ，注意:标题正则的子表达式1应为标题,子表达式2应为集数)
                                </label>
                                <div class="layui-input-block">
                                    <textarea   style="height:200px" name="name_match"  class="layui-textarea" ><?php $name_match_word = '';foreach ($name_match as $key => $val) {$b = '';foreach ($val as $k => $a) { if (sizeof($val) == ($k + 1)) { $b .= "$a"; } else {$b .= "$a" . ","; }} $name_match_word .= "$key=>$b" . "\r\n";}echo $name_match_word; ?></textarea>	

                                </div>
                            </div>


                            <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="yun"  >
                                    保存
                                </button>
                            </div>



                        </form>
                    </div> 

                </div>

            </div>
        </div> 
    </div>


    <script>
        function tipstime(obj,count){
             $(obj).addClass('layui-btn-disabled').html('正在保存（'+count+")");     
           
       if (count === 0) {
            $(obj).removeClass('layui-btn-disabled').html('保存');
       } else {
        count -= 1;
        setTimeout(function(){tipstime(obj,count);}, 1000);
      };
      }


        layui.use(['form', 'layer'], function () {
            $ = layui.jquery;
            var form = layui.form, layer = layui.layer;

            //监听提交
            form.on('submit(yun)', function (data) {
                //发异步，把数据提交给php
                 $.ajax({
                        url: "admin_yun_save.php", 
                        data: data.field,
                        type: "post", dataType: 'json',
                        beforeSend: function () {
                            layer.load(0);
                        },
                        success: function (result) {
                            layer.closeAll("loading");
                            layer.alert(result['m'], {icon: result['icon']});                         
                        },
                        error: function () {
                            layer.closeAll("loading");
                            layer.alert("数据获取异常，请检查网络或防火墙设置!", {icon: 5});

                        }
                    });


                return false;
            });


        });

        /*用户-同步规则*/
        function updata() {
  
           // $.post("admin.php", {"type": "upyundata", "id": "updata"});
            //layer.msg('已发送更新请求，请稍后刷新查看!', {icon: 1, time: 2000});

                          $.ajax({
                        url: "admin.php", 
                        data: {"type": "upyundata", "id": "updata"},
                        type: "post", dataType: 'json',
                        beforeSend: function () {
                            layer.load(0);
                        },
                        success: function (result) {
                            layer.closeAll("loading");
                            layer.alert(result['m'], {icon: result['icon']});                         
                        },
                        error: function () {
                            layer.closeAll("loading");
                            layer.alert("数据获取异常，请检查网络!", {icon: 5});

                        }
                    });

        }

    </script>



</body>

</html>