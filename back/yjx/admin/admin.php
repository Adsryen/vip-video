<?php
include "config.php";
include dirname(__FILE__) . '/../include/db.class.php';

 session_start(); 
 if(isset($_SESSION['lock_config'])){ $time=(int)$_SESSION['lock_config']-(int)time(); if($time>0){ exit(json_encode(array('success'=>0,'icon'=>5,'m'=>"请勿频繁提交，".$time."秒后再试！")));}}
 $_SESSION['lock_config']= time()+ $from_timeout;
 
//检测参数
if (!filter_has_var(INPUT_POST, "type")) { exit(json_encode(array('success' => 0, 'icon' => 0, 'm' => "请勿非法调用！")));}

//传参初始化
$type = filter_input(INPUT_POST, 'type');
$id = filter_input(INPUT_POST, 'id');


//json 初始化
$info = array('success' => 0, 'icon' => 6);

switch ($type) {

    //防火墙规则 关闭	
    case 'black_match_stop':
        isid();    
        $BLACKLIST['match'][$id]['off'] = "0";
        $info['m'] = "已停用";
        $info['icon'] = 5;
        break;
    //防火墙白规则 开启I 
    case 'black_match_start':
        isid();
        $BLACKLIST['match'][$id]['off'] = "1";
        $info['m'] = "已开启";
        break;
    //防火墙规则 删除 
    case 'black_match_del':
         isid();
         $id=explode(",",$id);
        if (is_array($id)) {
            foreach ($id as $key) {
                unset($BLACKLIST['match'][$key]);              
            }
        } else {
             unset($BLACKLIST['match'][$id]);
       
        }
        array_values($BLACKLIST['match']);
        $info['id'] = filter_input(INPUT_POST, 'id');
        $info['m'] = "删除成功";
        break;

    //防火墙规则 添加项 	 
    case 'black_match_add' :

        $BLACKLIST['match'][] = array(
            'off' => filter_input(INPUT_POST, 'BLACKLIST_MATCTH_OFF'),
            'type' =>filter_input(INPUT_POST, 'BLACKLIST_MATCTH_TYPE'),
            'val' => preg_split('/[\r\n]+/s', trim(filter_input(INPUT_POST, 'BLACKLIST_MATCTH_VAL'))),
            'black' => filter_input(INPUT_POST, 'BLACKLIST_MATCTH_BLACK'),
            'name' => filter_input(INPUT_POST, 'BLACKLIST_MATCTH_NAME'),
            'match' =>  filter_input(INPUT_POST, 'BLACKLIST_MATCTH_MATCH'),
            'num' =>  filter_input(INPUT_POST, 'BLACKLIST_MATCTH_NUM')
        );

        $info['m'] = "添加成功";
        break;

    //防火墙规则 修改	 
    case 'black_match_edit' :
          isid(); 
         $BLACKLIST['match'][$id] = array(
            'off' => filter_input(INPUT_POST, 'BLACKLIST_MATCTH_OFF'),
            'type' =>filter_input(INPUT_POST, 'BLACKLIST_MATCTH_TYPE'),
            'val' => preg_split('/[\r\n]+/s', trim(filter_input(INPUT_POST, 'BLACKLIST_MATCTH_VAL'))),
            'black' => filter_input(INPUT_POST, 'BLACKLIST_MATCTH_BLACK'),
            'name' => filter_input(INPUT_POST, 'BLACKLIST_MATCTH_NAME'),
            'match' =>  filter_input(INPUT_POST, 'BLACKLIST_MATCTH_MATCH'),
            'num' =>  filter_input(INPUT_POST, 'BLACKLIST_MATCTH_NUM')
        );

        $info['m'] = "修改成功";
        break;


    //防火墙动作 添加 	 
    case 'black_black_add' :

        $BLACKLIST['black'][] = array(
            'type' => filter_input(INPUT_POST, 'BLACKLIST_BLACK_TYPE'),
            'action' =>  filter_input(INPUT_POST, 'BLACKLIST_BLACK_ACTION'),
            'info' => filter_input(INPUT_POST, 'BLACKLIST_BLACK_INFO'),
            'name' => filter_input(INPUT_POST, 'BLACKLIST_BLACK_NAME'),
        );

        $info['m'] = "添加成功";
        break;

    //防火墙动作 修改 	 
    case 'black_black_edit' :
          isid();
         $BLACKLIST['black'][$id] = array(
            'type' => filter_input(INPUT_POST, 'BLACKLIST_BLACK_TYPE'),
            'action' =>  filter_input(INPUT_POST, 'BLACKLIST_BLACK_ACTION'),
            'info' => filter_input(INPUT_POST, 'BLACKLIST_BLACK_INFO'),
            'name' => filter_input(INPUT_POST, 'BLACKLIST_BLACK_NAME'),
        );

        $info['m'] = "修改成功";
        break;

       
    //防火墙动作 删除 
    case 'black_black_del':
        isid();
         $id=explode(",",$id);
        if (is_array($id)) {
            foreach ($id as $key) {
               unset($BLACKLIST['black'][$key]);   
            }
        } else {
              unset($BLACKLIST['black'][$id]);   
        }
        array_values($BLACKLIST['black']);
        $info['id'] = filter_input(INPUT_POST, 'id');
        $info['m'] = "删除成功";
        break;

    //对接 添加
    case 'link_add' :

        $LINK_URL[] = array(
            'off' => filter_input(INPUT_POST, 'LINK_OFF'),
            'num' => filter_input(INPUT_POST, 'LINK_NUM'),
            'name' => filter_input(INPUT_POST, 'LINK_NAME'),
            'path' => filter_input(INPUT_POST, 'LINK_PATH'),
            'val' => array(
                "success" => filter_input(INPUT_POST, 'LINK_VAL_SUCCESS'),
                "url" => filter_input(INPUT_POST, 'LINK_VAL_URL'),
                "code" => filter_input(INPUT_POST, 'LINK_VAL_CODE'),
                "player" => filter_input(INPUT_POST, 'LINK_VAL_PLAYER'),
                "type" => filter_input(INPUT_POST, 'LINK_VAL_TYPE'),
                "title" => filter_input(INPUT_POST, 'LINK_VAL_TITLE'),
                "part" => filter_input(INPUT_POST, 'LINK_VAL_PART'),
                "info" => filter_input(INPUT_POST, 'LINK_VAL_INFO'),
            )
        );
        $info['m'] = "添加成功";
        break;

    //对接 修改    
    case 'link_edit' :
         isid();
        $LINK_URL[$id] = array(
            'off' => filter_input(INPUT_POST, 'LINK_OFF'),
            'num' => filter_input(INPUT_POST, 'LINK_NUM'),
            'name' => filter_input(INPUT_POST, 'LINK_NAME'),
            'path' => filter_input(INPUT_POST, 'LINK_PATH'),
            'val' => array(
                "success" => filter_input(INPUT_POST, 'LINK_VAL_SUCCESS'),
                "url" => filter_input(INPUT_POST, 'LINK_VAL_URL'),
                "player" => filter_input(INPUT_POST, 'LINK_VAL_PLAYER'),
                "code" => filter_input(INPUT_POST, 'LINK_VAL_CODE'),
                "type" => filter_input(INPUT_POST, 'LINK_VAL_TYPE'),
                "title" => filter_input(INPUT_POST, 'LINK_VAL_TITLE'),
                "part" => filter_input(INPUT_POST, 'LINK_VAL_PART'),
                "info" => filter_input(INPUT_POST, 'LINK_VAL_INFO'),
            )
        );

        $info['m'] = "修改成功";
        break;

//对接 删除 
    case 'link_del':
        isid();
        $id=explode(",",$id);
        if (is_array($id)){foreach ($id as $key) {unset($LINK_URL[$key]); }} else {unset($LINK_URL[$id]);}
        array_values($LINK_URL);
        $info['id'] = filter_input(INPUT_POST, 'id');
        $info['m'] = "删除成功";
        break;
//对接 停止
    case 'link_stop':
        isid();
        $LINK_URL[$id]['off'] = 0;
        $info['m'] = "已停用";
        $info['icon'] = 5;
        break;

    //对接 启动
    case 'link_start':
         isid();
        $LINK_URL[$id]['off'] = 1;
        $info['m'] = "已启用";
        $info['icon'] = 6;
        break;

    //修改 管理员密码 
    case 'user_edit':
        $user = trim(filter_input(INPUT_POST, 'username'));
        $pass = md5(trim(filter_input(INPUT_POST, 'password')));
        $info['m'] = $user . "修改成功";
        break;
    //更新 云规则 
    case 'upyundata':
        $api = "http://api.00000/save/yun.match.js";
        $data = curl($api);
        if (preg_match("/\<\?php[\S\s]*\?\>/i", $data)) {
            if (file_put_contents("../save/yun.match.php", $data)) {
                $data = curl("http://api.00000/save/yun.ver.js");
                if (substr($data, 0, 8) === "document") {
                    file_put_contents("../save/yun.ver.js?ver=".time(), $data);
                }
                $info["success"] = 1;
                $info['m'] = "更新成功";
                exit(json_encode($info));
            }
        }
        $info['success'] = 0;
        $info['icon'] = 5;
        $info['m'] = "更新失败，请检查网络！";
        exit(json_encode($info));
        break;
    default:
        exit(json_encode(array('success' => 0, 'icon' => 0, 'm' => "参数错误！")));
}


if (Main_db::save()) {

    $info['success'] = 1;
} else {

    $info['success'] = 0;
    $info['icon'] = 5;
    $info['m'] = "操作失败！";
}

exit(json_encode($info));

function isid(){   
    if(!filter_has_var(INPUT_POST, "id")){ exit(json_encode(array('success' => 0, 'icon' => 0, 'm' => "id错误，没有找到id！"))); }   
}

function curl($url, $ref = '') {
    $params["ua"] = "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
    $params['ref'] = $ref;
    return GlobalBase::curl($url, $params);
}
