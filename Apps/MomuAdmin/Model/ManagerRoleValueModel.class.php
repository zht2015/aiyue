<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class ManagerRoleValueModel extends CommonModel{
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取manager_role_value表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList('manager_role_value',$coum,$order,$where,$Page,$type);    
    }
    
    /***
     * @time 2016/08/09
     * @function 修改角色组权限
     */
    public function newData($eid,$data){
        $tab = M("manager_role_value");
        if($data == ""){//只执行删除操作
            $res = $tab->where(array("role_id"=>$eid))->delete();
            if($res === "false"){
                return "false";
            }
                return "true";
        }
        
        //事务，删除，新增权限
        $m = M();
        $m->startTrans();
        $res1 = $tab->where(array("role_id"=>$eid))->delete();
        $res2 = $tab->addAll($data);
        if($res1!=="false" && $res2){
            $m->commit();
            return "true";
        }
            $m->rollback();
            return "false";
    }
    
    /**
     * @time 2016/08/09
     * @time 删除角色表和角色权限表数据(事务)
     */
    public function delRoleById($selids){
        $tab1 = M("manager_role");
        $tab2 = M("manager_role_value");
        
        $m = M();
        $m->startTrans();
        
        $res1 = $tab1->where(array("id"=>array("in",$selids)))->delete();
        
        $res2 = $tab2->where(array("role_id"=>array("in",$selids)))->delete();
        
        if($res1 && $res2){
            $m->commit();
            return "true";
        }
        
            $m->rollback();
            return "false";
        
    }
   
    

    
}