<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>查看订单</title>
<link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/laymain.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
    $(function () {
        $("#btnConfirm").click(function () { OrderConfirm(); });   //确认订单
        $("#btnPayment").click(function () { OrderPayment(); });   //确认付款
        $("#btnExpress").click(function () { OrderExpress(); });   //确认发货
        $("#btnComplete").click(function () { OrderComplete(); }); //完成订单
        $("#btnCancel").click(function () { OrderCancel(); });     //取消订单
        $("#btnInvalid").click(function () { OrderInvalid(); });   //作废订单
        $("#btnPrint").click(function () { OrderPrint(); });       //打印订单

        $("#btnEditAcceptInfo").click(function () { EditAcceptInfo(); }); //修改收货信息
        $("#btnEditRemark").click(function () { EditOrderRemark(); });    //修改订单备注
        $("#btnEditRealAmount").click(function () { EditRealAmount(); }); //修改商品总金额
        $("#btnEditExpressFee").click(function () { EditExpressFee(); }); //修改配送费用
        $("#btnEditPaymentFee").click(function () { EditPaymentFee(); }); //修改支付手续费
        $("#btnEditInvoiceTaxes").click(function () { EditInvoiceTaxes(); }); //修改发票税金
    });
    //确认订单
    function OrderConfirm() {
        var winDialog = top.dialog({
            title: '提示',
            content: '您将确认该订单，确认要继续吗？',
            okValue: '确定',
            ok: function () {
                var postData = {"order_no": $("#spanOrderNo").text(),"edit_type":"order_confirm"};
                //发送AJAX请求
                sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
                return false;
            },
            cancelValue: '取消',
            cancel: function () { }
        }).showModal();
    }
    //确认付款
    function OrderPayment() {
        var winDialog = top.dialog({
            title: '提示',
            content: '操作提示信息：<br />1、该订单使用在线支付方式，付款成功后自动确认；<br />2、如客户确实已打款而没有自动确认可使用该功能；<br />3、确认付款后无法修改金额，确认要继续吗？',
            okValue: '确定',
            ok: function () {
                var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "order_payment" };
                //发送AJAX请求
                sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
                return false;
            },
            cancelValue: '取消',
            cancel: function () { }
        }).showModal();
    }
    
    //确认发货 以下方法存在bug，后期解决
    /*
    function OrderExpress() {
        var winDialog = top.dialog({
            title: '提示',
            url: 'dialog/dialog_express.aspx?order_no=' + $("#spanOrderNo").text(),
            width: 450,
            data: window //传入当前窗口
        }).showModal();
    }
    */
    function OrderExpress(){
    	var tmpcontent = $("#expressbox").html();
    		tmpcontent += '<br /><br /><span style="display:inline-block;width:80px;">快递单号:</span><input id="txtDialogExpressNo" type="text" value="' + $("#spanExpressNo").text() + '" class="input" style="width:300px;" /><br /><br />';
	var winDialog = top.dialog({
        title: '订单发货修改',
        content: tmpcontent,
        okValue: '确定',
        ok: function () {
            var expressid = $("#expressid", parent.document).val();
            var expressno = $("#txtDialogExpressNo", parent.document).val();
            var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "edit_order_express","expressid":expressid,"expressno":expressno};
            //发送AJAX请求
            sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
            return false;
        },
        cancelValue: '取消',
        cancel: function () { }
    }).showModal();
    }
    
    //完成订单
    function OrderComplete() {
        var winDialog = top.dialog({
            title: '完成订单',
            content: '订单完成后，订单处理完毕，确认要继续吗？',
            button: [{
                value: '确定',
                callback: function () {
                    var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "order_complete" };
                    //发送AJAX请求
                    sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
                    return false;
                },
                autofocus: true
            }, {
                value: '取消',
                callback: function () { }
            }]
        }).showModal();
    }
    //取消订单
    function OrderCancel() {
        var winDialog = top.dialog({
            title: '取消订单',
            content: '操作提示信息：<br />1、匿名用户，请线下与客户沟通；<br />2、会员用户，自动检测退还金额或积分到账户；<br />3、请单击相应按钮继续下一步操作！',
            button: [
                     /*
                     {
		                value: '检测退还',
		                callback: function () {
		                    var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "order_cancel", "check_revert": 1 };
		                    //发送AJAX请求
		                    sendAjaxUrl(winDialog, postData, "../../tools/admin_ajax.ashx?action=edit_order_status");
		                    return false;
		                },
		                autofocus: true
		            },*/ 
            		{
		                value: '直接取消',
		                callback: function () {
		                    var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "order_cancel", "check_revert": 0 };
		                    //发送AJAX请求
		                    sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
		                    return false;
		                }
		            }, 
		            {
		                value: '关闭',
		                callback: function () { }
		            }
		            ]
        }).showModal();
    }
    //作废订单
    function OrderInvalid() {
        var winDialog = top.dialog({
            title: '取消订单',
            content: '操作提示信息：<br />1、匿名用户，请线下与客户沟通；<br />2、会员用户，自动检测退还金额或积分到账户；<br />3、请单击相应按钮继续下一步操作！',
            button: [
                     /*
                     {
		                value: '检测退还',
		                callback: function () {
		                    var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "order_invalid", "check_revert": 1 };
		                    //发送AJAX请求
		                    sendAjaxUrl(winDialog, postData, "../../tools/admin_ajax.ashx?action=edit_order_status");
		                    return false;
		                },
		                autofocus: true
		            }, */
            {
                value: '直接作废',
                callback: function () {
                    var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "order_invalid", "check_revert": 0 };
                    //发送AJAX请求
                    sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
                    return false;
                }
            }, {
                value: '关闭',
                callback: function () { }
            }]
        }).showModal();
    }
    //打印订单
    function OrderPrint() {
        var winDialog = top.dialog({
            title: '打印订单',
            url: '/index.php/MomuAdmin/Order/dialog_print/order_no/' + $("#spanOrderNo").text(),
            width: 850
        }).showModal();
    }
    //修改收货信息
    /*存在bug
    function EditAcceptInfo() {
        var winDialog = top.dialog({
            title: '修改收货信息',
            url: '/index.php/MomuAdmin/Order/dialog_accept/order_no/' + $("#spanOrderNo").text(),
            width: 550,
            height: 420,
            data: window //传入当前窗口
        }).showModal();
    }*/
    function EditAcceptInfo() {
    	var mycontent = '<span style="display:inline-block;width:80px;">收件人:</span><input id="txtDialogAcceptName" type="text" value="' + $("#spanAcceptName").text() + '" class="input" style="width:300px;" /><br /><br />';
    	    mycontent += '<span style="display:inline-block;width:80px;">省市区:</span><input id="txtDialogArea" type="text" value="' + $("#spanArea").text() + '" class="input" style="width:300px;" /><br /><br />';
    	    mycontent += '<span style="display:inline-block;width:80px;">详细地址:</span><input id="txtDialogAddress" type="text" value="' + $("#spanAddress").text() + '" class="input" style="width:300px;" /><br /><br />';
    	    mycontent += '<span style="display:inline-block;width:80px;">邮政编码:</span><input id="txtDialogPostCode" type="text" value="' + $("#spanPostCode").text() + '" class="input" style="width:300px;" /><br /><br />';
    	    mycontent += '<span style="display:inline-block;width:80px;">手机:</span><input id="txtDialogMobile" type="text" value="' + $("#spanMobile").text() + '" class="input" style="width:300px;" /><br /><br />';
    	    mycontent += '<span style="display:inline-block;width:80px;">电话:</span><input id="txtDialogTelphone" type="text" value="' + $("#spanTelphone").text() + '" class="input" style="width:300px;" /><br /><br />';
    	    mycontent += '<span style="display:inline-block;width:80px;">邮箱:</span><input id="txtDialogEmail" type="text" value="' + $("#spanEmail").text() + '" class="input" style="width:300px;" /><br />';
    	var winDialog = top.dialog({
            title: '订单收货修改',
            content: mycontent,
            okValue: '确定',
            ok: function () {
            	
                var acceptname = $("#txtDialogAcceptName", parent.document).val();
                var area = $("#txtDialogArea", parent.document).val();
                var address = $("#txtDialogAddress", parent.document).val();
                var postcode = $("#txtDialogPostCode", parent.document).val();
                var tel = $("#txtDialogTelphone", parent.document).val();
                var mobile = $("#txtDialogMobile", parent.document).val();
                var email = $("#txtDialogEmail", parent.document).val();
                
                var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "edit_order_mess", "acceptname": acceptname ,"area":area,"address":address,"postcode":postcode,"mobile":mobile,"telphone":tel,"email":email};
                //发送AJAX请求
                sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
                return false;
            },
            cancelValue: '取消',
            cancel: function () { }
        }).showModal();
    }
    
    
    //修改订单备注
    function EditOrderRemark() {
        var winDialog = top.dialog({
            title: '订单备注',
            content: '<textarea id="txtOrderRemark" name="txtOrderRemark" rows="2" cols="20" class="input">' + $("#divRemark").html() + '</textarea>',
            okValue: '确定',
            ok: function () {
                var remark = $("#txtOrderRemark", parent.document).val();
                if (remark == "") {
                    top.dialog({
                        title: '提示',
                        content: '对不起，请输入订单备注内容！',
                        okValue: '确定',
                        ok: function () { }
                    }).showModal(winDialog);
                    return false;
                }
                var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "edit_order_remark", "remark": remark };
                //发送AJAX请求
                sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
                return false;
            },
            cancelValue: '取消',
            cancel: function () { }
        }).showModal();
    }

    //修改商品总金额
    function EditRealAmount() {
        var winDialog = top.dialog({
            title: '请修改商品总金额',
            content: '<input id="txtDialogAmount" type="text" value="' + $("#spanRealAmountValue").text() + '" class="input" />',
            okValue: '确定',
            ok: function () {
                var amount = $("#txtDialogAmount", parent.document).val();
                if (!checkIsMoney(amount)) {
                    top.dialog({
                        title: '提示',
                        content: '对不起，请输入正确的商品金额！',
                        okValue: '确定',
                        ok: function () { }
                    }).showModal(winDialog);
                    return false;
                }
                var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "edit_real_amount", "real_amount": amount };
                //发送AJAX请求
                sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
                return false;
            },
            cancelValue: '取消',
            cancel: function () { }
        }).showModal();
    }
    //修改配送费用
    function EditExpressFee() {
        var winDialog = top.dialog({
            title: '请修改配送费用',
            content: '<input id="txtDialogAmount" type="text" value="' + $("#spanExpressFeeValue").text() + '" class="input" />',
            okValue: '确定',
            ok: function () {
                var amount = $("#txtDialogAmount", parent.document).val();
                if (!checkIsMoney(amount)) {
                    top.dialog({
                        title: '提示',
                        content: '对不起，请输入正确的配送金额！',
                        okValue: '确定',
                        ok: function () { }
                    }).showModal(winDialog);
                    return false;
                }
                var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "edit_express_fee", "express_fee": amount };
                //发送AJAX请求
                sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
                return false;
            },
            cancelValue: '取消',
            cancel: function () { }
        }).showModal();
    }
    //修改手续费用
    function EditPaymentFee() {
        var winDialog = top.dialog({
            title: '请修改支付手续费用',
            content: '<input id="txtDialogAmount" type="text" value="' + $("#spanPaymentFeeValue").text() + '" class="input" />',
            okValue: '确定',
            ok: function () {
                var amount = $("#txtDialogAmount", parent.document).val();
                if (!checkIsMoney(amount)) {
                    top.dialog({
                        title: '提示',
                        content: '对不起，请输入正确的手续费用！',
                        okValue: '确定',
                        ok: function () { }
                    }).showModal(winDialog);
                    return false;
                }
                var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "edit_payment_fee", "payment_fee": amount };
                //发送AJAX请求
                sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
                return false;
            },
            cancelValue: '取消',
            cancel: function () { }
        }).showModal();
    }
    //修改税金费用
    function EditInvoiceTaxes() {
        var winDialog = top.dialog({
            title: '请修改发票税金费用',
            content: '<input id="txtDialogAmount" type="text" value="' + $("#spanInvoiceTaxesValue").text() + '" class="input" />',
            okValue: '确定',
            ok: function () {
                var amount = $("#txtDialogAmount", parent.document).val();
                if (!checkIsMoney(amount)) {
                    top.dialog({
                        title: '提示',
                        content: '对不起，请输入正确的税金费用！',
                        okValue: '确定',
                        ok: function () { }
                    }).showModal(winDialog);
                    return false;
                }
                var postData = { "order_no": $("#spanOrderNo").text(), "edit_type": "edit_invoice_taxes", "invoice_taxes": amount };
                //发送AJAX请求
                sendAjaxUrl(winDialog, postData, "/index.php/MomuAdmin/Order/edit_order_status");
                return false;
            },
            cancelValue: '取消',
            cancel: function () { }
        }).showModal();
    }

    //=================================工具类的JS函数====================================
    //检查是否货币格式
    function checkIsMoney(val) {
        var regtxt = /^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/;
        if (!regtxt.test(val)) {
            return false;
        }
        return true;
    }
    /*
    //发送AJAX请求
    function sendAjaxUrl(winObj, postData, sendUrl) {
    	//alert(JSON.stringify(postData));
        $.ajax({
            type: "post",
            url: sendUrl,
            data: postData,
            dataType: "json",
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                top.dialog({
                    title: '提示',
                    content: '尝试发送失败，错误信息：' + errorThrown,
                    okValue: '确定',
                    ok: function () { }
                }).showModal(winObj);
            },
            success: function (data, textStatus) {
                if (data.status == 1) {
                    winObj.close().remove();
                    var d = dialog({ content: data.msg }).show();
                    setTimeout(function () {
                        d.close().remove();
                        location.reload(); //刷新页面
                    }, 2000);
                } else {
                    top.dialog({
                        title: '提示',
                        content: '错误提示：' + data.msg,
                        okValue: '确定',
                        ok: function () { }
                    }).showModal(winObj);
                }
            }
        });
    }*/
    
    function sendAjaxUrl(winObj, postData, sendUrl) {
        $.ajax({
            type: "post",
            url: sendUrl,
            data: postData,
            dataType: "json",
            error: function() {
            	top.dialog({
                    title: '提示',
                    content: '错误提示：请求接口失败，请检查传递参数是否出错！',
                    okValue: '确定',
                    ok: function () { }
                }).showModal();
        		return false;
            },
            success: function(data){
            	winObj.close().remove();
            	if(data.code != 200){
            		top.dialog({
                        title: '提示',
                        content: '错误提示：' + data.message,
                        okValue: '确定',
                        ok: function () { }
                    }).showModal();
            		return false;
            	}
                location.reload(); //刷新页面
            }
        });
    }
</script>
</head>

<body class="mainbody">
<form method="post" action="order_edit.aspx?action=Edit&amp;id=1876" id="form1">
<!--导航栏-->
<div class="location">
  <a href="/index.php/MomuAdmin/Order/order_list" class="back"><i></i><span>返回列表页</span></a>
  <a href="" class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <a href="/index.php/MomuAdmin/Order/order_list"><span>订单管理</span></a>
  <i class="arrow"></i>
  <span>订单详细</span>
</div>
<div class="line10"></div>
<!--/导航栏-->

<!--内容-->
<div id="floatHead" class="content-tab-wrap">
  <div class="content-tab">
    <div class="content-tab-ul-wrap">
      <ul>
        <li><a class="selected" href="javascript:;">订单详细信息</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="tab-content">
  <dl>
    <dd style="margin-left:50px;text-align:center;">
      <div class="order-flow" style="width:560px">
        <?php if($orderinfo['status'] == '1'): ?><div class="order-flow-left">
	          <a class="order-flow-input">生成</a>
	          <span><p class="name">订单已生成</p><p><?php echo ($orderinfo['add_time']); ?></p></span>
	        </div> 
	        
	        <div class="order-flow-wait">
	          <a class="order-flow-input">付款</a>
	          <span><p class="name">等待付款</p></span>
	        </div>
	        
	        <div class="order-flow-wait">
	          <a class="order-flow-input">确认</a>
	          <span><p class="name">等待确认</p></span>
	        </div>
	        
	        <div class="order-flow-wait">
	          <a class="order-flow-input">发货</a>
	          <span><p class="name">等待发货</p></span>
	        </div>
	        
	         <!-- <div class="order-flow-wait">
	           <a class="order-flow-input">完成</a>
	           <span><p class="name">等待完成</p></span>
	         </div> -->
        <?php else: ?>
        <?php echo (showCurrentStatus($orderinfo['status'])); endif; ?>
      </div>
    </dd>
  </dl>
  
  <div style='display:none;' id="expressbox">
  	<span style="display:inline-block;width:80px;">物流公司：</span>
  	<select id='expressid' name="expressid">
  		<?php if(is_array($allExpress)): $i = 0; $__LIST__ = $allExpress;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($orderinfo['express_id'] == $vo['id']): ?><option value=<?php echo ($vo['id']); ?> selected><?php echo ($vo['title']); ?></option>
			<?php else: ?>
	  			<option value=<?php echo ($vo['id']); ?>><?php echo ($vo['title']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
  	</select>
  </div>
  
  
  
  
  <dl>
    <dt>订单号</dt>
    <dd><span id="spanOrderNo"><?php echo ($orderinfo['order_no']); ?></span></dd>
  </dl>
  
  <dl>
    <dt>商品列表</dt>
    <dd>
      <div class="table-container">
        <table border="0" cellspacing="0" cellpadding="0" class="border-table" width="100%">
        <thead>
          <tr>
            <th style="text-align:left;">商品信息</th>
            <th width="8%">销售价</th>
            <th width="8%">优惠价</th>
            <th width="8%">积分</th>
            <th width="8%">数量</th>
            <th width="12%">金额合计</th>
            <th width="8%">积分合计</th>
          </tr>
        </thead>
        <tbody>
        <?php if(is_array($plist)): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="td_c">
            <td style="text-align:left;white-space:inherit;word-break:break-all;line-height:20px;">
		    <?php echo ($vo['goods_title']); ?>
            </td>
            <td><?php echo ($vo['goods_price']); ?></td>
            <td><?php echo ($vo['real_price']); ?></td>
            <td><?php echo ($vo['point']); ?></td>
            <td><?php echo ($vo['quantity']); ?></td>
            <td><?php echo ($vo['totalmoney']); ?></td>
            <td><?php echo ($vo['totalpoint']); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          <!-- <tr class="td_c">
            <td style="text-align:left;white-space:inherit;word-break:break-all;line-height:20px;">
		              霍尼韦尔（Honeywel）HM-F1020-A-B HDMI高清数据线
            </td>
            <td>49.00</td>
            <td>49.00</td>
            <td>0</td>
            <td>1</td>
            <td>49.00</td>
            <td>0</td>
          </tr> -->
          
        </tbody>
        </table>
      </div>
    </dd>
  </dl>
  
  <dl>
    <dt>收货信息</dt>
    <dd>
      <div class="table-container">
        <table border="0" cellspacing="0" cellpadding="0" class="border-table" width="100%">
        <tr>
          <th width="20%">收件人</th>
          <td>
            <div class="position">
              <span id="spanAcceptName"><?php echo ($orderinfo['accept_name']); ?></span>
              <?php if($orderinfo['status'] <= '3'): ?><input name="btnEditAcceptInfo" type="button" id="btnEditAcceptInfo" class="ibtn" value="修改" /><?php endif; ?>
            </div>
          </td>
        </tr>
        <tr>
          <th>发货地址</th>
          <td><span id="spanArea"><?php echo ($orderinfo['area']); ?></span> <span id="spanAddress"><?php echo ($orderinfo['address']); ?></span></td>
        </tr>
        <tr>
          <th>邮政编码</th>
          <td><span id="spanPostCode"><?php echo ($orderinfo['post_code']); ?></span></td>
        </tr>
        <tr>
          <th>手机</th>
          <td><span id="spanMobile"><?php echo ($orderinfo['mobile']); ?></span></td>
        </tr>
        <tr>
          <th>电话</th>
          <td><span id="spanTelphone"><?php echo ($orderinfo['telphone']); ?></span></td>
        </tr>
        <tr>
          <th>邮箱</th>
          <td><span id="spanEmail"><?php echo ($orderinfo['email']); ?></span></td>
        </tr>
        </table>
      </div>
    </dd>
  </dl>
  <dl id="dlUserInfo">
    <dt>会员信息</dt>
    <dd>
      <div class="table-container">
        <table border="0" cellspacing="0" cellpadding="0" class="border-table" width="100%">
        <tr>
          <th width="20%">会员账户</th>
          <td><span id="lbUserName"><?php echo ($userinfo['mobile']); ?></span></td>
        </tr>
        <tr>
          <th>会员组别</th>
          <td><span id="lbUserGroup"><?php echo ($groupinfo['title']); ?></span></td>
        </tr>
        <tr>
          <th>购物折扣</th>
          <td><span id="lbUserDiscount"><?php echo ($groupinfo['discount']); ?> %</span></td>
        </tr>
        <tr>
          <th>账户余额</th>
          <td><span id="lbUserAmount"><?php if($userinfo['amount'] == ''): ?>0<?php else: echo ($userinfo['amount']); endif; ?></span> 元</td>
        </tr>
        <tr>
          <th>账户积分</th>
          <td><span id="lbUserPoint"><?php if($userinfo['point'] == ''): ?>0<?php else: echo ($userinfo['point']); endif; ?></span> 分</td>
        </tr>
        </table>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>支付配送</dt>
    <dd>
      <div class="table-container">
        <table border="0" cellspacing="0" cellpadding="0" class="border-table" width="100%">
        <tr>
          <th width="20%">支付方式</th>
          <td><?php echo ($payinfo['title']); ?></td>
        </tr>
        <tr>
          <th>配送方式</th>
          <td><?php echo ($expressinfo['title']); ?></td>
        </tr>
        <tr>
          <th>快递编号</th>
          <td id="spanExpressNo"><?php echo ($orderinfo['express_no']); ?></td>
        </tr>
        <tr>
          <th>是否开具发票</th>
          <td>
          	<?php if($orderinfo['is_invoice'] == '0'): ?>否
          	<?php else: ?>
          	是<?php endif; ?>
          </td>
        </tr>
        
        <tr>
          <th>用户留言</th>
          <td><?php echo ($orderinfo['message']); ?></td>
        </tr>
        <tr>
          <th valign="top">订单备注</th>
          <td>
            <div class="position">
              <div id="divRemark"><?php echo ($orderinfo['remark']); ?></div>
              <input name="btnEditRemark" type="button" id="btnEditRemark" class="ibtn" value="修改" />
            </div>
          </td>
        </tr>
        
        </table>
      </div>
    </dd>
  </dl>
  <dl>
    <dt>订单统计</dt>
    <dd>
      <div class="table-container">
        <table border="0" cellspacing="0" cellpadding="0" class="border-table" width="100%">
        <tr>
          <th width="20%">商品总金额</th>
          <td>
            <div class="position">
              <span id="spanRealAmountValue"><?php echo ($orderinfo['real_amount']); ?></span> 元
              <?php if($orderinfo['status'] <= '1'): ?><input name="btnEditRealAmount" type="button" id="btnEditRealAmount" class="ibtn" value="调价" /><?php endif; ?>
            </div>
          </td>
        </tr>
        <tr>
          <th>配送费用</th>
          <td>
            <div class="position">
              <span id="spanExpressFeeValue"><?php if($orderinfo['express_fee'] == ''): ?>0<?php else: echo ($orderinfo['express_fee']); endif; ?></span> 元
              <?php if($orderinfo['status'] <= '1'): ?><input name="btnEditExpressFee" type="button" id="btnEditExpressFee" class="ibtn" value="调价" /><?php endif; ?>
            </div>
          </td>
        </tr>
        <tr>
          <th>支付手续费</th>
          <td>
            <div class="position">
              <span id="spanPaymentFeeValue"><?php if($orderinfo['payment_fee'] == ''): ?>0<?php else: echo ($orderinfo['payment_fee']); endif; ?></span> 元
              <?php if($orderinfo['status'] <= '1'): ?><input name="btnEditPaymentFee" type="button" id="btnEditPaymentFee" class="ibtn" value="调价" /><?php endif; ?>
            </div>
          </td>
        </tr>
        <tr>
          <th>发票税金</th>
          <td>
            <div class="position">
              <span id="spanInvoiceTaxesValue"><?php if($orderinfo['invoice_taxes'] == ''): ?>0<?php else: echo ($orderinfo['invoice_taxes']); endif; ?></span> 元
              <?php if($orderinfo['status'] <= '1'): ?><input name="btnEditInvoiceTaxes" type="button" id="btnEditInvoiceTaxes" class="ibtn" value="调价" /><?php endif; ?>
            </div>
          </td>
        </tr>
        <tr>
          <th>积分总计<?php echo ($orderinfo['status']); ?></th>
          <td>
            <div class="position">
              <?php echo ($orderinfo['point']); ?> 分
            </div>
          </td>
        </tr>
        <tr>
          <th>订单总金额</th>
          <td><?php echo ($orderinfo['order_amount']); ?> 元</td>
        </tr>
        </table>
      </div>
    </dd>
  </dl>
</div>
<!--/内容-->


<!--工具栏-->
<div class="page-footer">
  <div class="btn-wrap">
  	<?php if($orderinfo['status'] == '1'): ?><input name="btnPayment" type="button" id="btnPayment" value="确认付款" class="btn" />
	    <input name="btnInvalid" type="button" id="btnInvalid" value="作废订单" class="btn violet" />
	    <input name="btnCancel" type="button" id="btnCancel" value="取消订单" class="btn green" />
	    <!-- <input id="btnPrint" type="button" value="打印订单" class="btn violet" /> -->
  	<?php elseif($orderinfo['status'] == '2'): ?>
	    <input name="btnConfirm" type="button" id="btnConfirm" value="确认订单" class="btn" />
	    <input name="btnInvalid" type="button" id="btnInvalid" value="作废订单" class="btn violet" />
	    <input name="btnCancel" type="button" id="btnCancel" value="取消订单" class="btn green" />
	    <!-- <input id="btnPrint" type="button" value="打印订单" class="btn violet" /> -->
  	<?php elseif($orderinfo['status'] == '3'): ?>
	    <input name="btnExpress" type="button" id="btnExpress" value="确认发货" class="btn" />
	    <input name="btnInvalid" type="button" id="btnInvalid" value="作废订单" class="btn violet" />
	    <input name="btnCancel" type="button" id="btnCancel" value="取消订单" class="btn green" />
	    <!-- <input id="btnPrint" type="button" value="打印订单" class="btn violet" /> -->
  	<?php elseif($orderinfo['status'] == '4'): ?>
	    <input name="btnComplete" type="button" id="btnComplete" value="完成订单" class="btn" />
	    <input name="btnInvalid" type="button" id="btnInvalid" value="作废订单" class="btn violet" />
	    <input name="btnCancel" type="button" id="btnCancel" value="取消订单" class="btn green" />
	    <!-- <input id="btnPrint" type="button" value="打印订单" class="btn violet" /> -->
	<?php else: ?>
	    <!-- <input id="btnPrint" type="button" value="打印订单" class="btn violet" /> --><?php endif; ?>
    
    <input id="btnReturn" type="button" value="返回上一页" class="btn yellow" onclick="javascript:history.back(-1);" />
  </div>
</div>
<!--/工具栏-->

</form>
</body>
</html>