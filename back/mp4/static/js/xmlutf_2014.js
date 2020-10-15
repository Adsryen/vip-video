
var d = new Date();
var h = d.getHours();
var list = {
	
		'ads':{
		'des': '『vip资源、URL全网资源】',
		'rows':[
			{
			'status':'ok',
            'name': '芒果资源【www.mgtv.com】一键采集资源',
            'apiurl': 'https://v10.tv6.com/api.php/provide/vod/from/mgtv/at/xml/',
			'flag':'tv6_com',
			'xt':'1',
			'group':'',
			'ct':'',
			'cjurl':''
			},
			{
			'status':'ok',
            'name': '优酷资源【www.youku.com】一键采集资源',
            'apiurl': 'https://v10.tv6.com/api.php/provide/vod/from/youku/at/xml/',
			'flag':'tv6_com',
			'xt':'1',
			'group':'',
			'ct':'',
			'cjurl':''
			},
			{
			'status':'ok',
            'name': '乐视资源【www.letv.com】一键采集资源',
            'apiurl': 'https://v10.tv6.com/api.php/provide/vod/from/letv/at/xml/',
			'flag':'tv6_com',
			'xt':'1',
			'group':'',
			'ct':'',
			'cjurl':''
			},
			{
			'status':'ok',
            'name': '搜狐资源【www.sohu.com】一键采集资源',
            'apiurl': 'https://v10.tv6.com/api.php/provide/vod/from/sohu/at/xml/',
			'flag':'tv6_com',
			'xt':'1',
			'group':'',
			'ct':'',
			'cjurl':''
			},
			{
			'status':'ok',
            'name': '奇艺资源【www.iqiyi.com】一键采集资源',
            'apiurl': 'https://v10.tv6.com/api.php/provide/vod/from/qiyi/at/xml/',
			'flag':'tv6_com',
			'xt':'1',
			'group':'',
			'ct':'',
			'cjurl':''
			},
			{
			'status':'ok',
            'name': '腾讯资源【www.qq.com】一键采集资源',
            'apiurl': 'https://v10.tv6.com/api.php/provide/vod/from/qq/at/xml/',
			'flag':'tv6_com',
			'xt':'1',
			'group':'',
			'ct':'',
			'cjurl':''
			},
			{
			'status':'ok',
            'name': 'PPTV资源【www.pptv.com】一键采集资源',
            'apiurl': 'https://v10.tv6.com/api.php/provide/vod/from/pptv/at/xml/',
			'flag':'tv6_com',
			'xt':'1',
			'group':'',
			'ct':'',
			'cjurl':''
			}
		]
	},
    'ykyun': {
		'des': '『私有云资源【稳定快速无水印】',
			'rows': [{
			'status': 'ok',
			'name': '【私有资源】',
			'apiurl': 'https:///at/xml/',
			'flag': 'tv6_com',
			'xt': '1',
			'group': '',
			'ct': '',
			'cjurl':''
		},{
			'status': 'err',
			'name': '院线 ',
			'apiurl': 'http://.php',
			'flag': 'tv6_com',
			'xt': '1',
			'group': '',
			'ct': '',
			'cjurl':''
		}
		]
	},
	'news':{
		'des': '常用资源库-需安装播放器客户端',
		'rows':[
			{
			'status':'ok',
			'name':'【吉吉影音】',
			'apiurl':'http://api.jijizy.com/inc/api.asp',
			'flag':'jijizycom_',
			'xt':'1',
			'group':'',
			'ct':'',
			'cjurl':''
			},
			{
			'status':'ok',
			'name':'【吉吉影音、非凡影音、西瓜影音】',
			'apiurl':'http://www.91zyw.com/inc/api_maccms.asp',
			'flag':'91zywcom_',
			'xt':'1',
			'group':'',
			'ct':'',
			'cjurl':''
			}
		]
	}
};

var html='',html2='',url='',url8x='',url7x='',ver='7x',url1='',url2='',url3='',url4='',urlone='',name1='',du='';
url8x='index.php?m=collect-{ac}-ac2-{ac2}-hour-{hour}-xt-{xt}-ct-{ct}-group-{group}-flag-{flag}-apiurl-{apiurl}';
url7x='admin_maccj.php?action={ac}&xt={xt}&ct={ct}&rday={hour}&cjflag={flag}&cjurl={apiurl}';
url10x='api?ac={ac}&xt={xt}&ct={ct}&rday={hour}&cjflag={flag}&cjurl={apiurl}';

ver='8x';url=url8x;
if(top.location.href.indexOf('maccj')>-1){ver='7x';url=url7x;}
if(typeof (MAC_VERSION) != 'undefined'){
    ver = MAC_VERSION;
    if(ver =='7x'){
        url=url7x;
    }
    else if(ver =='8x'){
        url=url8x;
    }
    else if(ver =='v10'){
    	if(window.location.href.indexOf('-')>-1){
    		url= window.location.pathname.split('.php')[0] + '.php/admin/collect/' + url10x;
    	}
    	else{
    		url= url10x;
    	}
    }
}


$.each(list, function(k1, v1){
	
	html +="<table width='98%' class='table'><tbody>";
	if(k1=='ads'){
		html += "<tr class='table_title red'><td colspan='7' class='td'><span style='float:left'>&nbsp;离线资源采集平台>>> &nbsp;</span><span style='float:right'>由资源站提供数据接口,保持同步更新&nbsp;</span></td></tr>";
	//	v1.rows.sort(function(){return Math.random()-0.5;});
	//	v1.rows.sort(function(){return Math.random()-0.5;});
	}
	html += "<tr class='table_title'><td colspan='7' class='td'><span style='float:left'>&nbsp;"+v1.des+"</span><span style='float:right'>&nbsp;</span></td></tr>";
	
	$.each(v1.rows, function(k2, v2){
		urlone = url.replace('{xt}',v2.xt).replace('{ct}',v2.ct).replace('{group}',v2.group).replace('{flag}',v2.flag).replace('{apiurl}',v2.apiurl);
		name1 = v2.name;
		if(ver=='8x'){
			url1= urlone.replace('{ac}','list').replace('{ac2}','').replace('{hour}','');
			url2= urlone.replace('{ac}','cj').replace('{ac2}','day').replace('{hour}','24');
			url3= urlone.replace('{ac}','cj').replace('{ac2}','day').replace('{hour}','98');
			url4= urlone.replace('{ac}','cj').replace('{ac2}','all').replace('{hour}','');
		}
		else{
			url1= urlone.replace('{ac}','list').replace('{ac2}','').replace('{hour}','');
			url2= urlone.replace('{ac}','cjday').replace('{ac2}','').replace('{hour}','24');
			url3= urlone.replace('{ac}','cjday').replace('{ac2}','').replace('{hour}','98');
			url4= urlone.replace('{ac}','cjall').replace('{ac2}','').replace('{hour}','');
		}
		du = '';
		if(v2.cjurl!=''){
			du = "<a href='"+v2.cjurl+"'>下载插件</a></td>";
		}
		
		html += "<tr><td width='20'>0"+(k2+1)+"、</td>"+'<td width="30" align=center><em class="u'+v2.status+'"><em></td>'+"<td><a href='"+url1+"'> "+name1+" </a></td><td width='60'>" +du+"</td>"
		+"<td width='60'><a href='"+url2+"'>采集当天</a></td>"+"<td width='60'><a href='"+url3+"'>采集本周</a></td>"+"<td width='60'><a href='"+url4+"'>采集所有</a></td></tr>";
		html2 += '<option value="'+url2+'">'+name1+'</option>';
	});
	html+='</tbody></table>';
});
html2 = '<select id="ds_url" name="ds_url" multiple style=" width:400px;height:300px">' + html2 + '</select>';

document.write('<style type="text/css">.table {margin-bottom:5px;font-size:12px;text-align:left;border-collapse: collapse;border: 1px solid #C6DCF2; }.table td {padding-left:10px;padding-right:10px;border: 1px solid #C6DCF2; }.table .td {height:25px;padding-left:0px;} .table tr {height:25px;line-height:25px;}.table tr .left{width:180px;text-align:right;padding-right:10px;color:#666;} .table_title {height:25px;line-height:25px;background: #F3F7FB;font-weight:bold;color:#0099cc;}.uok{width:30px;height:15px;color:white;background-color:green;display:-moz-inline-box;display:inline-block;}.uerr{width:30px;height:15px;color:white;background-color:red;display:-moz-inline-box;display:inline-block;}.red{color:red;}</style>');

h=20;
if(h>0){
	if( typeof typeids != 'undefined' ){
		document.write(html2);
	}
	else{
		document.write(html);
	}
}
else{
	document.write('<font style="color:red;font-size:26px">资源库关闭中，请稍后访问。<br></font><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>');
}
