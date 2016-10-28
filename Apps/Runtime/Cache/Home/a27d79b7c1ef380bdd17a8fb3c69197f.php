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
<div class="main">
<!--   订单详情-->
    <div class="orderdetails">
       <div class="orderdetails-top">
        <?php switch($rs['orderstatus']): case "1": ?><img src="/Public/Home/images/xqnav-3.jpg" width="906" height="33" /><?php break;?>
           <?php case "2": ?><img src="/Public/Home/images/xqnav-4.jpg" width="906" height="33" /><?php break;?>
           <?php case "3": ?><img src="/Public/Home/images/xqnav-1.jpg" width="906" height="33" /><?php break;?>
           <?php case "4": ?><img src="/Public/Home/images/xqnav-2.jpg" width="906" height="33" /><?php break;?>
           <?php case "5": ?><img src="/Public/Home/images/xqnav-6.jpg"/><?php break;?>
           <?php case "6": ?><img src="/Public/Home/images/xqnav-6.jpg"/><?php break;?>
           <?php case "7": ?><img src="/Public/Home/images/xqnav-6.jpg"/><?php break;?>
           <?php case "8": ?><img src="/Public/Home/images/xqnav-6.jpg"/><?php break;?>
           <?php case "9": ?><img src="/Public/Home/images/xqnav-6.jpg"/><?php break;?>
           <?php case "10": ?><img src="/Public/Home/images/xqnav-7.jpg"/><?php break;?>
           <?php case "11": ?><img src="/Public/Home/images/xqnav-8.jpg"/><?php break;?>
           <?php case "14": ?><img src="/Public/Home/images/xqnav-2.jpg"/><?php break;?>
           <?php case "15": ?><img src="/Public/Home/images/xqnav-6.jpg"/><?php break; endswitch;?>          
      </div>
       <div class="orderdetails-cen">
         <div class="orderdetails-cen-1">
           <div class="orderdetails-cen-1-left">
             <div class="daishou-nav">订单详情</div>
              <div class="daishou-cen" style="margin:20px 20px;">
                <!-- <h2>收货地址：</h2> -->
                <style type="text/css">
                    .daishou-cen p{
                      padding: 8px 8px;
                      font-size: 14px;
                    }
                    .tkbdan {
                        overflow: hidden;
                        /* margin-top: 10px; */
                        padding-left: 10px;
                        width: 285px;
                        margin: 0 auto;
                        margin-bottom: 20px;
                    }
                    .button{
                        color: #FFF;
                        background-color: #1e7ccc;
                        height: 30px;
                        width: 100px;
                        border: none;
                        margin-top: 25px;
                        border-radius: 2px;
                        font-size: 13px;
                        display: block;
                        line-height: 30px;
                        text-align: center;
                    }
                </style>
                <p>订单号：<?php echo ($rs['orderno']); ?></p>
                <p>收货人：<?php echo ($rs['consignee']); ?></p>
                <p>联系电话：<?php echo ($rs['userphone']); ?></p>
                <p>联系地址：<?php echo ($rs['area']); ?> <?php echo ($rs['useraddress']); ?></p>
                <!-- <p>邮编：<?php echo ($rs['post_code']); ?></p> -->
              </div>
           </div>
          <?php switch($rs['orderstatus']): case "0": ?><div class="orderdetails-cen-1-right"><img class="mt26" src="/Public/Home/images/gantan.jpg"/>
                <h2 class="mb20">订单状态：订单已取消</h2>
               <p>
                <a href="javascript:history.go(-1);" class="seButton">返回</a>
              </p>
              </div><?php break;?>
            <?php case "1": ?><div class="orderdetails-cen-1-right"><img class="mt26" src="/Public/Home/images/gantan.jpg"/>
                <h2 class="mb20">订单状态：订单已生成，等待买家付款</h2>
                <p class="zjdewz zjdewzs">还有 <span>2天21小时0分34秒</span> 来付款,超时订单自动关闭</p>
                <p><input type="button" value="付款" class="seButton" onclick="bb1('<?php echo ($rs['orderno']); ?>');"/><input type="button" value="取消订单" class="seButton" onclick="ConfirmReceipt(<?php echo ($rs['orderid']); ?>,0);"/></p>
              </div><?php break;?>
            <?php case "2": ?><div class="orderdetails-cen-1-right">
                <img class="mt26" src="/Public/Home/images/gantan.jpg"/>
                <h2>订单状态：商品已拍下，等待卖家发货</h2>
                <p>
                  <a href="javascript:history.go(-1);" class="seButton">返回</a>
                  <a class="seButton" href="<?php echo U('Orders/ApplyRefund',array('id'=>$rs['orderid']));?>">申请退款</a>
                </p>
              </div><?php break;?>
            <?php case "3": ?><div class="orderdetails-cen-1-right">
                <img class="mt26" src="/Public/Home/images/gantan.jpg"/>
                <h2>订单状态：卖家已发货，等待收货</h2>
                <p class="zjdewz zjdewzs">物流公司：<?php echo ($express1['title']); ?>&nbsp;&nbsp;&nbsp;&nbsp;物流单号：<?php echo ($rs['deliveryno']); ?></p>
                <p>
                  <input type="button" value="确认收货" class="seButton" onclick="ConfirmReceipt(<?php echo ($rs['orderid']); ?>,4);"/><a class="sqtk" href="<?php echo U('Orders/ApplyRefund',array('id'=>$rs['orderid']));?>">申请退款</a>
                </p>
              </div><?php break;?>
            <?php case "4": ?><div class="orderdetails-cen-1-right"><img class="mt26" src="/Public/Home/images/gantan2.jpg"/>
                <h2 class="mb20">订单状态：待评价</h2>
               <p>
                <a class="sqtks" href="<?php echo U('Evaluate/evaluate',array('id'=>$rs['orderid']));?>">待评价</a>
                <a href="javascript:history.go(-1);" class="seButton">返回</a>
              </p>
              </div><?php break;?>
            <?php case "5": ?><div class="orderdetails-cen-1-right"><img class="mt26" src="/Public/Home/images/gantan2.jpg"/>
                <h2 class="mb20">订单状态：申请退款</h2>
               <p>
                <h2 class="shbt">商家处理退款申请中，请等待...</h2>
                <p class="zjdewz zjdewzs">您的退款申请已提交，华盛昌将会在3个工作日内给予答复。</p>
              </p>
              </div><?php break;?>           
            <?php case "6": ?><div class="orderdetails-cen-1-right">
                <img class="mt26" src="/Public/Home/images/gantan2.jpg"/>
                <h2 class="shbt">已同意退款，请将商品退还商家。</h2>
                <p class="shwz w70">退货地址：<?php echo ($rs['shipmentaddress']); ?> <?php echo ($rs['shipmentname']); ?>收  电话：<?php echo ($rs['shipmentphone']); ?></p>
                <div class="tkbdan">
                 <dl>
                   <dt>物流公司：</dt><dd>
                   <select class="seInput" id="deliveredCompany">
                    <option value="">请选择物流公司</option>
                    <!--<?php if(is_array($express)): foreach($express as $key=>$v): ?>-->
                    <option value="<?php echo ($v['id']); ?>"><?php echo ($v['title']); ?></option>
                    <!--<?php endforeach; endif; ?>-->
                  </select>
                 </dd>
                 </dl>
                 <dl>
                   <dt>退货单号：</dt><dd><input type="text" placeholder="" class="seInput" id="deliveredNo"></dd>
                 </dl>
                 <dl>
                   <dt>&nbsp;</dt><dd><input type="button" value="提交" name="" class="button"  onclick="refundGoods(<?php echo ($_GET['id']); ?>);"/></dd>
                 </dl>
                </div>
              </div><?php break;?>
            <?php case "7": ?><div class="orderdetails-cen-1-right"><img class="mt26" src="/Public/Home/images/gantan2.jpg"/>
                <h2 class="mb20">订单状态：货物已寄回</h2>
               <p>
                <p class="zjdewz zjdewzs">您的货物已寄回商家，商家正在处理中，请您耐心等待。。。。</p>
               </p>
              </div><?php break;?>
            <?php case "8": ?><div class="orderdetails-cen-1-right"><img class="mt26" src="/Public/Home/images/gantan2.jpg"/>
                <h2 class="mb20">订单状态：商家已收货</h2>
               <p>
                <p class="zjdewz zjdewzs">商家已收到货物，华盛昌将会在3个工作日内给予答复</p>
               </p>
              </div><?php break;?>
            <?php case "9": ?><div class="orderdetails-cen-1-right"><img class="mt26" src="/Public/Home/images/gantan2.jpg"/>
                <h2 class="mb20">订单状态：退款中</h2>
               <p>
                <p class="zjdewz zjdewzs">您的退款申请已通过审核，华盛昌将会在7个工作日内给予退款。</p>
               </p>
              </div><?php break;?>
            <?php case "10": ?><div class="orderdetails-cen-1-right"><img class="mt26" src="/Public/Home/images/gantan2.jpg"/>
                <h2 class="mb20">订单状态：商家拒绝条款申请</h2>
               <p>
                <p class="zjdewz zjdewzs">拒绝原因：<?php echo ($rs['refusereason']); ?></p>
                <p class="zjdewz">如您有任何疑问，请联系我们的客服人员</p>
               </p>
              </div><?php break;?>
            <?php case "11": ?><div class="orderdetails-cen-1-right"><img class="mt26" src="/Public/Home/images/gantan2.jpg"/>
                <h2 class="mb20">订单状态：退款已完成</h2>
               <p>
                <p class="zjdewz">如您有任何疑问，请联系我们的客服人员</p>
               </p>
              </div><?php break;?>           
            <?php case "14": ?><div class="orderdetails-cen-1-right"><img class="mt26" src="/Public/Home/images/gantan2.jpg"/>
                <h2 class="mb20">订单状态：交易完成</h2>
               <p class="zjdewz">感谢您选择我们的产品,祝您在使用过程中舒心愉快！</p>
               <p>
                <a class="sqtks" href="<?php echo U('Evaluate/evaluate',array('id'=>$rs['orderid']));?>">查看评价</a>
                <a class="sqtks" href="<?php echo U('Orders/ApplyRefund',array('id'=>$rs['orderid']));?>">申请退款</a>
              </p>
              </div><?php break;?>
            <?php case "15": ?><div class="orderdetails-cen-1-right"><img class="mt26" src="/Public/Home/images/gantan2.jpg"/>
                <h2 class="mb20">订单状态：申请退款</h2>
               <p>
                <h2 class="shbt">商家处理退款申请中，请等待...</h2>
                <p class="zjdewz zjdewzs">您的退款申请已提交，华盛昌将会在3个工作日内给予答复。</p>
              </p>
              </div><?php break; endswitch;?>
         </div>
         <div class="orderdetails-cen-2">
           <table class="tbl-4" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="t4nav">
                <td height="48" colspan="2" align="center">产品详情</td>
                <td width="20%" align="center">单价（元）</td>
                <td width="20%" align="center">数量</td>
                <td width="20%" align="center">金额（元）</td>
              </tr>
             <!--<?php if(is_array($rs['orderGoods'])): foreach($rs['orderGoods'] as $key=>$v): ?>-->
              <tr>
                <td height="170">
                  <a class="tuyc" href="<?php echo U('Goods/goodDetails',array('id'=>$v['article_id']));?>">
                    <img src="<?php echo ($v['img_url']); ?>" width="98px" height="111px"/>
                  </a>
                </td>
                <td class="wenzi">
                  <a href="<?php echo U('Goods/goodDetails',array('id'=>$v['article_id']));?>"><?php echo ($v['goods_title']); ?></a>
                </td>
                <td align="center">￥<?php echo ($v['goods_price']); ?></td>
                <td align="center"><?php echo ($v['quantity']); ?></td>
                <td align="center">￥<?php echo ($v['real_price']); ?></td>
              </tr>
             <!--<?php endforeach; endif; ?>-->
            </table>
            <div class="ddze">订单总金额：<span>¥ <?php echo ($rs[realitymoney]); ?></span></div>
          </div>
       </div>
    </div>
    <!---->
    </div>
    <!--隐藏域 勿删 start-->
    <input type="hidden" id="orderCode" value="6666">               <!--判断是否重复提交-->

    <input type="hidden" id="orderNo" value=""/>

    <input type="hidden" id="totalMoney" value="<?php echo ($rs['totalmoney']); ?>"/>   <!--订单总价-->


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

<script type="text/javascript">
    //寄货信息
    function refundGoods(id){
      var deliveredCompany = $('#deliveredCompany').find('option:selected').text();
      var deliveredNo      = $('#deliveredNo').val();
      if(deliveredCompany == ''){
        layer.msg('请选择物流公司');
        return false;
      }
      if(deliveredNo == ''){
        layer.msg('请输入退货单号');
        return false;
      }       
$.post("<?php echo U('Orders/refundGoods');?>",{id:id,deliveredCompany:deliveredCompany,deliveredNo:deliveredNo},function(data){
         if(data.status == 'success'){
           layer.msg(data.info);
           location.href = data.url;
         }else{
           layer.msg(data.info);
         }
      },'json');
    }
     //确认收货
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
    function bb1(orderNo){
        layer.open({
            type: 1,
            closeBtn: 1,
            content:  $("#payordertype"), //这里content是一个普通的String
            area: ['450px','200px'],
            shade: [0.5, '#000'],
            shadeClose :true,
            title:"请选择支付方式"
        });
        $("#orderNo").val(orderNo);
    }

    //支付
    function goToPay(){
        $type = $("input[name=paytype]:checked").val();//支付方式 1支付宝，2微信
        //判断是否启用该支付方式
        $.post("<?php echo U('Orders/isPayOn');?>",{"ptype":$type},function(data){
            var obj = eval("("+data+")");
            if(obj.code != 200){
                layer.msg('目前尚未开通该付款方式！请重新选择');
                return ;
            }else{
                //已经开通了
                toPayMoney();
            }
        });
    }

     //合并订单提交
    function toPayMoney(){
        var orderid = $("#orderNo").val();
        var type = $("input[name=paytype]:checked").val();//支付方式 1支付宝，2微信
        if(orderid != ""){
          $("#orderno").val("");//清除原来的数据
            var orderstr = orderid;
            if(type == "1"){//支付宝
                $.post("<?php echo U('Orders/totalPay');?>",{"orderstr":orderstr},function(data){
                    var data = eval("("+data+")");
                    alert(obj.realityMoney);return false;
                    if (data.orderNo != "") {
                        $("input[name=WIDout_trade_no]").val(orderstr);
                        $("input[name=WIDtotal_fee]").val(data.realityMoney);
                        $("input[name=WIDbody]").val("");
                        $("#payid").submit();
                    }
                })
            }else{
                //订单号,提交微信支付的表单
                $("input[name=wxorderid]").val(orderid);
                $("#wxpayid").submit();
            }
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