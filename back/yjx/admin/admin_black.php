<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
    <head>
        <title>动作设置-防火墙-全网解析</title>
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
                <a href="">首页</a>
                <a href="">防火墙设置</a>
                <a>
                    <cite>动作设置</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
                <i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <xblock>
                <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                <button class="layui-btn" onclick="x_admin_show('添加规则', './admin_black_add.php')"><i class="layui-icon"></i>添加</button>

            </xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                        </th>
                        <th>序号</th>

                        <th>名称</th>

                        <th>语言</th>  
                        <th>脚本</th>
                        <th>操作</th> 

                </thead>
                <tbody>


                    <?php foreach ($BLACKLIST['black'] as $key => $val): ?>	


                        <tr>
                            <td>
                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $key; ?>'><i class="layui-icon">&#xe605;</i></div>
                            </td>
                            <td><?php echo $key; ?>	</td>
                            <td><?php echo $val['name']; ?></td>		

                            <td><?php echo ($val['type'] == 1) ? "PHP" : "HTML"; ?></td>            
                            <td><?php if ($val['type'] == 0) {
                        echo "屏蔽显示请编辑查看内容";
                    } else {
                        echo $val['info'];
                    } ?></td>	

                            <td class="td-manage">

                                <a title="编辑"  onclick="x_admin_show('防火墙动作编辑(序号：<?php echo $key; ?>)', 'admin_black_edit.php?id=<?php echo $key; ?>')" href="javascript:;">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" onclick="member_del(this, '<?php echo $key; ?>')" href="javascript:;">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                            </td>
                        </tr>

<?php endforeach; ?>   

                </tbody>

            </table>


        </div>



        <script>
            layui.use('laydate', function () {
                var laydate = layui.laydate;

                //执行一个laydate实例
                laydate.render({
                    elem: '#start' //指定元素
                });

                //执行一个laydate实例
                laydate.render({
                    elem: '#end' //指定元素
                });
            });

       
            /*用户-删除*/
            function member_del(obj, id) {
                layer.confirm('确认要删除吗？', function (index) {

                  $.ajax({
                        url: "admin.php",
                        data: {"type": "black_black_del", "id": id},
                        type: "post", dataType: 'json',
                        beforeSend: function () {
                            layer.load(0);
                        },
                        success: function (result) {
                            layer.closeAll("loading");
                            if (result["success"]) {
                                 $(obj).parents("tr").remove();
                                layer.msg('已删除', {icon: 1});
                            } else {
                                layer.alert(result['m'], {icon: result['icon']});
                            }
                        },
                        error: function () {
                            layer.closeAll("loading");
                            layer.alert("数据获取异常，请检查网络或防火墙设置!", {icon: 5});

                        }
                    });


                   
                });
            }
            function delAll(argument) {
                var data = tableCheck.getData();
                data=data.join(",");
                layer.confirm('确认要删除吗？' + data, function (index) {
                    
           $.ajax({
                        url: "admin.php",
                        data: {"type": "black_black_del", "id": data},
                        type: "post", dataType: 'json',
                        beforeSend: function () {
                            layer.load(0);
                        },
                        success: function (result) {
                            layer.closeAll("loading");
                            if (result["success"]) {                         
                                $(".layui-form-checked").not('.header').parents('tr').remove();
                                layer.msg('删除完成', {icon: 1, time: 1000});
                            } else {
                                layer.alert(result['m'], {icon: result['icon']});
                            }
                        },
                        error: function () {
                            layer.closeAll("loading");
                            layer.alert("数据获取异常，请检查网络或防火墙设置!", {icon: 5});

                        }
                    });
    
       
                });
            }
        </script>

    </body>

</html>