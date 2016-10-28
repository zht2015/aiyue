<?php
/**
 * User: zht
 * Date: 2016/10/14
 */
namespace Home\Action;
class CommentAction extends CommonAction{
    /**
     * 收到的评价
     * @author zht 2016-10-14
     * @return [type] [description]
     */
    public function myComment(){
        $this->display();
    }

    /**
     * 发出的评价
     * @author zht 2016-10-19
     * @return [type] [description]
     */
    /*public function postComment(){
    	$this->display();
    }*/
}