<?php 
/*##################################################
# xypaly 智能视频解析 X3  by 00000
# 官方网站: http://00000
# 源码获取：00000
# 模块功能：m3u8本地化
###################################################*/
error_reporting(0);
require_once(dirname(__FILE__).'/'."../include/main.class.php");
if(filter_has_var(INPUT_GET, "url")){$url=filter_input(INPUT_GET, 'url');}else{exit("input error！");}
parse(base64_decode($url));		
function parse($url)
{	  
  $base=array();
  $name=preg_match("#/([\w]+\.m3u8)#",$url,$base)?$base[1]:"video.m3u8";
  $dir=GlobalBase::is_root()."/video/";
  $ts = $dir."ts.php?url=";
  $m3u= $dir."m3u8.php?url=";$key=array();
  $path=preg_match("#^((http://|https://).*)/#",$url,$key)?$key[1]:"";
  header('Access-Control-Allow-Origin:*');
  header('Content-type: application/vnd.apple.mpegurl;');
  header('Content-Disposition: attachment; filename='.$name);	
  //获取m3u8文件数据  
  $data = curl($url);if($data===""){return false;}

    $lines = preg_split('/[\r\n]+/s', $data); $m3u8=""; 
  
  foreach ($lines as  $key =>  $value) 
  {		
	 //判断是文件信息就进行路径转换
	 if($value&&substr($value,0,1)!="#") 	
	 {   	
	     //相对路径转为绝对路径
		 $purl=put_url($path,$value);
			    	
		 //取文件类型
			$i=$key; do {$i--;$front=$lines[$i];}while($front === ""&&!$i<0);
			//$front=$lines[$key-1];		   
		   //m3u8
		   if(strstr($front,"#EXT-X-STREAM-INF:")){   
		        $m3u8.= $m3u.base64_encode($purl)."\n";		
		   //ts
		     }else if(strstr($front,"#EXTINF:")){        			 
			   $m3u8.= $ts.base64_encode($purl)."\n";			   
             }
	  
	  //其他信息直接返回原信息
	  }else{
			  $m3u8.=$value."\n";	
		
      }
        
    }
       exit(trim($m3u8));
	
}

function put_url($path,$url){
	
  if(substr($url,0,4)=="http"){
	  return $url;			
   }else if(substr($url,0,1)=="/"){
	  return $path.$url;
   }else{
	 return $path."/".$url;
   }		
}

function curl($url,$cookie="")
{
	$params["ua"] = "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
	$params["cookie"] = $cookie;
  	return GlobalBase::curl($url,$params);
}
