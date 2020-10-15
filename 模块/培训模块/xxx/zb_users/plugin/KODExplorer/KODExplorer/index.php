<?php
require '../../../../zb_system/function/c_system_base.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('KODExplorer')) {$zbp->ShowError(48);die();}
include './config/config.php';
$app = new Application();
init_lang();
init_setting();
$app->run();