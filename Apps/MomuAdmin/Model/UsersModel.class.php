<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class UsersModel extends CommonModel{
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取users表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList('users',$coum,$order,$where,$Page,$type);    
    }
   
    /**
     * @time 2016/06/30
     * @function 新增用户
     */
    public function dealUser($type="",$eid=""){
        $d['group_id'] = I("ddlGroupId");
        $d['user_name'] = I("txtUserName");
        if(I("txtPassword") != ""){
            $d['password'] = md5(I("txtPassword"));
        }
        $d['mobile'] = I("txtMobile");
        $d['email'] = I("txtEmail");
        $d['avatar'] = I("txtAvatar");
        $d['nick_name'] = I("txtNickName");
        $d['sex'] = I("rblSex");
        $d['birthday'] = I("txtBirthday");
        $d['telphone'] = I("txtTelphone");
        $d['qq'] = I("txtQQ");
        $d['msn'] = I("txtMsn");
        $d['amount'] = I("txtAmount");
        $d['point'] = I("txtPoint");
        $d['exp'] = I("txtExp");
        $d['status'] = I("rblStatus");
        $d['address'] = I("txtAddress");
        $d['reg_ip'] = $_SERVER['REMOTE_ADDR'];
        if($type==""){
            $d['reg_time']=date("Y-m-d H:i:s");
            $res = M("users")->add($d);
        }else{
           $res = M("users")->where(array("id"=>$eid))->save($d); 
        }
        if($res === "false"){
            return "false";
        }
            return "true";
        
    }
    
    /***
     * @time 2016/06/30
     * @function删除用户
     */
    public function delDataById($ids){
        return $this->deleteDataById("users", $ids);
    }
    
    /***
     * @time 2016/06/30
     * @function 审核通过
     */
    public function passById($ids){
        $res = M("users")->where(array("id"=>array("in",$ids)))->save(array("status"=>"0"));
        if($res === "false"){return "false";}
        return "true";
    }

    
}