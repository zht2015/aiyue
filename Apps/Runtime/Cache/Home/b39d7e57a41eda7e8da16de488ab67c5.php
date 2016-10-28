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
        <div class="awards-wrap">
          <div class="focus prev"></div>
          <div class="focus next"></div>
          <div class="awards-list">
            <ul>
              <li>
                <div class="pic"><img src="/Public/Home/images2/upload/awards-icon.png"></div>
                <p>1安徒生奖项</p>
              </li>
              <li>
                <div class="pic"><img src="/Public/Home/images2/upload/awards-icon.png"></div>
                <p>2安徒生奖项</p>
              </li>
              <li>
                <div class="pic"><img src="/Public/Home/images2/upload/awards-icon.png"></div>
                <p>3安徒生奖项</p>
              </li>
              <li>
                <div class="pic"><img src="/Public/Home/images2/upload/awards-icon.png"></div>
                <p>4安徒生奖项</p>
              </li>
              <li>
                <div class="pic"><img src="/Public/Home/images2/upload/awards-icon.png"></div>
                <p>5安徒生奖项</p>
              </li>
              <li>
                <div class="pic"><img src="/Public/Home/images2/upload/awards-icon.png"></div>
                <p>6安徒生奖项</p>
              </li>
              <li>
                <div class="pic"><img src="/Public/Home/images2/upload/awards-icon.png"></div>
                <p>7安徒生奖项</p>
              </li>
              <li>
                <div class="pic"><img src="/Public/Home/images2/upload/awards-icon.png"></div>
                <p>8安徒生奖项</p>
              </li>
            </ul>
          </div>
        </div>
        <!--获奖列表-->
        <div class="awards-title-name">奖项简介</div>
        <div class="awards-txt">
          <p class="text-info">国际安徒生奖（Hans Christian Andersen Award）由国际少年儿童读物联盟于1956年设立，由丹麦女王玛格丽特二世赞助，以童话大师安徒生的名字命名。
            该奖每两年评选一次，以奖励世界范围内优秀的儿童图书作家和插图画家。获奖者将被授予一枚金质奖章和一张奖状。最初只授予在世的作家，从1965年起，也授予优秀的插图画家。
            获奖者限于长期从事青少年读物的创作并作出卓越贡献者。至目前为止有26作家和20位插图画家获奖（国际安徒生奖获奖作家名录）。至今尚未有中国作家获奖，但曾有中国作家和画家孙幼军/裘兆明（1990）、金波/杨永青（1992）、秦文君/吴带生（2002）、曹文轩/王晓明（2004）、张之路/陶文杰（2006）获得过该奖项的提名。</p>
        </div>
        <div class="awards-title-name">历年获奖者</div>
        <div class="awards-txt">
          <table class="awards-list-tb">
            <tr>
              <th class="th1">得奖年代</th>
              <th class="th2">得奖作者</th>
              <th class="th3">得奖者作品</th>
            </tr>
            <tr>
              <td>1956</td>
              <td>依列娜· 法吉恩（英）</td>
              <td>《捷克年》、《皇帝的夜莺》、《巴亚雅王子》、《好兵帅克》、《仲夏夜之梦》、《手》、《好兵帅克》</td>
            </tr>
            <tr>
              <td>1956</td>
              <td>依列娜· 法吉恩（英） 依列娜· 法吉恩（ 依列娜· 法吉恩（ 依列娜· 法吉恩（ 依列娜· 法吉恩（ 依列娜· 法吉恩（</td>
              <td>《捷克年》、《皇帝的夜莺》、《巴亚雅王子》、《好兵帅克》、《仲夏夜之梦》、《手》、《好兵帅克》</td>
            </tr>
            <tr>
              <td>1956</td>
              <td>依列娜· 法吉恩（英）</td>
              <td>《捷克年》、《皇帝的夜莺》、《巴亚雅王子》、《好兵帅克》、《仲夏夜之梦》、《手》、《好兵帅克》</td>
            </tr>
            <tr>
              <td>1956</td>
              <td>依列娜· 法吉恩（英）</td>
              <td>《捷克年》、《皇帝的夜莺》、《巴亚雅王子》、《好兵帅克》、《仲夏夜之梦》、《手》、《好兵帅克》</td>
            </tr>
          </table>
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