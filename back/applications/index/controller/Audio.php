<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
class Audio extends Controller
{
    public function _initialize()
    {
      if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
        $xzv_19 = session('user');
        if (!$xzv_19) {
            $this->redirect('login/login/index');
        }
    }
    public function index()
    {
        $xzv_10 = input('code');
        $xzv_1 = input('msg');
        $xzv_18 = db('audio')->order('id desc')->paginate(10);
        return view('index', ['msg' => $xzv_1, 'list' => $xzv_18, 'code' => $xzv_10]);
    }
    public function add()
    {
        $xzv_17 = input('msg');
        return view('add', ['code' => $xzv_17]);
    }
    public function update()
    {
        $xzv_9 = input('msg');
        $xzv_20 = db('audio')->where('id', input('id'))->find();
        return view('update', ['data' => $xzv_20, 'code' => $xzv_9]);
    }
    public function delete()
    {
        $xzv_11 = input('id');
        $xzv_13 = implode(',', array_filter(explode(',', $xzv_11)));
        if (db('audio')->where('id in (' . $xzv_13 . ')')->delete()) {
            return json(['code' => '1']);
        } else {
            return json(['code' => '0']);
        }
    }
    public function create()
    {
        $xzv_0 = request()->file('picurl');
        if ($xzv_0) {
            $xzv_14 = $xzv_0->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_14) {
                $xzv_8 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_15 = $xzv_14->getExtension();
                $xzv_3 = '/public/uploads/' . $xzv_14->getSaveName();
                if (!in_array($xzv_15, $xzv_8)) {
                    unlink($xzv_3);
                    return redirect('audio/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            }
            $xzv_7 = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_3));
        }
        $xzv_21['picurl'] = !empty($xzv_7) ? $xzv_7 : input('picurl1');
        $xzv_21['name'] = input('name');
        $xzv_21['audio'] = input('audio');
        if (db('audio')->insert($xzv_21) !== false) {
            return redirect('audio/index', ['code' => 1, 'msg' => '添加成功']);
        } else {
            if (!empty($xzv_3)) {
                unlink($xzv_3);
            }
            return redirect('audio/add', ['code' => 0, 'msg' => '添加失败']);
        }
    }
    public function edit()
    {
        $xzv_6 = request()->file('picurl');
        if ($xzv_6) {
            $xzv_16 = $xzv_6->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_16) {
                $xzv_2 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_22 = $xzv_16->getExtension();
                $xzv_12 = '/public/uploads/' . $xzv_16->getSaveName();
                if (!in_array($xzv_22, $xzv_2)) {
                    unlink($xzv_12);
                    return redirect('audio/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            }
            $xzv_5 = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_12));
        }
        $xzv_4['picurl'] = !empty($xzv_5) ? $xzv_5 : input('picurl1');
        $xzv_4['name'] = input('name');
        $xzv_4['audio'] = input('audio');
        if (db('audio')->where('id', input('id'))->update($xzv_4) !== false) {
            return redirect('audio/index', ['code' => 1, 'msg' => '修改成功']);
        } else {
            if (!empty($xzv_12)) {
                unlink($xzv_12);
            }
            return redirect('audio/update', ['code' => 0, 'msg' => '修改失败']);
        }
    }
}