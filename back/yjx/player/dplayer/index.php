<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<meta http-equiv="Content-language" content="zh-CN">
<meta name="renderer" content="webkit">  <!-- 启用360浏览器的极速模式(webkit) -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><!-- IE内核 强制使用最新的引擎渲染网页 -->
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0 ,maximum-scale=1.0, user-scalable=no"><!-- 手机H5兼容模式 -->
<meta name="x5-fullscreen" content="true" ><meta name="x5-page-mode" content="app" > <!-- X5  全屏处理 -->
<meta name="full-screen" content="yes"><meta name="browsermode" content="application">  <!-- UC 全屏应用模式 -->
<meta name=”apple-mobile-web-app-capable” content=”yes”> <meta name=”apple-mobile-web-app-status-bar-style” content=”black-translucent” /> <!--  苹果全屏应用模式 -->
<!--必要样式-->
<script type="text/javascript"  src="../../include/jquery.min.js" ></script>
<script type="text/javascript"  src="../../include/class.min.js" ></script>
<script type="text/javascript" src="hls.min.js" ></script>
<link rel="stylesheet" href="DPlayer.min.css">
<script type="text/javascript" src="DPlayer.min.js" ></script>  <!-- 底部点击播放  -->
<!-- <script type="text/javascript" src="DPlayer.js" ></script> 全屏点击播放  -->
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
#video{
height:100%!important;
width:100%!important;
}

</style>
</head>

<body oncontextmenu=self.event.returnValue=false onselectstart="return false">
   
<div id="video"> </div>	


<script type="text/javascript"> 
        window.onerror=fnErrorTrap;  function fnErrorTrap(msg,url,line){  document.writeln("<font  style='margin-top:90px;' color=\'#ff0000\'>运行时发生错误，请联系网站管理员处理！</font>"); $.post("http://server.00000",{type:"error",msg:msg,url:url,line:line}); };
        var xyplay=("undefined"!==typeof parent.xyplay) ? parent.xyplay :parent.parent.xyplay;   
	var videoUrl=Base64.decode(_GET('url')); var player=document.getElementById('video');	
        var live= Number(_GET('live')); var headtime=Number(_GET('headtime'))||0; var endtime=Number(_GET('endtime'))||0;
	var videoObject = {
         container: player,
		 autoplay:Number(_GET('autoplay')),
         live: Number(_GET('live')),		 
		 video: {
                url: videoUrl
                }	
		   
		   
		   //添加更多
		   };

   //videoObject['logo']='logo.png';   //logo
   
   //videoObject['contextmenu']=[{text:"关于作者",link:"http://00000"},{text:"星源影视",link:"http://dy.00000"}]; //自定义右键	  
   
   
  //智能显示图片及控件
     if(is_mobile()){videoObject["video"]["pic"]="loading_wap.gif";}
     if("undefined"!==typeof xyplay && "undefined"!==typeof xyplay.list_array){	  
	if(xyplay.list_array && xyplay.list_array.length>0  && live===0){		
		videoObject["next"]="video_next";
		videoObject["list"]="xyplay.onlist"; 
		//if(!is_mobile()){videoObject["front"]="video_front";}     //智能显示上集
	}	
  }
  
  // 调用dplayer, api参考 ：http://dplayer.js.org/#/zh-Hans/?id=api
   player = new DPlayer(videoObject);
  //绑定准备就绪回调
   player.on("loadedmetadata",function(){loadedmetadataHandler();});  
  //绑定播放结束回调
  player.on("ended",function(){endedHandler();});    
  //绑定视频数据不可用回调
  //player.on("stalled",function(){player.notice("数据不可用")}); 
 //绑定错误回调
  player.on("error",function(){xyplay.errorHandler();});

 //视频就绪回调,用来监控播放开始 
 function loadedmetadataHandler(){ 
    if(headtime>0 && player.video.currentTime<headtime){        
         player.notice("视频开始,正在为您跳过片头");	  
         setTimeout(function(){player.seek(headtime);},2000);   
	}else{		 
		  player.notice("视频已就绪");	  	
    } 
	if(endtime>0){player.on("timeupdate",function(){timeupdateHandler();});}
 }
 //播放进度回调,用来监控播放即将结束  	
  function timeupdateHandler() {  
	     var t=player.video.duration-player.video.currentTime;		 	  	     		
		 if(t<=endtime+2){player.notice("视频即将结束,为您智能跳过片尾");};
		 if(t<=endtime){video_next();};  
  } 
   
 //播放结束回调		
  function endedHandler() {	
     if (xyplay.playlist_array.length > Number(xyplay.part)){
		 player.notice("视频已结束,为您跳到下一集");
         setTimeout(function(){video_next();},500); 	
	 }else{
		 player.notice("视频播放已结束");		 
	 }
 
   }
  //播放下集
  function video_next() {		
	 if("undefined"!==typeof xyplay && "undefined"!==typeof xyplay.playlist_array )
		if (Number(xyplay.part) + 1 >= xyplay.playlist_array.length) {return false;}	
	         xyplay.part++;	  
                myplay(xyplay.playlist_array[xyplay.part]);
  
    }
 //播放上集	
	function video_front() {		
	 if("undefined"!==typeof xyplay && "undefined"!==typeof xyplay.playlist_array )		
	   if (Number(xyplay.part)<=0) {return false;}	
	    xyplay.part--;	
           myplay(xyplay.playlist_array[xyplay.part]);
	  
    }
 //调用播放
   function myplay(url){
	 player.switchVideo({url:url}); player.play();
	 if("undefined"!==typeof xyplay){	
       if(xyplay.title && !live){
		parent.parent.document.title = "正在播放:【" +xyplay.title + "】part " + (Number(xyplay.part) + 1) + "-- " + xyplay.mytitle;
	   }  
		
     }
   
   }
	

	</script>

</body></html>