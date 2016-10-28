<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
use Think\Model;
class CommonModel extends Model{
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getList($tab,$coum="",$order="id asc",$where="",$Page="",$type=""){
        $tab = M($tab);
        $field = implode(",", $coum);
        if(!empty($type)){
             return empty($coum)?$tab->where($where)->order($order)->find():$tab->field($field)->where($where)->order($order)->find();
        }
    
        if(empty($coum)){
            if(empty($where)){
                if(empty($Page)){
                    return  $tab->order($order)->select();
                }
                return  $tab->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
            }
            return  $tab->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
    
        if(empty($where)){
            if(empty($Page)){
                return  $tab->field($field)->order($order)->select();
            }
            return  $tab->field($field)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
    
        if(empty($page)){
            return  $tab->field($field)->where($where)->order($order)->select();
        }
    
        return $tab->field($field)->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
         
    }
   
    
    /***
     * @time 2016/06/30
     * @function删除
     */
    public function deleteDataById($tab,$ids){
        $res = M($tab)->where(array("id"=>array("in",$ids)))->delete();
        if($res === "false"){return "false";}
        return "true";
    }
    
    
}