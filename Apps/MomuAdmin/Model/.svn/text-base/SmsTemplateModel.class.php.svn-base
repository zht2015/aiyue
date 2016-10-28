<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class SmsTemPlateModel extends CommonModel{
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取sms_template表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("sms_template",$coum,$order,$where,$Page,$type); 
    }
    
    /***
     * @time 2016/07/01
     * @function 删除操作
     */
    public function delDataById($ids){
        return $this->deleteDataById("sms_template", $ids);
    }
    
    /***
     * @time 2016/07/04
     * @function新增短信模板
     */
    public function insertData($eid="",$type=""){
        $d['title']= $_REQUEST['txtTitle'];
        $d['call_index']= $_REQUEST['txtCallIndex'];
        $d['content']= $_REQUEST['txtContent'];
        $tab = M("sms_template");
        if($type != ""){//编辑操作
            $res = $tab->where(array("id"=>$eid))->save($d);
        }else{
            $d['is_sys']= 1;
            $res = $tab->add($d);
        }
        if($res === "false"){return "false";die();}
        return "true";
    }
    
}