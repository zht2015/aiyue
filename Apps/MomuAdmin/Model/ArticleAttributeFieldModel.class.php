<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 10:48
 */
namespace MomuAdmin\Model;
class ArticleAttributeFieldModel extends CommonModel{
    /**
     * @time 2016/05/30
     * @ biking
     * @function 写入字段信息数据，并且将改字段添加到表article_attribute_value 
     */
    public function setFieldAndValue(){
        //获取post过来的数据
        $tab1 = M("article_attribute_field");
        $tab2 = '';
        
        $tabtype = isset($_REQUEST['belongstab'])?$_REQUEST['belongstab']:'';
        switch($tabtype){
            case '1':
                $tab2 = 'm_news_value';
            break;
            case '2':
                $tab2 = 'm_advertisement_value';
            break;
            case '3':
                $tab2 = 'm_market_value';
            break;
            case '4':
                $tab2 = 'm_financing_value';
            break;
        }
        
        if($tab2 == ''){
            die('获取不到字段所属表id');
        }
        
        if($tab1->create()){
            $m = M();
            $m->startTrans();
                $res1 = $tab1->add();
                $res2 = M()->execute("alter table ".$tab2." add ".$_REQUEST['name']." ".$_REQUEST['data_type']);
            if($res1 && $res2){
                $m->commit();
            }else{
                $m->rollback();
            }
        }
        
    }
    
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取article_attribute_field表的列表数据
     * @param $coum 字段数组、$order 排序字符串、$where 条件数组、$Page 分页类 、$type 类型，不为空为单条数据查询
     */
    public function getTabList($coum="",$order="id asc",$where="",$Page="",$type=""){
        return $this->getList("article_attribute_field",$coum,$order,$where,$Page,$type);
    }
    /***
     * @time 2016/06/02
     * @biking
     * @function 获取article_attribute_field表的数据条数
     */
    public function getTabCount($where=""){
        $aaf = M('article_attribute_field');
        return empty($where)?$aaf->count():$aaf->where($where)->count();
    }
    
    /****
     * @time 2016/06/01
     * @biking
     * @function 修改表信息
     */
    public function saveValue(){
        //获取post过来的数据
        $tab1 = M("article_attribute_field");
        $tab2 = '';
        
        $tabtype = isset($_REQUEST['belongstab'])?$_REQUEST['belongstab']:'';
        switch($tabtype){
            case '1':
                $tab2 = 'm_news_value';
                break;
            case '2':
                $tab2 = 'm_advertisement_value';
                break;
            case '3':
                $tab2 = 'm_market_value';
                break;
            case '4':
                $tab2 = 'm_financing_value';
                break;
        }
        
        if($tab2 == ''){
            die('获取不到字段所属表id');
        }
        
        //判断是否需要更改字段的类型大小或者字段的类型
        $olddatatype = $tab1->getFieldById($_REQUEST['id'],"data_type");
        if($olddatatype != $_REQUEST['data_type']){
            //更改表数据，同时更改相应字段的字段类型
            if($tab1->create()){
                $m = M();
                $m->startTrans();
                $res1 = $tab1->save();
                $res2 = M()->execute("alter table ".$tab2." modify ".$_REQUEST['name']." ".$_REQUEST['data_type']);
                if($res1=="false" || $res2 =="false"){
                    $m->rollback();
                    return "error";
                }else{
                    $m->commit();
                    return "success";
                }
            }
            
        }
        
        if($tab1->create()){
            $res1 = $tab1->save();
            if($res1 === "false"){
                return "error";
            }else{
                return "success";
            }
        }
        
        
    }
    
    /***
     * @time 2016/05/31
     * @biking
     * @function 删除表中的记录,同时将对应的表中的字段清除
     */
    public function delByCondition($where){
        $tab1 = M("article_attribute_field");
        $tab2 = '';
        $wherearr = explode(",", $where);
        $num = count($wherearr);
        if($num<=1){//只删除一条记录
              //获取该id对应的字段
              $coumname = $tab1->getFieldById($where,"name");
              $tabtype = $tab1->getFieldById($where,"belongstab");
              switch($tabtype){
                  case '1':
                      $tab2 = 'm_news_value';
                      break;
                  case '2':
                      $tab2 = 'm_advertisement_value';
                      break;
                  case '3':
                      $tab2 = 'm_market_value';
                      break;
                  case '4':
                      $tab2 = 'm_financing_value';
                      break;
              }
              
              if($tab2 == ''){
                  die('获取不到字段所属表id');
              }
              
              
              $m = M();
              $m->startTrans(); //开始事务
              $res1 = $tab1->delete($where);
              $res2 = M()->execute("alter table ".$tab2." drop ".$coumname);
              if($res1 == "false" || $res2 === "false"){
                  $m->rollback();//事务回滚
                  return "error";
              }else{
                  $m->commit(); //提交事务
                  return $num;
              }
            
        }else{
            //删除多条记录
            //设置删除的字段字符串
            $dropstr = "";
            for($i=0;$i<count($wherearr);$i++){
                $dropstr = "drop ".$tab1->getFieldById($wherearr[$i],"name");
                $tabtype = $tab1->getFieldById($where,"belongstab");
                switch($tabtype){
                    case '1':
                        $tab2 = 'm_news_value';
                        break;
                    case '2':
                        $tab2 = 'm_advertisement_value';
                        break;
                    case '3':
                        $tab2 = 'm_market_value';
                        break;
                    case '4':
                        $tab2 = 'm_financing_value';
                        break;
                }
                
                if($tab2 == ''){
                    die('获取不到字段所属表id');
                }
                
                $m = M();
                $m->startTrans();
                $res1 = $tab1->delete($where);
                $res2 = M()->execute("alter table ".$tab2." ".$dropstr);
                if($res1 == "false" || $res2 === "false"){
                    $m->rollback();
                    return "error";
                }else{
                    $m->commit();
                    return $num;
                }
                
            }
            
            
        }
       
    }
    
}