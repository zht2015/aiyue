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
     <li><a href="<?php echo U('Source/index');?>">资源库</a></li>
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
</div>
		<div class="main-right">
			<div class="right-top">
				<div class="top-inner w740">
					<p class="top-text">您共收到 <span class="orange">122</span> 条站内信 ( <span class="orange">10</span> 条未读 )</p>
					<div class="search-inp">
						<input type="text" placeholder="搜索站内信"><a href="#"></a>
					</div>
				</div>
			</div>
			<div class="right-inner w740">
				<p class="message-p1">全部站内信 > 关于 “<span class="orange">孩子</span>” 的搜索结果</p>
				<div class="message-list">
					<ul>
						<li class="clearfix">
							<div class="mess-left">
								<span class="read-no"><i></i>未读</span>
							</div>
							<div class="mess-right">
								<div class="mess-con clearfix">
									<p class="mess-title">消息标题：《夏洛特的网》是一本好书.在我们生活里有一种宝贵的财富叫友谊</p>
									<span class="mess-date">日期：2015-02-04</span>
									<span class="mess-view"><a href="javascript:;">查看</a> / <a href="javascript:;">删除</a></span>
								</div>
								<div class="mess-text">《夏洛特的网》是一本好书.在我们生活里有一种宝贵的财富叫友谊,它是用金钱买不到的.要是我们的人生里没有朋友,没有友谊,你将会是多么孤独呀!但是威尔伯的一生却是那么幸福.因为它有一个成天陪伴它,而且为了救他牺牲自己生命的朋友.威尔伯注定不会孤单《夏洛特的网》是一本好书.在我们生活里有一种宝贵的财富叫友谊,它是用金钱买不到的.要是我们的人生里没有朋友,没有友谊,你将会是多么孤独呀!但是威尔伯的一生却是那么幸福.因为它有一个成天陪伴它,而且为了救他牺牲自己生命的朋友.威尔伯注定不会孤单《夏洛特的网》是一本好书.在我们生活里有一种宝贵的财富叫友谊,它是用金钱买不到的.要是我们的人生里没有朋友,没有友谊,你将会是多么孤独呀!但是威尔伯的一生却是那么幸福.因为它有一个成天陪伴它,而且为了救他牺牲自己生命的朋友.威尔伯注定不会孤单</div>
							</div>
						</li>
						<li class="clearfix">
							<div class="mess-left">
								<span class="read-yes"><i></i>已读</span>
							</div>
							<div class="mess-right">
								<div class="mess-con">
									<p class="mess-title">消息标题：《夏洛特的网》是一本好书.在我们生活里有一种宝贵的财富叫友谊</p>
									<span class="mess-date">日期：2015-02-04</span>
									<span class="mess-view"><a href="javascript:;">查看</a> / <a href="javascript:;">删除</a></span>
								</div>
							</div>
						</li>
						<li class="clearfix">
							<div class="mess-left">
								<span class="read-yes"><i></i>已读</span>
							</div>
							<div class="mess-right">
								<div class="mess-con">
									<p class="mess-title">消息标题：《夏洛特的网》是一本好书.在我们生活里有一种宝贵的财富叫友谊</p>
									<span class="mess-date">日期：2015-02-04</span>
									<span class="mess-view"><a href="javascript:;">查看</a> / <a href="javascript:;">删除</a></span>
								</div>
							</div>
						</li>
						<li class="clearfix">
							<div class="mess-left">
								<span class="read-yes"><i></i>已读</span>
							</div>
							<div class="mess-right">
								<div class="mess-con">
									<p class="mess-title">消息标题：《夏洛特的网》是一本好书.在我们生活里有一种宝贵的财富叫友谊</p>
									<span class="mess-date">日期：2015-02-04</span>
									<span class="mess-view"><a href="javascript:;">查看</a> / <a href="javascript:;">删除</a></span>
								</div>
							</div>
						</li>
						<li class="clearfix">
							<div class="mess-left">
								<span class="read-yes"><i></i>已读</span>
							</div>
							<div class="mess-right">
								<div class="mess-con">
									<p class="mess-title">消息标题：《夏洛特的网》是一本好书.在我们生活里有一种宝贵的财富叫友谊</p>
									<span class="mess-date">日期：2015-02-04</span>
									<span class="mess-view"><a href="javascript:;">查看</a> / <a href="javascript:;">删除</a></span>
								</div>
							</div>
						</li>
						<li class="clearfix">
							<div class="mess-left">
								<span class="read-yes"><i></i>已读</span>
							</div>
							<div class="mess-right">
								<div class="mess-con">
									<p class="mess-title">消息标题：《夏洛特的网》是一本好书.在我们生活里有一种宝贵的财富叫友谊</p>
									<span class="mess-date">日期：2015-02-04</span>
									<span class="mess-view"><a href="javascript:;">查看</a> / <a href="javascript:;">删除</a></span>
								</div>
							</div>
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
	$('.personal08').addClass('cur-li');
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