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
					<p class="record-p1">我的阅读记录时间轴</p>
				</div>
			</div>
			<div class="right-inner record">
				<div class="record-top clearfix">
					<a href="#" class="add-icon"><img src="/Public/Home/images/icon/add01.png" alt=""></a>
					<div class="add-left">
						<span class="record-span1">添加新的阅读时间：</span>
						<div class="add-pic">添加图片<input type="file"></div>
					</div>
					<div class="add-right">
						<div class="span1">
							<span class="select1">2015<i></i>
								<ul>
									<li>2014</li>
									<li>2013</li>
									<li>2012</li>
								</ul>
							</span>年
							<span class="select1">12<i></i>
								<ul>
									<li>11</li>
									<li>10</li>
									<li>09</li>
								</ul>
							</span>月
							<span class="select1">30<i></i>
								<ul>
									<li>29</li>
									<li>28</li>
									<li>27</li>
								</ul>
							</span>日
						</div>
						<div class="input-wrap1">
							<input type="text" placeholder="直接输入或搜索书本名称">
							<i></i>
						</div>
						<textarea name="" id="" class="record-textarea" placeholder="在此处输入文字，不超过150字"></textarea>
						<span class="span02">我的标签：</span>
						<div class="book01-dui clearfix">
							<input type="text" placeholder="最多5个标签，单个不超过8个字">
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
						<a href="#" class="record-sub">确认提交</a>
					</div>
				</div>
				<div class="record-mid">
					<div class="year-inner">
						<ul>
							<li class="cur-year">
								<a href="#">
									现在<i></i>
								</a>
							</li>
							<li>
								<a href="#">
									2009<i></i>
								</a>
							</li>
							<li>
								<a href="#">
									2010<i></i>
								</a>
							</li>
							<li>
								<a href="#">
									2011<i></i>
								</a>
							</li>
							<li class="year">
								<a href="#">
									2012<i></i>
								</a>
							</li>
							<li>
								<a href="#">
									2013<i></i>
								</a>
							</li>
							<li>
								<a href="#">
									2014<i></i>
								</a>
							</li>
							<li>
								<a href="#">
									2015<i></i>
								</a>
							</li>
						</ul>
					</div>
					<i class="next-year"></i>
					<i class="prev-year"></i>
					<span class="point01"></span>
				</div>
				<div class="record-btm">
					<div class="record-line"></div>
					<ul>
						<li class="clearfix">
							<div class="record-con clearfix">
								<div class="record-title">
									<span class="orange">2015年01月01日</span>
									<span class="record-bq">标签：亲子 温暖 儿童 亲子 温暖</span>
									<i class="record-xg"></i>
									<i class="record-del"></i>
								</div>
								<a class="look-notes" href="#">
									<div class="record-pic"><img src="/Public/Home/images/record01.jpg" alt=""></div>
									<div class="record-text">
										<p class="record-p2">书名：《睡美人漂流记》</p>
										<p class="record-p3">真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</p>
									</div>
								</a>
							</div>
							<div class="record-con clearfix">
								<div class="record-title">
									<span class="orange">2015年01月01日</span>
									<span class="record-bq">标签：亲子 温暖 儿童 亲子 温暖</span>
									<i class="record-xg"></i>
									<i class="record-del"></i>
								</div>
								<a class="look-notes" href="#">
									<div class="record-pic"><img src="/Public/Home/images/record01.jpg" alt=""></div>
									<div class="record-text">
										<p class="record-p2">书名：《睡美人漂流记》</p>
										<p class="record-p3">真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</p>
									</div>
								</a>
							</div>
							<div class="record-con clearfix">
								<div class="record-title">
									<span class="orange">2015年01月01日</span>
									<span class="record-bq">标签：亲子 温暖 儿童 亲子 温暖</span>
									<i class="record-xg"></i>
									<i class="record-del"></i>
								</div>
								<a class="look-notes" href="#">
									<div class="record-pic"><img src="/Public/Home/images/record01.jpg" alt=""></div>
									<div class="record-text">
										<p class="record-p2">书名：《睡美人漂流记》</p>
										<p class="record-p3">真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</p>
									</div>
								</a>
							</div>
							<span class="line-point">6月4日<i></i></span>
						</li>
						<li class="clearfix">
							<div class="record-con clearfix">
								<div class="record-title">
									<span class="orange">2015年01月01日</span>
									<span class="record-bq">标签：亲子 温暖 儿童 亲子 温暖</span>
									<i class="record-xg"></i>
									<i class="record-del"></i>
								</div>
								<a class="look-notes" href="#">
									<div class="record-pic"><img src="/Public/Home/images/record01.jpg" alt=""></div>
									<div class="record-text">
										<p class="record-p2">书名：《睡美人漂流记》</p>
										<p class="record-p3">真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</p>
									</div>
								</a>
							</div>
							<span class="line-point">6月4日<i></i></span>
						</li>
						<li class="clearfix">
							<div class="record-con clearfix">
								<div class="record-title">
									<span class="orange">2015年01月01日</span>
									<span class="record-bq">标签：亲子 温暖 儿童 亲子 温暖</span>
									<i class="record-xg"></i>
									<i class="record-del"></i>
								</div>
								<a class="look-notes" href="#">
									<div class="record-pic"><img src="/Public/Home/images/record01.jpg" alt=""></div>
									<div class="record-text">
										<p class="record-p2">书名：《睡美人漂流记》</p>
										<p class="record-p3">真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</p>
									</div>
								</a>
							</div>
							<div class="record-con clearfix">
								<div class="record-title">
									<span class="orange">2015年01月01日</span>
									<span class="record-bq">标签：亲子 温暖 儿童 亲子 温暖</span>
									<i class="record-xg"></i>
									<i class="record-del"></i>
								</div>
								<a class="look-notes" href="#">
									<div class="record-pic"><img src="/Public/Home/images/record01.jpg" alt=""></div>
									<div class="record-text">
										<p class="record-p2">书名：《睡美人漂流记》</p>
										<p class="record-p3">真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</p>
									</div>
								</a>
							</div>
							<div class="record-con clearfix">
								<div class="record-title">
									<span class="orange">2015年01月01日</span>
									<span class="record-bq">标签：亲子 温暖 儿童 亲子 温暖</span>
									<i class="record-xg"></i>
									<i class="record-del"></i>
								</div>
								<a class="look-notes" href="#">
									<div class="record-pic"><img src="/Public/Home/images/record01.jpg" alt=""></div>
									<div class="record-text">
										<p class="record-p2">书名：《睡美人漂流记》</p>
										<p class="record-p3">真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</p>
									</div>
								</a>
							</div>
							<span class="line-point">6月4日<i></i></span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!--弹窗 遮罩 查看阅读笔记-->
	<div class="mask"></div>
	<div class="pop record-view">
		<p class="view-date">阅读时间：2015 年 08 月 25 日</p>
		<div class="view-title clearfix">
			<img src="/Public/Home/images/record01.jpg" alt="">
			<span class="view-name">睡美人漂流记</span>
			<p class="view-bq">标签：亲子 温暖 儿童  儿童 儿童 儿童 儿童 儿童 儿童 儿童</p>
		</div>
		<p class="bjnr">笔记内容</p>
		<div class="view-text">
			<div class="view-con">
				<p>真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</p>
				<p>真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</p>
				<p>真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</p>
				<p>真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</p>
			</div>
		</div>
		<a href="#" class="pop-close"></a>
	</div>

	<!--弹窗 遮罩 修改阅读笔记-->
		<div class="mask"></div>
		<div class="pop record-xg">
			<div class="span1">
				<span class="select1">2015<i></i>
					<ul>
						<li>2014</li>
						<li>2013</li>
						<li>2012</li>
					</ul>
				</span>年
				<span class="select1">12<i></i>
					<ul>
						<li>11</li>
						<li>10</li>
						<li>09</li>
					</ul>
				</span>月
				<span class="select1">30<i></i>
					<ul>
						<li>29</li>
						<li>28</li>
						<li>27</li>
					</ul>
				</span>日
			</div>
			<div class="xg-left">
				<div class="xg-pic">
					<img src="/Public/Home/images/record01.jpg" alt="">
					<div class="pic-mask">添加图片<input type="file"></div>
				</div>
			</div>
			<div class="xg-right">
				<div class="xg-text">
					<input type="text" value="睡美人漂流记">
					<textarea name="" id="">真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。真是不错的一本好书，这一次儿子看了一半，还有一半没看完，老缠着我给他睡前念完。真的是不错书籍，这几天就给孩子念完它。</textarea>
				</div>
				<span class="span02">输入标签：</span>
				<div class="book01-dui clearfix">
					<input type="text" placeholder="最多5个标签，单个不超过8个字">
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
				<a href="#" class="record-sub">保存修改</a>
			</div>
			<a href="#" class="pop-close"></a>
		</div>

	<script>
		$(function(){
			var btm_h=$('.record-btm').offset().top;
			var li_h=$('.record-btm').find('li:last').offset().top;
			var line_height=li_h-btm_h+20;
			$('.record-line').height(line_height);
			$(window).load(function(){
				$(".view-text").mCustomScrollbar();
			});
			/**左侧导航**/
			$('.personal ul li').removeClass('cur-li');
			$('.personal10').addClass('cur-li');

			/*触发弹框 查看阅读记录*/
			$('.look-notes').click(function(){
			    $(".mask").show();
			    $('.record-view').show();
			})

			/*触发弹框 修改阅读记录*/
			$('.record-xg').click(function(){
			    $(".mask").show();
			    $('.record-xg').show();
			})

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