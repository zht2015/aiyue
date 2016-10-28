<?php
/**
 * 爱阅图书
 * User: zht
 * Date: 2016/10/17
 * Time: 11:16
 */
namespace Home\Model;
class BookModel extends CommonModel{
   
    /**
     * 保存图书
     **/
    public function saveBook(){
        $data=array();
        $data['book_name']=I('post.bookname');
        $data['book_author']=I('post.author');
        $data['book_press']=I('post.press');
        $data['ISBN']=I('post.ISBN',"");
        $data['author_intro']=I('post.author_intro',"");
        $data['price']=I('post.price',"");
        $data['content_intro']=I('post.content_intro',"");
        $data['book_cover']=I('post.bookcover');
        $data['book_tag']=I('post.tag');
        $data['user_id']=session("USERS.id");
        $data['book_add_time']=date("Y-m-d H:i;s");
        $data['channel_id']=M('channel')->getFieldByName('book','id');
        $info =M('News_value')->add($data);
        if($info){
            return true;
        }else{
            return false;
        }
        
    }

    /*获得标签*/
    public function getTag(){
        $map['channel_id']=M('channel')->getFieldByName('bq','id');
        $map['bqstatus']=0;
        return $info =M('News_value')->field('bqtitle')->where($map)->select();
    }
    
    /**
     * 根据图书id得到图书信息
     * @author zht 2016-10-26
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getBookById($id){
        $book=M('News_value');
        return $book->find($id);

    }
    
    
}