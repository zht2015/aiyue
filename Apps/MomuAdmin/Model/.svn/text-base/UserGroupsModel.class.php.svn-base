<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class UserGroupsModel extends CommonModel{
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取user_groups表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("user_groups",$coum,$order,$where,$Page,$type); 
    }
    
    /**
     * @time 2016/07/01
     * @function 删除数据
     */
    public function delDataById($ids){
        return $this->deleteDataById("user_groups", $ids);
    }
    
    /**
     * @time 2016/07/01
     * @function 新增组
     */
    public function dealGroup($type="",$eid=""){
        $d['title'] = I("txtTitle");
        $d['grade'] = I("txtGrade");
        $d['upgrade_exp'] = I("txtUpgradeExp");
        $d['amount'] = I("txtAmount");
        $d['point'] = I("txtPoint");
        $d['discount'] = I("txtDiscount");
        if(isset($_REQUEST['rblIsDefault'])){
            $d['is_default'] = 1;
        }else{
            $d['is_default'] = 0;
        }
        if(isset($_REQUEST['rblIsUpgrade'])){
            $d['is_upgrade'] = 1;
        }else{
            $d['is_upgrade'] = 0;
        }
        if(isset($_REQUEST['rblIsLock'])){
            $d['is_lock'] = 1;
        }else{
            $d['is_lock'] = 0;
        }
        if($type==""){
            $res = M("user_groups")->add($d);
        }else{
            $res = M("user_groups")->where(array("id"=>$eid))->save($d);
        }
        if($res === "false"){
            return "false";
        }
        return "true";
    
    }

    
}