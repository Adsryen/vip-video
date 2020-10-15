<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
class Admin extends Controller
{
    public function _initialize()
    {
        $xzv_0 = session('user');
        if (session('power') != 0) {
            $this->redirect('login/login/index');
        }
        if (!$xzv_0) {
            $this->redirect('login/login/index');
        }
    }
    public function index()
    {
        $xzv_10 = session('code', '');
        $xzv_14 = 'power = 0';
        $xzv_1 = db('user')->where($xzv_14)->order('id desc')->paginate(10);
        return view('index', ['list' => $xzv_1, 'code' => $xzv_10]);
    }
    public function add()
    {
        if (request()->isPost()) {
            $xzv_13 = input();
            $xzv_11['username'] = $xzv_13['name'];
            $xzv_11['password'] = md5(sha1($xzv_13['password']));
            $xzv_11['power'] = '0';
            $xzv_11['status'] = '1';
            $xzv_11['parentid'] = '0';
            $xzv_11['ctime'] = time();
            $xzv_11['logintime'] = '0';
            $xzv_11['lasttime'] = '0';
            $xzv_11['money'] = '0.00';
            $xzv_17 = db('user')->where('username', $xzv_13['name'])->count();
            if ($xzv_17 > 0) {
                Session::flash('code', 'err1');
                $this->redirect('admin/add');
            }
            if (db('user')->insert($xzv_11)) {
                Session::flash('code', '1');
                $this->redirect('admin/index');
            } else {
                Session::flash('code', 'err2');
                $this->redirect('admin/add');
            }
        } else {
            $xzv_16 = session('user');
            $xzv_9 = input('msg', '0');
            return view('add', ['code' => $xzv_16, 'msg' => $xzv_9]);
        }
    }
    public function update()
    {
        if (request()->isPost()) {
            $xzv_8 = input();
            $xzv_2 = input('page', '');
            $xzv_5['username'] = $xzv_8['name'];
            if ($xzv_8['password']) {
                $xzv_5['password'] = md5(sha1($xzv_8['password']));
                $xzv_7 = db('user')->where('id', session('user'))->value('password');
                if ($xzv_7 != md5(sha1(input('password')))) {
                    db('pass_log')->insert(['ip' => getIP(), 'ctime' => time(), 'uid' => input('id'), 'aid' => session('user'), 'old_pass' => $xzv_7, 'pass' => md5(sha1(input('password'))), 'web' => 0]);
                }
            }
            $xzv_5['ctime'] = time();
            $xzv_4 = db('user')->where('username="' . $xzv_8['name'] . '" and id!=' . $xzv_8['id'])->count();
            if ($xzv_4 > 0) {
                Session::flash('code', 'err1');
                echo "<script>window.location='/index/admin/index/id/" . $xzv_8['id'] . '?page=' . $xzv_2 . "'</script>";
            }
            if (db('user')->where('id', $xzv_8['id'])->update($xzv_5)) {
                Session::flash('code', '2');
                echo "<script>window.location='/index/admin/index?page=" . $xzv_2 . "'</script>";
            } else {
                Session::flash('code', 'err2');
                $this->redirect('admin/update', ['id' => $xzv_8['id']]);
            }
        } else {
            $xzv_12 = session('code');
            $xzv_6 = input('msg', '0');
            $xzv_8 = db('user')->where('id', input('id'))->find();
            return view('update', ['page' => input('page', '0'), 'data' => $xzv_8, 'code' => $xzv_12, 'msg' => $xzv_6]);
        }
    }
    public function delete()
    {
        $xzv_3 = input('id');
        $xzv_15 = implode(',', array_filter(explode(',', $xzv_3)));
        if (db('user')->where('id in (' . $xzv_15 . ')')->delete()) {
            return json(['code' => '1']);
        } else {
            return json(['code' => '0']);
        }
    }
}