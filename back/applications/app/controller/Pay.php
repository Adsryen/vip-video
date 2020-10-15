<?php
namespace app\app\controller;

use think\Db;
use think\Controller;
class Pay extends Controller
{
    //微信支付
    private $app_id = 'wx7447fd3333e4f60d';//appid和app_secret在开通微信支付后接收到的邮件里面可看到
    private $mch_id = '1510333621';//商户号
    private $makesign = 'woaieshenghuo1234567890woaieshen';//支付的签名，32位签名，微信商户后台设置
    private $app_secret = '94c3493d86b59804d27be23c49f67165';

    private $notify_url='http://www.jixiegege.com/index.php/Home/Pay/confirmpay';// 本控制器下面的 notifyurl  方法的URL路径 记得格式 是 http://......    【这是回调】
    public $error = 0;
    public $orderid =  null;

    public function wxhandle()
    {
        $subject = '测试数据'; //商品描述
        $total_amount = 0.01*100; //金额
        $additional = "test"; ////附加数据
        $order_id = "test123456"; ////订单号
        $nonce_str=MD5($order_id);//随机字符串
        $spbill_create_ip = "112.65.161.211"; //终端ip
        ////以上参数接收不必纠结，按照正常接收就行，相信大家都看得懂

        //$spbill_create_ip = '118.144.37.98'; //终端ip测试
		$trade_type = 'MWEB';//交易类型 具体看API 里面有详细介绍

        $notify_url = 'http://xy.xxx.com/medias/public/index.php/home/Wxh5pay/notify_url'; //回调地址
        $scene_info ='{"h5_info":{"type":"Wap","wap_url":"http://www.123.com","wap_name":"测试支付"}}'; //场景信息
        //对参数按照key=value的格式，并按照参数名ASCII字典序排序生成字符串
        $signA = "appid={$this->app_id}&body=$subject&mch_id={$this->mch_id}&nonce_str=$nonce_str&notify_url=$notify_url&out_trade_no=$order_id
　　　　　　&scene_info=$scene_info&spbill_create_ip={$spbill_create_ip}&total_fee=$total_amount&trade_type=$trade_type";

        $strSignTmp = $signA."&key=$this->makesign"; //拼接字符串

        $sign = strtoupper(MD5($strSignTmp)); // MD5 后转换成大写

        $post_data = "<xml>
                       <appid>$this->app_id</appid>
                       <body>$subject</body>
                       <mch_id>$this->mch_id</mch_id>
                       <nonce_str>$nonce_str</nonce_str>
                       <notify_url>$notify_url</notify_url>
                       <out_trade_no>$order_id</out_trade_no>
                       <scene_info>$scene_info</scene_info>
                       <spbill_create_ip>$spbill_create_ip</spbill_create_ip>
                       <total_fee>$total_amount</total_fee>
                       <trade_type>$trade_type</trade_type>
                       <sign>$sign</sign>
                   </xml>";//拼接成XML 格式

        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";//微信传参地址
        $dataxml = $this->http_post($url,$post_data); //后台POST微信传参地址  同时取得微信返回的参数，http_post方法请看下文
        $objectxml = $dataxml;//(array)simplexml_load_string($dataxml, 'SimpleXMLElement', LIBXML_NOCDATA); //将微信返回的XML 转换成数组
      var_dump($objectxml);exit;
        if($objectxml['return_code'] == 'SUCCESS')  {
            if($objectxml['result_code'] == 'SUCCESS'){//如果这两个都为此状态则返回mweb_url，详情看‘统一下单’接口文档
                var_dump($objectxml['mweb_url']); //mweb_url是微信返回的支付连接要把这个连接分配到前台
            }
            if($objectxml['result_code'] == 'FAIL'){
                return $err_code_des = $objectxml['err_code_des'];
            }
        }
	}

    public function http_post($url, $xml){
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

        //设置header
        curl_setopt($curl, CURLOPT_HEADER, FALSE);

        //要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_POST, TRUE); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        $tmpInfo = curl_exec($curl); // 执行操作

        curl_close($curl); // 关闭CURL会话
        $arr = $this->FromXml($tmpInfo);
        return $arr;
    }
  
  public function FromXml($xml)
    {
        //将XML转为array
        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    }
}