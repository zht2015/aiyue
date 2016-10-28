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


  <link href="/Public/Home/style/ScrollbarY.css" type="text/css" rel="stylesheet"/>

  <script src="/Public/Home/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script>

  $(window).load(function(){
   $(".first-floor-content").mCustomScrollbar();
   $(".reply-scroll-main").mCustomScrollbar();
   $(".reading-notes-txt").mCustomScrollbar();
   
  });
  </script>
  <div class="suspension-nav-wrap clearfix">
    <div class="right-floatNav"> <a href="#" class="s1"><i></i>我的书单</a> <a href="#" class="s2"><i></i>制作书单</a> <a href="#" class="s3 last"><i></i>上传图书</a> </div>
  </div>
  <!--左右浮动导航-->
  <div class="main gap clearfix">
    <div class="blist-details-left">
      <div class="details-03 clearfix">
        <div class="ts-pic selected-blue selected-orange">
          <div class="ts-pic-inner"><img src="/Public/Home/images2/upload/s-ts-2.jpg"></div>
        </div>
        <div class="ts-other">
          <h2 class="title">适合中小学生读的三十本童话书</h2>
          <span class="additional-function"><a href="javascript:;" class="video" title="支持视频播放"></a> <a href="javascript:;" class="voice" title="支持音频播放"></a></span>
          <div class="info-01"><span>站内推荐：</span>重在“推介”,目的在于让人喜欢.一般写法：读懂文章,把握文章体裁类型及主题.要向读者介绍一篇文章,首先应该告诉大家文章的主要内容.然后应该.....</div>
          <div class="info-02"> <span class="read-age"><em></em>适读年龄：<i>7-12周岁</i></span> <span class="book-sort"><em></em>所属类别：<i>恐怖</i><i>搞笑</i><i>冒险</i></span> </div>
          <div class="info-03"><span>作者：七度魚</span><span>出版社：爱阅基金出版社</span><span>ISN编号：077552288</span></div>
          <div class="info-03"><span>图书编号：025687</span><span>出版时间：2015.03.10</span></div>
          <div class="collect-btn2"> <a href="#" class="add"><em></em>加入书单</a> <a href="#" class="tj"><em></em>推荐图书</a> <span class="info">(推荐数：<i>100003</i>)</span> </div>
          <div class="info-04"> <span class="jc"><em></em><a href="#">纠错此书</a></span> <span class="sc"><em></em> <a href="#">收藏</a><i>(1000)</i></span> <span class="rg"><em></em>读过</span> <span class="fx"><em></em>分享 <a href="#" class="wx" title="分享到微信"></a> <a href="#" class="wb" title="分享到新浪微博"></a> </span> </div>
        </div>
      </div>
      <div class="details-03-nav">
        <ul>
          <li class="cur"><a href="javascript:;">内容介绍</a></li>
          <li><a href="javascript:;">作者介绍</a></li>
          <li><a href="javascript:;">图书评论（10000）</a></li>
          <li><a href="javascript:;">读书笔记</a></li>
        </ul>
      </div>
      <div class="details-02">
        <div class="content-introduce">
          <div class="list-sort-01">
            <p>国际绘本顶尖绘本大师安野光雅特意为孙子创作的温情之作</p>
            <p>蔬菜水果表情连连变，动物面具哇哇叫，立体手掌哈哈笑。好玩又好看的认知绘本系列。</p>
            <p>引导婴幼儿认识自然界的动物、植物，通过做游戏的方式锻炼孩子的注意力、观察力和认知能力。</p>
            <p>随书附赠透明塑料表情卡片。小小手掌立体模切，内文可裁切为幼儿面具。</p>
            <p>日本电视台报道推荐，引发加印狂潮。</p>
          </div>
          <div class="list-sort-02">
            <h3>内容介绍：</h3>
           <p>《微笑南瓜》通过各种蔬菜水果的水彩画和对应的名字，引导婴幼儿认识自然界的动物、植物。随书附赠了透明的表情卡片，放在内文的画上，蔬菜水果就有了不同的哭笑表情，可以增强亲子互动。通过做游戏的方式锻炼孩子的注意力、观察力和认知能力。</p>
           <p>《面具绘本》翻开内文，每一页都是憨态可掬的动物。有兔子、狗狗，猎豹，猴子。独特的打孔设计，方便读者把内文裁剪下来，戴在宝宝的脸上，一起玩面具游戏。白色的底色，简洁明朗的画风，充分适应了婴幼儿的视觉认知。独特的亲子互动游戏方式多姿多彩。</p>
           <p>
《不见了，不见了》捂住眼睛，小猫不见了，翻开下一页，“啪”地松开双手，小猫又登场了。接着是大熊、小狐狸，爸爸妈妈和小宝宝自己！生动饱满的画面，韵律感十足的文字，充满期待的翻页和表演游戏，一定能让小宝宝快快乐乐融入书中！相信每个妈妈都跟宝宝玩过这样的游戏，巧妙地融入亲子互动是本套书的另一大特色。对于0-3岁的宝宝来说，书也是玩具。把读书变成游戏，在游戏中学习，不仅能极大调动孩子的参与性，还能让孩子在愉快的心情中吸收书中传达的知识。同时还能培养宝宝与父母间亲密的依恋关系，让宝宝在幸福的氛围中快乐成长。</p>
          </div>
        </div>
          <!--内容介绍-->
        <div class="author-introduce">
          <div class="list-sort-01">
              <p>里面书写作者的介绍</p>
              <p>作者超级牛逼啊xxxx,后台编辑</p>
          </div>
        </div>
        <!--作者介绍-->
        <div class="books-details-comment">
          <div class="comment-one clearfix">
            <div class="left-touxiang"><img src="/Public/Home/images2/upload/tx-03.jpg"/><i></i></div>
            <div class="textbox">
              <textarea class="txt" placeholder="在此处写下您的评论"></textarea>
              <p class="btn-box">
                <button type="button" class="btn">提交</button>
              </p>
            </div>
          </div>
          <div class="pl-category"><img src="/Public/Home/images2/pl-hot-1.png">热门评论</div>
          <div class="comment-two clearfix">
            <div class="tx-wrap">
              <div class="left-touxiang is_v"><img src="/Public/Home/images2/upload/tx-05.jpg"/><i></i></div>
              <h3 class="name" title="拉灯是被我独立KO的">拉灯是被我独立KO的</h3>
            </div>
            <div class="textbox">
              <div class="first-floor">
                <div class="time">2015.12.01  11：00</div>
                <div class="first-floor-content">
                  <div class="first-floor-inner">
                    <p>首先——作者没有换，发布者是客论坛或者我个人的微博都可以找到。</p>
                  </div>
                </div>
                <div class="reply-box"> <span class="reply"><a href="javascript:;">回复</a>(<i>3000</i>)</span> <span class="reply-other"><i>展开余下回复</i></span> </div>
              </div>
              <div class="other-reply-box">
                <div class="reply-hidden">
                  <div class="reply-scroll-main">
                    <div class="each-other-reply clearfix">
                      <div class="tx-wrap1">
                        <div class="left-touxiang1"><img src="/Public/Home/images2/upload/tx-08.jpg"/><i></i></div>
                      </div>
                      <div class="textbox1">
                        <div class="time">2015.12.01  11：00</div>
                        <div class="reply-situation"> <span class="party-B">超级大哥马勒戈壁</span> <em>回复</em> <span class="party-A">拉灯是被我独立KO的</span> <span class="reply2-btn"><a href="javascript:;">回复</a></span> </div>
                        <div class="each-pl-nr">
                          <p>沙发..</p>
                        </div>
                      </div>
                    </div>
                    <div class="each-other-reply clearfix">
                      <div class="tx-wrap1">
                        <div class="left-touxiang1"><img src="/Public/Home/images2/upload/tx-07.jpg"/><i></i></div>
                      </div>
                      <div class="textbox1">
                        <div class="time">2015.12.01  11：00</div>
                        <div class="reply-situation"> <span class="party-B">隔壁王尼玛</span> <em>回复</em> <span class="party-A">拉灯是被我独立KO的</span> <span class="reply2-btn"><a href="javascript:;">回复</a></span> </div>
                        <div class="each-pl-nr">
                          <p>66666666666666666</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="textarea-wrap">
                  <div class="simulate-textarea" contenteditable="true"> <span class="to-whom">回复&nbsp;<i>拉灯是被我独立KO的：</i>&nbsp;</span> </div>
                  <div class="simulate-textarea-btn">
                    <button type="button" class="btn">提交</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pl-category"><img src="/Public/Home/images2/pl-hot-2.png">全部评论</div>
          <div class="comment-two clearfix">
            <div class="tx-wrap">
              <div class="left-touxiang"><img src="/Public/Home/images2/upload/tx-05.jpg"/><i></i></div>
              <h3 class="name" title="拉灯是被我独立KO的">拉灯是被我独立KO的</h3>
            </div>
            <div class="textbox">
              <div class="first-floor">
                <div class="time">2015.12.01  11：00</div>
                <div class="first-floor-content">
                  <div class="first-floor-inner">
                    <p>字体超级多，就会出现滚动条</p>
                  </div>
                </div>
                <div class="reply-box"> <span class="reply"><a href="javascript:;">回复</a>(<i>3000</i>)</span> <span class="reply-other"><i>展开余下回复</i></span> </div>
              </div>
              <div class="other-reply-box">
                <div class="reply-hidden">
                  <div class="reply-scroll-main">
                    <div class="each-other-reply clearfix">
                      <div class="tx-wrap1">
                        <div class="left-touxiang1"><img src="/Public/Home/images2/upload/tx-08.jpg"/><i></i></div>
                      </div>
                      <div class="textbox1">
                        <div class="time">2015.12.01  11：00</div>
                        <div class="reply-situation"> <span class="party-B">超级大哥马勒戈壁</span> <em>回复</em> <span class="party-A">拉灯是被我独立KO的</span> <span class="reply2-btn"><a href="javascript:;">回复</a></span> </div>
                        <div class="each-pl-nr">
                          <p>沙发..</p>
                        </div>
                      </div>
                    </div>
                    <div class="each-other-reply clearfix">
                      <div class="tx-wrap1">
                        <div class="left-touxiang1 is_v1"><img src="/Public/Home/images2/upload/tx-09.jpg"/><i></i></div>
                      </div>
                      <div class="textbox1">
                        <div class="time">2015.12.01  11：00</div>
                        <div class="reply-situation"> <span class="party-B">普京</span> <em>回复</em> <span class="party-A">习近平</span> <span class="reply2-btn"><a href="javascript:;">回复</a></span> </div>
                        <div class="each-pl-nr">
                          <p>大家不要吵，听我说</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="textarea-wrap">
                  <div class="simulate-textarea" contenteditable="true"> <span class="to-whom">回复&nbsp;<i>拉灯是被我独立KO的：</i>&nbsp;</span> </div>
                  <div class="simulate-textarea-btn">
                    <button type="button" class="btn">提交</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="comment-two clearfix">
            <div class="tx-wrap">
              <div class="left-touxiang is_v"><img src="/Public/Home/images2/upload/tx-05.jpg"/><i></i></div>
              <h3 class="name" title="拉灯是被我独立KO的">拉灯是被我独立KO的</h3>
            </div>
            <div class="textbox">
              <div class="first-floor">
                <div class="time">2015.12.01  11：00</div>
                <div class="first-floor-content">
                  <div class="first-floor-inner">
                    <p>gfhrtuytu。</p>
                    <p>博都可以找到。</p>
                  </div>
                </div>
                <div class="reply-box"> <span class="reply"><a href="javascript:;">回复</a>(<i>3000</i>)</span> <span class="reply-other"><i>展开余下回复</i></span> </div>
              </div>
              <div class="other-reply-box">
                <div class="reply-hidden">
                  <div class="reply-scroll-main">
                    <div class="each-other-reply clearfix">
                      <div class="tx-wrap1">
                        <div class="left-touxiang1"><img src="/Public/Home/images2/upload/tx-08.jpg"/><i></i></div>
                      </div>
                      <div class="textbox1">
                        <div class="time">2015.12.01  11：00</div>
                        <div class="reply-situation"> <span class="party-B">超级大哥马勒戈壁</span> <em>回复</em> <span class="party-A">拉灯是被我独立KO的</span> <span class="reply2-btn"><a href="javascript:;">回复</a></span> </div>
                        <div class="each-pl-nr">
                          <p>沙发..</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="textarea-wrap">
                  <div class="simulate-textarea" contenteditable="true"> <span class="to-whom">回复&nbsp;<i>拉灯是被我独立KO的：</i>&nbsp;</span> </div>
                  <div class="simulate-textarea-btn">
                    <button type="button" class="btn">提交</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="page"> <span class="prev"></span> <a href="#" class="cur">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">..</a> <a href="#">99</a> <a href="#">100</a> <span class="next"></span> </div>
          <!--翻页--> 
        </div>
        <!--评论（books-details-comment）全部结束--> 
        <div class="reading-notes">
         <div class="pl-category"><img src="/Public/Home/images2/pl-hot-1.png">热门笔记</div>
         <div class="each-read-notes clearfix">
            <div class="tx-wrap">
            <div class="left-touxiang is_v"><img src="/Public/Home/images2/upload/tx-08.jpg"/><i></i></div>
            </div>
            <div class="textbox">
             <div class="time">2015.12.01  11：00</div>
             <div class="reading-notes-txt">
              <div class="reading-notes-txt-inner">
                <p>是一本好书.在我们生活里有一种宝贵的财富叫友谊,它是用金钱买不到的.要是我们的人生里没有朋友,没有友谊,你将会是多么孤独呀!但是威尔伯的一生却是那么幸福.因为它有一个成天陪伴它,而且为了救他牺牲自己生命的朋友.威尔伯注定不会孤单.</p>
                <p>书中令我印象最深刻的莫过于夏洛和威尔伯之间的友情.一只蜘蛛给威尔伯第一感觉是可怕的,但是孤独很快就迫使他对夏洛有了进一步了解,并异常惊喜地发现夏洛其实有一颗善良的心.在威尔伯“我不想死啊,我不想死啊!”的哀号中,夏洛那一句坚定的“你不会死的,我救你!”</p>
                                <p>是一本好书.在我们生活里有一种宝贵的财富叫友谊,它是用金钱买不到的.要是我们的人生里没有朋友,没有友谊,你将会是多么孤独呀!但是威尔伯的一生却是那么幸福.因为它有一个成天陪伴它,而且为了救他牺牲自己生命的朋友.威尔伯注定不会孤单.</p>
                <p>书中令我印象最深刻的莫过于夏洛和威尔伯之间的友情.一只蜘蛛给威尔伯第一感觉是可怕的,但是孤独很快就迫使他对夏洛有了进一步了解,并异常惊喜地发现夏洛其实有一颗善良的心.在威尔伯“我不想死啊,我不想死啊!”的哀号中,夏洛那一句坚定的“你不会死的,我救你!”</p>
                                <p>是一本好书.在我们生活里有一种宝贵的财富叫友谊,它是用金钱买不到的.要是我们的人生里没有朋友,没有友谊,你将会是多么孤独呀!但是威尔伯的一生却是那么幸福.因为它有一个成天陪伴它,而且为了救他牺牲自己生命的朋友.威尔伯注定不会孤单.</p>
                <p>书中令我印象最深刻的莫过于夏洛和威尔伯之间的友情.一只蜘蛛给威尔伯第一感觉是可怕的,但是孤独很快就迫使他对夏洛有了进一步了解,并异常惊喜地发现夏洛其实有一颗善良的心.在威尔伯“我不想死啊,我不想死啊!”的哀号中,夏洛那一句坚定的“你不会死的,我救你!”</p>
                                <p>是一本好书.在我们生活里有一种宝贵的财富叫友谊,它是用金钱买不到的.要是我们的人生里没有朋友,没有友谊,你将会是多么孤独呀!但是威尔伯的一生却是那么幸福.因为它有一个成天陪伴它,而且为了救他牺牲自己生命的朋友.威尔伯注定不会孤单.</p>
                <p>书中令我印象最深刻的莫过于夏洛和威尔伯之间的友情.一只蜘蛛给威尔伯第一感觉是可怕的,但是孤独很快就迫使他对夏洛有了进一步了解,并异常惊喜地发现夏洛其实有一颗善良的心.在威尔伯“我不想死啊,我不想死啊!”的哀号中,夏洛那一句坚定的“你不会死的,我救你!”</p>
                                <p>是一本好书.在我们生活里有一种宝贵的财富叫友谊,它是用金钱买不到的.要是我们的人生里没有朋友,没有友谊,你将会是多么孤独呀!但是威尔伯的一生却是那么幸福.因为它有一个成天陪伴它,而且为了救他牺牲自己生命的朋友.威尔伯注定不会孤单.</p>
                <p>书中令我印象最深刻的莫过于夏洛和威尔伯之间的友情.一只蜘蛛给威尔伯第一感觉是可怕的,但是孤独很快就迫使他对夏洛有了进一步了解,并异常惊喜地发现夏洛其实有一颗善良的心.在威尔伯“我不想死啊,我不想死啊!”的哀号中,夏洛那一句坚定的“你不会死的,我救你!”</p>
              </div>
             </div>
          <div class="other-cz">
           <span class="zan"><a href="#" class="cur"><i></i><em>取消赞</em></a>（12）</span>
          <a href="#" class="fx-btn">分享该笔记</a>
          </div>       
          </div>
         </div>
         <!--一条读书笔记-->
            <div class="each-read-notes clearfix">
            <div class="tx-wrap">
            <div class="left-touxiang is_v"><img src="/Public/Home/images2/upload/tx-08.jpg"/><i></i></div>
            </div>
            <div class="textbox">
             <div class="time">2015.12.01  11：00</div>
             <div class="reading-notes-txt">
              <div class="reading-notes-txt-inner">
                <p>是一将会是多么孤独呀!</p>
              </div>
             </div>
          <div class="other-cz">
           <span class="zan"><a href="#"><i></i><em>赞一个</em></a>（12）</span>
          <a href="#" class="fx-btn">分享该笔记</a>
          </div>       
          </div>
         </div>
         <!--一条读书笔记-->
          <div class="pl-category"><img src="/Public/Home/images2/pl-hot-3.png">全部笔记</div>
          <div class="each-read-notes clearfix">
            <div class="tx-wrap">
            <div class="left-touxiang is_v"><img src="/Public/Home/images2/upload/tx-08.jpg"/><i></i></div>
            </div>
            <div class="textbox">
             <div class="time">2015.12.01  11：00</div>
             <div class="reading-notes-txt">
              <div class="reading-notes-txt-inner">
                <p>是一将会是一将会是多么一将会是多么一将会是多么一将会是多么一将会是多么一将会是多么一将会是多么多么孤独呀!</p>
                 <p>是一将会是一将会是多么一将会是多么一将会是多么一将会是多么一将会是多么一将会是多么一将会是多么多么孤独呀!</p>
                  <p>是一将会是一将会是多么一将会是多么一将会是多么一将会是多么一将会是多么一将会是多么一将会是多么多么孤独呀!</p>
              </div>
             </div>
          <div class="other-cz">
           <span class="zan"><a href="#"><i></i><em>赞一个</em></a>（12）</span>
          <a href="#" class="fx-btn">分享该笔记</a>
          </div>       
          </div>
         </div>
         <!--一条读书笔记-->
         <div class="each-read-notes clearfix">
            <div class="tx-wrap">
            <div class="left-touxiang "><img src="/Public/Home/images2/upload/tx-05.jpg"/><i></i></div>
            </div>
            <div class="textbox">
             <div class="time">2015.12.01  11：00</div>
             <div class="reading-notes-txt">
              <div class="reading-notes-txt-inner">
                <p>6356</p>
              </div>
             </div>
          <div class="other-cz">
           <span class="zan"><a href="#"><i></i><em>赞一个</em></a>（12）</span>
          <a href="#" class="fx-btn">分享该笔记</a>
          </div>       
          </div>
         </div>
         <!--一条读书笔记-->
                  <div class="each-read-notes clearfix">
            <div class="tx-wrap">
            <div class="left-touxiang "><img src="/Public/Home/images2/upload/tx-06.jpg"/><i></i></div>
            </div>
            <div class="textbox">
             <div class="time">2015.12.01  11：00</div>
             <div class="reading-notes-txt">
              <div class="reading-notes-txt-inner">
                <p>6356</p>
              </div>
             </div>
          <div class="other-cz">
           <span class="zan"><a href="#"><i></i><em>赞一个</em></a>（12）</span>
          <a href="#" class="fx-btn">分享该笔记</a>
          </div>       
          </div>
         </div>
         <!--一条读书笔记-->
                  <div class="each-read-notes clearfix">
            <div class="tx-wrap">
            <div class="left-touxiang is_v"><img src="/Public/Home/images2/upload/tx-07.jpg"/><i></i></div>
            </div>
            <div class="textbox">
             <div class="time">2015.12.01  11：00</div>
             <div class="reading-notes-txt">
              <div class="reading-notes-txt-inner">
                <p>6356</p>
              </div>
             </div>
          <div class="other-cz">
           <span class="zan"><a href="#"><i></i><em>赞一个</em></a>（12）</span>
          <a href="#" class="fx-btn">分享该笔记</a>
          </div>       
          </div>
         </div>
         <!--一条读书笔记-->
                  <div class="page"> <span class="prev"></span> <a href="#" class="cur">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">..</a> <a href="#">99</a> <a href="#">100</a> <span class="next"></span> </div>
          <!--翻页-->   
        </div>
        <!--读书笔记-->
      </div>
      <div class="details-04">
      <div class="sort-name">本书被以下书单收录<i></i></div>
      <div class="sc-table">
       <table>
       <tr>
          <th class="th-1">0</th>
          <th class="th-2">1</th>
          <th class="th-3">2</th>
       </tr>
        <tr>
         <td><span class="pic"><img src="/Public/Home/images2/upload/sm-01.jpg"></span></td>
         <td><div class="title"><a href="#">适合孩子读的二十六本童年绘本，于丹倾力推荐，合格家长必买书籍汇总</a></div></td>
         <td><span>收藏数：122203</span></td>
        </tr>
                <tr>
         <td><span class="pic"><img src="/Public/Home/images2/upload/sm-02.jpg"></span></td>
         <td><div class="title"><a href="#">适合孩子读的二十六本童年绘本，于丹倾力推荐，合格家长必买书籍汇总</a></div></td>
         <td><span>收藏数：122203</span></td>
        </tr>
                <tr>
         <td><span class="pic"><img src="/Public/Home/images2/upload/sm-03.jpg"></span></td>
         <td><div class="title"><a href="#">适合孩子读的二十六本童年绘本，于丹倾力推荐，合格家长必买书籍汇总</a></div></td>
         <td><span>收藏数：122203</span></td>
        </tr>
                <tr>
         <td><span class="pic"><img src="/Public/Home/images2/upload/sm-04.jpg"></span></td>
         <td><div class="title"><a href="#">适合孩子读的二十六本童年绘本，于丹倾力推荐，合格家长必买书籍汇总</a></div></td>
         <td><span>收藏数：122203</span></td>
        </tr>
       </table>
      </div>
      </div>
    </div>
    <!--左侧-->
    <div class="blist-details-right">
      <div class="category-list-wrap">
        <div class="category-name">收藏这本书的人还喜欢：</div>
        <div class="category-list-b">
          <ul>
            <li>
              <div class="pic"><img src="/Public/Home/images2/upload/s-ts-1.jpg"> <a href="#" class="link"><span></span></a> </div>
              <h3 class="title" title="早起的虫儿没鸟吃">01早起的虫儿没鸟吃</h3>
            </li>
            <li>
              <div class="pic"><img src="/Public/Home/images2/upload/sm-02.jpg"> <a href="#" class="link"><span></span></a> </div>
              <h3 class="title" title="早起的虫儿没鸟吃">02早起的虫儿没鸟吃</h3>
            </li>
            <li>
              <div class="pic"><img src="/Public/Home/images2/upload/s-ts-1.jpg"> <a href="#" class="link"><span></span></a> </div>
              <h3 class="title" title="早起的虫儿没鸟吃">03早起的虫儿没鸟吃</h3>
            </li>
            <li>
              <div class="pic"><img src="/Public/Home/images2/upload/s-ts-1.jpg"> <a href="#" class="link"><span></span></a> </div>
              <h3 class="title" title="早起的虫儿没鸟吃">04早起的虫儿没鸟吃</h3>
            </li>
          </ul>
        </div>
        <div class="category-list-b-focus"> <span class="prev"><i></i></span> <span class="next"><i></i></span> </div>
      </div>
      <div class="category-list-wrap">
        <div class="category-name">相关资讯</div>
        <div class="book-message-box">
          <ul>
            <li> <span class="num">1</span>
              <h3 class="title"><a href="#">2015书店主题推荐陈列大赛·七月图辑之一.....</a></h3>
            </li>
            <li> <span class="num">2</span>
              <h3 class="title"><a href="#">2015书店主题推荐陈列大赛·七月图辑之一.....</a></h3>
            </li>
            <li> <span class="num">3</span>
              <h3 class="title"><a href="#">2015书店主题推荐陈列大赛·七月图辑之一.....</a></h3>
            </li>
            <li> <span class="num">4</span>
              <h3 class="title"><a href="#">2015书店主题推荐陈列大赛·七月图辑之一.....</a></h3>
            </li>
            <li> <span class="num">5</span>
              <h3 class="title"><a href="#">2015书店主题推荐陈列大赛·七月图辑之一.....</a></h3>
            </li>
            <li> <span class="num">6</span>
              <h3 class="title"><a href="#">2015书店主题推荐陈列大赛·七月图辑之一.....</a></h3>
            </li>
            <li> <span class="num">7</span>
              <h3 class="title"><a href="#">2015书店主题推荐陈列大赛·七月图辑之一.....</a></h3>
            </li>
            <li> <span class="num">8</span>
              <h3 class="title"><a href="#">2015书店主题推荐陈列大赛·七月图辑之一.....</a></h3>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--右侧--> 
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