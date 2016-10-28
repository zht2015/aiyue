<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="/Public/Home/css/style.css">
	<script src="/Public/Home/js/jquery-1.8.2.min.js"></script>
	<script src="/Public/Home/js/script.js"></script>
</head>
<body>
	<!--头部-->
	<div class="header">
		<div class="hd-top">
			<!--退出登录之后显示-->
			<div class="hd-main black">
				<h1 class="logo"><a href="#"></a></h1>
				<div class="login-model" style="display:block">
					<a href="#">登陆</a>|
					<a href="#">注册</a>
				</div>
			</div>
			<!--登陆之后显示-->
			<div class="vip-hd" style="display:none">
				<div class="hd">
					<a href="javascript:;" class="name">明天出版社6464654654654654</a>
				</div>
				<div class="vip-hide-nav">
					<ul>
						<li class="s1"><a href="http://www.hao123.com" target="_blank">个人中心</a></li>
						<li class="s2 unread"><a href="#">评论</a></li>
						<li class="s3 unread"><a href="#">站内信</a></li>
						<li class="s4"><a href="#">退出</a></li>
					</ul>
				</div>
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
	<div class="main clearfix">
		<div class="main-left">
			<div class="head-pic">
				<img src="/Public/Home/images/head01.jpg" alt="">
			</div>
			<span class="head-name">SmartCoach<i class="renzheng-icon"></i></span>
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
					<a href="#" class="per-span">个人资料</a>
					<a href="#" class="per-span cur-per">修改头像</a>
					<a href="#" class="per-span">修改密码</a>
				</div>
			</div>
			<div class="right-inner change-head w740">
				<p class="per-title"><i class="hongxing">*</i>请选用规定尺寸头像，血腥、暴力图片不得使用</p>
				<div class="head-inner clearfix">
					<div class="head-wrap">
						<img src="<?php echo ($user["avatar"]); ?>" alt="">
					</div>
					<div class="head-text">
						<span class="select-pic">选择图片<input type="file"></span>
						<p>jpg、gif、png格式，尺寸要求：180x180/px</p>
					</div>
				</div>
				<a href="#" class="submit-save">提交保存</a>
			</div>
		</div>
	</div>
	<!--底部-->
	<div class="footer">
		<div class="footer-main">
			<p class="f-nav">
				<a href="#">首页</a>|
				<a href="#">关于我们</a>|
				<a href="#">图书</a>|
				<a href="#">研究</a>|
				<a href="#">新闻BLOG</a>|
				<a href="#">论坛/奖项</a>|
				<a href="#">资源库</a>
			</p>
			<p class="other">
				<span>Copyright ©2015 iread All Rights Reserved</span> 
				<span>designed by : <a href="#">momu</a></span>
			</p>
		</div>
	</div>
</body>
</html>