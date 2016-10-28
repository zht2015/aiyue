<?php
/**
 * 新闻Blog
 * @author: zht 2016/10/19
 * :
 */
namespace Home\Action;
class NewsBlogAction extends CommonAction{
	/**奖项**/
	public function awards(){
		$this->display();
	}

	/**论坛**/
	public function forum(){
		$this->display();
	}

	/**新闻**/
	public function news(){
		$this->display();
	}

	/**新闻详情**/
	public function newsDetail(){
		$this->display();
	}

}