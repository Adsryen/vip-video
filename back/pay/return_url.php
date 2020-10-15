<?php
/* * 
 * 功能：E支付页面跳转同步通知页面
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见epay_notify_class.php中的函数verifyReturn
 */

require_once("epay.config.php");
require_once("lib/epay_notify.class.php");
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
<meta name="apple-mobile-web-app-status-bar-style" content="black"> 
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link href="layer.css?2.0" type="text/css" rel="stylesheet">
<script src="layer.js?2.x"></script>
</head>

<body>
<?php
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
$url = $_SERVER['HTTP_HOST'];
if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号

	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号

	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];

	//支付方式
	$type = $_GET['type'];
	
	$money = $_GET['money'];
	
	$name = $_GET['name'];
  	$array=explode('_',$name);
	
	$u_id=$array[1];
	$name=$array[0];

/*if($u_id){
	
		echo  "<script>layer.open({content:'代理开通成功'});</script>";
		return 'success';
	}*/
    if($_GET['trade_status'] == 'TRADE_SUCCESS') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
    }
    else {
      echo "trade_status=".$_GET['trade_status'];
    }
	$sendUrl = "http://$url/login/login/paykmfx.html";
  
	$smsConf = array(
		'outtrade'   => $out_trade_no,
		'trade'    => $trade_no,
		'type'    => $type,
		'money'    => $money,
		'trade_status'    => $trade_status,
		'name' =>$name,
      	'uid'	=> $u_id
	);
	 
	$content = juhecurl($sendUrl,$smsConf,1); //请求
	 
	if($content){
		$result = json_decode($content,true);
		$error_code = $result['code'];
		if($error_code == 1){
			$msg = $result['msg'];
			echo "<script>layer.open({content:'".$msg."',btn: '复制上方卡密到APP充值，丢失概不负责',shadeClose: false,yes: function(){layer.open({content: '重新获取卡密请刷新页面',time: 2,skin:'msg'}); }});</script>";
		}else{
			echo "失败";
		}
	}else{
		//返回内容异常，以下可根据业务逻辑自行修改
		echo "请求失败";
	}

	//echo "验证成功<br />";

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
    echo "验证失败";
}
function juhecurl($url,$params=false,$ispost=0){
		$httpInfo = array();
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
		curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
		curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
		if( $ispost )
		{
			curl_setopt( $ch , CURLOPT_POST , true );
			curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
			curl_setopt( $ch , CURLOPT_URL , $url );
		}
		else
		{
			if($params){
				curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
			}else{
				curl_setopt( $ch , CURLOPT_URL , $url);
			}
		}
		$response = curl_exec( $ch );
		if ($response === FALSE) {
			//echo "cURL Error: " . curl_error($ch);
			return false;
		}
		$httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
		$httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
		curl_close( $ch );
		return $response;
	}
?>

</body>
</html>