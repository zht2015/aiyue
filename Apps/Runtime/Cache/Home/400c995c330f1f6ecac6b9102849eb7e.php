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
<!-- <?php echo (session('verifyCode')); ?><br><?php echo (session('userphone')); ?> -->
	<div class="banner">
		<ul>
			<li style="z-index:1"><img src="/Public/Home/images/banner.jpg" alt=""></li>
			<li><img src="/Public/Home/images/banner.jpg" alt=""></li>
			<li><img src="/Public/Home/images/banner.jpg" alt=""></li>
		</ul>
		<a href="javascript:;" class="prev"></a>
		<a href="javascript:;" class="next"></a>
	</div>
	<div class="index1">
		<div class="index1-inner w1180 clearfix">
			<p class="index1-p1">
				<span class="orange">热门搜索：</span>
				<a href="#">一棵知道很多故事的树</a>
				<a href="#">小龙人</a>
				<a href="#">小龙人</a>
			</p>
			<span class="all-sort">全部分类<img src="/Public/Home/images/icon/select01.png" alt="">
				<div class="sort-list">
					<ul>
						<li><a href="#">全部分类</a></li>
						<li><a href="#">文章</a></li>
						<li><a href="#">注译者</a></li>
						<li><a href="#">书名</a></li>
						<li><a href="#">品牌</a></li>
						<li><a href="#">书单</a></li>
					</ul>
				</div>
			</span>
			<input type="text" class="index1-input" placeholder="文章标题 / 书名 / 著译者 / ISBN / 出版社 / 书单">
			<a href="#" class="index1-search">搜索</a>
		</div>
	</div>
	<div class="suspension-nav-wrap clearfix">
	  <div class="right-floatNav"> <a href="#" class="s1"><i></i>我的书单</a> <a href="#" class="s2"><i></i>制作书单</a> <a href="#" class="s3 last"><i></i>上传图书</a> </div>
	</div>
	<div class="index2">
		<div class="index2-inner w1180">
			<h4>中国小学图书馆基本配备书目<a href="#"><img src="/Public/Home/images/icon/index2-icon.png" alt=""></a></h4>
			<h5>做儿童阅读的合格守门人</h5>
			<div class="index2-wrap">
				<div class="index2-banner">
					<ul>
						<li>
							<div class="index2-pic">
								<div class="index2-pic-inner">
									<img src="/Public/Home/images/index01.jpg" alt="">
									<div class="book-mask"><a href="#" class="index2-img"><img src="/Public/Home/images/icon/index02.png" alt=""></a></div>
								</div>
							</div>
							<h5>< 教师书目 ></h5>
							<p>改变教师的职业倦怠、增进教师的职业神圣感、改善教师的教学方法、关心教师的健康、拓展教师的知识面 --</p>
						</li>
						<li>
							<div class="index2-pic">
								<div class="index2-pic-inner">
									<img src="/Public/Home/images/index01.jpg" alt="">
									<div class="book-mask"><a href="#" class="index2-img"><img src="/Public/Home/images/icon/index02.png" alt=""></a></div>
								</div>
							</div>
							<h5>< 教师书目 ></h5>
							<p>改变教师的职业倦怠、增进教师的职业神圣感、改善教师的教学方法、关心教师的健康、拓展教师的知识面 --</p>
						</li>
						<li>
							<div class="index2-pic">
								<div class="index2-pic-inner">
									<img src="/Public/Home/images/index01.jpg" alt="">
									<div class="book-mask"><a href="#" class="index2-img"><img src="/Public/Home/images/icon/index02.png" alt=""></a></div>
								</div>
							</div>
							<h5>< 教师书目 ></h5>
							<p>改变教师的职业倦怠、增进教师的职业神圣感、改善教师的教学方法、关心教师的健康、拓展教师的知识面 --</p>
						</li>
						<li>
							<div class="index2-pic">
								<div class="index2-pic-inner">
									<img src="/Public/Home/images/index01.jpg" alt="">
									<div class="book-mask"><a href="#" class="index2-img"><img src="/Public/Home/images/icon/index02.png" alt=""></a></div>
								</div>
							</div>
							<h5>< 教师书目 ></h5>
							<p>改变教师的职业倦怠、增进教师的职业神圣感、改善教师的教学方法、关心教师的健康、拓展教师的知识面 --</p>
						</li>
					</ul>
				</div>
				<a href="javascript:;" class="index2-prev"></a>
				<a href="javascript:;" class="index2-next"></a>
			</div>
		</div>
	</div>
	<div class="index3">
		<div class="index3-inner w1180">
			<h4>每月推荐--最好的图书和资讯</h4>
			<h5>一个月为您推荐一次最好图书资讯</h5>
			<div class="index3-scts"><a href="#"><img src="/Public/Home/images/icon/scts.png" alt="">上传图书</a></div>
			<div class="index3-wrap">
				<div class="index3-banner">
					<ul>
						<li>
							<div class="index3-pic">
								<img src="/Public/Home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="index3-p1">< 好酸好酸的柠檬呀 ></a>
									<p class="index3-p2">岁到8岁是孩子从幼儿成长到儿童......</p>
									<p class="index3-p3">
										<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
										<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="index3-pic">
								<img src="/Public/Home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="index3-p1">< 好酸好酸的柠檬呀 ></a>
									<p class="index3-p2">岁到8岁是孩子从幼儿成长到儿童......</p>
									<p class="index3-p3">
										<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
										<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="index3-pic">
								<img src="/Public/Home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="index3-p1">< 好酸好酸的柠檬呀 ></a>
									<p class="index3-p2">岁到8岁是孩子从幼儿成长到儿童......</p>
									<p class="index3-p3">
										<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
										<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="index3-pic">
								<img src="/Public/Home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="index3-p1">< 好酸好酸的柠檬呀 ></a>
									<p class="index3-p2">岁到8岁是孩子从幼儿成长到儿童......</p>
									<p class="index3-p3">
										<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
										<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="index3-pic">
								<img src="/Public/Home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="index3-p1">< 好酸好酸的柠檬呀 ></a>
									<p class="index3-p2">岁到8岁是孩子从幼儿成长到儿童......</p>
									<p class="index3-p3">
										<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
										<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="index3-pic">
								<img src="/Public/Home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="index3-p1">< 好酸好酸的柠檬呀 ></a>
									<p class="index3-p2">岁到8岁是孩子从幼儿成长到儿童......</p>
									<p class="index3-p3">
										<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
										<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
									</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<a href="javascript:;" class="index3-prev"></a>
				<a href="javascript:;" class="index3-next"></a>
			</div>
			<div class="index3-wrap2">
				<div class="index3-banner2">
					<ul>
						<li class="index3-cur"><a href="#">本月推荐新书</a></li>
						<li><a href="#">本周推荐新书</a></li>
						<li><a href="#">年度新书排行</a></li>
						<li><a href="#">新书热销榜</a></li>
						<li><a href="#">年度新书排行</a></li>
					</ul>
				</div>
				<a href="javascript:;" class="index3-prev2"></a>
				<a href="javascript:;" class="index3-next2"></a>
			</div>
		</div>
	</div>
	<div class="index4">
		<div class="index4-inner w1180">
			<h4>书单展示--为您搜集最好的书本合集<a href="<?php echo U('Book/sdList');?>"><img src="/Public/Home/images/icon/index2-icon.png" alt=""></a></h4>
			<h5>这里为你汇总了最适合您孩子的书本</h5>
			<div class="index4-wrap">
				<div class="index4-banner">
					<ul>
						<li>
							<div class="index4-pic">
								<img src="/Public/Home/images/book01.jpg" alt="">
								<div class="book-mask"><a href="#"><img src="/Public/Home/images/icon/index04-01.png" alt=""></a></div>
							</div>
							<p class="index4-p1">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</p>
							<p class="index4-p2">
								<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
								<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
								<span>by：sky</span>
							</p>
						</li>
						<li>
							<div class="index4-pic">
								<img src="/Public/Home/images/book02.jpg" alt="">
								<div class="book-mask"><a href="#"><img src="/Public/Home/images/icon/index04-01.png" alt=""></a></div>
							</div>
							<p class="index4-p1">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</p>
							<p class="index4-p2">
								<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
								<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
								<span>by：sky</span>
							</p>
						</li>
						<li>
							<div class="index4-pic">
								<img src="/Public/Home/images/book01.jpg" alt="">
								<div class="book-mask"><a href="#"><img src="/Public/Home/images/icon/index04-01.png" alt=""></a></div>
							</div>
							<p class="index4-p1">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</p>
							<p class="index4-p2">
								<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
								<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
								<span>by：sky</span>
							</p>
						</li>
						<li>
							<div class="index4-pic">
								<img src="/Public/Home/images/book02.jpg" alt="">
								<div class="book-mask"><a href="#"><img src="/Public/Home/images/icon/index04-01.png" alt=""></a></div>
							</div>
							<p class="index4-p1">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</p>
							<p class="index4-p2">
								<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
								<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
								<span>by：sky</span>
							</p>
						</li>
						<li>
							<div class="index4-pic">
								<img src="/Public/Home/images/book01.jpg" alt="">
								<div class="book-mask"><a href="#"><img src="/Public/Home/images/icon/index04-01.png" alt=""></a></div>
							</div>
							<p class="index4-p1">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</p>
							<p class="index4-p2">
								<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
								<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
								<span>by：sky</span>
							</p>
						</li>
						<li>
							<div class="index4-pic">
								<img src="/Public/Home/images/book02.jpg" alt="">
								<div class="book-mask"><a href="#"><img src="/Public/Home/images/icon/index04-01.png" alt=""></a></div>
							</div>
							<p class="index4-p1">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</p>
							<p class="index4-p2">
								<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
								<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
								<span>by：sky</span>
							</p>
						</li>
						<li>
							<div class="index4-pic">
								<img src="/Public/Home/images/book01.jpg" alt="">
								<div class="book-mask"><a href="#"><img src="/Public/Home/images/icon/index04-01.png" alt=""></a></div>
							</div>
							<p class="index4-p1">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</p>
							<p class="index4-p2">
								<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
								<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
								<span>by：sky</span>
							</p>
						</li>
						<li>
							<div class="index4-pic">
								<img src="/Public/Home/images/book02.jpg" alt="">
								<div class="book-mask"><a href="#"><img src="/Public/Home/images/icon/index04-01.png" alt=""></a></div>
							</div>
							<p class="index4-p1">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</p>
							<p class="index4-p2">
								<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
								<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
								<span>by：sky</span>
							</p>
						</li>
						<li>
							<div class="index4-pic">
								<img src="/Public/Home/images/book01.jpg" alt="">
								<div class="book-mask"><a href="#"><img src="/Public/Home/images/icon/index04-01.png" alt=""></a></div>
							</div>
							<p class="index4-p1">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</p>
							<p class="index4-p2">
								<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
								<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
								<span>by：sky</span>
							</p>
						</li>
						<li>
							<div class="index4-pic">
								<img src="/Public/Home/images/book02.jpg" alt="">
								<div class="book-mask"><a href="#"><img src="/Public/Home/images/icon/index04-01.png" alt=""></a></div>
							</div>
							<p class="index4-p1">儿童科普书单--最全面的幼儿科学馆带领孩子走进科学世界</p>
							<p class="index4-p2">
								<a href="#"><img src="/Public/Home/images/icon/index3-01.png" alt="">收藏</a>
								<a href="#"><img src="/Public/Home/images/icon/index3-02.png" alt="">转发</a>
								<span>by：sky</span>
							</p>
						</li>
					</ul>
				</div>
				<a href="javascript:;" class="index4-prev"></a>
				<a href="javascript:;" class="index4-next"></a>
			</div>
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