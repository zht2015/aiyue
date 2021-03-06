<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>会员审核</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/pagination.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
</head>
<script>
//操作提示框
showResult("<?php echo ($result); ?>","<?php echo ($msg); ?>");
</script>
<body class="mainbody">

<form method="get" action="/index.php/MomuAdmin/Users/user_audit" id="form2">
	<input type="hidden" id="txtKeywords" name="txtKeywords" value="<?php echo ($_REQUEST['txtKeywords']); ?>" />
	<input type="hidden" id="p" name="p" value="" />
</form>

<form method="post" action="/index.php/MomuAdmin/Users/user_audit" id="form1">
<div class="aspNetHidden">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
</div>

<script type="text/javascript">
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
</script>

<!--导航栏-->
<div class="location">
  <a href="javascript:history.back(-1);" class="back"><i></i><span>返回上一页</span></a>
  <a href="../center.aspx" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <span>会员管理</span>
  <i class="arrow"></i>
  <span>审核用户</span>
</div>
<!--/导航栏-->

<!--工具栏-->
<div id="floatHead" class="toolbar-wrap">
  <div class="toolbar">
    <div class="box-wrap">
      <a class="menu-btn"></a>
      <div class="l-list">
        <ul class="icon-list">
          <!-- <li><a class="add" href="user_edit.aspx?action=Add"><i></i><span>新增</span></a></li> -->
          <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
          <li><a onclick="return ExePostBack(&#39;btnAudit&#39;,&#39;审核通过后会员正常使用，是否继续？&#39;);" id="btnAudit" class="lock" href="javascript:__doPostBack(&#39;btnAudit&#39;,&#39;&#39;)"><i></i><span>审核通过</span></a></li>
        </ul>
      </div>
      <div class="r-list">
        <input name="txtKeywords" value="<?php echo ($_REQUEST['txtKeywords']); ?>" type="text" id="txtKeywords" class="keyword" />
        <a id="lbtnSearch" class="btn-search" href="javascript:__doPostBack(&#39;lbtnSearch&#39;,&#39;&#39;)">查询</a>
      </div>
    </div>
  </div>
</div>
<!--/工具栏-->

<!--列表-->
<div class="table-container">

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ltable">
  <tr>
    <th width="8%">选择</th>
    <th align="left">用户名</th>
    <th align="left" width="12%">会员组</th>
    <th align="left" width="12%">手机</th>
    <th align="left" width="12%">邮箱</th>
    <th width="8%">余额</th>
    <th width="8%">积分</th>
    <th width="8%">状态</th>
  </tr>
	<?php if(empty($list)): ?><tr><td align="center" colspan="8">暂无会员需要审核</td></tr>
	<?php else: ?>
		<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
			    <td align="center">
			      <span class="checkall" style="vertical-align:middle;"><input id="chkId_<?php echo ($k); ?>" type="checkbox" name="chkId[<?php echo ($k); ?>]" /></span>
			      <input type="hidden" name="hidId[<?php echo ($k); ?>]" id="hidId_<?php echo ($k); ?>" value="<?php echo ($vo['id']); ?>" />
			      <input name="hidMobile" type="hidden" value="<?php echo ($vo['mobile']); ?>" />
			    </td>
			    <td><?php echo ($vo['user_name']); ?></td>
			    <td><?php echo (getGroupName($vo['group_id'])); ?></td>
			    <td><?php echo ($vo['mobile']); ?></td>
			    <td align="center"><?php echo ($vo['email']); ?></td>
			    <td align="center"><?php echo ($vo['amount']); ?></td>
			    <td align="center"><?php echo ($vo['point']); ?></td>
			    <td align="center"><?php echo (showUserStatus($vo['status'])); ?></td>
			  </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
</table>

</div>
<!--/列表-->

<!--内容底部-->
<div class="line20"></div>
<div class="pagelist">
  <div class="l-btns">
    <span>显示</span><input name="txtPageNum" type="text" value="<?php echo ($pagenum); ?>" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;txtPageNum\&#39;,\&#39;\&#39;)&#39;, 0)" onkeypress="" id="txtPageNum" class="pagenum" onkeydown="return checkNumber(event);" /><span>条/页</span>
  </div>
  <div id="PageContent" class="default"><span>共<?php echo ($totalcount); ?>记录</span><?php echo ($page); ?></div>
</div>
<script>
	$("#PageContent a").click(function(){
		var pathstr = $(this).attr("href");
		var patharr =pathstr.split("/"); 
		var pagestr = patharr[patharr.length-1];
		var parr = pagestr.split(".");
		var clickpage = parr[0];
		
		$("#form2 #p").attr("value",clickpage);
		$("#form2").submit();
		return false;
	});
</script>
<!--/内容底部-->
</form>
</body>
</html>