<?php

//模板样式设置,根据图片尺寸修改对应数字即可,单位像素。(height:高度;width:宽度;left:左边距,top:顶边距;right:右边距)
$style=array(
  //左侧logo图标样式设置(设置宽度或高度为0则不显示);
  'logo_url'=>TEMPLETS_PATH.'/images/line.png',           //logo路径设置  
  'logo_width'=>'32',                           //显示宽度,单位：像素，下同。
  'logo_height'=>'18',                          //高度，设置为0则不显示
  'logo_top'=>'2',                              //顶边距
  'logo_left'=>'2',                             //左边距
  
  //右侧列表图标样式设置(设置宽度或高度为0则不显示)；
  'list_url'=>TEMPLETS_PATH.'/images/list.png',           //列表图标路径设置
  'list_width'=>'32',                           //显示宽度,单位：像素，下同
  'list_height'=>'16',                          //高度,
  'list_top'=>'5',                              //顶边距
  'list_right'=>'5',                             //右边距 
  
  
  //广告图片样式设置
  
   'noad_url'=>TEMPLETS_PATH.'/images/logo.png',           //列表图标路径设置
  'noad_width'=>'200',                           //显示宽度,单位：像素，下同
  'noad_height'=>'100',                          //高度,
  'noad_top'=>'10',                              //顶边距
  'noad_left'=>'550',                             //右边距 
  
                   //滚动公告,1为启用，0为关闭;
   
  // 数据加载动画
  'loadimg'=>TEMPLETS_PATH.'/images/loading.gif',  
   
);


?>
