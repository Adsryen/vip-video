
<?php  /* Template Name:密码重置页面模板 */  ?>
<?php  include $this->GetTemplate('header');  ?>
            <div class="login-box">
                <div class="tx-box">
                <div class="data-box mb20">
                    <h3 class="f-22 mb30 ta-c">重置你的密码</h3>
                    <input type="hidden" name="username" id="inpId" value="<?php  echo $article->username;  ?>" />
                    <input type="hidden" name="hash" id="inpId" value="<?php  echo $article->hash;  ?>" />
                    <p class="mb10">你的用户名:<?php  echo $article->username;  ?></p>
                    <p class="mb10"><input required="required" type="password" name="password"  class="tx-input" placeholder="输入新密码" /></p>
                    <p class="mb10"><input required="required" type="password" name="repassword"  class="tx-input" placeholder="重复输入新密码"/></p>
                    <p class="input-ma mb10"><input required="required" type="text" name="verifycode"  class="tx-input" placeholder="验证码"/><?php  echo $article->verifycode;  ?></p>
                    <p><input type="submit" value="提交" onclick="return Resetpassword()" class="tx-btn zse"></p>
                </div>

            </div>
        </div>
        
       <?php  include $this->GetTemplate('footer1');  ?>