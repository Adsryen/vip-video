<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"/www/wwwroot/959495.xyz/applications/index/view/vip/tspz.html";i:1555898536;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
    <link rel="stylesheet" href="/public/static/assets1/css/layui.css">
    <link rel="stylesheet" href="/public/static/assets1/css/view.css"/>
    <title></title>
</head>
<style>
    .layui-form-label {
        width: 70px !important;
    }
    .layui-input-block {
        margin-left: 100px !important;

    }
</style>
<body class="layui-view-body">
<div class="layui-content">
    <div class="layui-row">
        <div class="layui-card">

            <form class="layui-form layui-card-body"  method="post" action="">

					 <div class="layui-form-item">
							<label class="layui-form-label">APP key</label>
						    <div class="layui-input-block">
						      <input type="text" name="appkey" required value="<?php echo $list['appkey']; ?>" lay-verify="required" placeholder="请输入APP key" autocomplete="off" class="layui-input">
						    </div>
					  </div>
					  <div class="layui-form-item">
							<label class="layui-form-label">secret</label>
						    <div class="layui-input-block">
						      <input type="text" name="master_secret"  value="<?php echo $list['master_secret']; ?>" lay-verify="required" placeholder="请输入master_secret" autocomplete="off" class="layui-input">
						    </div>
					  </div>
					  
					  <div class="layui-form-item">
					  <div class="layui-form-item">
		                    <div class="layui-input-block">
		                        <button class="layui-btn layui-btn-blue" lay-submit lay-filter="formDemo">立即提交</button>
		                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
		                    </div>
		                </div>
            </form>
        </div>
    </div>
</div>
<script src="/public/static/assets1/layui.all.js"></script>

<script> 
    var form = layui.form
        ,layer = layui.layer;
    <?php
        if(@$status=='1'){
            echo "layer.msg('发送成功', {icon: 6});";
        }elseif(@$status=='2'){
        echo "layer.msg('发送失败', {icon: 5});";
    }
 ?>

</script>
</body>
</html>