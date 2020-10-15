<?php
namespace app\login\controller;

use app\XDeode;
use think\Controller;
class Login extends Controller
{
    public function index()
    {      	
        return view('index');
    }
  

  
    public function shoplist(){
        if(!input('spid')){
          $list = db('shop')->order('id asc')->select();
          if($list){
            $code = 1;
          }else{
            $code = 0;
          }
        }else{
          $list = db('shop')->where('id',input('spid'))->order('id asc')->select();
          if($list){
            $code = 1;
          }else{
            $code = 0;
          }
        }
      //	 
      	return json(['code'=>$code,'shop'=>$list]);
    }
  
  	public function shopxx(){
    	$id = input('spid');
      	$list = db('shop')->where('id',$id)->order('id asc')->find();
      	$arr['picurl'] = $list['picurl'];
      	$arr['title'] = $list['title'];
      	$arr['money'] = $list['money'];
      	return json(['code'=>1,'msg'=>$arr]);
    }
  
  	public function shopxd(){
      $data = input();
      $user['username'] = $data['username'];
      $user['password'] = md5(sha1($data['password']));
      $user['id']		= $data['userid'];

      $username = db('user')->where($user)->find();
      if(!$username){
        return json(['code'=>0,'msg'=>'登陆失败,账号密码不正确!']);die;
      }
      //输出商品信息
      $shop = db('shop')->where('id',input('spid'))->find();
      //判断用户积分是否足够扣款
      if($shop['money']>$username['sign']){
      	return json(['code'=>2,'msg'=>'购买失败,余额不足!']);die;
      }
      //判断收货地址是否为空
      if(input('shdz')==''){
      	return json(['code'=>2,'msg'=>'购买失败,收获地址不得为空!']);die;
      }
      $sign['sign'] = $username['sign'] - $shop['money'];
      if(db('user')->where('id',input('userid'))->update($sign)){
        $insert['uid']	=	$user['id'];
        $insert['oderid'] =   date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        $insert['money']  = $shop['money'];
        $insert['spid']	=	input('spid');
        $insert['time']	=	date('Y-m-d H:i:s');
        $insert['type']	=	1;//1为未发货
        $insert['dizhi']	=	input('shdz');
        $insert['picurl']	=	$shop['picurl'];
        $insert['title']	=	$shop['title'];
        $dingdan = db('shopdingdan')->insert($insert);//生成订单
        if($dingdan){
          return json(['code'=>1,'msg'=>'购买成功!']);die;
        }
      }
     
    }
  
  	public function dingdanlist(){
    	$list = db('shopdingdan')->where('uid',input('userid'))->order('id asc')->select();
      	return json(['code'=>1,'list'=>$list]);
    }
  
  
    public function openjl(){
      $data = input();
      $insert['uid']	=	$data['uid'];
      $insert['time']	=	date('Y-m-d');
      db('opentj')->insert($insert);

    }
  
  	public function qiandao(){
    	$data = input();
      	$id = $data['uid'];
      	if($id == ''){
        	return json(['code'=>1,'msg'=>'请先登陆!']);
        }
      	//随机生成1-30的数字
      	$s = rand(1, 30 );
        $user = db('user')->where('id',$id)->find();
        $time = date('Ymd');
      	if($time == $user['qiandaotime']){
        	return json(['code'=>1,'msg'=>'今天已签到']);
        }
      	$update['sign'] = $user['sign'] + $s;
      	$update['qiandaotime'] = date('Ymd');
      	if(db('user')->where('id',$id)->update($update)){
        	return json(['code'=>1,'msg'=>'签到成功,获得积分'.$s.'个!']);
        }else{
        	return json(['code'=>1,'msg'=>'签到失败']);
        }

    }
  
    public function ping()
    {
        $_var_0 = db('ping')->order('orderid asc')->select();
        $_var_1 = new XDeode(10, '6666.6666666');
        $_var_2 = new XDeode(10, '8888.8888888');
        $_var_3 = new XDeode(10, '9999.9999999');
        $_var_4['code'] = 1;
        $_var_4['key'] = $_var_1->encode(time());
        $_var_5 = input('uid');
        if ($_var_5) {
            $_var_6 = db('user')->where('id', $_var_5)->count();
            if ($_var_6 == '0') {
                return json(['code' => 0, 'msg' => '用户不存在']);
            }
            db('user')->where('id', $_var_5)->update(['key' => $_var_4['key']]);
        }
        $_var_4['run'] = $_var_5 ? $_var_3->encode($_var_5) : '';
        foreach ($_var_0 as $_var_7 => $_var_8) {
            unset($_var_9);
            unset($_var_10);
            unset($_var_10);
            $_var_0[$_var_7]['id'] = $_var_2->encode($_var_8['id']);
            $_var_10 = iconv('UTF-8', 'gb2312', ROOT_PATH . 'readtxt/' . $_var_8['name'] . '.txt');
            if (is_file($_var_10)) {
                $_var_11 = file_get_contents($_var_10);
                if ($_var_11) {
                    $_var_12 = @mb_convert_encoding($_var_11, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
                    $_var_13 = explode('
', $_var_12);
                    $_var_9 = [];
                    for ($_var_14 = 0; $_var_14 < count($_var_13); $_var_14++) {
                        $_var_9[] = explode('|', $_var_13[$_var_14]);
                    }
                    $_var_0[$_var_7]['count'] = count($_var_9) - 1;
                } else {
                    $_var_0[$_var_7]['count'] = 0;
                }
                unset($_var_9);
            } else {
                $_var_0[$_var_7]['count'] = 0;
            }
        }
        $_var_4['list'] = $_var_0;
        return json($_var_4);
    }
    public function video()
    {
        if (!input('page')) {
            $_var_15 = 1;
        } else {
            $_var_15 = input('page');
        }
        if (!input('limit')) {
            $_var_16 = 10;
        } else {
            $_var_16 = input('limit');
        }
        $_var_17 = db('video')->page($_var_15)->limit($_var_16)->order('id desc')->select();
        if ($_var_17) {
            $_var_18['code'] = 1;
            $_var_18['msg'] = $_var_17;
        } else {
            $_var_18['code'] = 0;
        }
        return json($_var_18);
    }
    public function audio()
    {
        if (!input('page')) {
            $_var_19 = 1;
        } else {
            $_var_19 = input('page');
        }
        if (!input('limit')) {
            $_var_20 = 10;
        } else {
            $_var_20 = input('limit');
        }
        $_var_21 = db('audio')->page($_var_19)->limit($_var_20)->order('id desc')->select();
        if ($_var_21) {
            $_var_22['code'] = 1;
            $_var_22['msg'] = $_var_21;
        } else {
            $_var_22['code'] = 0;
        }
        return json($_var_22);
    }
    public function share()
    {
        $_var_23 = input('uid');
        $_var_24 = input('uid');
        $_var_25 = db('user')->where('id', $_var_23)->count();
        if ($_var_25 == '0') {
            return json(['code' => 0, 'msg' => '用户不存在']);
        }
        header('Content-Type:text/html;charset=UTF-8');
        $_var_26 = 'http://959495.xyz';
        $_var_27 = $_var_26 . '/app/index/qudao.html?uid=' . base64_encode($_var_23);
        if ($_var_25 > 0) {
            $_var_28 = $this->getIP();
            $_var_29 = db('share')->where('ip', $_var_28)->count();
            if ($_var_29 == '0') {
                db('user')->where('id', $_var_24)->setInc('sign');
                db('share')->insert(['uid' => $_var_24, 'ip' => $_var_28]);
            }
            $_var_30 = db('user')->where('id', $_var_24)->find();
            if ($_var_30['power'] == '2') {
                $_var_31 = db('user')->where('id', $_var_30['parentid'])->value('share_ma');
            } else {
                $_var_31 = $_var_30['share_ma'];
            }
        } else {
            $_var_31 = db('user')->where('power', '0')->value('share_ma');
        }
        return json(['code' => 1, 'msg' => $_var_27, 'sign' => advert('4'), 'share' => $_var_31]);
    }
    public function banner()
    {
        $_var_32['zad1'] = advert('20');
        $_var_33 = db('banner')->select();
        if ($_var_33) {
            $_var_34 = '1';
        } else {
            $_var_34 = '0';
        }
        return json(['code' => $_var_34, 'msg' => $_var_33]);
    }
    public function fxlunbo()
    {
        $_var_35 = db('fxlunbo')->select();
        if ($_var_35) {
            $_var_36 = '1';
        } else {
            $_var_36 = '0';
        }
        return json(['code' => $_var_36, 'msg' => $_var_35]);
    }
    public function newjilu()
    {
        if (input('uid')) {
            $_var_37['uid'] = input('uid');
            $_var_38 = db('jilu')->where($_var_37)->order('id desc')->select();
            if ($_var_38) {
                return json(['code' => 1, 'msg' => $_var_38]);
            } else {
                return json(['code' => 0, 'msg' => '什么也没有哦']);
            }
        }
    }
    public function jilu()
    {
        $_var_39 = input();
        if ($_var_39) {
            $_var_40['uid'] = $_var_39['uid'];
            $_var_40['title'] = $_var_39['title'];
            $_var_40['url'] = $_var_39['url'];
            $_var_40['time'] = time();
            $_var_40['ping'] = $_var_39['ping'];
            db('jilu')->insert($_var_40);
            return json(['code' => 1]);
        }
    }
    public function deljilu()
    {
        if (input('uid')) {
            $_var_41['uid'] = input('uid');
            db('jilu')->where($_var_41)->delete();
            return json(['code' => 1]);
        }
    }
    public function tvlist()
    {
        $_var_42 = db('tv')->select();
        if ($_var_42) {
            $_var_43 = '1';
        } else {
            $_var_43 = '0';
        }
        return json(['code' => $_var_43, 'msg' => $_var_42]);
    }
    public function vlist()
    {
        $_var_44 = db('video')->select();
        if ($_var_44) {
            $_var_45 = '1';
        } else {
            $_var_45 = '0';
        }
        return json(['code' => $_var_45, 'msg' => $_var_44]);
    }
    public function mnlistQuan()
    {
        $_var_46 = db('mn')->select();
        if ($_var_46) {
            $_var_47 = '1';
        } else {
            $_var_47 = '0';
        }
        return json(['code' => $_var_47, 'msg' => $_var_46]);
    }
    public function mnlistRandom()
    {
        $_var_48 = db('mn')->limit(12)->order('rand()')->select();
        if ($_var_48) {
            $_var_49 = '1';
        } else {
            $_var_49 = '0';
        }
        return json(['code' => $_var_49, 'msg' => $_var_48]);
    }
    public function tjlist()
    {
        $_var_50 = db('tuijian')->select();
        if ($_var_50) {
            $_var_51 = '1';
        } else {
            $_var_51 = '0';
        }
        return json(['code' => $_var_51, 'msg' => $_var_50]);
    }
    public function zhibozb()
    {
        $_var_52 = db('zhibo')->select();
        if ($_var_52) {
            $_var_53 = '1';
        } else {
            $_var_53 = '0';
        }
        return json(['code' => $_var_53, 'msg' => $_var_52]);
    }
    public function exchange()
    {
        $_var_54 = input('uid');
        $_var_55 = floor(input('share'));
        if ($_var_55 % advert('4') != '0' || $_var_55 <= 0) {
            return json(['code' => 0, 'msg' => '消耗积分参数不正确']);
        }
        $_var_56 = db('user')->where('id', $_var_54)->find();
        if (!$_var_56) {
            return json(['code' => 0, 'msg' => '用户不存在']);
        }
        if ($_var_56['power'] == '0' || $_var_56['type'] == '1') {
            return json(['code' => 0, 'msg' => '您已经是永久会员，兑换失败']);
        } else {
            if ($_var_55 > $_var_56['sign']) {
                return json(['code' => 0, 'msg' => '您的积分不够']);
            } else {
                $_var_57 = $_var_56['sign'];
                $_var_58 = $_var_55 / advert('4');
                $_var_59 = 60 * 60 * 24 * $_var_58;
                $_var_56 = db('user')->where('id=' . $_var_54)->value('lasttime');
                if ($_var_56 < time()) {
                    db('user')->where('id=' . $_var_54)->update(['lasttime' => time() + $_var_59]);
                } else {
                    db('user')->where('id=' . $_var_54)->update(['lasttime' => $_var_56 + $_var_59]);
                }
                db('user')->where('id=' . $_var_54)->update(['sign' => $_var_57 - $_var_55]);
                return json(['code' => 1, 'msg' => '兑换成功', 'time' => db('user')->where('id=' . $_var_54)->value('lasttime')]);
            }
        }
    }
  

  
  
    public function veify()
    {
        $_var_60 = input();
        $where['status'] = 1;
      	$where['username'] = input('username');
      	$where['password'] = md5(sha1(input('passwd')));
      	$where['power'] = ['in',[0,1,-1]];
     // var_dump($where);die;
        $_var_60 = db('user')->where($where)->find();

        if ($_var_60) {
            session('power', $_var_60['power']);
            session('user', $_var_60['id']);
            return json(['code' => '1']);
        } else {
            return json(['code' => '0']);
        }
    }
    public function dianka()
    {
        $_var_62 = input();
        if (!empty($_var_62['uid']) && !empty($_var_62['dianka'])) {
            $_var_63 = db('user')->where('id', $_var_62['uid'])->count();
            if ($_var_63 == '0') {
                return json(['code' => 0, 'msg' => '用户不存在']);
            }
            $_var_64 = db('dianka')->where('dianka', $_var_62['dianka'])->find();
            if (!$_var_64) {
                return json(['code' => 0, 'msg' => '卡号错误']);
            }
            if ($_var_64['y'] == '1') {
                return json(['code' => 0, 'msg' => '点卡已使用']);
            }
            $_var_65 = db('user')->where('id', $_var_62['uid'])->find();
            if ($_var_65['power'] == '0' || $_var_65['type'] == '1') {
                return json(['code' => 0, 'msg' => '您已是永久会员']);
            }
            $_var_66['kami'] = $_var_62['dianka'];
            $_var_67 = db('pay')->where($_var_66)->find();
            if ($_var_67) {
                db('pay')->where('kami', $_var_62['dianka'])->update(['cid' => $_var_62['uid']]);
            } else {
            }
            if ($_var_64['type'] == '1') {
                db('user')->where('id', $_var_62['uid'])->update(['type' => '1','kamioff'=>'1']);
                db('dianka')->where('dianka', $_var_62['dianka'])->update(['y' => '1', 'yid' => $_var_62['uid'], 'stime' => time()]);
                $_var_68 = '-1';
            }elseif($_var_64['type'] == '2'){
                if ($_var_65['lasttime'] > time()) {
                    db('user')->where('id', $_var_62['uid'])->update(['lasttime' => $_var_65['lasttime'] + $_var_64['time'],'power'=>'-1','kamioff'=>'1']);
                } else {
                    db('user')->where('id', $_var_62['uid'])->update(['lasttime' => time() + $_var_64['time'],'kamioff'=>'1']);
                }
                db('dianka')->where('dianka', $_var_62['dianka'])->update(['y' => '1', 'yid' => $_var_62['uid'], 'stime' => time()]);
                $_var_68 = db('user')->where('id', $_var_62['uid'])->value('lasttime');
            
            } else {
                if ($_var_65['lasttime'] > time()) {
                    db('user')->where('id', $_var_62['uid'])->update(['lasttime' => $_var_65['lasttime'] + $_var_64['time'],'kamioff'=>'1']);
                } else {
                    db('user')->where('id', $_var_62['uid'])->update(['lasttime' => time() + $_var_64['time'],'kamioff'=>'1']);
                }
                db('dianka')->where('dianka', $_var_62['dianka'])->update(['y' => '1', 'yid' => $_var_62['uid'], 'stime' => time()]);
                $_var_68 = db('user')->where('id', $_var_62['uid'])->value('lasttime');
            }
            return json(['code' => '1', 'msg' => '充值成功', 'lasttime' => $_var_68]);
        } else {
            return json(['code' => '0', 'msg' => '参数缺失']);
        }
    }
    function getIP()
    {
        if (getenv('HTTP_CLIENT_IP')) {
            $_var_69 = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $_var_69 = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $_var_69 = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $_var_69 = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $_var_69 = getenv('HTTP_FORWARDED');
        } else {
            $_var_69 = $_SERVER['REMOTE_ADDR'];
        }
        return $_var_69;
    }
    public function zce()
    {
        $_var_70 = input();
        $_var_71['phone'] = $_var_70['phone'];
        $_var_71['sid'] = $_var_70['sid'];
        $_var_71['uid'] = $_var_70['uid'];
        $_var_71['code'] = $_var_70['code'];
        $_var_72 = db('zce')->where('phone', $_var_70['phone'])->count();
        if ($_var_72 > 0) {
            return jsonp(['code' => 0, 'msg' => '手机号码已领取，请下载APP查看']);
        } else {
            db('zce')->insert($_var_71);
            return jsonp(['code' => 1]);
        }
    }
	
		public function money()
    {
        $id = input('id');
        $arr = implode(',', array_filter(explode(',', $id)));

                $idarr  =    array_filter(explode(',', input('id')));

                $data       =   [];
                
                    $data['uid']    =   session('user');
                    $data['ctime']  =   time();
                
                    $data['money']  =   input('money');;
      				$money = db('user')->where('id=' . session('user'))->value('money'); 
					db('user')->where('id in ('.$arr.')')->update(['money'=> $money+input('money')]);
                    db('moneylog')->insert($data);
                return "<script>alert(\"充值成功！请返回代理后台查看！\");window.close();</script>";
                return json(['code'=>'1']);
 }

	

  
  
    public function paykmfx()
    {
        $_var_73 = input();
        $_var_74['outtrade'] = $_var_73['outtrade'];
        $_var_74['trade'] = $_var_73['trade'];
        $_var_74['type'] = $_var_73['type'];
        $_var_74['money'] = $_var_73['money'];
        $_var_74['trade_status'] = $_var_73['trade_status'];
        $_var_74['name'] = $_var_73['name'];
        $_var_74['time'] = time();
      	$_var_74['uid'] = $_var_73['uid'];
        $_var_75['outtrade'] = $_var_73['outtrade'];
        if ($_var_75) {
            $_var_76 = db('pay')->where($_var_75)->find();
            if ($_var_76['outtrade'] == $_var_73['outtrade']) {
                return json(['code' => 1, 'msg' => $_var_76['kami']]);
            }
        }
      	$tkmoney = db('kamifx')->where('id',1)->find();
      
        if ($_var_73['money'] == $tkmoney['qitian'] || $_var_73['money'] == $tkmoney['yigeyue'] || $_var_73['money'] == $tkmoney['sangeyue'] || $_var_73['money'] == $tkmoney['liugeyue'] || $_var_73['money'] == $tkmoney['yinian'] || $_var_73['money'] == $tkmoney['yongjiu']) {
        } else {
            return json(['code' => 1, 'msg' => '订单支付金额有误，请联系客服处理']);
        }
      
        if ($_var_73['trade_status'] != 'TRADE_SUCCESS') {
            return json(['code' => 0, 'msg' => '支付未完成']);
        }
      
      //卡密分销开始
      
      	//输出当前用户信息
      	$user = db('user')->where('id',input('uid'))->find();
      	//查询是否有上级
      	if($user['parentid']!=1 and $user['parentid']!=0){
          //查询当前购买的是什么卡密
          if(input('money')==$tkmoney['qitian']){
			$kmlx = 'qitian';
          }
          if(input('money')==$tkmoney['yigeyue']){
			$kmlx = 'yigeyue';
          }
          if(input('money')==$tkmoney['sangeyue']){
			$kmlx = 'sangeyue';
          }
          if(input('money')==$tkmoney['liugeyue']){
			$kmlx = 'liugeyue';
          }
          if(input('money')==$tkmoney['yinian']){
			$kmlx = 'yinian';
          }
          if(input('money')==$tkmoney['yongjiu']){
			$kmlx = 'yongjiu';
          }
          //查询上级级别
          $sid = $user['parentid'];
          $yj1 = db('user')->where('id',$sid)->find();
          if($yj1['power']==1){ //如果上级级别是合伙人
		  	$hhr1 = db('kamifx')->where('id',5)->find();//查询一级合伙人分成金额
            kmtcjilu('一级卡密提成',input('uid'),$sid,$_var_73['outtrade'],$hhr1[''.$kmlx.'']);
            kmtc($sid,$hhr1[''.$kmlx.'']);
          }elseif($yj1['power']==-1){ //如果上级级别是代理会员
            $dl1 = db('kamifx')->where('id',2)->find();//查询一级代理分成金额
            kmtcjilu('一级卡密提成',input('uid'),$sid,$_var_73['outtrade'],$dl1[''.$kmlx.'']);
            kmtc($sid,$dl1[''.$kmlx.'']);
          }
          //查询是否有二级上级
          if($yj1['parentid']!=1 and $yj1['parentid']!=0){
          	$ejid = $yj1['parentid'];
            $ej1 = db('user')->where('id',$ejid)->find();
            if($ej1['power']==1){ //如果二级上级级别是合伙人
		  		$hhr2 = db('kamifx')->where('id',6)->find();//查询二级合伙人分成金额
            	kmtcjilu('二级卡密提成',$sid,$ejid,$_var_73['outtrade'],$hhr2[''.$kmlx.'']);
              	kmtc($ejid,$hhr2[''.$kmlx.'']);
            }elseif($ej1['power']==-1){ //如果二级上级级别是代理会员
              	$dl2 = db('kamifx')->where('id',3)->find();//查询二级代理分成金额
              	kmtcjilu('二级卡密提成',$sid,$ejid,$_var_73['outtrade'],$dl2[''.$kmlx.'']);
              	kmtc($ejid,$dl2[''.$kmlx.'']);
            }
            //查询是否有三级上级
            $sjid = $ej1['parentid'];
            $sj1 = db('user')->where('id',$sjid)->find();
            if($sj1['power']==1){ //如果三级上级级别是合伙人
		  		$hhr3 = db('kamifx')->where('id',7)->find();//查询三级合伙人分成金额
            	kmtcjilu('三级卡密提成',$ejid,$sjid,$_var_73['outtrade'],$hhr3[''.$kmlx.'']);
              	kmtc($sjid,$hhr3[''.$kmlx.'']);
            }elseif($sj1['power']==-1){ //如果三级上级级别是代理会员
              	$dl3 = db('kamifx')->where('id',4)->find();//查询三级代理分成金额
              	kmtcjilu('三级卡密提成',$ejid,$sjid,$_var_73['outtrade'],$dl3[''.$kmlx.'']);
              	kmtc($sjid,$dl3[''.$kmlx.'']);
            }
          }
        
        }
      
      //卡密三级分销结束
      
        if ($_var_73['money'] == $tkmoney['qitian']) {
            $_var_77 = 1;
        }
        if ($_var_73['money'] == $tkmoney['yigeyue']) {
            $_var_77 = 4;
        }
        if ($_var_73['money'] == $tkmoney['sangeyue']) {
            $_var_77 = 10;
        }
        if ($_var_73['money'] == $tkmoney['liugeyue']) {
            $_var_77 = 18;
        }
        if ($_var_73['money'] == $tkmoney['yinian']) {
            $_var_77 = 30;
        }
        if ($_var_73['money'] == $tkmoney['yongjiu']) {
            $_var_77 = 88;
        }
        $_var_78 = '0';
        switch ($_var_77) {
            case 7:
                $_var_79 = 7 * 60 * 60 * 24;
                $_var_80 = '七天';
                break;
            case 30:
                $_var_79 = 30 * 60 * 60 * 24;
                $_var_80 = '一个月';
                break;
            case 90:
                $_var_79 = 90 * 60 * 60 * 24;
                $_var_80 = '三个月';
                break;
            case 180:
                $_var_79 = 180 * 60 * 60 * 24;
                $_var_80 = '六个月';
                break;
            case 365:
            	$_var_78 = 2;
                $_var_79 = 365 * 60 * 60 * 24;
                $_var_80 = '一年';
                break;
            case 999:
                $_var_78 = 1;
                $_var_79 = 0;
                $_var_80 = '永久';
                break;
        }
        $_var_81 = randstring(8);
        $_var_82['uid'] = 1;
        $_var_82['dianka'] = $_var_81;
        $_var_82['ctime'] = time();
        $_var_82['y'] = 0;
        $_var_82['yid'] = '';
        $_var_82['time'] = $_var_79;
        $_var_82['type'] = $_var_78;
        $_var_82['name'] = $_var_80;
        if ($_var_73) {
            $_var_74['kami'] = $_var_81;
            db('pay')->insert($_var_74);
        }
        db('dianka')->insert($_var_82);
        return json(['code' => 1, 'msg' => $_var_81]);
    }
    public function tongji()
    {
        $_var_83 = input();
        if ($_var_83) {
            $_var_84['os'] = $_var_83['os'];
            $_var_84['imei'] = $_var_83['imei'];
            $_var_84['uid'] = $_var_83['uid'];
            $_var_84['time'] = time();
            db('tongji')->insert($_var_84);
            return json(['code' => 1]);
        }
    }
    public function create()
    {
        $_var_85 = input();
        $_var_86['ip'] = $this->getIP();
        $_var_86['day'] = date('Y-m-d');
        $_var_87 = db('count')->where($_var_86)->value('count');
        if ($_var_87 >= 5) {
            return json(['code' => 0, 'msg' => '注册数量超过当天限制']);
        }
        $_var_88['phone'] = $_var_85['name'];
        $_var_89 = db('zce')->where($_var_88)->find();
        if ($_var_89) {
            $_var_85['share_ma'] = $_var_89['code'];
        } else {
            $_var_85['share_ma'] = '000001';
        }
        $_var_90 = db('user')->where('share_ma', $_var_85['share_ma'])->value('id');
        if (!$_var_90) {
            $_var_90 = 1;
        }
        $_var_91 = $_var_90;
        $_var_92['username'] = $_var_85['name'];
        $_var_92['password'] = md5(sha1($_var_85['password']));
        $_var_92['phone'] = input('phone', '');
        $_var_92['power'] = '2';
        $_var_92['status'] = '1';
        $_var_92['parentid'] = $_var_91;
        $_var_92['ctime'] = time();
        $_var_92['logintime'] = '0';
        $_var_92['lasttime'] = time() + advert('5') * 60;
        $_var_92['money'] = '0.00';
		$_var_92['url5'] = 'http://959495.xyz/pay/?name=七天&fee=1';
		$_var_92['url1'] = 'http://959495.xyz/pay/?name=一个月&fee=5';
		$_var_92['url2'] = 'http://959495.xyz/pay/?name=三个月&fee=15';
		$_var_92['url6'] = 'http://959495.xyz/pay/?name=六个月&fee=25';
		$_var_92['url3'] = 'http://959495.xyz/pay/?name=一年&fee=35';
		$_var_92['url4'] = 'http://959495.xyz/pay/?name=永久&fee=50';
		$_var_93 = db('user')->where('username', $_var_85['name'])->count();
        if ($_var_93 > 0) {
            return json(['code' => 0, 'msg' => '账户已存在']);
        }
        if (db('user')->insert($_var_92)) {
            if ($_var_87 == '') {
                db('count')->insert(['day' => date('Y-m-d'), 'count' => 1, 'ip' => $this->getIP()]);
            } else {
                if ($_var_87 == '1') {
                    db('count')->where('ip="' . $this->getIP() . '" and day="' . date('Y-m-d') . '"')->update(['count' => 2]);
                }
            }
            return json(['code' => 1, 'msg' => '注册成功']);
        } else {
            return json(['code' => 0, 'msg' => '注册失败']);
        }
    }
    public function update()
    {
        $_var_94 = input();
        $_var_95['id'] = $_var_94['uid'];
        $_var_96 = db('user')->where($_var_95)->count();
        if ($_var_96 == '0') {
            return json(['code' => 0, 'msg' => '用户不存在']);
        }
        $_var_95['password'] = md5(sha1($_var_94['old']));
        $_var_97 = db('user')->where($_var_95)->count();
        if ($_var_97 == '0') {
            return json(['code' => 0, 'msg' => '原密码不正确']);
        }
        if ($_var_94['password']) {
            $_var_98['password'] = md5(sha1($_var_94['password']));
            $_var_99 = db('user')->where('id', input('uid'))->value('password');
            if ($_var_99 != md5(sha1(input('password')))) {
                db('pass_log')->insert(['ip' => getIP(), 'ctime' => time(), 'uid' => input('uid'), 'aid' => input('uid'), 'old_pass' => $_var_99, 'pass' => md5(sha1(input('password'))), 'web' => 1]);
            }
            db('user')->where('id', $_var_94['uid'])->update($_var_98);
        }
        return json(['code' => 1, 'msg' => '修改成功']);
    }
    public function repass()
    {
        $_var_100 = input();
        $_var_101['username'] = $_var_100['username'];
        $_var_102 = db('user')->where($_var_101)->count();
        if ($_var_102 == '0') {
            return json(['code' => 0, 'msg' => '用户不存在']);
        }
        $_var_103 = db('user')->where($_var_101)->find();
        if ($_var_103['key'] != $_var_100['key']) {
            return json(['code' => 0, 'msg' => '验证码不正确！请重新获取']);
        }
        if ($_var_100['password']) {
            $_var_104['password'] = md5(sha1($_var_100['password']));
            $_var_104['key'] = md5(time());
            $_var_105 = db('user')->where('username', input('username'))->value('password');
            if ($_var_105 != md5(sha1(input('password')))) {
                db('pass_log')->insert(['ip' => getIP(), 'ctime' => time(), 'uid' => input('username'), 'aid' => input('username'), 'old_pass' => $_var_105, 'pass' => md5(sha1(input('password'))), 'web' => 1]);
            }
            db('user')->where('username', $_var_100['username'])->update($_var_104);
        }
        return json(['code' => 1, 'msg' => '修改成功!请重新登陆']);
    }
    public function veifys()
    {
        $_var_106 = input();
        $_var_107['imei'] = input('imei');
        $_var_108['username'] = $_var_106['username'];
        $_var_108['password'] = md5(sha1($_var_106['passwd']));
        $_var_106 = db('user')->where($_var_108)->find();
        $_var_109 = db('user')->where('id', $_var_106['parentid'])->find();
      	$gl = db('user')->where('id',1)->find();
        if ($_var_106['power'] == '0' || $_var_106['type'] == '1') {
            $_var_110['time'] = '-1';
        } else {
            $_var_110['time'] = $_var_106['lasttime'];
        }
        $_var_110['id'] = $_var_106['id'];
        $_var_110['power'] = $_var_106['power'];
        $_var_110['share'] = $_var_106['sign'];
        $_var_110['url'] = $gl['url'];
        $_var_110['url1'] = $gl['url1'];
        $_var_110['url2'] = $gl['url2'];
        $_var_110['url3'] = $gl['url3'];
        $_var_110['url4'] = $gl['url4'];
        $_var_110['url5'] = $gl['url5'];
        $_var_110['url6'] = $gl['url6'];
      	$_var_110['kamioff'] = $_var_106['kamioff'];
        $_var_110['advert'] = advert('7');
        $_var_110['code'] = base64_encode(time());
        $_var_110['weichat'] = db('user')->where('id', $_var_106['parentid'])->value('weichat');
        db('user')->where('id', $_var_106['id'])->setInc('count', 1);
        db('user')->where('id', $_var_106['id'])->update(['logintime' => time()]);
        if ($_var_106) {
            db('user')->where('username', $_var_106['username'])->update($_var_107);
            return json(['code' => '1', 'msg' => $_var_110]);
        } else {
            return json(['code' => '0']);
        }
    }
    public function yzcode()
    {
        $_var_111 = input();
        $_var_112['key'] = input('key');
        $_var_113['username'] = $_var_111['username'];
        $_var_114 = db('user')->where($_var_113)->count();
        if ($_var_114 == '0') {
            return json(['code' => 0, 'msg' => '用户不存在']);
        }
        if ($_var_111) {
            db('user')->where('username', $_var_111['username'])->update($_var_112);
            return json(['code' => 1, 'msg' => '成功']);
        }
    }
    public function imei()
    {
        $_var_115 = input();
        $_var_116['id'] = $_var_115['uid'];
        $_var_117 = db('user')->where($_var_116)->find();
        $_var_118['imei'] = $_var_117['imei'];
        $_var_118['pic'] = advert('2');
        $_var_118['picurl'] = advert('3');
        $_var_118['advert'] = advert('7');
        $_var_118['hburl'] = advert('13');
        $_var_118['url1'] = advert('6');
        $_var_118['url2'] = advert('8');
        $_var_118['url3'] = advert('9');
        $_var_118['url4'] = advert('10');
        $_var_118['url5'] = advert('11');
        $_var_118['url6'] = advert('12');
        $_var_118['url7'] = advert('13');
        $_var_118['url8'] = advert('14');
        $_var_118['url9'] = advert('15');
        $_var_118['url10'] = advert('16');
        return json(['code' => '1', 'msg' => $_var_118]);
        if ($_var_117) {
            return json(['code' => '1', 'msg' => $_var_118]);
        } else {
            return json(['code' => '1', 'msg' => $_var_118]);
        }
    }
    public function imgad()
    {
        $_var_119['pic'] = advert('2');
        $_var_119['picurl'] = advert('3');
        $_var_119['fxpic1'] = advert('14');
        $_var_119['fxurl1'] = advert('15');
        $_var_119['fxpic2'] = advert('16');
        $_var_119['fxurl2'] = advert('17');
        $_var_119['fxpic3'] = advert('29');
        $_var_119['fxurl3'] = advert('30');
        $_var_119['fxpic4'] = advert('31');
        $_var_119['fxurl4'] = advert('32');
        $_var_119['fxpic5'] = advert('33');
        $_var_119['fxurl5'] = advert('34');
        $_var_119['fxpic6'] = advert('35');
        $_var_119['fxurl6'] = advert('36');
        $_var_119['fxpic7'] = advert('37');
        $_var_119['fxurl7'] = advert('38');
        $_var_119['fxpic8'] = advert('39');
        $_var_119['fxurl8'] = advert('40');
        $_var_119['fxpic9'] = advert('41');
        $_var_119['fxurl9'] = advert('42');
        $_var_119['fxpic10'] = advert('43');
        $_var_119['fxurl10'] = advert('44');
        $_var_119['fxpic11'] = advert('45');
        $_var_119['fxurl11'] = advert('46');
        $_var_119['fxpic12'] = advert('47');
        $_var_119['fxurl12'] = advert('48');
        return json(['code' => '1', 'msg' => $_var_119]);
    }
    public function imgadd()
    {
        $_var_120['pic'] = advert('27');
        $_var_120['picurl'] = advert('28');
        return json(['code' => '1', 'msg' => $_var_120]);
    }
    public function showfx()
    {
        $_var_121 = db('fxbn')->select();
        $_var_122 = db('fxtb')->select();
        $_var_123 = db('fxad')->select();
        if ($_var_121) {
            $_var_124 = '1';
        } else {
            $_var_124 = '0';
        }
        return json(['code' => 1, 'bn' => $_var_121, 'tb' => $_var_122, 'ad' => $_var_123]);
    }
    public function banben()
    {
        return json(['banben' => advert('6'), 'url' => advert('8'), 'url2' => advert('9'), 'url3' => advert('10'), 'url4' => advert('11'), 'url5' => advert('12'), 'hburl' => advert('13'), 'advert' => advert('7')]);
    }
    public function sign()
    {
        $_var_125 = input();
        $_var_126['id'] = $_var_125['uid'];
        $_var_125 = db('user')->where($_var_126)->find();
        if ($_var_125['power'] == '0' || $_var_125['type'] == '1') {
            $_var_127['time'] = '-1';
            $_var_127['power'] = $_var_125['power'];
            $_var_127['Sex'] = $_var_125['Sex'];
        } else {
            $_var_127['time'] = $_var_125['lasttime'];
            $_var_127['shiyong'] = advert('5');
            $_var_127['power'] = $_var_125['power'];
            $_var_127['Sex'] = $_var_125['Sex'];
        }
        $_var_127['share'] = $_var_125['sign'];
		$_var_127['je'] = $_var_125['moneys'];
        $_var_127['ds'] = $_var_125['money'];
        db('user')->where('id', $_var_125['id'])->setInc('count', 1);
        db('user')->where('id', $_var_125['id'])->update(['logintime' => time()]);
        if ($_var_125) {
            return json(['code' => '1', 'msg' => $_var_127]);
        } else {
            return json(['code' => '0']);
        }
    }
    public function dologin()
    {
        session(null);
        $this->redirect('login/index');
    }
}