<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>编辑后台导航</title>
  <link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
  <link href="/Public/Admin/skin/default/stylechannel.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
  <script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/Validform_v5.3.2_min.js"></script>
  <script type="text/javascript" src="/Public/Admin/scripts/webuploader/webuploader.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/uploader.js"></script>
  <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
  <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/commonchannel.js"></script>
<script type="text/javascript">
$(function () {
    //初始化表单验证
    $("#form1").initValidform();
    //初始化上传控件
    $(".upload-img").InitUploader({ filesize: "102400", sendurl: "<?php echo U('UploadJson/uploadImg');?>", swf: "/Public/Admin/scripts/webuploader/uploader.swf", filetypes: "gif,jpg,png,bmp,rar,zip,doc,xls,txt,mov" });
});
</script>
</head>

<body class="mainbody">
<form method="post" action="<?php echo U('Settings/nav_edit');?>" id="form1">
<!--导航栏-->
<div class="location">
  <a href="nav_list.aspx" class="back"><i></i><span>返回列表页</span></a>
  <a href="../center.aspx" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <a href="nav_list.aspx"><span>导航列表</span></a>
  <i class="arrow"></i>
  <span>编辑后台导航</span>
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
    <dt>上级导航</dt>
    <dd>
      <div class="rule-single-select">
        <select name="parent_id" id="ddlParentId">
           <option value="0">无父级导航</option>
            <!--<?php if(is_array($nav_list)): foreach($nav_list as $key=>$v): ?>-->
              <option value="<?php echo ($key); ?>" <?php if($key == $info['parent_id']): ?>selected<?php endif; ?>><?php echo ($v); ?></option>
            <!--<?php endforeach; endif; ?>-->
        </select>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>排序数字</dt>
    <dd>
      <input name="sort_id" type="text" value="99" id="txtSortId" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">*数字，越小越向前</span>
    </dd>
  </dl>
  <dl>
    <dt>是否隐藏</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="cbIsLock" type="checkbox" name="is_lock"<?php if($info['is_lock'] == 0): ?>checked<?php endif; ?>/>
      </div>
      <span class="Validform_checktip">*隐藏后不显示在界面导航菜单中。</span>
    </dd>
  </dl>
  <dl>
    <dt>是否系统默认</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="cbIsSys" type="checkbox" name="is_sys"<?php if($info['is_sys'] == 0): ?>checked<?php endif; ?>/>
      </div>
      <span class="Validform_checktip"></span>
    </dd>
  </dl>
  <dl>
    <dt>调用别名</dt>
    <dd>
      <input name="name" type="text" id="txtName" class="input normal" datatype="/^[a-zA-Z0-9\-\_]{2,50}$/" errormsg="请填写正确的ID" sucmsg="" value="<?php echo ($info['name']); ?>"/>
      <span class="Validform_checktip">权限控制名称，只允许字母、数字、下划线</span>
    </dd>
  </dl>
  <dl>
    <dt>导航标题</dt>
    <dd><input name="title" type="text" id="txtTitle" class="input normal" datatype="*1-100" sucmsg=" " value="<?php echo ($info['title']); ?>"/> 
      <span class="Validform_checktip">*导航中文标题，100字符内</span>
    </dd>
  </dl>
  <dl>
    <dt>副标题</dt>
    <dd>
      <input name="sub_title" type="text" id="txtSubTitle" class="input normal" datatype="*0-100" sucmsg=" "value="<?php echo ($info['sub_title']); ?>"/>
      <span class="Validform_checktip">非必填，当导航拥有两个名称时使用</span>
    </dd>
  </dl>
  <dl>
    <dt>自定义图标</dt>
    <dd>
      <input name="icon_url" type="text" maxlength="255" id="txtIconUrl" class="input normal upload-path" value="<?php echo ($info['icon_url']); ?>"/>
      <div class="upload-box upload-img"></div>
    </dd>
  </dl>
  <dl>
    <dt>链接地址</dt>
    <dd>
      <input name="link_url" type="text" maxlength="255" id="txtLinkUrl" class="input normal" value="<?php echo ($info['link_url']); ?>" />
      <span class="Validform_checktip">当前管理目录，有子导航不用填</span>
    </dd>
  </dl>
  <dl>
    <dt>备注说明</dt>
    <dd>
      <textarea name="remark" rows="2" cols="20" id="txtRemark" class="input"><?php echo ($info['remark']); ?></textarea>
      <span class="Validform_checktip">非必填，可为空</span>
    </dd>
  </dl>
  <dl>
    <dt>权限资源</dt>
  <dd>
      <div class="rule-multi-porp">
        <span id="cblActionType">
          <input id="cblActionType_0" type="checkbox" name="action_type[]" <?php echo (isPowerCheck($info['id'],"Show")); ?> value="Show" />
          <label for="cblActionType_0">显示(Show)</label>
          <input id="cblActionType_1" type="checkbox" name="action_type[]" <?php echo (isPowerCheck($info['id'],"View")); ?> value="View" />
          <label for="cblActionType_1">查看(View)</label>
          <input id="cblActionType_1" type="checkbox" name="action_type[]" <?php echo (isPowerCheck($info['id'],"Add")); ?> value="Add" />
          <label for="cblActionType_2">添加(Add)</label>
          <input id="cblActionType_2" type="checkbox" name="action_type[]" <?php echo (isPowerCheck($info['id'],"Edit")); ?> value="Edit" />
          <label for="cblActionType_3">修改(Edit)</label>
          <input id="cblActionType_3" type="checkbox" name="action_type[]" <?php echo (isPowerCheck($info['id'],"Delete")); ?> value="Delete" />
          <label for="cblActionType_4">删除(Delete)</label>
          <input id="cblActionType_5" type="checkbox" name="action_type[]" <?php echo (isPowerCheck($info['id'],"Audit")); ?> value="Audit" />
          <label for="cblActionType_5">审核(Audit)</label>
          <!-- <input id="cblActionType_6" type="checkbox" name="action_type[]" <?php echo (isPowerCheck($info['id'],"Reply")); ?> value="Reply" />
          <label for="cblActionType_6">回复(Reply)</label>
          <input id="cblActionType_7" type="checkbox" name="action_type[]" <?php echo (isPowerCheck($info['id'],"Confirm")); ?> value="Confirm" />
          <label for="cblActionType_7">确认(Confirm)</label>
          <input id="cblActionType_8" type="checkbox" name="action_type[]" <?php echo (isPowerCheck($info['id'],"Cancel")); ?> value="Cancel" />
          <label for="cblActionType_8">取消(Cancel)</label>
          <input id="cblActionType_9" type="checkbox" name="action_type[]" <?php echo (isPowerCheck($info['id'],"Invalid")); ?> value="Invalid" />
          <label for="cblActionType_9">作废(Invalid)</label> -->
        </span>
      </div>
    </dd>
  </dl>
</div>
<!--/内容-->

<!--工具栏-->
<div class="page-footer">
  <div class="btn-wrap">
    <input type="hidden" name ="id" value="<?php echo ($_GET['id']); ?>"/>
    <input type="submit" name="btnSubmit" value="提交保存" id="btnSubmit" class="btn" />
    <input name="btnReturn" type="button" value="返回上一页" class="btn yellow" onclick="javascript:history.back(-1);" />
  </div>
</div>
<!--/工具栏-->
</form>
</body>
</html>