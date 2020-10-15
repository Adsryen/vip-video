<?php  /* Template Name: 多集设置模板2，勿选！！ */  ?>
<?php $c=$arraymetasname[1]; ?>
<?php if ($article->Metas->videoon=='xigua') { ?>
<div class="baiduplay">
    <script language="javascript">
        var XgPlayer = {
            'Url': "<?php  echo $article->Metas->$c;  ?>",
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
<?php }elseif($article->Metas->videoon=='jiji') {  ?>
<div class="baiduplay">
    <script type="text/javascript">
        var jjvod_url = '<?php  echo $article->Metas->$c;  ?>';
        var jjvod_w = 935;
        var jjvod_h = 540;
        var jjvod_ad = '';
        var jjvod_c = 'baidu'
        var jjvod_install = 'http://player.jjvod.com/js/jjplayer_install.html?v=1&c='+jjvod_c;
        var jjvod_weburl = unescape(window.location.href);
    </script>
    <script type="text/javascript" src="http://player.jjvod.com/jjplayer_v2.js" charset="utf-8"></script>
</div>
<?php }elseif($article->Metas->videoon=='leshi') {  ?>
<div id="player" style="width:100%;height:540px;">
    <script type="text/javascript" charset="utf-8" src="http://yuntv.letv.com/player/vod/bcloud.js"></script>
    <script>
        var player = new CloudVodPlayer();
        player.init({uu:"<?php  echo $zbp->Config('txdida')->leshiid;  ?>",vu:"<?php  echo $article->Metas->$c;  ?>"});
    </script>
</div>
<?php }elseif($article->Metas->videoon=='vjj') {  ?>
<script type="text/javascript" src="http://7xl3wn.com2.z0.glb.qiniucdn.com/socket.io.min.js"></script>
<script type="text/javascript" src="http://7xjfim.com2.z0.glb.qiniucdn.com/Iva.js"></script>
<div id="videoplay"></div>
<script>
    var ivaInstance = new Iva(
        'videoplay',
        {
            appkey: '<?php  echo $zbp->Config('txdida')->videokey;  ?>',
            live: false,
            video: '<?php  echo $article->Metas->$c;  ?>',
            title: '<?php  echo $article->Title;  ?>',
            cover: '<?php  echo $article->Metas->jietu;  ?>',
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
<?php }elseif($article->Metas->videoon=='local') {  ?>
<div class="dplayer"></div>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/dplayer/DPlayer.min.js" type="text/javascript"></script>
<script>
    var dp = new DPlayer({
        element: document.getElementsByClassName('dplayer')[0],
        autoplay: false,
        theme: '#FADFA3',
        loop: true,
        video: {
            url: '<?php  echo $article->Metas->$c;  ?>',
            pic: '<?php  echo $article->Metas->jietu;  ?>'
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
<?php }elseif($article->Metas->videoon=='ckplay') {  ?>
<?php if ($zbp->Config('txdida')->ckdz) { ?>
<iframe src="<?php  echo $zbp->Config('txdida')->ckdz;  ?><?php  echo $article->Metas->$c;  ?>"  allowfullscreen="true" allowfullsreen="true" scrolling="no" frameborder="0" width="100%" height="540"></iframe>
<?php }else{  ?>
<div id="a1"></div>
<script type="text/javascript" src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
    var flashvars={
        f:'<?php  echo $article->Metas->$c;  ?>',
        c:0
    };
    var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
    var video=['<?php  echo $article->Metas->$c;  ?>->video/mp4'];
    CKobject.embed('<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/ckplayer/ckplayer.swf','a1','ckplayer_a1','100%','100%',false,flashvars,video,params);
</script>
<?php } ?>
<?php }elseif($article->Metas->videoon=='frame') {  ?>
<div class="info-bf"><?php  echo $article->Metas->$c;  ?></div>
<?php }elseif($article->Metas->videoon=='cuplay') {  ?>
<div class="video" id="CuPlayer" >
    <SCRIPT LANGUAGE=JavaScript>
        var vID        = ""; 
        var vWidth     = "100%"; 
        var vHeight    = 500; 
        var vFile      = "<?php  echo $host;  ?>zb_users/theme/txdida/CuPlayer/CuSunV4set.xml"; 
        var vPlayer    = "<?php  echo $host;  ?>zb_users/theme/txdida/CuPlayer/player.swf?v=3.5";
        var vCssurl    = "<?php  echo $host;  ?>zb_users/theme/txdida/CuPlayer/mini.css"; 
        var vPic       = "<?php  echo $host;  ?>zb_users/theme/txdida/CuPlayer/start.jpg";
        var vMp4url    = "<?php  echo $article->Metas->$c;  ?>";
    </SCRIPT> 
    <script class="CuPlayerVideo" data-mce-role="CuPlayerVideo" type="text/javascript" src="<?php  echo $host;  ?>zb_users/theme/txdida/CuPlayer/js/CuSunX1.min.js"></script>
</div>
<?php }else{  ?>
<div class="info-bf"><?php  echo $article->Metas->$c;  ?></div>
<?php } ?>