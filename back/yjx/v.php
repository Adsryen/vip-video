<?php
//文件名称
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
// 网站根目录
define('FCPATH', str_replace("\\", "/", str_replace(SELF, '', __FILE__)));

//加载配置文件
require_once(FCPATH."save/config.php");  
//接收参数
$url = htmlspecialchars($_GET['url'] ? $_GET['url'] : $_GET['vid']);
if (empty($url))
{
    exit('<style type="text/css">
    H1{margin:10% 0 auto; color:#C7636C; text-align:center; font-family: Microsoft Jhenghei;}
    p{font-size: 1.2rem;/*1.2 × 10px = 12px */;text-align:center; font-family: Microsoft Jhenghei;}
    </style>  
  <h1>请填写url地址</h1>
  <p>本解析接口仅用于学习交流，盗用必究！~</p>');
 
}
//加载防火墙规则
Blacklist::parse($BLACKLIST);
if(lsMobile()){	  
	    $myplayer=$play['play']['wap']['player'];
	    $autoplay=$play['play']['wap']['autoplay'];	  
	  }else{		  
	     $myplayer=$play['play']['pc']['player'];
	    $autoplay=$play['play']['pc']['autoplay'];	  
	}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $TITLE ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-language" content="zh-CN">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="renderer" content="webkit">
<meta name="msapplication-tap-highlight" content="no">
<meta name="HandheldFriendly" content="true">
<meta name="x5-page-mode" content="app">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<script type="text/javascript" src="./include/jquery.min.js"></script>
<script type="text/javascript"  src="./include/class.min.js" ></script>
<style type="text/css">
html,body{
background-color:#000;
padding: 0;
margin: 0;
height:100%;
width:100%;
color:#999;
overflow:hidden;
}
#a1{
height:100%!important;
width:100%!important;
object-fit:contain;
}
</style>

<body style="overflow-y:hidden;">
<div id="loading" align="center"><strong><br><br><br><br><br><span class="tips">服务器正在解析中,请稍等....<font class="timemsg">0</font>s</span></strong><span class="timeout" style="display:none;color:#f90;">解析响应超时，请刷新重试！</span></div>
<div id="a1" class="content" style="display:none;"></div>
<div id="error" class="content" style="display:none;font-weight:bold;padding-top:90px;" align="center"></div>


<script type="text/javascript">    
var url='<?php echo $url ?>'; var cip='null';

var api=is_mobile()? "<?php echo $jx_url[$play["line"]["wap"]["line"]] ?>":"<?php echo $jx_url[$play["line"]["pc"]["line"]] ?>" ;

var autoplay="<?php echo $autoplay ?>";

var myplayer="./player/"+"<?php echo $myplayer ?>"+"/?url=";
function tipstime(count){
    $('.timemsg').text(count);
    if (count === 20) {
       $('.tips').hide();
       $('.timeout').show();
    } else {
        count += 1;
        setTimeout(function(){tipstime(count);}, 1000);
    };
}
tipstime(0);

function player(){
 $.ajax({ url: 'api.php?cip='+cip+'&url=' + url,dataType: 'jsonp',jsonp: 'cb',success:function(data){success(data);}}); 
 };

 //function player(){$.post('api.php',{'url':url,'cip':cip,},function(data){success(data)},'json')}; 
  
 function success(data){
   
  if (data.success){
	         
		if(data.info){info=data.info;prat=data.part;};
			 
		if(data['url'].search(/\.(ogg|mp4|webm|m3u8)$/i)!==-1){			
                
				urlplay(myplayer+Base64.encode(data.url)+"&autoplay="+autoplay);				
        
        }else if(data.type==='video' || data.type==='m3u8' || data.type==='mp4'  || data.type==='hls' ){

              urlplay(myplayer+Base64.encode(data.url)+"&autoplay="+autoplay);
                 
		 }else if(data.type==='url'  ){

               urlplay(data.url);

		 }else{				
                
				//var word='<br><br><a href="javascript:void(0);"  onclick="urlplay(api+url);">3秒后使用解析播放,点这里直接访问</a>';

				//$("#loading").hide();$("#error").show();$("#error").html("解析失败,已上报至服务器" + word);
                                  //setTimeout(function(){urlplay(api+url);}, 3000);
 				urlplay(api+url);				
         }  
   }else{

     // var word='<br><br><a href="javascript:void(0);"  onclick="urlplay(api+url);">2秒后使用解析播放,点这里直接访问</a>';
      //$("#loading").hide();$("#error").show();$("#error").html("解析失败,已上报至服务器" + word);
   	  //setTimeout(function(){urlplay(api+url);}, 2000);
          
      urlplay(api+url);    
   }  

 }

   function urlplay(url){	  		
     
   	  $("#loading").hide();$("#a1").show();
      $("#a1").html('<iframe  width="100%" height="100%" src="' + url+'" frameborder="0" border="0" marginwidth="0" marginheight="0" scrolling="no" allowfullscreen="true" ></iframe>');         		    

  }
   
 function  video_next(){	  
 }
 
 function  video_line(){
	 
 urlplay(api+url);
 }
 
 function getcip(){$.get("https://data.video.iqiyi.com/v.f4v",function(cdnip){sip=cdnip.match(/\d+\.\d+\.\d+\.\d+/);cip=sip[0];player();});}
  
 if(url.search(/\.(ogg|mp4|webm|m3u8)$/i)!==-1){urlplay(myplayer+Base64.encode(data.url)+"&autoplay="+autoplay);}else{getcip();}
 
</script>
</body>
</html>