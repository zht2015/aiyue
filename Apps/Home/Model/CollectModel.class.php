<?php
/**
 * Create 收藏模型
 * User: Mr.苏
 * Date: 2016/7/28
 * Time: 11:04
 */
namespace Home\Model;
class CollectModel extends CommonModel{
    /**收藏列表**/
    public function index(){
        $pex          = C('DB_PREFIX');
        $userId       = $_SESSION['USERS']['id'];
        
        $count        = M('collect')->where(array('user_id'=>$userId))->count();
        $Page         = new \Think\Page($count,20);
        $collectList  = M('collect')->where(array('user_id'=>$userId))->limit($Page->firstRow,$Page->listRows)->select();
        foreach ($collectList as $key => $value) {
            $collectList[$key]['goodsInfo'] = M()->table("{$pex}article as a,{$pex}article_attribute_value as b")->where('a.id=b.article_id AND a.id='.$value['article_id'])->field('a.id,a.img_url,a.title,b.market_price,b.sell_price,b.stock_quantity')->find();
        }
        $d['info'] = $collectList;
        $d['page'] = $Page->show();

        return $d;
    }

    /**加入收藏**/
    public function addCollect(){
        $articleId = I('id');
        $userId  = $_SESSION['USERS']['id'];
        $rs = array('status'=>-1);
        /**查询该用户收藏的该商品是否存在**/
        $m = M('collect');
        $findCollect =$m->where(array('user_id'=>$userId,'article_id'=>$articleId))->find();
        if($findCollect>0){
            $rs['status']=2;
        }else{
            $data = array();
            $data['user_id']=$userId;
            $data['article_id']=$articleId;
            $data['add_time']=date("Y-m-d H:i:s");
            $add = $m->add($data);
            if($add){
                $rs['status']=1;
            }
        }
        return $rs;
    }
    /**移除收藏夹商品**/
    public function delCollect(){
        $map['id'] = array('in',I('id'));
        $rs = array('status'=>-1);
        $m  = M('collect')->where($map)->delete() ? success('删除成功') : fail('删除失败，未知错误');
        return $m;
    }
}