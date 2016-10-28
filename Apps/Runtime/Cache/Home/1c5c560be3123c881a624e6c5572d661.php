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
     <li class="cur"><a href="<?php echo U('Index/index');?>">首页</a></li>
     <li><a href="<?php echo U('Index/AboutUs');?>">关于我们</a></li>
     <li><a href="<?php echo U('Book/tsList');?>">图书</a></li>
     <li><a href="<?php echo U('Study/index');?>">研究</a></li>
     <li><a href="<?php echo U('NewsBlog/awards');?>">新闻BLOG</a></li>
     <li><a href="#">资源库</a></li>
    </ul>
   </div>
   </div>
 </div>
</div>

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
			<li class="personal01 cur-li"><a href="<?php echo U('Users/userInfo');?>"><i></i>个人信息</a></li>
			<li class="personal02"><a href="#"><i></i>我的评价</a></li>
			<li class="personal03"><a href="#"><i></i>我的好友</a></li>
			<li class="personal04"><a href="<?php echo U('Book/bookList');?>"><i></i>制作书单</a></li>
			<li class="personal05"><a href="<?php echo U('Book/uploadBook');?>"><i></i>上传图书</a></li>
			<li class="personal06"><a href="<?php echo U('Collect/ucollectSd');?>"><i></i>我的收藏</a></li>
			<li class="personal07"><a href="<?php echo U('Book/readingNotes');?>"><i></i>读书笔记</a></li>
			<li class="personal10"><a href="<?php echo U('Book/readingRecord');?>"><i></i>阅读记录</a></li>
			<li class="personal08"><a href="<?php echo U('Users/message');?>"><i></i>站内信</a></li>
			<li class="personal09"><a href="<?php echo U('Users/feedBack');?>"><i></i>意见反馈</a></li>
		</ul>
	</div>
</div>
		<div class="main-right">
			<div class="right-top">
				<div class="per-top w850">
					<a href="#" class="per-span cur-per">收藏的书单</a>
					<a href="#" class="per-span">收藏的图书</a>
					<div class="search-inp friend-s">
						<input type="text" placeholder="输入关键词进行搜索"><a href="#"></a>
					</div>
				</div>
			</div>
			<div class="right-inner w850">
				<div class="collect-top clearfix">
					<div class="coll-sort">
						<ul>
							<li><a href="#">全部</a></li>
							<li><a href="#">6-7岁阅读</a></li>
							<li><a href="#">8-9岁阅读</a></li>
							<li><a href="#">9-10岁阅读</a></li>
							<li><a href="#" class="border-none">10-12岁阅读</a></li>
						</ul>
					</div>
					<div class="collect-change">
						<span class="coll-left"></span>
						<span class="coll-right"></span>
					</div>
					<a href="#" class="collect-empty"><img src="/Public/Home/images/icon/collect01.png" alt="">一键清空所有</a>
				</div>
				<div class="collect-inner clearfix">
					<ul>
						<li>
							<div class="book-pic">
								<img src="/Public/Home/images/book01.jpg" alt="">
								<div class="book-mask">
									<span class="book-view">
										<a href="#">查看书单</a>&nbsp;/&nbsp;<a href="#">编辑书单</a>
									</span>
								</div>
							</div>
							<div class="book-text">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</div>
							<a href="#" class="book-remove"></a>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/Home/images/book02.jpg" alt="">
								<div class="book-mask">
									<span class="book-view">
										<a href="#">查看书单</a>&nbsp;/&nbsp;<a href="#">编辑书单</a>
									</span>
								</div>
							</div>
							<div class="book-text">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</div>
							<a href="#" class="book-remove"></a>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/Home/images/book01.jpg" alt="">
								<div class="book-mask">
									<span class="book-view">
										<a href="#">查看书单</a>&nbsp;/&nbsp;<a href="#">编辑书单</a>
									</span>
								</div>
							</div>
							<div class="book-text">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</div>
							<a href="#" class="book-remove"></a>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/Home/images/book02.jpg" alt="">
								<div class="book-mask">
									<span class="book-view">
										<a href="#">查看书单</a>&nbsp;/&nbsp;<a href="#">编辑书单</a>
									</span>
								</div>
							</div>
							<div class="book-text">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</div>
							<a href="#" class="book-remove"></a>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/Home/images/book01.jpg" alt="">
								<div class="book-mask">
									<span class="book-view">
										<a href="#">查看书单</a>&nbsp;/&nbsp;<a href="#">编辑书单</a>
									</span>
								</div>
							</div>
							<div class="book-text">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</div>
							<a href="#" class="book-remove"></a>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/Home/images/book02.jpg" alt="">
								<div class="book-mask">
									<span class="book-view">
										<a href="#">查看书单</a>&nbsp;/&nbsp;<a href="#">编辑书单</a>
									</span>
								</div>
							</div>
							<div class="book-text">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</div>
							<a href="#" class="book-remove"></a>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/Home/images/book01.jpg" alt="">
								<div class="book-mask">
									<span class="book-view">
										<a href="#">查看书单</a>&nbsp;/&nbsp;<a href="#">编辑书单</a>
									</span>
								</div>
							</div>
							<div class="book-text">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</div>
							<a href="#" class="book-remove"></a>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/Home/images/book02.jpg" alt="">
								<div class="book-mask">
									<span class="book-view">
										<a href="#">查看书单</a>&nbsp;/&nbsp;<a href="#">编辑书单</a>
									</span>
								</div>
							</div>
							<div class="book-text">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</div>
							<a href="#" class="book-remove"></a>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/Home/images/book01.jpg" alt="">
								<div class="book-mask">
									<span class="book-view">
										<a href="#">查看书单</a>&nbsp;/&nbsp;<a href="#">编辑书单</a>
									</span>
								</div>
							</div>
							<div class="book-text">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</div>
							<a href="#" class="book-remove"></a>
						</li>
					</ul>
				</div>
				<div class="page">
					<span class="prev"></span>
					<a href="#" class="cur">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">..</a>
					<a href="#">99</a>
					<a href="#">100</a>
					<span class="next"></span>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		/**左侧导航**/
		$('.personal ul li').removeClass('cur-li');
		$('.personal06').addClass('cur-li');
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