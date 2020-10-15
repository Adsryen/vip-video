<?php 
/*##################################################
# xypaly 智能视频解析整合接口 X by 00000
# 官方网站: http://00000
# 源码获取：00000
###################################################*/
//运行目录
define("FCPATH", str_replace("\\", "/",dirname(__FILE__)));

//加载配置文件
require_once FCPATH.'/save/config.php';

//加载防火墙规则
Blacklist::parse($BLACKLIST);

///空参数处理
if($NULL_URL['type']>0 && !filter_input(INPUT_GET, "url")&&!filter_input(INPUT_GET, "wd")){
		    if($NULL_URL['type']==1){
			  exit($NULL_URL['info']);
		  }else if($NULL_URL['type']==2){
   $NULL_JMP=$NULL_URL['url']; 

exit(<<<code
<!DOCTYPE html>
 <!--[if lt IE 7 ]><html class=ie6><![endif]--> <!--[if IE 7 ]><html class=ie7><![endif]--> <!--[if IE 8 ]><html class=ie8><![endif]--> <!--[if IE 9 ]><html class=ie9><![endif]--> <!--[if (gt IE 9)|!(IE)]><!--><html class=w3c><!--<![endif]-->       
<html><head>
<title>$TITLE</title>      
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="zh-CN" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta name="keywords" content="$keywords" />
<meta name="description" content="$description" />
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><!-- 强制使用当前版本的兼容模式 -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<style>
html,body{overflow:hidden;  
width:100%;
height: 100%; 
margin: 0;
padding: 0;
}
</style>
</head>
<body>
<iframe width="100%" height="100%" src="$NULL_JMP" frameborder="0" border="0" marginwidth="0" marginheight="0" scrolling="no" ></iframe>
<div id="footer">$FOOTER_CODE<div>
</body>
</html>  	 
code
); 	
	  }
}	
//定义模板目录,请勿修改！
if(lsMobile())	{ define('TEMPLETS_PATH', 'templets/'.$templets['wap'].'/'); }else{define('TEMPLETS_PATH', 'templets/'.$templets['pc'].'/');}

include_once  TEMPLETS_PATH.$templets['html'].'/index.php';

