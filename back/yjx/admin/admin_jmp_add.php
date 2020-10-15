<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <title>跳转设置-系统设置-Xyplay 智能解析</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-language" content="zh-CN">   
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8" >
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

            <fieldset class="layui-elem-field">
                <legend>跳转设置</legend>

                <div class="layui-field-box">

                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            描述
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" name="JMP_NAME" autocomplete="off" value="新的电影跳转" class="layui-input" >		
                        </div>
                        <div class="layui-form-mid layui-word-aux">
                            输入一个名称用来进行区分，例：好看的电影
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            状态
                        </label>
                        <div class="layui-input-inline">
                            <select name="JMP_OFF" lay-filter="province">							 
                                <?php foreach (array("关闭", "启用") as $key => $val): ?>							 							 
                                    <option value="<?php echo $key ?>"  <?php echo (1 ==$key) ? "selected" : '';?> ><?php echo $val ?></option>	   
<?php endforeach; ?> 			         
                            </select>
                        </div>
                      		  		  
                        <div class="layui-form-mid layui-word-aux">
                            启用状态
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">源地址</label>
                        <div class="layui-input-block">
                            <input type="text" name="JMP_URL" autocomplete="off" value="" placeholder="请输入官方视频地址，支持正则" class="layui-input" >							
                        </div>						  

                    </div>

                    
                        <div class="layui-form-item">
                        <label class="layui-form-label">目标地址</label>
                        <div class="layui-input-block">
                            <input type="text" name="JMP_HREF" autocomplete="off" value="" placeholder="请输入替换的视频地址" class="layui-input" >							
                        </div>						  

                    </div>


                </div>
            </fieldset>    



            <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="add">
                    保存
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
            form.on('submit(add)', function (data) {
                  //发异步，把数据提交给php
                  data.field.type = 'jmp_add';
                   $.ajax({
                        url: "admin_jmp_save.php", 
                        data: data.field,
                        type: "post", dataType: 'json',
                        beforeSend: function () {
                            layer.load(0);
                        },
                        success: function (result) {
                            layer.closeAll("loading");
                            if (result["success"]) {
                                layer.alert("添加成功,请刷新查看效果!", {icon: 6}, function () {
                               //关闭当前frame
                               var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);

                                });

                            } else {
                                layer.alert(result['m'], {icon: result['icon']});
                            }
                        },
                        error: function () {
                            layer.closeAll("loading");
                            layer.alert("数据获取异常，请检查网络或防火墙设置!", {icon: 5});

                        }
                    });     
       
                return false;
            });


        });
    </script>


</body>

</html>