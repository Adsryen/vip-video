<?php

namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function _initialize()
    {
        $xzv_0 = session('user');
        if (!$xzv_0) {
            $this->redirect('login/login/index');
        }
    }
    public function index()
    {
      	$time  =  date('Y-m-d');
        if (session('power') == '1' or session('power')=='-1') {
            return view('huan');
        } else {
            $xzv_5 = db('user')->where('(power = 1 or power =2) and logintime >' . strtotime(date('Y-m-d')))->count();
            $xzv_1 = db('user')->where('power = 1')->count();
            $xzv_2 = db('user')->where('power = 2')->count();
            $xzv_3 = db('dianka')->where('yid>1')->count('distinct(yid)');
            $xzv_4 = db('user')->alias('u')->join('timelog t', 't.cid=u.id', 'right')->where('u.power=2')->count();
          	$open = db('opentj')->where('time',$time)->count();
            return view('index', ['fcount' => $xzv_3, 'mcount' => $xzv_2 - $xzv_3, 'tzcount' => $xzv_5, 'dcount' => $xzv_1, 'ycount' => $xzv_2 , 'open' => $open]);
        }
    }
}