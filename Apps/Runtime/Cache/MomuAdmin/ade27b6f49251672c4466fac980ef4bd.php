<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>内容管理</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/pagination.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/scripts/jquery/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/layer/layer.js"></script>
<link href="/Public/Admin/layer/skin/layer.css" rel="stylesheet" type="text/css" />

<!-- <link href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/bootstrap.min.js"></script> -->
<script>
//操作提示框
showResult("<?php echo ($result); ?>","<?php echo ($msg); ?>");
</script>
</head>

<body class="mainbody">

<form method="post" action="/index.php/MomuAdmin/Settings/nav_list" id="form1">

<div>
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
</div>

<script type="text/javascript">
//<![CDATA[
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
//]]>
</script>

<!--导航栏-->
<div class="location">
  <a href="javascript:history.back(-1);" class="back"><i></i><span>返回上一页</span></a>
  <a href="../center.aspx" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <span>后台导航管理</span>
</div>
<!--/导航栏-->

<!--工具栏-->
<div id="floatHead" class="toolbar-wrap">
  <div class="toolbar">
    <div class="box-wrap">
      <a class="menu-btn"></a>
      <div class="l-list">
        <ul class="icon-list">
          <li><a class="add" href="<?php echo U('Settings/nav_add');?>"><i></i><span>新增</span></a></li>
          <li><a onclick="category_sort('<?php echo U('Settings/sort');?>');" class="save" href="javascript:void(0);"><i></i><span>排序</span></a></li>
          <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
          <!-- <li><a onclick="del_hadel('<?php echo U('Settings/del_nav');?>');"class="del" href="javascript:void(0);"><i></i><span>删除</span></a></li> -->
          <li><a onclick="return ExePostBack(&#39;btnDelete&#39;);" id="btnDelete" class="del" href="javascript:__doPostBack(&#39;btnDelete&#39;,&#39;&#39;)"><i></i><span>删除</span></a></li>
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
      <th width="8%">图标</th>
      <th align="left" width="12%">调用名称</th>
      <th align="left">标题</th>
      <th width="8%">显示</th>
      <th width="8%">默认</th>
      <th align="left" width="65">排序</th>
      <th width="12%">操作</th>
    </tr>
<?php if(is_array($nav_list)): foreach($nav_list as $k=>$v): ?><tr>
      <td align="center">
      
        <!-- <span class="aspNetDisabled checkall" style="vertical-align:middle;">
          <input type="checkbox" name="check_all" value="<?php echo ($v['id']); ?>"/>
        </span>
        <input type="hidden" name="rptList$ctl19$hidId" id="rptList_hidId_18" value="72" />
        <input type="hidden" name="rptList$ctl19$hidLayer" id="rptList_hidLayer_18" value="3" /> -->
        
        <span class="checkall" style="vertical-align:middle;"><input id="chkId_<?php echo ($k); ?>" type="checkbox" name="chkId[<?php echo ($k); ?>]" /></span>
	    <input type="hidden" name="hidId[<?php echo ($k); ?>]" id="hidId_<?php echo ($k); ?>" value="<?php echo ($v['id']); ?>" />
        
        
      </td>
      <td align="center">
         <?php if($v['icon_url'] != ''): ?><img src="<?php echo ($v['icon_url']); ?>"/><?php endif; ?>
      </td>
      <td style="white-space:nowrap;word-break:break-all;overflow:hidden;"><?php echo ($v['name']); ?></td>
      <td style="white-space:nowrap;word-break:break-all;overflow:hidden;">
        <?php echo ($v['befor']); echo ($v['title']); ?>
          <?php if($v['link_url'] != ''): ?>(链接：<?php echo ($v['link_url']); ?>)<?php endif; ?>
      </td>
      <td align="center">
        <?php if($v['is_lock'] == '0'): ?>√
        <?php else: ?>
            ×<?php endif; ?>
      </td>
      <td align="center">
        <?php if($v['is_sys'] == '1'): ?>√
        <?php else: ?>
            ×<?php endif; ?>
      </td>
      <td>
        <input name="<?php echo ($v['id']); ?>" type="text" value="<?php echo ($v['sort_id']); ?>" id="rptList_txtSortId_18" class="sort" onkeydown="return checkNumber(event);" />
      </td>
      <td align="center" style="white-space:nowrap;word-break:break-all;overflow:hidden;">
        <a href="<?php echo U('Settings/nav_add',array('id'=>$v['id']));?>">添加子级</a>
        <a href="<?php echo U('Settings/nav_edit',array('id'=>$v['id']));?>">修改</a>
      </td>
    </tr><?php endforeach; endif; ?>
  </table>
</div>
<!--/列表-->


<script type="text/javascript" src="/Public/Admin/js/basic.js"></script>
</form>
</body>
</html>