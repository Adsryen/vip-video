<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/www/wwwroot/959495.xyz/applications/index/view/getmoney/tixian.html";i:1551816900;s:71:"/www/wwwroot/959495.xyz/applications/index/view/public/footer.html";i:1551816900;}*/ ?>
<?php if(session('power')>='0' or session('power')=='-1'){?>

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
      <link rel="stylesheet" href="https://fam.nos-eastchina1.126.net/1.css">
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


    <!--old  上-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/public/static/assets/js/html5shiv.min.js"></script>
    <script src="/public/static/assets/js/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="/public/static/assets/css/fonts/elusive/css/elusive.css">
    <link rel="stylesheet" href="/public/static/assets1/css/layui.css">
    <link rel="stylesheet" href="/public/static/assets1/css/view.css"/>
    <script src="/public/static/assets1/layui.all.js"></script>

</head>

<body data-type="index">

<div class="tpl-page-container">


<div class="panel panel-default">




        <form role="form" id="form1" method="post" action="<?php echo url('save'); ?>" class="validate" onsubmit="return checkpwd();">

		  
            <h2>当前可提现余额：¥<?php echo $data['moneys']; ?></h2>
          </br>
            <input type="hidden" id="moneys" value="<?php echo $data['moneys']; ?>">
    
            <div class="form-group">
             <label class="control-labell" for="field-5" >输入支付宝账号和姓名 比如：15888888888 小张</label>
             <br>
             <input  class="form-control" style="margin: 0px -33.5px 0px 0px;  height: 30px;" value="" name="number" id="number" >
         </div>
     <!--    <div class="form-group">
             <label class="control-labell" for="field-5" >输入姓名</label>
             <br>
             <input  class="form-control" style="margin: 0px -33.5px 0px 0px;  height: 30px;" value="" name="name"  id="name">
         </div>-->
           <div class="form-group">
             <label class="control-labell" for="field-5" >输入提现金额（最低100元）</label>
             <br>
             <input  class="form-control" style="margin: 0px -33.5px 0px 0px;  height: 30px;" value="" name="size" id="size" >
         </div>
            
           <div class="form-group">
                <button type="submit" class="btn btn-success">提交申请</button>
      </br>小贴士：申请提现后最慢24小时内到账，</br>联系客服加急处理，可立即到账，</br>
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
    function checkpwd(){
       // return false;
           var size = $('#size').val();
           var moneys= $('#moneys').val();
         
           if(parseInt(size)<100){
             alert('提现金必须大于100元');
              return false;
           }
           if(parseInt(size)>parseInt(moneys)){
            alert('提现金额大于账户现金');
            return false;
           }
    }
    setTimeout("$('#alert').fadeOut(1000)",2000)
</script>

<script>
var number=10; //定义条目数

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
<link rel="stylesheet" href="/public/static/assets/css/fonts/meteocons/css/meteocons.css">

<!-- Bottom Scripts -->
<script src="/public/static/assets/js/bootstrap.min.js"></script>
<script src="/public/static/assets/js/TweenMax.min.js"></script>
<script src="/public/static/assets/js/resizeable.js"></script>
<script src="/public/static/assets/js/joinable.js"></script>
<script src="/public/static/assets/js/xenon-api.js"></script>
<script src="/public/static/assets/js/xenon-toggles.js"></script>


<!-- Imported scripts on this page -->
<script src="/public/static/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/public/static/assets/js/jvectormap/regions/jquery-jvectormap-world-mill-en.js"></script>
<script src="/public/static/assets/js/xenon-widgets.js"></script>


<script src="/public/static/assets/js/xenon-widgets.js"></script>
<script src="/public/static/assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
<script src="/public/static/assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>

<script src="/public/static/assets/js/jquery-validate/jquery.validate.js"></script>
<!-- JavaScripts initializations and stuff -->
<script src="/public/static/assets/js/xenon-custom.js"></script>
<script src="/public/static/layer/layer.js"></script>
<?php }?>