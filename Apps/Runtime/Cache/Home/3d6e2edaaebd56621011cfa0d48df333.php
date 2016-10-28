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
    <?php else: ?>
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
     <li><a href="#">资源库</a></li>
    </ul>
   </div>
   </div>
 </div>
</div>

  
  <div class="content">
    <div class="main gap clearfix">
      <div class="blog-left">
        <div class="column-name">[ 新闻BLOG ]</div>
        <div class="each-tab-nav">
          <h3 class="tab-name s-1 cur">奖项</h3>
          <ul>
            <li><a href="#">文学</a></li>
            <li><a href="#">励志</a></li>
          </ul>
        </div>
        <div class="each-tab-nav">
          <h3 class="tab-name s-2">论坛</h3>
          <ul>
            <li><a href="#">文学</a></li>
            <li><a href="#">励志</a></li>
            <li><a href="#">文学</a></li>
            <li><a href="#">励志</a></li>
          </ul>
        </div>
        <div class="each-tab-nav">
          <h3 class="tab-name s-3">新闻</h3>
          <ul>
            <li><a href="#">文学</a></li>
            <li><a href="#">励志</a></li>
            <li><a href="#">文学</a></li>
            <li><a href="#">励志</a></li>
            <li><a href="#">文学</a></li>
            <li><a href="#">励志</a></li>
          </ul>
        </div>
      </div>
      <!--  新闻blog左侧结束    -->
      <div class="blog-right">
        <div class="forum-list clearfix">
          <ul>
            <li>
              <a href="#">
                <div class="forum-pic">
                  <img src="/Public/Home/images2/upload/forum01.jpg" alt="">
                </div>
                <div class="forum-right">
                  <div class="study-text">
                    <span class="study-text-title">在世界读书日，跟着大师...</span>
                    <span class="study-text-date">2012.06.04</span>
                    <p class="study-p">在悠久的历史长河中，我们的先人留下了浩如烟海般的书籍，这其中蕴含了众多的大智慧，就让我们在学术大家的带领下，遨游于历史之中，去进一步深入领略国学的魅力。本期主题推荐书单即以“......慧——名家讲国学”为主题...</p>
                  </div>
                </div>
                <span class="forum-a"><img src="/Public/Home/images2/forum02.png" alt=""></span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="forum-pic">
                  <img src="/Public/Home/images2/upload/forum01.jpg" alt="">
                </div>
                <div class="forum-right">
                  <div class="study-text">
                    <span class="study-text-title">在世界读书日，跟着大师...</span>
                    <span class="study-text-date">2012.06.04</span>
                    <p class="study-p">在悠久的历史长河中，我们的先人留下了浩如烟海般的书籍，这其中蕴含了众多的大智慧，就让我们在学术大家的带领下，遨游于历史之中，去进一步深入领略国学的魅力。本期主题推荐书单即以“......慧——名家讲国学”为主题...</p>
                  </div>
                </div>
                <span class="forum-a"><img src="/Public/Home/images2/forum02.png" alt=""></span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="forum-pic">
                  <img src="/Public/Home/images2/upload/forum01.jpg" alt="">
                </div>
                <div class="forum-right">
                  <div class="study-text">
                    <span class="study-text-title">在世界读书日，跟着大师...</span>
                    <span class="study-text-date">2012.06.04</span>
                    <p class="study-p">在悠久的历史长河中，我们的先人留下了浩如烟海般的书籍，这其中蕴含了众多的大智慧，就让我们在学术大家的带领下，遨游于历史之中，去进一步深入领略国学的魅力。本期主题推荐书单即以“......慧——名家讲国学”为主题...</p>
                  </div>
                </div>
                <span class="forum-a"><img src="/Public/Home/images2/forum02.png" alt=""></span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="forum-pic">
                  <img src="/Public/Home/images2/upload/forum01.jpg" alt="">
                </div>
                <div class="forum-right">
                  <div class="study-text">
                    <span class="study-text-title">在世界读书日，跟着大师...</span>
                    <span class="study-text-date">2012.06.04</span>
                    <p class="study-p">在悠久的历史长河中，我们的先人留下了浩如烟海般的书籍，这其中蕴含了众多的大智慧，就让我们在学术大家的带领下，遨游于历史之中，去进一步深入领略国学的魅力。本期主题推荐书单即以“......慧——名家讲国学”为主题...</p>
                  </div>
                </div>
                <span class="forum-a"><img src="/Public/Home/images2/forum02.png" alt=""></span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="forum-pic">
                  <img src="/Public/Home/images2/upload/forum01.jpg" alt="">
                </div>
                <div class="forum-right">
                  <div class="study-text">
                    <span class="study-text-title">在世界读书日，跟着大师...</span>
                    <span class="study-text-date">2012.06.04</span>
                    <p class="study-p">在悠久的历史长河中，我们的先人留下了浩如烟海般的书籍，这其中蕴含了众多的大智慧，就让我们在学术大家的带领下，遨游于历史之中，去进一步深入领略国学的魅力。本期主题推荐书单即以“......慧——名家讲国学”为主题...</p>
                  </div>
                </div>
                <span class="forum-a"><img src="/Public/Home/images2/forum02.png" alt=""></span>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="forum-pic">
                  <img src="/Public/Home/images2/upload/forum01.jpg" alt="">
                </div>
                <div class="forum-right">
                  <div class="study-text">
                    <span class="study-text-title">在世界读书日，跟着大师...</span>
                    <span class="study-text-date">2012.06.04</span>
                    <p class="study-p">在悠久的历史长河中，我们的先人留下了浩如烟海般的书籍，这其中蕴含了众多的大智慧，就让我们在学术大家的带领下，遨游于历史之中，去进一步深入领略国学的魅力。本期主题推荐书单即以“......慧——名家讲国学”为主题...</p>
                  </div>
                </div>
                <span class="forum-a"><img src="/Public/Home/images2/forum02.png" alt=""></span>
              </a>
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
  </div>
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