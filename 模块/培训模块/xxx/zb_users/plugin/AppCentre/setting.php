<?php
require '../../../zb_system/function/c_system_base.php';

require '../../../zb_system/function/c_system_admin.php';

require dirname(__FILE__) . '/function.php';
$zbp->Load();

$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}

if (!$zbp->CheckPlugin('AppCentre')) {$zbp->ShowError(48);die();}

AppCentre_CheckInSecurityMode();

$blogtitle = '应用中心-设置';


if (GetVars('act') == 'save') {

  if (!$zbp->ValidToken(GetVars('token', 'POST'),'AppCentre')) {$zbp->ShowError(5, __FILE__, __LINE__);die();}
	$zbp->Config('AppCentre')->enabledcheck = (int) GetVars("app_enabledcheck");
	$zbp->Config('AppCentre')->checkbeta = (int) GetVars("app_checkbeta");
	$zbp->Config('AppCentre')->enabledevelop = (int) GetVars("app_enabledevelop");
	$zbp->Config('AppCentre')->enablegzipapp = (int) GetVars("app_enablegzipapp");
	$zbp->SaveConfig('AppCentre');

	$zbp->SetHint('good');
	Redirect('./setting.php');

}

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id="divMain">

  <div class="divHeader"><?php echo $blogtitle;?></div>
<div class="SubMenu"><?php AppCentre_SubMenus(4);?></div>
  <div id="divMain2">

            <form action="?act=save" method="post">
            <?php echo '<input id="token" name="token" type="hidden" value="'.$zbp->GetToken('AppCentre').'"/>'?>
              <table width="100%" border="0">
                <tr height="32">
                  <th colspan="2" align="center">设置
                    </td>
                </tr>
                <tr height="32">
                  <td width="30%" align="left"><p><b>· 启用自动检查更新</b><br/>
                      <span class="note">&nbsp;&nbsp;在进入后台时会检查应用更新和系统更新 </span></p></td>
                  <td><input id="app_enabledcheck" name="app_enabledcheck" type="text" value="<?php echo $zbp->Config('AppCentre')->enabledcheck;?>" class="checkbox"/></td>
                </tr>
                <tr height="32">
                  <td width="30%" align="left"><p><b>· 检查Beta版程序</b><br/>
                      <span class="note">&nbsp;&nbsp;若打开，则系统将检查最新测试版的Z-Blog更新</span></p></td>
                  <td><input id="app_checkbeta" name="app_checkbeta" type="text" value="<?php echo $zbp->Config('AppCentre')->checkbeta;?>" class="checkbox"/></td>
                </tr>
                <tr height="32">
                  <td width="30%" align="left"><p><b>· 启用开发者模式</b><br/>
                      <span class="note">&nbsp;&nbsp;启用开发者模式可以修改应用信息、导出应用和远程提交应用</span></p></td>
                  <td><input id="app_enabledevelop" name="app_enabledevelop" type="text" value="<?php echo $zbp->Config('AppCentre')->enabledevelop;?>" class="checkbox"/></td>
                </tr>
                <tr height="32">
                  <td width="30%" align="left"><p><b>· 导出经过GZip压缩的应用包</b><br/>
                      <span class="note">&nbsp;&nbsp;1.4以下版本不支持应用压缩包导入及导出</span></p></td>
                  <td><input id="app_enablegzipapp" name="app_enablegzipapp" type="text" value="<?php echo $zbp->Config('AppCentre')->enablegzipapp;?>" class="checkbox"/></td>
                </tr>
              </table>
              <hr/>
              <p>
                <input type="submit" value="提交" class="button" />
              </p>
              <hr/>
            </form>


	<script type="text/javascript">ActiveLeftMenu("aAppCentre");</script>
	<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/AppCentre/logo.png';?>");</script>
  </div>
</div>


<?php
require $blogpath . 'zb_system/admin/admin_footer.php';

RunTime();
?>