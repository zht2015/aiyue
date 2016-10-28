<?php if (!defined('THINK_PATH')) exit();?><div class="top-0"><a href="#"><img src="/Public/Home/images/ne-top0.jpg"/></a></div>
<!--个人中心-个人首页开始-->
<div class="main">
    <div class="personalenter">
        <!--加载菜单-->
        
        <div class="person-right">
            <div class="person-right-nav"><h2>个人中心</h2></div>

            <div class="person-ziliao">
                <div class="person-toux">
                     <!--<?php if($user['avatar'] != ''): ?>-->
                        <img src="<?php echo ($user['avatar']); ?>"/>
                    <!--<?php else: ?>-->
                        <img src="/Public/Home/images/upload/toux.jpg"/>
                    <!--<?php endif; ?>-->
                </div>
                <div class="person-ziliao-cen">
                    <p>会员名：<?php echo ($user['mobile']); ?><a href="<?php echo U('Home/Users/userInfo');?>">编辑个人资料>></a></p>
                    <p>账户积分：<?php echo ($user['point']); ?></p>
                </div>
            </div>
            <div class="person-centenr">
                <div class="person-centenr-nav">
                    <h2>近期订单</h2><a href="<?php echo U('Orders/index');?>">查看所有订单</a>
                </div>

                <div class="person-centenr-list">
                    <div class="p-l-bt">
                        <p class="w25">商品详情</p>
                        <p class="w15">订单编号 </p>
                        <p class="w17">下单日期 </p>
                        <p class="w11"> 收货人</p>
                        <p class="w14">总金额 </p>
                        <p class="w18">状态</p>
                    </div>
                    <ul>
                        <!--<?php if(is_array($latelyOrder)): foreach($latelyOrder as $key=>$v): ?>-->
                        <li>
                            <p class="w25">
                              <a href="#">
                                  <img src="<?php echo ($v['orderGoods']['img_url']); ?>" width="48px" height="48px"/>
                              </a>
                              <a class="p-c-list" href="<?php echo U('Goods/goodDetails',array('id'=>$v['orderGoods']['id']));?>">
                                    <?php echo ($v['orderGoods']['goods_title']); ?> 
                               </a>
                            </p>
                            <p class="w15"><?php echo ($v['orderno']); ?></p>
                            <p class="w17"><?php echo ($v['createtime']); ?></p>
                            <p class="w11"><?php echo ($v['consignee']); ?></p>
                            <p class="w14"><?php echo ($v['realitymoney']); ?></p>
                            <p class="w18">
                                <?php switch($v['orderstatus']): case "0": ?>已取消<?php break;?>
                                        <?php case "1": ?>待支付<?php break;?>
                                        <?php case "2": ?>待发货<?php break;?>
                                        <?php case "3": ?>待收货<?php break;?>
                                        <?php case "4": ?>待评论<?php break;?>
                                        <?php case "5": ?>退款中<?php break;?>
                                        <?php case "6": ?>退款中<?php break;?>
                                        <?php case "7": ?>退款中<?php break;?>
                                        <?php case "8": ?>退款中<?php break;?>
                                        <?php case "9": ?>退款中<?php break;?>
                                        <?php case "10": ?>退款中<?php break;?>
                                        <?php case "11": ?>已退款<?php break;?>
                                        <?php case "14": ?>已完成<?php break;?>
                                        <?php case "15": ?>退款中<?php break; endswitch;?>
                            </p>
                        </li>
                        <!--<?php endforeach; endif; ?>-->
                    </ul>
                </div>
            </div>

            <div class="person-centenr">
                <div class="person-centenr-nav">
                    <h2>近期收藏</h2><a href="<?php echo U('Collect/index');?>">查看所有收藏</a>
                </div>

                <div class="person-centenr-list">
                    <div class="p-l-bt">
                        <p class="w25">商品详情</p>
                        <p class="w17">商品型号</p>
                        <p class="w15">商品金额</p>
                        <p class="w11">库存</p>
                        <p class="w20">收藏时间</p>
                    </div>
                    <ul>
                        <!--<?php if(is_array($latelyCollect)): foreach($latelyCollect as $key=>$v): ?>-->
                        <li>
                            <p class="w25">
                              <a href="#">
                                <img src="<?php echo ($v['goodsInfo']['img_url']); ?>" width="48px" height="48px"/>
                              </a>
                              <a class="p-c-list" href="<?php echo U('Goods/goodDetails',array('id'=>$v['goodsInfo']['id']));?>">
                                <?php echo ($v['goodsInfo']['title']); ?>
                              </a>
                            </p>
                            <p class="w17">型号：DT-1301</p>
                            <p class="w15">￥<?php echo ($v['goodsInfo']['sell_price']); ?></p>
                            <p class="w11"><?php echo ($v['goodsInfo']['stock_quantity']); ?>件</p>
                            <p class="w20"><?php echo ($v['add_time']); ?></p>
                        </li>
                   <!--<?php endforeach; endif; ?>-->
                    </ul>
                </div>
            </div>

            <!--商品推荐-->
            <div class="sptuij">
                <div class="sp-tj-nav">
                    商品推荐
                </div>
                <div class="sp-tj-cen">
                    <ul>
                    <!--<?php if(is_array($recommend)): foreach($recommend as $key=>$v): ?>-->
                        <li>
                            <div class="sp-tj-pic">
                                <a href="<?php echo U('Goods/goodDetails',array('id'=>$v['id']));?>">
                                    <img src="<?php echo ($v['img_url']); ?>"/>
                                </a>
                            </div>
                            <div class="sp-tj-bt">
                                <a href="<?php echo U('Goods/goodDetails',array('id'=>$v['id']));?>">
                                    <?php echo ($v['title']); ?>
                                </a>
                            </div>
                            <div class="sp-tj-jgkc">
                                <span>￥：<?php echo ($v['sell_price']); ?></span>
                                <font>库存：<?php echo ($v['stock_quantity']); ?>件</font>
                            </div>
                            <div class="sp-tj-gwc">
                                <a class="gwc" href="javascript:void(0);" a_id="<?php echo ($v['id']); ?>" stock_quantity= "<?php echo ($v['stock_quantity']); ?>">加入购物车</a>
                            </div>
                        </li>
                    <!--<?php endforeach; endif; ?>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>