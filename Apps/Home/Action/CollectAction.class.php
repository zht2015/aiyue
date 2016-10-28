<?php
/**
 * 收藏 模块.
 * User: zht
 * Date: 2016/10/19
 */
namespace Home\Action;
class CollectAction extends CommonAction{
    /**
     * 收藏的书单
     * @author zht 2016-10-19
     * @return [type] [description]
     */
    public function collectSd(){
       
        $this->display();
    }


    
   
    /**
     * 收藏的图书
     * @author zht 2016-10-19
     */
    public function collectBook(){
        $this->display();
    }


}