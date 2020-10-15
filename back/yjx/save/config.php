<?php require_once dirname(__FILE__)."/../include/main.class.php";include "data.php"; header("Content-type: text/html; charset=utf-8");
$API_PATH='api.php';
$user='admin';
$pass='7fef6171469e80d32c0559f88b377245';
$TITLE='欣然影视 智能视频解析 QQ群：815720190';
$keywords='vip视频解析,vip视频在线解析,vip解析,万能vip视频解析,vip视频全能解析,vip视频,手机vip视频解析,手机在线解析vip视频,优酷vip解析,爱奇艺vip解析,腾讯vip解析,乐视vip解析,芒果vip解析';
$description='欣然影视VIP视频免费看，在线解析，vip视频解析，优酷vip解析，爱奇艺vip解析，腾讯vip解析，乐视vip解析，芒果vip解析方便广大用户VIP视频服务，最新电影最新电视剧在线免费观看';
$HEADER='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="zh-CN" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><!-- IE内核 强制使用最新的引擎渲染网页 -->
<meta name="renderer" content="webkit"/>  <!-- 启用极速模式(webkit) -->
<meta http-equiv="pragma" content="no-cache" /><meta http-equiv="expires" content="0" />    <!-- 不缓存网页 -->
<meta name="msapplication-tap-highlight" content="no"/> <!-- windows phone 点击无高光 -->
<meta name="HandheldFriendly" content="true" /> <!-- 优化老式移动设备 -->
<meta http-equiv="Access-Control-Allow-Origin" content="*"><!-- 允许跨域访问 -->
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0 ,maximum-scale=1.0, user-scalable=no" /><!-- 手机H5兼容模式 -->
<link type="image/x-icon" href="favicon.ico" rel="icon" /><link type="image/x-icon" href="favicon.ico" rel="shortcut icon" /><link type="image/x-icon" href="favicon.ico" rel="bookmark" />
';
$BOOK_INFO=array (
  'off' => '0',
  'info' => '<font color="#00FF00">如果播放失败，请切换不同线路!云播放已支持缓存秒加载，欢迎使用!</font>',
);
$templets=array (
  'off' => '0',
  'html' => 'html',
  'css' => '',
  'pc' => 'byg',
  'wap' => 'byg',
);
$chche_config=array (
  'type' => '1',
  'prot' => '6379',
  'time' => '86400',
);
$timecookie='2';
$timeout='10';
$from_timeout='5';
$BLACKLIST=array (
  'off' => '1',
  'match' => 
  array (
    0 => 
    array (
      'off' => '0',
      'type' => '0',
      'val' => 
      array (
        0 => 'mao2234.cn',
      ),
      'black' => '0',
      'name' => '授权网站',
      'match' => '0',
      'num' => '100',
    ),
    1 => 
    array (
      'off' => '1',
      'type' => '1',
      'val' => 
      array (
        0 => 'av.com',
      ),
      'black' => '1',
      'name' => '拦截非法网站',
      'match' => '1',
      'num' => '10',
    ),
    2 => 
    array (
      'off' => '1',
      'type' => '0',
      'val' => 
      array (
        0 => 'mov.00000',
      ),
      'black' => '2',
      'name' => '域名黑名单',
      'match' => '1',
      'num' => '6',
    ),
    3 => 
    array (
      'off' => '1',
      'type' => '3',
      'val' => 
      array (
        0 => '127.0.0.1',
      ),
      'black' => '0',
      'name' => '禁IP',
      'match' => '1',
      'num' => '100',
    ),
  ),
  'black' => 
  array (
    0 => 
    array (
      'type' => '1',
      'action' => '1',
      'info' => 'exit("本站已开启防盗链，获取授权请联系本站管理员");',
      'name' => '提示防盗链',
    ),
    1 => 
    array (
      'type' => '1',
      'action' => '1',
      'info' => 'exit("目标网站涉嫌非法信息,服务器已拒绝解析");',
      'name' => '提示非法信息',
    ),
    2 => 
    array (
      'type' => '1',
      'action' => '1',
      'info' => 'exit("目标网站在黑名单中,请联系网站管理员解除！");',
      'name' => '提示黑名单',
    ),
    3 => 
    array (
      'type' => '1',
      'action' => '1',
      'info' => 'echo "本站已开启防盗链，获取授权请联系本站管理员";header("Refresh:3;url=http://00000");',
      'name' => '跳转首页',
    ),
    4 => 
    array (
      'type' => '1',
      'action' => '1',
      'info' => 'header("HTTP/1.1 404 Not Found");exit("404,文件未找到");',
      'name' => '提示404',
    ),
    5 => 
    array (
      'type' => '0',
      'action' => '0',
      'info' => '<script> 
var _hmt = _hmt || [];
   (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?dea6bad1057861a8f0ec2b6f8332eec1";
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm,s);
})();
</script>',
      'name' => '植入广告',
    ),
  ),
  'type' => NULL,
);
$NULL_URL=array (
  'type' => '2',
  'url' => 'so.html',
  'info' => '   <style type="text/css">
    H1{margin:10% 0 auto; color:#C7636C; text-align:center; font-family: Microsoft Jhenghei;}
    p{font-size: 1.2rem;/*1.2 × 10px = 12px */;text-align:center; font-family: Microsoft Jhenghei;}
    </style>  
   <h1>请填写url地址</h1>
   <p>本解析接口仅用于学习交流，盗用必究！~</p>
',
);
$FOOTER_CODE='<script> 
   var _hmt = _hmt || [];
   (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?dea6bad1057861a8f0ec2b6f8332eec1";
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm,s);
})();
</script>
 ';
$LINK_URL=array (
  0 => 
  array (
    'off' => 1,
    'num' => '100',
    'path' => 'http://dy.00000/parse/api.php?url=',
    'name' => '官方海洋CMS插件接口',
    'val' => 
    array (
      'success' => 'success',
      'url' => 'url',
      'player' => 'player',
      'code' => 'code',
      'type' => 'type',
      'title' => 'title',
      'part' => 'part',
      'info' => 'info',
    ),
  ),
);
$jx_url=array (
  0 => 'https://vip.ooosoo.com/jx/?url=',
  1 => 'https://api.pangujiexi.com/player.php?url=',
  2 => 'https://api.bbbbbb.me/jx/v.php?url=',
  3 => 'http://api.7kki.cn/api/?url=',
);
$jx_link=array (
  '视频搜索' => 'xyplay.href("so.html?url="+xyplay.url);',
);
$live_url=array (
  '解说电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/94525224-2583571962-11096357083652554752-3503038830-10057-A-0-1.m3u8");',
  '电影轮播' => 'xyplay.live("http://alhls.cdn.zhanqi.tv/zqlive/102444_ZGmRp.m3u8");',
  '陈翔六点半' => 'xyplay.live("http://tx.hls.huya.com/huyalive/94525224-2655537474-11405446604132450304-2704233350-10057-A-0-1.m3u8");',
  '许老师讲故事' => 'xyplay.live("http://tx.hls.huya.com/huyalive/28466698-2689658976-11551997339312848896-2789274534-10057-A-0-1.m3u8");',
  '成龙电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/94525224-2460685722-10568564701724147712-2789253838-10057-A-0-1.m3u8");',
  '徐峥电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/30765679-2689675828-11552069718101721088-3048991626-10057-A-0-1.m3u8");',
  '周星驰电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/94525224-2460685313-10568562945082523648-2789274524-10057-A-0-1.m3u8");',
  '周润发电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/94525224-2460685774-10568564925062447104-2789253840-10057-A-0-1.m3u8");',
  '刘德华电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/94525224-2467341872-10597152648291418112-2789274550-10057-A-0-1.m3u8");',
  '李连杰电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/94525224-2460686093-10568566295157014528-2789253848-10057-A-0-1.m3u8");',
  '洪金宝电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/29106097-2689406282-11550912026846953472-2789274558-10057-A-0-1.m3u8");',
  '林正英电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/94525224-2460686034-10568566041753944064-2789274542-10057-A-0-1.m3u8");',
  '甄子丹电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/29169025-2686219938-11537226783573147648-2847699096-10057-A-1524024759-1.m3u8");',
  '古天乐电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/29169025-2686220040-11537227221659811840-2713685416-10057-A-1524041498-1.m3u8");',
  '斯坦森电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/30765679-2554414705-10971127618396487680-3048991636-10057-A-0-1.m3u8");',
  '徐克导演' => 'xyplay.live("http://tx.hls.huya.com/huyalive/29106097-2689447148-11551087544980471808-2789253872-10057-A-1525420294-1.m3u8");',
  '王晶导演' => 'xyplay.live("http://tx.hls.huya.com/huyalive/94525224-2579683592-11079656661667807232-2847687574-10057-A-0-1.m3u8");',
  '古惑仔电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/30765679-2523417522-10837995731143360512-2777068634-10057-A-0-1.m3u8");',
  '赌博电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/29106097-2689446042-11551082794746642432-2789253870-10057-A-0-1.m3u8");',
  '科幻电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/30765679-2499070088-10733424298371842048-2789274548-10057-A-1521102596-1.m3u8");',
  '漫威电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/30765679-2504742278-10757786168918540288-3049003128-10057-A-0-1.m3u8");',
  '女神港片' => 'xyplay.live("http://tx.hls.huya.com/huyalive/30765679-2484192476-10669525441389264896-2789274564-10057-A-0-1.m3u8");',
  '怪物科幻' => 'xyplay.live("http://tx.hls.huya.com/huyalive/30765679-2478268764-10644083292078342144-2847699106-10057-A-0-1.m3u8");',
  '丧尸电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/29106097-2689286606-11550398022340837376-2789274544-10057-A-0-1.m3u8");',
  '战争电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/28466698-2689659358-11551998979990355968-2789274580-10057-A-0-1.m3u8");',
  '犯罪悬疑' => 'xyplay.live("http://tx.hls.huya.com/huyalive/30765679-2480288304-10652757150331305984-2789274538-10057-A-1511757260-1.m3u8");',
  '好莱坞电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/30765679-2484192572-10669525853706125312-2847687498-10057-A-1521100607-1.m3u8");',
  '灾难电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/29359996-2689475864-11551210879261343744-2847699104-10057-A-1525430092-1.m3u8");',
  '真实改编' => 'xyplay.live("http://tx.hls.huya.com/huyalive/30765679-2554414680-10971127511022305280-3048991634-10057-A-0-1.m3u8");',
  '惊悚电影' => 'xyplay.live("http://tx.hls.huya.com/huyalive/29106097-2689447600-11551089486305689600-2789274568-10057-A-1525420695-1.m3u8");',
  '复仇犯罪' => 'xyplay.live("http://tx.hls.huya.com/huyalive/28466698-2689661530-11552008308659322880-3049003102-10057-A-0-1.m3u8");',
  '新华社中文' => 'xyplay.live("http://live.xinhuashixun.com/live/chn01/desc.m3u8")',
  '环球电视台' => 'xyplay.live("http://live-cdn.xzxwhcb.com/hls/r86am856.m3u8")',
  '凤凰卫视电影台' => 'xyplay.live("http://live.italkdd.com/cds160/hls/channel003/channel003_2000.m3u8")',
  '直播秀' => 'xyplay.live("http://dlhls.live.cnlive.com:1935/cdn/liveshow/playlist.m3u8");',
  '香港直播新聞' => 'xyplay.live("http://media.fantv.hk/m3u8/archive/channel2_stream1.m3u8");',
  '台视新闻' => 'xyplay.live("http://live.italkdd.com/cds160/hls/channel006/channel006_2000.m3u8");',
  '民视新闻台' => 'xyplay.live("http://210.61.56.23/hls/ftvtv/index.m3u8");',
  '星卫电影台' => 'xyplay.live("http://dlhls.cdn.zhanqi.tv/zqlive/35349_iXsXw.m3u8");',
  '战旗电影' => 'xyplay.live("http://dlhls.cdn.zhanqi.tv/zqlive/7032_0s2qn.m3u8");',
  'TVB翡翠财经' => 'xyplay.live("http://e1.vdowowza.vip.hk1.tvb.com/tvblive/smil:mobilehd_financeintl.smil/chunklist_w1412641159_b448000.m3u8");',
  '韩国EBS2' => 'xyplay.live("http://ebsonair.ebs.co.kr:1935/ebs2familypc/familypc1m/playlist.m3u8");',
  '乌克兰JTV' => 'xyplay.live("http://jtvmedia.jtv.com:1975/live/live6/lihattv.m3u8");',
  '无线财经资讯' => 'xyplay.xyplay("http://e1.vdowowza.vip.hk1.tvb.com/tvblive/smil:mobilehd_financeintl.smil/chunklist_w1286040896_b224000.m3u8");',
  '功夫台' => 'xyplay.live("http://weblive.hebtv.com/live/Asianaction/index.m3u8");',
  'CINEMAX' => 'xyplay.live("http://iptv-nl3-qscdn.hdflixtv.com/VN-Cinemax/tracks-v1a1/mono.m3u8");',
);
$play=array (
  'off' => 
  array (
    'yun' => '1',
    'link' => '0',
    'live' => '1',
    'help' => '1',
    'debug' => '0',
    'log' => '0',
    'autolist' => '0',
    'ckplay' => '1',
    'jmp' => '0',
    'autoline' => '1',
    'autoflag' => '0',
    'mylink' => '1',
    'lshttps' => '0',
  ),
  'line' => 
  array (
    'pc' => 
    array (
      'line' => '1',
      'adtime' => '0',
      'adPage' => 'source/plug/pc.html',
    ),
    'wap' => 
    array (
      'line' => '1',
      'adtime' => '0',
      'adPage' => 'source/plug/pc.html',
    ),
    'all' => 
    array (
      'autoline' => 
      array (
        'off' => '0',
        'val' => 
        array (
          'iqiyi.com' => '2',
          'v.qq.com' => '3',
        ),
      ),
    ),
  ),
  'play' => 
  array (
    'pc' => 
    array (
      'player' => 'dplayer',
      'autoplay' => '1',
    ),
    'wap' => 
    array (
      'player' => 'ckplayer',
      'autoplay' => '1',
    ),
    'all' => 
    array (
      'autoline' => 
      array (
        'off' => '0',
        'val' => 
        array (
          'iqiyi.com' => 'ckplayerx',
          'v.qq.com' => 'dplayer',
        ),
      ),
      'headtime' => '0',
      'endtime' => '0',
    ),
  ),
  'all' => 
  array (
    'AppName' => 'xysoft|xyplayer',
    'ver' => '欣然影视 智能视频解析 ',
    'by' => '欣然影视智能解析 版权所有',
    'info' => '如果播放失败，请切换不同线路!云播放已支持缓存秒加载，欢迎使用!',
    'decode' => '//----------------------反调试代码开始---------------
        // location.href="http://00000";  //跳转网站

      xyplay.echo("<br><br><br>检测到非法调试,请关闭后刷新重试!");  //用户窗口显示信息

       setInterval("debugger;console.log(\'请勿非法调试,购买请联系QQ:23453161\');");      //调试窗口显示信息
				
		
//----------------------代码结束---------------',
    'link_info' => '服务器正在解析中,请稍后....',
    'yun_info' => '服务器正在解析中,请稍后....',
  ),
  'style' => 
  array (
    'logo_show' => '1',
    'line_show' => '1',
    'list_show' => '1',
    'flaglist_show' => '1',
    'playlist_show' => '1',
    'line_style' => 'color:#2693FF;border:1px solid #2693FF;',
    'line_hover' => 'color:#FFF;background-color:#2693FF;',
    'line_on' => 'color:#FFF;background-color:#2693FF;',
    'play_style' => 'color:#FFF;border:1px solid #2693FF;',
    'play_hover' => 'color:#FFF;background-color:#2693FF;',
    'play_on' => 'color:#FFF;background-color:#2693FF;',
    'off' => NULL,
  ),
  'match' => 
  array (
    'yunflag' => '',
    'video' => '',
    'urljmp' => 'BGM->http://api.jp255.com/api/?url=',
    'urlurl' => '/share/',
    'urlflag' => 'url|yun|ziyuan',
    'playflag' => 'ogg|mp4|webm|m3u8|ck',
  ),
  'define' => 
  array (
  ),
);
