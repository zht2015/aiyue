<?php
namespace MomuAdmin\Action;
class OrderAction extends CommonAction {
   
    /**
     * @time 2016/06/28
     * @function 获取基本数据列表
     */
    /* public function order_list() {
       $pagenum = isset($_REQUEST['txtPageNum'])?$_REQUEST['txtPageNum']:C('PAGE_SIZE');//获取分页的每页数据条数
       $txtKeywords = isset($_REQUEST['txtKeywords'])?$_REQUEST['txtKeywords']:"";
       $ddlStatus = isset($_REQUEST['ddlStatus'])?$_REQUEST['ddlStatus']:"";
       
       if(IS_POST){
           $evename = $_REQUEST['__EVENTTARGET'];
           $evenmess = $_REQUEST['__EVENTARGUMENT'];
           if($evename == "btnDelete"){
               $delstr = "";
               $chkid = $_REQUEST['chkId'];
               $allids = $_REQUEST['hidId'];
               foreach ($chkid as $k=>$v){
                   $delstr .= $allids[$k].",";
               }
               $delstr = substr($delstr,0,-1);
               $res = D("Orders")->changeOrderData(array("status"=>"0"),array("id"=>array("in",$delstr)));
               $this->redirect("Order/order_list");
           }
       }
       
       if($txtKeywords != ""){
           $where['o.order_no|o.user_name'] = array("like","%".$txtKeywords."%");
       }
       if($ddlStatus != ""){
           $where['o.status'] = $ddlStatus;
       }else{
           $where['o.status'] = array("neq","0");
       }
       
        $count = D("Orders")->getPersonalOrders($where,"",1);// 查询满足要求的总记录数
        $Page = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        
        $list = D("Orders")->getPersonalOrders($where,$Page,"");// 获取分页数据
        //var_dump($list);
        
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('totalcount',$count);//总条数 
        $this->assign("pagenum",$pagenum);
        $this->display(); // 输出模板
    } */
    
    public function order_list() {
        /**获取寄货地址**/
        $configpath = "./oconfig/orderconfig.json";
        if(file_exists($configpath)){//已经有了，则获取相应的数据
            $d = file_get_contents($configpath);
            $data = json_decode($d,true);
            
            $shipmentAddress = array("name"=>$data['recusername'],"phone"=>$data['recphone'],"address"=>$data['recaddress']);
            
        }else{
            die("获取不到订单相关配置文件，请先去订单参数进行相关配置");
        }
        
        $this->assign('shipmentAddress',$shipmentAddress);
        /**获取取消退款原因**/
        $message = M('message')->select();
        $this->assign('message',$message);

        $countOrderStatus=$this->countOrderStatus();
        $this->assign("countOrder",$countOrderStatus);
    
        if(IS_POST){
            $rptList   = array();
            $rptListh  = array();
            $rptList   = $_POST['rptList$ctl$chkId'];
            $rptListh  = $_POST['rptList$ctl$hidId'];
            if("btnDelete" == $_POST['__EVENTTARGET']){
                $delArray  = array();
                $delMap    = array();
                foreach ($rptList as $k=>$v){
                    $delArray[] = $rptListh[$k];
                }
                $delMap['orderId'] = array('in',$delArray);
                $rs = M('orders')->where($delMap)->save(array('isShow'=>0));
                if ( false !== $rs ){
                    $this->success('删除成功！',U('Order/order_list'),1);
                    exit;
                }else{
                    $this->error('删除失败！');
                    exit;
                }
            }
            $sql = "select o.*,u.user_name,u.mobile from m_orders o,m_users u where o.userId=u.id";
            if(!empty($_POST['txtKeywords'])) {
                $sql .= " and o.orderNo like '%".$_POST['txtKeywords']."%'";
            }
            if($_POST['orderStatus']!="999" && $_POST['orderStatus']!="Array" && $_POST['orderStatus'] !="16"){
                $sql.= " and o.orderStatus=".$_POST['orderStatus'];
            }
    
            if($_POST['orderStatus']=="16"){
                $sql.= " and o.isShow=0";
            }
            if($_POST['cancelCause']!="999"){
                $sql .=" and o.cancelCause ='".$_POST['cancelCause']."'";
            }
            if($_POST['returnReason']!="999"){
                $sql .=" and o.return_reason ='".$_POST['returnReason']."'";
            }
            if($_POST['userName']!=""){
                $sql .= " and u.user_name like '%".$_POST['userName']."%'";
            }
            if($_POST['mobile']!=""){
                $sql .= " and u.mobile like '%".$_POST['mobile']."%'";
            }
    
            $getOrderInfo=M()->query($sql);
            $count     = count($getOrderInfo);
            
            $page = new \Think\Page($count,15);
            
            $page_str  = $page->show();
    
            $sql2 = "select o.*,u.user_name,u.mobile from m_orders o,m_users u where o.userId=u.id ";
            if(!empty($_POST['txtKeywords'])) {
                $sql2 .= " and o.orderNo like '%".$_POST['txtKeywords']."%'";
            }
    
            if($_POST['orderStatus']!="999" && $_POST['orderStatus']!="Array" && $_POST['orderStatus'] !="16"){
                $sql2 .= " and o.orderStatus=".$_POST['orderStatus'];
            }
    
            if($_POST['orderStatus']=="16"){
                $sql2 .= " and o.isShow=0";
            }
    
            if($_POST['cancelCause']!="999"){
                $sql2 .=" and o.cancelCause ='".$_POST['cancelCause']."'";
            }
            if($_POST['returnReason']!="999"){
                $sql2 .=" and o.return_reason ='".$_POST['returnReason']."'";
            }
    
            if($_POST['userName']!=""){
                $sql2 .= " and u.user_name like '%".$_POST['userName']."%'";
            }
            if($_POST['mobile']!=""){
                $sql2 .= " and u.mobile like '%".$_POST['mobile']."%'";
            }
            $sql2 .=" order by o.createTime desc limit ". $page->firstRow.",".$page->listRows;
            
           
            $rs=M()->query($sql2);
            $orderGoodsModel = M('order_goods');
            for($i=0;$i<count($rs);$i++){
                $rs[$i]['ordergoods'] = $orderGoodsModel->where(array('order_id'=>$rs[$i]['orderId']))->select();
            }
        }else{
            $count    = M('orders')->count();
            $page = new \Think\Page($count,15);
            $page_str = $page->show();
            $rs = D("Orders")->getTabList('','createTime desc','',$page);
        }
        if(count($rs)>0){//有订单数据
            foreach($rs as $key=>$val){
                $rs[$key]['ordergoods'] = D('OrderGoods')->getTabList('','id desc',array('order_id'=>$val['orderid']));
                $rs[$key]['userorderlog'] = D('Userorderlog')->getTabList('','id desc',array('orderId'=>$val['orderid']));
                $uinfo = D("Users")->getTabList('','id desc',array('id'=>$val['userid']),'','1');
                $rs[$key]['user_name'] = $uinfo['user_name'];
                $rs[$key]['mobile'] = $uinfo['mobile'];
            }
            
        } 
        
        //统计订单商品总数
        foreach ($rs as $key => $value) {
            foreach ($value['ordergoods'] as $k => $v) {
                $rs[$key]['countGoods'] += $v['quantity'];
            }
        }
        //echo "<pre/>";var_dump($rs);die();
    
        /**获取地区**/
        $Area = new AreaAction();
        $getProvince = $Area->province();
        //dump($getProvince);
        $this->assign("area",$getProvince);
        
        $this->assign('express',M('express')->where(array('is_lock'=>0))->select());
        $this->assign('status',$s);//post查询条件
        $this->assign('rs', $rs);
        $this->assign('count', $count);
        $this->assign('page_str',$page_str);
    
        $this->display();
    }
    
    public function order_message_list(){
        $p = isset($_GET['p'])?$_GET['p']:0;
        $result = isset($_REQUEST['flag'])?$_REQUEST['flag']:"";//操作的结果
        $ml = M('message');
        if(IS_POST){
            $rptList = array();
            $rptListh = array();
            $rptListSortId =array();
            $rptList = $_POST['rptList$ctl$chkId'];
            $rptListh = $_POST['rptList$ctl$hidId'];
            $rptListSortId = $_POST['rptList$ctl$txtSortId'];
            if("btnDelete" == $_POST['__EVENTTARGET']){
                $delArray = array();
                $delMap = array();
                foreach ($rptList as $k=>$v){
                    $delArray[] = $rptListh[$k];
                }
                $delMap['id'] = array('in',$delArray);
                $ml->where($delMap)->delete();
                $this->redirect("Order/order_message_list",array("flag"=>"2"));
            }
        }else{
            
            $data = array();
            $pagenum = isset($_REQUEST['txtPageNum'])?$_REQUEST['txtPageNum']:C('PAGE_SIZE');//获取分页的每页数据条数
            $count = D("Message")->getTabCount();// 查询满足要求的总记录数
            $Page = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数
            $show = $Page->show();// 分页显示输出
            
            $list = D("Message")->getTabList('','id asc','',$Page);// 获取分页数据
            //echo $show;var_dump($list);die();
            $this->assign("result",$result);
            $this->assign('page',$show);
            $this->assign('pageData', $list);
            $this->assign('totalcount',$count);//总条数
            $this->assign("pagenum",$pagenum);
            $this->display();
        }
    }
    
    public function order_message_edit(){
        $id = $_REQUEST['id'];
        $m = M("message");
        $data= array();
        $data['category']=$_POST['ddlGroupId'];
        $data['is_lock']=$_POST['cbIsLock']?$_POST['cbIsLock']:0;
        $data['content']=$_POST['txtContent'];
        if($id!=""){
            if($id!="" && !$_POST){
                $query=$m->where(array("id"=>$_GET['id']))->find();
                $this->assign("info",$query);
            }
            if($_POST && $id!=""){
                $m->where(array("id"=>$id))->save($data);
                $this->redirect("Order/order_message_list",array("flag"=>"3"));
                exit;
            }
        }elseif($id=="" && $_POST){
            $m->add($data);
            $this->redirect("Order/order_message_list",array("flag"=>"1"));
            exit;
        }
        $this->display();
    }
    
    /*
     查看订单详情
     */
    public function order_detailed(){
    
        $orderId = $_GET['o_id'];
        $rs = D("Orders")->getTabList('','createTime desc',array(),'','1');
        
        if(count($rs)>0){//有订单数据
            $rs['ordergoods'] = D('OrderGoods')->getTabList('','id desc',array('order_id'=>$rs['orderid']));
            $rs['userorderlog'] = D('Userorderlog')->getTabList('','id asc',array('orderId'=>$rs['orderid']));
            $uinfo = D("Users")->getTabList('','id desc',array('id'=>$rs['userid']),'','1');
            $rs['user_name'] = $uinfo['user_name'];
            $rs['mobile'] = $uinfo['mobile'];
        
        }
        
        //var_dump($rs);die();
        
        if($rs['spec_text']){
            foreach (explode(',', $rs['spec_text']) as $k => $v) {
                $rs['refundImg'][$k] = $v;
            }
        }
        $userInfo=M('users')->where(array('id'=>$rs['userid']))->find();
        $this->assign('userInfo',$userInfo);
        $this->assign('rs', $rs);
        $this->display();
    }
    
    /**修改收货地址**/
    public function saveAddress(){
        /**获取地区**/
        $Area = new AreaAction();
        $getProvince = $Area->province();
        $this->assign("area",$getProvince);
        $id = $_GET['id'];
        $m = M("orders");
        $info=$m->where(array("orderid"=>$id))->find();
        $this->assign("info",$info);
        $this->display();
    }
    
    /*
     修改订单送货地址
     */
    public function chage_order_address(){
        $orderId          = $_POST['orderId'];
        $d['area']        = $_POST['area'];
        $d['area1']       = $_POST['area1'];
        $d['area2']       = $_POST['area2'];
        $d['area3']       = $_POST['area3'];
        $d['userAddress'] = $_POST['address'];
        $d['userName']    = $_POST['userName'];
        $d['userPhone']   = $_POST['userPhone'];
    
        $data = M('orders')->where(array('orderId'=>$orderId))->save($d);
        if($data){
            $rs['status'] = 1;
            $this->ajaxReturn($rs);
        }
    }
    
    /*
     订单状态修改
     1后台同意买家退款申请操作,直接修改状态值
     2后台拒绝买家退款申请操作,需要填写拒绝原因
     3商家确认收货
     4商家点击同意退款
     5取消订单
     6点击发货
     7未发商品，申请退款操作
     8查看用户退款寄货信息
     12查看订单退款原因
     */
    public function chage_status(){
        $id   = $_POST['o_id'];
        $type = $_POST['type'];
        $orderModel = M('orders');
        /**检测订单状态**/
        $checkStatus=$orderModel->where(array('orderId'=>$id))->field('orderStatus')->find();
        switch ($type){
            case '1':
                if($checkStatus['orderstatus']==5){
                    $d['orderStatus'] = 6;
                    $d['shipmentAddress'] = $_POST['shipmentAddress'];
                    $d['shipmentName'] = $_POST['shipmentName'];
                    $d['shipmentPhone'] = $_POST['shipmentPhone'];
                    $this->orderLog($id,'商家已同意用户退款申请请求');
                    $orderModel->where(array('orderId'=>$id))->save($d) ? success('操作成功',U('Order/order_list')) : fail('操作失败，未知错误');
                }
                break;
            case '2':
                if($checkStatus['orderstatus']==5){
                    $d['orderStatus']  = 10;
                    $this->orderLog($id,'商家拒绝退款申请');
                    $d['refuseReason'] = $_POST['refuseReason'];
                    $orderModel->where(array('orderId'=>$id))->save($d) ? success('操作成功',U('Order/order_list')) : fail('操作失败，未知错误');
                }
                break;
            case '3':
                if($checkStatus['orderstatus']==7){
                    $d['orderStatus']  = 8;
                    $this->orderLog($id,'商家已确认收货');
                    $orderModel->where(array('orderId'=>$id))->save($d) ? success('操作成功',U('Order/order_list')) : fail('操作失败，未知错误');
                }
                break;
            case '4':
                if($checkStatus['orderstatus']==8 || $checkStatus['orderstatus']==15){
                    $d['orderStatus']  = 9;
                    $this->orderLog($id,'商家同意退款');
                    $orderModel->where(array('orderId'=>$id))->save($d) ? success('操作成功',U('Order/order_list')) : fail('操作失败，未知错误');
                }
                break;
            case '5':
                if($checkStatus['orderstatus']==1){
                    $d['orderStatus']  = 0;
                    $this->orderLog($id,'商家已取消订单');
                    $this->refuseIntegral($id,'取消订单返还');
                    $orderModel->where(array('orderId'=>$id))->save($d) ? success('操作成功',U('Order/order_list')) : fail('操作失败，未知错误');
                }
                break;
            case '6':
                if($checkStatus['orderstatus']==2){
                    $d['orderStatus']       = 3;
                    $d['deliveryCompanyId'] = $_POST['delivery'];
                    $d['deliveryNo']        = $_POST['deliveryNo'];
                    $d['deliveryTime']      = date('Y-m-d H:i:s',time());
                    $this->orderLog($id,'商家发货');
                    $orderModel->where(array('orderId'=>$id))->save($d) ? success('操作成功',U('Order/order_list')) : fail('操作失败，未知错误');
                }
                break;
            case '7':
                if($checkStatus['orderstatus']==15){
                    $d['orderStatus']  = 2;
                    $d['refuseReason'] = $_POST['refuseReason'];
                    $this->orderLog($id,'商家拒绝退款，拒绝理由：'. $_POST['refuseReason']);
                    $this->refuseIntegral($id,'退款返还');
                    $orderModel->where(array('orderId'=>$id))->save($d) ? success('操作成功',U('Order/order_list')) : fail('操作失败，未知错误');
                }
                break;
            case '8':
                $rs = M('orders')->field('userDeliveryName,userDeliveryNo')->find($id);
                return_json($rs);
                break;
            case '9':
                if($checkStatus['orderstatus']==9){
                    $d['orderStatus']  = 11;
                    $d['refundQueryTime']  = date("Y-m-d H:i:s");
                    $this->orderLog($id,'商家已确定退款');
                    $this->refuseIntegral($id,'已确定同意退款');
                    /**返回库存**/
                    $getOrderGoods = M('order_goods')->where('order_id='.$id)->field('order_id,article_id,quantity')->select();
                    $articleModle = M('market_value');
                    for($i=0;$i<count($getOrderGoods);$i++){
                        $articleModle->where('id='.$getOrderGoods[$i]['article_id'])->setInc("repertory",$getOrderGoods[$i]['quantity']);
                    }
                    $rs=$orderModel->where(array('orderId'=>$id))->save($d);
                    //$this->push($id);分销消息推送，目前已取消
                    if($rs){
                        success('操作成功',U('Order/order_list'));
                    }else{
                        fail('操作失败，未知错误');
                    }
                }
                break;
        }
    }
    
    /*
     取消订单和退款成功返回积分
     */
    public function refuseIntegral($o_id,$type){
        $rs          = M('orders')->find($o_id);
        $employScore = $rs['employscore'];
        $uid         = $rs['userid'];
        $t = $this->user_pointer($rs,$o_id,$type);
        M('users')->where(array('id'=>$uid))->setInc('point',$employScore);
        M('users')->where(array('id'=>$uid))->setDec('expent_point',$employScore);
    }
    
    /*
     用户积分日志
     */
    public function user_pointer($rs,$o_id,$type){
        $d['userId']        = $rs['userid'];
        $d['orderId']       = $o_id;
        $d['user_name']     = $rs['username'];
        $d['scoreChange']   = '+'.$rs['employscore'];
        $d['remark']        = $type;
        $d['createTime']    = date('Y-m-d H:i:s',time());
        M("pointchangelog")->add($d);
    }
    
    /*
     订单有退货的情况下
     查看用户退货原因
     */
    public function refundReasonOrder(){
        $id = $_GET['id'];
    
        $rs = M('orders')->find($id);
        if($rs['spec_text']){
            foreach (explode(',', $rs['spec_text']) as $k => $v) {
                $rs['refundImg'][$k] = $v;
            }
        }
        //dump($rs);
        $this->assign('rs', $rs);
        $this->display();
    }
    
    /*
     操作订单日志
     */
    public function orderLog($orderId,$info){
        $userLog = M("userorderlog");
        $arr = array();
        $arr['userId']  = $_SESSION['userID'];
        $arr['orderId'] = $orderId;
        $arr['content'] = $info;
        $arr['addTime'] = date("Y-m-d H:i:s");
        $query=$userLog->add($arr);
    }
    
    /**特权处理订单状态**/
    public function PrivilegeOrderStatus(){
        /**获取管理员账户名**/
        $Administrator = $_SESSION['userName'];
        $type = $_REQUEST['type'];
        $orderId = $_REQUEST['orderId'];
        $m  =M('orders');
        $getOrderStatus=$m->where('orderId='.$orderId)->field('orderStatus')->find();
        /**获取订单状态**/
        switch ($getOrderStatus['orderstatus']){
            case "0":
                $getOrderStatus['orderStatus']="已取消";
                break;
            case '1':
                $getOrderStatus['orderStatus']="待支付";
                break;
            case '2':
                $getOrderStatus['orderStatus']="待发货";
                break;
            case '3':
                $getOrderStatus['orderStatus']="待收货";
                break;
            case '5':
                $getOrderStatus['orderStatus']="退款申请中(已收货)";
                break;
            case '6':
                $getOrderStatus['orderStatus']="商家同意退款申请";
                break;
            case '7':
                $getOrderStatus['orderStatus']="商家待收货";
                break;
            case '8':
                $getOrderStatus['orderStatus']="商家已收货";
                break;
            case '9':
                $getOrderStatus['orderStatus']="商家同意退款申请(退款中)";
                break;
            case '10':
                $getOrderStatus['orderStatus']="商家拒绝退款申请";
                break;
            case '11':
                $getOrderStatus['orderStatus']="商家已退款";
                break;
            case '14':
                $getOrderStatus['orderStatus']="交易完成";
                break;
            case '15':
                $getOrderStatus['orderStatus']="退款申请中(未发货)";
                break;
        }
        $re =  array('status'=>-1);
        $data = array();
        switch($type){  /**1-已删除 2-已取消 3-待支付 4-待发货 5-已完成 6-退款申请中**/
            case "1":
                $data['orderStatus']=0;
                $data['isShow']=0;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【已删除】");
                    $re['status']=1;
                }
                break;
            case "2":
                $data['orderStatus']=0;
                $data['isShow']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【已取消】");
                    $re['status']=1;
                }
                break;
            case "3":
                $data['orderStatus']=1;
                $data['isShow']=1;
                $data['isPay']=0;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【待支付】");
                    $re['status']=1;
                }
                break;
            case "4":
                $data['orderStatus']=2;
                $data['isShow']=1;
                $data['isPay']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【待发货】");
                    $re['status']=1;
                }
                break;
            case "5":
                $data['orderStatus']=14;
                $data['isShow']=1;
                $data['isPay']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【已完成】");
                    $re['status']=1;
                }
                break;
            case "6":
                $data['orderStatus']=5;
                $data['isShow']=1;
                $data['isPay']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【退款申请中(已收货)】");
                    $re['status']=1;
                }
                break;
            case "7":
                $data['orderStatus']=6;
                $data['isShow']=1;
                $data['isPay']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【商家同意退款申请】");
                    $re['status']=1;
                }
                break;
            case "8":
                $data['orderStatus']=7;
                $data['isShow']=1;
                $data['isPay']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【商家待收货】");
                    $re['status']=1;
                }
                break;
            case "9":
                $data['orderStatus']=8;
                $data['isShow']=1;
                $data['isPay']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【商家已收货】");
                    $re['status']=1;
                }
                break;
            case "10":
                $data['orderStatus']=9;
                $data['isShow']=1;
                $data['isPay']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【退款中】");
                    $re['status']=1;
                }
                break;
            case "11":
                $data['orderStatus']=10;
                $data['isShow']=1;
                $data['isPay']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【商家拒绝退款】");
                    $re['status']=1;
                }
                break;
            case "12":
                $data['orderStatus']=11;
                $data['isShow']=1;
                $data['isPay']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【已退款】");
                    $re['status']=1;
                }
                break;
            case "13":
                $data['orderStatus']=14;
                $data['isShow']=1;
                $data['isPay']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【已完成】");
                    $re['status']=1;
                }
                break;
            case "14":
                $data['orderStatus']=15;
                $data['isShow']=1;
                $data['isPay']=1;
                $rs=$m->where(array('orderId'=>$orderId))->save($data);
                if($rs!==false){
                    $this->orderLog($orderId,"该订单状态已被管理员【".$Administrator."】从【".$getOrderStatus['orderStatus']."】修改为【退款申请中(未发货)】");
                    $re['status']=1;
                }
                break;
        }
        $this->ajaxReturn($re);
    }
    
    
    
    public function countOrderStatus(){
        $m    = M("orders");
        $data = array();
        $data['999']=$m->count();
        $data['16']=$m->where("isShow=0")->count();//用户已删除
        $data['0']=$m->where("isShow=1 and orderStatus=0")->count();
        $data['1']=$m->where("isShow=1 and orderStatus=1")->count();
        $data['2']=$m->where("isShow=1 and orderStatus=2")->count();
        $data['3']=$m->where("isShow=1 and orderStatus=3")->count();
        $data['5']=$m->where("isShow=1 and orderStatus=5")->count();
        $data['6']=$m->where("isShow=1 and orderStatus=6")->count();
        $data['7']=$m->where("isShow=1 and orderStatus=7")->count();
        $data['8']=$m->where("isShow=1 and orderStatus=8")->count();
        $data['9']=$m->where("isShow=1 and orderStatus=9")->count();
        $data['10']=$m->where("isShow=1 and orderStatus=10")->count();
        $data['11']=$m->where("isShow=1 and orderStatus=11")->count();
        $data['14']=$m->where("isShow=1 and orderStatus=14")->count();
        $data['15']=$m->where("isShow=1 and orderStatus=15")->count();
        return $data;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /***
     * @time 2016/06/28
     * @function 订单配置
     */
    public function order_config(){
        $configpath = "./oconfig/orderconfig.json";
        
        if(IS_POST){
            $anonymous = $_REQUEST['anonymous']=="on"?1:0;
            $orderconfig = array(
                "anonymousBuy"=>$anonymous,  //匿名购买 0否  1是
                "invoiceType"=>$_REQUEST['taxtype'], //发票类型 1百分比 2固定金额
                "invoiceMoney"=>$_REQUEST['taxamount'],//发票税金费用
                 
                "orderEnsure"=>$_REQUEST['confirmmsg'],//订单确认通知 0、关闭通知 1、短信通知 2、邮件通知
                "ensureModel"=>$_REQUEST['confirmcallindex'],//订单确认模板调用别名
                 
                "orderExpress"=>$_REQUEST['expressmsg'],//订单发货通知 0、关闭通知 1、短信通知 2、邮件通知
                "expressModel"=>$_REQUEST['expresscallindex'],//订单发货模板调用别名
                 
                "orderComplete"=>$_REQUEST['completemsg'],//订单完成通知 0、关闭通知 1、短信通知 2、邮件通知
                "completeModel"=>$_REQUEST['completecallindex'],//订单完成模板调用别名
                
                "recusername"=>$_REQUEST['recusername'],//默认收货人
                "recphone"=>$_REQUEST['recphone'],//默认收货电话
                "recaddress"=>$_REQUEST['recaddress'],//默认收货地址
            );
            $res = file_put_contents($configpath, json_encode($orderconfig));
            if($res=="0"){
                die('oconfig目录没有写入配置文件的权限');
            }
            $this->assign("d",$orderconfig);
        }else{
            if(file_exists($configpath)){//已经有了，则获取相应的数据
                $d = file_get_contents($configpath);
                $data = json_decode($d,true);
                $this->assign("d",$data);
            }else{
                //初始化配置文件
               $orderconfig = array(
                   "anonymousBuy"=>"0",  //匿名购买 0否  1是
                   "invoiceType"=>"1", //发票类型 1百分比 2固定金额
                   "invoiceMoney"=>10,//发票税金费用
                   
                   "orderEnsure"=>"0",//订单确认通知 0、关闭通知 1、短信通知 2、邮件通知
                   "ensureModel"=>"order_confirm",//订单确认模板调用别名
                   
                   "orderExpress"=>"0",//订单发货通知 0、关闭通知 1、短信通知 2、邮件通知
                   "expressModel"=>"order_express",//订单发货模板调用别名
                   
                   "orderComplete"=>"0",//订单完成通知 0、关闭通知 1、短信通知 2、邮件通知
                   "completeModel"=>"order_complete",//订单完成模板调用别名
                   
                   "recusername"=>"jack",//默认收货人
                   "recphone"=>"13066971001",//默认收货电话
                   "recaddress"=>"广东深圳市南山区荔香公园",//默认收货地址
               ); 
               $res = file_put_contents($configpath, json_encode($orderconfig));
               if($res=="0"){
                   die('oconfig目录没有写入配置文件的权限');
               }
               $this->assign("d",$orderconfig);
            }
        }
        
        $this->display();
    }
    
    /***
     * @time 2016/06/28
     * @function 支付配置
     */
    public function payment_list(){
        $this->showSysTips();
        $where = "";
        $searchtxt = isset($_REQUEST['txtkeywords'])?$_REQUEST['txtkeywords']:"";
        if(IS_POST){
            $evename = $_REQUEST['__EVENTTARGET'];
            $evenmess = $_REQUEST['__EVENTARGUMENT'];
            if($evename == "lbtnSearch"){
                $searchtxt = $_REQUEST['txtKeywords'];
            }else if($evename == "btnDelete"){
                $delstr = "";
                $chkid = $_REQUEST['chkId'];
                $allids = $_REQUEST['hidId'];
                foreach ($chkid as $k=>$v){
                    $delstr .= $allids[$k].",";
                }
                $delstr = substr($delstr,0,-1);
                $res = D("Payment")->delDataByIds($delstr);
                $this->redirect("Order/payment_list",array("flag"=>"2"));
            }
        }
        if($searchtxt != ""){
            $where["title|sort_id"] = array("like","%".$searchtxt."%");
        }
        $d = D("Payment")->getTabList("","sort_id desc",$where);
        $this->assign("data",$d);
        $this->display();
    }
    
    /***
     * @time 2016/06/29
     * @function 支付方式配置编辑
     */
    public function payment_edit(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:0;
        if($eid == 0){$this->error('获取不到修改的模块数据！');die();}
        if(IS_POST){//提交过来的修改数据
            $res = D("Payment")->DataSave();
            if($res == "false"){$this->error('修改失败！');die();}
            $this->redirect("Order/payment_list",array("flag"=>"3"));
        }else{
            $d = D("Payment")->getTabList("","",array("id"=>$eid),"","1");
            $this->assign("d",$d);
        }
        $this->display();
    }
    /***
     * @time 2016/06/29
     * @function 支付方式新增
     */
    public function payment_add(){
        if(IS_POST){
            $res = D("Payment")->dataAdd();
            if($res == "false"){$this->error('新增失败了！');die();}
            $this->redirect("Order/payment_list",array("flag"=>"1"));die();
        }
        $this->display();
    }
    
    
    /***
     * @time 2016/06/28-29
     * @function 配送
     */
    public function express_list(){
        $this->showSysTips();
        $pagenum = isset($_REQUEST['txtPageNum'])?$_REQUEST['txtPageNum']:C('PAGE_SIZE');//获取分页的每页数据条数
        $where = "";
        $searchtxt = isset($_REQUEST['txtkeywords'])?$_REQUEST['txtkeywords']:"";
        if(IS_POST){
            $evename = $_REQUEST['__EVENTTARGET'];
            $evenmess = $_REQUEST['__EVENTARGUMENT'];
            if($evename == "btnDelete"){
                $delstr = "";
                $chkid = $_REQUEST['chkId'];
                $allids = $_REQUEST['hidId'];
                foreach ($chkid as $k=>$v){
                    $delstr .= $allids[$k].",";
                }
                $delstr = substr($delstr,0,-1);
                $res = D("Express")->delDataByIds($delstr);
                $this->redirect("Order/express_list",array("flag"=>"2"));
            }elseif($evename == "lbtnSearch"){
                $searchtxt = $_REQUEST['txtKeywords'];
            }else{//可扩展
                
            }
        }
        if($searchtxt != ""){
            $where["title|express_code"] = array("like","%".$searchtxt."%");
        }
        $countarr = D("Express")->getTabList("","sort_id desc",$where);// 查询满足要求的总记录数
        $count = count($countarr);
        $Page = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        
        $list = D("Express")->getTabList("","sort_id desc",$where,$Page);// 获取分页数据
        
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('totalcount',$count);//总条数
        $this->assign("pagenum",$pagenum);
        $this->assign("txtkeywords",$searchtxt);
        $this->display(); // 输出模板
    }
    
    /***
     * @time 2016/06/29
     * @function 配送方式修改
     */
    public function express_edit(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:0;
        if($eid == 0){$this->error('获取不到修改的模块数据！');die();}
        if(IS_POST){//提交过来的修改数据
            $res = D("Express")->DataSave();
            if($res == "false"){$this->error('修改失败！');die();}
            $this->redirect("Order/express_list",array("flag"=>"3"));
        }else{
            $d = D("Express")->getTabList("","",array("id"=>$eid),"","1");
            $this->assign("d",$d);
        }
        $this->display();
    }
    
    /***
     * @time 2016/06/29
     * @function 配送新增
     */
    public function express_add(){
        if(IS_POST){
            $res = D("Express")->dataAdd();
            if($res == "false"){$this->error('新增失败了！');die();}
            $this->redirect("Order/express_list",array("flag"=>"1"));die();
        }
        $this->display();
    }
    
    /***
     * @time 2016/07/04
     * @functon 订单详情
     */
    public function order_detail(){
        $orderid = isset($_REQUEST['id'])?$_REQUEST['id']:"";
        if($orderid == ""){$this->error('非法操作！');die();}
        
        //$ordertotal = 0;//订单总金额总计
        //1、订单相关信息（收货地址等）
            $orderinfo = D("Orders")->getTabList("","id asc",array("id"=>$orderid),"","1");
        //2、会员相关信息,组信息
            $userinfo = D("Users")->getTabList("","id asc",array("id"=>$orderinfo['user_id']),"","1");
            $groupinfo = D("UserGroups")->getTabList("","id asc",array("id"=>$userinfo['group_id']),"","1");
            
        //3、支付配送相关信息
            $payinfo = D("Payment")->getTabList("","id asc",array("id"=>$orderinfo['payment_id']),"","1");
            $expressinfo = D("Express")->getTabList("","id asc",array("id"=>$orderinfo['express_id']),"","1");
        //4、商品列表
            $productsinfo = D("OrderGoods")->getTabList("","id asc",array("order_id"=>$orderinfo['id']));
            foreach($productsinfo as $k=>$v){
                $productsinfo[$k]['totalmoney'] = $v['real_price']*$v['quantity'];
                $productsinfo[$k]['totalpoint'] = $v['point']*$v['quantity'];
            }
            
        //5、订单统计
        /* $expressfee = empty($orderinfo['express_fee'])?0:$orderinfo['express_fee'];
        $payfee = empty($orderinfo['payment_fee'])?0:$orderinfo['payment_fee'];
        $invoicefee = empty($orderinfo['invoice_taxes'])?0:$orderinfo['invoice_taxes'];
        $producttotal = empty($orderinfo['payable_amount'])?0:$orderinfo['payable_amount'];
        $pointtotal = empty($orderinfo['point'])?0:$orderinfo['point'];
        $ordertotal = ($producttotal)+($pointtotal)+$expressfee+$payfee+$invoicefee; */
        
        $allExpress = D("Express")->getTabList(array("id","title"),"id asc");     
            
        $this->assign("allExpress",$allExpress);    
        $this->assign("plist",$productsinfo);
        /* $this->assign("producttotal",$producttotal);
        $this->assign("pointtotal",$pointtotal);
        $this->assign("ordertotal",$ordertotal); */
        $this->assign("orderinfo",$orderinfo);
        $this->assign("userinfo",$userinfo);
        $this->assign("groupinfo",$groupinfo);
        $this->assign("payinfo",$payinfo);
        $this->assign("expressinfo",$expressinfo);
        $this->display();
    }
    
    /***
     * @time 2016/07/05
     * @function 更改订单状态
     */
    public function edit_order_status(){
        $orderno = isset($_REQUEST['order_no'])?$_REQUEST['order_no']:"";
        $edittype = isset($_REQUEST['edit_type'])?$_REQUEST['edit_type']:"";
        if($orderno == ""){
            echo json_encode(array("code"=>0,"message"=>'获取不到订单相关信息！'));die();
        }
        $orderdata = D("Orders")->getTabList("","id asc",array("order_no"=>$orderno),"","1");
        switch($edittype){
            case 'order_payment'://确认付款
               $d['status'] = 2;
               $d['payment_status'] = 2;
               $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
               if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改订单失败！'));die();}
               echo json_encode(array("code"=>200,"message"=>'修改订单成功！'));
             break;
             
            case 'order_confirm'://确认订单
               $d['status'] = 3;
               $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
               if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改订单失败！'));die();}
               echo json_encode(array("code"=>200,"message"=>'修改订单成功！'));
             break;
             
            case 'edit_order_express'://确认发货
               $d['status'] = 4;
               $d['express_id'] = isset($_REQUEST['expressid'])?$_REQUEST['expressid']:"";
               $d['express_no'] = isset($_REQUEST['expressno'])?$_REQUEST['expressno']:"";
               if($d['express_no'] == ""){echo json_encode(array("code"=>0,"message"=>'快递单号不能为空！'));die();}
               $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
               if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改订单失败！'));die();}
               echo json_encode(array("code"=>200,"message"=>'修改订单成功！'));
             break;
             
            case 'order_complete'://确认完成
               $d['status'] = 5;
               $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
               if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改订单失败！'));die();}
               echo json_encode(array("code"=>200,"message"=>'修改订单成功！'));
             break;
             
            case 'order_cancel'://取消订单
               $d['status'] = 6;
               $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
               if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改订单失败！'));die();}
               echo json_encode(array("code"=>200,"message"=>'修改订单成功！'));
             break;
             
            case 'order_invalid'://作废订单
               $d['status'] = 7;
               $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
               if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改订单失败！'));die();}
               echo json_encode(array("code"=>200,"message"=>'修改订单成功！'));
             break;
             
            case 'edit_invoice_taxes'://修改发票
                $num = isset($_REQUEST['invoice_taxes'])?$_REQUEST['invoice_taxes']:0;
                $d['invoice_taxes'] = $num;
                $d['order_amount'] = ($orderdata['real_amount'])+($orderdata['express_fee'])+($orderdata['payment_fee'])+($num);
                $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
                if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改发票失败！'));die();}
                echo json_encode(array("code"=>200,"message"=>'修改发票成功！'));
           break; 
           
            case 'edit_payment_fee'://修改支付手续费
                $num = isset($_REQUEST['payment_fee'])?$_REQUEST['payment_fee']:0;
                $d['payment_fee'] = $num;
                $d['order_amount'] = ($orderdata['real_amount'])+($orderdata['express_fee'])+($orderdata['invoice_taxes'])+($num);
                $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
                if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改支付手续费失败！'));die();}
                echo json_encode(array("code"=>200,"message"=>'修改支付手续费成功！'));
           break;
           
            case 'edit_express_fee'://修改物流费
                $num = isset($_REQUEST['express_fee'])?$_REQUEST['express_fee']:0;
                $d['express_fee'] = $num;
                $d['order_amount'] = ($orderdata['real_amount'])+($orderdata['payment_fee'])+($orderdata['invoice_taxes'])+($num);
                $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
                if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改物流费失败！'));die();}
                echo json_encode(array("code"=>200,"message"=>'修改物流费成功！'));
           break; 
           
            case 'edit_real_amount'://修改商品总额
                $num = isset($_REQUEST['real_amount'])?$_REQUEST['real_amount']:0;
                $d['real_amount'] = $num;
                $d['order_amount'] = ($orderdata['express_fee'])+($orderdata['payment_fee'])+($orderdata['invoice_taxes'])+($num);
                $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
                if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改商品总额失败！'));die();}
                echo json_encode(array("code"=>200,"message"=>'修改商品总额成功！'));
           break; 
           
            case 'edit_order_remark'://修改备注
                $remark = isset($_REQUEST['remark'])?$_REQUEST['remark']:"";
                $d['remark'] = $remark;
                $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
                if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改备注失败！'));die();}
                echo json_encode(array("code"=>200,"message"=>'修改备注成功！'));
           break; 
           
            case 'edit_order_mess'://修改收货地址
                $d['accept_name'] = isset($_REQUEST['acceptname'])?$_REQUEST['acceptname']:"";
                $d['area'] = isset($_REQUEST['area'])?$_REQUEST['area']:"";
                $d['address'] = isset($_REQUEST['address'])?$_REQUEST['address']:"";
                $d['post_code'] = isset($_REQUEST['postcode'])?$_REQUEST['postcode']:"";
                $d['mobile'] = isset($_REQUEST['mobile'])?$_REQUEST['mobile']:"";
                $d['telphone'] = isset($_REQUEST['telphone'])?$_REQUEST['telphone']:"";
                $d['email'] = isset($_REQUEST['email'])?$_REQUEST['email']:"";
                
                $res = D("Orders")->changeOrderData($d,array("order_no"=>$orderno));
                if($res == "false"){echo json_encode(array("code"=>0,"message"=>'修改失败！'));die();}
                echo json_encode(array("code"=>200,"message"=>'修改成功！'));
           break; 
           
           
           
        }
        
        
    }
    
    /**
     * @time 2016/07/05
     * @function  更改收货地址(存在bug)
     */
    public function dialog_accept(){
        if(IS_POST){
          $orderid = isset($_REQUEST['id'])?$_REQUEST['id']:"";
          if($orderid == ""){die("非法操作订单");}
          $d['accept_name'] = I("accept_name");
          $d['area'] = I("area");
          $d['address'] = I("address");
          $d['post_code'] = I("postcode");
          $d['mobile'] = I("mobile");
          $d['telphone'] = I("telphone");
          $d['email'] = I("email");
          $res = D("Orders")->changeOrderData($d,array("id"=>$orderid));
          if($res == "false"){die("编辑订单信息失败了");}
          redirect("Order/order_detail/id/".$orderid);
            
        }else{
            $orderno = isset($_REQUEST['order_no'])?$_REQUEST['order_no']:"";
             $orderdata = D("Orders")->getTabList("","id asc",array("order_no"=>$orderno),"","1");
             $this->assign("edata",$orderdata);
             $this->display();
        }
    }
    
       
}