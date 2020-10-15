<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"/www/wwwroot/yy.idc66.xyz/application/index/view/index/huan.html";i:1551816900;}*/ ?>

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

</head>

           <div class="tpl-content-scope">
                <div class="note note-info">
                  
                  
                    <p> <span class="label label-sm label-warning">身份：<?php echo power(); ?> </span> <span class="label label-sm  label-success"> <?php echo share(); ?></span></p>
                  
                    <h3>尊敬的：<?php echo name(); ?> 您好：
                        <span class="close"></span>
                    </h3>
 
                  
                  
                    <p> 今天是<?php echo date('Y年m月d日'); ?></p>
                    <p> 欢迎您登陆.祝您身体健康.工作顺利.</p>
                  <br>
                  
                    <p><span class="label label-danger">公告:</span><?php echo advert(); ?></p>
                </div>
            </div>





		
			
			 <div class="row">
			
			   <div class="am-u-md-6 am-u-sm-12 row-mb">
                    <div class="tpl-portlet">
                        <div class="tpl-portlet-title">
                            <div class="tpl-caption font-green ">
                                <span>最新活动</span>
                            </div>

                        </div>

                        <div class="am-tabs tpl-index-tabs" data-am-tabs>
           

                            <div class="am-tabs-bd">
                                <div class="am-tab-panel am-fade am-in am-active">
                                    <div id="wrapperA" class="wrapper">
                                        <div id="scroller" class="scroller">
                                            <ul class="tpl-task-list tpl-task-remind">
   

                                                <li>
                                                    <div class="cosB">
                                                        - - -
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-info">
                        <i class="am-icon-bullhorn"></i>
                      </span>

                                                        <span> 暂无活动。</span>
                                                    </div>

                                                </li>
                                              
                                              
                                                                                            
                								  <li>
                                                    <div class="cosB">
                                                        - - -
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-danger">
                        <i class="am-icon-bolt"></i>
                      </span>

                                                        <span> ……</span>
                                                    </div>

                                                </li>
                                              
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                              

                            </div>
                        </div>

                    </div>
                </div>
			
        
            </div>
			


<!--老版本
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">系统公告</h1>

        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a ><i class="fa-home"></i>Home</a>
                </li>
            </ol>

        </div>

    </div>
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">今天是<?php echo date('Y年m月d日'); ?> </div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                        <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-sm-6">

                                    <h5>尊敬的<?php echo name(); ?></h5>

                                    <blockquote>
                                        <p>
                                            <strong>身份:<?php echo power(); ?></strong>
                                            <br />
                                            欢迎您登陆.祝您身体健康.工作顺利.
                                        </p>
                                    </blockquote>

                                </div>


                            </div>

                            <br />

                            <h5>公告</h5>

                            <blockquote class="pull-left" style="width: 100%">
                                <p><?php echo advert(); ?></p>
                                <small class="pull-right">
                                    发布人：
                                    <cite title="Source Title">管理员</cite>
                                </small>
                            </blockquote>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
-->