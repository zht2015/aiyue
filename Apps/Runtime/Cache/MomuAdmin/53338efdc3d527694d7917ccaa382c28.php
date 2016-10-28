<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>会员组管理</title>
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
<form method="post" action="/index.php/MomuAdmin/Users/group_list" id="form1">
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
  <span>会员组别</span>
</div>
<!--/导航栏-->

<!--工具栏-->
<div id="floatHead" class="toolbar-wrap">
  <div class="toolbar">
    <div class="box-wrap">
      <a class="menu-btn"></a>
      <div class="l-list">
        <ul class="icon-list">
          <li><a class="add" href="/index.php/MomuAdmin/Users/group_add"><i></i><span>新增</span></a></li>
          <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
          <li><a onclick="return ExePostBack(&#39;btnDelete&#39;);" id="btnDelete" class="del" href="javascript:__doPostBack(&#39;btnDelete&#39;,&#39;&#39;)"><i></i><span>删除</span></a></li>
        </ul>
      </div>
      <!-- <div class="r-list">
        <input name="txtKeywords" value="<?php echo ($_REQUEST['txtKeywords']); ?>" type="text" id="txtKeywords" class="keyword" />
        <a id="lbtnSearch" class="btn-search" href="javascript:__doPostBack(&#39;lbtnSearch&#39;,&#39;&#39;)">查询</a>
      </div> -->
    </div>
  </div>
</div>
<!--/工具栏-->

<!--列表-->
<div class="table-container">
  
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ltable">
      <tr>
        <th width="8%">选择</th>
        <th align="left">组别名称</th>
        <th width="8%">等级值</th>
        <th width="12%">升级积分</th>
        <th width="12%">初始金额</th>
        <th width="12%">初始积分</th>
        <th width="9%">购物折扣</th>
        <th width="8%">注册组</th>
        <th width="6%">状态</th>
        <th width="10%">操作</th>
      </tr>
      <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
	        <td align="center">
	          <span class="checkall"><input id="chkId_<?php echo ($k); ?>" type="checkbox" name="chkId[<?php echo ($k); ?>]" /></span>
	          <input type="hidden" name="hidId[<?php echo ($k); ?>]" id="hidId_<?php echo ($k); ?>" value="<?php echo ($vo['id']); ?>" />
	        </td>
	        <td>
	          <a href="/index.php/MomuAdmin/Users/group_edit/id/<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?></a>
	        </td>
	        <td align="center"><?php echo ($vo['grade']); ?></td>
	        <td align="center"><?php echo ($vo['upgrade_exp']); ?></td>
	        <td align="center"><?php echo ($vo['amount']); ?></td>
	        <td align="center"><?php echo ($vo['point']); ?></td>
	        <td align="center"><?php echo ($vo['discount']); ?>%</td>
	        <td align="center">
	        	<?php if($vo['is_default'] == '1'): ?>√
	        	<?php else: ?>
	        		×<?php endif; ?>	
	        </td>
	        <td align="center">
	        <?php if($vo['is_lock'] == '0'): ?>启用
	        <?php else: ?>
	        	禁用<?php endif; ?>	
	        	
	        </td>
	        <td align="center">
	          <a href="/index.php/MomuAdmin/Users/group_edit/id/<?php echo ($vo['id']); ?>">修改</a>
	        </td>
	      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      
      <!-- <tr>
        <td align="center">
          <span class="checkall"><input id="rptList_chkId_0" type="checkbox" name="rptList$ctl01$chkId" /></span>
          <input type="hidden" name="rptList$ctl01$hidId" id="rptList_hidId_0" value="1" />
        </td>
        <td>
          <a href="group_edit.aspx?action=Edit&id=1">注册会员</a>
        </td>
        <td align="center">1</td>
        <td align="center">0</td>
        <td align="center">0.00</td>
        <td align="center">0</td>
        <td align="center">100%</td>
        <td align="center">√/×</td>
        <td align="center">启用</td>
        <td align="center">
          <a href="group_edit.aspx?action=Edit&id=1">修改</a>
        </td>
      </tr> -->
      
      </table>
    
</div>
<!--/列表-->

</form>
</body>
</html>