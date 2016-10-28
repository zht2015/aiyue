<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
use Think\Model;
class TestModel extends Model{
    protected $tableName = 'articleattributevalue';
    public function getnews(){
        $sql = "select * from __PREFIX__articleattributevalue";
        $rs=$this->pageQuery($sql);
        dump($rs);
    }
}