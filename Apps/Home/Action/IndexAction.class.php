<?php
/**
 * 首页模块
 * User: zht
 * Date: 2016/6/12
 * Time: 9:55
 */
namespace Home\Action;
class IndexAction extends CommonAction{
    /**爱阅首页**/
    public function index(){
             

        $this->display();
    }


    /*关于我们*/
    public function aboutUs(){
    	$this->display();
    }
    
}