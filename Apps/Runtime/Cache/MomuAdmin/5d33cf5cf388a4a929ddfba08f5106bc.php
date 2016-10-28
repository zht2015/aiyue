<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>编辑内容</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/datepicker/WdatePicker.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/webuploader/webuploader.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/editor/kindeditor-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/uploader.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
    $(function () {
        //初始化表单验证
        $("#form1").initValidform();

        //初始化编辑器
        var editor = KindEditor.create('.editor', {
        width: '100%',
                height: '350px',
                filterMode: false, //默认不过滤HTML
                resizeType: 1,
                uploadJson: "<?php echo U('UploadJson/uploadFile');?>",
                fileManagerJson: '',
                allowFileManager: true
        });
        var editorMini = KindEditor.create('.editor-mini', {
        width: '100%',
                height: '250px',
                filterMode: false, //默认不过滤HTML
                resizeType: 1,
                uploadJson: "<?php echo U('UploadJson/uploadFile');?>",
                items: [
                        'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                        'insertunorderedlist', '|', 'emoticons', 'image', 'link']
        });

        //初始化上传控件
        $(".upload-img").InitUploader({ filesize: "102400", sendurl: "<?php echo U('UploadJson/uploadImg');?>", swf: "/Public/Admin/scripts/webuploader/uploader.swf", filetypes: "gif,jpg,png,bmp,rar,zip,doc,xls,txt,mov" });
        $(".upload-video").InitUploader({ filesize: "102400", sendurl: "<?php echo U('Uploadjson/uploadVideo');?>", swf: "/Public/Admin/scripts/webuploader/uploader.swf", filetypes: "flv,mp3,mp4,avi,mov" });
        $(".upload-album").InitUploader({ btntext: "批量上传", multiple: true, water: true, thumbnail: true, filesize: "0", sendurl: "<?php echo U('UploadJson/uploadImg');?>", swf: "/Public/Admin/scripts/webuploader/uploader.swf" });

        //设置封面图片的样式
        $(".photo-list ul li .img-box img").each(function () {
            if ($(this).attr("src") == $("#hidFocusPhoto").val()) {
                $(this).parent().addClass("selected");
            }
        });

        //创建上传附件
        $(".attach-btn").click(function () {
            showAttachDialog();
        });
    });

    //初始化附件窗口
    function showAttachDialog(obj) {
        var objNum = arguments.length;
        var attachDialog = top.dialog({
            id: 'attachDialogId',
            title: "上传附件",
            url: '<?php echo U("UploadJson/dialog_attach");?>',
            width: 500,
            height: 180,
            onclose: function () {
                var liHtml = this.returnValue; //获取返回值
                if (liHtml.length > 0) {
                    $("#showAttachList").children("ul").append(liHtml);
                }
            }
        }).showModal();
        //如果是修改状态，将对象传进去
        if (objNum == 1) {
            attachDialog.data = obj;
        }
    }
    //删除附件节点
    function delAttachNode(obj) {
        $(obj).parent().remove();
    }
</script>
</head>

<body class="mainbody">
<form method="post" action="/index.php/MomuAdmin/Advertise/article_insert/channel_id/<?php echo ($channelid); ?>" id="form1">
<input type="hidden" name="viewtype" value="<?php echo ($viewtype); ?>" />
<!--导航栏-->
<div class="location">
  <a href="/index.php/MomuAdmin/Advertise/article_list/channel_id/16" class="back"><i></i><span>返回列表页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <a href="/index.php/MomuAdmin/Advertise/article_list/channel_id/16"><span>内容管理</span></a>
  <i class="arrow"></i>
  <span>新增内容</span>
</div>
<div class="line10"></div>
<!--/导航栏-->

<!--内容-->
<div id="floatHead" class="content-tab-wrap">
  <div class="content-tab">
    <div class="content-tab-ul-wrap">
      <ul>
        <li><a class="selected" href="javascript:;">基本信息</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="tab-content">
  <!-- <dl>
    <dt>所属类别</dt>
    <dd>
      <div class="rule-single-select">
        <select name="ddlCategoryId" id="ddlCategoryId" datatype="*" sucmsg=" ">
	<option value="">请选择类别...</option>
	<?php if(is_array($categorydata)): $i = 0; $__LIST__ = $categorydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['befor']); echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
      </div>
    </dd>
  </dl> -->
  <?php if(!empty($categorydata)): ?><dl>
	        <dt>所属类别</dt>
	        <dd>
	        	<?php if(is_array($categorydata)): foreach($categorydata as $k=>$vo): ?><div class="rule-multi-porp multi-porps">
	        			<?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><span >
			                        <input id="ddlCategoryId_<?php echo ($v['title']); ?>"  type="checkbox" name="ddlCategoryId[]" value="<?php echo ($v['id']); ?>" />
			                        <label for="ddlCategoryId_<?php echo ($v['title']); ?>"><?php echo ($v['title']); ?></label>
			                </span><?php endforeach; endif; else: echo "" ;endif; ?>
	        		</div><?php endforeach; endif; ?>
	        
	            <!-- <div class="rule-multi-porp multi-porps">
	                <span >
	                        <input id="ddlCategoryId_1"  type="checkbox" name="ddlCategoryId[]" value="123" />
	                        <label for="ddlCategoryId_1">hello</label>
	                </span>
	                <span >
	                        <input id="ddlCategoryId_111"  type="checkbox" name="ddlCategoryId[]" value="111" />
	                        <label for="ddlCategoryId_111">hello</label>
	                </span>
	
	            </div>
	            <div class="rule-multi-porp multi-porps">
	                <span >
	                        <input id="ddlCategoryId_456"  type="checkbox" name="ddlCategoryId[]" value="456" />
	                        <label for="ddlCategoryId_456">456</label>
	                </span>
	                <span >
	                        <input id="ddlCategoryId_200"  type="checkbox" name="ddlCategoryId[]" value="200" />
	                        <label for="ddlCategoryId_200">200</label>
	                </span>
	
	            </div> -->
	            
	        </dd>
	    </dl><?php endif; ?>
    
  <?php if($extcoum != ''): echo ($extcoum); endif; ?>
  
  <?php if($channeldata['is_albums'] == '1'): ?><dl id="div_albums_container">
	    <dt>图片相册</dt>
	    <dd>
	      <div class="upload-box upload-album"></div>
	      <input name="hidFocusPhoto" type="hidden" id="hidFocusPhoto" class="focus-photo" />
	      <div class="photo-list">
	        <ul>
	          
	        </ul>
	      </div>
	    </dd>
	  </dl><?php endif; ?>
  
  <?php if($channeldata['is_attach'] == '1'): ?><dl id="div_attach_container">
	    <dt>上传附件</dt>
	    <dd>
	      <a class="icon-btn add attach-btn"><span>添加附件</span></a>
	      <div id="showAttachList" class="attach-list">
	        <ul>
	          
	        </ul>
	      </div>
	    </dd>
	  </dl><?php endif; ?>
  
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