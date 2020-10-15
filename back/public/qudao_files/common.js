//获取域名
//判断服务器域名
var domain = window.location.host;
// console.log(domain);
 var baseURL = 'http://www.akqmys.cn';
//获取地址栏参数
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return unescape(r[2]);
    return null; //返回参数值
}
//时间戳转为日期
function getLocalTime(nS) {
    return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
}
// 服务器域名
// var baseURL = "http://10.45.20.11:88";
// var baseURL = "https://api.mobigroup.cn";


//判断是否是微信浏览器打开
function isWeixn(){
    var ua = navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i)=="micromessenger") {
        return true;
    } else {
        return false;
    }
}

//下载app
var u = window.navigator.userAgent,
    isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1,
    isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),
    downloadUrls = {
        'android':'http://a.app.qq.com/o/simple.jsp?pkgname=com.koramgame.xianshi.kl',
        'ios':'http://a.app.qq.com/o/simple.jsp?pkgname=com.koramgame.xianshi.kl',
    },
    openUrl = {
        'android':'openapp://com.xl.news',
        'ios':'openapp://com.xl.news',
    }

function downLoadApp() {
    if(isAndroid){
        window.location.href = openUrl.android;
        setTimeout(function(){
            window.location.href = downloadUrls.android;
        },1000);
    }else if (isiOS){
        window.location.href = openUrl.ios;
        setTimeout(function(){
            window.location.href = downloadUrls.ios;
        },1000);
    }


}

    //时间戳转换日期 (yyyy-MM-dd HH:mm:ss)
    function formatDateTime(timeValue) {
        var date = new Date(timeValue*1000);
        var y = date.getFullYear();
        var m = date.getMonth() + 1;
        m = m < 10 ? ('0' + m) : m;
        var d = date.getDate();
        d = d < 10 ? ('0' + d) : d;
        var h = date.getHours();
        h = h < 10 ? ('0' + h) : h;
        var minute = date.getMinutes();
        var second = date.getSeconds();
        minute = minute < 10 ? ('0' + minute) : minute;
        second = second < 10 ? ('0' + second) : second;
        return y + '-' + m + '-' + d + ' ' + h + ':' + minute + ':' + second;
    };

    //new Date() 转成当前时间
    Date.prototype.Format = function (fmt) { // author: meizz
        var o = {
            "M+": this.getMonth() + 1, // 月份
            "d+": this.getDate(), // 日
            "h+": this.getHours(), // 小时
            "m+": this.getMinutes(), // 分
            "s+": this.getSeconds(), // 秒
            "q+": Math.floor((this.getMonth() + 3) / 3), // 季度
            "S": this.getMilliseconds() // 毫秒
        };
        if (/(y+)/.test(fmt))
            fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    }


    //判断传入日期是否为昨天
    function isYestday(timeValue) {
        timeValue = timeValue*1000;
        var date = (new Date()); //当前时间
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate()).getTime(); //今天凌晨
        var yestday = new Date(today - 24 * 3600 * 1000).getTime();
        return timeValue < today && yestday <= timeValue;
    };

    //获取当前的小时
    function  getHour() {
        var date = new Date();
        var h = date.getHours();
        return h;


    }
    //获取当前的日期
    function  getDay() {
        var date = new Date();
        var d = date.getDate();
        return d;
    }


    //判断传入日期是否属于今年
    function isYear (timeValue) {
        var takeNewYear = formatDateTime(new Date()).substr(0,4); //当前时间的年份
        var takeTimeValue = formatDateTime(timeValue).substr(0,4); //传入时间的年份
        return takeTimeValue == takeNewYear;
    }

    //60000 1分钟
    //3600000 1小时
    //86400000 24小时
    //对传入时间进行时间转换
    function isToday(timeValue) {
        var timeNew = Date.parse(new Date()); //当前时间
        var timeDiffer = timeNew - timeValue*1000; //与当前时间误差
        if(timeDiffer < 86400000){
            return true;
        }else {
            return false;
        }


    }

    function timeChange(timeValue) {
        var timeNew = Date.parse(new Date()); //当前时间
        var timeDiffer = timeNew - timeValue*1000; //与当前时间误差
        var returnTime = '';
        if(timeDiffer <= 60000) { //一分钟内
            returnTime = '刚刚';
        } else if(timeDiffer > 60000 && timeDiffer < 3600000) { //1小时内
            returnTime = Math.floor(timeDiffer / 60000 )+ '分钟前';
        } else if(timeDiffer >= 3600000 && timeDiffer < 86400000 && isYestday(timeValue) === false) { //今日
            returnTime = formatDateTime(timeValue).substr(11,5);
            returnTime = returnTime.substr(0,2);
            returnTime = parseInt(returnTime);
            var currentHour = getHour();
            returnTime = currentHour - returnTime+'小时前';


        } else if(timeDiffer > 3600000 && isYestday(timeValue) === true) { //昨天
            returnTime = formatDateTime(timeValue).substr(0,16);

        } else if (timeDiffer > 86400000 && isYestday(timeValue) === false && isYear (timeValue) === true){  //今年
            returnTime = formatDateTime(timeValue).substr(0,16);

        } else if (timeDiffer > 86400000 && isYestday(timeValue) === false && isYear (timeValue) === false) { //不属于今年
            returnTime = formatDateTime(timeValue).substr(0,16);

        }

        return returnTime;
    }

function timeChangeAno(timeValue) {
    var timeNew = Date.parse(new Date()); //当前时间
    var timeDiffer = timeNew - timeValue*1000; //与当前时间误差
    var returnTime = '';
    if(timeDiffer <= 60000) { //一分钟内
        returnTime = '刚刚';
    } else if(timeDiffer > 60000 && timeDiffer < 3600000) { //1小时内
        returnTime = Math.floor(timeDiffer / 60000 )+ '分钟前';
    } else if(timeDiffer >= 3600000 && timeDiffer < 86400000 && isYestday(timeValue) === false) { //今日
        returnTime = formatDateTime(timeValue).substr(11,5);
        console.log(formatDateTime(timeValue).substr(0,16));
        console.log(returnTime)
        returnTime = returnTime.substr(0,2);
        console.log(returnTime)
        returnTime = parseInt(returnTime);
        var currentHour = getHour();
        returnTime = currentHour - returnTime+'小时前';


    } else if(timeDiffer > 86400000 && timeDiffer <259200000 || timeDiffer < 86400000 && isYestday(timeValue) === true) { //三天之内
        returnTime = parseInt(formatDateTime(timeValue).substr(8,2));
        var currentDay = getDay();
        returnTime = currentDay - returnTime + '天前';

    } else if (timeDiffer > 259200000 && isYestday(timeValue) === false && isYear (timeValue) === true){  //今年
        returnTime = formatDateTime(timeValue).substr(0,16);

    } else if (timeDiffer > 86400000 && isYestday(timeValue) === false && isYear (timeValue) === false) { //不属于今年
        returnTime = formatDateTime(timeValue).substr(0,16);

    }

    return returnTime;
}


//冒泡排序
function bubbleSort(arr){
    for(var i=0;i<arr.length-1;i++){
        for(var j=0;j<arr.length-i-1;j++){
            if(arr[j]>arr[j+1]){
                var temp=arr[j];
                arr[j]=arr[j+1];
                arr[j+1]=temp;
            }
        }
    }
    return arr;
}

//toast
function toast(value,time) {
        var style = 'display=-webkit-flex;display: -webkit-flex;align-items: center;justify-content: center;position:absolute;' +
            'width:60%;top:20%;left:20%;background:rgba(0,0,0,0.7);padding:0.6rem 0.2rem;' +
            'color:#ffffff;border-radius:0.2rem;font-size:15px;letter-spacing:2px;z-index:100;text-align:center'
        var $toast = $('<div class="toast" style="'+style+'">'+value+'</div>');
        $('body').append($toast);
        setTimeout(function () {
            $('.toast').hide();
        },time)



}


function signBtn(str) {
        $('#sign-up-btn').empty();
        var btn = $('<span id="sign-up" class="sign-up sign-upAnimation">'+str+'</span>');
        $('#sign-up-btn').append(btn)

}


function isInteger(obj) {

    return Math.round(obj) === obj   //是整数，则返回true，否则返回false

}

function needLogin() {
        var token = getUrlParam('token');
        if(!token){
            // alert(' window.location.href = http://dapp?needLogin=1')
            window.location.href = 'http://dapp?needLogin=1'
        }


}



