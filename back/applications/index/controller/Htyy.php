<?php


namespace app\index\controller;

use think\Controller;
class Htyy extends Controller
{
	public function _initialize()
	{
		if (!input('_tokenjinhe')) {
			if (session('power') != '0') {
				$this->redirect('login/login/index');
			}
		}
	}
	public function index()
	{
		if (!empty($_POST['id'])) {
			$_var_0 = $_POST['id'];
			$_var_1 = $_POST['order'];
			foreach ($_var_0 as $_var_2 => $_var_3) {
				db('ping')->where('id', $_var_0[$_var_2])->update(['orderid' => $_var_1[$_var_2]]);
			}
		}
		$_var_4 = db('ping')->order('orderid asc')->select();
		return view('htyy/index', ['list' => $_var_4]);
	}
	public function order()
	{
		$_var_5 = input('id');
		$_var_6 = input('type');
		$_var_7 = db('ping')->where('id', $_var_5)->value('orderid');
		if ($_var_6 == 'up') {
			$_var_8 = db('ping')->where('orderid<' . $_var_7)->order('orderid DESC')->find();
		} else {
			$_var_8 = db('ping')->where('orderid>' . $_var_7)->order('orderid ASC')->find();
		}
		if ($_var_8) {
			db('ping')->where('id', $_var_5)->update(['orderid' => $_var_8['orderid']]);
			db('ping')->where('id', $_var_8['id'])->update(['orderid' => $_var_7]);
		}
		return json('true');
	}
	public function z()
	{
		$_var_9 = ROOT_PATH . 'readtxt/name.txt';
		$_var_10 = file_get_contents($_var_9);
		$_var_11 = @mb_convert_encoding($_var_10, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
		$_var_12 = array_filter(explode('
', $_var_11));
		$_var_13 = [];
		for ($_var_14 = 0; $_var_14 < count($_var_12); $_var_14++) {
			if (empty($_var_12[$_var_14])) {
				continue;
			}
			unset($_var_15);
			unset($_var_16);
			unset($_var_17);
			$_var_16 = explode('[', $_var_12[$_var_14]);
			$_var_15['name'] = $_var_16[0];
			$_var_17 = db('ping')->where('name', $_var_15['name'])->count();
			if ($_var_17 == '0') {
				$_var_18 = db('ping')->order('orderid desc')->value('orderid');
				$_var_15['orderid'] = empty($_var_18) || $_var_18 == 0 ? 1 : $_var_18 + 1;
				db('ping')->insert($_var_15);
			}
			$_var_13[] = $_var_16[0];
		}
		$_var_19 = db('ping')->column('id,name');
		$_var_20 = array_diff($_var_19, $_var_13);
		foreach ($_var_19 as $_var_21 => $_var_22) {
			if (in_array($_var_22, $_var_20)) {
				$_var_23 = db('ping')->where('name', $_var_19[$_var_21])->count();
				if ($_var_23 > 0) {
					db('ping')->where('id', $_var_21)->delete();
				}
			}
		}
	}
	public function ccc()
	{
		echo '程序运行中';
		$_var_24 = ROOT_PATH . 'readtxt/name.txt';
		ignore_user_abort();
		set_time_limit(0);
		$_var_25 = 5;
		do {
			$_var_26 = file_get_contents($_var_24);
			$_var_27 = mb_convert_encoding($_var_26, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
			$_var_28 = array_filter(explode('
', $_var_27));
			$_var_29 = [];
			for ($_var_30 = 0; $_var_30 < count($_var_28); $_var_30++) {
				if (empty($_var_28[$_var_30])) {
					continue;
				}
				unset($_var_31);
				unset($_var_32);
				unset($_var_33);
				$_var_32 = explode('[', $_var_28[$_var_30]);
				$_var_31['name'] = $_var_32[0];
				$_var_33 = db('ping')->where('name', $_var_31['name'])->count();
				if ($_var_33 == '0') {
					$_var_34 = db('ping')->order('orderid desc')->value('orderid');
					$_var_31['orderid'] = empty($_var_34) || $_var_34 == 0 ? 1 : $_var_34 + 1;
					db('ping')->insert($_var_31);
				}
				$_var_29[] = $_var_32[0];
			}
			$_var_35 = db('ping')->column('id,name');
			$_var_36 = array_diff($_var_35, $_var_29);
			foreach ($_var_35 as $_var_37 => $_var_38) {
				if (in_array($_var_38, $_var_36)) {
					$_var_39 = db('ping')->where('name', $_var_35[$_var_37])->count();
					if ($_var_39 > 0) {
						db('ping')->where('id', $_var_37)->delete();
					}
				}
			}
			sleep($_var_25);
		} while (true);
	}
	public function lie()
	{
		$_var_40 = input();
		if (!empty($_var_40['name'])) {
			$_var_41 = $_var_40['name'];
			db('stop')->where('pid', input('pid'))->delete();
			foreach ($_var_41 as $_var_42) {
				if ($_var_42) {
					db('stop')->insert(['name' => $_var_42, 'pid' => input('pid'), 'type' => input('_tokenjinhe') ? '2' : '1']);
				}
			}
		}
		$_var_43 = input('pid');
		if (input('_tokenjinhe')) {
			$_var_41 = db('stop')->where(['pid' => $_var_43, 'type' => 2])->order('id asc')->select();
		} else {
			$_var_41 = db('stop')->where(['pid' => $_var_43, 'type' => 1])->order('id asc')->select();
		}
		return view('htyy/lie', ['list' => $_var_41, '_tokenjinhe' => input('_tokenjinhe'), 'pid' => $_var_43]);
	}
}