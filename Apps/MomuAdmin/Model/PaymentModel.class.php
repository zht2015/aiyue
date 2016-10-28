<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class PaymentModel extends CommonModel{
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取payment表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("payment",$coum,$order,$where,$Page,$type);  
    }
    
    /**
     * @time 2016/06/29
     * @function 支付方式配置修改
     */
    public function DataSave(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:0;
        if($eid == 0){return "false";}
        $islock = $_REQUEST['cbIsLock']=="on"?0:1;
        $d['title'] = I("txtTitle");
        $d['img_url'] = I("txtImgUrl");
        $d['remark'] = $_REQUEST["txtRemark"];
        $d['poundage_type'] = I("rblPoundageType");
        $d['poundage_amount'] = I("txtPoundageAmount");
        
        $d['txtAlipaySellerEmail'] = $_REQUEST['txtAlipaySellerEmail'];
        $d['txtAlipayPartner'] = $_REQUEST['txtAlipayPartner'];
        $d['txtAlipayKey'] = $_REQUEST['txtAlipayKey'];
        
        $d['sort_id'] = I("txtSortId");
        $d['is_lock'] = $islock;
        
        $res = M("payment")->where(array("id"=>$eid))->save($d);
        if($res === "false"){
            return "false";
        }
            return "true";
    }
    
    /***
     * @time 2016/06/29
     * @function 支付新增
     */
    public function dataAdd(){
        $islock = $_REQUEST['cbIsLock']=="on"?0:1;
        $d['title'] = I("txtTitle");
        $d['img_url'] = I("txtImgUrl");
        $d['remark'] = I("txtRemark");
        $d['poundage_type'] = I("rblPoundageType");
        $d['poundage_amount'] = I("txtPoundageAmount");
        
        $d['txtAlipaySellerEmail'] = $_REQUEST['txtAlipaySellerEmail'];
        $d['txtAlipayPartner'] = $_REQUEST['txtAlipayPartner'];
        $d['txtAlipayKey'] = $_REQUEST['txtAlipayKey'];
        
        $d['sort_id'] = I("txtSortId");
        $d['is_lock'] = $islock;
        $d['type'] = I("rblType");
        
        $res = M("payment")->add($d);
        if($res === "false"){
            return "false";
        }
            return "true";
    }
    
    /***
     * @time 2016/06/29
     * @function 根据id字符串，删除表数据
     */
    public function delDataByIds($idstr){
        return $this->deleteDataById("payment", $idstr);
    }
    
    
}