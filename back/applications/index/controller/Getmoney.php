<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
class Getmoney extends Controller
{
         public function _initialize()
    {
        $xzv_0 = session('user');
        if (!$xzv_0) {
            $this->redirect('login/login/index');
        }
    }
    public function lists()
    {
        return view();
    }
    public function orders()
    {
        if (input('page')) {
            $class = session('power');
            $where = array();
            if ($class != 0) {
                $where['u_id'] = ['=', session('user')];
            }
            if (input('state')) {
                $where['state'] = ['=', input('state')];
            }
            $limit_start = (input('page') - 1) * input('limit');
            $limit_end = input('page') * input('limit');
            $data = db('tixian')->alias('m')->join('ap_user u', 'm.u_id=u.id')->field('m.id,m.create_time,m.number ,u.username,m.state,m.moneys')->where($where)->limit($limit_start, $limit_end)->order('m.id desc')->select();
            foreach ($data as $k => $v) {
                $data[$k]['create_time'] = date('Y-m-d H:i:s', $data[$k]['create_time']);
            }
            $conut = db('tixian')->alias('m')->join('ap_user u', 'm.u_id=u.id')->field('m.id,m.create_time,m.number ,u.username,m.state,m.moneys')->limit($limit_start, $limit_end)->where($where)->order('m.id desc')->count();
            $return_data['code'] = 0;
            $return_data['data'] = $data;
            $return_data['count'] = $conut;
            return $return_data;
        }
    }
    public function update()
    {
        $id = input('id');
        $re = db('tixian')->where('id', $id)->update(['state' => '2']);
        if ($re) {
            return json(['code' => 200]);
        } else {
            return json(['code' => 500]);
        }
    }
    public function tixian()
    {
        $data = db('user')->where('id', session('user'))->find();
        $this->assign('data', $data);
        return view();
    }
    public function save()
    {
        $re = db('user')->where('id', session('user'))->setDec('moneys', input('size'));
        if ($re) {
            $insert['u_id'] = session('user');
            $insert['moneys'] = input('size');
            $insert['create_time'] = time();
            $insert['number'] = input('number');
            $insert['name'] = input('name');
            $re = db('tixian')->insert($insert);
            if ($re) {
                $this->error('提现成功');
            }
        } else {
            $this->error('提现失败');
        }
    }
}