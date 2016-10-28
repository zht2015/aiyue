<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class expressModel extends CommonModel{
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取express表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("express",$coum,$order,$where,$Page,$type); 
    }
    
    /**
     * @time 2016/06/29
     * @function 配置修改
     */
    public function DataSave(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:0;
        if($eid == 0){return "false";}
        $islock = $_REQUEST['cbIsLock']=="on"?0:1;
        $d['title'] = I("txtTitle");
        $d['express_code'] = I("txtExpressCode");
        $d['express_fee'] = I("txtExpressFee");
        $d['website'] = I("txtWebSite");
        $d['remark'] = I("txtRemark");
        $d['sort_id'] = I("txtSortId");
        $d['is_lock'] = $islock;
        
        $res = M("express")->where(array("id"=>$eid))->save($d);
        if($res === "false"){
            return "false";
        }
            return "true";
    }
    
    /***
     * @time 2016/06/29
     * @function 新增
     */
    public function dataAdd(){
        $islock = $_REQUEST['cbIsLock']=="on"?0:1;
        $d['title'] = I("txtTitle");
        $d['express_code'] = I("txtExpressCode");
        $d['express_fee'] = I("txtExpressFee");
        $d['website'] = I("txtWebSite");
        $d['remark'] = I("txtRemark");
        $d['sort_id'] = I("txtSortId");
        $d['is_lock'] = $islock;
        
        $res = M("express")->add($d);
        if($res === "false"){
            return "false";
        }
            return "true";
    }
    
    /***
     * @time 2016/06/29
     * @function 根据id字符串，删除表数据
     */
    public function delDataByIds($idstr){
        return $this->deleteDataById("express", $idstr);
    }
    
    
}