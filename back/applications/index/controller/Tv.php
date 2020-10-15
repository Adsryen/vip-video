<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
class tv extends Controller
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
        $xzv_16 = session('code');
        return view('advert', ['code' => $xzv_16]);
    }
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
    public function index()
    {
        $xzv_5 = input('code');
        $xzv_1 = input('msg');
        $xzv_6 = db('tv')->order('id desc')->paginate(30);
        return view('index', ['msg' => $xzv_1, 'list' => $xzv_6, 'code' => $xzv_5]);
    }
    public function add()
    {
        $xzv_9 = input('msg');
        return view('add', ['code' => $xzv_9]);
    }
    public function update()
    {
        $xzv_7 = input('msg');
        $xzv_10 = db('tv')->where('id', input('id'))->find();
        return view('update', ['data' => $xzv_10, 'code' => $xzv_7]);
    }
    public function del()
    {
        $xzv_11 = db('tv')->where('id', input('id'))->delete();
        return redirect('tv/index', ['code' => 1, 'msg' => '删除成功']);
    }
    public function create()
    {
        $xzv_19 = request()->file('img');
        if ($xzv_19) {
            $xzv_20 = $xzv_19->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_20) {
                $xzv_18 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_13 = $xzv_20->getExtension();
                $xzv_14 = '/public/uploads/' . $xzv_20->getSaveName();
                if (in_array($xzv_13, $xzv_18)) {
                    $xzv_3['img'] = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_14));
                    $xzv_3['title'] = input('title');
                    $xzv_3['url'] = input('url');
                    if (db('tv')->insert($xzv_3) !== false) {
                        return redirect('tv/index', ['code' => 1, 'msg' => '添加成功']);
                    } else {
                        unlink($xzv_14);
                        return redirect('tv/add', ['code' => 0, 'msg' => '添加失败']);
                    }
                } else {
                    unlink($xzv_14);
                    return redirect('tv/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('tv/add', ['code' => 0, 'msg' => '上传失败' . $xzv_19->getError()]);
            }
        } else {
            return redirect('tv/add', ['code' => 0, 'msg' => '图片未上传']);
        }
    }
    public function edit()
    {
        $xzv_15 = request()->file('img');
        if ($xzv_15) {
            $xzv_8 = $xzv_15->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_8) {
                $xzv_17 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_2 = $xzv_8->getExtension();
                $xzv_12 = '/public/uploads/' . $xzv_8->getSaveName();
                if (in_array($xzv_2, $xzv_17)) {
                    $xzv_4['img'] = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_12));
                } else {
                    unlink($xzv_12);
                    return redirect('tv/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('tv/add', ['code' => 0, 'msg' => '上传失败' . $xzv_15->getError()]);
            }
        }
        $xzv_4['title'] = input('title');
        $xzv_4['url'] = input('url');
        if (db('tv')->where('id', input('id'))->update($xzv_4) !== false) {
            return redirect('tv/index', ['code' => 1, 'msg' => '添加成功']);
        } else {
            unlink($xzv_12);
            return redirect('tv/add', ['code' => 0, 'msg' => '添加失败']);
        }
    }
}