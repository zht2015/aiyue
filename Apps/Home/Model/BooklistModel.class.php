<?php
/**
 * 爱阅图书
 * User: zht
 * Date: 2016/10/18
 * Time: 11:16
 */
namespace Home\Model;
class BooklistModel extends CommonModel{
   
    /**
     * 保存书单
     **/
    public function makeBookList(){
        $data=array();
        $data['booklist_name']=I('post.booklist_name');
        $data['booklist_cover']=I('post.booklist_cover');
        $data['booklist_discription']=I('post.booklist_discription');
        $data['bookcover']=I('post.bookcover');
        $data['recomend']=I('post.recomend');
        $data['booklist_tag']=I('post.booklist_tag');
        $data['c_time']=date("Y-m-d H:i:s");
        $data['user_id']=session("USERS.id");
        $info =$this->add($data);
        if($info){
            return true;
        }else{
            return false;
        }
        
    }

    /**
     * 取得所有书单
     * @author zht 2016-10-18
     * @return [type] [description]
     */
    public function getBookList(){
        $map['user_id'] = session('USERS.id');
        $map['is_del'] = 0;
        $info = $this->where($map)->select();
        return $info;
    }
    
    

    // 一键上传书单
    public function booklist_excel_import(){
            $filetmpname = APP_PATH.'public/Uploads/624.xls';
            Vendor('Classes.PHPExcel');
            $objPHPExcel = PHPExcel_IOFactory::load($filetmpname);
            $arrExcel = $objPHPExcel->getSheet(0)->toArray();
            //删除不要的表头部分，我的有三行不要的，删除三次
            array_shift($arrExcel);
            array_shift($arrExcel);
            array_shift($arrExcel);//现在可以打印下$arrExcel，就是你想要的数组啦
            
            //查询数据库的字段
            $m = M('swt');
            $fieldarr = $m->query("describe kefu_swt");
            foreach($fieldarr as $v){
                $field[] = $v['Field'];
            }
            array_shift($field);//删除自动增长的ID        
            //循环给数据字段赋值
            foreach($arrExcel as $v){
                $fields[] = array_combine($field,$v);//将excel的一行数据赋值给表的字段
            }        
            //批量插入        
            if(!$ids = $m->addAll($fields)){
                $this->error("没有添加数据");
            }
            $this->success('添加成功');
        }





}