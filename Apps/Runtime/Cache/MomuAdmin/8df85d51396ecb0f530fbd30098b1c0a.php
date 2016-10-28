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
<form method="post" action="/index.php/MomuAdmin/Order/order_config" id="form1">
<div>
<input type="hidden" name="" id="" value="" /></div>

<!--导航栏-->
<div class="location">
  <a href="javascript:history.back(-1);" class="back"><i></i><span>返回上一页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <span>订单设置</span>
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
      </ul>
    </div>
  </div>
</div>

<!--订单参数设置-->
<div class="tab-content">
  <dl>
    <dt>开启匿名购物</dt>
    <dd>
      <div class="rule-single-checkbox">
      	<?php if($d['anonymousBuy'] == '0'): ?><input id="anonymous"  type="checkbox" name="anonymous" />
      	<?php else: ?>
          <input id="anonymous"  type="checkbox" checked name="anonymous" /><?php endif; ?>
      </div>
      <span class="Validform_checktip">*注意：开启匿名后无需登录即可下订单</span>
    </dd>
  </dl>
  <dl>
    <dt>发票税费类型</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="taxtype">
        	<input id="taxtype_0" type="radio" name="taxtype" value="1" <?php if(($d['invoiceType']) == "1"): ?>checked<?php endif; ?>  />
        	<label for="taxtype_0">百分比</label>
        	<input id="taxtype_1" type="radio" name="taxtype" value="2" <?php if(($d['invoiceType']) == "2"): ?>checked<?php endif; ?> />
        	<label for="taxtype_1">固定金额</label>
        </span>
      </div>
      <span class="Validform_checktip">*百分比的计算公式：商品总金额+(商品总金额*百分比)+配送+支付费用=订单总金额</span>
    </dd>
  </dl>
  <dl>
    <dt>发票税金费用</dt>
    <dd>
      <input name="taxamount" type="text" value="<?php echo ($d['invoiceMoney']); ?>" id="taxamount" class="input small" datatype="/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/" sucmsg=" " />
      <span class="Validform_checktip">*注意：百分比取值范围：0-100，固定金额单位为“元”</span>
    </dd>
  </dl>
  <dl>
    <dt>订单确认通知</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="confirmmsg">
        	<input id="confirmmsg_0" type="radio" name="confirmmsg" value="0" <?php if(($d['orderEnsure']) == "0"): ?>checked<?php endif; ?> />
        	<label for="confirmmsg_0">关闭通知</label>
        	<input id="confirmmsg_1" type="radio" name="confirmmsg" value="1" <?php if(($d['orderEnsure']) == "1"): ?>checked<?php endif; ?> />
        	<label for="confirmmsg_1">短信通知</label>
        	<input id="confirmmsg_2" type="radio" name="confirmmsg" value="2" <?php if(($d['orderEnsure']) == "2"): ?>checked<?php endif; ?> />
        	<label for="confirmmsg_2">邮件通知</label>
        </span>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>确认模板别名</dt>
    <dd>
      <input name="confirmcallindex" type="text" value="<?php echo ($d['ensureModel']); ?>" id="confirmcallindex" class="input normal" datatype="*" sucmsg=" " />
      <span class="Validform_checktip">*订单确认通知模板调用别名</span>
    </dd>
  </dl>
  <dl>
    <dt>订单发货通知</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="expressmsg">
        	<input id="expressmsg_0" type="radio" name="expressmsg" value="0" <?php if(($d['orderExpress']) == "0"): ?>checked<?php endif; ?> />
        	<label for="expressmsg_0">关闭通知</label>
        	<input id="expressmsg_1" type="radio" name="expressmsg" value="1" <?php if(($d['orderExpress']) == "1"): ?>checked<?php endif; ?> />
        	<label for="expressmsg_1">短信通知</label>
        	<input id="expressmsg_2" type="radio" name="expressmsg" value="2" <?php if(($d['orderExpress']) == "2"): ?>checked<?php endif; ?> />
        	<label for="expressmsg_2">邮件通知</label>
        </span>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>发货模板别名</dt>
    <dd>
      <input name="expresscallindex" type="text" value="<?php echo ($d['expressModel']); ?>" id="expresscallindex" class="input normal" datatype="*" sucmsg=" " />
      <span class="Validform_checktip">*订单发货通知模板调用别名</span>
    </dd>
  </dl>
  <dl>
    <dt>订单完成通知</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="completemsg">
        	<input id="completemsg_0" type="radio" name="completemsg" value="0" <?php if(($d['orderComplete']) == "0"): ?>checked="checked"<?php endif; ?> />
        	<label for="completemsg_0">关闭通知</label>
        	<input id="completemsg_1" type="radio" name="completemsg" value="1" <?php if(($d['orderComplete']) == "1"): ?>checked="checked"<?php endif; ?> />
        	<label for="completemsg_1">短信通知</label>
        	<input id="completemsg_2" type="radio" name="completemsg" value="2" <?php if(($d['orderComplete']) == "2"): ?>checked="checked"<?php endif; ?> />
        	<label for="completemsg_2">邮件通知</label>
        </span>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>完成模板别名</dt>
    <dd>
      <input name="completecallindex" type="text" value="<?php echo ($d['completeModel']); ?>" id="completecallindex" class="input normal" datatype="*" sucmsg=" " />
      <span class="Validform_checktip">*订单完成通知模板调用别名</span>
    </dd>
  </dl>
</div>
<!--/订单参数设置-->
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