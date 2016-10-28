<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>编辑字段</title>
    <link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/scripts/jquery/Validform_v5.3.2_min.js"></script>
    <script type="text/javascript" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        $(function () {
            //初始化表单验证
            $("#form1").initValidform();
        });
    </script>
</head>

<body class="mainbody">
<form method="post" action="" id="form1">

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
        <a href="attribute_field_list.aspx" class="back"><i></i><span>返回列表页</span></a>
        <a href="../center.aspx" class="home"><i></i><span>首页</span></a>
        <i class="arrow"></i>
        <a href="attribute_field_list.aspx"><span>扩展字段</span></a>
        <i class="arrow"></i>
        <span>编辑字段</span>
    </div>
    <div class="line10"></div>
    <!--/导航栏-->

    <!--内容-->
    <div id="floatHead" class="content-tab-wrap">
        <div class="content-tab">
            <div class="content-tab-ul-wrap">
                <ul>
                    <li><a class="selected" href="javascript:;">字段信息</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tab-content">
        <dl>
            <dt>字段所属表</dt>
            <dd>
                <div class="rule-single-select">
                    <select name="tabType" id="tabType" datatype="*" errormsg="请选择所属表！" sucmsg=" ">
                        <option selected="selected" value="1">新闻</option>
                        <option value="2">广告</option>
                        <option value="3">商城</option>
                        <!-- <option value="4">财务</option> -->
                    </select>
                </div>
            </dd>
        </dl>
        <dl>
            <dt>控件类型</dt>
            <dd>
                <div class="rule-single-select">
                    <select name="ddlControlType" onchange="ControlType();" id="ddlControlType" datatype="*" errormsg="请选择控件类型！" sucmsg=" ">
                        <option selected="selected" value="">请选择类型...</option>
                        <option value="single-text">单行文本</option>
                        <option value="multi-text">多行文本</option>
                        <option value="editor">编辑器</option>
                        <option value="images">图片上传</option>
                        <option value="video">视频上传</option>
                        <option value="number">数字</option>
                        <option value="checkbox">复选框</option>
                        <option value="multi-radio">多项单选</option>
                        <option value="multi-checkbox">多项多选</option>
                        <option value="date-input">时间</option>

                    </select>
                </div>
            </dd>
        </dl>

        <dl>
            <dt>排序数字</dt>
            <dd><input name="txtSortId" type="text" value="99" id="txtSortId" class="input small" datatype="n" sucmsg=" " /> <span class="Validform_checktip">*数字，越小越向前</span></dd>
        </dl>

        <dl>
            <dt>字段列名</dt>
            <!-- <dd><input name="txtName" type="text" id="txtName" class="input normal" datatype="/^[a-zA-Z0-9\-\_]{2,50}$/" sucmsg=" " ajaxurl="../../tools/admin_ajax.ashx?action=attribute_field_validate" /> <span class="Validform_checktip">*字母、下划线，不可修改</span></dd> -->
            <dd><input name="txtName" type="text" id="txtName" class="input normal" datatype="/^[a-zA-Z0-9\-\_]{2,50}$/" sucmsg=" " ajaxurl="" /> <span class="Validform_checktip">*字母、下划线，不可修改</span></dd>
        </dl>

        <dl>
            <dt>字段标题</dt>
            <dd><input name="txtTitle" type="text" id="txtTitle" class="input normal" datatype="*" sucmsg=" " /> <span class="Validform_checktip">*中文标题，做为备注</span></dd>
        </dl>

        <dl>
            <dt>是否必填</dt>
            <dd>
                <div class="rule-single-checkbox">
                    <input id="cbIsRequired" type="checkbox" name="cbIsRequired" />
                </div>
            </dd>
        </dl>


        <dl id="dlIsPassWord" class="single-text-tr" style="display:none;">
            <dt>是否密码框</dt>
            <dd>
                <div class="rule-single-checkbox">
                    <input id="cbIsPassword" type="checkbox" name="cbIsPassword" />
                </div>
            </dd>
        </dl>


        <dl id="dlIsHtml" class="multi-text-tr" style="display:none;">
            <dt>是否允许HTML</dt>
            <dd>
                <div class="rule-single-checkbox">
                    <input id="cbIsHtml" type="checkbox" name="cbIsHtml" />
                </div>
            </dd>
        </dl>


        <dl id="dlEditorType" class="editor-tr" style="display:none;">
            <dt>编辑器类型</dt>
            <dd>
                <div class="rule-multi-radio">
                    <span id="rblEditorType"><input id="rblEditorType_0" type="radio" name="rblEditorType" value="0" checked="checked" /><label for="rblEditorType_0">标准型</label><input id="rblEditorType_1" type="radio" name="rblEditorType" value="1" /><label for="rblEditorType_1">简洁型</label></span>
                </div>
            </dd>
        </dl>


        <dl id="dlDataPlace" class="number-tr" style="display:none;">
            <dt>小数点位数</dt>
            <dd>
                <div class="rule-single-select">
                    <select name="ddlDataPlace" id="ddlDataPlace">
                        <option selected="selected" value="0">无小数点</option>
                        <option value="1">一位</option>
                        <option value="2">二位</option>
                        <option value="3">三位</option>
                        <option value="4">四位</option>
                        <option value="5">五位</option>

                    </select>
                </div>
                <span class="Validform_checktip">*无小数点为整型，否则浮点数</span>
            </dd>
        </dl>


        <dl id="dlDataType" class="multi-radio-tr" style="display:none;">
            <dt>字段类型</dt>
            <dd>
                <div class="rule-multi-radio">
                    <span id="rblDataType"><input id="rblDataType_0" type="radio" name="rblDataType" value="nvarchar" checked="checked" /><label for="rblDataType_0">字符串</label><input id="rblDataType_1" type="radio" name="rblDataType" value="int" /><label for="rblDataType_1">整型数字</label></span>
                </div>
            </dd>
        </dl>


        <dl id="dlDataLength" class="single-text-tr multi-text-tr multi-radio-tr multi-checkbox-tr" style="display:none;">
            <dt>字符串长度</dt>
            <dd><input value="50" name="txtDataLength" type="text" id="txtDataLength" class="input small" datatype="n" sucmsg=" " /> <span class="Validform_checktip">*数字，默认50个字符</span></dd>
        </dl>




        <dl id="dlItemOption" class="multi-radio-tr multi-checkbox-tr" style="display:none;">
            <dt>选项列表</dt>
            <dd>
      <textarea name="txtItemOption" rows="2" cols="20" id="txtItemOption" class="input" datatype="*" sucmsg=" ">
</textarea> <span class="Validform_checktip">*以换行为一行</span>
                <div>*填写说明：选项名称|值，选项之间用分号隔开。</div>
            </dd>
        </dl>











        <dl>
            <dt>默认值</dt>
            <dd><input name="txtDefaultValue" type="text" id="txtDefaultValue" class="input normal" /> <span class="Validform_checktip">*控件的默认字符，可为空</span></dd>
        </dl>

        <dl id="dlValidPattern">
            <dt>验证正则表达式</dt>
            <dd><textarea name="txtValidPattern" rows="2" cols="20" id="txtValidPattern" class="input">
</textarea> <span class="Validform_checktip">*不填写则不验证</span></dd>
        </dl>

        <dl>
            <dt>验证提示信息</dt>
            <dd><textarea name="txtValidTipMsg" rows="2" cols="20" id="txtValidTipMsg" class="input">
</textarea></dd>
        </dl>

        <dl id="dlValidErrorMsg">
            <dt>验证失败信息</dt>
            <dd><textarea name="txtValidErrorMsg" rows="2" cols="20" id="txtValidErrorMsg" class="input">
</textarea></dd>
        </dl>
    </div>
    <!--/内容-->

    <!--工具栏-->
    <div class="page-footer">
        <div class="btn-wrap">
            <input type="submit" name="btnSubmit" value="提交保存" id="btnSubmit" class="btn" />
            <input name="btnReturn" type="button" value="返回上一页" class="btn yellow" onclick="javascript:history.back(-1);" />
        </div>
    </div>
    <!--/工具栏-->

</form>
</body>
</html>


<script>
	
    function ControlType(){
       var type= $("#ddlControlType").val();
       if(type=="single-text"){
           /*显示并隐藏非单行文本框的内容*/
           $("#dlIsPassWord").show();
           $("#dlDataLength").show();
           $("#dlValidErrorMsg").show();
           $("#dlValidPattern").show();

           $("#dlDataType").hide();
           $("#dlIsHtml").hide();
           $("#dlEditorType").hide();
           $("#dlDataPlace").hide();

       }else if(type=="multi-text"){
           /*显示并隐藏非多行文本框的内容*/
           $("#dlIsHtml").show();
           $("#dlDataLength").show();
           $("#dlValidErrorMsg").show();
           $("#dlValidPattern").show();


           $("#dlIsPassWord").hide();
           $("#dlEditorType").hide();
           $("#dlDataPlace").hide();
        }else if(type=="editor"){
           /*显示并隐藏非编辑器的内容*/
           $("#dlEditorType").show();
           $("#dlValidErrorMsg").show();
           $("#dlValidPattern").show();


           $("#dlIsPassWord").hide();
           $("#dlDataLength").hide();
           $("#dlIsHtml").hide();
           $("#dlDataPlace").hide();
       }else if(type=="images"){
           $("#dlValidErrorMsg").show();
           $("#dlValidPattern").show();

           $("#dlEditorType").hide();
           $("#dlIsHtml").hide();
           $("#dlDataLength").hide();
           $("#dlIsPassWord").hide();
           $("#dlDataPlace").hide();
       }else if(type=="video"){
           $("#dlValidErrorMsg").show();
           $("#dlValidPattern").show();

           $("#dlEditorType").hide();
           $("#dlIsHtml").hide();
           $("#dlDataLength").hide();
           $("#dlIsPassWord").hide();
           $("#dlDataPlace").hide();
       }else if(type=="number"){
           $("#dlValidErrorMsg").show();
           $("#dlValidPattern").show();
           $("#dlDataPlace").show();

           $("#dlEditorType").hide();
           $("#dlItemOption").hide();
           $("#dlIsHtml").hide();
           $("#dlDataLength").hide();
           $("#dlIsPassWord").hide();
       }else if(type=="checkbox"){
           $("#dlValidErrorMsg").hide();
           $("#dlValidPattern").hide();
       }else if(type=="multi-radio"){
           $("#dlItemOption").show();
           $("#dlDataType").show();
           $("#dlDataLength").show();

           $("#dlValidErrorMsg").hide();
           $("#dlValidPattern").hide();
           $("#dlIsPassWord").hide();
       }else if(type=="multi-checkbox"){
           $("#dlItemOption").show();
           $("#dlDataLength").show();

           $("#dlDataType").hide();
           $("#dlValidErrorMsg").hide();
           $("#dlValidPattern").hide();
           $("#dlIsPassWord").hide();
       }else if(type=="date-input"){
    	   $("#dlDataLength").hide();
    	   $("#dlIsHtml").hide();
    	   $("#dlIsPassWord").hide();
    	   $("#dlValidPattern").hide();
    	   $("#dlValidErrorMsg").hide();
    	   $("#dlItemOption").hide();
    	   $("#dlEditorType").hide();
    	   $("#dlDataPlace").hide();
    	   $("#dlDataType").hide();
       }

    }
    
    //获取构造好的数据
    function getPostData(){
    	var postData = "";
    	var type= $("#ddlControlType").val();
    	var tabtype = $("#tabType").val();
        if(type=="single-text"){
            var isrequired = $("#cbIsRequired").prev("a").attr("class") == "selected"?1:0;
            var ispasswd = $("#cbIsPassword").prev("a").attr("class") == "selected"?1:0;
            var datatype = "varchar("+$("#txtDataLength").val()+")";
            postData = {"belongstab":tabtype,"control_type":type,"sort_id":$("#txtSortId").val(),"data_type":datatype,"name":$("#txtName").val(),"title":$("#txtTitle").val(),"is_required":isrequired,"is_password":ispasswd,"data_length":$("#txtDataLength").val(),"default_value":$("#txtDefaultValue").val(),"valid_pattern":$("#txtValidPattern").val(),"valid_tip_msg":$("#txtValidTipMsg").val(),"valid_error_msg":$("#txtValidErrorMsg").val()};

        }else if(type=="multi-text"){
            var isrequired = $("#cbIsRequired").prev("a").attr("class") == "selected"?1:0;
            var ishtml = $("#cbIsHtml").prev("a").attr("class") == "selected"?1:0;
            var datatype = "varchar("+$("#txtDataLength").val()+")";
            postData = {"belongstab":tabtype,"control_type":type,"sort_id":$("#txtSortId").val(),"data_type":datatype,"name":$("#txtName").val(),"title":$("#txtTitle").val(),"is_required":isrequired ,"is_html":ishtml,"data_length":$("#txtDataLength").val(),"default_value":$("#txtDefaultValue").val(),"valid_pattern":$("#txtValidPattern").val(),"valid_tip_msg":$("#txtValidTipMsg").val(),"valid_error_msg":$("#txtValidErrorMsg").val()};
            
         }else if(type=="editor"){
            var isrequired = $("#cbIsRequired").prev("a").attr("class") == "selected"?1:0;
            var edittype = $("#rblEditorType").prev("div").children("a[class^='selected']").html() == "标准型"?0:1;
            var datatype = "text";
            postData = {"belongstab":tabtype,"control_type":type,"sort_id":$("#txtSortId").val(),"data_type":datatype,"name":$("#txtName").val(),"title":$("#txtTitle").val(),"is_required":isrequired ,"editor_type":edittype,"default_value":$("#txtDefaultValue").val(),"valid_pattern":$("#txtValidPattern").val(),"valid_tip_msg":$("#txtValidTipMsg").val(),"valid_error_msg":$("#txtValidErrorMsg").val()};
            
        }else if(type=="images"){
            var isrequired = $("#cbIsRequired").prev("a").attr("class") == "selected"?1:0;
            var datatype = "text";
            postData = {"belongstab":tabtype,"control_type":type,"sort_id":$("#txtSortId").val(),"data_type":datatype,"name":$("#txtName").val(),"title":$("#txtTitle").val(),"is_required":isrequired ,"default_value":$("#txtDefaultValue").val(),"valid_pattern":$("#txtValidPattern").val(),"valid_tip_msg":$("#txtValidTipMsg").val(),"valid_error_msg":$("#txtValidErrorMsg").val()};
           
        }else if(type=="video"){
            var isrequired = $("#cbIsRequired").prev("a").attr("class") == "selected"?1:0;
            var datatype = "text";
            postData = {"belongstab":tabtype,"control_type":type,"sort_id":$("#txtSortId").val(),"data_type":datatype,"name":$("#txtName").val(),"title":$("#txtTitle").val(),"is_required":isrequired ,"default_value":$("#txtDefaultValue").val(),"valid_pattern":$("#txtValidPattern").val(),"valid_tip_msg":$("#txtValidTipMsg").val(),"valid_error_msg":$("#txtValidErrorMsg").val()};
            
        }else if(type=="number"){
            var isrequired = $("#cbIsRequired").prev("a").attr("class") == "selected"?1:0;
            var num = $("#ddlDataPlace").val();
            var datatype = num == "0"?"int":"decimal(9,"+num+")";
            postData = {"belongstab":tabtype,"control_type":type,"sort_id":$("#txtSortId").val(),"data_type":datatype,"name":$("#txtName").val(),"title":$("#txtTitle").val(),"is_required":isrequired ,"default_value":$("#txtDefaultValue").val(),"valid_pattern":$("#txtValidPattern").val(),"valid_tip_msg":$("#txtValidTipMsg").val(),"valid_error_msg":$("#txtValidErrorMsg").val()};
            
        }else if(type=="checkbox"){
            var isrequired = $("#cbIsRequired").prev("a").attr("class") == "selected"?1:0;
            var datatype = "varchar(200)";
            postData = {"belongstab":tabtype,"control_type":type,"sort_id":$("#txtSortId").val(),"data_type":datatype,"name":$("#txtName").val(),"title":$("#txtTitle").val(),"is_required":isrequired ,"default_value":$("#txtDefaultValue").val(),"valid_tip_msg":$("#txtValidTipMsg").val()};
          
        }else if(type=="multi-radio"){
        	 var isrequired = $("#cbIsRequired").prev("a").attr("class") == "selected"?1:0;
        	 var dtype = $("#rblDataType").prev("div").children("a[class^='selected']").html() == "字符型"?"varchar":"int";
             var datatype = dtype == "int"?"int":dtype+"("+$("#txtDataLength").val()+")";
             var itemoption = $("#txtItemOption").val();
             postData = {"belongstab":tabtype,"control_type":type,"sort_id":$("#txtSortId").val(),"data_type":datatype,"name":$("#txtName").val(),"title":$("#txtTitle").val(),"is_required":isrequired ,"default_value":$("#txtDefaultValue").val(),"item_option":itemoption,"valid_tip_msg":$("#txtValidTipMsg").val()};
             
        }else if(type=="multi-checkbox"){
        	 var isrequired = $("#cbIsRequired").prev("a").attr("class") == "selected"?1:0;
             var datatype = "varchar("+$("#txtDataLength").val()+")";
             var itemoption = $("#txtItemOption").val();
             postData = {"belongstab":tabtype,"control_type":type,"sort_id":$("#txtSortId").val(),"data_type":datatype,"name":$("#txtName").val(),"title":$("#txtTitle").val(),"is_required":isrequired ,"default_value":$("#txtDefaultValue").val(),"data_length":$("#txtDataLength").val(),"item_option":itemoption,"valid_tip_msg":$("#txtValidTipMsg").val()};
             
        }else if(type=="date-input"){
       	 var isrequired = $("#cbIsRequired").prev("a").attr("class") == "selected"?1:0;
         var datatype = "varchar(50)";
         postData = {"belongstab":tabtype,"control_type":type,"sort_id":$("#txtSortId").val(),"data_type":datatype,"name":$("#txtName").val(),"title":$("#txtTitle").val(),"is_required":isrequired ,"default_value":$("#txtDefaultValue").val(),"valid_tip_msg":$("#txtValidTipMsg").val()};
         
    	}
        return postData;
    }
    
    //提交数据到后台
    function postFromData(d){
    	//alert(d);return false;
    	$.ajax({
    		url:"/index.php/MomuAdmin/Channel/addData",
    		data:d,
    		type:"POST",
    		async:false,
    		success:function(data){
    			window.location.href="/index.php/MomuAdmin/Channel/attribute_field_list";
    			return false;
    		},
    		error:function(){
    			alert('error');
    		}
    	});
    	
    } 
    //点击提交（1、获取构造好的数据 2、提交数据）
    $('#btnSubmit').click(function(){
    	var mydata = getPostData();
    	//alert(JSON.stringify(mydata));
    	//return false;
    	postFromData(mydata);
    	return false;
    });
    
</script>