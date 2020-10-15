<?php
namespace app\app\controller;
use app\XDeode;
use think\Controller;
class Nav extends Controller
{

	   public function index()
    {
        
        $cid       =   input('cid');
        //$name      =   input('name');
        //$sort      =  input('sort');
        $list['vip']      =   db('banner')->where('cid',2)->order('sort desc')->paginate(12);
        $list['tj']      =   db('banner')->where('cid',3)->order('sort desc')->paginate(4);
        $list['banner']      =   db('banner')->where('cid',1)->order('sort desc')->paginate(4);

        //var_dump($list);exit();
        // return view('index',[
        //     'msg'   =>  $msg,
        //     'list'  =>  $list,
        //     'code'  =>  $code
        // ]);
        echo json_encode($list,JSON_UNESCAPED_UNICODE);
    }
       public function fl()
    {
        
        $cid       =   input('cid');
        //$name      =   input('name');
        //$sort      =  input('sort');
        $list      =   db('banner')->where('cid',6)->order('id desc')->paginate(8);


        //var_dump($list);exit();
        // return view('index',[
        //     'msg'   =>  $msg,
        //     'list'  =>  $list,
        //     'code'  =>  $code
        // ]);
        echo json_encode($list,JSON_UNESCAPED_UNICODE);
    }
  



}
