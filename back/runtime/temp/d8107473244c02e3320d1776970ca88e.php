<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/www/wwwroot/959495.xyz/applications/index/view/common/kmprice.html";i:1553662210;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/public/static/assets1/css/layui.css">
    <link rel="stylesheet" href="/public/static/assets1/css/view.css"/>
    <script src="/public/static/assets1/js/jq.js"></script>
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
            <div class="layui-header"  align="center" >提卡点数管理</div>
            <div class="layui-form layui-card-body" >
                <div class="layui-form-item">
                    <label class="layui-form-label">周卡</label>
                    <div class="layui-input-block">
                        <input id="zhou" type="number" min="0.01" value="<?php echo $price['zhou']; ?>"   required  lay-verify="required" autocomplete="off" class="layui-input" >
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">月卡</label>
                    <div class="layui-input-block">
                        <input id="yue"  type="number" min="0.01" value="<?php echo $price['yue']; ?>" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" >
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">季卡</label>
                    <div class="layui-input-block">
                        <input  id="ji" type="number" min="0.01" value="<?php echo $price['ji']; ?>" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">半年卡</label>
                    <div class="layui-input-block">
                        <input   type="number" min="0.01" id="ban" value="<?php echo $price['ban']; ?>" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">年卡</label>
                    <div class="layui-input-block">
                        <input type="number" min="0.01" id="nian" value="<?php echo $price['nian']; ?>" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">终身卡</label>
                    <div class="layui-input-block">
                        <input  type="number" min="0.01"  id="zhong" value="<?php echo $price['zhong']; ?>" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-blue" id="btn1">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="/public/static/assets1/layui.all.js"></script>


<script>
    $('#btn1').on('click',function () {
        array=['zhou','yue','ji','ban','nian','zhong'];
        $.post("",{
            zhou:$('#zhou').val(),
            yue:$('#yue').val(),
            ji:$('#ji').val(),
            ban:$('#ban').val(),
            nian:$('#nian').val(),
            zhong:$('#zhong').val(),
        },function (res) {
           alert(res)
        });
    });

</script>
</body>
</html>
