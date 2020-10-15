<?php 
if(!file_exists(dirname(__FILE__).'/../save/config.php')){exit("出错了，配置文件不存在！");}
if(function_exists("opcache_reset")){opcache_reset();} //清除PHP脚本缓存
include dirname(__FILE__).'/../save/config.php';
session_start(); 
$username=isset($_SESSION['username'])?$_SESSION['username']:'admin';
if(empty($_SESSION['hashstr']) || $_SESSION['hashstr']!==md5($user.$pass)){header("location:login.html");exit();}



