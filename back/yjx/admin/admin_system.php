<?php include "config.php";  




?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
    <head>
        <title>系统设置-Xyplayer X3</title>
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
                <a><cite>基本设置</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                <ul class="layui-tab-title">
                    <li class="layui-this">基本设置</li>
                    <li>显示设置</li>
                    <li>链接设置</li>               
                    <li>解析设置</li>            
                    <li>直播设置</li>
                </ul>
                <div class="layui-tab-content" >
                    <div class="layui-tab-item layui-show">
                        <form class="layui-form layui-form-pane" >
                              
                            <div class="layui-form-item">
                                <label class="layui-form-label">
                                    API路径
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" name="API_PATH" autocomplete="off" value="<?php echo $API_PATH; ?>" 
                                           class="layui-input" title=""/>							
                                </div>						  



                                <div class="layui-form-mid layui-word-aux">自定义API路径可以用来防止盗用。
                                </div>

                            </div>
  
                            <div class="layui-form-item">
                                <label class="layui-form-label">
                                    有效期
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" name="timecookie" autocomplete="off" value="<?php echo $timecookie; ?>" 
                                           class="layui-input" title=""/>							
                                </div>						  



                                <div class="layui-form-mid layui-word-aux"> cookie有效期，单位：小时，cookie记录了用户的线路选择,集数选择等信息。 
                                </div>

                            </div>


                            <div class="layui-form-item">
                                <label class="layui-form-label">
                                    超时时间
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" name="timeout" autocomplete="off" value="<?php echo $timeout; ?>" 
                                           class="layui-input" >							
                                </div>						  
                                <div class="layui-form-mid layui-word-aux"> 网络访问超时，单位：秒，例：云播超过此值将判断失败就会调用解析。 
                                </div>

                            </div>

                              <div class="layui-form-item">
                                <label class="layui-form-label">
                                    提交间隔
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" name="from_timeout" autocomplete="off" value="<?php echo $from_timeout; ?>" 
                                           class="layui-input" >							
                                </div>						  
                                <div class="layui-form-mid layui-word-aux"> 表单提交间隔，单位：秒，用来禁止频繁提交以免造成数据损坏。 
                                </div>

                            </div>     
                            <fieldset class="layui-elem-field">

                                <legend>缓存设置</legend>
                                <div class="layui-field-box">
                                    <table class="layui-table">
                                        <tbody>
                                            <tr>
                                                <th>工作模式（硬盘缓存需设置cache文件夹权限为755以上,内存缓存速度更快但需服务器安装redis服务和插件）</th>
                                                <td>

                                                    <select name="chche_type" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "硬盘缓存", "内存缓存") as $key => $val): ?>							 							 
                                                            <option value="<?php echo $key; ?>" <?php echo ($chche_config['type'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   

                                                    </select>




                                                </td></tr>
                                            <tr>
                                                <th>服务端口（内存缓存服务端口,redis默认为6379）</th>
                                                <td>

                                                    <input type="text" name="chche_prot" autocomplete="off" value="<?php echo $chche_config['prot']; ?>"  class="layui-input" title="如果是根目录，请设置为空" />


                                                </td></tr>
                                            <tr>
                                                <th>保存时间（单位:秒,到期会自动删除,设置为0则不删除）</th>
                                                <td>


                                                    <input type="text" name="chche_time" autocomplete="off" value="<?php echo $chche_config['time']; ?>" class="layui-input" title="如果是根目录，请设置为空">


                                                </td></tr>




                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>  



                            <fieldset class="layui-elem-field">

                                <legend>滚动公告设置 

                                    <input type="checkbox" id="BOOK_INFO_OFF" name="BOOK_INFO_OFF" lay-skin="switch"  lay-text="开|关"  <?php echo $BOOK_INFO['off'] == "1" ? "checked" : ''; ?> value=<?php echo $BOOK_INFO['off']; ?> >

                                </legend>
                                <div class="layui-field-box">


                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">
                                            公告内容（支持HTML）
                                        </label>
                                        <div class="layui-input-block">
                                            <textarea  name="BOOK_INFO_INFO"  class="layui-textarea" ><?php echo $BOOK_INFO['info']; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>


                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">
                                    广告代码
                                </label>
                                <div class="layui-input-block">
                                    <textarea  name="FOOTER_CODE"  class="layui-textarea" ><?php echo $FOOTER_CODE; ?></textarea>
                                </div>
                            </div>



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

                                <legend>SEO设置</legend>			 
                                <div class="layui-field-box">	 


                                    <div class="layui-form-item">
                                        <label class="layui-form-label">
                                            网站标题
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="title" autocomplete="off"  value="<?php echo $TITLE ?>" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">
                                            关键词
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="keywords" autocomplete="off" value="<?php echo $keywords; ?>"
                                                   class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">
                                            描述
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="text" name="description" autocomplete="off" value="<?php echo $description; ?>" 
                                                   class="layui-input">
                                        </div>
                                    </div>

                                   <div class="layui-form-item">
                                        <label class="layui-form-label">
                                            自定义
                                        </label>
                                        <div class="layui-input-block">
                                           <textarea  name="HEADER"  style="height:200px;" class="layui-textarea" ><?php echo $HEADER; ?></textarea>
                                                  
                                        </div>
                                    </div>
                                    
                             
                     

                                </div>
                            </fieldset>  		


                            <fieldset class="layui-elem-field">

                                <legend>模板设置</legend>
                                <div class="layui-field-box">
                                    <table class="layui-table">
                                        <tbody>
                                            <tr>
                                                <th>模板主目录</th>
                                                <td>

                                                    <input type="text" name="templets_html" autocomplete="off" value="<?php echo $templets['html']; ?>" class="layui-input" /></td>
                                            </tr>
                                            
                                               <tr>
                                                <th>
                                                 自定义css
                                                <input type="checkbox" id="templets_off" name="templets_off" lay-skin="switch"  lay-text="开|关"  <?php echo $templets['off'] == "1" ? "checked" : ''; ?> value=<?php echo $templets['off']; ?> >
                                              
                                                </th>
                                                <td>                                       						 
                                                     <textarea  name="templets_css"  class="layui-textarea" ><?php echo $templets['css']; ?></textarea>		         
                                                </td>
                                             </tr>
                                            
                                            
                                            <tr>
                                                <th>PC端使用模板</th>
                                                <td>
                                                    <?php $arr = GlobalBase::getdirs("../templets"); ?>

                                                    <select name="templets_pc" lay-filter="province">							 
                                                        <?php foreach ($arr as $key): ?>							 							 
                                                            <option <?php echo ($templets['pc'] == $key) ? "selected" : ''; ?> ><?php echo $key; ?></option>	   
                                                        <?php endforeach; ?>			         
                                                    </select>


                                                </td></tr>
                                            
                                          
                                            
                                            
                                            
                                            <tr>
                                                <th>移动端使用模板</th>
                                                <td>

                                                    <select name="templets_wap" lay-filter="province">							 
                                                        <?php foreach ($arr as $key): ?>							 							 
                                                            <option <?php echo ($templets['wap'] == $key) ? "selected" : ''; ?> ><?php echo $key; ?></option>	   
                                                        <?php endforeach; ?>			         
                                                    </select>

                                                </td></tr>
         

                                            
                                            
                                            


                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>


                            <fieldset class="layui-elem-field">

                                <legend>空URL设置</legend>
                                <div class="layui-field-box">
                                    <table class="layui-table">
                                        <tbody>
                                            <tr>
                                                <th>模式（0为关闭，1为显示信息，2为跳转网站）</th>
                                                <td>

                                                    <select name="NULL_URL_TYPE" lay-filter="province">							 
                                                        <?php foreach (array("关闭", "显示信息", "跳转网站") as $key => $val): ?>							 							 
                                                            <option  value="<?php echo $key; ?>" <?php echo ($NULL_URL['type'] == $key) ? "selected" : ''; ?> ><?php echo $val; ?></option>	   
                                                        <?php endforeach; ?>   

                                                    </select>

                                                </td></tr>
                                            <tr>
                                                <th>跳转网址</th>
                                                <td>

                                                    <input type="text" name="NULL_URL_URL" autocomplete="off" value="<?php echo $NULL_URL['url']; ?>"  class="layui-input" >


                                                </td></tr>
                                            <tr>
                                                <th>显示信息（支持HTML）</th>
                                                <td>
                                                    <textarea  name="NULL_URL_INFO"  class="layui-textarea" ><?php echo $NULL_URL['info']; ?></textarea>

                                                </td></tr>

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

                            <div class="layui-form-item layui-form-text">

                                <blockquote class="layui-elem-quote layui-quote-nm">
                                    <h2> 添加说明:</h2><br>
                                    添加后会显示在线路列表后面，每条一行,可以无限添加;<br>
                                    添加格式：   显示名称=>JS代码 ;<br>
                                    直链格式：  xyplay.href("地址");<br>
                                    跳转格式：  xyplay.jmp("地址"); 或 location.href="地址";<br>


                                </blockquote>							

                                <label class="layui-form-label">
                                    输入内容:
                                </label>
                                <div class="layui-input-block">
                                    <textarea  name="jx_link"  style="height:500px" class="layui-textarea" ><?php $word1 = ''; foreach ($jx_link as $key => $val) { $word1 .= "$key=>$val" . "\r\n";}echo $word1; ?></textarea>
                                </div>
                            </div>


                            <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="*" >
                                    保存
                                </button>
                            </div>
                        </form>
                    </div>



                    <div class="layui-tab-item">
                        <form class="layui-form layui-form-pane" action="">

                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">
                                    解析线路设置(每行一条)
                                </label>
                                <div class="layui-input-block">
                                    <textarea  name="jx_url"  style="height:500px" class="layui-textarea" ><?php $word2 = ''; foreach ($jx_url as $key) { $word2 .= trim($key) . "\r\n"; }echo $word2; ?></textarea>
                                </div>
                            </div>


                            <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="*">
                                    保存
                                </button>
                            </div>
                        </form>
                    </div>






                    <div class="layui-tab-item">
                        <form class="layui-form layui-form-pane" action="">

                            <div class="layui-form-item layui-form-text">

                                <blockquote class="layui-elem-quote layui-quote-nm">
                                    <h2> 添加说明:</h2><br>
                                    添加格式：  显示名称=>JS代码 ,每行一条,可以无限添加;<br>
                                    直播格式：  xyplay.live("地址","播放器"); 如果播放器为空，则使用配置播放器;<br>
                                    直链格式：  xyplay.href("地址");<br>
                                    跳转格式：  xyplay.jmp("地址"); 或 location.href="地址";<br>


                                </blockquote>							

                                <label class="layui-form-label">
                                    输入内容:
                                </label>
                                <div class="layui-input-block">
                                    <textarea  name="live_url"  style="height:500px" class="layui-textarea" ><?php $word3 = '';foreach ($live_url as $key => $val) { $word3 .= "$key=>$val" . "\r\n";}echo $word3; ?></textarea>
                                </div>
                            </div>


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
            var x_admin_interval_flag='';

            layui.use(['form', 'layer'], function () {
                $ = layui.jquery;
                var form = layui.form, layer = layui.layer;

                //监听提交
                 form.on('submit(*)', function (data) {   
 
                    //载入动画
                    layer.load(0); 
                    //添加滚动公告开关按钮数据
                    if ("undefined" !== typeof data.field.BOOK_INFO_INFO) {
                        data.field.BOOK_INFO_OFF = $("#BOOK_INFO_OFF").prop("checked") ? "1" : "0";
                    }
                     if ("undefined" !== typeof data.field.templets_css) {
                        data.field.templets_off = $("#templets_off").prop("checked") ?"1" :"0";
                    }
                    console.log(data.field);
                    //发异步，把数据提交给php    
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