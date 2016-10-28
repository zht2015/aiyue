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
			<a href="<?php echo U('Users/userinfo');?>" class="mainer-p01"><img src="/Public/home/images/icon/return01.png" alt="">返回个人中心</a>
			<p class="mainer-p02">书单编辑：从列表中选择或搜索您想要的图书</p>
			<div class="search-wrap">
				<input type="text" placeholder="直接搜索您想要的书名" id="search-book-name">
				<a href="#" class="search-btn" onclick="searchBook()" ></a>
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
					<!-- <a href="javascript:;" class="book-left"></a>
					<a href="javascript:;" class="book-right"></a> -->
					
				</div>
				<h5 class="per-h5"><i class="prev01"></i><i class="next01"></i></h5>
				<div class="book-inner clearfix">
					<ul>
						<li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
								</div>
							</div>
						</li>
						 <li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
									</span>
								</div>
							</div>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
									</span>
								</div>
							</div>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
									</span>
								</div>
							</div>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
									</span>
								</div>
							</div>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
									</span>
								</div>
							</div>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
									</span>
								</div>
							</div>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
									</span>
								</div>
							</div>
						</li> 



						<li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
									</span>
								</div>
							</div>
						</li>

						<li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
									</span>
								</div>
							</div>
						</li>

						<li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
									</span>
								</div>
							</div>
						</li>
						<li>
							<div class="book-pic">
								<img src="/Public/home/images/book03.jpg" alt="">
								<div class="book-mask">
									<a href="#" class="book-name">起太早的鸟儿没虫吃</a>
									<span class="book-view">
										<a href="#">图书详情</a>&nbsp;/&nbsp;<a href="#">加入书单</a>
									</span>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="mainer-btm">
			<div class="book-box">
				<div class="book-top">
					<img src="/Public/home/images/icon/book05.png" alt="">已添加列表（10本）
					<a href="#" class="book-a1">保存并生成书单</a>
				</div>
				<table>
					<tr class="table-title">
						<th>封面</th>
						<th>书名</th>
						<th>著作者</th>
						<th>出版社</th>
						<th>分类</th>
						<th>适读年龄</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($bookinfo)): foreach($bookinfo as $key=>$vo): ?><tr>
							<td><span class="td-img"><img src="/Public/home/images/book03.jpg"></span></td>
							<td><a href="#" class="book-name02"><?php echo ($vo["book_name"]); ?></a></td>
							<td><?php echo ($vo["book_author"]); ?></td>
							<td><?php echo ($vo["book_press"]); ?></td>
							<td><?php echo ($vo["category"]); ?></td>
							<td><?php echo ($vo["age"]); ?></td>
							<td><a href="#" class="td-del">删除</a></td>
						</tr><?php endforeach; endif; ?>
					
				</table>
				<div class="page">
					<?php echo ($show); ?>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">


	function searchBook(){
		var bookname = $("#search-book-name").val();
		if(bookname!==""){
			$.post("<?php echo U('Book/searchBookByName');?>", {bookname,bookname}, function(data){
				if(data.status==1){
					var str = "";
					$.each(data.result, function(index,value){
						str+="<li><div class='book-pic'><img src='"+value.book_cover+"' alt=''><div class='book-mask'><a href='#' class='book-name'>"+value.book_name+"</a><span class='book-view'><a href='/index.php/Home/Book/bookDetail/bookid/"+value.id+".html'>图书详情</a>&nbsp;/&nbsp;<a href='javascript:void(0);' class='addbook' onclick='addBook(this)'>加入书单</a><input type='hidden' class='bookid' value='"+value.id+"'></span></span></div></div></li>";
					});
					$(".book-inner>ul").html(str);
				}else if(data.status==-1){
					$(".book-inner").empty();
					$(".book-inner").html(data.result);
				}
			})
		}
	}


	//添加图书
	function addBook(obj){
		
		var id = $(obj).siblings('.bookid').val();
		$.get("/index.php/Home/Book/getBookById/id/"+id, function(data) {
			if(data.status==1){
				var str="<tr><td><span class='td-img'><img src='"+data.result.book_cover+"'></span></td><td><a href='#' class='book-name02'>"+data.result.book_name+"</a></td><td>"+data.result.book_author+"</td><td>"+data.result.book_press+"</td><td><?php echo ($vo["category"]); ?></td><td>"+data.result.age+"</td><td><a href='#' class='td-del'>删除</a></td></tr>"
				$(".table-title").after(str);
			}
		});
	}

	
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