<?php 
include_once dirname(__FILE__).'/../save/config.php';
$action=filter_input(INPUT_GET, 'action');session_start();
switch ($action){ 
   case  "validate":  //验证码
      $_vc = new ValidateCode();		
      $_SESSION['authnum_session'] = $_vc->getCode();
      break;
   case  "logout":    //退出登录  
      if(!empty($_SESSION['hashstr'])){unset($_SESSION['hashstr']);unset($_SESSION['username']);}  
      ShowMsg('注销登录成功！',"index.php");
      exit;
      
   default : //登录 
       if(!filter_has_var(INPUT_POST, 'username') || !filter_has_var(INPUT_POST, 'password')){ ShowMsg('用户和密码没填写完整!','-1'); exit(); } 
       // if(filter_input(INPUT_POST, 'validate')!=$_SESSION['authnum_session']){ ShowMsg('验证码错误!','-1'); exit(); } 
       $username = htmlspecialchars(filter_input(INPUT_POST, 'username'));  
       $password = MD5(filter_input(INPUT_POST, 'password')); 
         if($username==$user&&$password==$pass)
         {     //登录成功  
               $hashstr=md5($username.$password);       //构造session安全码
                $_SESSION['hashstr']=$hashstr; $_SESSION['username']=$username;
	        ShowMsg('成功登录，正在转向管理管理主页！',"http://959495.xyz/yjx/admin/index.php");	
	        exit();
         }else{  
               ShowMsg('用户名或密码错误！',"-1");
	       exit();
         }
          
}




 