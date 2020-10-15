<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"/www/wwwroot/yy.idc66.xyz/applications/app/view/index/qudao.html";i:1552319540;}*/ ?>
<!DOCTYPE html>
<!-- saved from url=(0051)http://www.akqmys.cn/app/index/qudao.html?uid=MjI4NjA= -->
<html lang="en" style="font-size: 270.145px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    
    <meta content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <title>欣然影视，影视VIP全聚合！</title>
    <script>
        !function (e) {
            function t(n) {
                if (i[n]) return i[n].exports;
                var r = i[n] = {exports: {}, id: n, loaded: !1};
                return e[n].call(r.exports, r, r.exports, t), r.loaded = !0, r.exports
            }

            var i = {};
            return t.m = e, t.c = i, t.p = "", t(0)
        }([function (e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {value: !0});
            var i = window;
            t["default"] = i.vl = function (e, t) {
                var n = e || 100, r = t || 690, a = i.document, d = navigator.userAgent,
                    o = d.match(/Android[\S\s]+AppleWebkit\/(\d{3})/i), l = d.match(/U3\/((\d+|\.){5,})/i),
                    s = l && parseInt(l[1].split(".").join(""), 10) >= 80, u = a.documentElement, c = 1;
                if (o && o[1] > 534 || s) {
                    u.style.fontSize = n + "px";
                    var p = a.createElement("div");
                    p.setAttribute("style", "width: 1rem;display:none"), u.appendChild(p);
                    var m = i.getComputedStyle(p).width;
                    if (u.removeChild(p), m !== u.style.fontSize) {
                        var v = parseInt(m, 10);
                        c = 100 / v
                    }
                }
                var f = a.querySelector('meta[name="viewport"]');
                f || (f = a.createElement("meta"), f.setAttribute("name", "viewport"), a.head.appendChild(f)), f.setAttribute("content", "width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1");
                var h = function () {
                    u.style.fontSize = n / r * u.clientWidth * c + "px"
                };
                h(), i.addEventListener("resize", h)
            }, e.exports = t["default"]
        }]);
        vl(100, 690);
    </script>
    <link rel="stylesheet" href="/public/qudao_files/reset.css">
    <style type="text/css">
        html,body {
            width: 100%;
            height: 100%;
            background: #f0433d;
            position: relative;
        }
        .download-box {
            width: 100%;
        }
        .download-scroll {
            width: 100%;
            height: 0.66rem;
            background: #f0433d;
        }
        .download-content {
            padding: 0.3rem 0;
        }
        .download-title {
            text-align: center;
            color: #fff;
        }
        .download-title dt , .download-title dd {
            margin-bottom: 0.2rem;
        }
        .download-title dt span:nth-child(1) {
            font-size: 0.44rem;
        }
        .download-title dt span:nth-child(2) {
            font-size: 0.28rem;
        }
        .download-title dd span:nth-child(1) {
            font-size: 0.58rem;
        }
        .download-titleImg img {
            width: 4.18rem;
        }
        .download-titleBg {
            width: 4.84rem;
            height: 0.9rem;
            background: url("/public/qudao_files/downloadyellowbg.png") no-repeat center;
            background-size: 100% 100%;
            text-align: center;
            margin: 0 auto;
        }
        .download-title dd.download-titleBg span {
            font-size: 0.3rem;
            line-height: 0.7rem;
        }
        .download-money {
            width: 5.38rem;
            height: 1.57rem;
            background: url("/public/qudao_files/download-money.png") no-repeat center;
            background-size: 100% 100%;
            margin: 0 auto;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .download-money span {
            display: block;
        }
        .download-money span:nth-child(1) {
            font-size: 0.46rem;
            color: #f04d47;
        }
        .download-money span:nth-child(2) {
            font-size: 0.2rem;
            color: #797878;
        }
        .download-money span.money-num {
            font-size: 0.5rem;
        }
        .money-num b {
            font-size: 0.28rem;
            margin-left: 0.05rem;
        }
        .download-withdraw {
            width: 2rem;
            height: 0.54rem;
            padding: 0.12rem 0.3rem;
            background: #f0433d;
            border-radius: 0.3rem;
            color: #fff;
            display: block;
            font-size: 17px;
            line-height: 0.4rem;
            text-align: center;
        }
        .download-input {
            width: 5.38rem;
            border-radius: 0.2rem;
            margin: 0.65rem auto 0.35rem;
            position: relative;
        }
        .download-input div {
            margin-bottom: 0.2rem;
            position: relative;
        }
        .download-input input {
            border: 0;
            border-radius: 0.2rem;
            width: 5.38rem;
            height: 0.95rem;
            padding-left: 0.7rem;
            color: #979797;
            margin: -1px;
        }
        .download-input .download-phone {
            position: absolute;
            top: 32%;
            left: 0.3rem;
            height: 0.32rem;
        }
        .download-input .download-wrong {
            position: absolute;
            top: 15%;
            right: 0.3rem;
            width: 0.38rem;
            height: 0.38rem;
            display: none;
        }
        input.vcode-btn {
            display: inline-block;
            width: 1.8rem;
            position: absolute;
            right: 0px;
            top: 0;
            text-align: center;
            padding: 0.2rem;
            font-size: 0.25rem;
            color: #f0433d;
            background: #fff;
            border-left: 1px solid #f1f1f1;
            border-radius: 0 0.2rem 0.2rem 0;
        }
        .download-app {
            width: 5.38rem;
            height: 0.95rem;
            line-height: 0.95rem;
            background: #fff438;
            border-radius: 0.5rem;
            margin: 0 auto 0.4rem;
            text-align: center;
        }
        .download-appAnimation {
            animation: scaleDraw 0.5s ease-in infinite;
        }
        @keyframes scaleDraw {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        .download-app span {
            display: block;
            color: #db1835;
            font-size: 0.38rem;
            font-weight: bold;
        }
        .download-remark {
            font-size: 0.26rem;
            line-height: 0.42rem;
            color: #fff;
            text-align: center;
        }
        .wrong-txt {
            width: 100%;
            font-size: 16px;
            color: yellow;
            position: absolute;
            top: -26px;
            text-align: center;
            display: none;
        }
        .download-modal {
            width: 6.9rem;
            height: 100%;
            background: rgba(0,0,0,0.5);
            position: fixed;
            top:0;
            z-index: 100;
            display: none;
        }
        .download-modal div {
            width: 70%;
            height: 30%;
            background: #fff;
            margin: 62% auto 0;
            padding: 12% 0;
            text-align: center;
            border-radius: 0.1rem;
        }
        .download-modal p {
            margin-bottom: 0.15rem;
        }
        .download-modal p:nth-child(2) {
            font-size: 0.35rem;
        }
        .download-modal p:nth-child(3) {
            font-size: 0.25rem;
            color: #bbbbbb;
        }
      .STYLE1 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 16px;
}
    </style>
</head>
<body style="min-height: 856px;">
    <div class="download-box">

 <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="FF5B5C" bgcolor="#FFFFFF">
  <!-- <tr>
    <td bgcolor="#f0433d"><iframe src="http://959495.xyz/shuju" width="100%" height=200 marginheight="0" marginwidth="0" frameborder="0" scrolling="no"></iframe></td>
  </tr>
  <tr>
    <td bgcolor="#000"><div align="center"><span class="STYLE1">&nbsp;&nbsp;欣然影视APP视频介绍（点击即可播放）</span></div></td>
  </tr>
  <!-<tr>
    <td><video width="100%" src="http://img.tukuppt.com/video_show/2629112/00/02/76/5b8ceb9a5327e.mp4" controls="controls" autoplay="autoplay" loop="loop" poster="https://s2.ax1x.com/2019/02/17/kyd39O.jpg">
视频
</video></td>
  </tr>-->

  </tr>
</table>             
        <div class="download-content">
          <div class="download-title">
                <dl>
                    <dt>
                        <span>欣然影视</span> <span>全网VIP影视聚合平台</span>
                    </dt>
                    <dd><span>居然还能赚钱</span></dd>
                    <!-- <dd class="download-titleImg"><i><img src="picture/downloadtitlespan.png" alt=""></i></dd> -->
                    <dd class="download-titleBg"><span>请在下方填写资料注册</span></dd>
                </dl>
            </div>
<div class="download-input">
        <div>
                    <i><img src="/public/qudao_files/download-phone.png" alt="" class="download-phone"></i>
                    <input type="number" class="enter-number" name="phone-num" placeholder="请输入手机号" maxlength="11" onkeyup="this.value=this.value.replace(/^\d{12}$/)">
                </div>
                <!--<div>
                    <i><img src="/public/qudao_files/download-phone.png" alt="" class="download-phone"></i>
                    <input type="number" class="enter-vcode" name="phone-vcode" placeholder="请输入验证码" maxlength="4" onkeyup="this.value=this.value.replace(/^\d{7}$/)">
                    <input type="button" class="vcode-btn" value="获取验证码">
                </div>-->
              	<div>
                    <i><img src="/public/qudao_files/vcode.png" alt="" class="download-phone"></i>
                    <input type="password" class="enter-pass" name="phone-pass" placeholder="设置账号登陆密码" maxlength="12">
                </div>
                <i><img src="/public/qudao_files/download-wrong.png" alt="" class="download-wrong"></i>
                <p class="wrong-txt wrong-txtOne">请输入手机号</p>
                <p class="wrong-txt wrong-txtTwo">请输入11位正确手机号</p>
                <p class="wrong-txt wrong-txtCode">请输入验证码</p>
              	<p class="wrong-txt wrong-txtPass">请设置密码</p>
            </div>
            <div class="download-app">
                <span type="button" class="download-appBtn">立即注册</span>
            </div>
            <div class="download-remark">
                <p>欣然影视 全网独创赚钱系统</p>
                <p>(❁´◡`❁)要是你月赚万元可别谢我喔(❁´◡`❁)</p>
            </div>
        </div>
    </div>
    <div class="download-modal">
        <div>
            <p><img src="/public/qudao_files/download-sure.png" alt=""></p>
            <p>领取成功</p>
            <p>安装APP后即可登录刚刚的账号</p>
            
        </div>
    </div>
    <script src="/public/qudao_files/jquery-3.2.1.min.js"></script>
    <script src="/public/qudao_files/common.js"></script>
    <script>
        document.body.style.minHeight = window.innerHeight + 'px'
    </script>
    <script type="text/javascript">
         $(function () {
            var len = 11,
                codeLen = 4,
                seconds = 60,
                mobile = /^1[3|4|5|6|7|8|9][0-9]\d{8}$/,
                guideCode = getUrlParam('guideCode'),
                baseURL='http://959495.xyz';
                //生成6位随机数
                   function RndNum(n){
                      var rnd="";
                      for(var i=0;i<n;i++)
                          rnd+=Math.floor(Math.random()*10);
                      return rnd;
                    }
		

		

		
            $('.download-appBtn').on('click',function () { // 该方法响应立即注册按钮
                var phoneNum = $('.enter-number').val();
                if ( phoneNum =='' ) {
                    $('.download-wrong').show();
                    $('.wrong-txtOne').show();
                    setTimeout(function () {
                        $('.download-wrong').hide();
                        $('.wrong-txtOne').hide();
                    },3000);
                  
                  return;
                } //else if ( !mobile.test(phoneNum) ) {
                  //  $('.wrong-txtTwo').show();
                  //  setTimeout(function () {
                   //     $('.wrong-txtTwo').hide();
                  //  },3000);

                  //  return false;
              //  }
				
				$.ajax({ //验证手机是否被注册
							type:'GET',
							async:false,
							url:baseURL+'/app/index/checkusername?phone='+phoneNum,
							dataType: "jsonp",
							
							success:function (res) {
							
									if(res.code==200){ //响应为true，手机号未注册，调用注册方法
									  datas=200;
									  zhuce();
									}else{
									  alert('手机号已被注册');
									  datas=500;
									}
							},
							error:function(data){
							console.log(1);
							},
							
						});
						if(datas==500){
							 window.location.href='https://www.appfenfa.top/app.php/245'; //分发地址
						  return false;

						}
				
              
           
            });

           // $('.download-appBtn').on('click',function () { //注册账号
			function zhuce(){ //新写注册账号方法 当前账号未被注册调用此方法	
                var phoneNum = $('.enter-number').val();
                var vcode = $('.enter-vcode').val();
              	var pass = $('.enter-pass').val();
                  if ( phoneNum == '') {
                    $('.download-wrong').show();
                    $('.wrong-txtOne').show();
                    setTimeout(function () {
                        $('.download-wrong').hide();
                        $('.wrong-txtOne').hide();
                    },3000)
                }
               /* if(vcode!=datacode){  // datacode 为短信api返回的值，上述已取消故注释该判断
                  alert('验证码不正确！请重新获取');
                  $('.wrong-txtCode').hide();
                  return false;
                }*/
                if ( phoneNum == '') { //验证电话是否为空
                    $('.download-wrong').show();
                    $('.wrong-txtOne').show();
                    setTimeout(function () {
                        $('.download-wrong').hide();
                        $('.wrong-txtOne').hide();
                    },3000);
                }  else if ( phoneNum.length < len) { //验证电话是否小于11位
                    $('.wrong-txtTwo').show();
                    setTimeout(function () {
                        $('.wrong-txtTwo').hide();
                    },3000)
                }/**  else if ( vcode == '') {  //验证验证码是否为空 为空false 提示3000毫秒 
                    $('.wrong-txtCode').show();
                    setTimeout(function () {
                        $('.wrong-txtCode').hide();
                    },3000)
                } **/
				else if ( pass == '') {
                    $('.wrong-txtPass').show();
                    setTimeout(function () {
                        $('.wrong-txtPass').hide();
                    },3000)
                }  else {
                    $.ajax({
                        type:'GET',
                        async:false,
                        url:baseURL+'/app/index/validcode?phone='+phoneNum+'&code='+vcode+'&uid=<?php echo $uid; ?>&sid=<?php echo $sid; ?>&passwd='+pass,
						dataType: "jsonp",
                        success:function (data) {
                        
                          if ( data.code == 1 ) {
                              
                                $('.download-modal').show();
                                $('.download-app').removeClass('download-appAnimation');
                                setTimeout(function () {
                                    window.location.href='https://www.appfenfa.top/app.php/245' //分发地址
                                },2000);
                            }else {
                               alert(666);
                                $('.download-modal').hide();
                                $('.download-app').removeClass('download-appAnimation');
                                $('.wrong-txtCode').show();
                                $('.wrong-txtCode').text(res.msg);
                            } 

                        }
                    })
                    return false;
                }
			}
           // });

	            $('.enter-number').focus(function () {
                $('.download-wrong').hide();
                $('.wrong-txt').hide();
                $('.download-app').removeClass('download-appAnimation');
            });
            $('.enter-vcode').focus(function () {
                $('.wrong-txtCode').hide();
            })
            $('.enter-vcode').on('keyup',function () {
                if ($('.enter-number').val().length == len && $('.enter-vcode').val().length == codeLen) {
                    $('.download-app').addClass('download-appAnimation');
                }
            });
            $('.download-withdraw').on('click',function () {
                var phoneNum = $('.enter-number').val();
                if ( phoneNum == '') {
                    $('.download-wrong').show();
                    $('.wrong-txtOne').show();
                    setTimeout(function () {
                        $('.download-wrong').hide();
                        $('.wrong-txtOne').hide();
                    },3000)
                }
            });

        });


    </script>

</body></html>