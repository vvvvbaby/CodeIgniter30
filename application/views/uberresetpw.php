<?php 
if (! defined('BASEPATH')) {
	exit('Access Denied');
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<head>
   
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Uber </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="icon" href="https://d1a3f4spazzrp4.cloudfront.net/login/images/favicon.a767a268b86a6ce7d1099bec4a9e37aa.ico" type="image/x-icon" />
  <link rel="stylesheet" href="https://d1a3f4spazzrp4.cloudfront.net/login/style-login/style.19ed08ba5a21bba499b96dda406062f1.css">
  <link href="https://d1a3f4spazzrp4.cloudfront.net/uber-icons/0.12.0/uber-icons.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://d1a3f4spazzrp4.cloudfront.net/uber-fonts/2.0.1/superfine.css"/>
   <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.1.min.js"></script>
   <script type="text/javascript" >
  
   $(function(){
	   
	   	  var g_isAjax = false;	
		  $("#btnsubmit").attr("disabled","true");
		  $("#btnsubmit").click(function(){
	   	  if(submitcheck())
	   	  {
	       	 $("form").submit(); 
	       	 return;
	   	  }
	   	  return false;
	   	});
		   	
		$("#email").change(function(){
		checkuser();
		});
		
		function submitcheck()
		{
				var email = $("#email").val();
				var pw1 = $("#newps").val();
				var pw2 = $("#repeatps").val();
				if(email == "" || pw1 == "" || pw2 == "")
				{
					$("#errmsg").html("<font color=red>email或者密码为空</font>");
					return false;
				}
				if(pw1 != pw2)
				{
					$("#errmsg").html("<font color=red>两次输入的密码不一致</font>");
					return false;
				}
				return true;
		}

		function checkuser(){
			if(g_isAjax)
				return false;
			g_isAjax = true;			
			$.ajax({
				datatype: 'html',
				type: 'GET',
				url: 'http://localhost/CodeIgniter30/index.php/welcome/checkuser?username=' + $("#email").val(),
				success: function(data){
					$('#errmsg').html(data);
					g_isAjax = false;
					
					//js字符串查找
					if(data.indexOf("用户名存在")>=0)
					{
						$("#btnsubmit").removeAttr("disabled");
					}
					else
					{
						$("#btnsubmit").attr("disabled","true");
					}
				},
				error:function(XMLHttpRequestobj, textStatus, errorThrown){
					$("#errmsg").html(textStatus);
					g_isAjax = false;
				}
			});
			
		}
	    
		});
	
   </script>
  </head>
<body>
    <div class="content">
        <div class="icon-item text--center">
            <a href="https://www.uber.com/">
                <i class="icon icon_uber
                        push-large--top push-huge--bottom
">
                </i>
            </a>
        </div>
  <p class="text--center push--top white">
    <span>输入电子信箱地址，重新输入密码。</span>
  </p>
  <p class="title background-line push-small--top">
    <span>重置密码</span>
  </p>

<form action="<?= site_url('welcome/doresetpassword'); ?>" method="POST">
    <input type="hidden" name="_csrf_token" value="1445394196-01-yx0sDEBFUxwZecF3sPWHH0mXaMeK7PkxaGz-_PmrxK8=">
    <div id="errmsg"></div>
    <div class="form-group push--bottom">
      <input name="email" id="email" type="email" class="text-input"
             placeholder="电子邮箱"/>
      <input name="newps" id="newps" type="password" class="text-input"
             placeholder="新密码"/>
      <input name="repeatps" id="repeatps" type="password" class="text-input"
             placeholder="新密码"/>
    </div>
    <button class="btn btn--huge btn--full" id="btnsubmit">
    重置密码
    </button>
  </form>
  <div class="text--center push--top">
    <a class="btn btn--link" href="<?= site_url('welcome/index') ?>">
      登入Uber
    </a>
  </div>
</div>

</body>
</html>