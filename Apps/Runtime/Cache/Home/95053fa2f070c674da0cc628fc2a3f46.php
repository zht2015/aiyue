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

  
  <div class="about-wrap">
   <div class="about-main">
   <div class="aboutus-title">我们是谁？</div>
    <div class="abous-01">
    <img src="/Public/Home/images2/upload/pic2.jpg" class="show-pic">
    <div class="right-txt">
    <P>爱阅公益  是一家关注儿童阅读品质，致力于促进社会对阅读的认知，以"共建有品质的阅读国家"为使命的公益组织。</P>
    <p>阅读的社会认知，需要我们一起来推动。在我们这个国家，人们说起读书，指的多是在学校上课学习教材，阅读，则被理解为读课外书，而课外书往往又被认为和"学习"是争时间的，会影响成绩，家庭和学校往往把阅读和学习对立起来。实际上，阅读能力是个人学习能力的核心和基础，一个人若没有良好的阅读能力，小到对一个科目的理解，大到对世界的认知都会产生学习障碍。
    </p>
    <p>我们是一个充满激情，能够创造性解决问题的团队。我们希望能够给世界带来改变。
    我们的使命是："共建有品质的阅读国家。"
    </p>
    <p>我们已经在全国十二个省份捐建了248所小学图书馆.</p>
    <p>我们一直相信阅读的力量！</p>
    </div>
    </div>
   </div>
  </div>
  <!--第一块-->
  
<div class="about-wrap gray">
  <div class="about-main">
    <div class="aboutus-title">我们的书目</div>
    <div class="abouts-02">
      <div class="focus prev"></div>
      <div class="focus next"></div>
      <div class="abouts-02-main">
        <ul class="list">
          <li>
            <div class="pic"><img src="/Public/Home/images2/about-icon-1.png"></div>
            <p class="txt">组织机构和个人就犹如拥有一份地图，让您按图索骥找到优秀童书</p>
          </li>
          <li>
            <div class="pic"><img src="/Public/Home/images2/about-icon-2.png"></div>
            <p class="txt">作为基金会的捐赠书目，与社会公众共享使用，使每个孩子都能读上优秀的童书。</p>
          </li>
          <li>
            <div class="pic"><img src="/Public/Home/images2/about-icon-3.png"></div>
            <p class="txt">可以通过阅读实现自我学习和成长，遵循适切性、经典性、趣味性、科学性、均衡性</p>
          </li>
          <li>
            <div class="pic"><img src="/Public/Home/images2/about-icon-3.png"></div>
            <p class="txt">可以通过阅读实现自我学习和成长，遵循适切性、经典性、趣味性、科学性、均衡性</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--第二块-->

<div class="about-wrap">
  <div class="about-main">
    <div class="aboutus-title">如何使用我们</div>
    <div class="abouts-03">
      <div class="focus prev"></div>
      <div class="focus next"></div>
      <div class="abouts-03-main">
        <ul class="list">
          <li>
            <dl class="abouts-03-txt">
              <dt><img src="/Public/Home/images2/about-icon-6.png"></dt>
              <dd>
                <h3>我们做什么？</h3>
                <p>我们为希望能够读到好书孩子以及家长们提供一个书单和图书交流的平台，祝愿每个孩子都能正确接收书本的教育。</p>
              </dd>
            </dl>
          </li>
          <li>
            <dl class="abouts-03-txt">
              <dt><img src="/Public/Home/images2/about-icon-4.png"></dt>
              <dd>
                <h3>如何使用？</h3>
                <p>您可以在此网站上分享、寻找您喜欢的书单，并与其他用户一起分享相关的信息。</p>
              </dd>
            </dl>
          </li>
          <li>
            <dl class="abouts-03-txt">
              <dt><img src="/Public/Home/images2/about-icon-5.png"></dt>
              <dd>
                <h3>网站包括什么？</h3>
                <p>书目网站包括了书单、图书等呈现性内容，并提供了与之相关的最新资讯和信息，让用户可以享受更优质的服务。</p>
              </dd>
            </dl>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--第三块-->
  
<div class="about-wrap">
  <div class="about-main">
    <div class="aboutus-title">研发团队</div>
    <div class="abouts-04">
     <div class="yftd-each">
      <ul>
        <li>
        <div class="pic"><img src="/Public/Home/images2/upload/td-1.jpg"></div>
        <h3><i>李文</i>爱阅基金会理事长</h3>
        </li>
                <li>
        <div class="pic"><img src="/Public/Home/images2/upload/td-1.jpg"></div>
         <h3><i>李文</i>爱阅基金会理事长</h3>
        </li>
                <li>
        <div class="pic"><img src="/Public/Home/images2/upload/td-1.jpg"></div>
         <h3><i>李文</i>爱阅基金会理事长</h3>
        </li>
                <li>
        <div class="pic"><img src="/Public/Home/images2/upload/td-1.jpg"></div>
         <h3><i>李文</i>爱阅基金会理事长</h3>
        </li>
      </ul>
     </div>
      <ul class="abouts-04-focus">
          <li class="cur"></li>
          <li></li>
          <li></li>
          <li></li>
      </ul>
    </div>
  </div>
</div>
<!--第四块-->

<div class="about-wrap gray">
  <div class="about-main">
    <div class="aboutus-title">
    加入我们 <img src="/Public/Home/images2/about-font.png" style="display:block; margin:20px auto 0;">
     </div>
    <div class="abouts-05">
      <ul class="recruitment-list">
        <li>
          <div class="join-main">
            <h1 class="zp-name">活动策划师</h1>
            <div class="join-main-inner">
              <div class="join-scroll-main">
                <div class="join-scroll-inner">
                  <p>人数：1人</p>
                  <p>地址：深圳市南山区侨香路4068号智慧广场B栋1座2301-2</p>
                  <h3>工作职责</h3>
                  <p>1. 负责品脾设计工作，包括品牌视觉识别系统设计、平面应用设计、网站设计、包装设计；</p>
     
                </div>
              </div>
            </div>
          
            <div class="paging">
              <a href="javascript:;" class="prev"></a>
              <a href="javascript:;" class="next"></a>
            </div>
          </div>
        </li>
        <li>
          <div class="join-main">
            <h1 class="zp-name">活动策划师</h1>
            <div class="join-main-inner">
              <div class="join-scroll-main">
                <div class="join-scroll-inner">
                     <p>人数：1人</p>
                  <p>地址：深圳市南山区侨香路4068号智慧广场B栋1座2301-2</p>
                  <h3>工作职责</h3>
                  <p>1. 负责品脾设计工作，包括品牌视觉识别系统设计、平面应用设计、网站设计、包装设计；</p>
                  <p>2. 独立完成或协作完成设计文件；</p>
                  <p>3. 配合必要的市场研究和品牌审计工作；</p>
                  <p>4. 善于讲标，并善于沟通；</p>
                  <h3>任职要求</h3>
                  <p>1、大专以上学历，要求新闻学、广</p>
                  <p>2、大专以上学历，要求新闻学、广</p>
                  <p>3、大专以上学历，要求新闻学、广</p>
                                       <p>人数：1人</p>
                  <p>地址：深圳市南山区侨香路4068号智慧广场B栋1座2301-2</p>
                  <h3>工作职责</h3>
                  <p>1. 负责品脾设计工作，包括品牌视觉识别系统设计、平面应用设计、网站设计、包装设计；</p>
                  <p>2. 独立完成或协作完成设计文件；</p>
                  <p>3. 配合必要的市场研究和品牌审计工作；</p>
                  <p>4. 善于讲标，并善于沟通；</p>
                  <h3>任职要求</h3>
                  <p>1、大专以上学历，要求新闻学、广</p>
                  <p>2、大专以上学历，要求新闻学、广</p>
                  <p>3、大专以上学历，要求新闻学、广</p>
                                       <p>人数：1人</p>
                  <p>地址：深圳市南山区侨香路4068号智慧广场B栋1座2301-2</p>
                  <h3>工作职责</h3>
                  <p>1. 负责品脾设计工作，包括品牌视觉识别系统设计、平面应用设计、网站设计、包装设计；</p>
                  <p>2. 独立完成或协作完成设计文件；</p>
                  <p>3. 配合必要的市场研究和品牌审计工作；</p>
                  <p>4. 善于讲标，并善于沟通；</p>
                  <h3>任职要求</h3>
                  <p>1、大专以上学历，要求新闻学、广</p>
                  <p>2、大专以上学历，要求新闻学、广</p>
                  <p>3、大专以上学历，要求新闻学、广</p>
                </div>
              </div>
            </div>
        
               <div class="paging">
             <a href="javascript:;" class="prev"></a>
              <a href="javascript:;" class="next"></a>
            </div>
          </div>
        </li>
        <li>
          <div class="join-main">
            <h1 class="zp-name">活动策划师</h1>
            <div class="join-main-inner">
              <div class="join-scroll-main">
                <div class="join-scroll-inner">
                   <p>人数：1人</p>
                  <p>地址：深圳市南山区侨香路4068号智慧广场B栋1座2301-2</p>
                  <h3>工作职责</h3>
                  <p>1. 负责品脾设计工作，包括品牌视觉识别系统设计、平面应用设计、网站设计、包装设计；</p>
                  <p>2. 独立完成或协作完成设计文件；</p>
                  <p>3. 配合必要的市场研究和品牌审计工作；</p>
                  <p>4. 善于讲标，并善于沟通；</p>
                  <h3>任职要求</h3>
                  <p>1、大专以上学历，要求新闻学、广</p>
                  <p>2、大专以上学历，要求新闻学、广</p>
                  <p>3、大专以上学历，要求新闻学、广</p>
                </div>
              </div>
            </div>
           
                        <div class="paging">
             <a href="javascript:;" class="prev"></a>
              <a href="javascript:;" class="next"></a>
            </div>
          </div>
        </li>
        <li>
          <div class="join-main">
            <h1 class="zp-name">活动策划师</h1>
            <div class="join-main-inner">
              <div class="join-scroll-main">
                <div class="join-scroll-inner">
                       <p>人数：1人</p>
                  <p>地址：深圳市南山区侨香路4068号智慧广场B栋1座2301-2</p>
                  <h3>工作职责</h3>
                  <p>1. 负责品脾设计工作，包括品牌视觉识别系统设计、平面应用设计、网站设计、包装设计；</p>
                  <p>2. 独立完成或协作完成设计文件；</p>
                  <p>3. 配合必要的市场研究和品牌审计工作；</p>
                  <p>4. 善于讲标，并善于沟通；</p>
                  <h3>任职要求</h3>
                  <p>1、本科及以上学历，2年及以上外贸工作经验，英语听说读写流利；</p>
                  <p>2、熟练使用office等办公软件，具有一定的网络搜索技巧；</p>
                  <p>3、具备良好的团队合作意识，责任心强，自我激励程度高；</p>
                  <p>4、良好的沟通交流技巧，优秀的公关及谈判能力，语言和文字表达能力强；</p>
                  <p>5、有酒店、房地产项目以及开关电源、灯饰等建材行业工作经验者优先考虑；</p>
                  <p>6、形象好。</p>
                </div>
              </div>
            </div>
             <div class="paging">
              <a href="javascript:;" class="prev"></a>
              <a href="javascript:;" class="next"></a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<!--第五块-->
   
    

<div class="about-wrap">
  <div class="about-main">
    <div class="aboutus-title">联系我们</div>
    <div class="abouts-06 clearfix">
    <div class="left">
      <dl class="lx-address">
       <dt>联系方式</dt>
       <dd>
        <p>深圳市南山区侨香路4068号智慧广场B栋1座2301-2</p>
        <p>电话：+86-755-36909846</p>
        <p>传真：+86-755-36909834</p>
        <p>邮箱：<span>fund@iread.org.cn</span></p>
       </dd>
      </dl>
      <dl class="lx-address">
       <dt>更多邮箱联系人</dt>
       <dd>
        <p>企业对接邮箱：<span>tanjuan@iread.org.cn</span></p>
        <p>项目对接邮箱：<span>lizhe@iread.org.cn</span></p>
        <p>品牌对接邮箱：<span>zhangyu@iread.org.cn</span></p>
       </dd>
      </dl>
      
      <dl class="lx-code">
      <dt>关注我们</dt>
      <dd>
      <span><img src="/Public/Home/images2/upload/code2.jpg"></span>
      <a href="#" class="s2">爱悦新浪微博</a>
      <a href="#">书目新浪微博</a>
      </dd>
      </dl>
      
    </div>
    <div class="right"><img src="/Public/Home/images2/upload/dt-01.jpg"></div>
    </div>
  </div>
</div>
<!--第六块-->



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