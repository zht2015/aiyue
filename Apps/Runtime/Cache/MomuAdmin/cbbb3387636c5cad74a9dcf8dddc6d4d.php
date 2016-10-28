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
<form method="post" action="/index.php/MomuAdmin/Market/comment_list/channel_id/<?php echo ($channelid); ?>" id="form1">
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
/* function deleteData(){
	var listRow = parseInt(81);
	var delData = new Array();
	var i;
	for(i = 0;i<listRow;i++){
	 if($('#rptList_chkId_'+i).prop('checked')){
	  delData.push($('#rptList_hidId_'+i).val());
	 }
	}
   $.ajax({
	   type:'post',
	   url:'/hsccn/momuadmin.php/Article/categorys_delete/channel_id/7',
	   data:{'delData':delData},
	   success:function(msg){
		   if('success' == msg ){
			   alert('成功删除了'+delData.length+'条数据！');
			   window.location.reload(); 
		   }
	   }
   });
} */
function toggle(k){
    var toggle= $("."+k).toggle();
}

window.onload = function(){
	
	//清楚一级图标，属性show和属性值folder-open
	/*
	$("tr[pid='0']").each(function(){
		$(this).children("td:eq(2)").children("span").attr("class","").children("span").attr("class","");
	});
	$(".show").click();
	
	$(".pid").each(function(){
		var obj = $(this);
		if(obj.next("tr").attr("pid") == undefined){
			obj.children("td:eq(2)").children("span").children("span:eq(2)").attr("class","");
		}
		if(obj.attr("pid")==obj.next("tr").attr("pid")){
			//如果相等，则该级别没有子集，可去除icon
			obj.children("td:eq(2)").children("span").children("span:eq(2)").attr("class","");
			
		}
	});
	
	$(".nodenum").each(function(){
		$(this).next().next().attr("class","");
	});
	*/
	
}

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
         <!--  <li><a class="add" href="/index.php/MomuAdmin/Market/category_add/channel_id/<?php echo ($channelid); ?>"><i></i><span>新增</span></a></li> -->
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
  	<?php if($isempty == '0'): ?><tr class="odd_bg">
		<td align="center">暂无评论信息</td>
		</tr>
  	 <?php else: ?>
  	 		<tr>
		      <th width="6%">选择</th>
		      <th align="left" width="6%">编号</th>
		      <th align="left">用户名</th>
		      <th align="left">评论内容</th>
		      <th align="left">审核状态</th>
		      <th align="left">评论时间</th>
		      <th width="12%" align="center">操作</th>
		    </tr>
		    
		    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
				      <td align="center">
				        <span class="checkall" style="vertical-align:middle;"><input id="chkId_<?php echo ($k); ?>" type="checkbox" name="chkId[<?php echo ($k); ?>]" /></span>
				        <input type="hidden" name="hidId[<?php echo ($k); ?>]" id="hidId_<?php echo ($k); ?>" value="<?php echo ($vo['id']); ?>" />
				      </td>
			    	  <td><?php echo ($vo['id']); ?></td>
			    	  <td><?php echo ($vo['user_name']); ?></td>
			    	  <td><?php echo ($vo['content']); ?></td>
			    	  <td>
			    	  	<?php if($vo['is_lock'] == '0'): ?>已审核
		    	  		<?php else: ?>
				    	<span style='color:red;'>未审核</span><?php endif; ?>
			    	  </td>
			    	  <td><?php echo ($vo['add_time']); ?></td>
			    	  <td align="center">
			    	  		编辑 &emsp; 
			    	  </td>
		    	</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
   </table>
  
</div>
<!--/列表-->

</form>
</body>
</html>