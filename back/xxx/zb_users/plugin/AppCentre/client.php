<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
require dirname(__FILE__) . '/function.php';
$zbp->Load();

$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('AppCentre')) {$zbp->ShowError(48);die();}

if (!$zbp->Config('AppCentre')->username || !$zbp->Config('AppCentre')->password) {
	$blogtitle = '应用中心(客户端)-登录应用商城';
} else {
	$blogtitle = '应用中心(客户端)-我的应用仓库';
}

Add_Filter_Plugin('Filter_Plugin_CSP_Backend', 'AppCentre_UpdateCSP');

if (GetVars('act') == 'login') {
  if (!$zbp->ValidToken(GetVars('token', 'GET'),'AppCentre')) {$zbp->ShowError(5, __FILE__, __LINE__);die();}
  AppCentre_CheckInSecurityMode();
	$s = Server_Open('vaild');
	if ($s) {

		$zbp->Config('AppCentre')->username = GetVars("app_username");
		$zbp->Config('AppCentre')->password = $s;
		$zbp->SaveConfig('AppCentre');

		$zbp->SetHint('good', '您已成功登录APP应用中心.');
		Redirect('./main.php');
		die;
	} else {
		$zbp->SetHint('bad', '用户名或密码错误.');
		Redirect('./client.php');
		die;
	}
}

if (GetVars('act') == 'logout') {
  if (function_exists('CheckHTTPRefererValid')) {
    CheckHTTPRefererValid();
  }
  AppCentre_CheckInSecurityMode();
	$zbp->Config('AppCentre')->username = '';
	$zbp->Config('AppCentre')->password = '';
	$zbp->SaveConfig('AppCentre');
	$zbp->SetHint('good', '您已退出APP应用中心.');
	Redirect('./client.php');
	die;
}

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id="divMain">

  <div class="divHeader"><?php echo $blogtitle;?></div>
<div class="SubMenu"><?php AppCentre_SubMenus(9);?></div>
  <div id="divMain2">
<?php if (!$zbp->Config('AppCentre')->username) {?>
            <div class="divHeader2">应用中心账户登录</div>
            <form action="?act=login&token=<?php echo $zbp->GetToken('AppCentre')?>" method="post">
              <table style="line-height:3em;" width="100%" border="0">
                <tr height="32">
                  <th  align="center">账户登录
                    </td>
                </tr>
                <tr height="32">
                  <td  align="center">令牌:
                    <input type="password" name="app_username" value="" style="width:40%"/></td>
                </tr>
                <tr height="32" style="display: none;">
                  <td  align="center">密&nbsp;&nbsp;&nbsp;&nbsp;码:
                    <input type="password" name="app_password" value="" style="width:40%" /></td>
                </tr>
                <tr height="32" align="center">
                  <td align="center"><input type="submit" value="登录" class="button" /></td>
                </tr>
                <tr height="32" align="center">
                  <td align="center"><a href="https://uc.zblogcn.com/user/security/token" target="_blank">点击获取账户登录令牌</a></td>
                </tr>
              </table>
            </form>
<?php } else {

//已登录
	Server_Open('shoplist');

}
?>



	<script type="text/javascript">ActiveLeftMenu("aAppCentre");</script>
	<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/AppCentre/logo.png';?>");</script>
  </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>