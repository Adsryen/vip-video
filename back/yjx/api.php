<?php
/*########################################################
# xypaly 智能视频解析整合接口 X by 00000
# 官方网站: http://00000
# 源码获取：00000
# 模块功能：程序核心，jsonp服务端
# 更新时间：2018.12.15 
#########################################################*/
//运行目录
define("FCPATH", str_replace("\\", "/",dirname(__FILE__)));
//加载配置文件
require_once FCPATH.'/save/config.php';
//输出json格式文件
header('content-type:application/json;charset=utf8'); //header("Content-Disposition:attachment;filename='json.js'");
//循环取传入参数，支持POST和GET
foreach ($_REQUEST as $k=>$v) {$$k=trim(urldecode($v));}

//参数初始化
$cb= isset($cb) && $cb ? $cb:'';
$tp=isset($tp) && $tp ? $tp:'';	
$url=isset($url) && $url ? $url:'';
$wd=isset($wd) && $wd ? $wd:'';
$line = isset($line) && $line ? $line:'0';
$id=isset($id) ? $id:'';
$flag=isset($flag) ? $flag:'';
$app=isset($app) ? $app:'xysoft';
$dd=isset($dd)&& $dd ? $dd:0;

//全局变量,输出信息
$info=array('success'=>0,'code'=>0);

//公用函数,API接口  
 if($tp=='getnum'){echo sizeof($jx_url);exit;}
 if($tp=='set'){setcookie("url_num", $line, time()+3600*timecookie);exit;} 	 
 if($tp=='getset'){exit(isset($_COOKIE["url_num"]) ? $_COOKIE["url_num"] :'0');} 
 
 //全局变量,读写缓存
$cache = new Main_Cache(array("cachetype"=>$chche_config["type"],"cacheprot"=>$chche_config["prot"],'cacheTime'=>$chche_config["time"]));  
 
//json接口
 //if($tp=="json"){ if($wd!=''){include FCPATH."/video/yun.class.php"; server::parse();exit(server::out($cb,$info));}else{$info['m']="input error";exit(server::out($cb,$info));}}
//加载防火墙规则
Blacklist::parse($BLACKLIST,true);

  
 switch($tp)
 {		
   
   //取配置参数及线路列表 
	case 'getparm' :  	
	   $info['success']=1;
	   $info['type']='getparm';
	   $info['app']=server::lsUserAgen($play['all']['AppName']);
           $play['define']['jx_link']=$jx_link;
           $play['define']['jx_url']=$jx_url;
           $play['define']['live_url']=$live_url;
           $play['define']['jx_link']=$jx_link;
           $play['define']['url_jmp']=$url_jmp;
           $play['define']['timeout']=$timeout;  
           $info['val']=strencode(json_encode($play));	   
	   break;
  
  //检测线路
	 case 'lsurl' :	
	    if($url!==''){
  	     $info['val']=$url;      
	     $code=server::lsurl($url);       	   
	     $info['code']=$code;	   
	     if($code==200 || $code==302 || $code==301){		  
		  $info['success']=1;
          $info['info']=true;		  
	     }else{		  
		  $info['success']=0;
          $info['info']=false;
         }           		
	     		   
        }else{
	       $info['m']="input error";  
        }

	   break;
  
   //一次解析对接
   case 'link':
 
        if ($url!==''){     
	    //取缓存数据 	
	    $word=$cache->get('link'.$url);	 
	    if($word!=""){
			$info= json_decode($word);			
		}else{
			server::GetLinkVideo($url,$info);		
	        if($info['success']){$cache->set('link'.$url,json_encode($info));}else{$info['m']="404";}
		}
	    
		}else{
			
	       $info['m']=" url input error";  
        }
		
		break;	

		//云解析		
  default:      
      
         include FCPATH."/video/yun.class.php";
         server::parse();
	 break;
		 	
 }
 
   server::out($cb,$info);  

  class server
{	
 //调用解析
  public static function parse()
  {		
	global $cache,$tp,$url,$wd,$id,$flag,$info;
	
	//标题播放视频	
	if($tp=='wd'){
        if ($wd!==''){     
	      $word=$cache->get('wd.wd'.$wd);	 
	      if($word!=""){
			$info= json_decode($word);			
		  }else{	
			$info=YUN::parse(urlencode($wd),2);		
	        if($info['success']){$cache->set('wd.wd'.$wd,json_encode($info));}else{$info['m']="404";}
	      }	    
	    }else{
			
	       $info['m']="wd input error";  
        }		
		return;	
	}
	

        	//id搜索视频			
	if($id!='' && $flag!=''){			
	      $word=$cache->get('id'.$flag.$id);	 
	     if($word!=""){
			$info= json_decode($word);			
		}else{			 			 
              $info=YUN::parse(['id'=>$id,'flag'=>$flag],3);	
						
	         if($info['success']){$cache->set('id'.$flag.$id,json_encode($info));}else{$info['m']="404";}
		}
               return;
        
           //标题搜索视频
	  }else if($wd!=''){
		
		$word=$cache->get('wd'.$wd);	 
	    if($word!=""){
			$info= json_decode($word);			
		}else{			 
                       
                    $info=YUN::parse(urlencode($wd),4);
                   
		    if($info['success']){$cache->set('wd'.$wd,json_encode($info));if($tp=='json'){exit(json_encode($info));}}else{$info['m']="404";}
		}     
                
             //URL播放视频	
	  }else if($url!=''){
              
	       $word=$cache->get('url'.$url);	 
	       if($word!=""){
			  $info= json_decode($word);			
		   }else{			   
			 
                       $info=self::yun($url);
         
	               if($info['success']){$cache->set('url'.$url,json_encode($info));}else{$info['m']="404";}
		   }        
                
          }else{		
		  $info['m']="input error";		
	}
        
        
 
  }
 
 //检测url
  public static function lsurl($url,$timeout=10)	
	{		      
	  $ch = curl_init();
	  curl_setopt($ch,CURLOPT_URL,$url);    
	  curl_setopt($ch, CURLOPT_TIMEOUT, 30);  	  
	  curl_setopt($ch, CURLOPT_REFERER,$url) ;             //伪装网页来源 URL
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); //超时时间
	 curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);  //启用301重定向跟踪
     curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);   //不显示结果
     curl_setopt($ch, CURLOPT_HEADER, 0); //包含头信息
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0'); // 强制访问https网站
	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');     
	 curl_exec($ch);	  
	 $curl_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);	  
	 curl_close($ch);
	 return  $curl_code;
     } 
  
  
  //一次解析对接
public static function GetLinkVideo($keyword,&$DATA)

{
   global $LINK_URL;

  foreach ($LINK_URL as  $val) 
  {
       $data=trim(self::curl($val['path'].$keyword));
	   
	   if($data==''){continue;}
           
       $json=json_decode($data,true);if(!$json){continue;}   
         
        foreach ($val['val'] as $k=>$v){$$k=$json[$v];if($$k!=""){$DATA[$k]=$$k;} }

        if($DATA['success']){break;}     
   }
  
 }
  
  
  //检测浏览器UA标识
 public static function lsUserAgen ($key)
 {   
   return preg_match('/'.$key."/i",filter_input(INPUT_SERVER, 'HTTP_USER_AGENT'));		
}
 
  public static function yun($url)  
   {	         
     $url=GlobalBase::is_root()."/parse.php?url=".urlencode($url);
     $json=self::curl($url);	
     return json_decode($json,true);   	
   }   
	
 public static function out($jsoncallback,&$data)  
   {
	    $json =json_encode($data);
		exit($jsoncallback.'('.$json.');'); 	
   }   
	
 public static function curl($url,$ref='')
	{
    	$params["ua"] = "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
    	$params['ref'] = $ref;
      	return GlobalBase::curl($url,$params);
	}

 
 } 
 