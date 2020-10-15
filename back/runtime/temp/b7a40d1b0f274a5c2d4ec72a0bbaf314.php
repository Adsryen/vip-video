<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"/www/wwwroot/b.lininan.com/application/index/view/vip/advert.html";i:1551816900;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>代理管理</title>
    <meta name="description" content="">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/public/static/amz/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/public/static/amz/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/public/static/amz/css/amazeui.min.css" />
    <link rel="stylesheet" href="/public/static/amz/css/admin.css">
    <link rel="stylesheet" href="/public/static/amz/css/app.css">
    <script src="/public/static/amz/js/echarts.min.js"></script>

    <!--old  下-->

    <link rel="stylesheet" href="/public/static/assets/css/fonts/linecons/css/linecons.css">

    <link rel="stylesheet" href="/public/static/assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/static/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/public/static/assets/css/xenon-core.css">
    <link rel="stylesheet" href="/public/static/assets/css/xenon-forms.css">
    <link rel="stylesheet" href="/public/static/assets/css/xenon-components.css">
    <link rel="stylesheet" href="/public/static/assets/css/xenon-skins.css">
    <link rel="stylesheet" href="/public/static/assets/css/custom.css">

    <script src="/public/static/assets/js/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="/public/static/assets1/css/layui.css">
    <link rel="stylesheet" href="/public/static/assets1/css/view.css"/>
    <script src="/public/static/assets1/layui.all.js"></script>
    <!--old  上-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/public/static/assets/js/html5shiv.min.js"></script>
    <script src="/public/static/assets/js/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="/public/static/assets/css/fonts/elusive/css/elusive.css">

</head>

<body data-type="index">



<?php if(session('power')=='0'){?>


<div class="panel panel-default">




        <form role="form" id="form1" method="post" action="<?php echo url('vip/advert'); ?>" class="validate">

			<div class="form-group" >
                <label class="control-labell" for="field-5" style="color:#fb0cb5">app名称</label>
				<br>
                <input class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('20'); ?>" name="zad1" >
            </div>     

   
    	 <div class="form-group">
                <label >APP首页公告</label>
				<br>
                <textarea class="form-control" name="advert1" cols="5" id="field-5" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 50px;"><?php echo advert('7'); ?></textarea>
                </div>
          
                <div class="form-group">
       
                <label  class="control-labell" for="field-5">代理公告</label>
	
                <textarea class="form-control" name="advert" cols="5" id="field-5" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 50px;"><?php echo advert('1'); ?></textarea>
              </div>
	        <br>	<br>
			<div class="form-group" >
                <label class="control-labell" for="field-5">积分兑换（X积分兑换一天使用时间）</label>
				<br>
                <input class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('4'); ?>" name="sign" >
            </div>

				<div class="form-group">
                <label class="control-labell" for="field-5" >试用时间（请填写分钟）</label>
				<br>
                <input type='number' class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('5'); ?>" name="time" >
            </div>


          	<br>	<br>
				<div class="form-group">

                <label class="control-labell" for="field-5">解析接口地址1</label>
                <input type='text' class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('8'); ?>" name="geng" >
            </div>
			<br>
			<div class="form-group">
                <label class="control-labell" for="field-5">解析接口地址2</label>
                <input type='text' class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('9'); ?>" name="geng2" >
            </div>
			<br>
			<div class="form-group">
                <label class="control-labell" for="field-5">解析接口地址3</label>
                <input type='text' class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('10'); ?>" name="geng3" >
            </div>
			<br>
			<div class="form-group">
                <label class="control-labell" for="field-5">解析接口地址4</label>
                <input type='text' class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('11'); ?>" name="geng4" >
            </div>
			<br>
			<div class="form-group">
                <label class="control-labell" for="field-5">解析接口地址5</label>
                <input type='text' class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('12'); ?>" name="geng5" >
            </div>
	
                    
          
			<br>
			<div class="form-group">
                <label class="control-labell" for="field-5">解析接口地址6</label>
                <input type='text' class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('13'); ?>" name="geng6" >
            </div>
          
			<br>
			<div class="form-group">
                <label class="control-labell" for="field-5">解析接口地址7</label>
                <input type='text' class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('14'); ?>" name="geng7" >
            </div>
          
			<br>
			<div class="form-group">
                <label class="control-labell" for="field-5">解析接口地址8</label>
                <input type='text' class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('15'); ?>" name="geng8" >
            </div>
          
			<br>
			<div class="form-group">
                <label class="control-labell" for="field-5">解析接口地址9</label>
                <input type='text' class="form-control" style="margin: 0px -33.5px 0px 0px; width: 650px; height: 30px;" value="<?php echo advert('16'); ?>" name="geng9" >
            </div>          
       
            <div class="form-group">
                <button type="submit" class="btn btn-success">提交</button>
                <button type="reset" class="btn btn-white">重置</button>
            </div>

        </form>

    </div>


<?php echo !empty($code) && $code=='1'?'<div class="col-md-6" id="alert" style="position:fixed;right:0px;bottom:0px;  width: 350px">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>

        <strong>恭喜 !</strong> 修改成功.
    </div>
</div>

':''; ?>
<script>
    setTimeout("$('#alert').fadeOut(1000)",2000)
</script>

<script>
var number=9; //定义条目数

function LMYC() {
var lbmc;
    for (i=1;i<=number;i++) {
        lbmc = eval('LM' + i);
        lbmc.style.display = 'none';
    }
}
 
function ShowFLT(i) {
    lbmc = eval('LM' + i);
    if (lbmc.style.display == 'none') {
        LMYC();
        lbmc.style.display = '';
    }
    else {
        lbmc.style.display = 'none';
    }
}
</script>

<script type="text/javascript">
var __aObj=document.getElementsByTagName("a");
var __length=__aObj.length;
for(var i=0;i<__length;i++){
	__aObj[i].onfocus=function(){this.blur();}
}
</script>
<?php }?>