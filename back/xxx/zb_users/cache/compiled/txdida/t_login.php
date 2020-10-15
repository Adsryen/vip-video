
<?php  /* Template Name:登录页面模板 */  ?> 
<?php  include $this->GetTemplate('header');  ?>
    <div class="login-box">
        <div class="tx-box">
             <div class="data-box mb20">
                <h3 class="f-22 mb30 ta-c">登录<?php  echo $name;  ?>可以获得更多功能！</h3>
                <p class="mb10"><input type="text" id="edtUserName" class="tx-input" name="edtUserName" placeholder="用户名"></p>
                    <p class="mb10"><input type="password" id="edtPassWord" class="tx-input" name="edtPassWord" placeholder="密码"></p>
                    <p class="checkbox" style="display:none;"><input type="checkbox" id="chkRemember" name="chkRemember" >记住我</p>
                    <p><button type="submit" id="loginbtnPost" class="tx-btn zse" name="loginbtnPost" onclick="return Ytuser_Login()">登录</button></p>
            </div>
            <div class="tx-reg-side">
                <h3 class="f-14 mb10"><a href="<?php  echo $host;  ?>?Resetpwd" class="fr">忘记密码</a><a href="<?php  echo $host;  ?>?Register">新用户注册</a></h3>
            </div>
            <?php if ($zbp->Config('txdida')->userqq == '1') { ?>
            <div class="tx-social ta-c">
                <p><span>社交账号登录</span></p>
                <a href="<?php  echo $host;  ?>zb_users/plugin/YtUser/login.php" class="qq-login"><i class="iconfont icon-qq2"></i></a>
            </div>
            <?php } ?>
        </div>   
    </div>



<?php  include $this->GetTemplate('footer1');  ?>
