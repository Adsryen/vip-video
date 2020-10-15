<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
    <head>
        <title>后台登录-全网解析 智能解析</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="Content-language" content="zh-CN"/> 
        <meta name="renderer" content="webkit|ie-comp|ie-stand"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta http-equiv="pragma" content="no-cache"/><meta http-equiv="expires" content="0" />
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8"/> <!-- 手机H5兼容模式 -->
        <meta http-equiv="Cache-Control" content="no-siteapp" /><meta http-equiv="Cache-Control" content="no-cache" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./js/jquery.min.js"></script>
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
    </head>
    <body>
        <!-- 顶部开始 -->
        <div class="container">
            <div class="logo"><a href="./index.html">全网解析</a></div>
            <div class="left_open">
                <i title="展开左侧栏" class="iconfont">&#xe699;</i>
            </div>

            <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;"><?php echo $username ?></a>
                    <dl class="layui-nav-child"> <!-- 二级菜单 -->

                        <dd><a onclick="x_admin_show('管理员密码修改', 'admin_edit.php',460,300)" href="javascript:;">修改密码</a></dd>
                        <dd><a href="./login.php?action=logout">安全退出</a></dd>             

                    </dl>
                </li>
                <li class="layui-nav-item to-index"><a href="./../" target="_blank">前台首页</a></li>
            </ul>

        </div>
        <!-- 顶部结束 -->
        <!-- 中部开始 -->
        <!-- 左侧菜单开始 -->
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">

                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6ae;</i>
                            <cite>系统设置</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="admin_system.php">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>基本设置</cite>
                                </a>
                            </li >



                            <li>
                                <a _href="admin_play.php">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>播放设置</cite>
                                </a>
                            </li >

                            
                            
                            <li>
                                <a _href="admin_jmp.php">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>跳转设置</cite>
                                </a>
                            </li >
                            
                            
                            
                            <li>
                                <a _href="admin_link.php">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>对接设置</cite>
                                </a>
                            </li >


                            <li>
                                <a _href="admin_yun.php">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>云播设置</cite>
                                </a>
                            </li >



                        </ul>
                    </li>       

                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6fa;</i>
                            <cite>防火墙设置</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="admin_black_off.php">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>开关控制</cite>
                                </a>
                            </li >


                            <li>
                                <a _href="admin_black_match.php">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>规则设置</cite>
                                </a>
                            </li >

                            <li>
                                <a _href="admin_black.php">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>动作设置</cite>
                                </a>
                            </li >


                        </ul>
                    </li>



                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6b4;</i>
                            <cite>站长工具</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
      
                            <li>
                                <a _href="https://c.runoob.com/front-end/854">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>正则调试</cite>
                                </a>
                                
                            </li>
                            <li>
                                <a _href="https://tool.lu/js/">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>JS加解密</cite>
                                </a>
                                
                            </li>
                            
                            
                            
                             <li>
                             <li>
                                <a _href="https://c.runoob.com/front-end/703">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>MD5加密</cite>
                                </a>
                                
                            </li>
                             <li>    
                                
                            </li>
                              <li>
                                <a _href="https://c.runoob.com/">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>综合工具</cite>
                                </a>
                                
                            </li>
                            
                            <li>
                                <a _href="unicode.html">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>图标对应字体</cite>
                                </a>
                                
                            </li>
                            
                            
                            
                            
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <div class="x-slide_left"></div> -->
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home"><i class="layui-icon">&#xe68e;</i>后台首页</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src='./admin_body.php' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <!-- 右侧主体结束 -->
        <!-- 中部结束 -->
        <!-- 底部开始 -->
        <div class="footer">
            <div class="copyright">Copyright ©2018 00000 All Rights Reserved</div>  
        </div>
        <!-- 底部结束 -->


    </body>
</html>