<?php  /* Template Name: 主题自带seo设置模板 */  ?>
<?php if ($type=='article') { ?>
<title><?php  echo $title;  ?>-<?php  echo $article->Category->Name;  ?>-<?php  echo $name;  ?></title>
<meta name="keywords" content="<?php if ($article->Metas->nrgjc) { ?><?php  echo $article->Metas->nrgjc;  ?><?php }else{  ?><?php  foreach ( $article->Tags as $tag) { ?><?php  echo $tag->Name;  ?>,<?php }   ?><?php } ?>" />
<?php $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...'); ?>
<meta name="description" content="<?php if ($article->Metas->nrms) { ?><?php  echo $article->Metas->nrms;  ?><?php }else{  ?><?php  echo $description;  ?>,<?php  echo $name;  ?><?php } ?>" />
<?php }elseif($type=='page') {  ?>
<title><?php  echo $title;  ?>-<?php  echo $name;  ?></title>
<meta name="keywords" content="<?php if ($article->Metas->nrgjc) { ?><?php  echo $article->Metas->nrgjc;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?>" />
<?php $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...'); ?>
<meta name="description" content="<?php if ($article->Metas->nrms) { ?><?php  echo $article->Metas->nrms;  ?><?php }else{  ?><?php  echo $description;  ?>,<?php  echo $name;  ?><?php } ?>" />
<meta name="author" content="<?php  echo $article->Author->StaticName;  ?>">
<?php }elseif($type=='index') {  ?>
<title><?php  echo $name;  ?><?php if ($page>'1') { ?>-第<?php  echo $pagebar->PageNow;  ?>页<?php } ?>-<?php  echo $subname;  ?></title>
<meta name="Keywords" content="<?php  echo $zbp->Config('txdida')->gjc;  ?>">
<meta name="description" content="<?php  echo $zbp->Config('txdida')->ms;  ?>">
<?php }elseif($type=='category') {  ?>
<title><?php if ($category->Metas->flbt) { ?><?php  echo $category->Metas->flbt;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?>-<?php  echo $name;  ?><?php if ($page>'1') { ?>-第<?php  echo $pagebar->PageNow;  ?>页<?php } ?></title>
<meta name="Keywords" content="<?php if ($category->Metas->flgjc) { ?><?php  echo $category->Metas->flgjc;  ?><?php }else{  ?><?php  echo $title;  ?>,<?php  echo $name;  ?><?php } ?>">
<meta name="description" content="<?php if ($category->Intro) { ?><?php  echo $category->Intro;  ?><?php }else{  ?><?php  echo $title;  ?>,<?php  echo $name;  ?><?php } ?>">
<?php }elseif($type=='tag') {  ?>
<title><?php if ($tag->Metas->title) { ?><?php  echo $tag->Metas->title;  ?><?php }else{  ?><?php  echo $title;  ?>-<?php  echo $name;  ?><?php if ($page>'1') { ?>-第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php } ?></title>
<meta name="Keywords" content="<?php if ($tag->Metas->keywords) { ?><?php  echo $tag->Metas->keywords;  ?><?php }else{  ?><?php  echo $title;  ?>,<?php  echo $name;  ?><?php } ?>">
<meta name="description" content="<?php if ($tag->Intro) { ?><?php  echo $tag->Intro;  ?><?php }else{  ?><?php  echo $title;  ?>,<?php  echo $name;  ?><?php } ?>">
<?php }else{  ?>
<title><?php  echo $title;  ?>-<?php  echo $name;  ?></title>
<?php } ?>