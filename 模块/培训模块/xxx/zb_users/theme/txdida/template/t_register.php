{* Template Name:注册页面模板 *}
{template:header}

<div class="login-box">
    <div class="tx-box">
        <div class="data-box mb20">
            <h3 class="f-22 mb30 ta-c">欢迎加入{$name}！</h3>
            <p class="mb10"><input required="required" type="text" name="name" class="tx-input" placeholder="昵称"></p>
            <p class="mb10"><input required="required" type="password" name="password" class="tx-input" placeholder="密码"></p>
            <p class="mb10"><input required="required" type="password" name="repassword" class="tx-input" placeholder="确认密码"></p>
            <p class="mb10"><input type="text" name="email" class="tx-input" placeholder="邮箱"></p>
            <p style="display:none"><input type="text" name="homepage"  class="tx-input" placeholder="网址"></p>
            <p class="input-ma mb10"><input required="required" type="text" name="verifycode"  class="tx-input" placeholder="验证码">{$article.verifycode}</p>
            <p><input type="submit" value="提交" onclick="return register()" class="tx-btn zse"></p>
        </div>
        <div class="tx-reg-side ta-c">
            <h3 class="f-14 mb10">如果你已经有{$name}账号，请直接<a href="{$host}?Login">点击登录</a></h3>
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