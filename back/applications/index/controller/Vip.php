<?php

namespace app\index\controller;
use think\Controller;
use think\Session;



class Jpush{
  
    private $app_key = 'e096f19e76791299af428961';//极光推送应用key
    private $master_secret = '83abe0e075498eaac48c0801';//极光推送应用secret
    private $url = "https://api.jpush.cn/v3/push";
 
  
    public function __construct($app_key=null, $master_secret=null,$url=null) {
        if ($app_key) $this->app_key = $app_key;
        if ($master_secret) $this->master_secret = $master_secret;
        if ($url) $this->url = $url;
    }
 

    public function push($receiver="all", $title='', $content='', $extras, $m_time='86400'){
        $base64=base64_encode("$this->app_key:$this->master_secret");
        $header=array("Authorization:Basic $base64","Content-Type:application/json");
        $data = array();
        $data['platform'] = "android";          
        $data['audience'] = "all";    	
        $data['notification'] = array(
            "android"=>array(
                "alert"=>$content,
                "title"=>$title,
                "builder_id"=>1,
                "extras"=>$extras
            ),

        );
 

        $data['message'] = array(
            "msg_content"=>$content,
            "extras"=>$extras
        );
 

        $data['options'] = array(
            "sendno"=>time(),
            "time_to_live"=>$m_time, 	 
            "apns_production"=>1,       
        );
        $param = json_encode($data);
        $res = $this->push_curl($param,$header);
         
        if($res){       
            return $res;
        }else{          
            return false;
        }
    }
 
    
    public function push_curl($param="",$header="") {
        if (empty($param)) { return false; }
        $postUrl = $this->url;
        $curlPost = $param;
        $ch = curl_init();                                      
        curl_setopt($ch, CURLOPT_URL,$postUrl);                 
        curl_setopt($ch, CURLOPT_HEADER, 0);                    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);            
        curl_setopt($ch, CURLOPT_POST, 1);                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);          
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);       
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $data = curl_exec($ch);                                
        curl_close($ch);
        return $data;
    }
}


class Vip extends Controller
{
    public function _initialize()
    {
        $xzv_13 = session('user');
        if (!$xzv_13) {
            $this->redirect('login/login/index');
        }
    }
  
  
  	public function appts(){

		
    	if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
      
      	if (request()->Post()) {
	    vendor('Jpush/Jpush');
	    $pushObj = new Jpush();
	    $receive = input('title');     
	    $title = '欣然影视';
	    $content = input('neirong');
	    $m_time = 86400;        
	    $extras = array("versionname"=>'134', "versioncode"=>'134');   
          $list = db('tuisong')->where('id',1)->find();
	 $app_key = $list['appkey'];
     $master_secret = $list['master_secret'];
          
	    $result = $pushObj->push($receive,$title,$content,$extras,$m_time);
	    if($result){
	        $res_arr = json_decode($result, true);
	        if(isset($res_arr['error'])){   

	            $this->error($res_arr['error']['message'].'：'.$res_arr['error']['code']);    
	        }else{

	            $this->success('推送成功~');
	        }
	    }else{      
	        $this->error('接口调用失败或无响应~');
	    }

        }

        $xzv_42 = session('code');
        return view('appts', ['list' =>$list , 'code' => $xzv_42]); 
    }


  	public function tspz(){
    	if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
      
      	if (request()->Post()) {
          	$update['appkey'] = input('appkey');
          	$update['master_secret']  = input('master_secret');
            db('tuisong')->where('id', 1)->update($update);
            Session::flash('code', '1');
            $this->redirect('vip/tspz');
        }
      	$list = db('tuisong')->where('id',1)->find();
        $xzv_42 = session('code');
        return view('tspz', ['list' =>$list , 'code' => $xzv_42]);
    }


  function jxpost(){
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, 'http://yjx.mao2234.cn/admin/login.php');
     curl_setopt($curl, CURLOPT_HEADER, 1);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl, CURLOPT_POST, 1);
     $post_data = array(
         "username" => "admin",
         "password" => "admin888"
         );
     curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
     $data = curl_exec($curl);
     curl_close($curl);
     print_r($data);
     
 }

  	public function apptc(){
    	if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
      
      	if (request()->Post()) {
          	$update['title'] = input('title');
          	$update['neirong']  = input('neirong');
          	$update['url']	=	input('url');
          	$update['kaiguan'] = input('kaiguan');
            db('tanchuang')->where('id', 1)->update($update);
            Session::flash('code', '1');
            $this->redirect('vip/apptc');
        }
      	$list = db('tanchuang')->where('id',1)->find();
        $xzv_42 = session('code');
        return view('apptc', ['list' =>$list , 'code' => $xzv_42]);
    }
  
    public function advert()
    {
      if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
        if (request()->Post()) {
            db('advert')->where('id', 1)->update(['content' => input('advert')]);
            db('advert')->where('id', 7)->update(['content' => input('advert1')]);
            db('advert')->where('id', 2)->update(['content' => input('down')]);
            db('advert')->where('id', 3)->update(['content' => input('pass')]);
            db('advert')->where('id', 4)->update(['content' => input('sign')]);
            db('advert')->where('id', 5)->update(['content' => intval(input('time'))]);
            db('advert')->where('id', 6)->update(['content' => input('ban')]);
            db('advert')->where('id', 8)->update(['content' => input('geng')]);
            db('advert')->where('id', 9)->update(['content' => input('geng2')]);
            db('advert')->where('id', 10)->update(['content' => input('geng3')]);
            db('advert')->where('id', 11)->update(['content' => input('geng4')]);
            db('advert')->where('id', 12)->update(['content' => input('geng5')]);
            db('advert')->where('id', 13)->update(['content' => input('geng6')]);
            db('advert')->where('id', 14)->update(['content' => input('geng7')]);
            db('advert')->where('id', 15)->update(['content' => input('geng8')]);
            db('advert')->where('id', 16)->update(['content' => input('geng9')]);
            db('advert')->where('id', 17)->update(['content' => input('fxurl2')]);
            db('advert')->where('id', 20)->update(['content' => input('zad1')]);
            db('advert')->where('id', 21)->update(['content' => input('zad1url')]);
            db('advert')->where('id', 22)->update(['content' => input('zad2')]);
            db('advert')->where('id', 23)->update(['content' => input('zad2url')]);
            db('advert')->where('id', 27)->update(['content' => input('add')]);
            db('advert')->where('id', 28)->update(['content' => input('adds')]);
            db('advert')->where('id', 29)->update(['content' => input('fxpic3')]);
            db('advert')->where('id', 30)->update(['content' => input('fxurl3')]);
            db('advert')->where('id', 31)->update(['content' => input('fxpic4')]);
            db('advert')->where('id', 32)->update(['content' => input('fxurl4')]);
            db('advert')->where('id', 33)->update(['content' => input('fxpic5')]);
            db('advert')->where('id', 34)->update(['content' => input('fxurl5')]);
            db('advert')->where('id', 35)->update(['content' => input('fxpic6')]);
            db('advert')->where('id', 36)->update(['content' => input('fxurl6')]);
            db('advert')->where('id', 37)->update(['content' => input('fxpic7')]);
            db('advert')->where('id', 38)->update(['content' => input('fxurl7')]);
            db('advert')->where('id', 39)->update(['content' => input('fxpic8')]);
            db('advert')->where('id', 40)->update(['content' => input('fxurl8')]);
            db('advert')->where('id', 41)->update(['content' => input('fxpic9')]);
            db('advert')->where('id', 42)->update(['content' => input('fxurl9')]);
            db('advert')->where('id', 43)->update(['content' => input('fxpic10')]);
            db('advert')->where('id', 44)->update(['content' => input('fxurl10')]);
            db('advert')->where('id', 45)->update(['content' => input('fxpic11')]);
            db('advert')->where('id', 46)->update(['content' => input('fxurl11')]);
            db('advert')->where('id', 47)->update(['content' => input('fxpic12')]);
            db('advert')->where('id', 48)->update(['content' => input('fxurl12')]);
            Session::flash('code', '1');
            $this->redirect('vip/advert');
        }
        $xzv_42 = session('code');
        return view('advert', ['code' => $xzv_42]);
    }
    function getRandomString($xzv_17, $xzv_40 = null)
    {
        srand((double) microtime() * 1000000);
        $xzv_41 = '0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z';
        $xzv_3 = explode(',', $xzv_41);
        $xzv_4 = '';
        for ($xzv_50 = 0; $xzv_50 < 6; $xzv_50++) {
            $xzv_45 = rand(0, 35);
            $xzv_4 .= $xzv_3[$xzv_45];
        }
        return $xzv_4;
    }
    public function padd()
    {
        $xzv_46 = input('num');
        $xzv_52 = input('ctime');
        if (session('power') == '1') {
            $xzv_51 = db('user')->where('id', session('user'))->value('money');
            if ($xzv_51 < $xzv_52 * $xzv_46) {
                return json(['code' => '0', 'msg' => '开通失败,您的余额不足']);
            }
        }
        $xzv_22 = '0';
        $xzv_54 = '0';
        switch ($xzv_52) {
            case 0.5:
                $xzv_54 = 7 * 60 * 60 * 24;
                $xzv_44 = '七天';
                break;
            case 1:
                $xzv_54 = 30 * 60 * 60 * 24;
                $xzv_44 = '一个月';
                break;
            case 2:
                $xzv_54 = 90 * 60 * 60 * 24;
                $xzv_44 = '三个月';
                break;
            case 8:
                $xzv_54 = 365 * 60 * 60 * 24;
                $xzv_44 = '一年';
                break;
            case 10:
                $xzv_22 = 1;
                $xzv_44 = '永久';
                break;
        }
        $xzv_12 = [];
        for ($xzv_34 = 0; $xzv_34 < $xzv_46; $xzv_34++) {
            unset($xzv_51);
            $xzv_21 = strtolower($this->getRandomString(6));
            $xzv_28 = db('user')->where('username', $xzv_21)->count();
            if ($xzv_28 == 0) {
                $xzv_12[$xzv_34]['username'] = $xzv_21;
                $xzv_12[$xzv_34]['day'] = $xzv_44;
                $xzv_12[$xzv_34]['lasttime'] = date('Y-m-d H:i:s', time() + $xzv_54);
                $xzv_51['username'] = $xzv_21;
                $xzv_51['password'] = md5(sha1('123456'));
                $xzv_51['power'] = '2';
                $xzv_51['status'] = '1';
                $xzv_51['parentid'] = session('user');
                $xzv_51['ctime'] = time();
                if ($xzv_22 == '0') {
                    $xzv_51['lasttime'] = time() + $xzv_54;
                } else {
                    $xzv_51['type'] = '1';
                }
                $xzv_16 = db('user')->insertGetId($xzv_51);
                if (session('power') == '1') {
                    $xzv_33 = db('user')->where('id', session('user'))->value('money');
                    $xzv_43 = $xzv_33 - $xzv_52;
                    db('user')->where('id=' . session('user'))->update(['money' => $xzv_43]);
                    $xzv_32['cid'] = $xzv_16;
                    $xzv_32['uid'] = session('user');
                    $xzv_32['time'] = $xzv_44;
                    $xzv_32['lasttime'] = time() + $xzv_54;
                    $xzv_32['ctime'] = time();
                    db('adduser')->insert($xzv_32);
                }
            } else {
                $xzv_34 = $xzv_34 - 1;
            }
            unset($xzv_21);
        }
        $xzv_31 = '<table style="margin-left: 50px"><tr style="color: #00aa00 "><td style="width:80px ">账号</td><td style="width:80px ">密码</td><td style="width:80px ">开通时间</td><td style="width:200px ">到期时间</td></tr>';
        foreach ($xzv_12 as $xzv_15) {
            $xzv_31 .= '<tr>';
            $xzv_31 .= '<td>' . $xzv_15['username'] . '</td><td>123456</td><td>' . $xzv_15['day'] . '</td><td>' . $xzv_15['lasttime'] . '</td>';
            $xzv_31 .= '</tr>';
        }
        $xzv_31 .= '</table>';
        return json(['code' => '1', 'msg' => $xzv_31]);
    }
    public function index()
    {
        $xzv_30 = session('code', '');
        $xzv_29 = 'power = 2';
        if (input('start')) {
            $xzv_29 .= ' and lasttime >' . strtotime(input('start') . ' 00:00:00');
        }
        if (input('end')) {
            $xzv_29 .= ' and lasttime <' . strtotime(input('end') . ' 00:00:00');
        }
        if (input('key')) {
            $xzv_29 .= ' and (username like  "%' . input('key') . '%" or nick_name like "%' . input('key') . '%")';
        } else {
            if (session('power') == '1') {
                $xzv_29 .= ' and parentid=' . session('user');
            }
        }
        $xzv_11 = 'power=2';
        if (session('power') == '1') {
            $xzv_11 .= ' and parentid=' . session('user');
        } else {
            if (input('parentid')) {
                $xzv_29 .= ' and parentid = ' . input('parentid');
            }
        }
        $xzv_11 = db('user')->where($xzv_11)->count();
        if (session('power') == '1' or session('power') == '-1') {
            $xzv_29 .= ' and parentid = ' . session('user');
        }
        $xzv_56 = db('user')->where($xzv_29)->order('id desc')->paginate(10, false, ['query' => input()]);
        return view('index', ['parentid' => input('parentid'), 'count' => $xzv_11, 'list' => $xzv_56, 'code' => $xzv_30]);
    }
    function timediff($xzv_10)
    {
        $xzv_60 = intval($xzv_10 / 86400);
        $xzv_6 = $xzv_10 % 86400;
        $xzv_25 = intval($xzv_6 / 3600);
        $xzv_6 = $xzv_6 % 3600;
        $xzv_14 = intval($xzv_6 / 60);
        $xzv_58 = $xzv_6 % 60;
        $xzv_23 = array('day' => $xzv_60, 'hour' => $xzv_25, 'min' => $xzv_14, 'sec' => $xzv_58);
        return $xzv_23;
    }
    public function add()
    {
        if (request()->isPost()) {
            $xzv_1 = input('money');
            $xzv_53 = input('ctime');
            if ($xzv_1) {
                $xzv_0 = $xzv_1;
            } else {
                $xzv_0 = $xzv_53;
            }
            if (session('power') == '1') {
                $xzv_39 = db('user')->where('id', session('user'))->value('money');
                if ($xzv_39 < $xzv_0) {
                    Session::flash('code', 'err3');
                    $this->redirect('vip/add');
                }
            }
            if ($xzv_1) {
                $xzv_35 = '0';
                $xzv_59 = $xzv_1 / 0.5 * 7 * 24 * 60 * 60;
            } else {
                $xzv_35 = '0';
                switch ($xzv_53) {
                    case 0.5:
                        $xzv_59 = 7 * 60 * 60 * 24;
                        break;
                    case 1:
                        $xzv_59 = 30 * 60 * 60 * 24;
                        break;
                    case 2:
                        $xzv_59 = 90 * 60 * 60 * 24;
                        break;
                    case 8:
                        $xzv_59 = 365 * 60 * 60 * 24;
                        break;
                    case 10:
                        $xzv_35 = 1;
                        break;
                }
            }
            $xzv_39 = input();
            $xzv_24['username'] = $xzv_39['name'];
            $xzv_24['password'] = md5(sha1($xzv_39['password']));
            $xzv_24['power'] = '2';
            $xzv_24['status'] = '1';
            $xzv_24['ctime'] = time();
            $xzv_24['logintime'] = '0';
            $xzv_24['lasttime'] = '0';
            $xzv_24['money'] = '0.00';
            if (session('power') == '1') {
                $xzv_24['parentid'] = session('user');
            } else {
                $xzv_24['parentid'] = '0';
            }
            $xzv_57 = db('user')->where('username', $xzv_39['name'])->count();
            if ($xzv_57 > 0) {
                Session::flash('code', 'err1');
                $this->redirect('vip/add');
            }
            if ($xzv_8 = db('user')->insertGetId($xzv_24)) {
                unset($xzv_24);
                if ($xzv_35 == '1') {
                    db('user')->where('id =' . $xzv_8)->update(['type' => '1']);
                    $xzv_36 = db('user')->where('id', $xzv_8)->value('money');
                    $xzv_37 = $xzv_36 - 10;
                    db('user')->where('id=' . $xzv_8)->update(['money' => $xzv_37]);
                    $xzv_24['uid'] = session('user');
                    $xzv_24['cid'] = $xzv_8;
                    $xzv_24['ctime'] = time();
                    $xzv_24['day'] = 'all';
                    $xzv_24['money'] = $xzv_0;
                    $xzv_24['lasttime'] = 'all';
                    db('timelog')->insert($xzv_24);
                } else {
                    $xzv_39 = db('user')->where('id=' . $xzv_8)->value('lasttime');
                    if ($xzv_39 < time()) {
                        db('user')->where('id=' . $xzv_8)->update(['lasttime' => time() + $xzv_59]);
                        $xzv_19 = time() + $xzv_59;
                    } else {
                        db('user')->where('id=' . $xzv_8)->setInc('lasttime', $xzv_59);
                        $xzv_55 = db('user')->where('id=' . $xzv_8)->value('lasttime');
                        $xzv_19 = $xzv_55 + $xzv_59;
                    }
                    $xzv_36 = db('user')->where('id', session('user'))->value('money');
                    $xzv_37 = $xzv_36 - $xzv_0;
                    if (session('power') == '1') {
                        db('user')->where('id=' . session('user'))->update(['money' => $xzv_37]);
                        db('user')->where('id=' . $xzv_8)->update(['parentid' => session('user')]);
                    }
                    $xzv_59 = $this->timediff($xzv_59);
                    $xzv_24['uid'] = session('user');
                    $xzv_24['cid'] = $xzv_8;
                    $xzv_24['ctime'] = time();
                    $xzv_24['day'] = $xzv_59['day'];
                    $xzv_24['money'] = $xzv_37;
                    $xzv_24['lasttime'] = $xzv_19;
                    db('timelog')->insert($xzv_24);
                }
                Session::flash('code', '1');
                $this->redirect('vip/index');
            } else {
                Session::flash('code', 'err2');
                $this->redirect('vip/add');
            }
        } else {
            $xzv_27 = session('code');
            $xzv_9 = input('msg', '0');
            return view('add', ['code' => $xzv_27, 'msg' => $xzv_9]);
        }
    }
    public function update()
    {
      if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
      
        header('Content-type: text/html; charset=utf-8');
        if (request()->isPost()) {
            $xzv_20 = input();
            $xzv_7 = $xzv_20['id'];
            $xzv_26 = input('page', '');
            if ($xzv_20['password']) {
                $xzv_5['password'] = md5(sha1($xzv_20['password']));
                $xzv_49 = db('user')->where('id', session('user'))->value('password');
                if ($xzv_49 != md5(sha1(input('password')))) {
                    db('pass_log')->insert(['ip' => getIP(), 'ctime' => time(), 'uid' => $xzv_7, 'aid' => session('user'), 'old_pass' => $xzv_49, 'pass' => md5(sha1(input('password'))), 'web' => 0]);
                }
            }
            if ($xzv_20['phone']) {
                $xzv_5['phone'] = $xzv_20['phone'];
            }
            if (session('power') == '1' && $xzv_20['power'] == '1') {
                $xzv_48 = db('user')->where('id=' . session('user'))->value('money');
                if ($xzv_48 < 20) {
                    Session::flash('code', 'err3');
                    $this->redirect('vip/update', ['id' => $xzv_20['id']]);
                } else {
                    $xzv_5['parentid'] = session('user');
                    $xzv_5['power'] = input('power');
                }
            }
            if (session('power') == '0' && $xzv_20['power'] == '1') {
                $xzv_5['parentid'] = session('user');
                $xzv_5['power'] = input('power');
            }
            if ($xzv_20['power'] == '1') {
                if (empty($xzv_20['share_ma'])) {
                    $xzv_5['share_ma'] = rand('100000', '999999');
                } else {
                    $xzv_5['share_ma'] = $xzv_20['share_ma'];
                }
                $xzv_5['weichat'] = $xzv_20['weichat'];
                $xzv_18 = db('user')->where('id!=' . $xzv_20['id'] . ' and share_ma="' . $xzv_5['share_ma'] . '"')->count();
                if ($xzv_18 > 0) {
                    Session::flash('code', 'err4');
                    echo "<script>window.location='/index/vip/update/id/" . $xzv_20['id'] . "'</script>";
                    exit;
                }
            }
          
          	if ($xzv_20['power'] == '-1') {
                if (empty($xzv_20['share_ma'])) {
                    $xzv_5['share_ma'] = rand('100000', '999999');
                } else {
                    $xzv_5['share_ma'] = $xzv_20['share_ma'];
                }
                $xzv_5['weichat'] = $xzv_20['weichat'];
              	$xzv_5['power'] = input('power');
                $xzv_18 = db('user')->where('id!=' . $xzv_20['id'] . ' and share_ma="' . $xzv_5['share_ma'] . '"')->count();
                if ($xzv_18 > 0) {
                    Session::flash('code', 'err4');
                    echo "<script>window.location='/index/vip/update/id/" . $xzv_20['id'] . "'</script>";
                    exit;
                }
            }
            $xzv_5['ctime'] = time();
            $xzv_47 = db('user')->where('username="' . $xzv_20['name'] . '" and id != ' . $xzv_20['id'])->count();
            if ($xzv_47 > 0) {
                Session::flash('code', 'err1');
                echo "<script>window.location='/index/vip/update/id/" . $xzv_20['id'] . '?page=' . $xzv_26 . "'</script>";
            }
          //var_dump($xzv_5);die;
            if (db('user')->where('id', $xzv_7)->update($xzv_5)) {
                if ($xzv_20['power'] == '1') {
                    $xzv_48 = db('user')->where('id=' . session('user'))->value('money');
                    if ($xzv_48 >= 20) {
                        db('user')->where('id', session('user'))->setDec('money', '20');
                        unset($xzv_20);
                        $xzv_20['uid'] = session('user');
                        $xzv_20['ctime'] = time();
                        $xzv_20['cid'] = $xzv_7;
                        $xzv_20['money'] = 20;
                        db('moneylog')->insert($xzv_20);
                    }
                }
                db('user')->where('id=' . $xzv_7)->update(['money' => 20]);
                db('kai')->insert(['uid' => session('user'), 'cid' => $xzv_7, 'ctime' => time()]);
                Session::flash('code', '2');
                echo "<script>window.location='/index/vip/index?page=" . $xzv_26 . "'</script>";
            } else {
                Session::flash('code', 'err2');
                $this->redirect('vip/update', ['id' => $xzv_7]);
            }
        } else {
            $xzv_2 = session('code');
            $xzv_38 = input('msg', '0');
            $xzv_20 = db('user')->where('id', input('id'))->find();
            return view('update', ['page' => input('page', '0'), 'data' => $xzv_20, 'code' => $xzv_2, 'msg' => $xzv_38]);
        }
    }
}