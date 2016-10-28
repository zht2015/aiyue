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
          <ul class="regcut-btn">
          <li class="cur">个人用户</li>
          <li>出版社用户</li>
          </ul>
 
<div class="zc-switch-box">
  <div class="qy-each-input">
    <input type="text" class="input" placeholder="手机号码" id="phone">

  </div>
  <div class="qy-each-input">
    <input type="text" class="input" placeholder="用户名" id="userName1">

  </div>
  <div class="qy-each-input">
    <input type="password" class="input" placeholder="密码" id="password1">

  </div>
  <div class="qy-each-input">
    <input type="text" class="input yzm" placeholder="验证码" id="verifyCode">
    <a href="javascript:void(0);" class="send-btn" id="btnSendCode" onclick="sendVerifyCode()">发送验证码到手机</a> 

 
  </div>
  <div class="zddl">
    <input type="checkbox" class="ck" id="xy_user" checked="checked">
    我同意《<a href="#" class="xy">爱阅基金-网站服务协议</a>》 </div>
  <button type="button" class="dl-btn btn-user" onclick="userRegister()">立即注册</button>
</div> 

<div class="zc-switch-box">
  <div class="qy-each-input">
    <input type="text" class="input" placeholder="用户名" id="userName2">

  </div>
  <div class="qy-each-input">
    <input type="text" class="input" placeholder="单位" id="press">

  </div>
  <div class="qy-each-input">
    <input type="password" class="input" placeholder="密码" id="password2">

  </div>
  <div class="zddl">
    <input type="checkbox" class="ck" checked="checked">
    我同意《<a href="#" class="xy">爱阅基金-网站服务协议</a>》 </div>
  <button type="button" class="dl-btn" onclick="pressRegister()">立即注册</button>
</div>  
   </div>
      </div>
    <img src="/Public/Home/images2/reg-icon.jpg" class="bg">
  </div>
</div>
</div>

<script type="text/javascript">
    var InterValObj; //timer变量，控制时间
    var count = 200; //间隔函数，1秒执行
    var curCount;//当前剩余秒数

    var license =$("#xy_user").is(':checked');
    if(!license){
      $(".btn-user").attr("disabled",true);
      $(".btn-user").css("background","#ccc");
    }else{
      $(".btn-user").attr("disabled",false);
      $(".btn-user").css("background","#ff9600");
    }
 

  $(".btn-user").click(function(){
    var license =$("#xy_user").is(':checked');
    if(!license){
      $(".btn-user").attr("disabled",true);
      $(".btn-user").css("background","#ccc");
    }else{
      $(".btn-user").attr("disabled",false);
      $(".btn-user").css("background","#ff9600");
    }
  });

   function sendVerifyCode (){
      var phone=$("#phone").val();
      if(phone==""){layer.tips('手机号码不能为空', '#phone');return false}
      //验证手机号码格式
      var pattern = /^1[34578]\d{9}$/; 
      if(!pattern.test(phone)){layer.tips("手机号码格式不正确", '#phone');return false;}
      
      $.post("<?php echo U('Home/Users/sendMsg');?>", {"phone":phone,"templateId":30746,"type":"register"}, function(data){
                
                if(data.status==1){
                  //200s内禁止发送
                   /* layer.tips(data.message, '#verifyCode', {
                       tips: [1, '#F90'],
                       time: 1000
                   });*/

                    curCount = count;
                    $("#btnSendCode").attr("disabled", "true");
                    //$("#btnSendCode").attr("background", "#ccc");
                    $("#btnSendCode").html(curCount + "秒后可重发验证码");
                    InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次

                }else if(data.status==-1){
                   layer.tips(data.message, '#verifyCode', {
                       tips: [1, '#F90'],
                       time: 1000
                   });
                }else if(data.status==-2){
                  //手机号码校验失败
                   layer.tips(data.message, '#phone', {
                       tips: [1, '#F90'],
                       time: 1000
                   });
                }
          
      });
   
    }
    //timer处理函数
    function SetRemainTime() {
        if (curCount == 0) {                
            window.clearInterval(InterValObj);//停止计时器
            $("#btnSendCode").removeAttr("disabled");//启用按钮
            $("#btnSendCode").html("重新发送验证码");
        }
        else {
            curCount--;
            $("#btnSendCode").html(curCount + "秒后可重发验证码");
        }
    }

    function userRegister(){
      var phone=$("#phone").val();
      var userName=$("#userName1").val();
      var password=$("#password1").val();
      var verifyCode=$("#verifyCode").val();

     
      if(phone==""){layer.tips('手机号码不能为空', '#phone');return false}
      if(userName==""){layer.tips('帐号不能为空', '#userName1');return false}
      if(password==""){layer.tips('密码不能为空', '#password1');return false}
      if(verifyCode==""){layer.tips('验证码不能为空', '#verifyCode');return false}
      $.post("<?php echo U('Home/Users/userRegister');?>",{"phone":phone,"userName":userName,"password":password,"verifyCode":verifyCode,"type":1},function(data) {          
            if(data.status==1){
              location.href="<?php echo U('Users/registerSuccess');?>";               
            }else if(data.status==-1){
               layer.tips(data.message, '#verifyCode', {
                   tips: [1, '#F90'],
                   time: 1000
               });
            }else if(data.status==-2){
              layer.msg("注册失败",{icon:5});
            }else if(data.status==0){
              layer.tips(data.message, '#phone');return false;
            }else if(data.status==-3){
              layer.tips(data.message, '#userName1');return false;
            }
        });    
    }

    function pressRegister(){
      var userName=$("#userName2").val();
      var press=$("#press").val();
      var password=$("#password2").val();

      if(userName==""){layer.tips('用户名不能为空', '#userName2');return false}
      if(press==""){layer.tips('单位不能为空', '#press');return false}
      if(password==""){layer.tips('密码不能为空', '#password2');return false}

      $.post("<?php echo U('Home/Users/userRegister');?>",{"userName":userName,"password":password,"press":press,"type":2},function(data) {          
            if(data.status==1){
              location.href="/index.php/Home/Users/tjzl/id/"+data.id;               
            }else if(data.status==-1){
               layer.tips(data.message, '#userName2');return false;
            }else if(data.status==-2){
              layer.tips(data.message, '#press');return false;
            }else if(data.status==-3){
              layer.tips(data.message, '#password2');return false;
            }else if(data.status==-4){
              layer.msg("注册失败",{icon:5});
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