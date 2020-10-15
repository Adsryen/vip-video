<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <title>管理员账号修改</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Content-language" content="zh-CN">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="pragma" content="no-cache">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8" >
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" >
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
        <div class="x-body">
            <form class="layui-form">
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>登录名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="username" name="username" required="" lay-verify="required"
                               autocomplete="off" value="<?php echo $username ?>" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        至少5个字符
                    </div>
                </div>


                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>新密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_pass" name="password" required="" lay-verify="pass"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        6到16个字符
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        <span class="x-red">*</span>确认新密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_repass" name="repass" required="" lay-verify="repass"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item" style="position: absolute;left:45px;">
                    <label for="L_repass" class="layui-form-label">
                    </label>

                    <button  class="layui-btn" lay-filter="edit" lay-submit="" >
                        修改
                    </button>

                    <button  class="layui-btn" onclick="exitframe();return false;">
                        放弃
                    </button>

                </div>
            </form>

        </div>
        <script>

            layui.use(['form', 'layer'], function () {
                $ = layui.jquery;
                var form = layui.form
                        , layer = layui.layer;

                //自定义验证提交
                form.verify({
                    nikename: function (value) {
                        if (value.length < 5) {
                            return '用户名至少得5个字符啊';
                        }
                    }
                    , pass: [/(.+){6,12}$/, '密码必须6到12位']
                    , repass: function (value) {
                        if ($('#L_pass').val() !== $('#L_repass').val()) {
                            return '两次密码不一致';
                        }
                    }
                });

                //监听提交
                form.on('submit(edit)', function (data) {
                    //发异步，把数据提交给php
                    data.field.type = "user_edit";
                    $.ajax({
                        url: "admin.php", 
                        data: data.field,
                        type: "post", dataType: 'json',
                        beforeSend: function () {
                            layer.load(0);
                        },
                        success: function (result) {
                            layer.closeAll("loading");
                            if (result["success"]) {
                                layer.alert("修改成功", {icon: 6}, function () {
                                    exitframe();
                                });

                            } else {
                                layer.alert(result['m'], {icon: result['icon']});
                            }
                        },
                        error: function (obj, errtext) {
                            layer.closeAll("loading");
                            layer.alert("数据获取异常，请检查网络!", {icon: 5});

                        }
                    });


                    return false;
                });


            });

            function exitframe() {
                // 获得frame索引
                var index = parent.layer.getFrameIndex(window.name);
                //关闭当前frame
                parent.layer.close(index);
            }
   

        </script>
    </body>

</html>