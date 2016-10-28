<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>会员管理</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/pagination.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
<script>
//操作提示框
showResult("<?php echo ($result); ?>","<?php echo ($msg); ?>");
</script>
</head>

<body class="mainbody">
<form method="get" action="/index.php/MomuAdmin/Users/message_list" id="form2">
	<input type="hidden" id="txtKeywords" name="txtKeywords" value="<?php echo ($_REQUEST['txtKeywords']); ?>" />
	<input type="hidden" id="ddlType" name="ddlType" value="<?php echo ($_REQUEST['ddlType']); ?>" />
	<input type="hidden" id="p" name="p" value="" />
</form>

<form method="post" action="/index.php/MomuAdmin/Users/message_list" id="form1">
<div>
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
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <a href="/index.php/MomuAdmin/Users/user_list"><span>会员管理</span></a>
  <i class="arrow"></i>
  <span>站内短消息</span>
</div>
<!--/导航栏-->

<!--工具栏-->
<div id="floatHead" class="toolbar-wrap">
  <div class="toolbar">
    <div class="box-wrap">
      <a class="menu-btn"></a>
      <div class="l-list">
        <ul class="icon-list">
          <li><a class="add" href="/index.php/MomuAdmin/Users/message_add"><i></i><span>发送消息</span></a></li>
          <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
          <li><a onclick="return ExePostBack(&#39;btnDelete&#39;);" id="btnDelete" class="del" href="javascript:__doPostBack(&#39;btnDelete&#39;,&#39;&#39;)"><i></i><span>删除</span></a></li>
        </ul>
        <div class="menu-list">
          <div class="rule-single-select">
            <select name="ddlType" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ddlType\&#39;,\&#39;\&#39;)&#39;, 0)" id="ddlType">
			<option selected="selected" value="">全部类型...</option>
				<option <?php if(($_REQUEST['ddlType']) == "0"): ?>selected<?php endif; ?> value="0">系统消息</option>
				<option <?php if(($_REQUEST['ddlType']) == "1"): ?>selected<?php endif; ?> value="1">收件箱</option>
				<option <?php if(($_REQUEST['ddlType']) == "2"): ?>selected<?php endif; ?> value="2">发件箱</option>
			</select>
          </div>
        </div>
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
    <th align="left" width="12%">类型</th>
    <th align="center" width="15%">收件人</th>
    <th align="center">标题</th>
    <th align="center" width="12%">状态</th>
    <th align="center" width="16%">发送时间</th>
    <th width="10%">操作</th>
  </tr>
  
	<?php if(empty($list)): ?><tr><td align="center" colspan="7">暂无记录</td></tr>
	<?php else: ?>
		<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
		    <td align="center">
		      <span class="checkall" style="vertical-align:middle;"><input id="chkId_<?php echo ($k); ?>" type="checkbox" name="chkId[<?php echo ($k); ?>]" /></span>
		      <input type="hidden" name="hidId[<?php echo ($k); ?>]" id="hidId_<?php echo ($k); ?>" value="<?php echo ($vo['id']); ?>" />
		      <input name="hidMobile" type="hidden" value="<?php echo ($vo['mobile']); ?>" />
		    </td>
		    <td>
		    	<?php if($vo['type'] == '0'): ?>系统消息
		    	<?php elseif($vo['type'] == '1'): ?>
		    	收件箱
		    	<?php else: ?>
		    	发件箱<?php endif; ?>
		    </td>
		    <td align="center"><?php echo ($vo['accept_user_name']); ?></td>
		    <td align="center"><?php echo ($vo['title']); ?></td>
		    <td align="center">
		    <?php if($vo['is_read'] == '0'): ?>未阅
		    <?php else: ?>
		    	已阅<?php endif; ?>
		    </td>
		    <td align="center"><?php echo ($vo['post_time']); ?></td>
		    <td align="center">
		    	<a href="/index.php/MomuAdmin/Users/message_edit/type/view/id/<?php echo ($vo['id']); ?>" >查看</a>&emsp;
		    	<a href="/index.php/MomuAdmin/Users/message_edit/type/txt/id/<?php echo ($vo['id']); ?>" >编辑</a>
		    </td>
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