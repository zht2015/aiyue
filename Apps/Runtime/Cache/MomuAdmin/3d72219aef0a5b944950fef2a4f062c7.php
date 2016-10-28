<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>系统参数设置</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
    $(function () {
        //初始化表单验证
        $("#form1").initValidform();
    });
</script>
</head>

<body class="mainbody">
<form method="post" action="/index.php/MomuAdmin/Users/user_config" id="form1">

<!--导航栏-->
<div class="location">
  <a href="javascript:history.back(-1);" class="back"><i></i><span>返回上一页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <span>会员设置</span>
  <i class="arrow"></i>
  <span>参数设置</span>
</div>
<div class="line10"></div>
<!--/导航栏-->

<!--内容-->
<div id="floatHead" class="content-tab-wrap">
  <div class="content-tab">
    <div class="content-tab-ul-wrap">
      <ul>
        <li><a class="selected" href="javascript:;">基本参数设置</a></li>
        <li><a href="javascript:;">用户积分策略</a></li>
      </ul>
    </div>
  </div>
</div>

<!--用户参数设置-->
<div class="tab-content">
  <dl>
    <dt>新用户注册设置</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="regstatus">
        	<input id="regstatus_0" type="radio" name="regstatus" value="0" <?php if(($d['regstatus']) == "0"): ?>checked<?php endif; ?> />
        	<label for="regstatus_0">关闭注册</label>
        	<input id="regstatus_1" type="radio" name="regstatus" value="1" <?php if(($d['regstatus']) == "1"): ?>checked<?php endif; ?> />
        	<label for="regstatus_1">开放注册</label>
        	<input id="regstatus_2" type="radio" name="regstatus" value="2" <?php if(($d['regstatus']) == "2"): ?>checked<?php endif; ?> />
        	<label for="regstatus_2">手机注册</label>
        	<input id="regstatus_3" type="radio" name="regstatus" value="3" <?php if(($d['regstatus']) == "3"): ?>checked<?php endif; ?> />
        	<label for="regstatus_3">邮箱注册</label>
        	<input id="regstatus_4" type="radio" name="regstatus" value="4" <?php if(($d['regstatus']) == "4"): ?>checked<?php endif; ?> />
        	<label for="regstatus_4">邀请码</label>
        </span>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>新用户注册审核</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="regverify" <?php if(($d['regverify']) == "1"): ?>checked<?php endif; ?> type="checkbox" name="regverify" />
      </div>
      <span class="Validform_checktip">*是否需要人工审核通过后才能登录</span>
    </dd>
  </dl>
  <dl>
    <dt>欢迎短消息类型</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="regmsgstatus">
        	<input id="regmsgstatus_0" type="radio" name="regmsgstatus" value="0" <?php if(($d['regmsgstatus']) == "0"): ?>checked<?php endif; ?> />
        	<label for="regmsgstatus_0">不发送</label>
        	<input id="regmsgstatus_1" type="radio" name="regmsgstatus" value="1" <?php if(($d['regmsgstatus']) == "1"): ?>checked<?php endif; ?> />
        	<label for="regmsgstatus_1">站内消息</label>
        	<input id="regmsgstatus_2" type="radio" name="regmsgstatus" value="2" <?php if(($d['regmsgstatus']) == "2"): ?>checked<?php endif; ?> />
        	<label for="regmsgstatus_2">发送邮件</label>
        	<input id="regmsgstatus_3" type="radio" name="regmsgstatus" value="3" <?php if(($d['regmsgstatus']) == "3"): ?>checked<?php endif; ?> />
        	<label for="regmsgstatus_3">手机短信</label>
        </span>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>欢迎短消息内容</dt>
    <dd>
      <textarea name="regmsgtxt" rows="2" cols="20" id="regmsgtxt" class="input"><?php echo ($d['regmsgtxt']); ?></textarea>
      <span class="Validform_checktip">支持HTML</span>
    </dd>
  </dl>
  <dl>
    <dt>用户名保留关健字</dt>
    <dd>
      <input name="regkeywords" type="text" value="<?php echo ($d['regkeywords']); ?>" id="regkeywords" class="input normal" />
      <span class="Validform_checktip">*以英文逗号“,”分隔开</span>
    </dd>
  </dl>
  <dl>
    <dt>手机验证码有效期</dt>
    <dd>
      <input name="regsmsexpired" type="text" value="<?php echo ($d['regsmsexpired']); ?>" id="regsmsexpired" class="input small" datatype="n" sucmsg=" " /> 分钟
      <span class="Validform_checktip">*新用户手机验证码有效期，整数须大于0</span>
    </dd>
  </dl>
  <dl>
    <dt>邮件验证有效期</dt>
    <dd>
      <input name="regemailexpired" type="text" value="<?php echo ($d['regemailexpired']); ?>" id="regemailexpired" class="input small" datatype="n" sucmsg=" " /> 天
      <span class="Validform_checktip">*新用户注册链接及验证邮件有效期，整数须大于0</span>
    </dd>
  </dl>
  <dl>
    <dt>允许手机登录</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="mobilelogin" <?php if(($d['mobilelogin']) == "1"): ?>checked<?php endif; ?> type="checkbox" name="mobilelogin"  />
      </div>
      <span class="Validform_checktip">*允许手机号码做为登录用户名</span>
    </dd>
  </dl>
  <dl>
    <dt>允许邮箱登录</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="emaillogin" <?php if(($d['emaillogin']) == "1"): ?>checked<?php endif; ?> type="checkbox" name="emaillogin" />
      </div>
      <span class="Validform_checktip">*允许邮箱登录时不能开启同邮箱注册多个用户</span>
    </dd>
  </dl>
  <dl>
    <dt>开启注册协议</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="regrules" <?php if(($d['regrules']) == "1"): ?>checked<?php endif; ?> type="checkbox" name="regrules" />
      </div>
      <span class="Validform_checktip">*开启后，用户必须同意才能注册</span>
    </dd>
  </dl>
  <dl>
    <dt>注册协议内容</dt>
    <dd>
      <textarea name="regrulestxt" rows="2" cols="20" id="regrulestxt" class="input"><?php echo ($d['regrulestxt']); ?></textarea>
      <span class="Validform_checktip">支持HTML</span>
    </dd>
  </dl>
</div>
<!--/用户参数设置-->

<!--用户积分策略-->
<div class="tab-content" style="display:none">
  <dl>
    <dt>邀请码使用期限</dt>
    <dd>
      <input name="invitecodeexpired" type="text" value="<?php echo ($d['invitecodeexpired']); ?>" id="invitecodeexpired" class="input small" datatype="n" sucmsg=" " /> 天
      <span class="Validform_checktip">*邀请码有效天数，不可为0</span>
    </dd>
  </dl>
  <dl>
    <dt>邀请码可使用次数</dt>
    <dd>
      <input name="invitecodecount" type="text" value="<?php echo ($d['invitecodecount']); ?>" id="invitecodecount" class="input small" datatype="n" sucmsg=" " /> 次
      <span class="Validform_checktip">*邀请码使用次数，0为不限制</span>
    </dd>
  </dl>
  <dl>
    <dt>每天申请邀请码数量</dt>
    <dd>
      <input name="invitecodenum" type="text" value="<?php echo ($d['invitecodenum']); ?>" id="invitecodenum" class="input small" datatype="n" sucmsg=" " /> 个
      <span class="Validform_checktip">*每天可申请邀请码数量，0为不限制</span>
    </dd>
  </dl>
  <dl>
    <dt>现金/积分兑换比例</dt>
    <dd>
      <input name="pointcashrate" type="text" value="<?php echo ($d['pointcashrate']); ?>" id="pointcashrate" class="input small" datatype="n" sucmsg=" " /> 个
      <span class="Validform_checktip">*1元等于多少个积分，0为禁用兑换功能</span>
    </dd>
  </dl>
  <dl>
    <dt>邀请注册获得积分</dt>
    <dd>
      <input name="pointinvitenum" type="text" value="<?php echo ($d['pointinvitenum']); ?>" id="pointinvitenum" class="input small" datatype="n" sucmsg=" " /> 分
      <span class="Validform_checktip">*邀请一个注册成功用户所获得的积分</span>
    </dd>
  </dl>
  <dl>
    <dt>每天登录获得积分</dt>
    <dd>
      <input name="pointloginnum" type="text" value="<?php echo ($d['pointloginnum']); ?>" id="pointloginnum" class="input small" datatype="n" sucmsg=" " /> 分
      <span class="Validform_checktip">*会员每天登录获得的积分，一天只赠送一次</span>
    </dd>
  </dl>
</div>
<!--/用户积分策略-->

<!--内容-->

<!--工具栏-->
<div class="page-footer">
  <div class="btn-wrap">
    <input type="submit" name="btnSubmit" value="提交保存" id="btnSubmit" class="btn" />
    <input name="btnReturn" type="button" value="返回上一页" class="btn yellow" onclick="javascript:history.back(-1);" />
  </div>
</div>
<!--/工具栏-->
</form>
</body>
</html>