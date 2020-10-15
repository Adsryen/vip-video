{* Template Name: 多集设置模板2，勿选！！ *}
{php}$c=$arraymetasname[1];{/php}
{if $article.Metas.videoon=='xigua'}
<div class="baiduplay">
    <script language="javascript">
        var XgPlayer = {
            'Url': "{$article->Metas->$c}",
            'NextcacheUrl': "", 
            'LastWebPage': '',
            'NextWebPage': "",
            'Buffer': '',
            'Pase': '',
            'Width': 935,
            'Height': 540, 
            'Second': 8, 
            "Installpage":''
        };
    </script>    
    <script language="javascript" src="http://static.xigua.com/m_xiguaplayer.js" charset="utf-8">
    </script>
</div>
{elseif $article.Metas.videoon=='jiji'}
<div class="baiduplay">
    <script type="text/javascript">
        var jjvod_url = '{$article->Metas->$c}';
        var jjvod_w = 935;
        var jjvod_h = 540;
        var jjvod_ad = '';
        var jjvod_c = 'baidu'
        var jjvod_install = 'http://player.jjvod.com/js/jjplayer_install.html?v=1&c='+jjvod_c;
        var jjvod_weburl = unescape(window.location.href);
    </script>
    <script type="text/javascript" src="http://player.jjvod.com/jjplayer_v2.js" charset="utf-8"></script>
</div>
{elseif $article.Metas.videoon=='leshi'}
<div id="player" style="width:100%;height:540px;">
    <script type="text/javascript" charset="utf-8" src="http://yuntv.letv.com/player/vod/bcloud.js"></script>
    <script>
        var player = new CloudVodPlayer();
        player.init({uu:"{$zbp->Config('txdida')->leshiid}",vu:"{$article->Metas->$c}"});
    </script>
</div>
{elseif $article.Metas.videoon=='vjj'}
<script type="text/javascript" src="http://7xl3wn.com2.z0.glb.qiniucdn.com/socket.io.min.js"></script>
<script type="text/javascript" src="http://7xjfim.com2.z0.glb.qiniucdn.com/Iva.js"></script>
<div id="videoplay"></div>
<script>
    var ivaInstance = new Iva(
        'videoplay',
        {
            appkey: '{$zbp->Config('txdida')->videokey}',
            live: false,
            video: '{$article->Metas->$c}',
            title: '{$article.Title}',
            cover: '{$article.Metas.jietu}',
            videoStartPrefixSeconds: 0,
            videoEndPrefixSeconds: 0,
            skinSelect: 0,
            autoplay: false,
            rightHand: true,
            autoFormat: false,
            bubble: true,
            jumpStep: 10,
            tagTrack: false,
            tagShow: false,
            tagDuration: 5,
            tagFontSize: 16
        }
    );
</script>
{elseif $article.Metas.videoon=='local'}
<div class="dplayer"></div>
<script src="{$host}zb_users/theme/{$theme}/dplayer/DPlayer.min.js" type="text/javascript"></script>
<script>
    var dp = new DPlayer({
        element: document.getElementsByClassName('dplayer')[0],
        autoplay: false,
        theme: '#FADFA3',
        loop: true,
        video: {
            url: '{$article->Metas->$c}',
            pic: '{$article->Metas->jietu}'
        },
    });
    dp.init();

    // stats.js: JavaScript Performance Monitor
    var stats = new Stats();
    stats.showPanel(0); // 0: fps, 1: ms, 2: mb, 3+: custom
    document.body.appendChild(stats.dom);
    function animate() {
        stats.begin();
        // monitored code goes here
        stats.end();

        requestAnimationFrame(animate);
    }
    requestAnimationFrame(animate);
</script>
{elseif $article.Metas.videoon=='ckplay'}
{if $zbp->Config('txdida')->ckdz}
<iframe src="{$zbp->Config('txdida')->ckdz}{$article->Metas->$c}"  allowfullscreen="true" allowfullsreen="true" scrolling="no" frameborder="0" width="100%" height="540"></iframe>
{else}
<div id="a1"></div>
<script type="text/javascript" src="{$host}zb_users/theme/{$theme}/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
    var flashvars={
        f:'{$article->Metas->$c}',
        c:0
    };
    var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
    var video=['{$article->Metas->$c}->video/mp4'];
    CKobject.embed('{$host}zb_users/theme/{$theme}/ckplayer/ckplayer.swf','a1','ckplayer_a1','100%','100%',false,flashvars,video,params);
</script>
{/if}
{elseif $article.Metas.videoon=='frame'}
<div class="info-bf">{$article->Metas->$c}</div>
{elseif $article.Metas.videoon=='cuplay'}
<div class="video" id="CuPlayer" >
    <SCRIPT LANGUAGE=JavaScript>
        var vID        = ""; 
        var vWidth     = "100%"; 
        var vHeight    = 500; 
        var vFile      = "{$host}zb_users/theme/txdida/CuPlayer/CuSunV4set.xml"; 
        var vPlayer    = "{$host}zb_users/theme/txdida/CuPlayer/player.swf?v=3.5";
        var vCssurl    = "{$host}zb_users/theme/txdida/CuPlayer/mini.css"; 
        var vPic       = "{$host}zb_users/theme/txdida/CuPlayer/start.jpg";
        var vMp4url    = "{$article->Metas->$c}";
    </SCRIPT> 
    <script class="CuPlayerVideo" data-mce-role="CuPlayerVideo" type="text/javascript" src="{$host}zb_users/theme/txdida/CuPlayer/js/CuSunX1.min.js"></script>
</div>
{else}
<div class="info-bf">{$article->Metas->$c}</div>
{/if}