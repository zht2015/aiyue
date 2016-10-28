<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>后台导航管理</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
</head>

<body class="mainbody">
<form method="post" action="/index.php/MomuAdmin/News/category_list/channel_id/<?php echo ($channelid); ?>" id="form1">
<div >
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="channel_id"  value="<?php echo ($channelid); ?>" />
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    var theForm = document.forms['form1'];
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}


//操作提示框
showResult("<?php echo ($result); ?>","<?php echo ($msg); ?>");
//]]>
</script>

<!--导航栏-->
<div class="location">
  <a href="javascript:history.back(-1);" class="back"><i></i><span>返回上一页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <span>内容类别</span>
</div>
<!--/导航栏-->

<!--工具栏-->
<div id="floatHead" class="toolbar-wrap">
  <div class="toolbar">
    <div class="box-wrap">
      <a class="menu-btn"></a>
      <div class="l-list">
        <ul class="icon-list">
          <li><a class="add" href="/index.php/MomuAdmin/News/category_add/channel_id/<?php echo ($channelid); ?>"><i></i><span>新增</span></a></li>
          <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
	      <li><a onclick="return ExePostBack(&#39;btnDelete&#39;);" id="btnDelete" class="del" href="#"><i></i><span>删除</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--/工具栏-->

<!--列表-->
<div class="table-container">
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ltable">
    <tr>
      <th width="6%">选择</th>
      <th align="center" width="6%">编号</th>
      <th align="left">类别名称</th> 
      <th align="left">是否置顶</th>
      <th align="left">是否推荐</th>
      <?php if($channelid == '12'): ?><th align="left">描述</th><?php endif; ?>
      <th align="left" width="12%">排序数字</th>
      <th width="12%">操作</th>
    </tr>
    
    <?php if(is_array($categorylist)): $k = 0; $__LIST__ = $categorylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="<?php echo ($vo['id']); ?>" pid="<?php echo ($vo['parent_id']); ?>">
		      <td align="center">
		        <span class="checkall" style="vertical-align:middle;"><input id="chkId_<?php echo ($k); ?>" type="checkbox" name="chkId[<?php echo ($k); ?>]" /></span>
		        <input type="hidden" name="hidId[<?php echo ($k); ?>]" id="hidId_<?php echo ($k); ?>" value="<?php echo ($vo['id']); ?>" />
		      </td>
	    	  <td align="center"><?php echo ($vo['id']); ?></td>
			  <td>
			  	<?php echo ($vo['befor']); ?>
			  	<a href="/index.php/MomuAdmin/News/category_edit/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?></a>
			  </td>
			  <td>
			  	<?php if($vo['is_top'] == '1'): ?>x
			  	<?php else: ?>
			  	√<?php endif; ?>
			  </td>
			  <td>
			  	<?php if($vo['is_rec'] == '1'): ?>x
			  	<?php else: ?>
			  	√<?php endif; ?>
			  </td>
			  <?php if($channelid == '12'): ?><td><?php echo ($vo['content']); ?></td><?php endif; ?>
		      <td><?php echo ($vo['sort_id']); ?></td>
		      <td align="center">
			    <a href="/index.php/MomuAdmin/News/category_edit/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($vo['id']); ?>">修改</a>&nbsp;
			    <?php if($vo['parent_id'] == '0'): ?><a href="/index.php/MomuAdmin/News/category_add/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($vo['id']); ?>">添加子类</a>
			        <?php else: ?>
			        <span style='color:#C0CCD7;'>添加子类</span><?php endif; ?>
		      </td>
    	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
    
    </table>
  
</div>
<!--/列表-->

</form>
</body>
</html>