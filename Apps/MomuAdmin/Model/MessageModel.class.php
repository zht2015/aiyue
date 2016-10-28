<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class MessageModel extends CommonModel{
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取message表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("message",$coum,$order,$where,$Page,$type);
    }
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取article表的数据条数
     */
    public function getTabCount($where=""){
        $tab = M('message');
        return empty($where)?$tab->count():$tab->where($where)->count();
    }
    
   
    
}