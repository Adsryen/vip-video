<?php
RegisterPlugin("txdida","ActivePlugin_txdida");


function ActivePlugin_txdida(){
    Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','txdida_AddMenu');
    Add_Filter_Plugin('Filter_Plugin_Edit_Response5','txdida_Filter_Plugin_Edit_Response5');
    Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','txdida_Category_Edit_Response');
    Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','txdida_Tag_Edit_Response');
}

function txdida_GetArticleCategorys($Rows,$CategoryID,$hassubcate){
    global $zbp;
    $ids = strpos($CategoryID,',') !== false ? explode(',',$CategoryID) : array($CategoryID);
    $wherearray=array(); 
    foreach ($ids as $cateid){
        if (!$hassubcate) {
            $wherearray[]=array('log_CateID',$cateid); 
        }else{
            $wherearray[] = array('log_CateID', $cateid);
            foreach ($zbp->categorys[$cateid]->SubCategorys as $subcate) {
                $wherearray[] = array('log_CateID', $subcate->ID);
            }
        }
    }
    $where=array( 
        array('array',$wherearray), 
        array('=','log_Status','0'), 
    ); 

    $order = array('log_PostTime'=>'DESC'); 
    $articles=    $zbp->GetArticleList(array('*'),$where,$order,array($Rows),'');     

    return $articles;
}

function txdidas_GetArticleCategorys($Rows,$CategoryID,$hassubcate){
    global $zbp;
    $ids = strpos($CategoryID,',') !== false ? explode(',',$CategoryID) : array($CategoryID);
    $wherearray=array(); 
    foreach ($ids as $cateid){
        if (!$hassubcate) {
            $wherearray[]=array('log_CateID',$cateid); 
        }else{
            $wherearray[] = array('log_CateID', $cateid);
            foreach ($zbp->categorys[$cateid]->SubCategorys as $subcate) {
                $wherearray[] = array('log_CateID', $subcate->ID);
            }
        }
    }
    $where=array( 
        array('array',$wherearray), 
        array('=','log_Status','0'), 
    ); 

    $order = array('log_ViewNums'=>'DESC'); 
    $articles=    $zbp->GetArticleList(array('*'),$where,$order,array($Rows),'');     

    return $articles;
}


define( 'txdida_THIS','txdida');
define( 'txdida_ROOT_DIR',plugin_dir_path(txdida_THIS));
define( 'txdida_ROOT_URL',plugin_dir_url(txdida_THIS));
function txdida_Get_Logo($name='logo',$type='png'){
    $path = txdida_ROOT_DIR.'txdida/include/'.$name.'.'.$type;
    if (file_exists($path)){
        echo txdida_ROOT_URL.'txdida/include/'.$name.'.'.$type;
    }else{
        echo txdida_ROOT_URL.'txdida/include/'.$name.'_tx.'.$type;
    }
}

function txdida_AppReg(){
    global $zbp;
    $appname='txdida';
    $appid='1001';
    $postdate = array(
        'email'=>$zbp->Config('AppCentre')->username,
        'password'=>$zbp->Config('AppCentre')->password,
        'appid'=>$appid
    );
    $http_post = Network::Create();
    if(!$http_post){
        $msg='主机没有开启访问外部网络功能';
    }else{
        $http_post->open('POST',base64_decode("aHR0cHM6Ly9hcHAuemJsb2djbi5jb20vYXBpL2luZGV4LnBocD9hcGk9aXNidXk="));
        $http_post->setRequestHeader('Referer','http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        $http_post->send($postdate);
        $result = json_decode($http_post->responseText,true);
        if($result['ret']==0){
            if ($result['data']['buy']) {
                if(!$zbp->Config($appname)->AppCenterCheck){
                    $zbp->Config($appname)->AppCenterCheck=true;
                }
            }else{
                $zbp->Config($appname)->AppCenterCheck=false;
            }
        }else{
            $zbp->Config($appname)->AppCenterCheck=false;
        }
    }
    if($zbp->host=='https://www.txcstx.cn/'){
        $zbp->Config($appname)->AppCenterCheck=true;
        $zbp->SaveConfig($appname);
    }
    $zbp->Config($appname)->AppCenterCheckERR=$result['errcode'];
    $zbp->Config($appname)->AppCenterCheckTime=time();
    $zbp->SaveConfig($appname);
    AppAjaxtxdida($zbp->host,$appname,$zbp->Config($appname)->AppCenterCheck,$zbp->Config($appname)->AppCenterCheckERR,$zbp->Config($appname)->AppCenterCheckTime);
}

function AppAjaxtxdida($zbphost,$id,$buy,$err,$apptime){
    global $zbp;
    $postdata = array(
        'USER_HOST'=>$zbphost,
        'APPID'=>$id,
        'BUY'=>$buy,
        'ERR'=>$err,
        'UA'=>GetGuestAgent(),
        'IP'=>GetGuestIP(),
        'AppCentreUserName'=>$zbp->Config('AppCentre')->username,
        'AppTime'=>$apptime
    );

    $configjsonfile=ZBP_PATH . DIRECTORY_SEPARATOR . 'zb_users'.DIRECTORY_SEPARATOR.'theme'.DIRECTORY_SEPARATOR.'txdida'.DIRECTORY_SEPARATOR.'include'.DIRECTORY_SEPARATOR.'register.data';

    if(!$postdata['AppCentreUserName'] == null){
        $writeData = $postdata['AppCentreUserName'].'(or)'.$zbp->user->Name.'&'.$zbp->user->Email;
    }else{
        $writeData = $zbp->user->Name.'&'.$zbp->user->Email;
    }

    if (file_exists($configjsonfile)){
        $postdata["OldUser"] = base64_decode(file_get_contents($configjsonfile)).'(to)'.$writeData;
    }else{
        $postdata["OldUser"] = $zbp->user->Name.'&'.$zbp->user->Email;
    }

    file_put_contents($configjsonfile, base64_encode($writeData));

    $http_post = Network::Create();
    $http_post->open('POST','https://www.txcstx.cn/zb_users/plugin/MyAPI/check.php');
    $http_post->setRequestHeader('Referer',substr($zbp->host,0,-1) . $zbp->currenturl);
    $http_post->send($postdata);
}

function txdida_Thumbs($src,$width,$height) {
    global $zbp;
    if (!$zbp->CheckPlugin('IMAGE')) {
        $thumbs_src=$src;
    } else {
        $thumbs_src=IMAGE::getPicUrlBy($src,$width,$height,4);
    }
    return $thumbs_src;
}

function txdida_FirstIMG($as,$pos,$width,$height) {
    global $zbp;   
    $temp=mt_rand(1,3);
    $pattern = "/<img.*?src=(\"|')?(?<src>.*?\.(gif|jpg|jpeg|png))(\"|')?.*?>/";   
    $content = $as->Content;
    if ($pos->Metas->jietu){
        $temp=$pos->Metas->jietu;
    }else{
        if(preg_match($pattern,$content,$matchContent) && isset($matchContent['src'])){
            $temp=$matchContent['src'];
        } else {
            $temp=$zbp->host . "zb_users/theme/" .$zbp->theme. "/include/pic.png";
        }
    }
    $src = txdida_Thumbs($temp,$width,$height);
    return $src;
}


function txdida_Filter_Plugin_Edit_Response5(){
    global $zbp,$article;
?>
<script src="<?php echo $zbp->host;?>zb_users/theme/txdida/source/lib.upload.js" type="text/javascript"></script>

<style>
    .txdiany table,nbdiany2 table {width:99%;}#nbdiany{margin-top:15px;text-align:center;}.tx-tr{line-height:30px;font-weight:700;}.txdiany tr td {vertical-align: middle;}.ias_trigger  {background-color: #5cb85c;color: #fff !important;display: block;font-size: 14px;line-height: 35px;text-align: center;cursor: pointer;}f-red{color:#c00;}.uploadimg{border:1px solid #ddd;border-radius: 3px;line-height: 38px;height: 38px;padding:0 100px 0 10px;position:relative;margin-bottom: 8px;width: 99%;}.uploadimg input[type="text"]{border:0;width:100%;color:#999;}.uploadimg input[type="button"]{position:absolute;right:3px;top:3px;width:80px;font-size:12px;text-align:center;color:#fff;background-color:#3A6EA5;line-height:30px!important;height:30px!important;border:0;cursor:pointer;margin:0;padding:0!important;}
</style>

<?php
    global $zbp,$article;
    $arraymetasname=array();
    $arraymetastxt=array();
    if(!$article->Metas->NBTotaldiany){$article->Metas->NBTotaldiany='1';}
    $arraymovielist=explode(",",$article->Metas->NBTotaldiany);

    $listi=count($arraymovielist);
    
    #for ($i = 0; $i <= $listi; $i++){
    foreach ($arraymovielist as $j){	
        $arraymetasname[$j]='video'.$j;
        $arraymetastxt[$j]='vtxt'.$j;
    } 
    echo '<div class="txdiany">';
    echo '<table id="nbdiany2">
	<tr>
	<td><div id="p2">关键词(主题自带seo功能)</div></td>
	<td colspan="4"><input style="width:100%" name="meta_nrgjc" value="'.$article->Metas->nrgjc.'"/></td>
	</tr>
	<tr>
	<td>描述(主题自带seo功能)</td>	
	<td colspan="4"><input style="width:100%" name="meta_nrms" value="'.$article->Metas->nrms.'"/></td>
	</tr>
	<tr>
	<td>资源下载链接（此处填写才出现下载图标）</td>	
	<td colspan="4"><input style="width:100%" name="meta_xiazai" value="'.$article->Metas->xiazai.'"/></td>
	</tr>
	<tr>
	<td>收费模式</td>
	<td><p align="center"><input type="radio" name="meta_buy" value="jifen" /> 积分购买(需要在右侧→底部设置价格)</p>  </td>
	<td><p align="center"><input type="radio" name="meta_buy" value="dengl" /> 登录可看</p></td>
	<td><p align="center"><input type="radio" name="meta_buy" value="vip" /> vip可看</p></td>
	<td><p align="center"><input type="radio" name="meta_buy" value="noned"> <strong class="f-red">取消收费</strong></p></td>
	</tr>
	<tr>
	<td>视频清晰度</td>	
	<td colspan="2"><input style="width:100%" name="meta_qingxi" value="'.$article->Metas->qingxi.'"/></td>
	<td>视频时间或者集数</td>	
	<td><input style="width:100%" name="meta_shijian" value="'.$article->Metas->shijian.'"/></td>
	</tr>
    <tr>
	<td rowspan="2" width="20%">视频资源格式 </td>
	<td width="20%"><p align="center"><input type="radio" name="meta_videoon" value="frame" /><br>优酷等外部视频，仅限frame格式</p></td>
	<td width="20%"><p align="center"><input type="radio" name="meta_videoon" value="xigua" /><br>西瓜影音</p></td>
	<td width="20%"><p align="center"><input type="radio" name="meta_videoon" value="jiji" /><br>吉吉影音</p></td>
	<td width="20%"><p align="center"><input type="radio" name="meta_videoon" value="leshi" /><br>乐视云点播</p></td>
	</tr>
	<tr>
	<td><p align="center"><input type="radio" name="meta_videoon" value="vjj" /><br>video++</p></td>
	<td><p align="center"><input type="radio" name="meta_videoon" value="local" /><br>本地视频，仅限MP4格式</p></td>
	<td><p align="center"><input type="radio" name="meta_videoon" value="ckplay" /><br>ckplayer
(<a href="http://www.txcstx.cn/post/1027.html" target="_blank">教程</a>)</p></td>
    <td><p align="center"><input type="radio" name="meta_videoon" value="cuplay" /><br>CuPlayer</p></td>
	</tr>
<script>
            var y = "'.$article->Metas->videoon.'";
            var x = "'.$article->Metas->buy.'";
            var radiovar = document.getElementsByName("meta_videoon");
            
            for(var i=0;i<radiovar.length;i++)
            {
                if(radiovar[i].value==y)
                    radiovar[i].checked = "checked";
            }
            var radiovar1 = document.getElementsByName("meta_buy");
            for(var i=0;i<radiovar1.length;i++)
            {
                if(radiovar1[i].value==x)
                    radiovar1[i].checked = "checked";
            }   
        </script>
	';	
    echo '</table><br>
    <div class="uploadimg"><input name="meta_jietu" type="text" class="uplod_img" value="'.$article->Metas->jietu.'" placeholder="视频缩略图(建议大小176*230)"/><input type="button"  id="updatapic2" class="button" value="点击上传"/></div>
';		
    echo'	<table id="nbdiany">';
    echo '<tr class="tx-tr"><td width="15%">第X集</td>
	<td width="55%">播放代码</td><td width="30%">播放说明</td><td>--</td></tr>';	


    foreach ($arraymovielist as $k=>$j){	
    $a=$arraymetasname[$j];
    $c=$arraymetastxt[$j];
//for ($j=0; $j < $listi; $j++){	
  echo '<tr id="tr'.($j).'" name="'.($j).'">
	<td class="td15"><label class="editinputname">第'.($k+1).'集</label></td>
	<td class="td35" >
	<textarea style="width:95%;height:30px;" name="meta_'.$arraymetasname[$j].'">'.$article->Metas->$a.'</textarea>
	
	</td>
<td class="td35" >
	<textarea style="width:95%;height:30px;" name="meta_'.$arraymetastxt[$j].'">'.$article->Metas->$c.'</textarea>
	</td>
	<td><img onclick="ndclear('.($j).')" src="'.$zbp->host.'zb_system/image/admin/delete.png"></td>
	</tr>';
}  #	<input style="width:95%" name="meta_'.$arraymetasname[$j].'" value="'.$article->Metas->$arraymetasname[$j].'"/>


    $strtpl= '<tr id=\"tr%num%\" name=\"%num%\" class=\"color2\"><td class=\"td15\"><label class=\"editinputname\">第%num%集</label></td><td class=\"td35\"><textarea style=\"width:95%;height:30px;\" name=\"meta_video%mnum%\"></textarea></td><td class=\"td35\"><textarea style=\"width:95%;height:30px;\" name=\"meta_vtxt%mnum%\"></textarea></td><td><img onclick=\"ndclear(%num%)\" src=\"'.$zbp->host.'zb_system/image/admin/delete.png\"></td></tr>'; 	#<input value=\"\"  name=\"meta_txdiany%mnum%\" style=\"width:95%\">

    echo '</table>
<input type="hidden" name="meta_NBTotaldiany" id="totaldiany" value="'.($article->Metas->NBTotaldiany==''?1:$article->Metas->NBTotaldiany).'"/>

<script>
function ndclear(eve){
document.getElementById("totaldiany").value=document.getElementById("totaldiany").value.replace(","+eve,"");
$("#tr"+eve).remove();

}
function nbdiany(){
var num=parseInt($("#nbdiany tbody tr:last-child").attr("name"))+parseInt(1) ;
//alert(num);
var mnum=num;
//alert(mnum);
document.getElementById("totaldiany").value=document.getElementById("totaldiany").value+","+num;
var strtpl="'.$strtpl.'";

var reg=new RegExp("%num%","g"); //创建正则RegExp对象   
var newstr=strtpl.replace(reg,num);   

var reg=new RegExp("%mnum%","g"); //创建正则RegExp对象   
var newstr=newstr.replace(reg,mnum);   

//strtpl.replace(/%num%/, num);
//strtpl.replace(/%mnum%/, mnum);

$("#nbdiany tbody").append(newstr);
}
</script>		
<table>
<tr><td colspan="5"><a class="ias_trigger" onclick="nbdiany();">点击增加集数</a></td></tr>
</table>
	</div>';
}




function txdida_Category_Edit_Response() {
    global $zbp,$cate;
    echo '
	  <p><span class="title">标题(主题自带seo功能):</span><br /><input style="width:95%" name="meta_flbt" value="'.$cate->Metas->flbt.'"/></p>
	  <p><span class="title">关键词(主题自带seo功能):</span><br /><input style="width:95%" name="meta_flgjc" value="'.$cate->Metas->flgjc.'"/></p>
	';
}
function txdida_Tag_Edit_Response() {
    global $zbp,$tag;
    echo '
	  <p><span class="title">标题（主题自带seo功能）:</span><br /><input style="width:95%" name="meta_title" value="'.$tag->Metas->title.'"/></p>
      <p><span class="title">关键词（主题自带seo功能）:</span><br /><input style="width:95%" name="meta_keywords" value="'.$tag->Metas->keywords.'"/></p>
	';
}



function txdida_AddMenu(&$m){
    global $zbp;
    array_unshift($m, MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/txdida/main.php?act=config","","topmenu_txdida"));
}

function txdida_SubMenu($id){
    $arySubMenu = array(
        0 => array('主题说明', 'config', 'left', false),
        1 => array('图片上传', 'logo', 'left', false),
        2 => array('SEO设置', 'seo', 'left', false),
        3 => array('首页调用', 'sy', 'left', false),
        4 => array('主题颜色设置', 'ys', 'left', false),
        5 => array('电脑端广告', 'dn', 'left', false),
        6 => array('手机端广告', 'sj', 'left', false),
        7 => array('会员设置', 'hy', 'left', false),
    );
    foreach($arySubMenu as $k => $v){
        echo '<a href="?act='.$v[1].'" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$v[1]?'m-now':'').'">'.$v[0].'</span></a>';
    }
}


function InstallPlugin_txdida(){
    global $zbp;
    if(!$zbp->Config('txdida')->HasKey('Version')){
        $zbp->Config('txdida')->Version = '1.0';
        $zbp->Config('txdida')->ms = '网站描述';
        $zbp->Config('txdida')->gjc = '网站关键词';
        $zbp->Config('txdida')->fx = '请在这里放置你的在线分享代码';
        $zbp->Config('txdida')->cmsid = '1,1,1,1';
        $zbp->Config('txdida')->newscms = '1,1,1,1';
        $zbp->Config('txdida')->newscmskg = '0';
        $zbp->Config('txdida')->seokg = '1';
        $zbp->Config('txdida')->flashon = '1';
        $zbp->Config('txdida')->uservip = '1';
        $zbp->Config('txdida')->userqq = '0';
        $zbp->Config('txdida')->userdj = '1';
        $zbp->Config('txdida')->ckdz = '';
        $zbp->Config('txdida')->flash = '
<li style="background:url({#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/hdp1.png) #0BBDA7 center 0 no-repeat;"><a target="_blank"  href="#"></a></li>
<li style="background:url({#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/hdp1.png) #0BBDA7 center 0 no-repeat;"><a target="_blank"  href="#"></a></li>';
        $zbp->Config('txdida')->logoad = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad468.png"></a>';
        $zbp->Config('txdida')->listad = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->listad1 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->listad2 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->listad3 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->listad4 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->listad5 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->listad6 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->sjgg = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->sjgg1 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->sjgg2 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->sjgg3 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->sjgg4 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->sjgg5 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->sjgg6 = '<a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1190.png"></a>';
        $zbp->Config('txdida')->yclad = '
<dd class="img-b xia10"><!--广告代码开始--><a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1.png"></a><!--广告代码结束--></dd>
<dd class="img-b xia10"><!--广告代码开始--><a href="#"><img src="{#ZC_BLOG_HOST#}zb_users/theme/txdida/style/img/ad1.png"></a><!--广告代码结束--></dd>';
        $zbp->Config('txdida')->listadon = '1';
        $zbp->Config('txdida')->listad1on = '1';
        $zbp->Config('txdida')->listad2on = '1';
        $zbp->Config('txdida')->listad3on = '1';
        $zbp->Config('txdida')->listad4on = '1';
        $zbp->Config('txdida')->listad5on = '1';
        $zbp->Config('txdida')->listad6on = '1';
        $zbp->Config('txdida')->sjggon = '1';
        $zbp->Config('txdida')->sjgg1on = '1';
        $zbp->Config('txdida')->sjgg2on = '1';
        $zbp->Config('txdida')->sjgg3on = '1';
        $zbp->Config('txdida')->sjgg4on = '1';
        $zbp->Config('txdida')->sjgg5on = '1';
        $zbp->Config('txdida')->sjgg6on = '1';
        $zbp->Config('txdida')->zs = 'ED0027';
        $zbp->Config('txdida')->fs = '2D2D2D';
        $zbp->Config('txdida')->topy = '顶部右侧的文字';
        $zbp->Config('txdida')->leshi = '乐视云点播User Unique';
        $zbp->Config('txdida')->videokey = 'video++ key';
        $zbp->Config('txdida')->copyon = '1';
        $zbp->SaveConfig('txdida');
    }
    txdida_AppReg();
}

//卸载主题
function UninstallPlugin_txdida(){
    global $zbp;
}


?>