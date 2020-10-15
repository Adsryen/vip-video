<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;">傻逼不要扒皮</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的电脑发送超级病毒！
</div>';die();?>
{* Template Name:密码重置页面模板 *}
{template:header}
            <div class="login-box">
                <div class="tx-box">
                <div class="data-box mb20">
                    <h3 class="f-22 mb30 ta-c">重置你的密码</h3>
                    <input type="hidden" name="username" id="inpId" value="{$article.username}" />
                    <input type="hidden" name="hash" id="inpId" value="{$article.hash}" />
                    <p class="mb10">你的用户名:{$article.username}</p>
                    <p class="mb10"><input required="required" type="password" name="password"  class="tx-input" placeholder="输入新密码" /></p>
                    <p class="mb10"><input required="required" type="password" name="repassword"  class="tx-input" placeholder="重复输入新密码"/></p>
                    <p class="input-ma mb10"><input required="required" type="text" name="verifycode"  class="tx-input" placeholder="验证码"/>{$article.verifycode}</p>
                    <p><input type="submit" value="提交" onclick="return Resetpassword()" class="tx-btn zse"></p>
                </div>

            </div>
        </div>
        
       {template:footer1}