<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/www/wwwroot/b.lininan.com/application/index/view/shangcheng/index.html";i:1551816900;}*/ ?>
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
<!-- Responsive Table -->
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
          
          
          
          

   

          
          
          
            <div class="panel-heading">

                  <!--标题-->         
               <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 积分商品管理
                    </div>
    <!--标题-->
              
              
              
                <div class="panel-options">


                    <a href="#" data-toggle="panel">
                        <span class="collapse-icon">&ndash;</span>
                        <span class="expand-icon">+</span>
                    </a>

                    <a href="#" data-toggle="reload">
                        <i class="fa-rotate-right"></i>
                    </a>

                    <a href="#" data-toggle="remove">
                        &times;
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk"
                     data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">

                    <div class="btn-toolbar">
                        <div class="btn-group focus-btn-group">
                            <a href="<?php echo url('shangcheng/add'); ?>">
                                <button class="btn btn-default"><i class="el-pencil"></i> 添加</button>
                            </a>
                        </div>
                    </div>

  <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk"
                     data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                        <thead>
                        <tr>
						    <th style="width: 120px">商品id</th>
                          	<th style="width: 180px">商品图片</th>
                            <th>标题</th>
                            <th>描述</th>  
                            <th>价格</th>
                            <th style="width: 150px">操作</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                          
                          	<th >
                                <?php echo $vo['id']; ?>
                            </th>
                          
						     <th >
                                <img style="width: 100%; height:auto" src="<?php echo $vo['picurl']; ?>">
                            </th>
                          
                            <th >
                                <?php echo $vo['title']; ?>
                            </th>
                            <th >
                                <?php echo $vo['miaoshu']; ?>
                            </th>

                            <th >
                                <?php echo $vo['money']; ?>/元
                            </th>
                           <th style=" text-align: center;"> 
                             	<a href="<?php echo url('shangcheng/update',['id'=>$vo['id']]); ?>" title="修改" > <i class="el-edit" style="font-size: 18px;color: #68b828"></i></a>
                               &nbsp;
                               <a href="<?php echo url('shangcheng/del',['id'=>$vo['id']]); ?>" title="删除" class="btn-single"><i class="el-trash-circled" style="font-size: 18px;color:#cc3f44"></i></a></th>

                        	</tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
</div>
                    <?php echo $list->render(); ?>

                </div>

            </div>


        </div>

    </div>


</div>

<?php if(input('code')=='0'){ ?>
<div class="col-md-6">
    <div class="alert alert-danger" id="alert" style="position:fixed;right:0px;bottom:0px;  width: 350px">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong> 糟糕 !</strong> <?php echo input('msg');?>
    </div>
</div>

<?php }if(input('code')=='1'){ ?>
<div class="col-md-6" id="alert" style="position:fixed;right:0px;bottom:0px;  width: 350px">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>

        <strong>恭喜 !</strong> <?php echo input('msg');?>
    </div>
</div>

<?php }?>

