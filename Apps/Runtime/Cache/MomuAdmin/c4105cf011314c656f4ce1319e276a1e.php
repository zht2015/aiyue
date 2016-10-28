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
<form method="post" action="/index.php/MomuAdmin/Article/category_list/channel_id/<?php echo ($channelid); ?>" id="form1">
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

function toggle(k){
    var toggle= $("."+k).toggle();
}

//操作提示框
showResult("<?php echo ($result); ?>","<?php echo ($msg); ?>");

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
          <li><a class="add" href="/index.php/MomuAdmin/Article/category_add/channel_id/<?php echo ($channelid); ?>"><i></i><span>新增</span></a></li>
          <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
          <?php if($channelid != '12'): ?><li><a onclick="return ExePostBack(&#39;btnDelete&#39;);" id="btnDelete" class="del" href="#"><i></i><span>删除</span></a></li><?php endif; ?>
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
    	<?php if($channelid != '12'): ?><th width="6%">选择</th><?php endif; ?>
      <th align="center" width="6%">编号</th>
      <th align="left">类别名称</th> 
      <?php if($channelid == '7'): ?><th align="left">导航显示</th>
	      <th align="left">首页显示</th><?php endif; ?>
      <?php if($channelid == '12'): ?><th align="left">描述</th><?php endif; ?>
      <th align="left" width="12%">排序数字</th>
      <th width="12%">操作</th>
    </tr>
    
    <?php if(is_array($categorylist)): $k = 0; $__LIST__ = $categorylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="<?php echo ($vo['id']); ?>" pid="<?php echo ($vo['parent_id']); ?>">
    		<?php if($channelid != '12'): ?><td align="center">
			        <span class="checkall" style="vertical-align:middle;"><input id="chkId_<?php echo ($k); ?>" type="checkbox" name="chkId[<?php echo ($k); ?>]" /></span>
			        <input type="hidden" name="hidId[<?php echo ($k); ?>]" id="hidId_<?php echo ($k); ?>" value="<?php echo ($vo['id']); ?>" />
			      </td><?php endif; ?>
	    	  <td align="center"><?php echo ($vo['id']); ?></td>
			  <td>
			  	<?php echo ($vo['befor']); ?>
			  	<a href="/index.php/MomuAdmin/Article/category_edit/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?></a>
			  </td>
			  <?php if($channelid == '7'): ?><td>
				  	<?php if($vo['is_top'] == '1'): ?>x
				  	<?php else: ?>
				  	√<?php endif; ?>
				  </td>
				  <td>
				  	<?php if($vo['is_rec'] == '1'): ?>x
				  	<?php else: ?>
				  	√<?php endif; ?>
				  </td><?php endif; ?>
			  <?php if($channelid == '12'): ?><td><?php echo ($vo['content']); ?></td><?php endif; ?>
		      <td><?php echo ($vo['sort_id']); ?></td>
		      <td align="center">
			    <a href="/index.php/MomuAdmin/Article/category_edit/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($vo['id']); ?>">修改</a>&nbsp;
			    <?php if($channelid != '12'): ?><a href="/index.php/MomuAdmin/Article/category_add/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($vo['id']); ?>">添加子类</a><?php endif; ?>
		      </td>
    	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
    
  <!-- <tr class="0 pid" pid="0">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_1" type="checkbox" name="rptList$ctl$chkId[1]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[1]" id="rptList_hidId_1" value="744" />
        <input type="hidden" name="rptList$ctl1$hidLayer" id="rptList_hidLayer_1" value="2" />
      </td>
      <td>681</td>
      <td>
          <span class="show" onclick="toggle(681);"><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/681">产品</a>
      </td>
      <td>0</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/681">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/681">添加子类</a>      
      </td>
    </tr> <tr class="681 pid" pid="681">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_1" type="checkbox" name="rptList$ctl$chkId[1]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[1]" id="rptList_hidId_1" value="744" />
        <input type="hidden" name="rptList$ctl1$hidLayer" id="rptList_hidLayer_1" value="2" />
      </td>
      <td>744</td>
      <td>
          <span class="show" onclick="toggle(744);"><span style="display:inline-block;width:0px;"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/744">红外热像仪</a>
      </td>
      <td>1</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/744">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/744">添加子类</a>      
      </td>
    </tr><tr class="681 pid" pid="681">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_2" type="checkbox" name="rptList$ctl$chkId[2]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[2]" id="rptList_hidId_2" value="743" />
        <input type="hidden" name="rptList$ctl2$hidLayer" id="rptList_hidLayer_2" value="2" />
      </td>
      <td>743</td>
      <td>
          <span class="show" onclick="toggle(743);"><span style="display:inline-block;width:0px;"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/743">红外摄温仪</a>
      </td>
      <td>2</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/743">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/743">添加子类</a>      
      </td>
    </tr><tr class="743 pid" pid="743">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_3" type="checkbox" name="rptList$ctl$chkId[3]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[3]" id="rptList_hidId_3" value="771" />
        <input type="hidden" name="rptList$ctl3$hidLayer" id="rptList_hidLayer_3" value="3" />
      </td>
      <td>771</td>
      <td>
          <span class="show" onclick="toggle(771);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/771">专业红外线测温仪</a>
      </td>
      <td>201</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/771">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/771">添加子类</a>      
      </td>
    </tr><tr class="743 pid" pid="743">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_4" type="checkbox" name="rptList$ctl$chkId[4]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[4]" id="rptList_hidId_4" value="773" />
        <input type="hidden" name="rptList$ctl4$hidLayer" id="rptList_hidLayer_4" value="3" />
      </td>
      <td>773</td>
      <td>
          <span class="show" onclick="toggle(773);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/773">基本型红外线测温仪</a>
      </td>
      <td>202</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/773">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/773">添加子类</a>      
      </td>
    </tr><tr class="743 pid" pid="743">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_7" type="checkbox" name="rptList$ctl$chkId[7]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[7]" id="rptList_hidId_7" value="789" />
        <input type="hidden" name="rptList$ctl7$hidLayer" id="rptList_hidLayer_7" value="3" />
      </td>
      <td>789</td>
      <td>
          <span class="show" onclick="toggle(789);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/789">红外校准仪（黑体炉）</a>
      </td>
      <td>205</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/789">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/789">添加子类</a>      
      </td>
    </tr><tr class="743 pid" pid="743">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_8" type="checkbox" name="rptList$ctl$chkId[8]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[8]" id="rptList_hidId_8" value="790" />
        <input type="hidden" name="rptList$ctl8$hidLayer" id="rptList_hidLayer_8" value="3" />
      </td>
      <td>790</td>
      <td>
          <span class="show" onclick="toggle(790);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/790">组合型红外测温仪</a>
      </td>
      <td>206</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/790">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/790">添加子类</a>      
      </td>
    </tr><tr class="681 pid" pid="681">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_9" type="checkbox" name="rptList$ctl$chkId[9]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[9]" id="rptList_hidId_9" value="741" />
        <input type="hidden" name="rptList$ctl9$hidLayer" id="rptList_hidLayer_9" value="2" />
      </td>
      <td>741</td>
      <td>
          <span class="show" onclick="toggle(741);"><span style="display:inline-block;width:0px;"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/741">医疗健康</a>
      </td>
      <td>3</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/741">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/741">添加子类</a>      
      </td>
    </tr><tr class="741 pid" pid="741">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_10" type="checkbox" name="rptList$ctl$chkId[10]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[10]" id="rptList_hidId_10" value="792" />
        <input type="hidden" name="rptList$ctl10$hidLayer" id="rptList_hidLayer_10" value="3" />
      </td>
      <td>792</td>
      <td>
          <span class="show" onclick="toggle(792);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/792">人体测温仪</a>
      </td>
      <td>301</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/792">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/792">添加子类</a>      
      </td>
    </tr><tr class="741 pid" pid="741">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_11" type="checkbox" name="rptList$ctl$chkId[11]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[11]" id="rptList_hidId_11" value="793" />
        <input type="hidden" name="rptList$ctl11$hidLayer" id="rptList_hidLayer_11" value="3" />
      </td>
      <td>793</td>
      <td>
          <span class="show" onclick="toggle(793);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/793">血压计</a>
      </td>
      <td>302</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/793">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/793">添加子类</a>      
      </td>
    </tr><tr class="681 pid" pid="681">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_12" type="checkbox" name="rptList$ctl$chkId[12]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[12]" id="rptList_hidId_12" value="798" />
        <input type="hidden" name="rptList$ctl12$hidLayer" id="rptList_hidLayer_12" value="2" />
      </td>
      <td>798</td>
      <td>
          <span class="show" onclick="toggle(798);"><span style="display:inline-block;width:0px;"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/798">智能体温计(乐鱼)</a>
      </td>
      <td>4</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/798">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/798">添加子类</a>      
      </td>
    </tr><tr class="681 pid" pid="681">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_13" type="checkbox" name="rptList$ctl$chkId[13]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[13]" id="rptList_hidId_13" value="740" />
        <input type="hidden" name="rptList$ctl13$hidLayer" id="rptList_hidLayer_13" value="2" />
      </td>
      <td>740</td>
      <td>
          <span class="show" onclick="toggle(740);"><span style="display:inline-block;width:0px;"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/740">数字万用表</a>
      </td>
      <td>5</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/740">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/740">添加子类</a>      
      </td>
    </tr><tr class="740 pid" pid="740">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_14" type="checkbox" name="rptList$ctl$chkId[14]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[14]" id="rptList_hidId_14" value="784" />
        <input type="hidden" name="rptList$ctl14$hidLayer" id="rptList_hidLayer_14" value="3" />
      </td>
      <td>784</td>
      <td>
          <span class="show" onclick="toggle(784);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/784">专业彩屏数字示波万用表</a>
      </td>
      <td>501</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/784">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/784">添加子类</a>      
      </td>
    </tr><tr class="740 pid" pid="740">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_15" type="checkbox" name="rptList$ctl$chkId[15]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[15]" id="rptList_hidId_15" value="785" />
        <input type="hidden" name="rptList$ctl15$hidLayer" id="rptList_hidLayer_15" value="3" />
      </td>
      <td>785</td>
      <td>
          <span class="show" onclick="toggle(785);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/785">专业防水数字万用表</a>
      </td>
      <td>502</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/785">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/785">添加子类</a>      
      </td>
    </tr><tr class="740 pid" pid="740">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_16" type="checkbox" name="rptList$ctl$chkId[16]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[16]" id="rptList_hidId_16" value="794" />
        <input type="hidden" name="rptList$ctl16$hidLayer" id="rptList_hidLayer_16" value="3" />
      </td>
      <td>794</td>
      <td>
          <span class="show" onclick="toggle(794);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/794">基本型数字万用表</a>
      </td>
      <td>503</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/794">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/794">添加子类</a>      
      </td>
    </tr><tr class="740 pid" pid="740">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_17" type="checkbox" name="rptList$ctl$chkId[17]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[17]" id="rptList_hidId_17" value="795" />
        <input type="hidden" name="rptList$ctl17$hidLayer" id="rptList_hidLayer_17" value="3" />
      </td>
      <td>795</td>
      <td>
          <span class="show" onclick="toggle(795);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/795">笔型数字万用表</a>
      </td>
      <td>504</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/795">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/795">添加子类</a>      
      </td>
    </tr><tr class="740 pid" pid="740">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_18" type="checkbox" name="rptList$ctl$chkId[18]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[18]" id="rptList_hidId_18" value="796" />
        <input type="hidden" name="rptList$ctl18$hidLayer" id="rptList_hidLayer_18" value="3" />
      </td>
      <td>796</td>
      <td>
          <span class="show" onclick="toggle(796);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/796">LCR电感电容数字万用表</a>
      </td>
      <td>505</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/796">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/796">添加子类</a>      
      </td>
    </tr><tr class="740 pid" pid="740">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_19" type="checkbox" name="rptList$ctl$chkId[19]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[19]" id="rptList_hidId_19" value="797" />
        <input type="hidden" name="rptList$ctl19$hidLayer" id="rptList_hidLayer_19" value="3" />
      </td>
      <td>797</td>
      <td>
          <span class="show" onclick="toggle(797);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/797">多功能数字万用表</a>
      </td>
      <td>506</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/797">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/797">添加子类</a>      
      </td>
    </tr><tr class="681 pid" pid="681">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_20" type="checkbox" name="rptList$ctl$chkId[20]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[20]" id="rptList_hidId_20" value="739" />
        <input type="hidden" name="rptList$ctl20$hidLayer" id="rptList_hidLayer_20" value="2" />
      </td>
      <td>739</td>
      <td>
          <span class="show" onclick="toggle(739);"><span style="display:inline-block;width:0px;"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/739">数字钳形表</a>
      </td>
      <td>6</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/739">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/739">添加子类</a>      
      </td>
    </tr><tr class="739 pid" pid="739">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_21" type="checkbox" name="rptList$ctl$chkId[21]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[21]" id="rptList_hidId_21" value="799" />
        <input type="hidden" name="rptList$ctl21$hidLayer" id="rptList_hidLayer_21" value="3" />
      </td>
      <td>799</td>
      <td>
          <span class="show" onclick="toggle(799);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/799">专业交直流钳型表</a>
      </td>
      <td>601</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/799">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/799">添加子类</a>      
      </td>
    </tr><tr class="739 pid" pid="739">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_22" type="checkbox" name="rptList$ctl$chkId[22]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[22]" id="rptList_hidId_22" value="800" />
        <input type="hidden" name="rptList$ctl22$hidLayer" id="rptList_hidLayer_22" value="3" />
      </td>
      <td>800</td>
      <td>
          <span class="show" onclick="toggle(800);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/800">基本型交直流钳型表</a>
      </td>
      <td>602</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/800">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/800">添加子类</a>      
      </td>
    </tr><tr class="739 pid" pid="739">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_23" type="checkbox" name="rptList$ctl$chkId[23]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[23]" id="rptList_hidId_23" value="801" />
        <input type="hidden" name="rptList$ctl23$hidLayer" id="rptList_hidLayer_23" value="3" />
      </td>
      <td>801</td>
      <td>
          <span class="show" onclick="toggle(801);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/801">漏电流钳型表</a>
      </td>
      <td>603</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/801">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/801">添加子类</a>      
      </td>
    </tr><tr class="739 pid" pid="739">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_24" type="checkbox" name="rptList$ctl$chkId[24]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[24]" id="rptList_hidId_24" value="802" />
        <input type="hidden" name="rptList$ctl24$hidLayer" id="rptList_hidLayer_24" value="3" />
      </td>
      <td>802</td>
      <td>
          <span class="show" onclick="toggle(802);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/802">功率钳型表</a>
      </td>
      <td>604</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/802">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/802">添加子类</a>      
      </td>
    </tr><tr class="739 pid" pid="739">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_25" type="checkbox" name="rptList$ctl$chkId[25]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[25]" id="rptList_hidId_25" value="803" />
        <input type="hidden" name="rptList$ctl25$hidLayer" id="rptList_hidLayer_25" value="3" />
      </td>
      <td>803</td>
      <td>
          <span class="show" onclick="toggle(803);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/803">交直流钳夹</a>
      </td>
      <td>605</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/803">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/803">添加子类</a>      
      </td>
    </tr><tr class="681 pid" pid="681">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_26" type="checkbox" name="rptList$ctl$chkId[26]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[26]" id="rptList_hidId_26" value="688" />
        <input type="hidden" name="rptList$ctl26$hidLayer" id="rptList_hidLayer_26" value="2" />
      </td>
      <td>688</td>
      <td>
          <span class="show" onclick="toggle(688);"><span style="display:inline-block;width:0px;"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/688">电子电力测试器</a>
      </td>
      <td>7</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/688">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/688">添加子类</a>      
      </td>
    </tr><tr class="688 pid" pid="688">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_27" type="checkbox" name="rptList$ctl$chkId[27]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[27]" id="rptList_hidId_27" value="804" />
        <input type="hidden" name="rptList$ctl27$hidLayer" id="rptList_hidLayer_27" value="3" />
      </td>
      <td>804</td>
      <td>
          <span class="show" onclick="toggle(804);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/804">基本型电力测试器</a>
      </td>
      <td>701</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/804">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/804">添加子类</a>      
      </td>
    </tr><tr class="688 pid" pid="688">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_28" type="checkbox" name="rptList$ctl$chkId[28]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[28]" id="rptList_hidId_28" value="805" />
        <input type="hidden" name="rptList$ctl28$hidLayer" id="rptList_hidLayer_28" value="3" />
      </td>
      <td>805</td>
      <td>
          <span class="show" onclick="toggle(805);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/805">绝缘表</a>
      </td>
      <td>702</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/805">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/805">添加子类</a>      
      </td>
    </tr><tr class="688 pid" pid="688">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_29" type="checkbox" name="rptList$ctl$chkId[29]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[29]" id="rptList_hidId_29" value="806" />
        <input type="hidden" name="rptList$ctl29$hidLayer" id="rptList_hidLayer_29" value="3" />
      </td>
      <td>806</td>
      <td>
          <span class="show" onclick="toggle(806);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/806">接地电阻测试仪</a>
      </td>
      <td>703</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/806">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/806">添加子类</a>      
      </td>
    </tr><tr class="688 pid" pid="688">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_30" type="checkbox" name="rptList$ctl$chkId[30]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[30]" id="rptList_hidId_30" value="807" />
        <input type="hidden" name="rptList$ctl30$hidLayer" id="rptList_hidLayer_30" value="3" />
      </td>
      <td>807</td>
      <td>
          <span class="show" onclick="toggle(807);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/807">LOOP测试器</a>
      </td>
      <td>704</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/807">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/807">添加子类</a>      
      </td>
    </tr><tr class="688 pid" pid="688">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_31" type="checkbox" name="rptList$ctl$chkId[31]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[31]" id="rptList_hidId_31" value="808" />
        <input type="hidden" name="rptList$ctl31$hidLayer" id="rptList_hidLayer_31" value="3" />
      </td>
      <td>808</td>
      <td>
          <span class="show" onclick="toggle(808);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/808">漏电保护开关（RCD）测试器</a>
      </td>
      <td>705</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/808">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/808">添加子类</a>      
      </td>
    </tr><tr class="688 pid" pid="688">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_32" type="checkbox" name="rptList$ctl$chkId[32]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[32]" id="rptList_hidId_32" value="809" />
        <input type="hidden" name="rptList$ctl32$hidLayer" id="rptList_hidLayer_32" value="3" />
      </td>
      <td>809</td>
      <td>
          <span class="show" onclick="toggle(809);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/809">相序旋转指示仪</a>
      </td>
      <td>706</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/809">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/809">添加子类</a>      
      </td>
    </tr><tr class="688 pid" pid="688">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_33" type="checkbox" name="rptList$ctl$chkId[33]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[33]" id="rptList_hidId_33" value="810" />
        <input type="hidden" name="rptList$ctl33$hidLayer" id="rptList_hidLayer_33" value="3" />
      </td>
      <td>810</td>
      <td>
          <span class="show" onclick="toggle(810);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/810">插孔极性测试器</a>
      </td>
      <td>707</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/810">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/810">添加子类</a>      
      </td>
    </tr><tr class="688 pid" pid="688">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_34" type="checkbox" name="rptList$ctl$chkId[34]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[34]" id="rptList_hidId_34" value="811" />
        <input type="hidden" name="rptList$ctl34$hidLayer" id="rptList_hidLayer_34" value="3" />
      </td>
      <td>811</td>
      <td>
          <span class="show" onclick="toggle(811);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/811">网络寻线仪</a>
      </td>
      <td>708</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/811">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/811">添加子类</a>      
      </td>
    </tr><tr class="688 pid" pid="688">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_35" type="checkbox" name="rptList$ctl$chkId[35]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[35]" id="rptList_hidId_35" value="812" />
        <input type="hidden" name="rptList$ctl35$hidLayer" id="rptList_hidLayer_35" value="3" />
      </td>
      <td>812</td>
      <td>
          <span class="show" onclick="toggle(812);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/812">电缆测试仪</a>
      </td>
      <td>709</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/812">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/812">添加子类</a>      
      </td>
    </tr><tr class="688 pid" pid="688">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_36" type="checkbox" name="rptList$ctl$chkId[36]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[36]" id="rptList_hidId_36" value="813" />
        <input type="hidden" name="rptList$ctl36$hidLayer" id="rptList_hidLayer_36" value="3" />
      </td>
      <td>813</td>
      <td>
          <span class="show" onclick="toggle(813);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/813">金属探测器</a>
      </td>
      <td>710</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/813">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/813">添加子类</a>      
      </td>
    </tr><tr class="688 pid" pid="688">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_37" type="checkbox" name="rptList$ctl$chkId[37]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[37]" id="rptList_hidId_37" value="814" />
        <input type="hidden" name="rptList$ctl37$hidLayer" id="rptList_hidLayer_37" value="3" />
      </td>
      <td>814</td>
      <td>
          <span class="show" onclick="toggle(814);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/814">非接触电压测试笔</a>
      </td>
      <td>711</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/814">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/814">添加子类</a>      
      </td>
    </tr><tr class="681 pid" pid="681">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_43" type="checkbox" name="rptList$ctl$chkId[43]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[43]" id="rptList_hidId_43" value="685" />
        <input type="hidden" name="rptList$ctl43$hidLayer" id="rptList_hidLayer_43" value="2" />
      </td>
      <td>685</td>
      <td>
          <span class="show" onclick="toggle(685);"><span style="display:inline-block;width:0px;"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/685">激光测距仪</a>
      </td>
      <td>10</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/685">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/685">添加子类</a>      
      </td>
    </tr><tr class="685 pid" pid="685">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_44" type="checkbox" name="rptList$ctl$chkId[44]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[44]" id="rptList_hidId_44" value="819" />
        <input type="hidden" name="rptList$ctl44$hidLayer" id="rptList_hidLayer_44" value="3" />
      </td>
      <td>819</td>
      <td>
          <span class="show" onclick="toggle(819);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/819">激光测距仪</a>
      </td>
      <td>1001</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/819">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/819">添加子类</a>      
      </td>
    </tr><tr class="685 pid" pid="685">
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_45" type="checkbox" name="rptList$ctl$chkId[45]" /></span>
        <input type="hidden" name="rptList$ctl$hidId[45]" id="rptList_hidId_45" value="820" />
        <input type="hidden" name="rptList$ctl45$hidLayer" id="rptList_hidLayer_45" value="3" />
      </td>
      <td>820</td>
      <td>
          <span class="show" onclick="toggle(820);"><span style="display:inline-block;width:24px;" class="nodenum"></span><span class="folder-line"></span><span class="folder-open"></span> </span>
      <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/820">超声波测距仪</a>
      </td>
      <td>1002</td>
      <td align="center">
	    <a href="/hsccn/momuadmin.php/Categorys/category_edit/channel_id/7/id/820">修改</a>&nbsp;
        <a href="/hsccn/momuadmin.php/Categorys/category_add/channel_id/7/id/820">添加子类</a>      
      </td>
    </tr> -->  </table>
  
</div>
<!--/列表-->

</form>
</body>
</html>