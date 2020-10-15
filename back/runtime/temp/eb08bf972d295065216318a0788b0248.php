<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"/www/wwwroot/yy.idc66.xyz/appliations/index/view/index/index.html";i:1552319470;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/public/static/assets1/css/layui.css">
    <link rel="stylesheet" href="/public/static/assets1/css/view.css"/>
    <title></title>
</head>
<body class="layui-view-body">
<div class="layui-content">
    <div class="layui-row layui-col-space20">
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-body chart-card">
                    <div class="chart-header">
                        <div class="metawrap">
                            <div class="meta">
                                <span>总用户数</span>
                            </div>
                            <div class="total"><?php echo $ycount; ?></div>
                        </div>
                    </div>
                    <div class="chart-body">
                        <div class="contentwrap">

                        </div>
                    </div>
                    <div class="chart-footer">
                        <div class="field">
                            <span>今天登录人数</span>
                            <span><?php echo $tzcount; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-body chart-card">
                    <div class="chart-header">
                        <div class="metawrap">
                            <div class="meta">
                                <span>付费用户</span>
                            </div>
                            <div class="total"><?php echo $fcount; ?></div>
                        </div>
                    </div>
                    <div class="chart-body">
                        <div class="contentwrap">

                        </div>
                    </div>
                    <div class="chart-footer">
                        <div class="field">
                            <span>打开APP次数统计</span>
                            <span><?php echo $open; ?> 次</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-body chart-card">
                    <div class="chart-header">
                        <div class="metawrap">
                            <div class="meta">
                                <span>免费用户</span>
                            </div>
                            <div class="total"><?php echo $mcount; ?></div>
                        </div>
                    </div>
                    <div class="chart-body">
                        <div class="contentwrap">

                        </div>
                    </div>
                    <div class="chart-footer">
                        <div class="field">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-body chart-card">
                    <div class="chart-header">
                        <div class="metawrap">
                            <div class="meta">
                                <span>代理数</span>
                            </div>
                            <div class="total"><?php echo $dcount; ?></div>
                        </div>
                    </div>
                    <div class="chart-body">
                        <div class="contentwrap">

                        </div>
                    </div>
                    <div class="chart-footer">
                        <div class="field">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
<div class="layui-content">
<div class="layui-col-md12">
    <div class="layui-card">
          <div class="layui-card-header">项目进度</div>
      	
        <div class="layui-card-body">

            <ul class="layui-timeline">
			 <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">
                           当前版本：欣然影视最新版
                        </div>
                    </div>
                </li>
			      <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">
                            源码搭建QQ：1558310060
                        </div>
                    </div>
                </li>

            </ul>

        </div>
    </div>
</div>
</div>
<script src="/public/static/assets1/layui.all.js"></script>
<script>
    var element = layui.element;
  
  	function gengxin(){
    	alert('已是最新版本');
    }
</script>
</body>
</html>