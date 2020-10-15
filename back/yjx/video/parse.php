<?php
error_reporting(0); 
//文件名称
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
// 网站根目录
define('FCPATH', str_replace("\\", "/", str_replace(SELF, '', __FILE__)));

//加载配置文件
require_once(FCPATH."config.php");  


//加载防火墙规则

Blacklist::parse($BLACKLIST,true);


header('Content-Type: text/json; charset=utf-8');

$url=isset($_GET["url"]) ? urldecode($_GET["url"]):'';

$info=array('success'=>0,'code'=>0);

//获取数据
if($url!="" ){ 	
  # mp4 m3u8 flv 直链
	
    if (stristr($url,".mp4")!==false || stristr($url,".m3u8")!==false|| stristr($url,".flv")!==false) {
        
         require_once("video.class.php");

	     $info=VIDEO::parse($url);
	
	 	  
  # 27盘资源处理
	 }else if(stristr($url,"27pan")!==false || explode("/",parse_url($url)["path"])[1]=="share"){   
   
        require_once("27pan.class.php");
		
		$info=PAN27::parse($url);	
	
	  
   # 搜索资源站
	}else if(stristr($url,"http://")!==false || stristr($url,"https://")!==false){   
     
	    require_once("yun.class.php");
		
		$info=YUN::parse($url);	
	  
     }else{
	
	  $info["m"]="暂不支持";

     }
	
	
 
}else{
	
	 $info["m"]="input err!";

}

echo json_encode($info);


?>