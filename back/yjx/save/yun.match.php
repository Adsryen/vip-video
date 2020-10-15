<?php
$ERROR_404='404|404错误：你访问的页面丢失了|那条视频不见了|出错提示|404页';
$type_match=array (
  '!m3u8!i' => 'hls',
  '!\\/share\\/!i' => 'url',
);
$title_match='!^(.*?)(?=-|—|_|——|-)!i';
$title_replace=array (
  0 => '全集',
  1 => '高清在线观看',
  2 => '英文版',
  3 => '国语版',
  4 => '原声版',
  5 => '普通话版',
  6 => '《',
  7 => '》',
  8 => '【',
  9 => '】',
  10 => '（',
  11 => '）',
  12 => '(',
  13 => ')',
);
$name_match=array (
  '!(qq.com|iqiyi.com|mgtv.com|sohu.com|pptv.com)!i' => 
  array (
    0 => '/^(.*?)(?:第|)(\\d+)(?:集|期|话|)$/i',
  ),
  '!youku.com!i' => 
  array (
    0 => '/^(.*?).(\\d+)/i',
  ),
  '!le.com|tudou.com!i' => 
  array (
    0 => '/^(.*?).(\\d+)/i',
  ),
  '!bilibili.com!i' => 
  array (
    0 => '/^(.*?)：(?:第|)(\\d+)(?=话|集)/i',
  ),
  '!miguvideo.com!i' => 
  array (
    0 => '/^(?:《|)(.*?)(?:》|)(?:第|)(\\d+)(?=话|集)/i',
  ),
  '!^.*$!i' => 
  array (
    0 => '/^(.*?)(?:第|)(\\d+)(?:集|期|话|)$/i',
    1 => '/^(.*?)$/i',
  ),
);
$url_replace=array (
  0 => '&tdsourcetag=s_pcqq_aiomsg',
);
$url_match=array (
  '!m.v.qq.com.*?cid=(.*?)&vid=(.*?)[?:&|$]!i' => 'https://v.qq.com/x/cover/(?1)/(?2).html',
  '!m.v.qq.com.*?cid=(.*?)[?:&|$]!i' => 'https://v.qq.com/x/cover/(?1).html',
  '!m.v.qq.com/cover/r/(.*?)cid=(.*?)[?:&|$]!i' => 'https://v.qq.com/x/cover/(?1).html',
  '!m.v.qq.com/cover/./(.*?)\\.html\\?vid=(.*?)(?:&|$)!i' => 'https://v.qq.com/x/cover/(?1)/(?2).html',
  '!m.fun.tv/mplay/\\?mid=(\\d+)&vid=(\\d+)(?:&|$)!i' => 'https://www.fun.tv/vplay/g-(?1).v-(?2)',
  '!http://(.*?mgtv.com/.*?html)!i' => 'https://(?1)',
  '!m.youku.com/video/id_(.*?)==.html!i' => 'https://v.youku.com/v_show/id_(?1)==.html',
);
?>