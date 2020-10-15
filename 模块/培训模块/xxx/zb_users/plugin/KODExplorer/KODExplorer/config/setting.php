<?php
/*
 * @link http://www.kalcaddle.com/
 * @author warlee | e-mail:kalcaddle@qq.com
 * @copyright warlee 2014.(Shanghai)Co.,Ltd
 * @license http://kalcaddle.com/tools/licenses/license.txt
 */


//配置数据,可在setting_user.php中更改覆盖
$config['settings'] = array(
	'download_url_time'	=> 0,			//下载地址生效时间，按秒计算，0代表不限制，默认不限制
	'upload_chunk_size'	=> 1024*1024*2,	//上传分片大小；默认1M
	'version_desc'		=> 'product',
);


//初始化系统配置
$config['setting_system_default'] = array(
	'system_password'	=> rand_string(10),
	'system_name'		=> "KodExplorer",
	'system_desc'		=> "——芒果云.资源管理器",
	'path_hidden'		=> ".DS_Store,.gitignore",//目录列表隐藏的项
	'auto_login'		=> "0",			// 是否自动登录；登录用户为guest
	'first_in'			=> "explorer",	// 登录后默认进入[explorer desktop,editor]
	'new_user_app'		=> "",
	'new_user_folder'	=> "download,music,image,desktop",
);

// 配置项可选值
$config['setting_all'] = array(
	'language' => "en:English,zh_CN:简体中文,zh_TW:繁體中文",
	'themeall' => "simple/:<b>simple</b>:simple",
	'codethemeall' => "chrome,clouds,crimson_editor,eclipse,github,solarized_light,tomorrow,xcode,ambiance,idle_fingers,monokai,pastel_on_dark,solarized_dark,tomorrow_night_blue,tomorrow_night_eighties",
	'wallall' => "1",
	'musicthemeall' => "mp3player",
	'moviethemeall' => "webplayer",
);

//新用户初始化配置
$config['setting_default'] = array(
	'list_type' => "icon", // list||icon
	'list_sort_field' => "name", // name||size||ext||mtime
	'list_sort_order' => "up", // asc||desc
	'theme' => "simple/", // app theme [default,simple,metro/,metro/black....]
	'codetheme' => "clouds", // code editor theme
	'wall' => "7", // wall picture
	'musictheme' => "mp3player", // music player theme
	'movietheme' => "webplayer", // movie player theme
);

//初始化默认菜单配置
$config['setting_menu_default'] = array(
	array('name' => 'desktop', 'type' => 'system', 'url' => 'index.php?desktop', 'target' => '_self', 'use' => '1'),
	array('name' => 'explorer', 'type' => 'system', 'url' => 'index.php?explorer', 'target' => '_self', 'use' => '1'),
	array('name' => 'editor', 'type' => 'system', 'url' => 'index.php?editor', 'target' => '_self', 'use' => '1'));

//权限配置；精确到需要做权限控制的控制器和方法
//需要权限认证的Action;root组无视权限
$config['role_setting'] = array(
	'explorer' => array(
		'mkdir', 'mkfile', 'pathRname', 'pathDelete', 'zip', 'unzip', 'pathCopy', 'pathChmod',
		'pathCute', 'pathCuteDrag', 'pathCopyDrag', 'clipboard', 'pathPast', 'pathInfo',
		'serverDownload', 'fileUpload', 'search', 'pathDeleteRecycle',
		'fileDownload', 'zipDownload', 'fileDownloadRemove', 'fileProxy', 'makeFileProxy'),
	'app' => array('user_app', 'init_app', 'add', 'edit', 'del'), //
	'user' => array('changePassword'), //可以设立公用账户
	'editor' => array('fileGet', 'fileSave'),
	'userShare' => array('set', 'del'),
	'setting' => array('set', 'system_setting', 'php_info'),
	'fav' => array('add', 'del', 'edit'),
	'member' => array('get', 'add', 'del', 'edit'),
	'group' => array('get', 'add', 'del', 'edit'),
	'explorer'	=> array(
		'mkdir','mkfile','pathRname','pathDelete','zip','unzip','pathCopy','pathChmod',
		'pathCute','pathCuteDrag','pathCopyDrag','clipboard','pathPast','pathInfo',
		'serverDownload','fileUpload','search','pathDeleteRecycle',
		'fileDownload','zipDownload','fileDownloadRemove','fileProxy','officeView','officeSave'),
	'app'		=> array('user_app','init_app','add','edit','del'),//
	'user'		=> array('changePassword'),//可以设立公用账户
	'editor'	=> array('fileGet','fileSave'),
	'userShare' => array('set','del'),
	'setting'	=> array('set','system_setting','php_info'),
	'fav'		=> array('add','del','edit'),
	'member'	=> array('get','add','del','edit'),
	'group'		=> array('get','add','del','edit')
);
