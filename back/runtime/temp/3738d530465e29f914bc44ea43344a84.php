<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"/www/wwwroot/yy.idc66.xyz/appliations/index/view/common/common.html";i:1552319540;}*/ ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/public/static/assets1/css/layui.css">
    <link rel="stylesheet" href="/public/static/assets1/css/admin.css">
    <link rel="icon" href="/favicon.ico">
    <title>代理管理</title>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header custom-header">

        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item slide-sidebar" lay-unselect>
                <a href="javascript:;" class="icon-font"><i class="ai ai-menufold"></i></a>
            </li>
            <?php if(session('power')=='1'){?>
            <li class="layui-nav-item  slide-sidebar" style="margin-left: 10px">

                <button class="layui-btn layui-btn-warm" ><?php echo yue(); ?>元</button>

            </li>
            <li class="layui-nav-item  slide-sidebar" style="margin-left: 10px">
                <button class="layui-btn layui-btn-normal" onclick="money('0',<?php echo id(); ?>)">代理充值</button>

            </li>
            <?php } ?>
        </ul>

        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item layui-hide-xs" lay-unselect>
                <a href="javascript:;" class="layui-btn layui-btn-radius layui-btn-danger" style="color: #fff"><?php echo power(); ?></a>

            </li>
            <li class="layui-nav-item">
                <a href="javascript:;"><?php echo name(); ?></a>
                <dl class="layui-nav-child">

                    <dd><a href="<?php echo url('login/login/dologin'); ?>">退出</a></dd>
                </dl>
            </li>
        </ul>
    </div>


    <div class="layui-side custom-admin">
        <div class="layui-side-scroll">

            <div class="custom-logo">
                <?php if(session('power')=='0'){?>
                <img src="/public/static/assets1/images/logo.png" alt=""/>
                <?php } ?>
            </div>
            <ul id="Nav" class="layui-nav layui-nav-tree">

                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe609;</i>
                        <em>主页</em>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('index/index/index'); ?>">管理中心</a></dd>
                    </dl>

                    <?php if(session('power')=='0'){?>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('vip/advert'); ?>">系统设置</a></dd>

                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('admin/index'); ?>">管&nbsp;&nbsp;理&nbsp;&nbsp;员</a></dd>
                    </dl>
                    <?php }?>         
                </li>
                <?php if(session('power')=='0'){?>
                <li class="layui-nav-item">
                    <a  href="<?php echo url('index/vip/apptc'); ?>">
                        <i class="layui-icon">&#xe678;</i>
                        <em>弹窗消息</em>
                    </a>
                  <dl class="layui-nav-child">
                    </dl>                    
                </li>
              
               <li class="layui-nav-item">
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe857;</i>
                        <em>商城管理</em>
                    </a>
                    <dl class="layui-nav-child">

                        <dd><a href="<?php echo url('shangcheng/index'); ?>">商品管理</a></dd>
                        <dd><a href="<?php echo url('shangcheng/dingdan'); ?>">订单管理</a></dd>

                    </dl>
                </li>

                      <?php }if(session('power')=='0' or session('power')=='1'){?>
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe857;</i>
                        <em>点卡管理</em>
                    </a>
                    <dl class="layui-nav-child">

                        <dd><a href="<?php echo url('dianka/index'); ?>">点卡生成</a></dd>
                        <dd><a href="<?php echo url('dianka/ylog'); ?>">有效点卡</a></dd>
                        <dd><a href="<?php echo url('dianka/slog'); ?>">点卡使用记录</a></dd>

                    </dl>
                </li>
              <?php }if(session('power')=='0' or session('power')=='1'){?>
                <li class="layui-nav-item">
                    <a  href="javascript:;">
                        <i class="layui-icon">&#xe678;</i>
                        <em>APP设置</em>
                    </a>
                  <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('index/user/pass'); ?>">APP设置</a></dd>
                     <?php if(session('power')=='0'){?>
                    <dd><a href="<?php echo url('index/user/kami'); ?>">卡密购买价格设置</a></dd>
                    <dd><a href="<?php echo url('index/user/kamitc'); ?>">卡密提成设置</a></dd>
                    <?php }?>
                  </dl>                    
                </li> 
              <?php }if(session('power')=='0' or session('power')=='1'){?>
                <li class="layui-nav-item">
                    <a  href="<?php echo url('/index/banner/index/id/1'); ?>">
                        <i class="layui-icon">&#xe678;</i>
                        <em>广告管理</em>
                    </a>
                  <dl class="layui-nav-child">
                    </dl>                    
                </li>              
              <?php }if(session('power')=='0'){?>          
              
            
              
                <li class="layui-nav-item">
                    <a  href="<?php echo url('user/paylog'); ?>">
                        <i class="layui-icon">&#xe678;</i>
                        <em>销售记录</em>
                    </a>
                  <dl class="layui-nav-child">
                    </dl>                    
                </li>                
                             
              
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe6ed;</i>
                        <em>影视管理</em>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('video/index'); ?>">电影推荐</a></dd>
                        <dd><a href="<?php echo url('mn/index'); ?>">美女视频</a></dd>
                        <dd><a href="<?php echo url('tv/index'); ?>">电视直播</a></dd>

                    </dl>
                </li>
                <?php } ?>
              
                  <li class="layui-nav-item">
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe857;</i>
                        <em>五级分润</em>
                    </a>
                    <dl class="layui-nav-child">

                        <dd><a href="<?php echo url('Moneyorders/lists'); ?>">收入明细查询</a></dd>
                        <dd><a href="<?php echo url('getmoney/lists'); ?>">现金提现记录</a></dd>
						<dd><a href="<?php echo url('getmoney/tixian'); ?>">现金提现</a></dd>
                      <?php if(session('power')=='0'){?>
                        <dd><a href="<?php echo url('classs/index'); ?>">分销设置</a></dd>
                      <?php }?>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe66f;</i>
                        <em>用户管理</em>
                    </a>
                    <dl class="layui-nav-child">
                      
                        <dd><a href="<?php echo url('vip/index'); ?>">用户管理</a></dd>
                      	<dd><a href="<?php echo url('user/indexs'); ?>">代理管理</a></dd>
                        <dd><a href="<?php echo url('user/index'); ?>">合伙人管理</a></dd>
                      
                       <?php if(session('power')=='0' or session('power')=='1'){?>
                        <dd><a href="<?php echo url('user/clog'); ?>">充值记录</a></dd>
                        <dd><a href="<?php echo url('user/xlog'); ?>">开通记录</a></dd>
                      <?php }if(session('power')=='0'){?>
                        <dd><a href="<?php echo url('user/mlog'); ?>">代理记录</a></dd>
                        <dd><a href="<?php echo url('user/daoqi'); ?>">即将到期</a></dd>
                        <?php } ?>

                    </dl>

            </ul>

        </div>
    </div>

    <div class="layui-body">
        <div class="layui-tab app-container" lay-allowClose="true" lay-filter="tabs">
            <ul id="appTabs" class="layui-tab-title custom-tab"></ul>
            <div id="appTabPage" class="layui-tab-content">


            </div>
        </div>
    </div>



    <div class="mobile-mask"></div>
</div>
<script src="/public/static/assets1/layui.js"></script>
<script src="/public/static/assets1/index.js" ></script>
<script src="/public/static/assets1/home.js" ></script>
<script>

    function money(status,id){
        if(status=='1')
        {
            var str = 'all';
        }else{
            if(id=='') {
                var str = "";
                $("input:checkbox[name='checkname']:checked").each(function () {
                    str += $(this).val() + ",";
                });

                if (str == '') {
                    return false
                }
            }else{
                var str     =   id
            }
        }


        layer.prompt({title: '请输入充值点数', formType: 3}, function(pass, index) {
            if(!isNaN(pass))
            {
                if(pass<1){
                    $('.layui-layer-content').append('<br><span style="color: red">最低起充金额1元</span>')
                    return false;
                }
                window.location.href='http://959495.xyz/daili_pay/?id='+id+'&name=代理自助充点&fee='+pass;
                layer.close(index);
            }else{
                $('.layui-layer-content').append('<br><span style="color: red">请填入纯数字</span>')
                return false;
            }


        })


    }

</script>
</body>
</html>