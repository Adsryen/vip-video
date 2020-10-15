<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 2018/12/4
 * Time: 21:32
 */







namespace app\index\controller;
use app\index\validate\price;
use think\Config;
use think\Controller;
use think\Request;






class Common extends Controller
{
    public function _initialize()
    {
        $xzv_64 = session('user');
        if (!$xzv_64) {
            $this->redirect('login/login/index');
        }
    }
    public function common(){
        return view();
    }

    public function epayview(){
        if(Request::instance()->isAjax()){
            if(Request::instance()->has('do')){
                $this->syscl(input('type'));
                return '设定成功！';
            }
            if(input('type')==1){
                $this->extra_wirte(1,input('id'),input('key'),input('url'));
                return '1:设定ok';
            }else{
                $this->extra_wirte(2,input('id'),input('key'),input('url'));
                return '2:设定ok';
            }
        }
        $epay1=Config::get('epay1');
        $epay2=Config::get('epay2');
        return view('common/epayconfig',['epay1'=>$epay1,'epay2'=>$epay2]);
    }

    public function syscl($type){
        $this->epayconfig($type);
    }

    /**
     * @param $type
     * 配置同步器
     */
    protected function epayconfig($type){
        $file_tmp=ROOT_PATH;
        if($type==1){
            $epay=Config::get('epay1');
            $tmp=$file_tmp.'/pay/epay.config.php';
            $this->epaybuilder($tmp,$epay['partner'],$epay['key'],$epay['apiurl']);
        }else{
            $epay=Config::get('epay2');
            $tmp=$file_tmp.'/daili_pay/epay.config.php';
            $this->epaybuilder($tmp,$epay['partner'],$epay['key'],$epay['apiurl']);
        }
    }

    protected function epaybuilder($tmp,$id,$key,$url){

        $str='<?php
//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//商户ID
$alipay_config[\'partner\']		= \''.$id.'\';//商户id
//商户KEY
$alipay_config[\'key\']			= \''.$key.'\';//商户key
//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑
//签名方式 不需修改
$alipay_config[\'sign_type\']    = strtoupper(\'MD5\');

//字符编码格式 目前支持 gbk 或 utf-8
$alipay_config[\'input_charset\']= strtolower(\'utf-8\');

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
$alipay_config[\'transport\']    = \'http\';

//支付API地址
$alipay_config[\'apiurl\']    = \''.$url.'\'; //网关无需改动
?>';
        file_put_contents($tmp,$str);
    }

    /**
     * @param $type
     * @param $id
     * @param $key
     * @param $url
     * 继承同步器
     */
    protected function extra_wirte($type,$id,$key,$url){
        $extra_tmp=APP_PATH.'/extra/';
        if($type==1){
            $str='<?php
/**
 * Created by PhpStorm. IEDUser: admin
 * Powery by 猫腻王子
 * major-> Mobile Application develop Class
 * Date: 2019/3/27 10:03
 */

return[
    \'partner\'=>\''.$id.'\',
    \'key\'=>\''.$key.'\',
    \'apiurl\'=>\''.$url.'\'
];';
            file_put_contents($extra_tmp.'epay1.php',$str);
        }else{
            $str='<?php
/**
 * Created by PhpStorm. IEDUser: admin
 * Powery by 猫腻王子
 * major-> Mobile Application develop Class
 * Date: 2019/3/27 10:03
 */

return[
    \'partner\'=>\''.$id.'\',
    \'key\'=>\''.$key.'\',
    \'apiurl\'=>\''.$url.'\'
];';
            file_put_contents($extra_tmp.'epay2.php',$str);
        }
    }
}