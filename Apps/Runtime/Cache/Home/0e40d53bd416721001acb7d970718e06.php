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
	<script type="text/javascript" src="/Public/Home/webuploader/webuploader.min.js"></script>
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
					<a href="javascript:;" class="book-left"></a>
					<a href="javascript:;" class="book-right"></a>
				</div>
				<div class="book-inner clearfix">
					<ul>
						<li>
							<div class="book-pic">
								<img src="/Public/Home/images/book03.jpg" alt="">
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
								<img src="/Public/Home/images/book03.jpg" alt="">
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
								<img src="/Public/Home/images/book03.jpg" alt="">
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
								<img src="/Public/Home/images/book03.jpg" alt="">
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
								<img src="/Public/Home/images/book03.jpg" alt="">
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
								<img src="/Public/Home/images/book03.jpg" alt="">
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
								<img src="/Public/Home/images/book03.jpg" alt="">
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
								<img src="/Public/Home/images/book03.jpg" alt="">
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
					<img src="/Public/Home/images/icon/book05.png" alt="">已添加列表（10本）
					<a href="#" class="book-a1">保存并生成书单</a>
				</div>
				<table>
					<tr>
						<th>封面</th>
						<th>书名</th>
						<th>著作者</th>
						<th>出版社</th>
						<th>分类</th>
						<th>适读年龄</th>
						<th>操作</th>
					</tr>
					<tr>
						<td><span class="td-img"><img src="/Public/Home/images/book03.jpg"></span></td>
						<td><a href="#" class="book-name02">双胞胎大冒险</a></td>
						<td>本尼迪科</td>
						<td>HarperCollins UK</td>
						<td>侦探/冒险小说</td>
						<td>7-10岁</td>
						<td><a href="#" class="td-del">删除</a></td>
					</tr>
					<tr>
						<td><span class="td-img"><img src="/Public/Home/images/book03.jpg"></span></td>
						<td><a href="#" class="book-name02">双胞胎大冒险</a></td>
						<td>本尼迪科</td>
						<td>HarperCollins UK</td>
						<td>侦探/冒险小说</td>
						<td>7-10岁</td>
						<td><a href="#" class="td-del">删除</a></td>
					</tr>
					<tr>
						<td><span class="td-img"><img src="/Public/Home/images/book03.jpg"></span></td>
						<td><a href="#" class="book-name02">双胞胎大冒险</a></td>
						<td>本尼迪科</td>
						<td>HarperCollins UK</td>
						<td>侦探/冒险小说</td>
						<td>7-10岁</td>
						<td><a href="#" class="td-del">删除</a></td>
					</tr>
					<tr>
						<td><span class="td-img"><img src="/Public/Home/images/book03.jpg"></span></td>
						<td><a href="#" class="book-name02">双胞胎大冒险</a></td>
						<td>本尼迪科</td>
						<td>HarperCollins UK</td>
						<td>侦探/冒险小说</td>
						<td>7-10岁</td>
						<td><a href="#" class="td-del">删除</a></td>
					</tr>
					<tr>
						<td><span class="td-img"><img src="/Public/Home/images/book03.jpg"></span></td>
						<td><a href="#" class="book-name02">双胞胎大冒险</a></td>
						<td>本尼迪科</td>
						<td>HarperCollins UK</td>
						<td>侦探/冒险小说</td>
						<td>7-10岁</td>
						<td><a href="#" class="td-del">删除</a></td>
					</tr>
					<tr>
						<td><span class="td-img"><img src="/Public/Home/images/book03.jpg"></span></td>
						<td><a href="#" class="book-name02">双胞胎大冒险</a></td>
						<td>本尼迪科</td>
						<td>HarperCollins UK</td>
						<td>侦探/冒险小说</td>
						<td>7-10岁</td>
						<td><a href="#" class="td-del">删除</a></td>
					</tr>
				</table>
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

	<!--弹窗 遮罩-->
	<div class="mask"></div>
	<div class="pop book01-pop">
		<div class="book01-inner">
			<div class="book01-top"><img src="/Public/Home/images/icon/book06.png" alt="">请输入您的书单资料</div>
			<input type="text" placeholder="动物科普童话，小孩子小学读的书单" class="input01" id="booklist_name">
			<span class="span01"></span>
			<div class="book01-file clearfix">
				<input type="text" placeholder="上传书单封面" id="booklist_cover">
				<!-- <span class="book01-span"><input type="file"></span> -->
				<span class="book01-span"><div id="filePicker">&nbsp;&nbsp;</div></span>
			</div>
			<span class="span02">输入标签：</span>
			<div class="book01-dui clearfix">
				<input type="text" placeholder="最多5个标签，单个不超过8个字" id="booktag">
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
			<textarea name="" class="book01-text" placeholder="请输入书单描述，不超过200字" id="booklist_discription"></textarea>
			<textarea name="" class="book01-text" placeholder="推荐理由（可不填）" id="recomend"></textarea>
			<a href="javascript:void(0);" class="scsd" onclick="makeBookList()">生成书单</a>
			<a href="#" class="book01-close"></a>
		</div>
	</div>

	<script type="text/javascript">

	$(".mask").show();
	$('.pop').show();
		/**书单标签**/

		$('#booktag').bind('keypress',function(event){
			var booktag=$("#booktag").val();console.log(booktag);
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

		function makeBookList(){
			var booklist_name = $("#booklist_name").val();
			var booklist_cover = $("#booklist_cover").val();
			var booklist_discription = $("#booklist_discription").val();
			var recomend = $("#recomend").val();
			var tag = "";
			$(".wdbq ul li").each(function(){
				   tag += $(this).text()+","
			});
			tag=tag.substring(0,tag.length-1);
			if(booklist_name==""){layer.tips("书单名称不能为空","#booklist_name");return false}
			if(booklist_cover==""){layer.tips("请上传书单封面","#booklist_cover");return false}
			if(booklist_discription==""){layer.tips("书单描述不能为空","#booklist_discription");return false}

		    $.post("<?php echo U('Home/Book/makeBookList');?>",{"booklist_name":booklist_name,"booklist_cover":booklist_cover,"booklist_discription":booklist_discription,"recomend":recomend,"booklist_tag":tag},function(data) {
		    	console.log("ccc");
		    	if(data.status==1){
		    		layer.msg('书单制作成功', {icon: 6});
		    		location.href="<?php echo U('Home/Book/bookList');?>";
		    	}else if(data.status==-1){
		    		layer.msg('书单制作失败', {icon: 5});
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
	                    console.log(img_url);
	                    $('#booklist_cover').val(img_url);
	                    
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