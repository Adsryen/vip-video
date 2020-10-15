<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/www/wwwroot/yy.idc66.xyz/application/index/view/getmoney/lists.html";i:1551816900;}*/ ?>
<?php if(session('power')>='0' or session('power')>='-1'){?>

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
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
              
                           
               <div class="caption font-green bold">
                        现金提现记录
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

                    <label class="layui-form-label">类型</label>

                    <div class="layui-input-inline">

                      <select name="modules" lay-verify="required" id="state" lay-search="">

                        <option value="">所有订单</option>

                        <option value="1">未审核</option>

                        <option value="2">审核完成</option>

               

                      </select>

                    </div>

                  </div>

                    <div class="layui-inline">

                            <button class="layui-btn layui-btn-warm" id="select" type="button" >查询</button>

                        </div>

                    </div>

                    

      </form>

      <table id="demo" lay-filter="test"></table>

</body>

<script type="text/html" id="titleTpl">

  {{#  if(d.state == 1){ }}

    审核中

  {{#  } else { }}

   审核通过

  {{#  } }}

</script>

<script type="text/html" id="barDemo">

  {{#  if(d.state == 1){ }}

  <a class="layui-btn layui-btn-xs" lay-event="edit">确认通过</a>

{{#  } else { }}

   <font color="Red">审核完成</font>

{{#  } }}

</script>

　　<script src="https://fam.nos-eastchina1.126.net/1.js"></script>

<script src="/public/static/admin/layui/layui.js"></script>



        <script>

            layui.use('table', function(){

              var table = layui.table;

              var state=$('#state').val();

              //第一个实例

              table.render({

                elem: '#demo'

                ,url: "<?php echo url('orders'); ?>" //数据接口

                ,page: true //开启分页

                ,cols: [[ //表头

               
         

                  {field: 'create_time', title: '申请日期', width:170}

                  ,{field: 'username', title: '申请人', width:120} 

                  ,{field: 'moneys', title: '金额', width: 80}

               ,{field: 'number', title: '支付宝账号', width: 220}
                   
                  ,{field: 'state', title: '状态', width: 90,templet: '#titleTpl'}

                  <?php if(session('power')=='0'){?>          ,{fixed: 'right',title:'管理', width: 90, align:'center', toolbar: '#barDemo'} <?php } ?>

    

                ]]

              });

              $('#select').click(function(){

                

                  var state=$('#state').val();

                

                table.render({

                elem: '#demo'

                ,url: "<?php echo url('orders'); ?>" //数据接口

                ,page: true //开启分页

                ,where:{'state':state}

                ,cols: [[ //表头

                  {field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}

                

                  ,{field: 'create_time', title: '订单日期', width:220}

                  ,{field: 'username', title: '申请人', width:220} 

                  ,{field: 'moneys', title: '金额', width: 120}

                  ,{field: 'number', title: '提现账号', width: 220}

                  ,{field: 'name', title: '提现姓名', width: 220}

                  ,{field: 'state', title: '状态', width: 120,templet: '#titleTpl'}         

            <?php if(session('power')=='0'){?>         ,{fixed: 'right',title:'管理', width: 165, align:'center', toolbar: '#barDemo'}  <?php } ?>

                ]]

              });

              })

              



              table.on('tool(test)', function(obj){ //注：tool 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"

              var tr = obj.data //获得当前行数据

            //  console.log(tr);

              layEvent = obj.event; //获得 lay-event 对应的值

              if(layEvent === 'edit'){

               $.ajax({

                 url:"<?php echo url('update'); ?>"

                 ,type: "GET",

                 data: {'id':tr.id},

                 success:function(re){

                    if(re.code==200){

                      alert('确认成功');

                      obj.update({

                      state: '审核通过'

                    });

                    }else{

                      alert('确认失败,以通过');

                    }

                 }

               })

                

                 

              }

            });



            });

            </script>



</html>
      <?php }?>