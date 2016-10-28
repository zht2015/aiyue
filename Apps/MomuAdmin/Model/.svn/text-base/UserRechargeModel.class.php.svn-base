<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class UserRechargeModel extends CommonModel{
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取user_recharge表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList('user_recharge',$coum,$order,$where,$Page,$type);
    }
   
    /**
     * @time 2016/07/01
     * @function 充值新增
     */
    public function insertData($uid,$oldamount){
        $username = I("txtUserName");
        $payid = I("ddlPaymentId");
        $amount = (float)I("txtAmount");
        if($amount == 0){
            return "false";
        }
        $d['user_id'] = $uid;       
        $d['user_name'] = $username;       
        $d['recharge_no'] = I("txtRechargeNo");       
        $d['payment_id'] = $payid;       
        $d['amount'] = $amount; 
        $d['status'] = 1; 
        $d['add_time'] = date("Y-m-d H:i:s"); 
        $d['complete_time'] = date("Y-m-d H:i:s"); 
        
        $newamount = $oldamount+$amount;
        
        $data['user_id'] = $uid;
        $data['user_name'] = $username;
        $data['payment_id'] = $payid;
        $data['value'] = $amount;
        $data['remark'] = "充值";
        $data['add_time'] = date("Y-m-d H:i:s");
        
        
        $m = M();
        //开启事务
        $m->startTrans();
        $res1 = M("user_recharge")->add($d);
        $res2 = M("users")->where(array("id"=>$uid))->save(array("amount"=>$newamount));
        $res3 = M("user_amount_log")->add($data);
        if($res1 === "false" || $res2 === "false" || $res3 === "false"){
            $m->rollback();//事务回滚
            return "false";
        }
            $m->commit();//提交事务
            return "true";
        
    }
    
    /***
     * @time 2016/07/01
     * @function 删除操作
     */
    public function delDataById($ids){
        return $this->deleteDataById("user_recharge",$ids);
    }
    
}