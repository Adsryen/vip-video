<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;">傻逼不要扒皮</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的电脑发送超级病毒！
</div>';die();?>
{* Template Name:登录页面模板 *} 
{template:header}
    <div class="login-box">
        <div class="tx-box">
             <div class="data-box mb20">
                <h3 class="f-22 mb30 ta-c">登录{$name}可以获得更多功能！</h3>
                <p class="mb10"><input type="text" id="edtUserName" class="tx-input" name="edtUserName" placeholder="用户名"></p>
                    <p class="mb10"><input type="password" id="edtPassWord" class="tx-input" name="edtPassWord" placeholder="密码"></p>
                    <p class="checkbox" style="display:none;"><input type="checkbox" id="chkRemember" name="chkRemember" >记住我</p>
                    <p><button type="submit" id="loginbtnPost" class="tx-btn zse" name="loginbtnPost" onclick="return Ytuser_Login()">登录</button></p>
            </div>
            <div class="tx-reg-side">
                <h3 class="f-14 mb10"><a href="{$host}?Resetpwd" class="fr">忘记密码</a><a href="{$host}?Register">新用户注册</a></h3>
            </div>
            {if $zbp->Config('txdida')->userqq == '1'}
            <div class="tx-social ta-c">
                <p><span>社交账号登录</span></p>
                <a href="{$host}zb_users/plugin/YtUser/login.php" class="qq-login"><i class="iconfont icon-qq2"></i></a>
            </div>
            {/if}
        </div>   
    </div>



{template:footer1}
