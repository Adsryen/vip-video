<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('txdida')) {$zbp->ShowError(48);die();}
$blogtitle='主题配置';

$act = "";
if ($_GET['act']){
    $act = $_GET['act'] == "" ? 'config' : $_GET['act'];
}

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
$linlink=$zbp->host .'zb_system/admin/module_edit.php?act=ModuleEdt&id=';

if(isset($_POST['ms'])){
    $zbp->Config('txdida')->ms = $_POST['ms'];
    $zbp->Config('txdida')->gjc = $_POST['gjc'];
    $zbp->Config('txdida')->seokg = $_POST['seokg'];
    $zbp->SaveConfig('txdida');
    $zbp->ShowHint('good');
}

if(isset($_POST['flash'])){
    $zbp->Config('txdida')->flash = $_POST['flash'];
    $zbp->Config('txdida')->flashon = $_POST['flashon'];
    $zbp->Config('txdida')->cmsid = $_POST['cmsid'];
    $zbp->Config('txdida')->fx = $_POST['fx'];
    $zbp->Config('txdida')->newscms = $_POST['newscms'];
    $zbp->Config('txdida')->newscmskg = $_POST['newscmskg'];
    $zbp->Config('txdida')->topy = $_POST['topy'];
    $zbp->Config('txdida')->leshiid = $_POST['leshiid'];
    $zbp->Config('txdida')->videokey = $_POST['videokey'];
    $zbp->Config('txdida')->ckdz = $_POST['ckdz'];
    $zbp->Config('txdida')->copyon = $_POST['copyon'];
    $zbp->SaveConfig('txdida');
    $zbp->ShowHint('good');
}

if(isset($_POST['logoad'])){
    $zbp->Config('txdida')->logoad = $_POST['logoad'];
    $zbp->Config('txdida')->listad = $_POST['listad'];
    $zbp->Config('txdida')->listad1 = $_POST['listad1'];
    $zbp->Config('txdida')->listad2 = $_POST['listad2'];
    $zbp->Config('txdida')->listad3 = $_POST['listad3'];
    $zbp->Config('txdida')->listad4 = $_POST['listad4'];
    $zbp->Config('txdida')->listad5 = $_POST['listad5'];
    $zbp->Config('txdida')->listad6 = $_POST['listad6'];
    $zbp->Config('txdida')->yclad = $_POST['yclad'];
    $zbp->Config('txdida')->listadon = $_POST['listadon'];
    $zbp->Config('txdida')->listad1on = $_POST['listad1on'];
    $zbp->Config('txdida')->listad2on = $_POST['listad2on'];
    $zbp->Config('txdida')->listad3on = $_POST['listad3on'];
    $zbp->Config('txdida')->listad4on = $_POST['listad4on'];
    $zbp->Config('txdida')->listad5on = $_POST['listad5on'];
    $zbp->Config('txdida')->listad6on = $_POST['listad6on'];
    $zbp->SaveConfig('txdida');
    $zbp->ShowHint('good');
}

if(isset($_POST['zs'])){
    $zbp->Config('txdida')->zs = $_POST['zs'];
    $zbp->Config('txdida')->fs = $_POST['fs'];
    $zbp->SaveConfig('txdida');
    $zbp->ShowHint('good');
}

if(isset($_POST['sjgg'])){
    $zbp->Config('txdida')->sjgg = $_POST['sjgg'];
    $zbp->Config('txdida')->sjgg1 = $_POST['sjgg1'];
    $zbp->Config('txdida')->sjgg2 = $_POST['sjgg2'];
    $zbp->Config('txdida')->sjgg3 = $_POST['sjgg3'];
    $zbp->Config('txdida')->sjgg4 = $_POST['sjgg4'];
    $zbp->Config('txdida')->sjgg5 = $_POST['sjgg5'];
    $zbp->Config('txdida')->sjgg6 = $_POST['sjgg6'];
    $zbp->Config('txdida')->sjgg1on = $_POST['sjgg1on'];
    $zbp->Config('txdida')->sjgg2on = $_POST['sjgg2on'];
    $zbp->Config('txdida')->sjgg3on = $_POST['sjgg3on'];
    $zbp->Config('txdida')->sjgg4on = $_POST['sjgg4on'];
    $zbp->Config('txdida')->sjgg5on = $_POST['sjgg5on'];
    $zbp->Config('txdida')->sjgg6on = $_POST['sjgg6on'];
    $zbp->Config('txdida')->sjggon = $_POST['sjggon'];
    $zbp->SaveConfig('txdida');
    $zbp->ShowHint('good');
}

if(isset($_POST['userdj'])){
    $zbp->Config('txdida')->userdj = $_POST['userdj'];
    $zbp->Config('txdida')->uservip = $_POST['uservip'];
    $zbp->Config('txdida')->userqq = $_POST['userqq'];
    $zbp->SaveConfig('txdida');
    $zbp->ShowHint('good');
}
?>

<script src="source/jscolor.js" type="text/javascript"></script>
<style type="text/css">.tx_title{border: 1px solid #ED0027;border-radius: 3px;padding:5px 15px;margin-bottom:15px;}
    .tx_title li{border-bottom: 1px solid #eee;line-height:35px;}
</style>
<div id="divMain">
    <div class="divHeader"><?php echo $blogtitle;?></div>
    <div class="SubMenu">
        <?php txdida_SubMenu($act);?>
        <a href="http://www.txcstx.cn/muban/" target="_blank"><span class="m-left" style="color:#F00">更多主题</span></a>
    </div>
    <div id="divMain2">
        <?php
        if ($act == 'config'){
        ?>
        <ul class="tx_title">
            <li>使用请最好能阅读下此教程：<a href="http://www.txcstx.cn/post/961.html" target="_blank">http://www.txcstx.cn/post/961.html</a></li>
            <li>乐视云使用方法：<a href="http://www.txcstx.cn/post/966.html" target="_blank">http://www.txcstx.cn/post/966.html</a></li>
            <li>video++使用方法：<a href="http://www.txcstx.cn/post/980.html" target="_blank">http://www.txcstx.cn/post/980.html</a></li>
            <li>ckplayer使用方法：<a href="http://www.txcstx.cn/post/1027.html" target="_blank">http://www.txcstx.cn/post/1027.html</a></li>
            <li style="color:red;">PS：必须在设置了伪静态之后才能正常使用本主题。</li>
            <li>-</li>
            <li><strong style="color:red;">模板文件说明</strong>：视频封面列表页模板：index-list.php；视频列表页模板：list-shipin.php；视频内容页模板：single.php；视频播放单页模板：single-sy.php；新闻列表页模板：list-news.php；新闻内容页模板：single-news.php；</li>
            <li>主题作者：天兴工作室；技术支持QQ：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=1109856918&amp;site=qq&amp;menu=yes" rel="nofollow">1109856918</a>；官网：<a href="https://www.txcstx.cn" target="_blank">https://www.txcstx.cn</a></li>
        </ul>
        <?php
        }
        if ($act == 'logo'){
        ?>
        <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
            <th width="30%"><p align="center">图片名称</p></th>
            <th width="20%"><p align="center">当前图片</p></th>
            <th width="50%"><p align="center">上传文件</p></th>  
            <form enctype="multipart/form-data" method="post" action="save.php?type=base">
                <tr>
                    <td><label><p align="center">上传LOGO(大小为200*60)</p></label></td>
                    <td><p align="center">  <img src="include/logo.png" style="width:auto;height:40px;"></p></td>
                    <td><p align="center"><input name="logo.png" type="file" /><input name="" type="Submit" class="button" value="保存" /></p></td>
                </tr>        
            </form>   
            <form enctype="multipart/form-data" method="post" action="save.php?type=pic">
                <tr>
                    <td><label><p align="center">上传默认缩略图(大小为176*230)</p></label></td>
                    <td><p align="center"><img src="include/pic.png" style="width:auto;height:40px;"></p></td>
                    <td><p align="center"><input name="pic.png" type="file" /><input name="" type="Submit" class="button" value="保存" /></p></td>
                </tr>            
            </form>  
        </table>  

        <?php
        }
        if ($act == 'ys'){
        ?>
        <form id="form1" name="form1" method="post"> 
            <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">

                <tr>
                    <th colspan="4"><p align="center">网站配色</p></th>
                </tr>
                <tr>
                    <td width="25%">网站主色（初始颜色ED0027）</td>
                    <td width="25%"><input name="zs" type="text" class="color"  style="width:50%" value="#<?php echo $zbp->Config('txdida')->zs;?>" /></td>
                    <td width="25%">辅助颜色（初始颜色2D2D2D）</td>
                    <td width="25%"><input name="fs" type="text" class="color"  style="width:50%" value="#<?php echo $zbp->Config('txdida')->fs;?>" /></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input name="" type="Submit" class="button" value="保存"/>
                    </td>
                </tr>
            </table>
        </form>

        <?php
        }
        if ($act == 'seo'){
        ?> 
        <form id="form1" name="form1" method="post"> 

            <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
                <tr>
                    <th width="15%"><p align="center">配置名称</p></th>
                    <th width="50%"><p align="center">配置内容</p></th>
                    <th width="25%"><p align="center">配置说明</p></th>
                </tr>

                <tr>
                    <td><label for="ms"><p align="center">网站描述</p></label></td>
                    <td><p align="left"><textarea name="ms" type="text" id="ms" style="width:98%;"><?php echo $zbp->Config('txdida')->ms;?></textarea></p></td>
                    <td><p align="left">首页网站描述</p></td>
                </tr>

                <tr>
                    <td><label for="gjc"><p align="center">网站关键词</p></label></td>
                    <td><p align="left"><textarea name="gjc" type="text" id="gjc" style="width:98%;"><?php echo $zbp->Config('txdida')->gjc;?></textarea></p></td>
                    <td><p align="left">首页网站关键词</p></td>
                </tr>
                <tr>
                    <td><label for="seokg"><p align="center">SEO开关</p></label></td>
                    <td><p align="center"><input name="seokg" type="text" value="<?php echo $zbp->Config('txdida')->seokg; ?>" class="checkbox" style="display:none;" /></p></td>
                    <td><p align="left">本主题支持首页、列表页、内容页的标题/关键词/描述手工填写选项，如果你安装了“seo工具大全”插件后产生冲突，请关闭此开关即可！</p></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input name="" type="Submit" class="button" value="保存"/>
                    </td>
                </tr>
            </table>  
        </form>

        <?php
        }
        if ($act == 'sy'){
        ?>
        <form id="form2" name="form2" method="post">
            <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
                <tr>
                    <th width="15%"><p align="center">配置名称</p></th>
                    <th width="50%"><p align="center">配置内容</p></th>
                    <th width="25%"><p align="center">配置说明</p></th>
                </tr>
                <tr>
                    <td><label for="flash"><p align="center">首页flash幻灯片</p></label></td>
                    <td><p align="left"><textarea name="flash" type="text" id="flash" style="width:98%;height:120px;"><?php echo $zbp->Config('txdida')->flash;?></textarea></p></td>
                    <td><p align="left">首页flash幻灯片，图片高300宽度自适应，图片颜色要和背景色保持一致</p></td>
                </tr> 
                <tr>
                    <td><label><p align="center">flash幻灯片开关</p></label></td>
                    <td><p align="center"><input name="flashon" type="text" value="<?php echo $zbp->Config('txdida')->flashon; ?>" class="checkbox" style="display:none;" /></p></td>
                    <td><p align="left">关闭后将不显示flash幻灯片</p></td>
                </tr>

                <tr>
                    <td><label for="cmsid"><p align="center">首页视频栏目cms</p></label></td>
                    <td><p align="left"><textarea name="cmsid" type="text" id="cmsid" style="width:98%;"><?php echo $zbp->Config('txdida')->cmsid;?></textarea></p></td>
                    <td><p align="left">仅填写栏目id即可，多个栏目用,号隔开，示例：1,2,3,4,5,6,7</p></td>
                </tr> 

                <tr>
                    <td><label for="newscms"><p align="center">首页新闻栏目cms</p></label></td>
                    <td><p align="left"><textarea name="newscms" type="text" id="newscms" style="width:98%;"><?php echo $zbp->Config('txdida')->newscms;?></textarea></p></td>
                    <td><p align="left"><input name="newscmskg" type="text" value="<?php echo $zbp->Config('txdida')->newscmskg; ?>" class="checkbox" style="display:none;" />首页新闻cms区块可以选择关闭</p></td>
                </tr> 
                <tr>
                    <td><label for="topy"><p align="center">顶部右侧文字</p></label></td>
                    <td><p align="left"><textarea name="topy" type="text" id="topy" style="width:98%;"><?php echo $zbp->Config('txdida')->topy;?></textarea></p></td>
                    <td><p align="left">整站顶部右侧的文字</p></td>
                </tr> 
                <tr>
                    <td><label for="leshiid"><p align="center">ck解析接口地址</p></label></td>
                    <td><p align="left"><textarea name="ckdz" type="text" id="ckdz" style="width:98%;"><?php echo $zbp->Config('txdida')->ckdz;?></textarea></p></td>
                    <td><p align="left">此处填写你的ck解析接口地址，如果留空则调用默认ck播放器</p></td>
                </tr> 
                <tr>
                    <td><label for="leshiid"><p align="center">乐视云点播 User Unique</p></label></td>
                    <td><p align="left"><textarea name="leshiid" type="text" id="leshiid" style="width:98%;"><?php echo $zbp->Config('txdida')->leshiid;?></textarea></p></td>
                    <td><p align="left">乐视云点播 User Unique（乐视云点播--控制台--概况即可看到你自己的User Unique）</p></td>
                </tr> 
                <tr>
                    <td><label for="videokey"><p align="center">video++ key(video注册 后台获取key)</p></label></td>
                    <td><p align="left"><textarea name="videokey" type="text" id="videokey" style="width:98%;"><?php echo $zbp->Config('txdida')->videokey;?></textarea></p></td>
                    <td><p align="left">video++ key(video++注册 然后登陆后台获取key)</p></td>
                </tr> 

                <tr>
                    <td><label for="fx"><p align="center">在线分享</p></label></td>
                    <td><p align="left"><textarea name="fx" type="text" id="fx" style="width:98%;"><?php echo $zbp->Config('txdida')->fx;?></textarea></p></td>
                    <td><p align="left">请在这里放置你的在线分享代码，百度分享或者其他都可以。</p></td>
                </tr> 
                <tr>
                    <td><label for="seokg"><p align="center">主题版权开关</p></label></td>
                    <td><p align="center"><input name="copyon" type="text" value="<?php echo $zbp->Config('txdida')->copyon; ?>" class="checkbox" style="display:none;" /></p></td>
                    <td><p align="left">关闭后不显示版权信息</p></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input name="" type="Submit" class="button" value="保存"/>
                    </td>
                </tr>
            </table> 
        </form>
        <?php
        }
        if ($act == 'dn'){
        ?>
        <form id="form4" name="form4" method="post">
            <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
                <tr>
                    <th width="15%"><p align="center">配置名称</p></th>
                    <th width="50%"><p align="center">配置内容</p></th>
                    <th width="25%"><p align="center">配置说明</p></th>
                </tr>
                <tr>
                    <td><label for="logoad"><p align="center">logo右侧广告位</p></label></td>
                    <td><p align="left"><textarea name="logoad" type="text" id="logoad" style="width:98%;"><?php echo $zbp->Config('txdida')->logoad;?></textarea></p></td>
                    <td><p align="left">广告位大小：468*60</p></td>
                </tr> 

                <tr>
                    <td><label for="listad"><p align="center">导航栏下通栏广告位(宽度1190*高度随意)</p></label></td>
                    <td><p align="left"><textarea name="listad" type="text" id="listad" style="width:98%;"><?php echo $zbp->Config('txdida')->listad;?></textarea></p></td>
                    <td><p align="left"><input name="listadon" type="text" value="<?php echo $zbp->Config('txdida')->listadon; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 

                <tr>
                    <td><label for="listad1"><p align="center">视频：列表页内容页左侧的广告位(宽935*高度随意)</p></label></td>
                    <td><p align="left"><textarea name="listad1" type="text" id="listad1" style="width:98%;"><?php echo $zbp->Config('txdida')->listad1;?></textarea></p></td>
                    <td><p align="left"><input name="listad1on" type="text" value="<?php echo $zbp->Config('txdida')->listad1on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 
                <tr>
                    <td><label for="listad4"><p align="center">视频：列表页内容页左侧的广告位2(宽935*高度随意)</p></label></td>
                    <td><p align="left"><textarea name="listad4" type="text" id="listad4" style="width:98%;"><?php echo $zbp->Config('txdida')->listad4;?></textarea></p></td>
                    <td><p align="left"><input name="listad4on" type="text" value="<?php echo $zbp->Config('txdida')->listad4on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 

                <tr>
                    <td><label for="listad5"><p align="center">视频：列表页内容页左侧的广告位2(宽935*高度随意)</p></label></td>
                    <td><p align="left"><textarea name="listad5" type="text" id="listad5" style="width:98%;"><?php echo $zbp->Config('txdida')->listad5;?></textarea></p></td>
                    <td><p align="left"><input name="listad5on" type="text" value="<?php echo $zbp->Config('txdida')->listad5on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 

                <tr>
                    <td><label for="yclad"><p align="center">视频：列表页内容页等右侧栏广告位（宽200*高度随意）</p></label></td>
                    <td><p align="left"><textarea name="yclad" type="text" id="yclad" style="width:98%;height:120px;"><?php echo $zbp->Config('txdida')->yclad;?></textarea></p></td>
                    <td><p align="left">留则空不显示广告位</p></td>
                </tr> 

                <tr>
                    <td><label for="listad2"><p align="center">新闻：列表页内容页左侧顶广告位（宽830*高度随意）</p></label></td>
                    <td><p align="left"><textarea name="listad2" type="text" id="listad2" style="width:98%;"><?php echo $zbp->Config('txdida')->listad2;?></textarea></p></td>
                    <td><p align="left"><input name="listad2on" type="text" value="<?php echo $zbp->Config('txdida')->listad2on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 
                <tr>
                    <td><label for="listad3"><p align="center">新闻：列表页列表页内容页左侧底广告位</p></label></td>
                    <td><p align="left"><textarea name="listad3" type="text" id="listad3" style="width:98%;"><?php echo $zbp->Config('txdida')->listad3;?></textarea></p></td>
                    <td><p align="left"><input name="listad3on" type="text" value="<?php echo $zbp->Config('txdida')->listad3on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 

                <tr>
                    <td><label for="listad6"><p align="center">整站底部通栏广告位(宽度1190*高度随意)</p></label></td>
                    <td><p align="left"><textarea name="listad6" type="text" id="listad6" style="width:98%;"><?php echo $zbp->Config('txdida')->listad6;?></textarea></p></td>
                    <td><p align="left"><input name="listad6on" type="text" value="<?php echo $zbp->Config('txdida')->listad6on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 
                <tr>
                    <td colspan="3">
                        <input name="" type="Submit" class="button" value="保存"/>
                    </td>
                </tr>
            </table> 
        </form>
        <?php
        }
        if ($act == 'sj'){
        ?>
        <form id="form5" name="form5" method="post">
            <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
                <tr>
                    <th width="15%"><p align="center">配置名称</p></th>
                    <th width="50%"><p align="center">配置内容</p></th>
                    <th width="25%"><p align="center">配置说明</p></th>
                </tr>
                <tr>
                    <td><label for="sjgg"><p align="center">导航栏下通栏广告位(请务必使用手机端专用广告代码)</p></label></td>
                    <td><p align="left"><textarea name="sjgg" type="text" id="sjgg" style="width:98%;"><?php echo $zbp->Config('txdida')->sjgg;?></textarea></p></td>
                    <td><p align="left"><input name="sjggon" type="text" value="<?php echo $zbp->Config('txdida')->sjggon; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 

                <tr>
                    <td><label for="sjgg1"><p align="center">视频：列表页内容页左侧的广告位(请务必使用手机端专用广告代码)</p></label></td>
                    <td><p align="left"><textarea name="sjgg1" type="text" id="sjgg1" style="width:98%;"><?php echo $zbp->Config('txdida')->sjgg1;?></textarea></p></td>
                    <td><p align="left"><input name="sjgg1on" type="text" value="<?php echo $zbp->Config('txdida')->sjgg1on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 
                <tr>
                    <td><label for="sjgg4"><p align="center">视频：列表页内容页左侧的广告位2(请务必使用手机端专用广告代码)</p></label></td>
                    <td><p align="left"><textarea name="sjgg4" type="text" id="sjgg4" style="width:98%;"><?php echo $zbp->Config('txdida')->sjgg4;?></textarea></p></td>
                    <td><p align="left"><input name="sjgg4on" type="text" value="<?php echo $zbp->Config('txdida')->sjgg4on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 

                <tr>
                    <td><label for="sjgg5"><p align="center">视频：列表页内容页左侧的广告位2(请务必使用手机端专用广告代码)</p></label></td>
                    <td><p align="left"><textarea name="sjgg5" type="text" id="sjgg5" style="width:98%;"><?php echo $zbp->Config('txdida')->sjgg5;?></textarea></p></td>
                    <td><p align="left"><input name="sjgg5on" type="text" value="<?php echo $zbp->Config('txdida')->sjgg5on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 


                <tr>
                    <td><label for="sjgg2"><p align="center">新闻：列表页内容页左侧顶广告位（请务必使用手机端专用广告代码）</p></label></td>
                    <td><p align="left"><textarea name="sjgg2" type="text" id="sjgg2" style="width:98%;"><?php echo $zbp->Config('txdida')->sjgg2;?></textarea></p></td>
                    <td><p align="left"><input name="sjgg2on" type="text" value="<?php echo $zbp->Config('txdida')->sjgg2on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 
                <tr>
                    <td><label for="sjgg3"><p align="center">新闻：列表页列表页内容页左侧底广告位（请务必使用手机端专用广告代码）</p></label></td>
                    <td><p align="left"><textarea name="sjgg3" type="text" id="sjgg3" style="width:98%;"><?php echo $zbp->Config('txdida')->sjgg3;?></textarea></p></td>
                    <td><p align="left"><input name="sjgg3on" type="text" value="<?php echo $zbp->Config('txdida')->sjgg3on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 

                <tr>
                    <td><label for="sjgg6"><p align="center">整站底部通栏广告位(请务必使用手机端专用广告代码)</p></label></td>
                    <td><p align="left"><textarea name="sjgg6" type="text" id="sjgg6" style="width:98%;"><?php echo $zbp->Config('txdida')->sjgg6;?></textarea></p></td>
                    <td><p align="left"><input name="sjgg6on" type="text" value="<?php echo $zbp->Config('txdida')->sjgg6on; ?>" class="checkbox" style="display:none;" /></p></td>
                </tr> 
                <tr>
                    <td colspan="3">
                        <input name="" type="Submit" class="button" value="保存"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        }
        if ($act == 'hy'){
        ?> 
        <form id="form1" name="form1" method="post"> 
            <ul class="tx_title">
                <li>会员功能说明：开启会员功能必须安装“<a href="https://app.zblogcn.com/?id=1139" target="_blank">用户中心（百搭）</a>”；</li>
                <li>此插件由“唐朝”开发，应用中心为收费版，github有免费版(<a href="https://github.com/tcshowhand/tangchao.git" target="_blank">点击下载</a>)，建议购买收费版以享受更好的服务。</li>
                <li>zblog默认可以投稿的会员等级为4（协作者），所以新注册的用户是没有投稿权限的，请根据此教程自行修改：<a href="https://www.txcstx.cn/post/1082.html" target="_blank">zblog用户权限设置插件“Z-Blog角色分配器”使用方法</a></li>
            </ul> 
            <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
                <tr>
                    <th width="15%"><p align="center">配置名称</p></th>
                    <th width="50%"><p align="center">配置内容</p></th>
                    <th width="25%"><p align="center">配置说明</p></th>
                </tr>

                <tr>
                    <td><label><p align="center">会员vip等支付功能开关</p></label></td>
                    <td><p align="center"><input name="uservip" type="text" value="<?php echo $zbp->Config('txdida')->uservip; ?>" class="checkbox" style="display:none;" /></p></td>
                    <td><p align="left">关闭将不显示vip、积分充值、财务管理等会员功能模块</p></td>
                </tr>
                <tr>
                    <td><label><p align="center">社交账号登录开关</p></label></td>
                    <td><p align="center"><input name="userqq" type="text" value="<?php echo $zbp->Config('txdida')->userqq; ?>" class="checkbox" style="display:none;" /></p></td>
                    <td><p align="left">用户中心里面设置好了qq登陆后可以开启此开关</p></td>
                </tr>
                <tr>
                    <td><label><p align="center">可以投稿的会员等级设置</p></label></td>
                    <td><p align="left"><textarea name="userdj" type="text" id="userdj" style="width:98%;"><?php echo $zbp->Config('txdida')->userdj;?></textarea></p></td>
                    <td><p align="left">填写等级数字即可，等级大小格式为“1>2>3>4>5>6”;举例填写了4那么4以上的会员都能投稿。（1是管理员，2是网站编辑，3是作者，4是协作者，5是普通注册用户，6是游客）</p></td>
                </tr> 
                <tr>
                    <td colspan="3">
                        <input name="" type="Submit" class="button" value="保存"/>
                    </td>
                </tr>
            </table>  
        </form>
        <?php
        }
        ?>

    </div>
</div>
<script type="text/javascript">ActiveTopMenu("topmenu_txdida");</script> 
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>
