<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
use think\Request;

class Classs extends  Controller
{
     public function _initialize()
    {
       if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
        $xzv_0 = session('user');
        if (!$xzv_0) {
            $this->redirect('login/login/index');
        }
    }
	public function index(){
		$data=db('rebate')->where('id',1)->find();
		$this->assign('data',$data);
		return view();
	}
	public function save(){
		$data=input();
		$re=db('rebate')->where('id',1)->update($data);
		if($re){
			$this->error('修改成功');
		}else{
			$this->error('修改失败');
		}
		}
}
