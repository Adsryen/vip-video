<?php
header("Content-Type: image/jpeg;text/html; charset=utf-8");
$url = 'http://'.$_GET['tu'];
$ch = curl_init($url); //       ���ⷴ����995161098
//curl_setopt($ch, CURLOPT_REFERER, "http://www.iqiyi.com/"); //α����·ҳ��
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:'. getIP().'', 'CLIENT-IP:'. getIP().'')); //����IP 
curl_setopt($ch, CURLOPT_HEADER, 0); //������header����
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //�����ַ���������ֱ�����
$FH= curl_exec($ch);
curl_close($ch);
echo $FH;
exit; 
?>