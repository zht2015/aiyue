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
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/datepicker/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Home/webuploader/webuploader.min.js"></script>
<script type="text/javascript" src="/Public/layer/layer.js"></script>
<script type="text/javascript">
    $(function () {
        //图片延迟加载
        //$(".pic img").lazyload({ effect: "fadeIn" });
        //点击图片链接
        $(".pic img").click(function () {
            var linkUrl = $(this).parent().parent().find(".foot a").attr("href");
            if (linkUrl != "") {
                location.href = linkUrl; //跳转到修改页面
            }
        });
    });
    
  //更改sort_id
  	var oldsort = 0;
    function remember(obj){
    	oldsort = $(obj).val();
    }
    function postNewSortnum(obj){
    	var newsort = $(obj).val();
    	if(newsort == oldsort){
	    	return false;
    	}
    	var eid = $(obj).attr('id');
    	var postd = eid+"|"+newsort;
    	__doPostBack("changeSort",postd);
    }
    
  //操作提示框
    showResult("<?php echo ($result); ?>","");
</script>

<style type="text/css">


  .webuploader-pick {
    height:20px;
    line-height: 20px;
    width:40px;
  }



</style> 

</head>

<body class="mainbody">
<form method="get" action="/index.php/MomuAdmin/News/article_list/channel_id/<?php echo ($channelid); ?>" id="form2">
	<input type="hidden" id="txtKeywords" name="txtKeywords" value="<?php echo ($_REQUEST['txtKeywords']); ?>" />
	<input type="hidden" id="ddlCategoryId" name="ddlCategoryId" value="<?php echo ($_REQUEST['ddlCategoryId']); ?>" />
	<input type="hidden" id="startt" name="startt" value="<?php echo ($_REQUEST['startt']); ?>" />
	<input type="hidden" id="deadlinet" name="deadlinet" value="<?php echo ($_REQUEST['deadlinet']); ?>" />
	<input type="hidden" id="txtPageNum" name="txtPageNum" value="<?php echo ($pagenum); ?>" />
	<input type="hidden" id="p" name="p" value="" />
</form>

<form method="post" action="/index.php/MomuAdmin/News/article_list/channel_id/<?php echo ($channelid); ?>" id="form1">
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
  <span>内容列表</span>
</div>
<!--/导航栏-->

<!--工具栏-->
<div id="floatHead" class="toolbar-wrap">
  <div class="toolbar">
    <div class="box-wrap">
      <a class="menu-btn"></a>
      <div class="l-list">
        <ul class="icon-list">
          <li><a class="add" href="/index.php/MomuAdmin/News/article_add/channel_id/<?php echo ($channelid); ?>"><i></i><span>新增</span></a></li>
          <!-- <li><a id="btnSave" class="save" href="javascript:__doPostBack(&#39;btnSave&#39;,&#39;&#39;)"><i></i><span>保存</span></a></li> -->
         <!--  <li><a onclick="return ExePostBack(&#39;btnAudit&#39;,&#39;审核后前台将显示该信息，确定继续吗？&#39;);" id="btnAudit" class="lock" href="javascript:__doPostBack(&#39;btnAudit&#39;,&#39;&#39;)"><i></i><span>审核</span></a></li> -->
          <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
          <li><a onclick="return ExePostBack(&#39;btnDelete&#39;);" id="btnDelete" class="del" href="javascript:__doPostBack(&#39;btnDelete&#39;,&#39;&#39;)"><i></i><span>删除</span></a></li>

           <li>
              <a id="btnAudit" class="" href="javascript:void(0)">
                  <i>
                  </i>
                  <span>导出</span></a>
          </li>

           <li>                 
                  
              <a  class="" href="javascript:void(0)">
              <input type="text" placeholder="上传格式为EXCEL" id="excel-path">
                  <i></i><span id="filePicker">导入</span></a>
                  
          </li>
        </ul>
<!--         <div class="menu-list">
  <div class="rule-single-select">
  
<select name="ddlCategoryId" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ddlCategoryId\&#39;,\&#39;\&#39;)&#39;, 0)" id="ddlCategoryId">
  <option  value="0">所有类别</option>
  <?php if(is_array($categorys)): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>" <?php if(($vo['id']) == $_REQUEST['ddlCategoryId']): ?>selected<?php endif; ?> ><?php echo ($vo['befor']); echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

</select>
  </div> -->
          <!-- <div class="rule-single-select">
            <select name="ddlProperty" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ddlProperty\&#39;,\&#39;\&#39;)&#39;, 0)" id="ddlProperty">
				<option value="">所有属性</option>
				<option <?php if($_REQUEST['ddlProperty']== 'is_msg'): ?>selected<?php endif; ?> value="is_msg">可评论</option>
				<option <?php if($_REQUEST['ddlProperty']== 'is_top'): ?>selected<?php endif; ?> value="is_top">置顶</option>
				<option <?php if($_REQUEST['ddlProperty']== 'is_red'): ?>selected<?php endif; ?> value="is_red">推荐</option>
				<option <?php if($_REQUEST['ddlProperty']== 'is_hot'): ?>selected<?php endif; ?> value="is_hot">热门</option>
				<option <?php if($_REQUEST['ddlProperty']== 'is_slide'): ?>selected<?php endif; ?> value="is_slide">幻灯片</option>
			</select>
          </div> -->
        </div>
        
       <!--  <div style="display:inline-block;margin-left:10px;">
                   开始时间：<input name="startt" style="height:28px;" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" value="<?php echo ($_REQUEST['startt']); ?>" placeholder="开始时间" type="text" class="input rule-date-input" id="startt" />
                   结束时间：<input name="deadlinet" style="height:28px;" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" value="<?php echo ($_REQUEST['deadlinet']); ?>" placeholder="结束时间" type="text" class="input rule-date-input" id="deadlinet" />
                   <a id="lbtnSearch" class="btn-search" href="javascript:__doPostBack(&#39;lbtnSearch&#39;,&#39;&#39;)"><button type="button">时间查询</button></a>
             </div> -->
        
      </div>
      <div class="r-list">
        <input name="txtKeywords" value="<?php echo ($_REQUEST['txtKeywords']); ?>" type="text" placeholder="<?php echo ($searchstr); ?>" id="txtKeywords" class="keyword" />
        <a id="lbtnSearch" class="btn-search" href="javascript:__doPostBack(&#39;lbtnSearch&#39;,&#39;&#39;)">查询</a>
        <a id="lbtnViewImg" title="文字列表视图" class="txt-view" href="javascript:__doPostBack(&#39;lbtnViewImg&#39;,&#39;&#39;)"></a>
        <a id="lbtnViewTxt" title="图像列表视图" class="img-view" href="javascript:__doPostBack(&#39;lbtnViewTxt&#39;,&#39;&#39;)"></a>
      </div>
    </div>
  </div>
</div>
<!--/工具栏-->

<!--列表-->
<div class="table-container">
  <!--文字列表-->
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ltable">
    <tr>
      <th width="6%">选择</th>
      <?php if(!empty($listcoums)): if(is_array($listcoums)): $i = 0; $__LIST__ = $listcoums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><th align="left"><?php echo ($vo['title']); ?></th><?php endforeach; endif; else: echo "" ;endif; endif; ?>
     <!--  <th align="left">标题</th> -->
      
      <th width="10%">操作</th>
    </tr>
    
    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
	      <td align="center">
	        <span class="checkall"><input id="chkId_<?php echo ($k); ?>" type="checkbox" name="chkId[<?php echo ($k); ?>]" /></span>
		    <input type="hidden" name="hidId[<?php echo ($k); ?>]" id="hidId_<?php echo ($k); ?>" value="<?php echo ($vo['id']); ?>" />
	      </td>
	      
	      <?php if(!empty($listcoums)): if(is_array($listcoums)): $i = 0; $__LIST__ = $listcoums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><td><?php echo (changeShowType($vo[$v['name']])); ?></td>
			      <!-- <td><?php echo ($vo["v['name']"]); ?></td> --><?php endforeach; endif; else: echo "" ;endif; endif; ?>
      		
	      <!-- <td><?php echo ($vo['add_time']); ?></td> -->
	      
	      <td align="center">
	        <a href="/index.php/MomuAdmin/News/article_edit/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($vo['id']); ?>">修改</a>
	      </td>
	      
	    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  
    <!-- <tr>
      <td align="center">
        <span class="checkall" style="vertical-align:middle;"><input id="rptList1_chkId_0" type="checkbox" name="rptList1$ctl01$chkId" /></span>
        <input type="hidden" name="rptList1$ctl01$hidId" id="rptList1_hidId_0" value="36" />
      </td>
      <td><a href="article_edit.aspx?action=Edit&channel_id=6&id=36">京东全球购将会沦为“海外代购”</a></td>
      <td>经济民生</td>
      <td>2015/4/17 11:07</td>
      <td><input name="rptList1$ctl01$txtSortId" type="text" value="99" id="rptList1_txtSortId_0" class="sort" onkeydown="return checkNumber(event);" /></td>
      <td>
        <div class="btn-tools">
          <a id="rptList1_lbtnIsMsg_0" title="取消评论" class="msg selected" href="javascript:__doPostBack(&#39;rptList1$ctl01$lbtnIsMsg&#39;,&#39;&#39;)"></a>
          <a id="rptList1_lbtnIsTop_0" title="设置置顶" class="top" href="javascript:__doPostBack(&#39;rptList1$ctl01$lbtnIsTop&#39;,&#39;&#39;)"></a>
          <a id="rptList1_lbtnIsRed_0" title="设置推荐" class="red" href="javascript:__doPostBack(&#39;rptList1$ctl01$lbtnIsRed&#39;,&#39;&#39;)"></a>
          <a id="rptList1_lbtnIsHot_0" title="设置热门" class="hot" href="javascript:__doPostBack(&#39;rptList1$ctl01$lbtnIsHot&#39;,&#39;&#39;)"></a>
          <a id="rptList1_lbtnIsSlide_0" title="取消幻灯片" class="pic selected" href="javascript:__doPostBack(&#39;rptList1$ctl01$lbtnIsSlide&#39;,&#39;&#39;)"></a>
        </div>
      </td>
      <td align="center">
        <a href="article_edit.aspx?action=Edit&channel_id=6&id=36">修改</a>
      </td>
    </tr> -->
  
  </table>
  
  <!--/文字列表-->

  <!--图片列表-->
  
  <!--/图片列表-->
</div>
<!--/列表-->

<!--内容底部-->
<div class="line20"></div>
<div class="pagelist">
  <div class="l-btns">
    <span>显示</span><input id="txtPageNum" name="txtPageNum" type="text" value="<?php echo ($pagenum); ?>" onblur="javascript:__doPostBack(&#39;textPageNum&#39;,&#39;&#39;);" class="pagenum"  /><span>条/页</span>
  </div> 
  <div id="PageContent" class="default"><?php echo ($page); ?></div>
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
//导出
  $(function(){
      $("#btnAudit").click(function(){
          $("#form1").attr('action','<?php echo U('Home/Book/export');?>');
          $("#form1").submit();
      });
  });

  //导入
  
</script>




  <script type="text/javascript">
    $(document).ready(function(){
        // 初始化Web Uploader
         var index = 0;
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            swf: "/Public/Home/webuploader/uploader.swf",

            // 文件接收服务端。
            server: "<?php echo U('Home/Book/uploadFile');?>",

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            /*accept: {
                  title: 'intoTypes',
                  extensions: 'xls,xlsx',
                  mimeTypes: '.xls,.xlsx'
            }*/
        });


      // 当有文件添加进来的时候
            uploader.on('fileQueued', function (file) {
            });
            // 文件上传过程中
            uploader.on('uploadProgress', function (file, percentage) {
                index = layer.load();
            });


            // 文件上传成功
            uploader.on('uploadSuccess', function (file, data) {
                if (data.status){
                    var file_url = data.savepath;
                    $('#excel-path').val(file_url);

                    

                    $.post("<?php echo U('Home/Book/importBooklist');?>", {"file":file_url,"flag":1}, function(data){
                      console.log("cg");
                      if(data.status==1){
                        layer.msg("一键导入图书成功",{icon:6})
                      }else if(data.status==-1){
                        layer.msg("一键导入图书失败",{icon:5})
                      }
                    })


                    layer.close(index);
                } else{
                    layer.msg(data.msg, {icon: 5});
                }
            });

            // 文件上传失败，现实上传出错。
            uploader.on('uploadError', function (file) {
                layer.msg('上传失败，请重试', {icon: 5});
            });
            // 完成上传完了，成功或者失败，先删除进度条。
            uploader.on('uploadComplete', function (file) {
                layer.close(index);
            });
        });
  </script>
<!--/内容底部-->

</form>
</body>
</html>