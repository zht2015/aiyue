<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class UserMessageModel extends CommonModel{
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取user_message表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("user_message",$coum,$order,$where,$Page,$type);
    }
   
    /**
     * @time 2016/07/01
     * @function 消息新增
     */
    public function insertData($uname="",$type=""){
        if($type==""){
            $d['type'] = 0;       
            $d['post_user_name'] = "admin";       
            $d['accept_user_name'] = $uname;       
            $d['is_read'] = 0;       
            $d['title'] = I("txtTitle");       
            $d['content'] = I("txtContent"); 
            $d['post_time'] = date("Y-m-d H:i:s"); 
            $res = M("user_message")->add($d);
        }else{
            $eid = $_REQUEST['id'];//编辑的id
            $data['title'] = I("txtTitle"); 
            $data['content'] = I("txtContent"); 
            $res = M("user_message")->where(array("id"=>$eid))->save($data);
        }
        if($res === "false"){
            return "false";
        }
            return "true";
        
    }
    
    /***
     * @time 2016/07/01
     * @function 删除操作
     */
    public function delDataById($ids){
        return $this->deleteDataById("user_message", $ids);
    }
   
    
}