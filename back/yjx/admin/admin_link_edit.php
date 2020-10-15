<?php
include "config.php";
if (filter_has_var(INPUT_GET, 'id')){ $id = filter_input(INPUT_GET, 'id');}else{exit("参数调用错误！");}
?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <title>对接设置-系统设置-Xyplay 智能解析</title>
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
                <legend>接口设置</legend>

                <div class="layui-field-box">

                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            描述
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" name="LINK_NAME" autocomplete="off" value="<?php echo $LINK_URL[$id]['name']; ?>" class="layui-input" >		
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
                            <select name="LINK_OFF" lay-filter="province">							 
                                <?php foreach (array("关闭", "启用") as $key => $val): ?>							 							 
                                    <option value="<?php echo $key ?>"  <?php echo ($LINK_URL[$id]['off'] == $key) ? "selected" : ''; ?>><?php echo $val ?></option>	   
<?php endforeach; ?> 			         
                            </select>
                        </div>
                        <div class="layui-input-inline">
                            <input type="text" name="LINK_NUM" autocomplete="off" value="<?php echo $LINK_URL[$id]['num']; ?>" class="layui-input" title="数字越小，优先级越高">		
                        </div>			  		  
                        <div class="layui-form-mid layui-word-aux">
                            启用状态及优先级，数字越小，优先级越高
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">地址</label>
                        <div class="layui-input-block">
                            <input type="text" name="LINK_PATH" autocomplete="off" value="<?php echo $LINK_URL[$id]['path']; ?>" class="layui-input" >							
                        </div>						  

                    </div>



                </div>
            </fieldset>    



            <fieldset class="layui-elem-field">

                <legend>对接设置</legend>
                <div class="layui-field-box">
                    <table class="layui-table">
                        <tbody>
                            <tr>
                                <th>成功标志（success）</th>
                                <td>
                                    <input type="text" name="LINK_VAL_SUCCESS" autocomplete="off" value="<?php echo $LINK_URL[$id]['val']['success']; ?>" class="layui-input" >         
                                </td>
                            </tr>
                            <tr>
                                <th>地址标志（url）</th>                
                                <td><input type="text" name="LINK_VAL_URL" autocomplete="off" value="<?php echo $LINK_URL[$id]['val']['url']; ?>" class="layui-input" ></td>
                            </tr>
                            <tr>
                                <th>播放器标志（player）</th>                
                                <td><input type="text" name="LINK_VAL_PLAYER" autocomplete="off" value="<?php echo $LINK_URL[$id]['val']['player']; ?>" class="layui-input" ></td>
                            </tr>


                            <tr>
                                <th>代码标志（code）</th>
                                <td><input type="text" name="LINK_VAL_CODE" autocomplete="off" value="<?php echo $LINK_URL[$id]['val']['code']; ?>" class="layui-input" ></td>
                            </tr>
                            <tr>
                                <th>类型标志（type）</th>
                                <td><input type="text" name="LINK_VAL_TYPE" autocomplete="off" value="<?php echo $LINK_URL[$id]['val']['type']; ?>" class="layui-input" ></td>
                            </tr>
                            <tr>
                                <th>标题标志（title）</th>
                                <td><input type="text" name="LINK_VAL_TITLE" autocomplete="off" value="<?php echo $LINK_URL[$id]['val']['title']; ?>" class="layui-input" ></td>
                            </tr>
                            <tr>
                                <th>集数标志（part）</th>
                                <td><input type="text" name="LINK_VAL_PART" autocomplete="off" value="<?php echo $LINK_URL[$id]['val']['part']; ?>" class="layui-input" ></td>
                            </tr> 
                            <tr>
                                <th>剧集标志（info）</th>
                                <td><input type="text" name="LINK_VAL_INFO" autocomplete="off" value="<?php echo $LINK_URL[$id]['val']['info']; ?>" class="layui-input" ></td>
                            </tr> 	


                        </tbody>
                    </table>
                </div>
            </fieldset>  

            <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="edit">
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
            form.on('submit(edit)', function (data) {
            
                //发异步，把数据提交给php
                data.field.type = 'link_edit'; data.field.id = "<?php echo $id; ?>";

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
                            layer.alert("数据获取异常，请检查网络或防火墙设置!", {icon: 5});

                        }
                    }); 
                return false;
            });


        });
    </script>


</body>

</html>