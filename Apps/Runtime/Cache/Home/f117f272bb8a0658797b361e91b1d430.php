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
	<script type="text/javascript" src="/Public/Home/webuploader/webuploader.min.js"></script>
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
				<div class="per-top">
					<a href="<?php echo U('Users/pressInfo');?>" class="per-span cur-per">个人资料</a>
					<a href="<?php echo U('Users/uploadAvatar');?>" class="per-span">修改头像</a>
					<a href="<?php echo U('Users/savePwd');?>" class="per-span">修改密码</a>
				</div>
			</div>
			<div class="right-inner per-center w740">
				<p class="per-title">亲爱的 <span class="color1"><?php echo ($user["press"]); ?></span>，您的资料如下：</p>
				<div class="per-inp clearfix">
					<span class="per-left">当前头像：</span>
					<div class="per-right">
						<div class="per-head">
							<img src="<?php echo ($user["avatar"]); ?>" alt="">
						</div>
						<a href="<?php echo U('Users/uploadAvatar');?>" class="revise-a">修改头像 >></a>
					</div>
				</div>
				<div class="per-inp clearfix">
					<span class="per-left">公司名称：</span>
					<div class="per-right">
						<span class="right-info"><?php echo ($user["press"]); ?></span>
					</div>
				</div>
				<div class="per-inp clearfix">
					<span class="per-left">负责人：</span>
					<div class="per-right">
						<span class="right-info"><?php echo ($user["name"]); ?></span>
					</div>
				</div>
				<div class="per-inp clearfix">
					<span class="per-left">联系方式：</span>
					<div class="per-right">
						<span class="right-info"><?php echo ($user["mobile"]); ?></span>
					</div>
				</div>
				<div class="per-inp clearfix">
					<span class="per-left">注册日期：</span>
					<div class="per-right">
						<span class="right-info"><?php echo ($user["reg_time"]); ?></span>
					</div>
				</div>
				<div class="per-inp clearfix">
					<span class="per-left">公司地址：</span>
					<div class="per-right per-loca">
						<select name="province" id="province">
							<option value="0">请选择省份</option>
							<?php if(is_array($province)): foreach($province as $key=>$vo): ?><option value="<?php echo ($vo["area_id"]); ?>" <?php if(($vo["area_id"]) == $user["province"]): ?>selected="selected"<?php endif; ?> >
							    	<?php echo ($vo["area_name"]); ?>
							    </option><?php endforeach; endif; ?>
														
						</select>
						<select name="city" id="city">
							<option value="0">请选择城市</option>
							
							<?php if(is_array($city)): foreach($city as $key=>$vo): if(($vo["area_id"]) == $user["city"]): ?><option value="<?php echo ($vo["area_id"]); ?>"  selected="selected"><?php echo ($vo["area_name"]); ?>
							    	</option><?php endif; endforeach; endif; ?>
						</select>
						<textarea name="" id="area" class="loca-info" placeholder="请输入公司详细地址"><?php echo ($user["area"]); ?></textarea>
					</div>
				</div>
				<div class="per-inp clearfix">
					<span class="per-left">公司简介：</span>
					<div class="per-right">
						<textarea name="" id="press_intro" class="gsjj" placeholder="请输入公司简介"><?php echo ($user["press_intro"]); ?></textarea>
					</div>
				</div>
				<div class="per-inp clearfix">
					<span class="per-left">公司网址：</span>
					<div class="per-right">
						<input type="text" value="<?php echo ($user["press_url"]); ?>" class="gswz" id="press_url">
					</div>
				</div>
				<div class="per-inp clearfix">
					<span class="per-left">微信号二维码：</span>
					<div class="per-right">
						<input type="text" class="wx-input" id="pic-name"><input type="hidden" id="qr">
						<span class="wx-code" id="filePicker">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					</div>
				</div>
				<a href="#" class="save-sure" onclick="savePressInfo()">确认保存</a>
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
			/*background: #00b7ee;*/
			padding: 10px 15px;
			color: #fff;
			text-align: center;
			border-radius: 3px;
			overflow: hidden;
		}
		

		.webuploader-pick-disable {
			opacity: 0.6;
			pointer-events:none;
		}
	</style>
<script type="text/javascript">
	$(document).ready(function(){
		/**获取城市**/
		$("#province").change(function() {
			$("#province option:selected").attr("selected","");
			var provinceid = $("#province").val();
			
			$("#city").empty();
			$("#city").append("<option value='0'>请选择城市</option>");
	   		$.post("<?php echo U('Home/Users/loadCity');?>",{"provinceid":provinceid},function(data) {
		    
				for(var i = 0;i<data.length;i++){
					$("#city").append("<option value="+data[i].area_id+">"+data[i].area_name+"</option>");
				}
			});
	    });
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
                $('#qr').val(img_url);
                $('#pic-name').val(data.name);
               
                layer.msg('上传成功', {icon: 6});
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

    function savePressInfo(){
    	
    	var provinceid  = $("#province option:selected").val()
    	var cityid  = $("#city option:selected").val()
    	/*var provincename  = $("#province option:selected").text()
    	var cityname  = $("#city option:selected").text()*/
    	var area = $("#area").val();
    	var press_intro  =$("#press_intro").val();
    	var press_url = $("#press_url").val();
    	var press_qr = $("#qr").val();
    	
    	$.post("<?php echo U('Home/Users/pressInfo');?>", {"provinceid":provinceid,"cityid":cityid,"area":area,"press_intro":press_intro,"press_url":press_url,"press_qr":press_qr}, function(data){
    		console.log("cg");
    		if(data.status==1){
    			layer.msg("资料修改成功",{icon:6});
    		}else{
    			layer.msg("资料修改失败",{icon:5});
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