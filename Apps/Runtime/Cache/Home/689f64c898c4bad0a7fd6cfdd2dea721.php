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


<div class="login-reg-wrap">
  <div class="login-reg-box">
      <div class="reg-box">
         <div class="reg-main">
         <p class="info">账号登录</p>
         <div class="each-input icon-1">
          <div class="input-box"><input type="text" id="userName" class="input" placeholder="输入用户名或手机号" 
          value="<?php if(empty($_COOKIE['username'])): else: echo (cookie('username')); endif; ?>" ></div>
          
         </div>
         <div class="each-input icon-2">
          <div class="input-box"><input type="password" id="password" class="input" placeholder="密码" ></div>
           
         </div>
         <div class="each-input icon-3">
          <div class="input-box">
          <input type="text" id="verify" class="input" placeholder="验证码">
          <div class="auth-code"><a href="javascript:verify();"><img id="verifyImg" src="<?php echo U('Home/Common/verify');?>"></a></div>
          <a href="javascript:verify();" class="btn">换一张</a>
          </div>
          
         </div>
         <div class="zddl">
         <a href="<?php echo U('Users/forgetPassword');?>" class="forget-info">忘记密码？</a>
         <input type="checkbox" class="ck">下次自动登录
         </div>
         <button type="button" class="dl-btn" onclick="goLogin();">立即登录</button>
         <div class="third-party-dl">
          <a href="#" class="qt">免费注册</a>
          <a href="#" class="wb">微博登陆</a>
          <a href="#" class="qq">QQ登录</a>
         </div>
         </div>
      </div>
    <img src="/Public/Home/images2/reg-icon.jpg" class="bg">
  </div>
</div>
</div>




<script>
    /**验证码更换**/
    function verify(){
        var time = new Date().getTime();
        document.getElementById('verifyImg').src="<?php echo U('Home/Common/verify');?>?"+time;
    }
    function goLogin(){
        var userName=$("#userName").val();
        var password=$("#password").val();
        var verify=$("#verify").val();
        var remember =$("input[type='checkbox']").is(':checked');

        if(userName==""){layer.tips('帐号不能为空', '#userName');return false}
        if(password==""){layer.tips('密码不能为空', '#password');return false}
        if(verify==""){
            layer.tips('验证码错误', '#verify', {
                tips: [1, '#F90'],
                time: 1000
            });
            return false;
        }
        $.post("<?php echo U('Home/Users/userLogin');?>",{userName:userName,password:password,verify:verify,remember:remember},function(data) {
           
            if(data.status==1){
                location.href="<?php echo U('Home/Index/index');?>";
            }else if(data.status==-1){
              //验证码错误
               layer.tips(data.message, '#verify', {
                   tips: [1, '#F90'],
                   time: 1000
               });
            }else if(data.status==-2){
              //用户名或密码错误
               layer.tips(data.message, '#userName', {
                   tips: [1, '#F90'],
                   time: 1000
               });
            }else if(data.status==-3){
              //出版社用户还没有提交资料，跳转到提交资料界面
              location.href="/index.php/Home/Users/tjzl/id/"+data.id+".html"; 
            }else if(data.status==-4){
              //出版社已提交资料，正在审核中
              location.href="<?php echo U('Home/Users/pressCheck');?>"; 
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