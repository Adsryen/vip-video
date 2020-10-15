<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

function getIP() {
    if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    }
    elseif (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    }
    elseif (getenv('HTTP_X_FORWARDED')) {
        $ip = getenv('HTTP_X_FORWARDED');
    }
    elseif (getenv('HTTP_FORWARDED_FOR')) {
        $ip = getenv('HTTP_FORWARDED_FOR');

    }
    elseif (getenv('HTTP_FORWARDED')) {
        $ip = getenv('HTTP_FORWARDED');
    }
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function getusercount($id)
{
    $count  =   db('user')->where(['parentid'=>$id,'power'=>'1'])->count();
    return $count;
}
function getvipcount($id)
{
    $count  =   db('user')->where(['parentid'=>$id,'power'=>'2'])->count();
    return $count;
}
function getRandomString($len, $chars=null,$type=false)
{
 
    if($type==true)
    {
		$authnum	=	rand('100000','999999');
        $count  =   db('user')->where('share_ma',$authnum)->count();
        if($count>0 || in_array($authnum,['111111','222222','333333','444444','555555','666666','777777','888888','999999','000000','123456','654321']))
        {
            $authnum    =   getRandomString($len,$chars,$type);
        }
    }else{
		srand((double)microtime()*1000000);//create a random number feed.
		$ychar="0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
		$list=explode(",",$ychar);
		$authnum='';
		for($i=0;$i<6;$i++){
			$randnum=rand(0,35); // 10+26;
			$authnum.=$list[$randnum];
		}
	}


    return $authnum;

}

function randstring($len)
{
    $str='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';  
	$randStr = str_shuffle($str);
	$rands= md5(time().$randStr);
    return substr($rands,0,$len);

}
// 应用公共文件
function name()
{
    $id     =   session('user');
    $name   =   db('user')->where('id',$id)->value('username');
    return $name?$name:'无数据';
}
function _name($id)
{
    $name   =   db('user')->where('id',$id)->value('username');
    return $name?$name:'无数据';
}
function sname($id,$name)
{
    $name   =   db('user')->where('id',$id)->value($name);
    return $name?$name:'无数据';
}


function power()
{
    $id     =   session('user');
    $name   =   db('user')->where('id',$id)->value('power');
    if($name=='1')
    {
        return '代理';
    }else{
        return '管理员';
    }
}
function advert($id=null)
{
    if($id!=null)
    {
        $name   =   db('advert')->where('id',$id)->value('content');

    }else{
        $name   =   db('advert')->where('id',1)->value('content');

    }
    return $name;
}

function gui($id)
{
    $name   =   db('user')->where('id',$id)->value('username');
    return $name;
}

function id()
{
    $id     =   session('user');
    
    return $id ;
    
}


function yue()
{
    $id     =   session('user');
    $power  =   session('power');
    if($power=='1')
    {
        $where['id']	=	$id;
    }else{
        $where			=	'';
        return 	'';
    }
    $name   =   db('user')->where($where)->value('money');
    return '剩余提卡点数:'.$name;
}

function share()
{
    $id     =   session('user');
    $power  =   session('power');
    if($power=='1')
    {
        $where['id']	=	$id;
    }else{
        $where			=	'';
        return 	'';
    }
    $name   =   db('user')->where($where)->value('share_ma');
    return '分享码:'.$name;
}

error_reporting(0);
function getTopDomainhuo(){
	$url   = $_SERVER['HTTP_HOST'];
    $data = explode('.', $url);
    $co_ta = count($data);
    //判断是否是双后缀
    $zi_tow = true;
    $host_cn = 'com.cn,net.cn,org.cn,gov.cn';
    $host_cn = explode(',', $host_cn);
    foreach($host_cn as $host){
        if(strpos($url,$host)){
            $zi_tow = false;
        }
    }
    //如果是返回FALSE ，如果不是返回true
    if($zi_tow == true){
        $host = $data[$co_ta-2].'.'.$data[$co_ta-1];
    }else{
        $host = $data[$co_ta-3].'.'.$data[$co_ta-2].'.'.$data[$co_ta-1];
    }
  return $host;
/*搭建最新影视APP加QQ：1558310060*/
}