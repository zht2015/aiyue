<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>编辑类别</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/Validform_v5.3.2_min.js"></script>
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
        //初始化上传控件
        $(".upload-img").InitUploader({ sendurl: "<?php echo U('UploadJson/uploadImg');?>", swf: "/Public/Admin/scripts/webuploader/uploader.swf" });
        //初始化编辑器
        var editorMini = KindEditor.create('#txtContent', {
            width: '100%',
            height: '250px',
            resizeType: 1,
            uploadJson: "<?php echo U('UploadJson/uploadFile');?>",
            items: [
				'source', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'image', 'link', 'fullscreen']
        });
    });
</script>
</head>

<body class="mainbody">
<form method="post" action="/index.php/MomuAdmin/Advertise/category_save/channel_id/<?php echo ($channelid); ?>" id="form1">
<div>
<input type="hidden" name="channel_id"  value="<?php echo ($channelid); ?>" />
<input type="hidden" name="id"  value="<?php echo ($edata['id']); ?>" />
</div>

<!--导航栏-->
<div class="location">
  <a href="/index.php/MomuAdmin/Advertise/category_list/channel_id/<?php echo ($channelid); ?>" class="back"><i></i><span>返回列表页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <a href="/index.php/MomuAdmin/Advertise/category_list/channel_id/<?php echo ($channelid); ?>"><span>内容类别</span></a>
  <i class="arrow"></i>
  <span>编辑分类</span>
</div>
<div class="line10"></div>
<!--/导航栏-->

<!--内容-->
<div id="floatHead" class="content-tab-wrap">
  <div class="content-tab">
    <div class="content-tab-ul-wrap">
      <ul>
        <li><a class="selected" href="javascript:;">基本信息</a></li>
        <li><a href="javascript:;">扩展选项</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="tab-content">
  <dl>
    <dt>所属父类别</dt>
    <dd>
      <div class="rule-single-select">
        <select name="ddlParentId" id="ddlParentId">
			<option value="0">无父级分类</option>
			<?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['id'] == $edata['parent_id']): ?><option value="<?php echo ($vo['id']); ?>" selected><?php echo ($vo['befor']); echo ($vo['title']); ?></option>
				<?php else: ?>
					<option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['befor']); echo ($vo['title']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</select>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>排序数字</dt>
    <dd>
      <input name="txtSortId" type="text" value="<?php echo ($edata['sort_id']); ?>" id="txtSortId" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">*数字，越小越向前</span>
    </dd>
  </dl>
  <dl>
    <dt>类别名称</dt>
    <dd><input name="txtTitle" type="text" value="<?php echo ($edata['title']); ?>" id="txtTitle" class="input normal" datatype="*1-100" sucmsg=" " /> <span class="Validform_checktip">*类别中文名称，100字符内</span></dd>
  </dl>
  
  <dl>
    <dt>是否置顶</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="istop">
        	<input id="istop_0" type="radio" name="istop" value="2" <?php if(($edata['is_top']) == "2"): ?>checked="checked"<?php endif; ?> />
        	<label for="istop_0">是</label>
        	<input id="istop_1" type="radio" name="istop" value="1" <?php if(($edata['is_top']) == "1"): ?>checked="checked"<?php endif; ?> />
        	<label for="istop_1">否</label>
        </span>
      </div>
    </dd>
  </dl>
  
    <dl>
    <dt>是否推荐</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="isrec">
        	<input id="isrec_0" type="radio" name="isrec" value="2" <?php if(($edata['is_rec']) == "2"): ?>checked="checked"<?php endif; ?> />
        	<label for="isrec_0">是</label>
        	<input id="isrec_1" type="radio" name="isrec" value="1" <?php if(($edata['is_rec']) == "1"): ?>checked="checked"<?php endif; ?> />
        	<label for="isrec_1">否</label>
        </span>
      </div>
    </dd>
  </dl>
  
  
  <!-- <dl>
       <dt>是否置顶</dt>
       <dd>
           <input name="istop" type="radio" value="2" <?php if(($edata['is_top']) == "2"): ?>checked="checked"<?php endif; ?>  />是
           <input name="istop" type="radio" value="1" <?php if(($edata['is_top']) == "1"): ?>checked="checked"<?php endif; ?>  />否
       </dd>
  </dl>
  
  <dl>
       <dt>是否推荐</dt>
       <dd>
           <input name="isrec" type="radio" value="2" <?php if(($edata['is_rec']) == "2"): ?>checked="checked"<?php endif; ?>  />是
           <input name="isrec" type="radio" value="1" <?php if(($edata['is_rec']) == "1"): ?>checked="checked"<?php endif; ?>  />否
       </dd>
  </dl> -->
  
  
  <dl>
    <dt>调用别名</dt>
    <dd>
      <input name="txtCallIndex" type="text" value="<?php echo ($edata['call_index']); ?>" id="txtCallIndex" class="input normal" datatype="/^\s*$|^[a-zA-Z0-9\-\_]{2,50}$/" errormsg="请填写正确的别名" sucmsg=" " />
      <span class="Validform_checktip">类别的调用别名，只允许字母、数字、下划线</span>
    </dd>
  </dl>
  <dl>
    <dt>SEO标题</dt>
    <dd>
      <input name="txtSeoTitle" type="text" value="<?php echo ($edata['seo_title']); ?>" maxlength="255" id="txtSeoTitle" class="input normal" datatype="s0-100" sucmsg=" " />
      <span class="Validform_checktip">255个字符以内</span>
    </dd>
  </dl>
  <dl>
    <dt>SEO关健字</dt>
    <dd>
      <textarea name="txtSeoKeywords" rows="2" cols="20" id="txtSeoKeywords" class="input"><?php echo ($edata['seo_keywords']); ?></textarea>
      <span class="Validform_checktip">以“,”逗号区分开，255个字符以内</span>
    </dd>
  </dl>
  <dl>
    <dt>SEO描述</dt>
    <dd>
      <textarea name="txtSeoDescription" rows="2" cols="20" id="txtSeoDescription" class="input"><?php echo ($edata['seo_description']); ?></textarea>
      <span class="Validform_checktip">255个字符以内</span>
    </dd>
  </dl>
</div>

<div class="tab-content" style="display:none">
  <dl>
    <dt>URL链接</dt>
    <dd>
      <input name="txtLinkUrl" type="text" value="<?php echo ($edata['link_url']); ?>" maxlength="255" id="txtLinkUrl" class="input normal" />
      <span class="Validform_checktip">填写后直接跳转到该网址</span>
    </dd>
  </dl>
  <dl>
    <dt>显示图片</dt>
    <dd>
      <input name="txtImgUrl" type="text" value="<?php echo ($edata['img_url']); ?>" id="txtImgUrl" class="input normal upload-path" />
      <div class="upload-box upload-img"></div>
    </dd>
  </dl>
  <dl>
    <dt>类别介绍</dt>
    <dd>
      <textarea name="txtContent" id="txtContent" class="editor" style="visibility:hidden;"><?php echo ($edata['content']); ?></textarea>
    </dd>
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