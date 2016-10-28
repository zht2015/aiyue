<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>编辑会员组</title>
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
<form method="post" action="/index.php/MomuAdmin/Users/group_add" id="form1">
<!--导航栏-->
<div class="location">
  <a href="/index.php/MomuAdmin/Users/group_list" class="back"><i></i><span>返回列表页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <a href="/index.php/MomuAdmin/Users/group_list"><span>会员组别</span></a>
  <i class="arrow"></i>
  <span>新增组别</span>
</div>
<div class="line10"></div>
<!--/导航栏-->

<!--内容-->
<div id="floatHead" class="content-tab-wrap">
  <div class="content-tab">
    <div class="content-tab-ul-wrap">
      <ul>
        <li><a class="selected" href="javascript:;">基本信息</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="tab-content">
  <dl>
    <dt>组别名称：</dt>
    <dd>
      <input name="txtTitle" type="text" maxlength="100" id="txtTitle" class="input normal" datatype="*1-100" sucmsg=" " minlength="2" />
      <span class="Validform_checktip">*</span>
    </dd>
  </dl>
  <dl>
    <dt>是否隐藏：</dt>
    <dd>
      <div class="rule-single-checkbox">
        <input id="rblIsLock" type="checkbox" name="rblIsLock" />
      </div>
      <span class="Validform_checktip">*隐藏后，用户将无法升级或显示该组别。</span>
    </dd>
  </dl>
  <dl>
    <dt>注册默认会员组：</dt>
    <dd>
      <div class="rule-single-checkbox">
        <input id="rblIsDefault" type="checkbox" name="rblIsDefault" />
      </div>
      <span class="Validform_checktip">*用户注册成功后自动默认为该会员组，如果存在多条，则以等级值最小的为准。</span>
    </dd>
  </dl>
  <dl>
    <dt>参与自动升级：</dt>
    <dd>
      <div class="rule-single-checkbox">
        <input id="rblIsUpgrade" type="checkbox" name="rblIsUpgrade" />
      </div>
      <span class="Validform_checktip">*如果是否，在满足升级条件下系统则不会自动升级为该会员组。</span>
    </dd>
  </dl>
  <dl>
    <dt>等级值：</dt>
    <dd>
      <input name="txtGrade" type="text" id="txtGrade" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">*升级顺序，取值范围1-100，等级值越大，会员等级越高。</span>
    </dd>
  </dl>
  <dl>
    <dt>升级所需积分：</dt>
    <dd>
      <input name="txtUpgradeExp" type="text" id="txtUpgradeExp" class="input small" datatype="/^-?\d+$/" sucmsg=" " />
      <span class="Validform_checktip">*自动升级所需要的积分。</span>
    </dd>
  </dl>
  <dl>
    <dt>初始金额：</dt>
    <dd>
      <input name="txtAmount" type="text" id="txtAmount" class="input small" datatype="/^-?(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/" sucmsg=" " />
      <span class="Validform_checktip">*自动到该会员组赠送的金额，负数则扣减。</span>
    </dd>
  </dl>
  <dl>
    <dt>初始积分：</dt>
    <dd>
      <input name="txtPoint" type="text" id="txtPoint" class="input small" datatype="/^-?\d+$/" sucmsg=" " />
      <span class="Validform_checktip">*自动到该会员组赠送的积分，负数则扣减。</span>
    </dd>
  </dl>
  <dl>
    <dt>购物折扣：</dt>
    <dd>
      <input name="txtDiscount" type="text" id="txtDiscount" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">*购物享受的折扣，取值范围：1-100。</span>
    </dd>
  </dl>
</div>
<!--/内容-->

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