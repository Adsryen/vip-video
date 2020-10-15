
<?php  /* Template Name:密码找回页面模板 */  ?>
<?php  include $this->GetTemplate('header');  ?>
            <div class="login-box">
                <div class="tx-box">
                <div class="data-box mb20">
                    <h3 class="f-22 mb30 ta-c">请输入相关信息找回密码</h3>
                    <p class="mb10"><input required="required" type="text" name="name" class="tx-input" placeholder="请输入用户名"/></p>
                    <p class="mb10"><input type="text" name="email" class="tx-input" placeholder="请输入注册邮箱"/></p>
                    <p class="input-ma mb10"><input required="required" type="text" name="verifycode"  class="tx-input" placeholder="验证码"><?php  echo $article->verifycode;  ?></p>
                    <p><input type="submit" value="提交" onclick="return resetpwd()" class="tx-btn zse"></p>
                </div>

            </div>
        </div>
       <?php  include $this->GetTemplate('footer1');  ?>