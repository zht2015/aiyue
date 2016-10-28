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

<link rel="stylesheet" type="text/css" href="/Public/Home/style/main.css"/>
<script type="text/javascript" src="/Public/Home/js/main.js"></script>
<div class="Levelmenu">

   
    
	<ul>
        <li ><span class="sp">当期位置：</span></li>
    	<li><a href="#">首页</a><i>></i></li>
		<li><a  class="curA" href="#"><?php echo ($list[0]['title']); ?></a></li>
       
		
	</ul>

</div>



<div class="box">

<div class="sidebar">

<span class="sp0"><?php echo ($list[0]['title']); ?></span>



<ul class="ul0">
     <?php if(is_array($list)): foreach($list as $key=>$node): if(is_array($node["two"])): foreach($node["two"] as $key=>$v): ?><li class="li0 active"><a class="a0" href="#"> <a class="a1"> </a><?php echo ($v["title"]); ?><a class="a2"></a> </a> </li><?php endforeach; endif; endforeach; endif; ?>
	
</ul>


</div>

<div class="box-content">      

	<div class="jfsm-xk">
    
        <div class="xkx-wrap">
              
        	<ul class="xkx-ul">
            <li class="jfsm-xkx qdxz"><a><?php echo ($list[0]['title']); ?></a></li>
            	
            </ul>
        </div>
               <?php if(is_array($list)): foreach($list as $key=>$node): if(is_array($node["two"])): foreach($node["two"] as $key=>$v): ?><h1><?php echo ($v["title"]); ?></h1>
	                <p><?php echo ($v["content"]); ?></p><?php endforeach; endif; endforeach; endif; ?>
         <!--   -->

        </div>
         <div class="jfsm-xkk">
         	<div class="shzc-div">
         
         	<p class="shzcp1">1、购物流程</p>
            <p class="shzcp2">01/本店商品均在海外销售，我们承诺正规渠道、100%正品保证。</p>

			<p class="shzcp3">02/海外只有商品均从澳洲仓发至客户手中，配送物流稳定可靠。国际物流周期较长，请耐心等待。如遇航班延误，天气影响等不可抗力的情况，订单可能送达延迟，请在下单前考虑此配送周期。</p>

			<p class="shzcp4">2.购买须知</p>

			<p class="shzcp3">01/本店商品均在海外销售，我们承诺正规渠道、100%正品保证。</p>

			<p class="shzcp3">02/海外只有商品均从澳洲仓发至客户手中，配送物流稳定可靠。国际物流周期较长，请耐心等待。如遇航班延误，天气影响等不可抗力的情况，订单可能送达延迟，请在下单前考虑此配送周期。</p>

			<p class="shzcp3">03/当您拍下商品时，我方默认您同意以下条款:<br/>澳洲直邮所有商品需要您提供真实姓名和身份证正反面照片，才开始配货，商品进入海关申报检验清关时，我们会对您的证件号进行加密管理，不会用作其他用途。澳洲直邮所有商品运输过程中，遇海关抽检，由于关税问题所产生的费用及责任由买家自行承担，买家不得以关税问题拒收或提出退换货。</p>

			<p class="shzcp3">04/下单支付后，订单一旦提交至海关申报及纳税，客户将不能修改订单信息（收货地址、电话等），也不能申请退款，请知晓并谅解。</p>

  			<p class="shzcp3">05/收到商品后，如有质量问题或不满意，与商家协商一致后，可退货到商家指定的境内地址。澳信商城商品不支持7天内无理由退货。</p>
         	
			</div>
            
    	</div>
    </div>
    
                       

    
</div>

</div>



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