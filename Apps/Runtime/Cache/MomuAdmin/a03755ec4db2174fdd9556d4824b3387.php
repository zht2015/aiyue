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

        //计算用户组价格
        $("#sell_price").change(function () {
            var sprice = parseFloat($(this).val());
            if (sprice > 0) {
                $(".groupprice").each(function () {
                    var num = parseFloat($(this).attr("discount")) * sprice / 100;
                    $(this).val(ForDight(num, 2));
                });
            }
        });
        $("#sell_price").change();

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
<form method="post" action="/index.php/MomuAdmin/Article/article_save/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($eid); ?>" id="form1">
<input type="hidden" name="viewtype" value="<?php echo ($viewtype); ?>" />
<!--导航栏-->
<div class="location">
  <a href="/index.php/MomuAdmin/Article/article_list/channel_id/<?php echo ($channelid); ?>" class="back"><i></i><span>返回列表页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <a href="/index.php/MomuAdmin/Article/article_list/channel_id/<?php echo ($channelid); ?>"><span>内容管理</span></a>
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
        <?php if($extcoum != ''): ?><li id="field_tab_item"><a href="javascript:;">扩展选项</a></li><?php endif; ?>
        
        <li><a href="javascript:;">详细描述</a></li>
        <li><a href="javascript:;">SEO选项</a></li>
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
  
  <dl>
    <dt>所属类别</dt>
    <dd>
      <div class="rule-multi-porp">
          <span >
          		<?php if(is_array($categorydata)): $k = 0; $__LIST__ = $categorydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><input id="ddlCategoryId_<?php echo ($k); ?>" <?php echo (getChoseCategory($vo['id'],$eid)); ?>  type="checkbox" name="ddlCategoryId[]" value="<?php echo ($vo["id"]); ?>" />
	          		<label for="ddlCategoryId_<?php echo ($k); ?>"><?php echo ($vo["title"]); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
          	</span>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>显示状态</dt>
    <dd>
      <div class="rule-multi-radio">
        <span id="rblStatus">
        	<input id="rblStatus_0" type="radio" name="rblStatus" value="0" <?php if($artdata['status'] == '0'): ?>checked<?php endif; ?> />
        	<label for="rblStatus_0">正常</label>
        	<input id="rblStatus_1" type="radio" name="rblStatus" value="1" <?php if($artdata['status'] == '1'): ?>checked<?php endif; ?> />
        	<label for="rblStatus_1">待审核</label>
        	<input id="rblStatus_2" type="radio" name="rblStatus" value="2" <?php if($artdata['status'] == '2'): ?>checked<?php endif; ?> />
        	<label for="rblStatus_2">不显示</label>
        </span>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>推荐类型</dt>
    <dd>
      <div class="rule-multi-checkbox">
        <span id="cblItem">
        	<input id="cblItem_0" type="checkbox" name="cblItem[]" value="is_msg,1" <?php if($artdata['is_msg'] == '1'): ?>checked<?php endif; ?> />
        	<label for="cblItem_0">允许评论</label>
        	<input id="cblItem_1" type="checkbox" name="cblItem[]" value="is_top,1" <?php if($artdata['is_top'] == '1'): ?>checked<?php endif; ?> />
        	<label for="cblItem_1">置顶</label>
        	<input id="cblItem_2" type="checkbox" name="cblItem[]" value="is_red,1" <?php if($artdata['is_red'] == '1'): ?>checked<?php endif; ?> />
        	<label for="cblItem_2">推荐</label>
        	<input id="cblItem_3" type="checkbox" name="cblItem[]" value="is_hot,1" <?php if($artdata['is_hot'] == '1'): ?>checked<?php endif; ?> />
        	<label for="cblItem_3">热门</label>
        	<input id="cblItem_4" type="checkbox" name="cblItem[]" value="is_slide,1" <?php if($artdata['is_slide'] == '1'): ?>checked<?php endif; ?> />
        	<label for="cblItem_4">幻灯片</label>
        </span>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>内容标题</dt>
    <dd>
      <input name="txtTitle" type="text" id="txtTitle" value="<?php echo ($artdata['title']); ?>" class="input normal" datatype="*2-100" sucmsg=" " />
      <span class="Validform_checktip">*标题最多100个字符</span>
    </dd>
  </dl>
  
  <dl>
    <dt>封面图片</dt>
    <dd>
      <input name="txtImgUrl" type="text" value="<?php echo ($artdata['img_url']); ?>" id="txtImgUrl" class="input normal upload-path" />
      <div class="upload-box upload-img"></div>
    </dd>
  </dl>
  
  <?php if($channeldata['is_spec'] == '1'): ?><dl id="div_goods_no">
	    <dt><span id="div_goods_no_title">商品货号</span></dt>
	    <dd>
	      <input name="goods_no" type="text" value="<?php echo ($extval['goods_no']); ?>" id="goods_no" class="input normal" datatype="*0-100" sucmsg=" " />
	      <span id="div_goods_no_tip" class="Validform_checktip">允许字母、下划线，100个字符内</span>
	    </dd>
	  </dl>
  
	  <dl id="div_stock_quantity">
	    <dt><span id="div_stock_quantity_title">库存数量</span></dt>
	    <dd>
	      <input name="stock_quantity" type="text" value="<?php echo ($extval['stock_quantity']); ?>" id="stock_quantity" class="input small" datatype="n" sucmsg=" " />
	      <span id="div_stock_quantity_tip" class="Validform_checktip">库存数量为0时显示缺货状态</span>
	    </dd>
	  </dl>
	  <dl id="div_market_price">
	    <dt><span id="div_market_price_title">市场价格</span></dt>
	    <dd>
	      <input name="market_price" type="text" value="<?php echo ($extval['market_price']); ?>" id="market_price" class="input small" datatype="/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/" sucmsg=" " /> 元
	      <span id="div_market_price_tip" class="Validform_checktip">市场的参与价格，不参与计算</span>
	    </dd>
	  </dl>
	  <dl id="div_sell_price">
	    <dt><span id="div_sell_price_title">销售价格</span></dt>
	    <dd>
	      <input name="sell_price" type="text" value="<?php echo ($extval['sell_price']); ?>" id="sell_price" class="input small" datatype="/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/" sucmsg=" " /> 元
	      <span id="div_sell_price_tip" class="Validform_checktip">*出售的实际交易价格</span>
	    </dd>
	  </dl>
	  
	  <dl>
	    <dt>会员价格</dt>
	    <dd>
	      <div class="table-container">
	        <table border="0" cellspacing="0" cellpadding="0" class="border-table">
	       
	       <?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		          <th width="20%"><?php echo ($vo['title']); ?></th>
		          <td width="80%">
		            <input name="txtGroupPrice" readOnly type="text" value="0" maxlength="10" id="rptPrice_txtGroupPrice" class="td-input groupprice" datatype="/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/" sucmsg=" " discount="<?php echo ($vo['discount']); ?>" style="width:60px;" />
		            <span class="Validform_checktip">*享受<?php echo ($vo['discount']); ?>折优惠</span>
		          </td>
		        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	       
	        <!-- <tr>
	          <th width="20%">注册会员</th>
	          <td width="80%">
	            <input name="rptPrice$ctl01$txtGroupPrice" type="text" value="0" maxlength="10" id="rptPrice_txtGroupPrice_0" class="td-input groupprice" datatype="/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/" sucmsg=" " discount="100" style="width:60px;" />
	            <span class="Validform_checktip">*享受100折优惠</span>
	          </td>
	        </tr>
	        
	        <tr>
	          <th width="20%">高级会员</th>
	          <td width="80%">
	            <input name="rptPrice$ctl02$txtGroupPrice" type="text" value="0" maxlength="10" id="rptPrice_txtGroupPrice_1" class="td-input groupprice" datatype="/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/" sucmsg=" " discount="99" style="width:60px;" />
	            <span class="Validform_checktip">*享受99折优惠</span>
	          </td>
	        </tr>
	        
	        <tr>
	          <th width="20%">中级会员</th>
	          <td width="80%">
	            <input name="rptPrice$ctl03$txtGroupPrice" type="text" value="0" maxlength="10" id="rptPrice_txtGroupPrice_2" class="td-input groupprice" datatype="/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/" sucmsg=" " discount="98" style="width:60px;" />
	            <span class="Validform_checktip">*享受98折优惠</span>
	          </td>
	        </tr>
	        
	        <tr>
	          <th width="20%">钻石会员</th>
	          <td width="80%">
	            <input name="rptPrice$ctl04$txtGroupPrice" type="text" value="0" maxlength="10" id="rptPrice_txtGroupPrice_3" class="td-input groupprice" datatype="/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/" sucmsg=" " discount="95" style="width:60px;" />
	            <span class="Validform_checktip">*享受95折优惠</span>
	          </td>
	        </tr> -->
	        
	        </table>
	      </div>
	    </dd>
	  </dl><?php endif; ?>
  
  
  
  <dl>
    <dt>排序数字</dt>
    <dd>
      <input name="txtSortId" type="text"  value="<?php echo ($artdata['sort_id']); ?>" id="txtSortId" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">*数字，越小越向前</span>
    </dd>
  </dl>
  <dl>
    <dt>浏览次数</dt>
    <dd>
      <input name="txtClick" type="text" value="<?php echo ($artdata['click']); ?>" id="txtClick" class="input small" datatype="n" sucmsg=" " />
      <span class="Validform_checktip">点击浏览该信息自动+1</span>
    </dd>
  </dl>
  <dl>
    <dt>发布时间</dt>
    <dd>
      <input name="txtAddTime" type="text" value="<?php echo ($artdata['add_time']); ?>" id="txtAddTime" class="input rule-date-input" onfocus="WdatePicker({dateFmt:&#39;yyyy-MM-dd HH:mm:ss&#39;})" datatype="/^\s*$|^\d{4}\-\d{1,2}\-\d{1,2}\s{1}(\d{1,2}:){2}\d{1,2}$/" errormsg="请选择正确的日期" sucmsg=" " />
      <span class="Validform_checktip">不选择默认当前发布时间</span>
    </dd>
  </dl>
  
  <?php if($channeldata['is_albums'] == '1'): ?><dl id="div_albums_container">
	    <dt>图片相册</dt>
	    <dd>
	      <div class="upload-box upload-album"></div>
	      <input name="hidFocusPhoto" type="hidden" id="hidFocusPhoto" class="focus-photo" />
	      <div class="photo-list">
	        <ul>
	        	<?php if(is_array($albums)): $i = 0; $__LIST__ = $albums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?><li>
						<input type="hidden" value="<?php echo ($pic['id']); ?>|<?php echo ($pic['original_path']); ?>|<?php echo ($pic['thumb_path']); ?>" name="hid_photo_name[]">
						<input type="hidden" value="<?php echo ($pic['remark']); ?>" name="hid_photo_remark[]">
						<div class="img-box" onclick="setFocusImg(this);">
						<img bigsrc="<?php echo ($pic['original_path']); ?>" src="<?php echo ($pic['thumb_path']); ?>">
						<span class="remark">
						<i><?php echo ($pic['remark']); ?></i>
						</span>
						</div>
						<a onclick="setRemark(this);" href="javascript:;">描述</a>
						<a onclick="delImg(this);" href="javascript:;">删除</a>
					  </li><?php endforeach; endif; else: echo "" ;endif; ?>
		          <!-- <li>
					<input type="hidden" value="98|/upload/201606/27/201606271736493250.jpg|/upload/201606/27/201606271736493250.jpg" name="hid_photo_name">
					<input type="hidden" value="123" name="hid_photo_remark">
					<div class="img-box" onclick="setFocusImg(this);">
					<img bigsrc="/upload/201606/27/201606271736493250.jpg" src="/upload/201606/27/201606271736493250.jpg">
					<span class="remark">
					<i>123</i>
					</span>
					</div>
					<a onclick="setRemark(this);" href="javascript:;">描述</a>
					<a onclick="delImg(this);" href="javascript:;">删除</a>
				  </li> -->
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
	        	<?php if(is_array($attachs)): $i = 0; $__LIST__ = $attachs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
						<input type="hidden" value="<?php echo ($v['id']); ?>" name="hid_attach_id[]">
						<input type="hidden" value="<?php echo ($v['file_name']); ?>" name="hid_attach_filename[]">
						<input type="hidden" value="<?php echo ($v['file_path']); ?>" name="hid_attach_filepath[]">
						<input type="hidden" value="<?php echo ($v['file_size']); ?>" name="hid_attach_filesize[]">
						<i class="icon"></i>
						<a class="del" title="删除附件" onclick="delAttachNode(this);" href="javascript:;"></a>
						<a class="edit" title="更新附件" onclick="showAttachDialog(this);" href="javascript:;"></a>
						<div class="title"><?php echo ($v['file_name']); ?></div>
						<div class="info">
						类型：
						<span class="ext"><?php echo ($v['file_ext']); ?></span>
						大小：
						<span class="size"><?php echo ($v['file_size']); ?>KB</span>
						下载：
						<span class="down"><?php echo ($v['down_num']); ?></span>
						次
						</div>
						<div class="btns">
						下载积分：
						<input type="text" value="<?php echo ($v['point']); ?>" onkeydown="return checkNumber(event);" name="txt_attach_point[]">
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
	          	<!-- <li>
					<input type="hidden" value="1" name="hid_attach_id">
					<input type="hidden" value="downicon.rar" name="hid_attach_filename">
					<input type="hidden" value="/upload/201606/27/201606271737413875.rar" name="hid_attach_filepath">
					<input type="hidden" value="15" name="hid_attach_filesize">
					<i class="icon"></i>
					<a class="del" title="删除附件" onclick="delAttachNode(this);" href="javascript:;"></a>
					<a class="edit" title="更新附件" onclick="showAttachDialog(this);" href="javascript:;"></a>
					<div class="title">downicon.rar</div>
					<div class="info">
					类型：
					<span class="ext">rar</span>
					大小：
					<span class="size">15KB</span>
					下载：
					<span class="down">0</span>
					次
					</div>
					<div class="btns">
					下载积分：
					<input type="text" value="0" onkeydown="return checkNumber(event);" name="txt_attach_point">
					</div>
				</li> -->
	        </ul>
	      </div>
	    </dd>
	  </dl><?php endif; ?>
  
  
</div>

 <?php if($extcoum != ''): ?><div id="field_tab_content" class="tab-content" style="display:none">
		<?php echo ($extcoum); ?>
	</div> 
	<!-- <div id="field_tab_content" class="tab-content" style="display:none">
		<dl>
			<dt>产品特点</dt>
			<dd><textarea name="pro_td" id="pro_td" style="visibility:hidden;" class="editor"></textarea>
			<span class="Validform_checktip"></span>
			</dd>
		</dl>
	</div> --><?php endif; ?>

<div class="tab-content" style="display:none">
  <dl>
    <dt>调用别名</dt>
    <dd>
      <input name="txtCallIndex" type="text" value="<?php echo ($artdata['call_index']); ?>" id="txtCallIndex" class="input normal" datatype="/^\s*$|^[a-zA-Z0-9\-\_]{2,50}$/" sucmsg=" " />
      <span class="Validform_checktip">*别名访问，非必填，不可重复</span>
    </dd>
  </dl>
  <dl>
    <dt>URL链接</dt>
    <dd>
      <input name="txtLinkUrl" type="text" value="<?php echo ($artdata['link_url']); ?>" maxlength="255" id="txtLinkUrl" class="input normal" />
      <span class="Validform_checktip">填写后直接跳转到该网址</span>
    </dd>
  </dl>
  
  <dl id="div_source">
    <dt><span id="div_source_title">信息来源</span></dt>
    <dd>
      <input name="source" type="text" value="<?php echo ($extval['source']); ?>" id="source" class="input normal" />
      <span id="div_source_tip" class="Validform_checktip">非必填，最多50个字符</span>
    </dd>
  </dl>
  <dl id="div_author">
    <dt><span id="div_author_title">文章作者</span></dt>
    <dd>
      <input name="author" value="<?php echo ($extval['author']); ?>" type="text" id="author" class="input normal" datatype="s0-50" sucmsg=" " />
      <span id="div_author_tip" class="Validform_checktip">非必填，最多50个字符</span>
    </dd>
  </dl>
  
  
  <dl>
    <dt>内容摘要</dt>
    <dd>
      <textarea name="txtZhaiyao" rows="2" cols="20" id="txtZhaiyao" class="input" datatype="*0-255" sucmsg=" "><?php echo ($artdata['zhaiyao']); ?></textarea>
      <span class="Validform_checktip">不填写则自动截取内容前255字符</span>
    </dd>
  </dl>
  <dl>
    <dt>内容描述</dt>
    <dd>
      <textarea name="txtContent" id="txtContent" class="editor" style="visibility:hidden;"><?php echo ($artdata['content']); ?></textarea>
    </dd>
  </dl>
</div>

<div class="tab-content" style="display:none">
  <dl>
    <dt>SEO标题</dt>
    <dd>
      <input name="txtSeoTitle" value="<?php echo ($artdata['seo_title']); ?>" type="text" maxlength="255" id="txtSeoTitle" class="input normal" datatype="*0-100" sucmsg=" " />
      <span class="Validform_checktip">255个字符以内</span>
    </dd>
  </dl>
  <dl>
    <dt>SEO关健字</dt>
    <dd>
      <textarea name="txtSeoKeywords" rows="2" cols="20" id="txtSeoKeywords" class="input" datatype="*0-255" sucmsg=" "><?php echo ($artdata['seo_keywords']); ?></textarea>
      <span class="Validform_checktip">以“,”逗号区分开，255个字符以内</span>
    </dd>
  </dl>
  <dl>
    <dt>SEO描述</dt>
    <dd>
      <textarea name="txtSeoDescription" rows="2" cols="20" id="txtSeoDescription" class="input" datatype="*0-255" sucmsg=" "><?php echo ($artdata['seo_description']); ?></textarea>
      <span class="Validform_checktip">255个字符以内</span>
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