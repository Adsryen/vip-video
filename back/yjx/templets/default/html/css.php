
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

.header{	
   position: absolute;
   z-index: 99999;
   top:0px;
   left:0px;
   height:auto;
   width:100%;

}

.section{
    width:100%;
    height:100%; 	
}

#playad,#player{
        position: absolute; 
	display:none;
	height:100% !important;
        width:100% !important;
}
/*  播放列表内容   */	

.aside{
   background-color:#000;
   position: absolute;
   z-index: 999999;
   right:0px;
   text-decoration:none;
   margin-top:<?php echo $style['list_height']+$style['list_top']+10;?>px;
   margin-left:<?php echo $style['list_left']?>px;
   
   /*  设置纵向滚动条  */
    overflow-x:hidden;
    overflow-y:auto;
	height:auto;
	max-height:calc(100% - <?php echo $style['list_height']+$style['list_top']+50;?>px);
	width:auto;
    max-width:230px;
    min-width:130px;
  
  /*  半透明背景  */
    filter:alpha(opacity=50);
    -moz-opacity:0.5;
    -khtml-opacity: 0.5;
    opacity: 0.5; 
}

 /*  移动设备自适应宽高  */  
@media screen and (max-width: 650px) {.aside {width:100%;height:auto;left:0px;max-width:100%;min-width:auto;}} 

 #flaglist,#playlist{	 
	  display: none;
 }

/*  线路切换图标   */	

.logo{		
	display:none;	
	float:left;
	width:<?php echo $style['logo_width']?>px;
	height:<?php echo $style['logo_height']?>px;
	margin-top:<?php echo $style['logo_top']?>px;
	margin-left:<?php echo $style['logo_left']?>px;
	background: transparent url("<?php echo $style['logo_url']?>") no-repeat scroll ;
	cursor: pointer;
		
	 /*  半透明背景  
    filter:alpha(opacity=50);
    -moz-opacity:0.5;
    -khtml-opacity: 0.5;
    opacity: 0.5; 
	*/
	}

 /*  播放列表图标   */	  
.list{	
	display:none;
	float:right;
	width:<?php echo $style['list_width']?>px;
	height:<?php echo $style['list_height']?>px;
	margin-top:<?php echo $style['list_top']?>px;
	margin-right:<?php echo $style['list_right']?>px;
	background: transparent url("<?php echo $style['list_url']?>") no-repeat scroll ;
	cursor: pointer;

	}

/* 线路列表 */
#word{	
	 /*  设置纵向滚动条  */
    float:left;
	margin-left:-32px;
	 overflow-x:hidden;
     overflow-y:auto;
	display:none;	
	height:auto;
	width:100px;                    /*  线路列表横向显示 显示 改为 100%  */
	margin-top:<?php echo $style['logo_height']?>px;
	max-height:calc(100% - <?php echo $style['log_height']+$style['log_top']+10;?>px);	
	text-align: center;	 
	background-color:#000;          /*  背景颜色  */
	
	 /*  半透明背景  */
    filter:alpha(opacity=50);      
    -moz-opacity:0.5;
    -khtml-opacity: 0.5;
    opacity: 0.5;	
}

/*  移动设备自适应宽高   */
@media screen and (max-width: 650px) {#word{width:100%;height:auto;left:0px;max-width:100%;min-width:auto;}} 

/* 播放列表元素 */
 #flaglist li, #playlist li,#word li{	
   
    display: inline-table;
	border: 1px solid #f00;          /* 边框大小及颜色 */
	color:#0f0;                     /*  列表字体颜色 */
    width:80px;                 
    padding: 5px;
    margin:5px;
    font-size: 12px;
    text-align: center;
    border-radius: 5px;
    
	<?php echo $play['style']['play_style']?>
	
	
	/* 列表文字剪裁 */
	 
	overflow: hidden; 
   	white-space: nowrap;     /* 不换行 */
    text-overflow: ellipsis;   
    -o-text-overflow: ellipsis;     
    text-decoration: none;	
	table-layout:fixed;
    cursor:pointer;          /* 鼠标设置为手型 */

	}	

	
/* 线路列表元素 */
   #word li{	
   
    display: inline-table;
	border: 1px solid #f00;          /* 边框大小及颜色 */
	color:#0f0;                     /*  列表字体颜色 */
    width:80px;                 
    padding: 5px;
    margin:5px;
    font-size: 12px;
    text-align: center;
    border-radius: 5px;
    
	<?php echo $play['style']['line_style']?>
		
	}	
		
#word li:hover{
<?php echo $play['style']['line_hover']?>
	  	
	}		
	
#playlist li:hover,#flaglist li:hover,#word li:hover{
<?php echo $play['style']['play_hover']?>
	  	
	}

/*滚动字体 样式设置 开始*/
.btns-hamburger {
  font-size: 14px;
  width:90%;
  border: none;
  position: absolute;
  top: 0px;
  left: 90px;
  outline:none;
 /* background: url('../images/menu.png') no-repeat left center;*/
  background: url('') no-repeat left center; 
  cursor: pointer;
}

.AD_AD {
	/*border:1px solid #F00;边框*/
	padding: 7px 0px 0px 0px; /*上 左 下 右间隔*/
}
/*滚动字体 样式设置 结束*/
	
</style>
