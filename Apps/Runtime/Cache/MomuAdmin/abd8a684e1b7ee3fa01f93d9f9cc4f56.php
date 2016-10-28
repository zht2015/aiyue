<?php if (!defined('THINK_PATH')) exit();?><link href="/Public/Home/style/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/layer/layer.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/layer/extend/layer.ext.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Home/js/bootstrap.min.js"></script>
<div id="checks9">
    <div style="width:100%;padding:10px 20px 0;">
        <div style="width:100%;height:30px;color:#333333;background:#E8E8E8;font-size:18px;line-height:30px;padding-left:10px;"><b>日志信息</b></div>
        <table style=" margin-top:10px;" border="0" width="100%">
            <!--<?php if($rs['userorderlog'] == ''): ?>-->
            <tr align="left">
                <td> 暂无日志信息</td>
            </tr>
            <!--<?php else: ?>-->
            <!--<?php if(is_array($rs['userorderlog'])): foreach($rs['userorderlog'] as $key=>$v): ?>-->
            <tr>
                <td style="width:25%;text-align:center;height:40px;line-height:40px;"><?php echo ($v['addtime']); ?></td>
                <td ><?php echo ($v['content']); ?></td>
            </tr>
            <!--<?php endforeach; endif; ?>-->
            <!--<?php endif; ?>-->
        </table>

        <div style="width:100%;height:30px;color:#333333;background:#E8E8E8;font-size:18px;line-height:30px;padding-left:10px;"><b>用户信息</b></div>
        <table style=" margin-top:10px;" border="0" width="100%">
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">用户名：</td>
                <td><?php if($userInfo['user_name'] != ''): echo ($userInfo['user_name']); else: ?><span style="color:red;">当前用户还未设置用户名</span><?php endif; ?></td>
            </tr>
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">手机号码：</td>
                <td><?php echo ($userInfo['mobile']); ?></td>
            </tr>
        </table>


        <!--<?php if($rs['return_info'] != ''): ?>-->
        <div style="width:100%;height:30px;color:#333333;background: #E8E8E8;font-size:18px;line-height:30px;padding-left:10px;"><b>退款详情</b></div>
        <table style=" margin-top:10px;" border="0" width="100%">
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">退款说明：</td>
                <td> <?php echo ($rs['return_info']); ?></td>
            </tr>
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">退款原因：</td>
                <td><?php echo ($rs['return_reason']); ?></td>
            </tr>
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">退款凭证：</td>
                <td>
                    <!--<?php if(is_array($rs['refundImg'])): foreach($rs['refundImg'] as $key=>$v): ?>-->
                    <img layer-pid="<?php echo ($key); ?>" layer-src="<?php echo str_replace('thumb_', '', $v);?>" src="<?php echo ($v); ?>" width="80px" height="90px" style="padding:10px 10px;cursor: pointer;">
                    <!--<?php endforeach; endif; ?>-->
                </td>
            </tr>
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">申请时间：</td>
                <td><?php echo ($rs['refundtime']); ?></td>
            </tr>
            <!--<?php if($rs['orderStatus'] == '10'): ?>-->
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">退款状态：</td>
                <td>已拒绝：<?php echo ($rs['refusereason']); ?></td>
            </tr>
            <!--<?php else: ?>-->
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">退款状态：</td>
                <td>已同意</td>
            </tr>
            <!--<?php endif; ?>-->
        </table>
        <!--<?php endif; ?>-->

        <div style="width:100%;height:30px;color:#333333;background: #E8E8E8;font-size:18px;line-height:30px;padding-left:10px;"><b>发票信息</b></div>
        <table style=" margin-top:10px;" border="0" width="100%">
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">所属类别：</td>
                <td><?php echo ($rs['invoiceval']); ?></td>
            </tr>
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">发票抬头：</td>
                <td><?php echo ($rs['invoicename']); ?></td>
            </tr>
        </table>


        <div style="width:100%;height:30px;color:#333333;background: #E8E8E8;font-size:18px;line-height:30px;padding-left:10px;"><b>订单信息</b></div>
        <table style=" margin-top:10px;" border="0" width="100%">
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">订单编码：</td>
                <td> <?php echo ($rs["orderno"]); ?></td>
            </tr>
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">支付方式：</td>
                <td>
                    <!--<?php if($rs['ispay'] != '0'): ?>-->
                    <!--<?php if($rs['paytype'] == '0'): ?>-->
                    微信支付
                    <!--<?php elseif($rs['paytype'] == '1'): ?>-->
                    支付宝支付
                    <!--<?php else: ?>-->
                    免单(积分抵扣)
                    <!--<?php endif; ?>-->
                    <!--<?php else: ?>-->
                    未支付
                    <!--<?php endif; ?>-->
                </td>
            </tr>
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">配送方式：</td>
                <td> <?php echo (showCompanyName($rs['deliverycompanyid'])); ?>&emsp;<?php if($rs['deliveryno'] != ''): echo ($rs['deliveryno']); endif; ?></td>
            </tr>
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">买家留言：</td>
                <td><?php echo ($rs['buyermessage']); ?></td>
            </tr>
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">下单时间：</td>
                <td><?php echo ($rs['createtime']); ?></td>
            </tr>
        </table>


        <div style="width:100%;height:30px;color:#333333;background: #E8E8E8;font-size:18px;line-height:30px;padding-left:10px;"><b>收货人信息</b></div>
        <table style=" margin-top:10px;" border="0" width="100%">
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">收货人姓名：</td>
                <td><?php echo ($rs['username']); ?></td>
            </tr>
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">收货人地址：</td>
                <td><?php echo ($rs['area']); ?> <?php echo ($rs['useraddress']); ?></td>
            </tr>
            <tr>
                <td style="width:20%;text-align:right;height:40px;line-height:40px;">手机号码：</td>
                <td> <?php echo ($rs['userphone']); ?></td>
            </tr>
        </table>


        <div style="width:100%;height:30px;color:#333333;background: #E8E8E8;font-size:18px;line-height:30px;padding-left:10px;"><b>商品信息</b></div>
        <table style=" margin-top:10px;text-align:center;" border="0" width="100%">
            <tr height="40">
                <th width="*" colspan="2"><center>商品名称</center></th>
                <th width="25%"><center>价格</center></th>
                <th width="25%"><center>商品数量</center></th>
            </tr>
            <!--<?php if(is_array($rs['ordergoods'])): foreach($rs['ordergoods'] as $key=>$v): ?>-->
            <tr>
                <td colspan="2"><img style="width:60px;height:60px;" src="<?php echo ($v['img_url']); ?>"/><span style="font-size:13px;padding-left:6px;"><?php echo ($v['goods_title']); ?></span></td>
                <td><?php echo ($v['goods_price']); ?></td>
                <td>x <?php echo ($v['quantity']); ?></td>
            </tr>
            <!--<?php endforeach; endif; ?>-->
        </table>
        <div style="float:right;margin:10px 20px 50px 0;">
            <div><h4>订单总金额：<span style="color:red;">￥ <?php echo ($rs['totalmoney']); ?> 元</span></h4></div>
            <div><h4>运费：<span style="color:red;">￥ <?php echo ($rs['freight']); ?> 元</span></h4></div>
            <div><h4>使用积分：<span style="color:red;"><?php echo ($rs['employscore']); ?> 积分</span></h4></div>
            <div><h4>积分抵扣：<span style="color:red;"><?php echo ($rs['scorededuction']); ?> 元</span></h4></div>
            <div><h4>优惠码抵扣：<span style="color:red;"><?php echo ($rs['yhmdeduction']); ?> 元</span></h4></div>
            <div><h4>应付金额：<span style="color:red;"><?php echo ($rs['realitymoney']); ?> 元</span></h4></div>
            <!--<?php if($rs['orderStatus'] != 0): ?>-->
            <div>
                <h3>实付金额：
                <span style="color:red;">
                    <!--<?php if($rs['orderStatus'] == 1): ?>-->
                     ￥ 0.00 元
                    <!--<?php else: ?>-->
                     ￥ <?php echo ($rs['realityMoney']); ?> 元
                    <!--<?php endif; ?>-->
                </span>
                </h3>
            </div>
            <!--<?php endif; ?>-->
        </div>



    </div>
</div>
<script type="text/javascript">
  //相册js
  layer.ready(function(){ //为了layer.ext.js加载完毕再执行
      layer.photos({
      photos: '#layer-photos-demo'
      });
  });
</script>