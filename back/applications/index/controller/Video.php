<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
class Video extends Controller
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
        $xzv_3 = session('code');
        return view('advert', ['code' => $xzv_3]);
    }
    public function _initialize()
    {
      if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
        $xzv_11 = session('user');
        if (!$xzv_11) {
            $this->redirect('login/login/index');
        }
    }
    public function index()
    {
        $xzv_4 = input('code');
        $xzv_16 = input('msg');
        $xzv_13 = db('video')->order('id desc')->paginate(30);
        return view('index', ['msg' => $xzv_16, 'list' => $xzv_13, 'code' => $xzv_4]);
    }
    public function add()
    {
        $xzv_2 = input('msg');
        return view('add', ['code' => $xzv_2]);
    }
    public function update()
    {
        $xzv_20 = input('msg');
        $xzv_6 = db('video')->where('id', input('id'))->find();
        return view('update', ['data' => $xzv_6, 'code' => $xzv_20]);
    }
    public function del()
    {
        $xzv_7 = db('video')->where('id', input('id'))->delete();
        return redirect('video/index', ['code' => 1, 'msg' => '删除成功']);
    }
    public function create()
    {

        $xzv_12 = request()->file('img');
        if ($xzv_12) {
            $xzv_10 = $xzv_12->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_10) {
                $xzv_0 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_9 = $xzv_10->getExtension();
                $xzv_5 = '/public/uploads/' . $xzv_10->getSaveName();
                if (in_array($xzv_9, $xzv_0)) {
                  	$img = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_5));
                    $xzv_14['img'] = "http://".$_SERVER['HTTP_HOST'].$img;

                    $xzv_14['title'] = input('title');
                    $xzv_14['url'] = input('url');
                    if (db('video')->insert($xzv_14) !== false) {
                        return redirect('video/index', ['code' => 1, 'msg' => '添加成功']);
                    } else {
                        unlink($xzv_5);
                        return redirect('video/add', ['code' => 0, 'msg' => '添加失败']);
                    }
                } else {
                    unlink($xzv_5);
                    return redirect('video/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('video/add', ['code' => 0, 'msg' => '上传失败' . $xzv_12->getError()]);
            }
        } else {
            return redirect('video/add', ['code' => 0, 'msg' => '图片未上传']);
        }
    }
    public function edit()
    {
        $xzv_1 = request()->file('img');
        if ($xzv_1) {
            $xzv_15 = $xzv_1->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_15) {
                $xzv_8 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_17 = $xzv_15->getExtension();
                $xzv_18 = '/public/uploads/' . $xzv_15->getSaveName();
                if (in_array($xzv_17, $xzv_8)) {
                    $xzv_19['img'] = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_18));
                } else {
                    unlink($xzv_18);
                    return redirect('video/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('video/add', ['code' => 0, 'msg' => '上传失败' . $xzv_1->getError()]);
            }
        }
        $xzv_19['title'] = input('title');
        $xzv_19['url'] = input('url');
        if (db('video')->where('id', input('id'))->update($xzv_19) !== false) {
            return redirect('video/index', ['code' => 1, 'msg' => '添加成功']);
        } else {
            unlink($xzv_18);
            return redirect('video/add', ['code' => 0, 'msg' => '添加失败']);
        }
    }
}