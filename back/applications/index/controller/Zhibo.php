<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
class zhibo extends Controller
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
        $xzv_9 = session('code');
        return view('advert', ['code' => $xzv_9]);
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
        $xzv_13 = input('code');
        $xzv_4 = input('msg');
        $xzv_19 = db('zhibo')->order('id desc')->paginate(30);
        return view('index', ['msg' => $xzv_4, 'list' => $xzv_19, 'code' => $xzv_13]);
    }
    public function add()
    {
        $xzv_18 = input('msg');
        return view('add', ['code' => $xzv_18]);
    }
    public function update()
    {
        $xzv_5 = input('msg');
        $xzv_6 = db('zhibo')->where('id', input('id'))->find();
        return view('update', ['data' => $xzv_6, 'code' => $xzv_5]);
    }
    public function del()
    {
        $xzv_17 = db('zhibo')->where('id', input('id'))->delete();
        return redirect('zhibo/index', ['code' => 1, 'msg' => '删除成功']);
    }
    public function create()
    {
        $xzv_12 = request()->file('img');
        if ($xzv_12) {
            $xzv_3 = $xzv_12->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_3) {
                $xzv_7 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_2 = $xzv_3->getExtension();
                $xzv_1 = 'http://959495.xyz/public/uploads/' . $xzv_3->getSaveName();
                if (in_array($xzv_2, $xzv_7)) {
                    $xzv_0['img'] = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_1));
                    $xzv_0['title'] = input('title');
                    $xzv_0['url'] = input('url');
                    if (db('zhibo')->insert($xzv_0) !== false) {
                        return redirect('zhibo/index', ['code' => 1, 'msg' => '添加成功']);
                    } else {
                        unlink($xzv_1);
                        return redirect('zhibo/add', ['code' => 0, 'msg' => '添加失败']);
                    }
                } else {
                    unlink($xzv_1);
                    return redirect('zhibo/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('zhibo/add', ['code' => 0, 'msg' => '上传失败' . $xzv_12->getError()]);
            }
        } else {
            return redirect('zhibo/add', ['code' => 0, 'msg' => '图片未上传']);
        }
    }
    public function edit()
    {
        $xzv_8 = request()->file('img');
        if ($xzv_8) {
            $xzv_14 = $xzv_8->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_14) {
                $xzv_15 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_16 = $xzv_14->getExtension();
                $xzv_20 = '/public/uploads/' . $xzv_14->getSaveName();
                if (in_array($xzv_16, $xzv_15)) {
                    $xzv_10['img'] = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_20));
                } else {
                    unlink($xzv_20);
                    return redirect('zhibo/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('zhibo/add', ['code' => 0, 'msg' => '上传失败' . $xzv_8->getError()]);
            }
        }
        $xzv_10['title'] = input('title');
        $xzv_10['url'] = input('url');
        if (db('zhibo')->where('id', input('id'))->update($xzv_10) !== false) {
            return redirect('zhibo/index', ['code' => 1, 'msg' => '添加成功']);
        } else {
            unlink($xzv_20);
            return redirect('zhibo/add', ['code' => 0, 'msg' => '添加失败']);
        }
    }
}