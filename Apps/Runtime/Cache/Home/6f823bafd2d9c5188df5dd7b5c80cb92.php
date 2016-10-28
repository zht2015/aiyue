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
     <li><a href="#">研究</a></li>
     <li><a href="#">新闻BLOG</a></li>
     <li><a href="#">资源库</a></li>
    </ul>
   </div>
   </div>
 </div>
</div>

  <div class="main gap">
    <div class="mbx-nav-box"> <a href="#">首页</a><i></i><span class="name">图书</span> <span class="mbx-search">
      <input type="search" class="input">
      <button type="button" class="btn"></button>
      </span> </div>
    <!--面包屑及搜索导航-->
    
    <div class="screening-condition">
      <dl class="each">
        <dt><i></i>全部</dt>
        <dd> <span>中小学配备书目<i>(1408)</i></span> <span>儿童文学 <i>(100)</i></span> <span>其他儿童读物 <i>(50)</i></span> <span>科普/百科 <i>(50)</i></span> <span>励志 <i>(50)</i></span> <span>小说 <i>(50)</i></span> <span>中国史<i>(50)</i></span> <span>管理<i>(50)</i></span> <span>中小学配备书目<i>(1408)</i></span> <span>儿童文学 <i>(100)</i></span> <span>小说 <i>(50)</i></span> <span>中国史<i>(50)</i></span> <span>管理<i>(50)</i></span> </dd>
      </dl>
      <dl class="each">
        <dt><i></i>作者</dt>
        <dd> <span>中国大陆</span> <span>美国</span> <span>英国</span> <span>日本</span> <span>法国</span> <span>德国</span> <span>韩国</span> </dd>
      </dl>
      <dl class="each">
        <dt><i></i>年龄</dt>
        <dd> <span>0-3周岁</span> <span>3-6周岁</span> <span>6-12周岁</span> <span>12周岁以上</span> </dd>
      </dl>
      <dl class="each">
        <dt><i></i>筛选条件：</dt>
        <dd> <span class="close">文学 <em></em></span> <span class="close">作者：中国大陆<em></em></span> <span class="close">年龄：6-12周岁<em></em></span> </dd>
      </dl>
    </div>
    <!--筛选条件-->
    <div class="screening-condition1 clearfix"> <span class="cur">收藏<i></i></span> <span class="line">浏览<i></i></span> <span>点击<i></i></span> </div>
    <div class="booklist-two">
      <ul class="list">
        <li class="selected-blue">
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">出现分页必须是20个的时候</h3>
            <p>4和5的最小公倍数</p>
          </div>
        </li>
        <li class="selected-orange">
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">大屏5个4排表示1页</h3>
            <p>小屏4个5排表示1页</p>
          </div>
        </li>
        <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">汉字练习/儿童字练习/儿童启字练习/儿童启字练习/儿童启字练习/儿童启字练习/儿童启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
        <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">汉字练习/儿童字练习/儿童启字练习/儿童启字练习/儿童启字练习/儿童启字练习/儿童启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
        <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
        <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                        <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                        <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                        <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                        <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                        <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                        <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
                <li>
          <div class="item-main">
            <div class="pic-wrap">
              <div class="pic-box"><img src="/Public/Home/images2/upload/s-ts-1.jpg">
                <div class="mask">
                  <p><a href="#">图书详情</a>/<a href="#">加入书单</a></p>
                </div>
              </div>
            </div>
            <h3 class="title">启蒙天天练</h3>
            <p>作者：余华</p>
          </div>
        </li>
      </ul>
    </div>
    <div class="page"> <span class="prev"></span> <a href="#" class="cur">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">..</a> <a href="#">99</a> <a href="#">100</a> <span class="next"></span> </div>
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