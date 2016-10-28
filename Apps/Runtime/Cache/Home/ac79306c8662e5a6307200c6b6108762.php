<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
<title>爱阅</title>
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


	<link rel="stylesheet" href="/Public/Home/css/ScrollbarY.css">
	<script src="/Public/Home/js/jquery.mCustomScrollbar.concat.min.js"></script>
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
			<div class="right-inner w740">
				<div class="file-top">
					<p>上传您觉得不错或平台缺少的图书，如果通过的话，将会在平台上展示。感谢您的奉献，带给孩子们一个缤纷的世界。</p>
				</div>
				<div class="file-inner">
					<div class="file-inp clearfix">
						<span class="file-left"><i class="hongxing">*</i>图书名称：</span>
						<div class="file-right">
							<input type="text" id="bookname">
						</div>
					</div>
					<div class="file-inp clearfix">
						<span class="file-left"><i class="hongxing">*</i>图书作者：</span>
						<div class="file-right">
							<input type="text" id="author">
						</div>
					</div>
					<div class="file-inp clearfix">
						<span class="file-left"><i class="hongxing">*</i>出版社：</span>
						<div class="file-right cbs">
							<div class="input-wrap">
								<input type="text" placeholder="直接输入或点击下拉列表查找出版社" id="press">
								<i class="down-icon"><img src="/Public/Home/images/icon/book02.png" alt=""></i>
							</div>
							<div class="down-list">
								<div class="down-inner">
									<ul>
										<li>两只小猪加比索</li>
										<li>和风一般的日子</li>
										<li>我与童话书中的故事谈谈心</li>
										<li>七个小矮人的故事</li>
										<li>早起的鸟儿有虫吃</a></li>
										<li>十万个为什么</li>
										<li>两只小猪加比索</li>
										<li>和风一般的日子</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="file-inp clearfix">
						<span class="file-left"><i class="hongxing">*</i>图书封面：</span>
						<div class="file-right tsfm">
							<input type="text" placeholder="限JPG、PNG、GIF格式，图片清晰，单张图片小于3M" id="bookcover">
							<span class="tsfm-btn"><div id="filePicker">&nbsp;&nbsp;</div></span>
							<!-- <span class="tsfm-btn"><input type="file" id="filePicker"></span> -->
						</div>
					</div>
					<div class="file-inp clearfix">
						<span class="file-left">输入标签：</span>
						<div class="file-right srbq">
							<div class="input-wrap">
								<input type="text" placeholder="最多5个标签，单个不超过8个字" id="booktag">
								<i></i>
							</div>
						</div>
					</div>
					<div class="file-inp clearfix">
						<span class="file-left">我的标签：</span>
						<div class="file-right wdbq">
							<ul>
								
							</ul>
						</div>
					</div>
					<div class="file-inp clearfix">
						<span class="file-left">推荐标签：</span>
						<div class="file-right tjbq">
							<ul>
								<?php if(is_array($tag)): foreach($tag as $key=>$vo): ?><li><span><?php echo ($vo["bqtitle"]); ?></span></li><?php endforeach; endif; ?>
								
							</ul>
						</div>
					</div>
					<a href="javascript:void(0)" class="file-sure" onclick="uploadBook();">确认上传</a>
				</div>
			</div>
		</div>
	</div>

	<!--滚动条-->
	<script type='text/javascript'>
		$(function(){
			$(window).load(function(){
				$(".down-inner").mCustomScrollbar();
			});
		})

		/**出版社下拉**/
		$('.down-inner ul li').click(function(){
			var press= $(this).text();
			$('#press').val(press);
		})

		/**左侧导航**/
		$('.personal ul li').removeClass('cur-li');
		$('.personal05').addClass('cur-li');

		/**我的标签**/

		$('#booktag').bind('keypress',function(event){
			var booktag=$("#booktag").val();
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

		/*上传图书*/
		function uploadBook(){
		    var bookname=$("#bookname").val();
		    var author=$("#author").val();
		    var press=$("#press").val();
		    var bookcover=$("#bookcover").val();
		    var tag = "";
		    $(".wdbq ul li").each(function(){
			   tag += $(this).text()+","
			 });
		    tag=tag.substring(0,tag.length-1);
		    if(bookname==""){layer.tips('图书名称不能为空', '#bookname');return false}
		    if(author==""){layer.tips('图书作者不能为空', '#author');return false}
		    if(press==""){layer.tips('出版社不能为空', '#press');return false}
		    if(bookcover==""){layer.tips('图书封面不能为空', '#bookcover');return false}
			


		    $.post("<?php echo U('Home/Book/uploadBook');?>",{"bookname":bookname,"author":author,"press":press,"bookcover":bookcover,"tag":tag},function(data) {
		    	console.log("ccc");
		    	if(data.status==1){
		    		layer.msg('您好！感谢您的热心与慷慨。让我们共同努力，带给贫困地区的孩子们更多的机会，您的举动也许十分简单，您的贡献也许十分微薄，但当小溪汇成河流，河流涌入大海，我们的行动将改变全中国的明天。', {icon: 6});
		    	}else if(data.status==-1){
		    		layer.msg('您的图书上传失败，原因可能是检索不到该图书的信息，请检查后再重新上传试试，如有疑问可拨打客服电话 400-800-9999', {icon: 5});
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
                    
                    $('#bookcover').val(img_url);
                    $('#show_img').attr('src',img_url);
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