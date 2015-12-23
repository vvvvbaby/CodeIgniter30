<?php 
if (! defined('BASEPATH')) {
	exit('Access Denied');
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="icon" href="https://static.uberx.net.cn/login/images/favicon.a767a268b86a6ce7d1099bec4a9e37aa.ico" type="image/x-icon" />
  <link rel="stylesheet" href="https://static.uberx.net.cn/login/style-login/style.19ed08ba5a21bba499b96dda406062f1.css">
  <link href="https://static.uberx.net.cn/uber-icons/0.12.0/uber-icons.css" rel="stylesheet"/>
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
		   document.getElementById('msg').innerHTML=" <font color=white>正在读取数据</font>"	;
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
<body>
    <div class="content">
        <div class="icon-item text--center">
            <a href=#>
                <i class="icon icon_uber
                        push-large--top push-huge--bottom
">
                </i>
            </a>
        </div>

  <p class="title background-line push-small--top">
    <span>登录</span>
  </p>
  <form action="<?php echo site_url("welcome/dologin") ; ?>"  onsubmit="return logincheck()" method="post" class="form" novalidate>
    <input type="hidden" name="_csrf_token" value="1437532240-01-8sBTyDOB4sc5M3qyYn_nZFwbvQpwl520OQK2NU4dj5k=">
    <input type="hidden" data-js="access-token" name="access_token" />	
	<div id="msg"></div>
    <div class="form-group push--bottom">
      <label class="label" for="email">用户名</label>
      <input type="email" class="text-input error"
            name="username"
            placeholder="用户名" value="" id="name" onChange="usercheck('name')" onBlur="usercheck('name')"/>
    </div>
    <div class="form-group push--bottom">
      <label class="label" for="password">密码</label>
      <input type="password" class="text-input error" name="passwd"
        placeholder="密码" id="pwd"/>
    </div>
    <div class="form-group push--bottom">
      <label class="label" for="verifycode">验证码</label>
      <input type="text" class="text-input error" id="verifycode" name="verifycode"
        placeholder="验证码 " />
    </div>
    <img id="imgcode" src="<?= site_url('welcome/imagetest') ?>" alt="看不清楚，换一张" style="cursor: pointer; vertical-align:middle;" onClick="this.src='<?= site_url('welcome/imagetest')?>'"/>
    <div class="form-group push--bottom">
      <input type="checkbox" id="checkbox-rememberme" class="hidden" checked />
      <label class="checkbox" for="checkbox-rememberme">
        记住我
      </label>
    </div>
    <button class="btn btn--huge btn--full" type="submit">登录</button>
  </form>
  <div class="text--center push--top">
    <a class="btn btn--link" href="<?= site_url('welcome/forgotpassword') ?>">
      忘记密码
    </a>
  </div>
  <hr class="push--top"/>
  <p class="text--center">
    没有账号？
    <a class="btn btn--link" href="<?php echo site_url("welcome/register") ; ?>">
      注册
    </a>
     <a class="btn btn--link" href="<?php echo site_url("welcome/imagetest") ; ?>">
   生成验证码
    </a>
    <a class="btn btn--link" href="<?php echo site_url("welcome/curltest") ; ?>">curl 测试</a>
  </p>
    </div>


</body>
</html>