<?php
/*##################################################
# xypaly 智能视频解析 X   by 00000
# 官方网站: http://00000
# 源码获取：00000
# 模块功能：公用文件
###################################################*/

//不显示读取错误
ini_set("error_reporting","E_ALL & ~E_NOTICE");

class GlobalBase
{
  /**
   * [curl 网页数据获取]
   * @param  [type] $url    [访问 URL 地址]
   * @param  string $method [访问方式]
   * @param  string $fields [要提交的数据]
   * @param  string $ckname [cookie 文件名]
   * @return [type]         [返回访问结果字符串数据]
   */
  public static function curl($url,$params=array())
  {  	    
	 
     $ip = empty($params["ip"]) ? self::rand_ip() : $params["ip"]; 	  
      $header = array('X-FORWARDED-FOR:'.$ip,'CLIENT-IP:'.$ip);
      if(isset($params["httpheader"])){
        $header = array_merge($header,$params["httpheader"]);
      }
      $referer = empty($params["ref"]) ? $url : $params["ref"];
      $user_agent = empty($params["ua"]) ? $_SERVER['HTTP_USER_AGENT'] : $params["ua"] ;
      
      $ch = curl_init();                                                      //初始化 curl
      curl_setopt($ch, CURLOPT_URL, $url);                                    //要访问网页 URL 地址
      curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                          //伪装来源 IP 地址
      curl_setopt($ch, CURLOPT_REFERER, $referer);                            //伪装网页来源 URL
      curl_setopt($ch, CURLOPT_USERAGENT,$user_agent);                        //模拟用户浏览器信息
      curl_setopt($ch, CURLOPT_NOBODY, false);                                //设定是否输出页面内容
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                         //返回字符串，而非直接输出到屏幕上
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, false);                        //连接超时时间，设置为 0，则无限等待
      curl_setopt($ch, CURLOPT_TIMEOUT, 3600);                                //数据传输的最大允许时间超时,设为一小时
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);                       //HTTP验证方法
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);                        //不检查 SSL 证书来源
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);                        //不检查 证书中 SSL 加密算法是否存在
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);                         //跟踪爬取重定向页面
      curl_setopt($ch, CURLOPT_AUTOREFERER, true);                            //当Location:重定向时，自动设置header中的Referer:信息
      curl_setopt($ch, CURLOPT_ENCODING, '');                                 //解决网页乱码问题
      curl_setopt($ch, CURLOPT_HEADER, empty($params["header"])?false:true);  //不返回 header 部分
      if(!empty($params["fields"])){
        curl_setopt($ch, CURLOPT_POST, true);                                  //设置为 POST 
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params["fields"]);                //提交数据
      }
      if(!empty($params["cookie"])){
        curl_setopt($ch, CURLOPT_COOKIE, $params["cookie"]);                  //从字符串传参来提交cookies
      }
      if(!empty($params["proxy"])){
        curl_setopt($ch, CURLOPT_PROXYAUTH, CURLAUTH_BASIC);                  //代理认证模式
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);                  //使用http代理模式
        curl_setopt($ch, CURLOPT_PROXY, $params["proxy"]);                    //代理服务器地址 host:post的格式
        if(!empty($params["proxy_userpwd"])){
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $params["proxy_userpwd"]); //http代理认证帐号，username:password的格式
        }
      }

	 $data = curl_exec($ch);                                                 //运行 curl，请求网页并返回结果
      curl_close($ch);                                                        //关闭 curl
      return $data;
  }

	/**
	 * [rand_ip 生成随机 IP 地址]
	 * @return [type] [返回 IPv4地址 字符串]
	 */
	public static function rand_ip(){
		$ip_long = array(
			array('607649792', '608174079'), //36.56.0.0-36.63.255.255
			array('1038614528', '1039007743'), //61.232.0.0-61.237.255.255
			array('1783627776', '1784676351'), //106.80.0.0-106.95.255.255
			array('2035023872', '2035154943'), //121.76.0.0-121.77.255.255
			array('2078801920', '2079064063'), //123.232.0.0-123.235.255.255
			array('-1950089216', '-1948778497'), //139.196.0.0-139.215.255.255
			array('-1425539072', '-1425014785'), //171.8.0.0-171.15.255.255
			array('-1236271104', '-1235419137'), //182.80.0.0-182.92.255.255
			array('-770113536', '-768606209'), //210.25.0.0-210.47.255.255
			array('-569376768', '-564133889') //222.16.0.0-222.95.255.255
		);
		$rand_key = mt_rand(0, 9);
		$ip = long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
		return $ip;
	}
	
	  /**
   * [is_https 是否是安全连接访问]
   * @return boolean [description]
   */
  public static function is_https()
  {
      if (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off'){
          return "https://";
      }elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https'){
          return "https://";
      }elseif (isset($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off'){
          return "https://";
      }elseif(isset($_SERVER["REQUEST_SCHEME"]) && $_SERVER["REQUEST_SCHEME"] === 'https'){
          return "https://";
      }
      return "http://";
  }
public static function is_dir()
  {	
  $root=str_replace("\\", "/",filter_input(INPUT_SERVER, 'DOCUMENT_ROOT'));
  $dir=str_replace("\\", "/",str_replace("include","",dirname(__FILE__)));
  return str_replace($root,"",$dir);
 }
 public static function is_root()
  {	
   return self::is_https().filter_input(INPUT_SERVER, 'HTTP_HOST')."/".self::is_dir();
 }
 
  
 
 
 /**
   * [getdirs 取指定目录下的子目录数组]
   * @return array [dir]
   */
	 public static function getdirs($dir)
  {
	
	if(is_dir($dir)&& is_readable($dir))	
	{		
		$handle=opendir($dir);$f_dir=array();		
		while(($f_name=readdir($handle))!=false){			
			if(is_dir($dir.'/'.$f_name)&& $f_name!="." && $f_name!=".." ){$f_dir[]=$f_name;}
		}
		closedir($handle);		
		return $f_dir;		
	}else{		
		return false;		
	}	
	
  }
	
	
	} 



/** 
 * js escape php 实现 
 * @param $string           the sting want to be escaped 
 * @param $in_encoding       
 * @param $out_encoding      
 */ 
function escape($string, $in_encoding = 'UTF-8',$out_encoding = 'UCS-2') { 
    $return = ''; 
    if (function_exists('mb_get_info')) { 
        for($x = 0; $x < mb_strlen ( $string, $in_encoding ); $x ++) { 
            $str = mb_substr ( $string, $x, 1, $in_encoding ); 
            if (strlen ( $str ) > 1) { // 多字节字符 
                $return .= '%u' . strtoupper ( bin2hex ( mb_convert_encoding ( $str, $out_encoding, $in_encoding ) ) ); 
            } else { 
                $return .= '%' . strtoupper ( bin2hex ( $str ) ); 
            } 
        } 
    } 
    return $return; 
}

//文本加密函数
function strencode($string,$key='xyplay'){	
	$string=base64_encode($string);
	$len=strlen($key);
	$code='';
	for($i=0;$i<strlen($string);$i++){
	$k=$i % $len;
	$code.=$string[$i]^$key[$k];		
	}	
	return base64_encode($code);		
}

 function lsUserAgen ($key)
 {   
   return preg_match('/'.$key."/i",@$_SERVER['HTTP_USER_AGENT']);		
}

 function lsReferer($key)
 {   
  return preg_match('/'.$key."/i",parse_url(@$_SERVER['HTTP_REFERER'],PHP_URL_HOST));		
}


//防火墙类
class Blacklist

{
	
 public static function parse($list,$all=false)
  {
	if($all){
		 if($list['off']>0){self::black($list,$all);}
	}else{
		if($list['off']==1){self::black($list,$all);}
		}
  }
	
	public static function shell($match,$list,$all,$type='')
  {
  
   switch ($type)	  
	 {		 
  //来源域名
	case '0':	
		 $val=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';  $val=parse_url( $val,PHP_URL_HOST);	//取出来源域名	
      
		 if(in_array( $val,$match['val'])==($match['match']=='1')){self::shell($match,$list,$all);}
         break;
	//目标域名
	case '1' :										
		$val=isset($_REQUEST['url'])?$_REQUEST['url']:'';$val=parse_url( $val,PHP_URL_HOST);	//取出目标域名			
	    if(in_array($val,$match['val'])==($match['match']=='1')){self::shell($match,$list,$all);}
        break;
	//浏览器标识
	case '2' :													   
		$val=isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';		//取出浏览器标识			
		if(preg_match('/'.implode("|",$match['val'])."/i",$val)==($match['match']=='1')){self::shell($match,$list,$all);}			   
        break;				  
	//客户IP
    case '3' :   
	    $val=isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'';		//取出IP			
	    if(in_array($val,$match['val'])==($match['match']=='1')){self::shell($match,$list,$all);}
        break;
	default: 			
		//取出脚本
		$shell=$list['black'][$match['black']]['info'];
		//取出脚本类型
		$type=$list['black'][$match['black']]['type'];
                //取出脚本动作
		$action=$list['black'][$match['black']]['action'];	
                //if($type=='0'){ if(!$all){echo $shell;}if($action=='1'){exit;}}else{eval($shell);if($action=='1'){exit;}}
                if($type=='0'){  if($action=='0'){ session_start(); $_SESSION['FOOTER_CODE']=$shell;}else{exit($shell);} }else{eval($shell);if($action=='1'){exit;}}
	    break;
  
	 }	 	 						 
   }	
		
  public static function black($list,$all)
  {
	$match=$list['match'];
	
		 //规则按优先级降序排列     
		foreach ( $match as $key => $row ){$num[$key] = $row ['num'];} 
        array_multisort($num,SORT_DESC ,$match);	
		
		foreach($match as $key){if($key['off']==1){self::shell($key,$list,$all,$key['type']);}}				
  }

}
	
function ShowMsg($msg,$gourl,$onlymsg=0,$limittime=0,$extraJs='')
{
	if(empty($GLOBALS['cfg_phpurl']))
	{
		$GLOBALS['cfg_phpurl'] = '..';
	}
	$htmlhead  = "<html>\r\n<head>\r\n<title>提示信息</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n";
	$htmlhead .= "<base target='_self'/>\r\n<style>div{line-height:160%;}</style></head>\r\n<body leftmargin='0' topmargin='0'>\r\n<center>\r\n<script>\r\n";
	$htmlfoot  = "</script>\r\n$extraJs</center>\r\n</body>\r\n</html>\r\n";

	if($limittime==0)
	{
		$litime = 1000;
	}
	else
	{
		$litime = $limittime;
	}

	if($gourl=="-1")
	{
		if($limittime==0)
		{
			$litime = 5000;
		}
		$gourl = "javascript:history.go(-1);";
	}

	if($gourl==''||$onlymsg==1)
	{
		$msg = "<script>alert(\"".str_replace("\"","“",$msg)."\");</script>";
	}
	else
	{
		$func = "      var pgo=0;
      function JumpUrl(){
        if(pgo==0){ location='$gourl'; pgo=1; }
      }\r\n";
		$rmsg = $func;
		$rmsg .= "document.write(\"<br /><div style='width:450px;padding:0px;border:1px solid #3388b6;'>";
	    $rmsg .= "<div style='padding:6px;font-size:12px;border-bottom:1px solid #3388b6;background:#d0e6f9 ';'><b>提示信息！</b></div>\");\r\n";
		$rmsg .= "document.write(\"<div style='height:130px;font-size:10pt;background:#ffffff'><br />\");\r\n";
		$rmsg .= "document.write(\"".str_replace("\"","“",$msg)."\");\r\n";
		$rmsg .= "document.write(\"";
		if($onlymsg==0)
		{
			if($gourl!="javascript:;" && $gourl!="")
			{
				$rmsg .= "<br /><a href='{$gourl}'>如果你的浏览器没反应，请点击这里...</a>";
			}
			$rmsg .= "<br/></div>\");\r\n";
			if($gourl!="javascript:;" && $gourl!='')
			{
				$rmsg .= "setTimeout('JumpUrl()',$litime);";
			}
		}
		else
		{
			$rmsg .= "<br/><br/></div>\");\r\n";
		}
		$msg  = $htmlhead.$rmsg.$htmlfoot;
	}
	echo $msg;
}


//检测字符串组的字符在字符串中是否存在,对大小写不敏感
function findstrs($str,$find,$strcmp=false,$separator="|"){
	$ymarr = explode($separator,$find);
	foreach ($ymarr as  $find) {  
    
	   if($strcmp){ if(strcasecmp($str,$find)==0){return true; }}else{if(stripos($str,$find) !==false ){return true; }}
	 
    }  	 
    return false;
}

//获取顶级域名
function get_host(){
    $url   = $_SERVER['HTTP_HOST'];
    $data = explode('.', $url);
    $co_ta = count($data);
    //判断是否是双后缀
    $zi_tow = true;
    $host_cn = 'com.cn,net.cn,org.cn,gov.cn';
    $host_cn = explode(',', $host_cn);
    foreach($host_cn as $host){
        if(strpos($url,$host)){
            $zi_tow = false;
        }
    }
    //如果是返回FALSE ，如果不是返回true
    if($zi_tow == true){
        $host = $data[$co_ta-2].'.'.$data[$co_ta-1];
    }else{
        $host = $data[$co_ta-3].'.'.$data[$co_ta-2].'.'.$data[$co_ta-1];
    }
  return $host;
}

//获取远程内容
function geturl($url,$timeout = 10) {  
    $user_agent = "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";  
	$curl = curl_init();                                        //初始化 curl
    curl_setopt($curl, CURLOPT_URL, $url);                      //要访问网页 URL 地址
	curl_setopt($curl, CURLOPT_USERAGENT,$user_agent);		   //模拟用户浏览器信息 
    curl_setopt($curl, CURLOPT_REFERER,$url) ;               //伪装网页来源 URL
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);                //当Location:重定向时，自动设置header中的Referer:信息                   
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);             //数据传输的最大允许时间 
    curl_setopt($curl, CURLOPT_HEADER, 0);                     //不返回 header 部分
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);            //返回字符串，而非直接输出到屏幕上
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);             //跟踪爬取重定向页面
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, '0');        //不检查 SSL 证书来源
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, '0');        //不检查 证书中 SSL 加密算法是否存在
	curl_setopt($curl, CURLOPT_ENCODING, '');	          //解决网页乱码问题
    $data = curl_exec($curl);
	curl_close($curl);
    return $data;
}
function lsMobile(){
if(isset($_SERVER['HTTP_USER_AGENT']))
  {
   $clientkeywords=array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile');
   if(preg_match("/(". implode('|',$clientkeywords). ")/i",strtolower($_SERVER['HTTP_USER_AGENT']))){return true;}
  }	
   return false;
}

//编码转换，转换为utf-8编码
function utf8($title) {						
		$encode = mb_detect_encoding($title, array('GB2312','GBK','UTF-8', 'CP936')); //得到字符串编码
		if ( $encode != 'CP936' && $encode != 'UTF-8') {
			$title=iconv($encode, 'UTF-8', $title);
		}			
		return $title;	
	}
	
	
//缓存操作类	
class Main_Cache{        
    private $cachetype = 1;            //默认缓存类型,1为文件，2为Redis服务
	private $cacheprot = 6379;         //缓存服务端口，默认为Redis服务端口
    private $cacheTime = 3600;        //默认缓存时间,单位微秒。  
    private $cacheDir = './cache';    //缓存绝对路径   
    private $md5 = true;              //是否对键进行加密   
    private $suffix = "";         //设置文件后缀       
    private $cache;
    public function __construct($config){   
        		
		if($this->cachetype==0) {		
           return ;	   
	   }
				
		if( is_array( $config ) ){   
            foreach( $config as $key=>$val ){  
                $this->$key = $val;   
            }  
        }         
		
		 if($this->cachetype==2){
			
		      $this->cache = new Redis();
              $this->cache->connect('127.0.0.1', $this->cacheprot);	
             
  
		}        
	
	}
    //设置缓存   
    public function set($key,$val,$leftTime=null){ 
       
     if($this->cachetype==0) {
         return ;	  
	 }else if($this->cachetype==1){
		
        $key = $this->md5 ? md5($key) : $key;  
		$val=$this->md5 ? base64_encode($val) : $val; 	
        if(function_exists("gzcompress")){$val =@gzcompress($val);}
        !file_exists($this->cacheDir) && mkdir($this->cacheDir,0777);   
        $file = $this->cacheDir.'/'.$key.$this->suffix;    
       	$leftTime=($leftTime===null)?$this->cacheTime:$leftTime;     
	file_put_contents($file,$val) or $this->error(__line__,"文件写入失败");    
        touch($file,time()+$leftTime) or $this->error(__line__,"更改文件时间失败");   
   
		}if($this->cachetype==2) {
           $key_md5 = $this->md5 ? md5($key) : $key; 
		   $val_base64 = $this->md5 ? base64_encode($val) : $val; 
		   $val_base64 =@gzcompress($val_base64);

            $this->cache->set($key_md5,$val_base64);
  
		    if($leftTime!=0){$this->cache->EXPIRE($key_md5,$leftTime);}
		   // $this->cache->del($val_base64); 
	   }
   }   
  
    //得到缓存   
    public function get($key){   
     
      if($this->cachetype==0) {		
           return ;
		   
	  }else if($this->cachetype==1) {		  		   
		//$this->clear();   
              
             
              
        if( $this->_isset($key) ){  

     
            
            $key_md5 = $this->md5 ? md5($key) : $key;  
            $file = $this->cacheDir.'/'.$key_md5.$this->suffix;             		
		   $val = file_get_contents($file);   
                  $val=@gzuncompress($val);
		   $val =$this->md5 ? base64_decode($val) : $val; 
		   return $val;   
        }   
            return null;   
      }if($this->cachetype==2) {
           $key_md5 = $this->md5 ? md5($key) : $key; 
           $val=$this->cache->get($key_md5);
           if(function_exists("gzuncompress")){$val=@gzuncompress($val);}
			$val_base64=$this->md5 ? base64_decode($val) : $val; 		   
		    return $val_base64;
		   
	   }
	 
	}        
  
    //判断文件是否有效   
    public function _isset($key){           	
		$key = $this->md5 ? md5($key) : $key;         			
        $file = $this->cacheDir.'/'.$key.$this->suffix;   
        if( file_exists($file) ){   
            if( $this->cacheTime==0 || filemtime($file) >= time()){   
                return true;   
            }else{   
                @unlink($file);    
                return false;   
            }   
        }   
        return false;  
    }        
  
    //删除指定缓存  
    public function _unset($key){ 
         if($this->cachetype==0) {		
           return ;	   
	  }elseif($this->cachetype==1){
	      if( $this->_isset($key) ){   
            $key_md5 = $this->md5 ? md5($key) : $key;  
            $file = $this->cacheDir.'/'.$key_md5.$this->suffix;  
            return @unlink($file);   
        }   
        return false;   	  
	}elseif($this->cachetype==2){
		$key_md5 = $this->md5 ? md5($key) : $key;  
		$this->cache->del($key_md5);		
	}
}
    //清除过期缓存文件   
    public function clear(){ 
	   $files = scandir($this->cacheDir);
            $cacheTime=$this->cacheTime;	
       
        foreach ($files as $val){   
            if ( $cacheTime!=0 && filemtime($this->cacheDir."/".$val)  < time()){ 
                 @unlink($this->cacheDir."/".$val); 			   
            }  
        }   
    }       
  
    //清除所有缓存文件   
    public function clear_all(){ 
       if($this->cachetype==0) {
		   return ;
		}
      $files = scandir($this->cacheDir);  
        foreach ($files as $val){   
            @unlink($this->cacheDir."/".$val);   
        }  
    }        
  
    private function error($line,$msg){ 
  
        die("出错文件：".__file__."/n出错行：$line/n错误信息：$msg");   
    }   
}   


/**
 * TODO:PHP-验证码类
 * Author：entner (wangyiicloud@icloud.com)
 * time:   2017-10-17
 * version:1.0
 * ready:
       
{
  属性：
        宽度 int $width
        高度 int $hight
        干扰点 
        验证码(私有的) 
        验证码字符的个数 int $number
        验证码的类型(纯数字类型、纯字母类型、混合类型)

        背景颜色 string $color
        字体颜色 string $fontColor
    
        图片类型(jpg、png、bmp……) string $imageType
        图片资源 string $resource 
    
   功能：
        构造函数(用来初始化) function
        生成验证码的函数 function createCode
    
        创建画布    function createImage
        填充背景色  function fillBackground
        填充干扰点  
        填充干扰弧线 
        画验证码
        输出图片
}
  调用：
     //实例化一个对象
     $_vc = new ValidateCode();	
    
    //验证码保存到SESSION中		
     $_SESSION['authnum_session'] = $_vc->getCode();   
      

 */

    Class ValidateCode{
        public $width;
        public $heigh;
        public $numbers;
        public $codeType;    //1.数字 2.字母 3.混合
        public $color;
        public $fontColor;
        public $imageType;

        private $codeString;//验证字符串母体
        private $resource;  //图片资源

        public function __construct($w=130,$h=48,$n=4,$imageType='png',$codeType=3){
            $this->width = $w;
            $this->height = $h;
            $this->numbers = $n;
            $this->imageType = $imageType;
            $this->codeType = $codeType;

            /*    生成随机的验证字符串    */
            $this->codeString = $this->createCode($this->codeType);
            $this->show();
        }

        private function createCode($type){
            switch($type){
                case 1:
                     /*生成纯数字，首先使用range(0,9)生成数组
                       *通过$this->verifyNums确定字符串的个数
                       *使用array_rand()从数组中随机获取相应个数
                       *使用join将数字拼接成字符串，存储到$this->codeString中
                      */
                    $this->codeString = join('',array_rand(range(0, 9),$this->numbers));
                    break;
                case 2:
                    /*生成纯字母，
                       *小写字母数组range('a','z')
                       *大写字母数组range('A','Z')
                       *合并两个数组array_merge()
                       *更换键和值  array_flip()
                       *随机获取数组中的特定个数的元素 array_rand()
                       *拼接成字符串 implode()
                    */

                    $this->codeString = implode("",array_rand(array_flip(array_merge(range('a','z'),range('A','Z'))),$this->numbers));
                   
                    break;
                case 3:
                    //混合类型
     
                    $words = str_shuffle('abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789');
                    $this->codeString = substr($words,0,$this->numbers);
                    break;
            }
            return $this->codeString;
        }


        //开始准备生成图片
        /*方法名：show()
         *功能  ：调用生成图片的所有方法
         */
        private function show(){
            $this->createImg();//创建图片资源
            $this->fillBackground();   //填充背景颜色
            $this->fillPix();  //填充干扰点
            $this->fillArc();  //填充干扰弧线
            $this->writeFont();//写字
            $this->outPutImg();//输出图片
        }
      
        //创建图片资源:imagecreatetruecolor($width,$height)
        private function createImg(){
               $this->resource = imagecreatetruecolor($this->width,$this->height);
         }
      
        //填充背景颜色:imagefill($res,$x,$y,$color)
        //随机生成深色--->imagecolorallocate($res,$r,$g,$b)
        private function setDarkColor()
          {
            return imagecolorallocate($this->resource,mt_rand(130,255),mt_rand(130,255),mt_rand(130,255));
          } 
        //随机生成浅色
        private function setLightColor()
          {
            return imagecolorallocate($this->resource,mt_rand(0,130),mt_rand(0,130),mt_rand(0,130));
          }
        //开始填充
        private function fillBackground()
          {
            imagefill($this->resource,0,0,$this->setDarkColor());
          }
      
        //随机生成干扰点-->imagesetpixel
        private function fillPix()
          {
            //计算产生多少个干扰点（单一像素），这里设置每20个像素产生一个
            $num = ceil(($this->width * $this->height) / 20);
            for($i = 0; $i < $num; $i++){
              imagesetpixel($this->resource,mt_rand(0,$this->width),mt_rand(0,$this->height),$this->setDarkColor());
            }
          }
      
        //随机画10条弧线->imagearc()
        private function fillArc()
          {
            for($i = 0;$i < 10;$i++){
              imagearc($this->resource,
                       mt_rand(10,$this->width-10),
                       mt_rand(5,$this->height-5),
                       mt_rand(0,$this->width),
                       mt_rand(0,$this->height),
                       mt_rand(0,180),
                       mt_rand(181,360),
                       $this->setDarkColor());
            }
          }
      

        /*在画布上写文字
         *根据字符的个数，将画布横向分成相应的块
          $every = ceil($this->width/$this->verifyNums);
         *每一个小块的随机位置画上对应的字符
          imagechar();
         */
        
        private function writeFont()
          {
            $every = ceil(($this->width-10) / $this->numbers);
            for($i = 0;$i < $this->numbers;$i++){
              $x = mt_rand(($every * $i) + 5,$every * ($i + 1) - 5);
              $y = mt_rand(5,$this->height-15);
              
              imagechar($this->resource,10,$x,$y,$this->codeString[$i],$this->setLightColor());
              
            }
          }
      
        //输出图片资源
        private function outPutImg()
          {
            //header('Content-type:image/图片类型')
            header('Content-type:image/'.$this->imageType);
          
            //根据图片类型，调用不同的方法输出图片            
            //imagepng($img)/imagejpg($img)
            $func = 'image'.$this->imageType;
            $func($this->resource);
          }
         
     //用来验证验证码是否输入正确,不区分大小写
       public function getCode(){
           return strtolower($this->codeString);
        }
        
        
        //析构方法，自动销毁图片资源
        public function __destruct()
          {
            imagedestroy($this->resource);
          }

    }

