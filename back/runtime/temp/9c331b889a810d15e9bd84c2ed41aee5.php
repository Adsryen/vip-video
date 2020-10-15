<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/www/wwwroot/959495.xyz/applications/index/view/banner/update.html";i:1551816900;}*/ ?>
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

<div class="row">
    <div class="col-md-12">
      
      
      
<div class="panel panel-default">

  <!--标题-->
         
       <div class="panel-heading">
              
               <div class="caption font-green bold">
                   广告图片修改
                    </div>

            </div>
       
   
    <!--标题-->
    <br> <br>
            <img style="width: 20%; height:auto" src="<?php echo $data['picurl']; ?>">


    <div class="panel-body">

        <form role="form" id="form1"  method="post" action="<?php echo url('banner/edit'); ?>" enctype="multipart/form-data" class="validate">

            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <div class="form-group">
                <label class="control-label">图片</label>
                <input type="file" class="form-control layui-input" name="picurl" />
            </div>
          
           <div class="form-group">
                <label class="control-label">网络图片地址(根据需要选择）</label>

                <input type="text" class="form-control  layui-input" name="img" value="<?php echo $data['picurl']; ?>"   placeholder="" />
            </div>
          
          
            <div class="form-group">
                <label class="control-label">标题</label>

                <input type="text" class="form-control  layui-input" name="name" value="<?php echo $data['name']; ?>"  placeholder="" />
            </div>
            <div class="form-group">
                <label class="control-label">描述</label>

                <input type="text" class="form-control  layui-input" name="content" value="<?php echo $data['content']; ?>"  placeholder="" />
            </div>
            <div class="form-group">
                <label class="control-label">分类</label>
                <br>
                <select class="inp_1  layui-input" id="cid" name="cid">
                    <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                         <option value="<?php echo $vo['id']; ?>" <?php if($vo['id']==$c){echo 'selected';}else{
                                echo '';
                               }?>><?php echo $vo['cname']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">跳转链接</label>

                <input type="text" class="form-control  layui-input" name="linkurl" value="<?php echo $data['linkurl']; ?>"  placeholder="" />
            </div>
            <div class="form-group">
                <label class="control-label">排序</label>

                <input type="text" class="form-control layui-input" name="sort"  value="<?php echo $data['sort']; ?>" placeholder="" />
            </div>
            <div class="form-group">
                <button type="submit" class="layui-btn layui-btn-blue">提交</button>

            </div>

        </form>

    </div>

</div>
    </div>

</div>

<?php echo !empty($code)?'
<div class="col-md-6">
    <div class="alert alert-danger" id="alert" style="position:fixed;right:0px;bottom:0px;  width: 350px">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong> 糟糕 !</strong> '.$code.'
    </div>
</div>

':''; ?>
<script>
    setTimeout("$('#alert').fadeOut(1000)",2000)
</script>

</div>
</body>

</html>