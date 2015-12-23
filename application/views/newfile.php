<?php 
if (! defined('BASEPATH')) {
	exit('Access Denied');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登陆</title>
<script type="text/javascript">
var xmlobj;      //定义XMLHttpRequest对象
function CreateXMLHttpRequest()
{
    if(window.XMLHttpRequest)
	{//Mozilla浏览器
	    xmlobj=new XMLHttpRequest();
	    if(xmlobj.overrideMimeType)
	    {//设置MIME类别
	       xmlobj.overrideMimeType("text/xml");
	    }
	}
	else if(window.ActiveXObject)
	{//IE浏览器
	   try
	   {
	    xmlobj=new ActiveXObject("Msxml2.XMLHttp");
	   }
	   catch(e)
	   {
	    try
	    {
	     xmlobj=new ActiveXobject("Microsoft.XMLHttp");
	    }
	    catch(e)
	    {
	    }
	   }
	}
}

function send_request(url)                             //主程序函数
{
    CreateXMLHttpRequest();                     //创建对象
    //var showurl = "show.php?username=" + document.getElementById("username").value;                               
    xmlobj.open("GET", url, true);          //
    xmlobj.onreadystatechange = StatHandler;    //判断URL调用的状态值并处理
    xmlobj.send(null);                          //设置为不发送给服务器任何数据
}

function StatHandler()                          //用于处理状态的函数
{
    if(xmlobj.readyState == 4 && xmlobj.status == 200)                                                                      //如果URL成功访问，则输出网页
    {
		document.getElementById("msg").innerHTML=xmlobj.responseText ;
    }
}

function usercheck(obj)
{
	var username=document.getElementById(obj).value;
	if(username=="")
	{
	   document.getElementById('msg').innerHTML=" <font color=red>用户名不能为空！</font>";
	   f.username.focus();
	   return;
	}
	else
	{
	   document.getElementById('msg').innerHTML="正在读取数据...";
	   var url = "http://localhost/CodeIgniter30/index.php/welcome/checkuser?username=" + username;
	   send_request(url);
	   return;
	 }
 }

function logincheck()
{
	var nameinfo = document.getElementById('name').value;
	var pwdinfo = document.getElementById('pwd').value;
	if(nameinfo == ''|| pwdinfo == '')
	{
		document.getElementById('msg').innerHTML=" <font color=red>用户名或者密码为空</font>";
		return false;
	}
	return true;
}

</script>

</head>

<body style="background-color:#1c77ac; background-image:url(<?php echo  _IMGPATH_ ;?>light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">



    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  


<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
    <ul style="display:none">
    <li><a href="#">回首页ҳ</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
    </div>
    
    <div class="loginbody">
    	 <form action="<?php echo site_url("welcome/dologin") ; ?>"  onsubmit="return logincheck()" method="post">
    <span class="systemlogo"></span> 
       
    <div class="loginbox">
    
    <ul>
    <li><input name="username" id="name" type="text" class="loginuser" value="" onChange="usercheck('name')" onBlur="usercheck('name')"/></li>
    <li><input name="passwd" id="pwd" type="password" class="loginpwd" value="" /></li>
   
    <li><input name="" type="submit" class="loginbtn" value="登陆" /></li>
    </ul>
    <div id="msg"></div>
    
    </div>
    </form>
    </div> 
    
    
    
    <div class="loginbm">版权所有   2015-6-16  <a href="http://www.57sy.com">57sy.com</a>仅供学习交流，勿用于任何商业用途</div>
	
    
</body>

</html>
