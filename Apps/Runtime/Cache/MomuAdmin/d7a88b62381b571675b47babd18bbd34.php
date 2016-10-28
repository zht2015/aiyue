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
<form method="post" action="/index.php/MomuAdmin/Settings/sys_config" id="form1">

<!--导航栏-->
<div class="location">
  <a href="javascript:history.back(-1);" class="back"><i></i><span>返回上一页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <span>系统参数设置</span>
</div>
<div class="line10"></div>
<!--/导航栏-->

<!--内容-->
<div id="floatHead" class="content-tab-wrap">
  <div class="content-tab">
    <div class="content-tab-ul-wrap">
      <ul>
        <li><a class="selected" href="javascript:;">系统基本信息</a></li>
       <!--  <li><a href="javascript:;">功能权限设置</a></li> -->
        <li><a href="javascript:;">短信平台设置</a></li>
        <li><a href="javascript:;">邮件发送设置</a></li>
        <li><a href="javascript:;">文件上传设置</a></li>
      </ul>
    </div>
  </div>
</div>

<!--主站基本信息-->
<div class="tab-content">
  <dl>
    <dt>主站名称</dt>
    <dd>
      <input name="webname" type="text" value="<?php echo ($edata['webname']); ?>" id="webname" class="input normal" datatype="*2-255" sucmsg=" " />
      <span class="Validform_checktip">*任意字符，控制在255个字符内</span>
    </dd>
  </dl>
  <dl>
    <dt>主站域名</dt>
    <dd>
      <input name="weburl" type="text" value="<?php echo ($edata['weburl']); ?>" id="weburl" class="input normal" datatype="url" sucmsg=" " />
      <span class="Validform_checktip">*以“http://”开头，不能绑定到频道分类</span>
    </dd>
  </dl>
  <dl>
    <dt>公司名称</dt>
    <dd>
      <input name="webcompany" type="text" value="<?php echo ($edata['webcompany']); ?>" id="webcompany" class="input normal" />
    </dd>
  </dl>
  <dl>
    <dt>通讯地址</dt>
    <dd>
      <input name="webaddress" type="text" value="<?php echo ($edata['webaddress']); ?>" id="webaddress" class="input normal" />
    </dd>
  </dl>
  <dl>
    <dt>客服电话</dt>
    <dd>
      <input name="webtel" type="text" value="<?php echo ($edata['webtel']); ?>" id="webtel" class="input normal" />
      <span class="Validform_checktip">*非必填，区号+电话号码</span>
    </dd>
  </dl>
  <dl>
    <dt>传真号码</dt>
    <dd>
      <input name="webfax" type="text" value="<?php echo ($edata['webfax']); ?>" id="webfax" class="input normal" />
      <span class="Validform_checktip">*非必填，区号+传真号码</span>
    </dd>
  </dl>
  <dl>
    <dt>管理员邮箱</dt>
    <dd>
      <input name="webmail" type="text" value="<?php echo ($edata['webmail']); ?>" id="webmail" class="input normal" />
    </dd>
  </dl>
  <dl>
    <dt>主站备案号</dt>
    <dd>
      <input name="webcrod" value="<?php echo ($edata['webcrod']); ?>" type="text" id="webcrod" class="input normal" />
    </dd>
  </dl>
    <dl>
    <dt>主站地址</dt>
    <dd>
      <input name="rootpth" type="text" value="<?php echo ($edata['rootpth']); ?>" id="rootpth" class="input normal" />
    </dd>
  </dl>
</div>
<!--/网站基本信息-->


<!--功能权限设置-->

<!-- <div class="tab-content" style="display:none">
  <dl>
    <dt>网站安装目录</dt>
    <dd>
      <input name="webpath" type="text" value="/" id="webpath" class="input txt" datatype="*1-100" sucmsg=" " />
      <span class="Validform_checktip">*根目录输入“/”，其它输入“/目录名/”</span>
    </dd>
  </dl>
  <dl>
    <dt>后台管理目录</dt>
    <dd>
      <input name="webmanagepath" type="text" value="admin" id="webmanagepath" class="input txt" datatype="*1-100" sucmsg=" " />
      <span class="Validform_checktip">*默认admin，其它请输入目录名，否则无法进入后台</span>
    </dd>
  </dl>
  <dl>
    <dt>URL重写开关</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="staticstatus"><input id="staticstatus_0" type="radio" name="staticstatus" value="0" /><label for="staticstatus_0">关闭</label><input id="staticstatus_1" type="radio" name="staticstatus" value="1" /><label for="staticstatus_1">伪URL重写</label><input id="staticstatus_2" type="radio" name="staticstatus" value="2" checked="checked" /><label for="staticstatus_2">生成静态</label></span>
      </div>
      <span class="Validform_checktip">*URL配置规则，点击这里查看说明</span>
    </dd>
  </dl>
  <dl>
    <dt>静态URL后缀</dt>
    <dd>
      <input name="staticextension" type="text" value="html" id="staticextension" class="input small" datatype="*1-100" sucmsg=" " />
      <span class="Validform_checktip">*扩展名，不包括“.”，访问或生成时将会替换此值，如：aspx、html</span>
    </dd>
  </dl>
  <dl>
    <dt>开启会员功能</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="memberstatus" type="checkbox" name="memberstatus" checked="checked" />
      </div>
      <span class="Validform_checktip">*关闭后关联会员的内容将失效</span>
    </dd>
  </dl>
  <dl>
    <dt>开启评论审核</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="commentstatus" type="checkbox" name="commentstatus" />
      </div>
      <span class="Validform_checktip">*开启后评论将会审核才显示</span>
    </dd>
  </dl>
  <dl>
    <dt>开启管理日志</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="logstatus" type="checkbox" name="logstatus" />
      </div>
      <span class="Validform_checktip">*开启后将会记录管理员在后台的操作日志</span>
    </dd>
  </dl>
  <dl>
    <dt>是否开启网站</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="webstatus" type="checkbox" name="webstatus" checked="checked" />
      </div>
      <span class="Validform_checktip">*关闭后网站前台将不能访问</span>
    </dd>
  </dl>
  <dl>
    <dt>网站关闭原因</dt>
    <dd>
      <textarea name="webclosereason" rows="2" cols="20" id="webclosereason" class="input">
网站正在维护中，请稍候访问……</textarea>
      <span class="Validform_checktip">支持HTML</span>
    </dd>
  </dl>
  <dl>
    <dt>网站统计代码</dt>
    <dd>
      <textarea name="webcountcode" rows="2" cols="20" id="webcountcode" class="input">
&lt;script src=&quot;http://s24.cnzz.com/stat.php?id=1996164&amp;web_id=1996164&amp;show=pic&quot; language=&quot;JavaScript&quot;&gt;&lt;/script&gt;</textarea>
      <span class="Validform_checktip">支持HTML</span>
    </dd>
  </dl>
</div> -->
<!--/功能权限设置-->

<!--手机短信设置-->
<div class="tab-content" style="display:none">
  <!-- <dl>
    <dt>短信剩余数量</dt>
    <dd>
      <span id="labSmsCount">0 条</span>
      <span class="Validform_checktip">尚未申请？<a href="http://sms.dtcms.net" target="_blank">请点击这里注册</a></span>
    </dd>
  </dl> -->
  <dl>
    <dt>短信API地址</dt>
    <dd>
      <input name="smsapiurl" type="text" value="<?php echo ($edata['smsapiurl']); ?>" id="smsapiurl" class="input normal" />
      <span class="Validform_checktip">*以“http://”开头</span>
    </dd>
  </dl>
  <dl>
    <dt>平台登录账户</dt>
    <dd>
      <input name="smsusername" type="text" value="<?php echo ($edata['smsusername']); ?>" id="smsusername" class="input txt" />
      <span class="Validform_checktip">*短信平台注册的用户名</span>
    </dd>
  </dl>
  <dl>
    <dt>平台登录密码</dt>
    <dd>
      <input name="smspassword" type="password" id="smspassword" class="input txt" value="<?php echo ($edata['smspassword']); ?>" />
      <span class="Validform_checktip">*短信平台注册的密码</span>
    </dd>
  </dl>
  <!-- <dl>
    <dt>短信平台说明</dt>
    <dd>
      请不要使用系统默认账户test，因为它是公用的测试账号；<br />
      请在短信平台修改账户资料中绑定签名方可使用短信功能；<br />
      如果您尚未申请开通，<a href="http://sms.dtcms.net" target="_blank">请点击这里注册</a>成功后填写您的用户名和密码均可正常使用。
    </dd>
  </dl> -->
</div>
<!--/手机短信设置-->

<!--邮件发送设置-->
<div class="tab-content" style="display:none">
  <dl>
    <dt>SMTP服务器</dt>
    <dd>
      <input name="emailsmtp" type="text" value="<?php echo ($edata['emailsmtp']); ?>" id="emailsmtp" class="input normal" datatype="*0-100" sucmsg=" " />
      <span class="Validform_checktip">*发送邮件的SMTP服务器地址</span>
    </dd>
  </dl>
  <dl>
    <dt>SSL加密连接</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="emailssl" type="checkbox" name="emailssl" <?php if(($edata['emailssl']) == "0"): ?>checked<?php endif; ?> />
      </div>
      <span class="Validform_checktip">*是否启用SSL加密连接</span>
    </dd>
  </dl>
  <dl>
    <dt>SMTP端口</dt>
    <dd>
      <input name="emailport" type="text" value="<?php echo ($edata['emailport']); ?>" id="emailport" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">*SMTP服务器的端口，大部分服务商都支持25端口</span>
    </dd>
  </dl>
  <dl>
    <dt>发件人地址</dt>
    <dd>
      <input name="emailfrom" type="text" value="<?php echo ($edata['emailfrom']); ?>" id="emailfrom" class="input normal" datatype="e" sucmsg=" " />
      <span class="Validform_checktip">*发件人的邮箱地址</span>
    </dd>
  </dl>
  <dl>
    <dt>邮箱账号</dt>
    <dd>
      <input name="emailusername" type="text" value="<?php echo ($edata['emailusername']); ?>" id="emailusername" class="input normal" datatype="*0-100" sucmsg=" " />
      <span class="Validform_checktip">*</span>
    </dd>
  </dl>
  <dl>
    <dt>邮箱密码</dt>
    <dd>
      <input name="emailpassword" type="password" id="emailpassword" class="input normal" datatype="*0-100" sucmsg=" " value="<?php echo ($edata['emailpassword']); ?>" />
      <span class="Validform_checktip">*</span>
    </dd>
  </dl>
  <dl>
    <dt>发件人昵称</dt>
    <dd>
      <input name="emailnickname" type="text" value="<?php echo ($edata['emailnickname']); ?>" id="emailnickname" class="input normal" datatype="*0-50" sucmsg=" " />
      <span class="Validform_checktip">*对方收到邮件时显示的昵称</span>
    </dd>
  </dl>
</div>
<!--/邮件发送设置-->

<!--上传配置-->
<div class="tab-content" style="display:none">
  <!-- <dl>
    <dt>文件上传目录</dt>
    <dd>
      <input name="filepath" type="text" value="upload" id="filepath" class="input txt" datatype="*2-100" sucmsg=" " />
      <span class="Validform_checktip">*文件保存的目录名，自动创建根目录下</span>
    </dd>
  </dl>
  <dl>
    <dt>文件保存方式</dt>
    <dd>
      <div class="rule-single-select">
        <select name="filesave" id="filesave" datatype="*" sucmsg=" ">
	<option value="1">按年月日每天一个目录</option>
	<option selected="selected" value="2">按年月/日/存入不同目录</option>

</select>
      </div>
    </dd>
  </dl> -->
  <dl>
    <dt>文件上传类型</dt>
    <dd>
      <input name="fileextension" type="text" value="<?php echo ($edata['fileextension']); ?>" id="fileextension" class="input normal" datatype="*1-500" sucmsg=" " />
      <span class="Validform_checktip">*以英文的逗号分隔开，如：“zip,rar”</span>
    </dd>
  </dl>
  <dl>
    <dt>视频上传类型</dt>
    <dd>
      <input name="videoextension" type="text" value="<?php echo ($edata['videoextension']); ?>" id="videoextension" class="input normal" datatype="*1-500" sucmsg=" " />
      <span class="Validform_checktip">*以英文的逗号分隔开，如：“mp4,flv”</span>
    </dd>
  </dl>
  <dl>
    <dt>附件上传大小</dt>
    <dd>
      <input name="attachsize" type="text" value="<?php echo ($edata['attachsize']); ?>" id="attachsize" class="input small" datatype="n" sucmsg=" " /> KB
      <span class="Validform_checktip">*超过设定的文件大小不予上传</span>
    </dd>
  </dl>
  <dl>
    <dt>视频上传大小</dt>
    <dd>
      <input name="videosize" type="text" value="<?php echo ($edata['videosize']); ?>" id="videosize" class="input small" datatype="n" sucmsg=" " /> KB
      <span class="Validform_checktip">*超过设定的文件大小不予上传</span>
    </dd>
  </dl>
<dl>
    <dt>图片上传大小</dt>
    <dd>
      <input name="imgsize" type="text" value="<?php echo ($edata['imgsize']); ?>" id="imgsize" class="input small" datatype="n" sucmsg=" " /> KB
      <span class="Validform_checktip">*超过设定的图片大小不予上传</span>
    </dd>
  </dl> 
  <dl>
    <dt>图片最大尺寸</dt>
    <dd>
      <input name="imgmaxheight" type="text" value="<?php echo ($edata['imgmaxheight']); ?>" id="imgmaxheight" class="input small" datatype="n" sucmsg=" " /> ×
      <input name="imgmaxwidth" type="text" value="<?php echo ($edata['imgmaxwidth']); ?>" id="imgmaxwidth" class="input small" datatype="n" sucmsg=" " /> px
      <span class="Validform_checktip">*左边高度，右边宽度，超出自动裁剪</span>
    </dd>
  </dl>
  <dl>
    <dt>缩略图生成尺寸</dt>
    <dd>
      <input name="thumbnailheight" type="text" value="<?php echo ($edata['thumbnailheight']); ?>" id="thumbnailheight" class="input small" datatype="n" sucmsg=" " /> ×
      <input name="thumbnailwidth" type="text" value="<?php echo ($edata['thumbnailwidth']); ?>" id="thumbnailwidth" class="input small" datatype="n" sucmsg=" " /> px
      <span class="Validform_checktip">*左边高度，右边宽度</span>
    </dd>
  </dl>
  <dl>
    <dt>图片水印类型</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="watermarktype">
	        <input id="watermarktype_0" type="radio" name="watermarktype" value="0" <?php if(($edata['watermarktype']) == "0"): ?>checked<?php endif; ?> />
	        <label for="watermarktype_0">关闭水印</label>
	        <input id="watermarktype_1" type="radio" name="watermarktype" value="2" <?php if(($edata['watermarktype']) == "2"): ?>checked<?php endif; ?> />
	        <label for="watermarktype_1">文字水印</label>
	        <input id="watermarktype_2" type="radio" name="watermarktype" value="3" <?php if(($edata['watermarktype']) == "3"): ?>checked<?php endif; ?> />
	        <label for="watermarktype_2">图片水印</label>
        </span>
      </div>
    </dd>
  </dl>
  <!-- <dl>
    <dt>图片水印位置</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="watermarkposition"><input id="watermarkposition_0" type="radio" name="watermarkposition" value="1" /><label for="watermarkposition_0">左上</label><input id="watermarkposition_1" type="radio" name="watermarkposition" value="2" /><label for="watermarkposition_1">中上</label><input id="watermarkposition_2" type="radio" name="watermarkposition" value="3" /><label for="watermarkposition_2">右上</label><input id="watermarkposition_3" type="radio" name="watermarkposition" value="4" /><label for="watermarkposition_3">左中</label><input id="watermarkposition_4" type="radio" name="watermarkposition" value="5" /><label for="watermarkposition_4">居中</label><input id="watermarkposition_5" type="radio" name="watermarkposition" value="6" /><label for="watermarkposition_5">右中</label><input id="watermarkposition_6" type="radio" name="watermarkposition" value="7" /><label for="watermarkposition_6">左下</label><input id="watermarkposition_7" type="radio" name="watermarkposition" value="8" /><label for="watermarkposition_7">中下</label><input id="watermarkposition_8" type="radio" name="watermarkposition" value="9" checked="checked" /><label for="watermarkposition_8">右下</label></span>
      </div>
    </dd>
  </dl> -->
  <!-- <dl>
    <dt>图片生成质量</dt>
    <dd>
      <input name="watermarkimgquality" type="text" value="80" id="watermarkimgquality" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">*只适用于加水印的jpeg格式图片.取值范围 0-100, 0质量最低, 100质量最高, 默认80</span>
    </dd>
  </dl> -->
  <dl>
    <dt>图片水印文件</dt>
    <dd>
      <input name="watermarkpic" type="text" readOnly value="watermark.png" id="watermarkpic" class="input txt"  />
      <span class="">*需存放在站点目录下 /public/Admin/waterImg/watermark.png</span>
    </dd>
  </dl>
  <!-- <dl>
    <dt>水印透明度</dt>
    <dd>
      <input name="watermarktransparency" type="text" value="5" id="watermarktransparency" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">*取值范围1--10 (10为不透明)</span>
    </dd>
  </dl> -->
  <dl>
    <dt>水印文字</dt>
    <dd>
      <input name="watermarktext" type="text" value="<?php echo ($edata['watermarktext']); ?>" id="watermarktext" class="input txt" datatype="s2-100" sucmsg=" " />
      <span class="Validform_checktip">*文字水印的内容</span>
    </dd>
  </dl>
  <dl>
    <dt>文字水印大小</dt>
    <dd>
      <input name="watermarkfontsize" type="text" value="<?php echo ($edata['watermarkfontsize']); ?>" id="watermarkfontsize" class="input small" datatype="n" sucmsg=" " /> px
    </dd>
  </dl>
</div>
<!--/上传配置-->

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