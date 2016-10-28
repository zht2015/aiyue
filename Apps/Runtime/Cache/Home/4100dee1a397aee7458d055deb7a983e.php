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
        <div class="news-details">
          <h5 class="news-details-title">爱阅公益助力“深圳市儿童医院·Vcare公益空间”</h5>
          <div class="news-details-info">作者：爱阅<span class="fb-date">发布时间：2014-11-06 16:41:10</span></div>
          <div class="news-details-text">
            <p>从乡村到城市，从捐赠图书到研制书目，从培训教师到引导阅读……这是一个由一个个阅读项目组成的阅读系统工程，更是一个传播知识和希望的关爱工程。“我心中常默默念想，天堂应该是图书馆的模样。”文学大师博尔赫斯如是说。在第十三届深圳读书月圆满落下帷幕之际，深圳捐赠换书中心正式启用，作为一项常设性的公益、阅读、传递活动，为深圳打造“图书之城”、“关爱之城”写下浓墨重彩的一笔。捐赠换书中心启动仪式上，深圳市天图教育基金会按照《中国小学图书馆基本配备书目》，捐赠全套3000余册图书，这也是该套图书第一次全面在城市实体展示。</p>
            <p>配备一座资料丰富齐全的图书馆，需要借助专业的书目。深圳市天图教育基金会结合多年项目经验，组织儿童文学专家、儿童教育专家和儿童阅读推广人等专业人士共同研制《中国小学图书馆基本配备书目》，为中国小学图书馆配备图书提供专业的指导。</p>
            <img src="/Public/Home/images2/upload/news01.jpg" alt="">
            <p>除了图书馆书目项目，深圳市天图教育基金会还常年开展“天图乡村小学图书馆项目”、“天图乡村小学阅读项目”、“天图乡村小学教师培训项目”等多项公益活动。目前，已在湖南、贵州、甘肃、云南等近十个省的欠发达地区建立了164所“天图乡村小学图书馆”，将44万册优秀经典图书送到了学校；在甘肃兰州、 平凉等受赠学校开展和实施“天图乡村小学阅读项目”，让阅读走进乡村小学语文课堂；有计划地进行教师培训。此外，深圳市天图教育基金会还将在未来两年推出“小学语文阅读课程研究项目”，进一步细化和提高学生阅读。“我们建立的每一座乡村小学图书馆里每本书都是经过精心挑选的适合儿童阅读的好书，图书馆不仅仅是好书的集合，而且是一座营养均衡的图书馆，内容上涵盖科学、文学、人文，从阅读兴趣培养，低、中、高分级阅读，趣味阅读、经典阅读。”李文兴致勃勃地介绍道。</p>
            <p>配备一座资料丰富齐全的图书馆，需要借助专业的书目。深圳市天图教育基金会结合多年项目经验，组织儿童文学专家、儿童教育专家和儿童阅读推广人等专业人士共同研制《中国小学图书馆基本配备书目》，为中国小学图书馆配备图书提供专业的指导。</p>
            <p>深圳市天图教育基金会理事长李文女士动情地说道：“我们有一个梦想：每个孩子都有一个像天堂一样的图书馆。在这里，阅读是简单、自然、美好的，孩子们感受生命的丰富与诗意，感受思想的深邃、爱的博大，感受天空的辽阔、花开的声音，感受品格的力量；在这里，孩子们随意穿梭在时间的隧道里，翱翔在没有阻隔的空间里；在这里，孩子的阅读兴趣得到培养，想象力得到放飞，创造力、独立思考能力的种子破土发芽，孩子自信、自由、幸福。在这里，老师们在阅读的天空里放飞教育的理想。”</p>
          </div>
          <div class="details-turn">
            <a href="#" class="turn-prev"></a>
            <a href="#" class="turn-next"></a>
          </div>
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