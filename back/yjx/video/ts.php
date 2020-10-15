<?php 
/*##################################################
# xypaly 智能视频解析 X3  by 00000
# 官方网站: http://00000
# 源码获取：00000
# 模块功能：ts解析
###################################################*/
error_reporting(0);	

$url=isset($_REQUEST['url'])? $_REQUEST['url']:''; if($url==""){exit("input error");};

require_once(dirname(__FILE__).'/'."../include/main.class.php");

parse(base64_decode($url));

 function parse($url)
{	
		$name = preg_match("#/([\w]+\.ts)#",$url,$base)?$base[1]:"m3u8.ts";		
		header('cache-control:public'); 
    	header('Access-Control-Allow-Origin:*');
    	header('content-type:application/octet-stream;'); 
		header('content-disposition:attachment; filename='.$name);		
		$data = curl($url,$cookie);
	    exit(trim($data));	
}	
		
function curl($url,$cookie="")
	{
		$params["ua"] = "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
      	return GlobalBase::curl($url,$params);
	}

?>