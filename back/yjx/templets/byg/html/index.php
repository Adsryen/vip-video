<!DOCTYPE html>
<html>      
<head> 
<title><?php echo $TITLE ?></title>
<meta name="keywords" content="<?php echo $keywords;?>" />
<meta name="description" content="<?php echo $description;?>" />   
<?php echo $HEADER ?>
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLETS_PATH ?>/images/styles.css">
<script type="text/javascript" src="include/jquery.min.js"></script>
<script type="text/javascript"  src="include/class.min.js?time=<?php time();?>" ></script>
<script id="xyplay" src="include/xyplay.min.js?time=<?php echo time();?>"></script>
<?php require_once TEMPLETS_PATH.$templets['html'].'/config.php'; include_once TEMPLETS_PATH.$templets['html'].'/css.php'; ?>
<?php if($templets['off']==1):?><style type="text/css"><?php  echo $templets['css']?></style><?php endif ?>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#000000">
<div class="fixed"></div>
<nav id="menu" class="menu slideout-menu">			
<section class="menu-section">				
		<h3 class="menu-section-title">超级资源</h3>					
		<ul class="menu-section-list" id="word">	
	 </ul>
	 </section>

<?php if($play['off']['live']==1):?>
<section class="menu-section">			
	<h3 class="menu-section-title">超级直播</h3>			 			
	<ul class="menu-section-list" id="live" >		
        </ul>
</section>
<?php endif ?>
</nav>
<main id="main" class="panel slideout-panel">
   
<div class="header">
<div class="nav">
  <button class="btn-hamburger" id="logo" style="display:none;"><span class="tooltip" > 不能播？点我</span></button>	  
    <i id="list" class="list"> </i>	
</div>
  
 <div id="word" class="word"></div> 
  
 <button id="book" class="btns-hamburger">
 <?php if($BOOK_INFO['off']==1):?>     
<div class="AD_AD">
<marquee scrollamount=3><?php echo $BOOK_INFO['info'];?></marquee>
</div>
 <?php endif ?>    
</button>  
</div>	
		
<div class="aside">    
    <div id="flaglist"> </div> 
    <div id="playlist"></div> 		
</div>

<div id="playad"></div>
<div id="player">  </div>
	
</main>
   
 <div id="xyplayer">
<script type="text/javascript" src="<?php echo TEMPLETS_PATH ?>/images/slideout.min.js"></script>
<script type="text/javascript">

var slideout = new Slideout({
	'panel': document.getElementById('main'),
	'menu': document.getElementById('menu'),
	'padding': 156,
	'tolerance': 70
  });
  document.getElementById('logo').addEventListener('click', function(){slideout.toggle();});
  document.getElementById('book').addEventListener('click', function(){slideout.toggle();});
  document.querySelector('.menu').addEventListener('click', function(eve) {
	if (eve.target.nodeName === 'LI' || eve.target.nodeName === 'A') { slideout.close(); }
  });
  
 // if(/iPhone|iPad|iPod/i.test(navigator.userAgent)){
	  
	// $("body").css({"margin-top":"50px","height":$(window).height()-50})
 // }
</script>

<script type="text/javascript">
var videoObject = {   	 
     
	 logo:'#logo',             //线路切换图标容器,忽略时为'.logo',注意：'.'是样式选择器,'#'是id选择器;
	 list:'#list',             //剧集切换图标容器,忽略时为'.list';
     line:'#word',             //线路列表容器,忽略时为'#line';
     plive:"#live",           //直播容器,忽略时为'#live'; 
	 plist:'.aside',             // 播放列表 容器,忽略时为'#list';
	 flaglist:"#flaglist" ,      //来源DIV容器,忽略时为'#flaglist';
     playlist:'#playlist',      //列表DIV容器,忽略时为'#playlist';
     player:'#player',	        //视频DIV容器,忽略时为'#player';
	 playad:'#playad',	        //广告DIV容器,忽略时为'#playad';
	 autohide:false,             //是否自动隐藏列表,忽略时为false;
	 api: '<?php echo $API_PATH; ?>',                 //api地址,忽略时为'api.php'	
	 loadimg: '<?php echo $style['loadimg'] ?>'   //加载动画,忽略时为空。
};
 xyplay=new xyplayer(videoObject);

</script>
</div>
<div id="footer">    
<?php echo $FOOTER_CODE ?>
<?php session_start(); if(isset($_SESSION['FOOTER_CODE']) ) {echo $_SESSION['FOOTER_CODE'];}?>
</div>
</body>
</html>