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

  <div class="main">
    <div class="source">
      <h5 class="source-head">[ 资源库 ]</h5>
      <div class="source-title">
        <a href="#" class="cur-source">全部</a>
        <a href="#">视频</a>
        <a href="#">采访</a>
        <a href="#">文章</a>
      </div>
      <div class="source-list clearfix">
        <ul>
          <li>
            <img src="/Public/Home/images2/upload/source.jpg" alt="">
            <div class="book-mask">
              <span class="source-span1"><img src="/Public/Home/images2/source03.png" alt="">中学生科学教育课堂采访</span>
              <span class="source-span2">radio 1</span>
              <div class="source-icon">
                <a href="#" class="source-icon1"></a>
                <a href="#" class="source-icon2"></a>
                <a href="#" class="source-icon3"></a>
              </div>
            </div>
            <i class="source-i source-radio"></i>
          </li>
          <li>
            <img src="/Public/Home/images2/upload/source.jpg" alt="">
            <div class="book-mask">
              <span class="source-span1"><img src="/Public/Home/images2/source05.png" alt="">中学生科学教育课堂采访</span>
              <span class="source-span2">radio 1</span>
              <div class="source-icon">
                <a href="#" class="source-icon4"></a>
                <a href="#" class="source-icon2"></a>
                <a href="#" class="source-icon3"></a>
              </div>
            </div>
            <i class="source-i source-book"></i>
          </li>
          <li>
            <img src="/Public/Home/images2/upload/source.jpg" alt="">
            <div class="book-mask">
              <span class="source-span1"><img src="/Public/Home/images2/source04.png" alt="">中学生科学教育课堂采访</span>
              <span class="source-span2">radio 1</span>
              <div class="source-icon">
                <a href="#" class="source-icon1"></a>
                <a href="#" class="source-icon2"></a>
                <a href="#" class="source-icon3"></a>
              </div>
            </div>
            <i class="source-i source-video"></i>
          </li>
          <li>
            <img src="/Public/Home/images2/upload/source.jpg" alt="">
            <div class="book-mask">
              <span class="source-span1"><img src="/Public/Home/images2/source04.png" alt="">中学生科学教育课堂采访</span>
              <span class="source-span2">radio 1</span>
              <div class="source-icon">
                <a href="#" class="source-icon1"></a>
                <a href="#" class="source-icon2"></a>
                <a href="#" class="source-icon3"></a>
              </div>
            </div>
            <i class="source-i source-video"></i>
          </li>
          <li>
            <img src="/Public/Home/images2/upload/source.jpg" alt="">
            <div class="book-mask">
              <span class="source-span1"><img src="/Public/Home/images2/source03.png" alt="">中学生科学教育课堂采访</span>
              <span class="source-span2">radio 1</span>
              <div class="source-icon">
                <a href="#" class="source-icon1"></a>
                <a href="#" class="source-icon2"></a>
                <a href="#" class="source-icon3"></a>
              </div>
            </div>
            <i class="source-i source-radio"></i>
          </li>
          <li>
            <img src="/Public/Home/images2/upload/source.jpg" alt="">
            <div class="book-mask">
              <span class="source-span1"><img src="/Public/Home/images2/source05.png" alt="">中学生科学教育课堂采访</span>
              <span class="source-span2">radio 1</span>
              <div class="source-icon">
                <a href="#" class="source-icon4"></a>
                <a href="#" class="source-icon2"></a>
                <a href="#" class="source-icon3"></a>
              </div>
            </div>
            <i class="source-i source-book"></i>
          </li>
          <li>
            <img src="/Public/Home/images2/upload/source.jpg" alt="">
            <div class="book-mask">
              <span class="source-span1"><img src="/Public/Home/images2/source05.png" alt="">中学生科学教育课堂采访</span>
              <span class="source-span2">radio 1</span>
              <div class="source-icon">
                <a href="#" class="source-icon4"></a>
                <a href="#" class="source-icon2"></a>
                <a href="#" class="source-icon3"></a>
              </div>
            </div>
            <i class="source-i source-book"></i>
          </li>
          <li>
            <img src="/Public/Home/images2/upload/source.jpg" alt="">
            <div class="book-mask">
              <span class="source-span1"><img src="/Public/Home/images2/source04.png" alt="">中学生科学教育课堂采访</span>
              <span class="source-span2">radio 1</span>
              <div class="source-icon">
                <a href="#" class="source-icon1"></a>
                <a href="#" class="source-icon2"></a>
                <a href="#" class="source-icon3"></a>
              </div>
            </div>
            <i class="source-i source-video"></i>
          </li>
          <li>
            <img src="/Public/Home/images2/upload/source.jpg" alt="">
            <div class="book-mask">
              <span class="source-span1"><img src="/Public/Home/images2/source03.png" alt="">中学生科学教育课堂采访</span>
              <span class="source-span2">radio 1</span>
              <div class="source-icon">
                <a href="#" class="source-icon1"></a>
                <a href="#" class="source-icon2"></a>
                <a href="#" class="source-icon3"></a>
              </div>
            </div>
            <i class="source-i source-radio"></i>
          </li>
        </ul>
      </div>
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
  <!--main结束--> 
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