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
<div class="top-0"><a href="#"><img src="/Public/Home//Public/Home/images/ne-top0.jpg"/></a></div>
<!--个人中心-个人首页开始-->
<div class="main">
    <div class="personalenter">
        <!--加载菜单-->
        

        <div class="person-right">
            <div class="integ-top">
                <ul>
                    <li class="curE"><a>积分明细 </a></li>
                    <li><a>积分收入</a></li>
                    <li><a>积分支出 </a></li>
                    <li><a>积分说明 </a></li>
                </ul>
            </div>
            <div class="integ-cen">
                <!-- 我的积分-->
                <div class="jifsm">
                    <div class="jfmx-1">
                        <p>当前可用积分<br/><span>210</span></p>
                        <p>总获得积分<br/><font>210</font></p>
                        <p>总支出积分<br/><font>0</font></p>
                        <a href="#">积分兑换超值商品</a>
                    </div>

                    <div class="jfmx-2">
                        <p class="w30">来源/用途</p>
                        <p class="w24">积分变化</p>
                        <p class="w23">日期</p>
                        <p class="w23">备注</p>
                    </div>

                    <div class="jfmx-3">
                        <p class="w30"><a class="lbjft" href="#"><img src="/Public/Home/images/upload/grzx-list1.jpg"/></a><a class="lbjfz" href="#">CEM 华盛昌 便携式测光仪照度仪亮度计光度计 测光表照度计</a></p>
                        <p class="w24"><span class="jjifen">+35</span></p>
                        <p class="w23">2016-03-14</p>
                        <p class="w23">交易获得</p>
                    </div>

                    <div class="jfmx-3">
                        <p class="w30"><a class="lbjft" href="#"><img src="/Public/Home/images/upload/grzx-list1.jpg"/></a><a class="lbjfz" href="#">CEM 华盛昌 便携式测光仪照度仪亮度计光度计 测光表照度计</a></p>
                        <p class="w24"><span class="jjifen">+35</span></p>
                        <p class="w23">2016-03-14</p>
                        <p class="w23">交易获得</p>
                    </div>

                    <div class="jfmx-3">
                        <p class="w30"><a class="lbjft" href="#"><img src="/Public/Home/images/upload/grzx-list1.jpg"/></a><a class="lbjfz" href="#">CEM 华盛昌 便携式测光仪照度仪亮度计光度计 测光表照度计</a></p>
                        <p class="w24"><span class="jjifen">+35</span></p>
                        <p class="w23">2016-03-14</p>
                        <p class="w23">交易获得</p>
                    </div>

                    <div class="jfmx-3">
                        <p class="w30"><a class="lbjft" href="#"><img src="/Public/Home/images/upload/grzx-list1.jpg"/></a><a class="lbjfz" href="#">CEM 华盛昌 便携式测光仪照度仪亮度计光度计 测光表照度计</a></p>
                        <p class="w24"><span class="jjifen">+35</span></p>
                        <p class="w23">2016-03-14</p>
                        <p class="w23">交易获得</p>
                    </div>

                    <div class="jfmx-3">
                        <p class="w30"><a class="lbjft" href="#"><img src="/Public/Home/images/upload/grzx-list1.jpg"/></a><a class="lbjfz" href="#">CEM 华盛昌 便携式测光仪照度仪亮度计光度计 测光表照度计</a></p>
                        <p class="w24"><span class="jfenj">-35</span></p>
                        <p class="w23">2016-03-14</p>
                        <p class="w23">积分兑换</p>
                    </div>

                    <div class="jfmx-3">
                        <p class="w30"><a class="lbjft" href="#"><img src="/Public/Home/images/upload/grzx-list1.jpg"/></a><a class="lbjfz" href="#">CEM 华盛昌 便携式测光仪照度仪亮度计光度计 测光表照度计</a></p>
                        <p class="w24"><span class="jfenj">-35</span></p>
                        <p class="w23">2016-03-14</p>
                        <p class="w23">积分兑换</p>
                    </div>

                    <div class="jfmx-3">
                        <p class="w30"><a class="lbjft" href="#"><img src="/Public/Home/images/upload/grzx-list1.jpg"/></a><a class="lbjfz" href="#">CEM 华盛昌 便携式测光仪照度仪亮度计光度计 测光表照度计</a></p>
                        <p class="w24"><span class="jfenj">-35</span></p>
                        <p class="w23">2016-03-14</p>
                        <p class="w23">积分兑换</p>
                    </div>

                    <div class="page pt42">
                        <ul>
                            <li>上一页</li>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>下一页</li>
                        </ul>
                    </div>
                </div>
                <div class="jifsm">2</div>
                <div class="jifsm">3</div>
                <div class="jifsm">4</div>
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