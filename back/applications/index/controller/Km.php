<?php
/**
 * Created by PhpStorm. IEDUser: admin
 * Powery by 猫腻王子
 * major-> Mobile Application develop Class
 * Date: 2019/3/27 12:21
 */

namespace app\index\controller;


use app\index\validate\price;
use think\Config;
use think\Controller;
use think\Request;

class Km extends Controller
{

    public function _initialize()
    {
        $xzv_64 = session('user');
        if (!$xzv_64) {
            $this->redirect('login/login/index');
        }
    }

    public function kmprice(){
        if(session('power')!=0){
            return '只有管理员有权限';
        }
        $price=Config::get('kmprice');
        if(Request::instance()->isAjax()){
           $v=new price();
            if(!$v->check(input('post.'))){
                return $v->getError();
            }
            $data='<?php
/**
 * Created by PhpStorm. IEDUser: admin
 * Powery by 猫腻王子
 * major-> Mobile Application develop Class
 * Date: 2019/3/27 11:27
 */
return[
    \'zhou\'=>'.input('zhou').',
    \'yue\'=>'.input('yue').',
    \'ji\'=>'.input('ji').',
    \'ban\'=>'.input('ban').',
    \'nian\'=>'.input('nian').',
    \'zhong\'=>'.input('zhong').'
];';
            file_put_contents(APP_PATH.'/extra/kmprice.php',$data);
            return '价格修改成功';
        }
        $this->assign('price',$price);
        return view('common/kmprice');
    }

}