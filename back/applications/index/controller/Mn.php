<?php


namespace app\index\controller;

use think\Controller;
use think\Session;
class mn extends Controller
{
	public function advert()
	{
		if (request()->Post()) {
			db('advert')->where('id', 14)->update(['title' => input('fxpic1')]);
			db('advert')->where('id', 15)->update(['title' => input('fxurl1')]);
			db('advert')->where('id', 16)->update(['title' => input('fxpic2')]);
			db('advert')->where('id', 17)->update(['title' => input('fxurl2')]);
			Session::flash('code', '1');
			$this->redirect('vip/advert');
		}
		$_var_0 = session('code');
		return view('advert', ['code' => $_var_0]);
	}
	public function _initialize()
	{
      if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
		$_var_1 = session('user');
		if (!$_var_1) {
			$this->redirect('login/login/index');
		}
	}
	public function index()
	{
		$_var_2 = input('code');
		$_var_3 = input('msg');
		$_var_4 = db('mn')->order('id desc')->paginate(30);
		return view('index', ['msg' => $_var_3, 'list' => $_var_4, 'code' => $_var_2]);
	}
	public function add()
	{
		$_var_5 = input('msg');
		return view('add', ['code' => $_var_5]);
	}
	public function update()
	{
		$_var_6 = input('msg');
		$_var_7 = db('mn')->where('id', input('id'))->find();
		return view('update', ['data' => $_var_7, 'code' => $_var_6]);
	}
	public function del()
	{
		$_var_8 = db('mn')->where('id', input('id'))->delete();
		return redirect('mn/index', ['code' => 1, 'msg' => '删除成功']);
	}
	public function create()
	{
		$_var_9['img'] = input('img');
		$_var_9['title'] = input('title');
		$_var_9['url'] = input('url');
		if (db('mn')->insert($_var_9) !== false) {
			return redirect('mn/index', ['code' => 1, 'msg' => '添加成功']);
		} else {
			unlink($_var_10);
			return redirect('mn/add', ['code' => 0, 'msg' => '添加失败']);
		}
	}
	public function edit()
	{
		$_var_11 = request()->file('img');
		if ($_var_11) {
			$_var_12 = $_var_11->move(ROOT_PATH . 'public' . DS . 'uploads');
			if ($_var_12) {
				$_var_13 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
				$_var_14 = $_var_12->getExtension();
				$_var_15 = '/public/uploads/' . $_var_12->getSaveName();
				if (in_array($_var_14, $_var_13)) {
					$_var_16['img'] = str_replace('\\', '/', str_replace('\\\\', '/', $_var_15));
				} else {
					unlink($_var_15);
					return redirect('mn/add', ['code' => 0, 'msg' => '请上传图片']);
				}
			} else {
				return redirect('mn/add', ['code' => 0, 'msg' => '上传失败' . $_var_11->getError()]);
			}
		}
		$_var_16['title'] = input('title');
		$_var_16['url'] = input('url');
		if (db('mn')->where('id', input('id'))->update($_var_16) !== false) {
			return redirect('mn/index', ['code' => 1, 'msg' => '添加成功']);
		} else {
			unlink($_var_15);
			return redirect('mn/add', ['code' => 0, 'msg' => '添加失败']);
		}
	}
}