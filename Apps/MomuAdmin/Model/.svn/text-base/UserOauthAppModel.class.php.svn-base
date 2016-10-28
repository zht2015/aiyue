<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class UserOauthAppModel extends CommonModel{
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取user_oauth_app表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("user_oauth_app",$coum,$order,$where,$Page,$type); 
    }
    
    /***
     * @time 2016/07/01
     * @function 删除操作
     */
    public function delDataById($ids){
        return $this->deleteDataById("user_oauth_app", $ids);
    }
    
    /***
     * @time 2016/07/04
     * @function
     */
    public function insertData($eid="",$type=""){
        $d['title']= $_REQUEST['txtTitle'];
        $d['img_url']= $_REQUEST['txtImgUrl'];
        $d['app_id']= $_REQUEST['txtAppId'];
        $d['app_key']= $_REQUEST['txtAppKey'];
        $d['remark']= $_REQUEST['txtRemark'];
        $d['sort_id']= $_REQUEST['txtSortId'];
        $d['api_path']= $_REQUEST['txtApiPath'];
        if(isset($_REQUEST['cbIsLock'])){
          $d['is_lock'] = 0;  
        }else{
          $d['is_lock'] = 1;  
        }
        
        $tab = M("user_oauth_app");
        if($type != ""){//编辑操作
            $res = $tab->where(array("id"=>$eid))->save($d);
        }else{
            $res = $tab->add($d);
        }
        
        if($res === "false"){return "false";die();}
        return "true";
        
    }

    
}