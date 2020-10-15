<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"/www/wwwroot/959495.xyz/applications/index/view/banner/index.html";i:1551816900;}*/ ?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广告管理</title>
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
<style>
    .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
        background-color: #1E9FFF !important;
        border-color: #1E9FFF !important;
    }
</style>
<body data-type="index">

<div class="tpl-page-container">


<!-- Responsive Table -->
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
             
               <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 广告设置
                    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1">
            <li>
                <a href="<?php echo url('/'); ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Banner</strong>
            </li>
        </ol>

    </div>

</div>
<!-- Responsive Table -->
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">

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
                    <div class="btn-toolbar">
                      	<?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                      	<div class="btn-group focus-btn-group">
                            <a href="/index/banner/index/id/<?php echo $v['id']; ?>.html">
                                <button class="btn btn-info"><?php echo $v['cname']; ?></button>
                            </a>
                        </div>
                      	<?php endforeach; endif; else: echo "" ;endif; ?>

                                             </div>          
            <div class="panel-body">
                <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk"
                     data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">

                    <div class="btn-toolbar">
                        <div class="btn-group focus-btn-group">
                            <a href="<?php echo url('banner/add'); ?>">
                                <button class="btn btn-default"><i class="el-pencil"></i> 添加</button>
                            </a>
                        </div>
                       


                       <!-- <div class="btn-group dropdown-btn-group pull-right">
                            <?php if(session('power')=='0'){?>
                            <a href="javascript:;" onclick="del('')" class=btn-single">
                                <button class="btn btn-danger" ><i class="el-cancel-circled2"></i>批量删除
                                </button>
                            </a>
                            <?php }?>

                        </div>
                        -->
                    </div>

  <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk"
                     data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                        <thead>
                        <tr>
						    <th style="width: 120px">图片</th>
                            <th>标题</th>
                            <th>描述</th>

                            <th>所属代理</th>

                            <th>跳转地址</th>
                            <th>排序</th>                        
                            <th style="width: 150px">操作</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
						     <th >
                                <img style="width: 100%; height:auto" src="<?php echo $vo['picurl']; ?>">
                            </th>
                            <th >
                                <?php echo $vo['name']; ?>
                            </th>
                            <th >
                                <?php echo $vo['content']; ?>
                            </th>

                            <th><?php echo $vo['uid']; ?></th>

                            <th >
                                <?php echo $vo['linkurl']; ?>
                            </th>
                            <th>
                                <?php echo $vo['sort']; ?>
                            </th>
                           <th style=" text-align: center;"> <a href="<?php echo url('banner/update',['id'=>$vo['id']]); ?>" title="修改" > <i class="el-edit" style="font-size: 18px;color: #68b828"></i></a>
                               &nbsp;
                               <a href="<?php echo url('banner/del',['id'=>$vo['id']]); ?>" title="删除" class=btn-single"><i class="el-trash-circled" style="font-size: 18px;color:#cc3f44"></i></a></th>

                            </td>

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