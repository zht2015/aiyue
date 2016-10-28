<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>编辑频道</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/stylechannel.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/scripts/jquery/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/commonchannel.js"></script>
</head>

<body class="mainbody">
<form method="get" action="/index.php/MomuAdmin/Channel/save_channel" id="form1">
<input type='hidden' name='eid' value="<?php echo ($data["id"]); ?>" /> 
<input type='hidden' name='tabtype' value="<?php echo ($data['site_id']); ?>" /> 
<!--导航栏-->
<div class="location">
  <a href="/index.php/MomuAdmin/Channel/channel_list" class="back"><i></i><span>返回列表页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <a href="/index.php/MomuAdmin/Channel/channel_list"><span>频道管理</span></a>
  <i class="arrow"></i>
  <span>新增</span>
</div>
<div class="line10"></div>
<!--/导航栏-->

<!--内容-->
<div id="floatHead" class="content-tab-wrap">
  <div class="content-tab">
    <div class="content-tab-ul-wrap">
      <ul>
        <li><a class="selected" href="javascript:;">基本信息</a></li>
       <!--  <li><a href="javascript:;">URL配置</a></li> -->
      </ul>
    </div>
  </div>
</div>

<div class="tab-content">
	<?php if(empty($tabid)): ?><dl>
	    <dt>所属栏目</dt>
	    <dd>
	      <div class="rule-single-select">
	        <select disabled name="ddlSiteId" id="ddlSiteId" onchange="getChannelCoums();" datatype="*" errormsg="请选择所属站点！" sucmsg=" ">
				<option value="">请选择所属栏目</option>
				<option <?php if($data['site_id'] == '1'): ?>selected<?php endif; ?> value="1">新闻</option>
				<option <?php if($data['site_id'] == '2'): ?>selected<?php endif; ?> value="2">广告</option>
				<option <?php if($data['site_id'] == '3'): ?>selected<?php endif; ?> value="3">商城</option>
				<!-- <option <?php if($data['site_id'] == '4'): ?>selected<?php endif; ?> value="4">财务</option> -->
			</select>
	      </div>
	    </dd>
	  </dl>
	<?php else: ?>
		<dl>
	    <dt>所属栏目</dt>
	    <dd>
	      <div class="rule-single-select">
	        <select disabled name="ddlSiteId" id="ddlSiteId" onchange="getChannelCoums();" datatype="*" errormsg="请选择所属站点！" sucmsg=" ">
				<option value="">请选择所属栏目</option>
				<option <?php if($tabid == '1'): ?>selected<?php endif; ?> value="1">新闻</option>
				<option <?php if($tabid == '2'): ?>selected<?php endif; ?> value="2">广告</option>
				<option <?php if($tabid == '3'): ?>selected<?php endif; ?> value="3">商城</option>
				<!-- <option <?php if($tabid == '4'): ?>selected<?php endif; ?> value="4">财务</option> -->
			</select>
	      </div>
	    </dd>
	  </dl><?php endif; ?>

  <dl>
    <dt>调用名称</dt>
    <dd>
      <input name="txtName" readOnly type="text" value="<?php echo ($data["name"]); ?>" id="txtName" class="input normal" datatype="/^[a-zA-Z0-9\-\_]{2,50}$/" errormsg="请填写正确的名称！" sucmsg=" " ajaxurl="" />
	  <!-- input name="txtName" type="text" id="txtName" class="input normal" datatype="/^[a-zA-Z0-9\-\_]{2,50}$/" errormsg="请填写正确的名称！" sucmsg=" " ajaxurl="../../tools/admin_ajax.ashx?action=channel_name_validate" /> -->
      <span class="Validform_checktip">*调用名称，只允许使用英文、数字或下划线。</span>
    </dd>
  </dl>
  <dl>
    <dt>频道标题</dt>
    <dd><input name="txtTitle" type="text" value="<?php echo ($data["title"]); ?>" id="txtTitle" class="input normal" datatype="*2-100" sucmsg=" " /> <span class="Validform_checktip">*标题备注，允许中文。</span></dd>
  </dl>
  <!-- <dl>
    <dt>所属站点</dt>
    <dd>
      <div class="rule-single-select">
        <select name="ddlSiteId" id="ddlSiteId" datatype="*" errormsg="请选择所属站点！" sucmsg=" ">
	<option value="">请选择站点...</option>
	<?php if(is_array($sites)): $i = 0; $__LIST__ = $sites;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo['id'] == $data['site_id']): ?>selected<?php endif; ?>><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
      </div>
    </dd>
  </dl> -->
  <dl>
    <dt>开启相册</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="cbIsAlbums" <?php if($data["is_albums"] == '1'): ?>checked<?php endif; ?> type="checkbox" name="cbIsAlbums" />
      </div>
      <span class="Validform_checktip">*开启相册功能后可上传多张图片</span>
    </dd>
  </dl>
  <dl>
    <dt>开启附件</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="cbIsAttach" <?php if($data["is_attach"] == '1'): ?>checked<?php endif; ?> type="checkbox" name="cbIsAttach" />
      </div>
      <span class="Validform_checktip">*开启附件功能后可上传多个附件。</span>
    </dd>
  </dl>
  <!-- <dl>
    <dt>会员组价格</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="cbIsSpec" <?php if($data["is_spec"] == '1'): ?>checked<?php endif; ?> type="checkbox" name="cbIsSpec" />
      </div>
      <span class="Validform_checktip">*开启会员组价格</span>
    </dd>
  </dl> -->
  <dl>
    <dt>排序数字</dt>
    <dd>
      <input name="txtSortId" type="text" value="<?php echo ($data["sort_id"]); ?>" id="txtSortId" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">*数字，越小越向前</span>
    </dd>
  </dl>
  
  <?php if(!empty($coums)): ?><dl>
	    <dt>选择字段</dt>
	    <dd>
	      <div class="rule-multi-porp">
	          <span id="cblAttributeField">
	          		<?php if(is_array($coums)): $k = 0; $__LIST__ = $coums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><input id="cblAttributeField_<?php echo ($k); ?>" <?php echo (checkChannelField($data['id'],$vo['id'])); ?>  type="checkbox" name="cblAttributeField[]" value="<?php echo ($vo["id"]); ?>" />
		          		<label for="cblAttributeField_<?php echo ($k); ?>"><?php echo ($vo["title"]); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
		          	<!-- <input id="cblAttributeField_0" type="checkbox" name="cblAttributeField$0" value="pro_type,20" />
		          	<label for="cblAttributeField_0">产品属性</label>
		          	<input id="cblAttributeField_1" type="checkbox" name="cblAttributeField$1" value="pro_sms,19" />
		          	<label for="cblAttributeField_1">产品说明书</label> -->
		          	
	          	</span>
	      </div>
	    </dd>
	  </dl>
	  
	  <dl>
	    <dt>列表显示字段</dt>
	    <dd>
	      <div class="rule-multi-porp">
	          <span id="cblListField">
	          		<?php if(is_array($coums)): $k = 0; $__LIST__ = $coums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><input id="cblListField_<?php echo ($k); ?>" <?php echo (checkChannelField($data['id'],$vo['id'],$data['site_id'])); ?>  type="checkbox" name="cblListField[]" value="<?php echo ($vo["id"]); ?>" />
		          		<label for="cblListField_<?php echo ($k); ?>"><?php echo ($vo["title"]); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
		          	<!-- <input id="cblAttributeField_0" type="checkbox" name="cblAttributeField$0" value="pro_type,20" />
		          	<label for="cblAttributeField_0">产品属性</label>
		          	<input id="cblAttributeField_1" type="checkbox" name="cblAttributeField$1" value="pro_sms,19" />
		          	<label for="cblAttributeField_1">产品说明书</label> -->
		          	
	          	</span>
	      </div>
	    </dd>
	  </dl>
	  
	  <dl>
	    <dt>搜索字段</dt>
	    <dd>
	      <div class="rule-multi-porp">
	          <span id="cblSearchField">
	          		<?php if(is_array($coums)): $k = 0; $__LIST__ = $coums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><input id="cblSearchField_<?php echo ($k); ?>" <?php echo (checkChannelField($data['id'],$vo['id'],-1)); ?>  type="checkbox" name="cblSearchField[]" value="<?php echo ($vo["id"]); ?>" />
		          		<label for="cblSearchField_<?php echo ($k); ?>"><?php echo ($vo["title"]); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
	          	</span>
	      </div>
	    </dd>
	  </dl><?php endif; ?>
  
</div>

<!-- <div class="tab-content" style="display:none;">
  <dl>
    <dt>URL生成配置</dt>
    <dd><a id="itemAddButton" class="icon-btn add"><i></i><span>添加页面</span></a></dd>
  </dl>
  <dl>
    <dt></dt>
    <dd>
      <div class="table-container">
          <table border="0" cellspacing="0" cellpadding="0" class="border-table" width="100%">
            <thead>
              <tr>
                <th width="12%">类型</th>
                <th width="16%">调用名称</th>
                <th width="25%">生成文件名</th>
                <th width="25%">模板文件名</th>
                <th width="12%">分页大小</th>
                <th width="10%">操作</th>
              </tr>
            </thead>
            <tbody id="item_box">
              
            </tbody>
          </table>
      </div>
    </dd>
  </dl>
</div> -->
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

<script>
	function getChannelCoums(){
		
		var partnum = $("#ddlSiteId").val();//选中栏目的id
		window.location.href="/index.php/MomuAdmin/Channel/channel_edit/tabid/"+partnum+"/id/"+"<?php echo ($data['id']); ?>";
		
	}
</script>



</body>
</html>