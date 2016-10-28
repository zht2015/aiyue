<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class OrdersModel extends CommonModel{
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取orders表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("orders",$coum,$order,$where,$Page,$type);  
    }
    
    /***
     * @time 2016/06/29
     * @function 个性化获取orders、express、users、payment四个表的数据
     */
    public function getPersonalOrders($where="",$page="",$type=""){
        if($type!=""){//统计条数
            if($where != ""){
                $count = M()->table("m_orders o")
                             ->join("m_express e on o.express_id=e.id","left")
                             ->join("m_users u on o.user_id=u.id","left")
                             ->join("m_payment p on o.payment_id=p.id","left")
                             ->where($where)
                             ->count();
            }else{
                $count = M()->table("m_orders o")
                             ->join("m_express e on o.express_id=e.id","left")
                             ->join("m_users u on o.user_id=u.id","left")
                             ->join("m_payment p on o.payment_id=p.id","left")
                             ->count();
            }
            return $count;
        }else{//获取到相应的数据
            if($where != ""){
                $d = M()->table("m_orders o")
                ->field("o.*,e.title etitle,p.title ptitle")
                ->join("m_express e on o.express_id=e.id","left")
                ->join("m_users u on o.user_id=u.id","left")
                ->join("m_payment p on o.payment_id=p.id","left")
                ->where($where)
                ->limit($page->firstRow,$page->listRows)
                ->select();
            }else{
                $d = M()->table("m_orders o")
                ->field("o.*,e.title etitle,p.title ptitle")
                ->join("m_express e on o.express_id=e.id","left")
                ->join("m_users u on o.user_id=u.id","left")
                ->join("m_payment p on o.payment_id=p.id","left")
                ->limit($page->firstRow,$page->listRows)
                ->select();
            }
            //echo M()->getLastSql();
            return $d;
        }
    }
    
    /***
     * @time 2016/07/05
     * @function 修改订单数据
     */
    public function changeOrderData($d=array(),$where=array()){
        $res = M("orders")->where($where)->save($d);
        if($res === "false"){return "false";die();}
        return "true";
    }
    

    
}