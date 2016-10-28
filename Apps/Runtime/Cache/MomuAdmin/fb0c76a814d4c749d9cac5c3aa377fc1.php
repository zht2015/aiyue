<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>编辑支付方式</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/Validform_v5.3.2_min.js"></script>
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
<form method="post" action="/index.php/MomuAdmin/Order/payment_edit/id/<?php echo ($d['id']); ?>" id="form1">

<!--导航栏-->
<div class="location">
  <a href="/index.php/MomuAdmin/Order/payment_list" class="back"><i></i><span>返回列表页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <a href="/index.php/MomuAdmin/Order/payment_list"><span>支付方式</span></a>
  <i class="arrow"></i>
  <span>编辑支付方式</span>
</div>
<div class="line10"></div>
<!--/导航栏-->

<!--内容-->
<div id="floatHead" class="content-tab-wrap">
  <div class="content-tab">
    <div class="content-tab-ul-wrap">
      <ul>
        <li><a class="selected" href="javascript:;">配置支付方式</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="tab-content">
  <dl>
    <dt>支付名称</dt>
    <dd><input name="txtTitle" type="text" value="<?php echo ($d['title']); ?>" id="txtTitle" class="input normal" datatype="*2-100" sucmsg=" " /> <span class="Validform_checktip">*</span></dd>
  </dl>
  <dl>
    <dt>支付类型</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="rblType" disabled="disabled">
        	<span>
        		<input id="rblType_0" type="radio" name="rblType" value="1" disabled="disabled" <?php if(($d['type']) == "1"): ?>checked<?php endif; ?> />
        		<label for="rblType_0">线上付款</label></span>
        	<span>
        		<input id="rblType_1" type="radio" name="rblType" value="2" disabled="disabled" <?php if(($d['type']) == "2"): ?>checked<?php endif; ?> />
        		<label for="rblType_1">线下付款</label></span>
        </span>
      </div>
      <span class="Validform_checktip">*线上付款自动验证付款状态</span>
    </dd>
  </dl>
  <dl>
    <dt>是否启用</dt>
    <dd>
      <div class="rule-single-checkbox">
          <input id="cbIsLock" type="checkbox" name="cbIsLock" <?php if(($d['is_lock']) == "0"): ?>checked<?php endif; ?> />
      </div>
      <span class="Validform_checktip">*不启用则不显示该支付方式</span>
    </dd>
  </dl>
  <dl>
    <dt>排序数字</dt>
    <dd>
      <input name="txtSortId" type="text" value="<?php echo ($d['sort_id']); ?>" id="txtSortId" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">*数字，越小越向前</span>
    </dd>
  </dl>
  <dl>
    <dt>手续费类型</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="rblPoundageType">
        	<input id="rblPoundageType_0" type="radio" name="rblPoundageType" value="1" <?php if(($d['poundage_type']) == "1"): ?>checked<?php endif; ?> />
        	<label for="rblPoundageType_0">百分比</label>
        	<input id="rblPoundageType_1" type="radio" name="rblPoundageType" value="2" <?php if(($d['poundage_type']) == "2"): ?>checked<?php endif; ?>  />
        	<label for="rblPoundageType_1">固定金额</label>
        </span>
      </div>
      <span class="Validform_checktip">*百分比的计算公式：商品总金额+(商品总金额*百分比)+配送费用=订单总金额</span>
    </dd>
  </dl>
  <dl>
    <dt>支付手续费</dt>
    <dd>
      <input name="txtPoundageAmount" type="text" value="<?php echo ($d['poundage_amount']); ?>" id="txtPoundageAmount" class="input small" datatype="/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/" sucmsg=" " />
      <span class="Validform_checktip">*注意：百分比取值范围：0-100，固定金额单位为“元”</span>
    </dd>
  </dl>
  
  <dl>
    <dt>显示图标</dt>
    <dd>
      <input name="txtImgUrl" value="<?php echo ($d['img_url']); ?>" type="text" id="txtImgUrl" class="input normal upload-path" />
      <div class="upload-box upload-img"></div>
    </dd>
  </dl>
  <dl>
    <dt>描述说明</dt>
    <dd>
      <textarea name="txtRemark" rows="2" cols="20" id="txtRemark" class="input normal"><?php echo ($d['remark']); ?></textarea>
      <span class="Validform_checktip">支付方式的描述说明，支持HTML代码</span>
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