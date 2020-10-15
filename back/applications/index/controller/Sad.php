<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
class Sad extends Controller
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
    public function index()
    {
        $xzv_6 = input('code');
        $xzv_11 = input('msg');
        $xzv_18 = db('sad')->order('id desc')->paginate(10);
        return view('index', ['msg' => $xzv_11, 'list' => $xzv_18, 'code' => $xzv_6]);
    }
    public function add()
    {
        $xzv_17 = input('msg');
        return view('add', ['code' => $xzv_17]);
    }
    public function update()
    {
        $xzv_2 = input('msg');
        $xzv_10 = db('sad')->where('id', input('id'))->find();
        return view('update', ['data' => $xzv_10, 'code' => $xzv_2]);
    }
    public function del()
    {
        $xzv_9 = db('sad')->where('id', input('id'))->delete();
        return redirect('sad/index', ['code' => 1, 'msg' => '删除成功']);
    }
    public function create()
    {
        $xzv_3 = request()->file('picurl');
        if ($xzv_3) {
            $xzv_12 = $xzv_3->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_12) {
                $xzv_8 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_5 = $xzv_12->getExtension();
                $xzv_13 = '/public/uploads/' . $xzv_12->getSaveName();
                if (in_array($xzv_5, $xzv_8)) {
                    $xzv_14['picurl'] = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_13));
                    $xzv_14['content'] = input('content');
                    $xzv_14['title'] = input('title');
                    $xzv_14['linkurl'] = input('linkurl');
                    if (db('sad')->insert($xzv_14) !== false) {
                        return redirect('sad/index', ['code' => 1, 'msg' => '添加成功']);
                    } else {
                        unlink($xzv_13);
                        return redirect('sad/add', ['code' => 0, 'msg' => '添加失败']);
                    }
                } else {
                    unlink($xzv_13);
                    return redirect('sad/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('sad/add', ['code' => 0, 'msg' => '上传失败' . $xzv_3->getError()]);
            }
        } else {
            return redirect('sad/add', ['code' => 0, 'msg' => '图片未上传']);
        }
    }
    public function edit()
    {
        $xzv_15 = request()->file('picurl');
        if ($xzv_15) {
            $xzv_16 = $xzv_15->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($xzv_16) {
                $xzv_7 = ['gif', 'jpeg', 'png', 'bmp', 'jpg'];
                $xzv_4 = $xzv_16->getExtension();
                $xzv_1 = '/public/uploads/' . $xzv_16->getSaveName();
                if (in_array($xzv_4, $xzv_7)) {
                    $xzv_19['picurl'] = str_replace('\\', '/', str_replace('\\\\', '/', $xzv_1));
                } else {
                    unlink($xzv_1);
                    return redirect('sad/add', ['code' => 0, 'msg' => '请上传图片']);
                }
            } else {
                return redirect('sad/add', ['code' => 0, 'msg' => '上传失败' . $xzv_15->getError()]);
            }
        }
        $xzv_19['content'] = input('content');
        $xzv_19['title'] = input('title');
        $xzv_19['linkurl'] = input('linkurl');
        if (db('sad')->where('id', input('id'))->update($xzv_19) !== false) {
            return redirect('sad/index', ['code' => 1, 'msg' => '添加成功']);
        } else {
            unlink($xzv_1);
            return redirect('sad/add', ['code' => 0, 'msg' => '添加失败']);
        }
    }
}