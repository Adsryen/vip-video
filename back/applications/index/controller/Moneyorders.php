<?php
namespace app\index\controller;

use think\Controller;
use think\Session;

class Moneyorders extends Controller{
        public function _initialize()
    {
        $xzv_0 = session('user');
        if (!$xzv_0) {
            $this->redirect('login/login/index');
        }
    }
  
  
  
  
  
  public function  lists(){
     
        return view();
    }
     public function orders(){
        if(input('page')){
            $class=session('power');
          
            $where=array();
            if($class!=0){
                $where['get_u_id']=['=',session('user')];
            }
          
            if(input('order_id')){
                $where['order_id']=['=',input('order_id')];
            }

         $limit_start=(input('page')-1)*input('limit');
        $limit_end=input('page')*input('limit');
        $data = db('money_get')
        ->alias('m')
        ->join('ap_user u','m.u_id=u.id')
        ->join('ap_user x','m.get_u_id=x.id')
        ->where($where)
        ->field('m.order_id ,m.id,m.create_time,u.username ,x.username as username2,m.type,m.money')
        ->limit($limit_start,$limit_end)
        ->where($where)
        ->order('m.id desc')
        ->select();  
        foreach($data as $k=>$v){
                $data[$k]['create_time']=date('Y-m-d H:i:s',$data[$k]['create_time']);
        }
        $conut = db('money_get')
        ->alias('m')
        ->join('ap_user u','m.u_id=u.id')
        ->join('ap_user x','m.get_u_id=x.id')
        ->where($where)
        ->field('m.order_id ,m.id,m.create_time,u.username ,x.username as username2,m.type,m.money')
        ->limit($limit_start,$limit_end)
        ->where($where)
        ->order('m.id desc')
        ->count();   
        $return_data['code']=0;
        $return_data['data']=$data;
        $return_data['count']=$conut;
        return $return_data;
        }
     }
    

    
}