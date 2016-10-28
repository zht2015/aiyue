<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
    <title>华盛昌商城</title>
    <link rel="stylesheet" type="text/css" href="/Public/Home/style/cy.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/style/style.css" />
    <script src="/Public/Home/js/jquery-1.8.2.min.js"></script>
    <script src="/Public/Home/js/comms.js"></script>
    <script src="/Public/Home/js/comm.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/Public/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Home/js/uploader.js"></script>
    <script type="text/javascript" src="/Public/Home/js/basic.js"></script>
</head>
<body id="zf0">
<!--/*顶部开始*/-->
<div class="top">
    <div class="tops">
        <div class="top-1"><a href="<?php echo U('Home/Index/index');?>">华盛昌官网</a><span>丨</span><a href="#">CEM旗舰店</a><span>丨</span><a href="#">仪器应用</a></div>
        <div class="top-2">
            欢迎来到华盛昌商城，
            <?php if($user != ''): ?><a class="cur" href="<?php echo U('Home/Users/index');?>"><?php echo ($user['mobile']); ?></a> <a class="cur" href="javascript:logout();">退出</a><?php else: ?>请 <a class="cur" href="<?php echo U('Home/Users/userLogin');?>">登录</a>
            或 <a class="cur" href="<?php echo U('Home/Users/userRegister');?>">注册</a><?php endif; ?>
            <span>丨</span><a class="cur" href="#"><img src="/Public/Home/images/top_05.jpg" />  400-088-0755</a><span>丨</span> <a href="<?php echo U('Carts/index');?>">我的购物车</a><span>丨</span><a href="<?php echo U('Orders/index');?>">我的订单</a><span>丨</span> <a href="#">手机版</a><span>丨</span> <a href="#">网站导航</a></div>
    </div>
</div>
<!--头部开始-->
<div class="tou">
    <div class="xinzc">

    <a href="<?php echo ($adv1[0]['link_url']); ?>"><img src="<?php echo ($adv1[0]['img_url']); ?>"/></a>
    <!-- <a href="#"><img src="/Public/Home/images/upload/xinyhu.jpg"/></a> -->

    <span id="gxzc"><img src="/Public/Home/images/gzc.jpg"/></span></div>
    <dic class="lsou">
        <div class="lsou-1"><a href="<?php echo U('Home/Index/index');?>"><img id="gxzc" src="/Public/Home/images/logo.jpg" alt="华盛昌商城" title="华盛昌商城"/></a><img class="lr" src="/Public/Home/images/sshu_03.jpg"/><img class="mb10" src="/Public/Home/images/tou_03.jpg"/>
            <img class="ml27" src="/Public/Home/images/tou_14.jpg"/></div>
        <div class="lsou-2">
           <input type="text" placeholder="BT-8806H" class="seInput" id="title" value=""><input type="button" id="selecttle" value="搜索" name="" class="seButton" onclick="selectMarket()" />
            <p>热门搜索：
            <?php if(is_array($hotSelectInfo)): foreach($hotSelectInfo as $key=>$node): ?><a href="#" onclick="selecthot('<?php echo ($node["title"]); ?>')" ><?php echo ($node["title"]); ?></a>&nbsp;<?php endforeach; endif; ?> 
             </p>
        </div>
        <div class="lsou-3">
            <p><img src="/Public/Home/images/tou_09.jpg"/><br/>正品保证</p>
            <p><img src="/Public/Home/images/tou_11.jpg"/><br/>货到付款</p>
        </div>

</div>
</div>

<!--导航开始-->

<header id="header">
    <div class="pc-header">
        <nav class="mainNav">
            <ul class="PcNav-List">
                <li class="qshang"><span>全部商品分类<i></i></span>
                    <ul class="submenu">
                        <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/Goods/index',array('id'=>$v['id']));?>"><i class="iconfont">&#xe608;</i><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
                <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/Goods/index',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </nav>
    </div>
    <div class="mobile-header">
        <nav class="mobile-hd">
            <div class="nav-trigger"></div>
            <h1 class="logo"><a href="#"><img src="/Public/Home/images/logo.jpg"></a></h1>
            <a href="#" class="Login-reg"></a> </nav>
        <nav class="mobile-HomeNav">
            <div class="mobile-HomeNav-inner">
                <ul class="mobileNav-List">
                    <li><a href="#">首页 </a></li>
                    <li><a href="#">红外热像仪</a></li>
                    <li><a href="#">人体测温仪 </a></li>
                    <li><a href="#">测距仪 </a></li>
                    <li><a href="#">环境检测 </a></li>
                    <li><a href="#">电力测试 </a></li>
                    <li><a href="#">工业仪器</a></li>
                    <li><a href="#">配件</a></li>
                    <li><span><i class="arrow"></i>全部商品分类</span>
                        <div class="sub-nav">
                            <a href="#">红外热像仪</a>
                            <a href="#">人体测温仪</a>
                            <a href="#">医疗护理类</a>
                            <a href="#">工业仪器</a>
                            <a href="#">环境检测</a>
                            <a href="#">汽车维修</a>
                            <a href="#">测距仪</a>
                            <a href="#">配件</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<script src="/Public/Home/js/MagicZoom.js" type="text/javascript"></script>
<script src="/Public/Home/js/lightbox.min.js"></script>
<!--立即购买-->
<form action="<?php echo U('Orders/purchaseNow');?>" method="post" id="orderForm1">
    <input type="hidden" value="" id="goodsId" name="id"/>
    <input type="hidden" value="" id="goodsNumber" name="number"/>
</form>

<!--隐藏域-->
<input type="hidden" id="userId" value="<?php echo ($userId); ?>"/> <!--用户是否登录-->
<input type="hidden" id="repertory" value="<?php echo ($goodsInfo['stock_quantity']); ?>"/> <!--库存-->

<div class="top-0"><a href="#"><img src="/Public/Home/images/ne-top0.jpg"/></a></div>
<!--个人中心-个人首页开始-->
<div class="neiye-top-nav"><div class="main pl36"><a href="#">首页</a> > <a href="#">个人中心</a> > <a href="#">商品列表</a> >商品详情</div></div>
<div class="main">
    <div class="personalenter">

        <div class="integraldetails-1">
            <div class="integraldetails-1-1">
                <div id="tsShopContainer">
                    <!--商品封面图片&放大镜图片 start-->
                    <div id="tsImgS"><a href="<?php echo ($goodsInfo['img_url']); ?>" title="images" class="MagicZoom" id="MagicZoom"><img width="498" height="498" src="<?php echo ($goodsInfo['img_url']); ?>" /></a>
                        <div class="fangdajing"><img src=""/></div></div>
                    <!--商品封面图片&放大镜图片 end-->

                    <!--商品相册 start-->
                    <div id="tsPicContainer">
                        <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                        <div id="tsImgSCon">
                            <ul>
                                <?php if(is_array($goodsInfo['photo'])): $k = 0; $__LIST__ = $goodsInfo['photo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li onclick="showPic(<?php echo ($k-1); ?>)" rel="MagicZoom"><img height="42" width="42" src="<?php echo ($v['thumb_path']); ?>" tsImgS="<?php echo ($v['thumb_path']); ?>" /></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <script src="/Public/Home/js/ShopShow.js"></script>
                        <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
                    </div>
                    <!--商品相册 end-->
                </div>
            </div>

            <!--商品信息 start-->
            <div class="integraldetails-1-2">
                <h2 class="biaoti"><?php echo ($goodsInfo['title']); ?></h2>
                <p class="jianjie"><?php echo ($goodsInfo['zhaiyao']); ?></p>
                <div class="jiage">
                    <p class="yuanjia sxyuanjia"><s>原价：￥<?php echo ($goodsInfo['market_price']); ?></s></p>
                    <p class="huiyuanjia sxhuiyuanjia">销售价：¥ <span><?php echo ($goodsInfo['sell_price']); ?></span></p>
                </div>
                <div class="xhysfwzl">
                    <p class="w55">型   号：</p><p class="xinghao">
                    <?php if(is_array($goodsInfo['marketCategory'])): foreach($goodsInfo['marketCategory'] as $key=>$node): ?><span class="curA"><?php echo ($node["title"]); ?></span><?php endforeach; endif; ?>
                    
                    </p>
                </div>
                <!--<?php if($goodsInfo['color'] != ''): ?>-->
                    <div class="xhysfwzl">
                        <p class="w55">颜 色：</p>
                        <p class="xinghao yanse">
                            <!--<?php if(is_array($goodsInfo['color'])): foreach($goodsInfo['color'] as $key=>$v): ?>-->
                            <span class="curA" style="padding-left:5px;"><?php echo ($v); ?></span>
                            <!--<?php endforeach; endif; ?>-->
                        </p>
                    </div>
                <!--<?php endif; ?>-->

                <div class="xhysfwzl">
                    <p class="w55">数   量：</p>
                    <div class="shuliang">
                        <input type="text" placeholder=""  value="1" id="num" class="seInput">
                        <input type="button" value="" name="" id="up" class="seButton" />
                        <input type="button" value="" name="" id="next" class="ssButton" />
                        <p class="ml50">库   存：    <font><?php echo ($goodsInfo['stock_quantity']); ?>件</font></p>
                    </div>
                </div>

                <div class="xhysfwzl borno">
                    <p class="w55"><!--服 务：-->&nbsp;</p>
                    <p class="xinghao fuwu">
                        &nbsp;<br/>
                      <!--  由 华盛昌 发货并提供售后服务。咨询电话：400-088-0755<br/>
                        <a href="#"><img src="/Public/Home/images/zaixianzixun.jpg"/></a>-->
                    </p>
                </div>

                <div class="goujc">
                    <a class="ljgm" href="javascript:promptly(<?php echo ($goodsInfo['id']); ?>);">立即购买</a>
                    <input type="button" value="加入购物车" onclick="addCart(<?php echo ($goodsInfo['id']); ?>)"  name="" class="seButton" />
                </div>

                <div class="fuwcn">
                    <p class="bzcth">服务承诺： 积分兑换商品暂不支持退换货。</p>
                    <p class="scfx">
                        <a class="fxiang" href="javascript:collects(<?php echo ($goodsInfo['id']); ?>);"><i class="iconfont">&#xe612;</i>收藏</a>
                        <!--<a class="fxiang" href="#"><i class="iconfont">&#xe613;</i>分享</a>-->
                    </p>
                </div>

            </div>
            <!--商品信息 end-->

            <div class="integraldetails-1-3">
                <div class="cnixihuan-top"><span>猜你喜欢</span><!--  <input type="button" value="" name="" class="seButton" /> --></div>
                <div class="cnixihuan-cen">
                    <div class="picScroll-top">
                        <div class="bd">
                            <ul class="picList">
                            <!--<?php if(is_array($like)): foreach($like as $key=>$v): ?>-->
                                <li>
                                    <div class="pic">
                                        <a href="<?php echo U('Goods/goodDetails',array('id'=>$v['id']));?>" target="_blank">
                                            <img src="<?php echo ($v['img_url']); ?>" />
                                        </a>
                                    </div>
                                    <div class="title">
                                        <?php echo str_cut($v['title'],8);?>
                                        ￥：<?php echo ($v['sell_price']); ?><br/>
                                        <a href="<?php echo U('Goods/goodDetails',array('id'=>$v['id']));?>" target="_blank">查看详情
                                        </a>
                                    </div>
                                </li>
                            <!--<?php endforeach; endif; ?>-->
                            </ul>
                        </div>
                        <div class="hd">
                            <a class="next"></a>
                            <a class="prev"></a>
                        </div>

                    </div>

                    <script type="text/javascript">
                        jQuery(".picScroll-top").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"topLoop",autoPlay:true,vis:3});
                    </script>
                </div>
            </div>

        </div>


        <!--<div class="integraldetails-2">
            <div class="integraldetails-2-top">
                <ul>
                    <li class="curB">推荐配件</li>
                    <li>推荐套餐</li>
                </ul>
            </div>
            <div class="integraldetails-2-cen">
                <div class="taoczh">
                    <ul>
                        <li><a class="tctu" href="#"><img src="/Public/Home/images/upload/taocantu.jpg" /></a><h2><a href="#">照度计DT-1301...</a></h2><span>原价：359</span></li>
                        <li><a class="tctu" href="#"><img src="/Public/Home/images/upload/taocantu.jpg" /></a><h2><a href="#">照度计DT-1301...</a></h2><span>原价：359</span></li>
                        <li><a class="tctu" href="#"><img src="/Public/Home/images/upload/taocantu.jpg" /></a><h2><a href="#">照度计DT-1301...</a></h2><span>原价：359</span></li>
                        <li><a class="tctu" href="#"><img src="/Public/Home/images/upload/taocantu.jpg" /></a><h2><a href="#">照度计DT-1301...</a></h2><span>原价：359</span></li>
                        <li><a class="tctu" href="#"><img src="/Public/Home/images/upload/taocantu.jpg" /></a><h2><a href="#">照度计DT-1301...</a></h2><span>原价：359</span></li>
                        <div class="tczjia">
                            <h2>套餐价格：<font>¥ 1369</font></h2>
                            <p>节省：¥ 620</p>
                            <a href="#">立即购买</a>
                        </div>
                    </ul>
                </div>
                <div class="taoczh">
                    <ul>
                        <li><a class="tctu" href="#"><img src="/Public/Home/images/upload/taocantu.jpg" /></a><h2><a href="#">照度计DT-1301...</a></h2><span>原价：359</span></li>
                        <li><a class="tctu" href="#"><img src="/Public/Home/images/upload/taocantu.jpg" /></a><h2><a href="#">照度计DT-1301...</a></h2><span>原价：359</span></li>
                        <li><a class="tctu" href="#"><img src="/Public/Home/images/upload/taocantu.jpg" /></a><h2><a href="#">照度计DT-1301...</a></h2><span>原价：359</span></li>
                        <li><a class="tctu" href="#"><img src="/Public/Home/images/upload/taocantu.jpg" /></a><h2><a href="#">照度计DT-1301...</a></h2><span>原价：359</span></li>
                        <div class="tczjia">
                            <h2>套餐价格：<font>¥ 1369</font></h2>
                            <p>节省：¥ 620</p>
                            <a href="#">立即购买</a>
                        </div>
                    </ul>
                </div>
            </div>
        </div>-->
        <div class="integraldetails-3">
            <div class="integraldetails-3-left">
                <div class="integraldetails-1-3">
                    <div class="cnixihuan-top"><span>热卖产品</span> <!-- <input type="button" value="" name="" class="seButton" /> --></div>
                    <div class="cnixihuan-cen">
                        <div class="picScroll-top">
                            <div class="bd">
                                <ul class="picList">
                                <!--<?php if(is_array($Hot['goods'])): foreach($Hot['goods'] as $key=>$v): ?>-->
                                    <li>
                                        <div class="pic">
                                            <a href="<?php echo U('Goods/goodDetails',array('id'=>$v['id']));?>" target="_blank">
                                                <img src="<?php echo ($v['img_url']); ?>" width="182px"height="109px" />
                                            </a>
                                        </div>
                                        <div class="title">
                                            <?php echo ($v['title']); ?>  ￥：<?php echo ($v['market_price']); ?><br/>
                                            <a href="<?php echo U('Goods/goodDetails',array('id'=>$v['id']));?>" target="_blank">查看详情
                                            </a>
                                        </div>
                                    </li>
                                <!--<?php endforeach; endif; ?>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="integraldetails-3-right">
                <div class="integraldetails-3-right-top">
                    <ul>
                        <li  <?php if($_GET['p'] == ''): ?>class="curC"<?php endif; ?>><i class="iconfont">&#xe616;</i>产品介绍</li>
                        <li <?php if($_GET['p'] != ''): ?>class="curC"<?php endif; ?>><i class="iconfont ft24">&#xe617;</i>产品评价</li>
                        <li><i class="iconfont ft24">&#xe615;</i>咨询问答</li>
                        <li><i class="iconfont ft26">&#xe618;</i>售后服务</li>
                    </ul>
                </div>
                <div class="integraldetails-3-right-bottom">
                    <div class="xqxq" <?php if($_GET['p'] != ''): ?>style="display:none;"<?php endif; ?>>
                        <div class="cpxianq" style="margin-top:15px;">
                            <?php echo ($goodsInfo['content']); ?>
                        </div>
                    </div>
                    <div class="xqxq" <?php if($_GET['p'] == ''): ?>style="display:none;"<?php endif; ?>>
                        <div class="xqpinglun">
                            <div class="xqpinglun-top">
                                <ul>
                                    <li class="curJ">全部评论</li>
                                    <!-- <li>满意</li>
                                    <li>一般</li>
                                    <li>差评</li> -->
                                </ul>
                            </div>

                            <div class="xqpinglun-cen" <?php if($_GET['p'] != ''): ?>style="display:block;"<?php endif; ?>>
                            <!--<?php if(is_array($comment['coment'])): foreach($comment['coment'] as $key=>$v): ?>-->
                                <div class="brjdpl">
                                    <div class="brjdpl-left">
                                        <div class="person-toux">
                                            <img src="<?php echo ($v['user']['avatar']); ?>"/>
                                        </div>
                                        <div class="rdmz"><?php echo ($v['user']['user_name']); ?></div>
                                    </div>
                                    <div class="brjdpl-right">
                                        <div class="zhepj-1"><?php echo ($v['add_time']); ?></div>
                                        <div class="zhepj-2"><p><span style="width:100%;"></span></p> <?php echo ($v['hint']); ?>分 &nbsp;  &nbsp;
                                         <?php switch($v['hint']): case "1": ?>非常不满意<?php break;?>
                                            <?php case "2": ?>不满意<?php break;?>
                                            <?php case "3": ?>一般<?php break;?>
                                            <?php case "4": ?>满意<?php break;?>
                                            <?php case "5": ?>非常满意<?php break; endswitch;?>

                                      </div>
                                        <div class="zhepj-3"><?php echo ($v['content']); ?></div>
                                        <!--<?php if($v['reply_content'] != ''): ?>-->
                                        <div class="zhepj-4">华盛昌回复：<?php echo ($v['reply_content']); ?>
                                            <p>回复时间：<?php echo ($v['reply_time']); ?></p></div>
                                        <!--<?php endif; ?>-->
                                    <!--<?php if($v['imgs'] != '' ): ?>-->
                                        <div class="zhepj-5">
                                            <ul class="clearfix imgbox">
                                            <!--<?php if(is_array($v['imgs'])): foreach($v['imgs'] as $key=>$i): ?>-->
                                                <img class="js-lightbox" data-role="lightbox" data-group="group-1" data-id="1" data-source="<?php echo ($i); ?>" src="<?php echo ($i); ?>"/>
                                            <!--<?php endforeach; endif; ?>-->
                                            </ul>
                                        </div>
                                    <!--<?php endif; ?>-->
                                    </div>
                                </div>
                                <!--<?php endforeach; endif; ?>-->
                                <div class="page p20">
                                    <?php echo ($comment['page']); ?>
                                </div>
                            </div>
                               
                            </div>

                        </div>
                    </div>
                    <div class="xqxq" style="display:none;"><?php echo ($goodsInfo['qa']); ?></div>
                    <div class="xqxq" style="display:none;"><?php echo ($goodsInfo['after_sale']); ?></div>
                </div>
            </div>

        </div>

    </div>
</div>



<!--登录弹框-->
<div style="display:none;width:400px;height:380px;" id="login">
    <center><div style="padding:10px 10%;height:70px;width:100%;border-bottom:1px solid;box-shadow:0 3px 9px #ccc;"><img src="/Public/Home/images/logo.jpg"/></div>
    <br/>
   <div style="box-shadow:0 -12px 2px #ccc;" >
            <div style="padding:40px 10% 0;width:100%;"><input type="text" style="width:300px;padding-left:15px;height:45px;" value="" name="username" placeholder="请输入帐号" id="username"/></div>
            <div style="padding:10px 10% 0;width:100%;"><input type="password" style="width:300px;padding-left:15px;height:45px;" value="" name="password" placeholder="请输入密码" id="password"/></div>
                <div style="margin:6px 10% 0 -38%;width:100%;">
                    还没帐号？<a href="javascript:reg();" style="color:blue;">立即注册</a>
                </div>
                <div style="padding:10px 10% 0;width:95%;">
                    <button style="border:0;width:100%;border-radius:3px;background:rgb(14,59,150);color:white;font-size:16px;height:40px;line-height:40px;" class="login">登陆</button>
                </div>
    </div>
    </center>
</div>

<!--注册弹框-->
<div style="display:none;width:400px;height:380px;" id="reg">
    <center><div style="padding:10px 10%;height:70px;width:100%;border-bottom:1px solid;box-shadow:0 3px 9px #ccc;"><img src="/Public/Home/images/logo.jpg"/></div>
        <br/>
        <div style="box-shadow:0 -12px 2px #ccc;" >
            <div style="padding:40px 10% 0;width:100%;"><input type="text" style="width:300px;height:45px;padding-left:15px;" value="" name="userPhone" onchange="verifyPhone();" placeholder="手机号码" id="userPhone"/></div>
            <div style="padding:10px 10% 0;width:100%;"><input type="password" style="width:300px;height:45px;padding-left:15px;" value="" name="password" placeholder="密码" id="regpwd"/></div>
            <div style="padding:10px 10% 0;width:100%;"><input type="password" style="width:300px;height:45px;padding-left:15px;" value="" name="password" placeholder="确认密码" id="regpwd2"/></div>
            <div style="padding:10px 10% 0;width:95%;">
                <button style="border:0;width:100%;border-radius:3px;background:rgb(14,59,150);color:white;font-size:16px;height:40px;line-height:40px;" class="reg">注册</button>
            </div>
        </div>
    </center>
</div>

<script>$(function(){var lightbox = new LightBox({speed:400});});</script>
<script>
    $(function(){
        //提交登录
        $(".login").click(function () {
            var userName = $("#username").val();
            var password = $("#password").val();
            $.post("<?php echo U('Home/Users/userLogin');?>",{flag:1,flags:1,userName:userName,password:password},function(data){
                if(data.status==1){
                    layer.closeAll();
                    layer.msg("登陆成功");
                    setTimeout(function(){
                        location.reload();
                    },300)
                }else{
                    layer.msg("帐号或密码错误");
                }
            });
        });

        //注册方法
        $(".reg").click(function () {
            var userPhone = $("#userPhone").val();
            var userPwd = $("#regpwd").val();
            var userPwd2 = $("#regpwd2").val();
            var re = /^1\d{10}$/;
            if(userPhone==""){
                layer.msg("手机号码不能为空!");return;
            }
            if(userPwd==""){
                layer.msg("密码不能为空!");return;
            }
            if(userPwd2==""){
                layer.msg("确认密码不能为空!");return;
            }
            if(re.test(userPhone)){
                $.post("<?php echo U('Home/Users/verifyPhone');?>",{phone:userPhone},function(data){
                    if(data.status==1){
                        if (userPwd == userPwd2){
                            $.post("<?php echo U('Home/Users/userRegister');?>",{phone:userPhone,password:userPwd,rePassword:userPwd2},function(data){
                                if(data.status==1){
                                    layer.msg("注册成功");
                                    setTimeout(function(){
                                        $("#username").val(userPhone);
                                        layer.closeAll();
                                        setTimeout(function(){
                                            login();
                                        },500);
                                    },300)
                                }else{
                                    layer.msg("注册失败");
                                }
                            });
                        } else
                        {
                            layer.msg("请保证密码一致");
                        }
                    }else{
                        layer.tips('手机号码已存在', '#userPhone', {
                            tips: [1, '#3595CC'],
                            time: 2000
                        });
                    }
                })
            }
        });

        $("#num").keyup(function(){
            var a = $("#num").val();
            var pr = $("#repertory").val();
            if(a<=0){
                $("#num").val("1");
                return false;
            }
            var s = Number(a);
            if(s>pr){
                $("#num").val(pr);
                return false;
            }
        })
        $("#up").click(function(){
            var pr = $("#repertory").val();
            var num =$("#num").val();
            var val = (num*1+1);
            if(val>=pr){
                $("#num").val(pr);
                return false;
            }
            $("#num").val(val);
        });
        $("#next").click(function(){
            var num =$("#num").val();
            var val = (num*1-1);
            if(val<="0"){
                $("#num").val("1");
                return false;
            }
            $("#num").val(val);
        });
    });

    /**收藏**/
    function collects(articleId){
        if ($("#userId").val()<1) {
            login();
        }else{
            $.post("<?php echo U('Collect/addCollect');?>", {id: articleId}, function (data) {
                layer.closeAll();
                if (data.status == 1) {
                    layer.msg("收藏成功");
                } else if (data.status == 2) {
                    layer.msg("该产品已经被您收藏了！");
                } else {
                    layer.msg("收藏失败！");
                }
            })
        }
    }
    /**手机号验证**/
    function verifyPhone(){
        var userPhone=$("#userPhone").val();
        var re = /^1\d{10}$/;
        if(re.test(userPhone)){
            $.post("<?php echo U('Home/Users/verifyPhone');?>",{phone:userPhone},function(data){
                if(data.status==1){
                }else{
                    layer.tips('手机号码已存在', '#userPhone', {
                        tips: [1, '#3595CC'],
                        time: 2000
                    });
                }
            })
        }else{
            layer.tips('手机号码格式错误', '#userPhone', {
                tips: [1, '#3595CC'],
                time: 2000
            });
            return;
        }
    }

    function reg(){
        layer.closeAll();
        layer.open({
            type: 1,
            shift:"1",
            title:"",
            area:['400px','380px'],
            closeBtn:0,
            shadeClose:true,
            content: $("#reg") //这里content是一个普通的String
        });
    }

    function login(){
        layer.open({
            type: 1,
            shift:"2",
            title:"",
            area:['400px','380px'],
            closeBtn:0,
            shadeClose:true,
            content: $("#login") //这里content是一个普通的String
        });
    }

    /**立即购买**/
    function promptly(id){
        if ($("#userId").val()<1) {
            login();
        }else{
            var pr = $("#repertory").val();
            if(pr=="0"){
                layer.msg("商品库存不足!");
                return false;
            }
            var number = $("#num").val();

            $("#goodsNumber").val(number);
            $("#goodsId").val(id);
            $("#orderForm1").submit();
        }
    }

    /**加入购物车**/
    function addCart(articleId){
        if ($("#userId").val()<1) {
            login();
        }else{
            var number = $("#num").val();
            var pr = $("#repertory").val();
            if(pr=="0"){
                layer.msg("商品库存不足!");
                return false;
            }
            layer.load();
            $.post("<?php echo U('Carts/addCart');?>",{id:articleId,number:number},function(data){
                if(data.status==1){
                    layer.closeAll();
                    layer.msg("加入购物车成功");
                    $.post("<?php echo U('Carts/getCartsNumber');?>",function(data){
                        if(data>0){
                            $("#getCartNumbers").show();
                            $("#getCartNumbers").html(data);
                        }
                    })
                }
            })
        }
    }

</script>


<!--底部开始-->
<div class="foot">
    <div class="foots">
        <div class="foot-1">
            <ul>
              <?php if(is_array($list1)): foreach($list1 as $i=>$node): ?><li>
                    <h2><span class="ft-<?php echo ($i+1); ?>"></span><?php echo ($node["title"]); ?></h2>
                        <?php if(is_array($node["footTwo"])): foreach($node["footTwo"] as $key=>$child): ?><a href="<?php echo U('Home/Footer/shoping',array('oneid'=>$node['id'],'twoid'=>$child['id']));?>"><?php echo ($child["title"]); ?></a><?php endforeach; endif; ?>
		                 
                </li><?php endforeach; endif; ?>
              
                <li>
                    <h2><span class="ft-6"></span><?php echo ($footService["title"]); ?></h2>
                    <a><?php echo ($footService["title_adv"]); ?>：</a>
                    <font><?php echo ($footService["phone"]); ?></font>
                    <a class="<?php echo ($footService["contents"]); ?>" href="#">在线客服</a>

                </li>
            </ul>
        </div>

        <div class="foot-2">
            <ul>
               <?php if(is_array($footLogos)): foreach($footLogos as $key=>$node): ?><li>
                    <div class="foot-2-1"><span class="<?php echo ($node['contents']); ?>"></span></div>
                    <div class="foot-2-2">
                        <h2><?php echo ($node['title']); ?></h2>
                        <p><?php echo ($node['ad_content']); ?></p>
                    </div>
                </li><?php endforeach; endif; ?>
            </ul>
        </div>

        <div class="foot-3">
            <a href="#">法律声明</a>丨
            <a href="#">技术支持</a>丨
            <a href="#">网站地图</a>丨
            <a href="#">在线反馈</a>丨
            <a href="#">联系我们</a>

            <p>粤ICP备07502368号    design by：<a href="#"  target="_blank">momu</a></p>
        </div>
    </div>
</div>
<!--登录弹框-->
<div style="display:none;width:400px;height:380px;" id="login">
    <center><div style="padding:10px 10%;height:70px;width:100%;border-bottom:1px solid;box-shadow:0 3px 9px #ccc;"><img src="/Public/Home/images/logo.jpg"/></div>
    <br/>
   <div style="box-shadow:0 -12px 2px #ccc;" >
            <div style="padding:40px 10% 0;width:100%;"><input type="text" style="width:300px;padding-left:15px;height:45px;" value="" name="username" placeholder="请输入帐号" id="username"/></div>
            <div style="padding:10px 10% 0;width:100%;"><input type="password" style="width:300px;padding-left:15px;height:45px;" value="" name="password" placeholder="请输入密码" id="password"/></div>
                <div style="margin:6px 10% 0 -38%;width:100%;">
                    还没帐号？<a href="javascript:reg();" style="color:blue;">立即注册</a>
                </div>
                <div style="padding:10px 10% 0;width:95%;">
                    <button style="border:0;width:100%;border-radius:3px;background:rgb(14,59,150);color:white;font-size:16px;height:40px;line-height:40px;" class="login">登陆</button>
                </div>
    </div>
    </center>
</div>

<!--注册弹框-->
<div style="display:none;width:400px;height:380px;" id="reg">
    <center><div style="padding:10px 10%;height:70px;width:100%;border-bottom:1px solid;box-shadow:0 3px 9px #ccc;"><img src="/Public/Home/images/logo.jpg"/></div>
        <br/>
        <div style="box-shadow:0 -12px 2px #ccc;" >
            <div style="padding:40px 10% 0;width:100%;"><input type="text" style="width:300px;height:45px;padding-left:15px;" value="" name="userPhone" onchange="verifyPhone();" placeholder="手机号码" id="userPhone"/></div>
            <div style="padding:10px 10% 0;width:100%;"><input type="password" style="width:300px;height:45px;padding-left:15px;" value="" name="password" placeholder="密码" id="regpwd"/></div>
            <div style="padding:10px 10% 0;width:100%;"><input type="password" style="width:300px;height:45px;padding-left:15px;" value="" name="password" placeholder="确认密码" id="regpwd2"/></div>
            <div style="padding:10px 10% 0;width:95%;">
                <button style="border:0;width:100%;border-radius:3px;background:rgb(14,59,150);color:white;font-size:16px;height:40px;line-height:40px;" class="reg">注册</button>
            </div>
        </div>
    </center>
</div>
<script type="text/javascript">
     //提交登录
        $(".login").click(function () {
            var userName = $("#username").val();
            var password = $("#password").val();
            $.post("<?php echo U('Home/Users/userLogin');?>",{flag:1,flags:1,userName:userName,password:password},function(data){
                if(data.status==1){
                    layer.closeAll();
                    layer.msg("登陆成功");
                    setTimeout(function(){
                        location.reload();
                    },300)
                }else{
                    layer.msg("帐号或密码错误");
                }
            });
        });

        //注册方法
        $(".reg").click(function () {
            var userPhone = $("#userPhone").val();
            var userPwd = $("#regpwd").val();
            var userPwd2 = $("#regpwd2").val();
            var re = /^1\d{10}$/;
            if(userPhone==""){
                layer.msg("手机号码不能为空!");return;
            }
            if(userPwd==""){
                layer.msg("密码不能为空!");return;
            }
            if(userPwd2==""){
                layer.msg("确认密码不能为空!");return;
            }
            if(re.test(userPhone)){
                $.post("<?php echo U('Home/Users/verifyPhone');?>",{phone:userPhone},function(data){
                    if(data.status==1){
                        if (userPwd == userPwd2) {
                            $.post("<?php echo U('Home/Users/userRegister');?>",{phone:userPhone,password:userPwd,rePassword:userPwd2},function(data){
                                if(data.status==1){
                                    layer.closeAll();
                                    layer.msg("注册成功");
                                    setTimeout(function(){
                                        $("#username").val(userPhone);
                                        login();
                                    },300)
                                }else{
                                    layer.msg("注册失败");
                                }
                            });
                        } else
                        {
                            layer.msg("请保证密码一致");
                        }
                    }else{
                        layer.tips('手机号码已存在', '#userPhone', {
                            tips: [1, '#3595CC'],
                            time: 2000
                        });
                    }
                })
            }
        });
/**手机号验证**/
    function verifyPhone(){
        var userPhone=$("#userPhone").val();
        var re = /^1\d{10}$/;
        if(re.test(userPhone)){
            $.post("<?php echo U('Home/Users/verifyPhone');?>",{phone:userPhone},function(data){
                if(data.status==1){
                }else{
                    layer.tips('手机号码已存在', '#userPhone', {
                        tips: [1, '#3595CC'],
                        time: 2000
                    });
                }
            })
        }else{
            layer.tips('手机号码格式错误', '#userPhone', {
                tips: [1, '#3595CC'],
                time: 2000
            });
            return;
        }
    }
    function reg(){
        layer.closeAll();
        layer.open({
            type: 1,
            shift:"1",
            title:"",
            area:['400px','380px'],
            closeBtn:0,
            shadeClose:true,
            content: $("#reg") //这里content是一个普通的String
        });
    }
    function login(){
        layer.open({
            type: 1,
            shift:"2",
            title:"",
            area:['400px','380px'],
            closeBtn:0,
            shadeClose:true,
            content: $("#login") //这里content是一个普通的String
        });
    }
    //添加到购物车
    $('.gwc').click(function(){
        var a_id           = $(this).attr('a_id');
        var stock_quantity = $(this).attr('stock_quantity');
        var uid            = "<?php echo ($_SESSION['USERS']['id']); ?>";
        if(uid ==''){
            login();
            return false;
        }
        if(typeof(a_id) == "undefined" || typeof(stock_quantity) == "undefined"){
             layer.msg("数据错误!");
            return false;
        }
        if(stock_quantity <= 0){
            layer.msg("商品库存不足!");
            return false;
        }
         layer.load();
        $.post("<?php echo U('Carts/addCart');?>",{id:a_id,number:1},function(data){
            if(data.status==1){
                layer.closeAll();
                layer.msg("加入购物车成功");
                $.post("<?php echo U('Carts/getCartsNumber');?>",function(data){
                    if(data>0){
                        $("#getCartNumbers").show();
                        $("#getCartNumbers").html(data);
                    }
                });
           }
        });
    });
</script>
<script>

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
</script>
<script>
	function selectMarket() {
    	var title = document.getElementById('title').value;
    	if(title==""){
    		layer.tips('请输入产品名称','#selecttle');
    	}
    	else{
    		window.location.href = "<?php echo U('Goods/selectMarket');?>?title="+title;
    	}
    	
    }
    function selecthot(x) {
        var title = document.getElementById('title');
        title.value = x;
        selectMarket();
         
    }
</script>
</body>
</html>