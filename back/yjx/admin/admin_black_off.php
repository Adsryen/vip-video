<?php include "config.php";?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
    <head>
        <title>防火墙设置-Xyplayer X3</title>
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
                <a><cite>防火墙设置</cite></a>
                <a><cite>开关控制</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">


            <form class="layui-form layui-form-pane" action="">

                <div class="layui-form-item">
                    <label class="layui-form-label">
                        开关控制
                    </label>
                    <div class="layui-input-inline">
                        <select name="BLACKLIST_OFF" lay-filter="province">							 
                            <?php foreach (array("关闭", "开启全部防火墙", "仅开启模块防火墙") as $key => $val): ?>							 							 
                                <option  value="<?php echo $key ?>"   <?php echo ($BLACKLIST['off'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                            <?php endforeach; ?>   

                        </select>

                    </div>						  
                    <div style=" padding-top:10px;color:#909090">防火墙总开关,模块防火墙可以保护数据安全；
                    </div>

                </div>  

                <div class="layui-form-item">
                    <button class="layui-btn" lay-submit="" lay-filter="*">
                        保存
                    </button>
                </div>
            </form>




        </div>



        <script>


            layui.use(['form', 'layer'], function () {
                $ = layui.jquery;
                var form = layui.form, layer = layui.layer;

                //监听提交
                form.on('submit(*)', function (data) {
                    
                     $.ajax({
                        url: "save.php", 
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
                            layer.alert("数据获取异常，请检查网络!", {icon: 5});

                        }
                    });
                    
                    return false;
                });


            });
        </script>



    </body>

</html>