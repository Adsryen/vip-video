function GetDateStr(AddDayCount){

	var dd = new Date();

	dd.setDate(dd.getDate()+AddDayCount);

	var y = dd.getFullYear();

	var m = dd.getMonth()+1;

	var d = dd.getDate();

	return y+"-"+m+"-"+d;

}



var i=0;

for(i=0;i<22;i++){
	document.write('<p>')

	var randdate=parseInt(Math.random()*1+1);	

	quotes=new Array 

	quotes[1]=GetDateStr(0) 

	quotes[2]=GetDateStr(-1)

	quotes[3]=GetDateStr(-2)

	quotes[4]=GetDateStr(-3)

	var quote=quotes[randdate]



	var rand1=parseInt(Math.random()*22+1);	

	quotes=new Array 

	quotes[1]=' <font color="#FFFFFF">北京的</font>' 

	quotes[2]=' <font color="#FFFFFF">上海的</font>'

	quotes[3]=' <font color="#FFFFFF">天津的</font>'

	quotes[4]=' <font color="#FFFFFF">湖南的</font>'

	quotes[5]=' <font color="#FFFFFF">湖北的</font>'

	quotes[6]=' <font color="#FFFFFF">湖北的</font>'

	quotes[7]=' <font color="#FFFFFF">广东的</font>'

	quotes[8]=' <font color="#FFFFFF">广西的</font>'

	quotes[9]=' <font color="#FFFFFF">重庆的</font>'

	quotes[10]=' <font color="#FFFFFF">四川的</font>'

	quotes[11]=' <font color="#FFFFFF">山东的</font>'

	quotes[12]=' <font color="#FFFFFF">河南的</font>'

	quotes[13]=' <font color="#FFFFFF">河北的</font>'

	quotes[14]=' <font color="#FFFFFF">山西的</font>'

	quotes[15]=' <font color="#FFFFFF">贵州的</font>'

	quotes[16]=' <font color="#FFFFFF">黑龙江的</font>'

	quotes[17]=' <font color="#FFFFFF">福建的</font>'

	quotes[18]=' <font color="#FFFFFF">浙江的</font>'

	quotes[19]=' <font color="#FFFFFF">江苏的</font>'

	quotes[20]=' <font color="#FFFFFF">江西的</font>'

	quotes[21]='<font color="#FFFFFF"> 海南的</font>'

	quotes[22]=' <font color="#FFFFFF">陕西的</font>'

	var quote=quotes[rand1]

	document.write(quote)	

	var rand1=parseInt(Math.random()*22+1);	

	quotes=new Array

	quotes[1]='<font color="#FFFFFF">张小姐</font>'

	quotes[2]='<font color="#FFFFFF">刘小姐</font>'

	quotes[3]='<font color="#FFFFFF">周先生</font>'

	quotes[4]='<font color="#FFFFFF">吴小姐</font>'

	quotes[5]='<font color="#FFFFFF">朱先生</font>'

	quotes[6]='<font color="#FFFFFF">陈小姐</font>'

	quotes[7]='<font color="#FFFFFF">田小姐</font>'

	quotes[8]='<font color="#FFFFFF">钟先生</font>'

	quotes[9]='<font color="#FFFFFF">马小姐</font>'

	quotes[10]='<font color="#FFFFFF">韩小姐</font>'

	quotes[11]='<font color="#FFFFFF">顾小姐</font>'

	quotes[12]='<font color="#FFFFFF">王小姐</font>'

	quotes[13]='<font color="#FFFFFF">李先生</font>'

	quotes[14]='<font color="#FFFFFF">卢小姐</font>'

	quotes[15]='<font color="#FFFFFF">崔小姐</font>'

	quotes[16]='<font color="#FFFFFF">段先生</font>'

	quotes[17]='<font color="#FFFFFF">胡小姐</font>'

	quotes[18]='<font color="#FFFFFF">潘小姐</font>'

	quotes[19]='<font color="#FFFFFF">陈小姐</font>'

	quotes[20]='<font color="#FFFFFF">林小姐</font>'

	quotes[21]='<font color="#FFFFFF">代先生</font>'

	quotes[22]='<font color="#FFFFFF">苏小姐</font>'	

	var quote=quotes[rand1]

	document.write(quote)

	var rand1=parseInt(Math.random()*4+1)

	quotes=new Array

	quotes[1]='<font color="#FFFFFF">（☎ 13'+parseInt(Math.random()*10)+ '****'+ parseInt(Math.random()*10)+ parseInt(Math.random()*10)+parseInt(Math.random()*10)+parseInt(Math.random()*10)+'）</font>' 

	quotes[2]='<font color="#FFFFFF">（☎ 15'+parseInt(Math.random()*10)+ '****'+ parseInt(Math.random()*10)+ parseInt(Math.random()*10)+parseInt(Math.random()*10)+parseInt(Math.random()*10)+'）</font>' 

	quotes[3]='<font color="#FFFFFF">（☎ 17'+parseInt(Math.random()*10)+ '****'+ parseInt(Math.random()*10)+ parseInt(Math.random()*10)+parseInt(Math.random()*10)+parseInt(Math.random()*10)+'）</font>' 

	quotes[4]='<font color="#FFFFFF">（☎ 18'+parseInt(Math.random()*10)+ '****'+ parseInt(Math.random()*10)+ parseInt(Math.random()*10)+parseInt(Math.random()*10)+parseInt(Math.random()*10)+'）</font>' 

 

	var quote=quotes[rand1]

	document.write(quote)
	
    
	
	var rand1=parseInt(Math.random()*9+1)

	quotes=new Array

	quotes[1]='<font color="#FFFFFF">在1分钟前获得了</font>'

	quotes[2]='<font color="#FFFFFF">在2分钟前获得了</font> '

	quotes[3]='<font color="#FFFFFF">在3分钟前获得了</font>'

	quotes[4]='<font color="#FFFFFF">在4分钟前获得了 </font>'
  	quotes[5]='<font color="#FFFFFF">在5分钟前获得了</font> '
    quotes[6]='<font color="#FFFFFF">在6分钟前获得了</font>'

	quotes[7]='<font color="#FFFFFF">在7分钟前获得了</font> '

	quotes[8]='<font color="#FFFFFF">在8分钟前获得了</font>'

	quotes[9]='<font color="#FFFFFF">在9分钟前获得了</font> '
  	

	var quote=quotes[rand1]

	document.write(quote)
	
  
	
	var rand1=parseInt(Math.random()*3+1)

	quotes=new Array

	quotes[1]='<font color="#ffff00">160元一级返现</font>'

	quotes[2]='<font color="#ffff00">80元二级返现</font>'

	quotes[3]='<font color="#ffff00">40元三级返现</font> '
	
	var quote=quotes[rand1]

	document.write(quote)
	
	document.write('&nbsp;')
	
	document.write('已支付')
	

	

}
