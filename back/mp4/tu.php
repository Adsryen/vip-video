<?php
header("Content-Type: image/jpeg;text/html; charset=utf-8");
$url = 'http://'.$_GET['tu'];
$ch = curl_init($url); //       问题反馈：995161098
//curl_setopt($ch, CURLOPT_REFERER, "http://www.iqiyi.com/"); //伪造来路页面
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:'. getIP().'', 'CLIENT-IP:'. getIP().'')); //构造IP 
curl_setopt($ch, CURLOPT_HEADER, 0); //不返回header部分
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //返回字符串，而非直接输出
$FH= curl_exec($ch);
curl_close($ch);
echo $FH;
exit; 
?>