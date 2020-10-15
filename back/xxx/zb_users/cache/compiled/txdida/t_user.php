
<?php  /* Template Name:会员中心首页模板 */  ?> 
<?php  include $this->GetTemplate('header');  ?>
<div class="user-bg mb20">会员中心</div>
<div class="zh">
    <div class="user-left fl mb20">
        <ul class="user-menu tx-box clearfix">
            <?php  include $this->GetTemplate('user-menu');  ?>
        </ul>
    </div>
    
    <div class="user-right fr">
        <div class="user-data mb20 tx-box">
            <span><img src="<?php  echo $zbp->user->Avatar;  ?>"></span>
            <h3 class="f-22 mb5">欢迎你：<?php  echo $zbp->user->StaticName;  ?> <a href="javascript:;" class="data-on f-14"><i class="iconfont icon-shenfen"></i> 完善个人资料</a></h3>
            <p class="f-hui">你是<?php  echo $lang['user_level_name'][$user->Level];  ?> [<a href="<?php  echo $host;  ?>?Upgrade">购买升级会员</a>]，你的积分：<?php  echo $user->Price;  ?> [<a href="<?php  echo $zbp->host;  ?>?Integral">购买积分</a>]</p>
        </div>
        <div class="tx-box data-box pd20 mb20" style="display:none;">
            <h2 class="f-22 mb20">你可以在这里完善个人资料</h2>
            <input id="edtID" name="ID" type="hidden" value="<?php  echo $user->ID;  ?>" />
            <input id="edtGuid" name="Guid" type="hidden" value="<?php  echo $user->Guid;  ?>" />
            <p class="mb10">
                <input required="required" type="text" id="edtAlias" name="Alias" value="<?php  echo $user->StaticName;  ?>" class="tx-input" /><i>昵称(*)</i></p>
            <p class="mb10">
                <input type="text" id="edtEmail" name="Email" value="<?php  echo $user->Email;  ?>" class="tx-input" placeholder="邮箱" /><i>邮箱(*)</i></p>
            <p class="mb10">
                <input type="text" id="edtHomePage" name="HomePage" value="<?php  echo $user->HomePage;  ?>" class="tx-input" placeholder="个人网站" /><i>个人网站</i>
            </p>
            <p class="mb10">
                <i>个人简介</i>
                <textarea cols="3" rows="6" id="edtIntro" name="Intro" class="tx-textarea"><?php  echo $user->Intro;  ?></textarea>
            </p>
            <p style="display:none">
                <input required="required" type="text" class="tx-input" id="meta_Tel" name="meta_Tel" value="11111" placeholder="电话" /><i>电话</i></p>
            <p style="display:none">
                <input required="required" type="text" class="tx-input" id="meta_Add" name="meta_Add" value="222222" placeholder="地址" /><i>地址</i></p>
            <p class="input-ma mb10">
                <input required="required" type="text" name="verifycode" class="tx-input" placeholder="验证码" /><?php  echo $article->verifycode;  ?></p>

            <p>
                <button onclick="return checkInfo();" class="tx-btn zse">确定修改</button>
            </p>
        </div>
        
        <div class="clearfix">
            <div class="tx-box pd20 fl w50 mb20">
                <h2 class="tx-title1">最新文章</h2>
                <ul class="ul-30">
                    <?php  foreach ( GetList(8) as $newlist) { ?>
                    <li><span class="fr f-hui1 ml10"><?php  echo $newlist->Time('m-d');  ?></span><a href="<?php  echo $newlist->Url;  ?>" title="<?php  echo $newlist->Title;  ?>"><?php  echo $newlist->Title;  ?></a></li>
                    <?php }   ?>
                </ul>
            </div>
            <div class="tx-box pd20 fr w50 mb20">
                <h2 class="tx-title1">本月热门</h2>
                <ul class="ul-30">
                    <?php 
                    $stime = time();
                    $ytime = 30*24*60*60;
                    $ztime = $stime-$ytime;
                    $order = array('log_ViewNums'=>'DESC');
                    $where = array(array('=','log_Status','0'),array('>','log_PostTime',$ztime));
                    $array = $zbp->GetArticleList(array('*'),$where,$order,array(8),'');
                     ?>
                    <?php  foreach ( $array as $cmslist) { ?>
                    <li><span class="fr f-hui1 ml10"><?php  echo $cmslist->ViewNums;  ?>℃</span><a href="<?php  echo $cmslist->Url;  ?>" title="<?php  echo $cmslist->Title;  ?>"><?php  echo $cmslist->Title;  ?></a></li>
                    <?php }   ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">function checkInfo(){
        $.post(bloghost+'zb_users/plugin/YtUser/cmd.php?act=MemberPst&token=<?php  echo $zbp->GetToken();  ?>',
               {
            "ID":$("input[name='ID']").val(),
            "Guid":$("input[name='Guid']").val(),
            "Alias":$("input[name='Alias']").val(),
            "meta_Tel":$("input[name='meta_Tel']").val(),
            "meta_Add":$("input[name='meta_Add']").val(),
            "Email":$("input[name='Email']").val(),
            "HomePage":$("input[name='HomePage']").val(),
            "Intro":$("textarea[name='Intro']").val(),
            "verifycode":$("input[name='verifycode']").val(),
        },
               function(data){
            var s =data;
            if((s.search("faultCode")>0)&&(s.search("faultString")>0))
            {
                alert(s.match("<string>.+?</string>")[0].replace("<string>","").replace("</string>",""));
                $("#reg_verfiycode").attr("src",bloghost+"zb_system/script/c_validcode.php?id=User&amp;tm="+Math.random());
            }
            else{
                var s =data;
                alert(s);
                window.location=bloghost+'?User';
            }
        }
              );
    }
</script>
<?php  include $this->GetTemplate('footer1');  ?>
