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

	<div class="mainer clearfix">
		<div class="mainer-left">
			<a href="#" class="mainer-p01"><img src="/Public/Home/images/icon/return01.png" alt="">返回个人中心</a>
			<p class="mainer-p02">书单编辑：从列表中选择或搜索您想要的图书</p>
			<div class="search-wrap">
				<input type="text" placeholder="直接搜索您想要的书名"><a href="#"></a>
			</div>
			<div class="zzxs-btn clearfix">
				<a href="#" class="zzxs cur-btn">自主选书</a>
				<a href="#" class="jgtj">机构推荐</a>
			</div>
			<div class="zzxs-list">
				<ul>
					<li><a href="#">有趣的科学</a></li>
					<li><a href="#">有趣的科学</a></li>
					<li><a href="#">有趣的科学</a></li>
					<li><a href="#">有趣的科学</a></li>
					<li><a href="#">有趣的科学</a></li>
					<li><a href="#">有趣的科学</a></li>
					<li><a href="#">有趣的科学</a></li>
					<li><a href="#">有趣的科学</a></li>
					<li><a href="#">有趣的科学</a></li>
					<li><a href="#">有趣的科学</a></li>
					<li><a href="#">有趣的科学</a></li>
					<li><a href="#">有趣的科学</a></li>
				</ul>
			</div>
		</div>
		<div class="mainer-right">
			<div class="book-wrap">
				<div class="book-change">
					<a href="" class="book-return"><img src="/Public/Home/images/icon/return02.png" alt="">返回列表</a>
				</div>
				<div class="book-info clearfix">
					<div class="info-left">
						<div class="info-pic">
							<img src="/Public/Home/images/book03.jpg" alt="">
						</div>
						<a href="#">到详细页面查看更多>></a>
					</div>
					<div class="info-right">
						<p class="info1"><?php echo ($bookinfo["content_intro"]); ?></p>
						<div class="info2">
							<p>丛书名：<?php echo ($bookinfo["book_name"]); ?></p>
							<p>作者：（<?php echo ($bookinfo["book_author"]); ?></p>
							<p>出版社：<?php echo ($bookinfo["book_press"]); ?></p>
							<p>出版时间：<?php echo ($bookinfo["book_publication_time"]); ?></p>
							<p>ＩＳＢＮ：<?php echo ($bookinfo["isbn"]); ?></p>
						</div>
						<div class="info3 clearfix">
							<span class="info3-left">所属分类：</span>
							<div class="info3-right">
								<p>图书 > 童书 > 平装图画书 > 欧美</p>
								<p>童书 > 3-6岁 > 卡通/动漫/图画书</p>
								<p>图书 > 童书 > 平装图画书 > 欧美</p>
								<p>童书 > 3-6岁 > 卡通/动漫/图画书</p>
								<p>图书 > 童书 > 平装图画书 > 欧美</p>
								<p>童书 > 3-6岁 > 卡通/动漫/图画书</p>
							</div>
						</div>
						<a href="#" class="info-btn">加入我的书单</a>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="mainer-btm">
			<div class="book-box">
				<div class="book-top">
					<img src="/Public/Home/images/icon/book05.png" alt="">已添加图书列表
				</div>
				<div class="zw"><img src="/Public/Home/images/icon/zw01.png" alt="">暂时没有书本，请从上方新增</div>
			</div>
		</div>
	</div>
>
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