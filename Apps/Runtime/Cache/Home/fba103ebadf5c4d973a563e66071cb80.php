<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
<title><?php echo ((isset($title) && ($title !== ""))?($title):"爱阅"); ?></title>
<link href="/Public/Home/style/comm.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="/Public/Home/css/style.css">
<!--[if lt IE 9]>
<script src="js/css3-mediaqueries.js"></script>
<![endif]-->
<script src="/Public/Home/js/jquery-1.8.2.min.js"></script>
<script src="/Public/Home/js/comm.js"></script>
<script src="/Public/Home/js/script.js"></script>
<script type="text/javascript" src="/Public/layer/layer.js"></script>
</head>

<body>
<div id="content-wrap">
<div class="header">
 <div class="hd-top">
   <div class="hd-main black">
    <h1 class="logo"><a href="#"></a></h1>
    <?php if($user == ''): ?><div class="login-model">
       <a href="/index.php/Home/Users/userLogin.html">登陆</a>|
       <a href="/index.php/Home/Users/userRegister.html">注册</a>
      </div>

    <?php elseif($user["user_type"] == 0): ?>

      <div class="vip-hd">
       <div class="hd">
        <a href="javascript:;" class="name"><?php echo ($user["user_name"]); ?></a>
       </div>
       <div class="vip-hide-nav">
        <ul>
         <li class="s1"><a href="<?php echo U('Users/userinfo');?>">个人中心</a></li>
         <li class="s2 unread"><a href="#">评论</a></li>
         <li class="s3 unread"><a href="#">站内信</a></li>
         <li class="s4"><a href="<?php echo U('Users/logout');?>">退出</a></li>
        </ul>
       </div>
      </div>

      <?php elseif($user["user_type"] == 1): ?>
        <div class="vip-hd">
         <div class="hd">
          <a href="javascript:;" class="name"><?php echo ($user["user_name"]); ?></a>
         </div>
         <div class="vip-hide-nav">
          <ul>
           <li class="s1"><a href="<?php echo U('Users/pressCenter');?>">个人中心</a></li>
           <li class="s2 unread"><a href="#">评论</a></li>
           <li class="s3 unread"><a href="#">站内信</a></li>
           <li class="s4"><a href="<?php echo U('Users/logout');?>">退出</a></li>
          </ul>
         </div>
        </div><?php endif; ?>

   </div>
 </div>
 <div class="hd-bottom">
   <div class="hd-main">
   <div class="logo2"><a href="#"><img src="/Public/Home/images2/logo2.png"></a></div>
   <div class="home-nav">
    <ul class="clearfix">
     <li class="cur"><a href="<?php echo U('Index/index');?>">首页</a></li>
     <li><a href="<?php echo U('Index/AboutUs');?>">关于我们</a></li>
     <li><a href="<?php echo U('Book/tsList');?>">图书</a></li>
     <li><a href="<?php echo U('Study/index');?>">研究</a></li>
     <li><a href="<?php echo U('NewsBlog/awards');?>">新闻BLOG</a></li>
     <li><a href="<?php echo U('Source/index');?>">资源库</a></li>
    </ul>
   </div>
   </div>
 </div>
</div>
	<script type="text/javascript" src="/Public/Home/webuploader/webuploader.min.js"></script>
	<div class="main clearfix">
		
<div class="main-left">

<?php if($user["user_type"] == 0): ?><div class="head-pic">
		<img src="<?php echo ($user["avatar"]); ?>" alt="">
	</div>
	<span class="head-name"><?php echo ($user["user_name"]); ?><i class="renzheng-icon"></i></span>
	<div class="attention clearfix">
		<a href="#" class="attention-each">
			<span>255</span><br/>被关注
		</a>
		<a href="#" class="attention-each">
			<span>255</span><br/>关注
		</a>
		<a href="#" class="attention-each last">
			<i class="have-pass"></i><br/>已认证
		</a>
	</div>
	<div class="personal">

		<ul>
			<li class="personal01 cur-li"><a href="<?php echo U('Users/userInfo');?>"><i></i>个人信息</a></li>
			<li class="personal02"><a href="<?php echo U('Comment/myComment');?>"><i></i>我的评价</a></li>
			<li class="personal03"><a href="<?php echo U('Users/myFollow');?>"><i></i>我的好友</a></li>
			<li class="personal04"><a href="<?php echo U('Book/bookList');?>"><i></i>制作书单</a></li>
			<li class="personal05"><a href="<?php echo U('Book/uploadBook');?>"><i></i>上传图书</a></li>
			<li class="personal06"><a href="<?php echo U('Collect/collectSd');?>"><i></i>我的收藏</a></li>
			<li class="personal07"><a href="<?php echo U('Book/readingNotes');?>"><i></i>读书笔记</a></li>
			<li class="personal10"><a href="<?php echo U('Book/readingRecord');?>"><i></i>阅读记录</a></li>
			<li class="personal08"><a href="<?php echo U('Users/message');?>"><i></i>站内信</a></li>
			<li class="personal09"><a href="<?php echo U('Users/feedBack');?>"><i></i>意见反馈</a></li>
		</ul>
	</div>

<?php elseif($user["user_type"] == 1): ?>

	<div class="head-pic">
		<img src="<?php echo ($user["avatar"]); ?>" alt="">
	</div>
	<span class="head-name"><?php echo ($user["user_name"]); ?><i class="renzheng-icon2"></i></span>
	<p class="per-atten"><a href="#" class="orange">827人</a> 关注我</p>
	<div class="personal">
		<ul>
			<li class="personal11 cur-li"><a href="<?php echo U('Users/pressCenter');?>"><i></i>我的信息</a></li>
			<li class="personal04"><a href="<?php echo U('Book/press_booklist');?>"><i></i>上传书单</a></li>
			<li class="personal05"><a href="<?php echo U('Book/recommendBooks');?>"><i></i>推荐图书</a></li>
			<li class="personal06"><a href="#"><i></i>收藏书单</a></li>
			<li class="personal03"><a href="#"><i></i>我的好友</a></li>
			<li class="personal08"><a href="#"><i></i>站内信</a></li>
		</ul>
	</div><?php endif; ?>


</div>



		<div class="main-right">
			<div class="right-top">
				<div class="top-inner w740">
					<p class="top-text"><img src="/Public/Home/images/icon/personal06.png" alt="">您已制作了 <span class="orange">10</span> 份书单<a href="javascript:void(0);" class="white-note" id="make-new-booklist">制作新的书单</a></p>
					<div class="search-inp">
						<input type="text" placeholder="搜索书单名称"><a href="#"></a>
					</div>
				</div>
			</div>
			<div class="right-inner result-inner w740">
				<!-- <div class="result-title">全部书单 > 关于 “<span class="orange">孩子</span>” 的搜索结果</div> -->
				<div class="search-result sd">
					<ul>
						<?php if(is_array($bookListInfo)): foreach($bookListInfo as $key=>$vo): ?><li class="clearfix">
							<span class="pic02"><img src="<?php echo ($vo["booklist_cover"]); ?>" alt=""></span>
							<div class="note-info">
								<a href="/index.php/Home/Book/editSd/id/<?php echo ($vo["id"]); ?>.html">书单名称：《<?php echo ($vo["booklist_name"]); ?>》</a>
								<span class="note-date">创建日期：<?php echo ($vo["c_time"]); ?></span>
							</div>
							<div class="sd-praise">
								<span class="sd-praise1">点赞数：<span class="orange">115</span></span>
								<span class="sd-praise2">收藏数：<span class="orange">115</span></span>
							</div>
							<span class="edit-del"><a href="#">编辑</a> / <a href="#">删除</a></span>
						</li><?php endforeach; endif; ?>
					</ul>
				</div>
				<div class="page">
					<?php echo ($show); ?>
				</div>
			</div>
		</div>
	</div>


<!-- 	弹窗 遮罩 制作书单-->
<div class="mask"></div>
<div class="pop book01-pop">
	<div class="book01-inner">
		<div class="book01-top"><img src="/Public/Home/images/icon/book06.png" alt="">请输入您的书单资料</div>
		<input type="text" placeholder="动物科普童话，小孩子小学读的书单" class="input01" id="booklist_name">
		<span class="span01"></span>
		<div class="book01-file clearfix">
			<input type="text" placeholder="上传书单封面" id="booklist_cover">
			<span class="book01-span">
			<span class="book01-span"><div id="filePicker">&nbsp;&nbsp;</div></span>
		</div>
		<span class="span02">输入标签：</span>
		<div class="book01-dui clearfix">
			<input type="text" placeholder="最多5个标签，单个不超过8个字" id="booktag">
			<span></span>
		</div>
		<div class="wdbq clearfix">
			<ul>
				<li><span>儿童教育</span></li>
				<li><span>经济</span></li>
				<li><span>管理培训</span></li>
			</ul>
		</div>
		<span class="span03">推荐标签：</span>
		<div class="tjbq clearfix">
			<ul>
				<li><span>儿童教育</span></li>
				<li><span>神话</span></li>
				<li><span>经济</span></li>
				<li><span>管理培训</span></li>
				<li><span>自然</span></li>
				<li><span>人文社科</span></li>
				<li><span>大百科</span></li>
				<li><span>小说</span></li>
			</ul>
		</div>
		<textarea name="" class="book01-text" placeholder="请输入书单描述，不超过200字" id="booklist_discription"></textarea>
		<textarea name="" class="book01-text" placeholder="推荐理由（可不填）" id="recomend"></textarea>
		<a href="javascript:void(0);" class="scsd" onclick="makeBookList()">生成书单</a>
		<a href="#" class="book01-close"></a>
	</div>
</div> 



	<script type="text/javascript">
		/**左侧导航**/
		$('.personal ul li').removeClass('cur-li');
		$('.personal04').addClass('cur-li');
		$('#make-new-booklist').click(function(){
			$(".mask").show();
			$('.pop').show();
		})
			
		/**书单标签**/

		$('#booktag').bind('keypress',function(event){
			var booktag=$("#booktag").val();console.log(booktag);
			if(event.keyCode == "13"){
				if(booktag!=""){
					var lilength = $(".wdbq ul li").length;
					if(lilength>4){layer.tips('标签超过5个', '.wdbq');return false}
            		if(booktag.length>8){layer.tips('标签长度超过8个字', '#booktag');return false}
                	$(".wdbq ul").append("<li><span>"+booktag+"</span></li>");
                	
                	$(".wdbq ul").trigger("create");
            	}
			}
            
        });

        /**推荐标签**/
        $('.tjbq li').live('hover',function(event){
            $(this).toggleClass('bq-del');
        });
        $('.tjbq li').live('click',function(){
        	var lilength = $(".wdbq ul li").length;
			if(lilength>4){layer.tips('标签超过5个', '.wdbq');return false}			
        	var tag = $(this).children("span").html();
        	$(".wdbq ul").append("<li><span>"+tag+"</span></li>"); 
            $(this).remove();
        })

				function makeBookList(){
					var booklist_name = $("#booklist_name").val();
					var booklist_cover = $("#booklist_cover").val();
					var booklist_discription = $("#booklist_discription").val();
					var recomend = $("#recomend").val();
					var tag = "";
					$(".wdbq ul li").each(function(){
						   tag += $(this).text()+","
					});
					tag=tag.substring(0,tag.length-1);
					if(booklist_name==""){layer.tips("书单名称不能为空","#booklist_name");return false}
					if(booklist_cover==""){layer.tips("请上传书单封面","#booklist_cover");return false}
					if(booklist_discription==""){layer.tips("书单描述不能为空","#booklist_discription");return false}

				    $.post("<?php echo U('Home/Book/makeBookList');?>",{"booklist_name":booklist_name,"booklist_cover":booklist_cover,"booklist_discription":booklist_discription,"recomend":recomend,"booklist_tag":tag},function(data) {
				    	console.log("ccc");
				    	if(data.status==1){
				    		layer.msg('书单制作成功', {icon: 6});
				    		location.href="<?php echo U('Home/Book/bookList');?>";
				    	}else if(data.status==-1){
				    		layer.msg('书单制作失败', {icon: 5});
				    	}
					});
				}
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
			        server: "<?php echo U('Book/uploadcover');?>",

			        // 选择文件的按钮。可选。
			        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
			        pick: '#filePicker',

			        // 只允许选择图片文件。
			        accept: {
			            title: 'Images',
			            extensions: 'gif,jpg,jpeg,bmp,png',
			            mimeTypes: 'image/*'
			        }
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
	                    var img_url = (data.savepath + 'thumb_' + data.savename).substr(1);
	                    console.log(img_url);
	                    $('#booklist_cover').val(img_url);
	                    
	                    layer.close(index);
	                } else{
	                    layer.msg('上传失败，请重试', {icon: 5});
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


<div class="footer">
<div class="footer-main">
<p class="f-nav"><a href="#">首页</a>|<a href="#"> 关于我们  </a>|<a href="#">图书</a>|<a href="#">研究 </a>|
<a href="#">新闻BLOG</a>|
<a href="#">论坛/奖项 </a>|
<a href="#">资源库</a>
</p>
<p class="other"><span>Copyright ©2015 iread All Rights Reserved</span> 
<span>designed by : <a href="#">momu</a></span></p>                                  
</div>
</div>






<!-- <script>

    var archtectrue_1 = $('.archtectrue_1');
    var li = archtectrue_1.find('li');
    var archtectrue_top = archtectrue_1.offset().top;
    var js_box = $('.js_box');

    window.onscroll = function () {
        var st = document.documentElement.scrollTop || document.body.scrollTop;
        if(st >=archtectrue_top  - 10){
            archtectrue_1.addClass('fixed')

        }else{
            archtectrue_1.removeClass('fixed')

        };


        for(var i=0;i<js_box.length;i++){
            if(st  >=$(js_box[i]).offset().top){
                li.eq(i).addClass('active').siblings().removeClass('active')
            }
        }
    }

    function logout(){
        $.post("<?php echo U('Home/Users/logout');?>",function(data){
            location.reload();
        })
    }
</script> -->
</body>
</html>