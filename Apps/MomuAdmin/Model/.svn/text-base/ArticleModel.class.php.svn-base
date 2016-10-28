<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class ArticleModel extends CommonModel{
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取article表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("article",$coum,$order,$where,$Page,$type);
    }
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取article表的数据条数
     */
    public function getTabCount($where=""){
        $tab = M('article');
        return empty($where)?$tab->count():$tab->where($where)->count();
    }
    
    /***
     * @time 2016/06/20-2016/06/21
     * @function 新增表数据，并添加扩展数据到扩展字段表
     */
    public function articleDataInsert($channelid){
        $tab = M("article");
        $tab1 = M("article_albums");
        $tab2 = M("article_attach");
        $tab3 = M("article_attribute_value");
        $tab4 = M("channel_field");
        $tab5 = M("article_attribute_field");
        $tab6 = M("art_cat_relation");
        
        $data = array();//需要添加的数据
        //属性选择
        $propertyarr = $_REQUEST['cblItem'];
        if(isset($propertyarr)){
            for($i=0;$i<count($propertyarr);$i++){
              $tmparr = explode(",", $propertyarr[$i]);
              $data[$tmparr[0]]=$tmparr[1];
            }
        }
        //article新增的数据
        $data['channel_id'] = $_REQUEST['channel_id'];
        //$data['category_id'] = $_REQUEST['ddlCategoryId'];//更改为分类为多项选择
        $data['status'] = $_REQUEST['rblStatus'];
        $data['call_index'] = $_REQUEST['txtCallIndex'];
        $data['title'] = $_REQUEST['txtTitle'];
        $data['img_url'] = $_REQUEST['txtImgUrl'];
        $data['sort_id'] = $_REQUEST['txtSortId'];
        $data['click'] = $_REQUEST['txtClick'];
        $data['add_time'] = isset($_REQUEST['txtAddTime'])?(empty($_REQUEST['txtAddTime'])?date("Y-m-d H:i:s"):$_REQUEST['txtAddTime']):date("Y-m-d H:i:s");
        $data['link_url'] = $_REQUEST['txtLinkUrl'];
        $data['zhaiyao'] = $_REQUEST['txtZhaiyao'];
        $data['content'] = $_REQUEST['txtContent'];
        $data['seo_title'] = $_REQUEST['txtSeoTitle'];
        $data['seo_keywords'] = $_REQUEST['txtSeoKeywords'];
        $data['seo_description'] = $_REQUEST['txtSeoDescription'];
        //新增article
        $insertres = $tab->add($data); //新增的id
        if($insertres === "false"){
            return "false";die();
        }
        
        //检测是否上传的图片
        if(isset($_REQUEST['hid_photo_name'])){
            if(count($_REQUEST['hid_photo_name'])>0){
                $albumarr = array();
                foreach($_REQUEST['hid_photo_name'] as $v){
                    $tmparr = explode("|", $v);
                    $d['article_id'] = $insertres;
                    $d['thumb_path'] = $tmparr[2];
                    $d['original_path'] = $tmparr[1];
                    $d['add_time'] = date('Y-m-d H:i:s');
                    array_push($albumarr, $d);
                }
            }
        }
        
        //检测判断是否选中分类
        if(isset($_REQUEST['ddlCategoryId'])){
            if(count($_REQUEST['ddlCategoryId'])>0){//存在选中分类数据
                $categorydaarr = array();
                foreach($_REQUEST['ddlCategoryId'] as $v){
                    $d['categoryid'] = $v;
                    $d['articleid'] = $insertres;
                    $d['ctime'] = date("Y-m-d H:i:s");
                    array_push($categorydaarr,$d);
                }
            }
        }
        
        //检测是否上传了文件
        if(isset($_REQUEST['hid_attach_filepath'])){
            if(count($_REQUEST['hid_attach_filepath'])>0){
                $attacharr = array();
                foreach($_REQUEST['hid_attach_filepath'] as $k=>$v){
                    $d['article_id'] = $insertres;
                    $d['file_name'] = $_REQUEST['hid_attach_filename'][$k];
                    $d['file_path'] = $_REQUEST['hid_attach_filepath'][$k];
                    $d['file_size'] = $_REQUEST['hid_attach_filesize'][$k];
                    $d['point'] = $_REQUEST['txt_attach_point'][$k];
                    $ext = explode(".",$_REQUEST['hid_attach_filesize'][$k]);
                    $d['file_ext'] = $ext[count($ext)-1];
                    $d['add_time'] = date('Y-m-d H:i:s');
                    array_push($attacharr, $d);
                }
            }
        }
        
        //检测是否有扩展字段
        $filelist = $tab4->Field("field_id")->where(array("channel_id"=>$channelid))->select();//获取所有的扩展字段id
        if(count($filelist)>0){
            $extcoum = "";
            foreach ($filelist as $v){
                $key = $tab5->getFieldById($v['field_id'],"name");
                $extcoum .= $key.",";
            }
            $extcoum = substr($extcoum,0,-1);// 获取所有的扩展字段名称字符串           
        }
        if(isset($extcoum)){
            $extarr = array();
            $extcoumarr = explode(",", $extcoum);
              $extarr['article_id'] = $insertres;
              isset($_REQUEST['sell_price'])?$extarr['sell_price']=$_REQUEST['sell_price']:"";
              isset($_REQUEST['market_price'])?$extarr['market_price']=$_REQUEST['market_price']:"";
              isset($_REQUEST['stock_quantity'])?$extarr['stock_quantity']=$_REQUEST['stock_quantity']:"";
              isset($_REQUEST['goods_no'])?$extarr['goods_no']=$_REQUEST['goods_no']:"";
              isset($_REQUEST['source'])?$extarr['source']=$_REQUEST['source']:"";
              isset($_REQUEST['author'])?$extarr['author']=$_REQUEST['author']:"";
            foreach ($extcoumarr as $v){
              $extarr[$v] = $_REQUEST[$v];
            }
        }else{
            $extarr = array();
            $extarr['article_id'] = $insertres;
            isset($_REQUEST['sell_price'])?$extarr['sell_price']=$_REQUEST['sell_price']:"";
            isset($_REQUEST['market_price'])?$extarr['market_price']=$_REQUEST['market_price']:"";
            isset($_REQUEST['stock_quantity'])?$extarr['stock_quantity']=$_REQUEST['stock_quantity']:"";
            isset($_REQUEST['goods_no'])?$extarr['goods_no']=$_REQUEST['goods_no']:"";
            isset($_REQUEST['source'])?$extarr['source']=$_REQUEST['source']:"";
            isset($_REQUEST['author'])?$extarr['author']=$_REQUEST['author']:"";
        }
        
        //开启事务
        $m = M();
        $m->startTrans();
            $res1 = "true";
            if(isset($albumarr)){
                $res1 = $tab1->addAll($albumarr);
            }
            $res2 = "true";
            if(isset($attacharr)){
                $res2 = $tab2->addAll($attacharr);
            }
            $res3 = "true";
            if(isset($extarr)){
                $res3 = $tab3->add($extarr);
            }
            
            $res4 = "true";
            if(isset($categorydaarr)){
                $res4 = $tab6->addAll($categorydaarr);
            }
            
        if($res1==="false" || $res2 ==="false" || $res3 ==="false" || $res4 === "false"){
            $m->rollback();//新增数据失败，事务回滚
            $tab->where(array("id"=>$insertres))->delete();
            return "false";
        }
        
            $m->commit();//成功添加数据
            return "success";
    }
    
    /***
     * @time 2016/06/27
     * @function 编辑数据写入
     */
    public function articleDataSave($channelid,$eid){
        $tab = M("article");
        $tab1 = M("article_albums");
        $tab2 = M("article_attach");
        $tab3 = M("article_attribute_value");
        $tab4 = M("channel_field");
        $tab5 = M("article_attribute_field");
        $tab6 = M("art_cat_relation");
        
        $data = array();//需要添加的数据
        
        
        //is_msg is_top is_red is_hot is_slide
        //属性选择,先进行初始化
        $data['is_msg'] = 0;
        $data['is_top'] = 0;
        $data['is_red'] = 0;
        $data['is_hot'] = 0;
        $data['is_slide'] = 0;
        $propertyarr = $_REQUEST['cblItem'];
        if(isset($propertyarr)){
            for($i=0;$i<count($propertyarr);$i++){
                $tmparr = explode(",", $propertyarr[$i]);
                $data[$tmparr[0]]=$tmparr[1];
            }
        }
        //article新增的数据
        $data['channel_id'] = $_REQUEST['channel_id'];
        //$data['category_id'] = $_REQUEST['ddlCategoryId'];//更改为分类为多项选择
        $data['status'] = $_REQUEST['rblStatus'];
        $data['call_index'] = $_REQUEST['txtCallIndex'];
        $data['title'] = $_REQUEST['txtTitle'];
        $data['img_url'] = $_REQUEST['txtImgUrl'];
        $data['sort_id'] = $_REQUEST['txtSortId'];
        $data['click'] = $_REQUEST['txtClick'];
        $data['add_time'] = isset($_REQUEST['txtAddTime'])?(empty($_REQUEST['txtAddTime'])?date("Y-m-d H:i:s"):$_REQUEST['txtAddTime']):date("Y-m-d H:i:s");
        $data['link_url'] = $_REQUEST['txtLinkUrl'];
        $data['zhaiyao'] = $_REQUEST['txtZhaiyao'];
        $data['content'] = $_REQUEST['txtContent'];
        $data['seo_title'] = $_REQUEST['txtSeoTitle'];
        $data['seo_keywords'] = $_REQUEST['txtSeoKeywords'];
        $data['seo_description'] = $_REQUEST['txtSeoDescription'];

        
        //检测是否上传的图片
        if(isset($_REQUEST['hid_photo_name'])){
            if(count($_REQUEST['hid_photo_name'])>0){
                $albumarr = array();
                foreach($_REQUEST['hid_photo_name'] as $v){
                    $tmparr = explode("|", $v);
                    $d['thumb_path'] = $tmparr[2];
                    $d['article_id'] = $eid;
                    $d['original_path'] = $tmparr[1];
                    $d['add_time'] = date('Y-m-d H:i:s');
                    array_push($albumarr, $d);
                }
            }
        }else{
            $tab1->where(array("article_id"=>$eid))->delete();
        }
        
        //检测判断是否选中分类
        if(isset($_REQUEST['ddlCategoryId'])){
            if(count($_REQUEST['ddlCategoryId'])>0){//存在选中分类数据
                $categorydaarr = array();
                foreach($_REQUEST['ddlCategoryId'] as $v){
                    $d['categoryid'] = $v;
                    $d['articleid'] = $eid;
                    $d['ctime'] = date("Y-m-d H:i:s");
                    array_push($categorydaarr,$d);
                }
            }
        }else{
            $tab6->where(array("articleid"=>$eid))->delete();
        }
        
        //检测是否上传了文件
        if(isset($_REQUEST['hid_attach_filepath'])){
            if(count($_REQUEST['hid_attach_filepath'])>0){
                $attacharr = array();
                foreach($_REQUEST['hid_attach_filepath'] as $k=>$v){
                    $d['file_name'] = $_REQUEST['hid_attach_filename'][$k];
                    $d['article_id'] = $eid;
                    $d['file_path'] = $_REQUEST['hid_attach_filepath'][$k];
                    $d['file_size'] = $_REQUEST['hid_attach_filesize'][$k];
                    $d['point'] = $_REQUEST['txt_attach_point'][$k];
                    $ext = explode(".",$_REQUEST['hid_attach_filesize'][$k]);
                    $d['file_ext'] = $ext[count($ext)-1];
                    $d['add_time'] = date('Y-m-d H:i:s');
                    array_push($attacharr, $d);
                }
            }
        }else{
            $tab2->where(array("article_id"=>$eid))->delete();
        }
        
        //检测是否有扩展字段
        $filelist = $tab4->Field("field_id")->where(array("channel_id"=>$channelid))->select();//获取所有的扩展字段id
        if(count($filelist)>0){
            $extcoum = "";
            foreach ($filelist as $v){
                $key = $tab5->getFieldById($v['field_id'],"name");
                $extcoum .= $key.",";
            }
            $extcoum = substr($extcoum,0,-1);// 获取所有的扩展字段名称字符串
        }

        if(isset($extcoum)){
            $extarr = array();
            $extcoumarr = explode(",", $extcoum);
            isset($_REQUEST['sell_price'])?$extarr['sell_price']=$_REQUEST['sell_price']:"";
            isset($_REQUEST['market_price'])?$extarr['market_price']=$_REQUEST['market_price']:"";
            isset($_REQUEST['stock_quantity'])?$extarr['stock_quantity']=$_REQUEST['stock_quantity']:"";
            isset($_REQUEST['goods_no'])?$extarr['goods_no']=$_REQUEST['goods_no']:"";
            isset($_REQUEST['source'])?$extarr['source']=$_REQUEST['source']:"";
            isset($_REQUEST['author'])?$extarr['author']=$_REQUEST['author']:"";
            foreach ($extcoumarr as $v){
                $extarr[$v] = $_REQUEST[$v];
            }
        }else{
            $extarr = array();
            isset($_REQUEST['sell_price'])?$extarr['sell_price']=$_REQUEST['sell_price']:"";
            isset($_REQUEST['market_price'])?$extarr['market_price']=$_REQUEST['market_price']:"";
            isset($_REQUEST['stock_quantity'])?$extarr['stock_quantity']=$_REQUEST['stock_quantity']:"";
            isset($_REQUEST['goods_no'])?$extarr['goods_no']=$_REQUEST['goods_no']:"";
            isset($_REQUEST['source'])?$extarr['source']=$_REQUEST['source']:"";
            isset($_REQUEST['author'])?$extarr['author']=$_REQUEST['author']:"";
        }
        // dump($extarr);
        $res1 =$res2=$res3=$res4=$res5=$res6=$res7="true";
        //开启事务
        $m = M();
        $m->startTrans();
        //主表内容更改 
        $res = $tab->where(array("id"=>$eid))->save($data);
        
        //图片表更改
        if(isset($albumarr)){
           //1、全部删除该id的图片
           $res1 = $tab1->where(array("article_id"=>$eid))->delete();
           //2、新增添加的图片
           $res2 = $tab1->addAll($albumarr);
        }
        
        //附件表更改
        if(isset($attacharr)){
            //1、全部删除该id的附件
            $res3 = $tab2->where(array("article_id"=>$eid))->delete();
            //2、新增添加的附件
            $res4 = $tab2->addAll($attacharr);
        }
        
        //扩展字段修改
        $res5 = $tab3->where(array("article_id"=>$eid))->save($extarr);
        
        // dump($res5);exit;


        //类别表修改
        if(isset($categorydaarr)){
            //1、删除该id的所有类别
            $res6 = $tab6->where(array("articleid"=>$eid))->delete();
            //2、新增新添加的类别
            $res7 = $tab6->addAll($categorydaarr);
        }
        
        if($res1==="false" || $res2 ==="false" || $res3 ==="false" || $res4 === "false" || $res5==="false" || $res6==="false" || $res7==="false"){
            $m->rollback();//新增数据失败，事务回滚
            return "false";
        }
        
        $m->commit();//成功添加数据
        return "success";
    }
    
    /***
     * @time 2016/06/21
     * @function 执行删除文件
     */
    public function delFileByPath($path){
        @unlink(".".$path);
    }
    
    /***
     * @time 2016/06/21
     * @function 执行删除数据表操作
     * 
     */
    public function delDataById($checkidstr){
        $tab = M("article");
        $tab1 = M("article_albums");
        $tab2 = M("article_attach");
        $tab3 = M("article_attribute_value");
        $tab4 = M("art_cat_relation");
        
        //获取图片，并删除
        $imgarrs = $tab->field("img_url")->where(array("id"=>array("in",$checkidstr)))->select();
        if(count($imgarrs)>0){
            foreach ($imgarrs as $v){
                $this->delFileByPath($v['img_url']);
            }
        }
        $tab->where(array("id"=>array("in",$checkidstr)))->delete();//删除数据库中的数据
        //删除图册的相片
        $alumbs = $tab1->field("thumb_path,original_path")->where(array("article_id"=>array("in",$checkidstr)))->select();
        if(count($alumbs)>0){
            foreach ($alumbs as $v){
                $this->delFileByPath($v['thumb_path']);
                $this->delFileByPath($v['original_path']);
            }
        }
        $tab1->where(array("article_id"=>array("in",$checkidstr)))->delete();//删除数据库中的数据
        
        //删除附件中的文件
        $attacharr = $tab2->field("file_path")->where(array("article_id"=>array("in",$checkidstr)))->select();
        if(count($attacharr)>0){
            foreach ($attacharr as $v){
                $this->delFileByPath($v['file_path']);
            }
        }
        $tab2->where(array("article_id"=>array("in",$checkidstr)))->delete();//删除数据库中的数据 附件信息
        
        $tab3->where(array("article_id"=>array("in",$checkidstr)))->delete();//删除数据库中的数据 扩展字段信息
        
        $tab4->where(array("articleid"=>array("in",$checkidstr)))->delete();//删除分类数据
        
        return "success";
    }
    
    /***
     * @time 2016/06/28
     * @function 修改article表属性值
     */
    public function chPropertyById($coum,$val,$eid){
        $d[$coum] = $val;
        M("article")->where(array("id"=>$eid))->save($d);
    }
    
}