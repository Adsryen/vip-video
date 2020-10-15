<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
class tuijian extends Controller
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
        $xzv_10 = session('code');
        return view('advert', ['code' => $xzv_10]);
    }
    public function _initialize()
    {
      if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
        $xzv_16 = session('user');
        if (!$xzv_16) {
            $this->redirect('login/login/index');
        }
    }
    public function index()
    {
        $xzv_9 = input('code');
        $xzv_8 = input('msg');
        $xzv_6 = db('tuijian')->order('id desc')->paginate(30);
        return view('index', ['msg' => $xzv_8, 'list' => $xzv_6, 'code' => $xzv_9]);
    }
    public function add()
    {
        $xzv_5 = input('msg');
        return view('add', ['code' => $xzv_5]);
    }
    public function update()
    {
        $xzv_19 = input('msg');
        $xzv_14 = db('tuijian')->where('id', input('id'))->find();
        return view('update', ['data' => $xzv_14, 'code' => $xzv_19]);
    }
    public function del()
    {
        $xzv_11 = db('tuijian')->where('id', input('id'))->delete();
        return redirect('tuijian/index', ['code' => 1, 'msg' => '删除成功']);
    }
    public function create()
    {
        $xzv_15 = request()->file('img');
        if ($xzv_15) {
            $xzv_4 = $xzv_15->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_4) {
                $xzv_20 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_1 = $xzv_4->getExtension();
                $xzv_12 = 'http://959495.xyz/public/uploads/' . $xzv_4->getSaveName();
                if (in_array($xzv_1, $xzv_20)) {
                    $xzv_7['img'] = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_12));
                    $xzv_7['title'] = input('title');
                    $xzv_7['url'] = input('url');
                    if (db('tuijian')->insert($xzv_7) !== false) {
                        return redirect('tuijian/index', ['code' => 1, 'msg' => '添加成功']);
                    } else {
                        unlink($xzv_12);
                        return redirect('tuijian/add', ['code' => 0, 'msg' => '添加失败']);
                    }
                } else {
                    unlink($xzv_12);
                    return redirect('tuijian/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('tuijian/add', ['code' => 0, 'msg' => '上传失败' . $xzv_15->getError()]);
            }
        } else {
            return redirect('tuijian/add', ['code' => 0, 'msg' => '图片未上传']);
        }
    }
    public function edit()
    {
        $xzv_17 = request()->file('img');
        if ($xzv_17) {
            $xzv_13 = $xzv_17->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_13) {
                $xzv_3 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_18 = $xzv_13->getExtension();
                $xzv_2 = '/public/uploads/' . $xzv_13->getSaveName();
                if (in_array($xzv_18, $xzv_3)) {
                    $xzv_0['img'] = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_2));
                } else {
                    unlink($xzv_2);
                    return redirect('tuijian/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('tuijian/add', ['code' => 0, 'msg' => '上传失败' . $xzv_17->getError()]);
            }
        }
        $xzv_0['title'] = input('title');
        $xzv_0['url'] = input('url');
        if (db('tuijian')->where('id', input('id'))->update($xzv_0) !== false) {
            return redirect('tuijian/index', ['code' => 1, 'msg' => '添加成功']);
        } else {
            unlink($xzv_2);
            return redirect('tuijian/add', ['code' => 0, 'msg' => '添加失败']);
        }
    }
}