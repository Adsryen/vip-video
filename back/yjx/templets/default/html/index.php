<!DOCTYPE html>
<html>
<head> 
<title><?php echo $TITLE ?></title>
<meta name="keywords" content="<?php echo $keywords;?>" />
<meta name="description" content="<?php echo $description;?>" />
<?php echo $HEADER ?>
<!--必要样式-->
<script type="text/javascript" src="include/jquery.min.js"></script>
<script type="text/javascript"  src="include/class.min.js?time=<?php echo time();?>" ></script>
<script id="xyplay" src="include/xyplay.min.js?time=<?php echo time();?>"></script>
<?php require_once TEMPLETS_PATH.$templets['html'].'/config.php'; include_once TEMPLETS_PATH.$templets['html'].'/css.php';?>
<?php if($templets['off']==1):?><style type="text/css"><?php  echo $templets['css']?></style><?php endif ?>
</head>
<body>
<div class="fixed"></div>   
<div class="header">
<div class="nav">	
	<i id="logo" class="logo"></i>	 
    <i id="list" class="list"> </i>	
<?php if($BOOK_INFO['off']==1):?>
<button class="btns-hamburger" onclick="xyplay.online()">	
<div class="AD_AD">
<marquee scrollamount=3><?php echo $BOOK_INFO['info'];?></marquee>
</div>
</button>
<?php endif ?>
	
	
</div>
 <div id="word" class="word"></div> 
</div>
<div class="aside">    
    <div id="flaglist"> </div> 
    <div id="playlist"></div> 
</div>

<div align="center" >

<div id="playad"  ></div>
<div id="player" >  </div>
</div>
 <div id="xyplayer">
<script type="text/javascript">
var videoObject = {   	 
     
	 logo:'#logo',             //线路切换图标容器,忽略时为'.logo',注意：'.'是样式选择器,'#'是id选择器;
	 list:'#list',             //剧集切换图标容器,忽略时为'.list';
     line:'#word',             //线路列表容器,忽略时为'#line';
     plist:'.aside',             // 播放列表 容器,忽略时为'#list';
	 flaglist:"#flaglist" ,      //来源容器,忽略时为'#flaglist';
     playlist:'#playlist',      //列表容器,忽略时为'#playlist';
     player:'#player',	        //视频容器,忽略时为'#player';
	 playad:'#playad',	        //广告容器,忽略时为'#playad';
	 plive:"#plive",           //直播容器,忽略时为'#plive';
	 autohide:true,             //是否自动隐藏列表,忽略时为false;
	
	 api: '<?php echo $SAPI_PATH ?>',                 //api地址,忽略时为'api.php'	
	 loadimg: '<?php echo $style['loadimg']; ?>'   //加载动画,忽略时为空。
};

 xyplay=new xyplayer(videoObject);

</script>
</div>
<div id="frooter">
<?php echo $FOOTER_CODE ?>
<?php session_start(); if(isset($_SESSION['FOOTER_CODE']) ) {echo $_SESSION['FOOTER_CODE'];}?> 
</div>   
</body>
</html>