<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"/www/wwwroot/yy.idc66.xyz/applications/index/view/user/mlog.html";i:1551816900;}*/ ?>
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
              
               <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 代理纪录
       		  </div>

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
                <div style="text-align: center">
                    <form method="get" action="<?php echo url('user/mlog'); ?>">
                       操作日期 <input type="date" name="start" >&nbsp;-&nbsp;<input type="date" name="end" >
                        <?php if(session('power')=='0'){?>
                        <input placeholder="&nbsp;代理账户关键词" type="text" name="user" style="height: 38px">
                        <?php }?>
                        <input placeholder="&nbsp;用户账户关键词" type="text" name="vip" style="height: 38px">


                        <button type="submit" class="btn btn-turquoise" style="height: 38px;margin-top: 7px;">搜索</button>
                    </form>

                </div>

                <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk"
                     data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>操作账户</th>
                            <th>操作时间</th>
                            <th>充值人</th>



                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>

                            <td><?php echo gui($vo['uid']); ?></td>

                            <td><?php echo date("Y-m-d H:i:s",$vo['ctime']); ?></td>
                            <td><?php echo gui($vo['cid']); ?></td>



                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <?php echo $list->render(); ?>
                </div>

            </div>


        </div>

    </div>


</div>