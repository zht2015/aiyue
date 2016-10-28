<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="/Public/Home/css/style.css">
	<script src="/Public/Home/js/jquery-1.8.2.min.js"></script>
	<script src="/Public/Home/js/script.js"></script>
	<script type="text/javascript" src="/Public/layer/layer.js"></script>
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
				<div class="logo2"><a href="#"><img src="/Public/Home/images2/logo2.png"></a></div>
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
				<img src="/Public/Home/images/head01.jpg" alt="">
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
					<li class="personal01 cur-li"><a href="#"><i></i>个人信息</a></li>
					<li class="personal02"><a href="#"><i></i>我的评价</a></li>
					<li class="personal03"><a href="#"><i></i>我的好友</a></li>
					<li class="personal04"><a href="#"><i></i>制作书单</a></li>
					<li class="personal05"><a href="#"><i></i>上传图书</a></li>
					<li class="personal06"><a href="#"><i></i>我的收藏</a></li>
					<li class="personal07"><a href="#"><i></i>读书笔记</a></li>
					<li class="personal10"><a href="#"><i></i>阅读记录</a></li>
					<li class="personal08"><a href="#"><i></i>站内信</a></li>
					<li class="personal09"><a href="#"><i></i>意见反馈</a></li>
				</ul>
			</div>
		</div>
		<div class="main-right">
			<div class="right-top">
				<div class="per-top">
					<a href="/index.php/Home/Users/userInfo" class="per-span">个人资料</a>
					<a href="/index.php/Home/Users/uploadAvatar" class="per-span">修改头像</a>
					<a href="/index.php/Home/Users/userInfo" class="per-span cur-per">修改密码</a>
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
					<a href="#" class="change-sure" onclick="savePwd();">确认修改</a>
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
            	layer.tips('密码修改成功', '.change-sure', {
                   tips: [1, 'green'],
                   time: 3000
               });
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
</body>
</html>