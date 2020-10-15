<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;">傻逼不要扒皮</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的电脑发送超级病毒！
</div>';die();?>
{* Template Name:密码找回页面模板 *}
{template:header}
            <div class="login-box">
                <div class="tx-box">
                <div class="data-box mb20">
                    <h3 class="f-22 mb30 ta-c">请输入相关信息找回密码</h3>
                    <p class="mb10"><input required="required" type="text" name="name" class="tx-input" placeholder="请输入用户名"/></p>
                    <p class="mb10"><input type="text" name="email" class="tx-input" placeholder="请输入注册邮箱"/></p>
                    <p class="input-ma mb10"><input required="required" type="text" name="verifycode"  class="tx-input" placeholder="验证码">{$article.verifycode}</p>
                    <p><input type="submit" value="提交" onclick="return resetpwd()" class="tx-btn zse"></p>
                </div>

            </div>
        </div>
       {template:footer1}