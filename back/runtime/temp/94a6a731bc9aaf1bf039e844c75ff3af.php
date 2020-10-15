<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"/www/wwwroot/yy.idc66.xyz/applications/index/view/user/kami.html";i:1551816900;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

            <form class="layui-form layui-card-body"  method="post" action="<?php echo url('user/kami'); ?>">

              
                <div class="layui-form-item">
                    <label class="layui-form-label">七天价格</label>
                    <div class="layui-input-block">
                        <input type="text" name="qitian" required  lay-verify="required" placeholder="价格" autocomplete="off" class="layui-input" value="<?php echo $list['qitian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">一个月价格</label>
                    <div class="layui-input-block">
                        <input type="text" name="yigeyue" required  lay-verify="required" placeholder="价格" autocomplete="off" class="layui-input" value="<?php echo $list['yigeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">三个月价格</label>
                    <div class="layui-input-block">
                        <input type="text" name="sangeyue" required  lay-verify="required" placeholder="价格" autocomplete="off" class="layui-input" value="<?php echo $list['sangeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">六个月价格</label>
                    <div class="layui-input-block">
                        <input type="text" name="liugeyue" required  lay-verify="required" placeholder="价格" autocomplete="off" class="layui-input" value="<?php echo $list['liugeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">一年价格</label>
                    <div class="layui-input-block">
                        <input type="text" name="yinian" required  lay-verify="required" placeholder="价格" autocomplete="off" class="layui-input" value="<?php echo $list['yinian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">永久价格</label>
                    <div class="layui-input-block">
                        <input type="text" name="yongjiu" required  lay-verify="required" placeholder="价格" autocomplete="off" class="layui-input" value="<?php echo $list['yongjiu']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>



                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-blue" lay-submit lay-filter="formDemo">立即提交</button>
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
        if(@$code=='2'){
            echo "layer.msg('糟糕 !修改失败', {icon: 5});";
        }elseif(@$code=='1'){
        echo "layer.msg('恭喜 !修改成功', {icon: 6});";
    }
 ?>

</script>
</body>
</html>
