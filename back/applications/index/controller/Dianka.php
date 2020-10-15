<?php


namespace app\index\controller;

use think\Config;
use think\Controller;
class Dianka extends Controller
{
	public function _initialize()
	{
		$_var_0 = session('user');
		if (!$_var_0) {
			$this->redirect('login/login/index');
		}
	}
	public function index()
	{
		$_var_1 = input('dian');
		if (empty($_var_1)) {
			$_var_1 = [];
		}
        $price=Config::get('kmprice');
		return view('index', ['dian' => $_var_1,'price'=>$price]);
	}
	public function ylog()
	{
		if (session('power') == '0') {
			$_var_2['y'] = '0';
		} else {
			$_var_2['uid'] = session('user');
			$_var_2['y'] = '0';
		}
		if (input('user')) {
			$_var_3 = input('user');
			$_var_2['dianka'] = ['like', "%{$_var_3}%"];
		}
		if (input('start') && input('end')) {
			$_var_2['ctime'] = ['between', strtotime(input('start') . ' 00:00:00') . ',' . strtotime(input('end') . ' 00:00:00')];
		} else {
			if (input('start')) {
				$_var_2['ctime'] = ['>', strtotime(input('start') . ' 00:00:00')];
			}
			if (input('end')) {
				$_var_2['ctime'] = ['<', strtotime(input('end') . ' 00:00:00')];
			}
		}
		if (input('day')) {
			$_var_2['name'] = input('day');
		}
		$_var_4 = db('dianka')->where($_var_2)->paginate(1000);//修改有效点卡显示行数
		return view('ylog', ['start' => input('start'), 'day' => input('day'), 'end' => input('end'), 'user' => input('user'), 'list' => $_var_4]);
	}
	public function slog()
	{
		if (session('power') == '0') {
			$_var_5['y'] = '1';
		} else {
			$_var_5['uid'] = session('user');
			$_var_5['y'] = '1';
		}
		if (input('user')) {
			$_var_6 = input('user');
			$_var_5['dianka'] = ['like', "%{$_var_6}%"];
		}
		$_var_7 = db('dianka')->where($_var_5)->paginate(20);
		return view('slog', ['list' => $_var_7]);
	}
	public function sheng()
	{
		if (input('fen') && input('ctime')) {
			$_var_8 = ceil(input('fen'));
			$_var_9 = input('ctime');
			$_var_10 = '0';
			switch ($_var_9) {
				case 'zhou':
					$_var_11 = 7 * 60 * 60 * 24;
					$_var_12 = '体验卡';
					break;
				case 'yue':
					$_var_11 = 30 * 60 * 60 * 24;
					$_var_12 = '月卡';
					break;
				case 'ji':
					$_var_11 = 90 * 60 * 60 * 24;
					$_var_12 = '季卡';
					break;
				case 'ban':
					$_var_11 = 180 * 60 * 60 * 24;
					$_var_12 = '半年卡';
					break;
				case 'nian':
					$_var_11 = 365 * 60 * 60 * 24;
					$_var_12 = '年卡';
					break;
				case 'zhong':
					$_var_10 = 1;
					$_var_11 = 0;
					$_var_12 = '永久';
					break;
			}
			$_var_13 = '';
			if (session('power') == '0') {
				for ($_var_14 = 0; $_var_14 < $_var_8; $_var_14++) {
					$_var_15 = randstring(6);
					$_var_16['uid'] = session('user');
					$_var_16['dianka'] = $_var_15;
					$_var_16['ctime'] = time();
					$_var_16['y'] = 0;
					$_var_16['yid'] = '';
					$_var_16['time'] = $_var_11;
					$_var_16['type'] = $_var_10;
					$_var_16['name'] = $_var_12;
					db('dianka')->insert($_var_16);
					$_var_13 .= $_var_15 . '<br><hr>';
				}
			} else {
				$_var_17 = db('user')->where('id', session('user'))->value('money');
                $_var_9=Config::get('kmprice')[$_var_9];
				if ($_var_17 < $_var_8 * $_var_9) {
					$_var_18 = ['code' => 0, 'dian' => '提卡余额不足 请加客服充值'];
					return json($_var_18);
				}
				$_var_13 = '';
				for ($_var_14 = 0; $_var_14 < $_var_8; $_var_14++) {
					$_var_15 = randstring(6);
					$_var_16['uid'] = session('user');
					$_var_16['dianka'] = $_var_15;
					$_var_16['ctime'] = time();
					$_var_16['y'] = 0;
					$_var_16['yid'] = '';
					$_var_16['time'] = $_var_11;
					$_var_16['type'] = $_var_10;
					$_var_16['name'] = $_var_12;
					db('dianka')->insert($_var_16);
					$_var_13 .= $_var_15 . '<br><hr>';
				}
				db('user')->where('id', session('user'))->update(['money' => $_var_17 - $_var_8 * $_var_9]);
			}
		} else {
			$_var_13 = '';
		}
		if (empty($_var_19)) {
			$_var_18 = ['code' => 1, 'dian' => $_var_13];
		} else {
			$_var_18 = ['code' => 0, 'dian' => $_var_13];
		}
		return json($_var_18);
	}
	public function dangesheng()
	{
		if (input('fen') && input('ctime')) {
			$_var_20 = ceil(input('fen'));
			$_var_21 = input('ctime');
			$_var_22 = '0';
			switch ($_var_21) {
				case 'zhou':
					$_var_23 = 7 * 60 * 60 * 24;
					$_var_24 = '体验卡';
					break;
				case 'yue':
					$_var_23 = 30 * 60 * 60 * 24;
					$_var_24 = '月卡';
					break;
				case 'ji':
					$_var_23 = 90 * 60 * 60 * 24;
					$_var_24 = '季卡';
					break;
				case 'ban':
					$_var_23 = 180 * 60 * 60 * 24;
					$_var_24 = '半年卡';
					break;
				case 'nian':
					$_var_23 = 365 * 60 * 60 * 24;
					$_var_24 = '年卡';
					break;
				case 'zhong':
					$_var_22 = 1;
					$_var_23 = 0;
					$_var_24 = '永久';
					break;
			}
			$_var_25 = '';
			if (session('power') == '0') {
				for ($_var_26 = 0; $_var_26 < $_var_20; $_var_26++) {
					$_var_27 = randstring(6);
					$_var_28['uid'] = session('user');
					$_var_28['dianka'] = $_var_27;
					$_var_28['ctime'] = time();
					$_var_28['y'] = 0;
					$_var_28['yid'] = '';
					$_var_28['time'] = $_var_23;
					$_var_28['type'] = $_var_22;
					$_var_28['name'] = $_var_24;
					db('dianka')->insert($_var_28);
					$_var_25 .= $_var_27;
				}
			} else {
				$_var_29 = db('user')->where('id', session('user'))->value('money');
                $_var_21=Config::get('kmprice')[$_var_21];
				if ($_var_29 < $_var_20 * $_var_21) {
					$_var_30 = ['code' => 0, 'dian' => '提卡余额不足 请加客服充值'];
					return json($_var_30);
				}
				$_var_25 = '';
				for ($_var_26 = 0; $_var_26 < $_var_20; $_var_26++) {
					$_var_27 = randstring(6);
					$_var_28['uid'] = session('user');
					$_var_28['dianka'] = $_var_27;
					$_var_28['ctime'] = time();
					$_var_28['y'] = 0;
					$_var_28['yid'] = '';
					$_var_28['time'] = $_var_23;
					$_var_28['type'] = $_var_22;
					$_var_28['name'] = $_var_24;
					db('dianka')->insert($_var_28);
					$_var_25 .= $_var_27;
				}
				db('user')->where('id', session('user'))->update(['money' => $_var_29 - $_var_20 * $_var_21]);
			}
		} else {
			$_var_25 = '';
		}
		if (empty($_var_31)) {
			$_var_30 = ['code' => 1, 'dian' => $_var_25];
		} else {
			$_var_30 = ['code' => 0, 'dian' => $_var_25];
		}
		return json($_var_30);
	}
}