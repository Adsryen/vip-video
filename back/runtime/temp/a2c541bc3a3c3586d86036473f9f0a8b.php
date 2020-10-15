<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/www/wwwroot/959495.xyz/applications/index/view/user/kamitc.html";i:1551816900;}*/ ?>
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

            <form class="layui-form layui-card-body"  method="post" action="<?php echo url('user/kamitc'); ?>">

              <h2>代理提成</h2>
              <hr/>
              
              <h3 style="color:red">一级提成</h3>
              <hr/>
                <div class="layui-form-item">
                    <label class="layui-form-label">一级七天卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yiji7" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl1['qitian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">一级月卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yiji30" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl1['yigeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">一级三个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yiji90" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl1['sangeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">一级六个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yiji180" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl1['liugeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">一级年卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yiji365" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl1['yinian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">一级永久卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yijiyj" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl1['yongjiu']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              <h3 style="color:red">二级提成</h3>
              <hr/>
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级七天卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erji7" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl2['qitian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级月卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erji30" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl2['yigeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级三个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erji90" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl2['sangeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级六个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erji180" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl2['liugeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级年卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erji365" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl2['yinian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级永久卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erjiyj" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl2['yongjiu']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              <h3 style="color:red">三级提成</h3>
              <hr/>
              <div class="layui-form-item">
                    <label class="layui-form-label">三级七天卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanji7" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl3['qitian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">三级月卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanji30" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl3['yigeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">三级三个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanji90" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl3['sangeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">三级六个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanji180" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl3['liugeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">三级年卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanji365" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl3['yinian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">三级永久卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanjiyj" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $dl3['yongjiu']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              
              <br/>
              <h2>合伙人提成</h2>
              <hr/>
              <h3 style="color:red">一级提成</h3>
              <hr/>
                <div class="layui-form-item">
                    <label class="layui-form-label">一级七天卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yiji7s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr1['qitian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">一级月卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yiji30s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr1['yigeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">一级三个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yiji90s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr1['sangeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">一级六个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yiji180s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr1['liugeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">一级年卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yiji365s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr1['yinian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">一级永久卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="yijiyjs" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr1['yongjiu']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              <h3 style="color:red">二级提成</h3>
              <hr/>
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级七天卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erji7s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr2['qitian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级月卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erji30s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr2['yigeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级三个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erji90s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr2['sangeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级六个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erji180s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr2['liugeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级年卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erji365s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr2['yinian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">二级永久卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="erjiyjs" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr2['yongjiu']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              <h3 style="color:red">三级提成</h3>
              <hr/>
              <div class="layui-form-item">
                    <label class="layui-form-label">三级七天卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanji7s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr3['qitian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">三级月卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanji30s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr3['yigeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">三级三个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanji90s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr3['sangeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">三级六个月卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanji180s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr3['liugeyue']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">三级年卡卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanji365s" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr3['yinian']; ?>">
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                </div>
              
              	<div class="layui-form-item">
                    <label class="layui-form-label">三级永久卡密提成</label>
                    <div class="layui-input-block">
                        <input type="text" name="sanjiyjs" required  lay-verify="required" placeholder="提成金额" autocomplete="off" class="layui-input" value="<?php echo $hhr3['yongjiu']; ?>">
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
