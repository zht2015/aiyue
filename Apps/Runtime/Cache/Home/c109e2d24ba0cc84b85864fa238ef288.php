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
    <?php else: ?>
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
      </div><?php endif; ?>

   </div>
 </div>
 <div class="hd-bottom">
   <div class="hd-main">
   <div class="logo2"><a href="#"><img src="/Public/Home/images2/logo2.png"></a></div>
   <div class="home-nav">
    <ul class="clearfix">
     <li class="cur"><a href="#">首页</a></li>
     <li><a href="#">关于我们</a></li>
     <li><a href="#">图书</a></li>
     <li><a href="#">研究</a></li>
     <li><a href="#">新闻BLOG</a></li>
     <li><a href="#">资源库</a></li>
    </ul>
   </div>
   </div>
 </div>
</div>
	<script type="text/javascript" src="/Public/Home/webuploader/webuploader.min.js"></script>
	<div class="main clearfix">
		<div class="main-left">
	<div class="head-pic">
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
			<li class="personal01 cur-li"><a href="#"><i></i>个人信息</a></li>
			<li class="personal02"><a href="#"><i></i>我的评价</a></li>
			<li class="personal03"><a href="#"><i></i>我的好友</a></li>
			<li class="personal04"><a href="#"><i></i>制作书单</a></li>
			<li class="personal05"><a href="#"><i></i>上传图书</a></li>
			<li class="personal06"><a href="#"><i></i>我的收藏</a></li>
			<li class="personal07"><a href="#"><i></i>读书笔记</a></li>
			<li class="personal10"><a href="#"><i></i>阅读记录</a></li>
			<li class="personal08"><a href="#"><i></i>站内信</a></li>
			<li class="personal09"><a href="#"><i></i>意见反馈</a></li>
		</ul>
	</div>
</div>

		<div class="main-right">
			<div class="right-top">
				<div class="per-top">
					<a href="/index.php/Home/Users/userInfo" class="per-span">个人资料</a>
					<a href="/index.php/Home/Users/uploadAvatar" class="per-span cur-per">修改头像</a>
					<a href="/index.php/Home/Users/userInfo" class="per-span">修改密码</a>
				</div>
			</div>
		
			<div class="right-inner change-head w740">
				<p class="per-title"><i class="hongxing">*</i>请选用规定尺寸头像，血腥、暴力图片不得使用</p>
				<div class="head-inner clearfix">
					<div class="head-wrap">
						<img src="<?php echo ($user["avatar"]); ?>" alt="" id="show_img">
					</div>
					<div class="head-text">
						<!-- <span class="select-pic">选择图片<input type="file" name="photo" id="photo"></span> -->
						<p id='header_img' ></p>
			    		<div id="filePicker">选择图片</div>
						<p>jpg、gif、png格式，尺寸要求：180x180/px</p>
					</div>
				</div>
				
			</div>			
		
			<style type="text/css">
				.webuploader-container {
					position: relative;
				}
				.webuploader-element-invisible {
					position: absolute !important;
					clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
				    clip: rect(1px,1px,1px,1px);
				}
				.webuploader-pick {
					position: relative;
					display: inline-block;
					cursor: pointer;
					background: #00b7ee;
					padding: 10px 15px;
					color: #fff;
					text-align: center;
					border-radius: 3px;
					overflow: hidden;
				}
				.webuploader-pick-hover {
					background: #00a2d4;
				}

				.webuploader-pick-disable {
					opacity: 0.6;
					pointer-events:none;
				}
			</style>
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
				        server: "<?php echo U('Users/uploadIdCart');?>",

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
	                        $('#header_img').val(img_url);
	                        $('#show_img').attr('src',img_url);
	                        layer.msg('上传成功', {icon: 5});
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

		</div>

	</div>









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