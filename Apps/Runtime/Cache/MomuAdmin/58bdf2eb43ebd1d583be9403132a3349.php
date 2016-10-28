<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>频道管理</title>
    <link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/pagination.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
</head>

<body class="mainbody">
<form method="get" action="/index.php/MomuAdmin/Channel/attribute_field_list" id="form1">
	<input type="hidden" name="targ" value="" /> 
    <script type="text/javascript">
        function __doPostBack(eventTarget, eventArgument) {
	        var theForm = document.forms['form1'];
	        if (!theForm) {
	            theForm = document.form1;
	        }
            if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
            	 theForm.targ.value = eventTarget;
            	 if(eventTarget == "btnDelete"){
            		 //当为批量删除时，获取到批量删除的id数组
            		 var objs = $(".checkboxarr:checked");//获取满足的对象
            		 var deids = "";//构造需要删除的id
            		 objs.each(function(){
            			 deids += $(this).attr("value")+",";
            		 });
            		 deids = deids.substr(0,deids.length-1);//处理拼接好的需要删除的id的字符串
            		 $.post("/index.php/MomuAdmin/Channel/del",{"deids":deids},function(res){
            			 if(res == "error"){
            				 parent.dialog({
            			            title: '提示',
            			            content: '对不起，删除记录失败了！',
            			            okValue: '确定',
            			            ok: function () { }
            			        }).showModal();
            			 }else{
            				 parent.dialog({
         			            title: '提示',
         			            content: '成功删除'+res+'条记录！',
         			            okValue: '确定',
         			            ok: function () {window.location.href="/index.php/MomuAdmin/Channel/attribute_field_list";}
         			        }).showModal();
            				
            			 }
            		 });
            		 return false;
            	}
                theForm.submit();
            }
        }
    </script>
    <!--导航栏-->
    <div class="location">
        <a href="javascript:history.back(-1);" class="back"><i></i><span>返回上一页</span></a>
        <a href="#" class="home"><i></i><span>首页</span></a>
        <i class="arrow"></i>
        <span>字段列表</span>
    </div>
    <!--/导航栏-->

    <!--工具栏-->
    <div id="floatHead" class="toolbar-wrap">
        <div class="toolbar">
            <div class="box-wrap">
                <a class="menu-btn"></a>
                <div class="l-list">
                    <ul class="icon-list">
                        <li><a class="add" href="<?php echo U('Channel/attribute_field_add');?>"><i></i><span>新增</span></a></li>
                        <!-- <li><a id="btnSave" class="save" href="javascript:__doPostBack(&#39;btnSave&#39;,&#39;&#39;)"><i></i><span>保存</span></a></li> -->
                        <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
					<li><a onclick="return ExePostBack(&#39;btnDelete&#39;);" id="btnDelete" class="del" href="javascript:__doPostBack(&#39;btnDelete&#39;)"><i></i><span>删除</span></a></li> 
                    </ul>
                    <div class="menu-list">
                        <div class="rule-single-select">
                            <select name="ddlControlType" onchange="javascript:setTimeout(__doPostBack(&#39;ddlControlType&#39;), 0)" id="ddlControlType">
                                <option  value="">所有类型</option>
                                <option value="single-text" <?php if($_REQUEST['ddlControlType']== 'single-text'): ?>selected<?php endif; ?>>单行文本</option>
                                <option value="multi-text" <?php if($_REQUEST['ddlControlType']== 'multi-text'): ?>selected<?php endif; ?>>多行文本</option>
                                <option value="editor" <?php if($_REQUEST['ddlControlType']== 'editor'): ?>selected<?php endif; ?>>编辑器</option>
                                <option value="images" <?php if($_REQUEST['ddlControlType']== 'images'): ?>selected<?php endif; ?>>图片上传</option>
                                <option value="video" <?php if($_REQUEST['ddlControlType']== 'video'): ?>selected<?php endif; ?>>视频上传</option>
                                <option value="number" <?php if($_REQUEST['ddlControlType']== 'number'): ?>selected<?php endif; ?>>数字</option>
                                <option value="checkbox" <?php if($_REQUEST['ddlControlType']== 'checkbox'): ?>selected<?php endif; ?>>复选框</option>
                                <option value="multi-radio" <?php if($_REQUEST['ddlControlType']== 'multi-radio'): ?>selected<?php endif; ?>>多项单选</option>
                                <option value="multi-checkbox" <?php if($_REQUEST['ddlControlType']== 'multi-checkbox'): ?>selected<?php endif; ?>>多项多选</option>
                                <option value="date-input" <?php if($_REQUEST['ddlControlType']== 'date-input'): ?>selected<?php endif; ?>>时间</option>

                            </select>
                        </div>
                    </div>
                    
                    <div class="menu-list">
                        <div class="rule-single-select">
                            <select name="ddlCoumType" onchange="javascript:setTimeout(__doPostBack(&#39;ddlCoumType&#39;), 0)" id="ddlCoumType">
                                <option value="">所有类型</option>
                                <option <?php if($_REQUEST['ddlCoumType']== '1'): ?>selected<?php endif; ?>  value="1">新闻</option>
                                <option <?php if($_REQUEST['ddlCoumType']== '2'): ?>selected<?php endif; ?>  value="2">广告</option>
                                <option <?php if($_REQUEST['ddlCoumType']== '3'): ?>selected<?php endif; ?>  value="3">商城</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="r-list">
                    <input name="txtKeywords" type="text" id="txtKeywords" value="<?php echo ($_REQUEST['txtKeywords']); ?>" class="keyword" />
                    <a id="lbtnSearch" class="btn-search" onclick="__doPostBack(&#39;lbtnSearch&#39;);">查询</a>
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
                <th align="left">列名</th>
                <th align="left">所属栏目名</th>
                <th align="left" width="16%">标题</th>
                <th align="left" width="12%">类型</th>
                <th width="8%">必填</th>
                <th width="10%">系统默认</th>
                <th align="left" width="12%">排序</th>
                <th width="10%">操作</th>
            </tr>
			
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	                <td align="center">
	                    <span class="checkall" style="vertical-align:middle;"><input class='checkboxarr' type="checkbox" name="listcheckbox[]" value="<?php echo ($vo["id"]); ?>"  /></span>
	                </td>
	                <td><?php echo ($vo["name"]); ?></td>
	                <td>
	                	<?php if($vo['belongstab'] == '1'): ?>新闻
	                	<?php elseif($vo['belongstab'] == '2'): ?>
	                	广告
	                	<?php elseif($vo['belongstab'] == '3'): ?>
	                	商城
	                	<?php elseif($vo['belongstab'] == '4'): ?>
	                	财务
	                	<?php else: ?>
	                	未知<?php endif; ?>
	                </td>
	                <td><?php echo ($vo["title"]); ?></td>
	                <td><?php echo ($vo["control_type"]); ?></td>
	                <?php if($vo["is_required"] == '1'): ?><td align="center">√</td>
	                <?php else: ?>
		                <td align="center">×</td><?php endif; ?>
	                <?php if($vo["is_sys"] == '1'): ?><td align="center">√</td>
	                <?php else: ?>
		                <td align="center">×</td><?php endif; ?>
	                <td class='sortpoint'><input eid="<?php echo ($vo["id"]); ?>" class='sortid' style='display:none;width:50px;' name="txtSortId" type="text" value="<?php echo ($vo["sort_id"]); ?>" /><span class='sortnum'><?php echo ($vo["sort_id"]); ?></span></td>
	                <td align="center"><a href="/index.php/MomuAdmin/Channel/attribute_field_edit/id/<?php echo ($vo["id"]); ?>">修改</a></td>
            	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			
           <!--  <tr>
                <td align="center">
                    <span class="aspNetDisabled checkall" style="vertical-align:middle;"><input id="rptList_chkId_0" type="checkbox" name="rptList$ctl01$chkId" disabled="disabled" /></span>
                    <input type="hidden" name="rptList$ctl01$hidId" id="rptList_hidId_0" value="2" />
                </td>
                <td>sub_title</td>
                <td>副标题</td>
                <td>单行文本</td>
                <td align="center">×</td>
                <td align="center">√</td>
                <td><input name="rptList$ctl01$txtSortId" type="text" value="99" id="rptList_txtSortId_0" class="sort" onkeydown="return checkNumber(event);" /></td>
                <td align="center"><a href="attribute_field_edit.aspx?action=Edit&id=2">修改</a></td>
            </tr> -->


        </table>

    </div>
    <!--/列表-->

    <!--内容底部-->
    <div class="line20"></div>
    <div class="pagelist">
        <div id="PageContent" class="default"><span>共<?php echo ($totalcount); ?>记录</span><?php echo ($page); ?></div>
    </div>
    <!--/内容底部-->
</form>
<script>
	$(".sortpoint").on("click",function(){
		$(this).children(".sortid").show().focus();
		$(this).children(".sortnum").hide();
	});
	
	$(".sortid").on("blur",function(){
		$(this).hide();//将表单隐藏
		var onum = $(this).siblings(".sortnum").html();
		var sortnum = $(this).val();//获取更改的值
		if(onum == sortnum){$(this).siblings(".sortnum").show();return false;}
		var eid = $(this).attr("eid");
		if(isNaN(sortnum)){
			$(this).siblings(".sortnum").show();return false;
		}
		var r = /^[0-9]*[1-9][0-9]*$/;//正整数验证
		if(!r.test(sortnum)){
			$(this).siblings(".sortnum").show();return false;
		}
		//ajax传递到后台，更改表的排序字段的值
		var obj = $(this);
		$.post("/index.php/MomuAdmin/Channel/edit_sort",{"sortnum":sortnum,"eid":eid},function(res){
			if(res == "success"){
				obj.siblings(".sortnum").html(sortnum).show();//将数据进行展示
			}else{
				obj.siblings(".sortnum").show();//将数据进行展示
			}
		});
		
	});
	
</script>
</body>
</html>