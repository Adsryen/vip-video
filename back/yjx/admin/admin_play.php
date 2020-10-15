<?php include "config.php"; ?>
<html lang="zh-cmn-Hans">
    <head>
        <title>系统设置-全网解析</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Content-language" content="zh-CN">       
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="pragma" content="no-cache">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./js/jquery.min.js"></script>
        <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a><cite>首页</cite></a>  
                <a><cite>系统设置</cite></a>
                <a><cite>播放设置</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                <ul class="layui-tab-title">
                    <li class="layui-this">开关控制</li>
                    <li>线路设置 </li>

                    <li>播放器设置</li>
                    <li>样式设置</li>
                    <li>筛选设置</li>
                    <li>其他设置</li>
                </ul>
                <div class="layui-tab-content" >
                    <div class="layui-tab-item layui-show">
                        <form class="layui-form layui-form-pane" >



                            <fieldset class="layui-elem-field">

                                <legend>开关控制</legend>
                                <div class="layui-field-box">
                                    <table class="layui-table">
                                        <tbody>

                                            <tr>
                                                <th>链接跳转（优先级最高）</th>
                                                <td>
                                                    <select name="play_off_jmp" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['jmp'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr>


                                            <tr>
                                                <th>一次解析对接(优先级其次,可配合CMS插件使用)</th>
                                                <td>
                                                    <select name="play_off_link" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['link'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr>





                                            <tr>
                                                <th>云播放（优先级其次，关闭后不影响搜索功能）</th>
                                                <td>
                                                    <select name="play_off_yun" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['yun'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr>


                                            <tr>
                                                <th>直播(关闭后不会显示)</th>
                                                <td>
                                                    <select name="play_off_live" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['live'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr>
                                            
                                             <tr>
                                                <th>自定义链接(关闭后线路切换菜单不会显示搜索)</th>
                                                <td>
                                                    <select name="play_off_mylink" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['mylink'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <th>帮助信息(关闭后线路切换菜单不会显示帮助)</th>
                                                <td>
                                                    <select name="play_off_help" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['help'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>调试模式(生产环境下建议关闭)</th>
                                                <td>
                                                    <select name="play_off_debug" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['debug'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>调试信息（调试模式关闭时此设置无效）</th>
                                                <td>
                                                    <select name="play_off_log" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['log'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr> 
                                              <tr>
                                           <th>https资源替换(开启后如果https访问http资源会自动替换为https协议)</th>
                                                <td>
                                                    <select name="play_off_lshttps" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['lshttps'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr> 
                                              <tr>
                                                <th>优先云播播放</th>
                                                <td>
                                                    <select name="play_off_ckplay" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['ckplay'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr>                          
                                          
                                            
                                            <tr>
                                                <th>刷新换线路</th>
                                                <td>
                                                    <select name="play_off_autoline" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['autoline'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr>  
                                               <tr>
                                                <th>刷新换资源</th>
                                                <td>
                                                    <select name="play_off_autoflag" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['off']['autoflag'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>																	
                                                </td>
                                            </tr>                  
                                           

                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>  


                            <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="*" >
                                    保存
                                </button>
                            </div>

                        </form>

                    </div>



                    <div class="layui-tab-item">
                        <form class="layui-form layui-form-pane" action="">




                            <fieldset class="layui-elem-field">

                                <legend>pc端配置</legend>
                                <div class="layui-field-box">
                                    <table class="layui-table">
                                        <tbody>
                                            <tr>
                                                <th>默认线路</th>
                                                <td>
                                                    <select name="play_line_pc_line" lay-filter="province">							 
                                                        <?php foreach ($jx_url as $key => $val): ?>							 							 
                                                            <option value="<?php echo ($key + 1); ?>" <?php echo ($play['line']['pc']['line'] == ($key + 1)) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>

                                            </tr>

                                            <tr>
                                                <th>缓冲页显示时间</th>
                                                <td>	
                                                    <input type="text" name="play_line_pc_adtime" autocomplete="off" value="<?php echo $play['line']['pc']['adtime']; ?>" class="layui-input" >							
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>缓冲页地址</th>
                                                <td>	
                                                    <input type="text" name="play_line_pc_adPage" autocomplete="off" value="<?php echo $play['line']['pc']['adPage']; ?>" class="layui-input" >							
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>


                            <fieldset class="layui-elem-field">

                                <legend>移动端配置</legend>
                                <div class="layui-field-box">
                                    <table class="layui-table">
                                        <tbody>
                                            <tr>
                                                <th>默认线路</th>
                                                <td>
                                                    <select name="play_line_wap_line" lay-filter="province">							 
                                                        <?php foreach ($jx_url as $key => $val): ?>							 							 
                                                            <option value="<?php echo ($key + 1); ?>" <?php echo ($play['line']['wap']['line'] == ($key + 1)) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   				        			         
                                                    </select>

                                            </tr>

                                            <tr>
                                                <th>缓冲页显示时间</th>
                                                <td>	
                                                    <input type="text" name="play_line_wap_adtime" autocomplete="off" value="<?php echo $play['line']['wap']['adtime']; ?>" class="layui-input" >							
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>缓冲页地址</th>
                                                <td>	
                                                    <input type="text" name="play_line_wap_adPage" autocomplete="off" value="<?php echo $play['line']['wap']['adPage']; ?>" class="layui-input" >							
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>               



                            <fieldset class="layui-elem-field">

                                <legend>自动线路选择
                                    <input type="checkbox" id="play_line_all_autoline_off" name="play_line_all_autoline_off" lay-skin="switch"  lay-text="开启|关闭"  <?php echo $play['line']['all']['autoline']['off'] == 1 ? "checked" : ''; ?> value=<?php echo $play['line']['all']['autoline']['off']; ?> >
                                </legend>
                                <div class="layui-field-box">


                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">
                                            规则（添加格式：视频站域名 => 线路序号，每行一条）
                                        </label>
                                        <div class="layui-input-block">
                                            <textarea  name="play_line_all_autoline_val"  class="layui-textarea" ><?php
                                                $word = '';
                                                foreach ($play['line']['all']['autoline']['val'] as $key => $value) {
                                                    $word .= "$key => $value" . "\r\n";
                                                } echo $word;
                                                ?></textarea>
                                        </div>
                                    </div>

                                </div>             

                            </fieldset>                   

                            <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="*">
                                    保存
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="layui-tab-item">
                        <form class="layui-form layui-form-pane" action="">




                            <fieldset class="layui-elem-field">

                                <legend>PC端配置</legend>
                                <div class="layui-field-box">
                                    <table class="layui-table">
                                        <tbody>
                                            <tr>
                                                <th>默认播放器</th>
                                                <td>
                                                        <?php $arr = GlobalBase::getdirs("../player"); ?>

                                                    <select name="play_play_pc_player" lay-filter="province">							 
                                                        <?php foreach ($arr as $key): ?>							 							 
                                                            <option <?php echo ($play['play']['pc']['player'] == $key) ? "selected" : ''; ?> ><?php echo $key; ?></option>	   
<?php endforeach; ?>			         
                                                    </select>

                                            </tr>

                                            <tr>
                                                <th>自动播放</th>
                                                <td>	
                                                    <select name="play_play_pc_autoplay" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['play']['pc']['autoplay'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
<?php endforeach; ?>   				        			         
                                                    </select>			
                                                </td>
                                            </tr>




                                        </tbody>
                                    </table>
                                </div>
                            </fieldset> 

                            <fieldset class="layui-elem-field">

                                <legend>移动端配置</legend>
                                <div class="layui-field-box">
                                    <table class="layui-table">
                                        <tbody>
                                            <tr>
                                                <th>默认播放器</th>
                                                <td>

                                                    <select name="play_play_wap_player" lay-filter="province">							 
                                                        <?php foreach ($arr as $key): ?>							 							 
                                                            <option <?php echo ($play['play']['wap']['player'] == $key) ? "selected" : ''; ?> ><?php echo $key; ?></option>	   
<?php endforeach; ?>			         
                                                    </select>

                                            </tr>

                                            <tr>
                                                <th>自动播放</th>
                                                <td>	
                                                    <select name="play_play_wap_autoplay" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "开启") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($play['play']['wap']['autoplay'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
<?php endforeach; ?>   				        			         
                                                    </select>			
                                                </td>
                                            </tr>




                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>                    


                            <fieldset class="layui-elem-field">

                                <legend>其他配置</legend>
                                <div class="layui-field-box">
                                    <table class="layui-table">
                                        <tbody>
                                            <tr>
                                                <th>跳过片头时间(单位：秒,设置为0时关闭)</th>
                                                <td>
                                                    <input type="text" name="play_play_all_headtime" autocomplete="off" value="<?php echo $play['play']['all']['headtime']; ?>" class="layui-input" >			

                                            </tr>

                                            <tr>
                                                <th>跳过片尾时间（单位：秒,设置为0时关闭）</th>
                                                <td>	
                                                    <input type="text" name="play_play_all_endtime" autocomplete="off" value="<?php echo $play['play']['all']['endtime']; ?>" class="layui-input" >			
                                                </td>
                                            </tr>




                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>                    





                            <fieldset class="layui-elem-field">

                                <legend>自动播放器选择
                                    <input type="checkbox" id="play_play_all_autoline_off" name="play_play_all_autoline_off" lay-skin="switch"  lay-text="开|关"  <?php echo $play['play']['all']['autoline']['off'] == 1 ? "checked" : ''; ?> value=<?php echo $play['play']['all']['autoline']['off']; ?> >
                                </legend>
                                <div class="layui-field-box">


                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">
                                            规则（添加格式：视频站域名 => 播放器名称 ，每行一条）
                                        </label>
                                        <div class="layui-input-block">
                                            <textarea  name="play_play_all_autoline_val" class="layui-textarea"><?php
                                                $word = '';
                                                foreach ($play['play']['all']['autoline']['val'] as $key => $value) {
                                                    $word .= "$key => $value" . "\r\n";
                                                }echo $word;
                                                ?></textarea>
                                        </div>
                                    </div>

                                </div>             

                            </fieldset>                      


                            <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="*" >
                                    保存
                                </button>
                            </div>

                        </form>

                    </div>


                    <div class="layui-tab-item">

                        <form class="layui-form layui-form-pane" action="">


                            <fieldset class="layui-elem-field">

                                <legend>开关配置</legend>
                                <div class="layui-field-box">

                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            切换按钮
                                        </label>
                                        <div class="layui-input-inline">
                                            <select name="play_style_logo_show" lay-filter="province">							 
<?php foreach (array("隐藏", "显示") as $key => $val): ?>							 							 
                                                    <option value="<?php echo $key; ?>" <?php echo ($play['style']['logo_show'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
<?php endforeach; ?>   				        			         
                                            </select>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">线路切换显示开关,关闭后不显示线路切换按钮 </div>                      
                                    </div>

                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            线路列表
                                        </label>
                                        <div class="layui-input-inline">
                                            <select name="play_style_line_show" lay-filter="province">							 
<?php foreach (array("隐藏", "显示") as $key => $val): ?>							 							 
                                                    <option value="<?php echo $key; ?>" <?php echo ($play['style']['line_show'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
<?php endforeach; ?>   				        			         
                                            </select>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">线路列表显示开关,关闭后不显示线路列表 </div>                      
                                    </div>

                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            播放列表
                                        </label>
                                        <div class="layui-input-inline">
                                            <select name="play_style_list_show" lay-filter="province">							 
<?php foreach (array("隐藏", "显示") as $key => $val): ?>							 							 
                                                    <option value="<?php echo $key; ?>" <?php echo ($play['style']['list_show'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
<?php endforeach; ?>   				        			         
                                            </select>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">剧集列表显示开关,包含来源列表和剧集列表</div>                      
                                    </div>
                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            来源列表
                                        </label>
                                        <div class="layui-input-inline">
                                            <select name="play_style_flaglist_show" lay-filter="province">							 
<?php foreach (array("隐藏", "显示") as $key => $val): ?>							 							 
                                                    <option value="<?php echo $key; ?>" <?php echo ($play['style']['flaglist_show'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
<?php endforeach; ?>   				        			         
                                            </select>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">线路列表显示开关,关闭后不显示线路列表 </div>                      
                                    </div>

                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            剧集列表
                                        </label>
                                        <div class="layui-input-inline">
                                            <select name="play_style_playlist_show" lay-filter="province">							 
<?php foreach (array("隐藏", "显示") as $key => $val): ?>							 							 
                                                    <option value="<?php echo $key; ?>" <?php echo ($play['style']['playlist_show'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
<?php endforeach; ?>   				        			         
                                            </select>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">线路列表显示开关,关闭后不显示线路列表 </div>                      
                                    </div>

                                </div>
                            </fieldset>    

                            <fieldset class="layui-elem-field">

                                <legend>样式设置</legend>
                                <div class="layui-field-box">

                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            线路默认
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_style_line_style" autocomplete="off" value="<?php echo $play['style']['line_style']; ?>" class="layui-input" >
                                        </div>                               
                                    </div>

                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            线路热点
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_style_line_hover" autocomplete="off" value="<?php echo $play['style']['line_hover']; ?>" class="layui-input" >
                                        </div>                               
                                    </div>  
                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            线路已选
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_style_line_on" autocomplete="off" value="<?php echo $play['style']['line_on']; ?>" class="layui-input" >
                                        </div>                               
                                    </div>

                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            播放默认
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_style_play_style" autocomplete="off" value="<?php echo $play['style']['play_style']; ?>" class="layui-input" >
                                        </div>                               
                                    </div>
                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            播放热点
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_style_play_hover" autocomplete="off" value="<?php echo $play['style']['play_hover']; ?>" class="layui-input" >
                                        </div>                               
                                    </div>
                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            播放已选
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_style_play_on" autocomplete="off" value="<?php echo $play['style']['play_on']; ?>" class="layui-input" >
                                        </div>                               
                                    </div>


                                    <fieldset class="layui-elem-field">

                                        <legend>自定义
                                            <input type="checkbox" id="play_style_off" name="play_style_off" lay-skin="switch"  lay-text="开|关"  <?php echo $play['style']['off'] == 1 ? "checked" : ''; ?> value=<?php echo $play['style']['off']; ?> >
                                        </legend>
                                        <div class="layui-field-box">


                                            <div class="layui-form-item layui-form-text">
                                                <label class="layui-form-label">
                                                    输入CSS内容（供player目录下indx.php调用,仅对本地播放器有效）
                                                </label>
                                                <div class="layui-input-block">
                                                    <textarea style="overflow:hidden;height:300px;" name="play_style_css"  style="height:300px"   class="layui-textarea" ><?php echo file_get_contents("../save/play.css"); ?></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>


                                </div>
                            </fieldset>   

                            <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="*">
                                    保存
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="layui-tab-item">

                        <form class="layui-form layui-form-pane" action="">


                            <fieldset class="layui-elem-field">

                                <legend>筛选配置</legend>
                                <div class="layui-field-box">

                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">
                                            设置使用云播放的网站，设置为空，则不限制,多个请用"|"分割,参考：'iqiyi.com|v.qq.com|v.youku.com'
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_match_yunflag" autocomplete="off" value="<?php echo $play['match']['yunflag']; ?>" class="layui-input" >	
                                        </div>
                                    </div>


                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">
                                            播放列表影片名过滤，设置为空，则不限制,多个请用"|"分割,参考：'暴力|色情'
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_match_video" autocomplete="off" value="<?php echo $play['match']['video']; ?>" class="layui-input" >	
                                        </div>
                                    </div>


                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">
                                            指定线路从url，设置后如果url含有设置内容将直接调用设置线路播放，多条用逗号分割,本规则优先级最高,参考：BGM->http://api.jp255.com/api/?url=
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_match_urljmp" autocomplete="off" value="<?php echo $play['match']['urljmp']; ?>" class="layui-input" >	
                                        </div>
                                    </div>



                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">
                                            指定直链从url，设置后如果url含有设置内容将直链打开,优先级其次,多条请用符号"|"分割,参考：/share/
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_match_urlurl" autocomplete="off" value="<?php echo $play['match']['urlurl']; ?>" class="layui-input" >	
                                        </div>
                                    </div>



                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">
                                            指定直链从来源，设置后如果来源标签含有设置内容将直链打开，优先级其次,多条请用符号"|"分割,参考：url|yun|ziyuan
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_match_urlflag" autocomplete="off" value="<?php echo $play['match']['urlflag']; ?>" class="layui-input" >	
                                        </div>
                                    </div>



                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">
                                            指定来源播放，设置后如果来源标签含有设置内容将调用播放器播放，多条请用符号"|"分割,参考：ogg|mp4|webm|m3u8|ck
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_match_playflag" autocomplete="off" value="<?php echo $play['match']['playflag']; ?>" class="layui-input" >	
                                        </div>
                                    </div>


                                </div>
                            </fieldset>    


                            <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="*">
                                    保存
                                </button>
                            </div>
                        </form>
                    </div>         




                    <div class="layui-tab-item">

                        <form class="layui-form layui-form-pane" action="">


                            <fieldset class="layui-elem-field">

                                <legend>其他配置</legend>
                                <div class="layui-field-box">

                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            APP标识
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="text" name="play_all_AppName" autocomplete="off" value="<?php echo $play['all']['AppName']; ?>" class="layui-input" >
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">浏览器标识(HTTP_USER_AGENT)，在APP里设置此浏览器标识后APP里将不显示帮助信息,多个请用"|"分割 </div>                      
                                    </div>


                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            版本信息
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_all_ver" autocomplete="off" value="<?php echo $play['all']['ver']; ?>" class="layui-input" >
                                        </div>
                                    </div>
                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            版权信息
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_all_by" autocomplete="off" value="<?php echo $play['all']['by']; ?>" class="layui-input" >
                                        </div>
                                    </div>

                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            帮助信息
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_all_info" autocomplete="off" value="<?php echo $play['all']['info']; ?>" class="layui-input" >
                                        </div>
                                    </div>
                                    
                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            对接提示
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_all_link_info" autocomplete="off" value="<?php echo $play['all']['link_info']; ?>" class="layui-input" >
                                        </div>
                                    </div>
                                    
                                    <div class="layui-form-item ">
                                        <label class="layui-form-label">
                                            云播提示
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="play_all_yun_info" autocomplete="off" value="<?php echo $play['all']['yun_info']; ?>" class="layui-input" >
                                        </div>
                                    </div>
                                    
                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">
                                            反调试代码
                                        </label>
                                        <div class="layui-input-block">
                                            <textarea  name="play_all_decode" class="layui-textarea"><?php echo $play['all']['decode'] ?></textarea>
                                        </div>
                                    </div>


                                </div>
                            </fieldset>    


                            <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="*">
                                    保存
                                </button>
                            </div>
                        </form>
                    </div>


                </div>
            </div> 
        </div>


        <script>


            layui.use(['form', 'layer'], function () {
                $ = layui.jquery;
                var form = layui.form, layer = layui.layer;

                //监听提交
                form.on('submit(*)', function (data) {

                    //添加开关按钮数据
                    if ("undefined" !== typeof data.field.play_line_all_autoline_val) {
                        data.field.play_line_all_autoline_off = $("#play_line_all_autoline_off").prop("checked") ? 1 : 0;
                    }
                    if ("undefined" !== typeof data.field.play_play_all_autoline_val) {
                        data.field.play_play_all_autoline_off = $("#play_play_all_autoline_off").prop("checked") ? 1 : 0;
                    }
                    if ("undefined" !== typeof data.field.play_style_off) {
                        data.field.play_style_off = $("#play_style_off").prop("checked") ? 1 : 0;
                    }


                    $.ajax({
                        url: "save.php",
                        data: data.field,
                        type: "post", dataType: 'json',
                        beforeSend: function () {
                            layer.load(0);
                        },
                        success: function (result) {
                            layer.closeAll("loading");
                            layer.alert(result['m'], {icon: result['icon']});
                        },
                        error: function () {
                            layer.closeAll("loading");
                            layer.alert("数据获取异常，请检查网络或防火墙设置!", {icon: 5});

                        }
                    });

                    return false;
                });

            });
        </script>



    </body>

</html>