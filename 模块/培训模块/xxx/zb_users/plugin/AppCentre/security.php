<?php
require '../../../zb_system/function/c_system_base.php';

require '../../../zb_system/function/c_system_admin.php';

require dirname(__FILE__) . '/function.php';
$zbp->Load();

$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}

if (!$zbp->CheckPlugin('AppCentre')) {$zbp->ShowError(48);die();}


if (count($_POST) > 0) {
  if (function_exists('CheckIsRefererValid')) {
    CheckIsRefererValid();
  }
  file_put_contents($zbp->path . 'zb_users/data/appcentre_security_mode.php', '');
}

$blogtitle = '应用中心-安全模式';


require $blogpath . 'zb_system/admin/admin_header.php';
?>
<style>
.warning { 
  font-size: 150%; 
  line-height: 2em;
  text-align: center;
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  background: white;
}
.warning .button {
  height: 100%;
}
</style>
<?php
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id="divMain">

  <div class="divHeader"><?php echo $blogtitle;?></div>
<div class="SubMenu"><?php AppCentre_SubMenus(7);?></div>
  <div id="divMain2">
  <div class="warning">
<?php
if (AppCentre_InSecurityMode()) {
?>
<p>您已开启安全模式，要关闭，请手动删除以下文件：</p>
<p>网站目录/zb_users/data/appcentre_security_mode.php </p>
<p>请注意，存在文件管理、数据库管理、主题编辑、网站备份等功能的插件，仍然会对您的网站产生威胁。如果您暂时不需要使用这些插件，请务必删除。</p>
<?php
} else {
?>
<p>如果您不再安装新应用，您可以点击这里开启安全模式。</p>
<p>安全模式开启后，您将不被允许下载新应用，以抵御黑客威胁。</p>
<p>请注意，存在文件管理、数据库管理、主题编辑、网站备份等功能的插件，仍然会对您的网站产生威胁。在启用安全模式前，我们推荐您先删除这些插件。</p>
<p>
<form method="post">
<?php if (function_exists('CheckIsRefererValid')) {?>
<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken(); ?>">
<?php } ?>
<input type="submit" class="button" value="开启安全模式"></form></p>
<?php }?>
</div>
	<script type="text/javascript">ActiveLeftMenu("aAppCentre");</script>
	<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/AppCentre/logo.png';?>");</script>
  </div>
</div>


<?php
require $blogpath . 'zb_system/admin/admin_footer.php';

RunTime();
?>