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

<div class="top-0"><a href="#"><img src="/Public/Home/images/ne-top0.jpg"/></a></div>
<!--个人中心-个人首页开始-->
<div class="main">
    <div class="personalenter">
        <!--加载菜单-->
        <div class="person-left">
    <ul>
        <li><a href="<?php echo U('Home/Users/index');?>"><i class="iconfont">&#xe60c;</i>个人中心</a></li>
        <li><a href="<?php echo U('Home/Orders/index');?>"><i class="iconfont">&#xe60b;</i>我的订单</a></li>
        <li><a href="<?php echo U('Home/Carts/index');?>"><i class="iconfont">&#xe60d;</i>我的购物车</a></li>
        <!-- <li><a href="<?php echo U('Home/Users/myIntegral');?>"><i class="iconfont">&#xe610;</i>我的积分</a></li> -->
        <li><a href="<?php echo U('Home/Collect/index');?>"><i class="iconfont">&#xe60e;</i>我的收藏</a></li>
        <li><a href="<?php echo U('Home/Users/userInfo');?>"><i class="iconfont">&#xe609;</i>个人资料</a></li>
        <li><a href="<?php echo U('Home/UserAddress/index');?>"><i class="iconfont">&#xe60a;</i>收货地址管理</a></li>
        <li class="last"><a href="<?php echo U('Home/Users/savePwd');?>"><i class="iconfont">&#xe60f;</i>修改密码</a></li>
    </ul>
</div>
        <div class="person-right">
            <div class="integ-tops">
                <ul>
                    <li <?php if(!in_array(($_GET['type']), explode(',',"1,2,3"))): ?>class="curE"<?php endif; ?>>
                        <a href="<?php echo U('Orders/index',array('type'=>0));?>">所有订单</a>
                    </li>
                    <li <?php if($_GET['type'] == 1): ?>class="curE"<?php endif; ?>>
                        <a href="<?php echo U('Orders/index',array('type'=>1));?>">待支付</a>
                    </li>
                    <li <?php if($_GET['type'] == 2): ?>class="curE"<?php endif; ?>>
                        <a href="<?php echo U('Orders/index',array('type'=>2));?>">待发货</a>
                    </li>
                    <li <?php if($_GET['type'] == 3): ?>class="curE"<?php endif; ?>>
                        <a href="<?php echo U('Orders/index',array('type'=>3));?>">待收货</a>
                    </li>
                </ul>
            </div>
            <div class="integ-cen">
                <div class="wddd">
                    <table class="tbl-2" width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr class="btxx">
                            <td width="17%" align="center" colspan="2">产品信息</td>
                            <td width="14%" align="center">单价(元)</td>
                            <td width="12%" align="center">数量</td>
                            <td width="13%" align="center">实付款(元)</td>
                            <td width="11%" align="center">状态</td>
                            <td width="13%" align="center">操作</td>
                        </tr>
                        <!--<?php if(is_array($rs['info'])): foreach($rs['info'] as $key=>$v): ?>-->
                        <tr>
                            <td height="42" colspan="7" align="left" class="ddbt">
                                订购日期：<?php echo ($v['createtime']); ?> &nbsp; &nbsp; 订单号：<?php echo ($v['orderno']); ?>
                            </td>
                        </tr>
                            <!--<?php if(is_array($v['orderGoods'])): foreach($v['orderGoods'] as $key=>$r): ?>-->
                            <tr class="ddcpqwe">
                                <td align="left">
                                    <a href="<?php echo U('Goods/goodDetails',array('id'=>$r['article_id']));?>">
                                        <img src="<?php echo ($r['img_url']); ?>" width="98px" height="111px"/>
                                    </a>
                                </td>
                                <td align="center">
                                    <a href="<?php echo U('Goods/goodDetails',array('id'=>$r['article_id']));?>">
                                        <?php echo ($r['orderno']); ?>
                                    </a>
                                </td>
                                <td align="center"><?php echo ($r['goods_price']); ?></td>
                                <td align="center"><?php echo ($r['quantity']); ?></td>
                                <td align="center">
                                    <p class="xzdjge">￥<?php echo ($v['realitymoney']); ?></p>
                                </td>
                                <td align="center">
                                    <!--<?php if($key == 0): ?>-->
                                      <?php switch($v['orderstatus']): case "0": ?>已取消<?php break;?>
                                        <?php case "1": ?>待支付<?php break;?>
                                        <?php case "2": ?>待发货<?php break;?>
                                        <?php case "3": ?>待收货<?php break;?>
                                        <?php case "4": ?>待评论<?php break;?>
                                        <?php case "5": ?>退款申请中<?php break;?>
                                        <?php case "6": ?>商家同意退款申请<?php break;?>
                                        <?php case "7": ?>商家待收货<?php break;?>
                                        <?php case "8": ?>商家已收货<?php break;?>
                                        <?php case "9": ?>商家同意退款<?php break;?>
                                        <?php case "10": ?>商家拒绝退款<?php break;?>
                                        <?php case "11": ?>已退款<?php break;?>
                                        <?php case "14": ?>已完成<?php break;?>
                                        <?php case "15": ?>退款申请中<?php break; endswitch;?>
                                    <br/>
                                      <a class="wdddljxq" href="<?php echo U('Orders/order_detailed',array('id'=>$v['orderid']));?>">了解详情 >>
                                      </a>
                                    <!--<?php else: ?>--> 
                                      
                                    <!--<?php endif; ?>-->
                                </td>
                            
                                <td align="center">
                                    <!--<?php if($key == 0): ?>-->
                                    <?php switch($v['orderstatus']): case "0": ?><input type="button" value="订单已取消" class="seButton" /><?php break;?>
                                        <?php case "1": ?><input type="button" value="付款" class="ssButton" onclick="bb1();"/><?php break;?>
                                        <?php case "2": ?><input type="button" value="待发货" class="seButton" /><?php break;?>
                                        <?php case "3": ?><input type="button" value="确认收货" class="ssButton" onclick="ConfirmReceipt(<?php echo ($v['orderid']); ?>,4,'您确定已经收到商品并确定收货吗？');"/><?php break;?>
                                        <?php case "4": ?><a href="<?php echo U('Evaluate/evaluate',array('id'=>$v['orderid']));?>"><input type="button" value="待评价" class="ssButton" /></a><?php break;?>
                                        <?php case "5": ?><a href="javascript:void(0);"><input type="button" value="申请退款中" class="seButton" />
                                            </a><?php break;?>
                                        <?php case "6": ?><a href="<?php echo U('Orders/order_detailed',array('id'=>$v['orderid']));?>">
                                                <input type="button" value="退款处理中" class="ssButton" /> 
                                            </a><?php break;?>
                                        <?php case "7": ?><input type="button" value="商家待收货" class="seButton" /><?php break;?>
                                        <?php case "8": ?><input type="button" value="商家已收货" class="seButton" /><?php break;?>
                                        <?php case "9": ?><a href="<?php echo U('Orders/order_detailed',array('id'=>$v['orderid']));?>">
                                                <input type="button" value="退款中" class="ssButton" /> 
                                            </a><?php break;?>
                                        <?php case "10": ?><a href="javascript:void(0);">
                                                <input type="button" value="拒绝退款" class="seButton" /> 
                                            </a><?php break;?>
                                        <?php case "11": ?><a href="javascript:void(0);">
                                                <input type="button" value="已退款" class="seButton" /> 
                                            </a><?php break;?>
                                        <?php case "14": ?><input type="button" value="已完成" class="seButton" /><?php break;?>
                                        <?php case "15": ?><a href="javascript:void(0);"><input type="button" value="退款处理中" class="seButton" />
                                            </a><?php break; endswitch;?>
                                    <!--<?php else: ?>-->
                                    <!--<?php endif; ?>-->
                                </td>
                            </tr>
                            <!--<?php endforeach; endif; ?>-->
                    <!--<?php endforeach; endif; ?>-->
                    </table>
                </div>
                <div class="page pt35">
                   <?php echo ($rs['page']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--隐藏域 勿删 start-->
<input type="hidden" id="orderCode" value="6666">               <!--判断是否重复提交-->

<input type="hidden" id="totalMoney" value="<?php echo ($rs['totalmoney']); ?>"/>   <!--订单总价-->


<!-- 支付方式弹窗 -->
<div style="display:none;" id='payordertype'>
    <form>
        <div style='width:100%;margin:10px auto;font-size:20px;text-align:center;padding:10px 0;'>
            支付宝&nbsp;<input type="radio" class="paytype" value="1" name="paytype" checked="checked"  />&emsp;
            微信支付&nbsp;<input type="radio" class="paytype" value="2" name="paytype"  />
        </div>
        <div style='width:50%;margin:20px auto 10px;border:1px solid black;font-size:20px;text-align:center;cursor:pointer;' onclick="toPay();" >确认</div>
    </form>
</div>

<script type="text/javascript">
    //确认收货
    function ConfirmReceipt(orderid,orderstatus){

        layer.confirm("确认操作？",function(){
            $.post("<?php echo U('Orders/order_status');?>",{orderid:orderid,orderstatus:orderstatus},function(data){
                if(data.status == 'success'){
                    layer.msg(data.info,{time:2000});
                    location.reload();
                }else{
                    layer.msg(data.info,{time:2000});
                }
            },"json");
        })
    }

    //选择支付方式
    function bb1(){
        layer.open({
            type: 1,
            closeBtn: 1,
            content:  $("#payordertype"), //这里content是一个普通的String
            area: ['350px','200px'],
            shade: [0.5, '#000'],
            shadeClose :true,
            title:"请选择支付方式"
        });
    }
    //支付
    function toPay(){
        var code = $("#orderCode").val();
        var params={};

        params.Flag = 1; /**生成订单标识(1-单商品、2-多商品)**/
        params.totalMoney =  $("#totalMoney").val();
        params.orderId = "<?php echo ($rs['orderId']); ?>";
        var type = $("input[name=paytype]:checked").val();//支付方式 1支付宝，2微信

        if(code!="") {
            //$("#orderCode").val("");
            if(type==1) {
                $.post("<?php echo U('Home/Orders/createOrders');?>", params, function (data) {
                    if (data.id != "" && data.realitymoney != 0 || data.id != "" && data.realitymoney != 0.00) {
                        $("input[name=WIDout_trade_no]").val(data.orderno);
                        $("input[name=WIDtotal_fee]").val(data.realitymoney);
                        $("input[name=WIDbody]").val("");
                        $("#payid").submit();
                    }else{
                        layer.msg('支付成功！', {icon: 1});
                        setTimeout(function () {
                            //  location.href = "<?php echo U('Order/myOrder');?>";
                        }, 800)
                    }
                })
            }
        }else{
            layer.msg("你已经提交过了!", {icon: 5});
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