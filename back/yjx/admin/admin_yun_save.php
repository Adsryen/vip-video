<?php 
include("config.php");
require_once('../include/db.class.php');
session_start(); 
 if(isset($_SESSION['lock_yun_config'])){ $time=(int)$_SESSION['lock_yun_config']-(int)time(); if($time>0){ exit(json_encode(array('success'=>0,'icon'=>5,'m'=>"请勿频繁提交，".$time."秒后再试！")));}}
 $_SESSION['lock_yun_config']= time()+ $from_timeout;

//云播 资源站设置
if (filter_has_var(INPUT_POST, "API_URL")) {
    require_once("../save/yun.config.php");

    $API_URL = preg_split('/[\r\n]+/s', trim(filter_input(INPUT_POST, "API_URL")));

    if (Main_db::save("../save/yun.config.php")) {

        exit(json_encode(array('success' => 1, 'icon' => 1, 'm' => "保存成功!")));
    } else {
        exit(json_encode(array('success' => 0, 'icon' => 0, 'm' => "保存失败!请检测配置文件权限")));
    }
    exit;
}

//云播 规则设置
if (filter_has_var(INPUT_POST, "title_match")) {

    require_once("../save/yun.match.php");

    $ERROR_404 = filter_input(INPUT_POST, "ERROR_404");
    $array1 = array();
    $arr1 = preg_split('/[\r\n]+/s', trim(filter_input(INPUT_POST, "type_match")));
    foreach ($arr1 as $key) {
        $val = explode("=>", $key);
        $array1[trim($val[0])] = trim($val[1]);
    } $type_match = $array1;

    $title_match = filter_input(INPUT_POST, "title_match");

    $title_replace = preg_split('/[\r\n]+/s', trim(filter_input(INPUT_POST, "title_replace")));

    $url_replace = preg_split('/[\r\n]+/s', trim(filter_input(INPUT_POST, "url_replace")));

    $array2 = array();
    $arr2 = preg_split('/[\r\n]+/s', trim(filter_input(INPUT_POST, "url_match")));
    foreach ($arr2 as $key) {
        $val = explode("=>", $key);
        $array2[trim($val[0])] = trim($val[1]);
    } $url_match = $array2;

    $array3 = array();
    $arr3 = preg_split('/[\r\n]+/s', trim(filter_input(INPUT_POST, "name_match")));
    foreach ($arr3 as $key) {
        $val = explode("=>", $key);
        $array3[trim($val[0])] = explode(",", $val[1]);
    }$name_match = $array3;

    if (Main_db::save("../save/yun.match.php")) {

        exit(json_encode(array('success' => 1, 'icon' => 1, 'm' => "保存成功!")));
    } else {
        exit(json_encode(array('success' => 0, 'icon' => 0, 'm' => "保存失败!请检测配置文件权限")));
    }
}
