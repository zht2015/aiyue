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
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/ScrollbarY.css">
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="js/script.js"></script>
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
				<div class="logo2"><a href="#"><img src="images2/logo2.png"></a></div>
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
				<img src="images/head01.jpg" alt="">
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
					<li class="personal01"><a href="#"><i></i>个人信息</a></li>
					<li class="personal02"><a href="#"><i></i>我的评价</a></li>
					<li class="personal03"><a href="#"><i></i>我的好友</a></li>
					<li class="personal04"><a href="#"><i></i>制作书单</a></li>
					<li class="personal05"><a href="#"><i></i>上传图书</a></li>
					<li class="personal06"><a href="#"><i></i>我的收藏</a></li>
					<li class="personal07 cur-li"><a href="#"><i></i>读书笔记</a></li>
					<li class="personal10"><a href="#"><i></i>阅读记录</a></li>
					<li class="personal08"><a href="#"><i></i>站内信</a></li>
					<li class="personal09"><a href="#"><i></i>意见反馈</a></li>
				</ul>
			</div>
		</div>
		<div class="main-right">
			<div class="right-top">
				<div class="top-inner w740">
					<p class="top-text"><img src="images/icon/personal04.png" alt="">您已经撰写了 <span class="orange">10</span> 份笔记<a href="#" class="white-note">写新的笔记</a></p>
					<div class="search-inp">
						<input type="text" placeholder="请输入笔记名称"><a href="#"></a>
					</div>
				</div>
			</div>
			<div class="right-inner result-inner w740">
				<div class="result-title">全部笔记 > 关于 “<span class="orange">孩子</span>” 的搜索结果</div>
				<div class="search-result">
					<ul>
						<li class="clearfix">
							<span class="pic01"><img src="images/icon/personal03.png" alt=""></span>
							<div class="note-info">
								<a href="#">笔记名称：《关于三只小熊的读后感》</a>
								<span class="note-date">创建日期：2015-09-10</span>
							</div>
							<span class="edit-del"><a href="#">编辑</a> / <a href="#">分享</a> / <a href="#">删除</a></span>
						</li>
						<li class="clearfix">
							<span class="pic01"><img src="images/icon/personal03.png" alt=""></span>
							<div class="note-info">
								<a href="#">笔记名称：《关于三只小熊的读后感》</a>
								<span class="note-date">创建日期：2015-09-10</span>
							</div>
							<span class="edit-del"><a href="#">编辑</a> / <a href="#">分享</a> / <a href="#">删除</a></span>
						</li>
						<li class="clearfix">
							<span class="pic01"><img src="images/icon/personal03.png" alt=""></span>
							<div class="note-info">
								<a href="#">笔记名称：《关于三只小熊的读后感》</a>
								<span class="note-date">创建日期：2015-09-10</span>
							</div>
							<span class="edit-del"><a href="#">编辑</a> / <a href="#">分享</a> / <a href="#">删除</a></span>
						</li>
						<li class="clearfix">
							<span class="pic01"><img src="images/icon/personal03.png" alt=""></span>
							<div class="note-info">
								<a href="#">笔记名称：《关于三只小熊的读后感》</a>
								<span class="note-date">创建日期：2015-09-10</span>
							</div>
							<span class="edit-del"><a href="#">编辑</a> / <a href="#">分享</a> / <a href="#">删除</a></span>
						</li>
						<li class="clearfix">
							<span class="pic01"><img src="images/icon/personal03.png" alt=""></span>
							<div class="note-info">
								<a href="#">笔记名称：《关于三只小熊的读后感》</a>
								<span class="note-date">创建日期：2015-09-10</span>
							</div>
							<span class="edit-del"><a href="#">编辑</a> / <a href="#">分享</a> / <a href="#">删除</a></span>
						</li>
						<li class="clearfix">
							<span class="pic01"><img src="images/icon/personal03.png" alt=""></span>
							<div class="note-info">
								<a href="#">笔记名称：《关于三只小熊的读后感》</a>
								<span class="note-date">创建日期：2015-09-10</span>
							</div>
							<span class="edit-del"><a href="#">编辑</a> / <a href="#">分享</a> / <a href="#">删除</a></span>
						</li>
						<li class="clearfix">
							<span class="pic01"><img src="images/icon/personal03.png" alt=""></span>
							<div class="note-info">
								<a href="#">笔记名称：《关于三只小熊的读后感》</a>
								<span class="note-date">创建日期：2015-09-10</span>
							</div>
							<span class="edit-del"><a href="#">编辑</a> / <a href="#">分享</a> / <a href="#">删除</a></span>
						</li>
						<li class="clearfix">
							<span class="pic01"><img src="images/icon/personal03.png" alt=""></span>
							<div class="note-info">
								<a href="#">笔记名称：《关于三只小熊的读后感》</a>
								<span class="note-date">创建日期：2015-09-10</span>
							</div>
							<span class="edit-del"><a href="#">编辑</a> / <a href="#">分享</a> / <a href="#">删除</a></span>
						</li>
						<li class="clearfix">
							<span class="pic01"><img src="images/icon/personal03.png" alt=""></span>
							<div class="note-info">
								<a href="#">笔记名称：《关于三只小熊的读后感》</a>
								<span class="note-date">创建日期：2015-09-10</span>
							</div>
							<span class="edit-del"><a href="#">编辑</a> / <a href="#">分享</a> / <a href="#">删除</a></span>
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
	<!--弹窗 遮罩-->
	<div class="mask"></div>
	<div class="pop note-pop">
		<div class="pop-wrap">
			<div class="pop-inner">
				<h3>关于三只小熊的读后感</h3>
				<p>是一本好书.在我们生活里有一种宝贵的财富叫友谊,它是用金钱买不到的.要是我们的人生里没有朋友,没有友谊,你将会是多么孤独呀!但是威尔伯的一生却是那么幸福.因为它有一个成天陪伴它,而且为了救他牺牲自己生命的朋友.威尔伯注定不会孤单.</p>
				<p>书中令我印象最深刻的莫过于夏洛和威尔伯之间的友情.一只蜘蛛给威尔伯第一感觉是可怕的,但是孤独很快就迫使他对夏洛有了进一步了解,并异常惊喜地发现夏洛其实有一颗善良的心.在威尔伯“我不想死啊,我不想死啊!”的哀号中,夏洛那一句坚定的“你不会死的,我救你!”</p>
				<p>留给我们深刻地印象.为了这个承诺,夏洛把毕生的精力,都投入其中,直到死亡的那一刻,它不要任何回报,这种友谊是单纯的,只有朋友间无私的关爱与生命中纯粹的友善.当现实中已经严重缺乏这样的感情的时候,这个故事感动了读者的心.每个读者大概都在羡慕着威尔伯有个夏洛,夏洛有个威尔伯吧,正是他们之间的互相理解,互相关怀,才让我们感受到友谊的可贵.读完了《夏洛特的网》后,书中的夏洛和威尔伯之间的友情,深深地打动了我……</p>
				<p>这本书主要讲述是在朱克曼家的谷仓里,住着一群小动物,其中小猪威尔伯和蜘蛛夏洛特建立了真挚的友谊.然而,威尔伯未来的命运却是成为熏肉火腿.作为一只猪,威尔伯只能悲痛绝望地接受这命运了,好朋友夏洛特却坚信它能救小猪.它吐出一根根丝在猪栏上织出了被人类视为奇迹的网上文字,这让威尔伯在集市上赢得了特别奖,和一个安享天年的未来,小猪终于得救了.但,这时,夏洛特的生命却走到了尽头.夏洛特的一声“再见”,伴随着曾经的蛛丝随风飘散.他已经在我们心中,留下了一张夏洛的网.</p>
				<p>这本书主要讲述是在朱克曼家的谷仓里,住着一群小动物,其中小猪威尔伯和蜘蛛夏洛特建立了真挚的友谊.然而,威尔伯未来的命运却是成为熏肉火腿.作为一只猪,威尔伯只能悲痛绝望地接受这命运了,好朋友夏洛特却坚信它能救小猪.它吐出一根根丝在猪栏上织出了被人类视为奇迹的网上文字,这让威尔伯在集市上赢得了特别奖,和一个安享天年的未来,小猪终于得救了.但,这时,夏洛特的生命却走到了尽头.夏洛特的一声“再见”,伴随着曾经的蛛丝随风飘散.他已经在我们心中,留下了一张夏洛的网.</p>
			</div>
		</div>
		<a href="#" class="pop-close"></a>
		<a href="#" class="pop-share"></a>
	</div>
	<!--滚动条-->
	<script type='text/javascript'>
		$(function(){
			$(window).load(function(){
				$(".pop-wrap").mCustomScrollbar();
			});
		})
	</script>
</body>
</html>
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