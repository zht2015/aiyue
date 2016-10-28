<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>短信通知</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/scripts/jquery/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
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
<form method="post" action="" id="form1">
<div>
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}

function changeUrl(){
	window.location.href="/index.php/MomuAdmin/Users/user_sms/type/hand";
}
//]]>
</script>

<!--导航栏-->
<div class="location">
  <a href="javascript:history.back(-1);" class="back"><i></i><span>返回上一页</span></a>
  <a href="../center.aspx" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <a href="user_list.aspx"><span>会员管理</span></a>
  <i class="arrow"></i>
  <span>短信通知</span>
</div>
<div class="line10"></div>
<!--/导航栏-->

<!--内容-->
<div id="floatHead" class="content-tab-wrap">
  <div class="content-tab">
    <div class="content-tab-ul-wrap">
      <ul>
        <li><a class="selected" href="javascript:;">批量短信通知</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="tab-content">
  <dl>
    <dt>输入类型</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="rblSmsType">
        	<input id="rblSmsType_0" type="radio" name="rblSmsType" value="1" onclick="changeUrl();" />
        	<label for="rblSmsType_0">手动输入</label>
        	<input id="rblSmsType_1" type="radio" name="rblSmsType" value="2" checked="checked" />
        	<label for="rblSmsType_1">批量通知</label>
        </span>
      </div>
    </dd>
  </dl>
  <dl id="div_group">
    <dt>会员组别</dt>
    <dd>
      <div class="rule-multi-porp">
        <span id="cblGroupId">
        	<input id="cblGroupId_0" type="checkbox" name="cblGroupId$0" value="1" />
        	<label for="cblGroupId_0">注册会员</label>
        	<input id="cblGroupId_1" type="checkbox" name="cblGroupId$1" value="2" />
        	<label for="cblGroupId_1">高级会员</label>
        	<input id="cblGroupId_2" type="checkbox" name="cblGroupId$2" value="3" />
        	<label for="cblGroupId_2">中级会员</label>
        	<input id="cblGroupId_3" type="checkbox" name="cblGroupId$3" value="4" />
        	<label for="cblGroupId_3">钻石会员</label>
        </span>
      </div>
    </dd>
  </dl>
  
  <dl>
    <dt>短信内容</dt>
    <dd>
      <textarea name="txtSmsContent" rows="2" cols="20" id="txtSmsContent" class="input" datatype="*" tip="长短信按62个字符每条短信扣取" nullmsg="请填写短信内容！" onkeydown="checktxt(this, &#39;txtTip&#39;);" onkeyup="checktxt(this, &#39;txtTip&#39;);" style="padding:0;width:98%;height:150px;">
</textarea>
      <div class="clear"></div>
      <span id="txtTip"></span>
      <span class="Validform_checktip">*长短信按62个字符每条短信扣取</span>
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