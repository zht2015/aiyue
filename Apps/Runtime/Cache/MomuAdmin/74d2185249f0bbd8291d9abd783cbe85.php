<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>订单管理</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/pagination.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/style/personality.css">
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/layer/layer.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/layer/extend/layer.ext.js"></script>

<style type="text/css">
     /*
     色彩提示标签
     */
     li{
      list-style: none;
     }
     .goodsInfo{
     }
     .goodsInfo li{
        padding: 15px 15px;
     }
    .label {
      display: inline;
      padding: .2em .6em .3em;
      font-size: 75%;
      font-weight: bold;
      line-height: 1;
      color: #fff;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      border-radius: .25em;
      margin-left: 10px;
      cursor:pointer;
      margin: 5px 5px;
    }
    /*危险标签*/
    .label-danger {
        background-color: #FF6C60;
    }
    /*成功标签*/
    .label-success {
        background-color: #A9D86E;
    }
    /*信息提示*/
    .label-info{
      background-color: #39b2a9;
    }
    /*默认*/
    .label-default{
      background-color: #999;
    }
    /*警告标签*/
    .label-warning {
    background-color: #f0ad4e;
}
    .orderStatus span {
        padding:5px 15px;

    }
    .orderStatus span span{
        padding:0;
    }
</style>
</head>
<body class="mainbody">

<input type="hidden" value="" id="orderId"/>

<form method="post" action="<?php echo U('Order/order_list');?>" id="form1">
<div class="aspNetHidden">
    <input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
    <input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
</div>
<script type="text/javascript">
   var theForm = document.forms['form1'];
   if (!theForm) {
       theForm = document.form1;
   }
   function __doPostBack(eventTarget, eventArgument) {
       var theForm = document.forms['form1'];
       if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
           theForm.__EVENTTARGET.value = eventTarget;
           theForm.__EVENTARGUMENT.value = eventArgument;
           theForm.submit();
       }
   }
    window.onload = function(){
        $('#ddlStatus').change(function(){
           document.getElementById('form1').submit();
        });
        $('#ddlPaymentStatus').change(function(){
           document.getElementById('form1').submit();
        });
        $('#ddlExpressStatus').change(function(){
           document.getElementById('form1').submit();
        });
        $('#PageContent a').click(function(){
           var href = $(this).attr('href');
           $("#form1").attr("action", href);
           $("#form1").submit();
           return false;
        });
    }
    function orderStatusSubmit(status){
        $("#orderStatus").val(status);
        __doPostBack();
   }
</script>
            <!--导航栏-->
            <div class="location">
                <a href="javascript:history.back(-1);" class="back"><i></i><span>返回上一页</span></a>
                <a href="<?php echo U('Index/center');?>" class="home"><i></i><span>首页</span></a>
                <i class="arrow"></i>
                <span>订单列表</span>
            </div>
            <!--/导航栏-->

            <!--工具栏-->
            <div id="floatHead" class="toolbar-wrap">
                <div class="toolbar">
                    <div class="box-wrap">
                        <a class="menu-btn"></a>
                        <div class="l-list">
                            <ul class="icon-list">
                                <li><a class="all" href="javascript:;" onclick="checkAll(this);"><i></i><span>全选</span></a></li>
                                <li><a onclick="return ExePostBack(&#39;btnDelete&#39;);" id="btnDelete" class="del" href="javascript:__doPostBack(&#39;btnDelete&#39;,&#39;&#39;)"><i></i><span>删除</span></a></li>
                            </ul>
                            
                            
		                            <div class="rule-single-select">
		                        <select id="ddlStatus" name="orderStatus" onchange="orderStatusSubmit();">
		                            <option value="999" <?php if($_REQUEST['orderStatus']== '999'): ?>selected<?php endif; ?>>全部订单 (<?php echo ($countOrder['999']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="0" <?php if($_REQUEST['orderStatus']== '0'): ?>selected<?php endif; ?>>已取消 (<?php echo ($countOrder['0']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="1" <?php if($_REQUEST['orderStatus']== '1'): ?>selected<?php endif; ?>>待支付 (<?php echo ($countOrder['1']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="2" <?php if($_REQUEST['orderStatus']== '2'): ?>selected<?php endif; ?>>待发货 (<?php echo ($countOrder['2']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="3" <?php if($_REQUEST['orderStatus']== '3'): ?>selected<?php endif; ?>>待收货  (<?php echo ($countOrder['3']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="14" <?php if($_REQUEST['orderStatus']== '14'): ?>selected<?php endif; ?>>已完成 (<?php echo ($countOrder['14']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="5" <?php if($_REQUEST['orderStatus']== '5'): ?>selected<?php endif; ?>>[已发货]退款申请中 (<?php echo ($countOrder['5']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="15" <?php if($_REQUEST['orderStatus']== '15'): ?>selected<?php endif; ?>>[未发货]退款申请中 (<?php echo ($countOrder['15']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="6"  <?php if($_REQUEST['orderStatus']== '6'): ?>selected<?php endif; ?>>同意退款申请 (<?php echo ($countOrder['6']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="7"  <?php if($_REQUEST['orderStatus']== '7'): ?>selected<?php endif; ?>>商家待收货 (<?php echo ($countOrder['7']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="8"  <?php if($_REQUEST['orderStatus']== '8'): ?>selected<?php endif; ?>>商家已收货 (<?php echo ($countOrder['8']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="9"  <?php if($_REQUEST['orderStatus']== '9'): ?>selected<?php endif; ?>>商家同意退款 (<?php echo ($countOrder['9']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="10"  <?php if($_REQUEST['orderStatus']== '10'): ?>selected<?php endif; ?>>商家拒绝退款 (<?php echo ($countOrder['10']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="11"  <?php if($_REQUEST['orderStatus']== '11'): ?>selected<?php endif; ?>>已退款 (<?php echo ($countOrder['11']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                            <option value="16"  <?php if($_REQUEST['orderStatus']== '16'): ?>selected<?php endif; ?>>用户已删除 (<?php echo ($countOrder['16']); ?>条) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                        </select>
		                    </div>
		                    <div class="rule-single-select">
		                        <select  name="cancelCause" onchange="orderStatusSubmit();">
		                            <option value="999">请选择取消原因</option>
		                            <?php if(is_array($message)): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v['category'] == '1'): ?><option value="<?php echo ($v['content']); ?>" <?php if($_REQUEST['cancelCause']== $v['content']): ?>selected<?php endif; ?> ><?php echo ($v['content']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		                        </select>
		                    </div>
		                    <div class="rule-single-select">
		                        <select  name="returnReason" onchange="orderStatusSubmit();">
		                            <option value="999">请选择退款退货原因</option>
		                            <?php if(is_array($message)): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v['category'] == '2'): ?><option  value="<?php echo ($v['content']); ?>" <?php if($_REQUEST['returnReason']== $v['content']): ?>selected<?php endif; ?> ><?php echo ($v['content']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		                        </select>
		                    </div>
                            
                        </div>
                        <div class="r-list">
                            <input style="position:absolute;margin-left:-392px;" name="userName" type="text" id="phone" value="<?php echo ($_REQUEST['userName']); ?>" class="keyword" placeholder="用户名"  />
                            <input  style="position:absolute;margin-left:-192px;" name="mobile" type="text" id="nickname" value="<?php echo ($_REQUEST['mobile']); ?>" class="keyword"  placeholder="手机号码" />
                            <input name="txtKeywords" style="width:200px;" value="<?php echo ($_REQUEST['txtKeywords']); ?>" type="text" id="txtKeywords" class="keyword" placeholder="订单号" />
                            <a id="lbtnSearch" class="btn-search" href="javascript:__doPostBack(&#39;lbtnSearch&#39;,&#39;&#39;)">查询</a>
                        </div>


                    </div>
                    
                </div>
            </div>

            <!--/工具栏-->
            <!--列表-->
            <div class="table-container">
            <!--<?php if(is_array($rs)): foreach($rs as $orderK=>$orderV): ?>-->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ltable" style="margin-bottom:20px;background:#fff !important;">
                  <tr>
                    <th>
                    <span class="checkall" style="vertical-align:middle;">
                      <input id="rptList_chkId_<?php echo ($orderK); ?>" type="checkbox" name="rptList$ctl$chkId[<?php echo ($orderK); ?>]" />
                    </span>
                    <input type="hidden" name="rptList$ctl$hidId[<?php echo ($orderK); ?>]" id="rptList_hidId_<?php echo ($orderK); ?>" value="<?php echo ($orderV["orderId"]); ?>"/>选择
                    </th>
                        <th>订单号</th>
                        <th>商品名称</th>
                        <th>商品单价</th>
                        <th>数量</th>
                        <th>商品状态</th>
                        <th>用户名</th>
                        <th>手机号码</th>
                        <th>下单时间</th>
                  </tr>
                      <!--<?php if(is_array($orderV['ordergoods'])): foreach($orderV['ordergoods'] as $key=>$goods): ?>-->
                       <tr style="background:#fff !important;">
                           <td align="center" width="8%">
                             <div>
                                <img src="<?php echo ($goods['img_url']); ?>" width="60px" height="80px">
                             </div>
                           </td>
                           <td align="center" width="15%"><?php echo ($orderV['orderno']); ?></td>
                           <td align="center" width="15%"><?php echo ($goods['goods_title']); ?></td>
                           <td align="center" width="10%">￥ <?php echo ($goods['goods_price']); ?></td>
                           <td align="center" width="10%">x <?php echo ($goods['quantity']); ?></td>
                           <td align="center">
                             <?php switch($goods['goodsStatus']): case "5": ?><label class="label label-danger">用户申请退款</label>
                                    <label class="label label-info" onclick="refundreason(<?php echo ($goods['id']); ?>);">查看退货原因</label><?php break;?>
                                  <?php case "6": ?><label class="label label-info">商家已同意退款申请</label><br><br>
                                    <label class="label label-info" onclick="refundreason(<?php echo ($goods['id']); ?>);">查看退货原因</label><?php break;?>
                                  <?php case "7": ?><label class="label label-info" onclick="confirmGoods(<?php echo ($goods['id']); ?>);">确认收货</label><br><br>
                                      <label class="label label-info" onclick="GoodsDeliveryInfo(<?php echo ($goods['id']); ?>);">查看寄货信息</label><br><br>
                                      <label class="label label-info" onclick="refundreason(<?php echo ($goods['id']); ?>);">查看退货原因</label><?php break;?>
                                  <?php case "8": ?><label class="label label-info" onclick="agreeGoodsRefund(<?php echo ($goods['id']); ?>,2);">同意退款</label><br/><br/>
                                    <label class="label label-info" onclick="refusedGoodsRefund(<?php echo ($goods['id']); ?>);">拒绝退款</label><br/><br/>
                                    <label class="label label-info" onclick="refundreason(<?php echo ($goods['id']); ?>);">查看退货原因</label><?php break;?>
                                  <?php case "9": ?><label class="label label-info">退款中</label>
                                      <label class="label label-info" onclick="agreeGoodsRefund(<?php echo ($goods['id']); ?>,4);">确认已退款</label><br/><br/>
                                    <label class="label label-info" onclick="refundreason(<?php echo ($goods['id']); ?>);">查看退货原因</label><?php break;?>
                                  <?php case "10": ?><label class="label label-info">已拒绝退款</label>
                                    <label class="label label-info" onclick="refundreason(<?php echo ($goods['id']); ?>);">查看退货原因</label><?php break;?>
                                 <?php case "11": ?><label class="label label-info">已退款</label>
                                     <label class="label label-info" onclick="refundreason(<?php echo ($goods['id']); ?>);">查看退货原因</label><?php break;?>
                                  <?php case "14": ?><label class="label label-info">已完成</label><?php break;?>
                                  <?php case "15": ?>商品未发货，申请退款<?php break;?>
                                  <?php default: ?>正常<?php endswitch;?>
                           </td>
                           <td align="center" width="10%"><?php echo ($orderV['user_name']); ?></td>
                           <td align="center" width="10%"><?php echo ($orderV['mobile']); ?></td>
                           <td align="center" width="10%">
                               <?php echo ($orderV['createtime']); ?>
                           </td>
                       </tr>
                       <!--<?php endforeach; endif; ?>-->
                       <tr style="background:#fff !important;font-size:14px;" align="right" height="80px">
                        <td align="left" colspan="5" style = "padding-left:10px;">
                          <span style="padding-right:15px;">订单商品数量：<?php echo ($orderV['countGoods']); ?></span>
                          <span style="padding-right:15px;">订单金额：￥ <?php echo ($orderV['realitymoney']); ?></span>
                           </br>
                           </br>
                          <span style="padding-right:15px;">收货人：<?php echo ($orderV['username']); ?></span>
                          <span style="padding-right:15px;">手机号码：<?php echo ($orderV['userphone']); ?></span>
                          <span style="padding-right:15px;padding-top:10px;">收货地址：<?php echo ($orderV['area']); ?> <?php echo ($orderV['useraddress']); ?></span>
                          </br>
                          </br>
                          <span style="padding-right:15px;">订单状态：
                                 <?php switch($orderV['orderstatus']): case "0": ?><label class="label label-info"><?php if($orderV['isshow'] != '0'): ?>已取消<?php else: ?>已删除<?php endif; ?></label><?php break;?>
                                  <?php case "1": ?><label class="label label-info">待支付</label><?php break;?>
                                  <?php case "2": ?><label class="label label-info">待发货</label><?php break;?>
                                  <?php case "3": ?><label class="label label-info">待用户收货</label><?php break;?>
                                  <?php case "4": ?><label class="label label-info">待用户评论</label><?php break;?>
                                  <?php case "5": ?><label class="label label-danger">用户退款申请中</label><?php break;?>
                                  <?php case "6": ?><label class="label label-danger">商家已同意用户退款申请</label><?php break;?>
                                  <?php case "7": ?><label class="label label-info">商家待收货</label><?php break;?>
                                  <?php case "8": ?><label class="label label-info">商家已收货</label><?php break;?>
                                  <?php case "9": ?><label class="label label-info agreeRefund">退款中</label><?php break;?>
                                  <?php case "10": if($orderV['isshow'] != '0'): ?><label class="label label-danger refusedRefund">已拒绝退款</label>
                                        <?php else: ?>
                                        <label class="label label-info">已删除</label><?php endif; break;?>
                                  <?php case "11": if($orderV['isshow'] != '0'): ?><label class="label label-danger refusedRefund">已退款</label>
                                        <?php else: ?>
                                          <label class="label label-info">已删除</label><?php endif; break;?>
                                  <?php case "14": ?><label class="label label-info"><?php if($orderV['isshow'] != '0'): ?>已完成<?php else: ?>已删除<?php endif; ?></label><?php break;?>
                                  <?php case "15": ?><label class="label label-danger">商品未发货，申请退款</label><?php break; endswitch;?>
                          </span>
                        </td>
                        <td colspan="7">
                          <span style="margin-right:15px;">
                            操作
                            <label class="label label-danger" onclick="look_orders(<?php echo ($orderV['orderid']); ?>,<?php echo ($orderV['orderno']); ?>);">特权处理</label>
                            <label class="label label-default" onclick="look_order(<?php echo ($orderV['orderid']); ?>);">查看详情</label>
 <!--  订单状态  0-已取消 1-未支付 2-待发货 3-待收货  4-待评论 5-退款申请中 6-商家同意退款申请 7-商家待收货 8-商家已收货 9-商家同意退款 10-商家拒绝退款 11商家拒绝退款申请-->
                            <?php switch($orderV['orderstatus']): case "1": ?><label class="label label-danger" onclick="cancelOrder(<?php echo ($orderV['orderid']); ?>,5);">
                                      取消订单
                                    </label><?php break;?>
                                  <?php case "2": ?><label class="label label-success" onclick="chage_address(<?php echo ($orderV['orderid']); ?>);">修改地址</label>
                                    <label class="label label-info" onclick="sendGoods(<?php echo ($orderV['orderid']); ?>);">
                                      点击发货
                                    </label><?php break;?>
                                  <?php case "5": ?></label>
                                     <label class="label label-info" onclick="refundApply(<?php echo ($orderV['orderid']); ?>,1);">
                                       同意用户退款申请
                                     </label>
                                     <label class="label label-info" onclick="refusedRefundApply(<?php echo ($orderV['orderid']); ?>,2);">
                                       拒绝用户退款申请
                                     </label>
                                     <label class="label label-info" onclick="RefundReasonOrder(<?php echo ($orderV['orderid']); ?>,12);">查看退货原因</label><?php break;?>
                                <?php case "7": ?><label class="label label-info" onclick="confirmReceipt(<?php echo ($orderV['orderid']); ?>,3);">
                                      商家点击确认收货
                                    </label>
                                    <label class="label label-info" onclick="lookgoodsInfo(<?php echo ($orderV['orderid']); ?>,8);">
                                      查看寄货信息
                                    </label>
                                     <label class="label label-info" onclick="RefundReasonOrder(<?php echo ($orderV['orderid']); ?>,12);">查看退货原因</label><?php break;?>
                                  <?php case "8": ?><label class="label label-info" onclick="agreeRefund(<?php echo ($orderV['orderid']); ?>,4);">
                                       点击同意退款
                                     </label>
                                     <label class="label label-info" onclick="refusedRefundApply(<?php echo ($orderV['orderid']); ?>,2);">
                                       点击拒绝退款
                                     </label>
                                     <label class="label label-info" onclick="RefundReasonOrder(<?php echo ($orderV['orderid']); ?>,12);">查看退货原因</label><?php break;?>
                                  <?php case "9": ?><label class="label label-info" onclick="trueRefund(<?php echo ($orderV['orderid']); ?>,9);">
                                       点击确认已退款
                                     </label><?php break;?>
                                  <?php case "15": ?><label class="label label-info" onclick="agreeRefund(<?php echo ($orderV['orderid']); ?>,4);">
                                       点击同意退款
                                     </label>
                                     <!-- <label class="label label-info" onclick="RefundReasonOrder(<?php echo ($orderV['orderid']); ?>);">查看退货原因</label> -->
                                     <label class="label label-info" onclick="refusedRefundApply(<?php echo ($orderV['orderid']); ?>,7);">
                                       点击拒绝退款
                                     </label>
                                    <!-- <label class="label label-info" onclick="RefundReasonOrder(<?php echo ($orderV['orderid']); ?>,12);">查看退货原因</label>--><?php break; endswitch;?>
                          </span>
                        </td>
                       </tr>
                </table>
            <!--<?php endforeach; endif; ?>-->
            </div>
            <!--/列表-->
            <!--内容底部-->
            <div class="line20"></div>
            <div class="pagelist">
                <div id="PageContent" class="default">
                    <span>共<?php echo ($count); ?>记录</span>
                    <?php echo ($page_str); ?>
                </div>
            </div>
            <!--/内容底部-->
</form>
<!--发货-->
<style>
  .seoption {
    float: left;
    width: 80%;
    height: 33px;
    border: 1px solid #cccccc;
    margin-right: 10px;
    text-align: center;
    color: #b2b2b2;
  }
  .sssInput {
    float: left;
    width: 78%;
    height: 40px;
    border: 1px solid #cccccc;
    margin-right: 5px;
    padding-left: 5px;
  }
  .sssButton{
    float: left;
    width: 78%;
    background:rgb(22,160,211);
    border:0;
    height:40px;
    font-size:18px;
    color:white;
    bottom:10px;
  }
  .sssButtons{
      float: left;
      width: 78%;
      background:rgb(22,160,211);
      border:0;
      height:40px;
      font-size:18px;
      color:white;
      bottom:10px;
  }
</style>

<div style="display:none;" id="refundApply">
    <div style="width:90%;margin:20px;">
        <div style="float:left;width:100%;margin-bottom:20px;margin-left:30px;">
            <input type="text" class="sssInput"  value="<?php echo ($shipmentAddress['name']); ?>" placeholder="请输入联系人姓名" id="shipmentName">
        </div>
        <div style="float:left;width:100%;margin-bottom:20px;margin-left:30px;">
            <input type="text" class="sssInput"  value="<?php echo ($shipmentAddress['phone']); ?>" placeholder="请输入联系人电话" id="shipmentPhone">
        </div>
        <div style="float:left;width:100%;margin-bottom:20px;margin-left:30px;">
            <input type="text" class="sssInput"  value="<?php echo ($shipmentAddress['address']); ?>" placeholder="请输入寄货地址" id="shipmentAddress">
        </div>
        <div style="float:left;width:100%;margin-left:30px;margin-bottom:20px;">
            <button type="button" onclick="confirmOrderRefund();" class="sssButtons">确定</button>
        </div>
    </div>
    <input type="hidden" value="" id="oid"/>
    <input type="hidden" value="" id="type"/>
</div>


<div style="display:none;" id="orderTe">
    <div style="width:90%;margin:20px auto 0;">
        <span style="font-size:16px;">订单号：<span id="orderNo"></span> 您可以将订单状态任意指定为：</span>
    </div>
    <div style="width:90%;margin:20px auto 0;">
        <label class="label label-info" onclick="privilege(<?php echo ($orderV['orderid']); ?>,1,'已删除');">已删除</label>
        <label class="label label-info" onclick="privilege(<?php echo ($orderV['orderid']); ?>,2,'已取消');">已取消</label>
        <label class="label label-info" onclick="privilege(<?php echo ($orderV['orderid']); ?>,3,'待支付');">待支付</label>
        <label class="label label-info" onclick="privilege(<?php echo ($orderV['orderid']); ?>,4,'待发货');">待发货</label>
        <label class="label label-info" onclick="privilege(<?php echo ($orderV['orderid']); ?>,5,'已完成');">已完成</label>
        <br/>
        <br/>
        <br/>
        <label class="label label-danger" onclick="privilege(<?php echo ($orderV['orderid']); ?>,14,'退款申请中(未发货)');">退款申请中【未发货】</label>
        <label class="label label-danger" onclick="privilege(<?php echo ($orderV['orderid']); ?>,6,'退款申请中(已发货)');">退款申请中【已发货】</label>
        <label class="label label-danger" onclick="privilege(<?php echo ($orderV['orderid']); ?>,7,'同意退款申请');">同意退款申请</label>
        <label class="label label-danger" onclick="privilege(<?php echo ($orderV['orderid']); ?>,8,'商家待收货');">商家待收货</label>
        <br/>
        <br/>
        <br/>
        <label class="label label-info" onclick="privilege(<?php echo ($orderV['orderid']); ?>,9,'商家已收货');">商家已收货</label>
        <label class="label label-info" onclick="privilege(<?php echo ($orderV['orderid']); ?>,10,'退款中');">退款中</label>
        <label class="label label-info" onclick="privilege(<?php echo ($orderV['orderid']); ?>,11,'商家拒绝退款');">商家拒绝退款</label>
        <label class="label label-info" onclick="privilege(<?php echo ($orderV['orderid']); ?>,12,'商家已退款');">商家已退款</label>
    </div>
</div>

<input type="hidden" value="" id="ovId"/>
<input type="hidden" value="" id="ovType"/>
<input type="hidden" value="" id="cont"/>



<div style="display:none;" id="shipments">
    <div style="width:90%;margin:20px 45px;">
         <div style="float:left;width:90%;margin-bottom:20px;margin-left: 30px;">
           <select class="seoption" id="delivery">
             <option value="0">选择快递公司</option>
             <!--<?php if(is_array($express)): foreach($express as $key=>$v): ?>-->
             <option value="<?php echo ($v["id"]); ?>"><?php echo ($v['title']); ?></option>
             <!--<?php endforeach; endif; ?>-->
           </select>
         </div>
         <div style="float:left;width:90%;margin-bottom:20px;margin-left: 30px;">
           <input type="text" class="sssInput" placeholder="请输入快递单号" id="deliveryNo">
         </div>
         <div style="float:left;width:90%;margin-left: 30px;">
           <button type="button" class="sssButton">确定</button>
         </div>
    </div>
</div>

<script type="text/javascript">
  layer.config({
    extend: 'extend/layer.ext.js'//加载扩展js
  });
  function chage_address(id){
      layer.open({
          type: 2,
          closeBtn: 1,
          content: "<?php echo U('Order/saveAddress');?>?id="+id,
          area: ['850px','532px'],
          shade: [0.5, '#000'],
          shadeClose :true,
          title:"修改地址"
      });
  }

//获取订单详情
function look_order(o_id){
    var url = "<?php echo U('Order/order_detailed');?>?o_id=" + o_id;
    layer.open({
    type: 2,
    title: '订单详情',
    shadeClose: true,
    shade: 0.8,
    area: ['880px', '90%'],
    content: url //iframe的url
  }); 
}


  /**特权处理**/
function look_orders(o_id,orderNo){
      layer.open({
          type: 1,
          title: '订单状态特权处理',
          shadeClose: true,
          shade: 0.2,
          area: ['550px', '30%'],
          content: $("#orderTe")
      });
      $("#ovId").val(o_id);
      $("#orderNo").html(orderNo);
  }

   function privilege(oid,type,cont){
        var ovId = $("#ovId").val();
       layer.confirm("你确认要将该订单状态修改为【"+cont+"】吗?",function(){
           $.post("<?php echo U('Order/PrivilegeOrderStatus');?>",{orderId:ovId,type:type},function(data){
               if(data.status==1){
                   layer.closeAll();
                   layer.msg("操作成功");
                   setTimeout(function(){
                       window.location.reload();
                   },500);
               }else{
                   layer.msg("操作失败！");
               }
            })
       })
   }

  function refundApply(o_id,type){
      layer.open({
          type: 1,
          title: '同意用户退款申请',
          shadeClose: true,
          shade: 0.8,
          area:['500px','350px'],
          content: $("#refundApply")
      });
      $("#oid").val(o_id);
      $("#type").val(type);
  }

  function confirmOrderRefund(){
      var oid=$("#oid").val();
      var type=$("#type").val();
      var shipmentAddress= $("#shipmentAddress").val();
      var shipmentName= $("#shipmentName").val();
      var shipmentPhone= $("#shipmentPhone").val();
          $.post("<?php echo U('Order/chage_status');?>",{o_id:oid,type:type,shipmentAddress:shipmentAddress,shipmentPhone:shipmentPhone,shipmentName:shipmentName},function(data){
              var obj = eval("("+data+")");
              if(obj.status == 'success' ){
                  layer.closeAll();
                  layer.msg(obj.info);
                  location.reload();
              }else{
                  layer.msg(obj.info);
              }
          });
  }



  //订单状态处理
  //同意退款申请
  function agreeRefundApply(o_id,type){
    layer.confirm('操作确认？', {
      btn: ['确定','取消'],
    }, function(){
            $.post("<?php echo U('Order/chage_status');?>",{o_id:o_id,type:type},function(data){
                if(data.status == 'success' ){
                    layer.msg(data.info);
                    location.reload();
                }else{
                    layer.msg(data.info);
                }
            },'json');
    }, function(){});
  }
  //查看订单退款原因
  function RefundReasonOrder(o_id,type){
       var url = "<?php echo U('Order/refundReasonOrder');?>?id="+o_id;
        layer.open({
        type: 2,
        title: '退款原因',
        shadeClose: true,
        shade: 0.8,
        area: ['900px', '50%'],
        content: url //iframe的url
      });
  }
  //拒绝退款申请
  function refusedRefundApply(o_id,type){
    layer.prompt({
    title: '拒绝原因',
    formType: 2
    }, function(text){
         $.post("<?php echo U('Order/chage_status');?>",{o_id:o_id,type:type,refuseReason:text},function(data){
            if(data.status == 'success' ){
                layer.msg(data.info);
                location.reload();
            }else{
               layer.msg(data.info);
            }
        },'json');
    });
  }
  //商家确认收货
  function confirmReceipt(o_id,type){
   layer.confirm('操作确认？', {
      btn: ['确定','取消'],
    }, function(){
       $.post("<?php echo U('Order/chage_status');?>",{o_id:o_id,type:type},function(data){
            if(data.status == 'success' ){
                layer.msg(data.info);
                location.reload();
            }else{
               layer.msg(data.info);
            }
        },'json');
    }, function(){});
 }


  //商家点击同意退款
  function agreeRefund(o_id,type){
   layer.confirm('操作确认？', {
      btn: ['确定','取消'],
    }, function(){
       $.post("<?php echo U('Order/chage_status');?>",{o_id:o_id,type:type},function(data){
            if(data.status == 'success' ){
                layer.msg(data.info);
                location.reload();
            }else{
               layer.msg(data.info);
            }
        },'json');
    }, function(){});
 }
 //商家确定已退款
 function trueRefund(o_id,type){
    layer.confirm('操作确认？', {
      btn: ['确定','取消'],
    }, function(){
       $.post("<?php echo U('Order/chage_status');?>",{o_id:o_id,type:type},function(data){
            if(data.status == 'success' ){
                layer.msg(data.info);
                location.reload();
            }else{
               layer.msg(data.info);
            }
        },'json');
    }, function(){});

 }
 //查看寄货信息
 function lookgoodsInfo(o_id,type){
    $.post("<?php echo U('Order/chage_status');?>",{o_id:o_id,type:type},function(data){
            if(data){
               var html = "";
               html +='<div class="goodsInfo">';
               html +='<li>物流公司：'+data.userdeliveryname+'</li>';
               html +='<li>快递单号：'+data.userdeliveryno+'</li>';
               html +='</div>';
               layer.open({
                type: 1,
                title: '寄货信息',
                shadeClose: true,
                shade: 0.8,
                area: ['500px', '200px'],
                content: html
              });
            }
        },'json');
 }
 //取消订单
 function cancelOrder(o_id,type){
   layer.confirm('操作确认？', {
      btn: ['确定','取消'],
    }, function(){
       $.post("<?php echo U('Order/chage_status');?>",{o_id:o_id,type:type},function(data){
            if(data.status == 'success' ){
                layer.msg(data.info);
                location.reload();
            }else{
               layer.msg(data.info);
            }
        },'json');
    }, function(){});
 }
 //点击发货
 function sendGoods(o_id){
     $('#orderId').val(o_id);
     layer.open({
       type: 1,
       title: '发货信息',
       closeBtn: 1,
       area: ['40%', '400px'],
       shadeClose: true,
       content: $('#shipments')
   });
 }
 $('.sssButton').click(function(){

    var o_id       = $('#orderId').val();
    var delivery   = $('#delivery').val();
    var deliveryNo = $('#deliveryNo').val();
    var type       = 6;
    if(delivery == 0){
      layer.msg('请选择快递公司');
    }else if(deliveryNo == ''){
      layer.msg('请输入快递单号');
    }else{
      $.post("<?php echo U('Order/chage_status');?>",{o_id:o_id,type:type,delivery:delivery,deliveryNo:deliveryNo},function(data){
          if(data.status == 'success' ){
              layer.msg(data.info);
              location.reload();
          }else{
              layer.msg(data.info);
          }
      },'json');
    }
 });

</script>
<script type="text/javascript">
//单个商品操作
 function refundreason(id){
    var url = "<?php echo U('Order/refundReason');?>?id=" + id;
    layer.open({
    type: 2,
    title: '退款详情',
    shadeClose: true,
    shade: 0.8,
    area: ['900px', '50%'],
    content: url //iframe的url
  });
 }
 //确认收货
 function confirmGoods(id){
     var type = 3;
     layer.confirm('操作确认？', {
      btn: ['确定','取消'],
    }, function(){
       $.post("<?php echo U('Order/goodsStatus');?>",{id:id,type:type},function(data){
            if(data.status == 'success' ){
                layer.msg(data.info);
                location.reload();
            }else{
               layer.msg(data.info);
            }
        },'json');
    }, function(){});
 }

//同意单个商品退款
function agreeGoodsRefund(id,type){
   layer.confirm('操作确认？', {
      btn: ['确定','取消'],
    }, function(){
       $.post("<?php echo U('Order/goodsStatus');?>",{id:id,type:type},function(data){
            if(data.status == 'success' ){
                layer.msg(data.info);
                location.reload();
            }else{
               layer.msg(data.info);
            }
        },'json');
    }, function(){}); 
}
//拒绝单个商品退款
function refusedGoodsRefund(id){
  var type = 0;
  layer.prompt({
    title: '拒绝原因',
    formType: 2
    }, function(text){
         $.post("<?php echo U('Order/goodsStatus');?>",{id:id,type:type,refuseReason:text},function(data){
            if(data.status == 'success' ){
                layer.msg(data.info);
                location.reload();
            }else{
               layer.msg(data.info);
            }
        },'json');
    });
}
//查看单个商品物流信息
function GoodsDeliveryInfo(id){
  var type = 7;
  $.post("<?php echo U('Order/goodsStatus');?>",{id:id,type:type},function(data){
            if(data){
               var html = "";
               html +='<div class="goodsInfo">';
               html +='<li>物流公司：'+data.deliveryName+'</li>';
               html +='<li>快递单号：'+data.deliveryNo+'</li>';
               html +='</div>';
               layer.open({
                type: 1,
                title: '寄货信息',
                shadeClose: true,
                shade: 0.8,
                area: ['500px', '200px'],
                content: html
              });
            }
        },'json');
}
</script>
</body>
</html>