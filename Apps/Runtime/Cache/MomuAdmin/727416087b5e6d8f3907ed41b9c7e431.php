<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>编辑会员</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/datepicker/WdatePicker.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/webuploader/webuploader.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/uploader.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
    $(function () {
        //初始化表单验证
        $("#form1").initValidform();
        //初始化上传控件
        $(".upload-img").InitUploader({ sendurl: "<?php echo U('UploadJson/uploadImg');?>", swf: "/Public/Admin/scripts/webuploader/uploader.swf" });
    });
</script>
</head>

<body class="mainbody">
<form method="post" action="/index.php/MomuAdmin/Users/user_add" id="form1">

<!--导航栏-->
<div class="location">
  <a href="/index.php/MomuAdmin/Users/user_list" class="back"><i></i><span>返回列表页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <a href=""><span>会员管理</span></a>
  <i class="arrow"></i>
  <span>新增会员</span>
</div>
<div class="line10"></div>
<!--/导航栏-->

<!--内容-->
<div id="floatHead" class="content-tab-wrap">
  <div class="content-tab">
    <div class="content-tab-ul-wrap">
      <ul>
        <li><a class="selected" href="javascript:;">基本资料</a></li>
        <li><a href="javascript:;">账户信息</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="tab-content">
  <dl>
    <dt>所属组别</dt>
    <dd>
      <div class="rule-single-select">
        <select name="ddlGroupId" id="ddlGroupId" datatype="*" errormsg="请选择组别" sucmsg=" ">
		<option value="">请选择组别...</option>
		<?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

</select>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>用户状态</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="rblStatus">
        	<input id="rblStatus_0" type="radio" name="rblStatus" value="0" checked="checked" />
        	<label for="rblStatus_0">正常</label>
        	<input id="rblStatus_1" type="radio" name="rblStatus" value="1" />
        	<label for="rblStatus_1">待验证</label>
        	<input id="rblStatus_2" type="radio" name="rblStatus" value="2" />
        	<label for="rblStatus_2">待审核</label>
        	<input id="rblStatus_3" type="radio" name="rblStatus" value="3" />
        	<label for="rblStatus_3">禁用</label>
        </span>
      </div>
      <span class="Validform_checktip">*禁用账户无法登录</span>
    </dd>
  </dl>
  <dl>
    <dt>用户名</dt>
    <dd><input name="txtUserName" type="text" id="txtUserName" class="input normal" datatype="*2-100" sucmsg=" " /> <span class="Validform_checktip">*登录的用户名，支持中文</span></dd>
  </dl> 
  <dl>
    <dt>登录密码</dt>
    <dd><input name="txtPassword" type="password" id="txtPassword" class="input normal" datatype="*6-20" nullmsg="请设置密码" errormsg="密码范围在6-20位之间" sucmsg=" " /> <span class="Validform_checktip">*登录的密码，至少6位</span></dd>
  </dl>
  <dl>
    <dt>确认密码</dt>
    <dd><input name="txtPassword1" type="password" id="txtPassword1" class="input normal" datatype="*" recheck="txtPassword" nullmsg="请再输入一次密码" errormsg="两次输入的密码不一致" sucmsg=" " /> <span class="Validform_checktip">*再次输入密码</span></dd>
  </dl>
  <dl>
    <dt>邮箱账号</dt>
    <dd><input name="txtEmail" type="text" id="txtEmail" class="input normal" datatype="*0-50" sucmsg=" " /> <span class="Validform_checktip">*取回密码时用到</span></dd>
  </dl>
  <dl>
    <dt>用户昵称</dt>
    <dd><input name="txtNickName" type="text" id="txtNickName" class="input normal" /></dd>
  </dl>
  <dl>
    <dt>上传头像</dt>
    <dd>
      <input name="txtAvatar" type="text" id="txtAvatar" class="input normal upload-path" />
      <div class="upload-box upload-img"></div>
    </dd>
  </dl>
  <dl>
    <dt>用户性别</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="rblSex"><input id="rblSex_0" type="radio" name="rblSex" value="保密" checked="checked" /><label for="rblSex_0">保密</label><input id="rblSex_1" type="radio" name="rblSex" value="男" /><label for="rblSex_1">男</label><input id="rblSex_2" type="radio" name="rblSex" value="女" /><label for="rblSex_2">女</label></span>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>生日日期</dt>
    <dd>
      <input name="txtBirthday" type="text" id="txtBirthday" class="input rule-date-input" onfocus="WdatePicker({dateFmt:&#39;yyyy-MM-dd&#39;})" datatype="/^\s*$|^\d{4}\-\d{1,2}\-\d{1,2}$/" errormsg="请选择正确的日期" sucmsg=" " />
    </dd>
  </dl>
  <dl>
    <dt>手机号码</dt>
    <dd><input name="txtMobile" type="text" id="txtMobile" class="input normal" /></dd>
  </dl>
  <dl>
    <dt>电话号码</dt>
    <dd><input name="txtTelphone" type="text" id="txtTelphone" class="input normal" /></dd>
  </dl>
  <dl>
    <dt>QQ号码</dt>
    <dd><input name="txtQQ" type="text" id="txtQQ" class="input normal" /></dd>
  </dl>
  <dl>
    <dt>MSN</dt>
    <dd><input name="txtMsn" type="text" id="txtMsn" class="input normal" /></dd>
  </dl>
  <dl>
    <dt>通讯地址</dt>
    <dd><input name="txtAddress" type="text" id="txtAddress" class="input normal" /></dd>
  </dl>
</div>

<div class="tab-content" style="display:none;">
  <dl>
    <dt>账户金额</dt>
    <dd>
      <input name="txtAmount" type="text" value="0" id="txtAmount" class="input small" datatype="/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/" sucmsg=" " /> 元
      <span class="Validform_checktip">*账户上的余额</span>
    </dd>
  </dl>
  <dl>
    <dt>账户积分</dt>
    <dd>
      <input name="txtPoint" type="text" value="0" id="txtPoint" class="input small" datatype="n" sucmsg=" " /> 分
      <span class="Validform_checktip">*积分也可做为交易</span>
    </dd>
  </dl>
  <dl>
    <dt>升级经验值</dt>
    <dd>
      <input name="txtExp" type="text" value="0" id="txtExp" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">*根据积分计算得来，与积分不同的是只增不减</span>
    </dd>
  </dl>
  <dl>
    <dt>注册时间</dt>
    <dd><span id="lblRegTime">-</span></dd>
  </dl>
  <dl>
    <dt>注册IP</dt>
    <dd><span id="lblRegIP">-</span></dd>
  </dl>
  <dl>
    <dt>最近登录时间</dt>
    <dd><span id="lblLastTime">-</span></dd>
  </dl>
  <dl>
    <dt>最近登录IP</dt>
    <dd><span id="lblLastIP">-</span></dd>
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