<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"/www/wwwroot/yy.idc66.xyz/application/index/view/user/pass.html";i:1551816900;}*/ ?>
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

            <form class="layui-form layui-card-body"  method="post" action="<?php echo url('user/pass'); ?>">


                <div class="layui-form-item">
                    <label class="layui-form-label">客服微信</label>
                    <div class="layui-input-block">
                        <input type="text" name="weichat" required  lay-verify="required" placeholder="客服微信" autocomplete="off" class="layui-input" value="<?php echo $weichat; ?>">
                        <div class="layui-form-mid layui-word-aux">会显示在属于你用户的APP中</div>
                    </div>
                </div>

          
              
                <div class="layui-form-item">
                    <label class="layui-form-label">APP提示语</label>
                    <div class="layui-input-block">
                        <input type="text" name="url" required  lay-verify="required" placeholder="比如：购卡请联系QQ/微信" autocomplete="off" class="layui-input" value="<?php echo sname(session('user'),'url'); ?>">
                        <div class="layui-form-mid layui-word-aux">(比如：购卡请联系QQ/微信：)</div>
                    </div>
                </div>
              <?php if(session('power')=='0'){?>
                <div class="layui-form-item">
                    <label class="layui-form-label">七天链接</label>
                    <div class="layui-input-block">
                        <input type="text" name="url5" required  lay-verify="required" placeholder="七天购买链接,请以http://开头" autocomplete="off" class="layui-input" value="<?php echo sname(session('user'),'url5'); ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">一个月链接</label>
                    <div class="layui-input-block">
                        <input type="text" name="url1" required  lay-verify="required" placeholder="一个月购买链接,请以http://开头" autocomplete="off" class="layui-input" value="<?php echo sname(session('user'),'url1'); ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">三个月链接</label>
                    <div class="layui-input-block">
                        <input type="text" name="url2" required  lay-verify="required" placeholder="三个月购买链接,请以http://开头" autocomplete="off" class="layui-input" value="<?php echo sname(session('user'),'url2'); ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">六个月链接</label>
                    <div class="layui-input-block">
                        <input type="text" name="url6" required  lay-verify="required" placeholder="六个月购买链接,请以http://开头" autocomplete="off" class="layui-input" value="<?php echo sname(session('user'),'url6'); ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">一年链接</label>
                    <div class="layui-input-block">
                        <input type="text" name="url3" required  lay-verify="required" placeholder="一年购买链接,请以http://开头" autocomplete="off" class="layui-input" value="<?php echo sname(session('user'),'url3'); ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">永久链接</label>
                    <div class="layui-input-block">
                        <input type="text" name="url4" required  lay-verify="required" placeholder="永久购买链接,请以http://开头" autocomplete="off" class="layui-input" value="<?php echo sname(session('user'),'url4'); ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

<?php }?>

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
        if(@$code=='2'){
            echo "layer.msg('糟糕 !修改失败', {icon: 5});";
        }elseif(@$code=='1'){
        echo "layer.msg('恭喜 !修改成功', {icon: 6});";
    }
 ?>

</script>
</body>
</html>
