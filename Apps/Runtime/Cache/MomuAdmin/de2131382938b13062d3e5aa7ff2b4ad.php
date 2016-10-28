<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>管理员登录</title>
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    $(function () {
        //检测IE
        if ('undefined' == typeof (document.body.style.maxHeight)) {
            window.location.href = 'ie6update.html';
        }
    });
</script>
</head>

<body class="loginbody">
<form method="post" action="<?php echo U('Index/index');?>" id="form1">
<div style="width:100%; height:100%; min-width:300px; min-height:260px;"></div>
<div class="login-wrap">
  <div class="login-logo">LOGO</div>
  <div class="login-form">
    <div class="col">
      <input name="txtUserName" type="text" id="txtUserName" class="login-input" placeholder="管理员账号" title="管理员账号" />
      <label class="icon user" for="txtUserName"></label>
    </div>
    <div class="col">
      <input name="txtPassword" type="password" id="txtPassword" class="login-input" placeholder="管理员密码" title="管理员密码" />
      <label class="icon pwd" for="txtPassword"></label>
    </div>
    <div class="col">
      <input type="submit" name="btnSubmit" value="登 录" id="btnSubmit" class="login-btn" />
    </div>
  </div>
  <div class="login-tips"><i></i><p id="msgtip"><?php echo ($msg); ?></p></div>
</div>

<div class="copy-right">
  <p>版权所有 深圳市墨木创意设计网络有限公司 Copyright © 2009 - 2014 woodsj.com Inc. All Rights Reserved.</p>
</div>
</form>
</body>
</html>