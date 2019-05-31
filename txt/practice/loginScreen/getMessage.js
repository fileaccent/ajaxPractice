function loadXMLDoc(url)//获得从后端传过来的数据
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	{
		//  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		// IE6, IE5 浏览器执行代码
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
      var txt=xmlhttp.responseText;
      txt=eval("("+txt+")");
			document.getElementById("myDiv").innerHTML=txt;
		}
	}
	xmlhttp.open("POST",url,true);
	xmlhttp.send('user');
}

function printUserMassage(){/*用于在表格中输出数据*/
  
}