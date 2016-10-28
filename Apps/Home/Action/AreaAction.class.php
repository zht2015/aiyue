<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/30
 * Time: 11:01
 */
namespace Home\Action;
class AreaAction extends CommonAction{
    /**获取省**/
    public function province(){
        $province= M("areas")->where("area_type=1")->select();
        return $province;
    }

    /**获取市**/
    public function city(){
        $father=$_POST['id'];
        $city = M("areas")->where("parent_id=".$father." and area_type=2")->select();
        $this->ajaxReturn($city);
    }
    /**获取区**/
    public function area(){
        $father=$_POST['id'];
        $area = M("areas")->where("parent_id=".$father." and area_type=3")->select();
        $area ? $area :"1";
        $this->ajaxReturn($area);
    }
}