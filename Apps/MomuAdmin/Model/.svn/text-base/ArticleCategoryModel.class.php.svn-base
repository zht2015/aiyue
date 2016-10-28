<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class ArticleCategoryModel extends CommonModel{
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取article_category表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("article_category",$coum,$order,$where,$Page,$type); 
    }
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取article表的数据条数
     */
    public function getTabCount($where=""){
        $tab = M('article_category');
        return empty($where)?$tab->count():$tab->where($where)->count();
    }
    
    /***
     * @time 2016/06/24
     * @function 分类数据写入
     */
    public function dataInsert(){
        //整理写入的数据
        $d['channel_id'] = isset($_REQUEST['channel_id'])?$_REQUEST['channel_id']:0;
        if($d['channel_id']==0){return false;die();}
        $d['parent_id'] = $_REQUEST['ddlParentId'];
        $d['title'] = $_REQUEST['txtTitle'];
        $d['call_index'] = $_REQUEST['txtCallIndex'];
        $d['sort_id'] = $_REQUEST['txtSortId'];
        $d['link_url'] = $_REQUEST['txtLinkUrl'];
        $d['img_url'] = $_REQUEST['txtImgUrl'];
        $d['content'] = $_REQUEST['txtContent'];
        $d['seo_title'] = $_REQUEST['txtSeoTitle'];
        $d['seo_keywords'] = $_REQUEST['txtSeoKeywords'];
        $d['seo_description'] = I('txtSeoDescription');
        $d['is_top'] = isset($_REQUEST['istop'])?I('istop'):1;
        $d['is_rec'] = isset($_REQUEST['isrec'])?I('isrec'):1;
        
        $res = M("article_category")->add($d);
        if($res === "false"){
            return false;
        }else{
            return true;
        }
        
    }
    
    /***
     * @time 2016/06/27
     * @function 分类更新
     */
    public function dataSave(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:0;
        if($eid==0){return false;die();}
        $d['channel_id'] = isset($_REQUEST['channel_id'])?$_REQUEST['channel_id']:0;
        $d['parent_id'] = $_REQUEST['ddlParentId'];
        $d['title'] = $_REQUEST['txtTitle'];
        $d['call_index'] = $_REQUEST['txtCallIndex'];
        $d['sort_id'] = $_REQUEST['txtSortId'];
        $d['link_url'] = $_REQUEST['txtLinkUrl'];
        $d['img_url'] = $_REQUEST['txtImgUrl'];
        $d['content'] = $_REQUEST['txtContent'];
        $d['seo_title'] = $_REQUEST['txtSeoTitle'];
        $d['seo_keywords'] = $_REQUEST['txtSeoKeywords'];
        $d['seo_description'] = I('txtSeoDescription');
        $d['is_top'] = isset($_REQUEST['istop'])?I('istop'):1;
        $d['is_rec'] = isset($_REQUEST['isrec'])?I('isrec'):1;
        
        $res = M("article_category")->where(array("id"=>$eid))->save($d);
        if($res === "false"){
            return false;
        }else{
            return true;
        }
    }
    
    /***
     * @time 2016/06/27
     * @function 批量删除
     */
    public function delDataById($delstr){
        $tab1 = M("article_category");
        $tab2 = M("art_cat_relation");
        //开启事务
        $m = M();
        $m->startTrans();
            $res1 = $tab1->where(array("id"=>array("in",$delstr)))->delete();
            $res2 = $tab2->where(array("categoryid"=>array("in",$delstr)))->delete();
        if($res1 ==="false" || $res2 === "false"){
           $m->rollback();
           return false;
        }else{
            $m->commit();
            return true;
        }
    }
      
}