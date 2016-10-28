<?php
/**
 * 评价模型
 * User: Mr.苏
 * Date: 2016/8/1
 * Time: 11:02
 */
namespace  Home\Model;
class EvaluateModel extends CommonModel{
	protected $tableName = 'article_comment';
    /**增加评价信息**/
    public function AddEvaluate($data){
    	foreach ($data['photo'] as $key => $value) {
            $str[$key]  = explode('|', $value);
            $s .= $str[$key][1].',';
          }
          $d['order_id']   = $data['orderId'];
    	    $d['hint']       = $data['hint'];
    	    $d['content']    = $data['content'];
          $d['img_url']    = rtrim($s, ",");
          $d['user_id']    = $_SESSION['USERS']['id'];
          $d['article_id'] = $data['article_id'];
          $d['user_ip']    = get_client_ip();
          $d['add_time']   = date('Y-m-d H:i:s',time());

          $transaction  = new \Org\Util\transaction();//事物回滚
          $comment      = $transaction->table('article_comment')->add($d);//插入评论信息

          $goodsCount   = M('order_goods')->where(array('order_id'=>$d['order_id']))->count();
          $commentCount = M('article_comment')->where(array('order_id'=>$d['order_id']))->count();
        
          if($goodsCount > $commentCount){//如果商品数量大于评论数量则不更新
          	$o['orderstatus'] = 4;
          }else{
          	$o['orderstatus'] = 14;
          }

          $o['updata_time'] = date('Y-m-d H:i:s',time());
          $status = $transaction->table('orders')->where(array('orderId'=>$data['orderId']))->save($o);//更改订单状态
         
         if($transaction->submit(array($comment,$status))){
          	success('评论成功',U('Order/index'));
         }else{
          	fail('评论失败，未知错误');
         }
    }
    /*
	获取评价信息
    */
    public function getComment($id){
    	$rs = M('article_comment')->find($id);
    	$rs['comment'] = M('article_comment')->where(array('order_id'=>$id))->select();
    	echo M()->getlastsql();
    	return $rs;
    }
}