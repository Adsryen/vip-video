<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"/www/wwwroot/959495.xyz/applications/index/view/user/daoqi.html";i:1551816900;}*/ ?>
<?php if(session('power')=='0'){?>
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
                        <span class="am-icon-code"></span> 即将到期
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


                <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk"
                     data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">


                    <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>账户</th>

                            <th>审核</th>
                            <th>创建时间</th>
                            <th>最后登陆时间</th>
                            <th>会员到期时间</th>
                            <th>剩余点数</th>
                            <th>登录次数</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>

                            <td><?php echo $vo['username']; ?></td>

                            <td><button class="btn btn-gray" onclick="status('<?php echo !empty($vo['status']) && $vo['status']=='1'?'0':'1'; ?>','<?php echo $vo['id']; ?>')"><?php echo !empty($vo['status']) && $vo['status']==='1'?'<span style="color: green"> 封&nbsp;&nbsp;&nbsp;&nbsp;号</span>':'<span style="color: red"> 解封</span>'; ?></button></td>
                            <td><?php echo date("Y-m-d H:i:s",$vo['ctime']); ?></td>
                            <td>

                                <?php
                                    if($vo['logintime']=='0')
                                    {
                                        echo '未登陆';
                                    }else{
                                        echo date('Y-m-d H:i:s',$vo['logintime']);
                                    }
                                ?>


                            </td>


                            <td><button onclick="btime('<?php echo $vo['id']; ?>')" class="btn btn-gray">
                                <?php
                                    if($vo['lasttime']=='0')
                                    {
                                        echo '未充值';
                                    }elseif($vo['lasttime']<time()){
                                        echo '<span style="color:red">'.date('Y-m-d H:i:s',$vo['lasttime']).'</span>';
                                    }else{
                                        echo date('Y-m-d H:i:s',$vo['lasttime']);
                                    }
                                ?></button></td>
                            <td><button onclick="money('','<?php echo $vo['id']; ?>')" class="btn btn-gray"><?php echo $vo['money']; ?></button></td>
                            <td><?php echo $vo['count']; ?></td>


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
<?php }?>