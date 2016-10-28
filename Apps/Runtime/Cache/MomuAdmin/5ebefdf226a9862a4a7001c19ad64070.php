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
<script type="text/javascript">
    //发送短信
    function PostSMS(mobile) {
        var mobiles = "";
        if (arguments.length == 1) { //如果有传入值
            mobiles = mobile;
        } else {
            lenNum = $(".checkall input:checked").length;
            $(".checkall input:checked").each(function (i) {
                if ($(this).parent().siblings('input[name="hidMobile"]').val() != "") {
                    mobiles += $(this).parent().siblings('input[name="hidMobile"]').val();
                    if (i < lenNum - 1) {
                        mobiles += ',';
                    }
                }
            });
        }
        if (mobiles == "") {
            top.dialog({
                title: '提示',
                content: '对不起，手机号码不能为空！',
                okValue: '确定',
                ok: function () { }
            }).showModal();
            return false;
        }
        var smsdialog = parent.dialog({
            title: '发送手机短信',
            content: '<textarea id="txtSmsContent" name="txtSmsContent" rows="2" cols="20" class="input"></textarea>',
            okValue: '确定',
            ok: function () {
                var remark = $("#txtSmsContent", parent.document).val();
                if (remark == "") {
                    top.dialog({
                        title: '提示',
                        content: '对不起，请输入手机短信内容！',
                        okValue: '确定',
                        ok: function () { }
                    }).showModal(smsdialog);
                    return false;
                }
                var postData = { "mobiles": mobiles, "content": remark };
                //发送AJAX请求
                $.ajax({
                    type: "post",
                    url: "../../tools/admin_ajax.ashx?action=sms_message_post",
                    data: postData,
                    dataType: "json",
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        top.dialog({
                            title: '提示',
                            content: '尝试发送失败，错误信息：' + errorThrown,
                            okValue: '确定',
                            ok: function () { }
                        }).showModal(smsdialog);
                    },
                    success: function (data, textStatus) {
                        if (data.status == 1) {
                            smsdialog.close().remove();
                            var d = top.dialog({ content: data.msg }).show();
                            setTimeout(function () {
                                d.close().remove();
                                location.reload();
                            }, 2000);
                        } else {
                            top.dialog({
                                title: '提示',
                                content: '错误提示：' + data.msg,
                                okValue: '确定',
                                ok: function () { }
                            }).showModal(smsdialog);
                        }
                    }
                });
                return false;
            },
            cancelValue: '取消',
            cancel: function () { }
        }).showModal();
    }
</script>
</head>

<body class="mainbody">
<form method="get" action="/index.php/MomuAdmin/Users/user_list" id="form2">
	<input type="hidden" id="txtKeywords" name="txtKeywords" value="<?php echo ($_REQUEST['txtKeywords']); ?>" />
	<input type="hidden" id="ddlGroupId" name="ddlGroupId" value="<?php echo ($_REQUEST['ddlGroupId']); ?>" />
	<input type="hidden" id="p" name="p" value="" />
</form>

<form method="post" action="/index.php/MomuAdmin/Users/user_list" id="form1">

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
  <span>会员管理</span>
  <i class="arrow"></i>
  <span>会员列表</span>
</div>
<!--/导航栏-->

<!--工具栏-->
<div id="floatHead" class="toolbar-wrap">
  <div class="toolbar">
    <div class="box-wrap">
      <a class="menu-btn"></a>
      <div class="l-list">
        <ul class="icon-list">
          <li><a class="add" href="/index.php/MomuAdmin/Users/user_add"><i></i><span>新增</span></a></li>
          <li><a class="msg" href="javascript:;" onclick="PostSMS();"><i></i><span>短信</span></a></li>
          <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
          <li><a onclick="return ExePostBack(&#39;btnDelete&#39;);" id="btnDelete" class="del" href="javascript:__doPostBack(&#39;btnDelete&#39;,&#39;&#39;)"><i></i><span>删除</span></a></li>
        </ul>
        <div class="menu-list">
          <div class="rule-single-select">
            <select name="ddlGroupId" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ddlGroupId\&#39;,\&#39;\&#39;)&#39;, 0)" id="ddlGroupId">
			<option  value="">所有会员组</option>
			<?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if(($vo['id']) == $_REQUEST['ddlGroupId']): ?>selected<?php endif; ?>   value="<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

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
    <th align="left" colspan="2">用户名</th>
    <th align="left" width="12%">会员组</th>
    <th align="left" width="12%">邮箱</th>
    <th width="8%">余额</th>
    <th width="8%">积分</th>
    <th width="8%">状态</th>
    <th width="8%">操作</th>
  </tr>
	
	<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
		    <td align="center">
		      <span class="checkall" style="vertical-align:middle;"><input id="chkId_<?php echo ($k); ?>" type="checkbox" name="chkId[<?php echo ($k); ?>]" /></span>
		      <input type="hidden" name="hidId[<?php echo ($k); ?>]" id="hidId_<?php echo ($k); ?>" value="<?php echo ($vo['id']); ?>" />
		      <input name="hidMobile" type="hidden" value="<?php echo ($vo['mobile']); ?>" />
		    </td>
		    <td width="64">
		      <a href="/index.php/MomuAdmin/Users/user_edit/id/<?php echo ($vo['id']); ?>">
		      	<?php if($vo['avatar'] == ''): ?><b class="user-avatar"></b>
		      	<?php else: ?>
		      		<img src="<?php echo ($vo['avatar']); ?>" style='width:60px;height:60px;' /><?php endif; ?>
		      </a>
		    </td>
		    <td>
		      <div class="user-box">
		        <h4><b><?php echo ($vo['user_name']); ?></b> (昵称：<?php echo ($vo['nick_name']); ?>)</h4>
		        <i>注册时间：<?php echo ($vo['reg_time']); ?></i>
		        <span>
		          <a class="amount" href="/index.php/MomuAdmin/Users/amount_log/txtKeywords/<?php echo ($vo['user_name']); ?>" title="消费记录">余额</a>
		          <a class="card" href="/index.php/MomuAdmin/Users/recharge_list/txtKeywords/<?php echo ($vo['user_name']); ?>" title="充值记录">充值</a>
		          <a class="point" href="/index.php/MomuAdmin/Users/point_log/txtKeywords/<?php echo ($vo['user_name']); ?>" title="积分记录">积分</a>
		          <a class="msg" href="/index.php/MomuAdmin/Users/message_list/txtKeywords/<?php echo ($vo['user_name']); ?>" title="消息记录">短消息</a>
		          <a class="sms" href="javascript:;" onclick="PostSMS(<?php echo ($vo['mobile']); ?>);" title="发送手机短信通知">短信通知</a>
		        </span>
		      </div>
		    </td>
		    <td><?php echo (getGroupName($vo['group_id'])); ?></td>
		    <td><?php echo ($vo['email']); ?></td>
		    <td align="center"><?php echo ($vo['amount']); ?></td>
		    <td align="center"><?php echo ($vo['point']); ?></td>
		    <td align="center"><?php echo (showUserStatus($vo['status'])); ?></td>
		    <td align="center"><a href="/index.php/MomuAdmin/Users/user_edit/id/<?php echo ($vo['id']); ?>">修改</a></td>
		  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	
  <!-- <tr>
    <td align="center">
      <span class="checkall" style="vertical-align:middle;"><input id="rptList_chkId_0" type="checkbox" name="rptList$ctl01$chkId" /></span>
      <input type="hidden" name="rptList$ctl01$hidId" id="rptList_hidId_0" value="1" />
      <input name="hidMobile" type="hidden" value="13800138000" />
    </td>
    <td width="64">
      <a href="user_edit.aspx?action=Edit&id=1">
        <b class="user-avatar"></b>
      </a>
    </td>
    <td>
      <div class="user-box">
        <h4><b>test</b> (昵称：测试)</h4>
        <i>注册时间：2015/3/30 19:43</i>
        <span>
          <a class="amount" href="amount_log.aspx?keywords=test" title="消费记录">余额</a>
          <a class="card" href="recharge_list.aspx?keywords=test" title="充值记录">充值</a>
          <a class="point" href="point_log.aspx?keywords=test" title="积分记录">积分</a>
          <a class="msg" href="message_list.aspx?keywords=test" title="消息记录">短消息</a>
          <a class="sms" href="javascript:;" onclick="PostSMS('13800138000');" title="发送手机短信通知">短信通知</a>
        </span>
      </div>
    </td>
    <td>注册会员</td>
    <td>test@dtcms.net</td>
    <td align="center">230.00</td>
    <td align="center">10</td>
    <td align="center">正常</td>
    <td align="center"><a href="user_edit.aspx?action=Edit&id=1">修改</a></td>
  </tr> -->

  
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