
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Uber </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="icon" href="https://d1a3f4spazzrp4.cloudfront.net/login/images/favicon.a767a268b86a6ce7d1099bec4a9e37aa.ico" type="image/x-icon" />
  <link rel="stylesheet" href="https://d1a3f4spazzrp4.cloudfront.net/login/style-login/style.19ed08ba5a21bba499b96dda406062f1.css">
  <link href="https://d1a3f4spazzrp4.cloudfront.net/uber-icons/0.12.0/uber-icons.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://d1a3f4spazzrp4.cloudfront.net/uber-fonts/2.0.1/superfine.css"/>
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
    <span>输入电子信箱地址，我们发送密码重置链接给您。</span>
  </p>
  <p class="title background-line push-small--top">
    <span>忘记密码</span>
  </p>

<form name="forgot-password" action="<?= site_url('welcome/sendpwmail') ?>" method="POST">
    <input type="hidden" name="_csrf_token" value="1445394196-01-yx0sDEBFUxwZecF3sPWHH0mXaMeK7PkxaGz-_PmrxK8=">
    <div class="form-group push--bottom">
      <input name="email" id="email" type="email" class="text-input"
             placeholder="电子邮箱"/>
    </div>
    <button class="btn btn--huge btn--full" type="submit">
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