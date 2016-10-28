<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class NewsCatRelationModel extends CommonModel{
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取art_cat_relation表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        $tab = M('news_cat_relation');
        return $this->getList("news_cat_relation",$coum,$order,$where,$Page,$type); 
    }
    
}