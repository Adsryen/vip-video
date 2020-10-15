
<?php  /* Template Name: 系统模板勿选！！ */  ?>
<?php if ($type=='index'&&$page=='1') { ?>
<?php  include $this->GetTemplate('index-s');  ?>
<?php }else{  ?>
<?php  include $this->GetTemplate('list-shipin');  ?>
<?php } ?>