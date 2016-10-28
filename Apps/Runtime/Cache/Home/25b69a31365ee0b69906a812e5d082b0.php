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
            <p>热门搜索：  <a href="#"> 测距仪</a>    <a href="#">配件</a></p>
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

<script src="js/MagicZoom.js" type="text/javascript"></script>

<!--个人中心开始-->
<div class="top-0"><a href="#"><img src="/Public/Home/images/ne-top0.jpg"/></a></div>

<div class="main">
    <div class="jifengm">
        <div class="shdz">
            <div class="shdz-top">选择收货地址</div>
            <div class="shdi-dz">
                <ul>
                <!--<?php if(is_array($userAddress)): foreach($userAddress as $key=>$v): ?>-->
                    <a href="javascript:saveDefaultAddress(<?php echo ($v['id']); ?>);">
                    <li <?php if($v['is_default'] == 1): ?>class="curD"<?php endif; ?>>
                        <h2><?php echo ($v['area']); ?>（<?php echo ($v['consignee']); ?>收）</h2>
                        <p><?php echo ($v['address']); ?></p>
                        <p><?php echo ($v['mobile']); ?></p>
                        <a class="quanbi" href="javascript:xx1(<?php echo ($v['id']); ?>,'<?php echo U('UserAddress/saveAddress',array('id'=>$v['id']));?>');">
                            <img src="/Public/Home/images/quanbi.jpg" width="25" height="25" />
                        </a>
                        <a class="xiugi" href="javascript:xx1(<?php echo ($v['id']); ?>,'<?php echo U('UserAddress/saveAddress',array('id'=>$v['id']));?>');">修改</a>
                    </li>
                    </a>
                <!--<?php endforeach; endif; ?>-->
                </ul>
            </div>
            <div class="tjshdz"><a onclick="aa1()" href="javascript:void(0);">
                <img src="/Public/Home/images/xjdz.jpg"/>使用新的地址</a>
            </div>
        </div>

        <div class="qrdan">
            <div class="qrdan-1">确认订单信息</div>
            <div class="qrdan-2">
                <div class="qrdan-2-top">
                    <p class="w13"></p>
                    <p class="w30" style="width:43.5%;">产品详情</p>
                    <p class="w14 tc">单价（元）</p>
                    <p class="w14 tc" style="width:20.5%;">数量</p>
                    <p class="w15 tc" style="width:20.5%;">小计（元）</p>
                </div>
                <ul>
                <!--<?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>-->
                    <input type="hidden" class="goodsCode" value="666"/>
                    <input type="hidden" id="goodsId<?php echo ($k-1); ?>" value="<?php echo ($v['goods']['id']); ?>"/>
                    <input type="hidden" id="goodsNumber<?php echo ($k-1); ?>" value="<?php echo ($v['number']); ?>"/>
                    <input type="hidden" id="goodsPrice<?php echo ($k-1); ?>" value="<?php echo ($v['goods']['sell_price']); ?>"/>
                    <input type="hidden" id="goodsTotalPrice<?php echo ($k-1); ?>" value="<?php echo ($v['price']); ?>"/>
                    <input type="hidden" id="link_url<?php echo ($k-1); ?>" value="<?php echo ($v['goods']['img_url']); ?>"/>
                    <input type="hidden" id="title<?php echo ($k-1); ?>" value="<?php echo ($v['goods']['title']); ?>"/>
                    <li>
                        <div class="w13">
                            <a class="ddtu" href="<?php echo U('Goods/goodDetails',array('id'=>$v['goods']['id']));?>">
                                <img src="<?php echo ($v['goods']['img_url']); ?>" width="98" height="99" />
                            </a>
                        </div>
                        <div class="w30 ">
                            <span>
                            <a href="<?php echo U('Goods/goodDetails',array('id'=>$v['goods']['id']));?>">
                                <?php echo ($v['goods']['title']); ?>
                            </a>
                           </span>
                        </div>
                        <div class="w14 tc pt42">￥<?php echo ($v['goods']['sell_price']); ?></div>
                        <div class="w14 tc pt42" style="width:20.5%;"><?php echo ($v['number']); ?></div>
                        <div class="w15 tc pt42" style="width:20.5%;">￥<?php echo ($v['price']); ?></div>
                    </li>
                <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                </ul>
            </div>
            <div class="qrdan-3">
                <div class="qfukb" style="height:auto;">
                    <div class="syojf">
                        <input class="chebox" name="items" onclick="fonta();" type="checkbox" value=""/>
                        <span>使用积分</span>
                        <input type="text" placeholder="" name="userPoint" onkeyup="userPoint(<?php echo ($userInfo['point']); ?>)" id="userPoint"  class="seInput">个  <font id="points">- ¥0</font>
                        <p>（可用<?php echo ($usersInfo['point']); ?>点）</p>
                    </div>
                    <div class="jftjdd">
                        <h2>付款： <span id="totalMoneys">¥ <span id="realitys"><?php echo ($totalMoney); ?></span></span></h2>
                        <p><span>送货地址：</span><?php echo ($defaultAddress['area']); ?><br/><?php echo ($defaultAddress['address']); ?></p>
                        <p><span>联系方式：</span> <?php echo ($defaultAddress['consignee']); ?> <?php echo ($defaultAddress['mobile']); ?></p>
                        <p class="pt10"><input type="button" value="提交订单" name="" onclick="bb1();" class="seButton" /></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--隐藏域 勿删 start-->

<input type="hidden" id="isDefaults" value="<?php echo ($isDefaults); ?>">   <!--是否存在默认收货地址-->
<input type="hidden" id="address" value="<?php echo ($address); ?>">         <!--是否存在地址-->
<input type="hidden" id="orderCode" value="6666">               <!--判断是否重复提交-->

<input type="hidden" id="totalMoney" value="<?php echo ($totalMoney); ?>"/>   <!--订单总价-->
<input type="hidden" id="reality" value="<?php echo ($totalMoney); ?>"/>   <!--实付款-->

<input type="hidden" value="" id="jfyh"/><!--积分优惠-->
<!--隐藏域 勿删 end -->



<!--/*弹出框*/-->
<div class="xgmm" id="xxmm" style="display:none;">
    <div class="xgmm_1">
        <div class="xinz-top">
            <h2>添加新的地址</h2>
            <a onclick="ab1()" href="#"><img src="/Public/Home/images/cccdiao.jpg"/></a>
        </div>
        <div class="xinz-cen">
           <table class="tbl-1" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="19%" align="right">位置 ：</td>
            <td>
               <select class="seoption" onchange="province();" id="province">
                    <option value="-1">选择省份</option>
                    <!--<?php if(is_array($area)): $i = 0; $__LIST__ = $area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>-->
                        <option value="<?php echo ($v['area_id']); ?>"><?php echo ($v['area_name']); ?></option>
                    <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                </select>
                <select id="city" class="seoption" onchange="province2();">
                    <option value="-1">选择城市</option>
                </select>
                <select id="area" class="seoption">
                    <option value="-1">选择区县</option>
                </select>
                <span>*</span>
            </td>
            </tr>
            <tr>
            <td align="right">地址：</td>
            <td><textarea class="textar" id="detailAddress"></textarea><span>*</span></td>
            </tr>
            <tr>
            <td align="right">邮政编码 ：</td>
            <td><input type="text" name="postCode" placeholder="邮政编码" id="postCode" class="seInput"></td>
            </tr>
            <tr>
            <td align="right">收货人姓名：</td>
            <td><input type="text" name="consignee" placeholder="收货人姓名" id="consignee" class="seInput"><span>*</span></td>
            </tr>
            <tr>
            <td align="right">手机号码 ：</td>
            <td><input type="text" name="mobile" placeholder="手机号码" maxlength="11" id="mobile" class="seInput"><span>*</span></td>
            </tr>
            <tr>
            <td align="right">&nbsp;</td>
            <td class="mrdizhi" height="44"><input class="checkbox" type="checkbox" name="checkbox" value="1"/>设置为默认送货地址</td>
            </tr>
            <tr>
            <td align="right">&nbsp;</td>
            <td><input type="button" value="保 存" name="" class="seButton"  onclick="submitte();"/></td>
            </tr>
            </table>

         </div>
    </div>
</div>
<!-- 支付方式弹窗 -->
<div style="display:none;" id='payordertype'>
    <form>
        <div style='width:100%;margin:10px auto;font-size:20px;text-align:center;padding:10px 0;'>
            支付宝&nbsp;<input type="radio" class="paytype" value="1" name="paytype" checked="checked"  />&emsp;
            微信支付&nbsp;<input type="radio" class="paytype" value="2" name="paytype"  />
        </div>
        <div style='width:50%;margin:20px auto 10px;border:1px solid black;font-size:20px;text-align:center;cursor:pointer;' onclick="goToPay();" >确认</div>
    </form>
</div>

<!--支付宝购买-->
<form action="<?php echo U('Pay/doalipay');?>" method="post" id="payid" >
    <input type="hidden" name="WIDout_trade_no" value="">
    <input type="hidden" name="WIDsubject" value="商品购买">
    <input type="hidden" name="WIDtotal_fee" value="">
    <input type="hidden" name="WIDbody" value="">
</form>



<script>

    function fonta(){
        var reality = $("#totalMoney").val();
        var point = $("input[name=userPoint]").val();
        var fonta = point/1;

        if($("input[name=items]").is(':checked')==true){
            if(point><?php echo ($countPoint); ?>){
                $("input[name=userPoint]").val(<?php echo ($countPoint); ?>);
                $("#realitys").html("0.00");
            }
            if(fonta>=reality){
                fonta = reality;
            }
            $("#jfyh").val(fonta);
            $("#points").html("- ¥"+fonta);
        }else{
            $("#jfyh").val(" ");
            $("#points").html("- ¥0");
        }
        privilege();
    }

    function privilege(){
        var jfyh = $("#jfyh").val();
        var reality = $("#reality").val();
        var total = jfyh;
        var totalMoney = (reality-total);
        if((reality-total)<="0" || (reality-total)<="0.00"){
            $("#realitys").html("0.00");
        }else{
            $("#realitys").html(""+totalMoney.toFixed(2));
        }
    }

    function userPoint(point){
        var emtp = $("input[name=userPoint]").val();
        if(emtp>=point){
            $("input[name=userPoint]").val(point);
        }
        fonta();
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
    function goToPay(){
        $type = $("input[name=paytype]:checked").val();//支付方式 1支付宝，2微信
        //判断是否启用该支付方式
        $.post("<?php echo U('Order/isPayOn');?>",{"ptype":$type},function(data){
            var obj = eval("("+data+")");
            if(obj.code != 200){
                layer.msg('目前尚未开通该付款方式！请重新选择');
                return false;
            }
        });
        //已经开通了
        toPay();
    }

    function toPay(){
        var isDefault = $("#isDefaults").val();
        var address  = $("#address").val();
        var a = /^[0-9]+$/;
        var emtp = $("input[name=userPoint]").val();
        var length=$(".goodsCode").length;
        var d="";
        for(var i=0;i<length;i++){
            if(i==(length-1)){
                d += $("#goodsId"+i).val()+":"+$("#link_url"+i).val()+":"+$("#title"+i).val()+":"+$("#goodsNumber"+i).val()+":"+$("#goodsPrice"+i).val()+":"+$("#goodsTotalPrice"+i).val();
            }else{
                d += $("#goodsId"+i).val()+":"+$("#link_url"+i).val()+":"+$("#title"+i).val()+":"+$("#goodsNumber"+i).val()+":"+$("#goodsPrice"+i).val()+":"+$("#goodsTotalPrice"+i).val()+";";
            }
        }

        if(address=="1"){
            layer.msg("请添加收货地址!");
            return;
        }
        if(isDefault!="1"){
            layer.msg("请选择一个收货地址设置为默认!");
            return;
        }
        var code = $("#orderCode").val();
        var params = {};

        if($("input[name=items]").is(':checked')==true){
            params.reality =  $("#realitys").html();
            params.point   = "-"+$("#jfyh").val();
        }else{
            params.reality =  $("#reality").val();
            params.point   = "";
        }
        params.Flag = 2; /**生成订单标识(1-单商品、2-多商品)**/
        params.totalMoney =  $("#totalMoney").val();
        params.goods  =  d;
        params.cartId = "<?php echo ($cartId); ?>";
        var type = $("input[name=paytype]:checked").val();//支付方式 1支付宝，2微信
        if(code!=""){
            $("#orderCode").val("");
            if(type==1){
                $.post("<?php echo U('Orders/createOrders');?>",params,function(data){
                    if (data.id != "" && data.real_amount != 0 || data.id != "" && data.real_amount != 0.00) {
                        $("input[name=WIDout_trade_no]").val(data.order_no);
                        $("input[name=WIDtotal_fee]").val(data.real_amount);
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
            alert("已经提交了");
        }
    }
</script>
<script type="text/javascript">
    /**修改默认收货地址**/
    function saveDefaultAddress(id){
        $.post("<?php echo U('UserAddress/setDefaultAddress');?>",{id:id},function(data){
           
        })
    }
    /*修改收货地址*/
    function xx1(id,url){
        layer.open({
            type: 2,
            closeBtn: 1,
            content: url,
            area: ['850px','532px'],
            shade: [0.5, '#000'],
            shadeClose :true,
            title:"修改地址"
        });
    }
     function province(){
        var province=$("#province").val();
        $("#city").html("<option value='-1'>请选择</option>");
        $("#area").html("<option value='-1'>请选择</option>");
        $.post("<?php echo U('Area/city');?>",{id:province},function(data){
            var length = data.length;
            var html = "<option value='-1'>请选择</option>";
            for(var i=0;i<length;i++){
                html += "<option value="+data[i].area_id+">"+data[i].area_name+"</option>";
            }
            $("#city").html(html);
        })
    }

    function province2(){
        var city = $("#city").val();
        $("#area").html("");
        $.post("<?php echo U('Area/area');?>",{id:city},function(data){
            if(data==null){
                $("#area").hide();
            }else{
                $("#area").show();
            }
            var length = data.length;
            var html="";
            html ="<option value='-1'>请选择</option>";
            for(var i=0;i<length;i++){
                html += "<option value="+data[i].area_id+">"+data[i].area_name+"</option>";
            }
            $("#area").html(html);
        })
    }

    function submitte(){
        var params={};
        params.consignee = $("#consignee").val();
        params.mobile    = $("#mobile").val();
        params.province  = $("#province option:selected").text();
        params.city      = $("#city option:selected").text();
        params.area      = $("#area option:selected").text();
        params.area1     = $("#province option:selected").val();
        params.area2     = $("#city option:selected").val();
        params.area3     = $("#area option:selected").val();
        params.postCode  = $("#postCode").val();
        params.address   = $("#detailAddress").val();
        var isDefault    = $("input[type='checkbox']").is(':checked');
        if(isDefault == true){
            params.isDefault=1;
        }
        params.area = params.province+" "+params.city+" "+params.area;
        var re = /^1\d{10}$/;
        if(params.area1=="-1"){
            layer.msg("请选择省份");
            return;
        }
        if(params.area2=="-1"){
            layer.msg("请选择城市");
            return;
        }
        if(params.area3=="-1"){
            layer.msg("请选择区县");
            return;
        }
        if(params.address==""){
            layer.msg("详细地址不能为空");
            return;
        }
        if(params.consignee==""){
            layer.msg("收货人不能为空");
            return;
        }
        if(params.mobile==""){
            layer.msg("手机号码不能为空");
            return;
        }
        if(!re.test(params.mobile)){
            layer.msg("手机号码格式错误");
            return;
        }
        $.post("<?php echo U('UserAddress/address');?>",params,function(data){
            if(data.status==1){
                layer.msg("添加成功");
                location.reload();
            }
        })
    }
</script>


<!--底部开始-->
<div class="foot">
    <div class="foots">
        <div class="foot-1">
            <ul>
              <?php if(is_array($list1)): foreach($list1 as $i=>$node): ?><li>
                    <h2><span class="ft-<?php echo ($i+1); ?>"></span><?php echo ($node["title"]); ?></h2>
                        <?php if(is_array($node["footTwo"])): foreach($node["footTwo"] as $key=>$child): ?><a href="#"><?php echo ($child["title"]); ?></a><?php endforeach; endif; ?>
		                 
                </li><?php endforeach; endif; ?>
              
                <li>
                    <h2><span class="ft-6"></span>客服中心</h2>
                    <a>服务热线：</a>
                    <font>400-880-9666</font>
                    <a class="zxkf" href="#">在线客服</a>

                </li>
            </ul>
        </div>

        <div class="foot-2">
            <ul>
                <li>
                    <div class="foot-2-1"><span class="fb-1"></span></div>
                    <div class="foot-2-2">
                        <h2>买就包邮</h2>
                        <p>全国免邮</p>
                    </div>
                </li>
                <li>
                    <div class="foot-2-1"><span class="fb-2"></span></div>
                    <div class="foot-2-2">
                        <h2>7天内</h2>
                        <p>无理由退换</p>
                    </div>
                </li>
                <li>
                    <div class="foot-2-1"><span class="fb-3"></span></div>
                    <div class="foot-2-2">
                        <h2>30天内</h2>
                        <p>服务保障</p>
                    </div>
                </li>
                <li>
                    <div class="foot-2-1"><span class="fb-4"></span></div>
                    <div class="foot-2-2">
                        <h2>正品保障</h2>
                        <p>赔付承诺</p>
                    </div>
                </li>
                <li>
                    <div class="foot-2-1"><span class="fb-5"></span></div>
                    <div class="foot-2-2">
                        <h2>品牌厂家</h2>
                        <p>厂家直销</p>
                    </div>
                </li>
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
</script>
</body>
</html>