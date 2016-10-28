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
<script type="text/javascript" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
    $(function () {
        //图片延迟加载
        $(".pic img").lazyload({ effect: "fadeIn" });
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
</head>

<body class="mainbody">
<form method="get" action="/index.php/MomuAdmin/Article/article_list/channel_id/<?php echo ($channelid); ?>" id="form2">
	<input type="hidden" id="txtKeywords" name="txtKeywords" value="<?php echo ($_REQUEST['txtKeywords']); ?>" />
	<input type="hidden" id="ddlCategoryId" name="ddlCategoryId" value="<?php echo ($_REQUEST['ddlCategoryId']); ?>" />
	<input type="hidden" id="ddlProperty" name="ddlProperty" value="<?php echo ($_REQUEST['ddlProperty']); ?>" />
	<input type="hidden" id="txtPageNum" name="txtPageNum" value="<?php echo ($pagenum); ?>" />
	<input type="hidden" id="viewtype" name="viewtype" value="viewimg" />
	<input type="hidden" id="p" name="p" value="" />
</form>



<form method="post" action="/index.php/MomuAdmin/Article/article_list/channel_id/<?php echo ($channelid); ?>" id="form1">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />

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
          <li><a class="add" href="/index.php/MomuAdmin/Article/article_add/channel_id/<?php echo ($channelid); ?>"><i></i><span>新增</span></a></li>
          <!-- <li><a id="btnSave" class="save" href="javascript:__doPostBack(&#39;btnSave&#39;,&#39;&#39;)"><i></i><span>保存</span></a></li> -->
         <!--  <li><a onclick="return ExePostBack(&#39;btnAudit&#39;,&#39;审核后前台将显示该信息，确定继续吗？&#39;);" id="btnAudit" class="lock" href="javascript:__doPostBack(&#39;btnAudit&#39;,&#39;&#39;)"><i></i><span>审核</span></a></li> -->
          <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
          <li><a onclick="return ExePostBack(&#39;btnDelete&#39;);" id="btnDelete" class="del" href="javascript:__doPostBack(&#39;btnDelete&#39;,&#39;&#39;)"><i></i><span>删除</span></a></li>
        </ul>
        <div class="menu-list">
          <div class="rule-single-select">
          
<select name="ddlCategoryId" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ddlCategoryId\&#39;,\&#39;\&#39;)&#39;, 0)" id="ddlCategoryId">
	<option  value="0">所有类别</option>
	<?php if(is_array($categorys)): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>" <?php if(($vo['id']) == $_REQUEST['ddlCategoryId']): ?>selected<?php endif; ?> ><?php echo ($vo['befor']); echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

</select>
          </div>
          <div class="rule-single-select">
            <select name="ddlProperty" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ddlProperty\&#39;,\&#39;\&#39;)&#39;, 0)" id="ddlProperty">
				<option value="">所有属性</option>
				<option <?php if($_REQUEST['ddlProperty']== 'is_msg'): ?>selected<?php endif; ?> value="is_msg">可评论</option>
				<option <?php if($_REQUEST['ddlProperty']== 'is_top'): ?>selected<?php endif; ?> value="is_top">置顶</option>
				<option <?php if($_REQUEST['ddlProperty']== 'is_red'): ?>selected<?php endif; ?> value="is_red">推荐</option>
				<option <?php if($_REQUEST['ddlProperty']== 'is_hot'): ?>selected<?php endif; ?> value="is_hot">热门</option>
				<option <?php if($_REQUEST['ddlProperty']== 'is_slide'): ?>selected<?php endif; ?> value="is_slide">幻灯片</option>
			</select>
          </div>
        </div>
      </div>
      <div class="r-list">
        <input name="txtKeywords" value="<?php echo ($_REQUEST['txtKeywords']); ?>" type="text" id="txtKeywords" class="keyword" />
        <a id="lbtnSearch" class="btn-search" href="javascript:__doPostBack(&#39;lbtnSearch&#39;,&#39;&#39;)">查询</a>
        <a id="lbtnViewImg" title="图像列表视图" class="img-view" href="javascript:__doPostBack(&#39;lbtnViewImg&#39;,&#39;&#39;)"></a>
        <a id="lbtnViewTxt" title="文字列表视图" class="txt-view" href="javascript:__doPostBack(&#39;lbtnViewTxt&#39;,&#39;&#39;)"></a>
      </div>
    </div>
  </div>
</div>
<!--/工具栏-->

<!--列表-->
<div class="table-container">
  <!--文字列表-->
  
  <!--/文字列表-->

  <!--图片列表-->
  
  <div class="imglist">
    <ul>
    	<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li>
		        <div class="details">
		          <div class="check">
		            <span class="checkall"><input id="chkId_<?php echo ($k); ?>" type="checkbox" name="chkId[<?php echo ($k); ?>]" /></span>
		            <input type="hidden" name="hidId[<?php echo ($k); ?>]" id="hidId_<?php echo ($k); ?>" value="<?php echo ($vo['id']); ?>" />
		          </div>
		          <?php if($vo['img_url'] == ''): ?><div class="pic"><a href="/index.php/MomuAdmin/Article/article_edit/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($vo['id']); ?>"><img src="/Public/Admin/skin/default/loadimg.gif" data-original="<?php echo ($vo['img_url']); ?>" /></a></div><i class="absbg"></i> 
		          <?php else: ?>
			          <div class="pic"><a href="/index.php/MomuAdmin/Article/article_edit/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($vo['id']); ?>"><img src="<?php echo ($vo['img_url']); ?>" data-original="<?php echo ($vo['img_url']); ?>" /></a></div><i class="absbg"></i><?php endif; ?>
		          <h1><span><a href="/index.php/MomuAdmin/Article/article_edit/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?></a></span></h1>
		          <div class="remark">
		          <?php if($vo['zhaiyao'] == ''): ?>暂无内容摘要说明...
		          <?php else: ?>
		          	<?php echo ($vo['zhaiyao']); endif; ?>
		          </div>
		          
		          <div class="tools">
		          <?php if($vo['is_msg'] == '1'): ?><a id="btnIsMsg_<?php echo ($k); ?>" title="取消评论" class="msg selected" href="javascript:__doPostBack(&#39;nobtnIsMsg&#39;,&#39;<?php echo ($vo['id']); ?>&#39;)"></a>
		          	<?php else: ?>
		            <a id="btnIsMsg_<?php echo ($k); ?>" title="设置评论" class="msg" href="javascript:__doPostBack(&#39;btnIsMsg&#39;,&#39;<?php echo ($vo['id']); ?>&#39;)"></a><?php endif; ?>
		          <?php if($vo['is_top'] == '1'): ?><a id="btnIsTop_<?php echo ($k); ?>" title="取消置顶" class="top selected" href="javascript:__doPostBack(&#39;nobtnIsTop&#39;,&#39;<?php echo ($vo['id']); ?>&#39;)"></a>
		          	<?php else: ?>
		            <a id="btnIsTop_<?php echo ($k); ?>" title="设置置顶" class="top" href="javascript:__doPostBack(&#39;btnIsTop&#39;,&#39;<?php echo ($vo['id']); ?>&#39;)"></a><?php endif; ?>
		          <?php if($vo['is_red'] == '1'): ?><a id="btnIsRed_<?php echo ($k); ?>" title="取消推荐" class="red selected" href="javascript:__doPostBack(&#39;nobtnIsRed&#39;,&#39;<?php echo ($vo['id']); ?>&#39;)"></a>
		          	<?php else: ?>
		            <a id="btnIsRed_<?php echo ($k); ?>" title="设置推荐" class="red" href="javascript:__doPostBack(&#39;btnIsRed&#39;,&#39;<?php echo ($vo['id']); ?>&#39;)"></a><?php endif; ?>
		          <?php if($vo['is_hot'] == '1'): ?><a id="btnIsHot_<?php echo ($k); ?>" title="取消热门" class="hot selected" href="javascript:__doPostBack(&#39;nobtnIsHot&#39;,&#39;<?php echo ($vo['id']); ?>&#39;)"></a>
		          	<?php else: ?>
		            <a id="btnIsHot_<?php echo ($k); ?>" title="设置热门" class="hot" href="javascript:__doPostBack(&#39;btnIsHot&#39;,&#39;<?php echo ($vo['id']); ?>&#39;)"></a><?php endif; ?>
		          <?php if($vo['is_slide'] == '1'): ?><a id="btnIsSlide_<?php echo ($k); ?>" title="取消幻灯片" class="pic selected" href="javascript:__doPostBack(&#39;nobtnIsSlide&#39;,&#39;<?php echo ($vo['id']); ?>&#39;)"></a>
		          	<?php else: ?>
		            <a id="btnIsSlide_<?php echo ($k); ?>" title="设置幻灯片" class="pic" href="javascript:__doPostBack(&#39;btnIsSlide&#39;,&#39;<?php echo ($vo['id']); ?>&#39;)"></a><?php endif; ?>
		            <input name="txtSortId[<?php echo ($k); ?>]" type="text" value="<?php echo ($vo['sort_id']); ?>" id="<?php echo ($vo['id']); ?>" class="sort" onkeypress="" onfocus="remember(this);" onblur="postNewSortnum(this);" />
		          </div>
		          <div class="foot">
		            <p class="time"><?php echo ($vo['add_time']); ?></p>
		            <a href="/index.php/MomuAdmin/Article/article_edit/channel_id/<?php echo ($channelid); ?>/id/<?php echo ($vo['id']); ?>" title="编辑" class="edit">编辑</a>
		          </div>
		        </div>
		      </li><?php endforeach; endif; else: echo "" ;endif; ?>
    
  
      <!-- <li>
        <div class="details nopic">
          <div class="check">
            <span class="checkall"><input id="rptList2_chkId_0" type="checkbox" name="rptList2$ctl01$chkId" /></span>
            <input type="hidden" name="rptList2$ctl01$hidId" id="rptList2_hidId_0" value="116" />
          </div>
          <div class="pic"><img src="/Public/Admin/skin/default/loadimg.gif" data-original="/Public/Admin/skin/default/loadimg.gif" /></div><i class="absbg"></i>
          <h1><span><a href="article_edit.aspx?action=Edit&channel_id=12&id=116">CRM专员</a></span></h1>
          <div class="remark">
            任职资格：1、数据分析能力强，至少掌握2种以上数据分析方法；2、具备一定的市场敏锐度和行业视野；3、熟悉OFFCIE办公软件，尤其精通EXCEL；4、沟通协调能力强，学习能力强，坚持原则。岗位职责：1、监控CRM数据，及时发现并报告异常数据；2、制定和修改CRM系统使用考核办法，…
          </div>
          <div class="tools">
            <a id="rptList2_lbtnIsMsg_0" title="设置评论" class="msg" href="javascript:__doPostBack(&#39;rptList2$ctl01$lbtnIsMsg&#39;,&#39;&#39;)"></a>
            <a id="rptList2_lbtnIsTop_0" title="设置置顶" class="top" href="javascript:__doPostBack(&#39;rptList2$ctl01$lbtnIsTop&#39;,&#39;&#39;)"></a>
            <a id="rptList2_lbtnIsRed_0" title="设置推荐" class="red" href="javascript:__doPostBack(&#39;rptList2$ctl01$lbtnIsRed&#39;,&#39;&#39;)"></a>
            <a id="rptList2_lbtnIsHot_0" title="设置热门" class="hot" href="javascript:__doPostBack(&#39;rptList2$ctl01$lbtnIsHot&#39;,&#39;&#39;)"></a>
            <a id="rptList2_lbtnIsSlide_0" title="设置幻灯片" class="pic" href="javascript:__doPostBack(&#39;rptList2$ctl01$lbtnIsSlide&#39;,&#39;&#39;)"></a>
            <input name="rptList2$ctl01$txtSortId" type="text" value="99" id="rptList2_txtSortId_0" class="sort" onkeypress="return (/[\d]/.test(String.fromCharCode(event.keyCode)));" />
          </div>
          <div class="foot">
            <p class="time">2016-01-22 02:41:47</p>
            <a href="article_edit.aspx?action=Edit&channel_id=12&id=116" title="编辑" class="edit">编辑</a>
          </div>
        </div>
      </li>
      
      <li>
        <div class="details nopic">
          <div class="check">
            <span class="checkall"><input id="rptList2_chkId_2" type="checkbox" name="rptList2$ctl03$chkId" /></span>
            <input type="hidden" name="rptList2$ctl03$hidId" id="rptList2_hidId_2" value="1801" />
          </div>
          
          <h1><span><a href="article_edit.aspx?action=Edit&channel_id=6&id=1801">研祥获中国电子信息百强企业</a></span></h1>
          <div class="remark">
            百强企业从规模、效益、研发创新等方面进行综合评价。其中，规模包括资产和收入规模；效益包括企业的盈利能力、发展能力、债务偿还能力以及经营能力四个方面；研发能力包括研发投入比例和专利数量两个方面。通过选取具有代表性的指标并赋予适当的权重进行加权计算，得出企…
          </div>
          <div class="tools">
            <a id="rptList2_lbtnIsMsg_2" title="设置评论" class="msg" href="javascript:__doPostBack(&#39;rptList2$ctl03$lbtnIsMsg&#39;,&#39;&#39;)"></a>
            <a id="rptList2_lbtnIsTop_2" title="设置置顶" class="top" href="javascript:__doPostBack(&#39;rptList2$ctl03$lbtnIsTop&#39;,&#39;&#39;)"></a>
            <a id="rptList2_lbtnIsRed_2" title="设置推荐" class="red" href="javascript:__doPostBack(&#39;rptList2$ctl03$lbtnIsRed&#39;,&#39;&#39;)"></a>
            <a id="rptList2_lbtnIsHot_2" title="设置热门" class="hot" href="javascript:__doPostBack(&#39;rptList2$ctl03$lbtnIsHot&#39;,&#39;&#39;)"></a>
            <a id="rptList2_lbtnIsSlide_2" title="设置幻灯片" class="pic" href="javascript:__doPostBack(&#39;rptList2$ctl03$lbtnIsSlide&#39;,&#39;&#39;)"></a>
            <input name="rptList2$ctl03$txtSortId" type="text" value="0" id="rptList2_txtSortId_2" class="sort" onkeypress="return (/[\d]/.test(String.fromCharCode(event.keyCode)));" />
          </div>
          <div class="foot">
            <p class="time">2015-12-18 00:00:00</p>
            <a href="article_edit.aspx?action=Edit&channel_id=6&id=1801" title="编辑" class="edit">编辑</a>
          </div>
        </div>
      </li> -->
  
      
    </ul>
  </div>
  
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
</script>
<!--/内容底部-->

</form>
</body>
</html>