<?php
 /*
 *后台导航处理
 2016.7.4
 by 小明Settings/nav_list
 */
namespace MomuAdmin\Action;
class SettingsAction extends CommonAction {
  /*
  导航列表
  */
  public function nav_list(){
      $this->showSysTips();
      
      if(IS_POST){
          $evename = $_REQUEST['__EVENTTARGET'];
          $evenval = $_REQUEST['__EVENTARGUMENT'];
          $selids = "";
          $chkid = $_REQUEST['chkId'];
          $hideid = $_REQUEST['hidId'];
          foreach($chkid as $k=>$v){
              $selids .= $hideid[$k].",";
          }
          $selids = substr($selids,0,-1);
          if($evename == "btnDelete"){//删除角色表操作
              //die($selids);
              $res = M('navigation')->where(array("id"=>array("in",$selids)))->delete();
              if($res == "false"){$this->redirect("Settings/nav_list",array("flag"=>"5"));;die();}
              $this->redirect("Settings/nav_list",array("flag"=>"2"));
          }
      }
    $rs       = M('navigation')->order('sort_id asc')->select();
    $nav_list = listNav($rs,0);
    $this->assign('nav_list',$nav_list);
    $this->display();
  }
  /*
  add_nav
  增加分类
  */
  public function nav_add(){
    if(IS_POST){
        $d['parent_id']  = I('post.parent_id');
        $d['channel_id'] = 0;
        $d['nav_type']   = 'System';
        $d['name']       = I('post.name');
        $d['title']      = I('post.title');
        $d['sub_title']  = I('post.sub_title');
        $d['icon_url']   = I('post.icon_url');
        $d['link_url']   = I('post.link_url');
        $d['sort_id']    = I('post.sort_id');
        $d['is_lock']    = I('post.is_lock') == 'on' ? 1 : 0;
        $d['remark']     = I('post.remark');
        $actiontype = I('post.action_type');
        if(count($actiontype)>0){
            $d['action_type']= implode(",", $actiontype);
        }
        $d['is_sys']     = I('post.is_sys') == 'on' ? 1 : 0;

        $rs = M('navigation')->add($d);
        if($rs){
          $this->redirect("Settings/nav_list",array("flag"=>"1"));die();
        }else{
           $this->redirect("Settings/nav_list",array("flag"=>"4"));die();
          //$this->error('增加失败，未知错误');
        }
    }else{
        $rs       = M('navigation')->order('sort_id asc')->select();
        $nav_list = $this->selectCat($rs,0);
        $info     = M('navigation')->find(I('get.id'));
        // dump($info);
        $this->assign('info',$info);
        $this->assign('nav_list',$nav_list);
        $this->display();
    }      
  }
  /*
  编辑分类
  */
  public function nav_edit(){
     if(IS_POST){
        $id              = I('post.id');
        $d['parent_id']  = I('post.parent_id');
        $d['channel_id'] = 0;
        $d['nav_type']   = 'System';
        $d['name']       = I('post.name');
        $d['title']      = I('post.title');
        $d['sub_title']  = I('post.sub_title');
        $d['icon_url']   = I('post.icon_url');
        $d['link_url']   = I('post.link_url');
        $d['sort_id']    = I('post.sort_id');
        $d['is_lock']    = I('post.is_lock') == 'on' ? 0 : 1;
        $d['remark']     = I('post.remark');
        $actiontype = I('post.action_type');
        if(count($actiontype)>0){
            $d['action_type']= implode(",", $actiontype);
        }
        $d['is_sys']     = I('post.is_sys') == 'on' ? 0 : 1;

        $rs =  M('navigation')->where(array('id'=>$id))->save($d);
     if($rs){
          $this->redirect("Settings/nav_list",array("flag"=>"3"));die();
        }else{
           $this->redirect("Settings/nav_list",array("flag"=>"6"));die();
          //$this->error('修改失败，未知错误');
        }
    }else{
        $rs       = M('navigation')->order('sort_id asc')->select();
        $nav_list = $this->selectCat($rs,0);
        $info     = M('navigation')->find(I('get.id'));
        $this->assign('info',$info);
        $this->assign('nav_list',$nav_list);
        $this->display();
    }      
  }
  /*
  判断调用别名
  */
  public function checkName(){
    $name  = I('post.param');
    $count = M('navigation')->where(array('name'=>$name))->count();

    if($count > 0){
        $d['info']   = "该导航别名不可使用";
        $d['status'] = "n";
    }else{
        $d['info']   = "该导航别名可使用";
        $d['status'] = "y";
    }
    echo json_encode($d);
  }
  /*
  删除分类
  */
  public function del_nav(){
    $id = I('post.id');
    $condition['id'] = array('IN',$id);
    M('navigation')->where($condition)->delete() ? success('删除成功',U('Settings/nav_list')) : fail('删除失败，未知错误');
  }
  /*
  排序
  */
  public function sort(){

    $id   = explode(',', I('post.id'));
    $name = explode(',', I('post.name'));
    $data = array_combine($id,$name);//将两个数组组合成一个数组,$key为$id ,$value为$name
    foreach ($data as $k => $v) {
      M('navigation')->where(array('id'=>$k))->setField('sort_id',$v);
    }
    success('排序更新成功',U('Settings/nav_list'));
  }
  
  
  
  
  /***
   * @time 2016/07/05
   * @function  系统设置
   */
  public function sys_config(){
      $configfilepath = "./Apps/MomuAdmin/Conf/config.php";
      $configfilejson = "./Apps/MomuAdmin/Conf/config.json";
      $configstr = "";
      $jsonstr = "";
      
      if(IS_POST){//提交过来的数据
          $mailssl = isset($_REQUEST['emailssl'])?"0":"1";
          $data = array(
              "webname" => I("webname"),
              "weburl" => I("weburl"),
              "webcompany" => I("webcompany"),
              "webaddress" => I("webaddress"),
              "webtel" => I("webtel"),
              "webfax" => I("webfax"),
              "webmail" => I("webmail"),
              "webcrod" => I("webcrod"),
              "rootpth" => I("rootpth"),
          
              "smsapiurl" => I("smsapiurl"),
              "smsusername" => I("smsusername"),
              "smspassword" => I("smspassword"),
          
              "emailsmtp" => I("emailsmtp"),
              "emailssl" => $mailssl,
              "emailport" => I("emailport"),
              "emailfrom" => I("emailfrom"),
              "emailusername" => I("emailusername"),
              "emailpassword" => I("emailpassword"),
              "emailnickname" => I("emailnickname"),
          
              "fileextension" => I("fileextension"),
              "videoextension" => I("videoextension"),
              "attachsize" => I("attachsize"),
              "videosize" => I("videosize"),
              "imgsize" => I("imgsize"),
              "imgmaxheight" => I("imgmaxheight"),
              "imgmaxwidth" => I("imgmaxwidth"),
              "thumbnailheight" => I("thumbnailheight"),
              "thumbnailwidth" => I("thumbnailwidth"),
              "watermarktype" => I("watermarktype"),
              "watermarktext" => I("watermarktext"),
              "watermarkfontsize" =>I("watermarkfontsize"),
          );
          $configstr = '<?php 
              return array(
          
              "webname" => "'.I("webname").'",
              "weburl" => "'.I("weburl").'",
              "webcompany" => "'.I("webcompany").'",
              "webaddress" => "'.I("webaddress").'",
              "webtel" => "'.I("webtel").'",
              "webfax" => "'.I("webfax").'",
              "webmail" => "'.I("webmail").'",
              "webcrod" => "'.I("webcrod").'",
              "rootpth" => "'.I("rootpth").'",
          
              "smsapiurl" => "'.I("smsapiurl").'",
              "smsusername" => "'.I("smsusername").'",
              "smspassword" => "'.I("smspassword").'",
          
              "emailsmtp" => "'.I("emailsmtp").'",
              "emailssl" => "'.$mailssl.'",
              "emailport" => "'.I("emailport").'",
              "emailfrom" => "'.I("emailfrom").'",
              "emailusername" => "'.I("emailusername").'",
              "emailpassword" => "'.I("emailpassword").'",
              "emailnickname" => "'.I("emailnickname").'",
          
              "FILEUPEXT" => "'.I("fileextension").'",
              "VIDEOUPEXT" => "'.I("videoextension").'",
              "FILEUPMAX" => "'.I("attachsize").'",
              "VIDEOUPMAX" => "'.I("videosize").'",
              "maxSize" => "'.I("imgsize").'",
              "imageMaxHeight" => "'.I("imgmaxheight").'",
              "imageMaxWidth" => "'.I("imgmaxwidth").'",
              "thumbMaxHeight" => "'.I("thumbnailheight").'",
              "thumbMaxWidth" => "'.I("thumbnailwidth").'",
              "WATERTYPE" => "'.I("watermarktype").'",
              "WATERTXT" => "'.I("watermarktext").'",
              "WATERSIZE" => "'.I("watermarkfontsize").'",
          );';
          
          $jsonstr = json_encode($data);
          if(!file_put_contents($configfilejson, $jsonstr)){
              die('没有权限写入目录/MomuAdmin/Conf/');
          }
          if(!file_put_contents($configfilepath, $configstr)){
              die('没有权限写入目录/MomuAdmin/Conf/');
          }
          
      }else{
          if(file_exists($configfilejson)){//文件存在，读取文件
              $d = file_get_contents($configfilejson);
              $data = json_decode($d,true);
          }else{
              //创建初始化数据
              $data = array(
          
                  "webname" => "墨木cms管理系统",
                  "weburl" => "http://www.woodsj.com",
                  "webcompany" => "深圳市墨木创意设计",
                  "webaddress" => "广东省深圳市宝安区西乡街道",
                  "webtel" => "2801633863",
                  "webfax" => "",
                  "webmail" => "2801633863@qq.com",
                  "webcrod" => "",
                  "rootpth" => "http://yxadmin.woodsj.com/",
          
                  "smsapiurl" => "http://sms.dtcms.net/httpapi/",
                  "smsusername" => "test",
                  "smspassword" => "",
          
                  "emailsmtp" => "smtp.qq.com",
                  "emailssl" => "0",
                  "emailport" => "25",
                  "emailfrom" => "2801633863@qq.com",
                  "emailusername" => "2801633863@qq.com",
                  "emailpassword" => "",
                  "emailnickname" => "",
          
                  "fileextension" => "gif,jpg,png,bmp,rar,zip,doc,xls,txt,mov",
                  "videoextension" => "flv,mp3,mp4,avi,mov",
                  "attachsize" => "51200",
                  "videosize" => "102400",
                  "imgsize" => "102400",
                  "imgmaxheight" => "1024",
                  "imgmaxwidth" => "1024",
                  "thumbnailheight" => "510",
                  "thumbnailwidth" => "510",
                  "watermarktype" => "2",
                  "watermarktext" => "momu",
                  "watermarkfontsize" => "12",
              );
              $configstr = '<?php 
               return array(
          
              "webname" => "墨木cms管理系统",
              "weburl" => "http://www.woodsj.com",
              "webcompany" => "深圳市墨木创意设计",
              "webaddress" => "广东省深圳市宝安区西乡街道",
              "webtel" => "2801633863",
              "webfax" => "",
              "webmail" => "2801633863@qq.com",
              "webcrod" => "",
              "rootpth" => "http://yxadmin.woodsj.com/",
          
              "smsapiurl" => "http://sms.dtcms.net/httpapi/",
              "smsusername" => "test",
              "smspassword" => "",
          
              "emailsmtp" => "smtp.qq.com",
              "emailssl" => "0",
              "emailport" => "25",
              "emailfrom" => "2801633863@qq.com",
              "emailusername" => "2801633863@qq.com",
              "emailpassword" => "",
              "emailnickname" => "",
          
              "FILEUPEXT" => "gif,jpg,png,bmp,rar,zip,doc,xls,txt,mov",
              "VIDEOUPEXT" => "flv,mp3,mp4,avi,mov",
              "FILEUPMAX" => "51200",
              "VIDEOUPMAX" => "102400",
              "maxSize" => "102400",
              "imageMaxHeight" => "1024",
              "imageMaxWidth" => "1024",
              "thumbMaxHeight" => "510",
              "thumbMaxWidth" => "510",
              "WATERTYPE" => "2",
              "WATERTXT" => "momu",
              "WATERSIZE" => "12",
          );';
          
              $jsonstr = json_encode($data);
              if(!file_put_contents($configfilejson, $jsonstr)){
                  die('没有权限写入目录/MomuAdmin/Conf/');
              }
              if(!file_put_contents($configfilepath, $configstr)){
                  die('没有权限写入目录/MomuAdmin/Conf/');
              }
          
          }
          
      }
      
      $this->assign("edata",$data);
      $this->display();
  }
  
  
  
}