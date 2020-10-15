<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
class Shangcheng extends Controller
{
  
  public function _initialize()
    {
		$qx = session('power');
        $id = session('user');
        if (!$id) {
            $this->redirect('login/login/index');
        }
    	if ($qx!=0) {
            $this->redirect('login/login/index');
        }
    }
  
  public function index(){
    $list = db('shop')->order('id asc')->paginate(10);
  	return view('index',['list' => $list]);
  }
  
  public function add(){
  	return view('add');
  }
  
  public function create(){
  	$file = request()->file('picurl');
    $pd = ['image/gif', 'image/jpeg', 'image/png', 'image/bmp', 'image/jpg'];
    if(!in_array($_FILES['picurl']['type'],$pd)){
    	return redirect('shangcheng/add', ['code' => 0, 'msg' => '上传格式不正确']);die;
    }
    if(input('title')==''){
    	return redirect('shangcheng/add', ['code' => 0, 'msg' => '商品标题不得为空']);die;
    }
    if(input('money')==''){
    	return redirect('shangcheng/add', ['code' => 0, 'msg' => '商品价格不得为空']);die;
    }
    if($file){
      $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
      if($info){
        $type   =   ['gif','jpeg','png','bmp','jpg'];
        $types  =   $info->getExtension();
        $url    =   '/public/uploads/'. $info->getSaveName();
        $urls    =   './public/uploads/'. $info->getSaveName();
        if(in_array($types,$type)){
          $insert['picurl']   =   str_replace('\\','/',str_replace('\\\\','/',$url));
          $insert['title']	= input('title');
          $insert['miaoshu'] = input('miaoshu');
          $insert['money'] = input('money');
          if(db('shop')->insert($insert)!==false){
              return redirect('shangcheng/index');
          }else{
              unlink($urls);
              return redirect('shangcheng/add',['code'=>0,'msg'=>'添加失败']);
          }
        }else{
        	unlink($urls);
        	return redirect('shangcheng/add',['code'=>0,'msg'=>'增加商品失败']);
        }
        
      }else{
      	return redirect('shangcheng/add',['code'=>0,'msg'=>'上传失败'.$file->getError()]);
      }
    
    }else{
    	return redirect('shangcheng/add',['code'=>0,'msg'=>'图片未上传']);
    }
  
  }
  
  
  public function del(){
    $data   =   db('shop')->where('id',input('id'))->delete();
  	if($data){
    	return redirect('/index/shangcheng/index/',['code'=>1,'msg'=>'删除成功']);
    }else{
    	return redirect('/index/shangcheng/index/',['code'=>0,'msg'=>'删除失败']);
    }
  }
  
  public function update(){
  	$code   =   input('msg');
    $data   =   db('shop')->where('id',input('id'))->find();
    return view('update',
    [
        'data'  =>  $data,
        'code'  =>  $code,
    ]);
  }
  
  public function edit(){
  	$file = request()->file('picurl');
    $xzv_99 = ['image/gif', 'image/jpeg', 'image/png', 'image/bmp', 'image/jpg',''];
    if(!in_array($_FILES['picurl']['type'],$xzv_99)){
    	return redirect('shangcheng/update/id/'.input('id').'', ['code' => 0, 'msg' => '请勿非法上传']);die;
    }
    if($file){
      $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
      if($info){
        $type   =   ['gif','jpeg','png','bmp','jpg'];
        $types  =   $info->getExtension();
        $url    =   '/public/uploads/'. $info->getSaveName();
        $urls    =   './public/uploads/'. $info->getSaveName();
        if(in_array($types,$type)){
          	$insert['picurl']   =   str_replace('\\','/',str_replace('\\\\','/',$url));
        }else{
        	unlink($urls);
            return redirect('shangcheng/update/id/'.input('id').'',['code'=>0,'msg'=>'请上传图片']);
        }
      }else{
      	return redirect('shangcheng/update/id/'.input('id').'',['code'=>0,'msg'=>'上传失败'.$file->getError()]);
      }
    }
    $insert['title'] = input('title');
    $insert['miaoshu'] = input('miaoshu');
    $insert['money'] = input('money');
    if(db('shop')->where('id',input('id'))->update($insert)!==false){
    	return redirect('shangcheng/index',['code'=>1,'msg'=>'修成成功']);
    }else{
    	return redirect('shangcheng/update/id/'.input('id').'',['code'=>0,'msg'=>'修成失败']);
    }
  }
  
  public function dingdan(){
    $list = db('shopdingdan')->paginate(10);
  	return view('dingdan',['list'=>$list]);
  }
  
  public function fahuo(){
    if(input('fahuoxinxi')!=''){
      $update['fahuoxinxi'] = input('fahuoxinxi');
      $update['type']	=	2;
      db('shopdingdan')->where('id',input('id'))->update($update);
      return redirect('shangcheng/dingdan',['code'=>0,'msg'=>'修成OK']);
    }
  	$list = db('shopdingdan')->where('id',input('id'))->find();
    return view('fahuo',['data'=>$list]);
  }

}