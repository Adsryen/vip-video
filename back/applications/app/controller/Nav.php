<?php
namespace app\app\controller;

use app\XDeode;
use think\Controller;
class Nav extends Controller
{
    public function index()
    {
        $xzv_3 = input('cid');
      	$uid = input('uid'); //获取当前用户ID
      	if($uid!=''){
        	$parentid = db('user')->where('id',$uid)->value('parentid');
          	if( intval($parentid) < 2 ){
            	$sid = 1;
            }else{
            	$sid = $parentid;
            }
          	$banner_2 =  db('banner')->where(['cid'=>2,'uid'=>$sid])->count();
          	if( $banner_2==0 ){
            	$xzv_2['vip'] = db('banner')->where(['cid'=>2,'uid'=>1])->order('sort asc')->paginate(999);
            }else{
            	$xzv_2['vip'] = db('banner')->where(['cid'=>2,'uid'=>$sid])->order('sort asc')->paginate(999);
            }
          	$banner_4 = db('banner')->where(['cid'=>4,'uid'=>$sid])->count();
          	if( $banner_4==0 ){
            	$xzv_2['tj'] = db('banner')->where(['cid'=>4,'uid'=>1])->order('sort asc')->paginate(999);
            }else{
            	$xzv_2['tj'] = db('banner')->where(['cid'=>4,'uid'=>$sid])->order('sort asc')->paginate(999);
            }
          	$banner_1 = db('banner')->where(['cid'=>1,'uid'=>$sid])->count();
          	if( $banner_1==0 ){
              $xzv_2['banner'] = db('banner')->where(['cid'=>1,'uid'=>1])->order('sort asc')->paginate(999);
            }else{
              $xzv_2['banner'] = db('banner')->where(['cid'=>1,'uid'=>$sid])->order('sort asc')->paginate(999);
            }
          	$banner_3 = db('banner')->where(['cid'=>3,'uid'=>$sid])->count();
          	if( $banner_3==0 ){
            	$xzv_2['lr'] = db('banner')->where(['cid'=>3,'uid'=>1])->find();
            }else{
            	$xzv_2['lr'] = db('banner')->where(['cid'=>3,'uid'=>$sid])->find();
            }
          	$banner_12 = db('banner')->where(['cid'=>12,'uid'=>$sid])->count();
          	if( $banner_12==0 ){
              $xzv_2['wz'] = db('banner')->where(['cid'=>12,'uid'=>1])->order('sort asc')->paginate(999);
            }else{
              $xzv_2['wz'] = db('banner')->where(['cid'=>12,'uid'=>$sid])->order('sort asc')->paginate(999);
            }
          	$banner_8 = db('banner')->where(['cid'=>8,'uid'=>$sid])->count();
          	if( $banner_8==0 ){
              $xzv_2['hb'] = db('banner')->where(['cid'=>8,'uid'=>1])->order('sort asc')->find();
            }else{
              $xzv_2['hb'] = db('banner')->where(['cid'=>8,'uid'=>$sid])->order('sort asc')->find();
            }
          	echo json_encode($xzv_2, JSON_UNESCAPED_UNICODE);
          
        }else{
        	$xzv_2['vip'] = db('banner')->where(' cid="2" and uid ="1" ')->order('sort asc')->paginate(999);
            $xzv_2['tj'] = db('banner')->where(' cid="4" and uid ="1" ')->order('sort asc')->paginate(4);
            $xzv_2['banner'] = db('banner')->where(' cid="1" and uid ="1" ')->order('sort asc')->paginate(4);
            $xzv_2['lr'] = db('banner')->where(' cid="3" and uid ="1" ')->find();
            $xzv_2['wz'] = db('banner')->where(' cid="12" and uid ="1" ')->order('sort asc')->paginate(2);
            $xzv_2['hb'] = db('banner')->where(' cid="8" and uid ="1" ')->find();
            echo json_encode($xzv_2, JSON_UNESCAPED_UNICODE);
        }

    }
    public function fl()
    {
        $xzv_1 = input('cid');
      	$uid= input('uid');
      	if($uid!=''){
            $parentid = db('user')->where('id',$uid)->value('parentid');
          	if( intval($parentid) < 2 ){
            	$sid = 1;
            }else{
            	$sid = $parentid;
            }
          	$banner_6 =  db('banner')->where(['cid'=>6,'uid'=>$sid])->count();
          	if( $banner_6==0 ){
            	$xzv_4['tu'] = db('banner')->where(['cid'=>6,'uid'=>1])->order('sort asc')->paginate(8);
            }else{
            	$xzv_4['tu'] = db('banner')->where(['cid'=>6,'uid'=>$sid])->order('sort asc')->paginate(8);
            }
          	$banner_5 =  db('banner')->where(['cid'=>5,'uid'=>$sid])->count();
          	if( $banner_5==0 ){
            	$xzv_4['banner'] = db('banner')->where(['cid'=>5,'uid'=>1])->order('sort asc')->paginate(4);
            }else{
              	$xzv_4['banner'] = db('banner')->where(['cid'=>5,'uid'=>$sid])->order('sort asc')->paginate(4);
            }
          	$banner_7 =  db('banner')->where(['cid'=>7,'uid'=>$sid])->count();
          	if( $banner_7==0 ){
            	$xzv_4['guanggao'] = db('banner')->where(['cid'=>7,'uid'=>1])->order('sort asc')->paginate(4);
            }else{
            	$xzv_4['guanggao'] = db('banner')->where(['cid'=>7,'uid'=>$sid])->order('sort asc')->paginate(4);
            }
          	echo json_encode($xzv_4, JSON_UNESCAPED_UNICODE);
        
        }else{
            $xzv_4['tu'] = db('banner')->where('cid', 6)->order('sort asc')->paginate(8);
            $xzv_4['banner'] = db('banner')->where('cid', 5)->order('sort asc')->paginate(4);
            $xzv_4['guanggao'] = db('banner')->where('cid', 7)->order('sort asc')->paginate(4);
            echo json_encode($xzv_4, JSON_UNESCAPED_UNICODE);
        }
       
    }
  
  	public function tc(){
    	$list = db('tanchuang')->where('id',1)->find();
      	echo json_encode($list, JSON_UNESCAPED_UNICODE);
    }
  
    public function on()
    {
        $xzv_0 = db('advert')->select();
        echo json_encode($xzv_0, JSON_UNESCAPED_UNICODE);
    }
}