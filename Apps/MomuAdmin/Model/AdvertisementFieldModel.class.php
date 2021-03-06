<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class AdvertisementFieldModel extends CommonModel{
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取news_field表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("advertisement_field",$coum,$order,$where,$Page,$type);  
    }
    
    /***
     * @time 2016/09/27
     * @function 获取到列表需要展示的字段名称和字段
     */
    public function showListCoum($channelid){
        $d = M('advertisement_field')->alias('nf')->field("aaf.name,aaf.title")->join("m_article_attribute_field aaf on nf.field_id=aaf.id")->where(array('nf.channel_id'=>$channelid))->order("aaf.sort_id desc")->select();
        return count($d)>0?$d:'';
    }
    
}