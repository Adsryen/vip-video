<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
class Banner extends Controller
{
    public function _initialize()
    {

        $xzv_15 = session('user');
        if (!$xzv_15) {
            $this->redirect('login/login/index');
        }
    }
    public function index()
    {
        $xzv_16 = input('code');
        $xzv_29 = input('msg');
        $xzv_1 = input('id');
      	$uid = session('user');
      
      if($uid == 1){
        if ($xzv_1) {
            $xzv_20 = db('banner')->where('cid', $xzv_1)->order('sort asc')->paginate(10);
        } else {
            $xzv_20 = db('banner')->order('sort asc')->paginate(10);
        }
      }else{
      	if ($xzv_1) {
          	$where['cid'] = $xzv_1;
          	$where['uid'] = $uid;
            $xzv_20 = db('banner')->where($where)->order('sort asc')->paginate(10);
        } else {
            $xzv_20 = db('banner')->where('uid',$uid)->order('sort asc')->paginate(10);
        }
      }
        $xzv_19 = db('category')->order('id asc')->paginate(12);
        return view('index', ['msg' => $xzv_29, 'list' => $xzv_20, 'category' => $xzv_19, 'code' => $xzv_16]);
    }
    public function add()
    {
       $_var_6 = input('msg');
		$_var_7 = input('cid');
		$_var_8 = input('name');
		$_var_9 = input('sort');
      	// add widuu
        $uid = session('user');
      	$user = db('user')->field('power,id')->find(session('user'));
      $cate = db('user')->where('id',session('user'))->find();
     	if( intval($user['power']) == 1 ){
             $_var_10 = db('category')->where(['id'=>['in',$cate['cate']]])->order('id asc')->paginate(15);
        }else{
        	$_var_10 = db('category')->order('id asc')->paginate(15);
        }
      	// end widuu
		//$_var_10 = db('category')->order('id asc')->paginate(15);
		return view('add', ['code' => $_var_6, 'cid' => $_var_7, 'name' => $_var_8, 'category' => $_var_10, 'sort' => $_var_9,'uid'=>session('user')]);
    }
    public function update()
    {
      	$qx = db('banner')->where('id',input('id'))->find();
      if(session('power')!=0){
       if($qx['uid']!=session('user')){
       	echo "请勿跨权";die;
       }
      }
        $xzv_9 = input('msg');
        $xzv_21 = input('cid');
        $xzv_12 = input('name');
        $xzv_4 = input('sort');
      	$uid = session('user');
      	if(session('power') == 0){
          	$xzv_10 = db('banner')->where('id', input('id'))->find();
        	$xzv_13 = db('category')->order('id asc')->paginate(12);
        }else{
          	$where['id'] = input('id');
          	$where['uid'] = $uid;
        	$xzv_10 = db('banner')->where($where)->find();
        	$xzv_13 = db('category')->order('id asc')->paginate(12);
        }

        return view('update', ['data' => $xzv_10, 'code' => $xzv_9, 'cid' => $xzv_21, 'name' => $xzv_12, 'c' => $xzv_10['cid'], 'category' => $xzv_13, 'sort' => $xzv_4]);
    }
    public function del()
    {
        $xzv_11 = db('banner')->where('id', input('id'))->find();
      	$where['id'] = input('id');
      	$where['uid'] = session('user');
        if(session('power')!=0){
            $xzv_22 = db('banner')->where($where)->delete();
        }else{
        	$xzv_22 = db('banner')->where('id', input('id'))->delete();
        }
        return redirect('/index/banner/index/id/' . $xzv_11['cid'], ['code' => 1, 'msg' => '删除成功']);
    }
    public function create()
    {
        $xzv_23 = request()->file('picurl');
        if ($xzv_23) {
            $xzv_99 = ['image/gif', 'image/jpeg', 'image/png', 'image/bmp', 'image/jpg'];
            if(!in_array($_FILES['picurl']['type'],$xzv_99))
            {
                return redirect('banner/add', ['code' => 0, 'msg' => '请勿非法上传']);die;
            }
            $xzv_24 = $xzv_23->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_24) {
                $xzv_25 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_26 = $xzv_24->getExtension();
                $xzv_3 = '/public/uploads/' . $xzv_24->getSaveName();
                if (in_array($xzv_26, $xzv_25)) {
                    $xzv_14['picurl'] = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_3));
                    $xzv_14['content'] = input('content');
                    $xzv_14['linkurl'] = input('linkurl');
                    $xzv_14['cid'] = input('cid');
                  	$xzv_14['uid'] = session('user');
                    $xzv_14['name'] = input('name');
                    $xzv_14['sort'] = input('sort');
                    if (db('banner')->insert($xzv_14) !== false) {
                        return redirect('banner/index', ['id' => $xzv_14['cid']]);
                    } else {
                        unlink($xzv_3);
                        return redirect('banner/add', ['code' => 0, 'msg' => '添加失败']);
                    }
                } else {
                    unlink($xzv_3);
                    return redirect('banner/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('banner/add', ['code' => 0, 'msg' => '上传失败' . $xzv_23->getError()]);
            }
        } else {
            return redirect('banner/add', ['code' => 0, 'msg' => '图片未上传']);
        }
    }
    public function edit()
    {
      $qx = db('banner')->where('id',input('id'))->find();
      if(session('power')!=0){
       if($qx['uid']!=session('user')){
       	echo "请勿跨权";die;
       }
      }
        $xzv_8 = request()->file('picurl');
        if ($xzv_8) {
          	$xzv_99 = ['image/gif', 'image/jpeg', 'image/png', 'image/bmp', 'image/jpg'];
            if(!in_array($_FILES['picurl']['type'],$xzv_99))
            {
                return redirect('banner/add', ['code' => 0, 'msg' => '请勿非法上传']);die;
            }
            $xzv_7 = $xzv_8->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_7) {
                $xzv_6 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_28 = $xzv_7->getExtension();
                $xzv_5 = '/public/uploads/' . $xzv_7->getSaveName();
                if (in_array($xzv_28, $xzv_6)) {
                    $xzv_30['picurl'] = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_5));
                } else {
                    unlink($xzv_5);
                    return redirect('banner/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('banner/add', ['code' => 0, 'msg' => '上传失败' . $xzv_8->getError()]);
            }
        }
        $xzv_30['content'] = input('content');
        $xzv_30['linkurl'] = input('linkurl');
        $xzv_30['cid'] = input('cid');
        $xzv_30['name'] = input('name');
        $xzv_30['sort'] = input('sort');
        if (db('banner')->where('id', input('id'))->update($xzv_30) !== false) {
            return redirect('banner/index', ['code' => 1, 'msg' => '添加成功']);
        } else {
            unlink($xzv_5);
            return;
        }
    }
}