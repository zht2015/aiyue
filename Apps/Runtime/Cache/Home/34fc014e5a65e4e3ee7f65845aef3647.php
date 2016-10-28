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
					<a <?php if($user["user_type"] == 0): ?>href="<?php echo U('Users/userinfo');?>" <?php elseif($user["user_type"] == 1): ?>href="<?php echo U('Users/pressinfo');?>"<?php endif; ?> class="per-span">个人资料</a>
					<a href="/index.php/Home/Users/uploadAvatar.html" class="per-span">修改头像</a>
					<a href="/index.php/Home/Users/userPwd.html" class="per-span cur-per">修改密码</a>
				</div>
			</div>
			<div class="right-inner w740">
				<div class="change-title">修改您的密码：</div>
				<div class="change-inner">
					<div class="pass clearfix">
						<span class="pass-left"><i class="hongxing">*</i>新密码：</span>
						<div class="pass-right atten">
							<div class="pass-wrap">
								<input type="password" name='pwd' id="pwd" >
								<i></i>
							</div>
							
						</div>
					</div>
					<div class="pass clearfix">
						<span class="pass-left"><i class="hongxing">*</i>密码确认：</span>
						<div class="pass-right">
							<div class="pass-wrap">
								<input type="password" name='re_pwd' id="re_pwd">
								<i></i>
							</div>
						</div>
					</div>
					<div class="pass code clearfix">
						<span class="pass-left"><i class="hongxing">*</i>验证码：</span>
						<div class="pass-right">
							<div class="pass-wrap">
								<input type="text" name='verify' id="verify">
							</div>
							<div class="code-box"><a href="javascript:verify();"><img id="verifyImg" src="<?php echo U('Home/Common/verify');?>"></a></div>
							<a href="javascript:verify();">换一张</a>
						</div>
					</div>
					<a href="javascript:void(0)" class="change-sure" onclick="savePwd();">确认修改</a>
				</div>
			</div>
		</div>
	</div>

                                                                                                                                                                            

	<script>
    /**验证码更换**/
    function verify(){
        var time = new Date().getTime();
        document.getElementById('verifyImg').src="<?php echo U('Home/Common/verify');?>?"+time;
    }
    function savePwd(){
        var password=$("#pwd").val();
        var re_password=$("#re_pwd").val();
        var verify=$("#verify").val();
        if(password==""){layer.tips('密码不能为空', '#pwd');return false}
        if(re_password==""){layer.tips('确认密码不能为空', '#re_pwd');return false}
        if(password!=re_password){layer.tips('两次密码不一致', '#re_pwd');return false}
        if(verify==""){
            layer.tips('验证码错误', '#verify', {
                tips: [1, '#F90'],
                time: 1000
            });
            return false;
        }
        $.post("<?php echo U('Home/Users/savePwd');?>",{"password":password,"re_password":re_password,"verify":verify},function(data) {
            if(data.status==1){
            	layer.msg("密码修改成功",{icon:6});
                //location.href="<?php echo U('Home/Users/userInfo');?>";
            }else if(data.status==-2){
               layer.tips('验证码错误', '#verify', {
                   tips: [1, '#F90'],
                   time: 1000
               });
            }else if(data.status==-1){
               layer.tips('两次密码不一致', '#re_pwd', {
                   tips: [1, '#F90'],
                   time: 1000
               });
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