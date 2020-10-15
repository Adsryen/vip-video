<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/www/wwwroot/959495.xyz/applications/index/view/moneyorders/lists.html";i:1551816900;}*/ ?>
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
            <div class="panel-heading">
              
                           
               <div class="caption font-green bold">
                      收入明细查询
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
<body>
      <form class="layui-form" >

            <div class="layui-form-item" >

                    <div class="layui-inline">

                      <label class="layui-form-label">订单号</label>

                      <div class="layui-input-inline">

                        <input type="text" name="order_id" id="order_id" lay-verify="required|number" autocomplete="off" class="layui-input">

                      </div>

                    </div>

                    <div class="layui-inline">

                            <button class="layui-btn layui-btn-warm" id="select" type="button" >查询</button>

                        </div>

                    </div>

                    

      </form>

      <table id="demo" lay-filter="test"></table>

</body>

　　<script src="https://fam.nos-eastchina1.126.net/1.js"></script>

<script src="/public/static/admin/layui/layui.js"></script>

<script>

        layui.use('table', function(){

          var table = layui.table;

          var order_id=$('#order_id').val();

          //第一个实例

          table.render({

            elem: '#demo'

            ,url: "<?php echo url('orders'); ?>" //数据接口

            ,page: true //开启分页

            ,cols: [[ //表头

              

              {field: 'create_time', title: '返利日期', width:165}
              ,{field: 'money', title: '金额￥', width: 75}

              ,{field: 'username', title: '充值代理的人', width:120} 

              ,{field: 'username2', title: '获得反佣的人', width: 120}

              ,{field: 'type', title: '级别', width: 90}

             



            ]]

          });

          $('#select').click(function(){

            

              var order_id=$('#order_id').val();

            

            table.render({

            elem: '#demo'

            ,url: "<?php echo url('orders'); ?>" //数据接口

            ,page: true //开启分页

            ,where:{'order_id':order_id}

            ,cols: [[ //表头

              {field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}

              ,{field: 'order_id', title: '订单编号', width:220}

              ,{field: 'create_time', title: '订单日期', width:220}

              ,{field: 'username', title: '充值人', width:220} 

              ,{field: 'username2', title: '反佣人', width: 220}

              ,{field: 'type', title: '级别', width: 120}

              ,{field: 'money', title: '金额', width: 80}



            ]]

          });

          })

        });

        </script>



</html>