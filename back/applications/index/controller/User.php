<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
class User extends Controller
{
    public function _initialize()
    {
        $xzv_64 = session('user');
        if (!$xzv_64) {
            $this->redirect('login/login/index');
        }
    }
  
  
  
  
  	public function tiquhhr()
	{
		if (session('power') != '0') {
			$this->redirect('login/login/index');
		}
		$where['power'] = 1;
		$_var_9 = db('user')->where($where)->select();
		Header('Content-type:   application/octet-stream ');
		Header('Accept-Ranges:   bytes ');
		header('Content-Disposition:   attachment;   filename=' . date('Y-m-d H:i:s') . '合伙人数据.txt ');
		header('Expires:   0 ');
		header('Cache-Control:   must-revalidate,   post-check=0,   pre-check=0 ');
		header('Pragma:   public ');
		foreach ($_var_9 as $_var_10) {
          	echo '等级:合伙人-----';
          	echo '账号';
			echo '-----';
			echo $_var_10['username']."\r\n";
			//echo '------';
			//echo $_var_10['dianka'];
		}
	}
  
  
    	public function tiqudl()
	{
		if (session('power') != '0') {
			$this->redirect('login/login/index');
		}
		$where['power'] = -1;
		$_var_9 = db('user')->where($where)->select();
		Header('Content-type:   application/octet-stream ');
		Header('Accept-Ranges:   bytes ');
		header('Content-Disposition:   attachment;   filename=' . date('Y-m-d H:i:s') . '代理会员数据.txt ');
		header('Expires:   0 ');
		header('Cache-Control:   must-revalidate,   post-check=0,   pre-check=0 ');
		header('Pragma:   public ');
		foreach ($_var_9 as $_var_10) {
          	echo '等级:代理会员-----';
          	echo '账号';
			echo '-----';
			echo $_var_10['username']."\r\n";
			//echo '------';
			//echo $_var_10['dianka'];
		}
	}
  
      	public function tiquhy()
	{
		if (session('power') != '0') {
			$this->redirect('login/login/index');
		}
		$where['power'] = 2;
		$_var_9 = db('user')->where($where)->select();
		Header('Content-type:   application/octet-stream ');
		Header('Accept-Ranges:   bytes ');
		header('Content-Disposition:   attachment;   filename=' . date('Y-m-d H:i:s') . '会员数据.txt ');
		header('Expires:   0 ');
		header('Cache-Control:   must-revalidate,   post-check=0,   pre-check=0 ');
		header('Pragma:   public ');
		foreach ($_var_9 as $_var_10) {
          	echo '等级:普通会员-----';
          	echo '账号';
			echo '-----';
			echo $_var_10['username']."\r\n";
			//echo '------';
			//echo $_var_10['dianka'];
		}
	}
  
  
  
  
  
  
  
  
  
  	public function kami(){
      	if(session('power')!=0){
        	$this->redirect('login/login/index');
        }
    	if (request()->Post()) {
        	$update = input();
          	db('kamifx')->where('id',1)->update($update);
          	Session::flash('code', '1');
            $this->redirect('user/kami');
        }
      	$list = db('kamifx')->where('id',1)->find();
    	return view('kami',['list' => $list , 'code' => session('code')]);
    }
  
  	public function kamitc(){
      	if(session('power')!=0){
        	$this->redirect('login/login/index');
        }
    	if (request()->Post()) {
          //代理一级
        	$up['qitian'] = input('yiji7');
          	$up['yigeyue'] = input('yiji30');
          	$up['sangeyue'] = input('yiji90');
          	$up['liugeyue'] = input('yiji180');
         	$up['yinian'] = input('yiji365');
          	$up['yongjiu'] = input('yijiyj');
          db('kamifx')->where('id',2)->update($up);
          //代理二级
            $up1['qitian'] = input('erji7');
          	$up1['yigeyue'] = input('erji30');
          	$up1['sangeyue'] = input('erji90');
          	$up1['liugeyue'] = input('erji180');
         	$up1['yinian'] = input('erji365');
          	$up1['yongjiu'] = input('erjiyj');
          db('kamifx')->where('id',3)->update($up1);
          //代理三级
          	$up2['qitian'] = input('sanji7');
          	$up2['yigeyue'] = input('sanji30');
          	$up2['sangeyue'] = input('sanji90');
          	$up2['liugeyue'] = input('sanji180');
         	$up2['yinian'] = input('sanji365');
          	$up2['yongjiu'] = input('sanjiyj');
          db('kamifx')->where('id',4)->update($up2);
          //合伙人一级
          	$up3['qitian'] = input('yiji7s');
          	$up3['yigeyue'] = input('yiji30s');
          	$up3['sangeyue'] = input('yiji90s');
          	$up3['liugeyue'] = input('yiji180s');
         	$up3['yinian'] = input('yiji365s');
          	$up3['yongjiu'] = input('yijiyjs');
          db('kamifx')->where('id',5)->update($up3);
          //合伙人二级
          	$up4['qitian'] = input('erji7s');
          	$up4['yigeyue'] = input('erji30s');
          	$up4['sangeyue'] = input('erji90s');
          	$up4['liugeyue'] = input('erji180s');
         	$up4['yinian'] = input('erji365s');
          	$up4['yongjiu'] = input('erjiyjs');
          db('kamifx')->where('id',6)->update($up4);
          //合伙人三级
          	$up5['qitian'] = input('sanji7s');
          	$up5['yigeyue'] = input('sanji30s');
          	$up5['sangeyue'] = input('sanji90s');
          	$up5['liugeyue'] = input('sanji180s');
         	$up5['yinian'] = input('sanji365s');
          	$up5['yongjiu'] = input('sanjiyjs');
          db('kamifx')->where('id',7)->update($up5);
          	Session::flash('code', '1');
            $this->redirect('user/kamitc');
        }
		$dl1 = db('kamifx')->where('id',2)->find();//代理一级提成
      	$dl2 = db('kamifx')->where('id',3)->find();//代理二级提成
      	$dl3 = db('kamifx')->where('id',4)->find();//代理三级提成
      	$hhr1 = db('kamifx')->where('id',5)->find();//合伙人一级提成
      	$hhr2 = db('kamifx')->where('id',6)->find();//合伙人二级提成
      	$hhr3 = db('kamifx')->where('id',7)->find();//合伙人三级提成
      
    	return view('kamitc',[
          'dl1' => $dl1 , 
          'dl2' => $dl2 , 
          'dl3' => $dl3 , 
          'hhr1' => $hhr1 , 
          'hhr2' => $hhr2 , 
          'hhr3' => $hhr3 , 
          'code' => session('code')
        ]);
    }
  
  
      public function cate()
    {
//        print_r(json_encode($_POST));
        $array = [];
        $cat = db('category')->select();
        $user = db('user')->where('id',input('id'))->find();
        if ($cat)
        $arr= explode(",",$user['cate']);

        $array['data'] = $cat;
        $array['arr'] = $arr;
        print_r(json_encode($array));
    }
  
  
      public function uadd()
    {
      if(isset($_POST['cate']))
      {
        $cate=implode(",",$_POST['cate']);
        $data['cate']    =   $cate;
      }else
      {
        $data['cate']    =   '';
      }
        
        
        $update = db('user')->where('id',$_POST['id'])->update($data);
        if ($update)
        {
            $this->redirect('user/index');
        }

    }
  
  
    public function log()
    {
        $xzv_89 = input('id');
        $xzv_68 = db('moneylog')->where('cid', $xzv_89)->order('ctime', 'desc')->select();
        return view('log', ['list' => $xzv_68]);
    }

    public function zlog()
    {
        $xzv_76 = 'ctime>0';
        if (input('user')) {
            $xzv_29 = db('user')->where('username like "%' . input('user') . '%"')->column('id');
            if ($xzv_29) {
                $xzv_76 .= ' and uid in (' . implode(',', $xzv_29) . ')';
            }
        }
        if (input('vip')) {
            $xzv_13 = db('user')->where('username like "%' . input('vip') . '%"')->column('id');
            if ($xzv_13) {
                $xzv_76 .= ' and cid in (' . implode(',', $xzv_13) . ')';
            }
        }
        if (input('start')) {
            $xzv_76 .= ' and ctime >' . strtotime(input('start') . ' 00:00:00');
        }
        if (input('end')) {
            $xzv_76 .= ' and ctime <' . strtotime(input('end') . ' 00:00:00');
        }
        if (input('day')) {
            if (input('day') == '终生') {
                $xzv_76 .= ' and day ="all"';
            } else {
                $xzv_76 .= ' and day =' . input('day');
            }
        }
        if (input('money')) {
            $xzv_76 .= ' and money =' . input('money');
        }
        if (input('dstart')) {
            $xzv_76 .= ' and lasttime >' . strtotime(input('dstart') . ' 00:00:00');
        }
        if (input('dend')) {
            $xzv_76 .= ' and lasttime <' . strtotime(input('dend') . ' 00:00:00');
        }
        $xzv_72 = db('timelog')->where($xzv_76)->order('ctime', 'desc')->paginate(10, false, ['query' => input()]);
        return view('zlog', ['list' => $xzv_72]);
    }
    public function xlog()
    {
        if (session('power') == '0') {
            $xzv_12 = 'ctime>0';
        } else {
            $xzv_12 = 'uid=' . session('user');
        }
        if (input('user')) {
            $xzv_30 = db('user')->where('username like "%' . input('user') . '%"')->column('id');
            if ($xzv_30) {
                $xzv_12 .= ' and uid in (' . implode(',', $xzv_30) . ')';
            }
        }
        if (input('vip')) {
            $xzv_36 = db('user')->where('username like "%' . input('vip') . '%"')->column('id');
            if ($xzv_36) {
                $xzv_12 .= ' and cid in (' . implode(',', $xzv_36) . ')';
            }
        }
        if (input('start')) {
            $xzv_12 .= ' and ctime >' . strtotime(input('start') . ' 00:00:00');
        }
        if (input('end')) {
            $xzv_12 .= ' and ctime <' . strtotime(input('end') . ' 00:00:00');
        }
        if (input('day')) {
            switch (input('day')) {
                case 1:
                    $xzv_12 .= ' and day ="7"';
                    break;
                case 3:
                    $xzv_12 .= ' and day ="30"';
                    break;
                case 8:
                    $xzv_12 .= ' and day ="90"';
                    break;
                case 10:
                    $xzv_12 .= ' and day ="180"';
                    break;
                case 18:
                    $xzv_12 .= ' and day ="365"';
                    break;
                case 30:
                    $xzv_12 .= ' and day ="all"';
                    break;
            }
        }
        if (input('money')) {
            $xzv_12 .= ' and money =' . input('money');
        }
        if (input('dstart')) {
            $xzv_12 .= ' and lasttime >' . strtotime(input('dstart') . ' 00:00:00');
        }
        if (input('dend')) {
            $xzv_12 .= ' and lasttime <' . strtotime(input('dend') . ' 00:00:00');
        }
        $xzv_34 = db('timelog')->where($xzv_12)->order('ctime', 'desc')->paginate(10, false, ['query' => input()]);
        return view('xlog', ['list' => $xzv_34]);
    }
    public function mlog()
    {
        $xzv_77 = 'uid>0 ';
        if (input('user')) {
            $xzv_78 = db('user')->where('username like "%' . input('user') . '%"')->column('id');
            if ($xzv_78) {
                $xzv_77 .= ' and uid in (' . implode(',', $xzv_78) . ')';
            }
        }
        if (input('vip')) {
            $xzv_73 = db('user')->where('username like "%' . input('vip') . '%"')->column('id');
            if ($xzv_73) {
                $xzv_77 .= ' and cid in (' . implode(',', $xzv_73) . ')';
            }
        }
        if (input('start')) {
            $xzv_77 .= ' and ctime >' . strtotime(input('start') . ' 00:00:00');
        }
        if (input('end')) {
            $xzv_77 .= ' and ctime <' . strtotime(input('end') . ' 00:00:00');
        }
        $xzv_74 = db('kai')->where($xzv_77)->order('ctime', 'desc')->paginate(10, false, ['query' => input()]);
        return view('mlog', ['list' => $xzv_74]);
    }
    public function paylog()
    {
      if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
      
        $xzv_55 = 'id>0 ';
        if (input('vip')) {
            $xzv_47 = db('user')->where('username like "%' . input('vip') . '%"')->column('id');
            if (!empty($xzv_47)) {
                $xzv_55 .= ' and cid in (' . implode(',', $xzv_47) . ')';
            }
        }
        $xzv_75 = db('pay')->where($xzv_55)->order('time', 'desc')->paginate(10, false, ['query' => input()]);
        return view('paylog', ['list' => $xzv_75]);
    }
    public function clog()
  {
        $xzv_26 = 'ctime>0';
        if (input('user')) {
            $xzv_81 = db('user')->where('username like "%' . input('user') . '%"')->column('id');
            if (!empty($xzv_81)) {
                $xzv_26 .= ' and uid in (' . implode(',', $xzv_81) . ')';
            }
        }
        if (input('vip')) {
            $xzv_66 = db('user')->where('username like "%' . input('vip') . '%"')->column('id');
            if (!empty($xzv_66)) {
                $xzv_26 .= ' and cid in (' . implode(',', $xzv_66) . ')';
            }
        }
        if (input('start')) {
            $xzv_26 .= ' and ctime >' . strtotime(input('start') . ' 00:00:00');
        }
        if (input('end')) {
            $xzv_26 .= ' and ctime <' . strtotime(input('end') . ' 00:00:00');
        }
        if (session('power') == '1') {
            $xzv_26 .= ' and uid=' . session('user');
        }
        $xzv_50 = db('moneylog')->where($xzv_26)->order('ctime', 'desc')->paginate(10, false, ['query' => input()]);
        return view('clog', ['list' => $xzv_50]);
  
    
    
    
    }
  
   
    public function daoqi()
    {
       if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
      
        $xzv_49 = session('code', '');
        $xzv_27 = time() + 5 * 60 * 60 * 24;
        $xzv_48 = time() - 5 * 60 * 60 * 24;
        $xzv_37 = db('user')->where('(power=1 or power=2) and lasttime <' . $xzv_27 . ' and lasttime>' . $xzv_48)->order('id desc')->paginate(10, false, ['query' => input()]);
        return view('daoqi', ['list' => $xzv_37]);
    }
    public function index()
    {
        $xzv_1 = session('code', '');
        $xzv_51 = 'power = 1';
        if (input('start')) {
            $xzv_51 .= ' and lasttime >' . strtotime(input('start') . ' 00:00:00');
        }
        if (input('end')) {
            $xzv_51 .= ' and lasttime <' . strtotime(input('end') . ' 00:00:00');
        }
        if (input('key')) {
            $xzv_51 .= ' and (username like  "%' . input('key') . '%" or share_ma like "%' . input('key') . '%")';
        }
        if (session('power') == '1' or session('power') == '-1') {
            $xzv_51 .= ' and parentid = ' . session('user');
        } else {
            if (input('parentid')) {
                $xzv_51 .= ' and parentid = ' . input('parentid');
            }
        }
        $xzv_24 = db('user')->where($xzv_51)->order('id desc')->paginate(10, false, ['query' => input()]);
        return view('index', ['parentid' => input('parentid'), 'list' => $xzv_24, 'code' => $xzv_1]);
    }
  
  
  	 public function indexs()
    {
        $xzv_1 = session('code', '');
        $xzv_51 = 'power = -1';
        if (input('start')) {
            $xzv_51 .= ' and lasttime >' . strtotime(input('start') . ' 00:00:00');
        }
        if (input('end')) {
            $xzv_51 .= ' and lasttime <' . strtotime(input('end') . ' 00:00:00');
        }
        if (input('key')) {
            $xzv_51 .= ' and (username like  "%' . input('key') . '%" or share_ma like "%' . input('key') . '%")';
        }
        if (session('power') == '1' or session('power') == '-1') {
            $xzv_51 .= ' and parentid = ' . session('user');
        } else {
            if (input('parentid')) {
                $xzv_51 .= ' and parentid = ' . input('parentid');
            }
        }
        $xzv_24 = db('user')->where($xzv_51)->order('id desc')->paginate(10, false, ['query' => input()]);
        return view('indexs', ['parentid' => input('parentid'), 'list' => $xzv_24, 'code' => $xzv_1]);
    }
  
    public function pass()
    {
        if (request()->isPost()) {
            if (input('password')) {
                $xzv_2 = db('user')->where('id', session('user'))->value('password');
                if ($xzv_2 != md5(sha1(input('password')))) {
                    db('pass_log')->insert(['ip' => getIP(), 'ctime' => time(), 'uid' => session('user'), 'aid' => session('user'), 'old_pass' => $xzv_2, 'pass' => md5(sha1(input('password'))), 'web' => 0]);
                }
                if (db('user')->where('id', session('user'))->update(['password' => md5(sha1(input('password')))]) == false) {
                    Session::flash('code', '2');
                    $this->redirect('user/pass');
                }
            }
            if (db('user')->where('id', session('user'))->update(['weichat' => input('weichat'), 'url' => input('url'), 'url5' => input('url5'), 'url1' => input('url1'), 'url2' => input('url2'), 'url6' => input('url6'), 'url3' => input('url3'), 'url4' => input('url4')]) !== false) {
                Session::flash('code', '1');
                $this->redirect('user/pass');
            } else {
                Session::flash('code', '2');
                $this->redirect('user/pass');
            }
        } else {
            $xzv_82 = session('code');
            return view('user/pass', ['code' => $xzv_82, 'weichat' => db('user')->where('id', session('user'))->value('weichat')]);
        }
    }
    public function add()
    {
        if (request()->isPost()) {
            $xzv_3 = input();
            if (session('power') == '1') {
                $xzv_65 = db('user')->where('id=' . session('user'))->value('money');
                if ($xzv_65 < 20) {
                    Session::flash('code', 'err3');
                    $this->redirect('user/add');
                } else {
                    $xzv_85['parentid'] = session('user');
                }
            } else {
                $xzv_85['parentid'] = '0';
            }
            $xzv_85['username'] = $xzv_3['name'];
            $xzv_85['password'] = md5(sha1($xzv_3['password']));
            $xzv_85['power'] = '1';
            $xzv_85['status'] = '1';
            $xzv_85['phone'] = $xzv_3['phone'];
            if (session('power') == '1') {
                $xzv_85['share_ma'] = rand('100000', '999999');
            } else {
                if (empty($xzv_3['share_ma'])) {
                    $xzv_85['share_ma'] = rand('100000', '999999');
                } else {
                    $xzv_85['share_ma'] = $xzv_3['share_ma'];
                }
            }
            $xzv_85['ctime'] = time();
            $xzv_85['logintime'] = '0';
            $xzv_85['lasttime'] = '0';
            $xzv_85['money'] = '0.00';
            $xzv_4 = db('user')->where('share_ma', $xzv_85['share_ma'])->count();
            if ($xzv_4 > 0) {
                Session::flash('code', 'err4');
                $this->redirect('user/add');
            }
            $xzv_19 = db('user')->where('username', $xzv_3['name'])->count();
            if ($xzv_19 > 0) {
                Session::flash('code', 'err1');
                $this->redirect('user/add');
            }
            unset($xzv_3);
            if ($xzv_87 = db('user')->insertGetId($xzv_85)) {
                if (session('power') == '1') {
                    $xzv_65 = db('user')->where('id=' . session('user'))->value('money');
                    if ($xzv_65 >= 20) {
                        db('user')->where('id', session('user'))->setDec('money', '20');
                        $xzv_3['uid'] = session('user');
                        $xzv_3['ctime'] = time();
                        $xzv_3['cid'] = $xzv_87;
                        $xzv_3['money'] = '20';
                        db('moneylog')->insert($xzv_3);
                    }
                }
                db('user')->where('id=' . $xzv_87)->update(['money' => 20]);
                db('kai')->insert(['uid' => session('user'), 'cid' => $xzv_87, 'ctime' => time()]);
                Session::flash('code', '1');
                $this->redirect('user/index');
            } else {
                Session::flash('code', 'err2');
                $this->redirect('user/add');
            }
        } else {
            $xzv_52 = session('code');
            $xzv_88 = input('msg', '0');
            return view('add', ['code' => $xzv_52, 'msg' => $xzv_88]);
        }
    }
    public function pass_log()
    {
      if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
        $xzv_53 = input('id');
        $xzv_54 = db('pass_log')->where('uid', $xzv_53)->select();
        return view('pass_log', ['list' => $xzv_54]);
    }
    public function update()
    {
      if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
      
        if (request()->isPost()) {
            $xzv_7 = input();
            $xzv_8 = input('page', '');
            $xzv_71['username'] = $xzv_7['name'];
            if ($xzv_7['password']) {
                $xzv_71['password'] = md5(sha1($xzv_7['password']));
                $xzv_57 = db('user')->where('id', session('user'))->value('password');
                if ($xzv_57 != md5(sha1(input('password')))) {
                    db('pass_log')->insert(['ip' => getIP(), 'ctime' => time(), 'uid' => input('id'), 'aid' => session('user'), 'old_pass' => $xzv_57, 'pass' => md5(sha1(input('password'))), 'web' => 0]);
                }
            }
            $xzv_71['power'] = $xzv_7['power'];
            $xzv_71['phone'] = $xzv_7['phone'];
            $xzv_71['ctime'] = time();
            $xzv_45 = db('user')->where('id', $xzv_7['id'])->value('share_ma');
            if (empty($xzv_7['share_ma']) && !$xzv_45) {
                $xzv_71['share_ma'] = rand('100000', '999999');
            } else {
                if (empty($xzv_7['share_ma'])) {
                    if (!$xzv_45) {
                        $xzv_71['share_ma'] = rand('100000', '999999');
                    }
                } else {
                    $xzv_71['share_ma'] = $xzv_7['share_ma'];
                }
            }
            $xzv_91 = db('user')->where('id!=' . $xzv_7['id'] . ' and share_ma="' . $xzv_7['share_ma'] . '"')->count();
            if ($xzv_91 > 0) {
                Session::flash('code', 'err4');
                echo "<script>window.location='/index/user/update/id/" . $xzv_7['id'] . "'</script>";
                exit;
            }
            $xzv_71['weichat'] = $xzv_7['weichat'];
            $xzv_70 = db('user')->where('username="' . $xzv_7['name'] . '" and id!=' . $xzv_7['id'])->count();
            if ($xzv_70 > 0) {
                Session::flash('code', 'err1');
                echo "<script>window.location='/index/user/index/id/" . $xzv_7['id'] . '?page=' . $xzv_8 . "'</script>";
            }
            if (db('user')->where('id', $xzv_7['id'])->update($xzv_71)) {
                Session::flash('code', '2');
                echo "<script>window.location='/index/user/index?page=" . $xzv_8 . "'</script>";
            } else {
                Session::flash('code', 'err2');
                $this->redirect('user/update', ['id' => $xzv_7['id']]);
            }
        } else {
            $xzv_69 = session('code');
            $xzv_44 = input('msg', '0');
            $xzv_7 = db('user')->where('id', input('id'))->find();
            return view('update', ['page' => input('page', '0'), 'data' => $xzv_7, 'code' => $xzv_69, 'msg' => $xzv_44]);
        }
    }
    public function delete()
    {
        $xzv_16 = input('id');
        $xzv_35 = implode(',', array_filter(explode(',', $xzv_16)));
        if (db('user')->where('id in (' . $xzv_35 . ')')->delete()) {
            return json(['code' => '1']);
        } else {
            return json(['code' => '0']);
        }
    }
    public function status()
    {
        $xzv_17 = input('id');
        $xzv_33 = implode(',', array_filter(explode(',', $xzv_17)));
        if (db('user')->where('id in (' . $xzv_33 . ')')->update(['status' => input('status')])) {
            return json(['code' => '1']);
        } else {
            return json(['code' => '0']);
        }
    }
    public function ctime()
    {
        $xzv_38 = input('day') * 60 * 60 * 24;
        $xzv_90 = time() - $xzv_38;
        $xzv_40 = db('user')->where('power=' . input('type') . ' and lasttime>' . $xzv_90)->column('id');
        $xzv_67 = implode(',', $xzv_40);
        db('user')->where('id in (' . $xzv_67 . ')')->setInc('lasttime', $xzv_38);
        return json(1);
    }
    public function money()
    {
        $xzv_11 = input('id');
        if (input('money') < 0) {
            return json(['code' => '0', 'msg' => '充值失败,充值数额违规']);
        }
        $xzv_18 = implode(',', array_filter(explode(',', $xzv_11)));
        if ($xzv_11 == 'all') {
            if (db('user')->where('id>0 and power=' . input('type'))->setInc('money', input('money'))) {
                return json(['code' => '1']);
            } else {
                return json(['code' => '0']);
            }
        } else {
            if (session('power') == '1') {
                $xzv_20 = db('user')->where('id=' . session('user'))->value('money');
                if ($xzv_20 < input('money') * count(array_filter(explode(',', $xzv_11)))) {
                    return json(['code' => '0', 'msg' => '余额不足，请联系管理员充值']);
                }
            }
            if (db('user')->where('id in (' . $xzv_18 . ')')->setInc('money', input('money'))) {
                if (session('power') == '1') {
                    $xzv_20 = db('user')->where('id=' . session('user'))->setDec('money', input('money') * count(array_filter(explode(',', $xzv_11))));
                    db('user')->where('id in (' . $xzv_18 . ')')->update(['parentid' => session('user')]);
                }
                if (session('power') == '0') {
                    $xzv_14 = 60 * 60 * 24 * 30;
                    foreach (array_filter(explode(',', $xzv_11)) as $xzv_83) {
                        $xzv_80 = db('user')->where('id=' . $xzv_83)->value('power');
                        if ($xzv_80 == '1') {
                            $xzv_22 = db('user')->where('id=' . $xzv_83)->value('lasttime');
                            if ($xzv_22 < time()) {
                                db('user')->where('id=' . $xzv_83)->update(['lasttime' => time() + $xzv_14]);
                            } else {
                                db('user')->where('id=' . $xzv_83)->setInc('lasttime', $xzv_14);
                            }
                        }
                    }
                }
                $xzv_25 = array_filter(explode(',', input('id')));
                $xzv_22 = [];
                foreach ($xzv_25 as $xzv_23 => $xzv_83) {
                    $xzv_22['uid'] = session('user');
                    $xzv_22['ctime'] = time();
                    $xzv_22['cid'] = $xzv_83;
                    $xzv_22['money'] = input('money');
                    db('moneylog')->insert($xzv_22);
                }
                return json(['code' => '1']);
            } else {
                return json(['code' => '0', 'msg' => '充值失败']);
            }
        }
    }
    public function omoney()
    {
        $xzv_59 = input('id');
        $xzv_39 = implode(',', array_filter(explode(',', $xzv_59)));
        $xzv_15 = db('user')->where('id', $xzv_39)->value('money');
        if ($xzv_15 < input('money')) {
            return json(['code' => '0', 'msg' => '扣款失败,扣款数额大于用户余额']);
        }
        if (db('user')->where('id in (' . $xzv_39 . ')')->setDec('money', input('money'))) {
            return json(['code' => '1']);
        } else {
            return json(['code' => '0', 'msg' => '扣款失败']);
        }
    }
    public function chong()
    {
        $xzv_10 = input('id');
        $xzv_9 = implode(',', array_filter(explode('-', $xzv_10)));
        $xzv_56 = input('money');
        $xzv_6 = input('ctime');
        if ($xzv_56) {
            $xzv_5 = $xzv_56;
        } else {
            $xzv_5 = $xzv_6;
        }
        if (session('power') == '1') {
            $xzv_86 = db('user')->where('id', session('user'))->value('money');
            if ($xzv_86 < $xzv_5) {
                return json(['code' => '0', 'msg' => '开通失败,您的余额不足']);
            }
        }
        if ($xzv_56) {
            $xzv_21 = '0';
            $xzv_84 = $xzv_56 / 0.5 * 7 * 24 * 60 * 60;
        } else {
            $xzv_21 = '0';
            switch ($xzv_6) {
                case 1:
                    $xzv_84 = 7 * 60 * 60 * 24;
                    break;
                case 3:
                    $xzv_84 = 30 * 60 * 60 * 24;
                    break;
                case 8:
                    $xzv_84 = 90 * 60 * 60 * 24;
                    break;
                case 10:
                    $xzv_84 = 180 * 60 * 60 * 24;
                    break;
                case 18:
                    $xzv_84 = 365 * 60 * 60 * 24;
                    break;
                case 30:
                    $xzv_21 = 1;
                    break;
            }
        }
        if ($xzv_21 == '1') {
            db('user')->where('id in (' . $xzv_9 . ')')->update(['type' => '1']);
            $xzv_0 = db('user')->where('id', $xzv_9)->value('money');
            if (session('power') == '1') {
                $xzv_0 = db('user')->where('id', session('user'))->value('money');
                $xzv_61 = $xzv_0 - $xzv_5;
                db('user')->where('id=' . session('user'))->update(['money' => $xzv_61]);
                db('user')->where('id in (' . $xzv_9 . ')')->update(['parentid' => session('user')]);
            } else {
                $xzv_61 = $xzv_0 - 10;
                db('user')->where('id=' . $xzv_9)->update(['money' => $xzv_61]);
            }
            $xzv_60['uid'] = session('user');
            $xzv_60['cid'] = $xzv_10;
            $xzv_60['ctime'] = time();
            $xzv_60['day'] = 'all';
            $xzv_60['money'] = $xzv_5;
            $xzv_60['lasttime'] = 'all';
            db('timelog')->insert($xzv_60);
        } else {
            $xzv_58 = array_filter(explode('-', $xzv_10));
            foreach ($xzv_58 as $xzv_32) {
                $xzv_86 = db('user')->where('id=' . $xzv_32)->value('lasttime');
                if ($xzv_86 < time()) {
                    db('user')->where('id=' . $xzv_32)->update(['lasttime' => time() + $xzv_84]);
                    $xzv_79 = time() + $xzv_84;
                } else {
                    db('user')->where('id=' . $xzv_32)->setInc('lasttime', $xzv_84);
                    $xzv_28 = db('user')->where('id=' . $xzv_32)->value('lasttime');
                    $xzv_79 = $xzv_28 + $xzv_84;
                }
                $xzv_0 = db('user')->where('id', session('user'))->value('money');
                $xzv_61 = $xzv_0 - $xzv_5;
                if (session('power') == '1') {
                    db('user')->where('id=' . session('user'))->update(['money' => $xzv_61]);
                    db('user')->where('id in (' . $xzv_9 . ')')->update(['parentid' => session('user')]);
                }
                $xzv_84 = $this->timediff($xzv_84);
                $xzv_60['uid'] = session('user');
                $xzv_60['cid'] = $xzv_10;
                $xzv_60['ctime'] = time();
                $xzv_60['day'] = $xzv_84['day'];
                $xzv_60['money'] = $xzv_5;
                $xzv_60['lasttime'] = $xzv_79;
                db('timelog')->insert($xzv_60);
            }
        }
        return json(['code' => '1']);
    }
    function timediff($xzv_63)
    {
        $xzv_31 = intval($xzv_63 / 86400);
        $xzv_62 = $xzv_63 % 86400;
        $xzv_41 = intval($xzv_62 / 3600);
        $xzv_62 = $xzv_62 % 3600;
        $xzv_42 = intval($xzv_62 / 60);
        $xzv_43 = $xzv_62 % 60;
        $xzv_46 = array('day' => $xzv_31, 'hour' => $xzv_41, 'min' => $xzv_42, 'sec' => $xzv_43);
        return $xzv_46;
    }
}