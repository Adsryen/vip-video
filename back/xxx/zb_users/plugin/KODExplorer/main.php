<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
$blogtitle = 'KODExplorer - 解压页面';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('KODExplorer')) {$zbp->ShowError(48);die();}

$version = $zbp->Config('KODExplorer')->Version;

if ($version == '1.3.21.1') {
	if (is_dir('./KODExplorer')) {
		Redirect('KODExplorer/index.php?' . GetVars('QUERY_STRING', 'SERVER'));
	}

}

ob_start();
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

?>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
  </div>
  <div id="divMain2">
  <p>检测到您是第一次使用本插件，解压中...</p>
  <?php ob_flush();
flush();?>
  <?php

if (is_file('./KODExplorer.zip')) {
	require 'pclzip.class.php';
	$zip = new PclZip('KODExplorer.zip');
	$zip->extract(PCLZIP_OPT_PATH,
		'.', PCLZIP_OPT_SET_CHMOD, 0777, PCLZIP_OPT_REPLACE_NEWER);
}
if (is_file('./KODExplorer/lib/plugins/adminer/index.php')) {
  @unlink('./KODExplorer/lib/plugins/adminer/index.php');
}
$zbp->Config('KODExplorer')->Version = '1.3.21.1';
$zbp->SaveConfig('KODExplorer');
echo '<script>location.reload();</script>';

?>
  </div>

</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
