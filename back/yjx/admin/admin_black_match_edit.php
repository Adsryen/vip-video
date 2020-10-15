<?php
include "config.php";
if (filter_has_var(INPUT_GET, 'id')){ $id = filter_input(INPUT_GET, 'id');}else{exit("参数调用错误！");}
?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <title>规则修改-防火墙设置-全网解析</title>
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
        <div class="x-body">
            <form class="layui-form">

                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        描述
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="BLACKLIST_MATCTH_NAME" autocomplete="off" value="<?php echo $BLACKLIST['match'][$id]['name']; ?>" class="layui-input" >		
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        输入一个名称用来进行区分，例：授权网站
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        状态
                    </label>
                    <div class="layui-input-inline">
                        <select name="BLACKLIST_MATCTH_OFF" lay-filter="province">							 

                            <?php foreach (array("关闭", "启用") as $key => $val): ?>							 							 
                                <option value="<?php echo $key ?>"  <?php echo ($BLACKLIST['match'][$id]['off'] == $key) ? "selected" : ''; ?>><?php echo $val ?></option>	   
<?php endforeach; ?> 




                        </select>
                    </div>

                    <div class="layui-input-inline">
                        <input type="text" name="BLACKLIST_MATCTH_NUM" autocomplete="off" value="<?php echo $BLACKLIST['match'][$id]['num']; ?>" class="layui-input" title="数字越小，优先级越高">		
                    </div>


                    <div class="layui-form-mid layui-word-aux">
                        启用状态及优先级，数字越小，优先级越高
                    </div>
                </div>


                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        类型
                    </label>
                    <div class="layui-input-inline">
                        <select name="BLACKLIST_MATCTH_TYPE" lay-filter="province">							 

                            <?php foreach (array("来源域名", "目标域名", "浏览器标识", "客户IP") as $key => $val): ?>							 							 
                                <option value="<?php echo $key ?>" <?php echo ($BLACKLIST['match'][$id]['type'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
<?php endforeach; ?> 




                        </select>
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span> 设置为来源域名时，如果出现读取配置失败，请将本解析域名也添加到对象
                    </div>
                </div>


                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        规则
                    </label>
                    <div class="layui-input-inline">
                        <select name="BLACKLIST_MATCTH_MATCH" lay-filter="province">							 

                            <?php foreach (array("不匹配时拦截", "匹配时拦截") as $key => $val): ?>							 							 
                                <option value="<?php echo $key ?>" <?php echo ($BLACKLIST['match'][$id]['match'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
<?php endforeach; ?>   			         
                        </select>
                    </div>



                    <div class="layui-form-mid layui-word-aux">
                        拦截规则，选择与对象匹配时拦截还是不匹配时拦截；
                    </div>
                </div>





                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        动作
                    </label>


                    <div class="layui-input-inline">
                        <select name="BLACKLIST_MATCTH_BLACK" lay-filter="province">							 
                            <?php foreach ($BLACKLIST['black'] as $key => $val): ?>							 							 
                                <option   value="<?php echo $key ?>" <?php echo ($BLACKLIST['match'][$id]['black'] == $key) ? "selected" : ''; ?> ><?php echo $val['name']; ?></option>	   
<?php endforeach; ?>   

                        </select>
                    </div>

                    <div class="layui-form-mid layui-word-aux">
                        拦截动作，可在动作设置中设置；
                    </div>
                </div>


                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        对象
                    </label>
                    <div class="layui-input-block">
                        <textarea name="BLACKLIST_MATCTH_VAL"  style="height:500px"   class="layui-textarea" placeholder="请输入域名或浏览器标识,每行一条"><?php $word = '';
foreach ($BLACKLIST['match'][$id]['val'] as $key) {
    $word .= trim($key) . "\r\n";
}echo $word; ?></textarea>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="edit" lay-submit="" >
                        修改
                    </button>
                </div>
            </form>
        </div>
        <script>
            layui.use(['form', 'layer'], function () {
                $ = layui.jquery;
                var form = layui.form
                        , layer = layui.layer;

                //监听提交
                form.on('submit(edit)', function (data) {
                 
                     //发异步，把数据提交给php
                        data.field.type = 'black_match_edit';  data.field.id = "<?php echo $id; ?>";
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
                                layer.alert("修改成功!", {icon: 6}, function () {
                               //关闭当前frame
                               var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);

                                });

                            } else {
                                layer.alert(result['m'], {icon: result['icon']});
                            }
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