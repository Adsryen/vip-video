<?php
return array(

    '1' => array('name' => '首页', 'icon' => 'xe625', 'sub' => array(
        '11' => array("show"=>1,"name" => '欢迎页面', 'controller' => 'index', 'action' => 'welcome'),
        '12' => array("show"=>1,"name" => '快捷菜单配置', 'controller' => 'index', 'action' => 'quickmenu'),

        '1001' => array("show"=>0,"name" => '--切换布局', 'controller' => 'index', 'action' => 'iframe'),
        '1002' => array("show"=>0,"name" => '--清理缓存', 'controller' => 'index', 'action' => 'clear'),
        '1003' => array("show"=>0,"name" => '--锁屏解锁', 'controller' => 'index', 'action' => 'unlocked'),

        '1004' => array("show"=>0,"name" => '--公共下拉选择框', 'controller' => 'index', 'action' => 'select'),
        '1005' => array("show"=>0,"name" => '--文件上传', 'controller' => 'upload', 'action' => 'upload'),

    )),

    '2' => array('name' => '系统', 'icon' => 'xe62e', 'sub' => array(
        '21' => array("show"=>1,'name' => '网站参数配置', 'controller' => 'system',				'action' => 'config'),
        '211' => array("show"=>1,"name" => '会员参数配置', 'controller' => 'system',			'action' => 'configuser'),
        '212' => array("show"=>1,"name" => '评论留言配置', 'controller' => 'system',			'action' => 'configcomment'),
        '213' => array("show"=>1,"name" => '附件参数配置', 'controller' => 'system',			'action' => 'configupload'),
        '22' => array("show"=>1,"name" => 'URL地址配置', 'controller' => 'system',				'action' => 'configurl'),
        '23' => array("show"=>1,"name" => '播放器参数配置', 'controller' => 'system',			'action' => 'configplay'),
        '24' => array("show"=>1,"name" => '采集参数配置', 'controller' => 'system',			'action' => 'configcollect'),
        '25' => array("show"=>1,"name" => '站外入库配置', 'controller' => 'system',			'action' => 'configinterface'),
        '26' => array("show"=>1,"name" => '开放API配置', 'controller' => 'system',			'action' => 'configapi'),
        '27' => array("show"=>1,"name" => '整合登录配置', 'controller' => 'system',			'action' => 'configconnect'),
        '28' => array("show"=>1,"name" => '在线支付配置', 'controller' => 'system',			'action' => 'configpay'),
        '29' => array("show"=>1,"name" => '微信对接配置', 'controller' => 'system',			'action' => 'configweixin'),
        '291' => array("show"=>1,"name" => '邮件发送配置', 'controller' => 'system',			'action' => 'configemail'),
        '292' => array("show"=>1,"name" => '短信发送配置', 'controller' => 'system',			'action' => 'configsms'),

        '2910' => array("show"=>1,"name" => '定时任务', 'controller' => 'timming',	'action' => 'index'),
        '2911' => array("show"=>0,'name' => '--定时任务信息维护', 'controller' => 'type',		'action' => 'info'),
        '2912' => array("show"=>0,'name' => '--定时任务删除', 'controller' => 'type',		'action' => 'del'),
        '2913' => array("show"=>0,'name' => '--定时任务状态', 'controller' => 'type',		'action' => 'field'),
    )),

    '3' => array('name' => '基础', 'icon' => 'xe64b', 'sub' => array(
        '31' => array("show"=>1,'name' => '分类管理', 'controller' => 'type',		'action' => 'index'),

        '3101' => array("show"=>0,'name' => '--分类信息维护', 'controller' => 'type',		'action' => 'info'),
        '3102' => array("show"=>0,'name' => '--分类批量修改', 'controller' => 'type',		'action' => 'batch'),
        '3103' => array("show"=>0,'name' => '--分类删除', 'controller' => 'type',		'action' => 'del'),
        '3104' => array("show"=>0,'name' => '--分类状态', 'controller' => 'type',		'action' => 'field'),
        '3105' => array("show"=>0,'name' => '--分类扩展配置信息', 'controller' => 'type',		'action' => 'extend'),


        '32' => array("show"=>1,'name' => '专题管理', 'controller' => 'topic',		'action' => 'data'),
        '3201' => array("show"=>0,'name' => '--专题信息维护', 'controller' => 'topic',		'action' => 'info'),
        '3202' => array("show"=>0,'name' => '--专题批量修改', 'controller' => 'topic',		'action' => 'batch'),
        '3203' => array("show"=>0,'name' => '--专题删除', 'controller' => 'topic',		'action' => 'del'),
        '3204' => array("show"=>0,'name' => '--专题状态', 'controller' => 'topic',		'action' => 'field'),

        '33' => array("show"=>1,'name' => '友链管理', 'controller' => 'link',		'action' => 'index'),
        '3301' => array("show"=>0,'name' => '--友链信息维护', 'controller' => 'link',		'action' => 'info'),
        '3302' => array("show"=>0,'name' => '--友链批量修改', 'controller' => 'link',		'action' => 'batch'),
        '3303' => array("show"=>0,'name' => '--友链删除', 'controller' => 'link',		'action' => 'del'),
        '3304' => array("show"=>0,'name' => '--友链状态', 'controller' => 'link',		'action' => 'field'),


        '34' => array("show"=>1,'name' => '留言管理', 'controller' => 'gbook',		'action' => 'data'),
        '3401' => array("show"=>0,'name' => '--留言信息维护', 'controller' => 'gbook',		'action' => 'info'),
        '3402' => array("show"=>0,'name' => '--留言删除', 'controller' => 'gbook',		'action' => 'del'),
        '3404' => array("show"=>0,'name' => '--留言状态', 'controller' => 'gbook',		'action' => 'field'),

        '35' => array("show"=>1,'name' => '评论管理', 'controller' => 'comment',		'action' => 'data'),
        '3501' => array("show"=>0,'name' => '--评论信息维护', 'controller' => 'comment',		'action' => 'info'),
        '3502' => array("show"=>0,'name' => '--评论删除', 'controller' => 'comment',		'action' => 'del'),
        '3504' => array("show"=>0,'name' => '--评论状态', 'controller' => 'comment',		'action' => 'field'),

        '36' => array("show"=>1,'name' => '附件管理', 'controller' => 'images',		'action' => 'index'),
        '3601' => array("show"=>0,'name' => '--附件删除', 'controller' => 'images',		'action' => 'del'),
    )),

    '4' => array('name' => '视频', 'icon' => 'xe639', 'sub' => array(
        '41' => array("show"=>1,'name' => '服务器组', 'controller' => 'vodserver',		'action' => 'index'),
        '4101' => array("show"=>0,'name' => '--服务器组信息维护', 'controller' => 'vodserver',		'action' => 'info'),
        '4102' => array("show"=>0,'name' => '--服务器组删除', 'controller' => 'vodserver',		'action' => 'del'),
        '4103' => array("show"=>0,'name' => '--服务器组状态', 'controller' => 'vodserver',		'action' => 'field'),

        '42' => array("show"=>1,'name' => '播放器', 'controller' => 'vodplayer',		'action' => 'index'),
        '4201' => array("show"=>0,'name' => '--播放器信息维护', 'controller' => 'vodplayer',		'action' => 'info'),
        '4202' => array("show"=>0,'name' => '--播放器删除', 'controller' => 'vodplayer',		'action' => 'del'),
        '4203' => array("show"=>0,'name' => '--播放器组状态', 'controller' => 'vodplayer',		'action' => 'field'),

        '43' => array("show"=>1,'name' => '下载器', 'controller' => 'voddowner',		'action' => 'index'),
        '4301' => array("show"=>0,'name' => '--下载器信息维护', 'controller' => 'voddowner',		'action' => 'info'),
        '4302' => array("show"=>0,'name' => '--下载器删除', 'controller' => 'voddowner',		'action' => 'del'),
        '4303' => array("show"=>0,'name' => '--下载器组状态', 'controller' => 'voddowner',		'action' => 'field'),

        '44' => array("show"=>1,'name' => '视频数据', 'controller' => 'vod',		'action' => 'data'),
        '4401' => array("show"=>0,'name' => '--视频信息维护', 'controller' => 'vod',		'action' => 'info'),
        '4402' => array("show"=>0,'name' => '--视频删除', 'controller' => 'vod',		'action' => 'del'),
        '4403' => array("show"=>0,'name' => '--视频状态', 'controller' => 'vod',		'action' => 'field'),

        '45' => array("show"=>1,'name' => '添加视频', 'controller' => 'vod',		'action' => 'info'),

        '46' => array("show"=>1,'name' => '无地址视频', 'controller' => 'vod',		'action' => 'data' , 'param'=>'url=1'),
        '47' => array("show"=>1,'name' => '已锁定视频', 'controller' => 'vod',		'action' => 'data', 'param'=>'lock=1'),
        '48' => array("show"=>1,'name' => '未审核视频', 'controller' => 'vod',		'action' => 'data', 'param'=>'status=0'),
        '481' => array("show"=>1,'name' => '需积分视频', 'controller' => 'vod',		'action' => 'data', 'param'=>'points=1'),

        '49' => array("show"=>1,'name' => '批量操作视频', 'controller' => 'vod',		'action' => 'batch'),
        '491' => array("show"=>1,'name' => '重名视频数据', 'controller' => 'vod',		'action' => 'data', 'param'=>'repeat=1'),

        '495' => array("show"=>1,'name' => '演员库', 'controller' => 'actor',		'action' => 'data', 'param'=>''),
        '4951' => array("show"=>0,'name' => '--演员信息维护', 'controller' => 'actor',		'action' => 'info'),
        '4952' => array("show"=>0,'name' => '--演员删除', 'controller' => 'actor',		'action' => 'del'),
        '4953' => array("show"=>0,'name' => '--演员状态', 'controller' => 'actor',		'action' => 'field'),
        '4954' => array("show"=>0,'name' => '添加演员', 'controller' => 'actor',		'action' => 'info'),

        '496' => array("show"=>1,'name' => '角色库', 'controller' => 'role',		'action' => 'data', 'param'=>''),
        '4961' => array("show"=>0,'name' => '--角色信息维护', 'controller' => 'role',		'action' => 'info'),
        '4962' => array("show"=>0,'name' => '--角色删除', 'controller' => 'role',		'action' => 'del'),
        '4963' => array("show"=>0,'name' => '--角色状态', 'controller' => 'role',		'action' => 'field'),
        '4964' => array("show"=>0,'name' => '添加角色', 'controller' => 'role',		'action' => 'info'),
    )),

    '5' => array('name' => '文章', 'icon' => 'xe616', 'sub' => array(

        '51' => array("show"=>1,'name' => '文章数据', 'controller' => 'art',		'action' => 'data'),
        '5101' => array("show"=>0,'name' => '--文章信息维护', 'controller' => 'art',		'action' => 'info'),
        '5102' => array("show"=>0,'name' => '--文章删除', 'controller' => 'art',		'action' => 'del'),
        '5103' => array("show"=>0,'name' => '--文章状态', 'controller' => 'art',		'action' => 'field'),

        '52' => array("show"=>1,'name' => '添加文章', 'controller' => 'art',		'action' => 'info'),
        '53' => array("show"=>1,'name' => '已锁定文章', 'controller' => 'art',		'action' => 'data','param'=>'lock=1'),
        '54' => array("show"=>1,'name' => '未审核文章', 'controller' => 'art',		'action' => 'data','param'=>'status=0'),

        '59' => array("show"=>1,'name' => '批量操作文章', 'controller' => 'art',		'action' => 'batch'),
        '591' => array("show"=>1,'name' => '重名文章数据', 'controller' => 'art',		'action' => 'data', 'param'=>'repeat=1'),
    )),

    '6' => array('name' => '用户', 'icon' => 'xe62c', 'sub' => array(
        '61' => array("show"=>1,'name' => '管理员', 'controller' => 'admin',		'action' => 'index'),
        '6101' => array("show"=>0,'name' => '--管理员信息维护', 'controller' => 'admin',		'action' => 'info'),
        '6102' => array("show"=>0,'name' => '--管理员删除', 'controller' => 'admin',		'action' => 'del'),
        '6103' => array("show"=>0,'name' => '--管理员状态', 'controller' => 'admin',		'action' => 'field'),

        '62' => array("show"=>1,'name' => '会员组', 'controller' => 'group',		'action' => 'index'),
        '6201' => array("show"=>0,'name' => '--会员组信息维护', 'controller' => 'group',		'action' => 'info'),
        '6202' => array("show"=>0,'name' => '--会员组删除', 'controller' => 'group',		'action' => 'del'),
        '6203' => array("show"=>0,'name' => '--会员组状态', 'controller' => 'group',		'action' => 'field'),

        '63' => array("show"=>1,'name' => '会员', 'controller' => 'user',		'action' => 'data'),
        '6301' => array("show"=>0,'name' => '--会员信息维护', 'controller' => 'user',		'action' => 'info'),
        '6302' => array("show"=>0,'name' => '--会员删除', 'controller' => 'user',		'action' => 'del'),
        '6303' => array("show"=>0,'name' => '--会员状态', 'controller' => 'user',		'action' => 'field'),

        '64' => array("show"=>1,'name' => '充值卡', 'controller' => 'card',		'action' => 'index'),
        '6401' => array("show"=>0,'name' => '--充值卡信息维护', 'controller' => 'card',		'action' => 'info'),
        '6402' => array("show"=>0,'name' => '--充值卡删除', 'controller' => 'card',		'action' => 'del'),

        '65' => array("show"=>1,'name' => '会员订单', 'controller' => 'order',		'action' => 'index'),
        '6501' => array("show"=>0,'name' => '--订单删除', 'controller' => 'order',		'action' => 'del'),

        '66' => array("show"=>1,'name' => '访问日志', 'controller' => 'ulog',		'action' => 'index'),
        '6601' => array("show"=>0,'name' => '--访问日志删除', 'controller' => 'ulog',		'action' => 'del'),

        '67' => array("show"=>1,'name' => '积分日志', 'controller' => 'plog',		'action' => 'index'),
        '6701' => array("show"=>0,'name' => '--积分日志删除', 'controller' => 'plog',		'action' => 'del'),

        '68' => array("show"=>1,'name' => '提现记录', 'controller' => 'cash',		'action' => 'index'),
        '6801' => array("show"=>0,'name' => '--提现删除', 'controller' => 'cash',		'action' => 'del'),
        '6802' => array("show"=>0,'name' => '--提现审核', 'controller' => 'cash',		'action' => 'audit'),

    )),

    '7' => array('name' => '模版', 'icon' => 'xe72d', 'sub' => array(
        '71' => array("show"=>1,'name' => '模板管理', 'controller' => 'template',		'action' => 'index'),
        '7101' => array("show"=>0,'name' => '--模板信息维护', 'controller' => 'template',		'action' => 'info'),
        '7102' => array("show"=>0,'name' => '--模板删除', 'controller' => 'template',		'action' => 'del'),

        '72' => array("show"=>1,'name' => '广告位管理', 'controller' => 'template',		'action' => 'ads',  'param'=>''),
        '73' => array("show"=>1,'name' => '标签向导', 'controller' => 'template',		'action' => 'wizard'),
    )),

    '8' => array('name' => '生成', 'icon' => 'xe63e', 'sub' => array(
        '81' => array("show"=>1,'name' => '生成选项', 'controller' => 'make',		'action' => 'opt'),
        '82' => array("show"=>1,'name' => '生成首页', 'controller' => 'make',		'action' => 'index'),
                '83' => array("show"=>1,'name' => '生成地图', 'controller' => 'make',		'action' => 'map'),


        '8101' => array("show"=>0,'name' => '--生成入口', 'controller' => 'make',		'action' => 'make'),
        '8102' => array("show"=>0,'name' => '--生成RSS', 'controller' => 'make',		'action' => 'rss'),
        '8103' => array("show"=>0,'name' => '--生成分类', 'controller' => 'make',		'action' => 'type'),
        '8104' => array("show"=>0,'name' => '--生成专题首页', 'controller' => 'make',		'action' => 'topic_index'),
        '8105' => array("show"=>0,'name' => '--生成专题内容', 'controller' => 'make',		'action' => 'topic_info'),
        '8106' => array("show"=>0,'name' => '--生成内容页', 'controller' => 'make',		'action' => 'info'),
        '8107' => array("show"=>0,'name' => '--生成自定义页', 'controller' => 'make',		'action' => 'label'),


    )),

    '9' => array('name' => '采集', 'icon' => 'xe727', 'sub' => array(
        '91' => array("show"=>1,'name' => '联盟资源库', 'controller' => 'collect',		'action' => 'union'),
        '9101' => array("show"=>0,'name' => '--采集入口', 'controller' => 'collect',		'action' => 'api'),
        '9102' => array("show"=>0,'name' => '--断点采集', 'controller' => 'collect',		'action' => 'load'),
        '9103' => array("show"=>0,'name' => '--绑定分类', 'controller' => 'collect',		'action' => 'bind'),
        '9104' => array("show"=>0,'name' => '--采集视频', 'controller' => 'collect',		'action' => 'vod'),
        '9105' => array("show"=>0,'name' => '--采集文章', 'controller' => 'collect',		'action' => 'art'),

        '92' => array("show"=>1,'name' => '定时挂机采集', 'controller' => 'collect',		'action' => 'timing'),

        '93' => array("show"=>1,'name' => '自定义资源库', 'controller' => 'collect',		'action' => 'index'),
        '9301' => array("show"=>0,'name' => '--自定义资源库信息维护', 'controller' => 'collect',		'action' => 'info'),
        '9302' => array("show"=>0,'name' => '--自定义资源库删除', 'controller' => 'collect',		'action' => 'del'),

        '94' => array("show"=>1,'name' => '自定义采集', 'controller' => 'cj',		'action' => 'index'),
        '9401' => array("show"=>0,'name' => '--自定义采集信息维护', 'controller' => 'cj',		'action' => 'info'),
        '9402' => array("show"=>0,'name' => '--自定义采集删除', 'controller' => 'cj',		'action' => 'del'),
        '9403' => array("show"=>0,'name' => '--自定义采集发布方案', 'controller' => 'cj',		'action' => 'program'),
        '9404' => array("show"=>0,'name' => '--自定义采集采集网址', 'controller' => 'cj',		'action' => 'col_url'),
        '9405' => array("show"=>0,'name' => '--自定义采集采集内容', 'controller' => 'cj',		'action' => 'col_content'),
        '9406' => array("show"=>0,'name' => '--自定义采集发布内容', 'controller' => 'cj',		'action' => 'publish'),
        '9407' => array("show"=>0,'name' => '--自定义采集导出', 'controller' => 'cj',		'action' => 'export'),
        '9408' => array("show"=>0,'name' => '--自定义采集导入', 'controller' => 'cj',		'action' => 'import'),

    )),

    '10' => array('name' => '数据库', 'icon' => 'xe621', 'sub' => array(
        '101' => array("show"=>1,'name' => '数据库管理', 'controller' => 'database',		'action' => 'index'),
        '10001' => array("show"=>0,'name' => '--数据库备份', 'controller' => 'database',		'action' => 'export'),
        '10002' => array("show"=>0,'name' => '--数据库还原', 'controller' => 'database',		'action' => 'import'),
        '10003' => array("show"=>0,'name' => '--数据库优化', 'controller' => 'database',		'action' => 'optimize'),
        '10004' => array("show"=>0,'name' => '--数据库修复', 'controller' => 'database',		'action' => 'repair'),
        '10005' => array("show"=>0,'name' => '--数据库删除备份', 'controller' => 'database',		'action' => 'del'),
        '10006' => array("show"=>0,'name' => '--数据库表信息', 'controller' => 'database',		'action' => 'columns'),

        '102' => array("show"=>1,'name' => '执行SQL语句', 'controller' => 'database',		'action' => 'sql'),
        '103' => array("show"=>1,'name' => '数据批量替换', 'controller' => 'database',		'action' => 'rep'),
    )),
    '11' => array('name' => '应用', 'icon' => 'xe621', 'sub' => array(
        '111' => array("show"=>1,'name' => '应用市场', 'controller' => 'addon',		'action' => 'index', 'param'=>''),

        '112' => array("show"=>1,'name' => 'URL推送', 'controller' => 'urlsend',		'action' => 'index', 'param'=>''),
        '11200' => array("show"=>0,'name' => '--推送入口', 'controller' => 'urlsend',		'action' => 'push'),
        '11201' => array("show"=>0,'name' => '--百度主动推送', 'controller' => 'urlsend',		'action' => 'baidu_push'),
        '11202' => array("show"=>0,'name' => '--百度熊掌推送', 'controller' => 'urlsend',		'action' => 'baidu_bear'),

        '11100' => array("show"=>0,'name' => '--应用插件列表', 'controller' => 'addon',		'action' => 'downloaded'),
        '11101' => array("show"=>0,'name' => '--应用插件安装', 'controller' => 'addon',		'action' => 'install'),
        '11102' => array("show"=>0,'name' => '--应用插件卸载', 'controller' => 'addon',		'action' => 'uninstall'),
        '11103' => array("show"=>0,'name' => '--应用插件配置', 'controller' => 'addon',		'action' => 'config'),
        '11104' => array("show"=>0,'name' => '--应用插件状态', 'controller' => 'addon',		'action' => 'state'),
        '11105' => array("show"=>0,'name' => '--应用插件上传', 'controller' => 'addon',		'action' => 'local'),
        '11106' => array("show"=>0,'name' => '--应用插件升级', 'controller' => 'addon',		'action' => 'upgrade'),
    )),

);