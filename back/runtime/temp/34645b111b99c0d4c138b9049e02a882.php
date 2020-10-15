<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/www/wwwroot/959495.xyz/applications/index/view/common/epayconfig.html";i:1555060394;}*/ ?>
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
            <div class="layui-header"  align="center" >用户在线购卡配置</div>
            <div class="layui-form layui-card-body" >
                <div class="layui-form-item">
                    <label class="layui-form-label">支付地址</label>
                    <div class="layui-input-block">
                        <input type="text" id="url1" required  value="<?php echo $epay1['apiurl']; ?>" lay-verify="required" placeholder="请以http://开头" autocomplete="off" class="layui-input" >
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">商户ID</label>
                    <div class="layui-input-block">
                        <input type="text" id="id1" required value="<?php echo $epay1['partner']; ?>"  lay-verify="required" placeholder="" autocomplete="off" class="layui-input" >
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">商户密钥</label>
                    <div class="layui-input-block">
                        <input type="text" id="key1" required  value="<?php echo $epay1['key']; ?>" lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
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


        <div class="layui-card">
            <div class="layui-header" align="center">合伙人在线充值配置</div>
            <div class="layui-form layui-card-body" >
                <div class="layui-form-item">
                    <label class="layui-form-label">支付地址</label>
                    <div class="layui-input-block">
                        <input type="text" id="url2" required value="<?php echo $epay2['apiurl']; ?>"  lay-verify="required" placeholder="请以http://开头" autocomplete="off" class="layui-input" >
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">商户ID</label>
                    <div class="layui-input-block">
                        <input type="text" id="id2" required value="<?php echo $epay2['partner']; ?>"  lay-verify="required" placeholder="" autocomplete="off" class="layui-input" >
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">商户密钥</label>
                    <div class="layui-input-block">
                        <input type="text" id="key2" required value="<?php echo $epay2['key']; ?>"  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-blue" id="btn2">立即提交</button>
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
        $.post("",{
            type:1,
            id:$('#id1').val(),
            key:$('#key1').val(),
            url:$('#url1').val(),
        },function (res) {
            $.post("",{
                do:1,
                type:1,
                id:$('#id1').val(),
                key:$('#key1').val(),
                url:$('#url1').val(),
            },function (res) {
                alert(res);
            });
        });
    });

    $('#btn2').on('click',function () {
        $.post("",{
            type:2,
            id:$('#id2').val(),
            key:$('#key2').val(),
            url:$('#url2').val(),
        },function (res) {
            $.post("",{
                do:1,
                type:2,
                id:$('#id2').val(),
                key:$('#key2').val(),
                url:$('#url2').val(),
            },function (res) {
                alert(res);
            });
        });


    });
</script>
</body>
</html>
