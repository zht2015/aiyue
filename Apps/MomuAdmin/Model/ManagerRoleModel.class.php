<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class ManagerRoleModel extends CommonModel{
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取manager_role表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList('manager_role',$coum,$order,$where,$Page,$type);    
    }
   
    /**
     * @time 2016/08/09
     * @function 检测是否已经创建该名称的权限组
     */
    public function isHasRole($rolename){
        $res = M("manager_role")->where(array("role_name"=>$rolename))->find();
        return $res;
    }
    
    /**
     * @time 2016/08/09
     * @function 新增角色组，如果新增成功，返回新增的数据id
     */
    public function addData(){
        $d['role_type'] = I("ddlRoleType");
        $d['role_name'] = I("txtRoleName");
        $d['is_sys'] = 0;
        
        $add = M("manager_role")->add($d);
        if($add === "false"){
            return "false";
        }
            return $add;
    }
    
    /***
     * @time 2016/08/09
     * @function 修改值
     */
    public function saveData($data,$where){
        $res = M("manager_role")->where($where)->save($data);
    }
    

    
}