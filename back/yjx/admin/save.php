<?php 
 include "config.php"; 
 require_once(dirname(__FILE__).'/../include/db.class.php');
 session_start(); 
 if(isset($_SESSION['lock_config'])){ $time=(int)$_SESSION['lock_config']-(int)time(); if($time>0){ exit(json_encode(array('success'=>0,'icon'=>5,'m'=>"请勿频繁提交，".$time."秒后再试！")));}}
 $_SESSION['lock_config']= time()+ $from_timeout;
  
//定义API路径；
if(filter_has_var(INPUT_POST, "API_PATH")){$API_PATH=filter_input(INPUT_POST, "API_PATH");}


//用户名设置
if(filter_has_var(INPUT_POST, "username")){$user=filter_input(INPUT_POST, "username");}

//密码设置
if(filter_has_var(INPUT_POST, "pass")){$pass=filter_input(INPUT_POST, "pass");}

//SEO设置
if(filter_has_var(INPUT_POST, "title")){   
    $TITLE=filter_input(INPUT_POST, "title");    //网站标题设置
    $keywords=filter_input(INPUT_POST, "keywords");  //站点关键词
    $description=filter_input(INPUT_POST, "description"); //站点描述
    $HEADER=filter_input(INPUT_POST, "HEADER");  //自定义
}

//公告设置
if(filter_has_var(INPUT_POST, "BOOK_INFO_OFF")){
$BOOK_INFO=array(
 'off'=>filter_input(INPUT_POST, "BOOK_INFO_OFF"),        
 'info'=> filter_input(INPUT_POST, "BOOK_INFO_INFO") 
);}

//模板设置
if(filter_has_var(INPUT_POST, "templets_html")){
$templets=array ( 
      'off' => filter_input(INPUT_POST, "templets_off"),
     'html' => filter_input(INPUT_POST, "templets_html"),
      'css' => filter_input(INPUT_POST, "templets_css"),
      'pc' => filter_input(INPUT_POST, "templets_pc"),
     'wap' =>filter_input(INPUT_POST, "templets_wap")
);
}


//空URL设置
if(filter_has_var(INPUT_POST, "NULL_URL_TYPE")){

  $NULL_URL=array ( 
  'type' => filter_input(INPUT_POST, "NULL_URL_TYPE"),
  'url' =>filter_input(INPUT_POST, "NULL_URL_URL"),
  'info' => filter_input(INPUT_POST, "NULL_URL_INFO")
);
}



//缓存设置
if(filter_has_var(INPUT_POST, "chche_type")){
$chche_config=array (
  'type' =>filter_input(INPUT_POST, "chche_type"),
  'prot' =>filter_input(INPUT_POST, "chche_prot"),
  'time' =>filter_input(INPUT_POST, "chche_time"),
);
}
 

//广告代码
if(filter_has_var(INPUT_POST, "FOOTER_CODE")){$FOOTER_CODE=filter_input(INPUT_POST, "FOOTER_CODE");}

//有效期
if(filter_has_var(INPUT_POST, "timecookie")){$timecookie=filter_input(INPUT_POST, "timecookie");}

//访问超时
if(filter_has_var(INPUT_POST, "timeout")){$timeout=filter_input(INPUT_POST, "timeout");}

//提交间隔
if(filter_has_var(INPUT_POST, "from_timeout")){$from_timeout=filter_input(INPUT_POST, "from_timeout");}



//解析
if(filter_has_var(INPUT_POST, "jx_url")){ 
    $input=trim(filter_input(INPUT_POST, "jx_url"));
    if($input===""){$jx_url=array();}else{$jx_url=preg_split('/[\r\n]+/s',$input);}
       
}

//链接
if(filter_has_var(INPUT_POST, "jx_link")){
    $input=trim(filter_input(INPUT_POST, "jx_link"));
      if($input===""){
         $jx_link=[];        
     } else{
	$arr=preg_split('/[\r\n]+/s', $input);	
	foreach($arr as $key){$val=explode("=>",$key); $array[$val[0]]=$val[1];}
        $jx_link=$array;
     }
    
}


//直播
if(filter_has_var(INPUT_POST, "live_url")){
     $input=trim(filter_input(INPUT_POST, "live_url"));
     if($input===""){
         $live_url=[];        
     } else{
        $arr=preg_split('/[\r\n]+/s',$input );	
        foreach($arr as $key){$val=explode("=>",$key); $array[$val[0]]=$val[1];}
        $live_url=$array;
    }
  
}



//防火墙开关设置
if(filter_has_var(INPUT_POST, "BLACKLIST_OFF")){	
	$BLACKLIST['off']=filter_input(INPUT_POST, "BLACKLIST_OFF");
    $BLACKLIST['type']=filter_input(INPUT_POST, "BLACKLIST_TYPE");
}
//防火墙白名单设置

//播放器开关配置

if(filter_has_var(INPUT_POST, "play_off_link")){	
        $play['off']['jmp']=filter_input(INPUT_POST, "play_off_jmp");
	$play['off']['link']=filter_input(INPUT_POST, "play_off_link");        
        $play['off']['yun']=filter_input(INPUT_POST, "play_off_yun");
        $play['off']['live']=filter_input(INPUT_POST, "play_off_live");
        $play['off']['mylink']=filter_input(INPUT_POST, "play_off_mylink");
        $play['off']['help']=filter_input(INPUT_POST, "play_off_help");
        $play['off']['debug']=filter_input(INPUT_POST, "play_off_debug");
        $play['off']['log']= filter_input(INPUT_POST, "play_off_log");
        $play['off']['ckplay']=filter_input(INPUT_POST, "play_off_ckplay");
        $play['off']['autoline']=filter_input(INPUT_POST, "play_off_autoline");
        $play['off']['autoflag']=filter_input(INPUT_POST, "play_off_autoflag");
        $play['off']['lshttps']=filter_input(INPUT_POST, "play_off_lshttps");
        
        
}
//播放线路配置

if(filter_has_var(INPUT_POST, "play_line_pc_line")){	
	$play['line']['pc']['line']=filter_input(INPUT_POST, "play_line_pc_line");
        $play['line']['pc']['adtime']=filter_input(INPUT_POST, "play_line_pc_adtime");
        $play['line']['pc']['adPage']=filter_input(INPUT_POST, "play_line_pc_adPage");
        $play['line']['wap']['line']=filter_input(INPUT_POST, "play_line_wap_line");
        $play['line']['wap']['adtime']=filter_input(INPUT_POST, "play_line_wap_adtime");
        $play['line']['wap']['adPage']=filter_input(INPUT_POST, "play_line_wap_adPage");
        $play['line']['all']['autoline']['off']=filter_input(INPUT_POST, "play_line_all_autoline_off");
        $arr=preg_split('/[\r\n]+/s', trim(filter_input(INPUT_POST, "play_line_all_autoline_val")));
        foreach($arr as $key){$val=explode("=>",$key); $array[trim($val[0])]=trim($val[1]);}
        $play['line']['all']['autoline']['val']=$array;    
}

//播放 播放配置
 
if(filter_has_var(INPUT_POST, "play_play_pc_player")){	
    
	$play['play']['pc']['player']=filter_input(INPUT_POST, "play_play_pc_player");
        $play['play']['pc']['autoplay']=filter_input(INPUT_POST, "play_play_pc_autoplay");
        $play['play']['wap']['player']= filter_input(INPUT_POST, "play_play_wap_player");
        $play['play']['wap']['autoplay']=filter_input(INPUT_POST, "play_play_wap_autoplay");
       
        $play['play']['all']['headtime']=filter_input(INPUT_POST, "play_play_all_headtime");
        $play['play']['all']['endtime']=filter_input(INPUT_POST, "play_play_all_endtime");               
        
        $play['play']['all']['autoline']['off']=filter_input(INPUT_POST, "play_play_all_autoline_off");
        $arr=preg_split('/[\r\n]+/s',trim(filter_input(INPUT_POST, "play_play_all_autoline_val")));
        foreach($arr as $key){$val=explode("=>",$key); $array[trim($val[0])]=trim($val[1]);}
        $play['play']['all']['autoline']['val']=$array;     
}

//播放 其他配置

if(filter_has_var(INPUT_POST, "play_all_ver")){	     
	$play['all']['AppName']= filter_input(INPUT_POST, "play_all_AppName");
        $play['all']['ver']=filter_input(INPUT_POST, "play_all_ver");
        $play['all']['by']=filter_input(INPUT_POST, "play_all_by");
        $play['all']['info']=filter_input(INPUT_POST, "play_all_info");
         $play['all']['info']=filter_input(INPUT_POST, "play_all_info");
         $play['all']['link_info']=filter_input(INPUT_POST, "play_all_link_info");
        $play['all']['yun_info']=filter_input(INPUT_POST, "play_all_yun_info");
        $play['all']['decode']= filter_input(INPUT_POST, "play_all_decode");  
}

//播放 样式配置

if(filter_has_var(INPUT_POST, "play_style_line_style")){	
        
        $play['style']['off']=filter_input(INPUT_POST, "play_style_off");
	$play['style']['logo_show']=filter_input(INPUT_POST, "play_style_logo_show");
        $play['style']['line_show']=filter_input(INPUT_POST, "play_style_line_show");
        $play['style']['list_show']= filter_input(INPUT_POST, "play_style_list_show");
        $play['style']['flaglist_show']=filter_input(INPUT_POST, "play_style_flaglist_show");
        $play['style']['playlist_show']=filter_input(INPUT_POST, "play_style_playlist_show");
        
         $play['style']['line_style']=filter_input(INPUT_POST, "play_style_line_style");
         $play['style']['line_hover']=filter_input(INPUT_POST, "play_style_line_hover");
         $play['style']['line_on']= filter_input(INPUT_POST, "play_style_line_on");
         $play['style']['play_style']=filter_input(INPUT_POST, "play_style_play_style");
         $play['style']['play_hover']=filter_input(INPUT_POST, "play_style_play_hover");        
         file_put_contents("../save/play.css",trim(filter_input(INPUT_POST, "play_style_css")));
         
         
           
}


//播放 筛选配置 
if(filter_has_var(INPUT_POST, "play_match_yunflag")){	     
	$play['match']['yunflag']=filter_input(INPUT_POST, "play_match_yunflag");
        $play['match']['video']= filter_input(INPUT_POST, "play_match_video");
        $play['match']['urljmp']=filter_input(INPUT_POST, "play_match_urljmp");
        $play['match']['urlurl']=filter_input(INPUT_POST, "play_match_urlurl");
        $play['match']['urlflag']=filter_input(INPUT_POST, "play_match_urlflag");
        $play['match']['playflag']= filter_input(INPUT_POST, "play_match_playflag");    
}

if( Main_db::save()){
	
	     exit(json_encode(array('success'=>1,'icon'=>1,'m'=>"保存成功!")));
	
	 }else{
		 exit(json_encode(array('success'=>0,'icon'=>0,'m'=>"保存失败!请检测配置文件权限")));
	} 
  
