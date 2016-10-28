<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class ChannelModel extends CommonModel{
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取提交的post数据
     */
    public function backPost(){
        if($_REQUEST['ddlSiteId'] != ''){
            $data['site_id'] = I("ddlSiteId");
        }
        $data['name'] = I("txtName");
        $data['title'] = I("txtTitle");
        $data['is_albums'] = isset($_REQUEST['cbIsAlbums'])?(I("cbIsAlbums")=="on"?1:0):0;
        $data['is_attach'] = isset($_REQUEST['cbIsAttach'])?(I("cbIsAttach")=="on"?1:0):0;
        $data['is_spec'] = isset($_REQUEST['cbIsSpec'])?(I("cbIsSpec")=="on"?1:0):0;
        $data['sort_id'] = I("txtSortId");
        return $data;
    }
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取channel表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("channel",$coum,$order,$where,$Page,$type); 
    }
    
    /**
     * @time 2016/06/02
     * @biking
     * @function 自动生成导航数据插入
     */
    public function addNavigation($name,$title,$channelid,$partcoum){
        
        switch($partcoum){
            case '1'://新闻
                $parentid = 91; 
                $modelname = "News";
            break;
            case '2'://广告
                $parentid = 93;
                $modelname = "Advertise";
            break;
            case '3'://商城
                $parentid = 95;
                $modelname = "Market";
            break;
            case '4'://财务
                $parentid = 97;
                $modelname = "Financing";
            break;
        }
        
        $tab = M("navigation");
        $data['parent_id'] = $parentid;
        $data['channel_id'] = $channelid;
        $data['nav_type'] = "System";
        $data['name'] = "channel_".$name;
        $data['title'] = $title;
        $data['sort_id'] = 100;
        $data['is_lock'] = 0;
        $data['action_type'] = "Show";
        $data['is_sys'] = 1;
        
        $navres = $tab->add($data);
        
        if($navres){
           //生成批量导航数据
           $tmparr =array();
           for($i=0;$i<3;$i++){
               $d['parent_id'] = $navres;
               $d['channel_id'] = $channelid;
               $d['nav_type'] = "System";
               $d['is_lock'] = 0;
               $d['action_type'] = "Show,View,Add,Edit,Delete,Audit";
               $d['is_sys'] = 1;
               if($i==0){
                   $d['name'] = "channel_".$name."_list";
                   $d['title'] = "内容管理";
                   $d['link_url'] = $modelname."/article_list";
                   $d['sort_id'] = 99;
               }elseif($i==1){
                   $d['name'] = "channel_".$name."_category";
                   $d['title'] = "栏目类别";
                   $d['link_url'] = $modelname."/category_list";
                   $d['sort_id'] = 100;
               }else{
                   $d['name'] = "channel_".$name."_comment";
                   $d['title'] = "评论管理";
                   $d['link_url'] = $modelname."/comment_list";
                   $d['sort_id'] = 101;
               }
               array_push($tmparr, $d);
           }
           $res = $tab->addAll($tmparr);//批量新增
        }
        
    }
    
    /**
     * @time 2016/06/01
     * @ biking
     * @function 写入频道表数据，并将相关联的字段信息写入到关联表中,并在导航中自动生成三个基本页配置
     */
    public function addData(){
        $tabtype = $_REQUEST['ddlSiteId'];
        //获取post过来的数据
        $tab1 = M("channel");
        $tab2 = M("channel_field");
        switch($tabtype){
            case '1'://新闻
                $tab3 = M("news_field");
            break;
            case '2'://广告
                $tab3 = M("advertisement_field");
            break;
            case '3'://商城
                $tab3 = M("market_field");
            break;
            case '4'://财务
                $tab3 = M("financing_field");
            break;
        }
        
        $tab4 = M("search_field");
        
        $data = $this->backPost();
        $fields = isset($_REQUEST['cblAttributeField'])?$_REQUEST['cblAttributeField']:"";
        $listfields = isset($_REQUEST['cblListField'])?$_REQUEST['cblListField']:"";
        $searchfields = isset($_REQUEST['cblSearchField'])?$_REQUEST['cblSearchField']:"";
        
        $res = $tab1->add($data);//频道数据新增
        
        //这里执行生成系统导航即频道下面自动添加三个页面功能
        if($res){
            $this->addNavigation(I("txtName"),I("txtTitle"),$res,I("ddlSiteId"));
        }
        
        if(empty($fields)&&empty($listfields)){
            //没有选择任何扩展属性和列表显示页
            return $res?"success":"false";
        }
        
        $res1 = $res2 =$res3 = "true";
        $m = M();
        $m->startTrans();
        
        if($res){
            if($fields != ''){
                //选择有扩展属性，构造批量写入数据，执行批量写入操作
                $tmparray = array();
                for($i=0;$i<count($fields);$i++){
                    $d['channel_id'] = $res;
                    $d['field_id'] = $fields[$i];
                    array_push($tmparray, $d);
                }
                $res1 = $tab2 ->addAll($tmparray);  
            }
            
            if($listfields != ''){
                //选择有扩展属性，构造批量写入数据，执行批量写入操作
                $listarray = array();
                for($i=0;$i<count($listfields);$i++){
                    $d['channel_id'] = $res;
                    $d['field_id'] = $listfields[$i];
                    array_push($listarray, $d);
                }
                $res2 = $tab3 ->addAll($listarray);  
            }
            
            if($searchfields != ''){
                //选择有扩展属性，构造批量写入数据，执行批量写入操作
                $searcharray = array();
                for($i=0;$i<count($searchfields);$i++){
                    $d['channel_id'] = $res;
                    $d['field_id'] = $searchfields[$i];
                    array_push($searcharray, $d);
                }
                $res3 = $tab4 ->addAll($searcharray);  
            }
            
            if($res1 === "false" || $res2 === "false" || $res3 === "false"){
                $m->rollback();
                $tab1->where(array('id'=>$res))->delete();
                return 'false';die();
            }
            
                $m->commit();
                return 'success';die();
            
        }
        
        return 'false';
        
        
    }
    
    /***
     * @time 2016/06/01
     * @biking
     * @function 修改频道表的数据
     */
    public function saveChannel(){
        $tabtype = I('tabtype');
        //获取post过来的数据
        $tab1 = M("channel");
        $tab2 = M("channel_field");
        $tab3 = M("navigation");
        switch($tabtype){
            case '1'://新闻
                $tab4 = M("news_field");
                break;
            case '2'://广告
                $tab4 = M("advertisement_field");
                break;
            case '3'://商城
                $tab4 = M("market_field");
                break;
            case '4'://财务
                $tab4 = M("financing_field");
                break;
        }
        $tab5 = M("search_field");
        
        $data = $this->backPost();
        $eid = I("eid");
        $fields = isset($_REQUEST['cblAttributeField'])?$_REQUEST['cblAttributeField']:"";
        $listfields = isset($_REQUEST['cblListField'])?$_REQUEST['cblListField']:"";
        $searchfields = isset($_REQUEST['cblSearchField'])?$_REQUEST['cblSearchField']:"";
        
        //获取需要更新的navigation的id
        $navigationeid = $tab3->getFieldByChannelId($eid,"id");
        
        $res = $tab1->where(array("id"=>$eid))->save($data);//更新数据
        //更新navigation的值
          $tab3->where(array("id"=>$navigationeid))->save(array("title"=>I("txtTitle")));  
        
        $tab2->where(array("channel_id"=>$eid))->delete();//删除扩展字段
        $tab4->where(array("channel_id"=>$eid))->delete();//删除列表显示字段
        $tab5->where(array("channel_id"=>$eid))->delete();//删除搜索字段
        if(empty($fields)&&empty($listfields)&&empty($searchfields)){
            //没有扩展字段
            return $res === "false"?"false":"success";
        }
        
        $res1 = $res2 =$res3= "true";
        $m = M();
        $m->startTrans();
        
        //新增字段
        if($fields != ''){
                //选择有扩展属性，构造批量写入数据，执行批量写入操作
                $tmparray = array();
                for($i=0;$i<count($fields);$i++){
                    $d['channel_id'] = $eid;
                    $d['field_id'] = $fields[$i];
                    array_push($tmparray, $d);
                }
                $res1 = $tab2 ->addAll($tmparray);  
            }
            
            if($listfields != ''){
                //选择有扩展属性，构造批量写入数据，执行批量写入操作
                $listarray = array();
                for($i=0;$i<count($listfields);$i++){
                    $d['channel_id'] = $eid;
                    $d['field_id'] = $listfields[$i];
                    array_push($listarray, $d);
                }
                $res2 = $tab4 ->addAll($listarray);  
            }
            if($searchfields != ''){
                //选择有扩展属性，构造批量写入数据，执行批量写入操作
                $searcharray = array();
                for($i=0;$i<count($searchfields);$i++){
                    $d['channel_id'] = $eid;
                    $d['field_id'] = $searchfields[$i];
                    array_push($searcharray, $d);
                }
                $res3 = $tab5 ->addAll($searcharray);  
            }
            
            if($res1 === "false" || $res2 === "false" || $res3 === "false"){
                $m->rollback();
                return 'false';die();
            }
            
                $m->commit();
                return 'success';die();
    }
    
    /***
     * @time 2016/06/01
     * @biking
     * @function 删除表中的记录,同时将对应的关联表中的数据全部删除
     */
    public function delByCondition($where){
        $res1 = M()->execute("delete from m_channel where id in (".$where.")");
        $res2 = M()->execute("delete from m_channel_field where channel_id in (".$where.")");
        $res3 = M()->execute("delete from m_navigation where channel_id in (".$where.")");
        if($res1 == "false"){
            return "error";
        }else{
            return count(explode(",", $where));
        }
    }
    
}