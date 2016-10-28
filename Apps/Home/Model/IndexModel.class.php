<?php
/**
 * 首页数据模型
 * User: 胡望明
 * Date: 2016/7/27
 * Time: 10:48
 */
namespace Home\Model;
use Think\Model\RelationModel;
class IndexModel extends RelationModel{
     protected $tableName = 'article_category';
     protected $_link=array(
       "article"=>array(
           "mapping_type"=>MANY_TO_MANY,
           "foreign_key"=>"article",//中间表的字段
           "relation_foreign_key"=>"categoryid",//中间表的字段
           "relation_table"=>"m_art_cat_relation"
        )
     );
 }
?>
    
    
    
    
