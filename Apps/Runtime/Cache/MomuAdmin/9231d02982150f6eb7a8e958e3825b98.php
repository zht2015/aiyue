<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>管理员列表</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/pagination.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/layer/layer.js"></script>
<link href="/Public/Admin/layer/skin/layer.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/basic.js"></script>
<script>
//操作提示框
showResult("<?php echo ($result); ?>","");
</script>
</head>

<body class="mainbody">
<form method="post" action="?" id="form1">
<!--导航栏-->
<div class="location">
  <a href="javascript:history.back(-1);" class="back"><i></i><span>返回上一页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <span>管理员列表</span>
</div>
<!--/导航栏-->

<!--工具栏-->
<div id="floatHead" class="toolbar-wrap">
  <div class="toolbar">
    <div class="box-wrap">
      <a class="menu-btn"></a>
      <div class="l-list">
        <ul class="icon-list">
          <li><a class="add" href="<?php echo U('Manager/manager_add');?>"><i></i><span>新增</span></a></li>
          <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
          <li><a onclick="del_hadel('<?php echo U('Manager/del_user');?>');"class="del" href="javascript:void(0);"><i></i><span>删除</span></a></li>
        </ul>
      </div>
      <div class="r-list">
        <input name="txtKeywords" type="text" id="txtKeywords" class="keyword" />
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
      <th align="left" width="12%">姓名</th>
      <th align="left" width="12%">角色</th>
      <th align="left" width="12%">电话</th>
      <th align="left" width="16%">添加时间</th>
      <th width="8%">状态</th>
      <th width="8%">操作</th>
    </tr>
  <!--<?php if(is_array($rs)): foreach($rs as $key=>$v): ?>-->
    <tr>
      <td align="center">
        <span class="aspNetDisabled checkall" style="vertical-align:middle;">
          <input type="checkbox" name="check_all" value="<?php echo ($v['id']); ?>"/>
        </span>
      </td>
      <td><a href="#"><?php echo ($v['user_name']); ?></a></td>
      <td><?php echo ($v['real_name']); ?></td>
      <td><?php echo ($v['role_name']); ?></td>
      <td><?php echo ($v['telephone']); ?></td>
      <td><?php echo ($v['add_time']); ?></td>
      <td align="center">
        <!--<?php if($v['is_lock'] == 1): ?>-->
            正常
        <!--<?php else: ?>-->
            锁定
        <!--<?php endif; ?>-->
      </td>
      <td align="center">
        <a href="<?php echo U('Manager/manager_edit',array('id'=>$v['id']));?>">修改</a>
      </td>
    </tr>
  <!--<?php endforeach; endif; ?>-->
  </table>
</div>
<!--/列表-->
<!--内容底部-->
<div class="line20"></div>
<div class="pagelist">
  <div id="PageContent" class="default"><?php echo ($page_show); ?></div>
</div>
<!--/内容底部-->
</form>
</body>
</html>